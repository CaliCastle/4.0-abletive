<?php

global $mkd_burst_IconCollections;

$html = "<div class='icon_slider_nav'>";
$html .= "<a href='#' class='icon_slider_prev'><span aria-hidden='true' class='mkd_icon_font_elegant arrow_carrot-left icon_slider_icon'></span></a>";

$html .= "<div class='icon_slider_controls_holder'>";

preg_match_all('/\[no_icon_slider([^\]]*)\]/', $content, $matches, PREG_OFFSET_CAPTURE);

foreach ($matches[0] as $icon_family){
    preg_match('/icon_family="([^\"]+)/i', $icon_family[0], $icon_family_match, PREG_OFFSET_CAPTURE);
    $icon_collection_obj = $mkd_burst_IconCollections->getIconCollection($icon_family_match[1][0]);
    preg_match('/icon_'.$icon_collection_obj->param.'\=\"([^\"]+)\"/i', $icon_family[0], $icon_match, PREG_OFFSET_CAPTURE);
    $html .= '<span class="icon_slider_nav_icon">';
        if (method_exists($icon_collection_obj, 'render')) { 
            $icon_label = '';        
            $html .= $icon_collection_obj->render($icon_match[1][0], array(
                'icon_attributes' => array(
                    'style' => '',
                    'class' => 'icon_slider_icon '
                )
            ));
        }
    $html .= '</span>';
}

$html .= "</div>";

$html .= "<a href='#' class='icon_slider_next'><span aria-hidden='true' class='mkd_icon_font_elegant arrow_carrot-right icon_slider_icon'></span></a>";
$html .= "</div>"; // close icon slider nav

$html .= "<div class='icon_slider_container'>";
$html .= "<ul class='icon_slider_container_inner'>"; 
$html .=  do_shortcode($content);
$html .= "</ul>";
$html .= "</div>";

print $html;