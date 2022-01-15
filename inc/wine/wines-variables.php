<?php 
   $wine_overview = get_field( 'wine_overview' );
   $image = $wine_overview['image']['sizes']['medium_large'];
   $vintage = $wine_overview['wine_vintage'];   
   
   if( is_singular( 'wines' ) ) {      
      $intro = $wine_overview['wine_intro'];
      $description = $wine_overview['wine_description'];
      $score = $wine_overview['score'];

      $wine_location = get_field( 'wine_location' );
      $country = $wine_location['country'];
      $region = $wine_location['region'];
      $sub_region = $wine_location['sub_region'];

      $tech_data = get_field( 'technical_data' );
      $tech_sheet = $tech_data['data_sheet'];

      $contact_forms_group = get_field('contact_forms_group', 'option');
      $request_wine_info_form = $contact_forms_group['request_wine_info'];
   }