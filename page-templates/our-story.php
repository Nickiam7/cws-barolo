<?php
/**
 * Template Name: Our Story
**/
require 'variables/our-strory-variables.php';
?>
<?php get_header(); ?>
<main>
   <section class="section pb-0">
      <div class="container">
      <?php if( have_posts() ) : ?>
         <?php while( have_posts() ) : the_post(); ?>
            <h1 class="cws-section-header"><?php the_title(); ?></h1>
            <p><?php echo wp_kses_post( $intro ); ?></p>
         <?php endwhile; ?>
      <?php endif; ?>
      </div>
   </section>
   <section class="section">
      <div class="container">
         <h2 class="mb-5 text-center"><?php echo esc_html( "The Team" ); ?></h2>
         <div class="row">
            <?php if( have_rows( 'team_group' ) ) : ?>
               <?php while( have_rows( 'team_group' ) ) : the_row(); ?>
                     <?php if( have_rows( 'team_member' ) ) : ?>
                        <?php while( have_rows( 'team_member' ) ) : the_row();
                           $name = get_sub_field( 'name' );
                           $image = get_sub_field( 'image' );
                           $title = get_sub_field( 'title' );
                           $bio = get_sub_field( 'bio' );
                        ?>
                        <div class="col-md-3">
                           <img src="<?php echo esc_html( $image ); ?>" class="img-fluid border mb-5 mx-auto d-block" alt="" />
                        </div>
                        <div class="col-md-9 mb-5">
                           <h2 class="mb-0"><?php echo esc_html( $name ); ?></h2>
                           <?php if( $title ) : ?>
                              <p><em><?php echo esc_html( $title ); ?></em></p>
                           <?php endif; ?>
                           <?php echo wp_kses_post( $bio ); ?>
                        </div>
                        <?php endwhile; ?>
                     <?php endif; ?>
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
      </div>
   </section>
</main>
<?php get_footer(); ?>
