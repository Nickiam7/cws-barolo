<?php require 'producers-variables.php'; ?>
<h1 class="cws-section-header"><?php the_title(); ?></h1>
<div class="row">
   <div class="col-md-6 col-lg-8 pt-3">
      <?php echo wp_kses_post( $description ); ?>

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
      <?php endif; ?>

   </div>
   <div class="col-md-6 col-lg-4">
      <div class="box box--padding-sm producers-details">
         <h2 class="sr-only">Producer Details</h2>
         <h3 class="producer__subheading"><?php echo esc_html( "Location" ); ?></h3>
         <p class="producer__sub-text"><?php echo esc_html( $region ); ?>, <?php echo esc_html( $sub_region ); ?>, <?php echo esc_html( $country ); ?></p>
         <?php if( !have_rows( 'overview' ) ) { return false; } ?>
         <?php if( have_rows( 'overview' ) ) : ?>
            <?php while( have_rows( 'overview' ) ) : the_row(); ?>
               <?php if( have_rows( 'attributes' ) ) : ?>
                  <?php while( have_rows( 'attributes' ) ) : the_row();
                     $label = get_sub_field( 'attribute_label' );
                     $value = get_sub_field( 'attribute_value' );
                  ?>
                  <h3 class="producer__subheading"><?php echo esc_html( $label ); ?></h3>
                  <p class="producer__sub-text"><?php echo esc_html( $value ); ?></p>
                  <?php endwhile; ?>
               <?php endif; ?>
            <?php endwhile; ?>
         <?php endif; ?>
      </div>
   </div>
</div>
