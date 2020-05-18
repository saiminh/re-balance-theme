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
//echo $ta;
wp_redirect( get_the_permalink( $my_random_post->posts[$ta]), 307 );

//apply_filters( 'the_permalink', $my_random_post->posts[$ta]->post_url );
//wp_redirect ( get_permalink (), 307 );

// process the database request through WP_Query
// while ( $my_random_post->have_posts () ) {
//   $my_random_post->the_post ();
  // redirect the user to the random post 
  //wp_redirect ( get_permalink (), 307 );
  // echo '<p>';
  // the_title();
  // echo '</p>';
  //exit;
//}
?>