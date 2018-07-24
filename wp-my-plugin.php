<?php
/**
 * Plugin Name:     My Plugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Plugin for wordpress
 * Author:          Caxvalencia
 * Author URI:      caxvalencia@gmail.com
 * Text Domain:     wp-my-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WP_My_Plugin
 */

/*  Copyright 2018 Cristian Salazar (email : caxvalencia@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function init_wp_my_plugin()
{
//    load_plugin_textdomain('wp-my-plugin', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    require_once(__DIR__ . '/vendor/autoload.php');

    return \MyPlugin\WP\MyPlugin::getInstance(__FILE__);
}

add_action('plugins_loaded', 'init_wp_my_plugin', 0);
