<?php
/**
 * Template Name: page-surprise
 * The template for redirecting to a random exercise
 *
 * @package rebalance
 */

//get_header();
 // set arguments for WP_Query()
$args = array(
    'post_type' => 'exercises',
    'posts_per_page' => -1,
    //'orderby' => 'rand',
);

// get a random post from the database
$my_random_post = new WP_Query ( $args );
$a = $my_random_post->posts;
$ta = array_rand($a, 1);
wp_redirect( get_the_permalink( $my_random_post->posts[$ta]), 307 );
?>