<header class="header">
    <div class="container header-content">

        <div class="identity">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                ?>
            </a>
        </div>

        

        <nav id="nav" class="nav">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'Header',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false
                ) );
            ?>
        </nav>

        <button id="nav-toggle" class="btn-menu">
            <i class="ico-menu"></i>
            <i class="ico-x"></i>
        </button>
    </div>
</header>