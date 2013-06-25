<?php
/*
 * This file has all the main shortcode functions
 * @package Shortcodes library Plugin
 */


/*
 * Fix Shortcodes
 */
if( !function_exists('my_fix_shortcodes') ) {
	function my_fix_shortcodes($content){   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'my_fix_shortcodes');
}


/*
 * Clear Floats
 */
if( !function_exists('my_clear_floats_shortcode') ) {
	function my_clear_floats_shortcode() {
	   return '<div class="my-clear-floats"></div>';
	}
	add_shortcode( 'my_clear_floats', 'my_clear_floats_shortcode' );
}


/*
 * Spacing
 */
if( !function_exists('my_spacing_shortcode') ) {
	function my_spacing_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'size' => '20px',
		  ),
		  $atts ) );
	 return '<span class="my-spacing" style="height: '. $size .'"></span>';
	}
	add_shortcode( 'my_spacing', 'my_spacing_shortcode' );
}


/*
 * Divider
 */
if( !function_exists('my_divider_shortcode') ) {
	function my_divider_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'style' => 'solid',
			'margin_top' => '20px',
			'margin_bottom' => '20px',
			'gotop' => '',
			'cleardivider' => 'both',
		  ),
		  $atts ) );
		
		$output = '<hr class="my-divider '. $style .'" '.$style_attr.' style="';
			if ( $margin_top ) {
				$output .= 'margin-top:'. $margin_top .';';
			}
			if( $margin_bottom ) {
				$output .= 'margin-bottom:'. $margin_bottom .';';
			}
			if( $cleardivider ) {
				$output .= 'clear:'. $cleardivider .';';
			}
		$output .= '" />';
		if ( $gotop == '1' ) {  
			// load scripts
			wp_enqueue_script('my_gotop');
			$output .= '<a class="my-gotop" href="#my_gotop" title="' . __('Top page', 'shortcodes_lib') . '">' . __('Top', 'shortcodes_lib') . '</a>';
		}
		$output .= '';
		
		return $output;
	}
	add_shortcode( 'my_divider', 'my_divider_shortcode' );
}


/**
* Social Icons
* @since 1.0
*/
if( !function_exists('my_social_shortcode') ) {
	function my_social_shortcode( $atts ){   
		extract( shortcode_atts( array(
			'icon' => 'twitter',
			'url' => 'http://www.twitter.com/sympleplorer',
			'title' => 'Follow Us',
			'target' => 'self',
			'rel' => '',
			'border_radius' => ''
		), $atts ) );
		
		return '<a href="' . $url . '" class="my-social-icon" target="_'.$target.'" title="'. $title .'" rel="'. $rel .'"
><img src="'. plugin_dir_url( __FILE__ ) .'/images/social/'. $icon .'.png" alt="'. $icon .'" /></a>';
	}
	add_shortcode('my_social', 'my_social_shortcode');
}


/**
* Highlights
* @since 1.0
*/
if ( !function_exists( 'my_highlight_shortcode' ) ) {
	function my_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'yellow',
		  ),
		  $atts ) );
		  return '<span class="my-highlight my-highlight-'. $color .'">' . do_shortcode( $content ) . '</span>';
	
	}
	add_shortcode('my_highlight', 'my_highlight_shortcode');
}


/*
 * Buttons
 */
if( !function_exists('my_button_shortcode') ) {
	function my_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'blue',
			'url' => 'http://www.sympleplorer.com',
			'title' => 'Visit Site',
			'target' => '_self',
			'rel' => '',
			'border_radius' => '4px'
		), $atts ) );
		
		$border_radius_style = ( $border_radius ) ? 'style="border-radius:'. $border_radius .'"' : NULL;
		
		return '<a href="' . $url . '" class="my-button ' . $color . '" target="_'.$target.'" title="'. $title .'" '. $border_radius_style .' rel="'.$rel.'"><span class="my-button-inner" '.$border_radius_style.'>' . $content . '</span></a>';
	}
	add_shortcode('my_button', 'my_button_shortcode');
}


/*
 * Boxes
 */
if( !function_exists('my_box_shortcode') ) { 
	function my_box_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'gray',
			'float' => 'center',
			'text_align' => 'left',
			'width' => '100%'
		  ), $atts ) );
		  $alert_content = '';
		  $alert_content .= '<div class="my-box ' . $color . ' '.$float.'" style="text-align:'. $text_align .'; width:'. $width .';">';
		  $alert_content .= ' '. do_shortcode($content) .'</div>';
		  return $alert_content;
	}
	add_shortcode('my_box', 'my_box_shortcode');
}


/*
 * Testimonial
 */
if( !function_exists('my_testimonial_shortcode') ) { 
	function my_testimonial_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'by' => ''
		  ), $atts ) );
		$testimonial_content = '';
		$testimonial_content .= '<div class="my-testimonial"><div class="my-testimonial-content">';
		$testimonial_content .= $content;
		$testimonial_content .= '</div><div class="my-testimonial-author">';
		$testimonial_content .= $by .'</div></div>';	
		return $testimonial_content;
	}
	add_shortcode( 'my_testimonial', 'my_testimonial_shortcode' );
}


/*
 * Columns
 */
if( !function_exists('my_column_shortcode') ) {
	function my_column_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'size' => 'one-third',
			'position' =>'first'
		  ), $atts ) );
		  return '<div class="my-' . $size . ' my-column-'.$position.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('my_column', 'my_column_shortcode');
}


/*
 * Toggle
 */
if( !function_exists('my_toggle_shortcode') ) {
	function my_toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array( 'title' => 'Toggle Title' ), $atts ) );
		 
		// Enque scripts
		wp_enqueue_script('my_toggle');
		
		// Display the Toggle
		return '<div class="my-toggle"><h3 class="my-toggle-trigger">'. $title .'</h3><div class="my-toggle-container">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('my_toggle', 'my_toggle_shortcode');
}


/*
 * Accordion
 */


// Main
if( !function_exists('my_accordion_main_shortcode') ) {
	function my_accordion_main_shortcode( $atts, $content = null  ) {
		
		// Enque scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('my_accordion');
		
		// Display the accordion	
		return '<div class="my-accordion">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'my_accordion', 'my_accordion_main_shortcode' );
}


// Section
if( !function_exists('my_accordion_section_shortcode') ) {
	function my_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
		  'title' => 'Title',
		), $atts ) );
		  
	   return '<h3 class="my-accordion-trigger"><a href="#">'. $title .'</a></h3><div>' . do_shortcode($content) . '</div>';
	}
	
	add_shortcode( 'my_accordion_section', 'my_accordion_section_shortcode' );
}


/*
 * Tabs
 */
if (!function_exists('my_tabgroup_shortcode')) {
	function my_tabgroup_shortcode( $atts, $content = null ) {
		
		//Enque scripts
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('my_tabs');
		
		// Display Tabs
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		$output = '';
		if( count($tab_titles) ){
		    $output .= '<div id="my-tab-'. rand(1, 100) .'" class="my-tabs">';
			$output .= '<ul class="ui-tabs-nav my-clearfix">';
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#my-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		return $output;
	}
	add_shortcode( 'my_tabgroup', 'my_tabgroup_shortcode' );
}
if (!function_exists('my_tab_shortcode')) {
	function my_tab_shortcode( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		return '<div id="my-tab-'. sanitize_title( $title ) .'" class="tab-content">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'my_tab', 'my_tab_shortcode' );
}


/*
 * Pricing Table
 */


/*main*/
if( !function_exists('my_pricing_table_shortcode') ) {
	function my_pricing_table_shortcode( $atts, $content = null  ) {
	   return '<div class="my-pricing-table">' . do_shortcode($content) . '</div><div class="my-clear-floats"></div>';
	}
	add_shortcode( 'my_pricing_table', 'my_pricing_table_shortcode' );
}


/*section*/
if( !function_exists('my_pricing_shortcode') ) {
	function my_pricing_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(
			'size' => 'one-half',
			'position' => '',
			'featured' => 'no',
			'plan' => 'Basic',
			'cost' => '$20',
			'per' => 'month',
			'button_url' => '',
			'button_text' => 'Purchase',
			'button_color' => 'blue',
			'button_target' => 'self',
			'button_rel' => 'nofollow',
			'button_border_radius' => ''
		), $atts ) );
		
		//set variables
		$featured_pricing = ( $featured == 'yes' ) ? 'featured' : NULL;
		$border_radius_style = ( $button_border_radius ) ? 'style="border-radius:'. $button_border_radius .'"' : NULL;
		
		//start content  
		$pricing_content ='';
		$pricing_content .= '<div class="my-pricing my-'. $size .' '. $featured_pricing .' my-column-'. $position. '">';
			$pricing_content .= '<div class="my-pricing-header">';
				$pricing_content .= '<h5>'. $plan. '</h5>';
				$pricing_content .= '<div class="my-pricing-cost">'. $cost .'</div><div class="my-pricing-per">'. $per .'</div>';
			$pricing_content .= '</div>';
			$pricing_content .= '<div class="my-pricing-content">';
				$pricing_content .= ''. $content. '';
			$pricing_content .= '</div>';
			if( $button_url ) {
				$pricing_content .= '<div class="my-pricing-button"><a href="'. $button_url .'" class="my-button '. $button_color .'" target="_'. $button_target .'" rel="'. $button_rel .'" '. $border_radius_style .'><span class="my-button-inner" '. $border_radius_style .'>'. $button_text .'</span></a></div>';
			}
		$pricing_content .= '</div>';  
		return $pricing_content;
	}
	
	add_shortcode( 'my_pricing', 'my_pricing_shortcode' );
}


/************************
 *
 * Version 1.1 Additions
 *
*************************/


/*
 * Heading
 */
if( !function_exists('my_heading_shortcode') ) {
	function my_heading_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'title' => 'Sample Heading',
			'heading_type' => 'h2',
			'margin_top' => '',
			'margin_bottom' => '',
			'text_align' => 'center'
		  ),
		  $atts ) );
		  
		$style_attr = '';
		if ( $margin_top && $margin_bottom ) {  
			$style_attr = 'style="margin-top: '. $margin_top .';margin-bottom: '. $margin_bottom .';"';
		} elseif( $margin_bottom ) {
			$style_attr = 'style="margin-bottom: '. $margin_bottom .';"';
		} elseif ( $margin_top ) {
			$style_attr = 'style="margin-top: '. $margin_top .';"';
		} else {
			$style_attr = NULL;
		}
	 	return '<'.$type.' class="my-heading text-align-'. $text_align .'" '.$style_attr.'><span>'. $title .'</span></'.$heading_type.'>';
	}
	add_shortcode( 'my_heading', 'my_heading_shortcode' );
}


/*
 * Google Maps
 */
if (! function_exists( 'my_shortcode_googlemaps' ) ) :
	function my_shortcode_googlemaps($atts, $content = null) {
		
		extract(shortcode_atts(array(
				"title" => '',
				"location" => '',
				"width" => '', //leave width blank for responsive designs
				"height" => '300',
				"zoom" => 8,
				"align" => '',
		), $atts));
		
		// load scripts
		wp_enqueue_script('my_googlemap');
		wp_enqueue_script('my_googlemap_api');
		
		
		$output = '<div id="map_canvas_'.rand(1, 100).'" class="googlemap" style="height:'.$height.'px;width:100%">';
			$output .= (!empty($title)) ? '<input class="title" type="hidden" value="'.$title.'" />' : '';
			$output .= '<input class="location" type="hidden" value="'.$location.'" />';
			$output .= '<input class="zoom" type="hidden" value="'.$zoom.'" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div>';
		
		return $output;
	   
	}
	add_shortcode("my_googlemap", "my_shortcode_googlemaps");
endif;


/*
 * Iframe
 */
if (! function_exists( 'my_shortcode_iframe' ) ) :
// [my_iframe width="50%" height="100%" frameborder="0" scrolling="auto" class="my_iframe_full"]http://www.business-geografic.com/[/my_iframe]
	function my_shortcode_iframe( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'iframe_width' 		=> '100%',
			'iframe_height' 		=> '480',
			'iframe_frameborder'	=> '0',
			'iframe_scrolling'		=> 'auto',
			'iframe_class'			=> '',
		), $atts));
		
			if( $iframe_height == "100%" ){
				$iframe_height = "480";
				$out .= '
					<script type="text/javascript">
					// auto resize .my_iframe height
					function iframeResizer(){
						//jQuery(".my_iframe").height(jQuery(".my_iframe").contents().find("html")[0].scrollHeight + 25); 
                        jQuery(".my_iframe").height(jQuery(".my_iframe").contents().find("body").height()); 
					}
					jQuery(document).ready(function() {
						jQuery(".my_iframe").load(function() {
						   iframeResizer(); 
						});
					});
					</script>
					';
			}// if $auto = 1
			$out .= '<iframe';
			$out .= ' class="my_iframe '.$iframe_class.'"';
			$out .= ' src="';
			$out .= do_shortcode($content);
			$out .= '" width="'.$iframe_width.'" height="'.$iframe_height.'" frameborder="'.$iframe_frameborder.'" scrolling="'.$iframe_scrolling.'">'.__( 'Iframe content', 'mytheme' ).'</iframe>';
		
		return $out;
	}
	add_shortcode('my_iframe', 'my_shortcode_iframe');
endif;
