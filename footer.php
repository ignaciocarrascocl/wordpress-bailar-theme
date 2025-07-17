<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h6><?php bloginfo('name'); ?></h6>
                <p><?php echo esc_html(get_bloginfo('description')); ?></p>
            </div>
            <div class="col-md-4">
                <h6>navegación</h6>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'list-unstyled',
                    'container'      => false,
                    'fallback_cb'    => function() {
                        echo '<ul class="list-unstyled">';
                        echo '<li class="mb-2"><a href="' . esc_url(home_url('/')) . '">inicio</a></li>';
                        echo '<li class="mb-2"><a href="' . esc_url(home_url('/blog')) . '">blog</a></li>';
                        echo '<li class="mb-2"><a href="' . esc_url(home_url('/acerca')) . '">acerca</a></li>';
                        echo '<li class="mb-2"><a href="' . esc_url(home_url('/contacto')) . '">contacto</a></li>';
                        echo '</ul>';
                    }
                ));
                ?>
            </div>
            <div class="col-md-4">
                <h6>contacto</h6>
                <p>
                    email: <?php echo esc_html(get_option('admin_email')); ?><br>
                    web: <?php echo esc_url(home_url()); ?>
                </p>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="footer-copyright">
            <p class="mb-0">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>