<?php

/**
 * LibreNMS Tickets plugin settings management.
 *
 * @package     librenms-tickets
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */

namespace DRP\Tickets;

use App\Models\Plugin;
use Illuminate\Support\Facades\Log;
use DRP\Tickets\Tickets;

/**
 * LibreNMS Tickets plugin settings management.
 *
 * @package     librenms
 * @author      Daryl Peterson <@gmail.com>
 * @copyright   Copyright (c) 2026, Daryl Peterson
 * @license     https://opensource.org MIT License
 * @link        https://github.com/daryl-peterson/
 * @since       0.0.1
 */
class PluginSettings {
    /**
     * Import settings for the LibreNMS Tickets plugin.
     *
     * @since 0.0.1
     */
    public array $settings;

    /**
     * The plugin instance.
     *
     * @since 0.0.1
     */
    public Plugin|null $plugin = null;

    /**
     * Import settings constructor.
     *
     * @since 0.0.1
     */
    public function __construct() {
        $this->plugin = Tickets::getPlugin();
        $settings = null;

        if (is_null($this->plugin)) {
            $this->settings = [];
            return;
        }

        $settings = $this->plugin->settings;

        if (!is_array($settings)) {
            $settings = [];
            $this->settings = $settings;
            $this->plugin->settings = $this->settings;
            $this->plugin->save();
        }

        $this->settings = $settings;
    }

    /**
     * Get all plugin settings.
     *
     * @return array
     *
     * @since 0.0.1
     */
    public function all(): array {
        return $this->settings;
    }

    /**
     * Get a specific plugin setting.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     *
     * @since 0.0.1
     */
    public function get(string $key, $default = null) {
        return $this->settings[$key] ?? $default;
    }

    /**
     * Set a plugin setting.
     *
     * @param string $key
     * @param mixed $value
     * @return bool
     *
     * @since 0.0.1
     */
    public function set(string $key, $value): bool {
        try {
            $this->settings[$key] = $value;

            if (is_null($this->plugin)) {
                return false;
            }

            $this->plugin->settings = $this->settings;
            return $this->plugin->save();
        } catch (\Exception $e) {
            Log::error('Failed to save plugin settings: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Reset all settings to default
     *
     * @return void
     * @since 0.0.1
     */
    public function reset() {
        $this->settings = [];
        if (!is_null($this->plugin)) {
            $this->plugin->settings = $this->settings;
            $this->plugin->save();
        }
    }

    /**
     * Delete a settings
     *
     * @param string $key
     * @return boolean
     * @since 0.0.1
     */
    public function delete(string $key): bool {
        try {
            if (isset($this->settings[$key])) {
                unset($this->settings[$key]);
            }

            if (is_null($this->plugin)) {
                return false;
            }

            $this->plugin->settings = $this->settings;
            return $this->plugin->save();
        } catch (\Exception $e) {
            Log::error('Failed to delete plugin setting: ' . $e->getMessage());
            return false;
        }
    }
}
