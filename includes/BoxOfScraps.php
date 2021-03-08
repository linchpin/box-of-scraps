<?php
/**
 * Box of Scraps
 *
 * @author  Linchpin
 * @package BoxOfScraps
 */

/**
 * Class BoxOfScraps
 */
class BoxOfScraps {

	/**
	 * Apple favicon sizes.
	 *
	 * @var array
	 */
	public $apple_favicon_sizes = [ 57, 60, 72, 76, 114, 120, 144, 152, 180 ];

	/**
	 * Generic favicon sizes.
	 *
	 * @var array
	 */
	public $favicon_sizes = [ 16, 32, 96, 192 ];

	/**
	 * __construct function.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'register_menus' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'wp_enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'wp_enqueue_styles' ] );
	}

	/**
	 * Register theme menus
	 */
	public function register_menus() {
		register_nav_menus( [
			'primary_menu' => __( 'Primary Menu', 'boxofscraps' ),
		] );
	}

	/**
	 * Add wp_enqueue_scripts.
	 *
	 * @access public
	 * @return void
	 */
	public function wp_enqueue_scripts() {
		wp_enqueue_script( 'boxofscraps-js', get_stylesheet_directory_uri() . '/js/boxofscraps.js', array( 'jquery' ), BOS_VERSION, true );
	}

	/**
	 * Enqueue our theme styles.
	 *
	 * @access public
	 * @return void
	 */
	public function wp_enqueue_styles() {
		wp_enqueue_style('boxofscraps-css', get_stylesheet_directory_uri() . '/css/boxofscraps.css', array(), BOS_VERSION );
	}
}