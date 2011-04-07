<?php
/* Welcome to Bones :)
This is meant to be a very helpful development tool.
I hope it makes your life easier! 

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// remove some WP defaults
function removeHeadLinks() {
	// remove simple discovery link
	remove_action('wp_head', 'rsd_link');
	// remove windows live writer link
	remove_action('wp_head', 'wlwmanifest_link');
	// remove the version number
	remove_action('wp_head', 'wp_generator');
	// remove header links
}
	add_action('init', 'removeHeadLinks');
	// Add RSS links to <head> section
	add_theme_support('automatic-feed-links');
	
// loading jquery reply elements on single pages automatically
function bones_queue_js(){
  if (!is_admin()){
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('wp_print_scripts', 'bones_queue_js');
	
// Adding WP 3.0 Functions
	//menus
	add_theme_support( 'menus' );
	// thumbnails
	add_theme_support('post-thumbnails'); 
	set_post_thumbnail_size(125, 125, true); /* more sizes are available using the functions.php file */
	// custom backgrounds
	add_custom_background();
	// header image define
	define('NO_HEADER_TEXT', true ); // I prefer no header text, you can change this
	// define('HEADER_TEXTCOLOR', 'ffffff'); // the text color in the header ( to use uncomment it and comment no header tx
	define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is the template dir uri
	define('HEADER_IMAGE_WIDTH', 1044); // the width of the logo
	define('HEADER_IMAGE_HEIGHT', 150); // the height of the logo
	// gets included in the site header
	function header_style() { ?>
	     <style type="text/css"> header[role=banner] { background: url(<?php header_image(); ?>); } </style><?php
	}
	// gets included in the admin header
	function admin_header_style() {
	?><style type="text/css">
	#headimg {
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	}
	</style><?php
	}
	add_custom_image_header('header_style', 'admin_header_style');	
	// adding post format support
	add_theme_support( 'post-formats', 
		array( 
			'aside', /* Typically styled without a title. Similar to a Facebook note update */
			'gallery', /* A gallery of images. Post will likely contain a gallery shortcode and will have image attachments */
			'link', /* A link to another site. Themes may wish to use the first <a href=сс> tag in the post content as the external link for that post. An alternative approach could be if the post consists only of a URL, then that will be the URL and the title (post_title) will be the name attached to the anchor for it */
			'image', /* A single image. The first <img /> tag in the post could be considered the image. Alternatively, if the post consists only of a URL, that will be the image URL and the title of the post (post_title) will be the title attribute for the image */
			'quote', /* A quotation. Probably will contain a blockquote holding the quote content. Alternatively, the quote may be just the content, with the source/author being the title */
			'status', /*A short status update, similar to a Twitter status update */
			'video', /* A single video. The first <video /> tag or object/embed in the post content could be considered the video. Alternatively, if the post consists only of a URL, that will be the video URL. May also contain the video as an attachment to the post, if video support is enabled on the blog (like via a plugin) */
			'audio', /* An audio file. Could be used for Podcasting */
			'chat' /* A chat transcript */
		)
	);	
	
	

// Creating the Nav Menus
function bones_menus() { 
	if (function_exists( 'register_nav_menus' )) {	
		register_nav_menus(
			array( 
				'main_nav' => 'The Main Menu',
				'footer_links' => 'Footer Links'
			)
		);
	}		
}

add_action( 'init', 'bones_menus' );
 
function bones_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'menu' => 'main_nav', /* menu name */
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
    		'container_class' => 'menu', /* container class */
    		'fallback_cb' => 'bones_main_nav_fallback' /* menu fallback */
    	)
    );
}

function bones_footer_links() { 
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'footer_links', /* menu name */
    		'theme_location' => 'footer_links', /* where in the theme it's assigned */
    		'container_class' => 'footer-links', /* container class */
    		'fallback_cb' => 'bones_footer_links_fallback' /* menu fallback */
    	)
	);
}
 
function bones_main_nav_fallback() { wp_page_menu( 'show_home=Home&menu_class=menu' ); }
function bones_footer_links_fallback() { echo '<ul class="footer-links"><li>Bones<li></ul>'; }
	
// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
        global $post;
        $tags = wp_get_post_tags($post->ID);
        if($tags) {
        	foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
            	$args = array(
            	'tag' => $tag_arr,
            	'numberposts' => 5,
            	'post__not_in' => array($post->ID)
           		);
           	$related_posts = get_posts($args);
           		if($related_posts) {
           			foreach ($related_posts as $post) : setup_postdata($post); ?>
           		<li class="related_post"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
         <?php endforeach; } else { ?>
                <li class="no_related_post">No Related Posts Yet!</li>
         <?php   }
	}
	wp_reset_query();
	echo '</ul>';
}


	

?>