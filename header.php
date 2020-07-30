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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rebalance' ); ?></a>

	<?php if ( SwpmMemberUtils::is_member_logged_in()) : ?>
	
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
					<div class="menu-movebreathe-container">
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
					</div>	

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
							echo '<div class="user-name">'.$current_user->display_name . "</div>";
							echo '<div class="user-menu">';							
							echo '<div class="user-menu-membership">Membership: <span class="user-menu-membership-name">'.do_shortcode( '[swpm_show_member_info column="membership_level_name"]' ).'</span></div>';
							echo '<div class="user-menu-expires">Expiry date: <span class="user-menu-expire-date">'.do_shortcode( '[swpm_show_member_info column="expiry_date"]' ).'</span></div>';
							echo "<a href='".get_option( 'home' )."/membership-profile'>Profile</a>";
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
								
		<?php //Check if SWPM account has expired and display notification
			if ( membership_is_expired() ){
				$extramsg = '<p>Thank you for using Rebalance, we hope you enjoyed your time with it! Find out more on how to renew your subscription:</p>
				<a href="/membership-renewal" class="button button-small">Renew my subscription</a>';
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
					<a class="button" href="<?php echo esc_url( home_url( '/membership-registration/' ) ); ?>">Free trial</a>
				</div>
			</div>

			</nav><!-- #site-navigation -->		
		<!-- </div> .site-header-inner		 -->
		</header><!-- #masthead -->		

	<?php endif; ?>
	
	<div class="loading-animation"><div class="loader">
		<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
		<circle cx="50" cy="50" r="45" fill="none" stroke="#ff9b7a" stroke-width="6" />
		</svg>
	</div></div>			
	
	<div id="swup" class="site-content transition">		
	
	<?php if ( SwpmMemberUtils::is_member_logged_in()) : ?>
	<div class="statusbar">	
		<a class="back-button" href="javascript:history.back()"><?php get_template_part('inc/inline', 'back-arrow.svg'); ?></a>
		<?php
			if (is_search()) :
				echo '<ul class="breadcrumbs">';
				echo '<li><a href="';
				echo get_option('home');
				echo '">Home';
				echo '</a></li>';
				echo '<li>Search</li></ul>';

			else :
				if ( is_tax( 'types' ) ) :
					show_custax_breadcrumb(single_tag_title("", false),"types");
				elseif ( is_tax( 'exercises-tag' ) ) :
					show_custax_breadcrumb(single_tag_title("", false),"exercises-tag");
				elseif ( has_term( '' , 'types' ) ) :
					
					echo '<ul class="breadcrumbs">';
					echo '<li><a href="';
					echo get_option('home');
					echo '">Home';
					echo '</a></li>';
					$rd_taxonomy = 'types'; // region taxonomy
					$rd_terms = wp_get_post_terms( $post->ID, $rd_taxonomy, array( "fields" => "ids" ) ); // getting the term IDs
					if( $rd_terms ) {
						$term_array = trim( implode( ',', (array) $rd_terms ), ' ,' );
						$neworderterms = get_terms($rd_taxonomy, 'orderby=parent&include=' . $term_array );
						foreach( $neworderterms as $orderterm ) {
							echo '<li><a href="' . get_term_link( $orderterm ) . '">' . $orderterm->name . '</a></li>';
						}
					}
					echo '<li>';
					the_title();
					echo '</li></ul>';

				elseif ( is_front_page() ) :
					global $current_user; wp_get_current_user(); 
					echo "<div id='lblGreetings'>";
					if ( $current_user->first_name ) :
						echo $current_user->first_name . "\n";
					else :
						echo $current_user->display_name . "\n";
					endif;
					echo "</div>";

				else :
					show_breadcrumb();
				endif;
			endif;
		?>
		<?php if ( is_tax(  ) ) : ?>
		<div class="toggle-discreet">
			<label class="switch"><input type="checkbox"><span class="toggle-label-text">Only Discreet</span><span class="slider round hide-off"></span> </label>		
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
