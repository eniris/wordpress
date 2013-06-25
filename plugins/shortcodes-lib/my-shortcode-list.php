<?php
if ( ! isset( $_GET['inline'] ) )
	define( 'IFRAME_REQUEST' , true );

/** Load WordPress Administration Bootstrap */
require_once('../../../wp-admin/admin.php');
?><!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <title>Shortcode Builder</title>
        <link media="all" type="text/css" href="<?php echo get_admin_url(); ?>load-styles.php?c=1&dir=ltr&load=wp-admin,media&ver=3.4-RC1" rel="stylesheet">
        <link id="colors-css" media="all" type="text/css" href="<?php echo get_admin_url(); ?>css/colors-fresh.css" rel="stylesheet">
        <link media="all" type="text/css" href="<?php echo plugin_dir_url(__FILE__); ?>styles/core.css" rel="stylesheet">
        <link media="all" type="text/css" href="<?php echo plugin_dir_url(__FILE__); ?>styles/panel.css" rel="stylesheet">
        <script type='text/javascript' src='<?php echo get_admin_url(); ?>load-scripts.php?c=1&amp;load=jquery,utils'></script>
    </head>
    <body>
		<div class="toolbar">
            <?php _e('Select ','shortcodes_lib'); ?>
			<select id="my_selectedelement" style="width:190px;" onchange="shortcodeItem();">
				<option selected="selected"><?php _e('--Plugin shortcodes--', 'shortcodes_lib') ?></option>
				<option value='my_clear_floats'><?php _e('Clear Floats', 'shortcodes_lib') ?></option>
				<option value='my_divider'><?php _e('Divider', 'shortcodes_lib') ?></option>
				<option value='my_spacing'><?php _e('Spacing', 'shortcodes_lib') ?></option>
				<option value='my_googlemap'><?php _e('Google Map', 'shortcodes_lib') ?></option>
				<option value='my_heading'><?php _e('Heading', 'shortcodes_lib') ?></option>
				<option value='my_highlight'><?php _e('Highlight', 'shortcodes_lib') ?></option>
				<option value='my_tabgroup'><?php _e('Tabs', 'shortcodes_lib') ?></option>
				<option value='my_toggle'><?php _e('Toggle', 'shortcodes_lib') ?></option>
				<option value='my_accordion'><?php _e('Accordion', 'shortcodes_lib') ?></option>
				<option value='my_button'><?php _e('Button', 'shortcodes_lib') ?></option>
				<option value='my_box'><?php _e('Box', 'shortcodes_lib') ?></option>
				<option value='my_iframe'><?php _e('Iframe', 'shortcodes_lib') ?></option>
				<option value='my_column'><?php _e('Column', 'shortcodes_lib') ?></option>
				<option value='my_social'><?php _e('Social', 'shortcodes_lib') ?></option>
				<option value='my_testimonial'><?php _e('Testimonial', 'shortcodes_lib') ?></option>
				<option value='my_pricing_table'><?php _e('Pricing', 'shortcodes_lib') ?></option>
			</select>
			<?php _e('or','shortcodes_lib'); ?>
			<?php
			// Automatically create media_buttons for shortcode selection
			// source :  http://wpsnipp.com/index.php/functions-php/update-automatically-create-media_buttons-for-shortcode-selection/
			global $shortcode_tags;
			 /* ------------------------------------- */
			 /* enter names of shortcode to exclude bellow */
			 /* ------------------------------------- */
			$exclude = array(
				"caption",
				"wp_caption",
				"gallery",
				"embed",
				"my_clear_floats",
				"my_divider",
				"my_spacing",
				"my_googlemap",
				"my_heading",
				"my_highlight",
				"my_tabgroup", "my_tab",
				"my_toggle",
				"my_accordion", "my_accordion_section",
				"my_button",
				"my_column",
				"my_box",
				"my_iframe",
				"my_social",
				"my_testimonial",
				"my_pricing_table", "my_pricing",
			);
			
			echo '<select id="my_select" style="width:190px;"><option value="">' . __('--Other shortcodes--','shortcodes_lib') . '</option>';
			foreach ($shortcode_tags as $key => $val){
				if(!in_array($key,$exclude)){
					$shortcodes_list .= '<option value="['.$key.'][/'.$key.']">'.$key.'</option>';
					}
				}
			 echo $shortcodes_list;
			 echo '</select>';
			?>
            <div class="fbutton" style="float:right;">
                <a class="button" href="#insert_sc" onclick="sendMyCode();return false;">
                    <i class="icon-plus" style="margin-top:-1px;"></i><?php _e('Insert Shortcode','shortcodes_lib'); ?>
                </a>
            </div>
        </div>
        <div class="content" id="content">
			
			<div class="shortcode_item" id="my_spacing">
				<div class="shortcode_demo">[my_spacing size="40px"]</div>
				<input type="hidden" id="shortcodetype" value="1">
				<input type="hidden" id="shortcodecontent" value="">
				<div class="attr">
					<span class="label"><?php _e('Size', 'shortcodes_lib') ?></span>
					<input type="text" value="40px" id="size" class="attrVal">
					<span class="description"><?php _e('Height space (in pixels)', 'shortcodes_lib') ?></span>
				</div>
			</div><!-- //#my_spacing -->
			
			<div class="shortcode_item" id="my_clear_floats">
				<div class="shortcode_demo">[my_clear_floats]</div>
				<input type="hidden" id="shortcodetype" value="1">
				<input type="hidden" id="shortcodecontent" value="">
				<div class="more_info"><?php _e('No more informations or attributes...','shortcodes_lib'); ?></div>
			</div><!-- //#my_clear_floats -->
			
			<div class="shortcode_item" id="my_divider">
				<div class="shortcode_demo">[my_divider style="solid" margin_top="20px" margin_bottom="20px" cleardivider="both" gotop="0"]</div>
				<input type="hidden" id="shortcodetype" value="1">
				<input type="hidden" id="shortcodecontent" value="">
				<div class="attr">
					<span class="label"><?php _e('Style', 'shortcodes_lib') ?></span>
					<select id="style" class="attrVal">
						<option value="solid"><?php _e('solid', 'shortcodes_lib') ?></option>
						<option value="dashed"><?php _e('dashed', 'shortcodes_lib') ?></option>
						<option value="dotted"><?php _e('dotted', 'shortcodes_lib') ?></option>
						<option value="double"><?php _e('double', 'shortcodes_lib') ?></option>
						<option value="fadeout"><?php _e('fadeout', 'shortcodes_lib') ?></option>
						<option value="fadein"><?php _e('fadein', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Margin top', 'shortcodes_lib') ?></span>
					<input type="text" id="margin_top" class="attrVal" value="20px">
					<span class="description"><?php _e('(in pixels)', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Margin bottom', 'shortcodes_lib') ?></span>
					<input type="text" id="margin_bottom" class="attrVal" value="20px">
					<span class="description"><?php _e('(in pixels)', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Top link', 'shortcodes_lib') ?></span>
					<select id="gotop" class="attrVal">
						<option value="0"><?php _e('no', 'shortcodes_lib') ?></option>
						<option value="1"><?php _e('yes', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('(Show Top page link)', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Clear Floats', 'shortcodes_lib') ?></span>
					<select id="cleardivider" class="attrVal">
						<option value="both"><?php _e('both', 'shortcodes_lib') ?></option>
						<option value="left"><?php _e('left', 'shortcodes_lib') ?></option>
						<option value="right"><?php _e('right', 'shortcodes_lib') ?></option>
						<option value="none"><?php _e('none', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('(reset previous floats)', 'shortcodes_lib') ?></span>
				</div>
			</div><!-- //#my_divider -->
			
			<div class="shortcode_item" id="my_googlemap">
				<div class="shortcode_demo">[my_googlemap title="<?php _e('Champ de Mars, 5 Avenue Anatole France, 75007 Paris', 'shortcodes_lib') ?>" zoom="10" height="250"]</div>
				<input type="hidden" id="shortcodetype" value="1">
				<input type="hidden" id="shortcodecontent" value="">
				<div class="attr">
					<span class="label"><?php _e('Title', 'shortcodes_lib') ?></span>
					<input type="text" id="title" class="attrVal" value="<?php _e('Champ de Mars, 5 Avenue Anatole France, 75007 Paris', 'shortcodes_lib') ?>">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Zoom', 'shortcodes_lib') ?></span>
					<input type="text" id="zoom" class="attrVal" value="10">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Height', 'shortcodes_lib') ?></span>
					<input type="text" id="height" class="attrVal" value="250">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
			</div><!-- //#my_googlemap -->
			
			<div class="shortcode_item" id="my_heading">
				<div class="shortcode_demo">[my_heading type="h2" title="<?php _e('This is my title', 'shortcodes_lib') ?>" margin_top="20px" margin_bottom="20px" text_align="left"]</div>
				<input type="hidden" id="shortcodetype" value="1">
				<input type="hidden" id="shortcodecontent" value="">
				<div class="attr">
					<span class="label"><?php _e('Type', 'shortcodes_lib') ?></span>
					<select id="type" class="attrVal">
						<option value="h1">h1</option>
						<option value="h2" selected="selected">h2</option>
						<option value="h3">h3</option>
						<option value="h4">h4</option>
						<option value="h5">h5</option>
						<option value="h6">h6</option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Title', 'shortcodes_lib') ?></span>
					<input type="text" id="title" class="attrVal" value="<?php _e('This is my title', 'shortcodes_lib') ?>">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Margin top', 'shortcodes_lib') ?></span>
					<input type="text" id="margin_top" class="attrVal" value="20px">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Margin bottom', 'shortcodes_lib') ?></span>
					<input type="text" id="margin_bottom" class="attrVal" value="20px">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Text align', 'shortcodes_lib') ?></span>
					<select id="text_align" class="attrVal">
						<option value="left"><?php _e('left','shortcodes_lib'); ?></option>
						<option value="right"><?php _e('right','shortcodes_lib'); ?></option>
						<option value="center"><?php _e('center','shortcodes_lib'); ?></option>
					</select>
					<span class="description"><?php _e('','shortcodes_lib'); ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_heading -->
			
			<div class="shortcode_item" id="my_highlight">
				<div class="shortcode_demo">[my_highlight color="yellow"]<?php _e('highlighted text', 'shortcodes_lib') ?>[/my_highlight]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value="<?php _e('highlighted text', 'shortcodes_lib') ?>">
				<div class="attr">
					<span class="label"><?php _e('Color', 'shortcodes_lib') ?></span>
					<select id="color" class="attrVal">
						<option value="yellow"><?php _e('yellow', 'shortcodes_lib') ?></option>
						<option value="blue"><?php _e('blue', 'shortcodes_lib') ?></option>
						<option value="green"><?php _e('green', 'shortcodes_lib') ?></option>
						<option value="red"><?php _e('red', 'shortcodes_lib') ?></option>
						<option value="gray"><?php _e('gray', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('background color highlight', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_highlight -->
			
			<div class="shortcode_item" id="my_tabgroup">
				<div class="shortcode_demo">[my_tabgroup]<br />[my_tab title="<?php _e('First Tab title', 'shortcodes_lib') ?>"]<br /><?php _e('First tab content', 'shortcodes_lib') ?><br />[/my_tab]<br />[my_tab title="<?php _e('Second Tab title', 'shortcodes_lib') ?>"]<br /><?php _e('Second Tab Content.', 'shortcodes_lib') ?><br />[/my_tab]<br />[/my_tabgroup]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value='<br />[my_tab title="<?php _e('First Tab title', 'shortcodes_lib') ?>"]<br /><?php _e('First tab content', 'shortcodes_lib') ?><br />[/my_tab]<br />[my_tab title="<?php _e('Second Tab title', 'shortcodes_lib') ?>"]<br /><?php _e('Second Tab Content.', 'shortcodes_lib') ?><br />[/my_tab]<br />'>
				<div class="more_info"><?php _e('No more informations or attributes...','shortcodes_lib'); ?></div>
			</div><!-- //#my_tabgroup -->
			
			<div class="shortcode_item" id="my_toggle">
				<div class="shortcode_demo">[my_toggle title="<?php _e('This Is Your Toggle Title', 'shortcodes_lib') ?>"]<?php _e('Your Toggle Content', 'shortcodes_lib') ?>[/my_toggle]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value="<?php _e('Your Toggle Content', 'shortcodes_lib') ?>">
				<div class="attr">
					<span class="label"><?php _e('Title', 'shortcodes_lib') ?></span>
					<input type="text" id="title" class="attrVal" value="<?php _e('This Is Your Toggle Title', 'shortcodes_lib') ?>">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_toggle -->
			
			<div class="shortcode_item" id="my_accordion">
				<div class="shortcode_demo">[my_accordion]<br />[my_accordion_section title="<?php _e('Section 1', 'shortcodes_lib') ?>"]<br /><?php _e('Accordion Content', 'shortcodes_lib') ?><br />[/my_accordion_section]<br />[my_accordion_section title="<?php _e('Section 2', 'shortcodes_lib') ?>"]<br /><?php _e('Accordion Content', 'shortcodes_lib') ?><br />[/my_accordion_section]<br />[/my_accordion]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value='<br />[my_accordion_section title="<?php _e('Section 1', 'shortcodes_lib') ?>"]<br /><?php _e('Accordion Content', 'shortcodes_lib') ?><br />[/my_accordion_section]<br />[my_accordion_section title="<?php _e('Section 2', 'shortcodes_lib') ?>"]<br /><?php _e('Accordion Content', 'shortcodes_lib') ?><br />[/my_accordion_section]<br />'>
				<div class="more_info"><?php _e('No more informations or attributes...','shortcodes_lib'); ?></div>
			</div><!-- //#my_accordion -->
			
			<div class="shortcode_item" id="my_button">
				<div class="shortcode_demo">[my_button color="blue" url="http://www.google.com" title="<?php _e('Visit Site', 'shortcodes_lib') ?>" target="_blank" border_radius=""]<?php _e('Button Text', 'shortcodes_lib') ?>[/my_button]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value='<?php _e('Button Text', 'shortcodes_lib') ?>'>
				<div class="attr">
					<span class="label"><?php _e('Color', 'shortcodes_lib') ?></span>
					<select id="color" class="attrVal">
						<option value="green"><?php _e('green', 'shortcodes_lib') ?></option>
						<option value="black"><?php _e('black', 'shortcodes_lib') ?></option>
						<option value="red"><?php _e('red', 'shortcodes_lib') ?></option>
						<option value="orange"><?php _e('orange', 'shortcodes_lib') ?></option>
						<option value="blue"><?php _e('blue', 'shortcodes_lib') ?></option>
						<option value="rosy"><?php _e('rosy', 'shortcodes_lib') ?></option>
						<option value="pink"><?php _e('pink', 'shortcodes_lib') ?></option>
						<option value="brown"><?php _e('brown', 'shortcodes_lib') ?></option>
						<option value="purple"><?php _e('purple', 'shortcodes_lib') ?></option>
						<option value="gold"><?php _e('gold', 'shortcodes_lib') ?></option>
						<option value="teal"><?php _e('teal', 'shortcodes_lib') ?></option>
						<option value="navy"><?php _e('navy', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('URL', 'shortcodes_lib') ?></span>
					<input type="text" id="url" class="attrVal" value="http://www.google.com">
					<span class="description"><?php _e('with http://...', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Title', 'shortcodes_lib') ?></span>
					<input type="text" id="title" class="attrVal" value="<?php _e('Visit Site', 'shortcodes_lib') ?>">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Target', 'shortcodes_lib') ?></span>
					<select id="target" class="attrVal">
						<option value="_blank"><?php _e('_blank', 'shortcodes_lib') ?></option>
						<option value="_self"><?php _e('_self', 'shortcodes_lib') ?></option>
						<option value="_parent"><?php _e('_parent', 'shortcodes_lib') ?></option>
						<option value="_top"><?php _e('_top', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Border radius', 'shortcodes_lib') ?></span>
					<input type="text" id="border_radius" class="attrVal" value="">
					<span class="description"><?php _e('pixels (with unit)', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_button -->
			
			<div class="shortcode_item" id="my_box">
				<div class="shortcode_demo">[my_box color="gray" text_align="left" width="100%" float="none"]<br /><?php _e('Box gray Content', 'shortcodes_lib') ?><br />[/my_box]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value="<br /><?php _e('Box gray Content', 'shortcodes_lib') ?><br />">
				<div class="attr">
					<span class="label"><?php _e('Color', 'shortcodes_lib') ?></span>
					<select id="color" class="attrVal">
						<option value="gray"><?php _e('gray', 'shortcodes_lib') ?></option>
						<option value="green"><?php _e('green', 'shortcodes_lib') ?></option>
						<option value="yellow"><?php _e('yellow', 'shortcodes_lib') ?></option>
						<option value="blue"><?php _e('blue', 'shortcodes_lib') ?></option>
						<option value="red"><?php _e('red', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Text align', 'shortcodes_lib') ?></span>
					<select id="text_align" class="attrVal">
						<option value="left"><?php _e('left','shortcodes_lib'); ?></option>
						<option value="right"><?php _e('right','shortcodes_lib'); ?></option>
						<option value="center"><?php _e('center','shortcodes_lib'); ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Width', 'shortcodes_lib') ?></span>
					<input type="text" id="width" class="attrVal" value="100%">
					<span class="description"><?php _e('pixels or percent', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Float', 'shortcodes_lib') ?></span>
					<select id="float" class="attrVal">
						<option value="none"><?php _e('none','shortcodes_lib'); ?></option>
						<option value="left"><?php _e('left','shortcodes_lib'); ?></option>
						<option value="right"><?php _e('right','shortcodes_lib'); ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_box -->
			
			<div class="shortcode_item" id="my_iframe">
				<div class="shortcode_demo">
				[my_iframe width="50%" height="100%" frameborder="0" scrolling="auto" class=""]http://www.google.fr/[/my_iframe]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value="http://www.google.fr/">
				<div class="attr">
					<span class="label"><?php _e('Width', 'shortcodes_lib') ?></span>
					<input type="text" id="iframe_width" class="attrVal" value="100%">
					<span class="description"><?php _e('pixels or percent', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Height', 'shortcodes_lib') ?></span>
					<input type="text" id="iframe_height" class="attrVal" value="480">
					<span class="description"><?php _e('pixels or 100% for auto resize height', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Frame border', 'shortcodes_lib') ?></span>
					<select id="iframe_frameborder" class="attrVal">
						<option value="0"><?php _e('no', 'shortcodes_lib') ?></option>
						<option value="1"><?php _e('yes', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('(Show frame border)', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Scrolling', 'shortcodes_lib') ?></span>
					<select id="iframe_scrolling" class="attrVal">
						<option value="auto"><?php _e('auto','shortcodes_lib'); ?></option>
						<option value="no"><?php _e('no','shortcodes_lib'); ?></option>
						<option value="yes"><?php _e('yes','shortcodes_lib'); ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('class', 'shortcodes_lib') ?></span>
					<input type="text" id="iframe_class" class="attrVal" value="">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_iframe -->
			
			<div class="shortcode_item" id="my_column">
				<div class="shortcode_demo">[my_column size="one-half" position="self"]<br /><?php _e('Content', 'shortcodes_lib') ?><br />[/my_column]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value="">
				<div class="attr">
					<span class="label"><?php _e('Size', 'shortcodes_lib') ?></span>
					<select id="size" class="attrVal">
						<option value="one-half"><?php _e('one-half', 'shortcodes_lib') ?></option>
						<option value="one-third"><?php _e('one-third', 'shortcodes_lib') ?></option>
						<option value="two-third"><?php _e('two-third', 'shortcodes_lib') ?></option>
						<option value="one-fourth"><?php _e('one-fourth', 'shortcodes_lib') ?></option>
						<option value="three-fourth"><?php _e('three-fourth', 'shortcodes_lib') ?></option>
						<option value="one-fift"><?php _e('one-fift', 'shortcodes_lib') ?></option>
						<option value="two-fift"><?php _e('two-fift', 'shortcodes_lib') ?></option>
						<option value="one-sixth"><?php _e('one-sixth', 'shortcodes_lib') ?></option>
						<option value="five-sixth"><?php _e('five-sixth', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Position', 'shortcodes_lib') ?></span>
					<select id="position" class="attrVal">
						<option value="self"><?php _e('self', 'shortcodes_lib') ?></option>
						<option value="first"><?php _e('first', 'shortcodes_lib') ?></option>
						<option value="last"><?php _e('last', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_column -->
			
			<div class="shortcode_item" id="my_social">
				<div class="shortcode_demo">[my_social icon="twitter" url="http://www.twitter.com/johndoe" title="<?php _e('Follow Us', 'shortcodes_lib') ?>" target="_self" rel=""]</div>
				<input type="hidden" id="shortcodetype" value="1">
				<input type="hidden" id="shortcodecontent" value="">
				<div class="attr">
					<span class="label"><?php _e('Icon', 'shortcodes_lib') ?></span>
					<select id="icon" class="attrVal">
						<option value="twitter"><?php _e('twitter', 'shortcodes_lib') ?></option>
						<option value="facebook"><?php _e('facebook', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('URL', 'shortcodes_lib') ?></span>
					<input type="text" id="url" class="attrVal" value="http://www.twitter.com/johndoe">
					<span class="description"><?php _e('with http://...', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Title', 'shortcodes_lib') ?></span>
					<input type="text" id="title" class="attrVal" value="<?php _e('Follow Us', 'shortcodes_lib') ?>">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('Target', 'shortcodes_lib') ?></span>
					<select id="target" class="attrVal">
						<option value="_blank"><?php _e('_', 'shortcodes_lib') ?></option>
						<option value="_self"><?php _e('_self', 'shortcodes_lib') ?></option>
						<option value="_parent"><?php _e('_parent', 'shortcodes_lib') ?></option>
						<option value="_top"><?php _e('_top', 'shortcodes_lib') ?></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('rel', 'shortcodes_lib') ?></span>
					<input type="text" id="rel" class="attrVal" value="">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_social -->
			
			<div class="shortcode_item" id="my_testimonial">
				<div class="shortcode_demo">[my_testimonial by="John Doe"]<?php _e('Your testimonial', 'shortcodes_lib') ?>[/my_testimonial]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value="<?php _e('Your testimonial', 'shortcodes_lib') ?>">
				<div class="attr">
					<span class="label"><?php _e('Author', 'shortcodes_lib') ?></span>
					<input type="text" id="by" class="attrVal" value="John Doe">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //#my_testimonial -->
			
			<div class="shortcode_item" id="my_pricing_table">
				<div class="shortcode_demo">[my_pricing_table]<br />[my_pricing size="one-half" plan="<?php _e('Basic', 'shortcodes_lib') ?>" cost="<?php _e('$19.99', 'shortcodes_lib') ?>" per="<?php _e('per month', 'shortcodes_lib') ?>" button_url="#" button_text="<?php _e('Sign Up', 'shortcodes_lib') ?>" button_color="gold" button_border_radius="" button_target="_self" button_rel="nofollow" position=""]<br /><ul><li><?php _e('30GB Storage', 'shortcodes_lib') ?></li><li><?php _e('512MB Ram', 'shortcodes_lib') ?></li><li><?php _e('10 databases', 'shortcodes_lib') ?></li><li><?php _e('1,000 Emails', 'shortcodes_lib') ?></li><li><?php _e('25GB Bandwidth', 'shortcodes_lib') ?></li></ul>[/my_pricing]<br />[/my_pricing_table]</div>
				<input type="hidden" id="shortcodetype" value="2">
				<input type="hidden" id="shortcodecontent" value='<br />[my_pricing size="one-half" plan="<?php _e('Basic', 'shortcodes_lib') ?>" cost="<?php _e('$19.99', 'shortcodes_lib') ?>" per="<?php _e('per month', 'shortcodes_lib') ?>" button_url="#" button_text="<?php _e('Sign Up', 'shortcodes_lib') ?>" button_color="gold" button_border_radius="" button_target="_self" button_rel="nofollow" position=""]<br /><ul><li><?php _e('30GB Storage', 'shortcodes_lib') ?></li><li><?php _e('512MB Ram', 'shortcodes_lib') ?></li><li><?php _e('10 databases', 'shortcodes_lib') ?></li><li><?php _e('1,000 Emails', 'shortcodes_lib') ?></li><li><?php _e('25GB Bandwidth', 'shortcodes_lib') ?></li></ul>[/my_pricing]<br />'>
				<div class="more_info"><?php _e('No more informations or attributes...','shortcodes_lib'); ?></div>
			</div><!-- //#my_pricing_table -->
			
			<div class="shortcode_item" id="">
				<div class="shortcode_demo"></div>
				<input type="hidden" id="shortcodetype" value="1">
				<input type="hidden" id="shortcodecontent" value="">
				<div class="attr">
					<span class="label"><?php _e('', 'shortcodes_lib') ?></span>
					<input type="text" id="" class="attrVal" value="">
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="attr">
					<span class="label"><?php _e('', 'shortcodes_lib') ?></span>
					<select id="" class="attrVal">
						<option value=""></option>
					</select>
					<span class="description"><?php _e('', 'shortcodes_lib') ?></span>
				</div>
				<div class="more_info"><?php _e('','shortcodes_lib'); ?></div>
			</div><!-- //# -->
			
        </div>
        <div class="footer">

        </div>

        <script>
			// hide all shortcodes item
			jQuery('.shortcode_item').hide();
			
			// show selected shortcode item
            function shortcodeItem(){
				var my_selectedItem = jQuery('#my_selectedelement').val();
				
                jQuery('.shortcode_item').hide();
                jQuery('#'+my_selectedItem ).show();
            }
			
            function sendMyCode(){
				var my_selectedItem = jQuery('#my_selectedelement').val();
				
                if(jQuery('#my_selectedelement').length > 0){
                    if( my_selectedItem == ''){
                        return;
                    }
                    var shortcode = my_selectedItem;
                    var output = '['+shortcode+' ';
                    var ctype = '';
                    if(jQuery('#'+my_selectedItem+' #shortcodetype').val() == '2'){
						var ctype = ' ';
                        if( jQuery('#'+my_selectedItem+' #shortcodecontent').val() ){
							ctype += jQuery('#'+my_selectedItem+' #shortcodecontent').val();
						}else{
							ctype += '<?php _e('content', 'shortcodes_lib') ?>';
						}
                        ctype += ' [/'+shortcode+']';
                    }
                    jQuery('#'+my_selectedItem+' .attrVal').each(function(){
                        output += this.id+'="'+this.value+'" ';
                    });
                    var win = window.dialogArguments || opener || parent || top;
                    win.send_to_editor(output+']'+ctype);
                }
            }
			
			/* */
			jQuery(document).ready(function(){
				jQuery("#my_select").change(function() {
                    var win = window.dialogArguments || opener || parent || top;
					win.send_to_editor(jQuery("#my_select :selected").val());
					return false;
				});
			});
			/* */
		</script>
    </body>
</html>