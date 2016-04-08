<div class="subscription-block inverse">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Claim your 30% Discount Today</h4>
                <?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true" tabindex="101"]'); ?>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .subscription-block -->
</main><!-- #main -->
</div><!-- #content -->
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
                <p>Sampression Themes is a product of <a target="_blank" href="http://idealaya.co.uk/">&nbsp;IDEALAYA
                        LTD.</a> (Registered in England and Wales).<br/>Company Number: 125658  </p>
                <p>  Copyright Sampression Themes 2016. </p>
                <a target="_blank" href="http://idealaya.co.uk/"><img
                        src="<?php echo get_template_directory_uri(); ?>/images/logo-idealaya.png" alt="Idealaya"></a>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</footer><!-- #colophon -->

<div id="signin-signup" class="overlay">
   <span class="overlay-close">x</span>
    <div class="overlay-dialog  overlay-dialog-confirm">
        <?php echo do_shortcode('[woocommerce_social_login_buttons return_url="' . get_bloginfo('wpurl') . '/my-account"]'); ?>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>