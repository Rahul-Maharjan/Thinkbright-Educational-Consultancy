<?php
/**
 * Theme Customizer
 *
 * @package StudyAbroad_Developer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
function studyabroad_customize_register( $wp_customize ) {
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Selective refresh for site title and description
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'studyabroad_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'studyabroad_customize_partial_blogdescription',
        ) );
    }

    // ============================================
    // THEME OPTIONS PANEL
    // ============================================
    $wp_customize->add_panel( 'studyabroad_theme_options', array(
        'title'       => __( 'Theme Options', 'studyabroad-developer' ),
        'description' => __( 'Configure Study Abroad theme settings', 'studyabroad-developer' ),
        'priority'    => 30,
    ) );

    // ============================================
    // COLOR SETTINGS
    // ============================================
    $wp_customize->add_section( 'studyabroad_colors', array(
        'title'    => __( 'Theme Colors', 'studyabroad-developer' ),
        'panel'    => 'studyabroad_theme_options',
        'priority' => 10,
    ) );

    // Primary Color
    $wp_customize->add_setting( 'studyabroad_primary_color', array(
        'default'           => '#0B3C91',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'studyabroad_primary_color', array(
        'label'    => __( 'Primary Color', 'studyabroad-developer' ),
        'section'  => 'studyabroad_colors',
        'settings' => 'studyabroad_primary_color',
    ) ) );

    // Secondary Color
    $wp_customize->add_setting( 'studyabroad_secondary_color', array(
        'default'           => '#1E90FF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'studyabroad_secondary_color', array(
        'label'    => __( 'Secondary Color', 'studyabroad-developer' ),
        'section'  => 'studyabroad_colors',
        'settings' => 'studyabroad_secondary_color',
    ) ) );

    // Accent Color
    $wp_customize->add_setting( 'studyabroad_accent_color', array(
        'default'           => '#00BFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'studyabroad_accent_color', array(
        'label'    => __( 'Accent Color', 'studyabroad-developer' ),
        'section'  => 'studyabroad_colors',
        'settings' => 'studyabroad_accent_color',
    ) ) );

    // ============================================
    // HERO SECTION SETTINGS
    // ============================================
    $wp_customize->add_section( 'studyabroad_hero', array(
        'title'    => __( 'Hero Section', 'studyabroad-developer' ),
        'panel'    => 'studyabroad_theme_options',
        'priority' => 20,
    ) );

    // Hero Title
    $wp_customize->add_setting( 'studyabroad_hero_title', array(
        'default'           => 'Planning to Study Abroad?',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'studyabroad_hero_title', array(
        'label'   => __( 'Hero Title', 'studyabroad-developer' ),
        'section' => 'studyabroad_hero',
        'type'    => 'text',
    ) );

    // Hero Title Accent
    $wp_customize->add_setting( 'studyabroad_hero_title_accent', array(
        'default'           => 'Start Your Journey Today',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'studyabroad_hero_title_accent', array(
        'label'   => __( 'Hero Title (Accent Text)', 'studyabroad-developer' ),
        'section' => 'studyabroad_hero',
        'type'    => 'text',
    ) );

    // Hero Subtitle
    $wp_customize->add_setting( 'studyabroad_hero_subtitle', array(
        'default'           => 'Trusted education consultancy helping students study in Canada, Australia, USA, UK, Japan & Europe.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'studyabroad_hero_subtitle', array(
        'label'   => __( 'Hero Subtitle', 'studyabroad-developer' ),
        'section' => 'studyabroad_hero',
        'type'    => 'textarea',
    ) );

    // Hero Background Image
    $wp_customize->add_setting( 'studyabroad_hero_bg', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studyabroad_hero_bg', array(
        'label'    => __( 'Hero Background Image', 'studyabroad-developer' ),
        'section'  => 'studyabroad_hero',
        'settings' => 'studyabroad_hero_bg',
    ) ) );

    // CTA Button 1 Text
    $wp_customize->add_setting( 'studyabroad_cta_1_text', array(
        'default'           => 'Apply Now',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_cta_1_text', array(
        'label'   => __( 'CTA Button 1 Text', 'studyabroad-developer' ),
        'section' => 'studyabroad_hero',
        'type'    => 'text',
    ) );

    // CTA Button 1 URL
    $wp_customize->add_setting( 'studyabroad_cta_1_url', array(
        'default'           => '#consultation',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'studyabroad_cta_1_url', array(
        'label'   => __( 'CTA Button 1 URL', 'studyabroad-developer' ),
        'section' => 'studyabroad_hero',
        'type'    => 'url',
    ) );

    // CTA Button 2 Text
    $wp_customize->add_setting( 'studyabroad_cta_2_text', array(
        'default'           => 'Book Free Consultation',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_cta_2_text', array(
        'label'   => __( 'CTA Button 2 Text', 'studyabroad-developer' ),
        'section' => 'studyabroad_hero',
        'type'    => 'text',
    ) );

    // CTA Button 2 URL
    $wp_customize->add_setting( 'studyabroad_cta_2_url', array(
        'default'           => '#consultation',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'studyabroad_cta_2_url', array(
        'label'   => __( 'CTA Button 2 URL', 'studyabroad-developer' ),
        'section' => 'studyabroad_hero',
        'type'    => 'url',
    ) );

    // ============================================
    // ABOUT SECTION SETTINGS
    // ============================================
    $wp_customize->add_section( 'studyabroad_about', array(
        'title'    => __( 'About Section', 'studyabroad-developer' ),
        'panel'    => 'studyabroad_theme_options',
        'priority' => 25,
    ) );

    // About Title
    $wp_customize->add_setting( 'studyabroad_about_title', array(
        'default'           => 'Welcome to Study Abroad Developer',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_about_title', array(
        'label'   => __( 'About Title', 'studyabroad-developer' ),
        'section' => 'studyabroad_about',
        'type'    => 'text',
    ) );

    // About Content
    $wp_customize->add_setting( 'studyabroad_about_content', array(
        'default'           => 'We are a premier education consultancy dedicated to helping students achieve their dreams of studying abroad. With years of experience and a team of qualified counselors, we provide comprehensive guidance for university admissions, visa processing, and scholarship applications.',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'studyabroad_about_content', array(
        'label'   => __( 'About Content', 'studyabroad-developer' ),
        'section' => 'studyabroad_about',
        'type'    => 'textarea',
    ) );

    // About Image
    $wp_customize->add_setting( 'studyabroad_about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'studyabroad_about_image', array(
        'label'    => __( 'About Image', 'studyabroad-developer' ),
        'section'  => 'studyabroad_about',
        'settings' => 'studyabroad_about_image',
    ) ) );

    // Mission Statement
    $wp_customize->add_setting( 'studyabroad_mission', array(
        'default'           => 'To empower students with the right guidance and support to achieve their international education goals.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'studyabroad_mission', array(
        'label'   => __( 'Mission Statement', 'studyabroad-developer' ),
        'section' => 'studyabroad_about',
        'type'    => 'textarea',
    ) );

    // Vision Statement
    $wp_customize->add_setting( 'studyabroad_vision', array(
        'default'           => 'To become the most trusted education consultancy for students seeking quality international education.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'studyabroad_vision', array(
        'label'   => __( 'Vision Statement', 'studyabroad-developer' ),
        'section' => 'studyabroad_about',
        'type'    => 'textarea',
    ) );

    // About Features (Checkmarks)
    // for ( $i = 1; $i <= 5; $i++ ) {
    //     $defaults = array(
    //         1 => 'Expert Counselors',
    //         2 => 'Visa Expertise',
    //         3 => 'Scholarship Support',
    //         4 => 'Global Network',
    //         5 => 'Career Guidance',
    //     );
        
    //     $wp_customize->add_setting( 'studyabroad_about_feature_' . $i, array(
    //         'default'           => $defaults[ $i ],
    //         'sanitize_callback' => 'sanitize_text_field',
    //     ) );

    //     $wp_customize->add_control( 'studyabroad_about_feature_' . $i, array(
    //         'label'   => sprintf( __( 'About Feature %d', 'studyabroad-developer' ), $i ),
    //         'section' => 'studyabroad_about',
    //         'type'    => 'text',
    //     ) );
    // }

    // ============================================
    // CONTACT INFORMATION
    // ============================================
    $wp_customize->add_section( 'studyabroad_contact', array(
        'title'    => __( 'Contact Information', 'studyabroad-developer' ),
        'panel'    => 'studyabroad_theme_options',
        'priority' => 30,
    ) );

    // Phone
    $wp_customize->add_setting( 'studyabroad_phone', array(
        'default'           => '+1 234 567 8900',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_phone', array(
        'label'   => __( 'Phone Number', 'studyabroad-developer' ),
        'section' => 'studyabroad_contact',
        'type'    => 'text',
    ) );

    // Email
    $wp_customize->add_setting( 'studyabroad_email', array(
        'default'           => 'info@studyabroad.com',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'studyabroad_email', array(
        'label'   => __( 'Email Address', 'studyabroad-developer' ),
        'section' => 'studyabroad_contact',
        'type'    => 'email',
    ) );

    // Address
    $wp_customize->add_setting( 'studyabroad_address', array(
        'default'           => '123 Education Street, City, Country',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'studyabroad_address', array(
        'label'   => __( 'Address', 'studyabroad-developer' ),
        'section' => 'studyabroad_contact',
        'type'    => 'textarea',
    ) );

    // WhatsApp Number
    $wp_customize->add_setting( 'studyabroad_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_whatsapp', array(
        'label'       => __( 'WhatsApp Number', 'studyabroad-developer' ),
        'description' => __( 'Include country code (e.g., +1234567890)', 'studyabroad-developer' ),
        'section'     => 'studyabroad_contact',
        'type'        => 'text',
    ) );

    // Office Hours
    $wp_customize->add_setting( 'studyabroad_hours', array(
        'default'           => 'Mon - Fri: 9:00 AM - 6:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_hours', array(
        'label'   => __( 'Office Hours', 'studyabroad-developer' ),
        'section' => 'studyabroad_contact',
        'type'    => 'text',
    ) );

    // ============================================
    // SOCIAL MEDIA LINKS
    // ============================================
    $wp_customize->add_section( 'studyabroad_social', array(
        'title'    => __( 'Social Media Links', 'studyabroad-developer' ),
        'panel'    => 'studyabroad_theme_options',
        'priority' => 40,
    ) );

    // Facebook
    $wp_customize->add_setting( 'studyabroad_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'studyabroad_facebook', array(
        'label'   => __( 'Facebook URL', 'studyabroad-developer' ),
        'section' => 'studyabroad_social',
        'type'    => 'url',
    ) );

    // Instagram
    $wp_customize->add_setting( 'studyabroad_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'studyabroad_instagram', array(
        'label'   => __( 'Instagram URL', 'studyabroad-developer' ),
        'section' => 'studyabroad_social',
        'type'    => 'url',
    ) );

    // LinkedIn
    $wp_customize->add_setting( 'studyabroad_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'studyabroad_linkedin', array(
        'label'   => __( 'LinkedIn URL', 'studyabroad-developer' ),
        'section' => 'studyabroad_social',
        'type'    => 'url',
    ) );

    // YouTube
    $wp_customize->add_setting( 'studyabroad_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'studyabroad_youtube', array(
        'label'   => __( 'YouTube URL', 'studyabroad-developer' ),
        'section' => 'studyabroad_social',
        'type'    => 'url',
    ) );

    // Twitter/X
    $wp_customize->add_setting( 'studyabroad_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'studyabroad_twitter', array(
        'label'   => __( 'Twitter/X URL', 'studyabroad-developer' ),
        'section' => 'studyabroad_social',
        'type'    => 'url',
    ) );

    // ============================================
    // FOOTER SETTINGS
    // ============================================
    $wp_customize->add_section( 'studyabroad_footer', array(
        'title'    => __( 'Footer Settings', 'studyabroad-developer' ),
        'panel'    => 'studyabroad_theme_options',
        'priority' => 50,
    ) );

    // Footer About Text
    $wp_customize->add_setting( 'studyabroad_footer_about', array(
        'default'           => 'We are dedicated to helping students achieve their international education goals. Our expert counselors provide comprehensive support throughout your study abroad journey.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'studyabroad_footer_about', array(
        'label'   => __( 'Footer About Text', 'studyabroad-developer' ),
        'section' => 'studyabroad_footer',
        'type'    => 'textarea',
    ) );

    // Copyright Text
    $wp_customize->add_setting( 'studyabroad_copyright', array(
        'default'           => '© 2026 Study Abroad Developer. All Rights Reserved.',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'studyabroad_copyright', array(
        'label'   => __( 'Copyright Text', 'studyabroad-developer' ),
        'section' => 'studyabroad_footer',
        'type'    => 'textarea',
    ) );

    // ============================================
    // FAQ SECTION SETTINGS
    // ============================================
    $wp_customize->add_section( 'studyabroad_faq', array(
        'title'    => __( 'FAQ Section', 'studyabroad-developer' ),
        'panel'    => 'studyabroad_theme_options',
        'priority' => 60,
    ) );

    // FAQ Items
    for ( $i = 1; $i <= 5; $i++ ) {
        $wp_customize->add_setting( "studyabroad_faq_{$i}_question", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( "studyabroad_faq_{$i}_question", array(
            'label'   => sprintf( __( 'FAQ %d Question', 'studyabroad-developer' ), $i ),
            'section' => 'studyabroad_faq',
            'type'    => 'text',
        ) );

        $wp_customize->add_setting( "studyabroad_faq_{$i}_answer", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ) );

        $wp_customize->add_control( "studyabroad_faq_{$i}_answer", array(
            'label'   => sprintf( __( 'FAQ %d Answer', 'studyabroad-developer' ), $i ),
            'section' => 'studyabroad_faq',
            'type'    => 'textarea',
        ) );
    }

    // ============================================
    // STATISTICS SECTION
    // ============================================
    $wp_customize->add_section( 'studyabroad_stats', array(
        'title'    => __( 'Statistics', 'studyabroad-developer' ),
        'panel'    => 'studyabroad_theme_options',
        'priority' => 70,
    ) );

    // Stat 1
    $wp_customize->add_setting( 'studyabroad_stat_1_number', array(
        'default'           => '5000+',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_stat_1_number', array(
        'label'   => __( 'Stat 1 Number', 'studyabroad-developer' ),
        'section' => 'studyabroad_stats',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'studyabroad_stat_1_label', array(
        'default'           => 'Students Placed',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_stat_1_label', array(
        'label'   => __( 'Stat 1 Label', 'studyabroad-developer' ),
        'section' => 'studyabroad_stats',
        'type'    => 'text',
    ) );

    // Stat 2
    $wp_customize->add_setting( 'studyabroad_stat_2_number', array(
        'default'           => '200+',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_stat_2_number', array(
        'label'   => __( 'Stat 2 Number', 'studyabroad-developer' ),
        'section' => 'studyabroad_stats',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'studyabroad_stat_2_label', array(
        'default'           => 'Partner Universities',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_stat_2_label', array(
        'label'   => __( 'Stat 2 Label', 'studyabroad-developer' ),
        'section' => 'studyabroad_stats',
        'type'    => 'text',
    ) );

    // Stat 3
    $wp_customize->add_setting( 'studyabroad_stat_3_number', array(
        'default'           => '15+',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_stat_3_number', array(
        'label'   => __( 'Stat 3 Number', 'studyabroad-developer' ),
        'section' => 'studyabroad_stats',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'studyabroad_stat_3_label', array(
        'default'           => 'Years Experience',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_stat_3_label', array(
        'label'   => __( 'Stat 3 Label', 'studyabroad-developer' ),
        'section' => 'studyabroad_stats',
        'type'    => 'text',
    ) );

    // Stat 4
    $wp_customize->add_setting( 'studyabroad_stat_4_number', array(
        'default'           => '98%',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_stat_4_number', array(
        'label'   => __( 'Stat 4 Number', 'studyabroad-developer' ),
        'section' => 'studyabroad_stats',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'studyabroad_stat_4_label', array(
        'default'           => 'Visa Success Rate',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'studyabroad_stat_4_label', array(
        'label'   => __( 'Stat 4 Label', 'studyabroad-developer' ),
        'section' => 'studyabroad_stats',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'studyabroad_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
function studyabroad_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function studyabroad_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Output custom CSS from customizer settings
 */
function studyabroad_customizer_css() {
    $primary_color   = get_theme_mod( 'studyabroad_primary_color', '#0B3C91' );
    $secondary_color = get_theme_mod( 'studyabroad_secondary_color', '#1E90FF' );
    $accent_color    = get_theme_mod( 'studyabroad_accent_color', '#00BFFF' );

    $css = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
            --accent-color: {$accent_color};
        }
    ";

    wp_add_inline_style( 'studyabroad-style', $css );
}
add_action( 'wp_enqueue_scripts', 'studyabroad_customizer_css', 15 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function studyabroad_customize_preview_js() {
    wp_enqueue_script( 'studyabroad-customizer', STUDYABROAD_URI . '/assets/js/customizer.js', array( 'customize-preview' ), STUDYABROAD_VERSION, true );
}
add_action( 'customize_preview_init', 'studyabroad_customize_preview_js' );
