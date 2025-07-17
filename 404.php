<?php get_header(); ?>

<!-- Page Header for 404 -->
<div class="page-header bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">404</h1>
                <p class="page-description">Página no encontrada</p>
            </div>
        </div>
    </div>
</div>
</header>

<!-- Placeholder to prevent layout shift -->
<div class="navbar-placeholder" id="navbarPlaceholder"></div>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="error-404 text-center py-5">
                    <div class="error-content">
                        <h2 class="error-title">Oops! Página no encontrada</h2>
                        <p class="error-message">
                            Lo sentimos, la página que buscas no existe o ha sido movida.
                        </p>
                        
                        <!-- Search Form -->
                        <div class="error-search mt-4 mb-4">
                            <h4>¿Intentamos buscar?</h4>
                            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
                                <div class="input-group mb-3" style="max-width: 500px; margin: 0 auto;">
                                    <input type="search" name="s" placeholder="Buscar artículos..." class="form-control" required>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Navigation Options -->
                        <div class="error-navigation">
                            <h4>O navega a:</h4>
                            <div class="nav-options">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="read-more-btn me-3">Inicio</a>
                                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="read-more-btn">Blog</a>
                            </div>
                        </div>
                        
                        <!-- Recent Posts -->
                        <div class="recent-posts-404 mt-5">
                            <h4>Artículos recientes</h4>
                            <div class="row">
                                <?php
                                $recent_posts = wp_get_recent_posts(array(
                                    'numberposts' => 3,
                                    'post_status' => 'publish'
                                ));
                                
                                foreach($recent_posts as $post) : ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="<?php echo get_permalink($post['ID']); ?>" class="text-decoration-none">
                                                        <?php echo $post['post_title']; ?>
                                                    </a>
                                                </h5>
                                                <p class="card-text">
                                                    <?php echo wp_trim_words($post['post_content'], 15, '...'); ?>
                                                </p>
                                                <a href="<?php echo get_permalink($post['ID']); ?>" class="btn btn-sm btn-outline-primary">
                                                    Leer más
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
