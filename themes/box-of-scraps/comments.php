<?php
/**
 * The template for displaying comments
 *
 * @since      1.0.0
 *
 * @package    BoxOfScraps
 * @subpackage Templates
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$comment_count = get_comments_number();
?>

<div id="comments" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">
	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php if ( '1' === $comment_count ) : ?>
				<?php esc_html_e( '1 comment', 'box-of-scraps' ); ?>
			<?php else : ?>
				<?php
				printf(
				/* translators: %s: comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $comment_count, 'Comments title', 'box-of-scraps' ) ),
					esc_html( number_format_i18n( $comment_count ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'before_page_number' => esc_html__( 'Page', 'box-of-scraps' ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? BoxOfScraps\Utility\get_icon_svg( 'ui', 'arrow_right' ) : BoxOfScraps\Utility\get_icon_svg( 'ui', 'arrow_left' ),
					esc_html__( 'Older comments', 'box-of-scraps' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					esc_html__( 'Newer comments', 'box-of-scraps' ),
					is_rtl() ? BoxOfScraps\Utility\get_icon_svg( 'ui', 'arrow_left' ) : BoxOfScraps\Utility\get_icon_svg( 'ui', 'arrow_right' )
				),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'box-of-scraps' ); ?></p>
	<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		[
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Leave a comment', 'box-of-scraps' ),
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h4>',
			'comment_field'      => '<div class="field"><label class="label">Comment</label><div class="control"><textarea id="comment" class="textarea" name="comment" aria-required="true"></textarea></div></div>',
		]
	);
	?>
</div>
