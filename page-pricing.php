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
        <h1 class="has-text-align-center">
          Start your workday transformation today!
        </h1>
        <h2 class="has-text-align-center has-text-color" style="color:#ff9b7a">
          All our content for little more than the price of a coffee
        </h2>
        <div class="pricing">
          <div class="can-toggle can-toggle--size-large">
            <input id="a" type="checkbox">
            <label for="a" class="can-toggle__label">
              <div class="can-toggle__switch" data-checked="Business" data-unchecked="Individual"></div>
            </label>
            <div class="can_toggle__content--unchecked pricing-individual">
              <?php if (function_exists('geoip_detect2_get_info_from_current_ip')) {
                $userInfo = geoip_detect2_get_info_from_current_ip();
                $settings = SwpmSettings::get_instance();
                $sandbox_enabled = $settings->get_value('enable-sandbox-testing');
                if ($userInfo->country->isoCode == "AU") {
                  //–––––––––––––––––––––––––––––––––––––––––
                  // IF GEO IS AUSTRALIA
                  echo '
                    <!-- Monthly Sub AUD -->
                    <div class="pricing-individual-monthly">
                      <h3 class="pricing-title">Monthly subscription</h3>
                      <div class="pricing-amount">
                        <div class="pricing-amount--aud">
                          <div class="pricing-amount-currency">AU$</div>
                          <div class="pricing-amount-number">6</div>
                          <div class="pricing-amount-frequency">/mo</div>
                        </div>
                      </div>
                      <hr>';
                  if ($sandbox_enabled) {
                    // IF AUSTRALIA MONTHLY SANDBOX
                    echo '<div class="sandbox-warning">*Payment testing mode enabled, only use <a href="https://stripe.com/docs/testing#international-cards">test credit cards</a></div>';
                    echo do_shortcode('[swpm_payment_button id=1239 class=""]');
                  } else {
                    // IF AUSTRALIA MONTHLY LIVE
                    echo do_shortcode('[swpm_payment_button id=1241 class=""]');
                  }
                  echo '</div>
                    <!-- Annual Sub AUD -->
                    <div class="pricing-individual-annually">
                      <h3 class="pricing-title">Annual subscription</h3>
                      <div class="pricing-amount">
                        <div class="pricing-amount--aud">
                          <div class="pricing-amount-currency">AU$</div>
                          <div class="pricing-amount-number">60</div>
                          <div class="pricing-amount-frequency">/year</div>
                        </div>
                      </div>
                      <hr>';
                  if ($sandbox_enabled) {
                    // IF AUSTRALIA ANNUAL SANDBOX
                    echo '<div class="sandbox-warning">*Payment testing mode enabled, only use <a href="https://stripe.com/docs/testing#international-cards">test credit cards</a></div>';
                    echo do_shortcode('[swpm_payment_button id=1238 class=""]');
                  } else {
                    // IF AUSTRALIA ANNUAL LIVE
                    echo do_shortcode('[swpm_payment_button id=1242 class=""]');
                  }
                  echo '</div>
                  </div>';

                } else {
                  //–––––––––––––––––––––––––––––––––––––––––
                  // ELSE ALL OTHER COUNTRIES -> Euros
                  echo '
                  <!-- Monthly Sub EUR -->
                    <div class="pricing-individual-monthly">
                      <h3 class="pricing-title">Monthly subscription</h3>
                      <div class="pricing-amount">
                        <div class="pricing-amount--eur">
                          <div class="pricing-amount-currency">€</div>
                          <div class="pricing-amount-number">4</div>
                          <div class="pricing-amount-frequency">/mo</div>
                        </div>
                      </div>
                      <hr>';
                      if ($sandbox_enabled) {
                        // IF EUR MONTHLY SANDBOX
                        echo '<div class="sandbox-warning">*Payment testing mode enabled, only use <a href="https://stripe.com/docs/testing#international-cards">test credit cards</a></div>';
                        // Local site
                        if ( get_site_url() == 'http://re-balance.local') {
                          echo do_shortcode('[swpm_payment_button id=569 class=""]');
                          // Live site
                        } else {
                          echo do_shortcode('[swpm_payment_button id=1226 class=""]');
                        }
                      } else {
                        // IF EUR MONTHLY LIVE
                        echo do_shortcode('[swpm_payment_button id=1243 class=""]');
                      }
                  echo '</div>
                    <!-- Annual Sub EUR -->
                    <div class="pricing-individual-annually">
                      <h3 class="pricing-title">Annual subscription</h3>
                      <div class="pricing-amount">
                        <div class="pricing-amount--eur">
                          <div class="pricing-amount-currency">€</div>
                          <div class="pricing-amount-number">40</div>
                          <div class="pricing-amount-frequency">/year</div>
                        </div>
                      </div>
                      <hr>';
                  if ($sandbox_enabled) {
                    // IF EUR ANNUAL SANDBOX
                    echo '<div class="sandbox-warning">*Payment testing mode enabled, only use <a href="https://stripe.com/docs/testing#international-cards">test credit cards</a></div>';
                    echo do_shortcode('[swpm_payment_button id=1237 class=""]');
                  } else {
                    // IF EUR ANNUAL LIVE
                    echo do_shortcode('[swpm_payment_button id=1244 class=""]');
                  }                  
                }
              };?>
              </div>
              <h2>
                What’s Included:
              </h2>
              <div class="wp-block-columns featured-columns featured-columns-4">
                <div class="wp-block-column featured">
                  <div class="featured-thumbnail">
                    <img class="" src="<?php echo get_template_directory_uri(); ?>/img/pricing-calendar.svg" alt="A calendar">
                  </div>
                  <div class="featured-text">
                    <p>
                      First 14 days free              
                    </p>
                   </div>
                </div>
                <div class="wp-block-column featured">
                  <div class="featured-thumbnail">
                    <img class="" src="<?php echo get_template_directory_uri(); ?>/img/pricing-3breaths.svg" alt="A woman at her work desk">
                  </div>
                  <div class="featured-text">
                    <p>
                      Get started with a 5 day email challenge to take 3 stress-reducing  breaths
                    </p>
                  </div>
                </div>
                <div class="wp-block-column featured">
                  <div class="featured-thumbnail">
                    <img class="" src="<?php echo get_template_directory_uri(); ?>/img/pricing-computer.svg" alt="A computer">
                  </div>
                  <div class="featured-text">
                    <p>
                      Access exercises online 
                    </p>
                  </div>
                </div>
                <div class="wp-block-column featured">
                  <div class="featured-thumbnail">
                    <img class="" src="<?php echo get_template_directory_uri(); ?>/img/home-feature-email.svg" alt="An envelop">
                  </div>
                  <div class="featured-text">
                    <p>
                      Tips and challenges sent to your inbox twice a week
                    </p>
                  </div>
                </div>
              </div> 
            </div>
            <div class="can_toggle__content--checked pricing-business">
              <div class="wp-block-columns">
                <div class="wp-block-column" style="flex-basis: 33.33%">
                  <h3 class="eyebrow">Inquiring about a business subscription?</h3>
                  <h2>Let us get to know you!</h2>
                  <p>To make sure we can offer accurate pricing, we need to gather some information about your business. Once we received your inquiry we will get back to you with a tailored offer as soon as possible.</p>
                </div>
                <div class="wp-block-column" style="flex-basis: 66.66%">
                  <div class="form-container">
                    <?php echo do_shortcode( '[caldera_form id="CF5f16fd45b80a5"]' ); ?>
                  </div>
                </div>
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
