<?php
/**
 * Template Name: page-profile
 * The template for displaying the registration page
 *
 * @package rebalance
 */

get_header();
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <article>
        
        <div class="profile-content">
          <div class="form-container">
            <h2>Edit your profile data:</h2>
            <?php echo do_shortcode( '[swpm_profile_form]' ); ?>
          </div>
        </div>
      </article>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
