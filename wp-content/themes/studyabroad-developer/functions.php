<?php
/**
 * Study Abroad Developer Theme Functions
 *
 * @package StudyAbroad_Developer
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Theme Constants
define( 'STUDYABROAD_VERSION', '1.0.0' );
define( 'STUDYABROAD_DIR', get_template_directory() );
define( 'STUDYABROAD_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function studyabroad_theme_setup() {
    // Text domain for translations
    load_theme_textdomain( 'studyabroad-developer', STUDYABROAD_DIR . '/languages' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 800, true );
    add_image_size( 'studyabroad-hero', 1920, 1080, true );
    add_image_size( 'studyabroad-card', 600, 400, true );
    add_image_size( 'studyabroad-square', 400, 400, true );
    add_image_size( 'studyabroad-thumbnail', 150, 150, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary'   => esc_html__( 'Primary Menu', 'studyabroad-developer' ),
        'footer'    => esc_html__( 'Footer Menu', 'studyabroad-developer' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Set up the WordPress core custom background feature
    add_theme_support( 'custom-background', array(
        'default-color' => 'f8fafc',
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Add support for full and wide align images
    add_theme_support( 'align-wide' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Custom color palette for block editor
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_html__( 'Primary Blue', 'studyabroad-developer' ),
            'slug'  => 'primary',
            'color' => '#0B3C91',
        ),
        array(
            'name'  => esc_html__( 'Secondary Blue', 'studyabroad-developer' ),
            'slug'  => 'secondary',
            'color' => '#1E90FF',
        ),
        array(
            'name'  => esc_html__( 'Accent Blue', 'studyabroad-developer' ),
            'slug'  => 'accent',
            'color' => '#00BFFF',
        ),
        array(
            'name'  => esc_html__( 'Text Dark', 'studyabroad-developer' ),
            'slug'  => 'text-dark',
            'color' => '#1F2937',
        ),
        array(
            'name'  => esc_html__( 'Background Light', 'studyabroad-developer' ),
            'slug'  => 'background-light',
            'color' => '#F8FAFC',
        ),
    ) );
}
add_action( 'after_setup_theme', 'studyabroad_theme_setup' );

/**
 * Set the content width
 */
function studyabroad_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'studyabroad_content_width', 1200 );
}
add_action( 'after_setup_theme', 'studyabroad_content_width', 0 );

/**
 * Enqueue scripts and styles
 */
function studyabroad_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style( 
        'studyabroad-google-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap', 
        array(), 
        null 
    );

    // Main Stylesheet
    wp_enqueue_style( 
        'studyabroad-style', 
        get_stylesheet_uri(), 
        array(), 
        STUDYABROAD_VERSION 
    );

    // Custom CSS
    wp_enqueue_style( 
        'studyabroad-custom', 
        STUDYABROAD_URI . '/assets/css/custom.css', 
        array( 'studyabroad-style' ), 
        STUDYABROAD_VERSION 
    );

    // Main JavaScript
    wp_enqueue_script( 
        'studyabroad-main', 
        STUDYABROAD_URI . '/assets/js/main.js', 
        array(), 
        STUDYABROAD_VERSION, 
        true 
    );

    // Pass data to JavaScript
    wp_localize_script( 'studyabroad-main', 'studyabroadData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'studyabroad_nonce' ),
    ) );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'studyabroad_enqueue_assets' );

/**
 * Register widget areas
 */
function studyabroad_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'studyabroad-developer' ),
        'id'            => 'sidebar-main',
        'description'   => esc_html__( 'Add widgets here.', 'studyabroad-developer' ),
        'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 1', 'studyabroad-developer' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Footer widget area 1.', 'studyabroad-developer' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 2', 'studyabroad-developer' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Footer widget area 2.', 'studyabroad-developer' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 3', 'studyabroad-developer' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Footer widget area 3.', 'studyabroad-developer' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'studyabroad_widgets_init' );

/**
 * Include required files
 */
require_once STUDYABROAD_DIR . '/inc/custom-post-types.php';
require_once STUDYABROAD_DIR . '/inc/customizer.php';
require_once STUDYABROAD_DIR . '/inc/template-tags.php';
require_once STUDYABROAD_DIR . '/inc/template-functions.php';
require_once STUDYABROAD_DIR . '/inc/about-features-admin.php';
require_once STUDYABROAD_DIR . '/inc/about-page-fields.php';

/**
 * Add preconnect for Google Fonts
 */
function studyabroad_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'studyabroad_resource_hints', 10, 2 );

/**
 * Add custom body classes
 */
function studyabroad_body_classes( $classes ) {
    // Add page slug
    global $post;
    if ( isset( $post ) ) {
        $classes[] = 'page-' . $post->post_name;
    }

    // Add class for sticky header
    $classes[] = 'has-sticky-header';

    // Check if is front page
    if ( is_front_page() ) {
        $classes[] = 'is-front-page';
    }

    return $classes;
}
add_filter( 'body_class', 'studyabroad_body_classes' );

/**
 * Custom excerpt length
 */
function studyabroad_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'studyabroad_excerpt_length' );

/**
 * Custom excerpt more text
 */
function studyabroad_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'studyabroad_excerpt_more' );

/**
 * Add Schema.org structured data
 */
function studyabroad_schema_organization() {
    if ( ! is_front_page() ) {
        return;
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@type'    => 'EducationalOrganization',
        'name'     => get_bloginfo( 'name' ),
        'url'      => home_url(),
        'logo'     => get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) : '',
        'description' => get_bloginfo( 'description' ),
        'address'  => array(
            '@type' => 'PostalAddress',
            'streetAddress' => get_theme_mod( 'studyabroad_address', '' ),
        ),
        'telephone' => get_theme_mod( 'studyabroad_phone', '' ),
        'email'    => get_theme_mod( 'studyabroad_email', '' ),
        'sameAs'   => array_filter( array(
            get_theme_mod( 'studyabroad_facebook', '' ),
            get_theme_mod( 'studyabroad_instagram', '' ),
            get_theme_mod( 'studyabroad_linkedin', '' ),
            get_theme_mod( 'studyabroad_youtube', '' ),
        ) ),
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema ) . '</script>';
}
add_action( 'wp_head', 'studyabroad_schema_organization' );

/**
 * AJAX handler for consultation form
 */
function studyabroad_submit_consultation() {
    // Verify nonce
    if ( ! wp_verify_nonce( $_POST['nonce'], 'studyabroad_nonce' ) ) {
        wp_send_json_error( array( 'message' => 'Security check failed.' ) );
    }

    // Sanitize form data
    $name     = sanitize_text_field( $_POST['name'] ?? '' );
    $email    = sanitize_email( $_POST['email'] ?? '' );
    $phone    = sanitize_text_field( $_POST['phone'] ?? '' );
    $country  = sanitize_text_field( $_POST['country'] ?? '' );
    $message  = sanitize_textarea_field( $_POST['message'] ?? '' );

    // Validate required fields
    if ( empty( $name ) || empty( $email ) || empty( $phone ) ) {
        wp_send_json_error( array( 'message' => 'Please fill in all required fields.' ) );
    }

    // Validate email
    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => 'Please enter a valid email address.' ) );
    }

    // Send email notification
    $to      = get_option( 'admin_email' );
    $subject = sprintf( 'New Consultation Request from %s', $name );
    $body    = sprintf(
        "Name: %s\nEmail: %s\nPhone: %s\nPreferred Country: %s\nMessage:\n%s",
        $name,
        $email,
        $phone,
        $country,
        $message
    );
    $headers = array( 'Content-Type: text/plain; charset=UTF-8' );

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( array( 'message' => 'Thank you! Your consultation request has been submitted.' ) );
    } else {
        wp_send_json_error( array( 'message' => 'There was an error sending your request. Please try again.' ) );
    }
}
add_action( 'wp_ajax_studyabroad_consultation', 'studyabroad_submit_consultation' );
add_action( 'wp_ajax_nopriv_studyabroad_consultation', 'studyabroad_submit_consultation' );

/**
 * Add defer attribute to scripts
 */
function studyabroad_defer_scripts( $tag, $handle, $src ) {
    $defer_scripts = array( 'studyabroad-main' );

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . esc_url( $src ) . '" defer></script>';
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'studyabroad_defer_scripts', 10, 3 );

/**
 * Remove WordPress version from head
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Disable XML-RPC
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Disable emojis
 */
function studyabroad_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'studyabroad_disable_emojis' );

/**
 * Custom login logo
 */
function studyabroad_login_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo_url = $custom_logo_id ? wp_get_attachment_image_url( $custom_logo_id, 'full' ) : '';
    
    if ( $logo_url ) {
        ?>
        <style type="text/css">
            #login h1 a {
                background-image: url(<?php echo esc_url( $logo_url ); ?>);
                background-size: contain;
                background-position: center;
                width: 300px;
                height: 80px;
            }
        </style>
        <?php
    }
}
add_action( 'login_enqueue_scripts', 'studyabroad_login_logo' );

/**
 * Custom login URL
 */
function studyabroad_login_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'studyabroad_login_url' );

/**
 * Add WhatsApp number to customizer settings retrieval
 */
function studyabroad_get_whatsapp_link() {
    $whatsapp = get_theme_mod( 'studyabroad_whatsapp', '' );
    if ( $whatsapp ) {
        return 'https://wa.me/' . preg_replace( '/[^0-9]/', '', $whatsapp );
    }
    return '';
}

/**
 * Get social media links
 */
function studyabroad_get_social_links() {
    return array(
        'facebook'  => get_theme_mod( 'studyabroad_facebook', '' ),
        'instagram' => get_theme_mod( 'studyabroad_instagram', '' ),
        'linkedin'  => get_theme_mod( 'studyabroad_linkedin', '' ),
        'youtube'   => get_theme_mod( 'studyabroad_youtube', '' ),
        'twitter'   => get_theme_mod( 'studyabroad_twitter', '' ),
    );
}

/**
 * Helper function to get SVG icons
 */
function studyabroad_get_icon( $icon ) {
    $icons = array(
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
        'map-pin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
        'youtube' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="white"></polygon></svg>',
        'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>',
        'whatsapp' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        'chevron-down' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>',
        'menu' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>',
        'close' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
        'star' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
        'users' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
        'globe' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
        'file-text' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
        'award' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>',
        'briefcase' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>',
        'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
        'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
        'graduation-cap' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>',
        'plane' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"/></svg>',
    );

    return isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';
}
