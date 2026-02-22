<?php
/**
 * Custom Post Types
 *
 * @package StudyAbroad_Developer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Custom Post Types
 */
function studyabroad_register_post_types() {
    
    // Destinations CPT
    register_post_type( 'destination', array(
        'labels' => array(
            'name'               => _x( 'Destinations', 'Post Type General Name', 'studyabroad-developer' ),
            'singular_name'      => _x( 'Destination', 'Post Type Singular Name', 'studyabroad-developer' ),
            'menu_name'          => __( 'Destinations', 'studyabroad-developer' ),
            'name_admin_bar'     => __( 'Destination', 'studyabroad-developer' ),
            'add_new'            => __( 'Add New', 'studyabroad-developer' ),
            'add_new_item'       => __( 'Add New Destination', 'studyabroad-developer' ),
            'new_item'           => __( 'New Destination', 'studyabroad-developer' ),
            'edit_item'          => __( 'Edit Destination', 'studyabroad-developer' ),
            'view_item'          => __( 'View Destination', 'studyabroad-developer' ),
            'all_items'          => __( 'All Destinations', 'studyabroad-developer' ),
            'search_items'       => __( 'Search Destinations', 'studyabroad-developer' ),
            'not_found'          => __( 'No destinations found.', 'studyabroad-developer' ),
            'not_found_in_trash' => __( 'No destinations found in Trash.', 'studyabroad-developer' ),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'destination' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-location-alt',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    ) );

    // Services CPT
    register_post_type( 'service', array(
        'labels' => array(
            'name'               => _x( 'Services', 'Post Type General Name', 'studyabroad-developer' ),
            'singular_name'      => _x( 'Service', 'Post Type Singular Name', 'studyabroad-developer' ),
            'menu_name'          => __( 'Services', 'studyabroad-developer' ),
            'name_admin_bar'     => __( 'Service', 'studyabroad-developer' ),
            'add_new'            => __( 'Add New', 'studyabroad-developer' ),
            'add_new_item'       => __( 'Add New Service', 'studyabroad-developer' ),
            'new_item'           => __( 'New Service', 'studyabroad-developer' ),
            'edit_item'          => __( 'Edit Service', 'studyabroad-developer' ),
            'view_item'          => __( 'View Service', 'studyabroad-developer' ),
            'all_items'          => __( 'All Services', 'studyabroad-developer' ),
            'search_items'       => __( 'Search Services', 'studyabroad-developer' ),
            'not_found'          => __( 'No services found.', 'studyabroad-developer' ),
            'not_found_in_trash' => __( 'No services found in Trash.', 'studyabroad-developer' ),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    ) );

    // Events CPT
    register_post_type( 'event', array(
        'labels' => array(
            'name'               => _x( 'Events', 'Post Type General Name', 'studyabroad-developer' ),
            'singular_name'      => _x( 'Event', 'Post Type Singular Name', 'studyabroad-developer' ),
            'menu_name'          => __( 'Events', 'studyabroad-developer' ),
            'name_admin_bar'     => __( 'Event', 'studyabroad-developer' ),
            'add_new'            => __( 'Add New', 'studyabroad-developer' ),
            'add_new_item'       => __( 'Add New Event', 'studyabroad-developer' ),
            'new_item'           => __( 'New Event', 'studyabroad-developer' ),
            'edit_item'          => __( 'Edit Event', 'studyabroad-developer' ),
            'view_item'          => __( 'View Event', 'studyabroad-developer' ),
            'all_items'          => __( 'All Events', 'studyabroad-developer' ),
            'search_items'       => __( 'Search Events', 'studyabroad-developer' ),
            'not_found'          => __( 'No events found.', 'studyabroad-developer' ),
            'not_found_in_trash' => __( 'No events found in Trash.', 'studyabroad-developer' ),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'event' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    ) );

    // Testimonials CPT
    register_post_type( 'testimonial', array(
        'labels' => array(
            'name'               => _x( 'Testimonials', 'Post Type General Name', 'studyabroad-developer' ),
            'singular_name'      => _x( 'Testimonial', 'Post Type Singular Name', 'studyabroad-developer' ),
            'menu_name'          => __( 'Testimonials', 'studyabroad-developer' ),
            'name_admin_bar'     => __( 'Testimonial', 'studyabroad-developer' ),
            'add_new'            => __( 'Add New', 'studyabroad-developer' ),
            'add_new_item'       => __( 'Add New Testimonial', 'studyabroad-developer' ),
            'new_item'           => __( 'New Testimonial', 'studyabroad-developer' ),
            'edit_item'          => __( 'Edit Testimonial', 'studyabroad-developer' ),
            'view_item'          => __( 'View Testimonial', 'studyabroad-developer' ),
            'all_items'          => __( 'All Testimonials', 'studyabroad-developer' ),
            'search_items'       => __( 'Search Testimonials', 'studyabroad-developer' ),
            'not_found'          => __( 'No testimonials found.', 'studyabroad-developer' ),
            'not_found_in_trash' => __( 'No testimonials found in Trash.', 'studyabroad-developer' ),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonial' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'show_in_rest'       => true,
    ) );

    // Language Tests CPT
    register_post_type( 'language_test', array(
        'labels' => array(
            'name'               => _x( 'Language Tests', 'Post Type General Name', 'studyabroad-developer' ),
            'singular_name'      => _x( 'Language Test', 'Post Type Singular Name', 'studyabroad-developer' ),
            'menu_name'          => __( 'Language Tests', 'studyabroad-developer' ),
            'name_admin_bar'     => __( 'Language Test', 'studyabroad-developer' ),
            'add_new'            => __( 'Add New', 'studyabroad-developer' ),
            'add_new_item'       => __( 'Add New Language Test', 'studyabroad-developer' ),
            'new_item'           => __( 'New Language Test', 'studyabroad-developer' ),
            'edit_item'          => __( 'Edit Language Test', 'studyabroad-developer' ),
            'view_item'          => __( 'View Language Test', 'studyabroad-developer' ),
            'all_items'          => __( 'All Language Tests', 'studyabroad-developer' ),
            'search_items'       => __( 'Search Language Tests', 'studyabroad-developer' ),
            'not_found'          => __( 'No language tests found.', 'studyabroad-developer' ),
            'not_found_in_trash' => __( 'No language tests found in Trash.', 'studyabroad-developer' ),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'language-test' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 9,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    ) );
}
add_action( 'init', 'studyabroad_register_post_types' );

/**
 * Register Custom Taxonomies
 */
function studyabroad_register_taxonomies() {
    
    // Event Category
    register_taxonomy( 'event_category', array( 'event' ), array(
        'labels' => array(
            'name'              => _x( 'Event Categories', 'taxonomy general name', 'studyabroad-developer' ),
            'singular_name'     => _x( 'Event Category', 'taxonomy singular name', 'studyabroad-developer' ),
            'search_items'      => __( 'Search Event Categories', 'studyabroad-developer' ),
            'all_items'         => __( 'All Event Categories', 'studyabroad-developer' ),
            'parent_item'       => __( 'Parent Event Category', 'studyabroad-developer' ),
            'parent_item_colon' => __( 'Parent Event Category:', 'studyabroad-developer' ),
            'edit_item'         => __( 'Edit Event Category', 'studyabroad-developer' ),
            'update_item'       => __( 'Update Event Category', 'studyabroad-developer' ),
            'add_new_item'      => __( 'Add New Event Category', 'studyabroad-developer' ),
            'new_item_name'     => __( 'New Event Category Name', 'studyabroad-developer' ),
            'menu_name'         => __( 'Event Categories', 'studyabroad-developer' ),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'event-category' ),
        'show_in_rest'      => true,
    ) );

    // Service Category
    register_taxonomy( 'service_category', array( 'service' ), array(
        'labels' => array(
            'name'              => _x( 'Service Categories', 'taxonomy general name', 'studyabroad-developer' ),
            'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'studyabroad-developer' ),
            'search_items'      => __( 'Search Service Categories', 'studyabroad-developer' ),
            'all_items'         => __( 'All Service Categories', 'studyabroad-developer' ),
            'parent_item'       => __( 'Parent Service Category', 'studyabroad-developer' ),
            'parent_item_colon' => __( 'Parent Service Category:', 'studyabroad-developer' ),
            'edit_item'         => __( 'Edit Service Category', 'studyabroad-developer' ),
            'update_item'       => __( 'Update Service Category', 'studyabroad-developer' ),
            'add_new_item'      => __( 'Add New Service Category', 'studyabroad-developer' ),
            'new_item_name'     => __( 'New Service Category Name', 'studyabroad-developer' ),
            'menu_name'         => __( 'Service Categories', 'studyabroad-developer' ),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'service-category' ),
        'show_in_rest'      => true,
    ) );
}
add_action( 'init', 'studyabroad_register_taxonomies' );

/**
 * Add custom meta boxes for CPTs
 */
function studyabroad_add_meta_boxes() {
    // Event meta box
    add_meta_box(
        'event_details',
        __( 'Event Details', 'studyabroad-developer' ),
        'studyabroad_event_meta_box_callback',
        'event',
        'normal',
        'high'
    );

    // Testimonial meta box
    add_meta_box(
        'testimonial_details',
        __( 'Testimonial Details', 'studyabroad-developer' ),
        'studyabroad_testimonial_meta_box_callback',
        'testimonial',
        'normal',
        'high'
    );

    // Destination meta box
    add_meta_box(
        'destination_details',
        __( 'Destination Details', 'studyabroad-developer' ),
        'studyabroad_destination_meta_box_callback',
        'destination',
        'normal',
        'high'
    );

    // Service meta box
    add_meta_box(
        'service_details',
        __( 'Service Details', 'studyabroad-developer' ),
        'studyabroad_service_meta_box_callback',
        'service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'studyabroad_add_meta_boxes' );

/**
 * Event meta box callback
 */
function studyabroad_event_meta_box_callback( $post ) {
    wp_nonce_field( 'studyabroad_event_meta_box', 'studyabroad_event_meta_box_nonce' );

    $event_date = get_post_meta( $post->ID, '_event_date', true );
    $event_time = get_post_meta( $post->ID, '_event_time', true );
    $event_location = get_post_meta( $post->ID, '_event_location', true );
    $event_registration_url = get_post_meta( $post->ID, '_event_registration_url', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="event_date"><?php esc_html_e( 'Event Date', 'studyabroad-developer' ); ?></label></th>
            <td><input type="date" id="event_date" name="event_date" value="<?php echo esc_attr( $event_date ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="event_time"><?php esc_html_e( 'Event Time', 'studyabroad-developer' ); ?></label></th>
            <td><input type="time" id="event_time" name="event_time" value="<?php echo esc_attr( $event_time ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="event_location"><?php esc_html_e( 'Location', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="event_location" name="event_location" value="<?php echo esc_attr( $event_location ); ?>" class="large-text"></td>
        </tr>
        <tr>
            <th><label for="event_registration_url"><?php esc_html_e( 'Registration URL', 'studyabroad-developer' ); ?></label></th>
            <td><input type="url" id="event_registration_url" name="event_registration_url" value="<?php echo esc_url( $event_registration_url ); ?>" class="large-text"></td>
        </tr>
    </table>
    <?php
}

/**
 * Testimonial meta box callback
 */
function studyabroad_testimonial_meta_box_callback( $post ) {
    wp_nonce_field( 'studyabroad_testimonial_meta_box', 'studyabroad_testimonial_meta_box_nonce' );

    $student_name = get_post_meta( $post->ID, '_student_name', true );
    $student_country = get_post_meta( $post->ID, '_student_country', true );
    $student_university = get_post_meta( $post->ID, '_student_university', true );
    $rating = get_post_meta( $post->ID, '_testimonial_rating', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="student_name"><?php esc_html_e( 'Student Name', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="student_name" name="student_name" value="<?php echo esc_attr( $student_name ); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="student_country"><?php esc_html_e( 'Study Country', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="student_country" name="student_country" value="<?php echo esc_attr( $student_country ); ?>" class="regular-text" placeholder="e.g., Canada, Australia"></td>
        </tr>
        <tr>
            <th><label for="student_university"><?php esc_html_e( 'University', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="student_university" name="student_university" value="<?php echo esc_attr( $student_university ); ?>" class="large-text"></td>
        </tr>
        <tr>
            <th><label for="testimonial_rating"><?php esc_html_e( 'Rating (1-5)', 'studyabroad-developer' ); ?></label></th>
            <td>
                <select id="testimonial_rating" name="testimonial_rating">
                    <option value="5" <?php selected( $rating, '5' ); ?>>5 Stars</option>
                    <option value="4" <?php selected( $rating, '4' ); ?>>4 Stars</option>
                    <option value="3" <?php selected( $rating, '3' ); ?>>3 Stars</option>
                    <option value="2" <?php selected( $rating, '2' ); ?>>2 Stars</option>
                    <option value="1" <?php selected( $rating, '1' ); ?>>1 Star</option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Destination meta box callback
 */
function studyabroad_destination_meta_box_callback( $post ) {
    wp_nonce_field( 'studyabroad_destination_meta_box', 'studyabroad_destination_meta_box_nonce' );

    $country_code = get_post_meta( $post->ID, '_country_code', true );
    $universities_count = get_post_meta( $post->ID, '_universities_count', true );
    $avg_tuition = get_post_meta( $post->ID, '_avg_tuition', true );
    $visa_requirements = get_post_meta( $post->ID, '_visa_requirements', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="country_code"><?php esc_html_e( 'Country Code', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="country_code" name="country_code" value="<?php echo esc_attr( $country_code ); ?>" class="small-text" placeholder="e.g., CA, AU, US"></td>
        </tr>
        <tr>
            <th><label for="universities_count"><?php esc_html_e( 'Partner Universities', 'studyabroad-developer' ); ?></label></th>
            <td><input type="number" id="universities_count" name="universities_count" value="<?php echo esc_attr( $universities_count ); ?>" class="small-text"></td>
        </tr>
        <tr>
            <th><label for="avg_tuition"><?php esc_html_e( 'Avg. Annual Tuition', 'studyabroad-developer' ); ?></label></th>
            <td><input type="text" id="avg_tuition" name="avg_tuition" value="<?php echo esc_attr( $avg_tuition ); ?>" class="regular-text" placeholder="e.g., $15,000 - $35,000"></td>
        </tr>
        <tr>
            <th><label for="visa_requirements"><?php esc_html_e( 'Visa Requirements', 'studyabroad-developer' ); ?></label></th>
            <td><textarea id="visa_requirements" name="visa_requirements" class="large-text" rows="3"><?php echo esc_textarea( $visa_requirements ); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Service meta box callback
 */
function studyabroad_service_meta_box_callback( $post ) {
    wp_nonce_field( 'studyabroad_service_meta_box', 'studyabroad_service_meta_box_nonce' );

    $service_icon = get_post_meta( $post->ID, '_service_icon', true );
    $service_features = get_post_meta( $post->ID, '_service_features', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="service_icon"><?php esc_html_e( 'Icon Name', 'studyabroad-developer' ); ?></label></th>
            <td>
                <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr( $service_icon ); ?>" class="regular-text">
                <p class="description"><?php esc_html_e( 'Enter icon name: users, globe, file-text, award, briefcase, plane, graduation-cap', 'studyabroad-developer' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="service_features"><?php esc_html_e( 'Features (one per line)', 'studyabroad-developer' ); ?></label></th>
            <td><textarea id="service_features" name="service_features" class="large-text" rows="4"><?php echo esc_textarea( $service_features ); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Save meta box data
 */
function studyabroad_save_meta_boxes( $post_id ) {
    // Event meta
    if ( isset( $_POST['studyabroad_event_meta_box_nonce'] ) && wp_verify_nonce( $_POST['studyabroad_event_meta_box_nonce'], 'studyabroad_event_meta_box' ) ) {
        if ( isset( $_POST['event_date'] ) ) {
            update_post_meta( $post_id, '_event_date', sanitize_text_field( $_POST['event_date'] ) );
        }
        if ( isset( $_POST['event_time'] ) ) {
            update_post_meta( $post_id, '_event_time', sanitize_text_field( $_POST['event_time'] ) );
        }
        if ( isset( $_POST['event_location'] ) ) {
            update_post_meta( $post_id, '_event_location', sanitize_text_field( $_POST['event_location'] ) );
        }
        if ( isset( $_POST['event_registration_url'] ) ) {
            update_post_meta( $post_id, '_event_registration_url', esc_url_raw( $_POST['event_registration_url'] ) );
        }
    }

    // Testimonial meta
    if ( isset( $_POST['studyabroad_testimonial_meta_box_nonce'] ) && wp_verify_nonce( $_POST['studyabroad_testimonial_meta_box_nonce'], 'studyabroad_testimonial_meta_box' ) ) {
        if ( isset( $_POST['student_name'] ) ) {
            update_post_meta( $post_id, '_student_name', sanitize_text_field( $_POST['student_name'] ) );
        }
        if ( isset( $_POST['student_country'] ) ) {
            update_post_meta( $post_id, '_student_country', sanitize_text_field( $_POST['student_country'] ) );
        }
        if ( isset( $_POST['student_university'] ) ) {
            update_post_meta( $post_id, '_student_university', sanitize_text_field( $_POST['student_university'] ) );
        }
        if ( isset( $_POST['testimonial_rating'] ) ) {
            update_post_meta( $post_id, '_testimonial_rating', intval( $_POST['testimonial_rating'] ) );
        }
    }

    // Destination meta
    if ( isset( $_POST['studyabroad_destination_meta_box_nonce'] ) && wp_verify_nonce( $_POST['studyabroad_destination_meta_box_nonce'], 'studyabroad_destination_meta_box' ) ) {
        if ( isset( $_POST['country_code'] ) ) {
            update_post_meta( $post_id, '_country_code', sanitize_text_field( $_POST['country_code'] ) );
        }
        if ( isset( $_POST['universities_count'] ) ) {
            update_post_meta( $post_id, '_universities_count', intval( $_POST['universities_count'] ) );
        }
        if ( isset( $_POST['avg_tuition'] ) ) {
            update_post_meta( $post_id, '_avg_tuition', sanitize_text_field( $_POST['avg_tuition'] ) );
        }
        if ( isset( $_POST['visa_requirements'] ) ) {
            update_post_meta( $post_id, '_visa_requirements', sanitize_textarea_field( $_POST['visa_requirements'] ) );
        }
    }

    // Service meta
    if ( isset( $_POST['studyabroad_service_meta_box_nonce'] ) && wp_verify_nonce( $_POST['studyabroad_service_meta_box_nonce'], 'studyabroad_service_meta_box' ) ) {
        if ( isset( $_POST['service_icon'] ) ) {
            update_post_meta( $post_id, '_service_icon', sanitize_text_field( $_POST['service_icon'] ) );
        }
        if ( isset( $_POST['service_features'] ) ) {
            update_post_meta( $post_id, '_service_features', sanitize_textarea_field( $_POST['service_features'] ) );
        }
    }
}
add_action( 'save_post', 'studyabroad_save_meta_boxes' );

/**
 * Flush rewrite rules on theme activation
 */
function studyabroad_rewrite_flush() {
    studyabroad_register_post_types();
    studyabroad_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'studyabroad_rewrite_flush' );
