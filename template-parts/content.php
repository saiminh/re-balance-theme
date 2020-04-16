<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 	
	if ( !is_singular() ) : 
		rebalance_post_thumbnail(); 
	endif; ?>
	<div class="entry-text">
		<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) :
			
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :			
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );			
				endif;
				
			endif; ?>
		</header><!-- .entry-header -->

		

		<div class="entry-content">

			<?php if ( is_singular() ):
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
			else :
				echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
				the_excerpt();
				echo '</a>';
			endif;
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php // rebalance_entry_footer(); 
				
					rebalance_posted_on();
					//rebalance_posted_by();
					
			?>
		</footer><!-- .entry-footer -->
	</div>
		
</article><!-- #post-<?php the_ID(); ?> -->
