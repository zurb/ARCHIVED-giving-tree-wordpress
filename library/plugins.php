<?php

/*
Bones Plugins & Extra Functionality
Author: Eddie Machado
URL: http://themble.com/bones/

This file contains extra features not 100% ready to be included
in the core. Feel free to edit anything here or even help us fix
and optimize the code! 

IF YOU WANT TO SUBMIT A FIX OR CORRECTION, PLEASE CONTACT US HERE:
http://themble.com/bones/dev

IF YOU WANT TO DISABLE THIS FILE, REMOVE IT'S CALL IN THE FUNCTIONS.PHP FILE

*/



/*
Built in Page Navi w/out Plugin

This feature is meant to add page navi functionality w/out
using a plugin. It's currently in use but does contain a few
bugs. Mainly it displays something even if there's only one page.

THIS FEATURE IS IN DEVELOPMENT BUT FUNCTIONAL
*/

// page navigation
function page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;

	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}

	echo $before.'<div class="page-navigation"><ul class="bones_page_navi clearfix">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = "First";
		echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li class="bpn-prev-link">';
	previous_posts_link('<<');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="bpn-current">'.$i.'</li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="bpn-next-link">';
	next_posts_link('>>');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = "Last";
		echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ul></div>'.$after."";
}


/* 
Facebook Connect Image Fix
This was built of a post from Yoast that should
fix the facebook issue when sharing something w/
facebook where it selects a random photo from
your site. This should use a photo from the actual post.
*/

// facebook share correct image fix (thanks to yoast)
function bones_facebook_connect() {
	if (is_singular()) {
	  global $post;
	  if ( current_theme_supports('post-thumbnails') 
	      && has_post_thumbnail( $post->ID ) ) {
	    $thumbnail = wp_get_attachment_image_src( 
	      get_post_thumbnail_id( $post->ID ), 'thumbnail', false);
	    echo '<meta property="og:image" 
	      content="'.$thumbnail[0].'" />';	
	  }
	  echo '<meta property="og:title" 
	    content="'.get_the_title().'" />';
	  if ( get_the_excerpt() != '' )
	    echo '<meta property="og:description" 
	      content="'.strip_tags( get_the_excerpt() ).'" />';
	}
}

	// add this in the header 
	add_action('wp_head', 'bones_facebook_connect');
	



/*
HTML5 Video using Shortcode within WP

This feature is meant to make HTML5 Video easy to use.
to post a video, you simply have to use the shortcode:

[video src="filename" width="640px" height="340px" poster="imagename.jpg"]

Don't add a file extention as this will be added depending on what
browser you are using. Remember you need two file formats for it to
work consistently across all browsers:

filename.mp4 (used for Safari, Chrome, Flash Fallback)
filename.ogv (used for Firefox)

Be sure to make sure your directories are correct.
Defaults are in your uploads folder in wp-contents, 
but you can change it if you use a CDN or another 
hosting service.

This code was built upon a plugin created by Rob McGuire (http://robmcguire.net/)

*/

// html5 video & fallback (still expirimental)
function bones_html5( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'src' => '', /* this one is handled using the code below */
	'options' => 'controls autobuffer', /* adds controls & autobuffer automatically */
	'width' => '', /* depends on the width you enter */
	'height' => '', /* depends on the width you enter */
	'poster' => '', /* the background image (you need to use poster=) */
	'format' => 'auto', /* auto adds the file format */
	'class' => '', /* this adds a class to the video for further customization */
	), $atts ) );
	$fallbacktype='.mp4'; /* the file extension of the file that will play in the flash player */
	$fallbackpath = get_template_directory_uri(). '/library/js/flowplayer/flowplayer-3.2.5.swf'; /* location of the fallback player */
	$videostorage = WP_CONTENT_URL .'/uploads/'; /* this can be changed to a cdn if you like */
	$fallbackvid = '<object id="flowplayer" width="'.$width.'" height="'.$height.'" data="'.$fallbackpath.'" 
	type="application/x-shockwave-flash"><param name="movie" value="'.$fallbackpath.'" /><param name="allowfullscreen" value="true" /><param name="flashvars" value=\'config={"clip": {"url": "'.$videostorage.''.$src.''.$fallbacktype.'", "autoPlay":false, "autoBuffering":true}}\' /></object>';
	$output .= '<video class="'.$class.'" width="'.$width.'" height="'.$height.'" poster="'.$videostorage.''.$poster.'" '.$options.'>' . "\n"; /* opening the video & inputting variables */
	$output .= '<source src="'.$videostorage.''.$src.'.mp4" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />' . "\n"; /* this is the safari version */
	$output .= '<source src="'.$videostorage.''.$src.'.ogv" type=\'video/ogg; codecs="theora, vorbis"\' />' . "\n"; /* this is the firefox version */
	$output .= $fallbackvid.'</video>'; /* this is the fallback & closing tag */
	return $output;
}
	// adding the shortcode to wordpress
	add_shortcode('video', 'bones_html5'); /* creates the video using wordpress shortcodes */

// adding the facebook and twitter links to the user profile
function bones_add_user_fields( $contactmethods ) {
// Add Facebook
$contactmethods['user_fb'] = 'Facebook';
// Add Twitter
$contactmethods['user_tw'] = 'Twitter';
return $contactmethods;
}
add_filter('user_contactmethods','bones_add_user_fields',10,1);

// Display the Browser People Are Using
function bones_browser_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
		if($is_lynx) $classes[] = 'browser-lynx';
		elseif($is_gecko) $classes[] = 'browser-gecko';
		elseif($is_opera) $classes[] = 'browser-opera';
		elseif($is_NS4) $classes[] = 'browser-ns4';
		elseif($is_safari) $classes[] = 'browser-safari';
		elseif($is_chrome) $classes[] = 'browser-chrome';
		elseif($is_IE) $classes[] = 'browser-ie';
		else $classes[] = '';
		if($is_iphone) $classes[] = 'browser-iphone';
	return $classes;
}
	// Add the Browser Class to the Body Class
	add_filter('body_class','bones_browser_class');


?>