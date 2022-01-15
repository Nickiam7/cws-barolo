<form method="get" action="<?php echo home_url( '/blog' ); ?>">
   <div class="input-group">
      <label class="sr-only" for="blog-search">Blog Search</label>  
      <input type="text" id="blog-search" class="form-control cws-form search-query" name="s" placeholder="<?php esc_attr_e('search blog posts', 'brlo'); ?>" />
      <div class="input-group-append">
         <button class="btn cws-btn-primary px-2" type="button" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'brlo'); ?>">
            <?php _e('Search', 'brlo'); ?>
         </button>
      </div>
   </div>
</form>