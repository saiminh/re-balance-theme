<?php
/**
 * Template part for displaying results in exercise collections
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		
		<?php if ( !is_singular() ) : ?>
			<?php rebalance_post_thumbnail(); ?>
		<div class="post-info">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<?php else : ?>
			<div class="post-info">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
		<?php
			the_content();	
		endif; ?>

		

		<?php // echo wpdocs_custom_taxonomies_terms_links(); ?> 
		
		
		<footer class="entry-footer">
			<?php 
				global $post;
				$terms = wp_get_post_terms($post->ID, 'exercises-tag');
				if ($terms) {
					$output = array();
					foreach ($terms as $term) {
						$output[] = '<a class="exercises-tag" href="' .get_term_link( $term->slug, 'exercises-tag') .'">' .$term->name .'</a>';
					}
					echo join( ' <span class="divider">•</span> ', $output );
				};
			?>
			<?php rebalance_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
