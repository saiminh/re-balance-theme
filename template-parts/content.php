<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

?>
<?php if ( is_singular() ) : //The single blog post ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!-- Blog post header:  -->
		<header class="entry-header" style="background-image: url(<?php the_post_thumbnail_url('medium_large') ; ?>), linear-gradient(180deg, #ffe8e0 0%, #c4e3f2 80%, #9ACFE9 100%);">		
			<div class="entry-header-text">
				<div class="pre-entry-meta">
					<?php 
						rebalance_posted_by();
						rebalance_posted_on();
					?>
				</div>
				<?php the_title( '<h1 class="entry-title">', '</h1>' );	?>					
			</div>	
		</header>
		<div class="entry-content">
			<?php 
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'rebalance' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rebalance' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->

<?php else : // blog post in the blog archive ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
		<div class="card-thumbnail">
			<?php rebalance_post_thumbnail(); ?>
		</div>
		<div class="entry-text">
			<header class="card-header">		
				<div class="entry-header-text">				
					<?php				
							echo '<div class="pre-entry-meta">';							
									//rebalance_posted_by();
									rebalance_posted_on();							
							echo '</div>';
							the_title( '<h2 class="card-title"><a class="card-mainlink" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );	
					?>					
				</div>
			</header>
			<div class="card-summary">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

		
			
			

	
		
