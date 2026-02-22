<?php
/**
 * The template for displaying archive pages
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<section class="page-header section-blue">
    <div class="container">
        <h1 class="page-title"><?php the_archive_title(); ?></h1>
        <?php 
        $archive_description = get_the_archive_description();
        if ( $archive_description ) :
        ?>
            <p class="page-description"><?php echo wp_kses_post( $archive_description ); ?></p>
        <?php endif; ?>
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
                                        <?php if ( 'post' === get_post_type() ) : ?>
                                            <?php studyabroad_post_categories(); ?>
                                        <?php endif; ?>
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
                        <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for.', 'studyabroad-developer' ); ?></p>
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
