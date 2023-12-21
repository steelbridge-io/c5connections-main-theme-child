<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package c5connections_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#primary"><?php esc_html_e( 'Skip to content',
			'c5connections-theme' ); ?></a>

    <header id="masthead" class="site-header container">
        <div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
                <h1 class="site-title"><a
                            href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			else :
				?>
                <h1 class="site-title"><a
                            href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			endif;
			$c5connections_theme_description = get_bloginfo( 'description',
				'display' );
			if ( $c5connections_theme_description || is_customize_preview() ) :
				?>
                <p class="site-description"><?php echo $c5connections_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?></p>
			<?php endif; ?>
        </div><!-- .site-branding -->
		
		<?php if ( is_user_logged_in() ) : ?>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e( 'Primary Menu',
						'c5connections-theme' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
				<?php if ( is_user_logged_in() ): ?>
                    <a href="<?php echo wp_logout_url(); ?>" class="log-out">Logout</a>
				<?php endif; ?>
            </nav><!-- #site-navigation -->
			
			<?php if ( has_nav_menu( 'menu-2' ) ) : ?>

                <div id="class-nav" class="container">

                    <div class="well">

                        <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggle"
                                    aria-controls="class-menu"
                                    aria-expanded="false"><?php esc_html_e( 'Class Menu',
									'c5connections-theme' ); ?></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-2',
									'menu_id'        => 'class-menu',
								)
							);
							?>
                        </nav><!-- #site-navigation -->

                    </div>

                </div>
			<?php endif;
		
		endif;
		
		if ( is_front_page() ) : ?>

            <div id="user-class-nav" class="container">

                <div class="well">

                    <nav id="site-navigation" class="main-navigation">
                        <ul>
							<?php get_user_sites_menu(); ?>
                        </ul>
                    </nav>

                </div>

            </div>
		<?php endif; ?>

    </header><!-- #masthead -->
