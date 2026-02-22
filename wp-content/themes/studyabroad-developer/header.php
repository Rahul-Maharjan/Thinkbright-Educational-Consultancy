<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'studyabroad-developer' ); ?></a>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
                        <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                        if ( $logo ) {
                            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
                        }
                        ?>
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-text" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Main Navigation -->
            <nav id="site-navigation" class="main-navigation">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'main-nav',
                        'container'      => false,
                        'depth'          => 2,
                        'fallback_cb'    => false,
                    ) );
                } else {
                    // Default menu if no menu is set
                    ?>
                    <ul class="main-nav">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                         <a href="<?php echo get_permalink(58); ?>">About Us</a>
                        <li><a href="#destinations">Destinations</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#events">Events</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog</a></li>
                        <li><a href="#consultation">Contact</a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>

            <!-- Header CTA -->
            <div class="header-cta">
                <?php 
                $phone = get_theme_mod( 'studyabroad_phone', '+1 234 567 8900' );
                if ( $phone ) :
                ?>
                    <a href="tel:<?php echo esc_attr( studyabroad_format_phone( $phone ) ); ?>" class="header-phone">
                        <?php echo studyabroad_get_icon( 'phone' ); ?>
                        <span><?php echo esc_html( $phone ); ?></span>
                    </a>
                <?php endif; ?>
                
                <a href="#consultation" class="btn btn-primary btn-sm">
                    <?php esc_html_e( 'Free Consultation', 'studyabroad-developer' ); ?>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-controls="site-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'studyabroad-developer' ); ?>">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>

<main id="primary" class="site-main">
