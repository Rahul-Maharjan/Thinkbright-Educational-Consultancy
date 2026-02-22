<?php
/**
 * 
 * Template Name: Front Page Template
 * Front Page Template
 *
 * @package StudyAbroad_Developer
 */

get_header();
?>

<!-- Hero Section -->
<section id="hero" class="hero">
    <div class="hero-bg">
        <?php 
        $hero_bg = get_theme_mod( 'studyabroad_hero_bg', '' );
        if ( $hero_bg ) :
        ?>
            <img src="<?php echo esc_url( $hero_bg ); ?>" alt="<?php esc_attr_e( 'Study Abroad', 'studyabroad-developer' ); ?>">
        <?php endif; ?>
    </div>
    <div class="hero-skyline"></div>
    
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <?php echo esc_html( get_theme_mod( 'studyabroad_hero_title', 'Planning to Study Abroad?' ) ); ?>
                <span><?php echo esc_html( get_theme_mod( 'studyabroad_hero_title_accent', 'Start Your Journey Today' ) ); ?></span>
            </h1>
            <p class="hero-subtitle">
                <?php echo esc_html( get_theme_mod( 'studyabroad_hero_subtitle', 'Trusted education consultancy helping students study in Canada, Australia, USA, UK, Japan & Europe.' ) ); ?>
            </p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url( get_theme_mod( 'studyabroad_cta_1_url', '#consultation' ) ); ?>" class="btn btn-white btn-lg">
                    <?php echo esc_html( get_theme_mod( 'studyabroad_cta_1_text', 'Apply Now' ) ); ?>
                </a>
                <a href="<?php echo esc_url( get_theme_mod( 'studyabroad_cta_2_url', '#consultation' ) ); ?>" class="btn btn-outline-white btn-lg">
                    <?php echo esc_html( get_theme_mod( 'studyabroad_cta_2_text', 'Book Free Consultation' ) ); ?>
                </a>
            </div>
        </div>
        
        <div class="hero-destinations">
            <div class="destination-tags">
                <span class="destination-tag">Korea</span>
                <span class="destination-tag">Canada</span>
                <span class="destination-tag">Australia</span>
                <span class="destination-tag">USA</span>
                <span class="destination-tag">UK</span>
                <span class="destination-tag">Japan</span>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="section about-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-image">
                <?php 
                $about_image = get_theme_mod( 'studyabroad_about_image', '' );
                if ( $about_image ) :
                ?>
                    <img src="<?php echo esc_url( $about_image ); ?>" alt="<?php esc_attr_e( 'About Us', 'studyabroad-developer' ); ?>">
                <?php else : ?>
                    <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/about-placeholder.jpg' ); ?>" alt="<?php esc_attr_e( 'About Us', 'studyabroad-developer' ); ?>">
                <?php endif; ?>
            </div>
            <div class="about-content">
                <span class="section-subtitle"><?php esc_html_e( 'About Us', 'studyabroad-developer' ); ?></span>
                <h2 class="section-title text-left">
                    <?php echo esc_html( get_theme_mod( 'studyabroad_about_title', 'Welcome to Study Abroad Developer' ) ); ?>
                </h2>
                <div class="about-text">
                    <p><?php echo wp_kses_post( get_theme_mod( 'studyabroad_about_content', 'We are a premier education consultancy dedicated to helping students achieve their dreams of studying abroad. With years of experience and a team of qualified counselors, we provide comprehensive guidance for university admissions, visa processing, and scholarship applications.' ) ); ?></p>
                    
                    <?php 
                    $mission = get_theme_mod( 'studyabroad_mission', '' );
                    if ( $mission ) :
                    ?>
                        <p><strong><?php esc_html_e( 'Our Mission:', 'studyabroad-developer' ); ?></strong> <?php echo esc_html( $mission ); ?></p>
                    <?php endif; ?>
                    
                    <?php 
                    $vision = get_theme_mod( 'studyabroad_vision', '' );
                    if ( $vision ) :
                    ?>
                        <p><strong><?php esc_html_e( 'Our Vision:', 'studyabroad-developer' ); ?></strong> <?php echo esc_html( $vision ); ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="about-features">
                    <?php 
                    $features = studyabroad_get_about_features();
                    foreach ( $features as $feature_text ) :
                        if ( $feature_text ) :
                    ?>
                        <div class="about-feature">
                            <?php echo studyabroad_get_icon( 'check' ); ?>
                            <span><?php echo esc_html( $feature_text ); ?></span>
                        </div>
                    <?php 
                        endif;
                    endforeach;
                    ?>
                </div>
                
                <a href="#services" class="btn btn-primary"><?php esc_html_e( 'Learn More', 'studyabroad-developer' ); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Section -->
<section id="destinations" class="section section-light destinations-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Destination for', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Study Abroad Destinations', 'studyabroad-developer' ); ?></h2>
            <p class="section-description"><?php esc_html_e( 'Explore top study destinations and find the perfect country for your international education journey.', 'studyabroad-developer' ); ?></p>
        </div>
        
        <div class="grid grid-3">
            <?php
            $destinations = studyabroad_get_destinations( 6 );
            
            if ( $destinations->have_posts() ) :
                while ( $destinations->have_posts() ) : $destinations->the_post();
            ?>
                <div class="destination-card">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'studyabroad-card' ); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/destination-placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                    <div class="destination-overlay">
                        <h3 class="destination-title"><?php the_title(); ?></h3>
                        <a href="<?php the_permalink(); ?>" class="btn btn-white btn-sm destination-btn">
                            <?php esc_html_e( 'View Details', 'studyabroad-developer' ); ?>
                        </a>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
                // Default destinations
                $default_destinations = studyabroad_get_default_destinations();
                foreach ( $default_destinations as $destination ) :
            ?>
                <div class="destination-card">
                    <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/' . $destination['image'] ); ?>" alt="<?php echo esc_attr( $destination['title'] ); ?>">
                    <div class="destination-overlay">
                        <h3 class="destination-title"><?php echo esc_html( $destination['title'] ); ?></h3>
                        <a href="#" class="btn btn-white btn-sm destination-btn">
                            <?php esc_html_e( 'View Details', 'studyabroad-developer' ); ?>
                        </a>
                    </div>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Language Tests Section -->
<section id="language-tests" class="section language-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Elevate Your', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Language Skills Journey', 'studyabroad-developer' ); ?></h2>
            <p class="section-description"><?php esc_html_e( 'Prepare for language proficiency tests with our expert coaching and comprehensive study materials.', 'studyabroad-developer' ); ?></p>
        </div>
        
        <div class="grid grid-4" style="grid-template-columns: repeat(5, 1fr);">
            <?php
            $language_tests = studyabroad_get_language_tests( 5 );
            
            if ( $language_tests->have_posts() ) :
                while ( $language_tests->have_posts() ) : $language_tests->the_post();
            ?>
                <div class="test-card">
                    <div class="test-icon">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'studyabroad-thumbnail' ); ?>
                        <?php else : ?>
                            <?php echo studyabroad_get_icon( 'graduation-cap' ); ?>
                        <?php endif; ?>
                    </div>
                    <h4><?php the_title(); ?></h4>
                    <p><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-secondary"><?php esc_html_e( 'Learn More', 'studyabroad-developer' ); ?></a>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
                // Default language tests
                $default_tests = studyabroad_get_default_language_tests();
                foreach ( $default_tests as $test ) :
            ?>
                <div class="test-card">
                    <div class="test-icon">
                        <?php echo studyabroad_get_icon( 'graduation-cap' ); ?>
                    </div>
                    <h4><?php echo esc_html( $test['title'] ); ?></h4>
                    <p><?php echo esc_html( $test['desc'] ); ?></p>
                    <a href="#" class="btn btn-sm btn-secondary"><?php esc_html_e( 'Learn More', 'studyabroad-developer' ); ?></a>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="section services-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Services', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'We provide the best services', 'studyabroad-developer' ); ?></h2>
            <p class="section-description"><?php esc_html_e( 'Comprehensive support services to guide you through every step of your study abroad journey.', 'studyabroad-developer' ); ?></p>
        </div>
        
        <div class="grid grid-3">
            <?php
            $services = studyabroad_get_services( 6 );
            
            if ( $services->have_posts() ) :
                while ( $services->have_posts() ) : $services->the_post();
                    $icon = get_post_meta( get_the_ID(), '_service_icon', true ) ?: 'briefcase';
            ?>
                <div class="service-card">
                    <div class="service-icon">
                        <?php echo studyabroad_get_icon( $icon ); ?>
                    </div>
                    <h4><?php the_title(); ?></h4>
                    <p><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
                // Default services
                $default_services = studyabroad_get_default_services();
                foreach ( $default_services as $service ) :
            ?>
                <div class="service-card">
                    <div class="service-icon">
                        <?php echo studyabroad_get_icon( $service['icon'] ); ?>
                    </div>
                    <h4><?php echo esc_html( $service['title'] ); ?></h4>
                    <p><?php echo esc_html( $service['desc'] ); ?></p>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Process Section -->
<section id="process" class="section section-light process-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'The Overseas Study Journey', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Abroad Study Procedure', 'studyabroad-developer' ); ?></h2>
            <p class="section-description"><?php esc_html_e( 'Our streamlined process ensures a smooth journey from counseling to departure.', 'studyabroad-developer' ); ?></p>
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

<!-- Events Section -->
<section id="events" class="section events-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Events', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Recent Events', 'studyabroad-developer' ); ?></h2>
            <p class="section-description"><?php esc_html_e( 'Join our upcoming events, seminars, and workshops to learn more about studying abroad.', 'studyabroad-developer' ); ?></p>
        </div>
        
        <div class="grid grid-3">
            <?php
            $events = studyabroad_get_events( 3 );
            
            if ( $events->have_posts() ) :
                while ( $events->have_posts() ) : $events->the_post();
                    $event_date = get_post_meta( get_the_ID(), '_event_date', true );
                    $event_time = get_post_meta( get_the_ID(), '_event_time', true );
                    $event_location = get_post_meta( get_the_ID(), '_event_location', true );
                    $registration_url = get_post_meta( get_the_ID(), '_event_registration_url', true );
            ?>
                <div class="event-card">
                    <div class="event-image">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'studyabroad-card' ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/event-placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <?php if ( $event_date ) : ?>
                            <div class="event-date">
                                <span class="day"><?php echo esc_html( date( 'd', strtotime( $event_date ) ) ); ?></span>
                                <span class="month"><?php echo esc_html( date( 'M', strtotime( $event_date ) ) ); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="event-content">
                        <?php 
                        $categories = get_the_terms( get_the_ID(), 'event_category' );
                        if ( $categories && ! is_wp_error( $categories ) ) :
                        ?>
                            <span class="event-category"><?php echo esc_html( $categories[0]->name ); ?></span>
                        <?php endif; ?>
                        <h4 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="event-meta">
                            <?php if ( $event_time ) : ?>
                                <span><?php echo studyabroad_get_icon( 'clock' ); ?> <?php echo esc_html( $event_time ); ?></span>
                            <?php endif; ?>
                            <?php if ( $event_location ) : ?>
                                <span><?php echo studyabroad_get_icon( 'map-pin' ); ?> <?php echo esc_html( $event_location ); ?></span>
                            <?php endif; ?>
                        </div>
                        <a href="<?php echo esc_url( $registration_url ?: get_the_permalink() ); ?>" class="btn btn-sm btn-primary">
                            <?php esc_html_e( 'Register Now', 'studyabroad-developer' ); ?>
                        </a>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="event-card">
                    <div class="event-image">
                        <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/event-placeholder.jpg' ); ?>" alt="Education Fair">
                        <div class="event-date">
                            <span class="day">15</span>
                            <span class="month">Mar</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <span class="event-category">Education Fair</span>
                        <h4 class="event-title"><a href="#">International Education Fair 2026</a></h4>
                        <div class="event-meta">
                            <span><?php echo studyabroad_get_icon( 'clock' ); ?> 10:00 AM</span>
                            <span><?php echo studyabroad_get_icon( 'map-pin' ); ?> Main Hall</span>
                        </div>
                        <a href="#" class="btn btn-sm btn-primary"><?php esc_html_e( 'Register Now', 'studyabroad-developer' ); ?></a>
                    </div>
                </div>
                
                <div class="event-card">
                    <div class="event-image">
                        <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/event-placeholder.jpg' ); ?>" alt="Scholarship Seminar">
                        <div class="event-date">
                            <span class="day">22</span>
                            <span class="month">Mar</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <span class="event-category">Seminar</span>
                        <h4 class="event-title"><a href="#">Scholarship Opportunities Seminar</a></h4>
                        <div class="event-meta">
                            <span><?php echo studyabroad_get_icon( 'clock' ); ?> 2:00 PM</span>
                            <span><?php echo studyabroad_get_icon( 'map-pin' ); ?> Online</span>
                        </div>
                        <a href="#" class="btn btn-sm btn-primary"><?php esc_html_e( 'Register Now', 'studyabroad-developer' ); ?></a>
                    </div>
                </div>
                
                <div class="event-card">
                    <div class="event-image">
                        <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/event-placeholder.jpg' ); ?>" alt="IELTS Workshop">
                        <div class="event-date">
                            <span class="day">01</span>
                            <span class="month">Apr</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <span class="event-category">Workshop</span>
                        <h4 class="event-title"><a href="#">IELTS Preparation Workshop</a></h4>
                        <div class="event-meta">
                            <span><?php echo studyabroad_get_icon( 'clock' ); ?> 11:00 AM</span>
                            <span><?php echo studyabroad_get_icon( 'map-pin' ); ?> Training Center</span>
                        </div>
                        <a href="#" class="btn btn-sm btn-primary"><?php esc_html_e( 'Register Now', 'studyabroad-developer' ); ?></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="section testimonials-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Testimonials', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Few Words Of Students', 'studyabroad-developer' ); ?></h2>
            <p class="section-description"><?php esc_html_e( 'Hear from our successful students who achieved their dreams of studying abroad.', 'studyabroad-developer' ); ?></p>
        </div>
        
        <div class="testimonial-slider">
            <?php
            $testimonials = studyabroad_get_testimonials( 5 );
            
            if ( $testimonials->have_posts() ) :
                while ( $testimonials->have_posts() ) : $testimonials->the_post();
                    $student_name = get_post_meta( get_the_ID(), '_student_name', true ) ?: get_the_title();
                    $student_country = get_post_meta( get_the_ID(), '_student_country', true );
                    $student_university = get_post_meta( get_the_ID(), '_student_university', true );
                    $rating = get_post_meta( get_the_ID(), '_testimonial_rating', true ) ?: 5;
            ?>
                <div class="testimonial-card">
                    <div class="testimonial-avatar">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'studyabroad-square' ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/avatar-placeholder.jpg' ); ?>" alt="<?php echo esc_attr( $student_name ); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="testimonial-text">
                        <?php the_content(); ?>
                    </div>
                    <h4 class="testimonial-author"><?php echo esc_html( $student_name ); ?></h4>
                    <p class="testimonial-country">
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
                    <div class="testimonial-rating">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <?php if ( $i <= $rating ) : ?>
                                <?php echo studyabroad_get_icon( 'star' ); ?>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="testimonial-card">
                    <div class="testimonial-avatar">
                        <img src="<?php echo esc_url( STUDYABROAD_URI . '/assets/images/avatar-placeholder.jpg' ); ?>" alt="Student">
                    </div>
                    <div class="testimonial-text">
                        <p>"The team provided exceptional guidance throughout my application process. Thanks to their support, I got admitted to my dream university in Canada with a scholarship. Highly recommend their services!"</p>
                    </div>
                    <h4 class="testimonial-author">Sarah Johnson</h4>
                    <p class="testimonial-country">University of Toronto, Canada</p>
                    <div class="testimonial-rating">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <?php echo studyabroad_get_icon( 'star' ); ?>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="section section-light faq-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'FAQ', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Common Frequently Asked Questions', 'studyabroad-developer' ); ?></h2>
            <p class="section-description"><?php esc_html_e( 'Find answers to the most commonly asked questions about studying abroad.', 'studyabroad-developer' ); ?></p>
        </div>
        
        <div class="faq-container">
            <?php 
            $faqs = studyabroad_get_default_faqs();
            foreach ( $faqs as $index => $faq ) :
            ?>
                <div class="faq-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <button class="faq-question" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                        <span><?php echo esc_html( $faq['question'] ); ?></span>
                        <span class="faq-icon"><?php echo studyabroad_get_icon( 'chevron-down' ); ?></span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            <p><?php echo esc_html( $faq['answer'] ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Consultation Form Section -->
<section id="consultation" class="section consultation-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Book Your Appointment', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'With our Experts', 'studyabroad-developer' ); ?></h2>
        </div>
        
        <form id="consultation-form" class="consultation-form" method="post">
            <div class="form-grid">
                <div class="form-group">
                    <label for="full-name" class="form-label"><?php esc_html_e( 'Full Name', 'studyabroad-developer' ); ?> *</label>
                    <input type="text" id="full-name" name="name" class="form-input" required placeholder="<?php esc_attr_e( 'Enter your full name', 'studyabroad-developer' ); ?>">
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label"><?php esc_html_e( 'Email Address', 'studyabroad-developer' ); ?> *</label>
                    <input type="email" id="email" name="email" class="form-input" required placeholder="<?php esc_attr_e( 'Enter your email', 'studyabroad-developer' ); ?>">
                </div>
                
                <div class="form-group">
                    <label for="phone" class="form-label"><?php esc_html_e( 'Phone Number', 'studyabroad-developer' ); ?> *</label>
                    <input type="tel" id="phone" name="phone" class="form-input" required placeholder="<?php esc_attr_e( 'Enter your phone number', 'studyabroad-developer' ); ?>">
                </div>
                
                <div class="form-group">
                    <label for="country" class="form-label"><?php esc_html_e( 'Preferred Country', 'studyabroad-developer' ); ?></label>
                    <select id="country" name="country" class="form-select">
                        <option value=""><?php esc_html_e( 'Select Country', 'studyabroad-developer' ); ?></option>
                        <option value="Canada"><?php esc_html_e( 'Canada', 'studyabroad-developer' ); ?></option>
                        <option value="Australia"><?php esc_html_e( 'Australia', 'studyabroad-developer' ); ?></option>
                        <option value="USA"><?php esc_html_e( 'USA', 'studyabroad-developer' ); ?></option>
                        <option value="UK"><?php esc_html_e( 'UK', 'studyabroad-developer' ); ?></option>
                        <option value="New Zealand"><?php esc_html_e( 'New Zealand', 'studyabroad-developer' ); ?></option>
                        <option value="Japan"><?php esc_html_e( 'Japan', 'studyabroad-developer' ); ?></option>
                        <option value="Germany"><?php esc_html_e( 'Germany', 'studyabroad-developer' ); ?></option>
                        <option value="Other"><?php esc_html_e( 'Other', 'studyabroad-developer' ); ?></option>
                    </select>
                </div>
                
                <div class="form-group full-width">
                    <label for="message" class="form-label"><?php esc_html_e( 'Message', 'studyabroad-developer' ); ?></label>
                    <textarea id="message" name="message" class="form-textarea" placeholder="<?php esc_attr_e( 'Tell us about your study abroad goals...', 'studyabroad-developer' ); ?>"></textarea>
                </div>
            </div>
            
            <div class="form-submit">
                <button type="submit" class="btn btn-primary btn-lg">
                    <?php esc_html_e( 'Book Free Consultation', 'studyabroad-developer' ); ?>
                </button>
            </div>
            
            <input type="hidden" name="action" value="studyabroad_consultation">
            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'studyabroad_nonce' ); ?>">
        </form>
    </div>
</section>

<?php
get_footer();
