<?php

/**
 * Device import service provider.
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */

namespace DRP\Tickets;

use LibreNMS\Plugins;
use App\Plugins\PluginManager;
use LibreNMS\Interfaces\Plugins\PluginManagerInterface;
use LibreNMS\Interfaces\Plugins\Hooks\MenuEntryHook as MenuEntryHookInterface;
use LibreNMS\Interfaces\Plugins\Hooks\SettingsHook as SettingsHookInterface;
use LibreNMS\Interfaces\Plugins\Hooks\SinglePageHook;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

use DRP\Tickets\Hooks\Menu;
use DRP\Tickets\Hooks\Page;
use DRP\Tickets\Hooks\Settings;


/**
 * LibreNMS Tickets service provider.
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */
class PluginProvider extends ServiceProvider {

    public function register(): void {
        # code
    }

    public function boot(): void {
        $pluginName = 'librenms-tickets';

        /*
         * Compatibility view path.
         *
         * LibreNMS local plugins commonly reference views like:
         * librenms-tickets::resources.views.page
         *
         * Package views can also be referenced as:
         * device-importer::page
         */
        $paths = [
            __DIR__ . '/..',
            __DIR__ . '/../resources/views',
        ];
        Log::debug('View paths: ' . PHP_EOL . print_r($paths, true));
        $this->loadViewsFrom($paths, 'librenms-tickets');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        //$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        /**
         * @var PluginManager $pluginManager
         */
        $pluginManager = $this->app->make(PluginManagerInterface::class);
        $pluginManager->publishHook($pluginName, MenuEntryHookInterface::class, Menu::class);
        $pluginManager->publishHook($pluginName, SinglePageHook::class, Page::class);
        $pluginManager->publishHook($pluginName, SettingsHookInterface::class, Settings::class);
    }
}
