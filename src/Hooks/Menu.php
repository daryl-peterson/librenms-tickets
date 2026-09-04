<?php

/**
 * LibreNMS Tickets Menu Hook
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       1.0.0
 */

namespace DRP\Tickets\Hooks;

use App\Plugins\Hooks\MenuEntryHook;




/**
 * LibreNMS Tickets Menu Hook
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       1.0.0
 */
class Menu extends MenuEntryHook {

    // override the data function to add additional data to be accessed in the view
    // inside the blade, all variables will be named based on the key in the returned array
    public function data(array $settings = []): array {
        // inject settings and count how many we have so we can display it in the menu

        return [
            'count' => 32,
        ];
    }
}
