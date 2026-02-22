<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<section class="error-404">
    <div class="container">
        <div class="error-404-content">
            <h1>404</h1>
            <h2><?php esc_html_e( 'Page Not Found', 'studyabroad-developer' ); ?></h2>
            <p><?php esc_html_e( 'Oops! The page you are looking for does not exist or has been moved. Don\'t worry, let\'s get you back on track.', 'studyabroad-developer' ); ?></p>
            
            <div class="error-actions" style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-top: 30px;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    <?php esc_html_e( 'Back to Home', 'studyabroad-developer' ); ?>
                </a>
                <a href="#consultation" class="btn btn-secondary">
                    <?php esc_html_e( 'Contact Us', 'studyabroad-developer' ); ?>
                </a>
            </div>
            
            <div class="error-search" style="max-width: 500px; margin: 40px auto 0;">
                <p style="margin-bottom: 15px;"><?php esc_html_e( 'Or try searching:', 'studyabroad-developer' ); ?></p>
                <?php get_search_form(); ?>
            </div>
            
            <div class="error-links" style="margin-top: 50px;">
                <h3 style="margin-bottom: 20px;"><?php esc_html_e( 'Helpful Links', 'studyabroad-developer' ); ?></h3>
                <ul style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px 30px;">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'studyabroad-developer' ); ?></a></li>
                    <li><a href="#about"><?php esc_html_e( 'About Us', 'studyabroad-developer' ); ?></a></li>
                    <li><a href="#destinations"><?php esc_html_e( 'Destinations', 'studyabroad-developer' ); ?></a></li>
                    <li><a href="#services"><?php esc_html_e( 'Services', 'studyabroad-developer' ); ?></a></li>
                    <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Blog', 'studyabroad-developer' ); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
