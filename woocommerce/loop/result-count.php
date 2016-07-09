<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( ! woocommerce_products_will_display() )
	return;
?>
<p class="woocommerce-result-count">
	<?php
	$paged    = max( 1, $wp_query->get( 'paged' ) );
	$per_page = $wp_query->get( 'posts_per_page' );
	$total    = $wp_query->found_posts;
	$first    = ( $per_page * $paged ) - $per_page + 1;
	$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

	if ( 1 == $total ) {
		esc_html_e( 'Showing the single result', 'burst' );
	} elseif ( $total <= $per_page || -1 == $per_page ) {
		printf( esc_html__( 'Showing all %d results', 'burst' ), $total );
	} else {
		printf( _x( '%1$d-%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'burst' ), $first, $last, $total );
	}
	?>
</p>