<?php
/*

Author: Eddie Machado
URL: htp://themble.com/bones/

This is the Bones Core file. It powers everything.
YOU DON'T WANT TO MESS W/ THIS FILE UNLESS YOU KNOW WHAT YOU'RE DOING.
At most, the only thing you should edit is adding or removing the
expirimental features.
*/
// Get Bones Core Up & Running!
include_once('library/bones.php');
/*
Inside the bones.php file:

	1. removing some wp calls in the header
		a. rsd_link (simple discovery link)
		b. wlwmanifest_link (windows live writer link)
		c. wp_generator (version number)
	2. adding comment reply script via wp
	3. adding custom scripts file in the footer
	4. PNG fix for IE
	5. adding wp 3.0 functions
		a. menus
		b. thumbnails
		c. custom bg images
		d. custom header images
	6. relates posts scripts (optional)

To Use Expirimental Features keep the line below enabled

(DISABLE IF YOU DON'T WANT IT OR ENCOUNTER ANY ERRORS)

To disable, simply add two slashes before it (//). 
When disabled, it would look like this:

// include_once('library/plugins.php');

*/

// Expirimental Features
include_once('library/plugins.php');

// Adding Custom Post Type
include_once('library/custom-post-type.php');

// Adding Translation
load_theme_textdomain( 'bonestheme', TEMPLATEPATH.'/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH."/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);

/* BONES FUNCTIONS (DO NOT EDIT) */

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
autocropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Sidebar 1',
    	'description' => 'The first (primary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is.
    */
}

// adding sidebars to Wordpress
add_action( 'widgets_init', 'bones_register_sidebars' );
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(),  get_comment_time()) ?></a></time>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</header>

			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="help">
          			<p><?php _e('Your comment is awaiting moderation.') ?></p>
          		</div>
          		
			<?php endif; ?>
			
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>

			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
}

?>