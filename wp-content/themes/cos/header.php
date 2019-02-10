<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Changover_Sales
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
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cos' ); ?></a>

<header id="masthead" class="site-header">
	<a href="#content" class="logo"><h1 class="skip-link"><?php bloginfo( 'name' ); ?></h1></a>
	<button class="menu-toggle no-button-style" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'cos' ); ?></button>

	<nav id="site-navigation" class="site-nav">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
			'container'	=> '',
		) );
		?>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->

<main id="content" class="site-content container">
