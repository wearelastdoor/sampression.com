<?php

/**
 * Template Name: Sampression-Pro
 */
get_header();
?>
<div id="content" class="site-content">
    <main id="main" class="site-main">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="site-description min-height">
    <div id="getFixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1><?php the_title() ?></h1>
                        <?php if( get_post_meta( get_the_ID(), 'wpcf-sub-title', true ) ) { ?>
                        <h3 class="sub-title"><?php echo get_post_meta( get_the_ID(), 'wpcf-sub-title', true ) ?></h3>
                        <?php } ?>
                    </div>
                    <div class="col-md-5">
                        <div class="main-actions">
                            <div class="button-group">
                                <?php if( get_post_meta( get_the_ID(), 'wpcf-live-demo-url', true ) ) { ?>
                                <a href="<?php echo get_post_meta( get_the_ID(), 'wpcf-live-demo-url', true ) ?>" target="_blank" class="button secondary-button">Live Theme Demo</a>
                                <?php } ?>
                                <a href="/cart/?add-to-cart=<?php echo get_post_meta( get_the_ID(), 'wpcf-woo-product-id', true ); ?>" class="button primary-button" data-hover="Learn More">Buy Now</a>
                                <a href="#comprasion-feature-block" class="compare-link">I want to Compare Lite and Pro before Buying</a>
                            </div><!-- .button-group -->
                        </div> <!-- .main-actions -->
                    </div><!-- .col-md-5 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!--#getFixed-->
        </div><!-- .site-description -->
        <div class="theme-block clearfix">
            <div class="container">
                <div class="row">
                    <?php
                    if( has_post_thumbnail() ) {
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                    ?>
                    <figure class="left">
                        <img src="<?php echo $image[0] ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
                    </figure>
                    <?php
                    }
                    ?>
                    <div class="theme-details">
                        <?php the_content(); ?>
                    </div><!-- .theme-details -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .theme-block -->
        <div class="theme-features">
            <div class="container theme-feature-section">
                <div class="row center">
                    <div class="col-md-12">
                        <div class="col-md-offset-1 col-md-10 feature-brief">
                            <h2>Customize Everything, With Live Previews</h2>
                            <p>The Sampression PRO Theme Customizer is packed full of hundreds of design controls for
                                setting up the basic styles of your website, including header styles, typography styles,
                                content spacing, footer layout, default colors and so much more.</p>
                        </div><!-- .feature-brief -->
                        <img src="/wp-content/uploads/Customizer.jpg" alt="Customizer">
                    </div><!-- .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
            <div class="theme-feature-section">
                <div class="container">
                    <div class="row center">
                        <div class="col-md-12">
                            <div class="col-md-offset-1 col-md-10 feature-brief">
                                <h2>Header Options with Slider</h2>
                                <p>Customizing your website's header is easy with Extra. Choose from different layouts,
                                    customize fonts, adjust colors, change font sizes and more. When combined, these
                                    settings allow for a wide range of different header styles.</p>
                            </div><!-- .feature-brief -->
                        </div><!-- .col-md-12 -->
                    </div><!-- .row -->
                </div><!-- .container -->
                <div class="container-fluid">
                    <img class="aligncenter" src="/wp-content/uploads/Header_options.jpg" alt="Header_options">
                </div><!-- .container-fluid -->
            </div><!-- .theme-feature-section -->
            <div class="container theme-feature-section">
                <div class="row center">
                    <div class="col-md-offset-1 col-md-10 feature-brief">
                        <h2>Blog Post Masonry Layout &amp; Options</h2>
                        <p>Customizing your website's header is easy with Extra. Choose from different layouts,
                            customize fonts, adjust colors, change font sizes and more. When combined, these settings
                            allow for a wide range of different header styles.</p>
                    </div><!-- .feature-brief -->
                    <div class="col-md-4">
                        <div class="preview-box">
                            <img src="/wp-content/uploads/Mixed_layout.jpg" alt="Mixed_layout">
                            <a href="#" class="button small primary-button">Live Demo</a>
                        </div><!-- .preview-box -->
                        <h4 class="preview-title">Mixed Layout Blog Option</h4>
                    </div><!-- .col-md-4 -->
                    <div class="col-md-4">
                        <div class="preview-box">
                            <img src="/wp-content/uploads/Three_columns_layout.jpg" alt="Three_columns_layout">
                            <a href="#" class="button small primary-button">Live Demo</a>
                        </div><!-- .preview-box -->
                        <h4 class="preview-title">Three Column</h4>
                    </div><!-- .col-md-4 -->
                    <div class="col-md-4">
                        <div class="preview-box">
                            <img src="/wp-content/uploads/Two_columns_layout.jpg" alt="Two_columns_layout">
                            <a href="#" class="button small primary-button">Live Demo</a>
                        </div><!-- .preview-box -->
                        <h4 class="preview-title">Two Column</h4>
                    </div><!-- .col-md-4 -->
                </div><!-- .row -->
            </div><!-- .container -->
            <div class="responsive-feature-block">
                <div class="container theme-feature-section">
                    <div class="row center">
                        <div class="col-md-offset-1 col-md-10 feature-brief">
                            <h2>Fully Responsive</h2>
                            <p>We know that your website needs to be readable on all devices while still allowing
                                visitors to share your web pages. Monarch's sharing icons are fully responsive and look
                                great all the way down to even the smallest mobile devices.</p>
                        </div>
                        <figure class="bottom"><img src="/wp-content/uploads/responsive.png" alt="responsive"></figure>
                    </div>
                </div>
            </div><!--responsive-feature-block-->
            <div class="container theme-feature-section">
                <div class="row text-right mrgn-top">
                    <div class="col-md-offset-1 col-md-6 feature-brief">
                        <h3>Right-To-Left (RTL) Support</h3>
                        <p>When you enable an RTL language within your WordPress Dashboard, Divi will automatically
                            switch to RTL mode. Not only is the front-end website adjusted, but even the Divi builder
                            interface has been fully customized for RTL users.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="/wp-content/uploads/translated-r-t-l.png" alt="">
                    </div>
                </div>
            </div><!--theme-feature-section-->
            <div class="container theme-feature-section">
                <div class="row text-left mrgn-top">
                    <div class="col-md-5">
                        <img src="/wp-content/uploads/translated-front-back-end.png" alt="">
                    </div>
                    <div class="col-md-6 feature-brief">
                        <h3>Fully Translated Inside &amp; Out</h3>
                        <p>Not only are front-end elements translated, but we also expanded the theme’s localization to
                            cover the Divi builder interface, including all form fields and descriptions.</p>
                    </div>

                </div>
            </div><!--theme-feature-section-->
            <div class="comprasion-feature-block" id="comprasion-feature-block">
                <div class="container theme-feature-section">
                    <div class="row center">
                        <div class="col-md-offset-2 col-md-8 feature-brief">
                            <h3>Compare Sampression Lite with Sampression Pro</h3>
                            <p>Here comes the Pro version of our theme Sampression Lite with many amazing features as
                                per
                                our user's suggestions and request. Have a look, what's new on Sampression Pro.</p>
                        </div>
                        <div class="col-lg-10 col-md-offset-1">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="compare-title">Features</th>
                                    <th class="compare-lite">SAMPRESSION LITE</th>
                                    <th class="compare-pro">SAMPRESSION PRO</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="active">
                                    <td>Revolution Slider Compatible</td>
                                    <td><img src="<?php echo get_template_directory_uri(); ?>/images/cancel.png" alt="cancel"></td>
                                    <td><img src="<?php echo get_template_directory_uri(); ?>/images/ok.png" alt="cancel"></td>
                                </tr>
                                <tr>
                                    <td>Font Family</td>
                                    <td>20 Google Font</td>
                                    <td>50+ Google Font</td>
                                </tr>

                                <tr class="active">
                                    <td>Font size Options</td>
                                    <td><img src="<?php echo get_template_directory_uri(); ?>/images/cancel.png" alt="cancel"></td>
                                    <td><img src="<?php echo get_template_directory_uri(); ?>/images/ok.png" alt="cancel"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a href="#" class="button secondary-button">Download</a></td>
                                    <td><a href="#" class="button primary-button">BUY NOW</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--responsive-feature-block-->
        </div><!-- #features -->
<?php
endwhile;
get_footer();