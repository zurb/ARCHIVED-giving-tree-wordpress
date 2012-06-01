<?php
/*
Template Name: Style Guide
*/
?>

<?php 
/*
HOW TO USE THIS STYLE GUIDE

Create a page in the WordPress admin called Style Guide
and apply the Style Guide page template. This page 
shouldn't appear anywhere on your site and it should
be hidden from search results. Fore more information on
how to use a Style Guide, check out this link:

*/
?>

<!doctype html>  

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7 oldie"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><html <?php language_attributes(); ?> class="no-js"><![endif]-->
	
	<head>
		<meta charset="utf-8">
		
		<title><?php wp_title(''); ?></title>
		
		<!-- 
			You'll want to hide this page from the search results.
			I put it in here just to be sure, but you can also set this
			using an SEO plugin if you prefer.
		-->
		<!-- no index meta tag here -->
		
		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
				
  		<!-- style guide css file (library/css/style-guide.css) -->
  		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/style-guide.css">
		
		<!-- 
			We don't want to involve too much, so the style guide remains slim.
			This is why we don't call wp_head.
			If you need to display some javascript or plugin related content,
			you can add that manually.
			jQuery can be inserted at the bottom if you need it. 
		-->
		
		<!-- modernizr (in case you want to show some examples of how to use it) -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/modernizr.custom.min.js"></script>
		
	</head>
	
	<body class="style-guide">
	
		<div id="sg-container">
			
			<div id="sg-content" class="clearfix">
			
				<div id="sg-menu">
				
					<!-- remember to replace this w/ the client logo -->
					<img id="sg-logo" src="<?php echo get_template_directory_uri(); ?>/library/images/style-guide-logo.png" alt="" width="175" height="175" />
					
					<!--
						You can add more elements and customize the existing ones
						here if you like.
					-->
					
					<ul>
						<li><a href="#">Structure</a>
							<ul>
								<li><a href="#sg-title-grid">Grid</a></li>
								<li><a href="#sg-title-slider">Slider</a></li>
							</ul>
						</li>
						<li><a href="#sg-title-fonts">Typography</a>
							<ul>
								<li><a href="#sg-title-headlines">Headlines</a></li>
								<li><a href="#sg-title-paragraphs">Paragraphs</a></li>
								<li><a href="#sg-title-lists">Lists</a></li>
								<li><a href="#sg-title-datalists">Datalists</a></li>
							</ul>
						</li>
						<li><a href="#sg-title-content">Content</a>
							<ul>
								<li><a href="#sg-title-images">Images</a></li>
								<li><a href="#sg-title-video">Video</a></li>
								<li><a href="#sg-title-objects">Flash</a></li>
							</ul>
						</li>
						<li><a href="#sg-title-mixins">Mixins</a>
							<ul>
								<li><a href="#sg-title-rounded-corners">Rounded Corners</a></li>
								<li><a href="#sg-title-gradients">CSS3 Gradients</a></li>
								<li><a href="#sg-title-transitions">Transitions</a></li>
							</ul>
						</li>
						<li><a href="#sg-title-forms">Forms</a>
							<ul>
								<li><a href="#sg-title-inputs">Inputs</a></li>
								<li><a href="#sg-title-buttons">Buttons</a></li>
							</ul>
						</li>
						<li><a href="#sg-title-icons">Icons</a>
							<ul>
								<li><a href="#sg-title-icon-howto">How To Use</a></li>
								<li><a href="#sg-title-icon-chart">Icon Chart</a></li>
							</ul>
						</li>
					</ul>
					
				</div>
				
				<div id="sg-main" class="post-content">
				
					<h1><?php bloginfo('name'); ?> Style Guide</h1>
						
					<p class="sg-highlight">This is the style guide for your site. It contains information on commonly used elements and useful tips and tricks. Please feel free to customize this for your staff and anyone who's going to use the site. You can also add company rules for blog posts, things that need to be included in each article, things like that. This shouldn't be available to the public and should only be viewable internally.</p>
						
					<h3 id="sg-title-structure" class="h2 sg-title">Structure</h3>
						
					<p>This area contains classes for creating blocks or areas on the site.</p>
						
					<h4 id="sg-title-grid" class="sg-subtitle">Grid</h4>
						
					<p class="sg-highlight"><strong>The actual grid is not called until we hit a device larger than 1030px (basically larger than an iPad)</strong>. Be aware that if you add one of the grid classes to an element, it won't display with the styles on a device with a smaller viewport than 1030px.</p>
						
					<h4 id="sg-title-slider" class="sg-subtitle">Slider</h4>
						
					<p class="sg-highlight">If you plan on using a content slider, you can add the basics here. (Links to Support Docs, Example of how to add another, ect.)</p>
						
						
					<h3 id="sg-title-icons" class="h2 sg-title">Typography</h3>
						
					<h4 id="sg-title-headlines" class="sg-subtitle">Headlines</h4>
						
					<p>The headlines on the site use <span class="sg-highlight">Sans-Serif</span> and the body copy is <span class="sg-highlight">Serif</span>.
						
					<h1>This is an H1 Headline</h1>
						
					<h2>This is an H2 Headline</h2>
					
					<h3>This is an H3 Headline</h3>
						
					<h4>This is an H4 Headline</h4>
						
					<h5>This is an H5 Headline</h5>
						
					<p>You can also change the look of a headline by adding a class. If you'd like an H3 to look like an H1, simply add the class <em>.h1</em> to it. Here's an example.</p>
						
					<h1>This is a Regular H1</h1>
						
					<h3 class="h1">This is actually an H3 with a class of H1</h3>
						
					<pre>&lt;h3 class="h1">This is actually an H3 with a class of H1&lt;/h3></pre>
						
					<p>This is a good way to maintain SEO integrity while being able to make titles look different. Use it.</p>
						
					<h4 class="sg-subtitle">An example Paragraph</h4>
						
					<p>This is a paragraph so you can see it in action. It's going to be a pretty good length and will display the versatility of a paragraph. That didn't even make sense, but really who cares. This is just dummy content that you shouldn't even be reading. Still reading? Seriously? Well kudos on getting this far, you may even win a prize if you get all the way to the end of this useless placeholder content. What kind of prize? Well, that would ruin the surprise wouldn't it. I'm going to include a link here <a href="http://bukk.it/cattub.gif">what a link in a paragraph looks like</a>. Whoa, that was intense. I think I need a nap. Well, congrats. You made it to the end of this placeholder paragraph. It served no purpose and you are now dumber for having read it. Oh, and that prize I mentioned. It was a ruse. <a href="http://bukk.it/snap.gif">You just got served pal</a>. Hope it was good for you, because it was great for me.</p>
						
					<h4 class="sg-subtitle">Lists</h4>
						
					<ul>
						<li>Unordered List Item 1</li>
						<li>Unordered List Item 2</li>
						<li>Unordered List Item 3</li>
						<li>Unordered List Item 4</li>
					</ul>
						
					<ol>
						<li>Ordered List Item 1</li>
						<li>Ordered List Item 2</li>
						<li>Ordered List Item 3</li>
						<li>Ordered List Item 4</li>
					</ol>
						
											
					<h4 class="sg-subtitle">Datalist</h4>
						
					<dl>
						<dt>This is a Datalist Title</dt>
						<dd>This is the description for the datalist. It's where the data goes.</dd>
						<dt>This is a Datalist Title</dt>
						<dd>This is the description for the datalist. It's where the data goes.</dd>
					</dl>
					
					<h3 id="sg-title-content" class="h2 sg-title">Content</h3>
						
					<h3 id="sg-title-mixins" class="h2 sg-title">Mixins</h3>
					
					<p class="sg-highlight">These mixins apply to the <strong>scss syntax</strong>, if you're using another syntax, you'll need to adjust this content.</p>
						
					<h4 id="sg-title-rounded-corners" class="sg-subtitle">Rounded Corners</h4>
						
					<p>To use rounded corners on an element, we can use the power of mixins inside Sass. This looks and sounds more complex than it really is. In the css, this is how you would add a border-radius of 4px:</p>
						
					<pre>.sg-box {
    background: #fae389;
    border: 1px solid #d9ad24;
    @include rounded(4px);
}</pre>
						
					<div class="sg-box sg-round">
						<p>This is a box with rounded corners.</p>
					</div>
					
					<p>As you can see we just used <strong>@include rounded(4px);</strong> and that automatically added all the border-radius markup we established in our mixins.scss file. If you wanted to change the radius to, let's say 24px, all you would do is change that number:</p>
						
					<pre>.sg-box {
    background: #fae389;
    border: 1px solid #d9ad24;
    @include rounded(24px);
}</pre>
					
					<div class="sg-box sg-round24">
						<p>This is a box with a border radius of 24px.</p>
					</div>
						
					<p>All the markup is changed without having to re-type every single line. Here are all the various Border Radius mixins. Remember, you can declare the number in the include and all the versions will be displayed.</p>
						
					<ul>
						<li><strong>@include .rounded(4px);</strong> - Rounded on all corners</li>
						<li><strong>@include .rounded-top(4px);</strong> - Rounded on the top corners only</li>
						<li><strong>@include .rounded-bottom(4px);</strong> - Rounded on the bottom corners only</li>
						<li><strong>@include .rounded-left(4px);</strong> - Rounded on left side only</li>
						<li><strong>@include .rounded-right(4px);</strong> - Rounded on right side only</li>
					</ul>
						
					<h4 id="sg-title-gradients" class="sg-subtitle">CSS3 Gradients</h3>
						
					<p>Again, we're going to use mixins to display gradients instead of using images. The gradient markup is very complex and down right confusing. We simplify that the same way we do with the border radius example above.</p>
						
					<pre>.gradient-box {
   border: 1px solid #d9ad24;
   @include css-gradient(#fae389,#fad648);
}</pre>
					
					<div class="sg-gradient-box">
						<p>This is a box with a gradient. Pretty neat huh?</p>
					</div>
						
					<p>The first number is what color the gradient starts with while the second number is where the gradient ends with. For now, the only mixin on the site is top to bottom gradients. There are others, and you can add those if you feel adventurous. Gradients are mostly used on the buttons, and it should probably remain that way for now. Using a ton of gradients can affect performance a bit. Just a heads up.</p>
						
					<h4 id="sg-title-transitions" class="sg-subtitle">Transitions</h3>
						
					<p>Transitions are used to ease things like buttons and link color. It adds subtle animations to changes in state. You can use the animation syntax like so. As an example, we are going to use a transition on this box below. Since there's really no change on hover, we'll say to transition <strong>all</strong>, make it last <strong>2 seconds</strong>, and use the transition <strong>ease</strong>.</p>
						
					<pre>.transition-box {
    border: 1px solid #d9ad24;
    background: #fae389;
    @include css-transition(all, 2s, ease);
}

.transition-box:hover {
    background: #7dcce3;
    border-color: #1e68b5;
}</pre>
					
					<div class="transition-box">
						<p>Hover over me to see the transition on the background color change.</p>
					</div>
						
					<p>You can specify what to to transition, how long the transition should last, and what kind of transition it should be within the parenthesis. You can also leave the parenthesis empty and it will use the defaults. Again, this is something to be used sparingly as it too, can affect performance.</p>
						
					<h3 id="sg-title-forms" class="h2 sg-title">Forms</h3>
					
					<h4 id="sg-title-inputs" class="sg-subtitle">Inputs</h4>
					
					<p>Bones doesn't come with any form styles so you should add your own.</p>
					
					<label>Text Input</label>
					<input type="text" name="" value="" placeholder="This is a Text Input" />
					
					<label>Textarea</label>
					<textarea placeholder="This is a Textarea"></textarea>>
						
					<h4 id="sg-title-buttons" class="sg-subtitle">Buttons</h4>
						
					<p>To make a button, it's as easy as adding a class to an &lt;a> link. You'll need to add the class <strong>.button</strong> to give it the standard button shape. After that, you can add other classes to make it different colors.</p>
						
					<pre>&lt;a class="button" href="#">Standard Button&lt;/a></pre>
						
					<a class="button" href="#">Standard Button</a>
						
					<pre>&lt;a class="button blue-button" href="#">Blue Button&lt;/a></pre>
						
					<a class="button blue-button" href="#">Blue Button</a>
						
					<p>You can create more button styles if you like.</p>
					
					<h3 id="sg-title-icons" class="h2 sg-title">Icons</h3>
						
					<p class="sg-highlight">If you're using icon fonts, you'll want to use to explain which version you are using as well as explain how they work.</p>
						
					<h4 id="sg-title-howto" class="sg-subtitle">How To Use</h4>
						
					<p class="sg-highlight">You can explain a bit how to use them, whether you are using a class or pseudo elements.</p>
						
					<h4 id="" class="sg-subtitle">Adding Icons to elements</h4>
						
					<div class="icon-font-example">
						<em>/0033</em>
						<span class="bg-icon ic-star"></span>
						<p>star</p>
					</div>
						
					<p class="sg-highlight">Adding icons is as simple as adding a class to an element on the page. You'll see an example from the chart below on your right. The numbers on top are the Unicode values for each character. You can use this number in the CSS if you want to add it that way. The word below is the class you can add to an element and it will automatically add the icon <em>before</em> it.</p>
						
					<h4 class="sg-subtitle">A Quick Example</h4>
							
					<p class="sg-highlight">Showing an example here will help make things easier.</p>
						
					<h4 id="sg-title-icon-chart" class="sg-subtitle">The Icon Chart</h4>
						
					<p class="sg-highlight">This is a full chart of all the icons available. You can customize it so it displays the correct icons / character map.</p>
						
					<table class="icon-font-guide">
							<thead>
								<th colspan="7">These are example icon names</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<em>\0021</em>
										<span class="bg-icon ic-location"></span>
										<p>location</p>
									</td>
									<td>
										<em>\0025</em>
										<span class="bg-icon ic-half-star"></span>
										<p>half-star</p>
									</td>
									<td>
										<em>\0026</em>
										<span class="bg-icon ic-calendar"></span>
										<p>calendar</p>
									</td>
									<td>
										<em>\0028</em>
										<span class="bg-icon ic-trophy"></span>
										<p>trophy</p>
									</td>
									<td>
										<em>\0029</em>
										<span class="bg-icon ic-cart"></span>
										<p>cart</p>
									</td>
									<td>
										<em>\002b</em>
										<span class="bg-icon ic-wifi"></span>
										<p>wifi</p>
									</td>
									<td>
										<em>\002d</em>
										<span class="bg-icon ic-podcast"></span>
										<p>podcast</p>
									</td>
								</tr>
								
								<!-- add more rows to add more icons -->
								
							</tbody>
						</table>
				
				</div>
			
				    
			</div> <!-- end #sg-content -->
			

			<footer class="sg-footer" role="contentinfo">
			
				<p class="attribution">&copy; <?php bloginfo('name'); ?> Style Guide.</p>
				
			</footer> <!-- end sg-footer -->
		
		</div> <!-- end #sg-container -->
		
		<!-- you can insert jQuery and the scripts.js file here (if needed) -->

	</body>

</html> <!-- end page. what a ride! -->