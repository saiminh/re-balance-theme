<?php
/**
 * Template Name: Settings page
 * The template for redirecting to a random exercise
 *
 * @package rebalance
 */

get_header();
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <article>
      <div class="profile-content">
        <div class="settings form-container">          
        <?php if ( is_user_logged_in() ) : ?>
            <h2 class="settings-header">Settings
              <div class="settings-user-name">
                <img style="height: 18px; width: auto" src="<?php echo get_template_directory_uri( ); ?>/img/ui-icon-user.svg" /> 
                <?php echo $current_user->display_name; ?>
              </div>
            </h2>
            <div class="user-menu">
                <div class="settings-membership">
                <?php if ( rebalance_member_is_logged_in() ) : ?>
                  <?php if ( rebalance_membership_is_expired() ) : ?>
                    <h3 class="settings-membership-header"><span class="user-menu-item-profile-info">Membership</span> Your membership has expired</h3>
                      <?php display_manage_subscription_button(); ?>                                      
                  <?php else: ?>
                    <h3 class="settings-membership-header"><span class="user-menu-item-profile-info">Membership</span> <?php echo do_shortcode( '[swpm_show_member_info column="membership_level_name"]' ); ?></h3>                  
                        <?php 
                          if ( user_has_paid_subscription() ) { 
                            display_manage_subscription_button(); 
                          }
                          else {  
                            echo '<a class="button button-small" href="/pricing">Buy subscription</a>';
                          }
                        ?>
                      </dd>                                                            
                    </dl> 
                  <?php endif; ?>       
                <?php else : ?>
                  <h3 class="settings-membership-header"><span class="user-menu-item-profile-info">Membership</span>
                    You are not logged in.</h3>
                    <a class="button button-small" href="/membership-login">Log in</a>
                <?php endif; ?>            
              </div>
              <a class="user-menu-item user-menu-item-profile" href="<?php echo get_option( 'home' ); ?>/membership-profile">User Profile</a>
              <!-- <a class="user-menu-item user-menu-item-courses" href='/my-course-history'>My courses</a> -->
            <?php if (class_exists(\MailPoet\API\API::class)) :
            $mailpoet_api = \MailPoet\API\API::MP('v1');								
            $currentUser = wp_get_current_user();
            $currentUserEmail = $currentUser->data->user_email;              
            //echo $currentUserEmail;
            $stuff = $mailpoet_api->getSubscriber($currentUserEmail);
              if ($stuff['status'] == 'unsubscribed' OR  $stuff['status'] == 'subscribed' ) : ?>
                
                <a class="user-menu-item user-menu-item-email" href="/newsletter-manage-subscription">Email&nbsp;subscriptions</a>

              <?php endif; ?>
            <?php endif; ?>

              <a class="user-menu-item user-menu-item-logout" data-no-swup='' href="<?php echo get_option( 'home' ); ?>/?swpm-logout=true">Logout</a>

            </div>
          <?php else : wp_loginout(); 
                endif; ?> 
        </div>
      </div>
    </article>
  </main>
</div>
<?php get_footer(); ?>