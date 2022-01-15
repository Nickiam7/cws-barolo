<?php
/**
 * Wine Locations Archive page. Calls in query template
 * @link https://developer.wordpress.org/themes/template-files-section/
 * @package Barolo
 */
?>
<?php get_header(); ?>
<main>
<section class="section">
   <div class="container">
      <h1 class="cws-section-header"><?php echo esc_html( 'Locate Our Wines'); ?></h1>
      <div class="row">          
         <div class="col-lg-12">            
            <?php $number_of_locations = wp_count_posts('locations')->publish; ?>
            <p>You can find our wines at top restaurants and popular retail stores all around the Chicagoland area. If you can't find what you are looking for, please <a href="<?php echo site_url("/contact"); ?>">contact us</a> and we'll do what we can to help.</p>
            <div class="row">
               <div class="col-lg-4">
                  <h2 class="type-count"><strong>Viewing:</strong> <?php echo esc_html( $number_of_locations ); ?> Locations</h2>
               </div>
               <div class="col-lg-8 align-self-center">
                  <div class="marker-filter">
                     <h3 class="d-inline-block mt-lg-4 mr-2">Filters</h3>
                     <span class="filter-box">
                        <label for="all" class="cws-border-right">
                           <input class="location-filter facetwp-radio" type="radio" name="wine-filter" value="all" id="all" checked> 
                           All
                        </label>
                     </span>
                     <span class="filter-box">
                        <label for="restaurant" class="cws-border-right">
                           <input class="location-filter" type="radio" name="wine-filter" value="restaurant" id="restaurant"> 
                           Restaurants
                        </label>
                     </span>
                     <span class="filter-box">
                        <label for="store" class="cws-border-right">
                           <input class="location-filter" type="radio" name="wine-filter" value="store" id="store"> 
                           Stores
                        </label>
                     </span>
                  </div>
               </div>
            </div>
            <?php if ( have_posts() ) : ?>            
            <div class="acf-map box box__map">
               <?php while ( have_posts() ) : the_post(); ?>               
                  <?php get_template_part( 'inc/location/archive' );  ?>
               <?php endwhile; ?>
            </div>
            <?php endif; ?>         
         </div>                
      </div>            
   </div>
</section>
</main>
<?php get_footer() ?>