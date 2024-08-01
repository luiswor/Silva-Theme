<?php
/**
 * File Template for displaying the Footer. It is called when using the wp_footer()
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

 $mi_marca = get_query_var( 'mi_marca' );

?>
    <?php
        if ($mi_marca == 'benelli') :
    ?>
        <img class="main-texture left" src="<?php bloginfo('template_url'); ?>/assets/texture-benelli-lr.svg" alt="">
        <img class="main-texture right" src="<?php bloginfo('template_url'); ?>/assets/texture-benelli-rl.svg" alt="">
    <?php endif;?>
    
    </main>
    <?php get_template_part('template-parts/footer','base'); ?>

    <?php wp_footer(); ?>


    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/main-scripts.js"></script>
</body>
</html>