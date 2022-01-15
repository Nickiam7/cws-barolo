<?php 

$return_wines = esc_html( get_option( 'options_wine_query' ) );

if( !is_admin() && is_post_type_archive( 'wines' ) && $query->is_main_query() ) {
   $query->set( 'posts_per_page', $return_wines );
   $query->set( 'meta_key', 'details_producer' );
   $query->set( 'orderby', 'meta_value' );
   $query->set( 'order', 'ASC' );
}