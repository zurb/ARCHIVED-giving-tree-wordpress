			<footer role="contentinfo">
			
				<div id="inner-footer">
					
					<nav role="navigation">
						<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
			
					<p class="attribution">&copy; <?php bloginfo('name'); ?> is powered by <a href="http://wordpress.org/" title="WordPress">Wordpress</a> <span class="amp">&</span> <a rel="nofollow" href="http://www.themble.com/bones" title="Bones" class="footer_bones_link">Bones</a>.</p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

		<!-- custom scripts -->
		<script src="<?php bloginfo('template_directory'); ?>/library/js/scripts.js"></script>
		
		<!--[if lt IE 7 ]>
    		<script src="<?php bloginfo('template_directory'); ?>/library/js/libs/dd_belatedpng.js"></script>
    		<script> DD_belatedPNG.fix('img, .png_bg'); </script>
		<![endif]-->		
		
		<!-- Insert Analytics -->
		
		<!-- End Analytics -->

	</body>

</html>