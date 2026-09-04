<?php

/**
 * LibreNMS Tickets Page Hook.
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */

namespace DRP\Tickets\Hooks;

use App\Plugins\Hooks\PageHook;
use DRP\DeviceImporter\DeviceImporter;


/**
 * LibreNMS Tickets Page Hook
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */
class Page extends PageHook {

	public function data(): array {

		return [
			'info' => [],
		];
	}
}
