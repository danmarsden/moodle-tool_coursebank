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
 * Course store plugin uninstallation.
 *
 * @package    tool
 * @subpackage coursestore
 * @author     Tim Price <timprice@catalyst-au.net>
 * @copyright  2015 Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/admin/tool/coursestore/lib.php');

function xmldb_tool_coursestore_uninstall() {
    global $CFG;

    // Check if transfer is in progress.
    if (tool_coursestore_does_cron_lock_exist('tool_coursestore_cronlock')) {
        throw new transfer_in_progress();
    }

    if (is_writable($CFG->dataroot)) {
        $dir = $CFG->dataroot . "/coursestore";
        tool_coursestore_rrmdir($dir);
    } else {
        throw new invalid_dataroot_permissions();
    }

    return true;
}