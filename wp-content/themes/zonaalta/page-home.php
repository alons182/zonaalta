<?php 
    /*
    Template Name: Page Home
     */
 ?>
<?php get_header(); ?>
<main class="main wrapper">
             <?php get_template_part( 'templates/player' ); ?>
            
            <div class="main__slider">
                <div class="cycle-slideshow"  data-cycle-timeout="4000"  data-cycle-slides=".main__slider__slide">
                
                <div class="main__slider__slide" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/home_bg1.jpg);" data-cycle-fx="tileSlide" data-cycle-tile-vertical="false"></div>
                <div class="main__slider__slide" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/home_bg2.jpg);"  data-cycle-fx="tileBlind" data-cycle-tile-count="12"></div>
                <div class="main__slider__slide" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/home_bg3.jpg);"  data-cycle-fx="tileBlind" data-cycle-tile-count="12"></div>
                <div class="main__slider__slide" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/home_bg4.jpg);"  data-cycle-fx="tileBlind" data-cycle-tile-count="12"></div>
                <div class="main__slider__slide" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/home_bg5.jpg);"  data-cycle-fx="tileBlind" data-cycle-tile-count="12"></div>

            </div>
            
        </main>

        <?php get_template_part( 'templates/social' ); ?>
        <div class="floral"></div>
<?php get_footer(); ?>