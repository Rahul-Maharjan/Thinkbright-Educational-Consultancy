</main><!-- #primary -->

<footer id="colophon" class="site-footer">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <!-- Footer About -->
                <div class="footer-about">
                    <div class="footer-logo">
                        <?php if ( has_custom_logo() ) : ?>
                            <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                            if ( $logo ) {
                                echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
                            }
                            ?>
                        <?php else : ?>
                            <span class="footer-logo-text"><?php bloginfo( 'name' ); ?></span>
                        <?php endif; ?>
                    </div>
                    <p><?php echo esc_html( get_theme_mod( 'studyabroad_footer_about', 'We are dedicated to helping students achieve their international education goals. Our expert counselors provide comprehensive support throughout your study abroad journey.' ) ); ?></p>
                    
                    <div class="footer-social">
                        <?php 
                        $social_links = studyabroad_get_social_links();
                        foreach ( $social_links as $network => $url ) :
                            if ( $url ) :
                        ?>
                            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( ucfirst( $network ) ); ?>">
                                <?php echo studyabroad_get_icon( $network ); ?>
                            </a>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-column">
                    <h4 class="footer-title"><?php esc_html_e( 'Quick Links', 'studyabroad-developer' ); ?></h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#about"><?php esc_html_e( 'About Us', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#services"><?php esc_html_e( 'Services', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#events"><?php esc_html_e( 'Events', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Blog', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#consultation"><?php esc_html_e( 'Contact', 'studyabroad-developer' ); ?></a></li>
                    </ul>
                </div>

                <!-- Study Destinations -->
                <div class="footer-column">
                    <h4 class="footer-title"><?php esc_html_e( 'Study Destinations', 'studyabroad-developer' ); ?></h4>
                    <ul class="footer-links">
                        <li><a href="#"><?php esc_html_e( 'Study in Canada', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Study in Australia', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Study in USA', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Study in UK', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Study in New Zealand', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Study in Japan', 'studyabroad-developer' ); ?></a></li>
                    </ul>
                </div>

                <!-- Our Services -->
                <div class="footer-column">
                    <h4 class="footer-title"><?php esc_html_e( 'Our Services', 'studyabroad-developer' ); ?></h4>
                    <ul class="footer-links">
                        <li><a href="#"><?php esc_html_e( 'University Selection', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Visa Assistance', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'IELTS Preparation', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Scholarship Help', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'SOP Writing', 'studyabroad-developer' ); ?></a></li>
                        <li><a href="#"><?php esc_html_e( 'Pre-departure', 'studyabroad-developer' ); ?></a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-column">
                    <h4 class="footer-title"><?php esc_html_e( 'Contact Us', 'studyabroad-developer' ); ?></h4>
                    <ul class="footer-contact">
                        <?php 
                        $address = get_theme_mod( 'studyabroad_address', '123 Education Street, City, Country' );
                        if ( $address ) :
                        ?>
                            <li>
                                <?php echo studyabroad_get_icon( 'map-pin' ); ?>
                                <span><?php echo esc_html( $address ); ?></span>
                            </li>
                        <?php endif; ?>
                        
                        <?php 
                        $phone = get_theme_mod( 'studyabroad_phone', '+1 234 567 8900' );
                        if ( $phone ) :
                        ?>
                            <li>
                                <?php echo studyabroad_get_icon( 'phone' ); ?>
                                <a href="tel:<?php echo esc_attr( studyabroad_format_phone( $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
                            </li>
                        <?php endif; ?>
                        
                        <?php 
                        $email = get_theme_mod( 'studyabroad_email', 'info@studyabroad.com' );
                        if ( $email ) :
                        ?>
                            <li>
                                <?php echo studyabroad_get_icon( 'mail' ); ?>
                                <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                            </li>
                        <?php endif; ?>
                        
                        <?php 
                        $hours = get_theme_mod( 'studyabroad_hours', 'Mon - Fri: 9:00 AM - 6:00 PM' );
                        if ( $hours ) :
                        ?>
                            <li>
                                <?php echo studyabroad_get_icon( 'clock' ); ?>
                                <span><?php echo esc_html( $hours ); ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <p class="footer-copyright">
                    <?php 
                    $copyright = get_theme_mod( 'studyabroad_copyright', '© 2026 Study Abroad Developer. All Rights Reserved.' );
                    echo wp_kses_post( $copyright );
                    ?>
                </p>
                <div class="footer-bottom-links">
                    <a href="#"><?php esc_html_e( 'Privacy Policy', 'studyabroad-developer' ); ?></a>
                    <a href="#"><?php esc_html_e( 'Terms of Service', 'studyabroad-developer' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Float Button -->
<?php 
$whatsapp = get_theme_mod( 'studyabroad_whatsapp', '' );
if ( $whatsapp ) :
    $whatsapp_link = studyabroad_get_whatsapp_link();
?>
    <div class="whatsapp-float">
        <a href="<?php echo esc_url( $whatsapp_link ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Chat on WhatsApp', 'studyabroad-developer' ); ?>">
            <?php echo studyabroad_get_icon( 'whatsapp' ); ?>
        </a>
    </div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
