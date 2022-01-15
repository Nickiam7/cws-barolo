<?php    
   $location = get_post_meta( get_the_ID(), 'location', true );
   $type = get_post_meta( get_the_ID(), 'type', true );
   $phone = get_post_meta( get_the_ID(), 'phone', true );
   $hours = get_post_meta( get_the_ID(), 'hours', true );
   $wines = get_post_meta( get_the_ID(), 'location_wine', true ); 
?>
<div class="row">
   <div class="col-md-6 col-lg-8 pt-3">
      <h1 class="cws-section-header"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php if( $wines ) : ?>         
         <h2 class="text-center my-5"><?php echo esc_html( "Wines" ); ?></h2>
         <div class="row">
            <?php foreach ( $wines as $post ) : setup_postdata( $post ); ?>
            <div class="col-6 col-lg-4 mb-3">
               <div class="card card--wine">
                  <div class="card-body">
                     <?php                         
                        $the_wine = get_field( 'wine_overview' );
                        $the_wine_image = $the_wine['image']['url'];
                     ?>
                     <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url( $the_wine_image ); ?>" class="card-wine__image" alt="<?php the_title();?>" />
                     </a>
                  </div>
                  <div class="card-footer">
                     <h2 class="text-center">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                        </a>
                     </h2>
                  </div>
               </div>               
            </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
         </div>
         <div class="row">
            <div class="col">
               <p class="small text-muted mt-3"><em><svg xmlns="http://www.w3.org/2000/svg" fill="#6c757d" width="12" height="12" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2.033 16.01c.564-1.789 1.632-3.932 1.821-4.474.273-.787-.211-1.136-1.74.209l-.34-.64c1.744-1.897 5.335-2.326 4.113.613-.763 1.835-1.309 3.074-1.621 4.03-.455 1.393.694.828 1.819-.211.153.25.203.331.356.619-2.498 2.378-5.271 2.588-4.408-.146zm4.742-8.169c-.532.453-1.32.443-1.761-.022-.441-.465-.367-1.208.164-1.661.532-.453 1.32-.442 1.761.022.439.466.367 1.209-.164 1.661z"/></svg>
               Please contact <strong><?php the_title(); ?></strong> for wine availabilty and price.</em></p>
            </div>
         </div>
         <?php else : ?>
         <h2>List of available wines coming soon.</h2>
         <?php endif; ?>
   </div>
   <div class="col-md-6 col-lg-4">
      <div class="box p-0">
         <div class="acf-map acf-map--single">
            <div class="marker cws-marker" data-type="<?php echo esc_attr( $type ) ?>" data-lat="<?php echo esc_attr( $location['lat'] ) ?>" data-lng="<?php echo esc_attr( $location['lng'] ) ?>">
               <h2><?php the_title(); ?></h2>
               <p><?php echo esc_html( $location['address'] ); ?></p>
            </div>
         </div>
      </div>
      <div class="box p-2 p-md-4">
         <h2 class="sr-only"><?php the_title();?> Details</h2> 
            <dl>
               <dt>Address</dt>
               <dd>
                  <?php $location_details = explode( "," , $location['address'] ); ?>
                  <?php echo $location_details[0].', '; ?><br>
                  <?php echo $location_details[1].','.$location_details[2]; ?>   
               </dd>
               <dt>Phone</dt>
               <dd>
                  <?php echo esc_html( $phone ); ?>
               </dd>
               <dt>Hours</dt>
               <dd>
                  <?php echo esc_html( $hours ); ?>
                  <span data-toggle="tooltip" data-html="true" data-placement="top" title="Please contact <em><strong><?php the_title(); ?></strong></em> directly to confirm hours of operation.">
                     <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2.033 16.01c.564-1.789 1.632-3.932 1.821-4.474.273-.787-.211-1.136-1.74.209l-.34-.64c1.744-1.897 5.335-2.326 4.113.613-.763 1.835-1.309 3.074-1.621 4.03-.455 1.393.694.828 1.819-.211.153.25.203.331.356.619-2.498 2.378-5.271 2.588-4.408-.146zm4.742-8.169c-.532.453-1.32.443-1.761-.022-.441-.465-.367-1.208.164-1.661.532-.453 1.32-.442 1.761.022.439.466.367 1.209-.164 1.661z"/></svg>
                  </span>                  
               </dd>
            </dl>
      </div>
   </div>
</div>
