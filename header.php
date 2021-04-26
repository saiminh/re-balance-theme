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
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ff9b7a">
	<meta name="msapplication-TileColor" content="#ff9b7a">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'rebalance' ); ?> >
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rebalance' ); ?></a>
	<?php //Load Headers
    if ( rebalance_member_is_logged_in() ) :
      get_template_part( 'template-parts/header', 'loggedin' ); 
    else : 
      get_template_part( 'template-parts/header', 'loggedout' );
    endif; 
  ?>
	<div class="loading-animation">
		<div class="loader">
			<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
				<circle cx="50" cy="50" r="45" fill="none" stroke="#ff9b7a" stroke-width="6" />
			</svg>
		</div>
	</div>			
	<div id="swup" class="site-content transition">	
