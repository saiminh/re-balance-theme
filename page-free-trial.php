<?php
/**
 * Template Name: Free Trial Page
 * The template for displaying the registration page
 *
 * @package rebalance
 */

get_header();
?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <article>

        <!-- <h1><?php the_title(); ?></h1>
        <?php the_content(); ?> -->

        <h1>Try Rebalance for free</h1>
        <div class="wp-block-columns">
          <div class="wp-block-column">
            <p>Sign up today and receive 14 days free.</p>
            <h3>Here’s what’s included:</h3>
            <ul>
              <li>Desk-based movement exercises to re-energise and reduce tension</li>
              <li>Breathwork techniques to de-stress and re-focus</li>
              <li>Reflection practices to improve mood and happiness</li>
              <li>Get started with a 5 day email challenge to take 3 stress-reducing breaths</li>
              <li>Wellness tips and challenges sent to your inbox twice a week</li>
            </ul>
          </div>
          <div class="wp-block-column">
            <div class="wp-block-group has-white-background-color has-background rebalance-free-trial-radios">
              <div class="wp-block-group__inner-container">
                <h3>Memberships:</h3>
                <?php if (function_exists('geoip_detect2_get_info_from_current_ip')) {
                  $userInfo = geoip_detect2_get_info_from_current_ip();
                  $settings = SwpmSettings::get_instance();
                  $sandbox_enabled = $settings->get_value('enable-sandbox-testing');
                  if ($userInfo->country->isoCode == "AU") {
                    //–––––––––––––––––––––––––––––––––––––––––
                    // IF GEO IS AUSTRALIA
                    //–––––––––––––––––––––––––––––––––––––––––
                    echo '
                      <input id="eur-annual" name="subscription" type="radio" class="radio-annual">
                      <label for="eur-annual">Annual Subscription: $60/year</label>
                      <input id="eur-monthly" name="subscription" type="radio" class="radio-monthly" checked>
                      <label for="eur-monthly">Monthly Subscription: $6/month</label>';
                    if ($sandbox_enabled) {
                      //---------------------------------
                      // IF AUSTRALIA SANDBOX ON
                      //---------------------------------
                      echo '<div class="sandbox-warning">*Payment testing mode enabled, only use <a href="https://stripe.com/docs/testing#international-cards">test credit cards</a></div>';
                      
                      echo '<div class="monthly-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1239 class=""]').'</div>';
                      echo '<div class="annual-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1238 class=""]').'</div>';
                      echo '<span class="button-info">After your trial ends, you will be charged the monthly or annual rate. You can always cancel before then.</span>';
                    
                    } else {
                      //---------------------------------
                      // IF AUSTRALIA SANDBOX OFF
                      //---------------------------------
                      echo '<div class="monthly-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1241 class=""]').'</div>';
                      echo '<div class="annual-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1242 class=""]').'</div>';
                      echo '<span class="button-info">After your trial ends, you will be charged the monthly or annual rate. You can always cancel before then.</span>';
                    }                        

                  } else {
                    //–––––––––––––––––––––––––––––––––––––––––
                    // IF GEO IS ANY OTHER COUNTRY -> EUR
                    //–––––––––––––––––––––––––––––––––––––––––
                        echo '
                          <input id="eur-annual" name="subscription" type="radio" class="radio-annual">
                          <label for="eur-annual">Annual Subscription: €40/year</label>
                          <input id="eur-monthly" name="subscription" type="radio" class="radio-monthly" checked>
                          <label for="eur-monthly">Monthly Subscription: €4/month</label>';
                        //---------------------------------
                        // IF EUR SANDBOXMODE ON
                        //---------------------------------
                        if ($sandbox_enabled) {
                          echo '<div class="sandbox-warning">*Payment testing mode enabled, only use <a href="https://stripe.com/docs/testing#international-cards">test credit cards</a></div>';
                          //---------------------------------
                          // IF Local Dev site
                          //---------------------------------
                          if ( get_site_url() == 'http://re-balance.local') {
                            echo '<div class="monthly-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=569 class=""]').'</div>';
                            echo '<div class="annual-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1237 class=""]').'</div>';
                            echo '<span class="button-info">After your trial ends, you will be charged the monthly or annual rate. You can always cancel before then.</span>';
                            //---------------------------------
                            // IF Live site
                            //---------------------------------
                          } else {
                            echo '<div class="monthly-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1226 class=""]').'</div>';
                            echo '<div class="annual-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1244 class=""]').'</div>';
                            echo '<span class="button-info">After your trial ends, you will be charged the monthly or annual rate. You can always cancel before then.</span>';
                          }
                        //---------------------------------
                        // IF EUR SANDBOXMODE OFF
                        //---------------------------------
                        } else {
                          //---------------------------------
                          // IF Local Dev site
                          //---------------------------------
                          if ( get_site_url() == 'http://re-balance.local') {
                            echo '<div class="monthly-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=569 class=""]').'</div>';
                            echo '<div class="annual-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1237 class=""]').'</div>';
                            echo '<span class="button-info">After your trial ends, you will be charged the monthly or annual rate. You can always cancel before then.</span>';
                            //---------------------------------
                            // IF Live site
                            //---------------------------------
                          } else {
                            echo '<div class="monthly-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1243 class=""]').'</div>';
                            echo '<div class="annual-button">'.do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1244 class=""]').'</div>';
                            echo '<span class="button-info">After your trial ends, you will be charged the monthly or annual rate. You can always cancel before then.</span>';
                          }
                        }
                  }
                };?>
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
