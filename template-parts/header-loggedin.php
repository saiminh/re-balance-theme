<?php
/**
 * Template part for displaying the header when user is logged in
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

?>
<header class="mobile-nav">
  <ul class="mobile-nav-list">
    <li class="mobile-nav-list-item mobile-nav-list-item-home">
      <a class="mobile-nav-list-item-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
    </li>
    <li class="mobile-nav-list-item mobile-nav-list-item-move">
      <a class="mobile-nav-list-item-link" href="<?php echo esc_url( home_url( '/' ) ); ?>exercise-type/tiny-movements/">Move</a>
    </li>
    <li class="mobile-nav-list-item mobile-nav-list-item-breathe">
      <a class="mobile-nav-list-item-link" href="<?php echo esc_url( home_url( '/' ) ); ?>exercise-type/tiny-breathwork/">Breathe</a>
    </li>
    <li class="mobile-nav-list-item mobile-nav-list-item-reflect">
      <a class="mobile-nav-list-item-link" href="<?php echo esc_url( home_url( '/' ) ); ?>exercise-type/tiny-reflections/">Reflect</a>
    </li>
    <li class="mobile-nav-list-item mobile-nav-list-item-settings">
      <a class="mobile-nav-list-item-link" href="<?php echo esc_url( home_url( '/' ) ); ?>settings">Settings</a>      
    </li>
  </ul>
</header>
<header id="masthead" class="site-header site-header--loggedin">
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
      <div class="menu-container">
        <ul id="primary-menu" class="menu nav-menu">         
          <li class="menu-item menu-item-move">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>exercise-type/tiny-movements/">Move</a>
          </li>
          <li class="menu-item menu-item-breathe">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>exercise-type/tiny-breathwork/">Breathe</a>
          </li>
          <li class="menu-item menu-item-reflect">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>exercise-type/tiny-reflections/">Reflect</a>
          </li>
        </ul>
      </div>
      <div class="site-header-search">
        <?php get_search_form( ); ?> 						
      </div>
      <div class="site-header-account">
        <?php global $current_user; wp_get_current_user(); ?>
        <div class="user-name">
          <a href="/settings">
            <img style="height: 18px; width: auto" src="<?php echo get_template_directory_uri( ); ?>/img/ui-icon-user.svg" /> 
            <?php echo $current_user->display_name; ?>
          </a>
          <div class="re-tooltip">
            Account Settings
          </div>
        </div>
        
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