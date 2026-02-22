<?php
/**
 * Template Name: Contact Page
 *
 * @package StudyAbroad_Developer
 */

get_header();

// Get contact info from customizer
$phone   = get_theme_mod( 'studyabroad_phone', '+1 234 567 890' );
$email   = get_theme_mod( 'studyabroad_email', 'info@studyabroad.com' );
$address = get_theme_mod( 'studyabroad_address', '123 Education Street, City, Country' );
?>

<!-- Page Hero -->
<section class="page-hero" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 120px 0 80px; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3rem; margin-bottom: 15px;"><?php the_title(); ?></h1>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
            <?php esc_html_e( 'Get in touch with our expert counselors. We\'re here to help you every step of the way.', 'studyabroad-developer' ); ?>
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 60px;">
            
            <!-- Contact Info -->
            <div>
                <h2 style="margin-bottom: 30px;"><?php esc_html_e( 'Get In Touch', 'studyabroad-developer' ); ?></h2>
                
                <div style="margin-bottom: 40px;">
                    <p style="color: var(--text-light); line-height: 1.8;">
                        <?php esc_html_e( 'Have questions about studying abroad? Our team of expert counselors is ready to help you navigate your international education journey.', 'studyabroad-developer' ); ?>
                    </p>
                </div>
                
                <div style="display: flex; flex-direction: column; gap: 25px;">
                    <!-- Phone -->
                    <div style="display: flex; align-items: flex-start; gap: 15px;">
                        <div style="width: 50px; height: 50px; background: var(--bg-light); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px; font-size: 16px;"><?php esc_html_e( 'Phone', 'studyabroad-developer' ); ?></h4>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" style="color: var(--text-light);"><?php echo esc_html( $phone ); ?></a>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div style="display: flex; align-items: flex-start; gap: 15px;">
                        <div style="width: 50px; height: 50px; background: var(--bg-light); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px; font-size: 16px;"><?php esc_html_e( 'Email', 'studyabroad-developer' ); ?></h4>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>" style="color: var(--text-light);"><?php echo esc_html( $email ); ?></a>
                        </div>
                    </div>
                    
                    <!-- Address -->
                    <div style="display: flex; align-items: flex-start; gap: 15px;">
                        <div style="width: 50px; height: 50px; background: var(--bg-light); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px; font-size: 16px;"><?php esc_html_e( 'Address', 'studyabroad-developer' ); ?></h4>
                            <p style="color: var(--text-light); margin: 0;"><?php echo esc_html( $address ); ?></p>
                        </div>
                    </div>
                    
                    <!-- Office Hours -->
                    <div style="display: flex; align-items: flex-start; gap: 15px;">
                        <div style="width: 50px; height: 50px; background: var(--bg-light); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px; font-size: 16px;"><?php esc_html_e( 'Office Hours', 'studyabroad-developer' ); ?></h4>
                            <p style="color: var(--text-light); margin: 0;">
                                <?php esc_html_e( 'Mon - Fri: 9:00 AM - 6:00 PM', 'studyabroad-developer' ); ?><br>
                                <?php esc_html_e( 'Sat: 10:00 AM - 4:00 PM', 'studyabroad-developer' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Links -->
                <div style="margin-top: 40px;">
                    <h4 style="margin-bottom: 15px;"><?php esc_html_e( 'Follow Us', 'studyabroad-developer' ); ?></h4>
                    <div style="display: flex; gap: 10px;">
                        <?php 
                        $facebook  = get_theme_mod( 'studyabroad_facebook', '' );
                        $instagram = get_theme_mod( 'studyabroad_instagram', '' );
                        $linkedin  = get_theme_mod( 'studyabroad_linkedin', '' );
                        $youtube   = get_theme_mod( 'studyabroad_youtube', '' );
                        
                        if ( $facebook ) : ?>
                            <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" style="width: 40px; height: 40px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( $instagram ) : ?>
                            <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" style="width: 40px; height: 40px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( $linkedin ) : ?>
                            <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" style="width: 40px; height: 40px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( $youtube ) : ?>
                            <a href="<?php echo esc_url( $youtube ); ?>" target="_blank" style="width: 40px; height: 40px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="white"></polygon></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div style="background: white; padding: 40px; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                <h3 style="margin-bottom: 30px;"><?php esc_html_e( 'Send Us a Message', 'studyabroad-developer' ); ?></h3>
                
                <form id="contact-form" class="consultation-form" method="post">
                    <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
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
                            <label for="subject" class="form-label"><?php esc_html_e( 'Subject', 'studyabroad-developer' ); ?></label>
                            <select id="subject" name="subject" class="form-select">
                                <option value=""><?php esc_html_e( 'Select Subject', 'studyabroad-developer' ); ?></option>
                                <option value="General Inquiry"><?php esc_html_e( 'General Inquiry', 'studyabroad-developer' ); ?></option>
                                <option value="Study Abroad Consultation"><?php esc_html_e( 'Study Abroad Consultation', 'studyabroad-developer' ); ?></option>
                                <option value="Visa Assistance"><?php esc_html_e( 'Visa Assistance', 'studyabroad-developer' ); ?></option>
                                <option value="Scholarship Information"><?php esc_html_e( 'Scholarship Information', 'studyabroad-developer' ); ?></option>
                                <option value="Language Test Coaching"><?php esc_html_e( 'Language Test Coaching', 'studyabroad-developer' ); ?></option>
                                <option value="Other"><?php esc_html_e( 'Other', 'studyabroad-developer' ); ?></option>
                            </select>
                        </div>
                        
                        <div class="form-group" style="grid-column: span 2;">
                            <label for="country" class="form-label"><?php esc_html_e( 'Preferred Study Destination', 'studyabroad-developer' ); ?></label>
                            <select id="country" name="country" class="form-select">
                                <option value=""><?php esc_html_e( 'Select Country', 'studyabroad-developer' ); ?></option>
                                <option value="Canada"><?php esc_html_e( 'Canada', 'studyabroad-developer' ); ?></option>
                                <option value="Australia"><?php esc_html_e( 'Australia', 'studyabroad-developer' ); ?></option>
                                <option value="USA"><?php esc_html_e( 'USA', 'studyabroad-developer' ); ?></option>
                                <option value="UK"><?php esc_html_e( 'UK', 'studyabroad-developer' ); ?></option>
                                <option value="New Zealand"><?php esc_html_e( 'New Zealand', 'studyabroad-developer' ); ?></option>
                                <option value="Japan"><?php esc_html_e( 'Japan', 'studyabroad-developer' ); ?></option>
                                <option value="Germany"><?php esc_html_e( 'Germany', 'studyabroad-developer' ); ?></option>
                                <option value="Not Sure"><?php esc_html_e( 'Not Sure Yet', 'studyabroad-developer' ); ?></option>
                            </select>
                        </div>
                        
                        <div class="form-group" style="grid-column: span 2;">
                            <label for="message" class="form-label"><?php esc_html_e( 'Message', 'studyabroad-developer' ); ?> *</label>
                            <textarea id="message" name="message" class="form-textarea" rows="5" required placeholder="<?php esc_attr_e( 'Tell us about your study abroad goals...', 'studyabroad-developer' ); ?>"></textarea>
                        </div>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            <?php esc_html_e( 'Send Message', 'studyabroad-developer' ); ?>
                        </button>
                    </div>
                    
                    <input type="hidden" name="action" value="studyabroad_contact_form">
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'studyabroad_nonce' ); ?>">
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
<?php 
$map_embed = get_theme_mod( 'studyabroad_map_embed', '' );
if ( $map_embed ) :
?>
<section style="padding: 0;">
    <div class="map-container" style="height: 400px;">
        <?php echo wp_kses_post( $map_embed ); ?>
    </div>
</section>
<?php endif; ?>

<!-- FAQ Section -->
<section class="section section-light">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'FAQ', 'studyabroad-developer' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Frequently Asked Questions', 'studyabroad-developer' ); ?></h2>
        </div>
        
        <div class="faq-container" style="max-width: 800px; margin: 0 auto;">
            <?php 
            $faqs = studyabroad_get_default_faqs();
            foreach ( array_slice( $faqs, 0, 5 ) as $index => $faq ) :
            ?>
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">
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

<?php
get_footer();
