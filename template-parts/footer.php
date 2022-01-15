<?php
/**
 * Contains the actual content of the footer
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Barolo
 */
?>
<?php  
   $logo_group = get_field('logo_group', 'option');
   $logo_navbar = $logo_group['navbar_logo'];
   $logo_footer = $logo_group['footer_logo'];         
   $footer_logo = $logo_footer ? $logo_footer : $logo_navbar;
?>
<div class="main-footer">
   <div class="row">
      <div class="col-12 col-md-1">            
         <a href="<?php echo esc_url( home_url( '/' ) ); ?>">            
            <img src="<?php echo esc_url( $footer_logo ); ?>" alt="Classic Wine Selections" class="logo mb-4">
         </a>
      </div>
      <div class="col-4 col-md-2 offset-md-1 footer-menu">
         <?php dynamic_sidebar( 'footer-1' ); ?>
      </div>
      <div class="col-4 col-md-2 footer-menu">
         <?php dynamic_sidebar( 'footer-2' ); ?>
      </div>
      <div class="col-4 col-md-2 footer-menu">
         <?php dynamic_sidebar( 'footer-3' ); ?>
      </div>
      <div class="col-md-4 footer-menu">
         <?php dynamic_sidebar( 'footer-4' ); ?>
      </div>
   </div>
</div>
<div class="sub-footer">
   <div class="row">
      <div class="col-sm-6">
          Copyright &copy; <?php echo date(" Y "); bloginfo( 'name' ); ?>
      </div>
      <div class="col-sm-6 legal">
         <?php dynamic_sidebar( 'footer-5' ); ?>
      </div>
   </div>
</div>