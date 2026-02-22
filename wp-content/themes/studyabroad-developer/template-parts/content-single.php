<?php
/**
 * Template part for displaying single posts
 *
 * @package StudyAbroad_Developer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="entry-meta">
            <?php studyabroad_developer_posted_on(); ?>
        </div>
        
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
        <?php 
        $categories = get_the_category();
        if ( $categories ) : ?>
            <div class="entry-categories">
                <?php foreach ( $categories as $category ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="category-badge">
                        <?php echo esc_html( $category->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'studyabroad-developer' ),
                    array( 'span' => array( 'class' => array() ) )
                ),
                wp_kses_post( get_the_title() )
            )
        );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'studyabroad-developer' ),
            'after'  => '</div>',
        ) );
        ?>
    </div>

    <footer class="entry-footer">
        <?php 
        $tags = get_the_tags();
        if ( $tags ) : ?>
            <div class="post-tags">
                <span><?php esc_html_e( 'Tags:', 'studyabroad-developer' ); ?></span>
                <?php foreach ( $tags as $tag ) : ?>
                    <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </footer>
</article>
