<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('footer-widgets')) : ?>
                <?php dynamic_sidebar('footer-widgets'); ?>
            <?php else : ?>
                <div class="col-md-4">
                    <h6>bailar y llorar</h6>
                    <p>un espacio dedicado a explorar las emociones humanas a través de la escritura, reflexiones y experiencias compartidas.</p>
                </div>
                <div class="col-md-4">
                    <h6>enlaces</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo home_url(); ?>">inicio</a></li>
                        <li><a href="<?php echo home_url('/blog'); ?>">blog</a></li>
                        <li><a href="<?php echo home_url('/acerca'); ?>">acerca</a></li>
                        <li><a href="<?php echo home_url('/contacto'); ?>">contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>contacto</h6>
                    <p>
                        email: hola@bailaryllorar.cl<br>
                        web: bailaryllorar.cl
                    </p>
                </div>
            <?php endif; ?>
        </div>
        <hr class="my-4" style="border-color: #f0f0f0;">
        <div class="text-center">
            <p class="mb-0" style="color: #999; font-size: 0.9rem;">
                &copy; <?php echo date('Y'); ?> bailar y llorar. todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>