<?php
/**
 * Template part for displaying the app home content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

?>

<div id="primary" class="content-area">
  <div class="home-branding-mobile">
    <?php get_template_part('inc/inline', 'rebalance-logo.svg'); ?>
  </div><!-- .site-branding -->
  <main id="main" class="site-main">
    <?php 
      //Users name, JS adds the time-specific greeting
        global $current_user; wp_get_current_user(); 
        echo "<div class='headline-homenav' id='lblGreetings'>";
        if ( $current_user->first_name ) :
          echo $current_user->first_name . "!\n";
        else :
          echo $current_user->display_name . "!\n";
        endif;
        echo " <em>How would you like to feel?</em></div>";
      // // Courses THROWS ERROR IF LEARNPRESS IS DEACTIVATED!!!
      //   $profile       = learn_press_get_profile();
      //   $filter_status = LP_Request::get_string( 'filter-status' );
      //   $query         = $profile->query_courses( 'purchased', array( 'status' => $filter_status ) );		
              
      ?>
    <div class="card-grid card-grid-7cards card-nav">          
      <div class="card">
        <div class="card-thumbnail">
          <img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-less-tense.svg">
        </div>
        <h2 class="card-title">
          <a class="card-mainlink" href="<?php echo get_bloginfo('wpurl'); ?>/less-tense/">Less tense</a>
        </h2>
      </div>
      <div class="card">
        <div class="card-thumbnail">
          <img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-energised.svg">
        </div>
        <h2 class="card-title">
          <a class="card-mainlink" href="<?php echo get_bloginfo('wpurl'); ?>/energised/">Energised</a>
        </h2>
      </div>
      <div class="card">
        <div class="card-thumbnail">
          <img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-immediate-relief.svg">
        </div>
        <h2 class="card-title">
          <a class="card-mainlink" href="<?php echo get_bloginfo('wpurl'); ?>/immediate-relief">Immediate relief</a>
        </h2>
      </div>
      <div class="card">
        <div class="card-thumbnail">
          <img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-focussed.svg">
        </div>
        <h2 class="card-title">
          <a class="card-mainlink" href="<?php echo get_bloginfo('wpurl'); ?>/focussed/">Focussed</a>
        </h2>
      </div>
      <div class="card">
        <div class="card-thumbnail">
          <img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-destressed.svg">
        </div>
        <h2 class="card-title">
          <a class="card-mainlink" href="<?php echo get_bloginfo('wpurl'); ?>/de-stressed/">De-stressed</a>
        </h2>
      </div>
      <div class="card">
        <div class="card-thumbnail">
          <img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-refresh-tired-eyes.svg">
        </div>
        <h2 class="card-title">
          <a class="card-mainlink" href="<?php echo get_bloginfo('wpurl'); ?>/tired-eyes/">Refresh tired eyes</a>
        </h2>
      </div>
      <div class="card">
        <div class="card-thumbnail">
          <img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-roulette.svg">
        </div>
        <h2 class="card-title">
          <a class="card-mainlink" data-no-swup="" href="<?php echo get_bloginfo('wpurl'); ?>/surprise/">Exercise Roulette</a>
        </h2>
      </div>
    </div>
  </main><!-- #main -->
</div><!-- #primary -->