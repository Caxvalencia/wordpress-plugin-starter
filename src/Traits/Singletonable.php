<?php

namespace MyPlugin\WP\Traits;

/**
 * Trait Singletonable
 * @package MyPlugin\WP\Traits
 */
trait Singletonable
{
    protected static $instance;

    final public static function getInstance(...$args)
    {
        return isset(static::$instance)
            ? static::$instance
            : static::$instance = new static(...$args);
    }

    final private function __construct($args = null)
    {
    }

    final private function __clone()
    {
        // if exist woocommerce plugin
        // wc_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'woocommerce'), '2.1');
    }

    public function __wakeup()
    {
        // if exist woocommerce plugin
        // wc_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'woocommerce'), '2.1');
    }
}