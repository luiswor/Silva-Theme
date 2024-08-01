<?php
/*
Template Name: Husqvarna
Template Post Type: models, pages

*/    
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();?>
    <section class="model_hero">
        <div class="container model_hero_content">

        <?php
if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
}
?>


            <h1 class="model_hero_title"><?php echo get_the_title(); ?></h1>
            
            
            <div class="model_hero_img">
                <?php the_post_thumbnail('large'); ?> 
            </div>
        </div>

    </section>

    <?php
    the_content();
    endwhile;
endif;

get_footer();
?>