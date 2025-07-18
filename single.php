<?php get_header(); ?>

<!-- Hero Content for Single Post -->
<div class="hero-content hero-content-single">
    <div class="hero-text">
        <h1><?php the_title(); ?></h1>
        <div class="post-meta-hero">
            <?php echo bailar_y_llorar_post_meta(); ?>
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
            <div class="col-lg-8">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="single-post">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="post-featured-image mb-4">
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content-single">
                                <?php the_content(); ?>
                                
                                <?php
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Páginas:', 'bailar-y-llorar'),
                                    'after'  => '</div>',
                                ));
                                ?>
                    </div>
                    
                    <!-- Post Meta Footer -->
                    <div class="post-meta-footer mt-5 pt-4 border-top">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (has_category()): ?>
                                    <div class="post-categories mb-3">
                                        <strong>Categorías:</strong>
                                        <?php the_category(', '); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (has_tag()): ?>
                                    <div class="post-tags">
                                        <strong>Etiquetas:</strong>
                                        <?php the_tags('', ', ', ''); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="post-share">
                                    <strong>Compartir:</strong>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-btn twitter">Twitter</a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn facebook">Facebook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                
                <!-- Post Navigation -->
                <div class="post-navigation mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <?php 
                            $prev_post = get_previous_post();
                            if ($prev_post): ?>
                                <div class="nav-post nav-post-prev">
                                    <span class="nav-label">← Artículo anterior</span>
                                    <h4><a href="<?php echo get_permalink($prev_post); ?>"><?php echo get_the_title($prev_post); ?></a></h4>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <?php 
                            $next_post = get_next_post();
                            if ($next_post): ?>
                                <div class="nav-post nav-post-next">
                                    <span class="nav-label">Siguiente artículo →</span>
                                    <h4><a href="<?php echo get_permalink($next_post); ?>"><?php echo get_the_title($next_post); ?></a></h4>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Comments Section -->
                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="comments-section mt-5 pt-5 border-top">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
                
            <?php endwhile; ?>
        <?php else : ?>
            <div class="no-post text-center py-5">
                <h3>Artículo no encontrado</h3>
                <p>Lo sentimos, no pudimos encontrar el artículo que buscas.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="read-more-btn">Volver al inicio</a>
            </div>
        <?php endif; ?>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
