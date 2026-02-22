<?php
/**
 * Template Name: Destinations Page
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
            <?php esc_html_e( 'Explore the world\'s best countries for international education. Your dream destination awaits.', 'studyabroad-developer' ); ?>
        </p>
    </div>
</section>

<!-- Destinations Grid -->
<section class="section">
    <div class="container">
        <?php
        // Check if there's page content
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                if ( get_the_content() ) :
        ?>
                    <div class="page-content" style="margin-bottom: 60px; text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;">
                        <?php the_content(); ?>
                    </div>
        <?php 
                endif;
            endwhile;
        endif;
        ?>
        
        <div class="destinations-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
            <?php
            $destinations = new WP_Query( array(
                'post_type'      => 'destination',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ) );
            
            if ( $destinations->have_posts() ) :
                while ( $destinations->have_posts() ) : $destinations->the_post();
                    $universities = get_post_meta( get_the_ID(), '_destination_universities', true );
                    $programs     = get_post_meta( get_the_ID(), '_destination_programs', true );
            ?>
                <article class="destination-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: transform 0.3s;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" style="display: block; height: 220px; overflow: hidden; position: relative;">
                            <?php the_post_thumbnail( 'studyabroad-card', array( 'style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;' ) ); ?>
                            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);"></div>
                            <h3 style="position: absolute; bottom: 20px; left: 20px; color: white; margin: 0; font-size: 1.5rem;"><?php the_title(); ?></h3>
                        </a>
                    <?php endif; ?>
                    
                    <div style="padding: 25px;">
                        <p style="color: var(--text-light); margin-bottom: 20px; line-height: 1.6;">
                            <?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
                        </p>
                        
                        <div style="display: flex; gap: 25px; margin-bottom: 20px; padding-top: 15px; border-top: 1px solid #eee;">
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
                        
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width: 100%; text-align: center;">
                            <?php esc_html_e( 'Explore', 'studyabroad-developer' ); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left: 5px; vertical-align: middle;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                    </div>
                </article>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
                // Default destinations
                $default_destinations = studyabroad_get_default_destinations();
                foreach ( $default_destinations as $destination ) :
            ?>
                <div class="destination-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                    <div style="height: 220px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); display: flex; align-items: flex-end; padding: 20px;">
                        <h3 style="color: white; margin: 0; font-size: 1.5rem;"><?php echo esc_html( $destination['title'] ); ?></h3>
                    </div>
                    <div style="padding: 25px;">
                        <p style="color: var(--text-light); margin-bottom: 20px;"><?php echo esc_html( $destination['desc'] ?? 'Discover amazing study opportunities in ' . $destination['title'] ); ?></p>
                        <a href="#" class="btn btn-primary" style="width: 100%; text-align: center;"><?php esc_html_e( 'Explore', 'studyabroad-developer' ); ?></a>
                    </div>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Help Section -->
<section class="section section-light">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">
            <div>
                <span class="section-subtitle"><?php esc_html_e( 'Not Sure Where to Go?', 'studyabroad-developer' ); ?></span>
                <h2 style="margin-bottom: 20px;"><?php esc_html_e( 'We\'ll Help You Choose the Perfect Destination', 'studyabroad-developer' ); ?></h2>
                <p style="color: var(--text-light); margin-bottom: 30px; line-height: 1.8;">
                    <?php esc_html_e( 'Our expert counselors will assess your academic background, career goals, budget, and preferences to recommend the best study destinations for you.', 'studyabroad-developer' ); ?>
                </p>
                <ul style="list-style: none; padding: 0; margin: 0 0 30px;">
                    <li style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span><?php esc_html_e( 'Personalized country recommendations', 'studyabroad-developer' ); ?></span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span><?php esc_html_e( 'Budget and cost analysis', 'studyabroad-developer' ); ?></span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span><?php esc_html_e( 'Career prospects evaluation', 'studyabroad-developer' ); ?></span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span><?php esc_html_e( 'Immigration pathway guidance', 'studyabroad-developer' ); ?></span>
                    </li>
                </ul>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary btn-lg"><?php esc_html_e( 'Get Free Consultation', 'studyabroad-developer' ); ?></a>
            </div>
            <div style="text-align: center;">
                <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/consultation.jpg' ); ?>" alt="Consultation" style="border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
