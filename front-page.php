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
							<a href="<?php echo get_bloginfo('wpurl'); ?>/less-tense/">Less tense</a>
						</h2>
					</div>
					<div class="card">
						<div class="card-thumbnail">
							<img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-energised.svg">
						</div>
						<h2 class="card-title">
							<a href="<?php echo get_bloginfo('wpurl'); ?>/energised/">Energised</a>
						</h2>
					</div>
					<div class="card">
						<div class="card-thumbnail">
							<img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-immediate-relief.svg">
						</div>
						<h2 class="card-title">
							<a href="<?php echo get_bloginfo('wpurl'); ?>/immediate-relief">Immediate relief</a>
						</h2>
					</div>
					<div class="card">
						<div class="card-thumbnail">
							<img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-focussed.svg">
						</div>
						<h2 class="card-title">
							<a href="<?php echo get_bloginfo('wpurl'); ?>/focussed/">Focussed</a>
						</h2>
					</div>
					<div class="card">
						<div class="card-thumbnail">
							<img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-destressed.svg">
						</div>
						<h2 class="card-title">
							<a href="<?php echo get_bloginfo('wpurl'); ?>/de-stressed/">De-stressed</a>
						</h2>
					</div>
					<div class="card">
						<div class="card-thumbnail">
							<img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-refresh-tired-eyes.svg">
						</div>
						<h2 class="card-title">
							<a href="<?php echo get_bloginfo('wpurl'); ?>/refresh-tired-eyes/">Refresh tired eyes</a>
						</h2>
					</div>
					<div class="card">
						<div class="card-thumbnail">
							<img src="<?php echo get_template_directory_uri() ; ?>/img/ui-home-nav-roulette.svg">
						</div>
						<h2 class="card-title">
							<a data-no-swup="" href="<?php echo get_bloginfo('wpurl'); ?>/surprise/">Exercise Roulette</a>
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
									Transform&nbsp;your work&nbsp;day. Find&nbsp;your&nbsp;balance.
								</h1>
								<p class="hero-subheader">
									Short and simple exercises to help you take better breaks at work.
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
					<h2>
						How can Rebalance help?
					</h2>
					<p class="has-medium-font-size">
						Rebalance helps busy professionals improve and transform their workday. We have combined a simple and effective habit formation technique developed at Stanford University with mindful movement and breathwork exercises. This empowers our members to build a lasting habit of wellness into their day, improving their happiness, resilience and wellbeing.
					</p>
					<div class="wp-block-columns" style="align-items: center">
						<div class="wp-block-column">
							<img class="home-about-block-illu" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-benefits.png" alt="A woman at her work desk being reminded to use rebalance">
						</div>	
						<div class="wp-block-column">							
							<ul>
								<li>Start small with our Rebalance Tiny Habit® formation program.</li>
								<li>Learn to take conscious and effective breaks to improve your productivity, focus and engagement</li>
								<li>Improve your working environment for you or your whole business</li>
								<li>Reduce work-related stress, and employee absenteeism and presenteeism</li>
							</ul>
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="/why-rebalance" data-no-swup="">Read More</a>
								</div>
							</div>
						</div>		
					</div>
				</div>
				<div id="home-offer-block">
					<h2>
						What we Offer
					</h2>
					<p class="has-medium-font-size">
						We will help bring wellness easily into your daily routine. Assisting you or your staff to reduce stress, improve focus, and increase innovative thinking.
					</p>
					<div class="wp-block-columns">
						<div class="wp-block-column">
							<!-- <h3 class="eyebrow">The Benefits</h3> -->
							<h3>
								Individual memberships</h3>
							<p>
								Struggle to find time for a break? Learn how to effortlessly fit mindful movement and breathing practices into your day and improve your work-life balance.</p>
							<p>
								Take the next step on your wellness journey and get started with our free trial today</p>
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="/register-for-free-trial" data-no-swup="">Free Trial</a>
								</div>
							</div>
						</div>	
						<div class="wp-block-column">
							<h3>
								Corporate Solutions</h3>
							<p>
								Are you looking to improve your company’s culture, increase your employees’ productivity, or reduce the rate of work-related health conditions?</p>
							<p>
								Learn more about how we can help you and enquire for your business today</p>
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
		<?php the_content(); // Only exists as a hook for the mailpoet popup boxes ?>
		<?php endif; ?>
<?php
//get_sidebar();
get_footer();
