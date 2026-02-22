<?php
/**
 * About Page Custom Fields
 * Adds meta boxes for About page content management
 *
 * @package StudyAbroad_Developer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add meta boxes for About page
 */
function studyabroad_about_meta_boxes() {
    add_meta_box(
        'studyabroad_about_hero',
        __( 'Page Hero Section', 'studyabroad-developer' ),
        'studyabroad_about_hero_callback',
        'page',
        'normal',
        'high'
    );
    
    add_meta_box(
        'studyabroad_about_mission_vision',
        __( 'Mission & Vision', 'studyabroad-developer' ),
        'studyabroad_about_mission_vision_callback',
        'page',
        'normal',
        'high'
    );
    
    add_meta_box(
        'studyabroad_about_features',
        __( 'Why Choose Us Features', 'studyabroad-developer' ),
        'studyabroad_about_features_callback',
        'page',
        'normal',
        'high'
    );
    
    add_meta_box(
        'studyabroad_about_stats',
        __( 'Statistics Section', 'studyabroad-developer' ),
        'studyabroad_about_stats_callback',
        'page',
        'normal',
        'high'
    );
    
    add_meta_box(
        'studyabroad_about_cta',
        __( 'Call to Action Section', 'studyabroad-developer' ),
        'studyabroad_about_cta_callback',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'studyabroad_about_meta_boxes' );

/**
 * Check if current page uses About template
 */
function studyabroad_is_about_page() {
    global $post;
    if ( ! $post ) return false;
    $template = get_page_template_slug( $post->ID );
    return $template === 'page-about.php';
}

/**
 * Hero Section Callback
 */
function studyabroad_about_hero_callback( $post ) {
    wp_nonce_field( 'studyabroad_about_save', 'studyabroad_about_nonce' );
    
    $hero_subtitle = get_post_meta( $post->ID, '_about_hero_subtitle', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="about_hero_subtitle"><?php esc_html_e( 'Hero Subtitle', 'studyabroad-developer' ); ?></label></th>
            <td>
                <input type="text" id="about_hero_subtitle" name="about_hero_subtitle" value="<?php echo esc_attr( $hero_subtitle ); ?>" class="large-text">
                <p class="description"><?php esc_html_e( 'Subtitle text below the page title. Leave empty for default.', 'studyabroad-developer' ); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Mission & Vision Callback
 */
function studyabroad_about_mission_vision_callback( $post ) {
    $mission_title = get_post_meta( $post->ID, '_about_mission_title', true ) ?: 'Our Mission';
    $mission_text = get_post_meta( $post->ID, '_about_mission_text', true );
    $vision_title = get_post_meta( $post->ID, '_about_vision_title', true ) ?: 'Our Vision';
    $vision_text = get_post_meta( $post->ID, '_about_vision_text', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="about_mission_title"><?php esc_html_e( 'Mission Title', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="about_mission_title" name="about_mission_title" value="<?php echo esc_attr( $mission_title ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="about_mission_text"><?php esc_html_e( 'Mission Text', 'studyabroad-developer' ); ?></label></th>
            <td><textarea id="about_mission_text" name="about_mission_text" rows="4" class="large-text"><?php echo esc_textarea( $mission_text ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="about_vision_title"><?php esc_html_e( 'Vision Title', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="about_vision_title" name="about_vision_title" value="<?php echo esc_attr( $vision_title ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="about_vision_text"><?php esc_html_e( 'Vision Text', 'studyabroad-developer' ); ?></label></th>
            <td><textarea id="about_vision_text" name="about_vision_text" rows="4" class="large-text"><?php echo esc_textarea( $vision_text ); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Features Callback
 */
function studyabroad_about_features_callback( $post ) {
    $section_subtitle = get_post_meta( $post->ID, '_about_features_subtitle', true ) ?: 'Why Choose Us';
    $section_title = get_post_meta( $post->ID, '_about_features_title', true ) ?: 'What Makes Us Different';
    
    $features = get_post_meta( $post->ID, '_about_features', true );
    if ( empty( $features ) ) {
        $features = array(
            array( 'icon' => 'users', 'title' => 'Expert Team', 'desc' => 'Certified counselors with 10+ years of experience in international education.' ),
            array( 'icon' => 'check-circle', 'title' => '95% Success Rate', 'desc' => 'Proven track record with high visa approval and university admission rates.' ),
            array( 'icon' => 'globe', 'title' => 'Global Network', 'desc' => 'Partnerships with 500+ universities across 20+ countries worldwide.' ),
            array( 'icon' => 'shield', 'title' => 'Trusted Support', 'desc' => 'End-to-end assistance from application to arrival with 24/7 support.' ),
        );
    }
    ?>
    <style>
        .feature-row { background: #f9f9f9; padding: 15px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .feature-row label { display: block; margin-bottom: 5px; font-weight: 600; }
        .feature-row input, .feature-row textarea { width: 100%; margin-bottom: 10px; }
        .feature-row select { margin-bottom: 10px; }
        .add-feature-btn { margin-top: 10px; }
        .remove-feature { color: #a00; cursor: pointer; float: right; }
        .remove-feature:hover { color: #dc3232; }
    </style>
    
    <table class="form-table">
        <tr>
            <th><label for="about_features_subtitle"><?php esc_html_e( 'Section Subtitle', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="about_features_subtitle" name="about_features_subtitle" value="<?php echo esc_attr( $section_subtitle ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="about_features_title"><?php esc_html_e( 'Section Title', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="about_features_title" name="about_features_title" value="<?php echo esc_attr( $section_title ); ?>" class="regular-text"></td>
        </tr>
    </table>
    
    <h4><?php esc_html_e( 'Features (Why Choose Us)', 'studyabroad-developer' ); ?></h4>
    <div id="about-features-container">
        <?php foreach ( $features as $index => $feature ) : ?>
            <div class="feature-row">
                <span class="remove-feature dashicons dashicons-trash" title="<?php esc_attr_e( 'Remove', 'studyabroad-developer' ); ?>"></span>
                <label><?php esc_html_e( 'Icon', 'studyabroad-developer' ); ?></label>
                <select name="about_features[<?php echo $index; ?>][icon]">
                    <option value="users" <?php selected( $feature['icon'], 'users' ); ?>>Users/Team</option>
                    <option value="check-circle" <?php selected( $feature['icon'], 'check-circle' ); ?>>Check Circle</option>
                    <option value="globe" <?php selected( $feature['icon'], 'globe' ); ?>>Globe</option>
                    <option value="shield" <?php selected( $feature['icon'], 'shield' ); ?>>Shield</option>
                    <option value="award" <?php selected( $feature['icon'], 'award' ); ?>>Award</option>
                    <option value="book" <?php selected( $feature['icon'], 'book' ); ?>>Book</option>
                    <option value="briefcase" <?php selected( $feature['icon'], 'briefcase' ); ?>>Briefcase</option>
                    <option value="star" <?php selected( $feature['icon'], 'star' ); ?>>Star</option>
                    <option value="heart" <?php selected( $feature['icon'], 'heart' ); ?>>Heart</option>
                    <option value="clock" <?php selected( $feature['icon'], 'clock' ); ?>>Clock</option>
                </select>
                <label><?php esc_html_e( 'Title', 'studyabroad-developer' ); ?></label>
                <input type="text" name="about_features[<?php echo $index; ?>][title]" value="<?php echo esc_attr( $feature['title'] ); ?>">
                <label><?php esc_html_e( 'Description', 'studyabroad-developer' ); ?></label>
                <textarea name="about_features[<?php echo $index; ?>][desc]" rows="2"><?php echo esc_textarea( $feature['desc'] ); ?></textarea>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="button" class="button add-feature-btn" id="add-about-feature"><?php esc_html_e( '+ Add Feature', 'studyabroad-developer' ); ?></button>
    
    <script>
    jQuery(document).ready(function($) {
        var featureIndex = <?php echo count( $features ); ?>;
        
        $('#add-about-feature').on('click', function() {
            var template = `
                <div class="feature-row">
                    <span class="remove-feature dashicons dashicons-trash" title="Remove"></span>
                    <label>Icon</label>
                    <select name="about_features[${featureIndex}][icon]">
                        <option value="users">Users/Team</option>
                        <option value="check-circle">Check Circle</option>
                        <option value="globe">Globe</option>
                        <option value="shield">Shield</option>
                        <option value="award">Award</option>
                        <option value="book">Book</option>
                        <option value="briefcase">Briefcase</option>
                        <option value="star">Star</option>
                        <option value="heart">Heart</option>
                        <option value="clock">Clock</option>
                    </select>
                    <label>Title</label>
                    <input type="text" name="about_features[${featureIndex}][title]" value="">
                    <label>Description</label>
                    <textarea name="about_features[${featureIndex}][desc]" rows="2"></textarea>
                </div>
            `;
            $('#about-features-container').append(template);
            featureIndex++;
        });
        
        $(document).on('click', '.remove-feature', function() {
            if (confirm('Remove this feature?')) {
                $(this).closest('.feature-row').remove();
            }
        });
    });
    </script>
    <?php
}

/**
 * Stats Callback
 */
function studyabroad_about_stats_callback( $post ) {
    $stats = get_post_meta( $post->ID, '_about_stats', true );
    if ( empty( $stats ) ) {
        $stats = array(
            array( 'number' => '5000+', 'label' => 'Students Placed' ),
            array( 'number' => '500+', 'label' => 'Partner Universities' ),
            array( 'number' => '20+', 'label' => 'Countries' ),
            array( 'number' => '10+', 'label' => 'Years Experience' ),
        );
    }
    ?>
    <div id="about-stats-container">
        <?php foreach ( $stats as $index => $stat ) : ?>
            <div class="stat-row" style="display: inline-block; width: 23%; margin-right: 1%; background: #f9f9f9; padding: 15px; border: 1px solid #ddd; border-radius: 4px; vertical-align: top;">
                <span class="remove-stat dashicons dashicons-trash" style="float: right; color: #a00; cursor: pointer;"></span>
                <label style="display: block; margin-bottom: 5px; font-weight: 600;"><?php esc_html_e( 'Number', 'studyabroad-developer' ); ?></label>
                <input type="text" name="about_stats[<?php echo $index; ?>][number]" value="<?php echo esc_attr( $stat['number'] ); ?>" style="width: 100%; margin-bottom: 10px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;"><?php esc_html_e( 'Label', 'studyabroad-developer' ); ?></label>
                <input type="text" name="about_stats[<?php echo $index; ?>][label]" value="<?php echo esc_attr( $stat['label'] ); ?>" style="width: 100%;">
            </div>
        <?php endforeach; ?>
    </div>
    <div style="clear: both; margin-top: 15px;">
        <button type="button" class="button" id="add-about-stat"><?php esc_html_e( '+ Add Stat', 'studyabroad-developer' ); ?></button>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        var statIndex = <?php echo count( $stats ); ?>;
        
        $('#add-about-stat').on('click', function() {
            var template = `
                <div class="stat-row" style="display: inline-block; width: 23%; margin-right: 1%; background: #f9f9f9; padding: 15px; border: 1px solid #ddd; border-radius: 4px; vertical-align: top;">
                    <span class="remove-stat dashicons dashicons-trash" style="float: right; color: #a00; cursor: pointer;"></span>
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Number</label>
                    <input type="text" name="about_stats[${statIndex}][number]" value="" style="width: 100%; margin-bottom: 10px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Label</label>
                    <input type="text" name="about_stats[${statIndex}][label]" value="" style="width: 100%;">
                </div>
            `;
            $('#about-stats-container').append(template);
            statIndex++;
        });
        
        $(document).on('click', '.remove-stat', function() {
            if (confirm('Remove this stat?')) {
                $(this).closest('.stat-row').remove();
            }
        });
    });
    </script>
    <?php
}

/**
 * CTA Callback
 */
function studyabroad_about_cta_callback( $post ) {
    $cta_title = get_post_meta( $post->ID, '_about_cta_title', true ) ?: 'Ready to Start Your Journey?';
    $cta_text = get_post_meta( $post->ID, '_about_cta_text', true ) ?: 'Book a free consultation with our expert counselors and take the first step towards your international education.';
    $cta_button_text = get_post_meta( $post->ID, '_about_cta_button_text', true ) ?: 'Contact Us Today';
    $cta_button_url = get_post_meta( $post->ID, '_about_cta_button_url', true ) ?: '/contact/';
    ?>
    <table class="form-table">
        <tr>
            <th><label for="about_cta_title"><?php esc_html_e( 'CTA Title', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="about_cta_title" name="about_cta_title" value="<?php echo esc_attr( $cta_title ); ?>" class="large-text"></td>
        </tr>
        <tr>
            <th><label for="about_cta_text"><?php esc_html_e( 'CTA Text', 'studyabroad-developer' ); ?></label></th>
            <td><textarea id="about_cta_text" name="about_cta_text" rows="3" class="large-text"><?php echo esc_textarea( $cta_text ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="about_cta_button_text"><?php esc_html_e( 'Button Text', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="about_cta_button_text" name="about_cta_button_text" value="<?php echo esc_attr( $cta_button_text ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="about_cta_button_url"><?php esc_html_e( 'Button URL', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="about_cta_button_url" name="about_cta_button_url" value="<?php echo esc_attr( $cta_button_url ); ?>" class="regular-text"></td>
        </tr>
    </table>
    <?php
}

/**
 * Save meta box data
 */
function studyabroad_about_save_meta( $post_id ) {
    // Security checks
    if ( ! isset( $_POST['studyabroad_about_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['studyabroad_about_nonce'], 'studyabroad_about_save' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    
    // Hero
    if ( isset( $_POST['about_hero_subtitle'] ) ) {
        update_post_meta( $post_id, '_about_hero_subtitle', sanitize_text_field( $_POST['about_hero_subtitle'] ) );
    }
    
    // Mission & Vision
    $fields = array( 'about_mission_title', 'about_mission_text', 'about_vision_title', 'about_vision_text' );
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, sanitize_textarea_field( $_POST[ $field ] ) );
        }
    }
    
    // Features Section
    if ( isset( $_POST['about_features_subtitle'] ) ) {
        update_post_meta( $post_id, '_about_features_subtitle', sanitize_text_field( $_POST['about_features_subtitle'] ) );
    }
    if ( isset( $_POST['about_features_title'] ) ) {
        update_post_meta( $post_id, '_about_features_title', sanitize_text_field( $_POST['about_features_title'] ) );
    }
    
    // Features array
    if ( isset( $_POST['about_features'] ) && is_array( $_POST['about_features'] ) ) {
        $features = array();
        foreach ( $_POST['about_features'] as $feature ) {
            if ( ! empty( $feature['title'] ) ) {
                $features[] = array(
                    'icon'  => sanitize_text_field( $feature['icon'] ),
                    'title' => sanitize_text_field( $feature['title'] ),
                    'desc'  => sanitize_textarea_field( $feature['desc'] ),
                );
            }
        }
        update_post_meta( $post_id, '_about_features', $features );
    }
    
    // Stats
    if ( isset( $_POST['about_stats'] ) && is_array( $_POST['about_stats'] ) ) {
        $stats = array();
        foreach ( $_POST['about_stats'] as $stat ) {
            if ( ! empty( $stat['number'] ) ) {
                $stats[] = array(
                    'number' => sanitize_text_field( $stat['number'] ),
                    'label'  => sanitize_text_field( $stat['label'] ),
                );
            }
        }
        update_post_meta( $post_id, '_about_stats', $stats );
    }
    
    // CTA
    $cta_fields = array( 'about_cta_title', 'about_cta_text', 'about_cta_button_text', 'about_cta_button_url' );
    foreach ( $cta_fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post', 'studyabroad_about_save_meta' );

/**
 * Get feature icon SVG
 */
function studyabroad_get_feature_icon( $icon ) {
    $icons = array(
        'users' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
        'check-circle' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
        'globe' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>',
        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
        'award' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>',
        'book' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>',
        'briefcase' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>',
        'star' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
        'heart' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>',
        'clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
    );
    
    return isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['check-circle'];
}
