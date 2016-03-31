<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-8 no-padding">
				<nav class="footer-nav">
					<?php
	                wp_nav_menu(
	                    array(
	                        'theme_location' => 'secondary',
	                        'container' => '',
	                        'menu_class' => 'nav group'
	                    )
	                );
	                ?>
				</nav>
			</div>
			<div class="col-md-4 site-info">
				<p>Sampression Themes is a product of <a target="_blank" href="http://idealaya.co.uk/">&nbsp;IDEALAYA LTD.</a> (Registered in England and Wales).<br />Company Number: 125658  </p>
				<p>  Copyright Sampression Themes 2016.  </p>
				<a target="_blank" href="http://idealaya.co.uk/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-idealaya.png" alt="Idealaya"></a>
			</div>
		</div><!-- .row -->
	</div><!-- .container -->
</footer><!-- #colophon -->
<div id="signin-signup" style="display: none;">
<?php echo do_shortcode( '[woocommerce_social_login_buttons return_url="'.get_bloginfo( 'wpurl' ).'/my-account"]' ); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>