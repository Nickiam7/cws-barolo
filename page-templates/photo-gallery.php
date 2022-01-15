<?php
/**
 * Template Name: Photo Gallery
 */
require 'variables/photo-gallery-variables.php';
?>
<?php get_header(); ?>
<main>
<section class="section">
   <div class="container">
      <?php if( have_posts() ) : ?>
         <?php while( have_posts() ) : the_post(); ?>
            <h1 class="cws-section-header"><?php the_title(); ?></h1>
            <?php if( $photo_intro ) : ?>
               <p><?php echo esc_html( $photo_intro ); ?></p>
            <?php endif; ?>
         <?php endwhile; ?>
      <?php endif; ?>
   </div>
   <div class="container">
   <?php if( $photo_gallery ) : ?>
      <div class="row">
      <?php foreach( $photo_gallery as $photo ): ?>
         <div class="col-md-6 col-lg-3 gallery-image">
            <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" data-zoom="zoom" class="photo-image" />
            <p class="photo-caption"><?php echo $photo['caption']; ?></p>
         </div>
      <?php endforeach; ?>
      </div>
   <?php endif; ?>
   </div>
</section>
</main>
<?php get_footer(); ?>
