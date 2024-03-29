<?php
/**
 * Include all of our needed Classes and scripts
 */

// Useful global constants
define( 'BOX_OF_SCRAPS_VERSION', '1.5.0' );
define( 'BOX_OF_SCRAPS_FILE', get_stylesheet() );
define( 'BOX_OF_SCRAPS_NAME', esc_html__( 'Box of Scraps', 'box-of-scraps' ) );
define( 'BOX_OF_SCRAPS_URL', get_stylesheet_directory_uri() );
define( 'BOX_OF_SCRAPS_PATH', get_stylesheet_directory() );
define( 'BOX_OF_SCRAPS_INC', BOX_OF_SCRAPS_PATH . '/includes/' );
define( 'BOX_OF_SCRAPS_BLOCK_PATH', BOX_OF_SCRAPS_INC . 'blocks/' );
define( 'BOX_OF_SCRAPS_DEBUG', false );

if ( ! defined( 'SCRIPT_DEBUG' ) ) {
	define( 'SCRIPT_DEBUG', true ); // Enable script debug by default. Should be disabled in production.
}

require_once BOX_OF_SCRAPS_INC . 'core.php';
require_once BOX_OF_SCRAPS_INC . 'utilities.php';
require_once BOX_OF_SCRAPS_INC . 'classes/Bulma_Walker_Nav_Menu.php'; // Custom Walker.

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Kick everything off when plugins are loaded.
try {
	BoxOfScraps\Core\setup();
} catch ( Exception $e ) {
	wp_die( esc_html( $e->getMessage() ) );
}
