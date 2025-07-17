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
    
    // Soporte para menús de navegación
    register_nav_menus(array(
        'main-menu' => 'Menú Principal',
    ));
    
    // Soporte para HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'bailar_theme_setup');

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

// Limitar el excerpt
function bailar_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'bailar_excerpt_length');

?>