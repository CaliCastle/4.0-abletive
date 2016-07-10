<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} else {
	$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	if ( file_exists( $root.'/wp-load.php' ) ) {
    	require_once( $root.'/wp-load.php' );
	}
}
header('Content-type: application/x-javascript');
?>

var header_height = 83;
var min_header_height_scroll = 57;
var header_one_scroll_resize = false;
var min_header_height_sticky = 70;
var scroll_amount_for_sticky = 85;
var min_header_height_fixed_hidden = 45;
var header_bottom_border_weight = 1;
var scroll_amount_for_fixed_hiding = 200;
var menu_item_margin = 0;
var large_menu_item_border = 0;
var element_appear_amount = -150;
var paspartu_width_init = 0.02;
var directionNavArrows = 'arrow_carrot-';
var directionNavArrowsTestimonials = 'fa fa-angle-';
var enable_navigation_on_full_screen_section = false;
<?php
if(is_admin_bar_showing()){
?>
var add_for_admin_bar = 32;
<?php
}else{
?>
var add_for_admin_bar = 0;
<?php
}
?>
<?php if(isset($mkd_burst_options['header_height'])){
	if ($mkd_burst_options['header_height'] !== '') { ?>
	header_height = <?php echo esc_attr($mkd_burst_options['header_height']); ?>;
<?php } } ?>
<?php if(isset($mkd_burst_options['header_height_scroll'])){
	if ($mkd_burst_options['header_height_scroll'] !== "") { ?>
	min_header_height_scroll = <?php echo esc_attr($mkd_burst_options['header_height_scroll']); ?>;
<?php } } ?>
<?php if(isset($mkd_burst_options['header_one_scroll_resize'])){
	if ($mkd_burst_options['header_one_scroll_resize'] === "yes") { ?>
	header_one_scroll_resize = true;
<?php } } ?>
<?php if(isset($mkd_burst_options['header_height_sticky'])){
	if ($mkd_burst_options['header_height_sticky'] !== "") { ?>
	min_header_height_sticky = <?php echo esc_attr($mkd_burst_options['header_height_sticky']); ?>;
<?php } } ?>
<?php if(isset($mkd_burst_options['scroll_amount_for_sticky'])){
	if (!empty($mkd_burst_options['scroll_amount_for_sticky'])) { ?>
	scroll_amount_for_sticky = <?php echo esc_attr($mkd_burst_options['scroll_amount_for_sticky']); ?>;
<?php } } ?>
<?php if(isset($mkd_burst_options['header_height_scroll_hidden'])){
    if (!empty($mkd_burst_options['header_height_scroll_hidden'])) { ?>
    min_header_height_fixed_hidden = <?php echo esc_attr($mkd_burst_options['header_height_scroll_hidden']); ?>;
<?php } } ?>

<?php if(isset($mkd_burst_options['scroll_amount_for_fixed_hiding'])){
    if (!empty($mkd_burst_options['scroll_amount_for_fixed_hiding'])) { ?>
        scroll_amount_for_fixed_hiding = <?php echo esc_attr($mkd_burst_options['scroll_amount_for_fixed_hiding']); ?>;
<?php } } ?>

<?php
if(isset($mkd_burst_options['enable_manu_item_border']) && $mkd_burst_options['enable_manu_item_border']=='yes' && isset($mkd_burst_options['menu_item_style']) && $mkd_burst_options['menu_item_style']=='large_item'){
    if(isset($mkd_burst_options['menu_item_border_style']) && $mkd_burst_options['menu_item_border_style']=='all_borders'){ ?>
		large_menu_item_border = <?php echo esc_attr($mkd_burst_options['menu_item_border_width'])*2;
	} ?>
	<?php if(isset($mkd_burst_options['menu_item_border_style']) && $mkd_burst_options['menu_item_border_style']=='top_bottom_borders'){ ?>
		large_menu_item_border = <?php echo esc_attr($mkd_burst_options['menu_item_border_width'])*2;
	} ?>
	<?php if(isset($mkd_burst_options['menu_item_border_style']) && ($mkd_burst_options['menu_item_border_style']=='bottom_border' || $mkd_burst_options['menu_item_border_style']=='top_border')){ ?>
		large_menu_item_border = <?php  echo esc_attr($mkd_burst_options['menu_item_border_width']);
	} ?>
<?php } ?>

<?php if(isset($mkd_burst_options['element_appear_amount']) && $mkd_burst_options['element_appear_amount'] !== ""){ ?>
    element_appear_amount = -<?php echo esc_attr($mkd_burst_options['element_appear_amount']); ?>;
<?php } ?>

<?php if(isset($mkd_burst_options['paspartu_width']) && $mkd_burst_options['paspartu_width'] !== ""){ ?>
    paspartu_width_init = <?php echo esc_attr($mkd_burst_options['paspartu_width'])/100; ?>;
<?php } ?>

var logo_height = 130; // burst logo height
var logo_width = 280; // burst logo width
	<?php 
		$logo_width = $mkd_burst_options['logo_width'];
		$logo_height = $mkd_burst_options['logo_height'];
	?>
    logo_width = <?php echo esc_attr($logo_width); ?>;
    logo_height = <?php echo esc_attr($logo_height); ?>;

<?php if(isset($mkd_burst_options['menu_margin_left_right'])){
	if ($mkd_burst_options['menu_margin_left_right'] !== '') { ?>
		menu_item_margin = <?php echo esc_attr($mkd_burst_options['menu_margin_left_right']); ?>;
<?php } } ?>
	
<?php if(isset($mkd_burst_options['header_top_area'])){
if ($mkd_burst_options['header_top_area'] == "yes") { ?>
<?php if(isset($mkd_burst_options['header_top_height']) && $mkd_burst_options['header_top_height'] !== ""){?>
header_top_height= <?php echo esc_attr($mkd_burst_options['header_top_height']);?>;
<?php } else { ?>
header_top_height = 36;
<?php } ?>
<?php } else { ?>
	header_top_height = 0;
<?php } }?>
var loading_text;
loading_text = '<?php esc_html_e('Loading new posts...', 'burst'); ?>';
var finished_text;
finished_text = '<?php esc_html_e('No more posts', 'burst'); ?>';

var piechartcolor;
piechartcolor	= "#279eff";

<?php if(isset($mkd_burst_options['first_color']) && !empty($mkd_burst_options['first_color'])){ ?>
	piechartcolor = "<?php echo esc_attr($mkd_burst_options['first_color']); ?>";
<?php } ?>

<?php if(isset($mkd_burst_options['single_slider_navigation_arrows_type']) && $mkd_burst_options['single_slider_navigation_arrows_type'] != '') { ?>
	directionNavArrows = '<?php echo esc_attr($mkd_burst_options['single_slider_navigation_arrows_type']); ?>';
<?php } ?>

<?php if(isset($mkd_burst_options['testimonials_arrows_type']) && $mkd_burst_options['testimonials_arrows_type'] != '') { ?>
	directionNavArrowsTestimonials = '<?php echo esc_attr($mkd_burst_options['testimonials_arrows_type']); ?>';
<?php } ?>

<?php if(isset($mkd_burst_options['fs_navigation_slider_vertical_section_type']) && ($mkd_burst_options['fs_navigation_slider_vertical_section_type'] == 'bullets') || ($mkd_burst_options['fs_navigation_slider_vertical_section_type'] == 'both')) { ?>
    enable_navigation_on_full_screen_section = true;
<?php } ?>


var no_ajax_pages = [];
var mkd_root = '<?php echo home_url(); ?>/';
var theme_root = '<?php echo MIKADO_ROOT; ?>/';
<?php if($mkd_burst_options['header_style'] != ''){ ?>
var header_style_admin = "<?php echo esc_attr($mkd_burst_options['header_style']); ?>";
<?php }else{ ?>
var header_style_admin = "";
<?php } ?>
if(typeof no_ajax_obj !== 'undefined') {
no_ajax_pages = no_ajax_obj.no_ajax_pages;
}