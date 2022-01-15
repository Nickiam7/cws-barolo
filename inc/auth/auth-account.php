<?php
/**
 * Filters
 **/
function cws_custom_login_url( $login_url, $redirect, $force_reauth ) {
   $login_url = site_url( '/account/', 'login' );
   if ( ! empty( $redirect ) ) {
      $login_url = add_query_arg( 'redirect_to', urlencode( $redirect ), $login_url );
   }
   if ( $force_reauth ) {
      $login_url = add_query_arg( 'reauth', '1', $login_url );
   }
   return $login_url;
}
add_filter( 'login_url', 'cws_custom_login_url', 10, 3 );

function cws_login_redirect( $redirect_to, $request, $user ) {
   global $pagenow;
   if (is_wp_error( $user ) ) {
      $error_types = array_keys( $user->errors );
      $error_type = 'both_empty';
      if (is_array( $error_types ) && !empty( $error_types ) ) {
         $error_type = $error_types[0];       
      }
      if('wp-login.php' == $pagenow && $_GET[ 'action' ] != 'logout') {
         wp_redirect( site_url( '/account/' ) . '?tryagain=' . cws_login_error_messages( $error_type ) );
      }
      exit;
   }
   if ( isset( $user->roles ) && is_array( $user->roles ) ) {
      if ( in_array( 'administrator', $user->roles ) ) {
         return $redirect_to;
      } else {
         return site_url( '/account/' );
      }
   } else {
      return $redirect_to;
   }
}
add_filter( 'login_redirect', 'cws_login_redirect', 10, 3 );

/**
 * Actions
 **/
function cws_redirect_wp_login_php() {
   global $pagenow;
   if( ! is_user_logged_in() ) {
      if( 'wp-login.php' == $pagenow && $_GET[ 'action' ] != "logout" && $_GET[ 'action' ] != "lostpassword" ) {
         wp_redirect( site_url('/account/') );
      }
   }
}
add_action( 'init', 'cws_redirect_wp_login_php' );

function cws_restrict_wp_admin() {
   $user = wp_get_current_user();
   if( is_admin() && $user->roles[0] != 'administrator' ) {
      wp_redirect( site_url( '/account/' ) );
   }
}
add_action( 'admin_init', 'cws_restrict_wp_admin' );

function cws_show_error_message_on_failed_login( $username ) {
   $return = login_error_messages();
   if( is_wp_error( $return ) ) {
       echo $return->get_error_message();
   }
}
add_action('wp_login_failed', 'cws_show_error_message_on_failed_login');

/**
 * Functions
 **/
function cws_login_error_messages( $error_type ) {
   if( $error_type == 'empty_password' ) {
      return '1';
   }
   if( $error_type == 'empty_username' ) {
      return '9';
   }
   if( $error_type == 'incorrect_password' ) {
      return '6';
   }
   if( $error_type == 'invalid_username' ) {
      return '4';
   }
   if( $error_type == 'both_empty' ) {
      return '2';
   }
}

function login_error_messages_front_end( $get_param ) {
   if( $get_param == 1 ) {
      echo "Invalid username or password.";
   }
   if( $get_param == 9 ) {
      echo "Invalid username or password.";
   }
   if( $get_param == 6 || $get_param == 4 ) {
      echo "Invalid username or password.";
   }
   if( $get_param == 2 ) {
      echo "Invalid username or password.";
   }
}