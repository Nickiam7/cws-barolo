<?php
/**
 * Template Name: Account Login
**/
?>

<?php get_header(); ?>
<div class="container">
   <div class="row">
      <?php if ( ! is_user_logged_in() ) : ?>
      <div class="col-md-6 offset-md-3">
         <h1 class="text-center my-5">Account Login</h1>            
         <div class="cws-auth-box px-5 py-3 mb-5"> 
            <?php if( isset( $_GET[ 'tryagain' ] ) ) : ?>
               <div class="alert alert-danger" role="alert">
                  <h3><?php login_error_messages_front_end( $_GET[ 'tryagain' ] ) ?></h3>
               </div>
            <?php endif; ?>                           
            <?php
               $args = array(
                  'echo'           => false,
                  'redirect'       =>  admin_url(), 
                  'form_id'        => 'cws-login-form',
                  'label_username' => __( 'Username' ),
                  'label_password' => __( 'Password' ),
                  'label_remember' => __( 'Remember Me' ),
                  'label_log_in'   => __( 'Login' ),
                  'remember'       => true
               );
            ?>
            <?php 
               $form = '                  
                  <form name="' . $args['form_id'] . '" id="' . $args['form_id'] . '" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
                     ' . $login_form_top . '
                     <p class="login-username">
                         <label for="' . esc_attr( $args['id_username'] ) . '">' . esc_html( $args['label_username'] ) . '</label>
                         <input type="text" name="log" id="' . esc_attr( $args['id_username'] ) . '" class="input form-control cws-form" value="' . esc_attr( $args['value_username'] ) . '" size="20" />
                     </p>
                     <p class="login-password">
                         <label for="' . esc_attr( $args['id_password'] ) . '">' . esc_html( $args['label_password'] ) . '</label>
                         <input type="password" name="pwd" id="' . esc_attr( $args['id_password'] ) . '" class="input form-control cws-form" value="" size="20" />
                     </p>
                     ' . $login_form_middle . '
                     ' . ( $args['remember'] ? '<p class="login-remember"><label><input name="rememberme" type="checkbox" id="' . esc_attr( $args['id_remember'] ) . '" value="forever"' . ( $args['value_remember'] ? ' checked="checked"' : '' ) . ' /> ' . esc_html( $args['label_remember'] ) . '</label></p>' : '' ) . '
                     <p class="login-submit">
                         <input type="submit" name="wp-submit" id="' . esc_attr( $args['id_submit'] ) . '" class="btn cws-btn-primary" value="' . esc_attr( $args['label_log_in'] ) . '" />
                         <input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />
                     </p>
                     ' . $login_form_bottom . '
                  </form>';
              ?>
            <?php echo $form; ?>
         </div>
      </div>
      <?php else : ?>
      <div class="col-md-12">
      <?php $user = wp_get_current_user() ?> 
         <h1 class="cws-section-header my-5">Welcome <?php echo esc_html( $user->user_login ) ?></h1> 
      <?php endif; ?>
      </div>
   </div>
</div>
<?php get_footer(); ?>