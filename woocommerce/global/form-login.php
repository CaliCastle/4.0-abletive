<?php
/**
 * Login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form method="post" class="login check-login" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<div class="login-entrance-text">
		<?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>
	</div>
		
	<p class="form-row form-row-first">
		<input type="text" placeholder="<?php esc_html_e( 'Username or email', 'burst' ); ?>" class="input-text placeholder" name="username" id="username" />
	</p>
	<p class="form-row form-row-last">
		<input class="input-text placeholder" placeholder="<?php esc_html_e( 'Password', 'burst' ); ?>" type="password" name="password" id="password" />
	</p>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<p class="form-row">
		<?php wp_nonce_field( 'woocommerce-login' ); ?>
		<input type="submit" class="button" name="login" value="<?php esc_html_e( 'Login', 'burst' ); ?>" />
		<a class="lost_password" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'burst' ); ?></a>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
		<label for="rememberme" class="inline woo-my-account-rememberme">
			<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'burst' ); ?>
		</label>
	</p>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>