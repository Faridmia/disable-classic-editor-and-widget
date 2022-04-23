<?php
/*
Plugin Name: Disable Classic Editor and Widget
Plugin URI: https://github.com/Faridmia/disable-classic-editor-and-widget
Description: This plugin disables the Gutenberg Editor and Gutenberg widget block.
Version: 1.0.0
Author: faridmia
Author URI: https://profiles.wordpress.org/faridmia/
License: GPLv2 or later
Text Domain: disable-classic-editor-and-widget
 */
if (!defined('ABSPATH')) {
	exit;
}

define( 'DISABLE_CEAW', '1.0.0' );
define('DISABLE_CEAW_URL', plugin_dir_url(__FILE__));
define( 'DISABLE_CEAW_PLUGIN_ROOT', __FILE__ );
define( 'DISABLE_CEAW_PLUGIN_URL', plugins_url( '/', DISABLE_CEAW_PLUGIN_ROOT ) );
define( 'DISABLE_CEAW_PLUGIN_PATH', plugin_dir_path( DISABLE_CEAW_PLUGIN_ROOT ) );
define( 'DISABLE_CEAW_PLUGIN_BASE', plugin_basename( DISABLE_CEAW_PLUGIN_ROOT ) );


if( is_admin()) {

    add_filter( 'use_widgets_block_editor', '__return_false' );

    add_filter("use_block_editor_for_post_type", "disable_ceaw_classic_editor");

    function disable_ceaw_classic_editor()
    {
        return false;
    }
}

/**
 * Initialize the plugin
 *
 * @return void
 */
function disable_block_widget_editor_init_plugin() {
    load_plugin_textdomain( 'disable-classic-editor-and-widget', false, basename( dirname( DISABLE_CEAW_PLUGIN_ROOT ) ) . '/languages' );

}

add_action( 'plugins_loaded', 'disable_block_widget_editor_init_plugin');




