<?php
/**
 * Utility functions for the theme.
 *
 * This file is for custom helper functions.
 * These should not be confused with WordPress template
 * tags. Template tags typically use prefixing, as opposed
 * to Namespaces.
 *
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 * @package BoxOfScraps
 */

namespace BoxOfScraps\Utility;

/**
 * Get asset info from extracted asset files
 *
 * @param string $slug      Asset slug as defined in build/webpack configuration.
 * @param string $attribute Optional attribute to get. Can be version or dependencies.
 *
 * @return string|array
 */
function get_asset_info( string $slug, $attribute = null ) {
	if ( ! file_exists( BOX_OF_SCRAPS_PATH . 'dist/' . $slug . '.asset.php' ) ) {
		return null;
	}

	$asset = require BOX_OF_SCRAPS_PATH . 'dist/' . $slug . '.asset.php';

	if ( ! empty( $attribute ) && isset( $asset[ $attribute ] ) ) {
		return $asset[ $attribute ];
	}

	return $asset;
}

/**
 * Gets the SVG code for a given icon.
 *
 * @param string $group The icon group.
 * @param string $icon  The icon.
 * @param int    $size  The icon size in pixels.
 *
 * @return string
 * @since BoxOfScraps 1.0
 */
function get_icon_svg( string $group, $icon, $size = 24 ): string {
	return \BoxOfScraps\SVG_Icons::get_svg( $group, $icon, $size );
}
