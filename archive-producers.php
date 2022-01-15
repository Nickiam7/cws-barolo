<?php
/**
 * Producers Archive page. Calls in query template
 * @link https://developer.wordpress.org/themes/template-files-section/
 * @package Barolo
 */
?>
<?php get_header(); ?>

<main>
<section class="section">
   <div class="container">
      <h1 class="cws-section-header"><?php echo esc_html( 'Our Producers' ); ?></h1>
      <div class="row">
         <div class="col-lg-9 pt-2 facetwp-template order-2 order-lg-1">
            <?php if ( have_posts() ) : ?>
            <div class="row">
               <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part( 'inc/producer/archive' );  ?>
               <?php endwhile; ?>
            </div>
            <div class="d-flex justify-content-center">   
               <?php echo facetwp_display( 'pager' ); ?>
            </div>
            <?php else : ?>
               <h2 class="text-center mt-5"><?php echo esc_html( 'Sorry, no producers found.' ); ?></h2> 
               <p class="text-center"><?php echo esc_html( 'Please double check your search and filters.' );?></p>
            <?php endif; ?>
         </div>
         <div class="col-lg-3 order-1 order-lg-2">
            <div class="filters">
               <?php if( class_exists( 'FacetWP' ) ) : ?>
                  <?php dynamic_sidebar( 'producer-archive-sidebar' ); ?>
                  <div class="text-center">
                     <p onclick="FWP.reset()" class="btn btn-link secondary-link mb-0"><small><?php echo esc_html( 'Reset Search' );?></small></p>
                  </div>
               <?php else : ?>
                  <p><?php echo esc_html( 'Filters Currently Not Available' );?></p>
               <?php endif; ?>
            </div>
         </div>
      </div>   
   </div>
</section>
</main>
<script>
(function($) {
  $(document).on('facetwp-loaded', function() {
    if (FWP.loaded) {
      $('html, body').animate({
        scrollTop: $('.facetwp-template').offset().top - 100
      }, 500);
    }
  });
})(jQuery);
</script>
<?php get_footer(); ?>
