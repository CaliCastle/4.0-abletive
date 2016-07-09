<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $mkd_burst_options;
/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

    <?php if(isset($mkd_burst_options['woo_products_info_style']) && ($mkd_burst_options['woo_products_info_style'])=="vertical_tabs"){?>
		<div class="mkd_tabs vertical tab_with_text left woocommerce-tabs">
			<ul class="tabs clearfix tabs-nav">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<li class="<?php echo esc_attr($key); ?>_tab">
						<a href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="panel entry-content tabs-container" id="tab-<?php echo esc_attr($key); ?>">
					<?php call_user_func( $tab['callback'], $key, $tab ) ?>
				</div>

			<?php endforeach; ?>
		</div>
	<?php }  else {?>
		<div class="mkd_accordion_holder toggle boxed woocommerce-accordion <?php if(isset($mkd_burst_options['accordion_toggle_boxed_background_pattern']) && $mkd_burst_options['accordion_toggle_boxed_background_pattern']!='no'){ echo "has_pattern";} ?>">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<h6 class="title-holder clearfix <?php echo esc_attr($key); ?>_tab">
					<span class="accordion_mark left_mark"><span class="accordion_mark_icon"><span class="icon_plus"></span><span class="icon_minus-06"></span></span></span>
					<span class="tab-title"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ) ?></span>
				</h6>
				<div class="accordion_content">
					<div class="accordion_content_inner">
						<?php call_user_func( $tab['callback'], $key, $tab ) ?>
					</div>
				</div>

			<?php endforeach; ?>
		</div>
	<?php } ?>

<?php endif; ?>