<?php
/**
 * File Template for searchform.php template. It is Used any time that get_search_form() is called.
 * 
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */

?>
<form action="/" method="get">
    <label for="search">Search in <?php echo home_url( '/' ); ?></label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>assets/images/search.png" />
</form>