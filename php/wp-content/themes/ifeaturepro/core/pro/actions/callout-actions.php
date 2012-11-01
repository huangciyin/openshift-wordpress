<?php
/**
* Callout section actions used by the CyberChimps Synapse Core Framework Pro Extension
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
* @package Pro
* @since 1.0
*/

/**
* Pro callout actions
*/
add_action ( 'synapse_callout_section', 'synapse_callout_section_content' );

/**
* Retrieves the Callout Section options and sets up the HTML
*
* @since 1.0
*/
function synapse_callout_section_content() {

	global $options, $themeslug, $post; //call globals
	$root = get_template_directory_uri();  

/* Define variables. */	

	if (is_page()) {
		$callout = get_post_meta($post->ID, 'enable_callout_section' , true);
		$calloutbgcolor = get_post_meta($post->ID, 'callout_background_color' , true);
		$bcolor = get_post_meta($post->ID, 'custom_callout_button_color' , true);
		$btcolor = get_post_meta($post->ID, 'custom_callout_button_text_color' , true);
		$tcolor = get_post_meta($post->ID, 'custom_callout_text_color' , true);
		$ticolor = get_post_meta($post->ID, 'custom_callout_title_color' , true);
		$title = get_post_meta($post->ID, 'callout_title' , true);
		$text = get_post_meta($post->ID, 'callout_text' , true);
		$btext = get_post_meta($post->ID, 'callout_button_text' , true);
		$link = get_post_meta($post->ID, 'callout_url' , true);
		$image = get_post_meta($post->ID, 'callout_image' , true);
		$hidebutton = get_post_meta($post->ID, 'disable_callout_button' , true);
		$customcalloutbgcolor = get_post_meta($post->ID, 'custom_callout_color' , true);
	}
	
	else {
		$calloutbgcolor = $options->get($themeslug.'_blog_callout_bg_color');
		$bcolor = $options->get($themeslug.'_blog_callout_button_color');
		$btcolor = $options->get($themeslug.'_blog_callout_button_text_color');
		$tcolor = $options->get($themeslug.'_blog_callout_text_color');
		$ticolor = $options->get($themeslug.'_blog_callout_title_color');
		$title = $options->get($themeslug.'_blog_callout_title');
		$text = $options->get($themeslug.'_blog_callout_text');
		$btext = $options->get($themeslug.'_blog_callout_button_text');
		$link = $options->get($themeslug.'_blog_callout_button_url');
		$imagesrc = $options->get($themeslug.'_blog_custom_callout_button');
		$image = $imagesrc['url'];
		$hidebutton = $options->get($themeslug.'_blog_callout_button');
		$customcalloutbgcolor = $options->get($themeslug.'_blog_callout_bg_color');
	}
	
	if ($hidebutton == "on" OR $hidebutton == "1") {
		$grid = 'eight columns';
	}
	else {
		$grid = 'twelve columns';
	}
	
/* End variable definition. */	

/* Define Callout title. */	

	if ($title == '') {
		$callouttitle = 'This is the Callout Section';
	}
	else {
		$callouttitle = $title;
	}
	
/* End define Callout title. */	

/* Define Callout text. */	

	if ($text == '') {
		$callouttext = 'CyberChimps gives you the tools to turn WordPress into a modern feature rich Content Management System (CMS)';
	}
	else {
		$callouttext = $text;
	}
	
/* End define Callout title. */	

/* Define Callout button text. */

	if ($btext == '') {
		$calloutbuttontext = 'Buy Now';
	}
	else {
		$calloutbuttontext = $btext;
	}

/* End define Callout button text. */	

/* Define Callout button image. */

	if ($image != '') {
		$calloutimage = $image;
	}

/* End define Callout button image. */

/* Define Callout button link. */

	if ($link == '') {
		$calloutlink = 'http://cyberchimps.com';
	}
	else {
		$calloutlink = $link;
	}

/* End define Callout button link. */	

?>
	<div class="row">
	<div id="calloutwrap" class="twelve columns"><!--id="calloutwrap"-->
  <div class="row">
	<div id="callout_text" class="<?php echo $grid; ?>">
		<h2 class="callout_title" ><?php echo $callouttitle ?></h2>
		<p><?php echo $callouttext  ?></p>
	</div>
		
<?php if ($image == '' && $hidebutton == 'on' OR $image == '' && $hidebutton == '1'): ?>
	<div id="button_wrap" class="three columns end">
		<div id="calloutbutton" >
			<h3 class="callout_link"><a href="<?php echo $calloutlink ?>"><?php echo $calloutbuttontext ;?></a></h3>
		</div>
	</div>
<?php endif;?>

<?php if ($image != ''): ?>
	<div id="calloutimg" class="three columns end">
		<a href="<?php echo $calloutlink ?>"><img src="<?php echo $image?>" alt="Callout" /></a>
	</div>
<?php endif;?>

</div>
</div><!--end calloutwrap-->

</div>

<?php
}

function synapse_callout_section_css() {
	global $options, $themeslug, $post; //call globals
	$root = get_template_directory_uri();  

/* Define variables. */	
if( $options->get($themeslug.'_blog_custom_callout_options') ) {
	if (is_page()) {
		$callout = get_post_meta($post->ID, 'enable_callout_section' , true);
		$calloutbgcolor = get_post_meta($post->ID, 'callout_background_color' , true);
		$bcolor = get_post_meta($post->ID, 'custom_callout_button_color' , true);
		$btcolor = get_post_meta($post->ID, 'custom_callout_button_text_color' , true);
		$tcolor = get_post_meta($post->ID, 'custom_callout_text_color' , true);
		$ticolor = get_post_meta($post->ID, 'custom_callout_title_color' , true);
		$title = get_post_meta($post->ID, 'callout_title' , true);
		$text = get_post_meta($post->ID, 'callout_text' , true);
		$btext = get_post_meta($post->ID, 'callout_button_text' , true);
		$link = get_post_meta($post->ID, 'callout_url' , true);
		$image = get_post_meta($post->ID, 'callout_image' , true);
		$hidebutton = get_post_meta($post->ID, 'disable_callout_button' , true);
		$customcalloutbgcolor = get_post_meta($post->ID, 'custom_callout_color' , true);
	}
	
	else {
		$calloutbgcolor = $options->get($themeslug.'_blog_callout_bg_color');
		$bcolor = $options->get($themeslug.'_blog_callout_button_color');
		$btcolor = $options->get($themeslug.'_blog_callout_button_text_color');
		$tcolor = $options->get($themeslug.'_blog_callout_text_color');
		$ticolor = $options->get($themeslug.'_blog_callout_title_color');
		$title = $options->get($themeslug.'_blog_callout_title');
		$text = $options->get($themeslug.'_blog_callout_text');
		$btext = $options->get($themeslug.'_blog_callout_button_text');
		$link = $options->get($themeslug.'_blog_callout_button_url');
		$imagesrc = $options->get($themeslug.'_blog_custom_callout_button');
		$image = $imagesrc['url'];
		$hidebutton = $options->get($themeslug.'_blog_callout_button');
		$customcalloutbgcolor = $options->get($themeslug.'_blog_callout_bg_color');
	}
		
/* End variable definition. */	
/* Start CSS */

echo '<style type="text/css" media="screen">';

/* Echo custom button color. */
	if ($bcolor != "") {
		echo "#calloutbutton {background: none; background-color: $bcolor ;}";
	}
	
/* End custom button color. */

/* Echo custom button text color. */

	if ($bcolor != "") {
		echo "#calloutbutton a {color: $btcolor ;}";
	}
	
/* End custom button color. */

/* Echo custom text color. */

	if ($tcolor != "") {
		echo "#callout_text {color: $tcolor ;}";
	}
	
/* Echo custom title color. */

	if ($ticolor != "") {
		echo ".callout_title {color: $ticolor ;}";
	}

/* End custom text color. */

/* Echo background color CSS. */	

	if ($customcalloutbgcolor != ''){
		echo "#calloutwrap {background: none; background-color: $customcalloutbgcolor ;}";
	}
echo '</style>';
}
/* End CSS. */	
}

add_action( 'wp_head', 'synapse_callout_section_css' );


/**
* End
*/

?>