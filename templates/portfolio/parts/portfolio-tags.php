<?php

global $mkd_burst_options;

$portfolio_info_tag             = 'h6';
$portfolio_info_style           = '';
$portfolio_hide_tags			= 'no';

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

if (isset($mkd_burst_options['portfolio_hide_tags']) && $mkd_burst_options['portfolio_hide_tags'] == "yes"){
	$portfolio_hide_tags = 'yes';
}

$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

if(is_array($portfolio_tags) && count($portfolio_tags) && $portfolio_hide_tags == "no") {

	$portfolio_tags_array = array();
	foreach ($portfolio_tags as $portfolio_tag) {
		$portfolio_tags_array[] = $portfolio_tag->name;
	}

	?>
	<div class="info portfolio_single_tags">
		<<?php echo esc_attr($portfolio_info_tag);?> class="info_section_title" <?php mkd_burst_inline_style($portfolio_info_style); ?>><?php esc_html_e('Tags', 'burst') ?></<?php echo esc_attr($portfolio_info_tag);?>>
		<ul class="category">
		<?php
		foreach($portfolio_tags_array as $portfolio_tag_single) { ?>
			<li> <?php echo esc_html($portfolio_tag_single); ?> </li>
		<?php } ?>
		</ul> <!-- close .category -->
	</div> <!-- close div.info.portfolio_tags -->

<?php } ?>