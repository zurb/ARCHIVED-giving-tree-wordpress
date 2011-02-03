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
	// header image
	define( 'HEADER_IMAGE', '%s/images/default-headbg.png' );
	define( 'HEADER_IMAGE_WIDTH', apply_filters( '', 960 ) ); // Width of Logo
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( '',	150 ) ); // Height of Logo
	define( 'NO_HEADER_TEXT', true );
	add_custom_image_header( '', 'admin_header_style' );	
	
// Creating the Nav Menus
function bones_menus() { register_nav_menus(
	array( 
		'main_nav' => 'The Main Menu',
		'footer_links' => 'Footer Links',
	));
}
	add_action( 'init', 'bones_menus' );
 
function bones_main_nav() { if ( function_exists( 'wp_nav_menu' ) )
		// display the wp3 menu if available
        wp_nav_menu( 'menu=main_nav&container_class=menu&fallback_cb=bones_main_nav_fallback' );
    else
    	// else fallback if not supported
        bones_main_nav_fallback();
}

function bones_footer_links() { if ( function_exists( 'wp_nav_menu' ) )
		// display the wp3 menu if available
        wp_nav_menu( 'menu=footer_links&container_class=footer-links&fallback_cb=bones_footer_links_fallback' );
    else
    	// else fallback if not supported
        bones_footer_links_fallback();
}
 
function bones_main_nav_fallback() { wp_page_menu( 'show_home=Start&menu_class=menu' ); }
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