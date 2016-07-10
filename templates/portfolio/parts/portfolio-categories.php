<?php
global $mkd_burst_options;

$portfolio_info_tag             = 'h6';
$portfolio_info_style           = '';

//set info tag
if (isset($mkd_burst_options['portfolio_info_tag'])) {
    $portfolio_info_tag = $mkd_burst_options['portfolio_info_tag'];
}

//set style for info
if ((isset($mkd_burst_options['portfolio_info_margin_bottom']) && $mkd_burst_options['portfolio_info_margin_bottom'] != '')
    || (isset($mkd_burst_options['portfolio_info_color']) && !empty($mkd_burst_options['portfolio_info_color']))) {

    if (isset($mkd_burst_options['portfolio_info_margin_bottom']) && $mkd_burst_options['portfolio_info_margin_bottom'] != '') {
        $portfolio_info_style .= 'margin-bottom:' . esc_attr($mkd_burst_options['portfolio_info_margin_bottom']) . 'px;';
    }

    if (isset($mkd_burst_options['portfolio_info_color']) && !empty($mkd_burst_options['portfolio_info_color'])) {
        $portfolio_info_style .= 'color:'.esc_attr($mkd_burst_options['portfolio_info_color']).';';
    }

}


$portfolio_hide_categories = "no";
if(isset($mkd_burst_options['portfolio_hide_categories'])) {
	$portfolio_hide_categories = $mkd_burst_options['portfolio_hide_categories'];
}

$portfolio_categories = wp_get_post_terms(get_the_ID(),'portfolio_category');

if(is_array($portfolio_categories) && count($portfolio_categories) && $portfolio_hide_categories != "yes"){

	$portfolio_categories_array = array();
	foreach($portfolio_categories as $portfolio_category) {
		$portfolio_categories_array[] = $portfolio_category->name;
	}

	?>
	<div class="info portfolio_single_categories">
		<<?php echo esc_attr($portfolio_info_tag); ?> class="info_section_title" <?php mkd_burst_inline_style($portfolio_info_style); ?>><?php esc_html_e('Categories ','burst'); ?></<?php echo esc_attr($portfolio_info_tag); ?>>
		<ul class="category">
		<?php
		foreach($portfolio_categories_array as $portfolio_category_single) { ?>
		<li> <?php echo esc_html($portfolio_category_single); ?> </li>
		<?php } ?>
		</ul> <!-- close .category -->
	</div> <!-- close div.info.portfolio-categories -->
<?php } ?>