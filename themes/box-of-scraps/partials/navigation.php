<?php
/**
 * Navigation Template.
 *
 * @since      1.0.0
 */
?>

<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?php echo esc_url(site_url()); ?>">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri().'/images/linchpin-logo.png'); ?>" />
            </a>

            <?php get_template_part('partials', 'hamburger', ['target' => 'navbarMobile']); ?>
        </div>

        <?php
        wp_nav_menu([
            'theme_location' => 'primary_menu',
            'container_class' => 'navbar-menu',
            'menu_class' => 'navbar-end',
            'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
            'walker' => new BoxOfScraps\Bulma_Walker_Nav_Menu(),
        ]);
        ?>
    </div>
</nav>
