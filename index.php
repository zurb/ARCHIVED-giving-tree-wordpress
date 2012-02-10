<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col620 left first clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
							
							<p class="meta"><?php _e('Posted', 'bonestheme'); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time> <?php _e('by', 'bonestheme'); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e('filed under', 'bonestheme'); ?> <?php the_category(', '); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix">
							<?php
							    $more_link_text = '<span class="read-more">' . __('Read more on', 'bonestheme') . the_title(' "', '" &raquo;</span>', false) ;
							    the_content( $more_link_text ); 
							?>

						</section> <!-- end article section -->
						
						<footer>

							<?php  // count tags of post and use plural where appropriate
							    $posttags = get_the_tags(); $count=0; if ($posttags) { foreach($posttags as $tag) { $count++; } };
							    $before_tags_text = '<p class="tags"><span class="tags-title">' . _n('Tag', 'Tags', $count, 'bonestheme') . '</span>: ';
							    the_tags( $before_tags_text, ', ', '</p>'); 
							?>

						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template(); ?>
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if experimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', 'bonestheme')) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', 'bonestheme')) ?></li>
							</ul>
						</nav>
					<?php } ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e('Not Found', 'bonestheme') ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e('Sorry, but the requested resource was not found on this site.', 'bonestheme'); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
