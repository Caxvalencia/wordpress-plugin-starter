<?php

namespace MyPlugin\WP\Admin;

use MyPlugin\WP\Traits\Singletonable;

final class Menu
{
    use Singletonable;

    /**
     * Menu constructor.
     */
    final private function __construct()
    {
        new AddMyPage();
    }

    /**
     * @return Menu
     */
    public static function init()
    {
        return self::getInstance();
    }
}