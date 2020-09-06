<?php
/**
 * Template Name: Pricing
 * The template for displaying the registration page
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <article>
        <?php 
            while ( have_posts() ) :
                the_post();
                the_content(); 
            endwhile; 
        ?>
        <div class="pricing">
          <div class="can-toggle can-toggle--size-large">
            <input id="a" type="checkbox">
            <label for="a" class="can-toggle__label">
              <div class="can-toggle__switch" data-checked="Business" data-unchecked="Private"></div>
            </label>
            <div class="can_toggle__content--unchecked pricing-private">
              <!-- Monthly Sub -->
              <div class="pricing-private-monthly">
                <h3 class="pricing-title">Monthly subscription</h3>
                <div class="pricing-amount">
                  <div class="pricing-amount--aud">
                    <div class="pricing-amount-currency">AU$</div>
                    <div class="pricing-amount-number">3</div>
                    <div class="pricing-amount-frequency">/mo</div>
                  </div>
                </div>
                <hr>
                <a class="button">Purchase</a>
              </div>
              <!-- Annual Sub -->
              <div class="pricing-private-annually">
                <h3 class="pricing-title">Annual subscription</h3>
                <div class="pricing-amount">
                  <div class="pricing-amount--aud">
                    <div class="pricing-amount-currency">AU$</div>
                    <div class="pricing-amount-number">30</div>
                    <div class="pricing-amount-frequency">/year</div>
                  </div>
                </div>
                <hr>
                <a class="button">Purchase</a>
              </div>
            </div>
             
            <div class="can_toggle__content--checked pricing-business">
              <div class="form-container">
                <?php echo do_shortcode( '[caldera_form id="CF5f16fd45b80a5"]' ); ?>
              </div>
            </div>
          </div>          
        </div>
      </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
