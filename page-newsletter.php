<?php
/**
 * Template Name: page-newsletter
 * The template for displaying all messaging and management of the mailpoet newsletter
 *
 * @package rebalance
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <article>
                <?php 
                    while ( have_posts() ) :
                        the_post();
                        //the_title();
                        the_content(); 
                    endwhile; 
                ?>
            </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
