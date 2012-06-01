<?php
/* Welcome to Bones :)
Thanks to the fantastic work by Bones users, we've now
the ability to translate Bones into different languages.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/



// Adding Translation Option
load_theme_textdomain( 'bonestheme', TEMPLATEPATH.'/library/translation' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH."/library/translation/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);








?>