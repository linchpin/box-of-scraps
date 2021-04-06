<?php
/**
 * Single Post Template.
 *
 * @since      1.0.0
 */
?>

<?php get_header(); ?>

<?php
do_action('boxofscraps_content_before');
?>

<div class="container py-4">
	<?php if (have_posts()) { ?>
		<?php
        do_action('boxofscraps_loop_before');
        ?>

		<div class="columns">
			<?php while (have_posts()) {
            the_post(); ?>
				<div class="column">
					<div class="post-heading mb-4">
						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
						<?php the_date(); ?>
					</div>

					<?php the_content(); ?>
				</div>
			<?php
        } ?>
		</div>

		<?php
        do_action('boxofscraps_loop_after');
        ?>

		<?php
        // If comments are open or there is at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>

	<?php } else { ?>
		<?php get_template_part('content', 'none'); ?>
	<?php } ?>
</div>

<?php
do_action('boxofscraps_content_after');
?>

<?php
get_footer();
