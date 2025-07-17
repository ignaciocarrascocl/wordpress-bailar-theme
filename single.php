<?php get_header(); ?>

<main class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="mb-5">
                        <header class="mb-4">
                            <h1 class="display-5 fw-bold"><?php the_title(); ?></h1>
                            
                            <div class="post-meta mb-3">
                                <span class="text-muted">
                                    Por <strong><?php the_author(); ?></strong> | 
                                    <?php echo get_the_date(); ?> | 
                                    <?php the_category(', '); ?>
                                </span>
                            </div>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="mb-4">
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                                </div>
                            <?php endif; ?>
                        </header>
                        
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                        
                        <footer class="mt-5 pt-4 border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if ($prev_post) :
                                    ?>
                                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="text-decoration-none">
                                            <small class="text-muted">← Artículo anterior</small><br>
                                            <?php echo $prev_post->post_title; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 text-end">
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post) :
                                    ?>
                                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="text-decoration-none">
                                            <small class="text-muted">Artículo siguiente →</small><br>
                                            <?php echo $next_post->post_title; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </footer>
                    </article>
                    
                    <?php
                    // Mostrar comentarios si están habilitados
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                    
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <?php if (is_active_sidebar('main-sidebar')) : ?>
                <?php dynamic_sidebar('main-sidebar'); ?>
            <?php else : ?>
                <div class="widget mb-4">
                    <h5 class="widget-title">Artículos Relacionados</h5>
                    <?php
                    $related = get_posts(array(
                        'category__in' => wp_get_post_categories($post->ID),
                        'numberposts' => 3,
                        'post__not_in' => array($post->ID)
                    ));
                    if ($related) :
                    ?>
                        <ul class="list-unstyled">
                            <?php foreach ($related as $post) : setup_postdata($post); ?>
                                <li class="mb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                    <small class="text-muted d-block"><?php echo get_the_date(); ?></small>
                                </li>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-muted">No hay artículos relacionados.</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>