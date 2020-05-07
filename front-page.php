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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php if ( SwpmMemberUtils::is_member_logged_in()) : ?>

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
				<div class="choose-exercise-link--move"><a href="<?php echo get_bloginfo('wpurl'); ?>/move/">Move</a></div>
				<div class="choose-exercise-link--breathe"><a href="<?php echo get_bloginfo('wpurl'); ?>/breathe/">Breathe</a></div>
			</div>
		<?php else : ?>
			<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
				?>
		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
