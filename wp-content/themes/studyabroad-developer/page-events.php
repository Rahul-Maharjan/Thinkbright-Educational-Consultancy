<?php
/**
 * Template Name: Events Page
 *
 * @package StudyAbroad_Developer
 */

get_header();

$today = date( 'Y-m-d' );
?>

<!-- Page Hero -->
<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 120px 0 80px; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3rem; margin-bottom: 15px;"><?php the_title(); ?></h1>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
            <?php esc_html_e( 'Join our educational seminars, university fairs, and informative webinars.', 'studyabroad-developer' ); ?>
        </p>
    </div>
</section>

<!-- Upcoming Events -->
<section class="section">
    <div class="container">
        <?php
        $upcoming_events = new WP_Query( array(
            'post_type'      => 'event',
            'posts_per_page' => -1,
            'meta_key'       => '_event_date',
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => '_event_date',
                    'value'   => $today,
                    'compare' => '>=',
                    'type'    => 'DATE',
                ),
            ),
        ) );
        
        if ( $upcoming_events->have_posts() ) :
        ?>
            <div class="section-header">
                <h2 class="section-title"><?php esc_html_e( 'Upcoming Events', 'studyabroad-developer' ); ?></h2>
            </div>
            
            <div class="events-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; margin-bottom: 60px;">
                <?php
                while ( $upcoming_events->have_posts() ) :
                    $upcoming_events->the_post();
                    
                    $event_date     = get_post_meta( get_the_ID(), '_event_date', true );
                    $event_time     = get_post_meta( get_the_ID(), '_event_time', true );
                    $event_location = get_post_meta( get_the_ID(), '_event_location', true );
                    $event_type     = get_post_meta( get_the_ID(), '_event_type', true );
                    $register_link  = get_post_meta( get_the_ID(), '_event_register_link', true );
                ?>
                    <article class="event-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" style="display: block; height: 200px; overflow: hidden; position: relative;">
                                <?php the_post_thumbnail( 'studyabroad-card', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                                <?php if ( $event_date ) : ?>
                                    <div style="position: absolute; top: 15px; left: 15px; background: var(--primary-color); color: white; padding: 10px 15px; border-radius: 8px; text-align: center;">
                                        <span style="display: block; font-size: 1.5rem; font-weight: 700; line-height: 1;"><?php echo date( 'd', strtotime( $event_date ) ); ?></span>
                                        <span style="font-size: 12px; text-transform: uppercase;"><?php echo date( 'M', strtotime( $event_date ) ); ?></span>
                                    </div>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                        
                        <div style="padding: 25px;">
                            <?php if ( $event_type ) : ?>
                                <span style="display: inline-block; background: var(--accent-color); color: var(--primary-color); padding: 4px 12px; border-radius: 15px; font-size: 12px; font-weight: 600; margin-bottom: 12px;">
                                    <?php echo esc_html( ucfirst( $event_type ) ); ?>
                                </span>
                            <?php endif; ?>
                            
                            <h3 style="margin-bottom: 15px; font-size: 1.25rem;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--text-dark);"><?php the_title(); ?></a>
                            </h3>
                            
                            <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 20px; color: var(--text-light); font-size: 14px;">
                                <?php if ( $event_time ) : ?>
                                    <span style="display: flex; align-items: center; gap: 6px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        <?php echo esc_html( $event_time ); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ( $event_location ) : ?>
                                    <span style="display: flex; align-items: center; gap: 6px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                        <?php echo esc_html( $event_location ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <p style="color: var(--text-light); margin-bottom: 20px; line-height: 1.6;">
                                <?php echo wp_trim_words( get_the_excerpt(), 15 ); ?>
                            </p>
                            
                            <a href="<?php echo esc_url( $register_link ?: get_permalink() ); ?>" class="btn btn-primary" style="width: 100%; text-align: center;">
                                <?php esc_html_e( 'Register Now', 'studyabroad-developer' ); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <!-- No upcoming events - show default -->
            <div style="text-align: center; padding: 60px 20px; background: var(--bg-light); border-radius: 16px; margin-bottom: 60px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="var(--text-light)" stroke-width="1.5" style="margin-bottom: 20px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <h3 style="margin-bottom: 10px;"><?php esc_html_e( 'No Upcoming Events', 'studyabroad-developer' ); ?></h3>
                <p style="color: var(--text-light); margin-bottom: 20px;"><?php esc_html_e( 'Stay tuned! We\'re planning exciting events. Subscribe to get notified.', 'studyabroad-developer' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Contact Us', 'studyabroad-developer' ); ?></a>
            </div>
        <?php endif; ?>
        
        <!-- Past Events -->
        <?php
        $past_events = new WP_Query( array(
            'post_type'      => 'event',
            'posts_per_page' => 6,
            'meta_key'       => '_event_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'meta_query'     => array(
                array(
                    'key'     => '_event_date',
                    'value'   => $today,
                    'compare' => '<',
                    'type'    => 'DATE',
                ),
            ),
        ) );
        
        if ( $past_events->have_posts() ) :
        ?>
            <div class="section-header">
                <h2 class="section-title" style="color: var(--text-light);"><?php esc_html_e( 'Past Events', 'studyabroad-developer' ); ?></h2>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
                <?php
                while ( $past_events->have_posts() ) :
                    $past_events->the_post();
                    $event_date = get_post_meta( get_the_ID(), '_event_date', true );
                ?>
                    <article style="padding: 20px; background: var(--bg-light); border-radius: 12px; opacity: 0.8;">
                        <span style="font-size: 13px; color: var(--text-light);"><?php echo date_i18n( 'F j, Y', strtotime( $event_date ) ); ?></span>
                        <h4 style="margin: 8px 0;">
                            <a href="<?php the_permalink(); ?>" style="color: var(--text-dark);"><?php the_title(); ?></a>
                        </h4>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section style="background: var(--primary-color); padding: 80px 0; text-align: center;">
    <div class="container">
        <h2 style="color: white; margin-bottom: 15px;"><?php esc_html_e( 'Want to Host an Event with Us?', 'studyabroad-developer' ); ?></h2>
        <p style="color: rgba(255,255,255,0.9); margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
            <?php esc_html_e( 'Partner with us for university fairs, education seminars, and student recruitment events.', 'studyabroad-developer' ); ?>
        </p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-accent btn-lg"><?php esc_html_e( 'Get in Touch', 'studyabroad-developer' ); ?></a>
    </div>
</section>

<?php
get_footer();
