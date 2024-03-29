<?php
/**
* Functions related to the iFeature Theme Options.
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package iFeature
* @since 3.1
*/

/* Standard Web Layout*/

function standard_web_layout() {
	global $options, $themeslug;
	
	if ($options->get($themeslug.'_standard_web_layout') == '1' ) {
		echo '<style type="text/css">';
		echo ".row {max-width: 1000px;}";
		echo "#sidebar.four.columns {margin-left: 1.9%; width: 32.2%;}";
		echo "#sidebar_left.four.columns {margin-right: 1.9%; width: 32.2%;}";
		echo "#content.eight.columns {width: 65.9%; margin-left: 0%;}";
		echo ".ifeature-tabbed-header li a {padding-right: 13px;";
		echo '</style>';
	}

}
add_action( 'wp_head', 'standard_web_layout' );

/* Widget Title Background*/

function custom_row_width() {
	global $options, $themeslug;
	$maxwidth = $options->get($themeslug.'_row_max_width');
	
	if ($maxwidth != '0' OR $maxwidth =='980px' ) {
		echo '<style type="text/css">';
		echo ".row {max-width: $maxwidth;}";
		echo '</style>';
	}	
}
add_action( 'wp_head', 'custom_row_width' );

/* Widget Title Background*/

function custom_text_color() {
	global $options, $themeslug;
	$color = $options->get($themeslug.'_text_color');
	
	if ($options->get($themeslug.'_text_color') != '' ) {
		echo '<style type="text/css">';
		echo "body {color: $color;}";
		echo '</style>';
	}

}
add_action( 'wp_head', 'custom_text_color' );

/* Widget Title Background*/

function widget_title_background() {
	global $options, $themeslug;
		
	if ($options->get($themeslug.'_widget_title_background') == '0' ) {
		echo '<style type="text/css">';
		echo ".widget-title {background: none; border-bottom: none;}";
		echo '</style>';
	}

}
add_action( 'wp_head', 'widget_title_background' );

/* Adjust postbar width for full width and 2 sidebar configs*/

function postbar_option() {
	global $options, $themeslug;
	
	if ($options->get($themeslug.'_blog_sidebar') == 'two-right' OR $options->get($themeslug.'_blog_sidebar') == 'right-left') {
		echo '<style type="text/css">';
		echo ".postbar {width: 95.4%;}";
		echo '</style>';
	}
	
	if ($options->get($themeslug.'_blog_sidebar') == 'none') {
		echo '<style type="text/css">';
		echo ".postbar {width: 97.8%;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'postbar_option');

/* Backgound Option*/

function background_option() {

	global $options, $themeslug;
	$root = get_template_directory_uri();
	$customsource = $options->get($themeslug.'_background_upload');
	$custom = stripslashes($customsource['url']);
	$repeat = $options->get($themeslug.'_bg_image_repeat');
	$position = $options->get($themeslug.'_bg_image_position');
	$attachment = $options->get($themeslug.'_bg_image_attachment');
	$color = $options->get($themeslug.'_background_color');
	
	if ($options->get($themeslug.'_background_image') == "" OR $options->get($themeslug.'_background_image') == "default" && $options->get($themeslug.'_custom_background') != "1")  {
	
		echo '<style type="text/css">';
		echo "body {background-image: url('$root/images/backgrounds/noise.jpg'); background-repeat: repeat; background-position: top left; background-attachment: fixed;}";
		echo '</style>';
	}
	
	if ($options->get($themeslug.'_background_image') == "dark" && $options->get($themeslug.'_custom_background') != "1")  {
	
		echo '<style type="text/css">';
		echo "body {background-image: url('$root/images/backgrounds/dark.png'); background-repeat: repeat; background-position: top left; background-attachment: fixed;}";
		echo '</style>';
	}
	
	if ($options->get($themeslug.'_background_image') == "wood" && $options->get($themeslug.'_custom_background') != "1")  {
	
		echo '<style type="text/css">';
		echo "body {background-image: url('$root/images/backgrounds/wood.png'); background-repeat: repeat; background-position: top left; background-attachment: fixed;}";
		echo '</style>';
	}
	
	if ($options->get($themeslug.'_background_image')  == "blue" && $options->get($themeslug.'_custom_background') != "1")  {
	
		echo '<style type="text/css">';
		echo "body {background-image: url('$root/images/backgrounds/blue.jpg'); background-repeat: repeat-x; background-position: top center; background-attachment: fixed;}";
		echo '</style>';
	}
	
	if ($options->get($themeslug.'_background_image') == "metal" && $options->get($themeslug.'_custom_background') != "1")   {
	
		echo '<style type="text/css">';
		echo "body {background-image: url('$root/images/backgrounds/metal.jpg'); background-color: #000; background-repeat: repeat-x; background-position: top center; background-attachment: fixed;}";
		echo '</style>';
	}
	
	if ($options->get($themeslug.'_background_image') == "space" && $options->get($themeslug.'_custom_background') != "1")  {
	
		echo '<style type="text/css">';
		echo "body {background-image: url('$root/images/backgrounds/space.jpg'); background-color: #000; background-repeat: repeat-x; background-position: top center; background-attachment: fixed;}";
		echo '</style>';
	}
	
	if ($options->get($themeslug.'_custom_background') == "1") {
		$color = (!empty($color)) ? $color : '#ffffff';
		if(!empty($custom)){
			echo '<style type="text/css">';
			echo "body {background-image: url('$custom'); background-color: $color; background-repeat: $repeat; background-position: $position; background-attachment: $attachment;}";
			echo '</style>';
		}
		else {
			echo '<style type="text/css">';
			echo "body {background-color: $color;}";
			echo '</style>';
		}
	}
	
}
add_action( 'wp_head', 'background_option');

/* Featured Image Alignment */

function featured_image_alignment() {

	global $themename, $themeslug, $options;
	
	if ($options->get($themeslug.'_featured_image_align') == "key4" ) {
	
		echo '<style type="text/css">';
		echo ".featured-image {float: none;}";
		echo '</style>';
			
	}

	elseif ($options->get($themeslug.'_featured_image_align') == "key3" ) {
	
		echo '<style type="text/css">';
		echo ".featured-image {float: right;}";
		echo '</style>';
			
	}
	elseif ($options->get($themeslug.'_featured_image_align') == "key2" ) {

		echo '<style type="text/css">';
		echo ".featured-image {text-align: center;}";
		echo '</style>';
		
	}
	else {
		
		echo '<style type="text/css">';
		echo ".featured-image {float: left;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'featured_image_alignment');

/* Post Meta Data width */

function post_meta_data_width() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_blog_sidebar') == "two-right" OR $options->get($themeslug.'_blog_sidebar') == "right-left") {

		echo '<style type="text/css">';
		echo ".postmetadata {width: 480px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'post_meta_data_width');

/* Site Title Color */

function add_sitetitle_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_sitetitle_color') == "") {
		$sitetitle = '#717171';
	}
	
	else {
		$sitetitle = $options->get($themeslug.'_sitetitle_color'); 
	}		
	
		echo '<style type="text/css">';
		echo ".sitename a {color: $sitetitle;}";
		echo '</style>';
		
}
add_action( 'wp_head', 'add_sitetitle_color');

/* Link Color */

function add_link_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_link_color') != '') {
		$link = $options->get($themeslug.'_link_color'); 
	

		echo '<style type="text/css">';
		echo "a {color: $link;}";
		echo ".meta a {color: $link;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_link_color');

/* Link Hover Color */

function add_link_hover_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_link_hover_color') != '') {
		$link = $options->get($themeslug.'_link_hover_color'); 
	

		echo '<style type="text/css">';
		echo "a:hover {color: $link;}";
		echo ".meta a:hover {color: $link;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_link_hover_color');

/* Menu Color */

function add_menu_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_custom_menu_color') != '' && $options->get($themeslug.'_custom_menu_color_toggle') != '0') {
		$color = $options->get($themeslug.'_custom_menu_color'); 
	

		echo '<style type="text/css">';
		echo "#imenu {-pie-background:none;background: $color;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_menu_color');

/* Menu Link Color */

function add_menulink_color() {

	global $themename, $themeslug, $options;

	if (!$options->get($themeslug.'_menulink_color')) {
		$sitelink = '#FFFFFF';
	}
	
	elseif ($options->get($themeslug.'_custom_menu_color_toggle') == '1'){ 
		$sitelink = $options->get($themeslug.'_menulink_color'); 
	}	
		
		echo '<style type="text/css">';
		echo "#nav ul li a {color: $sitelink;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menulink_color');

/* Menu Dropdown Color */

function add_menu_dropdown_color() {

	global $themename, $themeslug, $options;

	if (!$options->get($themeslug.'_custom_dropdown_color')) {
		$dropdown = '#555';
	}
	
	elseif ($options->get($themeslug.'_custom_menu_color_toggle') == '1'){ 
		$dropdown = $options->get($themeslug.'_custom_dropdown_color'); 
	}	
		
		echo '<style type="text/css">';
		echo "#nav li ul a {background: $dropdown;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menu_dropdown_color');

/* Menu Hover Color */

function add_menu_hover_color() {

	global $themename, $themeslug, $options;

	if (!$options->get($themeslug.'_menu_hover_color')) {
		$hover = '#444';
	}
	
	elseif ($options->get($themeslug.'_custom_menu_color_toggle') == '1'){ 
		$hover = $options->get($themeslug.'_menu_hover_color'); 
	}	
		
		echo '<style type="text/css">';
		echo "#nav ul li a:hover {background: $hover;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menu_hover_color');

/* Corners */

function menu_rounded_corners() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_menu_corners') == '0') {
		echo '<style type="text/css">';
		echo "#imenu {-webkit-border-radius: 0px;border-radius: 0px;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'menu_rounded_corners');

/* Tagline Color */

function add_tagline_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_tagline_color') != '') {
		$color = $options->get($themeslug.'_tagline_color'); 

		echo '<style type="text/css">';
		echo ".description {color: $color;}";
		echo '</style>';

	}	
}
add_action( 'wp_head', 'add_tagline_color');

/* Post Title Color */

function add_posttitle_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_posttitle_color') != '') {
		$posttitle = $options->get($themeslug.'_posttitle_color'); 
			
		echo '<style type="text/css">';
		echo ".posts_title a {color: $posttitle;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_posttitle_color');

/* Footer Color */

function add_footer_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_footer_color') != "" ) {
	
		$footercolor = $options->get($themeslug.'_footer_color'); 
	
	
		echo '<style type="text/css">';
		echo "#footer {background: $footercolor;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_footer_color');

/* Menu Font */
 
function add_menu_font() {
		
	global $themename, $themeslug, $options;	
		
	if ($options->get($themeslug.'_menu_font') == "") {
		$font = 'Arial';
	}		
		
	elseif ($options->get($themeslug.'_menu_font') == 'custom' && $options->get($themeslug.'_custom_menu_font') != "") {
		$font = $options->get($themeslug.'_custom_menu_font');	
	}
	
	else {
		$font = $options->get($themeslug.'_menu_font'); 
	}
	
		$fontstrip =  str_replace("+", " ", $font );
	
		echo "<link href='//fonts.googleapis.com/css?family=$font' rel='stylesheet' type='text/css' />";
		echo '<style type="text/css">';
		echo "#nav ul li a {font-family: $fontstrip;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menu_font'); 

/* Custom CSS */

function custom_css() {

	global $themename, $themeslug, $options;
	
	$custom =$options->get($themeslug.'_css_options');
	echo '<style type="text/css">' . "\n";
	echo  $custom  . "\n";
	echo '</style>' . "\n";
}

function custom_css_filter($_content) {
	$_return = preg_replace ( '/@import.+;( |)|((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/))/i', '', $_content );
	$_return = htmlspecialchars ( strip_tags($_return), ENT_NOQUOTES, 'UTF-8' );
	return $_return;
}
		
add_action ( 'wp_head', 'custom_css' );

?>