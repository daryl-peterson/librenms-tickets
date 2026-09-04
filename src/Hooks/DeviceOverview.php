<?php

/**
 * LibreNMS Tickets Device Overview Hook
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */

namespace DRP\Tickets\Hooks;

use App\Models\Device;
use App\Plugins\Hooks\DeviceOverviewHook;
use DRP\Tickets\Tickets;
use DRP\Tickets\TraitHidePrivates;

/**
 * LibreNMS Tickets Device Overview Hook
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */
class DeviceOverview extends DeviceOverviewHook {
    use TraitHidePrivates;

    private array $info;

    public function __construct() {
        $this->info = Tickets::getInfo();
    }

    public function data(Device $device): array {
        // here we pass a title string, url to notes, and the device to the blade view for display

        $title = Tickets::TITLE . ' Device Tickets';
        return [
            'title' => $title,
            'device' => $device,
            'url' => url('device/' . $device->device_id . '/tickets'),
        ];
    }
}
