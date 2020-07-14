<?php
/**
 * Template Name: page-breathe
 * The template for displaying the breathe page
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="breathe-map">
				<div class="breathe-map-inner">
					<?php
					while ( have_posts() ) :
						the_post();
						echo "<div class='exercise-portal-header exercise-portal-header--breathe'><h1>";
						the_title();
						echo "</h1>";
						the_content() ;
						echo "</div>";

					endwhile; // End of the loop.
					?>
					<a href="<?php echo get_home_url(); ?>/exercise-type/just-breathe" class="breathe-map-illu breathe-map-illu--justbreathe">						
						<?php get_template_part('inc/inline', 'ui-home-breathe.svg'); ?>
						just breathe
					</a>
					<a href="<?php echo get_home_url(); ?>/exercise-type/first-aid" class="breathe-map-illu breathe-map-illu--firstaid">
						<!-- <object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-breathe-firstaid.svg" alt="first aid"></object> -->
						<?php get_template_part('inc/inline', 'ui-breathe-firstaid.svg'); ?>
						first aid
					</a>
					<a href="<?php echo get_home_url(); ?>/exercise-type/energize" class="breathe-map-illu breathe-map-illu--energize">
						<!-- <object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-breathe-energize.svg" alt="energize"></object> -->
						<?php get_template_part('inc/inline', 'ui-breathe-energize.svg'); ?>
						energise
					</a>
					<a href="<?php echo get_home_url(); ?>/exercise-type/calm" class="breathe-map-illu breathe-map-illu--calm">
						<!-- <object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-breathe-calm.svg" alt="calm"></object> -->
						<?php get_template_part('inc/inline', 'ui-breathe-calm.svg'); ?>
						calm
					</a>
					<a href="<?php echo get_home_url(); ?>/exercise-type/focus" class="breathe-map-illu breathe-map-illu--focus">
						<!-- <object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-breathe-focus.svg" alt="focus"></object> -->
						<?php get_template_part('inc/inline', 'ui-breathe-focus.svg'); ?>
						focus
					</a>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
