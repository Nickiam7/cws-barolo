<?php 

$return_producers = esc_html( get_option( 'options_producer_query' ) );

if( !is_admin() && is_post_type_archive( 'producers' ) && $query->is_main_query() ) {
   $query->set( 'posts_per_page', $return_producers );   
}