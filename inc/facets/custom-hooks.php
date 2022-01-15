<?php 

$params = array(
   'page' => 1,
   'per_page' => 10,
   'total_rows' => 205,
   'total_pages' => 21
);

add_filter( 'facetwp_pager_html', function( $output, $params ) {
   $output = '';
   $page = $params['page'];
   $total_pages = $params['total_pages'];

   if ( 1 < $params['total_pages'] ) {
      if ( $page > 1 ) {
         $output .= '<a class="facetwp-page page-numbers" data-page="' . ($page - 1) . '">Previous</a>';
      }
      for ( $i = 1; $i <= $params['total_pages']; $i++ ) {
         $is_curr = ( $i === $params['page'] ) ? ' active' : '';
         $output .= '<a class="facetwp-page page-numbers' . $is_curr . '" data-page="' . $i . '">' . $i . '</a>';
      }
      if ( $page < $total_pages && $total_pages > 1 ) {
         $output .= '<a class="facetwp-page page-numbers" data-page="' . ($page + 1) . '">Next</a>';
      }
   }
   return $output;
}, 10, 2 );
