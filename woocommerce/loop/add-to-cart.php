<?php
/**
 * Loop Add to Cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product,$mkd_burst_options;

$animate_button_class='';
if(isset($mkd_burst_options['add_to_cart_button_hover_animation']) && ($mkd_burst_options['add_to_cart_button_hover_animation'] !== '')){
	$animate_button_class = $mkd_burst_options['button_hover_animation'];
}

$type = "type1";

$add_to_cart_text= $product->add_to_cart_text();

if ( ! $product->is_in_stock() ) : ?>
   <div class="product_image_overlay"></div><span class="onsale out-of-stock-button"><span><?php echo apply_filters( 'out_of_stock_add_to_cart_text', esc_html__( 'Out of stock', 'burst' ) ); ?></span></span>
<?php else :
echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<div class="product_image_overlay"></div><div class="add-to-cart-button-outer"><div class="add-to-cart-button-inner"><div class="add-to-cart-button-inner2"><a class="product_link_over" href="'.get_permalink($product->id).'"></a><a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="qbutton '.$animate_button_class.' add-to-cart-button button %s product_type_%s"><span class="text_wrap">%s</span><span class="a_overlay"></span></a></div></div></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->product_type ),
		esc_html( $add_to_cart_text )
	),
$product );

endif;
?>