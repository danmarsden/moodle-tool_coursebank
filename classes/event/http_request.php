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
 * get_session
 *
 * @package    tool_coursestore
 * @author     Adam Riddel <adamr@catlyst-au.net>
 * @copyright  2015 Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace tool_coursestore\event;
defined('MOODLE_INTERNAL') || die();
/**
 * http_request
 *
 * @property-read array $other {
 *      error      => error code
 *      error_desc => error description
 * }
 *
 **/
class http_request extends \core\event\base {
    protected function init() {
        $this->data['crud'] = 'r';
        $this->data['edulevel'] = self::LEVEL_OTHER;
    }

    public static function get_name() {
        return get_string('eventhttprequest', 'tool_coursestore');
    }

    public function get_description() {
        return $this->data['other']['info'];
    }

    public function get_url() {
        return new \moodle_url('/admin/tool/coursestore/index.php');
    }
}