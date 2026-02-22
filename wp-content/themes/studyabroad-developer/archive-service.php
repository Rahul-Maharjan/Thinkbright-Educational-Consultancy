<?php
/**
 * Archive template for Services
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 100px 0 60px; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 15px;"><?php esc_html_e( 'Our Services', 'studyabroad-developer' ); ?></h1>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
            <?php esc_html_e( 'Comprehensive support services to guide you through every step of your study abroad journey.', 'studyabroad-developer' ); ?>
        </p>
    </div>
</section>

<main id="primary" class="site-main" style="padding: 80px 0;">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            
            <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                <?php
                while ( have_posts() ) :
                    the_post();
                    
                    $price    = get_post_meta( get_the_ID(), '_service_price', true );
                    $duration = get_post_meta( get_the_ID(), '_service_duration', true );
                ?>
                    <article class="service-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="service-image" style="display: block; height: 200px; overflow: hidden;">
                                <?php the_post_thumbnail( 'studyabroad-service', array( 'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;' ) ); ?>
                            </a>
                        <?php endif; ?>
                        
                        <div class="service-content" style="padding: 25px;">
                            <h2 style="margin-bottom: 12px; font-size: 1.3rem;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--text-dark);"><?php the_title(); ?></a>
                            </h2>
                            
                            <p style="color: var(--text-light); margin-bottom: 20px; line-height: 1.6; font-size: 15px;">
                                <?php echo wp_trim_words( get_the_excerpt(), 18 ); ?>
                            </p>
                            
                            <?php if ( $price || $duration ) : ?>
                                <div style="display: flex; gap: 20px; margin-bottom: 20px; padding-top: 15px; border-top: 1px solid #eee;">
                                    <?php if ( $price ) : ?>
                                        <div>
                                            <span style="font-size: 12px; color: var(--text-light); display: block;"><?php esc_html_e( 'Starting from', 'studyabroad-developer' ); ?></span>
                                            <span style="font-weight: 700; color: var(--primary-color);"><?php echo esc_html( $price ); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ( $duration ) : ?>
                                        <div>
                                            <span style="font-size: 12px; color: var(--text-light); display: block;"><?php esc_html_e( 'Duration', 'studyabroad-developer' ); ?></span>
                                            <span style="font-weight: 500;"><?php echo esc_html( $duration ); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width: 100%; text-align: center; display: block;">
                                <?php esc_html_e( 'Learn More', 'studyabroad-developer' ); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php studyabroad_developer_pagination(); ?>
            
        <?php else : ?>
            <div style="text-align: center; padding: 60px 20px;">
                <h2><?php esc_html_e( 'No Services Found', 'studyabroad-developer' ); ?></h2>
                <p style="color: var(--text-light);"><?php esc_html_e( 'Our services will be listed here soon.', 'studyabroad-developer' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Why Choose Us Section -->
<section style="background: var(--bg-light); padding: 80px 0;">
    <div class="container">
        <div style="text-align: center; max-width: 700px; margin: 0 auto 50px;">
            <h2><?php esc_html_e( 'Why Choose Our Services?', 'studyabroad-developer' ); ?></h2>
            <p style="color: var(--text-light);"><?php esc_html_e( 'We provide end-to-end support with a personalized approach to ensure your success.', 'studyabroad-developer' ); ?></p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <div style="text-align: center; padding: 30px;">
                <div style="width: 70px; height: 70px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h3 style="margin-bottom: 10px;"><?php esc_html_e( 'Expert Counselors', 'studyabroad-developer' ); ?></h3>
                <p style="color: var(--text-light); font-size: 15px;"><?php esc_html_e( 'Certified professionals with years of experience in international education.', 'studyabroad-developer' ); ?></p>
            </div>
            
            <div style="text-align: center; padding: 30px;">
                <div style="width: 70px; height: 70px; background: var(--secondary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="16 12 12 8 8 12"></polyline><line x1="12" y1="16" x2="12" y2="8"></line></svg>
                </div>
                <h3 style="margin-bottom: 10px;"><?php esc_html_e( 'High Success Rate', 'studyabroad-developer' ); ?></h3>
                <p style="color: var(--text-light); font-size: 15px;"><?php esc_html_e( '95% visa approval rate with proven application strategies.', 'studyabroad-developer' ); ?></p>
            </div>
            
            <div style="text-align: center; padding: 30px;">
                <div style="width: 70px; height: 70px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <h3 style="margin-bottom: 10px;"><?php esc_html_e( 'Trusted Partner', 'studyabroad-developer' ); ?></h3>
                <p style="color: var(--text-light); font-size: 15px;"><?php esc_html_e( 'Official representatives of 500+ universities worldwide.', 'studyabroad-developer' ); ?></p>
            </div>
            
            <div style="text-align: center; padding: 30px;">
                <div style="width: 70px; height: 70px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                </div>
                <h3 style="margin-bottom: 10px;"><?php esc_html_e( 'Transparent Process', 'studyabroad-developer' ); ?></h3>
                <p style="color: var(--text-light); font-size: 15px;"><?php esc_html_e( 'No hidden fees, clear timelines, and honest guidance.', 'studyabroad-developer' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="background: var(--primary-color); padding: 80px 0; text-align: center;">
    <div class="container">
        <h2 style="color: white; margin-bottom: 15px;"><?php esc_html_e( 'Ready to Start Your Journey?', 'studyabroad-developer' ); ?></h2>
        <p style="color: rgba(255,255,255,0.9); margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
            <?php esc_html_e( 'Book a free consultation with our expert counselors and take the first step towards your international education.', 'studyabroad-developer' ); ?>
        </p>
        <a href="#consultation" class="btn btn-accent"><?php esc_html_e( 'Book Free Consultation', 'studyabroad-developer' ); ?></a>
    </div>
</section>

<?php
get_footer();
