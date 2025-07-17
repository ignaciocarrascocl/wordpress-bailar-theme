<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h6>bailar y llorar</h6>
                <p>un espacio para reflexionar sobre la vida, compartir historias y conectar con nuestras emociones más profundas.</p>
            </div>
            <div class="col-md-4">
                <h6>navegación</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="<?php echo home_url(); ?>">inicio</a></li>
                    <li class="mb-2"><a href="<?php echo home_url('/blog'); ?>">blog</a></li>
                    <li class="mb-2"><a href="<?php echo home_url('/acerca'); ?>">acerca</a></li>
                    <li class="mb-2"><a href="<?php echo home_url('/contacto'); ?>">contacto</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6>contacto</h6>
                <p>
                    email: hola@bailaryllorar.cl<br>
                    web: bailaryllorar.cl
                </p>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="footer-copyright">
            <p class="mb-0">
                &copy; <?php echo date('Y'); ?> bailar y llorar. todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
    
    // State
    let isSticky = false;
    let isMobileMenuOpen = false;
    let ticking = false;
    let navbarHeight = 0;
    
    // Calculate navbar height
    function calculateNavbarHeight() {
        navbarHeight = navbar.scrollHeight;
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
            document.body.style.overflow = 'hidden';
        } else {
            mobileMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
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
        calculateNavbarHeight();
        
        // Add scroll listener
        window.addEventListener('scroll', handleScroll, { passive: true });
        
        // Mobile menu toggle
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', toggleMobileMenu);
        }
        
        // Close menu when clicking outside
        document.addEventListener('click', handleOutsideClick);
        
        // Close menu when clicking on links
        if (mobileMenu) {
            const mobileNavLinks = mobileMenu.querySelectorAll('a');
            mobileNavLinks.forEach(link => {
                link.addEventListener('click', handleMobileMenuLinkClick);
            });
        }
        
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
</script>

<?php wp_footer(); ?>
</body>
</html>