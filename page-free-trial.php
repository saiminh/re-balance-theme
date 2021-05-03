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
            <div class="wp-block-group has-white-background-color has-background">
              <div class="wp-block-group__inner-container">
                <h3>Memberships:</h3>
                <p>Annual Subscription: $60/ year<br>Monthly Subscription: $6/ year</p>
                <?php if (function_exists('geoip_detect2_get_info_from_current_ip')) {
                  $userInfo = geoip_detect2_get_info_from_current_ip();
                  $settings = SwpmSettings::get_instance();
                  $sandbox_enabled = $settings->get_value('enable-sandbox-testing');
                  if ($userInfo->country->isoCode == "AU") {
                    //–––––––––––––––––––––––––––––––––––––––––
                    // IF GEO IS AUSTRALIA
            
                    if ($sandbox_enabled) {
                      // IF AUSTRALIA MONTHLY SANDBOX
                      echo '<div class="sandbox-warning">*Payment testing mode enabled, only use <a href="https://stripe.com/docs/testing#international-cards">test credit cards</a></div>';
                      echo do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1239 class=""]');
                    } else {
                      // IF AUSTRALIA MONTHLY LIVE
                      echo do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1241 class=""]');
                    }                        

                  } else {
                    //–––––––––––––––––––––––––––––––––––––––––
                    // ELSE ALL OTHER COUNTRIES -> Euros
                        if ($sandbox_enabled) {
                          // IF EUR MONTHLY SANDBOX
                          echo '<div class="sandbox-warning">*Payment testing mode enabled, only use <a href="https://stripe.com/docs/testing#international-cards">test credit cards</a></div>';
                          // Local site
                          if ( get_site_url() == 'http://re-balance.local') {
                            echo do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=569 class=""]');
                            // Live site
                          } else {
                            echo do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1226 class=""]');
                          }
                        } else {
                          // IF EUR MONTHLY LIVE
                          echo do_shortcode('[swpm_payment_button button_text="Try it free for 14 days" id=1243 class=""]');
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
