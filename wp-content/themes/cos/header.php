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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-38353868-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-38353868-2');
    </script>
</head>

<body <?php body_class(); ?>>

<header id="masthead" class="site-header">
	<div class="container-site">
		<a href="#content" class="logo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/Changeover-Sales-logo.png" alt="Changeover Sales Logo">
			<h1 class="skip-link"><?php bloginfo( 'name' ); ?></h1>
		</a>

		<button class="menu-toggle no-button-style" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'cos' ); ?></button>

		<nav id="site-navigation" class="site-nav">
            <ul id="primary-menu" class="menu">

    			<?php
        			wp_nav_menu( array(
        				'theme_location' => 'menu-1',
        				'menu_id'        => 'primary-menu',
        				'container'	=> '',
                        'items_wrap' => '%3$s'
        			) );
    			?>

                <li class="site-cart-container menu-item">
                    <a class="site-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                        <span class="cart-count"><?php echo is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''; ?></span>

                        <svg>
                            <use xlink:href="#icon-shopping-bag"></use>
                        </svg>
                    </a>
                </li>
            </ul>
		</nav><!-- #site-navigation -->
	</div>
</header><!-- #masthead -->

<main id="content" class="site-content container">
