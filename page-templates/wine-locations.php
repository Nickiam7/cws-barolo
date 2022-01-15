<?php
/**
 * Template Name: Wine Locations
 */
require 'variables/wine-locations-variables.php';
?>
<?php get_header(); ?>
<main>
<section class="section">
   <div class="container">
      <h1 class="cws-section-header"><?php the_title(); ?></h1>
      <p><?php echo wp_kses_post( $wine_locations_intro ); ?></p>
      <div class="row mt-5 box">
         <?php if( $wine_locations ) : ?>
            <?php for( $i = 0; $i <  $wine_locations; $i++ ) :
               $name = esc_html( get_post_meta( get_the_ID(), 'wine_locations_location_' . $i . '_wine_location_name', true ) );
               $link = esc_html( get_post_meta( get_the_ID(), 'wine_locations_location_' . $i . '_wine_location_link', true ) );
               $address_1 = esc_html( get_post_meta( get_the_ID(), 'wine_locations_location_' . $i . '_wine_location_address_1', true ) );
               $address_2 = esc_html( get_post_meta( get_the_ID(), 'wine_locations_location_' . $i . '_wine_location_address_2', true ) );
               $address_3 = esc_html( get_post_meta( get_the_ID(), 'wine_locations_location_' . $i . '_wine_location_address_3', true ) );
               $description = esc_html( get_post_meta( get_the_ID(), 'wine_locations_location_' . $i . '_wine_location_description', true ) );
            ?>
               <div class="col-md-6">
                  <div class="wine-location">
                     <h2><?php echo esc_html( $name ); ?></h2>
                     <p class="wine-location__address">
                        <?php echo esc_html( $address_1 ); ?>
                        <?php echo esc_html( $address_2 ); ?>
                        <?php echo esc_html( $address_3 ); ?>
                     </p>
                     <?php if( $description ) : ?>
                        <p><?php echo esc_html( $description ); ?></p>
                     <?php endif; ?>
                     <?php if( $link ) : ?>
                        <p><a href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener"><strong><?php echo esc_html( $name ); ?></strong></a></p>
                     <?php endif; ?>
                  </div>
               </div>
            <?php endfor; ?>
         <?php endif; ?>
      </div>
   </div>
</section>
</main>
<?php get_footer(); ?>
