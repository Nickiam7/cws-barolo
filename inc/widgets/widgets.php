<?php

function Barolo_add_widgets() {
   require 'footer.php';
   require 'producers-archive.php';
   require 'wines-archive.php';   
   require 'blog.php';
}
add_action('widgets_init', 'Barolo_add_widgets');