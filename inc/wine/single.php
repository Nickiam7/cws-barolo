<?php require 'wines-variables.php'; ?>
<?php
   function producer_name() {
      $post_object = get_field( 'details' );
      if( $post_object && $post_object['producer'] ) {
         $post = $post_object;
         setup_postdata( $post );
         return $post['producer']->post_title;
      } else {
         return 'Coming Soon';
      }
   }
?>
<div itemtype="http://schema.org/Product" itemscope>
   <meta itemprop="name" content="<?php the_title(); ?>" />
<div class="row">
   <div class="col-sm-6 col-lg-4 cws-wine-single__intro">
      <h1 class="cws-section-header">
         <?php the_title(); ?> <?php echo esc_html( $vintage ? $vintage : '' ); ?>
      </h1>
      <div class="pt-3">
         <?php echo wp_kses_post( $intro ); ?>
      </div>
   </div>
   <div class="col-sm-6 col-lg-3">
      <img src="<?php echo esc_url( $image ); ?>" class="cws-wine-single__image" alt="<?php the_title(); ?>" />
   </div>
   <div class="col-lg-5 cws-wine-single__description">
      <h2 class="sr-only">Details</h2>
      <?php if( $description ) : ?>
         <?php echo wp_kses_post( $description ); ?>
      <?php endif; ?>
      <div class="box box--wine text-center my-3">
         <div class="row">
            <div class="col-sm-6"><a href="#" class="btn cws-btn-primary" data-toggle="modal" data-target=".request-wine-info"><?php echo esc_html( 'Request more info' ); ?></a></div>
            <div class="col d-sm-none d-md-none text-center py-2"><?php echo esc_html( 'OR' );?></div>
            <?php if( $tech_sheet ) : ?>
            <div class="col-sm-6"><a href="<?php echo esc_url( $tech_sheet ); ?>" class="btn btn-link secondary-link" target="_blank" rel="nofollow noopener"><?php echo esc_html( 'Download data sheet' ); ?></a></div>
            <?php else : ?>
               <div class="col-sm-6"><a href="#" class="btn btn-link secondary-link disabled" target="_blank" rel="nofollow noopener" disabled><?php echo esc_html( 'Data sheet not available' );?></a></div>
            <?php endif; ?>
         </div>
      </div>
      <?php if( have_rows( 'details' ) ) : ?>
         <?php while( have_rows( 'details' ) ) : the_row(); ?>
            <?php if( have_rows( 'wine_details' ) ) : ?>
               <div class="row">
                  <div class="col-md-6 my-2">
                     <h3 class="technical-details__label">Producer</h3>
                     <?php echo esc_html( producer_name() ); ?>
                  </div>
                  <div class="col-md-6 my-2">
                     <h3 class="technical-details__label">Location</h3>
                     <?php echo esc_html( $region ); ?>, <?php echo esc_html( $sub_region ); ?>, <?php echo esc_html( $country ); ?>
                  </div>
               <?php while( have_rows( 'wine_details' ) ) : the_row();
                  $label = get_sub_field( 'details_label' );
                  $value = get_sub_field( 'detail_value' );
               ?>
                  <div class="col-md-6 my-2">
                     <h3 class="technical-details__label"><?php echo esc_html( $label ); ?></h3>
                     <?php echo wp_kses_post( $value ); ?>
                  </div>
               <?php endwhile; ?>
               <?php wp_reset_postdata(); ?>
               </div>
            <?php endif; ?>
         <?php endwhile; ?>
      <?php endif; ?>
      <div class="row">
      <?php $awards = get_post_meta( get_the_ID(), 'the_awards', true ); ?>
      <?php if( $awards ) : ?>
         <div class="col-12 mt-3">
            <h2>Awards</h2>
         </div>
         <?php for( $i = 0; $i < $awards; $i++ ) :
             $award = get_post_meta( get_the_ID(), 'the_awards_' . $i . '_award', true );
          ?>
          <div class="col-12 my-1">
            <em><?php echo esc_html($award); ?></em>
         </div>
         <?php endfor; ?>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>
      </div>
   </div>
</div>
</div>
<div id="wine-request" class="modal fade request-wine-info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title"><?php the_title(); ?></h3>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-8">
                     <?php echo wp_kses_post("<p>Thank you for your interest in <strong>" . get_the_title() . "</strong>. Please fill out the form below and we'll get back to you as soon as possible.</p>"); ?>
                     <?php echo do_shortcode( $request_wine_info_form ); ?>
                  </div>
                  <div class="col-md-4">
                     <img src="<?php echo esc_url( $image ) ?>" class="cws-wine-single__image" alt="<?php the_title(); ?>" />
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn cws-btn-outline-primary" data-dismiss="modal"><?php echo esc_html( 'Cancel' ); ?></button>
         </div>
      </div>
    </div>
  </div>
</div>

<script>
(function($) {
   $('#wine-request').on('shown.bs.modal', function() {
      $('input[name="email_subject"]').val("<?php echo esc_html( 'Request Info: ' ); ?> <?php the_title(); ?>");
      $('#first').focus();
   });
   document.addEventListener( 'wpcf7mailsent', function(event) {
      window.setTimeout(function() {
         $('.wpcf7-response-output').removeAttr("style");
         $('#wine-request').modal('hide');
      }, 3000);
   }, false);
})(jQuery);
</script>
