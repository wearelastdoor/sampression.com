<?php
$id = get_post_meta( get_the_ID(), 'wpcf-woo-product-id', true );
$_pf = new WC_Product_Factory();
$_product = $_pf->get_product($id);
?>
<div class="col-md-7">
    <h1 id="product-price-info"><?php echo $_product->post->post_title; ?> - <?php echo $_product->get_price_html(); ?></h1>
    <?php if( get_post_meta( $_product->id, 'wpcf-theme-tagline', true ) ) { ?>
    <h3 class="sub-title"><?php echo get_post_meta($_product->id, 'wpcf-theme-tagline', true); ?></h3>
    <?php } ?>
</div>
<div class="col-md-5">
    <div class="main-actions">
        <div class="button-group">
            <a href="<?php echo get_post_meta($_product->id, 'wpcf-theme-preview-link', true); ?>" target="_blank" class="button secondary-button">Live Theme Demo</a>
            <a href="<?php echo $_product->add_to_cart_url(); ?>" class="button primary-button" data-hover="Learn More">Buy Now</a>
        </div><!-- .button-group -->
        <span class="coupon-trigger">Have a coupon? <a href="#" data-product="<?php echo $_product->id; ?>" id="enter-coupon-code">Click here to enter your code</a></span>
        <form class="coupon-form"> 
            <div class="input-group">
                <input type="text" class="form-control txt-box" placeholder="Coupon Code">
                <span class="input-group-addon" data-product="<?php echo $_product->id; ?>" id="apply-coupon-code">Apply</span>
            </div>
        </form>
    </div> <!-- .main-actions -->
</div><!-- .col-md-5 -->
<pre>
<?php

// echo apply_filters( 'woocommerce_loop_add_to_cart_link',
//     sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
//         esc_url( $_product->add_to_cart_url() ),
//         esc_attr( $_product->id ),
//         esc_attr( $_product->get_sku() ),
//         $_product->is_purchasable() ? 'add_to_cart_button' : '',
//         esc_attr( $_product->product_type ),
//         esc_html( $_product->add_to_cart_text() )
//     ),
// $_product );
//print_r($_product);
// 
// global $woocommerce;
// $woocommerce->cart->add_to_cart($_product->id);
// $woocommerce->cart->add_discount('sampro');
// print_r($woocommerce->cart->get_cart());
?>
</pre>