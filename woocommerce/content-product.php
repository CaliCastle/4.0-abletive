<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $mkd_burst_options;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

$product_image_src =  wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

$show_hover_image = 'no';
if(isset($mkd_burst_options['woo_products_enable_item_hover_image'])){
	$show_hover_image = $mkd_burst_options['woo_products_enable_item_hover_image'];
}

$woo_products_enable_lighbox_icon_yes_no = "yes";

if(isset($mkd_burst_options['woo_products_enable_lighbox_icon'])){
	$woo_products_enable_lighbox_icon_yes_no =  $mkd_burst_options['woo_products_enable_lighbox_icon'];
}

$hide_separator = "no";
if(isset($mkd_burst_options['woo_products_title_separator_hide_title_separator'])){
	$hide_separator = $mkd_burst_options['woo_products_title_separator_hide_title_separator'];
}

$classes = array();

if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
    $classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
    $classes[] = 'last';
?>

<li <?php post_class( $classes ); ?>>
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<div class="top-product-section">
			<a href="<?php the_permalink(); ?>">
				<span class="image-wrapper">
				<?php
					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
				</span>
				<?php 
					if($show_hover_image == 'yes') { 
						$product_gallery_images = $product->get_gallery_attachment_ids();
						if ($product_gallery_images) {
							$i = 0;				
							foreach ($product_gallery_images as $image) {
								$image_src = wp_get_attachment_url($image);
								if (!$image_src)
									continue;
							$i++; 
						?>
							<span class="image-wrapper_hover"><?php echo wp_get_attachment_image( $image, 'full' ) ?></span>
							<?php if ($i == 1) break;
							}
						} 
					}
					else{ ?>
						<span class="image-wrapper_hover">
							<?php
								/**
								 * woocommerce_before_shop_loop_item_title hook
								 *
								 * @hooked woocommerce_show_product_loop_sale_flash - 10
								 * @hooked woocommerce_template_loop_product_thumbnail - 10
								 */
								do_action( 'woocommerce_before_shop_loop_item_title' );
							?>
						</span>
					<?php }
				?>
			</a>
			<?php do_action('mkd_woocommerce_after_product_image'); ?>
		</div>
		<div class="product_info_box">
			<span class="product-categories">
				<?php echo wp_kses($product->get_categories(), array(
					'a' => array(
						'href' => true,
						'rel' => true,
						'class' => true,
						'title' => true,
						'id' => true
					)
				)); ?>
			</span>
			<a href="<?php the_permalink(); ?>" class="product-category">            
				<span class="product-title"><?php the_title(); ?></span>
			</a>
			<?php if($hide_separator == "no") { ?>
				<div class="separator_holder"><span class="separator medium"></span></div>
			<?php } ?>
			<div class="shop_price_lightbox_holder">
				<?php
					/**
					 * woocommerce_after_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
				<?php if($woo_products_enable_lighbox_icon_yes_no == "yes") { ?>
					<div class="shop_lightbox">
						<a class="product_lightbox" title="<?php echo esc_attr(the_title()); ?>" href="<?php echo esc_url($product_image_src[0]); ?>" data-rel="prettyPhoto[single_pretty_photo]">
							<span class="fa-search"></span>
						</a>
					</div>
				<?php } ?>
			</div>				
		</div>
		<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
</li>