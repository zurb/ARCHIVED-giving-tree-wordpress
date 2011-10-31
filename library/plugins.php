<?php

/*
Bones Plugins & Extra Functionality
Author: Eddie Machado
URL: http://themble.com/bones/

This file contains extra features not 100% ready to be included
in the core. Feel free to edit anything here or even help us fix
and optimize the code! 

IF YOU WANT TO SUBMIT A FIX OR CORRECTION, JOIN US ON GITHUB:
https://github.com/eddiemachado/bones/issues

IF YOU WANT TO DISABLE THIS FILE, REMOVE IT'S CALL IN THE FUNCTIONS.PHP FILE

*/




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
	
// adding the rel=me thanks to yoast	
function yoast_allow_rel() {
	global $allowedtags;
	$allowedtags['a']['rel'] = array ();
}
add_action( 'wp_loaded', 'yoast_allow_rel' );

// adding facebook, twitter, & google+ links to the user profile
function bones_add_user_fields( $contactmethods ) {
	// Add Facebook
	$contactmethods['user_fb'] = 'Facebook';
	// Add Twitter
	$contactmethods['user_tw'] = 'Twitter';
	// Add Google+
	$contactmethods['google_profile'] = 'Google Profile URL';
	// Save 'Em
	return $contactmethods;
}
add_filter('user_contactmethods','bones_add_user_fields',10,1);


?>