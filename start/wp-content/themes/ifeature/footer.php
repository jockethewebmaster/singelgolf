<?php
/**
 * Footer Template
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

if( cyberchimps_get_option( 'footer_show_toggle' ) == '1' ) : ?>

	<div id="footer_widgets_wrapper" class="container-full-width">
		<div id="footer_wrapper" class="container">
			<div id="wrapper" class="container-fluid">

				<?php do_action( 'cyberchimps_before_footer_widgets' ); ?>

				<div id="footer-widgets" class="row-fluid">
					<div id="footer-widget-container" class="span12">
						<div class="row-fluid">

							<?php if( !dynamic_sidebar( 'cyberchimps-footer-widgets' ) ) : ?>

								<aside class="widget-container span3">
									<h3 class="widget-title">Singelgolf i Sverige</h3>
									<ul>
                                                                            <li>www.singelgolf.se</li>
									</ul>
								</aside>

								<aside class="widget-container span3">
									<h3 class="widget-title">Epost</h3>
									<ul>
                                                                            <li><a href="mailto:info@singelgolf.se">info@singelgolf.se</a></li>
                                                                            <li><a href="mailto:support@singelgolf.se">support@singelgolf.se</a></li>
									</ul>
								</aside>

								<aside class="widget-container span3">
									<h3 class="widget-title">Telefon</h3>
									<ul>
                                                                            <li>08-441 45 38</li>
                                                                            <li>0739-80 25 06</li>
									</ul>
								</aside>

								<aside class="widget-container span3">
									<h3 class="widget-title">Finans</h3>
									<ul>
										<li>Bankgiro 5400-8594</li>
										<li>Plusgiro 16 40 59-8</li>
									</ul>
								</aside>

							<?php endif; ?>
						</div>
						<!-- .row-fluid -->
					</div>
					<!-- #footer-widget-container -->
				</div>
				<!-- #footer-widgets .row-fluid  -->

				<?php do_action( 'cyberchimps_after_footer_widgets' ); ?>

			</div>
			<!-- container fluid -->
		</div>
		<!-- container -->
	</div><!-- container full width -->

<?php endif; ?>

<?php do_action( 'cyberchimps_before_footer_container' ); ?>

<?php do_action( 'cyberchimps_footer' ); ?>

<?php do_action( 'cyberchimps_after_footer_container' ); ?>

<?php do_action( 'cyberchimps_after_wrapper' ); ?>

<?php wp_footer(); ?>

</body>
</html>