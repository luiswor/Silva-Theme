<?php
/**
 * File template for displaying search results pages. Display a list of posts in excerpt or full-length form. Choose one or the other as appropriate.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */

get_header();?>
<div class="page-content">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		// Post Loop
	} 
	// Post Navigation
} else {
	//No Post Found
}?>
</div>
<?php get_footer(); ?>