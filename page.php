<?php get_header(); ?>

<main class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article>
                        <header class="mb-4">
                            <h1 class="display-5 fw-bold"><?php the_title(); ?></h1>
                        </header>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <?php if (is_active_sidebar('main-sidebar')) : ?>
                <?php dynamic_sidebar('main-sidebar'); ?>
            <?php else : ?>
                <div class="widget mb-4">
                    <h5 class="widget-title">Navegación</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo home_url(); ?>" class="text-decoration-none">← Volver al inicio</a></li>
                        <li><a href="<?php echo home_url('/blog'); ?>" class="text-decoration-none">Ver todos los artículos</a></li>
                    </ul>
                </div>
                
                <div class="widget mb-4">
                    <h5 class="widget-title">Últimos Artículos</h5>
                    <?php
                    $recent_posts = wp_get_recent_posts(array('numberposts' => 3));
                    if ($recent_posts) :
                    ?>
                        <ul class="list-unstyled">
                            <?php foreach ($recent_posts as $post) : ?>
                                <li class="mb-2">
                                    <a href="<?php echo get_permalink($post['ID']); ?>" class="text-decoration-none">
                                        <?php echo $post['post_title']; ?>
                                    </a>
                                    <small class="text-muted d-block"><?php echo get_the_date('', $post['ID']); ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>