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
	<?php if ( rebalance_member_is_logged_in() ) : ?>
		<header id="masthead" class="site-header">
			<div class="site-header-inner">
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
					<!-- <div class="menu-movebreathe-container">
						<ul id="movebreathe-menu" class="menu nav-menu">
							<li id="menu-item-move" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo get_bloginfo('wpurl'); ?>/move/">Move</a></li>
							<li id="menu-item-search" class="menu-item menu-item-type-post_type menu-item-object-page">
								<a class="toggle-search" href="#">
							<svg class="ui-icon-magnifyingglass" id="magnifyer" x="0px" y="0px" viewBox="0 0 38 38">
									<circle fill="none" stroke="#FFFFFF" stroke-miterlimit="10" cx="15.1" cy="15.1" r="14"/>
									<line fill="none" stroke="#FFFFFF" stroke-width="2.7225" stroke-linecap="round" stroke-miterlimit="10" x1="26.4" y1="26.4" x2="36.3" y2="36.3"/>
							</svg>
							</a></li>
							<li id="menu-item-breathe" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo get_bloginfo('wpurl'); ?>/breathe/">Breathe</a></li>
						</ul>
					</div>	 -->

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>

					<div class="site-header-search">
						<?php get_search_form( ); ?> 						
					</div>
					<div class="site-header-account">
						<?php global $current_user; wp_get_current_user(); ?>
						<?php if ( is_user_logged_in() ) { 
							//echo 'Username: ' . $current_user->user_login . "\n"; 
							echo '<div class="user-name"><img style="height: 18px; width: auto" src="'.esc_url( home_url() ).'/wp-content/themes/rebalance-theme/img/ui-icon-user.svg" /> '.$current_user->display_name . "</div>";
							echo '<div class="user-menu">'.							
									 '<div class="user-menu-membership">Membership: <span class="user-menu-membership-name">';
							if ( rebalance_membership_is_expired() ) { 
								echo '<i>Subscription Expired</i>';
							} else {
								echo do_shortcode( '[swpm_show_member_info column="membership_level_name"]' ).'</span></div>';
							}
							
							echo "<a href='".get_option( 'home' )."/membership-profile'>Profile</a>";
							echo "<a href='/my-course-history'>My courses</a>";
							if (class_exists(\MailPoet\API\API::class)) {
								$mailpoet_api = \MailPoet\API\API::MP('v1');								
								$currentUser = wp_get_current_user();
								$currentUserEmail = $currentUser->data->user_email;              
								//echo $currentUserEmail;
								$stuff = $mailpoet_api->getSubscriber($currentUserEmail);
								if ($stuff['status'] == 'unsubscribed' OR  $stuff['status'] == 'subscribed' ) {
									echo '<a href="/newsletter-manage-subscription">Email&nbsp;subscription</a>';      
								}
							};													
							echo "<a data-no-swup='' href='".get_option( 'home' )."/?swpm-logout=true
							'>Logout</a>";
							echo "</div>";
						} 
							else { 
								wp_loginout(); } ?> 
					</div>
				</nav><!-- #site-navigation -->		
			</div> <!-- .site-header-inner -->
		</header><!-- #masthead -->
		<?php 
			//Check if SWPM account has expired and is Test Trial membership display survey notification
			if ( rebalance_membership_is_expired() ){
				$extramsg = '<p>To access all Rebalance exercises and content please purchase a subscription:</p>';
				echo get_the_expired_notification(true, $extramsg ); 
			}
		?>  
		<?php else : ?>
		<header id="masthead" class="site-header">
		<div class="site-header-inner">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php get_template_part('inc/inline', 'rebalance-logo.svg'); ?>
				</a>
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation main-navigation-nonuser">
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
			<div class="site-header-account">
				<div class="site-header-login">
					<a href="<?php echo esc_url( home_url( '/membership-login/' ) ); ?>">Log in</a>
				</div>
				<div class="site-header-signup">
					<a class="button" href="<?php echo esc_url( home_url( '/register-for-free-trial/' ) ); ?>">Free trial</a>
				</div>
			</div>
			</nav><!-- #site-navigation -->		
		<!-- </div> .site-header-inner		 -->
		</header><!-- #masthead -->		
	<?php endif; ?>
	
	<div class="loading-animation">
		<div class="loader">
			<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
				<circle cx="50" cy="50" r="45" fill="none" stroke="#ff9b7a" stroke-width="6" />
			</svg>
		</div>
	</div>			
	<div id="swup" class="site-content transition">	
