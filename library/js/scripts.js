/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp-head()
this file will be called automatically in the footer so as not to 
slow the page load.

*/


// as the page loads, cal these scripts
$(document).ready(function() {

	// highlight search terms on search page
	if(typeof(hls_query) != 'undefined'){
		$(".post_content").highlight(hls_query, 1, "search-term");
	}

	// the placeholder fallback jquery (adds support for html5 placeholder)


 
}); /* end of as page load scripts */