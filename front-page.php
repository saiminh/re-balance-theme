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
			<header class="page-header">
				<h2 class="page-subtitle" id="lblGreetings">
					<?php global $current_user; wp_get_current_user(); ?>
					<?php echo $current_user->display_name . "\n"; ?>
				</h2>
			</header>
			<div class="home-search">
				<?php get_search_form( ); ?> 						
			</div>
			<div class="choose-exercise-links">          
				<div class="choose-exercise-link--move">
					<a href="<?php echo get_bloginfo('wpurl'); ?>/move/">I want to Move</a>
				</div>
				<div class="choose-exercise-link--breathe">
					<a href="<?php echo get_bloginfo('wpurl'); ?>/breathe/">I want to Breathe</a>
				</div>
				<div class="choose-exercise-link--surprise">
					<a data-no-swup="" href="<?php echo get_bloginfo('wpurl'); ?>/surprise">Surprise me!</a>
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
								<h1 class="hero-header">Transform&nbsp;your work&nbsp;day. Find&nbsp;your&nbsp;balance.</h1>
								<p class="hero-subheader">Short & simple exercises empowering you to take better breaks at&nbsp;work.</p>
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
				<div id="home-about-block" class="wp-block-columns">
					<div class="wp-block-column">
						<img class="home-about-block-illu" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-about.png" alt="A woman at her work desk being reminded to use rebalance">
					</div>	
					<div class="wp-block-column">
						<!-- <h3 class="eyebrow">Our Mission</h3> -->
						<h2>Bring balance back into your world</h2>
						<ul>
							<li>We provide a platform with short video exercises for mindful movement and breathwork</li>
							<li>Learn to synchronise your breath with movement to combat the negative effects of sitting</li>
							<li>Use your breath to calm, focus, de-stress or uplift your mind</li>
						</ul>
						<div class="wp-block-buttons">
							<div class="wp-block-button">
								<a class="wp-block-button__link" href="/about" data-no-swup="">Read more</a>
							</div>
						</div>
					</div>		
				</div>
				<div id="home-benefits-block" class="wp-block-columns">
					<div class="wp-block-column">
						<img class="home-benefits-block-illu" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-benefits.png" alt="An out-of-shape world transforms into a perfectly round earth">
					</div>	
					<div class="wp-block-column">
						<!-- <h3 class="eyebrow">The Benefits</h3> -->
						<h2>How can Rebalance help?</h2>
						<ul>
							<li>Taking conscious and effective breaks improves productivity, focus and engagement</li>
							<li>Improve your working environment for you or your whole business</li>
							<li>Reduce incidence of work-related stress, and employee absenteeism and presenteeism</li>
						</ul>
						<div class="wp-block-buttons">
							<div class="wp-block-button">
								<a class="wp-block-button__link" href="/the-benefits" data-no-swup="">Learn more</a>
							</div>
						</div>
					</div>		
				</div>
				<div id="home-example-video-block-breathe" class="home-example-video-block wp-block-columns">
					<div class="wp-block-column">
						<figure class="wp-block-embed-vimeo wp-block-embed is-type-video is-provider-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio">
							<iframe src="https://player.vimeo.com/video/433640250" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
						</figure>
					</div>
					<div class="wp-block-column">
						<h2>Take a Breath</h2>
						<p>Try our One Minute Quick Fix breathwork exercise. This uses an even breathing pattern which immediately calms your nervous system, reducing stress and anxiety. </p>
						<!-- <h3>Benefits:</h3>
						<ul>
							<li>Reduces stress, anxiety, anger and frustration</li>
							<li>Moves your nervous system into a relaxed state of ‘rest and digest’</li>
						</ul> -->
					</div>
				</div>
				<div id="home-example-video-block-move" class="home-example-video-block wp-block-columns">
					<div class="wp-block-column">
						<figure class="wp-block-embed-vimeo wp-block-embed is-type-video is-provider-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio">
							<iframe src="https://player.vimeo.com/video/433719983" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
						</figure>
					</div>
					<div class="wp-block-column">
						<h2>Got a Minute to Move?</h2>	
						<p>Try our One Minute Shoulder Moves. Begin by synchronising the breath with energising shoulder shrugs, then stretch between your shoulder blades to release tension in the area.</p>					
						<!-- <h3>Benefits:</h3>
						<ul>
							<li>Release tension in the shoulder region</li>
							<li>Synchronise the breath with short energising movements</li>
						</ul>
						<h3>Precautions:</h3>
						<ul>
							<li>Perform slowly and with caution if you have a shoulder injury or chronic shoulder pain</li>
						</ul> -->
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
		<?php endif; ?>
<?php
//get_sidebar();
get_footer();
