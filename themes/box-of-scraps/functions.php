<?php
/**
 *
 * Include all of our needed Classes and scripts
 */

// Useful global constants
define( 'BOS_VERSION', '1.0.0' );
// define( 'BOS_TYPEKIT', 'csi6jve' ); // Define if we are using typekit, this determines if typekit is used in the editor

if ( ! defined( 'SCRIPT_DEBUG' ) ) {
	define( 'SCRIPT_DEBUG', true ); // Enable script debug by default. Should be disabled in production
}

require_once 'includes/BoxOfScraps.php';
require_once 'includes/Linchpin/BOS_Walker_Nav_Menu.php';
require_once 'includes/Linchpin/Utilities.php';

/**
 * Instantiate our classes, kick the theme in gear.
 */
$theme = new BoxOfScraps();