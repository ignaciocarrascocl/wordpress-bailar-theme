<?php
// Funciones del tema Bailar y Llorar

// Cargar estilos y scripts
function bailar_theme_enqueue_styles() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    // Estilo del tema
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    
    // Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'bailar_theme_enqueue_styles');

// Soporte para características del tema
function bailar_theme_setup() {
    // Soporte para títulos dinámicos
    add_theme_support('title-tag');
    
    // Soporte para imágenes destacadas
    add_theme_support('post-thumbnails');
    
    // Soporte para logo personalizado
    add_theme_support('custom-logo');
    
    // Soporte para HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Establecer ancho de contenido
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'bailar_theme_setup');

// Limitar el excerpt
function bailar_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'bailar_excerpt_length');

// Personalizar el "más" del excerpt
function bailar_custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'bailar_custom_excerpt_more');

// Agregar tamaños de imagen personalizados
function bailar_custom_image_sizes() {
    add_image_size('post-card', 600, 300, true);
}
add_action('after_setup_theme', 'bailar_custom_image_sizes');

// Registrar menús de navegación
function bailar_register_menus() {
    register_nav_menus(array(
        'primary' => 'Menú Principal',
        'mobile' => 'Menú Móvil'
    ));
}
add_action('init', 'bailar_register_menus');

// Agregar clases al cuerpo para mejor estilo
function bailar_body_classes($classes) {
    if (is_home() || is_front_page()) {
        $classes[] = 'home-page';
    }
    if (is_single()) {
        $classes[] = 'single-post';
    }
    if (is_page()) {
        $classes[] = 'single-page';
    }
    return $classes;
}
add_filter('body_class', 'bailar_body_classes');

// Personalizar metadatos de la publicación para formato español
function bailar_get_post_meta() {
    $author = get_the_author();
    $date = get_the_date('j F Y');
    $categories = get_the_category();
    $category = !empty($categories) ? esc_html($categories[0]->name) : 'reflexiones';
    
    return $author . ' • ' . $date . ' • ' . $category;
}

// Registrar áreas de widgets
function bailar_widgets_init() {
    register_sidebar(array(
        'name'          => 'Sidebar Principal',
        'id'            => 'main-sidebar',
        'description'   => 'Widgets para la barra lateral principal',
        'before_widget' => '<div class="widget mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ));
    
    register_sidebar(array(
        'name'          => 'Footer',
        'id'            => 'footer-widgets',
        'description'   => 'Widgets para el pie de página',
        'before_widget' => '<div class="col-md-4"><div class="widget">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h6 class="widget-title">',
        'after_title'   => '</h6>',
    ));
}
add_action('widgets_init', 'bailar_widgets_init');

// Limpiar el head de WordPress
function bailar_cleanup_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
}
add_action('init', 'bailar_cleanup_head');

// Soporte para tipos de publicaciones personalizadas (para expansión futura)
function bailar_custom_post_types() {
    // Reservado para futuros tipos de publicaciones personalizadas como 'reflexiones', 'historias', etc.
}
add_action('init', 'bailar_custom_post_types');

// Estilo para la paginación
function bailar_pagination_css() {
    echo '<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 3rem;
    }
    .pagination .page-numbers {
        display: inline-block;
        padding: 0.75rem 1rem;
        margin: 0 0.25rem;
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.1);
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .pagination .page-numbers:hover,
    .pagination .page-numbers.current {
        background: #8f2d56;
        color: #ffffff;
        border-color: #8f2d56;
    }
    </style>';
}
add_action('wp_head', 'bailar_pagination_css');
?>