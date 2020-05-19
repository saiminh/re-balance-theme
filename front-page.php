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
				<div class="choose-exercise-link--move"><a href="<?php echo get_bloginfo('wpurl'); ?>/move/">I want to Move</a></div>
				<div class="choose-exercise-link--breathe"><a href="<?php echo get_bloginfo('wpurl'); ?>/breathe/">I want to Breathe</a></div>
				<div class="choose-exercise-link--surprise"><a data-no-swup="" href="<?php echo get_bloginfo('wpurl'); ?>/surprise">Surprise me!</a></div>
			</div>
			</main><!-- #main -->
	</div><!-- #primary -->
		<?php else : ?>
		<div id="primary" class="content-area content-area--landing">
			<?php get_template_part('inc/inline', 'ui-home-breathe.svg'); ?>
			<main id="main" class="site-main">
				
				<?php
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile;
					?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php endif; ?>
		

<?php
get_sidebar();
get_footer();
