<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header Principal -->
<header class="site-header">
    <!-- Background image as real img element -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/header-2x.png" alt="Background" class="header-bg-image">
    
    <div class="container">
        <div class="header-content">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Bailar y Llorar" class="site-logo">
            </a>
            
            <nav class="header-nav">
                <ul>
                    <li><a href="<?php echo home_url(); ?>" <?php if(is_home()) echo 'class="active"'; ?>>inicio</a></li>
                    <li><a href="<?php echo home_url('/blog'); ?>" <?php if(is_category() || is_archive()) echo 'class="active"'; ?>>blog</a></li>
                    <li><a href="<?php echo home_url('/acerca'); ?>" <?php if(is_page('acerca')) echo 'class="active"'; ?>>acerca</a></li>
                    <li><a href="<?php echo home_url('/contacto'); ?>" <?php if(is_page('contacto')) echo 'class="active"'; ?>>contacto</a></li>
                </ul>
            </nav>
        </div>
    </div>
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