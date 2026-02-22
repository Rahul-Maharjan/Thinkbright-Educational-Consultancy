<?php
/**
 * The template for displaying comments
 *
 * @package StudyAbroad_Developer
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $studyabroad_comment_count = get_comments_number();
            if ( '1' === $studyabroad_comment_count ) {
                printf(
                    esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'studyabroad-developer' ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf(
                    esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $studyabroad_comment_count, 'comments title', 'studyabroad-developer' ) ),
                    number_format_i18n( $studyabroad_comment_count ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
                'callback'    => 'studyabroad_developer_comment',
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'studyabroad-developer' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form( array(
        'class_form'         => 'comment-form',
        'class_submit'       => 'btn btn-primary',
        'title_reply'        => esc_html__( 'Leave a Comment', 'studyabroad-developer' ),
        'title_reply_to'     => esc_html__( 'Leave a Reply to %s', 'studyabroad-developer' ),
        'cancel_reply_link'  => esc_html__( 'Cancel Reply', 'studyabroad-developer' ),
        'label_submit'       => esc_html__( 'Post Comment', 'studyabroad-developer' ),
        'comment_field'      => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'studyabroad-developer' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>',
    ) );
    ?>
</div>

<?php
/**
 * Custom comment callback
 */
if ( ! function_exists( 'studyabroad_developer_comment' ) ) :
function studyabroad_developer_comment( $comment, $args, $depth ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <header class="comment-meta">
                <div class="comment-author vcard">
                    <?php
                    if ( 0 != $args['avatar_size'] ) {
                        echo get_avatar( $comment, $args['avatar_size'] );
                    }
                    ?>
                    <div class="comment-author-info">
                        <?php printf( '<b class="fn">%s</b>', get_comment_author_link() ); ?>
                        <span class="comment-date">
                            <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                                <time datetime="<?php comment_time( 'c' ); ?>">
                                    <?php
                                    printf(
                                        esc_html__( '%1$s at %2$s', 'studyabroad-developer' ),
                                        get_comment_date(),
                                        get_comment_time()
                                    );
                                    ?>
                                </time>
                            </a>
                        </span>
                    </div>
                </div>
            </header>

            <div class="comment-content">
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'studyabroad-developer' ); ?></p>
                <?php endif; ?>

                <?php comment_text(); ?>
            </div>

            <footer class="comment-actions">
                <?php
                comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<span class="reply">',
                    'after'     => '</span>',
                ) ) );
                
                edit_comment_link( esc_html__( 'Edit', 'studyabroad-developer' ), '<span class="edit-link">', '</span>' );
                ?>
            </footer>
        </article>
    <?php
}
endif;
