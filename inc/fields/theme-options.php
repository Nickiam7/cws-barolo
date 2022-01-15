<?php 

if( function_exists('acf_add_options_page') ) {

   $args = array(
      'page_title'      => 'Barolo Theme Options',
      'menu_title'      => 'Barolo Options',
      'menu_slug'       => 'barolo-options',
      'capability'      => 'edit_posts',
      'icon_url'        => 'dashicons-cws_logo_sm',
      'position'        => '2',
      'update_button'   => __('Publish', 'acf'),
      'redirect'        => false,      
      'updated_message' => __("Success: Theme options have been published.", 'acf'),
   );

   acf_add_options_page($args); 
}