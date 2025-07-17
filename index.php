<?php get_header(); ?>

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
                        <!-- Post <?php echo $post_count; ?> -->
                        <article class="post-card">
                            <div class="row g-0">
                                <div class="col-lg-5 <?php echo ($post_count % 2 == 0) ? 'order-lg-2' : ''; ?>">
                                    <div class="post-image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid')); ?>
                                        <?php else : ?>
                                            <span>imagen del artículo</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-7 <?php echo ($post_count % 2 == 0) ? 'order-lg-1' : ''; ?>">
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        
                                        <div class="post-meta">
                                            <?php echo get_the_author(); ?> • <?php echo get_the_date('j F Y'); ?> • <?php 
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo esc_html($categories[0]->name);
                                            } else {
                                                echo 'reflexiones';
                                            }
                                            ?>
                                        </div>
                                        
                                        <div class="post-excerpt">
                                            <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
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
                    <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '← anterior',
                            'next_text' => 'siguiente →',
                            'type' => 'list'
                        ));
                        ?>
                    </div>
                    <?php endif; ?>

                <?php else : ?>
                    <div class="text-center py-5">
                        <h3>No hay publicaciones disponibles</h3>
                        <p>Pronto compartiremos nuevas reflexiones contigo.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>