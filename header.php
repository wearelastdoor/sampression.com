<?php
/*
  =================================================
  Sampression - Default Header Template
  =================================================
 */
?>
<!doctype html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="author" content="Sampression | www.sampression.com">

        <!-- Mobile Specific Metas
          ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php wp_title('|', true, 'right');
bloginfo('name'); ?></title>

        <!-- CSS
          ================================================== -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/skeleton-16.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/superfish.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/fonts.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/flexslider.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/woocommerce.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/jquery.jscrollpane.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/responsive-tables.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/css/jquery.fancybox.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link href='//fonts.googleapis.com/css?family=Kreon:400,300,700' rel='stylesheet' type='text/css'>
<!--      <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300|Roboto:500,300,700,400' rel='stylesheet' type='text/css'>-->
        <link href='//fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Roboto:500,300,700,400' rel='stylesheet' type='text/css'>
        
        <!-- Favicons
                ================================================== -->
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
        <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-114x114.png">

        <!--[if lt IE 9]>
                <script src="<?php echo get_template_directory_uri(); ?>/lib/js/selectivizr.js?v=1.0.2"></script>
        <![endif]-->

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-34035460-2', 'sampression.com');
            ga('send', 'pageview');

        </script>
        <script>(function() {
                var _fbq = window._fbq || (window._fbq = []);
                if (!_fbq.loaded) {
                    var fbds = document.createElement('script');
                    fbds.async = true;
                    fbds.src = '//connect.facebook.net/en_US/fbds.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(fbds, s);
                    _fbq.loaded = true;
                }
                _fbq.push(['addPixelId', '1539349919652507']);
            })();
            window._fbq = window._fbq || [];
            window._fbq.push(['track', 'PixelInitialized', {}]);
        </script>
        <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1539349919652507&amp;ev=PixelInitialized" /></noscript>
<?php wp_head(); ?>
    </head>

    <body <?php dynamicBody(); ?>>

<div id="wrapper">
       <div id="inner-wrapper">
        <header id="header">
            <div class="container clearfix"> 
                <div class="top-header clearfix sixteen columns">
                    <div id="site-title" class="five columns alpha">
<!--                        <a href="--><?php //echo home_url('/'); ?><!--" id="logo" class="col">--><?php //bloginfo('name'); ?><!--</a>-->
                        <a href="<?php echo home_url('/'); ?>" id="logo" class="col"><img src="<?php echo get_template_directory_uri(); ?>/images/sampression-logo.png" alt="Sampression Logo" /> </a>
                        <!-- <span class="slogan">Amazing Free &amp; <span>Premium WordPress Themes</span></span> -->
                        <div class="toggle-nav">
                            <span class="ico-bar"></span>
                            <span class="ico-bar"></span>
                            <span class="ico-bar"></span>
                        </div>
                    </div>

                    <nav id="primary-nav" class="eleven columns">
                        <div id="header-search" class="search-box clearfix">
                            <form action="<?php bloginfo('url'); ?>">
                                <input type="text" placeholder="Search" class="text-field" value="<?php the_search_query(); ?>" name="s" id="s">
                                <button type="submit" value="" class="submit" id="searchsubmit"><span>Go</span></button>
                            </form>

                        </div>

                        <?php h5bs_primary_nav(); ?>
                        <ul class="shop-nav main-nav">
                            <?php  $current_user = wp_get_current_user(); ?>
                            <li><a href="<?php echo home_url('/'); ?>sign-up-login"><i class="icon-user3"></i>
                                    <?php if ( is_user_logged_in() ) {echo 'My Account';}else{echo 'Sign Up / Login'; } ?></a>
                                <?php if ( is_user_logged_in() ) { ?>
                                    <ul class="sub-menu">
                                        <?php /* ?>
                                <li><a href="<?php echo home_url('/'); ?>my-account/change-password/">Change Password</a></li>
                                <li><a href="<?php echo home_url('/'); ?>my-account/view-order/">View Order</a></li>
                                <li><a href="<?php echo home_url('/'); ?>my-account/lost-password/">Lost Password</a></li>
                                 <?php */ ?>
                                        <li><a href="<?php echo home_url('/'); ?>?customer-logout=true">Logout</a></li>
                                    </ul>
                                <?php } ?>
                            </li>
                            <li class="cart-menu"><a href="<?php echo home_url('/'); ?>cart"><i class="icon-cart-add"></i>Cart<?php global $woocommerce; if( $woocommerce->cart->cart_contents_count > 0 ) { echo '<span>'.$woocommerce->cart->cart_contents_count.'</span>'; } ?></a></li>
                            <li><a href="https://support.sampression.com/hc/communities/public/topics"><i class="icon-users2"></i>Community</a></li>
                        </ul>
                    </nav>
                    <!-- #primary-nav -->


                </div>
                <!--.top-header--> 
            </div>
            <!--.container-->

        </header>
        <!-- #header -->    
<?php if (is_front_page()) { ?>
    <section class="billboard-wrap">
    <div class="container">
      <div class="billboard clearfix sixteen columns">
          <div class="home-slider flexslider">
              <ul class="slides">
                <?php $args = array('post_type'=>'home-slider','show_posts' => -1);
                query_posts($args);
                while (have_posts()) : the_post();
                ?>
                  <li>
                      <div class="columns seven alpha">
                          <?php the_content();?>
                          <?php
                          $ext_link = '';
                          $wp_directory = get_post_meta(get_the_ID(), 'wpcf-wordpress-directory', true);
                          if($wp_directory == 1) {
                            $ext_link = '_blank';
                          }
                          ?>
                          <div class="links">
                            <a href="<?php echo get_post_meta($post->ID, 'wpcf-live-demo', true); ?>" class="button2 button" target="_blank">
                              <i class="icon-eye"></i>
                              Live Demo
                            </a>
                            <a href="<?php echo get_post_meta($post->ID, 'wpcf-theme-download', true); ?>" class="button" target="<?php echo $ext_link; ?>">
                              <?php echo get_post_meta($post->ID, 'wpcf-slider-button-text', true); ?>
                            </a>
                          </div>
                      </div>
                       <div class="columns nine omega">
                      <figure class=" image-holder">
                          <a href="<?php echo get_post_meta($post->ID, 'wpcf-theme-download', true); ?>">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="<?php the_title(); ?>" />
                          </a>
                      </figure>
                      </div>
                  </li>
                  <?php endwhile; wp_reset_query(); ?>
              </ul>
          </div>
      </div>
    </div>
  </section><!--.billboard-wrap-->
   <?php }elseif(is_singular('product')) { ?>
    <div class="billboard-wrap">
     <div class="container">
      <div class="billboard clearfix sixteen columns">
            <?php if (function_exists('bcn_display')) { ?>
            <div class="breadcrumb">
                <?php bcn_display(); ?>
            </div>
            <?php }  global $post; ?> 
          <?php $product_version = get_post_meta($post->ID, 'wpcf-theme-version', true); ?>
           <h1 class="page-title"><?php  the_title(); ?><?php if($product_version){ echo ' - '.$product_version; } ?></h1>
           <?php $slogan = get_post_meta($post->ID, 'wpcf-theme-tagline', true); ?>
           <?php if($slogan){ ?>
           <h2 class="page-slogan"> <?php echo $slogan; ?> </h2>
           <?php } ?>
        <div class="description-block clearfix">
            <div class="columns ten alpha">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
            <div class="download-box six columns offset-by-one omega">
              <?php /**********************************************/ ?>
               <div class="summary entry-summary">
              <?php
              while ( have_posts() ) : the_post();
                  $wp_directory = get_post_meta(get_the_ID(), 'wpcf-wordpress-directory', true);
                  if($wp_directory == 1) {
                    ?>
                      <span class="price">Free &nbsp;</span>
                      <div class="links">

                          <a href="<?php echo get_post_meta(get_the_ID(), 'wpcf-live-demo', true); ?>" class="button2 button" target="_blank"><i class="icon-eye"></i>Live Demo</a>
                          <?php
                          $coming_soon = get_post_meta( get_the_ID(), 'wpcf-comming-soon', true);
                          if($coming_soon != 1){ ?>
                              <a href="<?php echo get_post_meta(get_the_ID(), 'wpcf-wordpress-url', true); ?>" class=" button"><i class="icon-arrow-down-alt1"></i> Download</a>
                          <?php } ?>
                      </div>
                    <?php
                  } else {
                    /**
                     * woocommerce_single_product_summary hook
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action( 'woocommerce_single_product_summary' );
                  }
                endwhile;
              ?>
            </div><!-- .summary -->
                <span class='st_fblike_hcount'></span>
                <span class='st_twitter_hcount'></span>
                <span class='st_facebook_hcount'></span>
                <span class="st_plusone_hcount"></span>

            <?php /**********************************************/ ?>
                
            </div>

        </div>
        <div id="theme-slider" class="flexslider">
            <ul class="slides">
                 <?php
                        $slide = get_post_meta($post->ID, "wpcf-product-image");
                        if (count($slide) > 0 && $slide[0] != '') {
                            ?>
                             <?php for ($y = 0; $y < count($slide); $y++) { ?>
                                <li>
                                     <img src="<?php bloginfo('template_url'); ?>/timthumb/timthumb.php?src=<?php echo $slide[$y]; ?>&w=940&h=415" class="scale-with-grid" alt="slide image">
                                </li>
                            <?php }
                            ?>
                            <?php
                        }
                        ?>
                    </ul>
            </ul>
        </div>
        
      </div>
    </div>
  </div>
  <!--.billboard-wrap-->
    
<?php }else{ ?>
<div class="billboard-wrap">
<div class="container">
    <div class="billboard clearfix sixteen columns">
                <div class="breadcrumb">
                    <?php
                    if(is_post_type_archive( 'product' )) {
                      do_action('lds_woo_breadcrumb');
                    } else {
                      if (function_exists('bcn_display')) {
                        bcn_display();
                      }
                    }
                    ?>
                </div>
        <h1 class="page-title"><?php if( is_home()){ echo 'Blog';}elseif( is_search()){echo 'Search';}elseif( is_404()){echo '404';}elseif(is_shop()){echo 'Themes';} elseif(is_singular( 'post' )){ echo 'Blog'; }else{ the_title(); }?></h1>
    </div>
</div>
</div>
<!--.billboard-wrap-->
<?php } ?>
