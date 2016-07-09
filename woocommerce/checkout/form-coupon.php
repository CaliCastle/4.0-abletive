<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! WC()->cart->coupons_enabled() ) {
	return;
}

$info_message = apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'burst' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'burst' ) . '</a>' );
wc_print_notice( $info_message, 'notice' );
?>

<form class="checkout_coupon" method="post" style="display:none">

	<div class="coupon">
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_html_e( 'Enter coupon code', 'burst' ); ?>" id="coupon_code" value="" />
		<input type="submit" class="button" name="apply_coupon" value="<?php esc_html_e( 'Apply Coupon', 'burst' ); ?>" />
	</div>

	<div class="clear"></div>
</form>