<?php
/**
 * Header Template.
 *
 * @since      1.0.0
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

<?php do_action('wp_body_open'); ?>

<div class="off-canvas-wrapper">
	<div class="inner-wrap off-canvas-content" data-off-canvas-content>

		<?php
        do_action('boxofscraps_layout_start');
        ?>

		<?php
        do_action('boxofscraps_header_before');
        ?>

		<?php get_template_part('partials/navigation'); ?>

		<?php
        do_action('boxofscraps_header_after');
        ?>

		<section role="document" class="clear">
