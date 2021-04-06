<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BoxOfScraps\Utility;

/**
 * Get asset info from extracted asset files.
 *
 * @param string $slug      asset slug as defined in build/webpack configuration
 * @param string $attribute Optional attribute to get. Can be version or dependencies.
 *
 * @return array|string
 */
function get_asset_info(string $slug, $attribute = null)
{
    if (!file_exists(BOX_OF_SCRAPS_PATH.'dist/'.$slug.'.asset.php')) {
        return null;
    }

    $asset = require BOX_OF_SCRAPS_PATH.'dist/'.$slug.'.asset.php';

    if (!empty($attribute) && isset($asset[$attribute])) {
        return $asset[$attribute];
    }

    return $asset;
}

/**
 * Gets the SVG code for a given icon.
 *
 * @param string $group the icon group
 * @param string $icon  the icon
 * @param int    $size  the icon size in pixels
 *
 * @since BoxOfScraps 1.0
 */
function get_icon_svg(string $group, $icon, $size = 24): string
{
    return \BoxOfScraps\SVG_Icons::get_svg($group, $icon, $size);
}
