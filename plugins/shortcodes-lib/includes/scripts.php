<?php
/**
 * This file loads the CSS and JS necessary for your shortcodes display
 * @package Shortcodes library Plugin
 */
if( !function_exists ('my_shortcodes_scripts') ) :
	function my_shortcodes_scripts() {
		wp_enqueue_script('jquery');
		wp_register_script( 'my_tabs', plugin_dir_url( __FILE__ ) . 'js/my_tabs.js', array ( 'jquery', 'jquery-ui-tabs'), '1.0', true );
		wp_register_script( 'my_toggle', plugin_dir_url( __FILE__ ) . 'js/my_toggle.js', 'jquery', '1.0', true );
		wp_register_script( 'my_accordion', plugin_dir_url( __FILE__ ) . 'js/my_accordion.js', array ( 'jquery', 'jquery-ui-accordion'), '1.0', true );
		wp_enqueue_style('my_shortcode_styles', plugin_dir_url( __FILE__ ) . 'css/my_shortcodes_styles.css');
		
		// added v1.1
		wp_register_script('my_googlemap',  plugin_dir_url( __FILE__ ) . 'js/my_googlemap.js', array('jquery'), '', true);
		wp_register_script('my_googlemap_api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), '', true);
        
		wp_register_script('my_gotop',  plugin_dir_url( __FILE__ ) . 'js/my_gotop.js', array('jquery'), '', true);
	}
	add_action('wp_enqueue_scripts', 'my_shortcodes_scripts');
endif;