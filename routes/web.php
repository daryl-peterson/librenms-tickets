<?php

/**
 * LibreNMS Tickets Plugin Routes
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */

use Illuminate\Support\Facades\Route;

use DRP\Tickets\Tickets;
use DRP\Tickets\Controllers\TicketController;
use DRP\Tickets\Controllers\ActionController;


$plugin = Tickets::PLUGIN;



Route::middleware(['web'])
    ->get("plugin/settings/$plugin", [TicketController::class, 'settings'])
    ->name("$plugin.settings");


Route::middleware(['web'])
    ->post("plugin/$plugin/action", [ActionController::class, 'handle'])
    ->name("$plugin.action");
