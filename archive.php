<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

get_header();
?>
	<div id="primary" class="content-area">
		
		<?php if ( have_posts() ) : ?>			
			
			<main id="main" class="site-main">		
				<?php if ( is_tax( 'types' ) ) : 
					$postCount = 1;
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
						echo '</div>'; ?>
				<?php else: ?>
					<div class="posts-grid">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				
				if ( is_tax() ) :
					echo rebalance_get_the_posts_navigation();
				else :
					the_posts_navigation();
				endif;

			endif;

		else :
			echo '<main id="main" class="site-main">';
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
