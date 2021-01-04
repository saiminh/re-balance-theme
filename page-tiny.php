<?php
/**
 * Template Name: page-tiny
 * The template for displaying the tiny page
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="tiny-map">
        <div class="tiny-map-title">
          <h1>Tiny Exercises</h1>
          <p>Super quick exercises with short descriptions</p>
        </div>
				<div class="tiny-map-inner">					
					<a href="<?php echo get_home_url(); ?>/exercise-type/tiny-breathwork/" class="tiny-map-illu tiny-map-illu--breathe">						
						<?php get_template_part('inc/inline', 'ui-tiny-breathe.svg'); ?>
						Breathe
          </a>
          <a href="<?php echo get_home_url(); ?>/exercise-type/tiny-movements/" class="tiny-map-illu tiny-map-illu--move">						
            <?php get_template_part('inc/inline', 'ui-tiny-move.svg'); ?>
            Move
          </a>
          <a href="<?php echo get_home_url(); ?>/exercise-type/tiny-nows/" class="tiny-map-illu tiny-map-illu--now">						
            <?php get_template_part('inc/inline', 'ui-tiny-now.svg'); ?>
            Now
            <span class="tiny-map-illu-subtitle">Small bursts of mindfulness, gratitude and happiness</span>
          </a>
					
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
