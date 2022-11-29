<?php
/**
 * Theme setup.
 *
 * @package Custom Theme
 */

namespace CustomTheme;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'custom-theme', get_theme_file_uri( '/build/custom.pot' ) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
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
	set_post_thumbnail_size( 1000, 9999 );

	/**
	 * Register navigation menus.
	 */
	register_nav_menus(
		[
			'primary' => esc_html__( 'Primary', 'custom-theme' ),
		]
	);

	/*
	 * Switch default core markup to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		[
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		]
	);

	// Add support for extra block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add editor styles support.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'build/index.css' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widgets_init() {

	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'custom-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'custom-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}
add_action( 'widgets_init', __NAMESPACE__ . '\widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	// Register styles & scripts.
	wp_enqueue_style( 'custom-theme-style', get_theme_file_uri( '/build/index.css' ), [], $theme_version );
	wp_enqueue_script( 'custom-theme-scripts', get_theme_file_uri( '/build/index.js' ), [], $theme_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\scripts' );

/**
 * Only load block styles when they're rendered.
 */
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

/**
 * Remove generator meta tags.
 *
 * @link https://developer.wordpress.org/reference/functions/the_generator/
 */
add_filter( 'the_generator', '__return_false' );

/**
 * Disable XML RPC.
 *
 * @link https://developer.wordpress.org/reference/hooks/xmlrpc_enabled/
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Change REST-API header from "null" to "*".
 *
 * @link https://w3c.github.io/webappsec-cors-for-developers/#avoid-returning-access-control-allow-origin-null
 */
function cors_control() {
	header( 'Access-Control-Allow-Origin: *' );
}
add_action( 'rest_api_init', __NAMESPACE__ . '\cors_control' );
