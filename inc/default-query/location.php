<?php 

if( !is_admin() && is_post_type_archive( 'locations' ) && $query->is_main_query() ) {
   $query->set( 'posts_per_page', -1 );   
}