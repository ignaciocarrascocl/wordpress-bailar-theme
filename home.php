<?php get_header(); ?>

<!-- Placeholder to prevent layout shift -->
<div class="navbar-placeholder" id="navbarPlaceholder"></div>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <h2 class="section-title">últimas reflexiones</h2>
        
        <div class="row">
            <div class="col-12">
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
                        <h3>No hay publicaciones aún</h3>
                        <p>Vuelve pronto para leer nuestras reflexiones sobre la vida.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
