<?php
    // $template_slug = get_page_template_slug();
    // $template_without_slug = substr($template_slug, 15);
    // $template = substr($template_without_slug, 0, -4);

    $mi_marca = get_query_var( 'mi_marca' );
    if ( ! empty( $mi_marca ) ) {}
?>
<header class="header-brands">
    <div class="container header-brands-content">
        <nav class="header-brands-nav">
            <div class="header-brands-logo">
                <a href="<?php echo  home_url()."/nuestras-marcas/".$mi_marca; ?>">
                    <img src="<?php echo get_template_directory_uri().'/assets/logos/'.$mi_marca.'.png' ?>" />
                </a>
            </div>

            <?php
                if(is_single()) {

                    wp_nav_menu( array(
                        'theme_location' => 'menu_' . $mi_marca,
                        'menu_id'        => 'menu-' . $mi_marca,
                        'container'      => false,
                        'menu_class'     => 'header-brands_menu menu-clase-' . $mi_marca,
                    ) );

    
                } else {

                    wp_nav_menu( array(
                        'theme_location' => 'Marca',
                        'menu_id'        => 'menu-marca',
                        'container'      => false,
                        'menu_class'     => 'header-brands_menu menu-clase-' . $mi_marca,
                    ) );
                }
            ?>


            <div class="identity">
                <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                ?>
            </div>
        </nav>
    </div>
</header>