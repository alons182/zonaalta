<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        
        <title>Radio Zona Alta</title>
        <meta name="description" content="<?php bloginfo('description') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
        
        <?php wp_head(); ?>
        
    </head>
    <body <?php body_class(); ?>>
        
        <header class="header ">
            <?php get_template_part( 'templates/nav' ); ?>
            <a href="<?php echo home_url( '/' ); ?>" class="header__logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Radio Zona Alta"></a>
            <div class="header__contact">
                <span><i class="icon-whatsapp"></i> (506) 8998-1098</span>
                 <a href="https://www.facebook.com/radiozonaalta" class="header__contact__fb" target="_blank"><i class="icon-facebook"></i> Facebook</a>
            </div>
            
            <button id="btn-menu" class="header__btn-menu"><i class="icon-menu"></i></button>

        </header>
        <div class="header__message">
           <i class="icon-volume-up"></i> Transmisión en vivo desde Monteverde
        </div>
         <?php get_template_part( 'templates/twicker' ); ?>