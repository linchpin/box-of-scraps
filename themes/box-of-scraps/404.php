<?php
/**
 * 404 Template
 *
 * Basic template when a 404 happens.
 *
 * @since      1.0.6
 *
 * @package    BoxOfScraps
 * @subpackage Templates
 */

?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div class="grid-container">
			<div class="grid-x">
				<main id="main" class="site-main small-12 large-8 cell" role="main">

					<?php
					/** This action is documented in includes/Linchpin/utilities/hooks.php */
					do_action( 'boxofscraps_post_entry_content_before' );
					?>

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page cannot be found.', 'box-of-scraps' ); ?></h1>
						</header>

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'box-of-scraps' ); ?></p>

							<?php get_search_form(); ?>

							<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

							<?php if ( function_exists( 'boxofscraps_categorized_blog' ) ) : ?>

								<?php
								if ( boxofscraps_categorized_blog() ) : // Only show the widget if site has multiple categories.
									?>
									<div class="widget widget_categories">
										<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'box-of-scraps' ); ?></h2>
										<ul>
											<?php
											wp_list_categories(
												[
													'orderby'    => 'count',
													'order'      => 'DESC',
													'show_count' => 1,
													'title_li'   => '',
													'number'     => 10,
												]
											);
											?>
										</ul>
									</div>
								<?php endif; ?>
							<?php endif; ?>

							<div class="entry-content">

								<?php
								do_action( 'boxofscraps_content_before' );
								?>

								<div class="error">
									<p class="bottom"><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'box-of-scraps' ); ?></p>
								</div>
								<p><?php esc_html_e( 'Please try the following:', 'box-of-scraps' ); ?></p>
								<ul>
									<li><?php esc_html_e( 'Check your spelling', 'box-of-scraps' ); ?></li>
									<li>
										<?php
										printf(
											wp_kses(
												// Translators: 1. home url.
												__( 'Return to the <a href="%s">home page</a>', 'box-of-scraps' ),
												array(
													'a' => array( 'href' ),
												)
											),
											esc_url( home_url() )
										);
										?>
									</li>
									<li>
										<?php
										printf(
											wp_kses(
												// Translators: 1. History Back Link.
												__( 'Click the <a href="%s">Back</a> button', 'box-of-scraps' ),
												array(
													'a' => array( 'href' ),
												)
											),
											esc_attr( 'javascript:history.back();' )
										);
										?>
									</li>
								</ul>
							</div>

							<?php
							do_action( 'boxofscraps_content_after' );
							?>

						</div>
					</section>
					<?php
					do_action( 'boxofscraps_post_entry_content_after' );
					?>
				</main>
			</div>
		</div>
	</div>
<?php
get_footer();
