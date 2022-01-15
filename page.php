<?php get_header(); ?>
<main>
<div class="section">
   <div class="container">
      <div class="row">
         <div class="col">            
            <?php if ( have_posts() ) : ?>
               <?php while ( have_posts() ) : the_post(); ?> 
                  <h1 class="cws-section-header"><?php the_title(); ?></h1>
                  <p><?php the_content(); ?></p>
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
      </div>
   </div>
</div>
</main>
<?php get_footer(); ?>