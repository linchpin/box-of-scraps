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
do_action( 'boxofscraps_content_before' );
?>

<div class="container py-4">
	<?php if ( have_posts() ) : ?>
		<?php
		do_action( 'boxofscraps_loop_before' );
		?>

		<div class="columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="column">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		</div>

		<?php
		do_action( 'boxofscraps_loop_after' );
		?>

	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</div>

<?php
do_action( 'boxofscraps_content_after' );
?>

<?php
get_footer();
