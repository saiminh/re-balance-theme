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
						
			<?php if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
			<?php endif; ?>

			<?php $postCount = 1;
				while ( have_posts() ) : $postCount++;

					if( $postCount == 2 ) :
						echo'<div class="sticky-post">';
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
						echo'</div>';
					elseif( $postCount == 3 ) :
						echo'<div class="posts-row">';
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					else :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endif;
				endwhile; 
				echo '</div>';
			?>
			</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
