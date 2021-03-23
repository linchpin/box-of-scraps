<?php
/**
 * Catch All Template
 *
 * Catch all template file within the Template Hierarchy.
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

	<?php if ( have_posts() ) : ?>
		<?php
        /** This action is documented in includes/Linchpin/truss-hooks.php */
        do_action( 'truss_loop_before' );
        ?>

        <div>
            <?php while ( have_posts() ) : the_post(); ?>
                <div>
                	<?php the_title( '<h3>', '</h3>' ); ?>
                	<?php the_excerpt(); ?>
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

    <?php get_template_part( 'partials/pagination' ); ?>

    <?php
    /** This action is documented in includes/Linchpin/truss-hooks.php */
    do_action( 'truss_content_after' );
    ?>

<?php get_footer();