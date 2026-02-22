<?php
/**
 * The sidebar containing the main widget area
 *
 * @package StudyAbroad_Developer
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area sidebar">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    
    <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
        <!-- Default Sidebar Content -->
        <div class="widget widget_search">
            <h3 class="widget-title"><?php esc_html_e( 'Search', 'studyabroad-developer' ); ?></h3>
            <?php get_search_form(); ?>
        </div>
        
        <div class="widget widget_destinations">
            <h3 class="widget-title"><?php esc_html_e( 'Popular Destinations', 'studyabroad-developer' ); ?></h3>
            <ul>
                <?php
                $destinations = get_posts( array(
                    'post_type'      => 'destination',
                    'posts_per_page' => 5,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ) );
                
                if ( $destinations ) {
                    foreach ( $destinations as $destination ) {
                        echo '<li><a href="' . esc_url( get_permalink( $destination->ID ) ) . '">' . esc_html( get_the_title( $destination->ID ) ) . '</a></li>';
                    }
                    wp_reset_postdata();
                } else {
                    echo '<li>' . esc_html__( 'No destinations found.', 'studyabroad-developer' ) . '</li>';
                }
                ?>
            </ul>
        </div>
        
        <div class="widget widget_cta">
            <h3 class="widget-title"><?php esc_html_e( 'Free Consultation', 'studyabroad-developer' ); ?></h3>
            <p><?php esc_html_e( 'Ready to start your study abroad journey? Book a free consultation with our experts.', 'studyabroad-developer' ); ?></p>
            <a href="#consultation" class="btn btn-primary" style="width: 100%; display: block; text-align: center;">
                <?php esc_html_e( 'Book Now', 'studyabroad-developer' ); ?>
            </a>
        </div>
    <?php endif; ?>
</aside>
