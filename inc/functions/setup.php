<?php
/**
 * kiyoshi functions and definitions.
 *
 * @package kiyoshi
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kiyoshi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kiyoshi_content_width', 1170 );
}

/**
 * Assign the kiyoshi version to a var
 */
$theme = wp_get_theme( 'kiyoshi' );
$kiyoshi_version = $theme['Version'];

if ( ! function_exists( 'kiyoshi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kiyoshi_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kiyoshi, use a find and replace
	 * to change 'kiyoshi' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kiyoshi', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'kiyoshi_thumb_large', 860 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu - maximal 3 levels', 'kiyoshi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kiyoshi_custom_background_args', array(
		'default-color' => '111111',
		'default-image' => '',
	) ) );

	/*
	 * Enable support for Site Logo
	 * See http://jetpack.me/support/site-logo/
	 */
	add_theme_support( 'site-logo' );

}
endif; // kiyoshi_setup
add_action( 'after_setup_theme', 'kiyoshi_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kiyoshi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'kiyoshi' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

/**
 * Enqueue scripts and styles.
 * @since  1.0.0
 */
function kiyoshi_scripts() {
	global $kiyoshi_version;
	global $post;

	wp_enqueue_style( 'kiyoshi-fonts', kiyoshi_fonts_url(), array(), null );
	wp_enqueue_style( 'kiyoshi-style', get_stylesheet_uri(), array(), $kiyoshi_version );
	
	wp_enqueue_script( 'kiyoshi-lightbox', get_template_directory_uri() . '/assets/js/imagelightbox.min.js', array( 'jquery' ), $kiyoshi_version, true );
	wp_enqueue_script( 'kiyoshi-scripts', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $kiyoshi_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( ( is_singular() ) && ( get_post_gallery($post->ID) ) ) {
		wp_enqueue_script( 'kiyoshi-gallery', get_template_directory_uri() . '/assets/js/gallery.js', array( 'jquery', 'masonry' ), $kiyoshi_version, true );
	}
}
