<?php
    /**
     * Silva Movility Theme 
     * The index template file 
    */
    
    get_header();


    // /*DETECTAMOS EL TIPO DE POST*/
    // $type_post = get_post_type();

    // /*CARGAMOS PLANTILLA SEGUN EL TIPO*/
    // if (is_front_page()) {
    //     get_template_part('template-parts/page', 'front'); 
    // }
    // else if(is_home()) {
    //     get_template_part('template-parts/page', 'home'); 
    // }
    
    // else {
    //     if (is_archive()) {
    //         get_template_part('template-parts/archive', $type_post); 
            
    //     }
    //     else if (is_single() || is_singular()) {
    //         get_template_part('template-parts/single', $type_post); 		
    //     }
		
	// 	else {
	// 		get_template_part('template-parts/general', 'layout');
	// 	}
    // }
    ?>
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                the_content();
                endwhile;
            endif;
        ?>
    

    <?php
    
    get_footer();
?>