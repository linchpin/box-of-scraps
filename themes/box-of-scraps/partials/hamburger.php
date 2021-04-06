<?php
/**
 * Template for displaying the hamburger menu icon
 */

// Set defaults.
$args = wp_parse_args( $args, [
    'target' => '',
] );

?>
<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="<?php echo esc_attr( $args['target'] ); ?>">
    <span aria-hidden="true"></span>
    <span aria-hidden="true"></span>
    <span aria-hidden="true"></span>
</a>