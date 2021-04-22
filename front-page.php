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
		<main id="main" class="site-main">
			<div id="home-dashboard-exercises">
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
				<div id="home-how-block">
          <div class="fw-text-block">
            <h2>
              How can we help?
            </h2>
            <p>
              <em>Are you the kind of professional who wants to feel calm, happy, and in balance both at work and at home?</em>
            </p>
            <p>
              To become this version of yourself, you need simple exercises you can use to reduce stress, re-energise, and centre yourself when you need to.
            </p>
          </div>
					<div class="wp-block-columns" style="align-items: center">
						<div class="wp-block-column">
              <img class="home-about-block-illu" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-benefits-bad.png" alt="A woman at her work desk being reminded to use rebalance">
						</div>	
						<div class="wp-block-column">							
              <h3>But there’s a problem:</h3>
							<ul>
                <li>Nobody has taught you practical tools you can easily use</li>
								<li>Attending wellness classes is time consuming</li>
								<li>Meditation and yoga classes can be challenging and intimidating </li>
								<li>Taking a break at work can be difficult</li>
							</ul>							
						</div>		
					</div>
          <div class="wp-block-columns" style="align-items: center">
            <div class="wp-block-column">		
              <h3>Quick, doable, and effective</h3>
              <p>We believe that everyone deserves to have access to the right tools to help improve their mood and their workday. That’s why Rebalance has made workplace wellness quick, doable, and effective.</p>
              <p>Sign up to get access to our online platform and start practising our time-conscious wellness exercises. This way, you can stop feeling stressed and exhausted, and start to improve the way you feel, create better balance, and be happier after hours too.</p>
              <div class="wp-block-buttons">
                <div class="wp-block-button">
                  <a class="wp-block-button__link" href="/membership-registration" data-no-swup="">Free Trial</a>
                </div>									
              </div>
            </div>
            <div class="wp-block-column">
              <img class="home-about-block-illu" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-benefits.png" alt="A woman at her work desk being reminded to use rebalance">
            </div>	
					</div>
				</div>
				<div id="home-offer-block">
          <div class="wp-block-columns">
            <div class="wp-block-column">
              <h2>
                What we Offer
              </h2>
              <p>
                Rebalance provides short (as little as 30 seconds) movement, breathwork and reflection exercises. They are simple, can be performed discreetly at your desk.
              </p>
              <p> 
                Exercises can be accessed via our on-demand platform with additional wellness and habit formation tips sent to your inbox. 
              </p>
            </div>
            <div class="wp-block-column">
              <h2>Backed by science</h2>
              <p>
                All of our exercises are based on traditional methods and backed by the latest scientific research.
              </p>
              <p>
                This way you will be able to take effective and mindful breaks whenever you need to.
              </p>
            </div>
          </div>
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
                  Desk-based exercises to move more and reduce pain and tension
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
        <div id="home-memberships">
          <div class="fw-text-block">
            <h2>Membership Solutions</h2>
            <p>
              We help you bring wellness into your daily routine to reduce stress, improve focus, and find your balance.
            </p>
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
