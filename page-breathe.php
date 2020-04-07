<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<a class="back-button" href="javascript:history.back()"><?php get_template_part('inc/inline', 'back-arrow.svg'); ?> Back</a>
		<div class="breathe-map">
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
				<object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-home-breathe.svg" alt="just breathe"></object>
				just breathe
			</a>
			<a href="<?php echo get_home_url(); ?>/exercise-type/first-aid" class="breathe-map-illu breathe-map-illu--firstaid">
				<object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-breathe-firstaid.svg" alt="first aid"></object>
				first aid
			</a>
			<a href="<?php echo get_home_url(); ?>/exercise-type/energize" class="breathe-map-illu breathe-map-illu--energize">
				<object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-breathe-energize.svg" alt="energize"></object>
				energize
			</a>
			<a href="<?php echo get_home_url(); ?>/exercise-type/calm" class="breathe-map-illu breathe-map-illu--calm">
				<object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-breathe-calm.svg" alt="calm"></object>
				calm
			</a>
			<a href="<?php echo get_home_url(); ?>/exercise-type/focus" class="breathe-map-illu breathe-map-illu--focus">
				<object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/img/ui-breathe-focus.svg" alt="focus"></object>
				focus
			</a>
		</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
