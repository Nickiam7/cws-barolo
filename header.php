<?php
/**
   * Template that displays all of the <head>.
   * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
   * @package Barolo
   */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-98355017-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		
		gtag('config', 'UA-98355017-1');
	</script>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/cws_logo_sm.ico" sizes="128x110" />
   <!-- <link rel="apple-touch-icon-precomposed" href="https://www.classicwineselections.com/wp-content/uploads/2017/07/cropped-cws_fav_icon-180x180.png" />
   <meta name="msapplication-TileImage" content="https://www.classicwineselections.com/wp-content/uploads/2017/07/cropped-cws_fav_icon-270x270.png" /> -->
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <?php get_template_part( 'template-parts/main_navbar' );  ?>
      