<?php global $product; ?>
<li>
	<div class="product_list_widget_image_wrapper">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<?php echo mkd_burst_kses_img($product->get_image()); ?>
		</a>
	</div>	
	<div class="product_list_widget_info_wrapper">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<span class="product-title"><?php echo esc_html($product->get_title()); ?></span>
		</a>
		<?php if ( ! empty( $show_rating ) ) echo wp_kses($product->get_rating_html(), array(
        'div' => array(
            'class' => true,
            'title' => true,
            'style' => true,
            'id' => true
        ),
        'span' => array(
            'style' => true,
            'class' => true,
            'id' => true,
            'title' => true
        ),
        'strong' => array(
            'class' => true,
            'id' => true,
            'style' => true,
            'title' => true
        ))); ?>
		<?php echo wp_kses_post($product->get_price_html()); ?>
	</div>
</li>