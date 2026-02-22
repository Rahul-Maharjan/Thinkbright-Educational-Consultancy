<?php
/**
 * Template for displaying single event
 *
 * @package StudyAbroad_Developer
 */

get_header();

while ( have_posts() ) :
    the_post();

    // Get meta data
    $event_date     = get_post_meta( get_the_ID(), '_event_date', true );
    $event_time     = get_post_meta( get_the_ID(), '_event_time', true );
    $event_location = get_post_meta( get_the_ID(), '_event_location', true );
    $event_type     = get_post_meta( get_the_ID(), '_event_type', true );
    $register_link  = get_post_meta( get_the_ID(), '_event_register_link', true );
    
    // Format date
    $formatted_date = $event_date ? date_i18n( 'F j, Y', strtotime( $event_date ) ) : '';
    $is_past        = $event_date && strtotime( $event_date ) < time();
?>

<section class="page-hero event-hero" style="position: relative; padding: 120px 0 80px; overflow: hidden;">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="hero-background" style="position: absolute; inset: 0; z-index: -1;">
            <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
            <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(11, 60, 145, 0.85), rgba(11, 60, 145, 0.95));"></div>
        </div>
    <?php else : ?>
        <div style="position: absolute; inset: 0; z-index: -1; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));"></div>
    <?php endif; ?>
    
    <div class="container">
        <div style="max-width: 800px;">
            <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px;">
                <?php if ( $event_type ) : ?>
                    <span style="background: var(--accent-color); color: var(--primary-color); padding: 6px 16px; border-radius: 20px; font-size: 14px; font-weight: 600;">
                        <?php echo esc_html( ucfirst( $event_type ) ); ?>
                    </span>
                <?php endif; ?>
                
                <?php if ( $is_past ) : ?>
                    <span style="background: rgba(255,255,255,0.2); color: white; padding: 6px 16px; border-radius: 20px; font-size: 14px;">
                        <?php esc_html_e( 'Past Event', 'studyabroad-developer' ); ?>
                    </span>
                <?php endif; ?>
            </div>
            
            <h1 style="color: white; font-size: 2.5rem; margin-bottom: 30px;"><?php the_title(); ?></h1>
            
            <div style="display: flex; flex-wrap: wrap; gap: 30px;">
                <?php if ( $formatted_date ) : ?>
                    <div style="display: flex; align-items: center; gap: 10px; color: white;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span><?php echo esc_html( $formatted_date ); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if ( $event_time ) : ?>
                    <div style="display: flex; align-items: center; gap: 10px; color: white;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <span><?php echo esc_html( $event_time ); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if ( $event_location ) : ?>
                    <div style="display: flex; align-items: center; gap: 10px; color: white;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span><?php echo esc_html( $event_location ); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<main id="primary" class="site-main" style="padding: 80px 0;">
    <div class="container">
        <div class="event-content" style="display: grid; grid-template-columns: 1fr 350px; gap: 50px;">
            <div class="event-main">
                <div class="entry-content" style="font-size: 1.1rem; line-height: 1.8;">
                    <?php the_content(); ?>
                </div>
            </div>
            
            <aside class="event-sidebar" style="position: sticky; top: 100px; height: fit-content;">
                <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                    <h3 style="margin-bottom: 25px;"><?php esc_html_e( 'Event Details', 'studyabroad-developer' ); ?></h3>
                    
                    <ul style="list-style: none; padding: 0; margin: 0 0 30px;">
                        <?php if ( $formatted_date ) : ?>
                            <li style="display: flex; align-items: flex-start; gap: 12px; padding: 15px 0; border-bottom: 1px solid #eee;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <div>
                                    <strong style="display: block; font-size: 14px; color: var(--text-light);"><?php esc_html_e( 'Date', 'studyabroad-developer' ); ?></strong>
                                    <span><?php echo esc_html( $formatted_date ); ?></span>
                                </div>
                            </li>
                        <?php endif; ?>
                        
                        <?php if ( $event_time ) : ?>
                            <li style="display: flex; align-items: flex-start; gap: 12px; padding: 15px 0; border-bottom: 1px solid #eee;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                <div>
                                    <strong style="display: block; font-size: 14px; color: var(--text-light);"><?php esc_html_e( 'Time', 'studyabroad-developer' ); ?></strong>
                                    <span><?php echo esc_html( $event_time ); ?></span>
                                </div>
                            </li>
                        <?php endif; ?>
                        
                        <?php if ( $event_location ) : ?>
                            <li style="display: flex; align-items: flex-start; gap: 12px; padding: 15px 0; border-bottom: 1px solid #eee;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <div>
                                    <strong style="display: block; font-size: 14px; color: var(--text-light);"><?php esc_html_e( 'Location', 'studyabroad-developer' ); ?></strong>
                                    <span><?php echo esc_html( $event_location ); ?></span>
                                </div>
                            </li>
                        <?php endif; ?>
                        
                        <?php if ( $event_type ) : ?>
                            <li style="display: flex; align-items: flex-start; gap: 12px; padding: 15px 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <div>
                                    <strong style="display: block; font-size: 14px; color: var(--text-light);"><?php esc_html_e( 'Event Type', 'studyabroad-developer' ); ?></strong>
                                    <span><?php echo esc_html( ucfirst( $event_type ) ); ?></span>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                    <?php if ( ! $is_past ) : ?>
                        <?php if ( $register_link ) : ?>
                            <a href="<?php echo esc_url( $register_link ); ?>" class="btn btn-primary" style="width: 100%; text-align: center; display: block;" target="_blank">
                                <?php esc_html_e( 'Register Now', 'studyabroad-developer' ); ?>
                            </a>
                        <?php else : ?>
                            <a href="#consultation" class="btn btn-primary" style="width: 100%; text-align: center; display: block;">
                                <?php esc_html_e( 'Register Now', 'studyabroad-developer' ); ?>
                            </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <div style="text-align: center; padding: 15px; background: var(--bg-light); border-radius: 8px; color: var(--text-light);">
                            <?php esc_html_e( 'This event has ended', 'studyabroad-developer' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Upcoming Events -->
                <?php
                $upcoming = get_posts( array(
                    'post_type'      => 'event',
                    'posts_per_page' => 3,
                    'post__not_in'   => array( get_the_ID() ),
                    'meta_key'       => '_event_date',
                    'orderby'        => 'meta_value',
                    'order'          => 'ASC',
                    'meta_query'     => array(
                        array(
                            'key'     => '_event_date',
                            'value'   => date( 'Y-m-d' ),
                            'compare' => '>=',
                            'type'    => 'DATE',
                        ),
                    ),
                ) );
                
                if ( $upcoming ) :
                ?>
                    <div style="margin-top: 30px;">
                        <h4 style="margin-bottom: 15px;"><?php esc_html_e( 'Upcoming Events', 'studyabroad-developer' ); ?></h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <?php foreach ( $upcoming as $post ) : 
                                $event_d = get_post_meta( $post->ID, '_event_date', true );
                            ?>
                                <li style="margin-bottom: 10px;">
                                    <a href="<?php echo get_permalink( $post->ID ); ?>" style="display: block; padding: 15px; background: var(--bg-light); border-radius: 8px; transition: all 0.3s;">
                                        <span style="font-weight: 500; color: var(--text-dark); display: block; margin-bottom: 5px;"><?php echo get_the_title( $post->ID ); ?></span>
                                        <?php if ( $event_d ) : ?>
                                            <span style="font-size: 13px; color: var(--text-light);"><?php echo date_i18n( 'M j, Y', strtotime( $event_d ) ); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</main>

<?php
endwhile;

get_footer();
