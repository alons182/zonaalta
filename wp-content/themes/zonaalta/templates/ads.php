 

 <div class="main__ads">
        <div class="cycle-slideshow"  data-cycle-timeout="4000"  data-cycle-slides=".main__ads__slide">
        	
			<?php
			    $args = array(
			      'post_type' => 'ads',
			      			      
			    );
			    $projects = new WP_Query( $args );
			    if( $projects->have_posts() ) {
			      while( $projects->have_posts() ) {
			        $projects->the_post();
					
					$images = rwmb_meta( 'rw_ad_image', 'type=image&size=full' );
					$url = rwmb_meta( 'rw_ad_url');
			        ?>
			           
			             <div class="main__ads__slide">
				        	<a href="<?php echo $url; ?>" target="_blank" title="<?php the_title(); ?>">
				        	<?php 								
								
								if ( $images ) : ?>
									<?php 
											

											foreach ( $images as $image )
											{
											    
											    echo "<img src=".$image['url']." alt='Anuncio' />";
											}
											
										?>
				        	
								<?php endif; ?>
				        	</a>
				        </div>


			          
			        <?php
			      }
			    }
			    else {
			      echo 'No projects!';
			    }
			  ?>

	       
       </div>
       

    </div>