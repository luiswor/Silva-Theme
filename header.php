<?php
/**
 * This is the template that displays all of the <head> section and everything up until main. It is called when using the wp_header().
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <title>
        <?php wp_title(); ?>
    </title>
	
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    
	<?php wp_head(); ?>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <?php

        $template_slug = get_page_template_slug();
        $template_without_slug = substr($template_slug, 15);
        $template = substr($template_without_slug, 0, -4);
        $lastPart = basename($template_slug);
        $lastPart = substr($lastPart, 0, -4);
        $template = $lastPart;

        set_query_var('mi_marca', $template);

        //echo $lastPart;
        
        if($template == 'benelli') {
            echo '<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">';
        }
        
        elseif($template == 'haval') {
            echo '<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">';
        }
        
        elseif($template == 'motoplex') {
            echo '<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">';
        }

        elseif($template == 'cfmoto') {
            echo '<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">';
        }

        elseif($template == 'husqvarna') {
            echo '<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Gochi+Hand&display=swap" rel="stylesheet">';
        }

    ?>
    <!--ENDFONTS-->

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/styles.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/icons.css" />
</head>
<body <?php body_class(); ?> >
    <div class="wrapper">
    <?php 
        if($template == '' || $template == ' ') {
            get_template_part('template-parts/header','base'); 
        }
        else {
            get_template_part('template-parts/header','brands'); 
        }
    ?>
    
    <main class="main">

