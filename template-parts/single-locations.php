<?php
/**
 * Wines Single. Calls in query template
 * @link https://developer.wordpress.org/themes/template-files-section/
 * @package Barolo
 */
?>
<?php get_header(); ?>
<main>
<section class="section pb-0">
   <div class="container">
   <?php
      if ( function_exists('yoast_breadcrumb') ) {
         yoast_breadcrumb( '<p class="small" id="breadcrumbs">','</p>' );
      }
   ?>
   </div>
</section>
<section class="section section--m-lg">
   <div class="container">       
   <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'inc/location/single' );  ?>
   <?php endwhile; ?>
   </div>
</section>
</main>
<?php get_footer(); ?>