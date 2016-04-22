<?php
// remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
// add_action( 'woocommerce_before_checkout_billing_form', 'woocommerce_checkout_login_form' );

// remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
// add_action( 'woocommerce_before_checkout_billing_form', 'woocommerce_checkout_coupon_form' );


/**
 * Change comment form default field names.
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function sampression_change_translated_text( $translated_text, $text, $domain ) {
    if ( is_page('checkout') ) {
        switch ( $translated_text ) {
            case 'Billing &amp; Shipping' :
                $translated_text = __( 'Your Information', 'sampression' );
                break;
            case 'Billing Details' :
                $translated_text = __( 'Your Information', 'sampression' );
                break;
        }
    }
    return $translated_text;
}
add_filter( 'gettext', 'sampression_change_translated_text', 20, 3 );



function filter_woocommerce_order_button_html( $button ) {
    return $button.'<div class="refund-notice"><strong>30 days money back Guarantee,</strong> If you are not satisfied with our service or product for any reason within 30 days of purchase, we provide you with your money back, no question asked. Please see our <a target="_blank" href="/terms-conditions/#refund-policy">refund policy page</a> to learn more.</div>';
}
add_filter( 'woocommerce_order_button_html', 'filter_woocommerce_order_button_html' );

function sampression_woocommerce_created_customer( $customer_id ) {
	if ( isset( $_POST['mailchimp_subscription'] ) && $_POST['mailchimp_subscription'] == 'yes' ) {
		$user = get_userdata( $customer_id );
		$data = array(
		    'apikey'        => '2f84321899065d3917d5b84de2101c55-us5',
		    'email_address' => $user->user_email,
		    'status'        => 'subscribed'
		);
		$data_json = json_encode($data);
	    $url = 'https://us5.api.mailchimp.com/3.0/lists/79ad14a968/members/';
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
	    curl_setopt($ch, CURLOPT_USERPWD, "user:2f84321899065d3917d5b84de2101c55-us5");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $response  = curl_exec($ch);
	    curl_close($ch);
	}
}
add_action( 'woocommerce_created_customer', 'sampression_woocommerce_created_customer' );

function sampression_woocommerce_register_form_end() {
	echo '<p class="form-row form-row-wide">
		<label for="reg_subscribe"><input checked type="checkbox" name="mailchimp_subscription" value="yes" id="reg_subscribe" /> Subscribe to mailchimp</label>
	</p>';
}
add_action( 'woocommerce_register_form', 'sampression_woocommerce_register_form_end'); 

function sampression_woocommerce_checkout_before_order_review() {
	echo '<div class="woo-order-review"><h3 id="order_review_heading">Your order</h3>';
}
add_action( 'woocommerce_checkout_before_order_review', 'sampression_woocommerce_checkout_before_order_review' );

function sampression_woocommerce_checkout_after_order_review() {
	echo '</div>';
}
add_action( 'woocommerce_checkout_after_order_review', 'sampression_woocommerce_checkout_after_order_review' );

//remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

//add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );

function skyverge_show_coupon() {
	//echo '<p style="padding: 0 15px;"> Have a coupon? <a href="#" id="show-coupon-form">Click here to enter your code</a>.</p>';
	if ( ! WC()->cart->applied_coupons ) {
    $info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
    wc_print_notice( $info_message, 'notice' );
}
?>

<form class="checkout_coupon" method="post" style="display:none">

	<p class="form-row form-row-first">
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
	</p>

	<p class="form-row form-row-last">
		<input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'woocommerce' ); ?>" />
	</p>

	<div class="clear"></div>
</form><?php
}
//add_action( 'woocommerce_review_order_before_payment', 'skyverge_show_coupon' );

// function skyverge_show_coupon_js() {
// 	wc_enqueue_js( '
// 		$( "a.showcoupon" ).parent().hide();
		
// 		$( "body" ).bind( "updated_checkout", function() {
// 			$( "#show-coupon-form" ).click( function() {
// 				$( ".checkout_coupon" ).show();
// 				$( "html, body" ).animate( { scrollTop: 0 }, "slow" );
//   				return false;
// 			} );
// 		} );
// 	');
// }
// add_action( 'woocommerce_before_checkout_form', 'skyverge_show_coupon_js' );

/**
 * Display status of the Toolbar to off
 */
//add_filter( 'show_admin_bar', '__return_false' );

/**
 * Removing additional notes field in checkout page
 */
add_filter('woocommerce_enable_order_notes_field', '__return_false');

// define the woocommerce_get_price_html callback 
function filter_woocommerce_get_price_html( $wc, $cart_item, $cart_item_key ) {
	$amt = (int)$cart_item['data']->subscription_price + (int)$cart_item['data']->subscription_sign_up_fee;
    return '$ '.number_format($amt, 2);
}
         
// add the filter 
add_filter( 'woocommerce_cart_item_price', 'filter_woocommerce_get_price_html', 10, 3 ); 
add_filter( 'woocommerce_cart_item_subtotal', 'filter_woocommerce_get_price_html', 10, 3 ); 

function custom_add_to_cart_message( $message, $product_id ) {
    $_pf = new WC_Product_Factory();
	$_product = $_pf->get_product( $product_id );
    $message = '"' . $_product->post->post_title . '" has been added to your cart - superb choice!';
    return $message;
}
add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message', 10, 2 );

/* function redirect_to_checkout() {
    global $woocommerce;
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}
add_filter ('woocommerce_add_to_cart_redirect', 'redirect_to_checkout'); */

function sampression_split_more_content() {
    global $post;
    $content = $post->post_content;
    $content = explode( '<!--more-->', $content );
    return $content;
}

if ( ! function_exists( 'sampression_setup' ) ) :

function sampression_setup() {

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'sampression' ),
		'secondary' => esc_html__( 'Secondary', 'sampression' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_post_type_support( 'page', 'excerpt' );

}
endif;
add_action( 'after_setup_theme', 'sampression_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function sampression_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sampression_content_width', 640 );
}
add_action( 'after_setup_theme', 'sampression_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function sampression_scripts() {
	
	wp_enqueue_style( 'sampression-font', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600' );
	wp_enqueue_style( 'sampression-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.5' );
	//wp_enqueue_style( 'sampression-fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '2.1.5' );
	//wp_enqueue_style( 'sampression-transitions-style', get_template_directory_uri() . '/css/jquery.fancybox-transitions.css', array(), '0.1' );
	wp_enqueue_style( 'sampression-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sampression-modernizr', get_template_directory_uri() . '/js/modernizr.custom.min.js', array(), '2.6.2', false );
	wp_enqueue_script( 'sampression-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
	wp_enqueue_script( 'sampression-cookie-js', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), '1.4.1', true );
	//wp_enqueue_script( 'sampression-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true );
	//wp_enqueue_script( 'sampression-easing-js', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.3', true );
	//wp_enqueue_script( 'sampression-transitions-js', get_template_directory_uri() . '/js/jquery.fancybox-transitions.js', array('jquery'), '0.1', true );
	wp_enqueue_script( 'sampression-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );

	wp_enqueue_script( 'sampression-selectivizr', get_template_directory_uri() . '/js/selectivizr.js', array(), '1.0.2', true );
	wp_script_add_data( 'sampression-selectivizr', 'conditional', 'lt IE 9' );

	wp_localize_script( 'sampression-main-js', 'SampressionVar',
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        )
    );
}
add_action( 'wp_enqueue_scripts', 'sampression_scripts' );

add_filter('wp_nav_menu_items','sampression_primary_signup', 10, 2);
function sampression_primary_signup( $nav, $args ) {
    if( $args->theme_location == 'primary' ) {
    	if( is_user_logged_in() ) {
    		return $nav . "<li class='menu-item menu-item-type-custom'><a href='/my-account/customer-logout/'>Sign Out</a></li><li class='nav-button menu-item menu-item-type-custom'><a href='/my-account'>My Account</a></li>";
    	} else {
        	return $nav . "<li class='nav-button menu-item menu-item-type-custom'><a href='javascript:void(0)'  class='open-overlay' >Sign In / Sign Up</a></li>";
        }
    }
    return $nav;
}

// function wpb_first_and_last_menu_class($items) {
//     $items[1]->classes[] = 'first';
//     $items[count($items)]->classes[] = 'last';
//     return $items;
// }
// add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

/**
 * Register widget area.
 */
function sampression_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Feature Area', 'sampression' ),
		'id'            => 'feature-area',
		'description'   => 'Home page features area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s col-sm-6 col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'sampression_widgets_init' );

function cb_add_to_cart() {
	$id = $_POST['p_id'];
	$flag = true;
	foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
		$_product = $values['data'];
		if( $id == $_product->id ) {
			$flag = false;
		}
	}
	if($flag) {
		global $woocommerce;
		$woocommerce->cart->add_to_cart($id);
		echo 'Added to cart.';
	} else {
		echo 'Already in cart - Add Again?';
	}
	die;
}
add_action('wp_ajax_add_to_cart', 'cb_add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'cb_add_to_cart');

function cb_apply_coupon_code() {
	$id = $_POST['p_id'];
	$code = $_POST['c_code'];
	global $woocommerce;
	$add = $woocommerce->cart->add_discount($code);
	if($add) {
		echo 'Coupon successfully applied.';
	} else {
		echo 'Invalid coupon code.';
	}
	die;
}
add_action('wp_ajax_apply_coupon_code', 'cb_apply_coupon_code');
add_action('wp_ajax_nopriv_apply_coupon_code', 'cb_apply_coupon_code');




/**
 * Change Proceed To Checkout Text in WooCommerce
 * Place this in your Functions.php file
 **/
function woocommerce_button_proceed_to_checkout() {
	$checkout_url = WC()->cart->get_checkout_url();
	?>
	<a href="<?php echo $checkout_url; ?>" class="checkout-button button alt wc-forward"><?php _e( 'CHECKOUT NOW', 'woocommerce' ); ?></a>
	<?php
}
add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' );

function woo_custom_order_button_text() {

	return __( 'PURCHASE', 'woocommerce' );
}
/* Change the "Proceed to PayPal" button text in the WooCommerce checkout screen
 */
add_filter( 'gettext', 'custom_paypal_button_text', 20, 3 );
function custom_paypal_button_text( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Proceed to PayPal' :
			$translated_text = __( 'PURCHASE', 'woocommerce' );
			break;
	}
	return $translated_text;
}
//override checkout field by custom text and order
//add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
    $fields['billing']['billing_first_name']['placeholder'] = 'First Name*';
	$fields['billing']['billing_last_name']['placeholder'] = 'Last Name*';
    $fields['billing']['billing_company']['placeholder'] = 'Company Name';
    $fields['billing']['billing_email']['placeholder'] = 'Email Address';
    $fields['billing']['billing_country']['placeholder'] = 'Country';
    $fields['billing']['billing_city']['placeholder'] = 'Town / City *';
    unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);

    //this loop remove all the label at once
    foreach ($fields as $category => $value) {
        // loop by fields
        foreach ($fields[$category] as $field => $property) {
            // remove label property
            unset($fields[$category][$field]['label']);
        }
    }
    return $fields;
}

//Remove additional information from checkout
//add_filter('woocommerce_enable_order_notes_field', '__return_false');

//remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

//add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form');


add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
	$url = get_template_directory_uri ();
    return $url. '/images/ajax-loader.gif';
}