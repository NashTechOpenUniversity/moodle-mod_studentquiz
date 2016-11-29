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
 * English strings for StudentQuiz
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_studentquiz
 * @copyright  2016 HSR (http://www.hsr.ch)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['modulename'] = 'StudentQuiz';
$string['modulenameplural'] = 'StudentQuizzes';
$string['modulename_help'] = 'The StudentQuiz activity allows students to add questions for the crowd. In the StudentQuiz overview the students can filter questions. They also can use the filtered questions in the crowd to practice. The teacher has an option to anonymize the created by column.<br><br>The StudentQuiz activity awards the students with points to motivate them to add and practice. The Points are listed in a ranking table.<br><br>For more information read the <a href="https://github.com/frankkoch/moodle-mod_studentquiz/blob/master/manuals/User-Manual.pdf">User-Manual</a>.';
$string['studentquizfieldset'] = 'Custom example fieldset';
$string['studentquizname'] = 'StudentQuiz Name';
$string['studentquizname_help'] = 'StudentQuiz Name';
$string['anonymous_checkbox_label'] = 'Student anonymizer';
$string['quiz_advanced_settings_header'] = 'Advanced Settings';
$string['quizpracticebehaviour'] = 'Rating and Comment';
$string['quizpracticebehaviourhelp'] = 'Rating and comment questions';
$string['quizpracticebehaviourhelp_help'] = 'Rating and comment question';

$string['studentquiz'] = 'studentquiz';
$string['pluginadministration'] = 'StudentQuiz Administration';
$string['pluginname'] = 'StudentQuiz';
$string['vote_column_name'] = 'Ratings';
$string['practice_column_name'] = 'Attempts';
$string['comment_column_name'] = 'Comments';
$string['difficulty_level_column_name'] = 'Difficulty';
$string['approved_column_name'] = 'Approved';
$string['vote_points'] = 'Points';
$string['tag_column_name'] = 'Tags';
$string['start_quiz_button'] = 'Start Quiz';
$string['nav_question_and_quiz'] = 'Quiz and Questions';
$string['nav_report'] = 'Report';
$string['nav_report_quiz'] = 'Quiz';
$string['nav_report_rank'] = 'Rank';
$string['nav_export'] = 'Export';
$string['nav_import'] = 'Import';
$string['nav_questionbank'] = 'Question bank';
$string['anonymrankhelp'] = 'Anonymize';
$string['anonymrankhelp_help'] = 'Anonymize for students the created by column in the question overview and the names of the ranking table.';
$string['createnewquestionfirst'] = 'Create first question';
$string['createnewquestion'] = 'Create new question';
$string['createnewquizfromfilter'] = 'Run filtered questions';
$string['no_difficulty_level'] = 'no difficulty';
$string['no_tags'] = 'no tags';
$string['no_votes'] = 'no ratings';
$string['no_practice'] = 'no attempts';
$string['no_comment'] = 'no comment';
$string['approved'] = '✓';
$string['not_approved'] = '✗';
$string['approve'] = 'Un-/Approve';
$string['approveselectedscheck'] = 'Are you sure you want to un-/approve the following questions?<br /><br />{$a}';
$string['questionsinuse'] = '(* Questions marked by an asterisk are already in use in some quizzes.)';
$string['creator_anonym_firstname'] = 'anonym';
$string['creator_anonym_lastname'] = 'anonym';

// Filters.
$string['filter_label_search'] = 'Search';
$string['filter_label_question'] = 'Question title';
$string['filter_label_approved'] = 'Only approved questions';
$string['filter_label_firstname'] = 'Firstname';
$string['filter_label_surname'] = 'Lastname';
$string['filter_label_createdate'] = 'Creation';
$string['filter_label_questiontext'] = 'Question content';
$string['filter_label_tags'] = 'Tag';
$string['filter_label_votes'] = 'Rating';
$string['filter_label_practice'] = 'Attempts';
$string['filter_label_comment'] = 'Comments';
$string['filter_label_difficulty_level'] = 'Difficulty';
$string['filter_ishigher'] = 'Is higher';
$string['filter_islower'] = 'Is lower';
$string['filter_label_show_mine'] = 'Show my questions';
$string['filter'] = 'Filter';

// Admin settings.
$string['rankingsettingsheader'] = 'Ranking settings';
$string['settings_add_q_quantifier'] = 'Points for each question created';
$string['config_add_q_quantifier'] = 'Points received for creating a new question.';
$string['settings_vote_quantifier'] = 'Multiplier for the average of stars received for a question';
$string['config_vote_quantifier'] = 'E.g. if the multiplier is 3 and a question is rated with an average of 4.3 stars, the author of the question will receive 13 points (= ROUND(3 * 4.3; 1)).';
$string['settings_correct_answered_q_quantifier'] = 'Points for each correct answer';
$string['config_correct_answered_q_quantifier'] = 'Points received for answering a question correctly.';
$string['settings_incorrect_answered_q_quantifier'] = 'Points for each wrong answer';
$string['config_incorrect_answered_q_quantifier'] = 'Points received for answering a question wrongly.';

// Report Dashboard.
$string['reportquiz_dashboard_title'] = 'Dashboard';

// Report quiz.
$string['reportquiz_total_title'] = 'Total';
$string['reportquiz_total_attempt'] = 'Number of attempts';
$string['reportquiz_total_questions_answered'] = 'Answered questions';
$string['reportquiz_total_questions_right'] = 'Questions right';
$string['reportquiz_total_questions_wrong'] = 'Questions wrong';
$string['reportquiz_total_obtained_marks'] = 'Obtained marks';
$string['reportquiz_summary_title'] = 'Quiz summaries';
$string['reportquiz_total_users'] = 'Participant count';
$string['reportquiz_admin_title'] = 'Detailed statistic';

// Report quiz admin section.
$string['reportquiz_admin_total_title'] = 'Overall total';
$string['reportquiz_admin_quizzes_title'] = 'Created quizzes';
$string['reportquiz_admin_quizzes_table_column_quizname'] = 'Quiz name';
$string['reportquiz_admin_quizzes_table_column_qbehaviour'] = 'Quiz behaviour';
$string['reportquiz_admin_quizzes_table_column_timecreated'] = 'Created';
$string['reportquiz_admin_quizzes_table_link_to_quiz'] = 'Link to quiz';

// Report quiz stats.
$string['reportquiz_stats_title'] = 'Stats';
$string['reportquiz_stats_nr_of_questions'] = 'Number of questions';
$string['reportquiz_stats_right_answered_questions'] = 'Correctly answered';
$string['reportquiz_stats_nr_of_own_questions'] = 'Own questions';

$string['reportquiz_stats_own_grade_of_max'] = 'Your Grade of max Grade';

// Report rank.
$string['reportrank_title'] = 'User ranking';
$string['reportrank_table_title'] = '- Ranking';
$string['reportrank_table_column_rank'] = 'Rank';
$string['reportrank_table_column_fullname'] = 'Fullname';
$string['reportrank_table_column_points'] = 'Points';

// View.
$string['viewlib_please_select_question'] = 'Please select a question.';
$string['viewlib_please_contact_the_admin'] = 'Please contact the admin.';

// Permission.
$string['studentquiz:submit'] = 'Submit on studentquiz';
$string['studentquiz:view'] = 'View studentquiz';
$string['studentquiz:addinstance'] = 'Add new instance';

// Change notification email
$string['emailchangebody'] = 'Dear {$a->username},

This email informs you that your question
\'{$a->questionname}\'
in course \'{$a->coursename}\'
has been modified by a teacher.

You can review this question at {$a->questionurl}.';
$string['emailchangesmall'] = 'Your question \'{$a->questionname}\' has been modified by a teacher.';
$string['emailchangesubject'] = 'Question modification: {$a->quizname}';

// Message provider
$string['messageprovider:change'] = 'Question change notification';
