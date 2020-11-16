<?php
// This file is part of Moodle - https://moodle.org/
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
 * Plugin administration pages are defined here.
 *
 * @package     local_syllabus
 * @category    admin
 * @copyright   2020 CALL Learning <contact@call-learning.fr>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    global $CFG;
    $settings = new admin_category('syllabus',
        get_string('pluginname', 'local_syllabus'));

    $settingspage = new admin_settingpage('customfieldsdefinition',
        get_string('syllabus:customfielddef', 'local_syllabus'));

    $settingspage->add(
        new admin_setting_configtextarea('local_syllabus/customfielddef',
            get_string('syllabus:customfielddef', 'local_syllabus'),
            get_string('syllabus:customfielddef:desc', 'local_syllabus'),
            'Training Type|trainingtype|select|"<p>Type of training</p>"|0|Syllabus Fields|'
            . '{"required":"0","uniquevalues":"0","options":"OnSite\r\nDistance\r\nBlended",'
            . '"defaultvalue":"OnSite","locked":"0","visibility":"2"}')
    );

    $settingspage->add(
        new admin_setting_configtext('local_syllabus/syllabuscategoryname',
            get_string('syllabus:syllabuscategoryname', 'local_syllabus'),
            get_string('syllabus:syllabuscategoryname:desc', 'local_syllabus'),
            'Syllabus Fields')
    );
    $settings->add('syllabus', $settingspage);


    $settings->add('syllabus',
        new admin_externalpage('syllabus_manage_fields',
            new lang_string('syllabus:managefields', 'local_syllabus'),
            $CFG->wwwroot . '/local/syllabus/manage.php',
            array('local/syllabus:manage')
        )
    );
    $ADMIN->add('courses', $settings);
}