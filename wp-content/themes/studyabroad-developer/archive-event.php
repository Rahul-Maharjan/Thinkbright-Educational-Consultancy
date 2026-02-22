<?php
/**
 * Archive template for Events
 *
 * @package StudyAbroad_Developer
 */

get_header();

// Separate upcoming and past events
$today = date( 'Y-m-d' );
?>

<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 100px 0 60px; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 15px;"><?php esc_html_e( 'Events & Webinars', 'studyabroad-developer' ); ?></h1>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
            <?php esc_html_e( 'Join our educational seminars, university fairs, and informative webinars.', 'studyabroad-developer' ); ?>
        </p>
    </div>
</section>

<main id="primary" class="site-main" style="padding: 80px 0;">
    <div class="container">
        
        <!-- Upcoming Events -->
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
            <div class="upcoming-events" style="margin-bottom: 60px;">
                <h2 style="margin-bottom: 30px; font-size: 1.8rem;"><?php esc_html_e( 'Upcoming Events', 'studyabroad-developer' ); ?></h2>
                
                <div class="events-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                    <?php
                    while ( $upcoming_events->have_posts() ) :
                        $upcoming_events->the_post();
                        
                        $event_date     = get_post_meta( get_the_ID(), '_event_date', true );
                        $event_time     = get_post_meta( get_the_ID(), '_event_time', true );
                        $event_location = get_post_meta( get_the_ID(), '_event_location', true );
                        $event_type     = get_post_meta( get_the_ID(), '_event_type', true );
                    ?>
                        <article class="event-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                            <div style="display: flex;">
                                <div class="event-date-box" style="background: var(--primary-color); color: white; padding: 20px; text-align: center; min-width: 90px; display: flex; flex-direction: column; justify-content: center;">
                                    <span style="font-size: 2rem; font-weight: 700; line-height: 1;"><?php echo date_i18n( 'd', strtotime( $event_date ) ); ?></span>
                                    <span style="font-size: 14px; text-transform: uppercase;"><?php echo date_i18n( 'M', strtotime( $event_date ) ); ?></span>
                                </div>
                                
                                <div class="event-content" style="padding: 20px; flex: 1;">
                                    <?php if ( $event_type ) : ?>
                                        <span style="display: inline-block; background: var(--accent-color); color: var(--primary-color); padding: 3px 10px; border-radius: 12px; font-size: 12px; font-weight: 600; margin-bottom: 10px;">
                                            <?php echo esc_html( ucfirst( $event_type ) ); ?>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <h3 style="margin-bottom: 10px; font-size: 1.1rem;">
                                        <a href="<?php the_permalink(); ?>" style="color: var(--text-dark);"><?php the_title(); ?></a>
                                    </h3>
                                    
                                    <div style="display: flex; flex-wrap: wrap; gap: 15px; font-size: 13px; color: var(--text-light);">
                                        <?php if ( $event_time ) : ?>
                                            <span style="display: flex; align-items: center; gap: 5px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                <?php echo esc_html( $event_time ); ?>
                                            </span>
                                        <?php endif; ?>
                                        
                                        <?php if ( $event_location ) : ?>
                                            <span style="display: flex; align-items: center; gap: 5px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                <?php echo esc_html( $event_location ); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <a href="<?php the_permalink(); ?>" style="display: inline-flex; align-items: center; gap: 5px; margin-top: 15px; color: var(--primary-color); font-weight: 500; font-size: 14px;">
                                        <?php esc_html_e( 'View Details', 'studyabroad-developer' ); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php
        wp_reset_postdata();
        endif;
        ?>
        
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
            <div class="past-events">
                <h2 style="margin-bottom: 30px; font-size: 1.8rem; color: var(--text-light);"><?php esc_html_e( 'Past Events', 'studyabroad-developer' ); ?></h2>
                
                <div class="events-list" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
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
                    <?php endwhile; ?>
                </div>
            </div>
        <?php
        wp_reset_postdata();
        endif;
        ?>
        
        <?php if ( ! $upcoming_events->have_posts() && ! $past_events->have_posts() ) : ?>
            <div style="text-align: center; padding: 60px 20px;">
                <h2><?php esc_html_e( 'No Events Found', 'studyabroad-developer' ); ?></h2>
                <p style="color: var(--text-light);"><?php esc_html_e( 'Check back soon for upcoming events and webinars.', 'studyabroad-developer' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
