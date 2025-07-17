<?php get_header(); ?>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="error-404">
                    <h1>404</h1>
                    <h2>página no encontrada</h2>
                    <p>lo sentimos, la página que buscas no existe o ha sido movida.</p>
                    <div class="mt-4">
                        <a href="<?php echo home_url(); ?>" class="read-more-btn">
                            volver al inicio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>