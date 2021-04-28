<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */
get_header();
?>
	<?php if ( SwpmMemberUtils::is_member_logged_in()) : ?>
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
        // Courses
          $profile       = learn_press_get_profile();
          $filter_status = LP_Request::get_string( 'filter-status' );
          $query         = $profile->query_courses( 'purchased', array( 'status' => $filter_status ) );		
              
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
		<?php else : ?>
		<div id="primary" class="content-area content-area--landing">
			<main id="main" class="site-main">
				<div class="wp-block-group hero home-hero">
					<div class="wp-block-group__inner-container">
						<?php get_template_part('inc/inline', 'home-tryitnow.svg'); ?>						
						<div class="wp-block-group">
							<div class="wp-block-group__inner-container">
								<h1 class="hero-header">
									Short,&nbsp;simple wellness&nbsp;exercises.
								</h1>
								<p class="hero-subheader">
									Helping you de-stress, improve your mood, and transform your workday.
								</p>
								<div class="wp-block-buttons">
									<div class="wp-block-button">
										<a class="wp-block-button__link" href="/membership-registration" data-no-swup="">Free Trial</a>
									</div>									
								</div>
								<p>
									Already a member? <a href="/membership-login">Sign in</a>
								</p>
							</div>
						</div>		
					</div>
				</div>
        <div id="home-offer-block">
          <h2>What we offer</h2>
          <div class="wp-block-columns featured-columns featured-columns-4">
            <div class="wp-block-column featured">
              <div class="featured-thumbnail">
                <img class="" src="<?php echo get_template_directory_uri(); ?>/img/ui-home-breathe.svg" alt="A man breathing">
              </div>
              <div class="featured-text">
                <h3>Breathe</h3>
                <p>
                  Breathwork techniques to de-stress and re-energise
                </p>
               </div>
            </div>
            <div class="wp-block-column featured">
              <div class="featured-thumbnail">
                <img class="" src="<?php echo get_template_directory_uri(); ?>/img/ui-home-move.svg" alt="A woman at her work desk">
              </div>
              <div class="featured-text">
                <h3>Move</h3>
                <p>
                  Desk-based exercises to move more and reduce muscle pain and stiffness
                </p>
              </div>
            </div>
            <div class="wp-block-column featured">
              <div class="featured-thumbnail">
                <img class="" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-reflect.svg" alt="A smile">
              </div>
              <div class="featured-text">
                <h3>Reflect</h3>
                <p>
                  Reflection practices to improve mood and happiness
                </p>
              </div>
            </div>
            <div class="wp-block-column featured">
              <div class="featured-thumbnail">
                <img class="" src="<?php echo get_template_directory_uri(); ?>/img/home-feature-email.svg" alt="A woman at her work desk being reminded to use rebalance">
              </div>
              <div class="featured-text">
                <h3>Learn</h3>
                <p>
                  Wellness and habit formation tips emailed to you twice a week
                </p>
              </div>
            </div>
          </div>   
          <div class="wp-block-columns">
            <div class="wp-block-column">
              <h3>Quick, doable and effective</h3>
              <ul>
                <li>Short exercises (30 seconds to 1 minute)</li>
                <li>Can be performed discreetly at your desk</li>
                <li>Available via an on-demand platform</li>
              </ul>
            </div>
            <div class="wp-block-column">
              <h3>Backed by science</h3>
              <ul>
                <li>Exercises based on traditional methods</li>
                <li>Supported by the latest research</li>
                <li>Simple and accessible to all</li>
              </ul>
            </div>
          </div>       
        </div>
        <div id="home-yourplan-block">
          <h2>Your plan to be a more balanced you</h2>
          <div class="wp-block-columns">
            <div class="wp-block-column step">
              <h3 class="step-title">
                <span>Step&nbsp;1:</span> Get Access
              </h3>
              <p>
                Ongoing access with a monthly or annual membership
              </p>
            </div>
            <div class="wp-block-column step">
              <h3 class="step-title">
                <span>Step&nbsp;2:</span> Practise the Exercises

              </h3>
              <p>
                All wellness exercises are short, simple and effective
              </p>
            </div>
            <div class="wp-block-column step">
              <h3 class="step-title">
                <span>Step&nbsp;3:</span> Achieve Results
              </h3>
              <p>
                De-stress, improve your mood, and transform your workday
              </p>
            </div>
          </div>
          <div class="wp-block-buttons">
            <div class="wp-block-button">
              <a class="wp-block-button__link" href="/membership-registration" data-no-swup="">Get Access</a>
            </div>									
          </div>
        </div>
				<div id="home-how-block">
          <div class="wp-block-columns">
            <div class="wp-block-column">
              <h2>
                How can we help?
              </h2>
              <h3>Would you like to:</h3>
              <ul>
                <li>Improve your stress management?</li>
                <li>Feel calm, energised and happy at work?</li>
                <li>Feel less stiff and sluggish?</li>
                <li>Centre yourself when you need to?</li>
              </ul>
            </div>
            <div class="wp-block-column">
              <img class="home-about-block-illu" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-benefits-bad.png" alt="A woman at her work desk being reminded to use rebalance">
            </div>	
          </div>
					<div class="wp-block-columns" style="align-items: center">
            <div class="wp-block-column">							
              <h3>Rebalance can help you to:</h3>
              <ul>
                <li>Learn practical tools to improve your mood</li>
                <li>De-stress, re-energise and get focussed</li>
                <li>Combat the effects of sitting and screen time</li>
                <li>Build a habit of taking tiny breaks</li>
              </ul>				
              <p>
                We believe that everyone deserves to have access to the right tools to help improve their mood and their workday.</p>
              <p>
                So we’ve made short, simple wellness exercises that are quick, doable, and effective.</p>			
              <div class="wp-block-buttons">
                <div class="wp-block-button">
                  <a class="wp-block-button__link button-secondary" href="/why-rebalance" data-no-swup="">Learn more</a>
                </div>									
              </div>
            </div>	
            <div class="wp-block-column">
              <img class="home-about-block-illu" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-benefits.png" alt="A woman at her work desk being reminded to use rebalance">
            </div>
					</div>
				</div>
				
        
        <div id="home-memberships">
          <div class="fw-text-block">
            <h2>Membership Solutions</h2>
          </div>
					<div class="wp-block-columns">
						<div class="wp-block-column step">
							<h3>
								Individual memberships</h3>
							<p>
                Would you like to better manage your mood and become a more balanced you?
              </p>
              <p>
                Effortlessly incorporate mindful movement and breathwork practices into your day with our monthly or annual memberships. Take the next step on your wellness journey today!
              </p>
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="/pricing" data-no-swup="">Buy Now</a>
								</div>
							</div>
						</div>	
						<div class="wp-block-column step">
							<h3>
								Corporate Solutions</h3>
							<p>
                Are you looking to provide better support for your team? Or reduce work-related health conditions among your employees? 
              </p>
              <p>
                Learn more about how we can help and enquire for your business today.
              </p>
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="/business-inquiry/" data-no-swup="">Enquire Now</a>
								</div>
							</div>
						</div>		
					</div>		
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		<div class="notification-modal-darken notification-hidden">
			<div class="notification notification-rebalance-mini notification-hidden">					
				<?php do_shortcode( "[tiny name='deep-breathing']" ); ?>					
				<div class="close"><svg class="close-x" style="position: absolute; right: 1.5rem; top: 1.33rem; width: 1em; height: 1em;" x="0px" y="0px" viewBox="0 0 96 96" enable-background="new 0 0 96 96" xml:space="preserve"><polygon fill="#FF9B7A" points="96,14 82,0 48,34 14,0 0,14 34,48 0,82 14,96 48,62 82,96 96,82 62,48 "></polygon></svg></div>
			</div>
		</div>
		<?php //the_content(); // Only exists as a hook for the mailpoet popup boxes ?>
		<?php endif; ?>
<?php
//get_sidebar();
get_footer();
