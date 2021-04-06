<?php
/**
 * Template partial for displaying content from the loop
 */
?>
<div class="loop-post">
	<?php the_title( '<h3><a href="' . get_the_permalink() . '">', '</a></h3>' ); ?>
	<?php echo get_the_date(); ?>
	<?php the_excerpt(); ?>
</div>
