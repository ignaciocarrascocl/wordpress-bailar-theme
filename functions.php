<?php
/**
 * Bailar y Llorar Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function bailar_y_llorar_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style'
    ));
    add_theme_support('custom-logo', array(
        'height'      => 90,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'bailar-y-llorar'),
    ));
    
    // Set content width
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'bailar_y_llorar_setup');

/**
 * Register widget areas
 */
function bailar_y_llorar_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'bailar-y-llorar'),
        'id'            => 'sidebar-1',
        'description'   => __('Área de widgets para la barra lateral principal.', 'bailar-y-llorar'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widgets', 'bailar-y-llorar'),
        'id'            => 'footer-widgets',
        'description'   => __('Área de widgets para el pie de página.', 'bailar-y-llorar'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="footer-widget-title">',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'bailar_y_llorar_widgets_init');

/**
 * Enqueue scripts and styles
 */
function bailar_y_llorar_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('bailar-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap', array(), null);
    
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    
    // Enqueue theme styles
    wp_enqueue_style('bailar-style', get_stylesheet_uri(), array('bootstrap-css'), wp_get_theme()->get('Version'));
    
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
    
    // Enqueue theme scripts
    wp_enqueue_script('bailar-scripts', get_template_directory_uri() . '/js/theme.js', array(), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'bailar_y_llorar_scripts');

/**
 * Custom logo classes and attributes
 */
function bailar_y_llorar_custom_logo($html) {
    // Add site-logo class to the custom logo for better compatibility
    $html = str_replace('class="custom-logo"', 'class="custom-logo site-logo"', $html);
    return $html;
}
add_filter('get_custom_logo', 'bailar_y_llorar_custom_logo');

/**
 * Custom excerpt length
 */
function bailar_y_llorar_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'bailar_y_llorar_excerpt_length');

/**
 * Custom excerpt more text
 */
function bailar_y_llorar_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'bailar_y_llorar_excerpt_more');

/**
 * Custom post meta function
 */
function bailar_y_llorar_post_meta() {
    $author = get_the_author();
    $date = get_the_date('j F Y');
    $categories = get_the_category_list(', ');
    
    if ($categories) {
        $category_names = strip_tags($categories);
    } else {
        $category_names = 'reflexiones';
    }
    
    return sprintf(
        '%s • %s • %s',
        esc_html($author),
        esc_html($date),
        esc_html(strtolower($category_names))
    );
}

/**
 * Add custom body classes
 */
function bailar_y_llorar_body_class($classes) {
    if (is_home() || is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'bailar_y_llorar_body_class');

/**
 * Theme customizer
 */
function bailar_y_llorar_customize_register($wp_customize) {
    // Hero section
    $wp_customize->add_section('bailar_hero_section', array(
        'title'    => __('Sección Hero', 'bailar-y-llorar'),
        'priority' => 30,
    ));
    
    // Hero title
    $wp_customize->add_setting('bailar_hero_title', array(
        'default'           => 'bailar y llorar',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('bailar_hero_title', array(
        'label'   => __('Título del Hero', 'bailar-y-llorar'),
        'section' => 'bailar_hero_section',
        'type'    => 'text',
    ));
    
    // Hero description
    $wp_customize->add_setting('bailar_hero_description', array(
        'default'           => 'un espacio para reflexionar sobre la vida, compartir historias y conectar con nuestras emociones más profundas',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('bailar_hero_description', array(
        'label'   => __('Descripción del Hero', 'bailar-y-llorar'),
        'section' => 'bailar_hero_section',
        'type'    => 'textarea',
    ));
    
    // Hero background image
    $wp_customize->add_setting('bailar_hero_background', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bailar_hero_background', array(
        'label'   => __('Imagen de fondo del Hero', 'bailar-y-llorar'),
        'section' => 'bailar_hero_section',
    )));
}
add_action('customize_register', 'bailar_y_llorar_customize_register');

/**
 * Get hero background image
 */
function bailar_y_llorar_get_hero_bg() {
    $custom_bg = get_theme_mod('bailar_hero_background');
    if ($custom_bg) {
        return esc_url($custom_bg);
    }
    return get_template_directory_uri() . '/assets/header-2x.png';
}

/**
 * Navigation menu walker for mobile menu
 */
class Bailar_Mobile_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= '<li' . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}