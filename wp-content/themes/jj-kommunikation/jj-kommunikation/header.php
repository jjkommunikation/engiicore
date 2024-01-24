<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JJ_Kommunikation
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
<!-- Fathom - beautiful, simple website analytics -->
                <script src="https://cdn.usefathom.com/script.js" data-site="VQRBVQZN" defer></script>
              <!-- / Fathom -->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'jj-kommunikation' ); ?></a>


	<header id="masthead" class="site-header">
	<div>
		<div class="site-branding">
			<?php the_custom_logo(); ?>


		</div><!-- .site-branding -->
			<nav id="site-navigation" class="header-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				
				?>

			</nav><!-- #site-navigation -->

	
	
		<div class="nav-lang-cta">
			<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'secondary-menu',
							)
						);
			?>


		</div><!-- .site-lang -->
						<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button> -->

	</div>
		




	</header><!-- #masthead -->
