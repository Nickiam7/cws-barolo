<?php

register_sidebar( array(
   'name'          => esc_html__( 'Locations Archive Sidebar', 'Barolo' ),
   'id'            => 'location-archive-sidebar',
   'description'   => esc_html__( 'Add widgets here.', 'Barolo' ),
   'before_widget' => '<section id="%1$s" class="widget %2$s">',
   'after_widget'  => '</section>',
   'before_title'  => '<h4 class="widget-title">',
   'after_title'   => '</h4>',
));