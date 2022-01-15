<?php

register_sidebar( array(
   'name'          => esc_html__( 'Producers Archive Sidebar', 'Barolo' ),
   'id'            => 'producer-archive-sidebar',
   'description'   => esc_html__( 'Add widgets here.', 'Barolo' ),
   'before_widget' => '<section id="%1$s" class="widget %2$s">',
   'after_widget'  => '</section>',
   'before_title'  => '<h4 class="widget-title">',
   'after_title'   => '</h4>',
));