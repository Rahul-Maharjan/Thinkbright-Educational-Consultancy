<?php
/**
 * Template Name: Testimonials Page
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
            <?php esc_html_e( 'Hear from our successful students who achieved their dreams of studying abroad.', 'studyabroad-developer' ); ?>
        </p>
    </div>
</section>

<!-- Stats Section -->
<section style="background: white; padding: 60px 0; border-bottom: 1px solid #eee;">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; text-align: center;">
            <div>
                <span style="font-size: 3rem; font-weight: 700; color: var(--primary-color); display: block;"><?php echo esc_html( get_theme_mod( 'studyabroad_stat_students', '5000' ) ); ?>+</span>
                <span style="color: var(--text-light);"><?php esc_html_e( 'Happy Students', 'studyabroad-developer' ); ?></span>
            </div>
            <div>
                <span style="font-size: 3rem; font-weight: 700; color: var(--primary-color); display: block;">95%</span>
                <span style="color: var(--text-light);"><?php esc_html_e( 'Success Rate', 'studyabroad-developer' ); ?></span>
            </div>
            <div>
                <span style="font-size: 3rem; font-weight: 700; color: var(--primary-color); display: block;">4.9</span>
                <span style="color: var(--text-light);"><?php esc_html_e( 'Average Rating', 'studyabroad-developer' ); ?></span>
            </div>
            <div>
                <span style="font-size: 3rem; font-weight: 700; color: var(--primary-color); display: block;"><?php echo esc_html( get_theme_mod( 'studyabroad_stat_countries', '20' ) ); ?>+</span>
                <span style="color: var(--text-light);"><?php esc_html_e( 'Countries', 'studyabroad-developer' ); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Grid -->
<section class="section">
    <div class="container">
        <?php
        $testimonials = new WP_Query( array(
            'post_type'      => 'testimonial',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );
        
        if ( $testimonials->have_posts() ) :
        ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                <?php
                while ( $testimonials->have_posts() ) :
                    $testimonials->the_post();
                    
                    $student_name       = get_post_meta( get_the_ID(), '_student_name', true ) ?: get_the_title();
                    $student_country    = get_post_meta( get_the_ID(), '_student_country', true );
                    $student_university = get_post_meta( get_the_ID(), '_student_university', true );
                    $student_course     = get_post_meta( get_the_ID(), '_student_course', true );
                    $rating             = get_post_meta( get_the_ID(), '_testimonial_rating', true ) ?: 5;
                ?>
                    <article style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                            <div style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden; flex-shrink: 0;">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'studyabroad-thumbnail', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                                <?php else : ?>
                                    <div style="width: 100%; height: 100%; background: var(--primary-color); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; font-weight: 700;">
                                        <?php echo esc_html( substr( $student_name, 0, 1 ) ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 5px;"><?php echo esc_html( $student_name ); ?></h4>
                                <p style="color: var(--text-light); font-size: 14px; margin: 0;">
                                    <?php 
                                    if ( $student_university ) {
                                        echo esc_html( $student_university );
                                        if ( $student_country ) {
                                            echo ', ' . esc_html( $student_country );
                                        }
                                    } elseif ( $student_country ) {
                                        echo esc_html( 'Studying in ' . $student_country );
                                    }
                                    ?>
                                </p>
                                <?php if ( $student_course ) : ?>
                                    <p style="color: var(--primary-color); font-size: 13px; margin: 5px 0 0;"><?php echo esc_html( $student_course ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div style="margin-bottom: 15px;">
                            <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="<?php echo $i <= $rating ? 'var(--accent-color)' : '#e0e0e0'; ?>" stroke="<?php echo $i <= $rating ? 'var(--accent-color)' : '#e0e0e0'; ?>" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <?php endfor; ?>
                        </div>
                        
                        <div style="color: var(--text-light); line-height: 1.8; font-style: italic;">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <!-- Default testimonials -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                <article style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                        <div style="width: 70px; height: 70px; border-radius: 50%; background: var(--primary-color); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; font-weight: 700;">S</div>
                        <div>
                            <h4 style="margin-bottom: 5px;">Sarah Johnson</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin: 0;">University of Toronto, Canada</p>
                        </div>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="var(--accent-color)" stroke="var(--accent-color)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <?php endfor; ?>
                    </div>
                    <p style="color: var(--text-light); line-height: 1.8; font-style: italic;">"The team provided exceptional guidance throughout my application process. Thanks to their support, I got admitted to my dream university with a scholarship!"</p>
                </article>
                
                <article style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                        <div style="width: 70px; height: 70px; border-radius: 50%; background: var(--secondary-color); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; font-weight: 700;">M</div>
                        <div>
                            <h4 style="margin-bottom: 5px;">Michael Chen</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin: 0;">University of Melbourne, Australia</p>
                        </div>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="var(--accent-color)" stroke="var(--accent-color)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <?php endfor; ?>
                    </div>
                    <p style="color: var(--text-light); line-height: 1.8; font-style: italic;">"From IELTS preparation to visa processing, they handled everything professionally. I'm now living my dream of studying engineering in Australia!"</p>
                </article>
                
                <article style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                        <div style="width: 70px; height: 70px; border-radius: 50%; background: var(--accent-color); display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 1.5rem; font-weight: 700;">P</div>
                        <div>
                            <h4 style="margin-bottom: 5px;">Priya Sharma</h4>
                            <p style="color: var(--text-light); font-size: 14px; margin: 0;">University of Oxford, UK</p>
                        </div>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="var(--accent-color)" stroke="var(--accent-color)" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <?php endfor; ?>
                    </div>
                    <p style="color: var(--text-light); line-height: 1.8; font-style: italic;">"I never thought getting into Oxford was possible until I met this amazing team. Their expertise and dedication made my impossible dream come true!"</p>
                </article>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Video Testimonials Section (Optional) -->
<section class="section section-light">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Share Your Story', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Your Success Could Inspire Others', 'studyabroad-developer' ); ?></h2>
        </div>
        
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <p style="color: var(--text-light); margin-bottom: 30px; line-height: 1.8;">
                <?php esc_html_e( 'If you\'re a successful student who studied abroad with our guidance, we\'d love to hear your story. Share your experience and inspire future students.', 'studyabroad-developer' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary btn-lg"><?php esc_html_e( 'Share Your Story', 'studyabroad-developer' ); ?></a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="background: var(--primary-color); padding: 80px 0; text-align: center;">
    <div class="container">
        <h2 style="color: white; margin-bottom: 15px;"><?php esc_html_e( 'Ready to Write Your Success Story?', 'studyabroad-developer' ); ?></h2>
        <p style="color: rgba(255,255,255,0.9); margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
            <?php esc_html_e( 'Join thousands of successful students. Start your study abroad journey with us today.', 'studyabroad-developer' ); ?>
        </p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-accent btn-lg"><?php esc_html_e( 'Get Free Consultation', 'studyabroad-developer' ); ?></a>
    </div>
</section>

<?php
get_footer();
