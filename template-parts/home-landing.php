<?php
/**
 * Template part for displaying the landing page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

?>
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
                <a class="wp-block-button__link" href="/try-rebalance-for-free" data-no-swup="">Free Trial</a>
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
      <h2>
        What we offer
      </h2>
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
    </div>

    <div id="home-how-block">
      <h2>
        How can we help?
      </h2>
      <div class="wp-block-columns">
        <div class="wp-block-column featured">
          <div class="featured-thumbnail">
            <img class="" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-benefits-bad.png" alt="A woman at her work desk working hard and slouching" />
          </div>
          <div class="featured-text">
            <h3>Are you feeling:</h3>
            <ul>
              <li>Stressed?</li>
              <li>Lacking energy and focus?</li>
              <li>Exhausted and overwhelmed?</li>
              <li>Stiff and sluggish?</li>
            </ul>		
          </div>
        </div>
        <div class="wp-block-column featured">
          <div class="featured-thumbnail">
            <img class="" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-benefits.png" alt="A woman at her work desk being reminded to use rebalance" />
          </div>
          <div class="featured-text">
            <h3>Quick, doable, effective</h3>
            <ul>
              <li>Short exercises (30 seconds to 1 minute)</li>
              <li>Performed discreetly at your desk</li>
              <li>Based on traditional methods</li>
              <li>Supported by scientific research</li>
            </ul>		
          </div>
        </div>
        <div class="wp-block-column featured">
          <div class="featured-thumbnail">
            <img class="" src="<?php echo get_template_directory_uri(); ?>/img/home-illu-smiling-woman.png" alt="A woman smiling" />
          </div>
          <div class="featured-text">
            <h3>Learn practical tools to:</h3>
            <ul>
              <li>Improve your mood & workday</li>
              <li>De-stress, re-energise and get focussed</li>
              <li>Combat the effects of sitting and screen time</li>
              <li>Build a habit of taking tiny breaks</li>
            </ul>		
          </div>
        </div>	
      </div>
      <div class="wp-block-buttons">
        <div class="wp-block-button">
          <a class="wp-block-button__link button-secondary" href="/why-rebalance" data-no-swup="">Learn more</a>
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
          <a class="wp-block-button__link" href="/try-rebalance-for-free" data-no-swup="">Get Access</a>
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