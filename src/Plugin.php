<?php

/**
 * LibreNMS Tickets Plugin.
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */

namespace DRP\Tickets;

/**
 * Laravel and application imports.
 */

use App\Models\Plugin as PluginModel;

/**
 * Plugin imports.
 */

use DRP\Tickets\Log;
use DRP\Tickets\PluginSettings;


/**
 * LibreNMS Tickets Plugin.
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */
class Plugin {

    /**
     * Constructor.
     *
     * @since 0.0.1
     */
    public function __construct() {
        # Code Here
    }


    /**
     * Get plugin information.
     *
     * @return array{
     *  name: '',
     *  title: '',
     *  author: '',
     *  ver: '',
     *  image: '',
     *  settings: array,
     *  dbStatus: array{
     *    ready: bool,
     *    error: string|null
     *  },
     * }`
     *
     * @version 0.0.1
     */
    public static function getInfo() {
        //$dbError = PluginCache::get(PluginCache::DB_ERROR);

        $result = array(
            'name'     => PLUGIN_NAME,
            'title'    => PLUGIN_TITLE,
            'author'   => PLUGIN_AUTHOR,
            'ver'      => PLUGIN_VER,
            'image'    => 'https://avatars.githubusercontent.com/u/13834451?s=400&u=ff8417db6126da8d9ff82822ea0be5897ad744b3&v=4',
            'settings' => self::getSettings(),
            'dbStatus'  => [
                'ready' => !$dbError,
                'error' => $dbError
            ],
        );

        return $result;
    }

    /**
     * Get plugin object model.
     *
     * @return PluginModel|null
     * @version 0.0.1
     */
    public static function getPluginModel(): PluginModel|null {
        $result = PluginModel::where('plugin_name', PLUGIN_NAME)->first();

        // Check if the plugin exists in the database.
        if (is_null($result)) {
            Log::error('Plugin not found: ' . PLUGIN_NAME);
            return null;
        }
        return $result;
    }

    /**
     * Get plugin settings.
     *
     * @return array
     * @version 0.0.1
     */
    public static function getSettings(): array {
        $obj = new PluginSettings();
        $settings = $obj->all();
        return $settings ?? [];
    }
}
