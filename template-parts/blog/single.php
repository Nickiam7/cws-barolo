<?php
   $categories = get_the_category();
   if ( ! empty( $categories ) ) {
   $the_category = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
   }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
   <div class="cws-section-header">
      <h1><?php the_title(); ?></h1>
      <p class="post-meta pb-3 text-muted">Posted by <?php echo esc_html( get_the_author() ); ?> on <?php echo esc_html( get_the_date() ); ?> in <?php echo $the_category; ?></p>
   </div>

   <p><?php the_content(); ?></p>
   <div class="row nav-links">
      <div class="col nav-previous">         
         <?php previous_post_link(); ?> 
      </div>
      <div class="col nav-next">         
         <?php next_post_link(); ?> 
      </div>
   </div>
</article>

<?php if( comments_open() || get_comments_number() ) : ?>
   <?php comments_template('' , true ); ?>
<?php endif; ?>