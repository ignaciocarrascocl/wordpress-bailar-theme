<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header with navbar and hero -->
<header class="site-header">
    <!-- Background image as real img element -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/header-2x.png" alt="Background" class="header-bg-image">
    
    <!-- Navigation Bar -->
    <nav class="navbar" id="mainNavbar">
        <div class="container">
            <div class="navbar-content">
                <a href="<?php echo home_url(); ?>" class="logo-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Bailar y Llorar" class="site-logo">
                </a>
                
                <div class="nav-container">
                    <ul class="nav-links">
                        <li><a href="<?php echo home_url(); ?>" <?php if(is_home() || is_front_page()) echo 'class="active"'; ?>>inicio</a></li>
                        <li><a href="<?php echo home_url('/blog'); ?>" <?php if(is_category() || is_archive() || is_single()) echo 'class="active"'; ?>>blog</a></li>
                        <li><a href="<?php echo home_url('/acerca'); ?>" <?php if(is_page('acerca')) echo 'class="active"'; ?>>acerca</a></li>
                        <li><a href="<?php echo home_url('/contacto'); ?>" <?php if(is_page('contacto')) echo 'class="active"'; ?>>contacto</a></li>
                    </ul>
                    
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
                <ul class="mobile-nav-links">
                    <li><a href="<?php echo home_url(); ?>" <?php if(is_home() || is_front_page()) echo 'class="active"'; ?>>inicio</a></li>
                    <li><a href="<?php echo home_url('/blog'); ?>" <?php if(is_category() || is_archive() || is_single()) echo 'class="active"'; ?>>blog</a></li>
                    <li><a href="<?php echo home_url('/acerca'); ?>" <?php if(is_page('acerca')) echo 'class="active"'; ?>>acerca</a></li>
                    <li><a href="<?php echo home_url('/contacto'); ?>" <?php if(is_page('contacto')) echo 'class="active"'; ?>>contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?php if(is_home() || is_front_page()): ?>
    <!-- Hero Content - only on homepage -->
    <div class="hero-content">
        <div class="hero-text">
            <h1>bailar y llorar</h1>
            <p>un espacio para reflexionar sobre la vida, compartir historias y conectar con nuestras emociones más profundas</p>
        </div>
    </div>
    <?php endif; ?>
</header>

<!-- Placeholder to prevent layout shift -->
<div class="navbar-placeholder" id="navbarPlaceholder"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.site-header');
    const headerContent = document.querySelector('.header-content');
    const logo = document.querySelector('.site-logo');
    const placeholder = document.getElementById('navbarPlaceholder');
    
    let isSticky = false;
    let headerHeight = 0;
    
    // Calculate header height
    function calculateHeaderHeight() {
        headerHeight = headerContent.offsetHeight;
    }
    
    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollThreshold = 100;
        
        if (scrollTop > scrollThreshold && !isSticky) {
            // Make sticky
            header.classList.add('sticky');
            headerContent.classList.add('collapsed');
            logo.classList.add('small');
            placeholder.style.height = headerHeight + 'px';
            isSticky = true;
        } else if (scrollTop <= scrollThreshold && isSticky) {
            // Remove sticky
            header.classList.remove('sticky');
            headerContent.classList.remove('collapsed');
            logo.classList.remove('small');
            placeholder.style.height = '0px';
            isSticky = false;
        }
    }
    
    // Initialize
    calculateHeaderHeight();
    window.addEventListener('scroll', handleScroll, { passive: true });
    window.addEventListener('resize', function() {
        if (!isSticky) {
            calculateHeaderHeight();
        }
    }, { passive: true });
});
</script>