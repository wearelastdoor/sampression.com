<?php
/*
	=================================================
	Sampression - Default Footer Template
	=================================================
*/
?>
<footer id="footer" class="clearfix">

    <div class="footer-top">
            <div class="container">
                <div class="sixteen columns">
                 <!--    <aside class=" column-one col widget-recent-blog">
                            <h5 class="widget-title">Recent from our blog</h5>
                            <div class="widget-entry">
                                <?php
                                    $args = array('posts_per_page' => 3);
                                    $myposts = get_posts($args);
                                    foreach ($myposts as $post) : setup_postdata($post);
                                        ?>
                                        <h6 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h6>
                                        <p><?php echo substr(get_the_excerpt(),0,100); ?></p>
                                    <?php endforeach;
                                    wp_reset_postdata();
                                    ?>
                            </div>
                        </aside> -->
                        <!--.aside-->
                    <?php dynamic_sidebar('footer-widget-area'); ?>
                </div>
            </div>
        </div>
    <!--.footer-top-->
    <div class="footer-bottom">
      <div class="container">
        <div class="sixteen columns">
          <nav class="alpha nine columns secondary-nav">
           <?php h5bs_secondary_nav(); ?>
          </nav>
            <div class="widget-follow-us-on">
             <h6>Social</h6>
             <a href="http://facebook.com/sampression" class="fb" target="_blank"><i class="icon-facebook"></i></a>
             <a href="http://twitter.com/Thesampression" class="tw" target="_blank"><i class="icon-twitter"></i></a>
                <a href="https://profiles.wordpress.org/sampression/" class="tw" target="_blank"><i class="icon-wordpress2"></i></a>
                <a href="https://github.com/sampression" class="tw" target="_blank"><i class="icon-github"></i></a>
           </div>

            <p id="copyright-details">&copy; 2014 - <?php echo date( 'Y' ); ?> Copyright<a target="_blank" href="http://idealaya.co.uk/">&nbsp;Idealaya Ltd.</a></p>
            <div class="hidden payment-options">
                <h6>We Accept</h6>
                <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png" alt="PayPal Acceptance Mark" />
            </div>
        </div>
          <a id="hidden-link" class="hidden fancybox" href="#promotion-trigger">hidden_link</a>
         <div id="promotion-trigger" style="max-width:450px;display: none;">
             <img class="offer-badge" src="<?php echo get_template_directory_uri(); ?>/images/offer-badge.png" alt="offer-badge" />
             <h2>Sampression Pro Theme</h2>
             <p>Our new theme <strong>Sampression Pro</strong> is ready for purchase for <strong>US$ 49.00</strong>. We are giving a <strong>50%</strong> early bird discount if you subscribe to our newsletter.</p>
             <h4>Get your coupon now!</h4>
             <p>Offer valid for till 31 March 2015.</p>
             <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
         </div>
      </div>
    </div>
    <!--.footer-bottom-->
  </footer>
  <!--#footer--> 
 </div><!-- #inner-wrapper -->
</div><!-- #wrapper -->

<?php // JavaScript added through functions.php to avoid conflicts

if(is_page(642)){ ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $.cookie("sampressionPopup", 'yes', { expires: 60 });
        });
    </script>

<?php }

?>

<!-- Prompt IE 6 & 7 users to install Chrome Frame -->
<!--[if lt IE 8 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

<?php wp_footer(); ?>

<?php if ( ! current_user_can( 'edit_pages' ) ) : // don't track admins or editors ?>
<?php endif; ?>

</body>
</html>
