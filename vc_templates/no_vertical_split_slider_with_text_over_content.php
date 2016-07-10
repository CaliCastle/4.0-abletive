<?php

$args = array(
    "background_image" => "",
	"link" => "",
    "target" => "_self"
);

$html = "";
$mkd_splitted_item_style = "";

extract(shortcode_atts($args, $atts));

$background_image = esc_attr($background_image);
$link = esc_url($link);
$target = esc_attr($target);

if($background_image != "") {
    $mkd_splitted_item_style .= "style='";
    if ($background_image != "") {
        $background_image_src = wp_get_attachment_url( $background_image );
        $mkd_splitted_item_style .= "background-image:url(".$background_image_src.");";
    }
    $mkd_splitted_item_style .= "'";
}

if($target == "") {
	$target = "_self";
}

$html .= "<div class='ms-section' ".$mkd_splitted_item_style.">";
if($link != "") {
$html .= "<a href='" . $link . "' target='" . $target . "'></a>";
}
$html .= "</div>";
print $html;

