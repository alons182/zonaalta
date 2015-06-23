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
       

        </div>
    </div>

    <?php get_template_part( 'templates/ads' ); ?>
    
</main>

        <?php get_template_part( 'templates/social' ); ?>
        <div class="floral"></div>
<?php get_footer(); ?>