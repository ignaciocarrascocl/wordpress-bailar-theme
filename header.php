<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header with navbar and hero -->
<header class="site-header">
    <!-- Background image as real img element -->
    <img src="<?php echo esc_url(bailar_y_llorar_get_hero_bg()); ?>" alt="<?php bloginfo('name'); ?>" class="header-bg-image">
    
    <!-- Navigation Bar -->
    <nav class="navbar" id="mainNavbar">
        <div class="container">
            <div class="navbar-content">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-container">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo.png'); ?>" alt="<?php bloginfo('name'); ?>" class="site-logo">
                    <?php endif; ?>
                </a>
                
                <div class="nav-container">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-links',
                        'container'      => false,
                        'fallback_cb'    => function() {
                            echo '<ul class="nav-links">';
                            echo '<li><a href="' . esc_url(home_url('/')) . '" class="active">inicio</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/blog')) . '">blog</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/acerca')) . '">acerca</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/contacto')) . '">contacto</a></li>';
                            echo '</ul>';
                        }
                    ));
                    ?>
                    
                    <!-- Mobile menu toggle -->
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div class="mobile-menu" id="mobileMenu">
            <div class="container">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'mobile-nav-links',
                    'container'      => false,
                    'walker'         => new Bailar_Mobile_Walker(),
                    'fallback_cb'    => function() {
                        echo '<ul class="mobile-nav-links">';
                        echo '<li><a href="' . esc_url(home_url('/')) . '" class="active">inicio</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/blog')) . '">blog</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/acerca')) . '">acerca</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/contacto')) . '">contacto</a></li>';
                        echo '</ul>';
                    }
                ));
                ?>
            </div>
        </div>
    </nav>
    
    <?php if (is_home() || is_front_page()): ?>
    <!-- Hero Content -->
    <div class="hero-content">
        <div class="hero-text">
            <h1><?php echo esc_html(get_theme_mod('bailar_hero_title', 'bailar y llorar')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('bailar_hero_description', 'un espacio para reflexionar sobre la vida, compartir historias y conectar con nuestras emociones más profundas')); ?></p>
        </div>
    </div>
    <?php endif; ?>
</header>

<!-- Placeholder to prevent layout shift -->
<div class="navbar-placeholder" id="navbarPlaceholder"></div>