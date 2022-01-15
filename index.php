<?php
/**
 * Main fall back template if nothing more specific is declared
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Barolo
 */
?>
<?php get_header(); ?>
<?php 
   $blog_class = is_single() ? "blog-single" : "blog-archive";
?>
<main class="<?php echo esc_attr( $blog_class ) ?>">
<div class="section mt-3">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 mb-4">
            <h1 class="sr-only">Blog</h1>
            <?php if ( have_posts() ) : ?>
               <?php while ( have_posts() ) : the_post(); ?>
                  <?php if( is_single() ) : ?>
                     <?php get_template_part( 'template-parts/blog/single' );  ?>
                  <?php endif; ?>
                  <?php if( is_home() ) : ?>
                     <?php get_template_part( 'template-parts/blog/archive' );  ?>
                  <?php endif; ?>
               <?php endwhile; ?>
               <div class="d-flex justify-content-start">   
                  <?php 
                     $args = array(
                        'mid_size' => 3,
                     );
                     the_posts_pagination($args);
                  ?>
               </div>
            <?php else : ?>
               <h1>Sorry no posts yet. Check back soon!</h1>      
            <?php endif; ?>
         </div>
         <div class="col-lg-3 sidebar">            
            <?php dynamic_sidebar( 'blog-both-sidebar' ); ?>
            <?php if( is_single() ) : ?>
               <?php dynamic_sidebar( 'blog-single-only-sidebar' ); ?>
            <?php endif; ?>
            <?php if( is_home() ) : ?>
               <?php dynamic_sidebar( 'blog-archive-only-sidebar' ); ?>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>
</main>
<?php get_footer(); ?>
