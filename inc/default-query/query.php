<?php

function custom_default_query( $query ) {  
   require get_template_directory() . '/inc/default-query/producer.php';
   require get_template_directory() . '/inc/default-query/wine.php';
   require get_template_directory() . '/inc/default-query/location.php';
}
add_action( 'pre_get_posts', 'custom_default_query' );
