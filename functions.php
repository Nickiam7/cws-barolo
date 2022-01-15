<?php
/**
 * Barolo functions and includes
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Barolo
 */

if( ! function_exists( 'barolo_setup' ) ) :
  function barolo_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
        
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );      
  }
endif;
add_action( 'after_setup_theme', 'barolo_setup' );

function allow_svg_uploads( $mimes ) {
   $mimes['svg'] = 'image/svg+xml';
   return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

function add_active_class_to_nav_on_single_custom_post_type( $classes, $item ) {
  global $post;
  $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

  if( isset( $id ) ) {
    $current_post_type = get_post_type_object(get_post_type( $post->ID ));
    $current_post_type_slug = $current_post_type->rewrite['slug'];          
    $menu_slug = strtolower(trim( $item->url ));

    if( strpos( $menu_slug,$current_post_type_slug ) !== false ) {
      $classes[] = 'active';
    }
    if( is_singular( 'post' ) && 'Blog' == $item->title ) {
      $classes[] = 'active';  
    }
  }
  return $classes;
}
add_action( 'nav_menu_css_class', 'add_active_class_to_nav_on_single_custom_post_type', 10, 2 );

function hide_editor_for_specific_page_templates() {
  global $pagenow;

  if( !( 'post.php' == $pagenow ) || ( !isset( $_GET['post'] ) ) ) return;
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

  if( !isset( $post_id ) ) return;
  $template_file = get_post_meta( $post_id, '_wp_page_template', true );

  if( $template_file == 'page-templates/home.php' || $template_file == 'page-templates/our-story.php' || $template_file == 'page-templates/contact-us.php' || $template_file == 'page-templates/photo-gallery.php' || $template_file == 'page-templates/wine-locations.php' ) {
    remove_post_type_support( 'page', 'editor' );
  }
}
add_action( 'init', 'hide_editor_for_specific_page_templates' );

//Disable AutoP
remove_filter( 'the_excerpt', 'wpautop' );

function hide_excerpt_read_more_text( $more ) {   
  return '';
}
add_filter('excerpt_more', 'hide_excerpt_read_more_text');

function set_excerpt_read_more_text( $excerpt ) {
  $post = get_post();
  $excerpt .= '<div class="mt-3"><a class="btn btn-sm cws-btn-outline-primary" href="'. get_permalink( $post->ID ) . '">Continue Reading Post</a></div>';
  return $excerpt;
}
add_filter( 'the_excerpt', 'set_excerpt_read_more_text', 21 );

require get_template_directory() . '/inc/facets/custom-hooks.php';
require get_template_directory() . '/inc/default-query/query.php';
require get_template_directory() . '/inc/comments/comments-layout.php';
require get_template_directory() . '/inc/wine/wine-cpt.php';
require get_template_directory() . '/inc/producer/producer-cpt.php';
require get_template_directory() . '/inc/locations/locations-cpt.php';
require get_template_directory() . '/inc/fields/fields.php';
require get_template_directory() . '/inc/fields/theme-options.php';
require get_template_directory() . '/inc/nav/navs.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/enqueue.php';