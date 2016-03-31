<?php

//add_filter ('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');

function redirect_to_checkout() {
    global $woocommerce;
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}

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
	wp_enqueue_style( 'sampression-fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '2.1.5' );
	wp_enqueue_style( 'sampression-transitions-style', get_template_directory_uri() . '/css/jquery.fancybox-transitions.css', array(), '0.1' );
	wp_enqueue_style( 'sampression-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sampression-modernizr', get_template_directory_uri() . '/js/modernizr.custom.min.js', array(), '2.6.2', false );
	wp_enqueue_script( 'sampression-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
	wp_enqueue_script( 'sampression-cookie-js', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), '1.4.1', true );
	wp_enqueue_script( 'sampression-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true );
	//wp_enqueue_script( 'sampression-easing-js', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'sampression-transitions-js', get_template_directory_uri() . '/js/jquery.fancybox-transitions.js', array('jquery'), '0.1', true );
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
    		return $nav . "<li class='nav-button menu-item menu-item-type-custom'><a href='/my-account/customer-logout/'>Sign Out</a></li>";
    	} else {
        	return $nav . "<li class='nav-button menu-item menu-item-type-custom'><a href='#signin-signup' class='fancybox'>Sign In / Sign Up</a></li>";
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
		'before_widget' => '<div id="%1$s" class="widget %2$s col-md-3">',
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

/*
<div class="col-md-3">
						<img class="ico" src="uploads/Design.png" alt="Design">
						<h4>Design</h4>
						<p>Every one of our themes are created with great attention to detail.</p>
					</div>
 */


