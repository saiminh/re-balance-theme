<?php
/**
 * Template Name: page-registration
 * The template for displaying the registration page
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
        
                        the_content(); 
                    endwhile; 
                ?>
            </article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
