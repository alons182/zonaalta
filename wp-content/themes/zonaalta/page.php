<?php get_header(); ?>
<main class="main ">
            <section class="main__header">
                
                <?php if ( has_post_thumbnail() ) :

                    $id = get_post_thumbnail_id($post->ID);
                    $thumb_url = wp_get_attachment_image_src($id,'full', true);
                    ?>
                    
                    
                    <img src="<?php echo $thumb_url[0] ?>" alt="About" class="main__header__img">            
                <?php endif; ?>
      

                     

                
            </section>
            <section class="main__info inner">
                
                <article>
                    <?php get_template_part( 'templates/loop' ); ?>
                    
                </article>

            </section>
 
            
        </main>
        <?php get_template_part( 'templates/player' ); ?>
<?php get_template_part('templates/social'); ?>
<?php get_footer(); ?>        