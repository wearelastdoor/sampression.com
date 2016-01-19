<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

get_header('shop');
?>
<div id="content" class="clearfix">
    <section class="primary-content">
        <div class="container clearfix">
            <div class="eleven columns">
                <a name="features"></a>
                <h2 class="with-border">Features</h2>
                <div class="basic features-list inner-container clearfix">
                    <?php
                    $terms = get_the_terms($post->ID, 'product_feature');
                    $counter=0;

                    foreach ($terms as $term) {
                        $counter ++;

                        if(($counter%2) == 0){
                            $class='seven offset-by-one columns ';
                        }else{
                            $class='seven columns alpha clear-left';
                        }
                        ?>
                     <div class="<?php echo $class; ?>">
                        <h4><?php echo $term->name; ?></h4>
                         <span class="<?php echo get_term_meta($term->term_id, 'feature_icon', true); ?>"></span>
                        <p><?php echo get_term_meta($term->term_id, 'feature_excerpt', true); ?></p>
                    </div>
                    <?php }
                    ?>
                </div>
                <?php
                global $post;
                $changelog_title = lds_get_post_meta($post->ID, 'txt_changelog_title');
                $changelog_cnt = lds_get_post_meta($post->ID, 'txt_changelog_cnt');
                if($changelog_title[0] != ''){
                ?>
                <div class="box-changelog">
                    <a name="change-log"></a>
                    <h3>Change Log</h3>
                    <div id="expandable-panels">
                        <div class="panel">
                            <?php
                            if (count($changelog_title) > 0 && $changelog_title[0] != '') {
                            ?>
                             <?php for ($y = (count($changelog_title)-1); $y >=0 ; $y--) { ?>
                            <div class="panel">
                            <h4><?php echo $changelog_title[$y]; ?></h4>
                                    <div class="entry">
                                        <?php echo $changelog_cnt[$y]; ?>
                                    </div>
                            </div>
                            <?php }
                            ?>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <!--.box-changelog--> 
                <?php } ?>
            </div>
            <div id="sidebar" class="five columns">
                <div class="widget-container widget-theme-overview">
                    <h2 class="widget-title">Theme Overview</h2>
                    <div class="widget-entry">
                        <ul>
                            <?php if (get_post_meta($post->ID, 'wpcf-release-date', true)){ ?>
                            <li>
                                <i class="icon-calendar"></i>
                                <div class="entry">
                                    <h4>Released Date</h4>
                                    <time datetime="2002-10-13"><?php
                                        $show_date = get_post_meta($post->ID, 'wpcf-release-date', true);
                                        echo date("F j, Y", $show_date); 
                                        ?>
                                    </time>
                                </div>
                            </li>
                            <?php } ?>
                            <li> 
                                <i class="icon-file-html"></i>
                                <div class="entry">
                                    <h4>Theme Type</h4>
                                    <?php
                                    $my_terms = get_the_terms($post->ID, 'product_cat');
                                    if ($my_terms && !is_wp_error($my_terms)) {
                                        $output = array();
                                        foreach ($my_terms as $term) {
                                            $output[] = $term->name;
                                        }
                                        echo '<span>'.implode(', ', $output).'</span>';
                                    }
                                    ?>
                                </div>
                            </li>
                            <li>
                                <i class="icon-document"></i>
                                <div class="entry">
                                    <a href="<?php echo get_post_meta($post->ID, 'wpcf-documentation-link', true); ?>" target="_blank">
                                    <h4>Documentation</h4>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--.widget-entry--> 
                </div>
              <?php dynamic_sidebar('woocommerce-widget'); ?>
            </div>
            <!--#sidebar-->
        </div> 
    </section>
</div>
<!--#content-->

<?php get_footer('shop'); ?>