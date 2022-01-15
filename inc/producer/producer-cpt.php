<?php
/*
 * Creates Producers
 */

function barolo_producers_custom_post_type() {
   $singular = "Producer";
   $plural = "Producers";

   $labels = array(
      'name'               => $plural,
      'singilar_name'      => $singular,
      'all_items'          => 'All ' . $plural,
      'add_name'           => 'Add New ' . $singular,
      'add_new_item'       => 'Add New ' . $singular,
      'edit'               => 'Edit',
      'edit_item'          => 'Edit ' . $singular,
      'new_item'           => 'New ' . $singular,
      'view'               => 'View ' . $singular,
      'view_item'          => 'View ' . $singular,
      'search_term'        => 'Search ' . $plural,
      'parent'             => 'Parent ' . $singular,
      'not_found'          => 'No ' . $plural . ' Found', 
      'not_found_in_trash' => 'No ' . $plural . ' in Trash',
   );

   $args = array(
      'labels'                => $labels,
      'public'                => true,
      'publicly_queryable'    => true,
      'exclude_from_search'   => false,
      'show_in_nav_menus'     => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'show_in_admin_bar'     => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-grapes',
      'can_export'            => true,
      'delete_with_user'      => true,
      'has_archive'           => true,
      'hierarchical'          => false,
      'query_var'             => true,
      'capability_type'       => 'post',
      'rewrite'               => array( 'slug' => strtolower($plural), 'with_front' => false ),     
      'supports'              => array( 'title', 'permalink', 'author', 'page-attributes', 'revisions' )
   );

   register_post_type('producers', $args);
}
add_action('init', 'barolo_producers_custom_post_type');

function barolo_rewrite_flush() {
   barolo_producers_custom_post_type();
   flush_rewrite_rules();
}
add_action('after_theme_switch', 'barolo_rewrite_flush');