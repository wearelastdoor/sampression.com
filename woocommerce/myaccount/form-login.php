<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="col2-set" id="customer_login">

	<div class="col-1">

<?php endif; ?>

		<h2 class="add-bottom"><?php _e( 'Login to your account', 'woocommerce' ); ?></h2>

		<form method="post" class="login clearfix">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="form-row form-row-first col">
				<input type="text" class="input-text" name="username" id="username" placeholder="Username *" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
			</p>
			<p class="form-row form-row-last col">
				<input class="input-text" type="password" name="password" id="password" placeholder="Password *" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row col btn-wrap">
				<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
			</p>
			<p class="form-row col">
				<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-2 box transparent-box clearfix registration-section">

		<h2><?php _e( "Don't have an account ?", 'woocommerce' ); ?></h2>
		<div class="seven columns alpha ">
			<form method="post" class="register">
				<p>Register free to get access to our free themes.</p>
				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<p class="form-row form-row-wide">
						<input type="text" class="input-text" name="username" placeholder="Username *" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
					</p>

				<?php endif; ?>

				<p class="form-row form-row-wide">
					<input type="email" class="input-text" placeholder="Email *" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
				</p>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
		
					<p class="form-row form-row-wide">
						<input type="password" class="input-text" name="password" placeholder="Password *" id="reg_password" />
					</p>

				<?php endif; ?>

				<!-- Spam Trap -->
				<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

				<?php do_action( 'woocommerce_register_form' ); ?>
				<?php do_action( 'register_form' ); ?>

				<p class="form-row">
					<?php wp_nonce_field( 'woocommerce-register' ); ?>
					<input type="submit" class="button" name="register" value="<?php _e( 'Register', 'woocommerce' ); ?>" />
				</p>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>
		</div>
		<div class="nine columns omega alignright">
			<img class="scale-with-grid" alt="" src="/wp-content/uploads/register-placeholderimg.png">
		</div>
	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>