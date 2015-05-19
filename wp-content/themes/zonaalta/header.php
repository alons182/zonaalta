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
        
        <header class="header">
            <?php get_template_part( 'templates/nav' ); ?>
            <a href="<?php echo home_url( '/' ); ?>" class="header__btn-home">Home</a>
            <div class="header__contact">
                <span><i class="icon-whatsapp"></i> (506) 8998-1098</span>
            </div>
            <a href="<?php echo home_url( '/' ); ?>" class="header__logo">Radio Zona Alta</a>
            <button id="btn-menu" class="header__btn-menu"><i class="icon-menu"></i></button>

        </header>