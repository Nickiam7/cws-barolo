<?php
/**
 * Template Name: Home Page
 */
add_action( 'wp_head', function() {
   $hero = get_field( 'hero' );
   $featured_wine = get_field( 'featured_wine' );       
   $hero_background_image = $hero['hero_background_image'];
   $featured_wine_bottle = $featured_wine['featured_wine_image']['url'];
?>
<style type="text/css">
   .hero {
      background-image: url(<?php echo esc_url( $hero_background_image['sizes']['medium'] ); ?>);
   }
   @media(min-width: 768px) {
      .hero {
         background-image: url(<?php echo esc_url( $hero_background_image['url'] ); ?>);
      }
   }
   .featured_wine__bottle {
      background-image: url(<?php echo esc_url( $featured_wine_bottle ); ?>);
   } 
   .section {
     padding-top: 75px;
     padding-bottom: 75px;
   } 
</style>
<?php });
get_header(); ?>
<main>
   <section class="section hero">
   <?php if( have_rows('hero') ) : ?>
      <?php while( have_rows('hero') ) : the_row() ?>
         <?php
            $header = get_sub_field('header');
            $intro_text = get_sub_field('intro_text');
         ?>          
         <div class="container">
            <h2 class="hero__heading"><?php echo wp_kses_post( $header ); ?></h2>
            <p class="hero__intro"><?php echo wp_kses_post( $intro_text ); ?></p>
         </div>
      <?php endwhile; ?>
   <?php endif; ?>
   </section>
   <section class="section">
      <?php $featured_wine = get_field( 'featured_wine' );  ?>
      <div class="container">
         <div class="row align-items-center-lg-top-sm">
            <div class="col-md-5">
               <h1 class="featured_wine__heading cws-section-header"><?php echo esc_html( $featured_wine['title'] ) ?></h1>
               <p><?php echo esc_html( $featured_wine['description'] ) ?></p>            
               <div class="row">
                  <div class="col">
                     <?php
                        $cta_label = $featured_wine['cta_label'];
                        $cta_url = $featured_wine['cta_url'];
                     ?>
                     <div class="btn-group mt-3 d-none d-md-block d-lg-block d-xl-block" role="group" aria-label="Wine information">
                       <a href="<?php echo esc_url( $cta_url ); ?>" class="btn cws-btn-primary"><?php echo esc_html( $cta_label ); ?></a>
                       <a href="<?php echo esc_url( home_url( '/wines' ) ); ?>" class="btn btn-link secondary-link pl-4"><?php echo esc_html( "See all of our wines" ) ?></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-2">
               <div class="featured_wine__bottle"></div>         
            </div>
            <div class="col-md-5">
               <?php if( !have_rows( 'featured_wine' ) ) { return false; } ?>
               <?php if( have_rows( 'featured_wine' ) ) : ?>
                  <?php while( have_rows( 'featured_wine' ) ) : the_row(); ?>
                     <?php if( have_rows( 'tech_details' ) ) : ?>
                        <h2 class="technical-details__heading"><?php echo esc_html( "Details:" ); ?></h2>
                        <div class="row">
                        <?php while( have_rows( 'tech_details' ) ) : the_row();
                           $label = get_sub_field( 'label' );
                           $value = get_sub_field( 'value' ); 
                        ?>
                           <div class="col-lg-6 my-2">
                              <h3 class="technical-details__label"><?php echo esc_html( $label ); ?></h3>
                              <?php echo esc_html( $value ); ?>
                           </div>
                        <?php endwhile; ?>
                        </div>
                     <?php endif; ?>
                  <?php endwhile; ?>
               <?php endif; ?>
               <div class="btn-group mt-3 d-md-none" role="group" aria-label="Wine information">
                 <a href="<?php echo esc_url( $cta_url ); ?>" class="btn cws-btn-primary"><?php echo esc_html( $cta_label ); ?></a>
                 <a href="<?php echo esc_url( home_url( '/wines' ) ); ?>" class="btn btn-link secondary-link pl-4"><?php echo esc_html( "See all of our wines" ) ?></a>
               </div>
            </div>
         </div>
      </div>
   </section> 
   <?php $about_cws = get_field( 'about_cws' ); ?>
   <?php if( $about_cws['visibility'] ) : ?>
   <section class="section section--primary">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6">          
               <div class="box">
                  <h2><?php echo esc_html( $about_cws['about_heading'] ); ?></h2>
                  <p class="my-4"><?php echo esc_html( $about_cws['about_paragraph'] ); ?></p>
                  <?php if( $about_cws['cta_label'] ) : ?>
                     <a href="<?php echo esc_url( $about_cws['cta_url'] ); ?>" class="secondary-link"><?php echo esc_html( $about_cws['cta_label'] ); ?></a>
                  <?php endif; ?>
               </div>
            </div>
            <div class="col-md-6">
               <?php                 
                  $number_of_wines = wp_count_posts('wines')->publish;
                  $number_of_producers = wp_count_posts('producers')->publish;
                  $number_of_locations = wp_count_posts('locations')->publish;
               ?>
               <div class="text-center pt-4 pt-md-0">
                  <?php $stats_intro = get_post_meta(get_the_ID(), "about_cws_stats_intro", true); ?>
                  <p><?php echo wp_kses_post( $stats_intro ); ?></p>
               </div>               
               <div class="cws-stats">
                  <div class="cws-stat">
                     <div class="cws-stat__number">
                        <?php echo esc_html( $number_of_wines ); ?>
                     </div>
                     <div class="cws-stat__type">
                        <a href="<?php echo esc_url( site_url( "/wines/" ) ); ?>">Wines</a>
                     </div>
                  </div>
                  <div class="cws-stat">
                     <div class="cws-stat__number">
                        <?php echo esc_html( $number_of_producers ); ?>
                     </div>
                     <div class="cws-stat__type">
                        <a href="<?php echo esc_url( site_url( "/producers/" ) ); ?>">Producers</a>
                     </div>
                  </div>                  
                  <div class="cws-stat">
                     <div class="cws-stat__number">
                        <?php echo esc_html( $number_of_locations ); ?>
                     </div>
                     <div class="cws-stat__type">
                        <a href="<?php echo esc_url( site_url( "/locations/" ) ); ?>">Locations</a>
                     </div>
                  </div>                  
               </div>
            </div>
         </div>
      </div>
   </section>   <section class="section">
      <div class="container">
         <h2 class="cws-section-header"><?php echo esc_html("New Wines"); ?></h2>
         <?php
            $args = array(
               "post_type" => "wines",
               "posts_per_page" => 4,
               "order" => "date",
               "orderby" => "DESC"
            );
            $recent_wines = new WP_Query($args);            
         ?>
         <div class="row">
            <?php while( $recent_wines->have_posts() ) : $recent_wines->the_post(); 
               $wine_overview = get_field( 'wine_overview' );
               $image = $wine_overview['image']['sizes']['medium_large'];
            ?>
               <div class="col-6 col-lg-3 mb-3">            
                  <div class="card card--wine">
                     <div class="card-body">
                        <a href="<?php the_permalink(); ?>">
                           <img src="<?php echo esc_url( $image ); ?>" class="card-wine__image" alt="<?php the_title(); ?>"/>
                        </a>
                     </div>
                     <div class="card-footer">
                        <h2 class="text-center">
                           <a href="<?php the_permalink(); ?>">
                              <?php the_title(); ?>
                           </a>
                        </h2>
                     </div>
                  </div>
               </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
         </div>
         <div class="row">
            <div class="col text-center">               
               <a href="<?php echo esc_url( site_url( "/wines" ) ); ?>" class="btn btn-lg cws-btn-primary">View all our wines</a>
            </div>
         </div>
      </div>
   </section>
   <?php endif; ?>
</main>
<?php get_footer(); ?>