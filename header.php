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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rebalance' ); ?></a>

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

	<div id="swup" class="site-content transition-fade">
		<?php if ( is_page( array('Breathe', 'Move') ) || is_archive() || is_singular( 'exercises' ) ) : ?>
			<a class="back-button" href="javascript:history.back()"><?php get_template_part('inc/inline', 'back-arrow.svg'); ?> Back</a>
		<?php endif; ?>
		
