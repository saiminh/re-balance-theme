<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rebalance
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rebalance' ); ?></a>

	<?php if ( SwpmMemberUtils::is_member_logged_in()) : ?>
	
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php get_template_part('inc/inline', 'rebalance-logo.svg'); ?>
				</a>
			</div><!-- .site-branding -->
			
			

			<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">

			<div class="navTrigger">
			<i></i><i></i><i></i>
			<span class="menu-name">Menu</span>
			</div>

			</button>
				
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->		
		</header><!-- #masthead -->
		<a class="back-button" href="javascript:history.back()"><?php get_template_part('inc/inline', 'back-arrow.svg'); ?></a>
	<?php else : ?>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php get_template_part('inc/inline', 'rebalance-logo.svg'); ?>
				</a>
			</div><!-- .site-branding -->
			
			

			<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">

			<div class="navTrigger">
			<i></i><i></i><i></i>
			<span class="menu-name">Menu</span>
			</div>

			</button>
				
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'nonuser-menu',
				) );
				?>
			</nav><!-- #site-navigation -->		
		</header><!-- #masthead -->

	<?php endif; ?>

	<div class="loading-animation"><div class="loader"></div></div>			
	<div id="swup" class="site-content transition">		
		
