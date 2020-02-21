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
		
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();              
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
			   // get_template_part( 'template-parts/content', 'page' );			 	
				?>     
				<header class="page-header">
					<h2 class="page-subtitle" id="lblGreetings">
						<?php global $current_user; wp_get_current_user(); ?>
							<?php if ( is_user_logged_in() ) { 
								//echo 'Username: ' . $current_user->user_login . "\n"; 
								echo $current_user->display_name . "\n"; } 
							else { wp_loginout(); } ?></h2>

					<h1 class="page-title"><?php the_title(); ?></h1>
			</header>
				
			

				<div class="choose-exercise-links">          
					<div class="choose-exercise-link--move"><a href="<?php echo get_bloginfo('wpurl'); ?>/move/">Move</a></div>
					<div class="choose-exercise-link--breathe"><a href="<?php echo get_bloginfo('wpurl'); ?>/breathe/">Breathe</a></div>
				</div>
				<div class="front-page-search">
				<?php get_search_form( ); ?> 
				<a href="">Surprise me!</a>
			</div>
                <?php

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
