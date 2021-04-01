<?php
/**
 * Archive Template
 *
 * @since      1.0.0
 *
 * @package    BoxOfScraps
 * @subpackage Templates
 */

?>

<?php get_header(); ?>

<?php
/** This action is documented in includes/Linchpin/truss-hooks.php */
do_action( 'truss_content_before' );
?>

	<div class="container py-4">
		<?php if ( have_posts() ) : ?>
			<?php
			/** This action is documented in includes/Linchpin/truss-hooks.php */
			do_action( 'truss_loop_before' );
			?>

			<div class="columns is-multiline">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="column is-one-quarter">
						<?php get_template_part( 'partials/loop' ); ?>
					</div>
				<?php endwhile; ?>
			</div>

			<?php
			/** This action is documented in includes/Linchpin/truss-hooks.php */
			do_action( 'truss_loop_after' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>

<?php get_template_part( 'partials/pagination' ); ?>

<?php
/** This action is documented in includes/Linchpin/truss-hooks.php */
do_action( 'truss_content_after' );
?>

<?php get_footer();
