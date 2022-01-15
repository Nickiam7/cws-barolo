<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Barolo
 */
?>
<?php get_header(); ?>

<main>
<section class="section">
   <div class="container">
      <div class="row">
      <div class="col-md-10 offset-md-1">
      <h1 class="cws-section-header">Sorry, we could’t find the page you were looking for.</h1>
      <p class="my-5">If you need help please feel free to reach out to us from the <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact page</a>. We’ll get back to you as soon as possible. Meanwhile, you can try checking out the resources below.</p>
      <div class="row">
         <div class="col-md-4">
            <h2>Wines</h2>
            <p>Browse through our collection of classic wines.</p>
            <p><a href="<?php echo esc_url( home_url( '/wines' ) ); ?>">Browse our Wines</a></p>
         </div>
         <div class="col-md-4">
            <h2>Producers</h2>
            <p>View all our incredible producers. Learn about where they’re from, their wines and how they produce all ther amazing wines.</p>
            <p><a href="<?php echo esc_url( home_url( '/producers' ) ); ?>">See our Producers</a></p>
         </div>
         <div class="col-md-4">
            <h2>Blog</h2>
            <p>Stay current with everythig that’s happening with Classic Wines Selections. Learn about events, new wines and more.</p>
            <p><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Go to the Blog</a></p>
         </div>
      </div>
      </div>
      </div>
   </div>
</section>
</main>
<?php get_footer(); ?>