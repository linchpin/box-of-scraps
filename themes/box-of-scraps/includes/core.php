<?php
/**
 * Fluval
 *
 * @author  Linchpin
 * @package BoxOfScraps
 */

namespace BoxOfScraps\Core;

use BoxOfScraps\Utility;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n(  'register_menus' ) );

	add_action( 'after_setup_theme', $n( 'i18n' ) );
	add_action( 'after_setup_theme', $n( 'theme_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'admin_enqueue_scripts', $n( 'admin_styles' ) );
	add_action( 'admin_enqueue_scripts', $n( 'admin_scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
	add_action( 'wp_head', $n( 'js_detection' ), 0 );
	add_action( 'wp_head', $n( 'add_manifest' ), 10 );

	add_filter( 'script_loader_tag', $n( 'script_loader_tag' ), 10, 2 );
}

/**
 * Register theme menus
 */
function register_menus() {
	register_nav_menus( [
		'primary_menu' => esc_html__( 'Primary Menu', 'fluval' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'fluval' ),
		'social_menu' => esc_html__( 'Social Menu', 'fluval' ),
	] );
}


/**
 * Makes Theme available for translation.
 *
 * Translations can be added to the /languages directory.
 * If you're building a theme based on "BoxOfScraps", change the
 * filename of '/languages/BoxOfScraps.pot' to the name of your project.
 *
 * @return void
 */
function i18n() {
	load_theme_textdomain( 'box-of-scraps', BOX_OF_SCRAPS_PATH . '/languages' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function theme_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
		)
	);

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'box-of-scraps' ),
		)
	);
}

/**
 * Enqueue scripts for front-end.
 *
 * @return void
 */
function scripts() {

	wp_enqueue_script( 'box-of-scraps-js', get_stylesheet_directory_uri() . '/js/box-of-scraps.js', [ 'jquery' ], BOX_OF_SCRAPS_VERSION, true );

	wp_enqueue_script(
		'frontend',
		BOX_OF_SCRAPS_URL . '/dist/js/frontend.js',
		Utility\get_asset_info( 'frontend', 'dependencies' ),
		Utility\get_asset_info( 'frontend', 'version' ),
		true
	);

	if ( is_page_template( 'templates/page-kitchensink.php' ) ) {
		wp_enqueue_script(
			'styleguide',
			BOX_OF_SCRAPS_URL . '/dist/js/kitchensink.js',
			Utility\get_asset_info( 'styleguide', 'dependencies' ),
			Utility\get_asset_info( 'styleguide', 'version' ),
			true
		);
	}

	/*
	wp_enqueue_script(
		'shared',
		BOX_OF_SCRAPS_URL . '/dist/js/shared.js',
		Utility\get_asset_info( 'shared', 'dependencies' ),
		Utility\get_asset_info( 'shared', 'version' ),
		true
	);
	*/
}

/**
 * Enqueue scripts for admin
 *
 * @return void
 */
function admin_scripts() {
	wp_enqueue_script(
		'admin',
		BOX_OF_SCRAPS_URL . '/dist/js/admin.js',
		Utility\get_asset_info( 'admin', 'dependencies' ),
		Utility\get_asset_info( 'admin', 'version' ),
		true
	);

	/*
	wp_enqueue_script(
		'shared',
		BOX_OF_SCRAPS_URL . '/dist/js/shared.js',
		Utility\get_asset_info( 'shared', 'dependencies' ),
		Utility\get_asset_info( 'shared', 'version' ),
		true
	);
	*/
}

/**
 * Enqueue styles for admin
 *
 * @return void
 */
function admin_styles() {

	wp_enqueue_style(
		'admin-style',
		BOX_OF_SCRAPS_URL . '/dist/css/admin-style.css',
		[],
		Utility\get_asset_info( 'admin-style', 'version' )
	);

	/*
	wp_enqueue_style(
		'shared-style',
		BOX_OF_SCRAPS_URL . '/dist/css/shared-style.css',
		[],
		Utility\get_asset_info( 'shared-style', 'version' )
	);
	*/
}

/**
 * Enqueue styles for front-end.
 *
 * @return void
 */
function styles() {

	wp_enqueue_style( 'box-of-scraaps-css', get_stylesheet_directory_uri() . '/css/box-of-scraps.css', [], BOX_OF_SCRAPS_VERSION );

	wp_enqueue_style(
		'styles',
		BOX_OF_SCRAPS_URL . '/dist/css/style.css',
		[],
		Utility\get_asset_info( 'style', 'version' )
	);

	if ( is_page_template( 'templates/page-kitchensink.php' ) ) {
		wp_enqueue_style(
			'styleguide',
			BOX_OF_SCRAPS_URL . '/dist/css/kitchensink-style.css',
			[],
			Utility\get_asset_info( 'kitchensink-style', 'version' )
		);
	}
}

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @return void
 */
function js_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

/**
 * Add async/defer attributes to enqueued scripts that have the specified script_execution flag.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string
 */
function script_loader_tag( $tag, $handle ) {
	$script_execution = wp_scripts()->get_data( $handle, 'script_execution' );

	if ( ! $script_execution ) {
		return $tag;
	}

	if ( 'async' !== $script_execution && 'defer' !== $script_execution ) {
		return $tag;
	}

	// Abort adding async/defer for scripts that have this script as a dependency. _doing_it_wrong()?
	foreach ( wp_scripts()->registered as $script ) {
		if ( in_array( $handle, $script->deps, true ) ) {
			return $tag;
		}
	}

	// Add the attribute if it hasn't already been added.
	if ( ! preg_match( ":\s$script_execution(=|>|\s):", $tag ) ) {
		$tag = preg_replace( ':(?=></script>):', " $script_execution", $tag, 1 );
	}

	return $tag;
}

/**
 * Appends a link tag used to add a manifest.json to the head
 *
 * @return void
 */
function add_manifest() {
	echo "<link rel='manifest' href='" . esc_url( BOX_OF_SCRAPS_URL . '/manifest.json' ) . "' />";
}
