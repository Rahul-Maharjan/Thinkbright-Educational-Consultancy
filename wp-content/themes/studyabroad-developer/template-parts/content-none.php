<?php
/**
 * Template part for displaying a message when no posts are found
 *
 * @package StudyAbroad_Developer
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'studyabroad-developer' ); ?></h1>
    </header>

    <div class="page-content" style="text-align: center; padding: 40px 0;">
        <?php if ( is_search() ) : ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'studyabroad-developer' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'studyabroad-developer' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
        
        <div style="margin-top: 30px;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'Back to Home', 'studyabroad-developer' ); ?>
            </a>
        </div>
    </div>
</section>
