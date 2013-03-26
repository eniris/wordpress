<?php
/**
 * This file has all the main shortcode functions
 * @package Shortcodes library Plugin
 */
 

// Add shortcode selection box
add_action('media_buttons','my_select',11);
function my_select(){
	global $shortcode_tags;
	
	$html = '&nbsp;';
	$html .= '<a onclick="return false;" id="shortcodes-libs" title="' . __('Shortcodes library', 'shortcodes_lib') . '" class="thickbox" href="'.PLUGIN_DIR_URL.'my-shortcode-list.php?TB_iframe=1&width=640&height=307">';
    $html .= '<img src="'.PLUGIN_DIR_URL.'images/icon.png" alt="Insert Shortcode" />';
    $html .= '</a>';
	/*
	$html .= '&nbsp;';
	$html .= '<select id="my_select">';
		$html .= '<option>--Shortcodes--</option>';
	
		//-- Spacing
		// Size = (pixels or percentage)
		$html .= '<option value=\'';
			$html .= '[my_spacing size="40px"]';
		$html .= '\'>' . __('Spacing', 'shortcodes_lib') . '</option>';
		
        //-- Clear Floats
		$html .= '<option value=\'';
			$html .= '[my_clear_floats]';
		$html .= '\'>' . __('Clear Floats', 'shortcodes_lib') . '</option>';
		
        //-- Divider
		$html .= '<option value=\'';
			$html .= '[my_divider style="solid" margin_top="20px" margin_bottom="20px"]';
		$html .= '\'>' . __('Divider', 'shortcodes_lib') . '</option>';
		
        //-- Google Map
		$html .= '<option value=\'';
			$html .= '[my_googlemap title="Envato Office" location="2 Elizabeth St, Melbourne Victoria 3000 Australia" zoom="10" height=250]';
		$html .= '\'>' . __('Google Map', 'shortcodes_lib') . '</option>';
		
        //-- Heading
		$html .= '<option value=\'';
			$html .= '[my_heading type="h2" title="This is my title" margin_top="20px;" margin_bottom="20px" text_align="left"]';
		$html .= '\'>' . __('Heading', 'shortcodes_lib') . '</option>';
		
        //-- Highlight
		// color =yellow, blue, red, green
		$html .= '<option value=\'';
			$html .= '[my_highlight color="yellow"]highlighted text[/my_highlight]';
		$html .= '\'>' . __('Highlight', 'shortcodes_lib') . '</option>';
		
        //-- Tabs
		// title = text string
		$html .= '<option value=\'';
			$html .= '[my_tabgroup]<br />[my_tab title="First Tab"]<br />First tab content<br />[/my_tab]<br />[my_tab title="Second Tab"]<br />Third Tab Content.<br />[/my_tab]<br />[/my_tabgroup]';
		$html .= '\'>' . __('Tabs', 'shortcodes_lib') . '</option>';
		
        //-- Toggle
		// title = text string
		$html .= '<option value=\'';
			$html .= '[my_toggle title="This Is Your Toggle Title"]Your Toggle Content[/my_toggle]';
		$html .= '\'>' . __('Toggle', 'shortcodes_lib') . '</option>';
		
        //-- Accordion
		// title = text string
		$html .= '<option value=\'';
			$html .= '[my_accordion]<br />[my_accordion_section title="Section 1"]<br />Accordion Content<br />[/my_accordion_section]<br />[my_accordion_section title="Section 2"]<br />Accordion Content<br />[/my_accordion_section]<br />[/my_accordion]';
		$html .= '\'>' . __('Accordion', 'shortcodes_lib') . '</option>';
		
        //-- Button
		// color = black, red, orange, blue, pink, rosy, green, brown, purple, gold, teal
		// url = http://www.google.com
		// title = this is the link title value
		// target = blank, self
		// border_radius = any pixel value –  use 99px for pill-shaped buttons
		$html .= '<option value=\'';
			$html .= '[my_button color="blue" url="http://www.google.com" title="Visit Site" target="blank" border_radius=""]Button Text[/my_button]';
		$html .= '\'>' . __('Button', 'shortcodes_lib') . '</option>';
		
        //-- Box
		// color = gray, green, yellow, blue, red
		$html .= '<optgroup label="' . __('Box', 'shortcodes_lib') . '">';
			
			// gray
			$html .= '<option value=\'';
				$html .= '[my_box color="gray" text_align="left" width="100%" float="none"]<br />Box gray Content<br />[/my_box]';
			$html .= '\'>' . __('gray', 'shortcodes_lib') . '</option>';
			
			// green
			$html .= '<option value=\'';
				$html .= '[my_box color="green" text_align="left" width="100%" float="none"]<br />Box green Content<br />[/my_box]';
			$html .= '\'>' . __('green', 'shortcodes_lib') . '</option>';
			
			// yellow
			$html .= '<option value=\'';
				$html .= '[my_box color="yellow" text_align="left" width="100%" float="none"]<br />Box Yellow Content<br />[/my_box]';
			$html .= '\'>' . __('yellow', 'shortcodes_lib') . '</option>';
			
			// blue
			$html .= '<option value=\'';
				$html .= '[my_box color="blue" text_align="left" width="100%" float="none"]<br />Box blue Content<br />[/my_box]';
			$html .= '\'>' . __('blue', 'shortcodes_lib') . '</option>';
			
			// red
			$html .= '<option value=\'';
				$html .= '[my_box color="red" text_align="left" width="100%" float="none"]<br />Box red Content<br />[/my_box]';
			$html .= '\'>' . __('red', 'shortcodes_lib') . '</option>';
			
		$html .= '</optgroup>';
		
        //-- Column
		// size = one-half, one-third, two-third, one-fourth, three-fourth, one-fift, two-fifth, one-sixth, five-sixth.
		// position = self, last
		$html .= '<optgroup label="' . __('Column', 'shortcodes_lib') . '">';
		
			// 1/2
			$html .= '<option value=\'';
				$html .= '[my_column size="one-half" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/2', 'shortcodes_lib') . '</option>';
			// 1/2 last
			$html .= '<option value=\'';
				$html .= '[my_column size="one-half" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/2 last', 'shortcodes_lib') . '</option>';
			
			// 1/3
			$html .= '<option value=\'';
				$html .= '[my_column size="one-third" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/3', 'shortcodes_lib') . '</option>';
			// 1/3 last
			$html .= '<option value=\'';
				$html .= '[my_column size="one-third" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/3 last', 'shortcodes_lib') . '</option>';
			
			// 2/3
			$html .= '<option value=\'';
				$html .= '[my_column size="two-third" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('2/3', 'shortcodes_lib') . '</option>';
			// 2/3 last
			$html .= '<option value=\'';
				$html .= '[my_column size="two-third" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('2/3 last', 'shortcodes_lib') . '</option>';
		
			// 1/4
			$html .= '<option value=\'';
				$html .= '[my_column size="one-fourth" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/4', 'shortcodes_lib') . '</option>';
			// 1/4 last
			$html .= '<option value=\'';
				$html .= '[my_column size="one-fourth" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/4 last', 'shortcodes_lib') . '</option>';
		
			// 3/4
			$html .= '<option value=\'';
				$html .= '[my_column size="three-fourth" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('3/4', 'shortcodes_lib') . '</option>';
			// 3/4 last
			$html .= '<option value=\'';
				$html .= '[my_column size="three-fourth" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('3/4 last', 'shortcodes_lib') . '</option>';
		
			// 1/5
			$html .= '<option value=\'';
				$html .= '[my_column size="one-fift" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/5', 'shortcodes_lib') . '</option>';
			// 1/5 last
			$html .= '<option value=\'';
				$html .= '[my_column size="one-fift" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/5 last', 'shortcodes_lib') . '</option>';
			
			// 2/5
			$html .= '<option value=\'';
				$html .= '[my_column size="two-fift" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('2/5', 'shortcodes_lib') . '</option>';
			// 2/5 last
			$html .= '<option value=\'';
				$html .= '[my_column size="two-fift" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('2/5 last', 'shortcodes_lib') . '</option>';
		
			// 1/6
			$html .= '<option value=\'';
				$html .= '[my_column size="one-sixth" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/6', 'shortcodes_lib') . '</option>';
			// 1/6 last
			$html .= '<option value=\'';
				$html .= '[my_column size="one-sixth" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('1/6 last', 'shortcodes_lib') . '</option>';
			
			// 5/6
			$html .= '<option value=\'';
				$html .= '[my_column size="five-sixth" position="self"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('5/6', 'shortcodes_lib') . '</option>';
			// 5/6 last
			$html .= '<option value=\'';
				$html .= '[my_column size="five-sixth" position="last"]<br />Content<br />[/my_column]';
			$html .= '\'>' . __('5/6 last', 'shortcodes_lib') . '</option>';
			
		$html .= '</optgroup>';
		
        //-- Social
		$html .= '<option value=\'';
			$html .= '[my_social icon="twitter" url="http://www.twitter.com/johndoe" title="Follow Us" target="self" rel=""]';
		$html .= '\'>' . __('Social', 'shortcodes_lib') . '</option>';
		
        //-- Testimonial
		// by = name of person who said the testimonial
		$html .= '<option value=\'';
			$html .= '[my_testimonial by="John Doe"]Your testimonial[/my_testimonial]';
		$html .= '\'>' . __('Testimonial', 'shortcodes_lib') . '</option>';
		
        //-- Pricing
		// size = one-half, one-third, two-third, one-fourth, three-fourth, one-fift, two-fifth, one-sixth, five-sixth.
		// position = last (use position=”last” on the last pricing column this prevents it from going under the other)
		// plan = text
		// cost = text
		// per = text(example: per month)
		// button_url = http://www.google.com
		// button_text = text
		// button_color = black, red, orange, blue, pink, rosy, green, brown, purple, gold, teal
		// button_border_radius = any pixel value –  use 99px for pill-shaped buttons
		// button_target = blank, self
		// button_rel = nofollow, follow, etc
		// featured = yes, no
		$html .= '<option value=\'';
			$html .= '[my_pricing_table]<br />[my_pricing size="one-half" plan="Basic" cost="$19.99" per="per month" button_url="#" button_text="Sign Up" button_color="gold" button_border_radius="" button_target="self" button_rel="nofollow" position=""]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/my_pricing]<br />[/my_pricing_table]';
		$html .= '\'>' . __('Pricing', 'shortcodes_lib') . '</option>';
		
	$html .= '</select>';
	*/

		/*
		$html .= '<option value=\'';
			$html .= '';
		$html .= '\'>' . __('', 'shortcodes_lib') . '</option>';
		*/
	echo $html;
}

add_action('admin_head', 'my_button_js');
function my_button_js() {
	echo '<script type="text/javascript">
	jQuery(document).ready(function(){
	   jQuery("#my_select").change(function() {
			  send_to_editor(jQuery("#my_select :selected").val());
        		  return false;
		});
	});
	</script>';
}
?>