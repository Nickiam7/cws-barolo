<?php
/**
 * Template Name: Contact Us
**/
require 'variables/contact-us-variables.php';
?>
<?php get_header(); ?>
<main>
   <section class="section pb-0">
      <div class="container">
      <?php if( have_posts() ) : ?>
         <?php while( have_posts() ) : the_post(); ?>
            <h1 class="cws-section-header"><?php the_title(); ?></h1>
         <?php endwhile; ?>
      <?php endif; ?>
      </div>
   </section>
   <section class="section">
      <div class="container">
         <div class="row">
            <div class="col-lg-5">
               <div class="box mb-5">
                  <div class="cws-section-header">
                     <h2><?php echo esc_html( $contact_headign ); ?></h2>
                     <p>
                        <?php echo esc_html( $contact_address1 ); ?><br>
                        <?php echo esc_html( $contact_address2 ); ?><br>
                        <?php echo esc_html( $contact_address3 ); ?>
                     </p>
                  </div>
                  <p class="small mb-0">
                     <img src="<?php echo esc_html( $phone_icon); ?>" alt="" /> <?php echo esc_html( $contact_phone ); ?><br>
                      <img src="<?php echo esc_html( $email_icon); ?>" alt="" /> <a href="mailto:<?php echo esc_html( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a><br>
                  </p>
               </div>
               <?php if( $contact_message_below_contact_info ) : ?>
               <div class="mt-3 px-3">
                  <p><?php echo wp_kses_post( $contact_message_below_contact_info ); ?></p>
               </div>
               <?php endif; ?>
            </div>
            <div class="col-lg-6 offset-lg-1">
               <p><?php echo esc_html( $contact_intro ); ?></p>
               <?php if( $contact_contact_form ) : ?>
                  <?php echo do_shortcode( $contact_contact_form ); ?>
               <?php else : ?>
                  <h2>Contact us</h2>
                  <a href="mailto:<?php echo esc_html( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </section>
</main>
<?php get_footer(); ?>
