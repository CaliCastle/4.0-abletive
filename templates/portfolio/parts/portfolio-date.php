<?php
global $mkd_burst_options;

//get portfolio date value
$portfolio_hide_date = "";
if(isset($mkd_burst_options['portfolio_hide_date'])){
	$portfolio_hide_date = $mkd_burst_options['portfolio_hide_date'];
}

if($portfolio_hide_date != "yes"){

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

   ?>


	<div class="info portfolio_single_custom_date">
		<<?php echo esc_attr($portfolio_info_tag); ?> class="info_section_title" <?php mkd_burst_inline_style($portfolio_info_style); ?>><?php esc_html_e('Date','burst'); ?></<?php echo esc_attr($portfolio_info_tag); ?>>
        <p><?php the_time(get_option('date_format')); ?></p>
	</div>
<?php } ?>