<?php
/**
 * Template part for displaying posts
 *
 * @package StudyAbroad_Developer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="blog-card-image">
            <?php the_post_thumbnail( 'studyabroad-blog', array( 'alt' => get_the_title() ) ); ?>
        </a>
    <?php endif; ?>
    
    <div class="blog-card-content">
        <?php 
        $categories = get_the_category();
        if ( $categories ) : ?>
            <div class="blog-card-meta">
                <span class="blog-category"><?php echo esc_html( $categories[0]->name ); ?></span>
            </div>
        <?php endif; ?>
        
        <h2 class="blog-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        
        <p class="blog-card-excerpt">
            <?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?>
        </p>
        
        <div class="blog-card-footer">
            <span class="blog-date">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <?php echo get_the_date(); ?>
            </span>
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e( 'Read More', 'studyabroad-developer' ); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>
</article>
