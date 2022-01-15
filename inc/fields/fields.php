<?php 
function my_acf_settings_path( $path ) {
   $path = get_stylesheet_directory() . '/inc/fields/';
   return $path;
}
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_dir( $dir ) {
   $dir = get_stylesheet_directory_uri() . '/inc/fields/';    
   return $dir;    
}
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
//Hide
// add_filter('acf/settings/show_admin', '__return_false');
 
function my_acf_json_save_point( $path ) {
   $path = get_stylesheet_directory() . '/inc/fields/json-fields'; 
   return $path;
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_init() {  
   acf_update_setting('google_api_key', 'AIzaSyBncsvW-036sOomRU61_F79uW9UHC0E_1A');
}
add_action('acf/init', 'my_acf_init');

include_once( get_stylesheet_directory() . '/inc/fields/acf.php' );