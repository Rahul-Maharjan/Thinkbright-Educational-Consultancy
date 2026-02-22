<?php
/**
 * Template for displaying single destination
 *
 * @package StudyAbroad_Developer
 */

get_header();

while ( have_posts() ) :
    the_post();

    // Get meta data
    $universities   = get_post_meta( get_the_ID(), '_destination_universities', true );
    $programs       = get_post_meta( get_the_ID(), '_destination_programs', true );
    $requirements   = get_post_meta( get_the_ID(), '_destination_requirements', true );
    $cost_of_living = get_post_meta( get_the_ID(), '_destination_cost_of_living', true );
    $work_rights    = get_post_meta( get_the_ID(), '_destination_work_rights', true );
?>

<section class="page-hero destination-hero" style="position: relative; padding: 120px 0 80px; overflow: hidden;">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="hero-background" style="position: absolute; inset: 0; z-index: -1;">
            <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
            <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(11, 60, 145, 0.8), rgba(11, 60, 145, 0.95));"></div>
        </div>
    <?php else : ?>
        <div style="position: absolute; inset: 0; z-index: -1; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));"></div>
    <?php endif; ?>
    
    <div class="container">
        <div style="max-width: 800px;">
            <span style="display: inline-block; background: var(--accent-color); color: var(--primary-color); padding: 6px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; margin-bottom: 15px;">
                <?php esc_html_e( 'Study Destination', 'studyabroad-developer' ); ?>
            </span>
            <h1 style="color: white; font-size: 3rem; margin-bottom: 20px;"><?php the_title(); ?></h1>
            <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; line-height: 1.7;"><?php echo wp_trim_words( get_the_excerpt(), 40 ); ?></p>
            
            <div style="display: flex; flex-wrap: wrap; gap: 30px; margin-top: 30px;">
                <?php if ( $universities ) : ?>
                    <div style="color: white;">
                        <span style="color: var(--accent-color); font-size: 2rem; font-weight: 700; display: block;"><?php echo esc_html( $universities ); ?>+</span>
                        <span style="font-size: 14px; opacity: 0.9;"><?php esc_html_e( 'Universities', 'studyabroad-developer' ); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if ( $programs ) : ?>
                    <div style="color: white;">
                        <span style="color: var(--accent-color); font-size: 2rem; font-weight: 700; display: block;"><?php echo esc_html( $programs ); ?>+</span>
                        <span style="font-size: 14px; opacity: 0.9;"><?php esc_html_e( 'Programs', 'studyabroad-developer' ); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<main id="primary" class="site-main" style="padding: 80px 0;">
    <div class="container">
        <div class="destination-content" style="display: grid; grid-template-columns: 1fr 350px; gap: 50px;">
            <div class="destination-main">
                <div class="entry-content" style="font-size: 1.1rem; line-height: 1.8;">
                    <?php the_content(); ?>
                </div>
                
                <?php if ( $requirements ) : ?>
                    <div class="requirements-section" style="margin-top: 50px; padding: 30px; background: var(--bg-light); border-radius: 12px;">
                        <h3 style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <?php esc_html_e( 'Entry Requirements', 'studyabroad-developer' ); ?>
                        </h3>
                        <div><?php echo wp_kses_post( wpautop( $requirements ) ); ?></div>
                    </div>
                <?php endif; ?>
            </div>
            
            <aside class="destination-sidebar" style="position: sticky; top: 100px; height: fit-content;">
                <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                    <h3 style="margin-bottom: 25px;"><?php esc_html_e( 'Quick Facts', 'studyabroad-developer' ); ?></h3>
                    
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <?php if ( $cost_of_living ) : ?>
                            <li style="display: flex; align-items: flex-start; gap: 12px; padding: 15px 0; border-bottom: 1px solid #eee;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                <div>
                                    <strong style="display: block; font-size: 14px; color: var(--text-light);"><?php esc_html_e( 'Cost of Living', 'studyabroad-developer' ); ?></strong>
                                    <span><?php echo esc_html( $cost_of_living ); ?></span>
                                </div>
                            </li>
                        <?php endif; ?>
                        
                        <?php if ( $work_rights ) : ?>
                            <li style="display: flex; align-items: flex-start; gap: 12px; padding: 15px 0; border-bottom: 1px solid #eee;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                <div>
                                    <strong style="display: block; font-size: 14px; color: var(--text-light);"><?php esc_html_e( 'Work Rights', 'studyabroad-developer' ); ?></strong>
                                    <span><?php echo esc_html( $work_rights ); ?></span>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                    <div style="margin-top: 30px;">
                        <a href="#consultation" class="btn btn-primary" style="width: 100%; text-align: center; display: block;">
                            <?php esc_html_e( 'Get Free Consultation', 'studyabroad-developer' ); ?>
                        </a>
                    </div>
                </div>
                
                <!-- Related Destinations -->
                <?php
                $related = get_posts( array(
                    'post_type'      => 'destination',
                    'posts_per_page' => 3,
                    'post__not_in'   => array( get_the_ID() ),
                ) );
                
                if ( $related ) :
                ?>
                    <div style="margin-top: 30px;">
                        <h4 style="margin-bottom: 15px;"><?php esc_html_e( 'Other Destinations', 'studyabroad-developer' ); ?></h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <?php foreach ( $related as $post ) : ?>
                                <li style="margin-bottom: 10px;">
                                    <a href="<?php echo get_permalink( $post->ID ); ?>" style="display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--bg-light); border-radius: 8px; transition: all 0.3s;">
                                        <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                            <div style="width: 50px; height: 50px; border-radius: 8px; overflow: hidden; flex-shrink: 0;">
                                                <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <span style="font-weight: 500; color: var(--text-dark);"><?php echo get_the_title( $post->ID ); ?></span>
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
