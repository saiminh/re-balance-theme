<?php
/**
 * Template part for displaying the header when user is logged OUT
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

?>
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