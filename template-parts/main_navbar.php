<nav class="navbar navbar-expand-md navbar-light navbar-off-white">
   <div class="container">
      <?php  
         $logo_group = get_field('logo_group', 'option');
         $logo = $logo_group['navbar_logo'];         
      ?>
      <?php if($logo) : ?>
         <div class="navbar-brand mb-0">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
               <img src="<?php echo esc_url( $logo ); ?>" alt="Classic Wine Selections"> 
            </a>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="d-none d-sm-none d-md-block">   <?php _e( bloginfo( 'name' ) ); ?>
            </a>
         </div>
      <?php else : ?>
         <div class="navbar-brand mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php _e( bloginfo( 'name' ) ); ?></a></div>
      <?php endif; ?>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="sr-only">Toggle navigation</span>
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <?php
            $args = array(
               'theme_location' => 'main_navbar',
               'depth'          => 2,
               'container'      => false,
               'menu_class'     => 'navbar-nav ml-auto',
               'walker'         => new Bootstrap_Walker_Nav_Menu()
            );
            if ( has_nav_menu( 'main_navbar' ) ) {
               wp_nav_menu( $args );
            }
         ?>
      </div>
   </div>
</nav>