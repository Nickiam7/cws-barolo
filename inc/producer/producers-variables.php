<?php

$general_info = get_field( 'general_info' );
$image = $general_info['image']['sizes']['medium_large'];
$country = $general_info['country']; 
$region = $general_info['region']; 
$sub_region = $general_info['sub_region']; 

$wines = get_field( 'related_wines' );

if( is_singular( 'producers' ) ) {
   $overview = get_field( 'overview' );
   $description = $overview['description'];
}
