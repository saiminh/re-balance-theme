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
	$thisTitle = $post->post_name;
	echo '<div class="rebalance-mini">';
	echo '<div class="rebalance-mini-illustration">';
		get_template_part( 'inc/inline', 'tiny-illu-'.$thisTitle.'.svg' );
	echo '</div>';
	echo '<div class="rebalance-mini-instructions">';
	echo '<h1>'.get_the_title().'</h1>';
		the_content();
	echo '<a class="button button-confetti">Celebrate Yourself!</a></div></div>';
endwhile; // End of the loop.

//get_sidebar();
get_footer();
