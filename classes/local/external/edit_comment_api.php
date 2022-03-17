<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Edit comment services implementation.
 *
 * @package mod_studentquiz
 * @copyright 2020 The Open University
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_studentquiz\local\external;

defined('MOODLE_INTERNAL') || die();

use external_api;
use external_function_parameters;
use external_single_structure;
use external_value;
use mod_studentquiz\commentarea\container;
use mod_studentquiz\commentarea\form\validate_comment_form;
use mod_studentquiz\commentarea\form\validate_comment_form_edit;
use mod_studentquiz\utils;

require_once($CFG->dirroot . '/mod/studentquiz/locallib.php');
require_once($CFG->libdir . '/externallib.php');

/**
 * Edit comment services implementation.
 *
 * @package mod_studentquiz
 * @copyright 2020 The Open University
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class edit_comment_api extends external_api {

    /**
     * Gets function parameter metadata.
     *
     * @return external_function_parameters Parameter info
     */
    public static function edit_comment_parameters() {
        return new external_function_parameters([
                'studentquizquestionid' => new external_value(PARAM_INT, 'Studentquizquestion ID'),
                'cmid' => new external_value(PARAM_INT, 'Cm ID'),
                'commentid' => new external_value(PARAM_INT, 'Comment ID to edit.'),
                'message' => new external_function_parameters([
                        'text' => new external_value(PARAM_RAW, 'Message of the post'),
                        'format' => new external_value(PARAM_TEXT, 'Format of the message')
                ]),
                'type' => new external_value(PARAM_INT, 'Comment type', VALUE_DEFAULT, utils::COMMENT_TYPE_PUBLIC)
        ]);
    }

    /**
     * Returns description of method result values.
     *
     * @return external_single_structure
     */
    public static function edit_comment_returns() {
        $replystructure = utils::get_comment_area_webservice_comment_reply_structure();
        return new external_single_structure($replystructure);
    }

    /**
     * Edit comment.
     *
     * @param int $studentquizquestionid - ID of studentquizquestion.
     * @param int $cmid - ID of CM.
     * @param int $commentid - ID of comment to edit.
     * @param string $message - Comment message.
     * @param int $type - Comment type.
     * @return \stdClass
     */
    public static function edit_comment($studentquizquestionid, $cmid, $commentid, $message, $type) {
        global $PAGE;
        $params = self::validate_parameters(self::edit_comment_parameters(), [
                'studentquizquestionid' => $studentquizquestionid,
                'cmid' => $cmid,
                'commentid' => $commentid,
                'message' => $message,
                'type' => $type
        ]);

        $studentquizquestion = utils::get_data_for_comment_area($params['studentquizquestionid'], $params['cmid']);
        $context = $studentquizquestion->get_context();
        self::validate_context($context);
        $commentarea = new container($studentquizquestion, null, '', $type);

        $comment = $commentarea->query_comment_by_id($params['commentid']);
        if (!$comment) {
            throw new \moodle_exception(\get_string('invalidcomment', 'studentquiz'), 'studentquiz');
        }

        // Check edit permission.
        if (!$comment->can_edit()) {
            throw new \moodle_exception($comment->get_error(), 'studentquiz');
        }

        $PAGE->set_context($context);

        // Assign data to edit post form, this will also check for session key.
        $formdata = [
                'message' => $message,
                '_qf__mod_studentquiz_commentarea_form_validate_comment_form' => 1
        ];

        $mform = new validate_comment_form('', [
                'params' => [
                        'questionid' => $params['questionid'],
                        'cmid' => $params['cmid'],
                        'commentid' => $params['commentid'],
                        'editmode' => true,
                        'type' => $params['type']
                ]
        ], 'post', '', null, true, $formdata);

        // Validate form data.
        $validatedata = $mform->get_data();

        if (!$validatedata) {
            $errors = array_merge($mform->validation($formdata, []), $mform->get_form_errors());
            throw new \moodle_exception('error_form_validation', 'studentquiz', '', json_encode($errors));
        }

        // Update comment.
        $comment->update_comment($validatedata);

        // Fetch db again to get full data.
        $comment = $commentarea->refresh_has_comment()->query_comment_by_id($params['commentid']);
        if (!$comment) {
            throw new \moodle_exception(\get_string('invalidcomment', 'studentquiz'), 'studentquiz');
        }

        // Create history.
        utils::create_comment_history($comment, utils::COMMENT_HISTORY_EDIT);

        return $comment->convert_to_object();
    }
}
