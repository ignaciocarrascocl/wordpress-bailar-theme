<?php get_header(); ?>

<main class="container my-5">
    <div class="row">
        <div class="col-12">
            <?php if (have_posts()) : ?>
                <div class="home-posts">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="card">
                            <div class="row g-0">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="col-md-4">
                                        <div style="height: 250px; overflow: hidden;">
                                            <?php the_post_thumbnail('medium_large', array('class' => 'w-100 h-100', 'style' => 'object-fit: cover;')); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                <?php else : ?>
                                    <div class="col-12">
                                <?php endif; ?>
                                    <div class="card-body">
                                        <h2 class="card-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="post-meta mb-3">
                                            <small>
                                                por <?php the_author(); ?> | 
                                                <?php echo get_the_date(); ?> | 
                                                <?php the_category(', '); ?>
                                            </small>
                                        </div>
                                        
                                        <div class="post-excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                            leer más
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-5">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '← anterior',
                        'next_text' => 'siguiente →',
                        'type' => 'list',
                        'class' => 'pagination'
                    ));
                    ?>
                </div>
                
            <?php else : ?>
                <div class="text-center py-5">
                    <h3>no hay posts disponibles</h3>
                    <p class="text-muted">aún no se han publicado artículos en este blog.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>