<?php get_header(); ?>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="page-content">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- Page Header -->
                        <header class="page-header text-center mb-5">
                            <h1 class="page-title"><?php the_title(); ?></h1>
                        </header>

                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="page-featured-image mb-5">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid w-100')); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Page Content -->
                        <div class="page-single-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>