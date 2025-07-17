<?php get_header(); ?>

<!-- Page Header for Search -->
<div class="page-header bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">
                    <?php if (have_posts()): ?>
                        Resultados para: "<?php echo get_search_query(); ?>"
                    <?php else: ?>
                        Sin resultados para: "<?php echo get_search_query(); ?>"
                    <?php endif; ?>
                </h1>
                <p class="page-description">
                    <?php if (have_posts()): ?>
                        Encontramos <?php echo $wp_query->found_posts; ?> artículo(s)
                    <?php else: ?>
                        No encontramos artículos que coincidan con tu búsqueda
                    <?php endif; ?>
                </p>
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
                <!-- Search Form -->
                <div class="search-form-container text-center mb-5">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
                        <div class="input-group mb-3" style="max-width: 500px; margin: 0 auto;">
                            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="Buscar artículos..." class="form-control" required>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                </div>

                <?php if (have_posts()) : ?>
                    <?php $post_count = 0; ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php $post_count++; ?>
                        
                        <!-- Post Card -->
                        <article class="post-card">
                            <div class="row g-0">
                                <?php if ($post_count % 2 == 0): ?>
                                    <!-- Even posts: image on right -->
                                    <div class="col-lg-5 order-lg-2">
                                        <div class="post-image">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid')); ?>
                                            <?php else: ?>
                                                <span>imagen del artículo</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 order-lg-1">
                                <?php else: ?>
                                    <!-- Odd posts: image on left -->
                                    <div class="col-lg-5">
                                        <div class="post-image">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid')); ?>
                                            <?php else: ?>
                                                <span>imagen del artículo</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                <?php endif; ?>
                                
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        
                                        <div class="post-meta">
                                            <?php echo bailar_y_llorar_post_meta(); ?>
                                        </div>
                                        
                                        <div class="post-excerpt">
                                            <?php if (has_excerpt()): ?>
                                                <p><?php echo get_the_excerpt(); ?></p>
                                            <?php else: ?>
                                                <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                            leer más
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        
                    <?php endwhile; ?>
                    
                    <!-- Pagination -->
                    <div class="pagination-wrapper text-center mt-5">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => __('← Anterior', 'bailar-y-llorar'),
                            'next_text' => __('Siguiente →', 'bailar-y-llorar'),
                        ));
                        ?>
                    </div>
                    
                <?php else : ?>
                    <!-- No posts found -->
                    <div class="no-posts text-center py-5">
                        <h3>No se encontraron resultados</h3>
                        <p>Intenta con términos diferentes o revisa la ortografía.</p>
                        <div class="mt-4">
                            <h5>Sugerencias:</h5>
                            <ul class="list-unstyled">
                                <li>• Usa términos más generales</li>
                                <li>• Revisa la ortografía</li>
                                <li>• Intenta con sinónimos</li>
                            </ul>
                        </div>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="read-more-btn mt-3">Volver al inicio</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
