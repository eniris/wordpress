<?php
/*
Plugin Name: Shortcodes Lib
Plugin URI: http://www.wordpress.com/plugin
Description: A free shortcodes plugin, based to shortcoder-insert-tool and symple-shortcodes plugins
Author: Benoit S.
Version: 1.0
*/

// 
$plugin_dir_path = dirname(__FILE__);
define('PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_DIR_URL', plugin_dir_url(__FILE__));

// Include functions
require_once( $plugin_dir_path . '/includes/shortcode-editor-select.php' ); // Add selector to post/page editor
require_once( $plugin_dir_path . '/includes/scripts.php' ); // Adds plugin JS and CSS
require_once( $plugin_dir_path . '/includes/shortcode-functions.php'); // Main shortcode functions

// load languages files
load_plugin_textdomain( 'shortcodes_lib' , false , dirname( plugin_basename( __FILE__ ) ) . '/languages/');

?>