<?php get_header(); ?>
			
			<div id="content" class="clear">
			
				<div id="main" class="col620 clear" role="main">
				
					<?php if (is_category()) { ?>
						<h1 class="archive_title h2"><span>Posts Categorized:</span> <?php single_cat_title(); ?></h1>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2"><span>Posts Tagged:</span> <?php single_tag_title(); ?></h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2"><span>Posts By:</span> <?php echo get_author_name(get_query_var('author')); ?></h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2"><span>Daily Archives:</span> <?php the_time('l, F j, Y'); ?></h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2"><span>Monthly Archives:</span> <?php the_time('F Y'); ?></h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2"><span>Yearly Archives:</span> <?php the_time('Y'); ?></h1>
					<?php } ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" class="clear">
						
						<header>
							
							<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							<p class="meta">Posted <time><?php the_time('F jS, Y'); ?></time> by <?php the_author(); ?> <span class="amp">&</span> filed under <?php the_category(', '); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_excerpt('<span class="read-more">Read more on "'.the_title('', '', false).'" &raquo;</span>'); ?>
					
						</section> <!-- end article section -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clear">
								<li class="prev-link"><?php next_posts_link('&laquo; Older Entries') ?></li>
								<li class="next-link"><?php previous_posts_link('Newer Entries &raquo;') ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>No Posts Yet</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>