<?php

$args = array(
    'columns'     		=> 'four_columns',
	'lines_between'		=> '',
	'line_color'		=> '',
	'process_width'		=> '',
	'process_height'	=> '',
);

$html 					= '';
$styles 				= array();
$circle_holder_class 	= array();

extract(shortcode_atts($args, $atts));

$line_color = esc_attr($line_color);

$circle_holder_class[] = $columns;

if(isset($lines_between) && $lines_between == 'yes') {
	$circle_holder_class[] = 'with_lines';
}

if(isset($line_color) && $line_color != '') {
	$styles[] = 'border-color: '.$line_color;
}

$data_attr = "";

if($process_height != ""){
	$data_attr .= "data-proces-height='" . $process_height. "'";
}
if($process_width != ""){
	$data_attr .= " data-proces-width='" . $process_width. "'";
}

$html = '<div class="mkd_circles_shortcode '.implode(' ', $circle_holder_class).'">';
$html .= '<div class = "circle_line_holder" style="border-color:'.esc_attr($line_color).';"></div>';
$html .= '<ul class="mkd_circles_holder '.implode(' ', $circle_holder_class).'" style="'.implode(' ', $styles).'" '.$data_attr.'>';
$html .= do_shortcode($content);

$html .= '</ul>';

$html .= '</div>'; //close div.mkd_circles_shortcode

print $html;