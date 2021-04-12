<?php
/**
 * Template part for displaying results in exercise collections
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rebalance
 */

?>
<?php if ( is_singular() ) : //The single exercise ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('exercise-single-article'); ?>>
		<div class="post-info">
			<header class="entry-header">
			<?php // the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<?php the_content(); ?>
			<footer class="entry-footer">
				<?php rebalance_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

<?php else : //The exercise on an archive page ?> 
	<div id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
		<div class="card-thumbnail">
			<?php rebalance_post_thumbnail(); ?>
		</div>
		<div class="post-info">
			<header class="card-header">				
				<?php 		
					$thisid = get_the_ID(  );
					echo get_first_embed_media($thisid);
				?>
				<?php the_title( sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .card-title -->
			<div class="card-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<footer class="card-footer">
				<?php rebalance_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div><!-- #post-<?php the_ID(); ?> -->
<?php endif;?>
		
	
