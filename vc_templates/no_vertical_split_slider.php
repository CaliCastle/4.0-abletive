<?php

$args = array(
    "background_color" => "",
	"left_slide_panel_size" => "",
	"right_slide_panel_size" => "",
	"disable_header_skin_change" => "no"
);
extract(shortcode_atts($args, $atts));

$background_color = esc_attr($background_color);
$left_slide_panel_size = esc_attr($left_slide_panel_size);
$right_slide_panel_size = esc_attr($right_slide_panel_size);
$disable_header_skin_change = esc_attr($disable_header_skin_change);
$disable_class = '';


$data_attr = "";
$mkd_preloader_style = '';
if($background_color != "") {
    $mkd_preloader_style .= "style='";
    if ($background_color != "") {
        $mkd_preloader_style .= "background-color:".$background_color.";";
    }
    $mkd_preloader_style .= "'";
}


$data_disable_header_skin_change = 'no';
if($disable_header_skin_change == "yes"){
	$data_disable_header_skin_change = 'yes';
}

$data_attr .= " data-disable-header-skin-change='" . $data_disable_header_skin_change . "'";

if($left_slide_panel_size != "" || $right_slide_panel_size != ""){
	$disable_class = 'disable_general_option';
}

if($left_slide_panel_size != ""){
	$data_attr .= " data-left-slide-panel-size='" . $left_slide_panel_size . "'";
}

if($right_slide_panel_size != ""){
	$data_attr .= " data-right-slide-panel-size='" . $right_slide_panel_size . "'";
}

$html = "";

$html .= '<div class="vertical_split_slider_preloader" '.$mkd_preloader_style.'><div class="ajax_loader"><div class="ajax_loader_1">'.mkd_burst_loading_spinners(true).'</div></div></div>';
$html .= '<div class="vertical_split_slider '.$disable_class.'" '.$data_attr.'>';
$html .= do_shortcode($content);
$html .= '</div>';

print $html;

