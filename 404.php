<?php get_header(); ?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="py-5">
                <h1 class="display-1 fw-bold text-muted">404</h1>
                <h2 class="mb-4">Página no encontrada</h2>
                <p class="lead mb-4">Lo sentimos, la página que buscas no existe o ha sido movida.</p>
                
                <div class="mb-5">
                    <a href="<?php echo home_url(); ?>" class="btn btn-primary me-3">Volver al inicio</a>
                    <a href="<?php echo home_url('/blog'); ?>" class="btn btn-outline-primary">Ver el blog</a>
                </div>
                
                <div class="mt-5">
                    <h4>¿Qué puedes hacer?</h4>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h6>Buscar</h6>
                            <p>Usa el buscador para encontrar lo que necesitas</p>
                        </div>
                        <div class="col-md-4">
                            <h6>Explorar</h6>
                            <p>Navega por nuestras categorías y artículos</p>
                        </div>
                        <div class="col-md-4">
                            <h6>Contactar</h6>
                            <p>Si algo no funciona, háznos saber</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>