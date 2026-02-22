<?php
/**
 * Template Name: Services Page
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<!-- Page Hero -->
<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 120px 0 80px; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3rem; margin-bottom: 15px;"><?php the_title(); ?></h1>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
            <?php esc_html_e( 'Comprehensive support services to guide you through every step of your study abroad journey.', 'studyabroad-developer' ); ?>
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="section">
    <div class="container">
        <?php
        // Check if there's page content
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                if ( get_the_content() ) :
        ?>
                    <div class="page-content" style="margin-bottom: 60px;">
                        <?php the_content(); ?>
                    </div>
        <?php 
                endif;
            endwhile;
        endif;
        ?>
        
        <div class="grid grid-3" style="gap: 30px;">
            <?php
            $services = new WP_Query( array(
                'post_type'      => 'service',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ) );
            
            if ( $services->have_posts() ) :
                while ( $services->have_posts() ) : $services->the_post();
                    $price    = get_post_meta( get_the_ID(), '_service_price', true );
                    $duration = get_post_meta( get_the_ID(), '_service_duration', true );
                    $icon     = get_post_meta( get_the_ID(), '_service_icon', true ) ?: 'briefcase';
            ?>
                <article class="service-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); transition: transform 0.3s, box-shadow 0.3s;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" style="display: block; height: 200px; overflow: hidden;">
                            <?php the_post_thumbnail( 'studyabroad-card', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                        </a>
                    <?php endif; ?>
                    
                    <div style="padding: 30px;">
                        <div class="service-icon" style="width: 60px; height: 60px; background: var(--bg-light); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                            <?php echo studyabroad_get_icon( $icon ); ?>
                        </div>
                        
                        <h3 style="margin-bottom: 12px; font-size: 1.3rem;">
                            <a href="<?php the_permalink(); ?>" style="color: var(--text-dark);"><?php the_title(); ?></a>
                        </h3>
                        
                        <p style="color: var(--text-light); margin-bottom: 20px; line-height: 1.7;">
                            <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                        </p>
                        
                        <?php if ( $price || $duration ) : ?>
                            <div style="display: flex; gap: 20px; margin-bottom: 20px; padding-top: 15px; border-top: 1px solid #eee;">
                                <?php if ( $price ) : ?>
                                    <div>
                                        <span style="font-size: 12px; color: var(--text-light); display: block;"><?php esc_html_e( 'Starting from', 'studyabroad-developer' ); ?></span>
                                        <span style="font-weight: 700; color: var(--primary-color);"><?php echo esc_html( $price ); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="width: 100%; text-align: center;">
                            <?php esc_html_e( 'Learn More', 'studyabroad-developer' ); ?>
                        </a>
                    </div>
                </article>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
                // Default services if no CPT entries
                $default_services = studyabroad_get_default_services();
                foreach ( $default_services as $service ) :
            ?>
                <div class="service-card" style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                    <div class="service-icon" style="width: 60px; height: 60px; background: var(--bg-light); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <?php echo studyabroad_get_icon( $service['icon'] ); ?>
                    </div>
                    <h3 style="margin-bottom: 12px;"><?php echo esc_html( $service['title'] ); ?></h3>
                    <p style="color: var(--text-light); line-height: 1.7;"><?php echo esc_html( $service['desc'] ); ?></p>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="section section-light">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Our Process', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'How We Work', 'studyabroad-developer' ); ?></h2>
        </div>
        
        <div class="process-timeline">
            <?php 
            $steps = studyabroad_get_process_steps();
            foreach ( $steps as $step ) :
            ?>
                <div class="process-step">
                    <div class="step-number"><?php echo esc_html( $step['number'] ); ?></div>
                    <div class="step-icon">
                        <?php echo studyabroad_get_icon( $step['icon'] ); ?>
                    </div>
                    <h5><?php echo esc_html( $step['title'] ); ?></h5>
                    <p><?php echo esc_html( $step['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="background: var(--primary-color); padding: 80px 0; text-align: center;">
    <div class="container">
        <h2 style="color: white; margin-bottom: 15px;"><?php esc_html_e( 'Need Professional Guidance?', 'studyabroad-developer' ); ?></h2>
        <p style="color: rgba(255,255,255,0.9); margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
            <?php esc_html_e( 'Our expert counselors are ready to help you choose the right service package for your needs.', 'studyabroad-developer' ); ?>
        </p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-accent btn-lg"><?php esc_html_e( 'Get Free Consultation', 'studyabroad-developer' ); ?></a>
    </div>
</section>

<?php
get_footer();
