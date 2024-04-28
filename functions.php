<?php

/**
 * wp-theme-kaya functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp-theme-kaya
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_theme_kaya_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wp-theme-kaya, use a find and replace
		* to change 'wp-theme-kaya' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('wp-theme-kaya', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__('Primary Menu', 'wp-theme-kaya'),
			'footer-col-1' => __('Footer Column 1', 'wp-theme-kaya'),
			'footer-col-2' => __('Footer Column 2', 'wp-theme-kaya'),
			'footer-col-3' => __('Footer Column 3', 'wp-theme-kaya'),
			'footer-col-4' => __('Footer Column 4', 'wp-theme-kaya')

		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wp_theme_kaya_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'wp_theme_kaya_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_theme_kaya_content_width()
{
	$GLOBALS['content_width'] = apply_filters('wp_theme_kaya_content_width', 640);
}
add_action('after_setup_theme', 'wp_theme_kaya_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_theme_kaya_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'wp-theme-kaya'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'wp-theme-kaya'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'wp_theme_kaya_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wp_theme_kaya_scripts()
{
	wp_enqueue_style('wp-theme-kaya-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('wp-theme-kaya-style', 'rtl', 'replace');

	wp_enqueue_script('wp-theme-kaya-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'wp_theme_kaya_scripts');

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**  
 * 
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function cc_fix_svg_mime_type($data, $file, $filename, $mimes)
{
	$filetype = wp_check_filetype($filename, $mimes);
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}
add_filter('wp_check_filetype_and_ext', 'cc_fix_svg_mime_type', 10, 4);

function theme_enqueue_styles()
{
	// Enqueue Bootstrap CSS
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.2', 'all');

	// Enqueue Font Awesome
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0-beta3', 'all');

	// Enqueue Tiny Slider CSS
	wp_enqueue_style('tiny-slider', get_template_directory_uri() . '/css/tiny-slider.css', array(), '2.9.3', 'all');

	// Enqueue Main Style CSS
	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



function theme_enqueue_scripts()
{
	wp_enqueue_script('jquery');

	// Enqueue Bootstrap Bundle JS
	wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '4.5.2', true);

	// Enqueue Tiny Slider JS
	wp_enqueue_script('tiny-slider', get_template_directory_uri() . '/js/tiny-slider.js', array('jquery'), '2.9.3', true);

	// Enqueue Custom JS
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery', 'tiny-slider'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
