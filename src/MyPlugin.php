<?php

namespace MyPlugin\WP;

use MyPlugin\WP\Admin\Menu;
use MyPlugin\WP\Traits\Singletonable;

/**
 * Class MyPlugin
 * @package MyPlugin\WP
 */
class MyPlugin
{
    use Singletonable;

    /** @var string */
    public static $pluginPath;

    /** @var string */
    public static $pluginUrl;

    /**
     * Sails constructor.
     *
     * @param $file
     */
    public function __construct($file)
    {
        self::$pluginPath = trailingslashit(plugin_dir_path($file));
        self::$pluginUrl = trailingslashit(plugin_dir_url($file));

        Menu::init();
    }

    /**
     * @param $path
     */
    public static function view($path, $data = [])
    {
        extract($data);

        include_once(self::$pluginPath . 'views/' . $path);
    }
}
