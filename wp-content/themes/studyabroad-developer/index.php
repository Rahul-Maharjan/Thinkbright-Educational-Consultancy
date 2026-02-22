<?php
/**
 * The main template file (Blog Archive)
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<section class="page-header section-blue">
    <div class="container">
        <h1 class="page-title">
            <?php
            if ( is_home() && ! is_front_page() ) {
                single_post_title();
            } else {
                esc_html_e( 'Blog', 'studyabroad-developer' );
            }
            ?>
        </h1>
        <?php studyabroad_breadcrumbs(); ?>
    </div>
</section>

<section class="section blog-section">
    <div class="container">
        <div class="blog-layout" style="display: grid; grid-template-columns: 1fr 350px; gap: 40px;">
            <div class="blog-main">
                <?php if ( have_posts() ) : ?>
                    <div class="grid grid-2">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="blog-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( 'studyabroad-card' ); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <?php studyabroad_post_categories(); ?>
                                        <span><?php studyabroad_posted_on(); ?></span>
                                    </div>
                                    
                                    <h3 class="blog-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <p class="blog-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                    
                                    <a href="<?php the_permalink(); ?>" class="blog-link">
                                        <?php esc_html_e( 'Read More', 'studyabroad-developer' ); ?>
                                        <?php echo studyabroad_get_icon( 'arrow-right' ); ?>
                                    </a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                    
                    <?php studyabroad_pagination(); ?>
                    
                <?php else : ?>
                    <div class="no-posts">
                        <h2><?php esc_html_e( 'No posts found', 'studyabroad-developer' ); ?></h2>
                        <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'studyabroad-developer' ); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <aside class="blog-sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</section>

<?php
get_footer();
