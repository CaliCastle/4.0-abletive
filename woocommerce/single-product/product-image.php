<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>
<div class="images">
	<div id="single-product-slider">
			<?php
			//Image Slider
			$attachment_count = count( $product->get_gallery_attachment_ids() );

            $icon_navigation_class = 'arrow_carrot-';
            if (isset($mkd_burst_options['carousel_navigation_arrows_type']) && $mkd_burst_options['carousel_navigation_arrows_type'] != '') {
                $icon_navigation_class = $mkd_burst_options['carousel_navigation_arrows_type'];
            }

            $direction_nav_classes = mkd_burst_horizontal_slider_icon_classes($icon_navigation_class);

            if ( has_post_thumbnail() ) {
                $attachment_count = count( $product->get_gallery_attachment_ids() );
                $gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
                $props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
                $image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
                    'title'	 => $props['title'],
                    'alt'    => $props['alt'],
                ) );
                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $props['url'], $props['caption'], $image ), $post->ID );
            } else {
                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'burst' ) ), $post->ID );
            }

			if ( $attachment_count > 0 ) {

				$attachment_ids = $product->get_gallery_attachment_ids();
				foreach ( $attachment_ids as $attachment_id ) {
					$image_link = wp_get_attachment_image_src($attachment_id, 'full');
					$image = wp_get_attachment_image($attachment_id, apply_filters('single_product_large_thumbnail_size', 'shop_single'));
					echo apply_filters('woocommerce_single_product_image_html', sprintf('<a href="%s" itemprop="image" class="woocommerce-main-image zoom" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link[0], $image));
				}

                //generate navigation html
                ?>
			<?php }
			?>
	</div>

    <ul class="caroufredsel-direction-nav">
        <li class="caroufredsel-prev-holder">
            <a id="caroufredsel-prev" class="single-product-gallery-prev caroufredsel-navigation-item caroufredsel-prev" href="javascript: void(0)">
            	<img src="<?php echo esc_url(get_template_directory_uri() . '/img/arrow-left-slider.png'); ?>" alt="arrow" />
            </a>
        </li>
        <li class="caroufredsel-next-holder">
            <a class="single-product-gallery-next caroufredsel-next caroufredsel-navigation-item" id="caroufredsel-next" href="javascript: void(0)">
            	<img src="<?php echo esc_url(get_template_directory_uri() . '/img/arrow-right-slider.png'); ?>" alt="arrow" />
            </a>
        </li>
    </ul>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
