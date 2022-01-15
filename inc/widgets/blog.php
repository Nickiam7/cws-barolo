<?php

register_sidebar( array(
   'name'          => esc_html__( 'Blog (Archive and Single)', 'Barolo' ),
   'id'            => 'blog-both-sidebar',
   'description'   => esc_html__( 'Add widgets here.', 'Barolo' ),
   'before_widget' => '<section id="%1$s" class="widget %2$s">',
   'after_widget'  => '</section>',
   'before_title'  => '<h4 class="widget-title">',
   'after_title'   => '</h4>',
));

register_sidebar( array(
   'name'          => esc_html__( 'Blog (Archive Only)', 'Barolo' ),
   'id'            => 'blog-archive-only-sidebar',
   'description'   => esc_html__( 'Add widgets here.', 'Barolo' ),
   'before_widget' => '<section id="%1$s" class="widget %2$s">',
   'after_widget'  => '</section>',
   'before_title'  => '<h4 class="widget-title">',
   'after_title'   => '</h4>',
));

register_sidebar( array(
   'name'          => esc_html__( 'Blog (Single Only)', 'Barolo' ),
   'id'            => 'blog-single-only-sidebar',
   'description'   => esc_html__( 'Add widgets here.', 'Barolo' ),
   'before_widget' => '<section id="%1$s" class="widget %2$s">',
   'after_widget'  => '</section>',
   'before_title'  => '<h4 class="widget-title">',
   'after_title'   => '</h4>',
));