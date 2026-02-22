<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package StudyAbroad_Developer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function studyabroad_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'studyabroad_pingback_header' );

/**
 * Add custom classes to the navigation menu items
 */
function studyabroad_nav_menu_css_class( $classes, $item, $args ) {
    if ( 'primary' === $args->theme_location ) {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'studyabroad_nav_menu_css_class', 10, 3 );

/**
 * Add custom classes to navigation links
 */
function studyabroad_nav_menu_link_attributes( $atts, $item, $args ) {
    if ( 'primary' === $args->theme_location ) {
        $atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' nav-link' : 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'studyabroad_nav_menu_link_attributes', 10, 3 );

/**
 * Modify archive title
 */
function studyabroad_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = get_the_author();
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'studyabroad_archive_title' );

/**
 * Add wrapper to embeds
 */
function studyabroad_embed_wrapper( $html, $url, $attr ) {
    return '<div class="embed-responsive">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'studyabroad_embed_wrapper', 10, 3 );

/**
 * Modify read more link
 */
function studyabroad_read_more_link() {
    return sprintf(
        '<a class="read-more btn btn-sm btn-secondary" href="%1$s">%2$s</a>',
        esc_url( get_permalink() ),
        esc_html__( 'Read More', 'studyabroad-developer' )
    );
}
add_filter( 'the_content_more_link', 'studyabroad_read_more_link' );

/**
 * Get default FAQ items
 */
function studyabroad_get_default_faqs() {
    $faqs = array();
    
    for ( $i = 1; $i <= 5; $i++ ) {
        $question = get_theme_mod( "studyabroad_faq_{$i}_question", '' );
        $answer = get_theme_mod( "studyabroad_faq_{$i}_answer", '' );
        
        if ( $question && $answer ) {
            $faqs[] = array(
                'question' => $question,
                'answer'   => $answer,
            );
        }
    }
    
    // Default FAQs if none set
    if ( empty( $faqs ) ) {
        $faqs = array(
            array(
                'question' => 'What are the requirements to study abroad?',
                'answer'   => 'Requirements vary by country and program, but typically include academic transcripts, language proficiency scores (IELTS/TOEFL), a valid passport, financial documents, and a statement of purpose. Our counselors will guide you through the specific requirements for your chosen destination.',
            ),
            array(
                'question' => 'How long does the visa process take?',
                'answer'   => 'Visa processing times vary by country. Generally, student visas take 2-8 weeks to process. We recommend applying at least 3 months before your intended travel date. Our visa specialists will help ensure your application is complete for faster processing.',
            ),
            array(
                'question' => 'Can I get a scholarship for studying abroad?',
                'answer'   => 'Yes! Many universities offer scholarships for international students based on academic merit, financial need, or specific talents. We help identify scholarship opportunities and assist with applications to maximize your chances of receiving financial aid.',
            ),
            array(
                'question' => 'What is the processing time for university applications?',
                'answer'   => 'University application processing typically takes 4-12 weeks, depending on the institution and program. Some universities have rolling admissions, while others have fixed deadlines. We recommend starting your application process 8-12 months before your intended start date.',
            ),
            array(
                'question' => 'Do you provide assistance with accommodation?',
                'answer'   => 'Absolutely! We provide comprehensive pre-departure support including accommodation guidance. We help you understand your options (on-campus housing, private rentals, homestays) and connect you with resources to secure suitable accommodation.',
            ),
        );
    }
    
    return $faqs;
}

/**
 * Get process steps
 */
function studyabroad_get_process_steps() {
    return array(
        array(
            'number' => '1',
            'title'  => 'Career Counseling',
            'desc'   => 'Personalized guidance',
            'icon'   => 'users',
        ),
        array(
            'number' => '2',
            'title'  => 'University Shortlisting',
            'desc'   => 'Best-fit selection',
            'icon'   => 'graduation-cap',
        ),
        array(
            'number' => '3',
            'title'  => 'Documentation',
            'desc'   => 'Complete paperwork',
            'icon'   => 'file-text',
        ),
        array(
            'number' => '4',
            'title'  => 'Application',
            'desc'   => 'Submit applications',
            'icon'   => 'briefcase',
        ),
        array(
            'number' => '5',
            'title'  => 'Visa Processing',
            'desc'   => 'Expert assistance',
            'icon'   => 'globe',
        ),
        array(
            'number' => '6',
            'title'  => 'Pre-Departure',
            'desc'   => 'Ready to fly',
            'icon'   => 'plane',
        ),
    );
}

/**
 * Get default services
 */
function studyabroad_get_default_services() {
    return array(
        array(
            'title' => 'University Selection',
            'desc'  => 'Expert guidance to find the best-fit universities based on your profile and career goals.',
            'icon'  => 'graduation-cap',
        ),
        array(
            'title' => 'Visa Documentation',
            'desc'  => 'Complete visa support from documentation to interview preparation and submission.',
            'icon'  => 'file-text',
        ),
        array(
            'title' => 'Application Processing',
            'desc'  => 'End-to-end application management ensuring timely and accurate submissions.',
            'icon'  => 'briefcase',
        ),
        array(
            'title' => 'SOP & Interview Prep',
            'desc'  => 'Compelling SOPs and thorough interview preparation to boost your chances.',
            'icon'  => 'award',
        ),
        array(
            'title' => 'Scholarship Assistance',
            'desc'  => 'Identify and apply for scholarships to fund your international education.',
            'icon'  => 'award',
        ),
        array(
            'title' => 'Pre-departure Support',
            'desc'  => 'Comprehensive orientation including travel, accommodation, and cultural tips.',
            'icon'  => 'plane',
        ),
    );
}

/**
 * Get default destinations
 */
function studyabroad_get_default_destinations() {
    return array(
        array(
            'title'   => 'Study in Canada',
            'image'   => 'canada.jpg',
            'country' => 'Canada',
        ),
        array(
            'title'   => 'Study in Australia',
            'image'   => 'australia.jpg',
            'country' => 'Australia',
        ),
        array(
            'title'   => 'Study in USA',
            'image'   => 'usa.jpg',
            'country' => 'USA',
        ),
        array(
            'title'   => 'Study in UK',
            'image'   => 'uk.jpg',
            'country' => 'UK',
        ),
        array(
            'title'   => 'Study in New Zealand',
            'image'   => 'newzealand.jpg',
            'country' => 'New Zealand',
        ),
        array(
            'title'   => 'Study in Japan',
            'image'   => 'japan.jpg',
            'country' => 'Japan',
        ),
    );
}

/**
 * Get default language tests
 */
function studyabroad_get_default_language_tests() {
    return array(
        array(
            'title' => 'IELTS',
            'desc'  => 'International English Language Testing System accepted worldwide.',
            'icon'  => 'ielts',
        ),
        array(
            'title' => 'PTE',
            'desc'  => 'Pearson Test of English Academic for study abroad applications.',
            'icon'  => 'pte',
        ),
        array(
            'title' => 'SAT',
            'desc'  => 'Standardized test for college admissions in the United States.',
            'icon'  => 'sat',
        ),
        array(
            'title' => 'TOEFL',
            'desc'  => 'Test of English as a Foreign Language for non-native speakers.',
            'icon'  => 'toefl',
        ),
        array(
            'title' => 'Japanese Language',
            'desc'  => 'JLPT preparation for students planning to study in Japan.',
            'icon'  => 'japanese',
        ),
    );
}

/**
 * Custom comment template
 */
function studyabroad_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <article class="comment-body">
            <header class="comment-author vcard">
                <?php echo get_avatar( $comment, 60 ); ?>
                <div class="comment-author-info">
                    <?php printf( '<b class="fn">%s</b>', get_comment_author_link() ); ?>
                    <div class="comment-meta">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php printf( '%1$s at %2$s', get_comment_date(), get_comment_time() ); ?>
                        </time>
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
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                        )
                    )
                );
                ?>
                <?php edit_comment_link( __( 'Edit', 'studyabroad-developer' ), '<span class="edit-link">', '</span>' ); ?>
            </footer>
        </article>
    <?php
}

/**
 * Async load for JavaScript
 */
function studyabroad_async_scripts( $tag, $handle ) {
    $async_scripts = array( 'studyabroad-main' );
    
    if ( in_array( $handle, $async_scripts ) ) {
        return str_replace( ' src', ' async src', $tag );
    }
    
    return $tag;
}
// add_filter( 'script_loader_tag', 'studyabroad_async_scripts', 10, 2 );

/**
 * Check if current page is blog related
 */
function studyabroad_is_blog() {
    return ( is_home() || is_archive() || is_single() ) && get_post_type() === 'post';
}

/**
 * Get placeholder image URL
 */
function studyabroad_get_placeholder_image( $size = 'full' ) {
    return STUDYABROAD_URI . '/assets/images/placeholder.jpg';
}

/**
 * Format phone number for tel: link
 */
function studyabroad_format_phone( $phone ) {
    return preg_replace( '/[^0-9+]/', '', $phone );
}

/**
 * Truncate text with ellipsis
 */
function studyabroad_truncate_text( $text, $length = 100, $ellipsis = '...' ) {
    if ( strlen( $text ) <= $length ) {
        return $text;
    }
    
    $text = substr( $text, 0, $length );
    $text = substr( $text, 0, strrpos( $text, ' ' ) );
    
    return $text . $ellipsis;
}

/**
 * Get contrast color (white or black) based on background
 */
function studyabroad_get_contrast_color( $hex ) {
    $hex = ltrim( $hex, '#' );
    
    $r = hexdec( substr( $hex, 0, 2 ) );
    $g = hexdec( substr( $hex, 2, 2 ) );
    $b = hexdec( substr( $hex, 4, 2 ) );
    
    $luminance = ( 0.299 * $r + 0.587 * $g + 0.114 * $b ) / 255;
    
    return $luminance > 0.5 ? '#000000' : '#FFFFFF';
}
