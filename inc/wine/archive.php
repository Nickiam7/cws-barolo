<?php require 'wines-variables.php'; ?>
<div class="col-6 col-lg-4 mb-3">
   <div class="card card--wine">
      <div class="card-body">
         <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url( $image ); ?>" class="card-wine__image" alt="<?php the_title(); ?>"/>
         </a>
      </div>
      <div class="card-footer">
         <h2 class="text-center">
            <a href="<?php the_permalink(); ?>">
               <?php the_title(); ?>
            </a>
         </h2>
      </div>
   </div>
</div>
