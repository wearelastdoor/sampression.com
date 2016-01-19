<?php
/*
	=================================================
	Sampression - Default Home Template
	=================================================
*/
get_header(); ?>  
  <section id="content" class="clearfix">
      <div class="text-center site-description">
          <div class="container">
              <h1>Minimal WordPress themes</h1>
              <h2>Making customization easy </h2>
<!--              <h3>loved by over <strong>--><?php //$result = count_users(); echo $result['total_users'];?><!--</strong> customers </h3>-->
          </div><!-- .container -->
      </div>
    <section class="primary-content">
        <div class="container clearfix">

            <div class="woocommerce">
               <ul class="products clearfix">
                    <?php $args = array('post_type'=>'product','posts_per_page' => 2);
                        query_posts($args);
                        global $product, $woocommerce_loop;
                        $counter =0;
                        while (have_posts()) : the_post();
                            $counter ++;

                            if(($counter%2) == 0){
                                $class='eight columns';
                            }else{
                                $class='eight columns clear-left';
                            }
                        ?>
                    <li <?php post_class($class); ?>>
                            <?php do_action('woocommerce_before_shop_loop_item'); ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                /**
                                 * woocommerce_before_shop_loop_item_title hook
                                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                                 **/
                                 if(get_post_meta($post->ID, 'wpcf-new-theme', true) =='yes' ){
                                 echo '<span class="new-tag">new</span>' ;
                                 }
                                if(get_post_meta($post->ID, 'wpcf-premium-theme', true) =='yes' ){
                                    echo '<span class="premium-tag">Premium</span>' ;
                                }
                                 /** 
                                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                                 */ ?>
                                <?php
                                do_action('woocommerce_before_shop_loop_item_title');
                                ?>
                                <h3><?php the_title(); ?></h3>
                                <span class="theme-tag"><?php echo get_post_meta(get_the_ID(),'wpcf-theme-tagline', true);?></span> 
                                <?php
                                /**
                                 * woocommerce_after_shop_loop_item_title hook
                                 *
                                 * @hooked woocommerce_template_loop_price - 10
                                 */
                                do_action('woocommerce_after_shop_loop_item_title');
                                ?>
                            </a>
                            <?php do_action('woocommerce_after_shop_loop_item'); ?>
                    </li>
                     <?php  endwhile; wp_reset_query(); ?>
                </ul> 
        <!--.products--> 
            </div> 
        </div>
      </section>
       <!--.primary-content-->
    <section class="secondary-content">
      <div class="container clearfix">
        <div class="sixteen columns alpha omega">
            <div class="five columns">
                <i class="icon-Palette"></i>
                <h4>Aesthetic Design</h4>
                <p>Every theme we produce is a state of the art designed by our professionals. We provide themes with simple yet elegant designs that make your website tasteful.  </p>
            </div>
            <div class="six columns">
                <i class="icon-Box-Full"></i>
                <h4>Marvellous Features</h4>
                <p>Our responsive and retina ready themes provide user friendly theme options panel that helps you customize your website in accordance to your need and use.</p>
            </div>
            <div class="five columns">
                <i class="icon-Support"></i>
                <h4>Terrific Support</h4>
                <p>We have a support team dedicated to our customers. Our team provides outstanding tech support regardless of your experience in WordPress. </p>
            </div>
<!--          <h2 class="sec-title">Recent from our blog</h2>-->
<!---->
<!---->
<!---->
<!---->
<?php
//                                    $args = array('posts_per_page' => 3);
//                                    $myposts = get_posts($args);
//                                    $i=0;
//                                    foreach ($myposts as $post) : setup_postdata($post);
//                                       $content = get_the_excerpt();
//                                       // $excerpt = strip_tags($content);
//                                        ?>
<!--                                        <div class="five columns--><?php //if($i==0){ echo " alpha"; }?><!--">-->
<!--                                        <h6 class="post-title"><a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a> </h6>-->
<!---->
<!--                                        <p>--><?php //echo wp_trim_words($content, 18, '...'); ?><!--&nbsp;<a href="--><?php //the_permalink(); ?><!--" class="link"> Read More</a></p>-->
<!---->
<!--                                        </div>-->
<!--                                    --><?php //$i++; endforeach;
//                                    wp_reset_postdata();
//                                    ?>


      </div>
     </div>
    </section>
    <!--.secondary-content--> 
  </section>
	
<?php get_footer(); ?>