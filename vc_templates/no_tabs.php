<?php

$output = $title = $interval = $el_class = $style = '';
extract(shortcode_atts(array(
    'title' => '',
    'interval' => 0,
    'el_class' => '',
    'style' => 'horizontal',
    'tab_type_default' => 'default',
	'tab_type_icons' => 'default',
	'border_type_default' => 'border_arround_element',
	'border_type_icons' => 'border_arround_element',
	'tab_border_radius' => '',
	'margin_between_tabs' => 'enable_margin',
	'icons_margin_between_tabs' => 'enable_margin',
	'tab_icon_position' => '',
    'space_between_tab_and_content' => '',
	'show_content_border'	=> '',
	'content_padding' => ''
    ), $atts));

wp_enqueue_script('jquery-ui-tabs');


$title = esc_html($title);
$el_class = esc_attr($el_class);
$space_between_tab_and_content = esc_attr($space_between_tab_and_content);

$el_class = $this->getExtraClass($el_class);

$data_attr = '';

if($tab_border_radius != ""){
	$data_attr .= "data-tab-border-radius='" . $tab_border_radius. "'";
}

$element = 'wpb_tabs';
if ('vc_tour' == $this->shortcode)
    $element = 'wpb_tour';

// Extract tab titles
preg_match_all('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\")/i', $content, $matches, PREG_OFFSET_CAPTURE);
$tab_titles = array();

/**
 * vc_tabs
 *
 */
if (isset($matches[0])) {
    $tab_titles = $matches[0];
}
$tabs_nav = '';
$tabs_nav .= '<ul class="tabs-nav">';

if (strpos($style, 'with_text_and_icons') !== false) {

    foreach ($tab_titles as $tab) {
        preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\")/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);

        $tabs_nav .= '<li><a href="#tab-' . (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title($tab_matches[1][0])) . '">';
        if($tab_icon_position == 'right'){
            $tabs_nav .= '<span class="tab_text_after_icon">' . $tab_matches[1][0] . '</span><span class="icon_frame"></span>';
        }
        else{
            $tabs_nav .= '<span class="icon_frame"></span><span class="tab_text_after_icon">' . $tab_matches[1][0] . '</span>';
        }

        $tabs_nav .= '</a></li>';
    }
}
elseif (strpos($style, 'icons') !== false) {

    foreach ($tab_titles as $tab) {
        preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\")/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);

        $tabs_nav .= '<li><a href="#tab-' . (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title($tab_matches[1][0])) . '"><span class="icon_frame"></span></a></li>';
    }
} else {
    foreach ($tab_titles as $tab) {
        preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\")/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
        if (isset($tab_matches[1][0])) {
            $tabs_nav .= '<li><a href="#tab-' . (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title($tab_matches[1][0]) ) . '">' . $tab_matches[1][0] . '</a></li>';
        }
    }
}


$tabs_nav .= '</ul>' . "\n";

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim($element . 'tabs_holder clearfix ' . $el_class), $this->settings['base']);

switch ($style) {
	case 'horizontal':
        $style_class = 'horizontal tab_with_text center';
        break;
	case 'horizontal_with_icons':
        $style_class = 'horizontal tab_with_icon center';
        break;
    case 'horizontal_with_text_and_icons':
        $style_class = 'horizontal tab_with_text_and_icon center';
        break;
	case 'horizontal_left':
        $style_class = 'horizontal tab_with_text left';
        break;
	case 'horizontal_left_with_icons':
        $style_class = 'horizontal tab_with_icon left';
        break;
    case 'horizontal_left_with_text_and_icons':
        $style_class = 'horizontal tab_with_text_and_icon left';
        break;
	case 'horizontal_right':
        $style_class = 'horizontal tab_with_text right';
        break;
	case 'horizontal_right_with_icons':
        $style_class = 'horizontal tab_with_icon right';
        break;
    case 'horizontal_right_with_text_and_icons':
        $style_class = 'horizontal tab_with_text_and_icon right';
        break;
    case 'vertical_left':
        $style_class = 'vertical tab_with_text left ';
        break;
	case 'vertical_left_with_icons':
        $style_class = 'vertical left tab_with_icon';
        break; 
    case 'vertical_right':
        $style_class = 'vertical tab_with_text right';
        break;
	case 'vertical_right_with_icons':
        $style_class = 'vertical right tab_with_icon';
        break;
    case 'vertical_left_with_text_and_icons':
        $style_class = 'vertical left tab_with_text_and_icon';
        break;
    case 'vertical_right_with_text_and_icons':
        $style_class = 'vertical right tab_with_text_and_icon';
        break;
}

if($style == 'horizontal' || $style == 'horizontal_left' || $style == 'horizontal_right' || $style == 'vertical_left' || $style == 'vertical_right' || $style == 'horizontal_with_text_and_icons' || $style == 'horizontal_left_with_text_and_icons' || $style == 'horizontal_right_with_text_and_icons' || $style == 'vertical_left_with_text_and_icons' || $style == 'vertical_right_with_text_and_icons' ){
	if($tab_type_default == "with_borders"){
		$style_class .= ' with_borders';
		
		if($border_type_default == "border_arround_element"){
			$style_class .= " border_arround_element";
			
			if($margin_between_tabs == "enable_margin"){
				$style_class .= " enable_margin";
			}

			if($margin_between_tabs == "disable_margin"){
				$style_class .= " disable_margin";
			}
		}		
		if($border_type_default == "border_arround_active_tab"){
			$style_class .= " border_arround_active_tab";

            if($margin_between_tabs == "enable_margin"){
                $style_class .= " enable_margin";
            }

            if($margin_between_tabs == "disable_margin"){
                $style_class .= " disable_margin";
            }
		}
	}else{
		$style_class .= ' default';
	}	
}

if($style == 'horizontal_with_icons' || $style == 'horizontal_left_with_icons' || $style == 'horizontal_right_with_icons' || $style == 'vertical_left_with_icons' || $style == 'vertical_right_with_icons' ){
	switch($tab_type_icons){
		case 'with_borders' :
			$style_class .= " with_borders";
		break;
		case 'with_lines' :
			$style_class .= " with_lines";
		break;
		default:
			$style_class .= " default";
	}
	
	if($tab_type_icons == "with_borders"){
		if($border_type_icons == "border_arround_element"){
			$style_class .= " border_arround_element";
			
			if($icons_margin_between_tabs == "enable_margin"){
				$style_class .= " enable_margin";
			}

			if($icons_margin_between_tabs == "disable_margin"){
				$style_class .= " disable_margin";
			}
		}
		if($border_type_icons == "border_arround_active_tab"){
			$style_class .= " border_arround_active_tab";
		}
	}
}

$tabs_no_margin = ' no_space_tabs_content';
$tabs_container_style = '';
if($space_between_tab_and_content != '' && (strpos($style, 'vertical') == false)){
    $space_between_tab_and_content = (strstr($space_between_tab_and_content, 'px', true)) ? $space_between_tab_and_content : $space_between_tab_and_content . "px";
    $tabs_container_style .= 'margin-top: '.$space_between_tab_and_content.';';
	if ($space_between_tab_and_content !== '0px'){
		$tabs_no_margin = '';
	}
}
if($show_content_border == "yes"){
	$style_class .= ' with_content_border'; // with this class we will provide different border color for active tab when is enabled content border. 
	$tabs_container_style .= 'border: 1px solid #dadadb;';
	if(strstr($style_class, 'horizontal')){
		$tabs_container_style .= 'top: -1px;';
	}	
	if(strstr($style_class, 'vertical')){
		if(strstr($style_class, 'left')){
			$tabs_container_style .= 'left: -1px;';
		}
		if(strstr($style_class, 'right')){
			$tabs_container_style .= 'right: -1px;';
		}		
	}
}
$style_class .= $tabs_no_margin;
if($content_padding !=''){
	$tabs_container_style .= 'padding: '.$content_padding.';';
}

$output .= "\n\t" . '<div class="' . $css_class . '" data-interval="' . $interval . '">';
$output .= "\n\t\t" . '<div class="mkd_tabs ' . $style_class . '" '.$data_attr.'>';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element . '_heading'));
$output .= "\n\t\t\t" . $tabs_nav;
$output .= '<div class="tabs-container" '.mkd_burst_get_inline_style($tabs_container_style).'>';
$output .= "\n\t\t\t" . wpb_js_remove_wpautop($content);
$output .= "</div>";
if ('vc_tour' == $this->shortcode) {
    $output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="' . esc_html__('Previous slide', 'burst') . '">' . esc_html__('Previous slide', 'burst') . '</a></span> <span class="wpb_next_slide"><a href="#next" title="' . esc_html__('Next slide', 'burst') . '">' . esc_html__('Next slide', 'burst') . '</a></span></div>';
}
$output .= "\n\t\t" . '</div> ' . $this->endBlockComment('.wpb_wrapper');
$output .= "\n\t" . '</div> ' . $this->endBlockComment($element);

print $output;
