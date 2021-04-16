<?php
/**
 * Template Name: single-tiny
 * The template for displaying all single tiny posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rebalance
 */

get_header();
while ( have_posts() ) :
	the_post();
	global $post;
	$thisTitle = $post->post_name; ?>
	<div class="rebalance-mini">
		<div class="rebalance-mini-illustration">
			<?php get_template_part( 'inc/inline', 'tiny-illu-'.$thisTitle.'.svg' ); ?>
		</div>
		<div class="rebalance-mini-instructions">
			<h1><?php echo get_the_title(); ?></h1>
			<?php the_content(); ?>
			<a class="button button-confetti">Celebrate Yourself!</a>
		</div>
	</div>
	<div class="after-tiny-nav">
		<a class="tiny-back button button-small button-secondary" href="javascript:history.back()">
			<?php get_template_part('inc/inline', 'back-arrow.svg'); ?> Back
		</a> 
		<a class="tiny-next button button-small button-secondary" href="/surprise">Do another exercise <?php get_template_part('inc/inline', 'back-arrow.svg'); ?></a>
	</div>
<?php endwhile; // End of the loop.

//get_sidebar();
get_footer();
