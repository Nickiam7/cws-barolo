<?php

/* Move user info below reply */
function wpb_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );


class Barolo_Comment_Walker extends Walker_Comment {
  protected function html5_comment( $comment, $depth, $args ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
    <?php
      $parent_or_child = $this->has_children ? 'parent cws' : 'cws';
      $comment_classes_args = array( $parent_or_child, "box box--comment");
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment_classes_args ); ?>>
    <div class="row" id="div-comment-<?php comment_ID(); ?>">
      <?php if( 0 != $args['avatar_size'] ): ?>
      <div class="col-md-1">
        <a href="<?php echo get_comment_author_url(); ?>" >
          <?php echo get_avatar( $comment, $args['avatar_size'], false, get_comment_author_link(), array('class' => 'rounded-circle') ); ?>
        </a>
      </div>
      <?php endif; ?>

      <div class="col-md-11 pl-4">
        <div>
          <?php if( '0' == $comment->comment_approved ) : ?>
            <p class="comment-awaiting-moderation"><small><?php _e( 'Your reply is awaiting moderation.' ); ?></small></p>
          <?php endif; ?>

          <?php printf( '<h3 class="mb-0">%s</h3>', get_comment_author_link() ); ?>

          <div class="comment-meta">
            <small><time datetime="<?php comment_time( 'c' ); ?>">
              <?php printf( _x( 'Posted on %1$s', '1: date' ), get_comment_date(), get_comment_time() ); ?>
            </time></small>
          </div>
        </div>
        <div class="mt-4">
          <?php comment_text(); ?>
        </div>
      </div>
      <div class="col-md-12">
        <ul>
          <?php edit_comment_link( __( 'Edit' ), '<li class="edit-link">', '</li>' ); ?>
          <?php
            comment_reply_link( array_merge( $args, array(
              'add_below'  => 'div-comment',
              'reply_text' => 'Add Reply',
              'depth'      => $depth,
              'max_depth'  => $args['max_depth'],
              'before'     => '<p class="comment-add-reply float-right">' ,
              'after'      => '</p>'
            ) ) );
          ?>
        </ul>
      </div>
    </div>
<?php
  }
}
