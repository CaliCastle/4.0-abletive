<?php

$args = array(
    "background_color" => "",
	"slide_title" => "",
	"title_color" => "",
	"title_font_size" => "",
	"title_text_transform" => "",
	"title_font_weight" => "",
	"title_line_height" => "",
	"title_font_family" => "",
	"title_font_style" => "",
	"title_letter_spacing" => ""
);

extract(shortcode_atts($args, $atts));


$background_color = esc_attr($background_color);
$slide_title = wp_kses_post($slide_title);
$title_color = esc_attr($title_color);
$title_font_size = esc_attr($title_font_size);
$title_text_transform = esc_attr($title_text_transform);
$title_font_weight = esc_attr($title_font_weight);
$title_line_height = esc_attr($title_line_height);
$title_font_family = esc_attr($title_font_family);
$title_font_style = esc_attr($title_font_style);
$title_letter_spacing = esc_attr($title_letter_spacing);



$mkd_preloader_style = '';
if($background_color != "") {
    $mkd_preloader_style .= "style='";
    if ($background_color != "") {
        $mkd_preloader_style .= "background-color:".$background_color.";";
    }
    $mkd_preloader_style .= "'";
}

	$slide_title_text='';
	if($slide_title != "") {
		$slide_title_text .= $slide_title ;
	}

	$slide_title_style='';
	
	if($title_color != "" || $title_font_size != ""  || $title_text_transform != "" || $title_font_weight != "" || $title_line_height != "" || $title_font_family != "" || $title_font_style != "" || $title_letter_spacing != "") {
		$slide_title_style .= "style='";

		if($title_color != ""){
		$slide_title_style .= "color:".$title_color.";";
	}

	if($title_font_size != ""){
		$slide_title_style .= "font-size:".$title_font_size."px;";
	}

	if($title_text_transform != ""){
		$slide_title_style .= "text-transform:".$title_text_transform.";";
	}

	if($title_font_weight != ""){
		$slide_title_style .= "font-weight:".$title_font_weight.";";
	}

	if($title_font_family != ""){
		$slide_title_style .= "font-family:".$title_font_family.";";
	}

	if($title_font_style != ""){
		$slide_title_style .= "font-style:".$title_font_style.";";
	}

	if($title_letter_spacing != ""){
		$slide_title_style .= "letter-spacing:".$title_letter_spacing."px;";
	}
	
	if($title_line_height != ""){
		$slide_title_style .= "line-height:".$title_line_height."px;";
	}
	
	 $slide_title_style .= "'";
	
}


$html = "";

$html .= '<div class="vertical_slider_with_text_over_preloader" '.$mkd_preloader_style.'><div class="ajax_loader"><div class="ajax_loader_1">'.mkd_burst_loading_spinners(true).'</div></div></div>';
$html .= '<div class="vertical_slider_with_text_over_holder">';
$html .= '<div class="vertical_slider_with_text_over_inner">';
$html .= '<div class="vertical_slider_with_text_over">';
$html .= do_shortcode($content);
$html .= '</div>';
$html .= '<div class="over_text">';
$html .= '<h3 '.$slide_title_style.' >'.$slide_title_text.'</h3>';
$html .= '</div>';
$html .= '</div>';
$html .= '</div>';
print $html;

