<?php
/**
 * Template Name: Testing
 * The template for displaying the registration page
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <article>
        <div>
          <?php 
            
            $member_id = SwpmMemberUtils::get_logged_in_members_id();
            $swpm_user = SwpmMemberUtils::get_user_by_id($member_id);
            //var_dump($swpm_user);
            $txn_id = SwpmAuth::get_instance()->txn_id;
            var_dump(SwpmAuth::get_instance());
            
            if ($txn_id) {
              //composer require stripe/stripe-php;
              require_once('stripe-php/init.php');
              // Set your secret key. Remember to switch to your live secret key in production!
              // See your keys here: https://dashboard.stripe.com/account/apikeys
              \Stripe\Stripe::setApiKey('TESTSTRIPEAPIKEY');

              $stripecall = \Stripe\BillingPortal\Session::create([
                'customer' => $txn_id,
                'return_url' => 'http://rebalance.local/membership-profile',
              ]);
              echo '<a class="button" href="'.$stripecall['url'].'">Stripe</a>';
            }
          ?>
          
        </div>
      </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
