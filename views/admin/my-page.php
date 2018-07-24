<?php
/**
 * Admin View: Settings
 *
 * @package WooCommerce
 */

if (!defined('ABSPATH')) {
    exit;
}

use \MyPlugin\WP\Admin\AddMyPage;

?>

<div class="wrap">
    <h1>
        <?php _e('My plugin configuration', 'wp-my-plugin'); ?>
    </h1>

    <form method="post" action="options.php">
        <?php settings_fields(AddMyPage::OPTION_GROUP_NAME); ?>
        <?php do_settings_sections(AddMyPage::OPTION_GROUP_NAME); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e('Option one', 'wp-my-plugin') ?>
                </th>

                <td>
                    <input type="text"
                           name="option_one"
                           value="<?php echo esc_attr(get_option('option_one')); ?>"/>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <?php _e('Option two', 'wp-my-plugin') ?>
                </th>

                <td>
                    <input type="password"
                           class="regular-input"
                           name="<?php echo AddMyPage::OPTION_TWO ?>"
                           value="<?php echo esc_attr(get_option(AddMyPage::OPTION_TWO)); ?>"/>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>
