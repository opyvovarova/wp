<?php
/**
 * artcraft functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package artcraft
 */

if ( ! function_exists( 'artcraft_setup' ) ) :
function artcraft_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'artcraft' ),
	) );
	// Switch default core markup for search form, comment form, and comments
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'artcraft_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
//function artcraft_widgets_init() {
//	register_sidebar( array(
//		'name'          => esc_html__( 'Sidebar', 'artcraft' ),
//		'id'            => 'artcraft-sidebar',
//		'description'   => esc_html__( 'Add widgets here.', 'artcraft' ),
//		'before_widget' => '<section id="%1$s" class="widget %2$s">',
//		'after_widget'  => '</section>',
//		'before_title'  => '<h2 class="widget-title">',
//		'after_title'   => '</h2>',
//	) );
//}
//add_action( 'widgets_init', 'artcraft_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function artcraft_scripts() {
    /*
     * Подключаем стили:
     * Аргументы:
     * 1) название стиля (может быть любым)
     * 2) путь к файлу
     */
    // для локальных стилей
	wp_enqueue_style( 'artcraft-style', get_stylesheet_uri() . '/css/style.css' );
    // для внешних стилей
	//wp_enqueue_style( 'artcraft-style', 'http://domain.com/style.css' );
    /*
     * Подключаем скрипты:
     * Аргументы:
     * 1) название скрипта (может быть любым)
     * 2) путь к файлу
     * 3) после каких скриптов подгружать (лучше указать пустой массив
     * 4) версия (оставляем пустые кавычки)
     * 5) подключение в футере (true = да, false = нет)
     */
	wp_enqueue_script( 'artcraft-script', get_template_directory_uri() . '/js/script.js', [], '', true );
    /*
     * Добавляем возможность отправлять AJAX-запросы к скриптам
     * Аргументы:
     * 1) название скрипта, в котором будем писать ajax
     * 2) название объекта, к которому будем обращаться в файле скрипта
     * 3) элементы объекта, которые нам нужны (путь к обработчику аякса, путь к папке темы)
     */
    wp_localize_script( 'artcraft-script', 'myajax',
        [
            'url' => admin_url( 'admin-ajax.php' ),
            'template' => get_template_directory_uri()
        ]
    );
}
add_action( 'wp_enqueue_scripts', 'artcraft_scripts' );

/**
 * Load custom functions
 */
require get_template_directory() . '/includes/custom-functions.php';
