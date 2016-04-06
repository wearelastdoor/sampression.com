<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** @global WC_Checkout $checkout */

?>
<div class="woocommerce-billing-fields">

	<?php /* if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>

		<h3><?php _e( 'Billing Details', 'woocommerce' ); ?></h3>

	<?php endif; */ ?>

	<?php
	/**
	 * Start - Added from from-login.php
	 *
	 * CHECK IF USER ALREADY LOGGED IN
	 */
	echo '<h3>Your Information</h3>';
	if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
		return;
	}

	$info_message  = apply_filters( 'woocommerce_checkout_login_message', __( 'Returning customer?', 'woocommerce' ) );
	$info_message .= ' <a href="#" class="showlogin">' . __( 'Click here to login', 'woocommerce' ) . '</a>';
	wc_print_notice( $info_message, 'notice' );
	echo '<div class="wc-checkout-login-form">';
	woocommerce_login_form(
		array(
			'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'woocommerce' ),
			'redirect' => wc_get_page_permalink( 'checkout' ),
			'hidden'   => true
		)
	);
	echo '</div>';
	/**
	 * End - Added from from-login.php
	 */
	?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<?php foreach ( $checkout->checkout_fields['billing'] as $key => $field ) : ?>

		<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

	<?php endforeach; ?>

	<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>

	<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

		<?php if ( $checkout->enable_guest_checkout ) : ?>

			<p class="form-row form-row-wide create-account">
				<input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e( 'Create an account?', 'woocommerce' ); ?></label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>

			<div class="create-account">

				<p><?php _e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce' ); ?></p>

				<?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : ?>

					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

				<?php endforeach; ?>

				<div class="clear"></div>

			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

	<?php endif; ?>
</div>