<?php
/**
 * Archive template for Destinations
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 100px 0 60px; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 15px;"><?php esc_html_e( 'Study Destinations', 'studyabroad-developer' ); ?></h1>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
            <?php esc_html_e( 'Explore the world\'s best countries for international education. Your dream destination awaits.', 'studyabroad-developer' ); ?>
        </p>
    </div>
</section>

<main id="primary" class="site-main" style="padding: 80px 0;">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            
            <div class="destinations-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                <?php
                while ( have_posts() ) :
                    the_post();
                    
                    $universities = get_post_meta( get_the_ID(), '_destination_universities', true );
                    $programs     = get_post_meta( get_the_ID(), '_destination_programs', true );
                ?>
                    <article class="destination-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="destination-image" style="display: block; height: 220px; overflow: hidden;">
                                <?php the_post_thumbnail( 'studyabroad-destination', array( 'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;' ) ); ?>
                            </a>
                        <?php endif; ?>
                        
                        <div class="destination-content" style="padding: 25px;">
                            <h2 style="margin-bottom: 15px; font-size: 1.5rem;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--text-dark);"><?php the_title(); ?></a>
                            </h2>
                            
                            <p style="color: var(--text-light); margin-bottom: 20px; line-height: 1.6;">
                                <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                            </p>
                            
                            <div style="display: flex; gap: 20px; margin-bottom: 20px; padding-top: 20px; border-top: 1px solid #eee;">
                                <?php if ( $universities ) : ?>
                                    <div>
                                        <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color); display: block;"><?php echo esc_html( $universities ); ?>+</span>
                                        <span style="font-size: 13px; color: var(--text-light);"><?php esc_html_e( 'Universities', 'studyabroad-developer' ); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ( $programs ) : ?>
                                    <div>
                                        <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color); display: block;"><?php echo esc_html( $programs ); ?>+</span>
                                        <span style="font-size: 13px; color: var(--text-light);"><?php esc_html_e( 'Programs', 'studyabroad-developer' ); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="width: 100%; text-align: center; display: block;">
                                <?php esc_html_e( 'Explore', 'studyabroad-developer' ); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 5px; vertical-align: middle;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php studyabroad_developer_pagination(); ?>
            
        <?php else : ?>
            <div style="text-align: center; padding: 60px 20px;">
                <h2><?php esc_html_e( 'No Destinations Found', 'studyabroad-developer' ); ?></h2>
                <p style="color: var(--text-light);"><?php esc_html_e( 'Check back soon for available study destinations.', 'studyabroad-developer' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- CTA Section -->
<section style="background: var(--primary-color); padding: 80px 0; text-align: center;">
    <div class="container">
        <h2 style="color: white; margin-bottom: 15px;"><?php esc_html_e( 'Not Sure Which Destination Is Right for You?', 'studyabroad-developer' ); ?></h2>
        <p style="color: rgba(255,255,255,0.9); margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
            <?php esc_html_e( 'Our expert counselors can help you choose the perfect study destination based on your goals and preferences.', 'studyabroad-developer' ); ?>
        </p>
        <a href="#consultation" class="btn btn-accent"><?php esc_html_e( 'Get Free Guidance', 'studyabroad-developer' ); ?></a>
    </div>
</section>

<?php
get_footer();
