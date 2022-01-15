<?php
   $location = get_post_meta( get_the_ID(), 'location', true );
   $type = get_post_meta( get_the_ID(), 'type', true );
   $wines = get_post_meta( get_the_ID(), 'location_wine', true );
?>
<div class="marker cws-marker" data-type="<?php echo esc_attr( $type ) ?>" data-lat="<?php echo esc_attr( $location['lat'] ) ?>" data-lng="<?php echo esc_attr( $location['lng'] ) ?>">
   <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
   <p><?php echo esc_html( $location['address'] ); ?></p>
   <a href="<?php the_permalink(); ?>">View available wines</a>
</div>


