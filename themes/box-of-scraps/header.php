<?php
/**
 * Header Template
 *
 * @since      1.0.0
 *
 * @package    BoxOfScraps
 * @subpackage TemplateParts
 */
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="body-overlay"></div>

<?php do_action( 'wp_body_open' ); ?>

<div class="off-canvas-wrapper">
	<div class="inner-wrap off-canvas-content" data-off-canvas-content>

		<?php
		/** This action is documented in includes/Linchpin/utilities/hooks.php */
		do_action( 'truss_layout_start' );
		?>

		<?php
		/** This action is documented in includes/Linchpin/utilities/hooks.php */
		do_action( 'truss_header_before' );
		?>

		<?php get_template_part( 'partials/navigation' ); ?>

		<?php
		/** This action is documented in includes/Linchpin/utilities/hooks.php */
		do_action( 'truss_header_after' );
		?>

		<section role="document">