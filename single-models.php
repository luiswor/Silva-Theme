<?php
    get_header();


    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
?>

    <section class="model_hero">
            <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
        }
        ?>

        <h1><?php echo get_the_title(); ?></h1>
    </section>

<?php
    endwhile;
    endif;
     get_footer();
?> 