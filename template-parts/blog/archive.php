<?php
   $categories = get_the_category();
   if ( ! empty( $categories ) ) {
   $the_category = '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
   }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
   <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
   <p class="post-meta pb-3 text-muted">Posted by <strong><?php echo esc_html( get_the_author() ); ?></strong> on <strong><?php echo esc_html( get_the_date() ); ?></strong> in <?php echo $the_category; ?> &bull; <strong><?php comments_number(); ?></strong></p>
   <p><?php the_excerpt(); ?></p>
</article>