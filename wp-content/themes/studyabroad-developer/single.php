<?php
/**
 * The template for displaying all single posts
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<section class="page-header section-blue">
    <div class="container">
        <?php 
        $post_type = get_post_type();
        if ( 'post' === $post_type ) :
            studyabroad_post_categories();
        endif;
        ?>
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="blog-single-meta">
            <?php studyabroad_posted_on(); ?>
            <span class="separator">|</span>
            <?php studyabroad_posted_by(); ?>
            <span class="separator">|</span>
            <?php studyabroad_reading_time(); ?>
        </div>
        <?php studyabroad_breadcrumbs(); ?>
    </div>
</section>

<section class="section blog-single">
    <div class="container">
        <div class="blog-layout" style="display: grid; grid-template-columns: 1fr 350px; gap: 40px;">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-single-article' ); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="blog-single-image">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>
                
                <div class="blog-single-content">
                    <?php 
                    the_content();
                    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'studyabroad-developer' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
                
                <?php if ( 'post' === $post_type ) : ?>
                    <footer class="entry-footer">
                        <?php 
                        $tags_list = get_the_tag_list( '', ', ' );
                        if ( $tags_list ) :
                        ?>
                            <div class="post-tags">
                                <strong><?php esc_html_e( 'Tags:', 'studyabroad-developer' ); ?></strong>
                                <?php echo $tags_list; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-share">
                            <strong><?php esc_html_e( 'Share:', 'studyabroad-developer' ); ?></strong>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-facebook">
                                <?php echo studyabroad_get_icon( 'facebook' ); ?>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" target="_blank" rel="noopener noreferrer" class="share-twitter">
                                <?php echo studyabroad_get_icon( 'twitter' ); ?>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>" target="_blank" rel="noopener noreferrer" class="share-linkedin">
                                <?php echo studyabroad_get_icon( 'linkedin' ); ?>
                            </a>
                        </div>
                    </footer>
                <?php endif; ?>
                
                <!-- Author Bio -->
                <?php if ( 'post' === $post_type ) : ?>
                    <div class="author-bio" style="background: var(--background-light); padding: 30px; border-radius: var(--radius-lg); margin-top: 40px; display: flex; gap: 20px; align-items: flex-start;">
                        <div class="author-avatar" style="flex-shrink: 0;">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                        </div>
                        <div class="author-info">
                            <h4 style="margin-bottom: 10px;"><?php the_author(); ?></h4>
                            <p style="color: var(--medium-grey); margin-bottom: 0;"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Post Navigation -->
                <nav class="post-navigation" style="margin-top: 40px; padding-top: 40px; border-top: 1px solid var(--light-grey); display: flex; justify-content: space-between;">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    
                    <?php if ( $prev_post ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="nav-previous" style="flex: 1;">
                            <span style="font-size: 0.85rem; color: var(--medium-grey);">&larr; <?php esc_html_e( 'Previous', 'studyabroad-developer' ); ?></span>
                            <span style="display: block; font-weight: 600; margin-top: 5px;"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ( $next_post ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="nav-next" style="flex: 1; text-align: right;">
                            <span style="font-size: 0.85rem; color: var(--medium-grey);"><?php esc_html_e( 'Next', 'studyabroad-developer' ); ?> &rarr;</span>
                            <span style="display: block; font-weight: 600; margin-top: 5px;"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
                        </a>
                    <?php endif; ?>
                </nav>
                
                <!-- Comments -->
                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </article>
            
            <aside class="blog-sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</section>

<?php
get_footer();
