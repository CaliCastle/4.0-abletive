<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
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
 * @version     2.0.0
 */
?>

<?php global $mkd_burst_options;
$products_list_type = 'type1';

$products_hover_list_type = 'hover_type1';
if(isset($mkd_burst_options['woo_products_hover_list_type'])){
    $products_hover_list_type = $mkd_burst_options['woo_products_hover_list_type'];
}
$class='';
$class = 'type1';

$hover_class='';
if($products_hover_list_type == 'hover_type1'){
    $hover_class = 'hover_type1';
} elseif($products_hover_list_type=='hover_type2'){
    $hover_class = 'hover_type2';
}

$disable_space = '';
if(isset($mkd_burst_options['woo_products_disable_space_between_products']) && $mkd_burst_options['woo_products_disable_space_between_products']=='yes' && $products_list_type !='type3'){
	$disable_space = "article_no_space";
}

?>
<ul class="products clearfix <?php echo esc_attr($class .' '. $hover_class.' '. $disable_space); ?>">