<?php
/**
 * Template Name: page-move
 * The template for displaying the move page
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="move-bodyparts-map">
			<?php
			while ( have_posts() ) :
				the_post();
				echo "<div class='exercise-portal-header exercise-portal-header--move'><h1>";
				the_title();
				echo "</h1>";
				the_content() ;
				echo "</div>";

			endwhile; // End of the loop.
			?>
				<?php get_template_part( 'inc/inline', 'ui-move-map.svg' ); ?>
				<!-- <object data="<?php echo get_template_directory_uri(  ); ?>/img/ui-move-map.svg" type="image/svg+xml"></object> -->

				<div class="move-bodypart-group move-bodypart-group--head">
					<a class="move-bodypart-link move-bodypart-link--eyes" href="<?php echo get_home_url(); ?>/exercise-type/eyes">eyes</a>
					<a class="move-bodypart-link move-bodypart-link--neck" href="<?php echo get_home_url(); ?>/exercise-type/neck">neck</a>
					
				</div>
				<div class="move-bodypart-group move-bodypart-group--body">
					<a class="move-bodypart-link move-bodypart-link--full-body" href="<?php echo get_home_url(); ?>/exercise-type/full-body">full body</a>
					<a class="move-bodypart-link move-bodypart-link--shoulders" href="<?php echo get_home_url(); ?>/exercise-type/shoulders">shoulders</a>
					<a class="move-bodypart-link move-bodypart-link--torso" href="<?php echo get_home_url(); ?>/exercise-type/torso">torso</a>
					<a class="move-bodypart-link move-bodypart-link--upper-body" href="<?php echo get_home_url(); ?>/exercise-type/upper-body">upper body</a>
					<a class="move-bodypart-link move-bodypart-link--upper-back" href="<?php echo get_home_url(); ?>/exercise-type/upper-back">upper back</a>
					
				</div>
				<div class="move-bodypart-group move-bodypart-group--hands">
					<a class="move-bodypart-link move-bodypart-link--wrists" href="<?php echo get_home_url(); ?>/exercise-type/wrists">wrists</a>
					<a class="move-bodypart-link move-bodypart-link--hands" href="<?php echo get_home_url(); ?>/exercise-type/hands">hands</a>
					<a class="move-bodypart-link move-bodypart-link--fingers" href="<?php echo get_home_url(); ?>/exercise-type/fingers">fingers</a>
				</div>
				<div class="move-bodypart-group move-bodypart-group--legs">
					<a class="move-bodypart-link move-bodypart-link--lower-back" href="<?php echo get_home_url(); ?>/exercise-type/lower-back">lower back</a>
					<a class="move-bodypart-link move-bodypart-link--lower-body" href="<?php echo get_home_url(); ?>/exercise-type/lower-body">lower body</a>
					<a class="move-bodypart-link move-bodypart-link--hips" href="<?php echo get_home_url(); ?>/exercise-type/hips">hips</a>
					<a class="move-bodypart-link move-bodypart-link--legs" href="<?php echo get_home_url(); ?>/exercise-type/legs">legs</a>
				</div>
				<div class="move-bodypart-group move-bodypart-group--feet">
					<a class="move-bodypart-link move-bodypart-link--ankles" href="<?php echo get_home_url(); ?>/exercise-type/ankles">ankles</a>
					<a class="move-bodypart-link move-bodypart-link--feet" href="<?php echo get_home_url(); ?>/exercise-type/feet">feet</a>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
