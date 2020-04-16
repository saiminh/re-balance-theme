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
			
			<header class="page-header">								
				<?php
					if ( is_tax( 'types' ) ) :
						show_breadcrumb(single_tag_title("", false),"types");
					elseif ( is_tax( 'exercises-tag' ) ) :
						show_breadcrumb(single_tag_title("", false),"exercises-tag");
					endif;
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				//the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<div class="toggle-discreet">
					<label class="switch"><input type="checkbox"><span class="toggle-label-text">Discreet</span><span class="slider round hide-off"></span> </label>		
				</div>
			</header><!-- .page-header -->
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
				
				<div class="posts-row">
					
					
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();

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
