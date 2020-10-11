<?php
/**
 * Template Name: Thank you page
 * The template for displaying the registration page
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <article>
            <?php if ( rebalance_member_is_logged_in() ) : 
            // If User has a trial membership, they'll already be upgraded ?>
              <div class="wp-block-group form-container">
                <div class="wp-block-group__inner-container">
                  <h2>Success! Your account has been upgraded.</h2>
                  <p><strong>Thank you for joining Rebalance!</strong> <br>You can now access all our content without restrictions. </p>
                  <p><strong>Something not working as expected?</strong><br> In case something has gone wrong with your account, please don't hesitate to <a href="https://re-balance.io/contact/" class="rank-math-link">contact us</a>.</p>
                </div>
              </div>
            <?php else :
            // If user had no trial and therfore no account at all they need to use the email activation code  ?>
              <div class="wp-block-group form-container">
                <div class="wp-block-group__inner-container">
                <h2>Success! Please check your inbox.</h2>
                  <p><strong>Thank you for joining Rebalance!</strong> <br>We sent an activation code to the email you specified during the payment process. </p>
                  <p><strong>Can’t see the email?</strong><br>Check your SPAM folder, sometimes it can take a while before the email arrives. In case something has gone wrong, please <a href="https://re-balance.io/contact/" class="rank-math-link">contact us</a>.</p>
                </div>
              </div>
            <?php endif; ?>
            </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
