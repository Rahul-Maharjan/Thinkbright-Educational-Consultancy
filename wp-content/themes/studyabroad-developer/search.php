<?php
/**
 * The template for displaying search results pages
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 80px 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 10px;">
            <?php
            printf(
                esc_html__( 'Search Results for: %s', 'studyabroad-developer' ),
                '<span style="color: var(--accent-color);">' . get_search_query() . '</span>'
            );
            ?>
        </h1>
        <p style="color: rgba(255,255,255,0.9);">
            <?php
            global $wp_query;
            printf(
                esc_html( _n( '%d result found', '%d results found', $wp_query->found_posts, 'studyabroad-developer' ) ),
                $wp_query->found_posts
            );
            ?>
        </p>
    </div>
</section>

<main id="primary" class="site-main" style="padding: 60px 0;">
    <div class="container">
        <div class="content-sidebar-wrap">
            <div class="content-area">
                <?php if ( have_posts() ) : ?>
                    
                    <div class="search-results-header" style="margin-bottom: 30px;">
                        <div style="max-width: 600px;">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    
                    <div class="blog-grid">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>" class="blog-card-image">
                                        <?php the_post_thumbnail( 'studyabroad-blog', array( 'alt' => get_the_title() ) ); ?>
                                    </a>
                                <?php endif; ?>
                                
                                <div class="blog-card-content">
                                    <div class="blog-card-meta">
                                        <span class="post-type-badge" style="background: var(--secondary-color); color: white; padding: 4px 10px; border-radius: 4px; font-size: 11px; text-transform: uppercase;">
                                            <?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?>
                                        </span>
                                    </div>
                                    
                                    <h2 class="blog-card-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    
                                    <p class="blog-card-excerpt">
                                        <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                                    </p>
                                    
                                    <div class="blog-card-footer">
                                        <span class="blog-date">
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            <?php esc_html_e( 'View', 'studyabroad-developer' ); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <?php
                        endwhile;
                        ?>
                    </div>
                    
                    <?php studyabroad_developer_pagination(); ?>
                    
                <?php else : ?>
                    
                    <div class="no-results" style="text-align: center; padding: 60px 20px;">
                        <h2><?php esc_html_e( 'No Results Found', 'studyabroad-developer' ); ?></h2>
                        <p style="color: var(--text-light); margin: 20px 0;">
                            <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'studyabroad-developer' ); ?>
                        </p>
                        <div style="max-width: 500px; margin: 30px auto;">
                            <?php get_search_form(); ?>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary" style="margin-top: 20px;">
                            <?php esc_html_e( 'Back to Home', 'studyabroad-developer' ); ?>
                        </a>
                    </div>
                    
                <?php endif; ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php
get_footer();
