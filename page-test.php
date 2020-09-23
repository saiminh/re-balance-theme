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
        <div>
          <form method="POST" action="/create_customer_portal_session">
              <button type="submit">Manage billing</button>
          </form>
    
          <?php 
              
            //composer require stripe/stripe-php;
            require_once('stripe-php/init.php');
            // Set your secret key. Remember to switch to your live secret key in production!
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey('TESTSTRIPEAPIKEY');

            \Stripe\BillingPortal\Session::create([
              'customer' => 'cus_I3tmmPcMtQSWOB',
              'return_url' => 'https://re-balace.io/account',
            ]);
          ?>
        </div>
      </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
