<?php get_header(); ?>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="post-single">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- Post Header -->
                        <header class="post-header text-center mb-5">
                            <h1 class="post-title mb-3"><?php the_title(); ?></h1>
                            <div class="post-meta">
                                <?php echo bailar_get_post_meta(); ?>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-featured-image mb-5">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid w-100')); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Post Content -->
                        <div class="post-single-content">
                            <?php the_content(); ?>
                        </div>

                        <!-- Post Navigation -->
                        <nav class="post-navigation mt-5 pt-5 border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php 
                                    $prev_post = get_previous_post();
                                    if ($prev_post) : ?>
                                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link-prev">
                                            <span class="nav-label">← anterior</span>
                                            <span class="nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <?php 
                                    $next_post = get_next_post();
                                    if ($next_post) : ?>
                                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link-next">
                                            <span class="nav-label">siguiente →</span>
                                            <span class="nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </nav>

                        <!-- Comments -->
                        <?php if (comments_open() || get_comments_number()) : ?>
                            <div class="comments-section mt-5 pt-5 border-top">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>