<?php
class Mikado_Burst_Woocommerce_Dropdown_Cart extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'mkd_woocommerce_dropdown_cart', // Base ID
			'Mikado Woocommerce Dropdown Cart', // Name
			array( 'description' => esc_html__( 'Mikado Woocommerce Dropdown Cart', 'burst' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		
		global $woocommerce; 
		global $mkd_burst_options;
		?>
		<div class="shopping_cart_outer">
			<div class="shopping_cart_inner">
				<div class="shopping_cart_header">
					<?php 

					$dropdown_classes = 'header_cart ';

					if(isset($mkd_burst_options['cart_skin_color']) && $mkd_burst_options['cart_skin_color'] == "light") {
							$dropdown_classes .= 'light_cart';
					 } ?>

					<a class="<?php echo esc_attr($dropdown_classes); ?>" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
						<span class="header_cart_span"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span>
					</a>
					<div class="shopping_cart_dropdown">
						<div class="shopping_cart_dropdown_inner1">
							<?php
							$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
							$list_class = array( 'cart_list', 'product_list_widget' );
							?>
							<ul>

								<?php if ( !$cart_is_empty ) : ?>

									<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

										$_product = $cart_item['data'];

										// Only display if allowed
										if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
											continue;
										}

										// Get price
										$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();
										?>


										<li>
											<div class="item_image_holder">
												<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
													<?php echo wp_kses($_product->get_image(), array(
														'img' => array(
															'src' => true,
															'width' => true,
															'height' => true,
															'class' => true,
															'alt' => true,
															'title' => true,
															'id' => true
														)
													)); ?>
												</a>
											</div>
											<div class="item_info_holder">
												<div class="item_left">
													<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'])); ?>">
														<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
													</a>
													<?php echo apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
												</div>
												<div class="item_right">
													<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'burst') ), $cart_item_key ); ?>
												</div>
											</div>
										</li>

									<?php endforeach; ?>
									<div class="cart_bottom">
										<div class="subtotal_holder">
											<span class="total"><?php esc_html_e( 'Subtotal', 'burst' ); ?>:</span>
											<span class="total_amount">
												<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
													'span' => array(
														'class' => true,
														'id' => true
													)
												)); ?>
											</span>
										</div>
										<div class="btns_holder">
											<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="qbutton small view-cart"><?php esc_html_e( 'View Your Cart', 'burst' ); ?></a>
											<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="qbutton small checkout"><?php esc_html_e( 'Checkout', 'burst' ); ?></a>
										</div>
									</div>
								<?php else : ?>

									<li class="empty_cart"><?php esc_html_e( 'No products in the cart.', 'burst' ); ?></li>

								<?php endif; ?>

							</ul>
						</div>
						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
						

						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();

		return $instance;
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget( "Mikado_Burst_Woocommerce_Dropdown_Cart" );' ) );
?>
<?php
add_filter('add_to_cart_fragments', 'mkd_burst_woocommerce_header_add_to_cart_fragment');
function mkd_burst_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce; 
	global $mkd_burst_options;
	ob_start();
	?>
	<div class="shopping_cart_header">
			<?php 

			$dropdown_classes = 'header_cart ';

			if(isset($mkd_burst_options['cart_skin_color']) && $mkd_burst_options['cart_skin_color'] == "light") {
					$dropdown_classes .= 'light_cart';
			 } ?>

			<a class="<?php echo esc_attr($dropdown_classes); ?>" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>">
				<span class="header_cart_span"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span>
			</a>
		<div class="shopping_cart_dropdown">
			<div class="shopping_cart_dropdown_inner1">
				<?php
				$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
				//$list_class = array( 'cart_list', 'product_list_widget' );
				?>
				<ul>

					<?php if ( !$cart_is_empty ) : ?>

						<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

							$_product = $cart_item['data'];

							// Only display if allowed
							if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
								continue;
							}

							// Get price
							$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();
							?>

							<li>
								<div class="item_image_holder">
									<?php echo wp_kses($_product->get_image(), array(
										'img' => array(
											'src' => true,
											'width' => true,
											'height' => true,
											'class' => true,
											'alt' => true,
											'title' => true,
											'id' => true
										)
									)); ?>
								</div>
								<div class="item_info_holder">
									<div class="item_left">
										<a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
											<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
										</a>
										<?php echo apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>

									</div>
									<div class="item_right">
										<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'burst') ), $cart_item_key ); ?>

									</div>
								</div>
							</li>

						<?php endforeach; ?>
							<div class="cart_bottom">
								<div class="subtotal_holder">
									<span class="total"><?php esc_html_e( 'Subtotal', 'burst' ); ?>:</span>
									<span class="total_amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
											'span' => array(
												'class' => true,
												'id' => true
											)
										)); ?>
									</span>
								</div>
								<div class="btns_holder">
									<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="qbutton small view-cart"><?php esc_html_e( 'View Your Cart', 'burst' ); ?></a>
									<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="qbutton small checkout"><?php esc_html_e( 'Checkout', 'burst' ); ?></a>
								</div>
							</div>
					<?php else : ?>

						<li class="empty_cart"><?php esc_html_e( 'No products in the cart.', 'burst' ); ?></li>

					<?php endif; ?>

				</ul>
			</div>
			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
			

			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
		</div>
	</div>

	<?php
	$fragments['div.shopping_cart_header'] = ob_get_clean();
	return $fragments;
}
?>