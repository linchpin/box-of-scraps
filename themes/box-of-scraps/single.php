<?php
/**
 * Page Template
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

		<div class="columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="column">
					<div class="post-heading mb-4">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php the_date(); ?>
					</div>

					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		</div>

		<?php
		/** This action is documented in includes/Linchpin/truss-hooks.php */
		do_action( 'truss_loop_after' );
		?>

		<?php
		// If comments are open or there is at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>

	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</div>

<?php
/** This action is documented in includes/Linchpin/truss-hooks.php */
do_action( 'truss_content_after' );
?>

<?php get_footer();
