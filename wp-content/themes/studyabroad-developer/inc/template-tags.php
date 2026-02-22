<?php
/**
 * Custom template tags for this theme
 *
 * @package StudyAbroad_Developer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function studyabroad_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_html( get_the_modified_date() )
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Prints HTML with meta information for the current author.
 */
function studyabroad_posted_by() {
    echo '<span class="byline"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>';
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function studyabroad_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'studyabroad-developer' ) );
        if ( $categories_list ) {
            printf( '<span class="cat-links">%s</span>', $categories_list );
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'studyabroad-developer' ) );
        if ( $tags_list ) {
            printf( '<span class="tags-links">%s</span>', $tags_list );
        }
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: post title */
                    __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'studyabroad-developer' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
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
}

/**
 * Displays an optional post thumbnail.
 */
function studyabroad_post_thumbnail( $size = 'post-thumbnail' ) {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) :
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail( $size ); ?>
        </div>
        <?php
    else :
        ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail(
                $size,
                array(
                    'alt' => the_title_attribute( array( 'echo' => false ) ),
                )
            );
            ?>
        </a>
        <?php
    endif;
}

/**
 * Display star rating
 */
function studyabroad_star_rating( $rating = 5 ) {
    $rating = intval( $rating );
    $output = '<div class="star-rating">';
    
    for ( $i = 1; $i <= 5; $i++ ) {
        if ( $i <= $rating ) {
            $output .= studyabroad_get_icon( 'star' );
        } else {
            $output .= '<span class="star-empty">' . studyabroad_get_icon( 'star' ) . '</span>';
        }
    }
    
    $output .= '</div>';
    
    echo $output;
}

/**
 * Display social links
 */
function studyabroad_social_links( $class = '' ) {
    $social_links = studyabroad_get_social_links();
    
    if ( array_filter( $social_links ) ) :
        ?>
        <div class="social-links <?php echo esc_attr( $class ); ?>">
            <?php foreach ( $social_links as $network => $url ) : ?>
                <?php if ( $url ) : ?>
                    <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( ucfirst( $network ) ); ?>">
                        <?php echo studyabroad_get_icon( $network ); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php
    endif;
}

/**
 * Display breadcrumbs
 */
function studyabroad_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }
    
    echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'studyabroad-developer' ) . '">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'studyabroad-developer' ) . '</a>';
    
    if ( is_category() || is_single() ) {
        echo ' <span class="separator">/</span> ';
        the_category( ' <span class="separator">/</span> ' );
        
        if ( is_single() ) {
            echo ' <span class="separator">/</span> ';
            the_title();
        }
    } elseif ( is_page() ) {
        echo ' <span class="separator">/</span> ';
        echo the_title();
    } elseif ( is_search() ) {
        echo ' <span class="separator">/</span> ';
        echo esc_html__( 'Search Results', 'studyabroad-developer' );
    } elseif ( is_404() ) {
        echo ' <span class="separator">/</span> ';
        echo esc_html__( 'Page Not Found', 'studyabroad-developer' );
    } elseif ( is_archive() ) {
        echo ' <span class="separator">/</span> ';
        
        if ( is_post_type_archive() ) {
            post_type_archive_title();
        } else {
            the_archive_title();
        }
    }
    
    echo '</nav>';
}

/**
 * Display pagination
 */
function studyabroad_pagination() {
    global $wp_query;
    
    $big = 999999999;
    
    $pages = paginate_links( array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
    ) );
    
    if ( is_array( $pages ) ) :
        ?>
        <nav class="pagination" aria-label="<?php esc_attr_e( 'Pagination', 'studyabroad-developer' ); ?>">
            <?php foreach ( $pages as $page ) : ?>
                <?php echo $page; ?>
            <?php endforeach; ?>
        </nav>
        <?php
    endif;
}

/**
 * Display reading time
 */
function studyabroad_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 );
    
    printf(
        '<span class="reading-time">%s %s</span>',
        esc_html( $reading_time ),
        esc_html( _n( 'min read', 'mins read', $reading_time, 'studyabroad-developer' ) )
    );
}

/**
 * Display post categories
 */
function studyabroad_post_categories() {
    $categories = get_the_category();
    
    if ( $categories ) :
        ?>
        <div class="post-categories">
            <?php foreach ( $categories as $category ) : ?>
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="category-badge">
                    <?php echo esc_html( $category->name ); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php
    endif;
}

/**
 * Display event date formatted
 */
function studyabroad_event_date( $post_id = null ) {
    $post_id = $post_id ?: get_the_ID();
    $event_date = get_post_meta( $post_id, '_event_date', true );
    
    if ( $event_date ) {
        $timestamp = strtotime( $event_date );
        ?>
        <div class="event-date">
            <span class="day"><?php echo esc_html( date( 'd', $timestamp ) ); ?></span>
            <span class="month"><?php echo esc_html( date( 'M', $timestamp ) ); ?></span>
        </div>
        <?php
    }
}

/**
 * Get destinations for homepage
 */
function studyabroad_get_destinations( $count = 6 ) {
    $args = array(
        'post_type'      => 'destination',
        'posts_per_page' => $count,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );
    
    return new WP_Query( $args );
}

/**
 * Get services for homepage
 */
function studyabroad_get_services( $count = 6 ) {
    $args = array(
        'post_type'      => 'service',
        'posts_per_page' => $count,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );
    
    return new WP_Query( $args );
}

/**
 * Get testimonials for homepage
 */
function studyabroad_get_testimonials( $count = 5 ) {
    $args = array(
        'post_type'      => 'testimonial',
        'posts_per_page' => $count,
        'orderby'        => 'rand',
    );
    
    return new WP_Query( $args );
}

/**
 * Get events for homepage
 */
function studyabroad_get_events( $count = 3 ) {
    $args = array(
        'post_type'      => 'event',
        'posts_per_page' => $count,
        'meta_key'       => '_event_date',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'meta_query'     => array(
            array(
                'key'     => '_event_date',
                'value'   => date( 'Y-m-d' ),
                'compare' => '>=',
                'type'    => 'DATE',
            ),
        ),
    );
    
    return new WP_Query( $args );
}

/**
 * Get language tests
 */
function studyabroad_get_language_tests( $count = 5 ) {
    $args = array(
        'post_type'      => 'language_test',
        'posts_per_page' => $count,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );
    
    return new WP_Query( $args );
}

/**
 * Get recent blog posts
 */
function studyabroad_get_recent_posts( $count = 3 ) {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $count,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    
    return new WP_Query( $args );
}
