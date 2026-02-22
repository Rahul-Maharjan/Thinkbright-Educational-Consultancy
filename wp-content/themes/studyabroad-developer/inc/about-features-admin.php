<?php
/**
 * About Features Admin Page
 * Allows admin to dynamically add/remove about features
 *
 * @package StudyAbroad_Developer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add admin menu page
 */
function studyabroad_about_features_menu() {
    add_theme_page(
        __( 'About Features', 'studyabroad-developer' ),
        __( 'About Features', 'studyabroad-developer' ),
        'edit_theme_options',
        'about-features',
        'studyabroad_about_features_page'
    );
}
add_action( 'admin_menu', 'studyabroad_about_features_menu' );

/**
 * Register settings
 */
function studyabroad_about_features_settings() {
    register_setting( 'studyabroad_about_features_group', 'studyabroad_about_features', 'studyabroad_sanitize_features' );
}
add_action( 'admin_init', 'studyabroad_about_features_settings' );

/**
 * Sanitize features array
 */
function studyabroad_sanitize_features( $input ) {
    $sanitized = array();
    
    if ( is_array( $input ) ) {
        foreach ( $input as $feature ) {
            if ( ! empty( trim( $feature ) ) ) {
                $sanitized[] = sanitize_text_field( $feature );
            }
        }
    }
    
    return $sanitized;
}

/**
 * Enqueue admin scripts
 */
function studyabroad_about_features_scripts( $hook ) {
    if ( 'appearance_page_about-features' !== $hook ) {
        return;
    }
    
    wp_enqueue_style( 'studyabroad-admin-features', STUDYABROAD_URI . '/assets/css/admin-features.css', array(), STUDYABROAD_VERSION );
    wp_enqueue_script( 'studyabroad-admin-features', STUDYABROAD_URI . '/assets/js/admin-features.js', array( 'jquery', 'jquery-ui-sortable' ), STUDYABROAD_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'studyabroad_about_features_scripts' );

/**
 * Admin page content
 */
function studyabroad_about_features_page() {
    // Get saved features
    $features = get_option( 'studyabroad_about_features', array() );
    
    // Default features if empty
    if ( empty( $features ) ) {
        $features = array(
            'Expert Counselors',
            'Visa Expertise',
            'Scholarship Support',
            'Global Network',
            'Career Guidance',
        );
    }
    ?>
    <div class="wrap studyabroad-features-wrap">
        <h1><?php esc_html_e( 'About Section Features', 'studyabroad-developer' ); ?></h1>
        <p class="description"><?php esc_html_e( 'Manage the features displayed in the About section on your homepage. Drag to reorder.', 'studyabroad-developer' ); ?></p>
        
        <?php settings_errors( 'studyabroad_about_features' ); ?>
        
        <form method="post" action="options.php">
            <?php settings_fields( 'studyabroad_about_features_group' ); ?>
            
            <div class="features-container">
                <div class="features-list" id="features-list">
                    <?php foreach ( $features as $index => $feature ) : ?>
                        <div class="feature-item">
                            <span class="feature-handle dashicons dashicons-menu"></span>
                            <input type="text" 
                                   name="studyabroad_about_features[]" 
                                   value="<?php echo esc_attr( $feature ); ?>" 
                                   placeholder="<?php esc_attr_e( 'Enter feature text', 'studyabroad-developer' ); ?>"
                                   class="feature-input">
                            <button type="button" class="button remove-feature" title="<?php esc_attr_e( 'Remove', 'studyabroad-developer' ); ?>">
                                <span class="dashicons dashicons-trash"></span>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <button type="button" class="button button-secondary" id="add-feature">
                    <span class="dashicons dashicons-plus-alt2"></span>
                    <?php esc_html_e( 'Add New Feature', 'studyabroad-developer' ); ?>
                </button>
            </div>
            
            <p class="submit">
                <?php submit_button( __( 'Save Features', 'studyabroad-developer' ), 'primary', 'submit', false ); ?>
            </p>
        </form>
        
        <!-- Template for new feature item -->
        <script type="text/template" id="feature-template">
            <div class="feature-item">
                <span class="feature-handle dashicons dashicons-menu"></span>
                <input type="text" 
                       name="studyabroad_about_features[]" 
                       value="" 
                       placeholder="<?php esc_attr_e( 'Enter feature text', 'studyabroad-developer' ); ?>"
                       class="feature-input">
                <button type="button" class="button remove-feature" title="<?php esc_attr_e( 'Remove', 'studyabroad-developer' ); ?>">
                    <span class="dashicons dashicons-trash"></span>
                </button>
            </div>
        </script>
    </div>
    <?php
}

/**
 * Get about features for frontend
 */
function studyabroad_get_about_features() {
    $features = get_option( 'studyabroad_about_features', array() );
    
    // Fallback to customizer settings if no features saved
    if ( empty( $features ) ) {
        $features = array();
        for ( $i = 1; $i <= 5; $i++ ) {
            $feature = get_theme_mod( 'studyabroad_about_feature_' . $i, '' );
            if ( ! empty( $feature ) ) {
                $features[] = $feature;
            }
        }
        
        // Default features if still empty
        if ( empty( $features ) ) {
            $features = array(
                'Expert Counselors',
                'Visa Expertise',
                'Scholarship Support',
                'Global Network',
                'Career Guidance',
            );
        }
    }
    
    return $features;
}
