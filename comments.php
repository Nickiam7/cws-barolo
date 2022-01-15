<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barolo
 */

/* If the current post is protected */
if( post_password_required() ) {
  return;
}
?>
<div id="comments">
  <?php if( have_comments() ) : ?>
    <h2 class="comments-title">      
      <?php
        printf(
          esc_html( _nx( 'One reply', '%1$s replies', get_comments_number(), 'replies title', 'brlo' ) ),
          number_format_i18n( get_comments_number() ),
          '<span>' . get_the_title() . '</span>'
        );
      ?>
    </h2>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
      <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'brlo' ); ?></h2>
      <div class="nav-links">
        <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'brlo' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'brlo' ) ); ?></div>
      </div>
    </nav>
    <?php endif; ?>
    
    <div class="the-comment-list">
      <?php require_once('inc/comments/comments-layout.php'); ?>
      <?php 
        wp_list_comments( array(
          'style'         => 'div',
          'short_ping'    => false,
          'avatar_size'   => '64',
          'walker'        => new Barolo_Comment_Walker(),
        ) );
      ?>
    </div>
  <?php else : ?>
    <h2 class="comments-title">No replies yet. Be the first. </h2>
  <?php endif; ?>
  <!--Comments Closed-->
  <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'brlo' ); ?></p>
  <?php endif; ?>
  <!--Comment Form-->
  <?php 
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $consent = empty( $commenter['comment_author_email'] ) ?  : 'checked="checked"';

      $fields =  array(
      'author' =>
        '<div class="row">' .
          '<div class="col-md-4">' .
            '<div class="comment-form-author form-group">' .
                '<label class="sr-only" for="author">author</label>' .
                '<input id="author" class="form-control cws-form" name="author" placeholder="Name*" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
            '</div>' .
          '</div>',
      'email' =>
          '<div class="col-md-4">' .
            '<div class="comment-form-email form-group">' .
                '<label class="sr-only" for="email">Email</label>' .
                '<input id="email" class="form-control cws-form" name="email" placeholder="Email*" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />' .
            '</div>' . 
          '</div>',
      'url' =>
          '<div class="col-md-4">' .
            '<div class="comment-form-url form-group">' .
                '<label class="sr-only" for="url">url</label>' .
                '<input id="url" class="form-control cws-form" name="url" placeholder="Website" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
              '" size="30" />' .
            '</div>' .
          '</div>' .
        '</div>'
    );

    $args = array(
      'class_form'        => 'form-horizontal',
      'label_submit'      => 'Submit Reply',
      'class_submit'      => 'btn cws-btn-primary mt-3',
      'cancel_reply_link' => __( ' <span class="float-riight">Cancel</span> ' ),
      'fields'            => apply_filters( 'comment_form_default_fields', $fields ),
      'comment_field'     =>
        '<label class="sr-only" for="comment">comment</label>' .         
        '<textarea id="comment" placeholder="Add your reply" name="comment" class="form-control cws-form" rows="8" aria-required="true"></textarea>' .
        '<small class="comment-form-cookies-consent">
        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
        '<label class="pl-1" for="wp-comment-cookies-consent">' . 
          __( 'Save my name, email, and website in this browser for the next time I comment.' ) . 
        '</label></small>'
    );
  ?>
  <div class="box box--padding-sm">
    <?php comment_form($args); ?>
  </div>
  
</div>