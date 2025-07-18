<?php get_header(); ?>

<!-- Placeholder to prevent layout shift -->
<div class="navbar-placeholder" id="navbarPlaceholder"></div>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('single-page'); ?>>
                            <!-- Page Header -->
                            <header class="page-header mb-4">
                                <h1 class="page-title"><?php the_title(); ?></h1>
                            </header>

                            <!-- Featured Image -->
                            <?php if (has_post_thumbnail()): ?>
                                <div class="page-featured-image mb-4">
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Page Content -->
                            <div class="page-content">
                                <?php the_content(); ?>
                                
                                <?php
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Páginas:', 'bailar-y-llorar'),
                                    'after'  => '</div>',
                                ));
                                ?>
                            </div>
                        </article>

                        <!-- Comments (if enabled for pages) -->
                        <?php if (comments_open() || get_comments_number()) : ?>
                            <div class="comments-section mt-5 pt-5 border-top">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="no-page text-center py-5">
                        <h3>Página no encontrada</h3>
                        <p>Lo sentimos, no pudimos encontrar la página que buscas.</p>
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
