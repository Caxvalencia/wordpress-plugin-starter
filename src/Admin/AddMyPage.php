<?php

namespace MyPlugin\WP\Admin;

use MyPlugin\WP\MyPlugin;

class AddMyPage
{
    const MENU_SLUG = 'wp-my-plugin';

    const OPTION_GROUP_NAME = 'wp_my_plugin_settings_group';

    const OPTION_TWO = 'option_two';

    /**
     * GeneralSettingPage constructor.
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addMenuItem'], 9);
        add_action('admin_init', [$this, 'registerSettings']);
    }

    public function addMenuItem()
    {
        add_menu_page(
            __('My Plugin', 'wp-my-plugin'),
            __('My Plugin', 'wp-my-plugin'),
            'manage_options',
            self::MENU_SLUG,
            [$this, 'index']
        );
    }

    public function registerSettings()
    {
        register_setting(self::OPTION_GROUP_NAME, 'option_one');
        register_setting(self::OPTION_GROUP_NAME, self::OPTION_TWO);
    }

    public function index()
    {
        MyPlugin::view('admin/my-page.php');
    }
}