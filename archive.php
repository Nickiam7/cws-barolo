<?php get_header(); ?>
<?php
   $categories = get_the_category();
   if ( ! empty( $categories ) ) {
   $the_category = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
   }
?>
<?php 
   $blog_class = is_single() ? "blog-single" : "blog-archive";
?>
<main class="<?php echo esc_attr( $blog_class ) ?>">
<div class="section mt-3">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 mb-4">
            <h1 class="cws-section-header"><?php echo esc_html( 'Blog Archive:' );?> <?php single_cat_title(); ?></h1>
            <?php if ( have_posts() ) : ?>
               <?php while ( have_posts() ) : the_post(); ?>                  
                  <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                     <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                     <p class="post-meta pb-3 text-muted">Posted by <strong><?php echo esc_html( get_the_author() ); ?></strong> on <strong><?php echo esc_html( get_the_date() ); ?></strong> in <?php echo $the_category; ?> &bull; <strong><?php comments_number(); ?></strong></p>
                     <p><?php the_excerpt(); ?></p>
                  </article>
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
         <div class="col-lg-3 sidebar">            
            <?php dynamic_sidebar( 'blog-both-sidebar' ); ?>               
         </div>
      </div>
   </div>
</div>
</main>
<?php get_footer(); ?>