<?php
/**
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Barolo
 */
?>
</div>   
<footer role="contentinfo">
   <div class="container">
      <?php get_template_part( 'template-parts/footer' );  ?>
      <?php if( is_user_logged_in() ) : ?>
         <a href="<?php echo wp_logout_url(); ?>">Logout</a> | <a href="<?php echo site_url('/account/') ?>">Account</a>
      <?php endif; ?>
      <?php if( current_user_can('administrator') ) : ?>
         | <a href="<?php echo esc_url( admin_url() ); ?>">Admin</a>
      <?php endif; ?>
   </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
