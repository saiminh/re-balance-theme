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
      <?php if(!rebalance_member_is_logged_in()) : ?>
        <div class="newsletter-signup-form">
          <h3>Receive our fortnightly newsletter</h3>
          <?php 
            $form_widget = new \MailPoet\Form\Widget();
            echo $form_widget->widget(array('form' => 1, 'form_type' => 'php'));
          ?>
        </div>
      <?php endif; ?>
			<div class="site-info">	
				<div>
					<h3>Rebalance</h3>
					<a class="site-info-element" href="/contact/">Contact</a>
          <?php if(!rebalance_member_is_logged_in()) : ?>
					<a class="site-info-element" href="/about/">About</a>
					<a class="site-info-element" href="/why-rebalance/">Why rebalance?</a>
          <?php endif; ?>
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
	<?php if(!rebalance_member_is_logged_in()) : ?>
	<div class="rebalance-popup rebalance-popup--bottomleft free-pdf-signup-form">
		<div class="close">
			<svg class="close-x" style="position: absolute; right: 1.5rem; top: 1.33rem; width: 1em; height: 1em;" x="0px" y="0px" viewBox="0 0 96 96" enable-background="new 0 0 96 96" xml:space="preserve">
				<polygon fill="#FF9B7A" points="96,14 82,0 48,34 14,0 0,14 34,48 0,82 14,96 48,62 82,96 96,82 62,48 "></polygon>
			</svg>
		</div>
		<?php 
			if ( get_site_url() == 'http://re-balance.local' ){
				$pdfformid = 3;
			} else {
				$pdfformid = 3; //seem to be the same right now but maybe not in the future
			}
			$form_widget = new \MailPoet\Form\Widget();
			echo $form_widget->widget(array('form' => $pdfformid, 'form_type' => 'php'));
		?>
	</div>
	<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
