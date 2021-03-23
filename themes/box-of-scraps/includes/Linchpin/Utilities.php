<?php
/**
 * Box Of Scraps Utilities
 * 
 * @author Linchpin
 * @package BoxOfScraps
 */

function linchpin_hamburger ( $target = '' ) {
	$output = '';

	ob_start();
	?>
	<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="<?php echo esc_attr( $target ); ?>">
		<span aria-hidden="true"></span>
		<span aria-hidden="true"></span>
		<span aria-hidden="true"></span>
	</a>
	<?php

	$output = ob_get_contents();
	ob_end_clean();

	echo $output;
}