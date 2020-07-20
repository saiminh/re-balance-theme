<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rebalance
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
				<span class="site-info-element">
					© <?php echo date("Y"); ?> Re.Balance BV
				</span>
				<a class="site-info-element" href="/contact/">Contact</a>
				<a class="site-info-element" href="/about/">About</a>
				<a class="site-info-element" href="/privacy-policy/">Terms&nbsp;&&nbsp;Conditions</a>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
