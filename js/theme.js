// Sticky navbar implementation - Best practices
(function() {
    'use strict';
    
    // DOM elements
    const navbar = document.getElementById('mainNavbar');
    const placeholder = document.getElementById('navbarPlaceholder');
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    
    // Configuration
    const SCROLL_THRESHOLD = 150; // When to trigger sticky
    const THROTTLE_DELAY = 16; // ~60fps
    
    // State
    let isSticky = false;
    let isMobileMenuOpen = false;
    let ticking = false;
    let navbarHeight = 0;
    
    // Calculate navbar height
    function calculateNavbarHeight() {
        const computedStyle = window.getComputedStyle(navbar);
        const paddingTop = parseFloat(computedStyle.paddingTop);
        const paddingBottom = parseFloat(computedStyle.paddingBottom);
        const contentHeight = navbar.scrollHeight;
        navbarHeight = contentHeight;
    }
    
    // Update sticky state
    function updateSticky(scrollY) {
        const shouldBeSticky = scrollY > SCROLL_THRESHOLD;
        
        if (shouldBeSticky && !isSticky) {
            // Make sticky
            navbar.classList.add('sticky');
            placeholder.style.height = navbarHeight + 'px';
            isSticky = true;
        } else if (!shouldBeSticky && isSticky) {
            // Remove sticky
            navbar.classList.remove('sticky');
            placeholder.style.height = '0px';
            isSticky = false;
        }
    }
    
    // Toggle mobile menu
    function toggleMobileMenu() {
        isMobileMenuOpen = !isMobileMenuOpen;
        
        if (isMobileMenuOpen) {
            mobileMenu.classList.add('active');
            mobileMenuToggle.classList.add('active');
            // Prevent body scroll when menu is open
            document.body.style.overflow = 'hidden';
        } else {
            mobileMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            // Restore body scroll
            document.body.style.overflow = '';
        }
    }
    
    // Close mobile menu
    function closeMobileMenu() {
        if (isMobileMenuOpen) {
            isMobileMenuOpen = false;
            mobileMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
    
    // Throttled scroll handler
    function handleScroll() {
        if (!ticking) {
            requestAnimationFrame(function() {
                updateSticky(window.pageYOffset);
                ticking = false;
            });
            ticking = true;
        }
    }
    
    // Handle clicks outside mobile menu
    function handleOutsideClick(event) {
        if (isMobileMenuOpen && 
            !mobileMenu.contains(event.target) && 
            !mobileMenuToggle.contains(event.target)) {
            closeMobileMenu();
        }
    }
    
    // Handle mobile menu link clicks
    function handleMobileMenuLinkClick() {
        closeMobileMenu();
    }
    
    // Initialize
    function init() {
        // Check if required elements exist
        if (!navbar || !placeholder || !mobileMenuToggle || !mobileMenu) {
            return;
        }
        
        calculateNavbarHeight();
        
        // Add scroll listener
        window.addEventListener('scroll', handleScroll, { passive: true });
        
        // Mobile menu toggle
        mobileMenuToggle.addEventListener('click', toggleMobileMenu);
        
        // Close menu when clicking outside
        document.addEventListener('click', handleOutsideClick);
        
        // Close menu when clicking on links
        const mobileNavLinks = mobileMenu.querySelectorAll('a');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', handleMobileMenuLinkClick);
        });
        
        // Close menu on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && isMobileMenuOpen) {
                closeMobileMenu();
            }
        });
        
        // Recalculate on resize and close mobile menu
        window.addEventListener('resize', function() {
            if (!isSticky) {
                calculateNavbarHeight();
            }
            // Close mobile menu on resize (when switching to desktop)
            if (window.innerWidth > 768) {
                closeMobileMenu();
            }
        }, { passive: true });
    }
    
    // Start when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();