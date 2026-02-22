<?php
/**
 * Template for displaying single service
 *
 * @package StudyAbroad_Developer
 */

get_header();

while ( have_posts() ) :
    the_post();

    // Get meta data
    $price    = get_post_meta( get_the_ID(), '_service_price', true );
    $duration = get_post_meta( get_the_ID(), '_service_duration', true );
    $features = get_post_meta( get_the_ID(), '_service_features', true );
?>

<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 100px 0 60px;">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <span style="display: inline-block; background: rgba(255,255,255,0.2); color: white; padding: 6px 16px; border-radius: 20px; font-size: 14px; margin-bottom: 15px;">
                <?php esc_html_e( 'Our Services', 'studyabroad-developer' ); ?>
            </span>
            <h1 style="color: white; font-size: 2.5rem; margin-bottom: 20px;"><?php the_title(); ?></h1>
            <p style="color: rgba(255,255,255,0.9); font-size: 1.1rem; line-height: 1.7;"><?php echo wp_trim_words( get_the_excerpt(), 30 ); ?></p>
        </div>
    </div>
</section>

<main id="primary" class="site-main" style="padding: 80px 0;">
    <div class="container">
        <div class="service-content" style="display: grid; grid-template-columns: 1fr 350px; gap: 50px;">
            <div class="service-main">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="margin-bottom: 40px; border-radius: 12px; overflow: hidden;">
                        <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto;' ) ); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content" style="font-size: 1.1rem; line-height: 1.8;">
                    <?php the_content(); ?>
                </div>
                
                <?php if ( $features ) : ?>
                    <div style="margin-top: 50px; padding: 30px; background: var(--bg-light); border-radius: 12px;">
                        <h3 style="margin-bottom: 20px;"><?php esc_html_e( 'What\'s Included', 'studyabroad-developer' ); ?></h3>
                        <div><?php echo wp_kses_post( wpautop( $features ) ); ?></div>
                    </div>
                <?php endif; ?>
            </div>
            
            <aside class="service-sidebar" style="position: sticky; top: 100px; height: fit-content;">
                <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                    <h3 style="margin-bottom: 25px;"><?php esc_html_e( 'Service Details', 'studyabroad-developer' ); ?></h3>
                    
                    <?php if ( $price ) : ?>
                        <div style="text-align: center; padding: 20px; background: var(--bg-light); border-radius: 8px; margin-bottom: 20px;">
                            <span style="display: block; font-size: 14px; color: var(--text-light);"><?php esc_html_e( 'Starting from', 'studyabroad-developer' ); ?></span>
                            <span style="font-size: 2rem; font-weight: 700; color: var(--primary-color);"><?php echo esc_html( $price ); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ( $duration ) : ?>
                        <div style="display: flex; align-items: center; gap: 12px; padding: 15px 0; border-bottom: 1px solid #eee;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <div>
                                <strong style="display: block; font-size: 14px; color: var(--text-light);"><?php esc_html_e( 'Duration', 'studyabroad-developer' ); ?></strong>
                                <span><?php echo esc_html( $duration ); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div style="margin-top: 30px;">
                        <a href="#consultation" class="btn btn-primary" style="width: 100%; text-align: center; display: block; margin-bottom: 10px;">
                            <?php esc_html_e( 'Get Started', 'studyabroad-developer' ); ?>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="btn btn-secondary" style="width: 100%; text-align: center; display: block;">
                            <?php esc_html_e( 'View All Services', 'studyabroad-developer' ); ?>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php
endwhile;

get_footer();
