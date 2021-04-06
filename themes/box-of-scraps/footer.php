	</section>

	<footer class="footer">
		<div class="container">
			<?php
			wp_nav_menu( [
				'theme_location'  => 'social_menu',
				'container_class' => 'navbar-menu',
				'menu_class'      => 'navbar-start',
				'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',
				'walker'          => new \BoxOfScraps\Bulma_Walker_Nav_Menu(),
			] );
			?>

			<?php
			wp_nav_menu( [
				'theme_location'  => 'footer_menu',
				'container_class' => 'navbar-menu',
				'menu_class'      => 'navbar-start',
				'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',
				'walker'          => new \BoxOfScraps\Bulma_Walker_Nav_Menu(),
			] );
			?>
		</div>
	</footer>

	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
