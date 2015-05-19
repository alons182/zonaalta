<?php get_header(); ?>
<main class="main wrapper">
            <div class="main__player">
                <img src="<?php echo get_template_directory_uri(); ?>/img/player.png" alt="Player" />
            </div>
            <div class="main__slider">
                <div class="cycle-slideshow"  data-cycle-timeout="4000"  data-cycle-slides=".main__slider__slide">
                
                <div class="main__slider__slide" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/home_bg1.jpg);" data-cycle-fx="tileSlide" data-cycle-tile-vertical="false">
                    
                </div>
                <div class="main__slider__slide" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/home_bg2.jpg);"  data-cycle-fx="tileBlind" data-cycle-tile-count="12">
                     

                </div>

            </div>
            
        </main>
<?php get_footer(); ?>