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
		<div class="site-footer-container">
			<div class="newsletter-signup-form">
				<h3>Receive our fortnightly newsletter</h3>
				<?php 
					$form_widget = new \MailPoet\Form\Widget();
					echo $form_widget->widget(array('form' => 1, 'form_type' => 'php'));
				?>
			</div>
			<div class="site-info">	
				<div>
					<h3>Rebalance</h3>
					<a class="site-info-element" href="/contact/">Contact</a>
					<a class="site-info-element" href="/about/">About</a>
					<a class="site-info-element" href="/why-rebalance/">Why rebalance?</a>
				</div>	
				<div>
					<h3>Legal</h3>
					<a class="site-info-element" href="/terms-of-use/">Terms&nbsp;of&nbsp;Use</a>
					<a class="site-info-element" href="/terms-and-conditions-of-sale/">Terms of Sale</a>
					<a class="site-info-element" href="/privacy-policy/">Privacy Policy</a>
					<a class="site-info-element" href="/cookie-policy/">Cookie Policy</a>
					<span class="site-info-element">
						©&nbsp;<?php echo date("Y"); ?>&nbsp;Rebalance&nbsp;for&nbsp;work
					</span>
				</div>
			</div><!-- .site-info -->			
		</div>		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
