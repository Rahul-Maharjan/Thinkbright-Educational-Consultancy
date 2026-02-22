<?php
/**
 * The template for displaying all pages
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<section class="page-header section-blue">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php studyabroad_breadcrumbs(); ?>
    </div>
</section>

<section class="section page-content">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="page-thumbnail" style="margin-bottom: 40px; border-radius: var(--radius-lg); overflow: hidden;">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php 
                    the_content();
                    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'studyabroad-developer' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
                
                <?php if ( get_edit_post_link() ) : ?>
                    <footer class="entry-footer" style="margin-top: 30px;">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'studyabroad-developer' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post( get_the_title() )
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer>
                <?php endif; ?>
            </article>
            
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
        <?php endwhile; ?>
    </div>
</section>

<?php
get_footer();
