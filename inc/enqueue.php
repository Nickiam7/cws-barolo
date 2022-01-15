<?php
/**
 * Include all CSS and JavaScript files
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 * @package Barolo
 */
function barolo_scripts_and_styles() {
   wp_enqueue_style( "barolo_font", "//fonts.googleapis.com/css?family=Josefin+Sans:300,400" );
   wp_enqueue_style( "barolo_main_styles", get_template_directory_uri() . '/style.min.css', array(), '1.0.0');

   wp_enqueue_script( 'barolo_main_scripts', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), '', true );
   wp_enqueue_script( 'google_maps', '//maps.googleapis.com/maps/api/js?key=' . get_google_api_key(), NULL, '1.0', true );

   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
   }
}
add_action( "wp_enqueue_scripts", "barolo_scripts_and_styles" );

function load_icon_font_to_admin() {
  wp_register_style( 'admin_icon_font_css', get_template_directory_uri() . '/inc/cws-icon-font/css/dashicons.css', array(), '1.0.0' );
  wp_enqueue_style( 'admin_icon_font_css' );
}
add_action( 'admin_enqueue_scripts', 'load_icon_font_to_admin' );



