<?php require 'producers-variables.php'; ?>
<div class="col-md-6 col-lg-4">
   <div class="card card--producer" style="background-image: url(<?php echo esc_url( $image ); ?>);">
      <div class="card-header">
         <h2>
            <a href="<?php the_permalink(); ?>" class="card-title">
               <?php the_title() ?>
            </a>
         </h2>
         <p class="m-0"><?php echo esc_html( $region ); ?>, <?php echo esc_html( $sub_region ); ?>, <?php echo esc_html( $country ); ?></p>
      </div>
      <div class="card-body"></div>
      <div class="card-footer">
        <a href="<?php the_permalink(); ?>" style="text-decoration: underline;">Learn More</a>

        <?php if( $wines ) : ?>
        <p class="float-right m-0">
          <a href="<?php the_permalink(); ?>" style="text-decoration: underline;">
            <?php echo count( $wines ); ?>
            wine<?php echo count( $wines ) == 1 ? '' : 's'; ?>
          </a>
        </p>
        <?php endif; ?>
      </div>
   </div>
</div>
