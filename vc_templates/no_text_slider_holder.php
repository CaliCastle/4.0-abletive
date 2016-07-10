<?php

$args = array(
	'show_navigation'	  => 'yes',
	'navigation_position' => 'nav-left'	 
	);

extract(shortcode_atts($args,$atts));

$show_navigation = esc_attr($show_navigation);
$navigation_position = esc_attr($navigation_position);

$show_navigation_class = ''; 

if($show_navigation == 'no'){
	$show_navigation_class = "no-navigation ";
}

$html  = "<div class='text_slider_container ".$show_navigation_class.$navigation_position."'>";
$html .= "<ul class='text_slider_container_inner'>";
$html .=  do_shortcode($content);
$html .= "</ul>";
$html .= "</div>";



print $html;