<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php
$aria_req = ( $req ? " aria-required='true'" : '' );
$comment_args = array(
	'title_reply_before' => '<h2 id="reply-title" class="heading1 comment-reply-title">',
	'title_reply_after'  => '</h2>',
    'title_reply'=> esc_html__('Write a Comment','kinetic'),
    'fields' => apply_filters( 'comment_form_default_fields', array(
        'author' => '<div class="row">
            <div class="col-md-4">
                
                <input type="text" name="author" placeholder="'.esc_attr__('Name','kinetic').'*"  id="name" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
            </div>
        ',
        'email' => '<div class="col-md-4">
            
                <input id="mail" placeholder="'.esc_attr__('Email','kinetic').'*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
            </div>
        ',
        'url' => '<div class="col-md-4">
            <input id="website" name="url" placeholder="'.esc_attr__('Website','kinetic').'" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  /></div></div>
        	
        '
    )),
    'comment_field' => '<textarea  rows="7" id="comment" placeholder="'.esc_attr__('Comments','kinetic').'*" name="comment"'.$aria_req.'></textarea>',
    'label_submit' => esc_html__('Comment', 'kinetic'),
    'comment_notes_after' => '',
);
?>
<?php if( get_comments_number()){ ?>
<div class="comments-box">
    <h2 class="heading2"><?php comments_number( esc_html__('0 Comments','kinetic'), esc_html__('1 Comment','kinetic'), esc_html__('% Comments','kinetic') ); ?></h2>
    <?php if(get_comment_pages_count()>0){ ?>
        <ul class="comments-list">
            <?php wp_list_comments('callback=kinetic_theme_comment'); ?>
        </ul>
    <?php } ?>
    <?php
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <div class="navigation comment-navigation" role="navigation">
            
            <div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'kinetic' ) ); ?></div>
            <div class="next right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'kinetic' ) ); ?></div>
        </div><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'kinetic' ); ?></p>
    <?php endif; ?>

    
</div>
<?php } ?>

<!-- Contact form  -->
<?php if('open' == $post->comment_status){ ?>
<div id="comment-form">
    <?php comment_form($comment_args); ?>
</div>
<!-- End contact form box -->
<?php } ?>
<!-- End Contact form -->

