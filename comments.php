<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area mt-5">
    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ($comment_count == 1) {
                echo '1 Comentario';
            } else {
                printf('%1$s Comentarios', number_format_i18n($comment_count));
            }
            ?>
        </h3>

        <ol class="comment-list list-unstyled">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'callback'   => 'bailar_comment_callback',
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments alert alert-info">Los comentarios están cerrados.</p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply'          => 'Deja un comentario',
        'title_reply_to'       => 'Responder a %s',
        'cancel_reply_link'    => 'Cancelar respuesta',
        'label_submit'         => 'Publicar comentario',
        'class_submit'         => 'btn btn-primary',
        'comment_field'        => '<div class="mb-3"><label for="comment" class="form-label">Comentario *</label><textarea id="comment" name="comment" class="form-control" rows="4" required></textarea></div>',
        'fields'               => array(
            'author' => '<div class="row"><div class="col-md-6 mb-3"><label for="author" class="form-label">Nombre *</label><input id="author" name="author" type="text" class="form-control" required /></div>',
            'email'  => '<div class="col-md-6 mb-3"><label for="email" class="form-label">Email *</label><input id="email" name="email" type="email" class="form-control" required /></div></div>',
            'url'    => '<div class="mb-3"><label for="url" class="form-label">Sitio Web</label><input id="url" name="url" type="url" class="form-control" /></div>',
        ),
    ));
    ?>
</div>

<?php
// Función personalizada para mostrar comentarios
function bailar_comment_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class('mb-4 p-3 border rounded'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-body">
            <div class="comment-meta mb-2">
                <strong><?php comment_author(); ?></strong>
                <small class="text-muted">
                    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>" class="text-decoration-none">
                        <?php comment_date(); ?> a las <?php comment_time(); ?>
                    </a>
                </small>
                <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'class' => 'btn btn-sm btn-outline-primary float-end'))); ?>
            </div>
            
            <?php if ($comment->comment_approved == '0') : ?>
                <p class="comment-awaiting-moderation alert alert-warning">Tu comentario está esperando moderación.</p>
            <?php endif; ?>
            
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
        </div>
    <?php
}
?>