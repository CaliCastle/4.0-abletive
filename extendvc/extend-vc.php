<?php
global $mkd_burst_IconCollections;


/*** Removing shortcodes ***/

vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");
vc_remove_element("vc_gmaps");
vc_remove_element("vc_cta");
vc_remove_element("vc_round_chart");
vc_remove_element("vc_line_chart");
vc_remove_element("vc_tta_accordion");
vc_remove_element("vc_tta_tour");
vc_remove_element("vc_tta_tabs");


/***Remove Grid Elements if disabled ***/

if (!mkd_burst_vc_grid_elements_enabled() && version_compare(mkd_burst_get_vc_version(), '4.4.2') >= 0) {
	vc_remove_element('vc_basic_grid');
	vc_remove_element('vc_media_grid');
	vc_remove_element('vc_masonry_grid');
	vc_remove_element('vc_masonry_media_grid');
	vc_remove_element('vc_icon');
	vc_remove_element('vc_button2');
	vc_remove_element("vc_custom_heading");
	vc_remove_element("vc_btn");
}


/*** Remove unused parameters ***/

if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_single_image', 'css_animation');
	vc_remove_param('vc_single_image', 'title');
	vc_remove_param('vc_gallery', 'title');
	vc_remove_param('vc_column_text', 'css_animation');
    vc_remove_param('vc_row', 'video_bg');
    vc_remove_param('vc_row', 'video_bg_url');
    vc_remove_param('vc_row', 'video_bg_parallax');
    vc_remove_param('vc_row', 'full_height');
    vc_remove_param('vc_row', 'content_placement');
	vc_remove_param('vc_row', 'full_width');
	vc_remove_param('vc_row', 'bg_image');
	vc_remove_param('vc_row', 'bg_color');
	vc_remove_param('vc_row', 'font_color');
	vc_remove_param('vc_row', 'margin_bottom');
	vc_remove_param('vc_row', 'bg_image_repeat');
	vc_remove_param( "vc_row", "css" );
	vc_remove_param( "vc_row_inner", "css" );
	vc_remove_param('vc_tabs', 'interval');
	vc_remove_param('vc_tabs', 'title');
	vc_remove_param('vc_separator', 'style');
	vc_remove_param('vc_separator', 'color');
	vc_remove_param('vc_separator', 'accent_color');
	vc_remove_param('vc_separator', 'el_width');
	vc_remove_param('vc_text_separator', 'style');
	vc_remove_param('vc_text_separator', 'color');
	vc_remove_param('vc_text_separator', 'accent_color');
	vc_remove_param('vc_text_separator', 'el_width');
	vc_remove_param('vc_text_separator', 'title_align');
	vc_remove_param('vc_accordion', 'title');
	vc_remove_param('vc_row', 'gap');
    vc_remove_param('vc_row', 'columns_placement');
    vc_remove_param('vc_row', 'equal_height');
    vc_remove_param('vc_row_inner', 'gap');
    vc_remove_param('vc_row_inner', 'content_placement');
    vc_remove_param('vc_row_inner', 'equal_height');
    vc_remove_param('vc_row', 'parallax_speed_video');
    vc_remove_param('vc_row', 'parallax_speed_bg');
    vc_remove_param('vc_row_inner', 'disable_element');
    vc_remove_param('vc_row', 'disable_element');


    //remove vc parallax functionality
    vc_remove_param('vc_row', 'parallax');
    vc_remove_param('vc_row', 'parallax_image');

	if(version_compare(mkd_burst_get_vc_version(), '4.4.2') >= 0) {
		vc_remove_param('vc_accordion', 'disable_keyboard');
		vc_remove_param('vc_separator', 'align');
		vc_remove_param('vc_separator', 'border_width');
		vc_remove_param('vc_text_separator', 'align');
		vc_remove_param('vc_text_separator', 'border_width');
	}

    add_action( 'init', 'mkd_burst_remove_vc_image_zoom',11);
    function mkd_burst_remove_vc_image_zoom() {
        //Remove zoom from click action on single image
        $param = WPBMap::getParam( 'vc_single_image', 'onclick' );
        unset($param['value']['Zoom']);
        vc_update_shortcode_param( 'vc_single_image', $param );
    }
    vc_remove_param('vc_text_separator', 'css');
    vc_remove_param('vc_separator', 'css');

}


/*** Remove unused parameters from grid elements ***/

if (function_exists('vc_remove_param') && mkd_burst_vc_grid_elements_enabled() && version_compare(mkd_burst_get_vc_version(), '4.4.2') >= 0) {
	vc_remove_param('vc_basic_grid', 'button_style');
	vc_remove_param('vc_basic_grid', 'button_color');
	vc_remove_param('vc_basic_grid', 'button_size');
	vc_remove_param('vc_basic_grid', 'filter_color');
	vc_remove_param('vc_basic_grid', 'filter_style');
	vc_remove_param('vc_media_grid', 'button_style');
	vc_remove_param('vc_media_grid', 'button_color');
	vc_remove_param('vc_media_grid', 'button_size');
	vc_remove_param('vc_media_grid', 'filter_color');
	vc_remove_param('vc_media_grid', 'filter_style');
	vc_remove_param('vc_masonry_grid', 'button_style');
	vc_remove_param('vc_masonry_grid', 'button_color');
	vc_remove_param('vc_masonry_grid', 'button_size');
	vc_remove_param('vc_masonry_grid', 'filter_color');
	vc_remove_param('vc_masonry_grid', 'filter_style');
	vc_remove_param('vc_masonry_media_grid', 'button_style');
	vc_remove_param('vc_masonry_media_grid', 'button_color');
	vc_remove_param('vc_masonry_media_grid', 'button_size');
	vc_remove_param('vc_masonry_media_grid', 'filter_color');
	vc_remove_param('vc_masonry_media_grid', 'filter_style');
	vc_remove_param('vc_basic_grid', 'paging_color');
	vc_remove_param('vc_basic_grid', 'arrows_color');
	vc_remove_param('vc_media_grid', 'paging_color');
	vc_remove_param('vc_media_grid', 'arrows_color');
	vc_remove_param('vc_masonry_grid', 'paging_color');
	vc_remove_param('vc_masonry_grid', 'arrows_color');
	vc_remove_param('vc_masonry_media_grid', 'paging_color');
	vc_remove_param('vc_masonry_media_grid', 'arrows_color');
}


/*** Remove frontend editor ***/

if(function_exists('vc_disable_frontend')){
	vc_disable_frontend();
}

$animations = array(
	"No animations" => "",
	"Elements Shows From Left Side" => "element_from_left",
	"Elements Shows From Right Side" => "element_from_right",
	"Elements Shows From Top Side" => "element_from_top",
	"Elements Shows From Bottom Side" => "element_from_bottom",
	"Elements Shows From Fade" => "element_from_fade"
);
$font_weight_array = array(
	"Default" => "",
	"Thin 100" => "100",
	"Extra-Light 200" => "200",
	"Light 300" => "300",
	"Regular 400" => "400",
	"Medium 500" => "500",
	"Semi-Bold 600" => "600",
	"Bold 700" => "700",
	"Extra-Bold 800" => "800",
	"Ultra-Bold 900" => "900"
);
$social_icons_array = array(
	"" => "",
	"ADN" => "fa-adn",
	"Android" => "fa-android",
	"Apple" => "fa-apple",
	"Bitbucket" => "fa-bitbucket",
	"Bitbucket-Sign" => "fa-bitbucket-sign",
	"Bitcoin" => "fa-bitcoin",
	"BTC" => "fa-btc",
	"CSS3" => "fa-css3",
	"Dribbble" => "fa-dribbble",
	"Dropbox" => "fa-dropbox",
	"Facebook" => "fa-facebook",
	"Facebook-Sign" => "fa-facebook-sign",
	"Flickr" => "fa-flickr",
	"Foursquare" => "fa-foursquare",
	"GitHub" => "fa-github",
	"GitHub-Alt" => "fa-github-alt",
	"GitHub-Sign" => "fa-github-sign",
	"Gittip" => "fa-gittip",
	"Google Plus" => "fa-google-plus",
	"Google Plus-Sign" => "fa-google-plus-sign",
	"HTML5" => "fa-html5",
	"Instagram" => "fa-instagram",
	"LinkedIn" => "fa-linkedin",
	"LinkedIn-Sign" => "fa-linkedin-sign",
	"Linux" => "fa-linux",
	"MaxCDN" => "fa-maxcdn",
	"Paypal" => "fa-paypal",
	"Pinterest" => "fa-pinterest",
	"Pinterest-Sign" => "fa-pinterest-sign",
	"Renren" => "fa-renren",
	"Skype" => "fa-skype",
	"StackExchange" => "fa-stackexchange",
	"Trello" => "fa-trello",
	"Tumblr" => "fa-tumblr",
	"Tumblr-Sign" => "fa-tumblr-sign",
	"Twitter" => "fa-twitter",
	"Twitter-Sign" => "fa-twitter-sign",
	"VK" => "fa-vk",
	"Weibo" => "fa-weibo",
	"Windows" => "fa-windows",
	"Xing" => "fa-xing",
	"Xing-Sign" => "fa-xing-sign",
	"YouTube" => "fa-youtube",
	"YouTube Play" => "fa-youtube-play",
	"YouTube-Sign" => "fa-youtube-sign"
);

/*** Accordion ***/

vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Style",
	"param_name" => "style",
	"value" => array(
		"Accordion"             => "accordion",
		"Toggle"                => "toggle",
        "Boxed Accordion"       => "boxed_accordion",
        "Boxed Toggle"          => "boxed_toggle"
	),
    "save_always" => true,
	"description" => ""
));

vc_add_param("vc_accordion", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Accordion Title Border Radius",
	"param_name" => "accordion_section_border_radius",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "style", 'value' => array('boxed_accordion', 'boxed_toggle'))
));

vc_add_param("vc_accordion", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Accordion Mark Border Radius",
	"param_name" => "accordion_border_radius",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "style", 'value' => array('accordion', 'toggle'))
));

vc_add_param("vc_accordion", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Accordion Title Height",
	"param_name" => "accordion_section_height",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Hide Icon",
	"param_name" => "hide_icon",
	"value" => array(
		"Yes" => "yes",
		"No" => "no"),
    "save_always" => true,
	"description" => ""
));
vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Title Alignment",
	"param_name" => "title_alignment",
	"value" => array(
		"" => "",
		"Left"	=> "left",
		"Right"	=> "right",
		"Center" => "center",
		),
	"description" => "",
	"dependency" => Array('element' => "hide_icon", 'value' => "yes")
));

vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Title and Icon Alignment",
	"param_name" => "title_icon_alignment",
	"value" => array(
		"" => "",
		"Icon on Left"	=> "icon_left",
		"Text on Left"	=> "text_left",
		"Icon and Text on Left"	=> "icon_left_text_left"
		),
	"description" => "This option is only used for boxed accordions.",
	"dependency" => Array('element' => "hide_icon", 'value' => "no")
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Color",
	"param_name" => "title_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Hover Color",
	"param_name" => "title_hover_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Mark Icon Color",
	"param_name" => "mark_icon_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Mark Icon Hover Color",
	"param_name" => "mark_icon_color_hover",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Background Color",
	"param_name" => "background_color",
	"value" => "",
	"description" => "This option is only used for boxed accordions"
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Background Hover Color",
	"param_name" => "background_hover_color",
	"value" => "",
	"description" => "This option is only used for boxed accordions"
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Border Color",
	"param_name" => "border_color",
	"value" => "",
	"description" => "This option is only used for boxed accordions"
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Title Border Hover Color",
	"param_name" => "border_hover_color",
	"value" => "",
	"description" => "This option is only used for boxed accordions"
));

vc_add_param("vc_accordion_tab", array(
	"type" => "dropdown",
    "class" => "",
    "heading" => "Title Tag",
    "param_name" => "title_tag",
    "value" => array(
        ""   => "",
		"p"  => "p",
        "h2" => "h2",
        "h3" => "h3",
        "h4" => "h4",	
        "h5" => "h5",
        "h6" => "h6",
    ),
    "description" => ""
));


/*** Tabs ***/

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Style",
	"param_name" => "style",
	"value" => array(
		"Horizontal Center" => "horizontal",
		"Horizontal Center With Icons" => "horizontal_with_icons",
		"Horizontal Center With Text And Icons" => "horizontal_with_text_and_icons",
		"Horizontal Left" => "horizontal_left",
		"Horizontal Left With Icons" => "horizontal_left_with_icons",
		"Horizontal Left With Text And Icons" => "horizontal_left_with_text_and_icons",
		"Horizontal Right" => "horizontal_right",
		"Horizontal Right With Icons" => "horizontal_right_with_icons",
		"Horizontal Right With Text And Icons" => "horizontal_right_with_text_and_icons",
		"Vertical Left" => "vertical_left",
		"Vertical Left With Icons" => "vertical_left_with_icons",
        "Vertical Left With Text and Icons" => "vertical_left_with_text_and_icons",
		"Vertical Right" => "vertical_right",
        "Vertical Right With Icons" => "vertical_right_with_icons",
        "Vertical Right With Text and Icons" => "vertical_right_with_text_and_icons",
	),
    "save_always" => true,
	"description" => ""
));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Tab Type",
	"param_name" => "tab_type_default",
	"value" => array(
		"Default" => "default",
		"With Borders" => "with_borders"
	),
    "save_always" => true,
	"dependency" => Array('element' => "style", 'value' => array('horizontal','horizontal_left','horizontal_right', 'vertical_left', 'vertical_right','horizontal_with_text_and_icons','horizontal_left_with_text_and_icons','horizontal_right_with_text_and_icons','vertical_left_with_text_and_icons','vertical_right_with_text_and_icons'))
));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Tab Type",
	"param_name" => "tab_type_icons",
	"value" => array(
		"Default" => "default",
		"With Borders" => "with_borders",
		"With Lines" => "with_lines"
	),
    "save_always" => true,
	"dependency" => Array('element' => "style", 'value' => array('horizontal_with_icons','horizontal_left_with_icons','horizontal_right_with_icons', 'vertical_left_with_icons', 'vertical_right_with_icons'))
));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Border Type",
	"param_name" => "border_type_default",
	"value" => array(
		"Border Arround Tabs" => "border_arround_element",
		"Border Arround Active Tab" => "border_arround_active_tab"
	),
    "save_always" => true,
	"dependency" => Array('element' => "tab_type_default", 'value' => array('with_borders'))
));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Border Type",
	"param_name" => "border_type_icons",
	"value" => array(
		"Border Around Tabs" => "border_arround_element",
		"Border Around Active Tab" => "border_arround_active_tab"
	),
    "save_always" => true,
	"dependency" => Array('element' => "tab_type_icons", 'value' => array('with_borders'))
));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Margin Between Tabs",
	"param_name" => "margin_between_tabs",
	"value" => array(
		"Yes" => "enable_margin",
		"No" => "disable_margin"
	),
    "save_always" => true,
	"description" => "",
    "dependency" => Array('element' => "tab_type_default", 'value' => array('with_borders'))
));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Margin Between Tabs",
	"param_name" => "icons_margin_between_tabs",
	"value" => array(
		"Yes" => "enable_margin",
		"No" => "disable_margin"
	),
    "save_always" => true,
	"description" => "",
	"dependency" => Array('element' => "border_type_icons", 'value' => array('border_arround_element'))
));

vc_add_param("vc_tabs", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Space Between Tab and Content (px)",
    "param_name" => "space_between_tab_and_content",
    "value" => "",
    "description" => "Insert value for space between Tab and Content (default value is 18px)",
    "dependency" => Array('element' => "style", 'value' => array('horizontal_with_icons','horizontal_left_with_icons','horizontal_right_with_icons','horizontal','horizontal_left','horizontal_right','horizontal_with_text_and_icons','horizontal_left_with_text_and_icons','horizontal_right_with_text_and_icons','vertical_left_with_text_and_icons','vertical_right_with_text_and_icons'))
));

vc_add_param("vc_tabs", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Border arround Content",
    "param_name" => "show_content_border",
	"value" => array(
		"No" => "no",
		"Yes" => "yes"	 
	),
    "save_always" => true
));

vc_add_param("vc_tabs", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Content Padding",
    "param_name" => "content_padding",
	"value" => "",
    "description" => "Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px"
));


vc_add_param("vc_tabs", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Border Radius (px)",
    "param_name" => "tab_border_radius",
    "value" => "",
    "description" => ""    
));

vc_add_param("vc_tabs", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Icon Position",
    "param_name" => "tab_icon_position",
    "value" => array(
        "Left" => "left",
        "Right" => "right"
    ),
    "save_always" => true,
    "dependency" => Array('element' => "style", 'value' => array('horizontal_with_text_and_icons','horizontal_left_with_text_and_icons','horizontal_right_with_text_and_icons','vertical_left_with_text_and_icons','vertical_right_with_text_and_icons'))
));

vc_add_param("vc_tab", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Icon Pack",
    "param_name" => $mkd_burst_IconCollections->iconPackParamName,
    "value" => $mkd_burst_IconCollections->getIconCollectionsVC(),
    "save_always" => true
));

foreach ($mkd_burst_IconCollections->iconCollections as $collection_key => $collection ) {
    vc_add_param("vc_tab", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Icon",
        "param_name" => $collection->param,
        "value" => $collection->getIconsArray(),
        "save_always" => true,
        "dependency" => Array('element' => $mkd_burst_IconCollections->iconPackParamName, 'value' => array($collection_key))
    ));
}


/*** Flickr Widget ***/

vc_add_param("vc_flickr", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Columns",
    "param_name" => "columns",
    "value" => array(
        "Two" => "two",
        "Three" => "three",
        "Four" => "four"
    ),
    "save_always" => true,
    "description" => ""
));


/*** Empty Space ***/

vc_add_param("vc_empty_space",  array(
        "type" => "attach_image",
        "holder" => "div",
        'heading' => 'Background Image',
        'param_name' => 'background_image',
        'value' => '',
        'description' =>( 'Select image from media library.'),
    )
);
vc_add_param("vc_empty_space",  array(
        "type" => "dropdown",
        'heading' => 'Image Repeat',
        'param_name' => 'image_repeat',
        "value" => array(
            'No Repeat' => 'no-repeat',
            'Repeat x' => 'repeat-x',
            'Repeat y' => 'repeat-y',
            'Repeat (x y)' => 'repeat'
        ),
        "save_always" => true,
        'description' =>( '')
    )
);

/*** Gallery ***/

vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Column Number",
	"param_name" => "column_number",
	 "value" => array(2, 3, 4, 5, "Disable" => 0),
    "save_always" => true,
	 "dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Grayscale Images",
    "param_name" => "grayscale",
    "value" => array('No' => 'no', 'Yes' => 'yes'),
    "save_always" => true,
    "dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Frame",
    "param_name" => "frame",
	"value" => array("Use frame?" => "use_frame"),
	"value" => array(
		'' => '',
		'Yes' => 'use_frame',
		'No' => 'no'
	),
    "description" => "",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide'))
));

vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Choose Frame",
	"param_name" => "choose_frame",
	"value" => array(
		'Default' => 'default',
		'Frame 1' => 'frame1',
		'Frame 2' => 'frame2',
		'Frame 3' => 'frame3',
		'Frame 4' => 'frame4'
	),
    "save_always" => true,
	"dependency" => Array('element' => "frame", 'value' => array('use_frame'))
));

vc_add_param("vc_gallery", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => "Show image title?",
    "param_name" => "show_image_title",
    "value" => array("Show image title in the bottom of image" => "show_image_title"),
    "description" => "",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide', 'flexslider_fade'))
));

vc_add_param("vc_gallery", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => "Disable navigation arrows?",
    "param_name" => "disable_navigation_arrows",
    "value" => array("Disable navigation arrows" => "yes"),
    "description" => "",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide', 'flexslider_fade'))
));

vc_add_param("vc_gallery",array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Navigation Arrows Color",
	"param_name" => "arrows_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "type", 'value' => array('flexslider_slide', 'flexslider_fade'))
));

vc_add_param("vc_gallery",array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Navigation Arrows Hover Color",
	"param_name" => "arrows_hover_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "type", 'value' => array('flexslider_slide', 'flexslider_fade'))
));

vc_add_param("vc_gallery", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => "Show navigation controls?",
    "param_name" => "show_navigation_controls",
    "value" => array("Show navigation controls" => "yes"),
    "description" => "",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide', 'flexslider_fade'))
));

vc_add_param("vc_gallery",array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Navigation Controls Background Color",
	"param_name" => "bullet_bckg_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "show_navigation_controls", 'value' => array('yes'))
));

vc_add_param("vc_gallery",array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Navigation Controls Active Background Color",
	"param_name" => "bullet_active_bckg_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "show_navigation_controls", 'value' => array('yes'))
));

vc_add_param("vc_gallery",array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Navigation Controls Border Color",
	"param_name" => "bullet_brdr_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "show_navigation_controls", 'value' => array('yes'))
));

vc_add_param("vc_gallery",array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Navigation Controls Active Border Color",
	"param_name" => "bullet_active_brdr_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "show_navigation_controls", 'value' => array('yes'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "holder" => "div",
    "class" => "",
    "heading" => "Title Alignment",
    "param_name" => "title_alignment",
    "value" => array(
        "Left"    => "left",
        "Center"  => "center",
        "Right"   => "right"
    ),
    "description" => "",
    "save_always" => true,
    "dependency" => Array('element' => "show_image_title", 'value' => array('show_image_title'))
));

vc_add_param("vc_gallery", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Title Font Family",
    "param_name" => "title_font_family",
    "value" => "",
    "description" => "",
    "dependency" => Array('element' => "show_image_title", 'value' => array('show_image_title'))
));

vc_add_param("vc_gallery", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Title Font Size (px)",
    "param_name" => "title_font_size",
    "value" => "",
    "description" => "",
    "dependency" => Array('element' => "show_image_title", 'value' => array('show_image_title'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "holder" => "div",
    "class" => "",
    "heading" => "Title Font Weight",
    "param_name" => "title_font_weight",
    "value" => array(
        "Default" 			=> "",
        "Thin 100"			=> "100",
        "Extra-Light 200" 	=> "200",
        "Light 300"			=> "300",
        "Regular 400"		=> "400",
        "Medium 500"		=> "500",
        "Semi-Bold 600"		=> "600",
        "Bold 700"			=> "700",
        "Extra-Bold 800"	=> "800",
        "Ultra-Bold 900"	=> "900"
    ),
    "description" => "",
    "dependency" => Array('element' => "show_image_title", 'value' => array('show_image_title'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "holder" => "div",
    "class" => "",
    "heading" => "Title Font Style",
    "param_name" => "title_font_style",
    "value" => array(
        "" 		   => "",
        "Normal"   => "normal",
        "Italic"   => "italic"
    ),
    "description" => "",
    "dependency" => Array('element' => "show_image_title", 'value' => array('show_image_title'))
));

vc_add_param("vc_gallery", array(
	"type" => "colorpicker",
	"holder" => "div",
	"class" => "",
	"heading" => "Title Color",
	"param_name" => "title_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "show_image_title", 'value' => array('show_image_title'))
));

vc_add_param("vc_gallery", array(
    "type" => "colorpicker",
    "holder" => "div",
    "class" => "",
    "heading" => "Title Layer Color",
    "param_name" => "title_layer_color",
    "value" => "",
    "description" => "",
    "dependency" => Array('element' => "show_image_title", 'value' => array('show_image_title'))
));

vc_add_param("vc_gallery", array(
    "type" => "colorpicker",
    "holder" => "div",
    "class" => "",
    "heading" => "Background hover color",
    "param_name" => "background_hover_color",
    "value" => "",
    "description" => "",
    "dependency" => Array('element' => "grayscale", 'value' => array("no"))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "holder" => "div",
    "class" => "",
    "heading" => "Border",
    "param_name" => "show_border",
    "value" => array(
        "No"   => "no",
        "Yes"   => "yes"
    ),
    "description" => "Show border around slider",
    "dependency" => Array('element' => "type", 'value' => array('flexslider_slide', 'flexslider_fade'))
));

vc_add_param("vc_gallery", array(
    "type" => "colorpicker",
    "holder" => "div",
    "class" => "",
    "heading" => "Border Color",
    "param_name" => "border_color",
    "value" => "",
    "description" => "",
    "dependency" => Array('element' => "show_border", 'value' => array('yes'))
));

vc_add_param("vc_gallery", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Border Width (px)",
    "param_name" => "border_width",
    "value" => "",
    "description" => "",
    "dependency" => Array('element' => "show_border", 'value' => array('yes'))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Choose hover icon",
    "param_name" => "hover_icon",
    "value" => array('None' => 'none', 'Magnifier' => 'magnifier', 'Plus' => 'plus'),
    "save_always" => true,
    "dependency" => Array('element' => "grayscale", 'value' => array("no"))
));

vc_add_param("vc_gallery", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Spaces between images",
    "param_name" => "images_space",
    "value" => array('No' => 'gallery_without_space', 'Yes' => 'gallery_with_space'),
    "save_always" => true,
    "dependency" => Array('element' => "type", 'value' => array('image_grid'))
));



/*** Row ***/

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Parallax" => "parallax",
		"Expandable" => "expandable",
		"Content menu" => "content_menu"
	),
    "save_always" => true
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Use Row as Full Screen Section",
	"param_name" => "use_row_as_full_screen_section",
	"value" => array(
		"No" => "no",
		"Yes" => "yes"
	),
    "save_always" => true,
	"description" => "This option works only for Full Screen Sections Template",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Full Width" => "full_width",
		"In Grid" => "grid"		
	),
    "save_always" => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','content_menu'))
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Header Style",
    "param_name" => "header_style",
    "value" => array(
        "" => "",
        "Light" => "light",
        "Dark" => "dark"
    ),
    "dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Anchor ID (Example home)",
	"param_name" => "anchor",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Row in content menu",
	"value" => array("Use row for content menu?" => "in_content_menu"),
	"param_name" => "in_content_menu",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable', 'expandable_with_background'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Content menu title",
	"value" => "",
	"param_name" => "content_menu_title",
	"description" => "",
	"dependency" => Array('element' => "in_content_menu", 'value' => array('in_content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Content menu icon pack",
	"param_name" => $mkd_burst_IconCollections->iconPackParamName,
	"value" => $mkd_burst_IconCollections->getIconCollectionsVC(),
	"description" => "",
    "save_always" => true,
	"dependency" => Array('element' => "in_content_menu", 'value' => array('in_content_menu'))
));

foreach($mkd_burst_IconCollections->iconCollections as $collection_key => $collection) {
    vc_add_param("vc_row", array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Content menu icon",
        "param_name" => "content_menu_".$collection->param,
        "value" => $collection->getIconsArray(),
        "save_always" => true,
        "description" => "",
        "dependency" => Array('element' => $mkd_burst_IconCollections->iconPackParamName, 'value' => array($collection_key))
    ));
}

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Angled Shape in Background",
    "param_name" => "oblique_section",
    "value" => array(
        'No' => 'no',
        'Yes' => 'yes'
    ),
    "save_always" => true,
    "description" => "",
    "dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Angled Shape Top and Bottom",
    "param_name" => "oblique_section_top_and_bottom",
    "value" => array(
        'Default (both)' => 'both',
        'Only Top' => 'top',
        'Only Bottom' => 'bottom'
    ),
    "save_always" => true,
    "description" => "",
    "dependency" => Array('element' => "oblique_section", 'value' => array('yes'))
));
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Angled Shape Position",
    "param_name" => "oblique_section_position",
    "value" => array(
        'From Left To Right' => 'from_left_to_right',
        'From Right To Left' => 'from_right_to_left'
    ),
    "save_always" => true,
    "description" => "",
    "dependency" => Array('element' => "oblique_section", 'value' => array('yes'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Align",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	),
    "save_always" => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Row Overflow",
	"param_name" => "Overflow",
	"value" => array(
		"Default" => "",
		"Visible" => "visible",
		"Hidden" => "hidden"
	),
	"save_always" => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Triangle Shape in Background",
    "param_name" => "triangle_shape",
    "value" => array(
        'No' => 'no',
        'Yes' => 'yes'
    ),
    "save_always" => true,
    "description" => "Enabling this option will display a triangular shape on the row",
    "dependency" => Array('element' => "row_type", 'value' => array('row', 'parallax'))
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Triangle Shape Position",
    "param_name" => "triangle_shape_position",
    "value" => array(
        'Default (both)' => 'both',
        'Only Top' => 'top',
        'Only Bottom' => 'bottom'
    ),
    "save_always" => true,
    "description" => "",
    "dependency" => Array('element' => "triangle_shape", 'value' => array('yes'))
));

vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => "Triangle Shape Color",
    "param_name" => "triangle_shape_color",
    "value" => array(
        'Default (both)' => 'both',
        'Only Top' => 'top',
        'Only Bottom' => 'bottom'
    ),
    "description" => "",
    "dependency" => Array('element' => "triangle_shape", 'value' => array('yes'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Video background",
	"value" => array(
		"No" => "",
		"Yes" => "show_video"
	),
	"param_name" => "video",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Video overlay",
	"value" => array(
		"No" => "",
		"Yes" => "show_video_overlay"
	),
	"param_name" => "video_overlay",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video overlay image (pattern)",
	"value" => "",
	"param_name" => "video_overlay_image",
	"description" => "",
	"dependency" => Array('element' => "video_overlay", 'value' => array('show_video_overlay'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (webm) file url",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (mp4) file url",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (ogv) file url",
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video preview image",
	"value" => "",
	"param_name" => "video_image",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Background image",
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax', 'row','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Pattern background",
	"value" => array("Use background image as pattern?" => "pattern_background"),
	"param_name" => "pattern_background",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Full Screen Height",
    "param_name" => "full_screen_section_height",
    "value" => array(
        "No" => "no",
        "Yes" => "yes"
    ),
    "save_always" => true,
    "dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Vertically Align Content In Middle",
    "param_name" => "vertically_align_content_in_middle",
    "value" => array(
        "No" => "no",
        "Yes" => "yes"
    ),
    "save_always" => true,
    "dependency" => array('element' => 'full_screen_section_height', 'value' => 'yes')
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Section height",
	"param_name" => "section_height",
	"value" => "",
	"dependency" => Array('element' => "full_screen_section_height", 'value' => array('no'))
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Use as box",
	"value" => array("Use row as box" => "use_row_as_box" ),
	"param_name" => "use_as_box",
	"description" => '',
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Parallax speed",
    "param_name" => "parallax_speed",
    "value" => "",
    "dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Zoom effect",
    "param_name" => "zoom_effect",
    "value" => array(
        "No" => "no",
        "Yes" => "yes"
    ),
    "save_always" => true,
    "dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background color",
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable','content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Show logo",
	"value" => array("Show logo in content menu" => "logo_in_content_menu"),
	"param_name" => "logo_in_content_menu",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Custom widget area",
	"param_name" => "custom_widget_area",
	"value" => array_merge(array('' => ''), array_flip(mkd_burst_get_custom_sidebars())),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Show Border Bottom",
	"value" => array("Show border bottom on content menu?" => "yes"),
	"param_name" => "content_menu_border_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('content_menu'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Content Menu Border Color",
	"param_name" => "content_menu_border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "content_menu_border_bottom", 'value' => array('yes'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Content Menu Border Style",
	"param_name" => "content_menu_border_style",
	"value" => array(
		"Solid" => "solid",
		"Dashed" => "dashed",
		"Dotted" => "dotted"
		),
    "save_always" => true,
	"description" => "",
	"dependency" => Array('element' => "content_menu_border_bottom", 'value' => array('yes'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border Top Color",
	"param_name" => "border_top_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border Bottom Color",
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding",
	"value" => "",
	"param_name" => "side_padding",
	"description" => "Padding (left/right in pixels or percentage. Put number and px or %. Ex. 30% or 30px)",
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
    "heading" => "Padding Top (px)",
	"value" => "",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
    "heading" => "Padding Bottom (px)",
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Label Color",
	"param_name" => "color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Label Hover Color",
	"param_name" => "hover_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "More Label",
	"param_name" => "more_button_label",
	"value" =>  "",
	"description" => "Default label is Expand Section",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Less Label",
	"param_name" => "less_button_label",
	"value" =>  "",
	"description" => "Default label is Contract Section",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Label Position",
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row",  array(
  "type" => "dropdown",
  "heading" => "CSS Animation",
  "param_name" => "css_animation",
  "admin_label" => true,
  "value" => $animations,
  "save_always" => true,
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));

vc_add_param("vc_row",  array(
	"type" => "textfield",
	"heading" => "Transition delay (ms)",
	"param_name" => "transition_delay",
	"admin_label" => true,
	"value" => "",
	"description" => "",
	"dependency" => array("element" => "css_animation", "not_empty" => true)
  
));

/*** Row Inner ***/

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Parallax" => "parallax",
		"Expandable" => "expandable"
	),
    "save_always" => true
));

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Full Width" => "full_width",
		"In Grid" => "grid"
	),
    "save_always" => true,
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Use Row as Full Screen Section Slide",
    "param_name" => "use_row_as_full_screen_section_slide",
    "value" => array(
        "No" => "no",
        "Yes" => "yes"
    ),
    "save_always" => true,
    "description" => "This option works only for Full Screen Sections Template",
    "dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => "Use as box",
    "value" => array("Use row as box" => "use_row_as_box" ),
    "param_name" => "use_as_box",
    "description" => '',
    "dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Border Radius(px)",
	"param_name" => "row_box_border_radius",
	"value" => "",
	"dependency" => Array('element' => "use_as_box", 'value' => array('use_row_as_box'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Border Width(px)",
	"param_name" => "row_box_border_width",
	"value" => "",
	"dependency" => Array('element' => "use_as_box", 'value' => array('use_row_as_box'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Anchor ID",
	"param_name" => "anchor",
	"value" => ""
));

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Align",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	),
    "save_always" => true
));

vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background color",
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Background image",
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax', 'row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Border color",
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding",
	"value" => "",
	"param_name" => "side_padding",
	"description" => "Left and right spacing in pixels",
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "More Button Label",
	"param_name" => "more_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Less Button Label",
	"param_name" => "less_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Button Position",
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"	
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Color",
	"param_name" => "color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));

vc_add_param("vc_row_inner",  array(
	"type" => "dropdown",
	"heading" => "CSS Animation",
	"param_name" => "css_animation",
	"admin_label" => true,
	"value" => $animations,
    "save_always" => true,
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));

vc_add_param("vc_row_inner",  array(
  "type" => "textfield",
  "heading" => "Transition delay (ms)",
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));


/*** Separator ***/

$separator_setting = array (
  'show_settings_on_create' => true,
  "controls"	=> '',
);
vc_map_update('vc_separator', $separator_setting);

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"Normal"		=>	"normal",
		"Transparent"	=>	"transparent",
		"Small"			=>	"small",
	),
    "save_always" => true,
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Position",
	"param_name" => "position",
	"value" => array(
		"Center" => "center",
		"Left" => "left",
		"Right" => "right",
		"Inherit from Elements Holder" => "inherit"
	),
    "save_always" => true,
    "dependency" => array("element" => "type", "value" => array("small")),
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Color",
	"param_name" => "color",
	"value" => "",
	"description" => "",
    "dependency" => array("element" => "type", "value" => array("small", "normal"))
));

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Border Style",
	"param_name" => "border_style",
	"value" => array(
		"" => "",
		"Dashed" => "dashed",
		"Solid" => "solid",
        "Dotted" => "dotted"
    ),
	"description" => ""
));

vc_add_param("vc_separator", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Width (px)",
    "param_name" => "width",
    "value" => "",
    "description" => "",
	"dependency" => array("element" => "type", "value" => array("small"))
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Thickness (px)",
	"param_name" => "thickness",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Top Margin",
	"param_name" => "up",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Top Margin Measuring Unit",
	"param_name" => "up_style",
	"value" => array(
		"Pixels" => "px",
		"Percentages" => "%",
    ),
    "save_always" => true,
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Bottom Margin",
	"param_name" => "down",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Bottom Margin Measuring Unit",
	"param_name" => "down_style",
	"value" => array(
		"Pixels" => "px",
		"Percentages" => "%",
    ),
    "save_always" => true,
	"description" => ""
));


/*** Separator With Text ***/

vc_add_param("vc_text_separator", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => "Title Color",
    "param_name" => "title_color",
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Title Font size (px)",
    "param_name" => 'title_size',
    "value" => "",
    "description" => ""
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Text In Box",
    "param_name" => "text_in_box",
    "value" => array(
        "Yes" => "yes",
        "No" => "no"
    ),
    "save_always" => true
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Text Position",
    "param_name" => "text_position",
    "value" => array(
        "Center" => "center",
        "Left" => "left",
        "Right" => "right"
    ),
    "save_always" => true
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Height (px)",
    "param_name" => 'box_height',
    "value" => "",
    "description" => "Insert height for a shape around the text"
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Left/right Padding (px)",
    "param_name" => 'box_padding',
    "value" => "",
    "description" => "Insert size for a padding on left and right side of text",
));

vc_add_param("vc_text_separator", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => "Box Background Color",
    "param_name" => "box_background_color",
    "dependency" => Array('element' => "text_in_box", 'value' => array('yes'))
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Box Border Width (px)",
    "param_name" => "box_border_width",
    "value" => "",
    "description" => "Insert width for the separator line",
    "dependency" => Array('element' => "text_in_box", 'value' => array('yes'))
));

vc_add_param("vc_text_separator", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => "Box Border Color",
    "param_name" => "box_border_color",
    "dependency" => Array('element' => "text_in_box", 'value' => array('yes'))
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Box Border radius (px)",
    "param_name" => "box_border_radius",
    "description" => esc_html__("Insert border radius(Rounded corners) in px. For example: 4. Leave empty for default. ", 'burst'),
    "dependency" => Array('element' => "text_in_box", 'value' => array('yes'))
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Box Border Style",
    "param_name" => "box_border_style",
    "value" => array(
        "Solid" => "solid",
        "Dashed" => "dashed",
        "Dotted" => "dotted",
        "Transparent" => "transparent"
    ),
    "save_always" => true,
    "description" => "Choose a style for the separator line",
    "dependency" => Array('element' => "text_in_box", 'value' => array('yes'))
));

vc_add_param("vc_text_separator", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => "Line Color",
    "param_name" => "line_color",
    "value" => "",
    "description" => "Choose a color for the separator line"
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Line Width (px)",
    "param_name" => "line_width",
    "value" => "",
    "description" => "Insert width for the separator line"
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Animation",
    "param_name" => "animation",
    "value" => array(
        "Default" => "default",
        "Animate Width" => "animate_width" 
    ),
    "save_always" => true,
    "description" => "Choose animation for separator"
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Line Thickness (px)",
    "param_name" => "line_thickness",
    "value" => "",
    "description" => "Insert thickness for the separator line"
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Separator Line Style",
    "param_name" => "line_border_style",
    "value" => array(
        "Solid" => "solid",
        "Dashed" => "dashed",
        "Dotted" => "dotted",
        "Transparent" => "transparent"
    ),
    "save_always" => true,
    "description" => "Choose a style for the separator line"
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Top Margin (px)",
    "param_name" => "up",
    "value" => "",
    "description" => "Insert top margin for the separator"
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Bottom Margin (px)",
    "param_name" => "down",
    "value" => "",
    "description" => "Insert bottom margin for the separator"
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Box Margins (px)",
    "param_name" => "box_margin",
    "description" => "Insert left and right line margins"
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Dots on line end ",
    "param_name" => "line_dots",
    "value" => array(
        "No" => "no",
        "Yes" => "yes"
    ),
    "save_always" => true,
    "description" => "Insert icons on the end of the border"
));

vc_add_param("vc_text_separator", array(
    "type" => "colorpicker",
    "holder" => "div",
    "class" => "",
    "heading" => "Dots Color",
    "param_name" => "line_dots_color",
    "description" => "Insert dots color (default value is #b2b2b2)",
    "dependency" => Array('element' => "line_dots", 'value' => array('yes'))
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "holder" => "div",
    "class" => "",
    "heading" => "Dots Size (px)",
    "param_name" => "line_dots_size",
    "description" => "Insert dots size",
    "dependency" => Array('element' => "line_dots", 'value' => array('yes'))
));


/*** Single Image ***/

vc_add_param("vc_single_image",  array(
	"type" => "dropdown",
	"heading" => "CSS Animation",
	"param_name" => "mkd_css_animation",
	"admin_label" => true,
	"value" => $animations,
    "save_always" => true,
	"description" => "" 
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Transition delay (s)",
	"param_name" => "transition_delay",
	"admin_label" => true,
	"value" => "",
	"description" => "",
	"dependency" => array("element" => "mkd_css_animation", "not_empty" => true)
));



vc_add_param("vc_single_image",  array(
	"type" => "dropdown",
	"heading" => "Set image shader",
	"param_name" => "set_shader",
	"admin_label" => true,
	"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
	"save_always" => true,
	"description" => "Choose whether to show a shader over the image when it comes into view-port."
));

vc_add_param("vc_single_image",  array(
	"type" => "colorpicker",
	"heading" => "Image shader color",
	"param_name" => "shader_color",
	"value" => "rgba(255,255,255,0.15)",
	"admin_label" => true,
	"save_always" => true,
	"description" => "Set the color of image shader.",
	"dependency" => array("element" => "set_shader", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Shader border radius",
	"param_name" => "shader_border_radius",
	"admin_label" => true,
	"save_always" => true,
	"value" => "0",
	"description" => "Set the shader border radius to match your image border radius. The default value is 0. You can use values in px or %.",
	"dependency" => array("element" => "set_shader", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Shader width",
	"param_name" => "shader_width",
	"admin_label" => true,
	"save_always" => true,
	"value" => "50",
	"description" => "Set the shader width as a percentage of the image width. The default value is 50. Use absolute values.",
	"dependency" => array("element" => "set_shader", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Shader height",
	"param_name" => "shader_height",
	"admin_label" => true,
	"save_always" => true,
	"value" => "100",
	"description" => "Set the shader height as a percentage of the image height. The default value is 100. Use absolute values.",
	"dependency" => array("element" => "set_shader", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Shader angle",
	"param_name" => "shader_angle",
	"admin_label" => true,
	"save_always" => true,
	"value" => "52",
	"description" => "Depending on image size, set the shader angle. For example set 52 for 52 degrees. Use absolute values.",
	"dependency" => array("element" => "set_shader", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "dropdown",
	"heading" => "Display a Pop Up note",
	"param_name" => "set_popup",
	"admin_label" => true,
	"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
	"save_always" => true,
	"description" => "Choose whether to showcase a pop up note attached to your image that'll be displayed when the image comes into viewport."
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Pop Up message",
	"param_name" => "popup_msg",
	"admin_label" => true,
	"save_always" => true,
	"value" => "NEW",
	"description" => "Enter a message to be displayed in a pop up.",
	"dependency" => array("element" => "set_popup", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "colorpicker",
	"heading" => "Pop Up background color",
	"param_name" => "popup_color",
	"value" => "#18cfab",
	"admin_label" => true,
	"save_always" => true,
	"description" => "Set the background color of the pop up.",
	"dependency" => array("element" => "set_popup", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "colorpicker",
	"heading" => "Pop Up text color",
	"param_name" => "popup_msg_color",
	"value" => "#fff",
	"admin_label" => true,
	"save_always" => true,
	"description" => "Set the text color of the pop up message.",
	"dependency" => array("element" => "set_popup", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "dropdown",
	"heading" => "Offset Pop Up message",
	"param_name" => "popup_offset",
	"admin_label" => true,
	"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
	"save_always" => true,
	"description" => "If needed you can offset a the pop up message from the initial top right area.",
	"dependency" => array("element" => "set_popup", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Top offset",
	"param_name" => "popup_top",
	"admin_label" => true,
	"save_always" => true,
	"value" => "",
	"description" => "Enter a top offset value. This value is calulated as percentage. So, enter 20 for 20%.",
	"dependency" => array("element" => "popup_offset", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Right offset",
	"param_name" => "popup_right",
	"admin_label" => true,
	"save_always" => true,
	"value" => "",
	"description" => "Enter a right offset value. This value is calulated as percentage. So, enter 20 for 20%.",
	"dependency" => array("element" => "popup_offset", "value" => array("yes"))
));

vc_add_param("vc_single_image",  array(
	"type" => "dropdown",
	"heading" => "Animate Image on Hover",
	"param_name" => "animate_image_on_hover",
	"admin_label" => true,
	"value" => array(
				"No" => "no",
				"Zoom In/Out" => "zoom"
			),
	"save_always" => true,
	"description" => "If image is set to link to an external URL, you can optionally enable a effect."
));

vc_add_param("vc_single_image",  array(
	"type" => "checkbox",
	"holder" => "div",
	"class" => "",
	"heading" => "Numbered image",
	"param_name" => "numbered_image",
	"value" => array("Add a number to your image?" => "yes"),
	"description" => ""
));

vc_add_param("vc_single_image",  array(
	"type" => "textfield",
	"heading" => "Image Number",
	"param_name" => "image_number",
	"admin_label" => true,
	"save_always" => true,
	"value" => "",
	"description" => "Enter an image number to be displayed in the top left corner.",
	"dependency" => array("element" => "numbered_image", "not_empty" => true)
));

function mkd_add_open_prettyphoto() {
    //Get current values stored in the Link Target in "Single Image" element
    $param = WPBMap::getParam('vc_single_image', 'img_link_target');
    //Append new value to the 'value' array
    $param['value'][esc_html__('Open prettyPhoto', 'burst')] = 'open_prettyphoto';
    //Finally "mutate" param with new values
    WPBMap::mutateParam('vc_single_image', $param);
}
add_action('init', 'mkd_add_open_prettyphoto',11);


/*************************************
 	Mapping Shortcodes
 *************************************/


/*** Elements Holder ***/

class WPBakeryShortCode_No_Elements_Holder  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Elements Holder', 'burst' ),
	"base" => "no_elements_holder",
	"as_parent" => array('only' => 'no_elements_holder_item'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-elements-holder extended-custom-icon",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "background_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Columns",
			"param_name" => "number_of_columns",
			"value" => array(
				"1 Column"      => "one_column",
				"2 Columns"    	=> "two_columns",
				"3 Columns"     => "three_columns",
				"4 Columns"      => "four_columns",
				"5 Columns"      => "five_columns",
				"6 Columns"      => "six_columns"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"holder" => "div",
			"class" => "",
			"heading" => "Items Float Left",
			"param_name" => "items_float_left",
			"value" => array("Make Items Float Left?" => "yes"),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"group" => "Width & Responsiveness",
			"heading" => "Switch to One Column",
			"param_name" => "switch_to_one_column",
			"value" => array(
				"Default"    		=> "",
				"Below 1300px" 		=> "1300",
				"Below 1024px"    	=> "1024",
				"Below 768px"     	=> "768",
				"Below 600px"    	=> "600",
				"Below 480px"    	=> "480",
				"Never"    			=> "never"
			),
            "save_always" => true,
			"description" => "Choose on which stage item will be in one column"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"group" => "Width & Responsiveness",
			"heading" => "Choose Alignment In Responsive Mode",
			"param_name" => "alignment_one_column",
			"value" => array(
				"Default"    	=> "",
				"Left" 			=> "left",
				"Center"    	=> "center",
				"Right"     	=> "right"
			),
			"description" => "Alignment When Items are in One Column"
		)
	)
) );


/*** Elements Holder Item ***/

class WPBakeryShortCode_No_Elements_Holder_Item  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Elements Holder Item', 'burst' ),
	"base" => "no_elements_holder_item",
	"as_parent" => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_slider'),
	"as_child" => array('only' => 'no_elements_holder'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-elements-holder-item extended-custom-icon",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "background_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Image",
			"param_name" => "background_image",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Padding",
			"param_name" => "item_padding",
			"value" => "",
			"description" => "Please insert padding in format 0px 10px 0px 10px"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Alignment",
			"param_name" => "aligment",
			"value" => array(
				"Left"    	=> "left",
				"Right"     => "right",
				"Center"      => "center"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Vertical Alignment",
			"param_name" => "vertical_alignment",
			"value" => array(
				"Default"    	=> "",
				"Top"    	=> "top",
				"Middle"    => "middle",
				"Bottom"    => "bottom"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Animation Name",
			"param_name" => "animation_name",
			"value" => array(
				"No Animation"     => "",
				"Flip In"     => "flip_in",
				"Grow In"     => "grow_in",
				"X Rotate"    => "x_rotate",
				"Z Rotate"    => "z_rotate",
				"Y Translate" => "y_translate",
				"Fade In"		=> "fade_in",
				"Fade In Down" => "fade_in_down",
				"Fade In Left X Rotate" => "fade_in_left_x_rotate"
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Animation Delay (ms)",
			"param_name" => "animation_delay",
			"value" => "",
			"description" => "",
			"dependency" => array('element' => "animation_name", 'value' => array('flip_in', 'grow_in', 'x_rotate','z_rotate','y_translate','fade_in', 'fade_in_down', 'fade_in_left_x_rotate'))
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Advanced Animations",
			"param_name" => "advanced_animations",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Animation Start Position",
			"param_name" => "start_position",
			"value" => array(
				'Bottom of Page' => 'bottom',
				'Center of Page' => 'center'
			),
            "save_always" => true,
			"description" => "",
			"dependency" => array("element" => "advanced_animations", "value" => array("yes"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Start Animation Style",
			"param_name" => "start_animation_style",
			"description" => "",
			"dependency" => array("element" => "advanced_animations", "value" => array("yes"))
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Animation End Position",
			"param_name" => "end_position",
			"value" => array(
				"Center of Page" => "center",
				"Top of Page" => "top-bottom"
			),
            "save_always" => true,
			"description" => "",
			"dependency" => array("element" => "advanced_animations", "value" => array("yes"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "End Animation Style",
			"param_name" => "end_animation_style",
			"description" => "",
			"dependency" => array("element" => "advanced_animations", "value" => array("yes"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Width & Responsiveness",
			"heading" => "Padding on screen size between 1300px-1600px",
			"param_name" => "item_padding_1300_1600",
			"value" => "",
			"description" => "Please insert padding in format 0px 10px 0px 10px"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Width & Responsiveness",
			"heading" => "Padding on screen size between 1024px-1300px",
			"param_name" => "item_padding_1024_1300",
			"value" => "",
			"description" => "Please insert padding in format 0px 10px 0px 10px"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Width & Responsiveness",
			"heading" => "Padding on screen size between 768px-1024px",
			"param_name" => "item_padding_768_1024",
			"value" => "",
			"description" => "Please insert padding in format 0px 10px 0px 10px"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Width & Responsiveness",
			"heading" => "Padding on screen size between 600px-768px",
			"param_name" => "item_padding_600_768",
			"value" => "",
			"description" => "Please insert padding in format 0px 10px 0px 10px"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Width & Responsiveness",
			"heading" => "Padding on screen size between 480px-600px",
			"param_name" => "item_padding_480_600",
			"value" => "",
			"description" => "Please insert padding in format 0px 10px 0px 10px"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Width & Responsiveness",
			"heading" => "Padding on Screen Size Bellow 480px",
			"param_name" => "item_padding_480",
			"value" => "",
			"description" => "Please insert padding in format 0px 10px 0px 10px"
		)
	)
) );


/*** Bordered Elements Holder ***/

class WPBakeryShortCode_No_Bordered_Elements_Holder extends WPBakeryShortCodesContainer {}
vc_map( array(
	'name' => esc_html__( 'Bordered Elements Holder', 'burst' ),
	'base' => 'no_bordered_elements_holder',
	'as_parent' => array('except' => 'vc_row'),
	'content_element' => true,
	'category' => 'by MIKADO',
	"icon" => "icon-wpb-bordered-elements-holder-item extended-custom-icon",
	'show_settings_on_create' => true,
	'js_view' => 'VcColumnView',
	'params' => array(
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'class' => '',
			'heading' => 'Border Animation Type',
			'param_name' => 'animation_type',
			'value' => array(
				'No Animation' => '',
				'Continue Line' => 'mkd_box_continue_line',
				'Corner Line' => 'mkd_box_corner_line',
				'Simultaneous Line' => 'mkd_box_simultaneous_line'
			),
			'description' => 'Choose type of animation'
		),
		array(
			'type' => 'colorpicker',
			'holder' => 'div',
			'class' => '',
			'heading' => 'Border Color',
			'param_name' => 'border_color',
			'value' => '',
			'description' => ''
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'class' => '',
			'heading' => 'Border Width (px)',
			'param_name' => 'border_width',
			'value' => '',
			'description' => ''
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'class' => '',
			'heading' => 'Duration of the Animation (s)',
			'param_name' => 'animation_time',
			'value' => '',
			'description' => 'Default is 2 sec',
			'dependency' => array('element' => 'animation_type', 'value' => array('mkd_box_continue_line', 'mkd_box_corner_line', 'mkd_box_simultaneous_line'))
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'class' => '',
			'heading' => 'Holder Padding (px)',
			'param_name' => 'holder_padding',
			'value' => '',
			'description' => ''
		)
	)
) );


/*** Blog List ***/

vc_map( array(
	"name" => "Blog List",
	"base" => "no_blog_list",
	"icon" => "icon-wpb-blog-list extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
        array(
            array(
                "type" => "dropdown",
		        "class" => "",
				"admin_label" => true,
                "heading" => esc_html__("Type", 'burst'),
                "param_name" => "type",
                "value" => array(
                    "Image in left box" => "image_in_box",
                    "Boxes" => "boxes",
                    "Minimal" => "minimal"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Posts",
                "param_name" => "number_of_posts",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Image Size",
                "param_name" => "image_size",
                "value" => array(
                    "Original" => "original",
                    "Landscape" => "landscape",
                    "Square" => "square",
                    "Custom Size" => "custom"
                ),
                "save_always" => true,
                "description" => "",
                "dependency" => Array('element' => "type", 'value' => array('boxes'))
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => "Image Width",
                "param_name" => "image_width",
                "value" => "",
                "description" => "Set custom image width",
                "dependency" => Array('element' => "image_size", 'value' => array('custom'))
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => "Image Height",
                "param_name" => "image_height",
                "value" => "",
                "description" => "Set custom image size",
                "dependency" => Array('element' => "image_size", 'value' => array('custom'))
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Show Thumbnail",
                "param_name" => "show_thumbnail",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                ),
                "save_always" => true,
                "description" => "",
                "dependency" => Array('element' => "type", 'value' => array('boxes'))
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Number of Columns",
                "param_name" => "number_of_columns",
                "value" => array(
                    "One" => "1",
                    "Two" => "2",
                    "Three" => "3",
                    "Four" => "4"
                ),
                "save_always" => true,
                "description" => "",
                "dependency" => Array('element' => "type", 'value' => array('boxes'))
            ),

            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Overlay Color",
                "param_name" => "overlay_color",
                "description" => "",
                "dependency" => Array('element' => "type", 'value' => array('boxes'))
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display Overlay Icon",
                "param_name" => "overlay_icon",
                "value" => array(
                    "No" => "0",
                    "Yes" => "1"
                ),
                "save_always" => true,
                "dependency" => Array('element' => "type", 'value' => array('boxes'))
            ),
            array(
                "type" => "dropdown",
				"admin_label" => true,
                "class" => "",
                "heading" => "Order By",
                "param_name" => "order_by",
                "value" => array(
                    "Title" => "title",
                    "Date" => "date"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "dropdown",
				"admin_label" => true,
                "class" => "",
                "heading" => "Order",
                "param_name" => "order",
                "value" => array(
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Category Slug",
                "param_name" => "category",
                "description" => "Leave empty for all or use comma for list"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Text length",
                "param_name" => "text_length",
                "description" => "Number of characters"
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Title Tag",
                "param_name" => "title_tag",
                "value" => array(
                    ""   => "",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ),
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Size (px)",
                "param_name" => "title_size",
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Color",
                "param_name" => "title_color",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display excerpt",
                "param_name" => "display_excerpt",
                "value" => array(
                    "Default" => "",
                    "Yes" => "1",
                    "No" => "0"
                ),
                "description" => ''
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Excerpt Color",
                "param_name" => "excerpt_color",
                "dependency" => Array('element' => "display_excerpt", 'value' => array('1', ''))
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Info Position",
                "param_name" => "info_position",
                "value" => array(
                    "Default" => "",
                    "Top" => "top",
                    "Bottom" => "bottom"
                )
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Post info font size (px)",
                "param_name" => "post_info_font_size",
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Post info color",
                "param_name" => "post_info_color",
                "description" => "",
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Post info link color",
                "param_name" => "post_info_link_color",
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Post info font family",
                "param_name" => "post_info_font_family",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Post info text transform",
                "param_name" => "post_info_text_transform",
                "value" => array(
                    "Default" => "",
                    "None" => "none",
                    "Capitalize" => "capitalize",
                    "Uppercase" => "uppercase",
                    "Lowercase" => "lowercase"
                ),
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Post info font weight",
                "param_name" => "post_info_font_weight",
                "value" => $font_weight_array,
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Post info font style",
                "param_name" => "post_info_font_style",
                "value" => array(
                    "Default" => "",
                    "Normal" => "normal",
                    "Italic" => "italic"
                ),
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Post info letter spacing (px)",
                "param_name" => "post_info_letter_spacing",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display category",
                "param_name" => "display_category",
                "value" => array(
                    "Default" => "",
                    "Yes" => "1",
                    "No" => "0"
                ),
                "description" => ''
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display date",
                "param_name" => "display_date",
                "value" => array(
                    "Default" => "",
                    "Yes" => "1",
                    "No" => "0"
                ),
                "description" => ''
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Date Position",
                "param_name" => "date_place",
                "value" => array(
                    "Date by Title" => "by_title",
                    "Date by Post Info" => "by_post_info",
                    "Date over Title" => "over_title"
                ),
                "save_always" => true,
                "description" => 'Choose where the date will be placed'
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Date Size (px)",
                "param_name" => "date_size",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display author",
                "param_name" => "display_author",
                "value" => array(
                    "Default" => "",
                    "Yes" => "1",
                    "No" => "0"
                )
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display comments",
                "param_name" => "display_comments",
                "value" => array(
                    "Default" => "",
                    "Yes" => "1",
                    "No" => "0"
                ),
                "dependency" => Array('element' => "type", 'value' => array('image_in_box','boxes'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Box Background Color",
                "param_name" => "background_color",
                "dependency" => Array('element' => "type", 'value' => array('boxes', 'image_in_box'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Box Padding",
                "param_name" => "box_info_padding",
                "description" => "Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px",
                "dependency" => Array('element' => "type", 'value' => array('boxes', 'image_in_box'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Between Item Color",
                "param_name" => "border_color",
                "description" => "",
                "dependency" => array('element' => "type", 'value' => array('minimal','image_in_box'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Between Item Thickness (px)",
                "param_name" => "border_width",
                "description" => "",
                "dependency" => array('element' => "type", 'value' => array('minimal','image_in_box'))

            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Display Button",
                "param_name" => "display_button",
                "value" => array(
                    "Default" => "",
                    "Yes" => "1",
                    "No" => "0"
                ),
                "description" => "Show button leading to post single page"
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Button Size",
                "param_name" => "button_size",
                "value" => array(
                    "Default" => "",
                    "Small" => "small",
                    "Medium" => "medium",
                    "Large" => "large",
                    "Extra Large" => "big_large"
                ),
                "description" => "Default value is small",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Button Style",
                "param_name" => "button_style",
                "value" => array(
                    "Default" => "",
                    "White" => "white"
                ),
                "description" => "",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Text",
                "param_name" => "button_text",
                "description" => "Default text is LEARN MORE",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Text Color",
                "param_name" => "button_color",
                "description" => "",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Text Hover Color",
                "param_name" => "button_hover_color",
                "description" => "",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Background Color",
                "param_name" => "button_background_color",
                "description" => "",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Hover Background Color",
                "param_name" => "button_hover_background_color",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Border Color",
                "param_name" => "button_border_color",
                "description" => "",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Border Width",
                "param_name" => "button_border_width",
                "description" => "",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Hover Border Color",
                "param_name" => "button_hover_border_color",
                "description" => "",
                "dependency" => array('element' => "display_button", 'value' => '1')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Border Radius (px)",
                "param_name" => "button_border_radius",
                "description" => "Border radius for button",
                "dependency" => array('element' => "display_button", 'value' => '1')
            )
        ),
        $mkd_burst_IconCollections->getVCParamsArray( array( 'element' => 'display_button', 'value' => '1' ) ),
        array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Icon Position",
                "param_name" => "button_icon_position",
                "value" => array(
                    "Right" => "right",
                    "Left" => "left"
                ),
                "save_always" => true,
                "dependency" => Array('element' => $mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Icon Color",
                "param_name" => "button_icon_color",
                "dependency" => Array('element' =>$mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)
            ),
			  array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Icon Hover Color",
                "param_name" => "button_icon_hover_color",
                "dependency" => Array('element' =>$mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)
            )
        )
	)
) );


/*** Blog Carousel ***/

vc_map( array(
	"name" => "Blog Carousel",
	"base" => "no_blog_carousel",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-blog-carousel extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Carousel info type",
			"param_name" => "type",
			"value" => array(
				"Default" => "",
				"Post Info visible" => "info_always",
				"Post Info in Bottom" => "info_in_bottom"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Image size",
			"param_name" => "image_size",
			"value" => array(
				"Default" => "",
				"Original Size" => "full",
				"Landscape" => "landscape",
				"Portrait" => "portrait"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Order By",
			"param_name" => "order_by",
			"value" => array(
				"" => "",
				"Title" => "title",
				"Date" => "date"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Order",
			"param_name" => "order",
			"value" => array(
				"" => "",
				"ASC" => "ASC",
				"DESC" => "DESC",
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Number",
			"param_name" => "number",
			"value" => "-1",
			"description" => "Number of blog posts on page (-1 is all)"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Number of Blog Posts Shown",
			"param_name" => "blogs_shown",
			"value" => array(
				"" => "",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6"
			),
			"save_always" => true,
			"description" => "Number of blog posts that are showing at the same time in full width (on smaller screens is responsive so there will be less items shown)",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Category",
			"param_name" => "category",
			"value" => "",
			"description" => "Category Slug (leave empty for all)"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Selected Projects",
			"param_name" => "selected_projects",
			"value" => "",
			"description" => "Selected Projects (leave empty for all, delimit by comma)"
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Info Box Background Color",
			"param_name" => "hover_box_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Post Info Color",
			"param_name" => "post_info_color",
			"value" => "",
			"description" => "",
			"dependency" => array("element" => "type","value" => "info_in_bottom")
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Author",
			"param_name" => "show_author",
			"value" => array(
				"Yes" => "yes",
				"No" => "no"
			),
            "save_always" => true,
			"description" => "Default value is Yes",
			"dependency" => array("element" => "type", "value" => "info_in_bottom")
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Author Color",
			"param_name" => "author_color",
			"value" => "",
			"description" => "",
			"dependency" => array('element' => "show_author", 'value' => array('yes'))
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Category Names",
			"param_name" => "show_categories",
			"value" => array(
				"Yes" => "yes",
				"No" => "no"
			),
            "save_always" => true,
			"description" => "Default value is Yes",
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Category Name Color",
			"param_name" => "category_color",
			"value" => "",
			"description" => "",
			"dependency" => array('element' => "show_categories", 'value' => array('yes'))
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Date",
			"param_name" => "show_date",
			"value" => array(
				"Yes" => "yes",
				"No" => "no"
			),
            "save_always" => true,
			"description" => "Default value is Yes"
		),		
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Date Position",
			"param_name" => "date_position",
			"value" => array(
				"Above Title" => "above",
				"Below Title" => "below"
			),
            "save_always" => true,
			"description" => "Default value is Above",
			"dependency" => array('element' => "type",'value' => array('info_always',''))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Date Color",
			"param_name" => "date_color",
			"value" => "",
			"description" => "Will be Month Color for Post Info in Bottom Type",
			"dependency" => array('element' => "show_date", 'value' => array('yes'))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Day Color",
			"param_name" => "day_color",
			"value" => "",
			"description" => "Only for Post Info in Bottom type",
			"dependency" => array('element' => "show_date", 'value' => array('yes'))
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Title Tag",
			"param_name" => "title_tag",
			"value" => array(
				""   => "",
				"h2" => "h2",
				"h3" => "h3",
				"h4" => "h4",
				"h5" => "h5",
				"h6" => "h6",
			),
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Prev/Next navigation",
			"value" => array("Enable prev/next navigation?" => "enable_navigation"),
			"param_name" => "enable_navigation"
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Bullets navigation",
			"value" => array("Show bullets navigation?" => "yes"),
			"param_name" => "pager_navigation"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Separator",
			"param_name" => "show_separator",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => "Show separator below title",
			"dependency" => array('element' => 'type', 'value' => array('info_always',''))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Color",
			"param_name" => "separator_color",
			"description" => "",
			"dependency" => array('element' => "show_separator", 'value' => array('yes'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Thickness (px)",
			"param_name" => "separator_thickness",
			"description" => "",
			"dependency" => array('element' => "show_separator", 'value' => array('yes'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Width (px)",
			"param_name" => "separator_width",
			"description" => "",
			"dependency" => array('element' => "show_separator", 'value' => array('yes'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Extra class name",
			"param_name" => "add_class",
			"value" => "",
			"description" => "If you wish to style this particular blog carousel differently, you can use this field to add an extra class name to it and then refer to that class name in your css file."
		)
	)
) );


/*** Blog Slider***/

vc_map( array(
	"name" => "Blog Slider",
	"base" => "no_blog_slider",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-blog-slider extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Slider Type",
			"param_name" => "type",
			"value" => array(
				"Info Centered" => "center",
				"Info in Bottom" => "bottom"
				),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Order By",
			"param_name" => "order_by",
			"value" => array(
				"" => "",
				"Title" => "title",
				"Date" => "date"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Order",
			"param_name" => "order",
			"value" => array(
				"" => "",
				"ASC" => "ASC",
				"DESC" => "DESC",
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Number",
			"param_name" => "number",
			"value" => "-1",
			"description" => "Number of blog posts on page (-1 is all)"
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Title Tag",
			"param_name" => "title_tag",
			"value" => array(
				""   => "",
				"h2" => "h2",
				"h3" => "h3",
				"h4" => "h4",
				"h5" => "h5",
				"h6" => "h6",
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Image size",
			"param_name" => "image_size",
			"value" => array(
				"Default" => "",
				"Original Size" => "full",
				"Landscape" => "landscape",
				"Portrait" => "portrait",
				"Custom Size" => "custom"
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Image Width",
			"param_name" => "image_width",
			"value" => "",
			"description" => "Set custom image width",
			"dependency" => array("element" => "image_size", "value" => array("custom"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Image Height",
			"param_name" => "image_height",
			"value" => "",
			"description" => "Set custom image height",
			"dependency" => array("element" => "image_size", "value" => array("custom"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Category",
			"param_name" => "category",
			"value" => "",
			"description" => "Category Slug (leave empty for all)"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Selected Projects",
			"param_name" => "selected_projects",
			"value" => "",
			"description" => "Selected Projects (leave empty for all, delimit by comma)"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Category",
			"param_name" => "show_category",
			"value" => array(
				"Default"  => "",
				"Yes" => "yes",
				"No"  => "no"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Author",
			"param_name" => "show_author",
			"value" => array(
				"Default"  => "",
				"Yes" => "yes",
				"No"  => "no"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Date",
			"param_name" => "show_date",
			"value" => array(
				"Default"  => "",
				"Yes" => "yes",
				"No"  => "no"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Comments",
			"param_name" => "show_comments",
			"value" => array(
				"Default"  => "",
				"Yes" => "yes",
				"No"  => "no"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Read More Button",
			"param_name" => "show_read_more",
			"value" => array(
				"Default"  => "",
				"Yes" => "yes",
				"No"  => "no"
			),
			"description" => ""
		),
	)
) );

/*** Vertical Split Slider ***/

class WPBakeryShortCode_No_Vertical_Split_Slider  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Mikado Vertical Split Slider', 'burst' ),
	"base" => "no_vertical_split_slider",
	"as_parent" => array('only' => 'no_vertical_left_sliding_panel,no_vertical_right_sliding_panel'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-split-slider extended-custom-icon",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Preloader Background Color",
			"param_name" => "background_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Left Slide Panel size (%)",
			"param_name" => "left_slide_panel_size",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Right Slide Panel size (%)",
			"param_name" => "right_slide_panel_size",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Disable Dark/Light Header Skin Change",
			"param_name" => "disable_header_skin_change",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => ""
		)
	)
) );


/*** Vertical Split Slider Left Panel ***/

class WPBakeryShortCode_No_Vertical_Left_Sliding_Panel  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Left Sliding Panel', 'burst' ),
	"base" => "no_vertical_left_sliding_panel",
	"as_parent" => array('only' => 'no_vertical_slide_content_item'),
	"as_child" => array('only' => 'no_vertical_split_slider'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-split-slider-left-panel extended-custom-icon",
	"show_settings_on_create" => false,
	"js_view" => 'VcColumnView',
	'params' => array()
) );


/*** Vertical Split Slider Right Panel ***/

class WPBakeryShortCode_No_Vertical_Right_Sliding_Panel  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Right Sliding Panel', 'burst' ),
	"base" => "no_vertical_right_sliding_panel",
	"as_parent" => array('only' => 'no_vertical_slide_content_item'),
	"as_child" => array('only' => 'no_vertical_split_slider'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-split-slider-right-panel extended-custom-icon",
	"show_settings_on_create" => false,
	"js_view" => 'VcColumnView',
	'params' => array()
) );


/*** Vertical Split Slider Content Item ***/

class WPBakeryShortCode_No_Vertical_Slide_Content_Item  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Slide Content Item', 'burst' ),
	"base" => "no_vertical_slide_content_item",
	"as_parent" => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_list, no_portfolio_slider, no_carousel'),
	"as_child" => array('only' => 'no_vertical_left_sliding_panel, no_vertical_right_sliding_panel'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-split-slider-content-item extended-custom-icon",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "background_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Image",
			"param_name" => "background_image",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Padding left/right",
			"param_name" => "item_padding",
			"value" => "",
			"description" => "Please insert padding in format '10px'"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Content Aligment",
			"param_name" => "alignment",
			"value" => array(
				"left"    	=> "left",
				"right"     => "right",
				"center"      => "center"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Header/Bullets Style",
			"param_name" => "header_style",
			"value" => array(
				""	=>	"",
				"Light"	=>	"light",
				"Dark"	=>	"dark"
			),
			"description" => ""
		)

	)
) );


/*** Vertical Split Slider With Text Over ***/

class WPBakeryShortCode_No_Vertical_Split_Slider_With_Text_Over  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Mikado Vertical Split Slider With Text Over', 'burst' ),
	"base" => "no_vertical_split_slider_with_text_over",
	"as_parent" => array('only' => 'no_vertical_split_slider_with_text_over_left_panel,no_vertical_split_slider_with_text_over_right_panel'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-split-slider extended-custom-icon",
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Preloader Background Color",
			"param_name" => "background_color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Slider Title",
			"param_name" => "slide_title",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Font Size (px)",
			"param_name" => "title_font_size",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Font Family",
			"param_name" => "title_font_family",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Line Height (px)",
			"param_name" => "title_line_height",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Letter Spacing (px)",
			"param_name" => "title_letter_spacing",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Font Weight",
			"param_name" => "title_font_weight",
			"value" => array(
				"Default" => "",
				"Thin 100" => "100",
				"Extra-Light 200" => "200",
				"Light 300" => "300",
				"Regular 400" => "400",
				"Medium 500" => "500",
				"Semi-Bold 600" => "600",
				"Bold 700" => "700",
				"Extra-Bold 800" => "800",
				"Ultra-Bold 900" => "900"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Text Transform",
			"param_name" => "title_text_transform",
			"value" => array(
				"Default" => "",
				"None" => "none",
				"Capitalize" => "capitalize",
				"Uppercase" => "uppercase",
				"Lowercase" => "lowercase"
			)
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Font Style",
			"param_name" => "title_font_style",
			"value" => array(
				"" => "",
				"Normal" => "normal",
				"Italic" => "italic"
			)
		)
	)
) );


/*** Vertical Split Slider With Text Over Left Panel ***/

class WPBakeryShortCode_No_Vertical_Split_Slider_With_Text_Over_Left_Panel  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Left Panel', 'burst' ),
	"base" => "no_vertical_split_slider_with_text_over_left_panel",
	"as_parent" => array('only' => 'no_vertical_split_slider_with_text_over_content'),
	"as_child" => array('only' => 'no_vertical_split_slider_with_text_over'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-split-slider-left-panel extended-custom-icon",
	"show_settings_on_create" => false,
	"params" => array(),
	"js_view" => 'VcColumnView'
) );


/*** Vertical Split Slider With Text Over Right Panel ***/

class WPBakeryShortCode_No_Vertical_Split_Slider_With_Text_Over_Right_Panel  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Right Panel', 'burst' ),
	"base" => "no_vertical_split_slider_with_text_over_right_panel",
	"as_parent" => array('only' => 'no_vertical_split_slider_with_text_over_content'),
	"as_child" => array('only' => 'no_vertical_split_slider_with_text_over'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-split-slider-right-panel extended-custom-icon",
	"show_settings_on_create" => false,
	"params" => array(),
	"js_view" => 'VcColumnView'
) );


/*** Vertical Split Slider With Text Over Content ***/

class WPBakeryShortCode_No_Vertical_Split_Slider_With_Text_Over_Content  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" =>  esc_html__( 'Slide Content Item', 'burst' ),
	"base" => "no_vertical_split_slider_with_text_over_content",
	"as_child" => array('only' => 'no_vertical_split_slider_with_text_over_left_panel, no_vertical_split_slider_with_text_over_right_panel'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-split-slider-content-item extended-custom-icon",
	"show_settings_on_create" => true,
	"params" => array(
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Image",
			"param_name" => "background_image",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Link",
			"param_name" => "link"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Link Target",
			"param_name" => "target",
			"value" => array(
				"Self" => "_self",
				"Blank" => "_blank"
			),
            "save_always" => true
		)

	)
) );

/*** Parallax Layers ***/

vc_map( array(
	"name" => "Parallax Layers",
	"base" => "no_parallax_layers",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-parallax-layers extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "attach_images",
			"holder" => "div",
			"class" => "",
			"heading" => "Layers",
			"param_name" => "images"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Full Screen Height",
			"param_name" => "full_screen",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Height (px)",
			"param_name" => "height",
			"value" => "",
			"dependency" => array('element' => 'full_screen', 'value' => 'no')
		),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => "Content",
            "param_name" => "content",
            "value" => "",
            "description" => "This content will be displayed as final (top) layer over all other layers"
        )
	)
) );


/*** Google Map ***/

vc_map( array(
	"name" => "Google Map",
	"base" => "no_google_map",
	"icon" => "icon-wpb-google-map extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 1",
			"param_name" => "address1",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 2",
			"param_name" => "address2",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 3",
			"param_name" => "address3",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 4",
			"param_name" => "address4",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Address 5",
			"param_name" => "address5",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Custom Map Style",
			"param_name" => "custom_map_style",
			"value" => array(
				"No" => "false",
				"Yes" => "true"
			),
            "save_always" => true,
			"description" => "Enabling this option will allow Map editing"
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Color Overlay",
			"param_name" => "color_overlay",
			"description" => "Choose a Map color overlay",
			"dependency" => Array('element' => "custom_map_style", 'value' => array('true'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Saturation",
			"param_name" => "saturation",
			"description" => "Choose a level of saturation (-100 = least saturated, 100 = most saturated)",
			"dependency" => Array('element' => "custom_map_style", 'value' => array('true'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Lightness",
			"param_name" => "lightness",
			"description" => "Choose a level of lightness (-100 = darkest, 100 = lightest)",
			"dependency" => Array('element' => "custom_map_style", 'value' => array('true'))
		),
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Pin",
			"param_name" => "pin",
			"description" => "Select a pin image to be used on Google Map"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Map Zoom",
			"param_name" => "zoom",
			"description" => "Enter a zoom factor for Google Map (0 = whole worlds, 19 = individual buildings)"
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Zoom Map on Mouse Wheel",
			"param_name" => "google_maps_scroll_wheel",
			"value" => array(
				"No" => "false",
				"Yes" => "true"
			),
            "save_always" => true,
			"description" => "Enabling this option will allow users to zoom in on Map using mouse wheel"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Map Height",
			"param_name" => "map_height",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Fullscreen Map Height",
			"param_name" => "full_screen_map_height",
			"value" => array("Enable Fullscreen Map Height?" => "yes"),
			"description" => "Use only with Vertical Split Slider"
		),

		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Additional Informations",
			"param_name" => "enable_additional_informations",
			"value" => array("Enable Additional Informations Box?" => "yes"),
			"description" => 'You can set options for this box in "Addition Informations" tab'
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"group" => "Additional Informations",
			"heading" => "Additional Informations Text",
			"param_name" => "content",
			"value" =>"",
			"description" => "Please Insert Additional Informations",
			"dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes'))
		),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "group" => "Additional Informations",
            "heading" => "Hide info box on small screens",
            "param_name" => "info_box_hide_on_small_screens",
            "value" => array(
                "No " => "no",
                "Yes" => "yes"
            ),
            "save_always" => true,
            "dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes')),
            "description" => "Hide info box on screens equal and smaller than 768px."
        ),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"group" => "Additional Informations",
			"heading" => "Info box aligned to grid",
			"param_name" => "info_box_grid",
			"value" => array(
				"No " => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes')),
			"description" => "This options applies only when the map is full width."
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"group" => "Additional Informations",
			"heading" => "Info Box Left/Right Aligment",
			"param_name" => "info_box_left_right_aligment",
			"value" => array(
				"Left " => "left",
				"Right" => "right"
			),
            "save_always" => true,
			"dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes'))
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"group" => "Additional Informations",
			"heading" => "Info Box Top/Bottom Aligment",
			"param_name" => "info_box_top_bottom_aligment",
			"value" => array(
				"Top" => "top",
				"Bottom" => "bottom"
			),
            "save_always" => true,
			"dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Additional Informations",
			"heading" => "Info box position from Left/Right edge(px)",
			"param_name" => "info_box_left_right_distance",
			"value" => "",
			"dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Additional Informations",
			"heading" => "Info box position from Top/Bottom edge(px)",
			"param_name" => "info_box_top_bottom_distance",
			"value" => "",
			"dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes'))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"group" => "Additional Informations",
			"heading" => "Info box background color",
			"param_name" => "info_box_background_color",
			"value" => "",
			"dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes'))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"group" => "Additional Informations",
			"heading" => "Info box width(%)",
			"param_name" => "info_box_width",
			"value" => "",
			"dependency" => Array('element' => "enable_additional_informations", 'value' => array('yes'))
		)
	)
));



/*** Team ***/

$team_social_icons_array = array();
for ($x = 1; $x<6; $x++) {
	$teamIconCollections = $mkd_burst_IconCollections->getCollectionsWithSocialIcons();
	foreach($teamIconCollections as $collection_key => $collection) {

		$team_social_icons_array[] = array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Social Icon ".$x,
			"param_name" => "team_social_".$collection->param."_".$x,
			"value" => $collection->getSocialIconsArrayVC(),
            "save_always" => true,
			"dependency" => Array('element' => "team_social_icon_pack", 'value' => array($collection_key))
		);

	}

	$team_social_icons_array[] = array(
		"type" => "textfield",
		"holder" => "div",
		"class" => "",
		"heading" => "Social Icon ".$x." Link",
		"param_name" => "team_social_icon_".$x."_link",
		"dependency" => array('element' => 'team_social_icon_pack', 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
	);

	$team_social_icons_array[] = array(
		"type" => "dropdown",
		"holder" => "div",
		"class" => "",
		"heading" => "Social Icon ".$x." Target",
		"param_name" => "team_social_icon_".$x."_target",
		"value" => array(
			"" => "",
			"Self" => "_self",
			"Blank" => "_blank"
		),
		"dependency" => Array('element' => "team_social_icon_".$x."_link", 'not_empty' => true)
	);

}

vc_map( array(
	"name" => "Team",
	"base" => "no_team",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-team extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
		array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Type",
				"param_name" => "team_type",
				"value" => array(
					"Main Info on Hover"     => "on_hover",
					"Main Info Below Image"  => "below_image"
				),
                "save_always" => true
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Image",
				"param_name" => "team_image"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Image Type",
				"param_name" => "team_image_type",
				"value" => array(
					"Default"   => "",
					"Circle"   => "circle"
				)
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Image hover color",
				"param_name" => "team_image_hover_color"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Hover Type",
				"param_name" => "team_hover_type",
				"value" => array(
					"Text In Center"        => "in_center",
					"Text in Left Corner"   => "in_corner"
				),
                "save_always" => true,
				"dependency" => array('element' => "team_type", 'value' => array('on_hover'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Image Bottom Margin",
				"param_name" => "team_info_margin_top",
				"dependency" => array('element' => "team_type", 'value' => array('below_image'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Name",
				"param_name" => "team_name"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Name Tag",
				"param_name" => "team_name_tag",
				"value" => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"dependency" => array('element' => 'team_name', 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin bottom(px)",
				"param_name" => "team_name_bottom_margin",
				"dependency" => array('element' => 'team_name', 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Name font size(px)",
				"param_name" => "team_name_font_size",
				"dependency" => array('element' => 'team_name', 'not_empty' => true)
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Name color",
				"param_name" => "team_name_color",
				"dependency" => array('element' => 'team_name', 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Name font weight",
				"param_name" => "team_name_font_weight",
				"value" => $font_weight_array,
                "save_always" => true,
				"description" => "",
				"dependency" => array('element' => 'team_name', 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Name text transform",
				"param_name" => "team_name_text_transform",
				"value" => array(
					"Default" => "",
					"None" => "none",
					"Capitalize" => "capitalize",
					"Uppercase" => "uppercase",
					"Lowercase" => "lowercase"
				),
				"dependency" => array('element' => 'team_name', 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Separator",
				"param_name" => "team_show_separator",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"
				),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator width",
				"param_name" => "team_separator_width",
				"dependency" => array('element' => 'team_show_separator', 'value' => "yes")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator thickness",
				"param_name" => "team_separator_thickness",
				"dependency" => array('element' => 'team_show_separator', 'value' => "yes")
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator color",
				"param_name" => "team_separator_color",
				"dependency" => array('element' => 'team_show_separator', 'value' => "yes")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Position",
				"param_name" => "team_position"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Position font size(px)",
				"param_name" => "team_position_font_size",
				"dependency" => array('element' => 'team_position', 'not_empty' => true)
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Position color",
				"param_name" => "team_position_color",
				"dependency" => array('element' => 'team_position', 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Position font weight",
				"param_name" => "team_position_font_weight",
				"value" => $font_weight_array,
                "save_always" => true,
				"description" => "",
				"dependency" => array('element' => 'team_position', 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Position text transform",
				"param_name" => "team_position_text_transform",
				"value" => array(
					"Default" => "",
					"None" => "none",
					"Capitalize" => "capitalize",
					"Uppercase" => "uppercase",
					"Lowercase" => "lowercase"
				),
				"dependency" => array('element' => 'team_position', 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Name/Position Order",
				"param_name" => "name_position_order",
				"value" => array(
					"Default" => "",
					"Name Before Position" => "name_first",
					"Position Before Name" => "position_first"
				),
				"description" => "Choose in which order will name and position appear"
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Description",
				"param_name" => "team_description"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Description color",
				"param_name" => "team_description_color",
				"dependency" => array('element' => 'team_description', 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text align",
				"param_name" => "text_align",
				"value" => array(
					"Default" => "",
					"Left" => "left_align",
					"Center" => "center_align",
					"Right" => "right_align"
				)
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border",
				"param_name" => "box_border",
				"value" => array(
					"Default" => "",
					"No" => "no",
					"Yes" => "yes"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border Width",
				"param_name" => "box_border_width",
				"value" => "",
				"description" => "",
				"dependency" => array('element' => "box_border", 'value' => array('yes'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border Color",
				"param_name" => "box_border_color",
				"value" => "",
				"description" => "",
				"dependency" => array('element' => "box_border", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icon Pack",
				"param_name" => "team_social_icon_pack",
				"value" => array_merge(array("" => ""),$mkd_burst_IconCollections->getIconCollectionsVCExclude(array('linea_icons','dripicons'))),
                "save_always" => true
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Style",
				"param_name" => "team_social_style",
				"value" => array(
					"In the Bottom Left Corner" => "social_style_bottom_left",
					"Between Image and Info" => "social_style_between",
					"In the center of the image" => "social_style_center",
					"In the bottom of the image" => "social_style_bottom"
				),
                "save_always" => true,
				"description" => "Social Style applies only when Main Info Below Image type is selected",
				"dependency" => array('element' => 'team_social_icon_pack', 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons Border color",
				"param_name" => "team_social_icon_holder_border_color",
				"description" => "Social Icons Background Color applies only when Social Style On the bottom of the image is selected",
				"dependency" => array('element' => 'team_social_icon_pack', 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons Background color",
				"param_name" => "team_social_icon_holder_back_color",
				"description" => "Social Icons Background Color applies only when Social Style On the bottom of the image is selected",
				"dependency" => array('element' => 'team_social_icon_pack', 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons Position",
				"param_name" => "social_icons_position",
				"value" => array(
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"
				),
                "save_always" => true,
				"description" => "Social Icons Position applies only when Main Info Below Image type is selected",
				"dependency" => array('element' => 'team_social_style', 'value' => array("social_style_between"))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Text",
				"param_name" => "social_icons_text",
				"value" => "",
				"description" => "Enter text that will display above social icons",
				"dependency" => array('element' => 'team_social_style', 'value' => array("social_style_center","social_style_bottom","social_style_bottom_left"))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Text Color",
				"param_name" => "social_icons_text_color",
				"description" => "",
				"dependency" => array('element' => 'social_icons_text', 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons Type",
				"param_name" => "team_social_icon_type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"
				),
                "save_always" => true,
				"dependency" => array('element' => 'team_social_icon_pack', 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons Size(px)",
				"param_name" => "team_social_icon_size",
				"dependency" => array('element' => 'team_social_icon_pack', 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons color",
				"param_name" => "team_social_icon_color",
				"dependency" => array('element' => 'team_social_icon_pack', 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons Background Color",
				"param_name" => "team_social_icon_background_color",
				"dependency" => array('element' => 'team_social_icon_type', 'value' => array('circle', 'square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Icons Border Color",
				"param_name" => "team_social_icon_border_color",
				"dependency" => array('element' => 'team_social_icon_type', 'value' => array('circle', 'square'))
			)
		),
		$team_social_icons_array,
		array(
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "Team Member Skills",
				"value" => array("Show Team Member Skills?" => "yes"),
				"param_name" => "show_skills",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Skills Title Size",
				"param_name" => "skills_title_size",
				"dependency" => array("element" => "show_skills", "value" => "yes")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "First Skill Title",
				"param_name" => "skill_title_1",
				"description" => "For example Web design",
				"dependency" => array("element" => "show_skills", "value" => "yes")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "First Skill Percentage",
				"param_name" => "skill_percentage_1",
				"description" => "Enter just number, without %",
				"dependency" => array("element" => "show_skills", "value" => "yes")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Second Skill Title",
				"param_name" => "skill_title_2",
				"description" => "For example Web design",
				"dependency" => array("element" => "show_skills", "value" => "yes")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Second Skill Percentage",
				"param_name" => "skill_percentage_2",
				"description" => "Enter just number, without %",
				"dependency" => array("element" => "show_skills", "value" => "yes")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Third Skill Title",
				"param_name" => "skill_title_3",
				"description" => "For example Web design",
				"dependency" => array("element" => "show_skills", "value" => "yes")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Third Skill Percentage",
				"param_name" => "skill_percentage_3",
				"description" => "Enter just number, without %",
				"dependency" => array("element" => "show_skills", "value" => "yes")
			)
		)
	)

) );


/*** Clients ***/

class WPBakeryShortCode_No_Clients  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Mikado Clients", "burst",
	"base" => "no_clients",
	"as_parent" => array('only' => 'no_client'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-clients extended-custom-icon",
	"show_settings_on_create" => true,
	"params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Columns",
			"param_name" => "columns",
			"value" => array(
				"Two"       => "two_columns",
				"Three"     => "three_columns",
				"Four"      => "four_columns",
				"Five"      => "five_columns",
				"Six"       => "six_columns"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show borders",
			"param_name" => "client_borders",
			"description" => "",
			"value" => array(
				"Yes"      => "yes",
				"No"      => "no"
			),
            "save_always" => true
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Space between clients",
			"param_name" => "space_between_clients",
			"description" => "When yes, space will be 10px",
			"value" => array(
				"No"      => "no",
				"Yes"      => "yes"
			),
            "save_always" => true
		)
	),
	"js_view" => 'VcColumnView'
) );


/*** Client ***/

class WPBakeryShortCode_No_Client extends WPBakeryShortCode {}
vc_map( array(
	"name" => "Mikado Client", "burst",
	"base" => "no_client",
	"content_element" => true,
	"icon" => "icon-wpb-client extended-custom-icon",
	"as_child" => array('only' => 'no_clients'),
	"params" => array(
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Image",
			"param_name" => "image"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Link",
			"param_name" => "link"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Link Target",
			"param_name" => "link_target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank"
			)
		)
	)
) );


/*** Circles ***/

class WPBakeryShortCode_No_Circles  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Mikado Process Holder", "burst",
	"base" => "no_circles",
	"as_parent" => array('only' => 'no_circle'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-circles extended-custom-icon",
	"show_settings_on_create" => true,
	"params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Columns",
			"param_name" => "columns",
			"value" => array(
				"Three"     => "three_columns",
				"Four"      => "four_columns",
				"Five"      => "five_columns",
				"Six"      =>  "six_columns"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Lines between items?",
			"param_name" => "lines_between",
			"description" => "",
			"value" => array(
				"Default"     => "",
				"No"      => "no",
				"Yes"      => "yes"
			)
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Line Color",
			"param_name" => "line_color",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Process Item Height (px)",
			"param_name" => "process_height",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Process Item Width (px)",
			"param_name" => "process_width",
			"description" => ""
		)
	),
	"js_view" => 'VcColumnView'
) );


/*** Circle ***/

class WPBakeryShortCode_No_Circle extends WPBakeryShortCode {}
vc_map( array(
	"name" => "Mikado Process", "burst",
	"base" => "no_circle",
	"content_element" => true,
	"icon" => "icon-wpb-circle extended-custom-icon",
	"as_child" => array('only' => 'no_circles'),
	"params" => array_merge(
		array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Icon in Process" => "icon_type",
					"Image" => "image_type",
					"Text in Process" => "text_type",
					"Image with Text" => "image_with_text_type"
				),
                "save_always" => true
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Process Background Image",
				"param_name" => "background_image",
				"dependency" => array('element' => "type", 'value' => array("icon_type")),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Process Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Process Transparency",
				"param_name" => "background_transparency",
				"description" => "Insert value between 0 and 1"
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "",
				"value" => array("Without outer border?" => "yes"),
				"param_name" => "without_double_border",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Gap Color",
				"param_name" => "gap_color",
				"description" => "Set the color between two borders. Note, this color will extend to the whole circle if the initial background color has not been set."
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Process Color",
				"param_name" => "border_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Process Width",
				"param_name" => "border_width",
				"description" => ""
			)
		),
		$mkd_burst_IconCollections->getVCParamsArray( array( 'element' => 'type', 'value' => array( 'icon_type' ) ) ),
		array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Size",
				"param_name" => "size",
				"description" => "Enter just number. Omit px",
				"dependency" => array('element' => "type", 'value' => array("icon_type"))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"dependency" => array('element' => "type", 'value' => array("icon_type"))
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Image",
				"param_name" => "image",
				"dependency" => array('element' => "type", 'value' => array("image_type", "image_with_text_type"))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text in Process",
				"param_name" => "text_in_circle",
				"dependency" => array('element' => "type", 'value' => array("text_type", "image_with_text_type"))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Text in Process Tag",
				"param_name" => "text_in_circle_tag",
				"value" => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => "",
				"dependency" => array('element' => "text_in_circle", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text in Process Size (px)",
				"param_name" => "font_size",
				"dependency" => array('element' => "text_in_circle", 'not_empty' => true)
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text in Process Color",
				"param_name" => "text_in_circle_color",
				"description" => "",
				"dependency" => array('element' => "text_in_circle", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link",
				"param_name" => "link",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "link_target",
				"value" => array(
					"" => "",
					"Self" => "_self",
					"Blank" => "_blank"
				),
				"description" => "",
				"dependency" => array('element' => "link", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => "",
				"dependency" => array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Font Size (px)",
				"param_name" => "title_font_size",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => "",
				"dependency" => array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Alignment",
				"param_name" => "title_alignment",
				"value" => array(
					""   => "",
					"Left" => "title_left",
					"Center" => "title_center",
					"Right" => "title_right"
				),
				"description" => "",
				"dependency" => array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => "",
				"dependency" => array('element' => "text", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Text Alignment",
				"param_name" => "text_alignment",
				"value" => array(
					""   => "",
					"Left" => "text_left",
					"Center" => "text_center",
					"Right" => "text_right"
				),
				"description" => "",
				"dependency" => array('element' => "text", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Space between circle and title",
				"param_name" => "title_margin_top",
				"description" => "Enter just number. Omit px (default value is 24)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Space between title and text",
				"param_name" => "text_margin_top",
				"description" => "Enter just number. Omit px (default value is 5)"
			)
		)
	)
) );


/*** Pricing Tables ***/

class WPBakeryShortCode_No_Pricing_Tables  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Mikado Pricing Tables", "burst",
	"base" => "no_pricing_tables",
	"as_parent" => array('only' => 'no_pricing_table'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-pricing-tables extended-custom-icon",
	"show_settings_on_create" => true,
	"params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Columns",
			"param_name" => "columns",
			"value" => array(
				"Two"       => "two_columns",
				"Three"     => "three_columns",
				"Four"      => "four_columns",
			),
            "save_always" => true,
			"description" => ""
		)
	),
	"js_view" => 'VcColumnView'
) );


/*** Pricing Table ***/

class WPBakeryShortCode_No_Pricing_Table  extends WPBakeryShortCode {}
vc_map( array(
	"name" => "Pricing Table",
	"base" => "no_pricing_table",
	"icon" => "icon-wpb-pricing-table extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"as_child" => array('only' => 'no_pricing_tables'),
	"params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Type", 'burst'),
			"param_name" => "type",
			"value" => array(
				"Price on top" => "price_on_top",
				"Title on top" => "title_on_top"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Title",
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Background Color",
			"param_name" => "title_background_color",
			"description" => ""
		),
		array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => "Title Background Image",
            "param_name" => "title_background_image",
            "description" => ""
        ),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Font Family",
			"param_name" => "title_font_family",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Small Separator",
			"param_name" => "title_separator",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => "",
			"dependency" => array('element' => 'type', 'value' => 'price_on_top')
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Separator Color",
			"param_name" => "title_separator_color",
			"description" => "",
			"dependency" => array('element' => 'title_separator', 'value' => 'yes')
		),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => "Border Top",
            "param_name" => "table_border_top",
            "value" => array(
                "Yes" => "yes",
                "No" => "no"
            ),
            "save_always" => true,
            "description" => ""
        ),

        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => "Border Top Color",
            "param_name" => "pricing_table_border_top_color",
            "description" => "",
            "dependency" => array('element' => "table_border_top", 'value' => "yes")
        ),

		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Border Around",
			"param_name" => "border_arround",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => "Display border around table except the fileds with background image"
		),

		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Border Around Color",
			"param_name" => "border_arround_color",
			"description" => "",
			"dependency" => array('element' => 'border_arround', 'value' => 'yes')
		),

		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Price",
			"param_name" => "price",
			"description" => "Default value is 100"
		),
		array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => "Price Color",
            "param_name" => "price_color",
            "description" => ""
        ),
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Background Image",
			"param_name" => "price_bckg_image",
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Background Color",
			"param_name" => "price_background",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Font Weight",
			"param_name" => "price_font_weight",
			"value" => $font_weight_array,
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Currency",
			"param_name" => "currency",
			"description" => "Default mark is $"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Period",
			"param_name" => "price_period",
			"description" => "Default label is monthly"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Period Position",
			"param_name" => "price_period_position",
			"value" => array(
				"Default" => "",
				"Next to Title" => "next_to_title",
				"Bellow Title" => "bellow_title"
			),
			"description" => "",
			"dependency" => array('element' => 'type', 'value' => 'price_on_top')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Button",
			"param_name" => "show_button",
			"value" => array(
				"Default" => "",
				"Yes" => "yes",
				"No" => "no"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Type",
			"param_name" => "pricing_button_type",
			"value" => array(
				"Standard Button" => "standard_button",
				"Button on Bottom" => "button_on_bottom"
			),
            "save_always" => true,
			"description" => "",
			"dependency" => array('element' => 'show_button',  'value' => 'yes')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Text",
			"param_name" => "button_text",
			"description" => "Default text is 'button'",
			"dependency" => array('element' => 'pricing_button_type',  'value' => 'standard_button')
		),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => "Button Font Size (px)",
            "param_name" => "button_font_size",
            "dependency" => array('element' => 'show_button',  'value' => 'yes')
        ),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Size",
			"value" => array(
				"Full Width" => "full_width",
				"Normal" => "normal"
			),
            "save_always" => true,
			"param_name" => "button_size",
			"description" => "This options is only used for type Title on Top",
			"dependency" => array('element' => 'pricing_button_type',  'value' => 'standard_button')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Link",
			"param_name" => "link",
			"dependency" => array('element' => 'show_button',  'value' => 'yes')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Target",
			"param_name" => "target",
			"value" => array(
				"" => "",
				"Self" => "_self",
				"Blank" => "_blank"
			),
			"dependency" => array('element' => 'link', 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Font Family",
			"param_name" => "button_font_family",
			"dependency" => array('element' => 'show_button', 'value' => 'yes')
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Color",
			"param_name" => "button_color",
			"dependency" => array('element' => 'show_button', 'value' => 'yes')
		),
		array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => "Button Hover Color",
            "param_name" => "button_hover_color",
            "dependency" => array('element' => 'show_button', 'value' => 'yes')
        ),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Background Color",
			"param_name" => "button_background_color",
			"dependency" => array('element' => 'show_button', 'value' => 'yes')
		),
		array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => "Button Background Image",
            "param_name" => "button_background_image",
            "description" => "",
            "dependency" => array('element' => 'pricing_button_type',  'value' => 'standard_button')
        ),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Button Icon Size(px)",
			"param_name" => "button_icon_size",
			"dependency" => array('element' => 'pricing_button_type',  'value' => 'button_on_bottom')
		),

		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Button arrow",
			"param_name" => "button_arrow",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => "",
			"dependency" => array('element' => 'button_text', 'not_empty' => true)
		),

		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Disable Button Top Border",
			"param_name" => "disable_button_border_top",
			"value" => array(
				"Default" => "",
				"No" => "no",
				"Yes" => "yes"
			),
			"description" => "This options is only used for type Title on Top",
			"dependency" => array('element' => 'button_text', 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Active",
			"param_name" => "active",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Active Style",
			"param_name" => "active_style",
			"value" => array(
				"Default" => "",
				"Circle" => "circle",
				"Rectangle" => "rectangle",
			),
			"dependency" => array('element' => 'active', 'value' => 'yes')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Active text",
			"param_name" => "active_text",
			"description" => "Best choice",
			"dependency" => array('element' => 'active', 'value' => 'yes')
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Active Text Color",
			"param_name" => "active_text_color",
			"dependency" => array('element' => 'active', 'value' => 'yes')
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Active Text Background Color",
			"param_name" => "active_text_background_color",
			"dependency" => array('element' => 'active', 'value' => 'yes')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Content Style",
			"param_name" => "content_style",
			"value" => array(
				"In Grid" => "pricing_content_grid",
				"Full Width " => "pricing_content_full_width",
			),
            "save_always" => true
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Content Text Color",
			"param_name" => "content_text_color"
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Content Background Color",
			"param_name" => "content_background_color",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Set Different Background Color for Odd and Even Content Sections?",
			"param_name" => "different_odd_even_sections",
			"value" => array(
				"No" => "no",
				"Yes" => "yes",
			),
            "save_always" => true
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Even Sections Background Color",
			"param_name" => "even_back_color",
			"dependency" => array('element' => 'different_odd_even_sections', 'value' => 'yes')
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Odd Sections Background Color",
			"param_name" => "odd_back_color",
			"dependency" => array('element' => 'different_odd_even_sections', 'value' => 'yes')
		),
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Pricing Table Background Image",
			"param_name" => "content_background_image",
			"description" => ""
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => "Content",
			"param_name" => "content",
			"value" => "<li>content content content</li><li>content content content</li><li>content content content</li>",
			"description" => ""
		)
	)
) );


/*** Pricing List ***/

class WPBakeryShortCode_No_Pricing_List  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Mikado Pricing List", "burst",
	"base" => "no_pricing_list",
	"as_parent" => array('only' => 'no_pricing_list_item'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-pricing-list extended-custom-icon",
	"show_settings_on_create" => false,
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Type",
			"param_name" => "type",
			"value" => array(
				"Leaders"  			=> "with_leaders",
				"Background" 	=> "with_background_image"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Title",
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Background image",
			"param_name" => "background_image",
			"dependency" => array('element' => "type", 'value' => array("with_background_image"))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "backgroundcolor"
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Leaders Type",
			"param_name" => "leaders_type",
			"value" => array(
				"Dotted"  => "dotted",
				"Solid"   => "solid",
				"Dashed"   => "dashed"
			),
            "save_always" => true,
			"description" => "",
			"dependency" => array('element' => "type", 'value' => array("with_leaders"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Padding",
			"param_name" => "item_padding",
			"value" => "",
			"description" =>  esc_html__("Please insert padding in format 0px 10px 0px 10px, default value is 0 0 0 0", 'burst')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Border",
			"param_name" => "border",
			"value" => array(
				"No"  => "no",
				"Yes"   => "yes",
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Border Color",
			"param_name" => "border_color",
			"description" => "",
			"dependency" => array('element' => "border", 'value' => array("yes"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Border Width (px)",
			"param_name" => "border_width",
			"description" => "",
			"dependency" => array('element' => "border", 'value' => array("yes"))
		)
	)
) );


/*** Pricing List Item ***/

class WPBakeryShortCode_No_Pricing_List_Item extends WPBakeryShortCode {}
vc_map( array(
	"name" => "Mikado Pricing List Item", "burst",
	"base" => "no_pricing_list_item",
	"content_element" => true,
	"icon" => "icon-wpb-pricing-list-item extended-custom-icon",
	"as_child" => array('only' => 'no_pricing_list'),
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Background color",
			"param_name" => "backgroundcolor",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Title",
			"param_name" => "title",
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"dependency" => array('element' => "title", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Font Size (px)",
			"param_name" => "title_font_size",
			"description" => "Enter just number. Omit unit, it is added automatically",
			"dependency" => array('element' => "title", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Title Tag",
			"param_name" => "title_tag",
			"value" => array(
				""   => "",
				"h2" => "h2",
				"h3" => "h3",
				"h4" => "h4",
				"h5" => "h5",
				"h6" => "h6",
			),
			"description" => "",
			"dependency" => array('element' => "title", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Font Family",
			"param_name" => "title_font_family",
			"value" => "",
			"description" => "",
			"dependency" => array('element' => "title", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Font Weight",
			"param_name" => "title_font_weight",
			"value" => array(
				"Default" => "",
				"Thin 100" => "100",
				"Extra-Light 200" => "200",
				"Light 300" => "300",
				"Regular 400" => "400",
				"Medium 500" => "500",
				"Semi-Bold 600" => "600",
				"Bold 700" => "700",
				"Extra-Bold 800" => "800",
				"Ultra-Bold 900" => "900"
			),
			"description" => "",
			"dependency" => array('element' => "title", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Text",
			"param_name" => "text",
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Text Color",
			"param_name" => "text_color",
			"dependency" => array('element' => "text", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Text Font Size (px)",
			"param_name" => "text_font_size",
			"description" => "Enter just number. Omit unit, it is added automatically",
			"dependency" => array('element' => "text", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Price",
			"param_name" => "price",
			"description" => "You can append any unit that you want"
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Color",
			"param_name" => "price_color",
			"dependency" => array('element' => "price", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Font Family",
			"param_name" => "price_font_family",
			"value" => "",
			"description" => "",
			"dependency" => array('element' => "price", 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Font Size (px)",
			"param_name" => "price_font_size",
			"description" => "Enter just number. Omit unit, it is added automatically",
			"dependency" => array('element' => "price", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Font Weight",
			"param_name" => "price_font_weight",
			"value" => array(
				"Default" => "",
				"Thin 100" => "100",
				"Extra-Light 200" => "200",
				"Light 300" => "300",
				"Regular 400" => "400",
				"Medium 500" => "500",
				"Semi-Bold 600" => "600",
				"Bold 700" => "700",
				"Extra-Bold 800" => "800",
				"Ultra-Bold 900" => "900"
			),
			"description" => "",
			"dependency" => array('element' => "price", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Price Font Style",
			"param_name" => "price_font_style",
			"value" => array(
				"" => "",
				"Normal" => "normal",
				"Italic" => "italic"
			),
			"description" => "",
			"dependency" => array('element' => "price", 'not_empty' => true)
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator",
			"param_name" => "separator",
			"value" => array(
				"No"  => "no",
				"Yes"   => "yes",
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Type",
			"param_name" => "separator_type",
			"value" => array(
				"Solid"   => "solid",
				"Dotted"  => "dotted",
				"Dashed"   => "dashed"
			),
            "save_always" => true,
			"description" => "",
			"dependency" => array('element' => "separator", 'value' => array("yes"))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Color",
			"param_name" => "separator_color",
			"description" => "",
			"dependency" => array('element' => "separator", 'value' => array("yes"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Thickness (px)",
			"param_name" => "separator_width",
			"description" => "",
			"dependency" => array('element' => "separator", 'value' => array("yes"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Position Top (px)",
			"param_name" => "separator_position_top",
			"description" => "",
			"dependency" => array('element' => "separator", 'value' => array("yes"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Position Bottom (px)",
			"param_name" => "separator_position_bottom",
			"description" => "",
			"dependency" => array('element' => "separator", 'value' => array("yes"))
		),
		array(
			"type" => "checkbox",
			"holder" => "div",
			"class" => "",
			"heading" => "New Item",
			"param_name" => "enable_new_item",
			"value" => array("Set as new item?" => "enable_new_item"),
			"description" => "Only when pricing list is set to type Leaders"
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "New Item Text Color",
			"param_name" => "new_item_text_color",
			"description" => "",
			"dependency" => array('element' => "enable_new_item", 'value' => array("enable_new_item"))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "New Item Icon Color",
			"param_name" => "new_item_icon_color",
			"description" => "",
			"dependency" => array('element' => "enable_new_item", 'value' => array("enable_new_item"))
		),
		array(
			"type" => "checkbox",
			"holder" => "div",
			"class" => "",
			"heading" => "Highlighted Item",
			"param_name" => "enable_highlighted_item",
			"value" => array("Set as highlighted item?" => "enable_highlighted_item"),
			"description" => "Only when pricing list is set to type Leaders"
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Highlighted Text",
			"param_name" => "highlighted_text",
			"description" => "",
			"dependency" => array('element' => "enable_highlighted_item", 'value' => array("enable_highlighted_item"))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Highlighted Text Color",
			"param_name" => "highlighted_text_color",
			"description" => "",
			"dependency" => array('element' => "enable_highlighted_item", 'value' => array("enable_highlighted_item"))
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Highlighted Text Background Color",
			"param_name" => "highlighted_text_background_color",
			"description" => "",
			"dependency" => array('element' => "enable_highlighted_item", 'value' => array("enable_highlighted_item"))
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Item Margin Bottom (px)",
			"param_name" => "margin_bottom_item",
			"description" => ""
		),
	)
) );


/*** Service table ***/

vc_map( array(
		"name" => "Service Table",
		"base" => "no_service_table",
		"icon" => "icon-wpb-service-table extended-custom-icon",
		"category" => 'by MIKADO',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Type",
					"param_name" => "type",
					"value" => array(
						"Icon/Image on Top" 	=> "icon_image_on_top",
						"Title on Top"  		=> "title_on_top",
					),
                    "save_always" => true,
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Title",
					"param_name" => "title",
					"value" => ""
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					),
					"description" => ""
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Title Color",
					"param_name" => "title_color",
					"description" => ""
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Title Background Color",
					"param_name" => "title_background_color",
					"description" => ""
				),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => "Top Background Image",
					"param_name" => "top_background_image",
					"description" => "",
					"dependency" => array("element" => "type", "value" => array("icon_image_on_top"))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Title Small Separator",
					"param_name" => "title_separator",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
                    "save_always" => true,
					"description" => "",
					"dependency" => array("element" => "type", "value" => array("icon_image_on_top"))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Subtitle",
					"param_name" => "subtitle",
					"value" => ""
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Separator Color",
					"param_name" => "title_separator_color",
					"description" => "",
					"dependency" => array("element" => "title_separator", "value" => array("yes"))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Title Border Bottom",
					"param_name" => "title_border_bottom",
					"value" => array(
						"Yes" => "yes",
						"No" => "no"
					),
                    "save_always" => true,
					"description" => ""
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Title Border Bottom color",
					"param_name" => "title_border_bottom_color",
					"description" => "",
					"dependency" => array("element" => "title_border_bottom", "value" => array("yes"))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Wide Border Top",
					"param_name" => "border_top",
					"value" => array(
						"Yes" => "yes",
						"No" => "no"
					),
                    "save_always" => true,
					"description" => "",
					"dependency" => array("element" => "type", "value" => array("title_on_top"))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Wide Border Top Color",
					"param_name" => "border_top_color",
					"description" => "",
					"dependency" => array("element" => "border_top", "value" => array("yes"))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Show Icon/Image",
					"param_name" => "show_icon_image",
					"value" => array(
						"Yes" => "yes",
						"No" => "no"
					),
                    "save_always" => true,
					"description" => ""
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Header type",
					"param_name" => "header_type",
					"value" => array(
						"With Icon" => "with_icon",
						"With Image" => "with_image"
					),
                    "save_always" => true,
					"description" => "",
					"dependency" => array("element" => "show_icon_image", "value" => array("yes"))
				)
			),
			$mkd_burst_IconCollections->getVCParamsArray(array("element" => "header_type", "value" => array("with_icon"))),
			array(
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Icon Color",
					"param_name" => "icon_color",
					"description" => "",
					"dependency" => array("element" => "header_type", "value" => array("with_icon"))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Icon Holder Background Color",
					"param_name" => "icon_background_color",
					"description" => "",
					"dependency" => array("element" => "header_type", "value" => array("with_icon"))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Icon/Image Holder Padding Top (px)",
					"param_name" => "icon_padding_top",
					"value" => "",
					"dependency" => array("element" => "show_icon_image", "value" => array("yes"))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Icon/Image Holder Padding Bottom (px)",
					"param_name" => "icon_padding_bottom",
					"value" => "",
					"dependency" => array("element" => "show_icon_image", "value" => array("yes"))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Custom Size (px)",
					"param_name" => "custom_size",
					"value" => "",
					"dependency" => array("element" => "header_type", "value" => array("with_icon"))
				),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => "Header Image",
					"param_name" => "header_image",
					"description" => "",
					"dependency" => array("element" => "header_type", "value" => array("with_image"))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Border Below Image/Icon",
					"param_name" => "border_below_image",
					"value" => array(
						"Default" => "",
						"No" => "no",
						"Yes" => "yes"
					),
					"description" => "",
					"dependency" => array("element" => "show_icon_image", "value" => array("yes"))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Border Below Image/Icon Color",
					"param_name" => "border_below_image_color",
					"description" => "",
					"dependency" => array("element" => "border_below_image", "value" => array("yes"))),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Border Below Image/Icon Width",
					"param_name" => "border_below_image_width",
					"description" => "",
					"dependency" => array("element" => "border_below_image",  "value" => array("yes"))),				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Content Background Color",
					"param_name" => "content_background_color",
					"description" => ""
				),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => "Content Background Image",
					"param_name" => "content_background_image",
					"description" => ""
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Border Around",
					"param_name" => "border",
					"value" => array(
						"Default" => "",
						"No" => "no",
						"Yes" => "yes"
					),
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Border width (px)",
					"param_name" => "border_width",
					"value" => "",
					"dependency" => array('element' => "border", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Border color",
					"param_name" => "border_color",
					"value" => "",
					"dependency" => array('element' => "border", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Active",
					"param_name" => "active",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
                    "save_always" => true,
					"description" => ""
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Active Style",
					"param_name" => "active_style",
					"value" => array(
						"Default" => "",
						"Circle" => "circle",
						"Rectangle" => "rectangle"
					),
					"description" => "",
					"dependency" => array('element' => "active", 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Active text",
					"param_name" => "active_text",
					"description" => "Best choice",
					"dependency" => array('element' => 'active', 'value' => 'yes')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Active Text Color",
					"param_name" => "active_text_color",
					"dependency" => array('element' => 'active', 'value' => 'yes')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Active Text Background Color",
					"param_name" => "active_text_background_color",
					"dependency" => array('element' => 'active', 'value' => 'yes')
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Content Text Color",
					"param_name" => "content_text_color"
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => "Content",
					"param_name" => "content",
					"value" => "<li>content content content</li><li>content content content</li><li>content content content</li>",
					"description" => ""
				)
			)
		)
	)
);


/*** Call to action ***/

$call_to_action_button_icons_array = array();
$call_to_action_button_IconCollections = $mkd_burst_IconCollections->iconCollections;
foreach($call_to_action_button_IconCollections as $collection_key => $collection) {

    $call_to_action_button_icons_array[] = array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Button Icon",
        "param_name" => "button_".$collection->param,
        "value" => $collection->getIconsArray(),
        "save_always" => true,
        "dependency" => Array('element' => "button_icon_pack", 'value' => array($collection_key))
    );

}


vc_map( array(
		"name" => "Call to Action",
		"base" => "no_call_to_action",
		"category" => 'by MIKADO',
		"icon" => "icon-wpb-call-to-action extended-custom-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type"          => "dropdown",
					"holder"        => "div",
					"class"         => "",
					"heading"       => "Full Width",
					"param_name"    => "full_width",
					"value"         => array(
						"Yes"       => "yes",
						"No"        => "no"
					),
					"description"   => ""
				),
				array(
					"type"          => "dropdown",
					"holder"        => "div",
					"class"         => "",
					"heading"       => "Content in grid",
					"param_name"    => "content_in_grid",
					"value"         => array(
						"Yes"       => "yes",
						"No"        => "no"
					),
					"description"   => "",
					"dependency"    => array("element" => "full_width", "value" => "yes")
				),
				array(
					"type"          => "dropdown",
					"holder"        => "div",
					"class"         => "",
					"heading"       => "Grid size",
					"param_name"    => "grid_size",
					"value"         => array(
						"75/25"     => "75",
						"50/50"     => "50",
						"66/33"     => "66"
					),
					"description"   => "",
					"dependency"    => array("element" => "content_in_grid", "value" => "yes")
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Type",
					"param_name" => "type",
					"value" => array(
						"Normal" => "normal",
						"With Icon" => "with_icon",
						"With Custom Icon" => "with_custom_icon"
					),
                    "save_always" => true,
					"description" => ""
				)
			),
			$mkd_burst_IconCollections->getVCParamsArray(array('element' => 'type', 'value' => array('with_icon'))),
			array(
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => "Custom Icon",
					"param_name" => "custom_icon",
					"dependency" => Array('element' => "type", 'value' => array('with_custom_icon'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Icon Size (px)",
					"param_name" => "icon_size",
					"description" => "",
					"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Icon Position",
					"param_name" => "icon_position",
					"value" => array(
						"Default/Top" => "top",
						"Middle" => "middle",
						"Bottom" => "bottom"
					),
                    "save_always" => true,
					"description" => "",
					"dependency" => array('element' => 'type', 'value' => array('with_icon','with_custom_icon'))
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => "Icon Color",
					"param_name" => "icon_color",
					"description" => "",
					"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Background Color",
					"param_name" => "background_color",
					"description" => ""
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Border Color",
					"param_name" => "border_color",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Box Padding (top right bottom left) px",
					"param_name" => "box_padding",
					"description" => "Default padding is 20px on all sides"
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Default Text Font Size (px)",
					"param_name" => "text_size",
					"description" => "Font size for p tag"
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Show Button",
					"param_name" => "show_button",
					"value" => array(
						"Yes" => "yes",
						"No" => "no"
					),
                    "save_always" => true,
					"description" => ""
				),
				array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Hover Animation",
                    "param_name" => "button_hover_animation",
                    "value" => array(
                        "Default" => "default",
						"Disable Animation" => "disable_animation",
                        "Fill From Top" => "fill_from_top",
						"Fill From Left" => "fill_from_left",
						"Fill From Bottom" => "fill_from_bottom"
                    ),
                    "save_always" => true,
                    "dependency" => array('element' => 'show_button', 'value' => 'yes')
                ),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Position",
					"param_name" => "button_position",
					"value" => array(
						"Default/right" => "",
						"Center" => "center",
						"Left" => "left"
					),
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Text",
					"param_name" => "button_text",
					"description" => "Default text is 'button'",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Link",
					"param_name" => "button_link",
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Target",
					"param_name" => "button_target",
					"value" => array(
						"" => "",
						"Self" => "_self",
						"Blank" => "_blank"
					),
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Left Padding (px)",
					"param_name" => "button_l_padding",
					"value" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Right Padding (px)",
					"param_name" => "button_r_padding",
					"value" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Text Size (px)",
					"param_name" => "button_text_size",
					"value" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Text Line Height (px)",
					"param_name" => "button_text_lineheight",
					"value" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Text Color",
					"param_name" => "button_text_color",
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Hover Text Color",
					"param_name" => "button_hover_text_color",
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Background Color",
					"param_name" => "button_background_color",
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				 array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Hover Background Color",
					"param_name" => "button_hover_background_color",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Border Color",
					"param_name" => "button_border_color",
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Hover Border Color",
					"param_name" => "button_hover_border_color",
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Border Width",
					"param_name" => "button_border_width",
					"description" => "",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Border Radius px",
					"param_name" => "border_radius",
					"description" => "Border radius for button",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Button Icon Pack",
                    "param_name" => "button_icon_pack",
                    "value" => array_merge(array("No Icon" => ""),$mkd_burst_IconCollections->getIconCollectionsVC()),
                    "save_always" => true
                )
            ),
            $call_to_action_button_icons_array,
            array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Icon Size",
                    "param_name" => "button_icon_size",
                    "description" => "",
                    "dependency" => Array('element' => "button_icon_pack", 'not_empty' => true)
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => "Icon Color",
                    "param_name" => "button_icon_color",
                    "description" => "",
                    "dependency" => Array('element' => "button_icon_pack", 'not_empty' => true)
                ),				
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => "Icon Hover Color",
					"param_name" => "button_icon_hover_color",
					"description" => "",
					"dependency" => Array('element' => "button_icon_pack", 'not_empty' => true)
				),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => "Icon Position",
                    "param_name" => "button_icon_position",
                    "description" => "",
                    "value" => array("Right" => "right","Left" => "left"),
                    "save_always" => true,
                    "dependency" => Array('element' => "button_icon_pack", 'not_empty' => true)
                ),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => "Content",
					"param_name" => "content",
					"value" => "<p>"."I am test text for Call to action."."</p>",
					"description" => ""
				)
			)
			)
    )
);


/*** Message shortcode ***/

vc_map( array(
	"name" => "Message",
	"base" => "no_message",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-message extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
		array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"With Icon" => "with_icon",
					"With Custom Icon" => "with_custom_icon"
				),
                "save_always" => true
			)
		),
		$mkd_burst_IconCollections->getVCParamsArray(array('element' => "type", 'value' => array('with_icon'))),
		array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Icon Position",
				"param_name" => "icon_position",
				"value" => array(
					"Right" => "right",
					"Left" => "left"
				),
                "save_always" => true,
				"dependency" => Array('element' => $mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Icon Position",
				"param_name" => "custom_icon_position",
				"value" => array(
					"Right" => "right",
					"Left" => "left"
				),
                "save_always" => true,
				"dependency" => Array('element' => 'type', 'value' => array('with_custom_icon'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Size",
				"param_name" => "icon_size",
				"value" => $mkd_burst_IconCollections->getIconSizesArray(),
                "save_always" => true,
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Size (px)",
				"param_name" => "icon_custom_size",
				"value" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Icon Background Color",
				"param_name" => "icon_background_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Icon",
				"param_name" => "custom_icon",
				"dependency" => Array('element' => "type", 'value' => array('with_custom_icon'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Width (px)",
				"param_name" => "border_width",
				"description" => "Default value is 1"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Close Button Color",
				"param_name" => "close_button_color",
				"description" => "Default color is #fff"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Close Button Hover Color",
				"param_name" => "close_button_hover_color",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<p>"."I am test text for Message shortcode."."</p>",
				"description" => ""
			)
		)
	)
) );


/*** Blockquote ***/

vc_map( array(
		"name" => "Blockquote",
		"base" => "no_blockquote",
		"category" => 'by MIKADO',
		"icon" => "icon-wpb-blockquote extended-custom-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"value" => "Blockquote text",
				"save_always" => true
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Title tag",
				"param_name" => "title_tag",
				"value" => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Width",
				"param_name" => "width",
				"description" => "Width (%)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Line Height",
				"param_name" => "line_height",
				"description" => "Line Height (px)"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Left Padding",
				"param_name" => "left_padding",
				"description" => "Left padding (px)"
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
             array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Show Border",
                "param_name" => "show_border",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "save_always" => true,
                "description" => ""
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"description" => "",
                "dependency" => array('element' => "show_border", 'value' => 'yes')
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Border width (px)",
                "param_name" => "border_width",
                "description" => "",
                "dependency" => array('element' => "show_border", 'value' => 'yes')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Border Right Margin (px)",
                "param_name" => "border_right_margin",
                "description" => "",
                "dependency" => array('element' => "show_border", 'value' => 'yes')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Show Quote Icon",
                "param_name" => "show_quote_icon",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Use Custom Icon or Font",
                "param_name" => "quote_icon_font",
                "value" => array(
                    "No" => "",
                    "Use Specific Font" => "font_family",
                    "Use Icon" => "with_icon"
                ),
                "description" => "",
                "dependency" => array('element' => "show_quote_icon", 'value' => 'yes')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Quote Icon Font",
                "param_name" => "quote_font_family",
                "dependency" => Array('element' => "quote_icon_font", 'value' => 'font_family')
            ),           
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Quote Icon Color",
                "param_name" => "quote_icon_color",
                "description" => "",
                "dependency" => array('element' => "show_quote_icon", 'value' => 'yes')
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quote Icon Size (px)",
				"param_name" => "quote_icon_size",
                "dependency" => array('element' => "show_quote_icon", 'value' => 'yes')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Quote Icon Left Padding (px)",
				"param_name" => "quote_icon_padding_left",
                "dependency" => array('element' => "show_quote_icon", 'value' => 'yes')
			)
		)
) );


/*** Custom Font ***/

vc_map( array(
	"name" => "Custom Font",
	"base" => "no_custom_font",
	"icon" => "icon-wpb-custom-font extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Font family",
			"param_name" => "font_family",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Font size",
			"param_name" => "font_size",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Line height",
			"param_name" => "line_height",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Font Style",
			"param_name" => "font_style",
			"value" => array(
				"Normal" => "normal",
				"Italic" => "italic"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Text Align",
			"param_name" => "text_align",
			"value" => array(
				"Left" => "left",
				"Center" => "center",
				"Right" => "right"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Font weight",
			"param_name" => "font_weight",
			"value" => "300",
			"save_always" => true
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Color",
			"param_name" => "color",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Text decoration",
			"param_name" => "text_decoration",
			"value" => array(
				"None" => "none",
				"Underline" => "underline",
				"Overline" => "overline",
				"Line Through" => "line-through"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Text transform",
			"param_name" => "text_transform",
			"value" => array(
				"None" => "none",
				"Uppercase" => "uppercase",
				"Lowercase" => "lowercase",
				"Capitalize" => "capitalize"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Text shadow",
			"param_name" => "text_shadow",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Letter Spacing (px)",
			"param_name" => "letter_spacing",
			"value" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Color",
			"param_name" => "background_color",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Padding",
			"param_name" => "padding",
			"value" => "0",
			"description" =>  esc_html__("Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", 'burst')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Margin",
			"param_name" => "margin",
			"value" => "0",
			"description" =>  esc_html__("Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px", 'burst')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show in border box",
			"param_name" => "show_in_border_box",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Border Color",
			"param_name" => "border_color",
			"description" => "",
			"dependency" => array('element' => 'show_in_border_box', 'value' => 'yes')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Border Thickness (px)",
			"param_name" => "border_width",
			"value" => "",
			"dependency" => array('element' => 'show_in_border_box', 'value' => 'yes')
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Text background Color",
			"param_name" => "text_background_color",
			"value" => "",
			"dependency" => array('element' => 'show_in_border_box', 'value' => 'yes')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Text padding (px)",
			"param_name" => "text_padding",
			"value" => "",
			"description" =>  esc_html__("Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", 'burst'),
			"dependency" => array('element' => 'show_in_border_box', 'value' => 'yes')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Type out strings?",
			"param_name" => "type_out_strings",
			"value" => array(
				"No" => "no",
				"Yes" => "yes"
			),
			"save_always" => true,
			"description" => "Choose whether to type out one string at a time or to display a non-animated custom font area."
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => "Content",
			"param_name" => "content",
			"value" => "<p>content content content</p>",
			"description" => "",
			"dependency" => array('element' => 'type_out_strings', 'value' => 'no')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "First string",
			"param_name" => "first_string",
			"value" => "",
			"description" => "Add the first string. You can type up to 3 strings.",
			"dependency" => array('element' => 'type_out_strings', 'value' => 'yes')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Second string",
			"param_name" => "second_string",
			"value" => "",
			"description" => "Add the second string",
			"dependency" => array('element' => 'first_string', 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Third string",
			"param_name" => "third_string",
			"value" => "",
			"description" => "Add the third string",
			"dependency" => array('element' => 'second_string', 'not_empty' => true)
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Type Speed (ms)",
			"param_name" => "type_speed",
			"value" => "",
			"description" => "Set the type speed in milliseconds. The default is 60.",
			"dependency" => array('element' => 'type_out_strings', 'value' => 'yes')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Back Delay (ms)",
			"param_name" => "back_delay",
			"value" => "",
			"description" => "Set the pause between typing out and erasing a string in milliseconds. The default value is 900.",
			"dependency" => array('element' => 'type_out_strings', 'value' => 'yes')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Loop?",
			"param_name" => "loop",
			"value" => array(
				"No" => "false",
				"Yes" => "true"
			),
			"description" => "Choose whether to loop the typing animation.",
			"dependency" => array('element' => 'type_out_strings', 'value' => 'yes')
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Animate when typed out",
			"param_name" => "final_animation",
			"value" => array(
				"None" => "none",
				"Scale" => "scale",
				"Blink" => "blink",
				"Sweep" => "sweep"
			),
			"description" => "",
			"dependency" => array('element' => 'loop', 'value' => 'false')
		),

	)
) );


/*** Button shortcode **/

vc_map( array(
		"name" => "Button",
		"base" => "no_button",
		"category" => 'by MIKADO',
		"icon" => "icon-wpb-button extended-custom-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
                    array(
                        array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Size",
                            "param_name" => "size",
                            "value" => array(
                                "Default" => "",
                                "Small" => "small",
                                "Medium" => "medium",	
                                "Large" => "large",
                                "Extra Large" => "big_large",
                                "Extra Large Full Width" => "big_large_full_width"
                            )
                        ),
                        array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Style",
                            "param_name" => "style",
                            "value" => array(
                                "Default" => "",
                                "White" => "white",
                                "Transparent" => "transparent"
                            )
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Text",
                            "param_name" => "text",
                            "description" => "Default text is 'button'"
                        ),
						 array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Hover Animation",
                            "param_name" => "button_hover_animation",
                            "value" => array(
                                "Default" => "default",
								"Disable Animation" => "disable_animation",
                                "Fill From Top" => "fill_from_top",
								"Fill From Left" => "fill_from_left",
								"Fill From Bottom" => "fill_from_bottom",
								"Rotate From Bottom" => "rotate_from_bottom"
                            ),
                            "save_always" => true,
                            "dependency" => array('element' => 'style', 'value' => array("","white"))
                        )
                    ),
                    $mkd_burst_IconCollections->getVCParamsArray(array('element' => 'button_hover_animation', 'value' => array("default","disable_animation","fill_from_top","fill_from_bottom","fill_from_left")), '', true),
                    array(
                        array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Hover Animation",
                            "param_name" => "hover_animation",
                            "value" => array(
                                "Default" => "",
                                "Move Icon" => "move_icon"
                            ),
                            "dependency" => Array('element' => $mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Button Width (px)",
                            "param_name" => "button_width",
                            "dependency" => array('element' => "hover_animation", 'value' => array('move_icon'))

                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Icon Position",
                            "param_name" => "icon_position",
                            "value" => array(
                                "Right" => "right",
                                "Left" => "left"
                            ),
                            "save_always" => true,
                            "dependency" => Array('element' => $mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)
                        ),
						array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Font Size (px)",
                            "param_name" => "icon_font_size",
                            "dependency" => array('element' => $mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)

                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Color",
                            "param_name" => "icon_color",
                            "dependency" => Array('element' =>$mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)
                        ),
						array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Hover Color",
                            "param_name" => "icon_hover_color",
                            "dependency" => Array('element' =>$mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true)
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Background Color",
                            "param_name" => "icon_background_color",
                            "dependency" => Array('element' =>$mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true),
                            "description" => "Will have no effect on button with transparent style"
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Background Hover Color",
                            "param_name" => "icon_background_hover_color",
                            "dependency" => Array('element' =>$mkd_burst_IconCollections->iconPackParamName, 'not_empty' => true),
                            "description" => "Will have no effect on button with transparent style"
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Link",
                            "param_name" => "link"
                        ),
                        array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Link Target",
                            "param_name" => "target",
                            "value" => array(
                                "Self" => "_self",
                                "Blank" => "_blank"
                            ),
                            "save_always" => true
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Color",
                            "param_name" => "color"
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Hover Color",
                            "param_name" => "hover_color",
                            "dependency" => array('element' => 'button_hover_animation', 'value' => array("default","disable_animation","fill_from_top","fill_from_bottom","fill_from_left"))
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Background Color",
                            "param_name" => "background_color",
                            "dependency" => array('element' => 'style', 'value' => array("","white"))
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Hover Background Color",
                            "param_name" => "hover_background_color",
                            "dependency" => array('element' => 'style', 'value' => array("","white"),'element' => 'button_hover_animation', 'value' => array("default","disable_animation","fill_from_top","fill_from_bottom","fill_from_left"))
                        ),
						array(
							"type" => "attach_image",
							"holder" => "div",
							"class" => "",
							"heading" => "Background Pattern",
							"param_name" => "background_pattern",
                            "dependency" => array('element' => 'style', 'value' => array("","white"))
						),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Border Color",
                            "param_name" => "border_color",
                            "dependency" => array('element' => 'style', 'value' => array("","white"))
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Hover Border Color",
                            "param_name" => "hover_border_color",
                            "dependency" => array('element' => 'style', 'value' => array("","white"), 'element' => 'button_hover_animation', 'value' => array("default","disable_animation","fill_from_top","fill_from_bottom","fill_from_left"))
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Border Width (px)",
                            "param_name" => "border_width",
                            "dependency" => array('element' => 'style', 'value' => array("","white"))
                        ),
						array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Font Size (px)",
                            "param_name" => "font_size"                            
                        ),
						array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Line Height (px)",
                            "param_name" => "line_height"
                        ),
                        array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Font Style",
                            "param_name" => "font_style",
                            "value" => array(
                                "" => "",
                                "Normal" => "normal",	
                                "Italic" => "italic"
                            )
                        ),
                        array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Font Weight",
                            "param_name" => "font_weight",
                            "value" => $font_weight_array,
                            "save_always" => true
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Margin",
                            "param_name" => "margin",
                            "description" => esc_html__("Please insert margin in format: 0px 0px 1px 0px", 'burst')
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Left Padding (px)",
                            "param_name" => "padding",
                            "description" => "",
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Right Padding (px)",
                            "param_name" => "padding_right",
                            "description" => "",
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Border radius",
                            "param_name" => "border_radius",
                            "description" => esc_html__("Please insert border radius(Rounded corners) in px. For example: 4 ", 'burst'),
                            "dependency" => array('element' => 'style', 'value' => array("","white"))
                        )
                    )
                )
    )
);


/*** Counter ***/

vc_map( array(
	"name" => "Counter",
	"base" => "no_counter",
	"category" => 'by MIKADO',
	'admin_enqueue_css' => array(mkd_burst_get_skin_uri().'/assets/css/mkdf-vc-extend.css'),
	"icon" => "icon-wpb-counter extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
		array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Zero Counter" => "zero",
					"Random Counter" => "random"
				),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Box",
				"param_name" => "box",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Box Border Color",
				"param_name" => "box_border_color",
				"description" => "",
				"dependency" => array('element' => "box", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Position",
				"param_name" => "position",
				"value" => array(
					"Left" => "left",
					"Right" => "right",
					"Center" => "center"
				),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Digit",
				"param_name" => "digit",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Underline Digit",
				"param_name" => "underline_digit",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Digit Font Size (px)",
				"param_name" => "font_size",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Digit Font Weight",
				"param_name" => "font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Digit Letter Spacing (px)",
				"param_name" => "digit_letter_spacing",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Digit Font Color",
				"param_name" => "font_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show icon next to digit",
				"param_name" => "counter_icon",
				"value" => array(
					"No"	=> "no",
					"Yes" 	=> "yes",
				),
                "save_always" => true,
				"description" => ""
			)
		),
		$mkd_burst_IconCollections->getVCParamsArray(array("element" => "counter_icon", "value" => array("yes"))),
		array(
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Icon Size (px)",
				"param_name" => "icon_custom_size",
				"dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Size (px)",
				"param_name" => "title_size",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Size (px)",
				"param_name" => "text_size",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Font Weight",
				"param_name" => "text_font_weight",
				"value" => array(
					"Default" => "",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900"
				)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Transform",
				"param_name" => "text_transform",
				"value" => array(
					"Default" 			=> "",
					"None"				=> "none",
					"Capitalize" 		=> "capitalize",
					"Uppercase"			=> "uppercase",
					"Lowercase"			=> "lowercase"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator",
				"param_name" => "separator",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"
				),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Position",
				"param_name" => "separator_position",
				"value" => array(
					"Default" 			=> "",
					"Above Title"		=> "above_title",
					"Under Title"		=> "under_title",
				),
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Width (px)",
				"param_name" => "separator_width",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Color",
				"param_name" => "separator_color",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Thickness (px)",
				"param_name" => "separator_thickness",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Margin Top (px)",
				"param_name" => "separator_margin_top",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Margin Bottom (px)",
				"param_name" => "separator_margin_bottom",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Border Style",
				"param_name" => "separator_border_style",
				"value" => array(
					"" => "",
					"Dashed" => "dashed",
					"Solid" => "solid"
				),
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding Bottom(px)",
				"param_name" => "padding_bottom",
				"description" => ""
			),
		)
	)
) );


/*** Countdown ***/

vc_map( array(
	"name" => "Countdown",
	"base" => "no_countdown",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-countdown extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Year",
			"param_name" => "year",
			"value" => array(
				"" => "",
				"2014" => "2014",
				"2015" => "2015",
				"2016" => "2016",
				"2017" => "2017",
				"2018" => "2018",
				"2019" => "2019",
				"2020" => "2020"
			),
            "save_always" => true
		),

		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Month",
			"param_name" => "month",
			"value" => array(
				"" => "",
				"January" => "1",
				"February" => "2",
				"March" => "3",
				"April" => "4",
				"May" => "5",
				"June" => "6",
				"July" => "7",
				"August" => "8",
				"September" => "9",
				"October" => "10",
				"November" => "11",
				"December" => "12"
			),
            "save_always" => true
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Day",
			"param_name" => "day",
			"value" => array(
				"" => "",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
				"7" => "7",
				"8" => "8",
				"9" => "9",
				"10" => "10",
				"11" => "11",
				"12" => "12",
				"13" => "13",
				"14" => "14",
				"15" => "15",
				"16" => "16",
				"17" => "17",
				"18" => "18",
				"19" => "19",
				"20" => "20",
				"21" => "21",
				"22" => "22",
				"23" => "23",
				"24" => "24",
				"25" => "25",
				"26" => "26",
				"27" => "27",
				"28" => "28",
				"29" => "29",
				"30" => "30",
				"31" => "31",
			),
            "save_always" => true
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Hour",
			"param_name" => "hour",
			"value" => array(
				"" => "",
				"0" => "0",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
				"7" => "7",
				"8" => "8",
				"9" => "9",
				"10" => "10",
				"11" => "11",
				"12" => "12",
				"13" => "13",
				"14" => "14",
				"15" => "15",
				"16" => "16",
				"17" => "17",
				"18" => "18",
				"19" => "19",
				"20" => "20",
				"21" => "21",
				"22" => "22",
				"23" => "23",
				"24" => "24"
			),
            "save_always" => true
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Minute",
			"param_name" => "minute",
			"value" => array(
				"" => "",
				"0" => "0",
				"1" => "1",
				"2" => "2",
				"3" => "3",
				"4" => "4",
				"5" => "5",
				"6" => "6",
				"7" => "7",
				"8" => "8",
				"9" => "9",
				"10" => "10",
				"11" => "11",
				"12" => "12",
				"13" => "13",
				"14" => "14",
				"15" => "15",
				"16" => "16",
				"17" => "17",
				"18" => "18",
				"19" => "19",
				"20" => "20",
				"21" => "21",
				"22" => "22",
				"23" => "23",
				"24" => "24",
				"25" => "25",
				"26" => "26",
				"27" => "27",
				"28" => "28",
				"29" => "29",
				"30" => "30",
				"31" => "31",
				"32" => "32",
				"33" => "33",
				"34" => "34",
				"35" => "35",
				"36" => "36",
				"37" => "37",
				"38" => "38",
				"39" => "39",
				"40" => "40",
				"41" => "41",
				"42" => "42",
				"43" => "43",
				"44" => "44",
				"45" => "45",
				"46" => "46",
				"47" => "47",
				"48" => "48",
				"49" => "49",
				"50" => "50",
				"51" => "51",
				"52" => "52",
				"53" => "53",
				"54" => "54",
				"55" => "55",
				"56" => "56",
				"57" => "57",
				"58" => "58",
				"59" => "59",
				"60" => "60",
			),
            "save_always" => true
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Month Label",
			"param_name" => "month_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Day Label",
			"param_name" => "day_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Hour Label",
			"param_name" => "hour_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Minute Label",
			"param_name" => "minute_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Second Label",
			"param_name" => "second_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Month Singular Label",
			"param_name" => "month_singular_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Day Singular Label",
			"param_name" => "day_singular_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Hour Singular Label",
			"param_name" => "hour_singular_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Minute Singular Label",
			"param_name" => "minute_singular_label",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Second Singular Label",
			"param_name" => "second_singular_label",
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Color",
			"param_name" => "color",
			"description" => "For digits, labels and separators",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Digit Font Size (px)",
			"param_name" => "digit_font_size",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Label Font Size (px)",
			"param_name" => "label_font_size",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Font Weight",
			"param_name" => "font_weight",
			"description" => "For both digits and labels",
			"value" => array(
				"Default" => "",
				"Thin 100" => "100",
				"Extra-Light 200" => "200",
				"Light 300" => "300",
				"Regular 400" => "400",
				"Medium 500" => "500",
				"Semi-Bold 600" => "600",
				"Bold 700" => "700",
				"Extra-Bold 800" => "800",
				"Ultra-Bold 900" => "900"
			)
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show separator",
			"param_name" => "show_separator",
			"value" => array(
				"No" => "hide_separator",
				"Yes" => "show_separator"
			),
            "save_always" => true
		),
	)
) );


/*** Pie Chart ***/

vc_map( array(
		"name" => "Pie Chart",
		"base" => "no_pie_chart",
		"icon" => "icon-wpb-pie-chart extended-custom-icon",
		"category" => 'by MIKADO',
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Size(px)",
                "param_name" => "size",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Type of Central text",
                "param_name" => "type_of_central_text",
                "value" => array(
                    "Title" => "title",
                    "Percent"  => "percent"
                ),
                "save_always" => true
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage",
				"param_name" => "percent",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Show Percentage Mark",
				"param_name" => "show_percent_mark",
				"value" => array(
					"Yes" => "with_mark",
					"No"  => "without_mark"	
				),
                "save_always" => true,
				"dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage Color",
				"param_name" => "percentage_color",
				"dependency" => Array('element' => "percent", 'not_empty' => true)
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Percentage Font",
                "param_name" => "percent_font_family",
                "dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage Font Size",
				"param_name" => "percent_font_size",
				"dependency" => Array('element' => "percent", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage Font weight",
				"param_name" => "percent_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"dependency" => Array('element' => "percent", 'not_empty' => true)
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Bar Active Color",
				"param_name" => "active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Bar Inactive Color",
				"param_name" => "noactive_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Pie Chart Line Width (px)",
				"param_name" => "line_width",
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Chart Alignment",
                "param_name" => "chart_alignment",
                "value" => array(
                    "Center"   => "",
                    "Left" => "left",
                    "Right" => "right"
                ),
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Margin below chart (px)",
                "param_name" => "margin_below_chart",
                "description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator",
                "param_name" => "separator",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Color",
                "param_name" => "separator_color",
                "description" => "",
                "dependency" => array('element' => "separator", 'value' => array('yes'))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Border Style",
                "param_name" => "separator_border_style",
                "value" => array(
                    "" => "",
                    "Dashed" => "dashed",
                    "Solid" => "solid"
                ),
                "description" => "",
                "dependency" => array('element' => "separator", 'value' => array('yes'))
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Width (px)",
				"param_name" => "separator_width",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Thickness (px)",
				"param_name" => "separator_thickness",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Margin Top (px)",
				"param_name" => "separator_margin_top",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Margin Bottom (px)",
				"param_name" => "separator_margin_bottom",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Outer Border",
				"param_name" => "outer_border",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
                "save_always" => true,
				"description" => ""
			)
		)
) );


/*** Pie Chart 2 (Pie) ***/

vc_map( array(
		"name" => "Pie Chart 2 (Pie)",
		"base" => "no_pie_chart2",
		"icon" => "icon-wpb-pie-chart2 extended-custom-icon",
		"category" => 'by MIKADO',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Width",
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Height",
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Legend Text Color",
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "15,#b9f1e6,Legend One; 35,#5dddc4,Legend Two; 50,#18cfab,Legend Three",
				"description" => ""
			)

		)
) );


/*** Pie Chart 3 (Doughnut) ***/

vc_map( array(
		"name" => "Pie Chart 3 (Doughnut)",
		"base" => "no_pie_chart3",
		"category" => 'by MIKADO',
		"icon" => "icon-wpb-pie-chart3 extended-custom-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Width",
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Height",
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Legend Text Color",
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "15,#b9f1e6,Legend One; 35,#5dddc4,Legend Two; 50,#18cfab,Legend Three",
				"description" => ""
			)

		)
) );


/*** Pie Chart With Icon ***/

vc_map( array(
	"name" => "Pie Chart With Icon",
	"base" => "no_pie_chart_with_icon",
	"icon" => "icon-wpb-pie-chart-with-icon extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
		array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Size(px)",
				"param_name" => "size",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage",
				"param_name" => "percent",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Bar Active Color",
				"param_name" => "active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Bar Inactive Color",
				"param_name" => "noactive_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Pie Chart Line Width (px)",
				"param_name" => "line_width",
				"description" => ""
			),
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Margin below chart (px)",
                "param_name" => "margin_below_chart",
                "description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"dependency" => array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				),
				"dependency" => array('element' => "title", 'not_empty' => true)
			),
		),
		$mkd_burst_IconCollections->getVCParamsArray(),
		array(
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Icon Size (px)",
				"param_name" => "icon_custom_size",
				"dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Size",
				"param_name" => "icon_size",
				"value" => $mkd_burst_IconCollections->getIconSizesArray(),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"dependency" => array('element' => "text", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator",
				"param_name" => "separator",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"
				),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Color",
				"param_name" => "separator_color",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Border Style",
				"param_name" => "separator_border_style",
				"value" => array(
					"" => "",
					"Dashed" => "dashed",
					"Solid" => "solid"
				),
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Width (px)",
				"param_name" => "separator_width",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Thickness (px)",
				"param_name" => "separator_thickness",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Margin Top (px)",
				"param_name" => "separator_margin_top",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Margin Bottom (px)",
				"param_name" => "separator_margin_bottom",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Outer Border",
				"param_name" => "outer_border",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
                "save_always" => true,
				"description" => ""
			)
		)
	)

) );


/** Horizontal progress bar shortcode ***/

vc_map( array(
		"name" => "Progress Bar - Horizontal",
		"base" => "no_progress_bar",
		"icon" => "icon-wpb-progress-bar extended-custom-icon",
		"category" => 'by MIKADO',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Custom Size (px)",
				"param_name" => "title_custom_size",
				"description" => ""
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Padding Bottom(px)",
                "param_name" => "title_padding_bottom",
                "description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage",
				"param_name" => "percent",
				"description" => ""
			),			
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Show Percentage Number",
                "param_name" => "show_percent_number",
                "value" => array(
                    "Yes" => "yes",
                    "No"  => "no"
                ),
                "save_always" => true,
                "dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Show Percentage Mark",
				"param_name" => "show_percent_mark",
				"value" => array(
					"Yes" => "with_mark",
					"No"  => "without_mark"	
				),
                "save_always" => true,
				"dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Percentage Type",
                "param_name" => "percentage_type",
                "value" => array(
                    "Floating"  => "floating",
                    "Static" => "static"
                ),
                "save_always" => true,
                "dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => "Percentage Bar Margin Bottom (px)",
				"param_name" => "percentage_bar_margin_bottom",
				"dependency" => array('element' => "percent", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => "Percentage Bar Height (px)",
				"param_name" => "percentage_bar_height",
				"dependency" => array('element' => "percentage_type", 'value' => array('floating'))
			),			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Floating Type",
				"param_name" => "floating_type",
				"value" => array(
					"Outside Floating"  => "floating_outside",
					"Inside Floating" => "floating_inside"
				),
                "save_always" => true,
				"dependency" => array('element' => "percentage_type", 'value' => array('floating'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage Color",
				"param_name" => "percent_color",
				"dependency" => Array('element' => "percent", 'not_empty' => true)
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Percentage Background Color",
                "param_name" => "percent_background_color",
                "dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Percentage Border Radius (px)",
                "param_name" => "percent_border_radius",
                "dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage Font Size",
				"param_name" => "percent_font_size",
				"dependency" => Array('element' => "percent", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage Font weight",
				"param_name" => "percent_font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"dependency" => Array('element' => "percent", 'not_empty' => true)
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Active Background Color",
				"param_name" => "active_background_color",
				"description" => ""
			),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Active Background Second Color",
                "param_name" => "active_background_second_color",
                "description" => "If this color is set, progress bar background will be in gradient. Note: IE9 and earlier versions do not support gradients",
                "dependency" => Array('element' => "active_background_color", 'not_empty' => true)
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Active Border Color",
				"param_name" => "active_border_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Inactive Background Color",
				"param_name" => "noactive_background_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Progress Bar Height (px)",
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Progress Bar Border Radius)",
				"param_name" => "border_radius",
				"description" => ""
			)
		)
) );


/*** Vertical progress bar shortcode ***/

vc_map( array(
		"name" => "Progress Bar - Vertical",
		"base" => "no_progress_bar_vertical",
		"icon" => "icon-wpb-vertical-progress-bar extended-custom-icon",
		"category" => 'by MIKADO',
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Size",
				"param_name" => "title_size",
				"description" => ""
			),
			 array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Progress Bar Height(px)",
				"param_name" => "bar_content_height",
				"description" => "Default value is 190px"
			),
            array (
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Bar Color",
                "param_name" => "bar_color",
                "description" => ""
            ),
            array (
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Bar Border Color",
                "param_name" => "bar_border_color",
                "description" => ""
            ),
			array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => ""
			),
			array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Top Border Radius",
				"param_name" => "border_radius",
				"description" => ""
			),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Percent",
				"param_name" => "percent",
				"description" => ""
			),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Show Percentage Number",
                "param_name" => "show_percent_number",
                "value" => array(
                    "Yes" => "yes",
                    "No"  => "no"
                ),
                "save_always" => true,
                "dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Show Percentage Mark",
				"param_name" => "show_percent_mark",
				"value" => array(
					"Yes" => "with_mark",
					"No"  => "without_mark"	
				),
                "save_always" => true,
				"dependency" => Array('element' => "percent", 'not_empty' => true)
            ),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage Text Size",
				"param_name" => "percentage_text_size",
				"dependency" => Array('element' => "percent", 'not_empty' => true)
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Percentage Color",
				"param_name" => "percent_color",
				"dependency" => Array('element' => "percent", 'not_empty' => true)
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"value" => "",
				"description" => ""
			),
            array (
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Text Color",
                "param_name" => "text_color",
                "description" => "",
                "dependency" => Array('element' => "text", 'not_empty' => true)
            )
		)
) );


/*** Progress Bar Icon ***/

vc_map( array(
	"name" => "Progress Bar - Icon",
	"base" => "no_progress_bar_icon",
	"icon" => "icon-wpb-progress-bar-icon extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
                array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Number of Icons",
                        "param_name" => "icons_number",
                        "description" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Number of Active Icons",
                        "param_name" => "active_number",
                        "description" => ""
                    )
                ),
                $mkd_burst_IconCollections->getVCParamsArray(),
                array(
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Size",
                        "param_name" => "size",
                        "value" => array(
                            "Tiny" => "tiny",
                            "Small" => "small",
                            "Medium" => "medium",
                            "Large" => "large",
                            "Very Large" => "very_large",
                            "Custom" => "custom"
                        ),
                        "save_always" => true,
                        "description" => "",
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Custom Size (px)",
                        "param_name" => "custom_size",
                        "value" => "",
                        "description" => "",
                        "dependency" => array('element' => 'size', 'value' => array('custom'))
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Type",
                        "param_name" => "type",
                        "value" => array(
                            "Normal" => "normal",
                            "Circle" => "circle",
                            "Square" => "square"
                        ),
                        "save_always" => true,
                        "description" => "",
                        "dependency" => array('element' => 'size', 'value' => array('tiny','small','medium','large','very_large'))
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Color",
                        "param_name" => "icon_color",
                        "description" => ""
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Active Color",
                        "param_name" => "icon_active_color",
                        "description" => ""
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Background Color",
                        "param_name" => "background_color",
                        "description" => "",
                        "dependency" => array('element' => "type", 'value' => array('square', 'circle')) 
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Background Active Color",
                        "param_name" => "background_active_color",
                        "description" => "",
                        "dependency" => array('element' => "type", 'value' => array('square', 'circle'))
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Border Color",
                        "param_name" => "border_color",
                        "description" => "Only for Square and Circle type",
                        "dependency" => array('element' => "type", 'value' => array('square', 'circle'))
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Border Active Color",
                        "param_name" => "border_active_color",
                        "description" => "Only for Square and Circle type",
                        "dependency" => array('element' => "type", 'value' => array('square', 'circle'))
                    )
                )
            )
) );


/*** Line Graph shortcode ***/

vc_map( array(
		"name" => "Line Graph",
		"base" => "no_line_graph",
		"icon" => "icon-wpb-line-graph extended-custom-icon",
		"category" => 'by MIKADO',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"" => "",
					"Rounded edges" => "rounded",
					"Sharp edges" => "sharp"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Width",
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Height",
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Color",
				"param_name" => "custom_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Scale steps",
				"param_name" => "scale_steps",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Scale step width",
				"param_name" => "scale_step_width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Labels",
				"param_name" => "labels",
				"value" => "Label 1, Label 2, Label 3"
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "#279eff,Legend One,1,5,10;#7dc5ff,Legend Two,3,7,20;#bee2ff,Legend Three,10,2,34"
			)
		)
) );


/*** Ordered List ***/

vc_map( array(
		"name" => "List - Ordered",
		"base" => "no_ordered_list",
		"icon" => "icon-wpb-ordered-list extended-custom-icon",
		"category" => 'by MIKADO',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Separator",
				"param_name" => "show_separator",
				"value" => array(
					"No"  => "no",
					"Yes"   => "yes"
				),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Animate List",
				"param_name" => "animate",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
				"save_always" => true,
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>",
				"description" => ""
			)

		)
) );


/*** Unordered List ***/

vc_map( array(
		"name" => "List - Unordered",
		"base" => "no_unordered_list",
		"icon" => "icon-wpb-unordered-list extended-custom-icon",
		"category" => 'by MIKADO',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Style",
				"param_name" => "style",
				"value" => array(
					"Circle" => "circle",
					"Number" => "number",
					"Line"	 => "line"
				),
                "save_always" => true,
				"description" => ""
			),
            array(
                "type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Number Type",
				"param_name" => "number_type",
				"value" => array(
					"Circle" => "circle_number",
					"Transparent" => "transparent_number"
				),
                "save_always" => true,
				"description" => "",
                "dependency" => array('element' => "style", 'value' => array('number'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Animate List",
				"param_name" => "animate",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
                "save_always" => true,
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Weight",
				"param_name" => "font_weight",
				"value" => array(
                    "Default" => "",
					"Light" => "light",
					"Normal" => "normal",
                    "Bold" => "bold"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Padding left (px)",
				"param_name" => "padding_left",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Separator",
				"param_name" => "show_separator",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
                "save_always" => true
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>",
				"description" => ""
			)
		)
) );


/*** Icon List Item ***/

vc_map( array(
	"name" => "Icon List Item",
	"base" => "no_icon_list_item",
	"icon" => "icon-wpb-icon-list-item extended-custom-icon",
	"category" => 'by MIKADO',
	"params" => array_merge(
		$mkd_burst_IconCollections->getVCParamsArray(),
		array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Icon Type",
				"param_name" => "icon_type",
				"value" => array(
					"Normal"  => "normal_icon_list",
					"Small"   => "small_icon_list"
				),
                "save_always" => true,
				"description" => ""
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Icon Size (px)",
                "param_name" => "icon_size",
                "description" => ""
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Margin Right (px)",
				"param_name" => "icon_margin_right",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Border Type",
				"param_name" => "border_type",
				"value" => array(
					"" => "",
					"Circle"  => "circle",
					"Square"   => "square"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "title_color",
				"description" => "",
                "dependency" => Array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title size (px)",
				"param_name" => "title_size",
				"description" => "",
                "dependency" => Array('element' => "title", 'not_empty' => true)
			),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Font Family",
                "param_name" => "title_font_family",
                "description" => "",
                "dependency" => Array('element' => "title", 'not_empty' => true)
            ),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Font Weight (px)",
				"param_name" => "title_font_weight",
				"value" => $font_weight_array,
                "save_always" => true,
				"description" => "",
                "dependency" => Array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Letter Spacing (px)",
				"param_name" => "title_letter_spacing",
				"description" => "",
                "dependency" => Array('element' => "title", 'not_empty' => true)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Bottom Margin (px)",
				"param_name" => "bottom_margin",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Show Separator",
				"param_name" => "show_separator",
				"value" => array(
					"No"  => "no",
					"Yes"   => "yes"
				),
                "save_always" => true,
				"description" => ""
			)
		)
	)
) );


/*** Icon Shortcode ***/

vc_map( array(
	"name" => "Icon",
	"base" => "no_icons",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-icons extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
		$mkd_burst_IconCollections->getVCParamsArray(),
		array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Size",
				"param_name" => 'fa_size',
				"value" => $mkd_burst_IconCollections->getIconSizesArray(),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Size (px)",
				"param_name" => "custom_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"
				),
                "save_always" => true,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Rotated Shape",
				"param_name" => "rotated_shape",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
                "save_always" => true,
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => "square")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border radius",
				"param_name" => "border_radius",
				"description" => esc_html__("Please insert border radius(Rounded corners) in px. For example: 4 ", 'burst'),
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Shape Size (px)",
				"param_name" => 'shape_size',
				"value" => "",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Position",
				"param_name" => "position",
				"value" => array(
					"Normal" => "",
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"dependency" => Array('element' => "type", 'value' => array('circle','square')),
				"description" => "Same color for Inner Border if enabled"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Width",
				"param_name" => "border_width",
				"description" => "Default value is 1. Enter just number. Omit pixels",
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Image",
				"param_name" => "background_image",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Background Color",
				"param_name" => "background_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Hover Icon Color",
				"param_name" => "hover_icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Hover Border Color",
				"param_name" => "hover_border_color",
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Hover Background Color",
				"param_name" => "hover_background_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Shadow",
				"param_name" => "icon_shadow",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
                "save_always" => true,
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Shadow Color",
				"param_name" => "shadow_color",
				"description" => "",
				"dependency" => Array('element' => "icon_shadow", 'value' => 'yes')
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Hover Shadow Color",
				"param_name" => "hover_shadow_color",
				"description" => "",
				"dependency" => Array('element' => "icon_shadow", 'value' => 'yes')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Inner Border",
				"param_name" => "inner_border",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
                "save_always" => true,
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"description" => "Margin (top right bottom left)"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Animation",
				"param_name" => "icon_animation",
				"value" => array(
					"No" => "",
					"Yes" => "mkd_icon_animation"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Hover Animation",
				"param_name" => "icon_hover_animation",
				"value" => array(
					"No Animation" => "no_animation",
					"Outline Scale Out" => "animation_border_out",
					"Outline Scale In" => "animation_border_in",
					"Scale In With Outline" => "scale_in_outline",
					"Outline Enlarge" => "outline_enlarge",
					"Pulse" => "pulse"
				),
                "save_always" => true,
				"dependency" => Array('element' => "type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Outline Color",
				"param_name" => "outline_color",
				"dependency" => Array('element' => "icon_hover_animation", 'value' => array('animation_border_out','animation_border_in','scale_in_outline', 'pulse','outline_enlarge'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Animation Delay (ms)",
				"param_name" => "icon_animation_delay",
				"value" => "",
				"description" => "",
				"dependency" => Array('element' => "icon_animation", 'value' => 'mkd_icon_animation')
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "Use For Back To Top",
				"value" => array("Use this icon as Back to Top button?" => "yes"),
				"param_name" => "back_to_top_icon",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link",
				"param_name" => "link",
				"value" => ""
			),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "Use Link as Anchor",
				"value" => array("Use this icon as Anchor?" => "yes"),
				"param_name" => "anchor_icon",
				"description" => "Check this box to use icon as anchor link (eg. #contact)",
				"dependency" => Array('element' => "link", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Target",
				"param_name" => "target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank"
				),
                "save_always" => true,
				"description" => "",
				"dependency" => Array('element' => "link", 'not_empty' => true)
		))
	)
) );


/*** Icon with Text ***/

vc_map( array(
	"name" => "Icon With Text",
	"base" => "no_icon_text",
	"icon" => "icon-wpb-icon-with-text extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
                array(
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Box type",
                        "param_name" => "box_type",
                        "value" => array(
                            "Normal" => "normal",
                            "Icon in a box" => "icon_in_a_box"
                        ),
                        "save_always" => true,
                        "description" => ""
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Box Border Color",
                        "param_name" => "box_border_color",
                        "description" => "",
                        "dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Box Background Color",
                        "param_name" => "box_background_color",
                        "description" => "",
                        "dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
                    )
                ),
                $mkd_burst_IconCollections->getVCParamsArray(),
                array(
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Custom Icon",
                        "param_name" => "custom_icon"
                    ),
					array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Custom Hover Icon",
                        "param_name" => "custom_icon_hover",
						"dependency" => Array('element' => "custom_icon", 'not_empty' => true)
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Type",
                        "param_name" => "icon_type",
                        "value" => array(
                            "Normal" => "normal",
                            "Circle" => "circle",
                            "Square" => "square"
                        ),
                        "save_always" => true,
                        "description" => "This attribute doesn't work when Icon Position is Top. In This case Icon Type is Normal",
                    ),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => "Icon Border Type",
						"param_name" => "border_type",
						"value" => array(
							"Default" => "",
							"Outline" => "outline",
							"Normal" => "normal"
						),
						"description" => "Choose type of icon border",
						"dependency" => array('element' => 'icon_type', 'value' => array('circle','square'))
					),
                    array(
                        "type" => "textfield",
                        "class" => "",
                        "heading" => "Icon Border Width (px)",
                        "param_name" => "icon_border_width",
                        "description" => "Enter just number, omit pixels",
                        "dependency" => array('element' => 'icon_type' , 'value' => array('circle', 'square'))
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Size / Icon Space From Text",
                        "param_name" => "icon_size",
                        "value" => $mkd_burst_IconCollections->getIconSizesArray(),
                        "save_always" => true,
                        "description" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Custom Icon Size (px)",
                        "param_name" => "custom_icon_size",
                        "description" => "",
                        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Animation",
                        "param_name" => "icon_animation",
                        "value" => array(
                            "No" => "",
                            "Yes" => "mkd_icon_animation"
                        ),
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Animation Delay (ms)",
                        "param_name" => "icon_animation_delay",
                        "value" => "",
                        "description" => "",
                        "dependency" => Array('element' => "icon_animation", 'value' => array('mkd_icon_animation'))
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Animation on Hover",
                        "param_name" => "icon_animation_hover",
                        "value" => array(
                            "No" => "no",
                            "Zoom Icon" => "zoom"
                        ),
                        "save_always" => true
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Position",
                        "param_name" => "icon_position",
                        "value" => array(
                            "Top" => "top",
                            "Left" => "left",
                            "Left From Title" => "left_from_title",
                            "Right" => "right",
                            "Right From Title" => "right_from_title"
                        ),
                        "save_always" => true,
                        "description" => "Icon Position (only for normal box type)",
                        "dependency" => Array('element' => "box_type", 'value' => array('normal'))
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Margin",
                        "param_name" => "icon_margin",
                        "value" => "",
                        "description" => "Margin should be set in a top right bottom left format",
                        "dependency" => array('element' => "box_type", 'value' => array('normal'))
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Text Left Padding (px)",
                        "param_name" => "text_left_padding",
                        "description" => "Only when Icon Position is Left",
                        "dependency" => Array('element' => "icon_position", 'value' => array('left'))
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Text Right Padding (px)",
                        "param_name" => "text_right_padding",
                        "description" => "Only when Icon Position is Right",
                        "dependency" => Array('element' => "icon_position", 'value' => array('right'))
                    ),
					array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Shape Size (px)",
                        "param_name" => "shape_size",
                        "description" => ""
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Border Color",
                        "param_name" => "icon_border_color",
                        "description" => "Only for Square and Circle type",
                        "dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Color",
                        "param_name" => "icon_color",
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Hover Color",
                        "param_name" => "icon_hover_color",
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Background Color",
                        "param_name" => "icon_background_color",
                        "description" => "Icon Background Color (only for square and circle icon type)",
                        "dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Hover Background Color",
                        "param_name" => "icon_hover_background_color",
                        "description" => "Icon Hover Background Color (only for square and circle icon type)",
                        "dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Separator",
                        "param_name" => "separator",
                        "value" => array(
                            "No"  => "no",
                            "Yes"   => "yes",
                        ),
                        "save_always" => true,
                        "description" => ""
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Separator Color",
                        "param_name" => "separator_color",
                        "description" => "",
                        "dependency" => array('element' => "separator", 'value' => array("yes"))
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Separator Thickness (px)",
                        "param_name" => "separator_thickness",
                        "description" => "",
                        "dependency" => array('element' => "separator", 'value' => array("yes"))
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Separator Size (px)",
                        "param_name" => "separator_width",
                        "description" => "",
                        "dependency" => array('element' => "separator", 'value' => array("yes"))
                    ),
                    array(
                        "type" => "dropdown",
                        "class" => "",
                        "heading" => "Separator Alignment",
                        "param_name" => "separator_alignment",
                        "value" => array(
                            "Center"   => "none",
                            "Left" => "left",
                            "Right" => "right",
                        ),
                        "save_always" => true,
                        "dependency" => array('element' => "separator", 'value' => array("yes"))
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Title",
                        "param_name" => "title",
                        "value" => ""
                    ),
                    array(
                        "type" => "dropdown",
                        "class" => "",
                        "heading" => "Title Tag",
                        "param_name" => "title_tag",
                        "value" => array(
                            ""   => "",
                            "h2" => "h2",
                            "h3" => "h3",
                            "h4" => "h4",
                            "h5" => "h5",
                            "h6" => "h6",
                        ),
                        "dependency" => Array('element' => "title", 'not_empty' => true)
                    ),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => "Title Size (px)",
						"param_name" => "title_size",
						"value" => "",
						"description" => "",
						"dependency" => array('element' => "title", 'not_empty' => true)
					),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Title Color",
                        "param_name" => "title_color",
                        "dependency" => Array('element' => "title", 'not_empty' => true)
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Space Between title and text (px)",
                        "param_name" => "title_margin",
                        "value" => "",
                        "description" => "",
                        "dependency" => Array('element' => "title", 'not_empty' => true)
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Title Top Padding (px)",
                        "param_name" => "title_padding",
                        "value" => "",
                        "description" => "This attribute is used for boxed type",
                        "dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Text",
                        "param_name" => "text",
                        "value" => ""
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Text Color",
                        "param_name" => "text_color",
                        "dependency" => Array('element' => "text", 'not_empty' => true)
                    ),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => "Text Size (px)",
						"param_name" => "text_size",
						"dependency" => Array('element' => "text", 'not_empty' => true)
					),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => "Text Line Height (px)",
						"param_name" => "text_line_height",
						"dependency" => Array('element' => "text", 'not_empty' => true)
					),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Link",
                        "param_name" => "link",
                        "value" => "",
                        "dependency" => Array('element' => "box_type", 'value' => array('normal'))
                    ),
                    array(
                        "type" => "dropdown",
                        "class" => "",
                        "heading" => "Target",
                        "param_name" => "target",
                        "value" => array(
                            ""   => "",
                            "Self" => "_self",
                            "Blank" => "_blank"
                        ),
                        "dependency" => Array('element' => "link", 'not_empty' => true)
                    )
                )
            )
) );

/*** Separator with Icon ***/

vc_map( array(
	"name" => "Separator with Icon",
	"base" => "no_separator_with_icon",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-separator-with-icon extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
		array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Line Style",
				"param_name" => "border_style",
				"value" => array(
					"Solid" => "solid",
					"Dashed" => "dashed",
					"Dotted" => "dotted",
					"Transparent" => "transparent"
				),
                "save_always" => true,
				"description" => "Choose a style for the separator line"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Line Color",
				"param_name" => "color",
				"value" => "",
				"description" => "Choose a color for the separator line"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Line Width (px)",
				"param_name" => "width",
				"value" => "",
				"description" => "Insert width for the separator line"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Line Thickness (px)",
				"param_name" => "thickness",
				"value" => "",
				"description" => "Insert thickness for the separator line"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Top Margin (px)",
				"param_name" => "up",
				"value" => "",
				"description" => "Insert top margin for the separator"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Bottom Margin (px)",
				"param_name" => "down",
				"value" => "",
				"description" => "Insert bottom margin for the separator"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Type",
				"param_name" => "type",
				"value" => array(
					"Default Icon" => "with_icon",
					"Custom Icon" => "with_custom_icon"
				),
                "save_always" => true,
				"description" => "Choose a style for the separator line"
			),
		),
		$mkd_burst_IconCollections->getVCParamsArray(array('element' => "type", 'value' => array('with_icon'))),
		array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Custom Size (px)",
				"param_name" => "icon_custom_size",
				"value" => "",
				"description" => "Insert size for the icon (default value is 20)",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Type",
				"param_name" => "icon_type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"
				),
                "save_always" => true,
				"description" => "Choose icon type",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom Icon",
				"param_name" => "custom_icon",
				"dependency" => Array('element' => "type", 'value' => array('with_custom_icon'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Position",
				"param_name" => "separator_icon_position",
				"value" => array(
					"Center" => "center",
					"Left" => "left",
					"Right" => "right"
				),
                "save_always" => true,
				"description" => "Choose position of the icon"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Margins",
				"param_name" => "icon_margin",
				"description" => "Insert left and right icon margins"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Border radius",
				"param_name" => "icon_border_radius",
				"description" => esc_html__("Insert border radius(Rounded corners) in px. For example: 4. Leave empty for default. ", 'burst'),
				"dependency" => Array('element' => "icon_type", 'value' => array('circle','square'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Shape Size (px)",
				"param_name" => 'icon_shape_size',
				"value" => "",
				"description" => "Insert size for a shape around the icon",
				"dependency" => Array('element' => "icon_type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"description" => "Choose a color for the icon",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "icon_border_color",
				"description" => "Choose a color for the border around the icon shape",
				"dependency" => Array('element' => "icon_type", 'value' => array('circle','square'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Border Width",
				"param_name" => "icon_border_width",
				"description" => "Insert border width (just number, omit pixels)",
				"dependency" => Array('element' => "icon_type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Background Color",
				"param_name" => "icon_background_color",
				"description" => "Choose a background color for the icon shape",
				"dependency" => Array('element' => "icon_type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Hover Icon Color",
				"param_name" => "hover_icon_color",
				"description" => "Choose a hover color for the icon",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Hover Border Color",
				"param_name" => "hover_icon_border_color",
				"description" => "Choose a hover color for the border around the icon shape",
				"dependency" => Array('element' => "icon_type", 'value' => array('circle','square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Icon Hover Background Color",
				"param_name" => "hover_icon_background_color",
				"description" => "Choose a background hover color for the icon shape",
				"dependency" => Array('element' => "icon_type", 'value' => array('circle','square'))
			),array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Link",
			"param_name" => "link",
			"description" => ""
		),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => "Use Link as Anchor",
				"value" => array("Use this icon as Anchor?" => "yes"),
				"param_name" => "icon_anchor",
				"description" => "Check this box to use icon as anchor link (eg. #contact)",
				"dependency" => Array('element' => "link", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Target",
				"param_name" => "target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank"
				),
                "save_always" => true,
				"description" => "",
				"dependency" => Array('element' => "link", 'not_empty' => true)
			)
		)
	)

) );

/*** Social Share ***/

vc_map( array(
	"name" => "Social Share",
	"base" => "no_social_share",
	"icon" => "icon-wpb-social-share extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"show_settings_on_create" => false
) );


/*** Cover Boxes ***/

$cover_boxes_icons_array = array(array());
for ($x = 1; $x<4; $x++) {
    $coverBoxesCollections = $mkd_burst_IconCollections->iconCollections;
    foreach($coverBoxesCollections as $collection_key => $collection) {

        $cover_boxes_icons_array[$x][] = array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Button Icon ".$x,
            "param_name" => "cover_social_".$collection->param."_".$x,
            "value" => $collection->getIconsArray(),
            "save_always" => true,
            "dependency" => Array('element' => "cover_boxes_icon_pack", 'value' => array($collection_key))
        );

    }
}

vc_map( array(
	"name" => "Cover Boxes",
	"base" => "no_cover_boxes",
	"icon" => "icon-wpb-cover-boxes extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"params" => array_merge(
        array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Active element",
                "param_name" => "active_element",
                "value" => ""
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Title tag",
                "param_name" => "title_tag",
                "value" => array(
                    ""   => "",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ),
                "description" => "Choose with heading tag to display for titles"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of items",
                "param_name" => "number_of_items",
                "value" => array(
                    "" => "",
                    "Two"   => "2",
                    "Three" => "3"
                ),
                "description" => "Choose the number of items shown"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Icon Pack",
                "param_name" => "cover_boxes_icon_pack",
                "value" => array_merge(array("No Icon" => ""),$mkd_burst_IconCollections->getIconCollectionsVC()),
                "save_always" => true
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => "Image 1",
                "param_name" => "image1"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Title 1",
                "param_name" => "title1",
                "value" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Color 1",
                "param_name" => "title_color1",
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Text 1",
                "param_name" => "text1",
                "value" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Text Color 1",
                "param_name" => "text_color1",
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Link 1",
                "param_name" => "link1",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Link label 1",
                "param_name" => "link_label1",
                "value" => ""
            )
        ),
        $cover_boxes_icons_array['1'],
        array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Target 1",
                "param_name" => "target1",
                "value" => array(
                    "Self" => "_self",
                    "Blank" => "_blank"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => "Image 2",
                "param_name" => "image2"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Title 2",
                "param_name" => "title2",
                "value" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Color 2",
                "param_name" => "title_color2",
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Text 2",
                "param_name" => "text2",
                "value" => ""
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Text Color 2",
                "param_name" => "text_color2",
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Link 2",
                "param_name" => "link2",
                "value" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Link label 2",
                "param_name" => "link_label2",
                "value" => ""
            )
        ),
        $cover_boxes_icons_array['2'],
        array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Target 2",
                "param_name" => "target2",
                "value" => array(
                    "Self" => "_self",
                    "Blank" => "_blank"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => "Image 3",
                "param_name" => "image3",
                "dependency" => array('element' => 'number_of_items', 'value' => array('','3'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Title 3",
                "param_name" => "title3",
                "value" => "",
                "dependency" => array('element' => 'number_of_items', 'value' => array('','3'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Title Color 3",
                "param_name" => "title_color3",
                "description" => "",
                "dependency" => array('element' => 'number_of_items', 'value' => array('','3'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Text 3",
                "param_name" => "text3",
                "value" => "",
                "dependency" => array('element' => 'number_of_items', 'value' => array('','3'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Text Color 3",
                "param_name" => "text_color3",
                "description" => "",
                "dependency" => array('element' => 'number_of_items', 'value' => array('','3'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Link 3",
                "param_name" => "link3",
                "value" => "",
                "dependency" => array('element' => 'number_of_items', 'value' => array('','3'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Link label 3",
                "param_name" => "link_label3",
                "value" => "",
                "dependency" => array('element' => 'number_of_items', 'value' => array('','3'))
            )
        ),
        $cover_boxes_icons_array['3'],
        array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Target 3",
                "param_name" => "target3",
                "value" => array(
                    "Self" => "_self",
                    "Blank" => "_blank"
                ),
                "save_always" => true,
                "description" => "",
                "dependency" => array('element' => 'number_of_items', 'value' => array('','3'))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Show Link as Default Button",
                "param_name" => "read_more_button_style",
                "value" => array(
                    "Default" => "",
                    "No" => "no",
                    "Yes" => "yes"
                ),
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator",
                "param_name" => "separator",
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Thicknes (px)",
                "param_name" => "separator_thickness",
                "description" => "",
                "dependency" => array('element' => "separator", 'value' => array('yes'))
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Color",
                "param_name" => "separator_color",
                "description" => "",
                "dependency" => array('element' => "separator", 'value' => array('yes'))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Separator Border Style",
                "param_name" => "separator_border_style",
                "value" => array(
                    "" => "",
                    "Dashed" => "dashed",
                    "Solid" => "solid"
                ),
                "description" => "",
                "dependency" => array('element' => "separator", 'value' => array('yes'))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Button Icon Size (px)",
                "param_name" => "button_icon_size",
                "description" => "",
                "dependency" => Array('element' => "cover_boxes_icon_pack", 'not_empty' => true)
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Button Icon Color",
                "param_name" => "button_icon_color",
                "description" => "",
                "dependency" => Array('element' => "cover_boxes_icon_pack", 'not_empty' => true)
            ),
        )
    )
) );


/*** Interactive Banners ***/

vc_map( array(
		"name" => "Interactive Banners",
		"base" => "no_interactive_banners",
		"category" => 'by MIKADO',
		"icon" => "icon-wpb-interactive-banners extended-custom-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
                    array(
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Width",
                            "param_name" => "layout_width",
                            "value" => array(
                                ""   => "",
                                "1/2" => "one_half",
                                "1/3" => "one_third",
                                "1/4" => "one_fourth",
                            ),
                            "description" => ""
                        ),
                        array(
                            "type" => "attach_image",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Image",
                            "param_name" => "image"
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Image Color Overlay",
                            "param_name" => "overlay_color",
                            "value" => "",
                            "description" => "",
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Image Hover Color Overlay",
                            "param_name" => "overlay_color_hover",
                            "value" => "",
                            "description" => "",
                        ),
						array(
							"type" => "dropdown",
							"class" => "",
							"heading" => "Image Zoom on Hover",
							"param_name" => "image_animate",
							"value" => array(
								"No"   => "no",
								"Yes"   => "yes"
							),
                            "save_always" => true,
							"description" => "",
							"dependency" => Array('element' => "image", 'not_empty' => true)
						),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Show Image Inner Border",
                            "param_name" => "show_border",
                            "value" => array(
                            	"Undraw Border On Hover" => "undraw",
                                "Always"    => "always",
								"Only On Hover"    => "on_hover",
								"Only Before Hover"    => "before_hover",
								"Never"   => "never"
                            ),
                            "save_always" => true,
                            "description" => ""
                        ),
                        array(
                            "type" => "colorpicker",
                            "class" => "",
                            "heading" => "Image Inner Border Color",
                            "param_name" => "border_color",
                            "description" => "",
                            "dependency" => Array('element' => "show_border", 'value' => array('always','on_hover','before_hover','undraw'))
                        ),
						array(
							"type" => "textfield",
							"holder" => "div",
							"class" => "",
							"heading" => "Inner Border Width",
							"param_name" => "border_width",
							"value" => "",
							"dependency" => Array('element' => "show_border", 'value' => array('always','on_hover','before_hover','undraw'))
						),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Inner Border Offset (px)",
                            "param_name" => "inner_border_offset",
                            "value" => "",
                            "description" => "Default value is 5",
                            "dependency" => Array('element' => "show_border", 'value' => array('always','on_hover','before_hover','undraw'))
                        ),
						array(
							"type" => "dropdown",
							"class" => "",
							"heading" => "Show Icon",
							"param_name" => "show_icon",
							"value" => array(
								"Always"    => "always",
								"Only On Hover"    => "on_hover",
								"Never"   => "never"
							),
                            "save_always" => true,
							"description" => "",
						),
                    ),
                    $mkd_burst_IconCollections->getVCParamsArray((array('element' => "show_icon", 'value' => array('always', 'on_hover'))), '', true),
                    array(
                        array(
                            "type" => "dropdown",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Type",
                            "param_name" => "icon_type",
                            "value" => array(
                                "Normal" => "normal",
                                "Circle" => "circle",
                                "Square" => "square"
                            ),
                            "save_always" => true,
                            "description" => "",
                            "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Size (px)",
                            "param_name" => "icon_custom_size",
                            "value" => "",
                            "description" => "Default value is 20",
                            "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Icon Color",
                            "param_name" => "icon_color",
                            "description" => "",
                            "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Show Title",
                            "param_name" => "show_title",
                            "value" => array(
                                "Always"    => "always",
                                "Only On Hover"    => "on_hover",
                                "Only Before Hover"    => "before_hover",
                                "Never"   => "never"
                            ),
                            "save_always" => true,
                            "description" => "",
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Title Text",
                            "param_name" => "title",
                            "description" => "",
                            "dependency" => Array('element' => "show_title", 'value' => array('always','on_hover','before_hover'))
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Title Color",
                            "param_name" => "title_color",
                            "dependency" => Array('element' => "title", 'not_empty' => true),
                            "dependency" => Array('element' => "show_title", 'value' => array('always','on_hover','before_hover'))
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Title Size (px)",
                            "param_name" => "title_size",
                            "description" => "Default value is 17",
                            "dependency" => Array('element' => "title", 'not_empty' => true),
                            "dependency" => Array('element' => "show_title", 'value' => array('always','on_hover','before_hover'))
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Title Tag",
                            "param_name" => "title_tag",
                            "value" => array(
                                ""   => "",
                                "h2" => "h2",
                                "h3" => "h3",
                                "h4" => "h4",	
                                "h5" => "h5",	
                                "h6" => "h6",	
                            ),
                            "dependency" => Array('element' => "title", 'not_empty' => true)
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Show Button",
                            "param_name" => "show_button",
                            "value" => array(
                                "Always"    => "always",
                                "Only On Hover"    => "on_hover",
								"Only Before Hover"    => "before_hover",
                                "Never"   => "never"
                            ),
                            "save_always" => true,
                            "description" => "",
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Button Height",
                            "param_name" => "button_size",
                            "description" => "It uses 'small' button options (px)",
                            "dependency" => Array('element' => "show_button", 'value' => array("on_hover","always"))
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Button Left and Right Padding",
                            "param_name" => "button_padding",
                            "description" => "It uses 'small' button options (px)",
                            "dependency" => Array('element' => "show_button", 'value' => array("on_hover","always"))
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Button Text",
                            "param_name" => "link_text",
                            "description" => "",
                            "dependency" => Array('element' => "show_button", 'value' => array("on_hover","always"))
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Link Button to following URL",
                            "param_name" => "button_link",
                            "description" => "",
                            "dependency" => Array('element' => "show_button", 'value' => array("on_hover","always"))
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Link Target",
                            "param_name" => "target",
                            "value" => array(
                                "Self"   => "_self",
                                "Blank" => "_blank"
                            ),
                            "save_always" => true,
                            "description" => "",
                            "dependency" => Array('element' => "show_button", 'value' => array("on_hover","always"))
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Button Text Color",
                            "param_name" => "link_color",
                            "description" => "",
                            "dependency" => Array('element' => "show_button", 'value' => array("on_hover","always"))
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Button Border Color",
                            "param_name" => "link_border_color",
                            "description" => "",
                            "dependency" => Array('element' => "show_button", 'value' => array("on_hover","always"))
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Button Background Color",
                            "param_name" => "link_background_color",
                            "description" => "",
                            "dependency" => Array('element' => "show_button", 'value' => array("on_hover","always"))
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Add Link Over Banner Content",
                            "param_name" => "link_over_content",
                            "value" => array(
                                "No"    => "no",
                                "Yes"    => "yes"
                            ),
                            "save_always" => true,
                            "description" => "",
                            "dependency" => Array('element' => "show_button", 'value' => "never")
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Link Banner Content to following URL",
                            "param_name" => "content_link",
                            "description" => "",
                            "dependency" => Array('element' => "link_over_content", 'value' => 'yes')
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Show Separator under Title",
                            "param_name" => "separator",
                            "value" => array(
                                "Never"   => "no",
                                "Always"   => "yes",
                                "Only On Hover" => "on_hover"
                            ),
                            "save_always" => true,
                            "description" => ""
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Separator Thickness (px)",
                            "param_name" => "separator_thickness",
                            "description" => "",
                            "dependency" => Array('element' => "separator", 'value' => array("yes","on_hover"))
                        ),
                        array(
                            "type" => "colorpicker",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Separator Color",
                            "param_name" => "separator_color",
                            "description" => "",
                            "dependency" => Array('element' => "separator", 'value' => array("yes","on_hover"))
                        ),
                        array(
                            "type" => "dropdown",
                            "class" => "",
                            "heading" => "Show Content",
                            "param_name" => "show_content",
                            "value" => array(
                                "Always"    => "always",
                                "Only On Hover"    => "on_hover",
                                "Only Before Hover"    => "before_hover",
                                "Never"   => "never"
                            ),
                            "save_always" => true,
                            "description" => "",
                        ),
                        array(
                            "type" => "textarea_html",
                            "holder" => "div",
                            "class" => "",
                            "heading" => "Content",
                            "param_name" => "content",
                            "value" => "<p>"."I am test text for 'Interactive Banner' shortcode."."</p>",
                            "description" => ""
                        )
                    )
                )
    )
);


/*** Image with Text and Icon ***/

vc_map( array(
    "name" => "Image with text and Icon",
    "base" => "no_image_with_text_and_icon",
    "icon" => "icon-wpb-image-with-text-and-icon extended-custom-icon",
    "category" => 'by MIKADO',
    "allowed_container_element" => 'vc_row',
    "params" => array_merge(
                array(
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Image",
                        "param_name" => "image"
                    ),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => "Show Inner Border",
						"param_name" => "inner_border",
						"value" => array(
							"Default" => "",
							"No" => "no",
							"Yes" => "yes"
						),
						"description" => "Show Inner Border on Image",
						"dependency" => array('element' => 'image', 'not_empty' => true)
					)
                ),
                $mkd_burst_IconCollections->getVCParamsArray(array(), '', true),
                array(
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Type",
                        "param_name" => "icon_type",
                        "value" => array(
                            "Circle" => "circle",
                            "Square" => "square"
                        ),
                        "save_always" => true,
                        "description" => "",
                        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Custom Size (px)",
                        "param_name" => "icon_custom_size",
                        "value" => "",
                        "description" => "Default value is 26",
                        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Custom Shape Size (px)",
                        "param_name" => "icon_shape_size",
                        "value" => "",
                        "description" => "Default value is 74",
                        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Color",
                        "param_name" => "icon_color",
                        "description" => "",
                        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Icon Background Color",
                        "param_name" => "icon_background_color",
                        "description" => "",
                        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Link",
                        "param_name" => "link",
                        "description" => ""
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Link Target",
                        "param_name" => "target",
                        "value" => array(
                            "" => "",
                            "Self" => "_self",
                            "Blank" => "_blank"
                        ),
                        "description" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Title",
                        "param_name" => "title",
                        "description" => ""
                    ),
                    array(
                        "type" => "dropdown",
                        "class" => "",
                        "heading" => "Title Tag",
                        "param_name" => "title_tag",
                        "value" => array(
                            ""   => "",
                            "h2" => "h2",
                            "h3" => "h3",
                            "h4" => "h4",
                            "h5" => "h5",
                            "h6" => "h6",
                        ),
                        "description" => "Default value is h4",
                        "dependency" => Array('element' => "title", 'not_empty' => true)
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Title Color",
                        "param_name" => "title_color",
                        "description" => "",
                        "dependency" => Array('element' => "title", 'not_empty' => true)
                    ),
                    array(
                        "type" => "textarea_html",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Content",
                        "param_name" => "content",
                        "value" => "<p>"."I am test text for Image With Text and Icon shortcode."."</p>",
                        "description" => ""
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => "Top Margin",
                        "param_name" => "position_top",
                        "description" => "Select top position of title from image. Default value is 65"
                    )
                )
            )

) );


/*** Image with text ***/

vc_map( array(
	"name" => "Image With Text",
	"base" => "no_image_with_text",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-image-with-text extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Image",
			"param_name" => "image"
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Alignment",
			"param_name" => "alignment",
			"value" => array(
				"Center"   => "center",
				"Left"    => "left",
				"Right"   => "right"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Title",
			"param_name" => "title",
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Title Color",
			"param_name" => "title_color",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Title Tag",
			"param_name" => "title_tag",
			"value" => array(
				""   => "",
				"h2" => "h2",
				"h3" => "h3",
				"h4" => "h4",
				"h5" => "h5",
				"h6" => "h6",
			),
			"description" => ""
		),
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => "Content",
			"param_name" => "content",
			"value" => "<p>"."I am test text for Interactive Banners shortcode."."</p>",
			"description" => ""
		)
	)
) );


/*** Video ***/

vc_map( array(
	"name" => "Video shortcode",
	"base" => "no_video",
	"icon" => "icon-wpb-video extended-custom-icon",
	"category" => 'by MIKADO',
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Video Type - webm",
			"param_name" => "webm",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Video Type - mp4",
			"param_name" => "mp4",
			"value" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Video Type - ogv",
			"param_name" => "ogv",
			"value" => ""
		),
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"class" => "",
			"heading" => "Loop",
			"param_name" => "loop",
			"value" => array(
				"Default" => "false",
				"No" => "false",
				"Yes" => "true"
			),
            "save_always" => true,
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"admin_label" => true,
			"class" => "",
			"heading" => "Autoplay",
			"param_name" => "autoplay",
			"value" => array(
				"Default" => "false",
				"No" => "false",
				"Yes" => "true"
			),
            "save_always" => true,
			"description" => ""
		)
	)
) );


/*** Contact Form 7 ***/

if(mkd_burst_contact_form_7_installed()){
	vc_add_param("contact-form-7", array(
		"type" => "dropdown",
		"class" => "",
		"heading" => "Style",
		"param_name" => "html_class",
		"value" => array(
			"Default"				=> "default",
			"Custom Style 1"		=> "cf7_custom_style_1",
			"Custom Style 2"		=> "cf7_custom_style_2",
			"Custom Style 3"		=> "cf7_custom_style_3"
		),
        "save_always" => true,
		"description" => "You can style each form element individually in Mikado Options > Contact Form 7"
	));
}


/*** Product Slider ***/
if(mkd_burst_is_woocommerce_installed()) {
    vc_map(array(
        "name" => "Product Slider",
        "base" => "no_product_slider",
        "category" => 'by MIKADO',
        "icon" => "icon-wpb-product-slider extended-custom-icon",
        "allowed_container_element" => 'vc_row',
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Product type",
                "param_name" => "product_type",
                "value" => array(
                    "Recent Products" => "recent_products",
                    "Featured Products" => "featured_products",
                    "Products By Id" => "products",
                    "Products By Category" => "product_category",
                    "Products On Sale" => "sale_products",
                    "Best Selling" => "best_selling_products",
                    "Top Rated" => "top_rated_products"
                ),
                "save_always" => true,
                "description" => ''
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Order By",
                "param_name" => "order_by",
                "value" => array(
                    "" => "",
                    "Date" => "date",
                    "ID" => "date",
                    "Author" => "date",
                    "Title" => "title",
                    "Modified" => "modified",
                    "Random" => "rand",
                    "Comment count" => "comment_count",
                    "Menu order" => "menu_order"
                ),
                "description" => "",
                "dependency" => array('element' => "product_type", 'value' => array("recent_products","featured_products","product_category","sale_products","top_rated_products"))
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Padding between product items",
                "param_name" => "padding_between",
                "value" => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
                "save_always" => true,
                "description" => ''
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Order",
                "param_name" => "order",
                "value" => array(
                    "" => "",
                    "ASC" => "ASC",
                    "DESC" => "DESC",
                ),
                "description" => "",
                "dependency" => array('element' => "product_type", 'value' => array("recent_products","featured_products","products","product_category","sale_products","top_rated_products"))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Number",
                "param_name" => "number",
                "value" => "-1",
                "description" => "Number of product on page (-1 is all)"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Products Shown",
                "param_name" => "products_shown",
                "value" => array(
                    "" => "",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6"
                ),
                "save_always" => true,
                "description" => "Number of product posts that are showing at the same time in full width (on smaller screens is responsive so there will be less items shown)",
            ),
            array(
                "type" => "checkbox",
                "class" => "",
                "heading" => "Prev/Next navigation",
                "value" => array("Enable prev/next navigation?" => "yes"),
                "param_name" => "enable_navigation"
            ),
            array(
                "type" => "checkbox",
                "class" => "",
                "heading" => "Bullets navigation",
                "value" => array("Show bullets navigation?" => "yes"),
                "param_name" => "pager_navigation"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Products",
                "param_name" => "ids",
                "value" => "",
                "description" => "Delimit ID numbers by comma",
                "dependency" => array('element' => "product_type", 'value' => array("products"))
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Category",
                "param_name" => "category",
                "value" => "",
                "description" => "Delimit category slugs by comma",
                "dependency" => array('element' => "product_type", 'value' => array("product_category"))
            ),
        )
    ));
}

/* Text Slider Holder */

class WPBakeryShortCode_No_Text_Slider_Holder  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Text Slider Holder",
	"base" => "no_text_slider_holder",
	"icon" => "icon-wpb-text-slider-holder extended-custom-icon",
	"category" => 'by MIKADO',
	"as_parent" => array('only' => 'no_text_slider_item'),
	"content_element" => true,
	"params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Show Navigation",
			"param_name" => "show_navigation",
			"value" => array(
				"Yes" => 'yes',
				"No" => 'no'				
			),
            "save_always" => true
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => "Navigation Position",
			"param_name" => "navigation_position",
			"value" => array(
				"Left" => 'nav-left',
				"Center" => 'nav-center',
				"Right" => 'nav-right'				
			),
            "save_always" => true,
			"dependency" => Array('element' => "show_navigation", 'value' => array('yes')),
		)
	),
	"js_view" => 'VcColumnView'
) );


/* Text Slider Item */

class WPBakeryShortCode_No_Text_Slider_Item  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Text Slider Item",
	"base" => "no_text_slider_item",
	"as_parent" => array('only' => 'vc_column_text, vc_separator, no_custom_font, no_icons, no_separator_with_icon, vc_text_separator'),
	"as_child" => array('only' => 'no_text_slider_holder'),
	"content_element" => true,
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-text-slider-item extended-custom-icon",
	"js_view" => 'VcColumnView',
	"show_settings_on_create" => false,
	"params" => array()
) );

/* Icon Slider Holder */

class WPBakeryShortCode_No_Icon_Slider_Holder  extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Icon Slider Holder",
	"base" => "no_icon_slider_holder",
	"icon" => "icon-wpb-icon-slider-holder extended-custom-icon",
	"category" => 'by MIKADO',
	"as_parent" => array('only' => 'no_icon_slider_item'),
	"content_element" => true,
	"show_settings_on_create" => false,
	"params" => array(),
	"js_view" => 'VcColumnView'
) );

/* Icon Slider Item */

$icon_slider_icons_array = array();
$icon_slider_IconCollections = $mkd_burst_IconCollections->iconCollections;
foreach($icon_slider_IconCollections as $collection_key => $collection) {

    $tab_slider_icons_array[] = array(
        "type" => "dropdown",
        "class" => "",
        "heading" => "Slide Navigation Icon",
        "param_name" => "icon_".$collection->param,
        "value" => $collection->getIconsArray(),
        "save_always" => true,
        "dependency" => Array('element' => "icon_family", 'value' => array($collection_key))
    );

}

class WPBakeryShortCode_No_Icon_Slider_Item  extends WPBakeryShortCode {}
vc_map( array(
	"name" => "Icon Slider Item",
	"base" => "no_icon_slider_item",
	"as_child" => array('only' => 'no_icon_slider_holder'),
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-icon-slider-item extended-custom-icon",
	"show_settings_on_create" => true,
	"params" =>array_merge(
			array(
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Icon Pack",
					"param_name" => "icon_family",
					"value" => $mkd_burst_IconCollections->getIconCollectionsVC(),
                    "save_always" => true
				),
			),	
			$tab_slider_icons_array,
			array(
				array(
					"type" => "attach_image",
			        "admin_label" => true,
			        'heading' => 'Slide Image',
			        'param_name' => 'slide_image',
			        'value' => '',
			        'description' =>( 'Select image from media library.'),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Image Position",
					"param_name" => "image_position",
					"value" => array(
						"Left"		=> "left",
						"Right" 	=> "right",
					),
                    "save_always" => true,
					"description" => ""
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => "Content",
					"param_name" => "content",
					"value" => "",
					"description" => "",
				),
			)					
		),
	)
);

/*** Accordion ***/


class WPBakeryShortCode_No_Accordion  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" =>  esc_html__( 'Mikado Accordion', 'burst' ),
    "base" => "no_accordion",
    "as_parent" => array('only' => 'no_accordion_section'),
    "content_element" => true,
    "category" => 'by MIKADO',
    "icon" => "icon-wpb-accordion extended-custom-icon",
    "show_settings_on_create" => true,
    "params" =>
        array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Active section', 'burst' ),
                'param_name' => 'active_tab',
                'value' => 1,
                'description' => esc_html__( 'Enter section number to be active on load or enter "false" to collapse all sections.', 'burst' )
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Allow collapse all sections?', 'burst' ),
                'param_name' => 'collapsible',
                'description' => esc_html__( 'If checked, it is allowed to collapse all sections.', 'burst' ),
                'value' => array( esc_html__( 'Yes', 'burst' ) => 'yes' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'burst' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'burst' )
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Style",
                "param_name" => "style",
                "value" => array(
                    "Accordion"             => "accordion",
                    "Toggle"                => "toggle",
                    "Boxed Accordion"       => "boxed_accordion",
                    "Boxed Toggle"          => "boxed_toggle"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => "Accordion Title Border Radius",
                "param_name" => "accordion_section_border_radius",
                "value" => "",
                "description" => "",
                "dependency" => Array('element' => "style", 'value' => array('boxed_accordion', 'boxed_toggle'))
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => "Accordion Mark Border Radius",
                "param_name" => "accordion_border_radius",
                "value" => "",
                "description" => "",
                "dependency" => Array('element' => "style", 'value' => array('accordion', 'toggle'))
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => "Accordion Title Height",
                "param_name" => "accordion_section_height",
                "value" => "",
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Hide Icon",
                "param_name" => "hide_icon",
                "value" => array(
                    "Yes"   => "yes",
                    "No"    => "no"
                ),
                "save_always" => true,
                "description" => ""
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Title Alignment",
                "param_name" => "title_alignment",
                "value" => array(
					"" => "",
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"
				),
                "description" => "",
                "dependency" => Array('element' => "hide_icon", 'value' => array('yes'))
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Title and Icon Alignment",
                "param_name" => "title_icon_alignment",
                "value" => array(
					"" => "",
					"Icon on Left" => "icon_left",
					"Text on Left" => "text_left",
					"Icon and Text on Left" => "icon_left_text_left"
				),
                "description" => "This option is only used for boxed type.",
                "dependency" => Array('element' => "hide_icon", 'value' => array('no'))
            ),
        ),
    "js_view" => 'VcColumnView'

) );

/*** Accordion Section ***/

class WPBakeryShortCode_No_Accordion_Section  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" =>  esc_html__( 'Mikado Accordion Section', 'burst' ),
    "base" => "no_accordion_section",
    "as_parent" => array('except' => 'vc_row'),
    "as_child" => array('only' => 'no_accordion'),
    'is_container' => true,
    "category" => 'by MIKADO',
    "icon" => "icon-wpb-accordion-section extended-custom-icon",
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array_merge(
        array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'burst' ),
                'param_name' => 'title',
                'admin_label' => true,
                'value' => esc_html__( 'Section', 'burst' ),
                'description' => esc_html__( 'Enter accordion section title.', 'burst' )
            ),
            array(
                'type' => 'el_id',
                'heading' => esc_html__( 'Section ID', 'burst' ),
                'param_name' => 'el_id',
                'description' => sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'burst' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'burst' ) . '</a>' ),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Title Color",
                "param_name" => "title_color",
                "value" => "",
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Title Hover Color",
                "param_name" => "title_hover_color",
                "value" => "",
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Mark Icon Color",
                "param_name" => "mark_icon_color",
                "value" => "",
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Mark Icon Hover Color",
                "param_name" => "mark_icon_color_hover",
                "value" => "",
                "description" => ""
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Title and Mark Background Color",
                "param_name" => "background_color",
                "value" => "",
                "description" => "This option is only used for boxed accordions"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Title and Mark Background Hover Color",
                "param_name" => "background_hover_color",
                "value" => "",
                "description" => "This option is only used for boxed accordions"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Title and Mark Border Color",
                "param_name" => "border_color",
                "value" => "",
                "description" => "This option is only used for boxed accordions"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => "Title and Mark Border Hover Color",
                "param_name" => "border_hover_color",
                "value" => "",
                "description" => "This option is only used for boxed accordions"
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => "Title Tag",
                "param_name" => "title_tag",
                "value" => array(
                    ""   => "",
                    "p"  => "p",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ),
                "description" => ""
            ),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Content Color",
				"param_name" => "content_color",
				"value" => "",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => "Content Background Color",
				"param_name" => "content_bckg_color",
				"value" => "",
				"description" => "This option is only used for boxed accordions"
			)
        )

    )
) );

/*** Tabs ***/

class WPBakeryShortCode_No_Tabs  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" =>  esc_html__( 'Mikado Tabs', 'burst' ),
    "base" => "no_tabs",
    "as_parent" => array('only' => 'no_tab'),
    "content_element" => true,
    "category" => 'by MIKADO',
    "icon" => "icon-wpb-tsbs extended-custom-icon",
    "show_settings_on_create" => true,
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'burst' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'burst' )
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Style",
            "param_name" => "style",
            "value" => array(
                "Horizontal Center" => "horizontal",
                "Horizontal Center With Icons" => "horizontal_with_icons",
                "Horizontal Center With Text And Icons" => "horizontal_with_text_and_icons",
                "Horizontal Left" => "horizontal_left",
                "Horizontal Left With Icons" => "horizontal_left_with_icons",
                "Horizontal Left With Text And Icons" => "horizontal_left_with_text_and_icons",
                "Horizontal Right" => "horizontal_right",
                "Horizontal Right With Icons" => "horizontal_right_with_icons",
                "Horizontal Right With Text And Icons" => "horizontal_right_with_text_and_icons",
                "Vertical Left" => "vertical_left",
                "Vertical Left With Icons" => "vertical_left_with_icons",
                "Vertical Left With Text and Icons" => "vertical_left_with_text_and_icons",
                "Vertical Right" => "vertical_right",
                "Vertical Right With Icons" => "vertical_right_with_icons",
                "Vertical Right With Text and Icons" => "vertical_right_with_text_and_icons",
            ),
            "save_always" => true,
            "description" => ""
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Tab Type",
            "param_name" => "tab_type_default",
            "value" => array(
                "Default" => "default",
                "With Borders" => "with_borders"
            ),
            "save_always" => true,
            "dependency" => Array('element' => "style", 'value' => array('horizontal','horizontal_left','horizontal_right', 'vertical_left', 'vertical_right','horizontal_with_text_and_icons','horizontal_left_with_text_and_icons','horizontal_right_with_text_and_icons','vertical_left_with_text_and_icons','vertical_right_with_text_and_icons'))
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Tab Type",
            "param_name" => "tab_type_icons",
            "value" => array(
                "Default" => "default",
                "With Borders" => "with_borders",
                "With Lines" => "with_lines"
            ),
            "save_always" => true,
            "dependency" => Array('element' => "style", 'value' => array('horizontal_with_icons','horizontal_left_with_icons','horizontal_right_with_icons', 'vertical_left_with_icons', 'vertical_right_with_icons'))
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Border Type",
            "param_name" => "border_type_default",
            "value" => array(
                "Border Arround Tabs" => "border_arround_element",
                "Border Arround Active Tab" => "border_arround_active_tab"
            ),
            "save_always" => true,
            "dependency" => Array('element' => "tab_type_default", 'value' => array('with_borders'))
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Border Type",
            "param_name" => "border_type_icons",
            "value" => array(
                "Border Around Tabs" => "border_arround_element",
                "Border Around Active Tab" => "border_arround_active_tab"
            ),
            "save_always" => true,
            "dependency" => Array('element' => "tab_type_icons", 'value' => array('with_borders'))
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Margin Between Tabs",
            "param_name" => "margin_between_tabs",
            "value" => array(
                "Yes" => "enable_margin",
                "No" => "disable_margin"
            ),
            "save_always" => true,
            "description" => "",
            "dependency" => Array('element' => "tab_type_default", 'value' => array('with_borders'))
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => "Space Between Tab and Content (px)",
            "param_name" => "space_between_tab_and_content",
            "value" => "",
            "description" => "Insert value for space between Tab and Content (default value is 0px)",
            "dependency" => Array('element' => "style", 'value' => array('horizontal_with_icons','horizontal_left_with_icons','horizontal_right_with_icons','horizontal','horizontal_left','horizontal_right','horizontal_with_text_and_icons','horizontal_left_with_text_and_icons','horizontal_right_with_text_and_icons'))
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Border arround Content",
            "param_name" => "show_content_border",
            "value" => array(
                "No" => "no",
                "Yes" => "yes"
            ),
            "save_always" => true
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => "Content Padding",
            "param_name" => "content_padding",
            "value" => "",
            "description" => "Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px"
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => "Border Radius (px)",
            "param_name" => "tab_border_radius",
            "value" => "",
            "description" => ""
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => "Icon Position",
            "param_name" => "tab_icon_position",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "save_always" => true,
            "dependency" => Array('element' => "style", 'value' => array('horizontal_with_text_and_icons','horizontal_left_with_text_and_icons','horizontal_right_with_text_and_icons','vertical_left_with_text_and_icons','vertical_right_with_text_and_icons'))
        )
    ),
    "js_view" => 'VcColumnView'

) );


/*** Tab ***/

class WPBakeryShortCode_No_Tab  extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name" =>  esc_html__( 'Mikado Tab', 'burst' ),
    "base" => "no_tab",
    "as_parent" => array('except' => 'vc_row'),
    "as_child" => array('only' => 'no_tabs'),
    'is_container' => true,
    "category" => 'by MIKADO',
    "icon" => "icon-wpb-tab extended-custom-icon",
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array_merge(
        $mkd_burst_IconCollections->getVCParamsArray(),
        array(
            array(
                "type" => "textfield",
                "class" => "",
                "admin_label" => true,
                "heading" => "Tab Title",
                "param_name" => "title",
                "value" => "",
                "description" => ""
            ),
            array(
                "type" => "textfield",
                "heading" => "Tab ID",
                "param_name" => "tab_id",
                "value" => rand(),
                "description" => "This ID is randomly generated. It can be changed, but each ID has to be unique. Therefore, if you duplicate a tab, please make sure to change the tab ID manually."
            ))

    )
) );


/*** Image Stack ***/

vc_map( array(
		"name" => "Image Stack",
		"base" => "no_image_stack",
		"category" => 'by MIKADO',
		"icon" => "icon-wpb-image-stack extended-custom-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "value" => "408",
			    "heading" => "Set the height parameter (px) for the Image Stack.",
			    "param_name" => "height",
			    "description" => "The default value is 408. This is the initial height value."
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Set the hero image for the image stack.",
				"param_name" => "image_1",
				"description" => "This image is positioned in the center.",
				"dependency" => array('element' => "height", 'not_empty' => true)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Additional Images",
				"param_name" => "additional_images",
				"value" => array(
					"2" => "2",
					"4" => "4"
				),
				"save_always" => true,
				"description" => "Choose how many additional images you'd like to display."
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Set the left inner image.",
				"param_name" => "image_2",
				"dependency" => array('element' => "image_1", 'not_empty' => true)
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Set the right inner image.",
				"param_name" => "image_3",
				"dependency" => array('element' => "image_1", 'not_empty' => true)
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Set the left outer image.",
				"param_name" => "image_4",
				"dependency" => array('element' => "additional_images", 'value' => "4")
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Set the right outer image.",
				"param_name" => "image_5",
				"dependency" => array('element' => "additional_images", 'value' => "4")
			),
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "value" => "0",
			    "heading" => "Border radius",
			    "param_name" => "border_radius",
			    "save_always" => true,
			    "description" => "Set the border radius for top-left and top-right corners for each image, if needed. Enter 15 for 15px for example.",
			    "dependency" => array('element' => "height", 'not_empty' => true)
			),
		)
) );

/*** Interactive Pie Chart ***/

vc_map( array(
		"name" => "Interactive Pie Chart",
		"base" => "no_interactive_pie_chart",
		"category" => 'by MIKADO',
		"icon" => "icon-wpb-interactive-pie-chart extended-custom-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Set percentage",
				"param_name" => "percent",
				"value" => array(
					"5" => "5",
					"10" => "10",
					"15" => "15",
					"20" => "20",
					"25" => "25",
					"30" => "30",
					"35" => "35",
					"40" => "40",
					"45" => "45",
					"50" => "50",
					"55" => "55",
					"60" => "60",
					"65" => "65",
					"70" => "70",
					"75" => "75",
					"80" => "80",
					"85" => "85",
					"90" => "90",
					"95" => "95",
					"100" => "100"
				),
				"save_always" => true,
				"description" => "Choose which percentage out of 100 you'd like to showcase for this pie chart."
			),
			array(
			    "type" => "colorpicker",
			    "holder" => "div",
			    "class" => "",
			    "heading" => "Pie Chart Stroke and Title Hover Color",
			    "param_name" => "path_color",
			    "description" => ""
			),
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "value" => "Craft",
			    "heading" => "Title",
			    "param_name" => "title",
			    "description" => "Enter the desired title."
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Image",
				"param_name" => "image",
				"description" => "Set the desired image."
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Link",
				"param_name" => "link",
				"description" => "Enter the external URL to link to."
			),
			array(
				"type" => "checkbox",
			    "class" => "",
			    "heading" => "Border?",
			    "param_name" => "pie_chart_border",
			    "save_always" => true,
			    "value" => array("Yes" => "yes"),
			    "description" => "Choose whether to have a circled border around the pie-chart."
			),
			array(
			    "type" => "colorpicker",
			    "holder" => "div",
			    "class" => "",
			    "heading" => "Pie Chart Border Color",
			    "param_name" => "pie_chart_border_color",
			    "value" => "#e4e4e4",
			    "dependency" => Array('element' => "pie_chart_border", 'value' => "yes")
			)
		)
) );

/*** Interactive Info Card ***/

vc_map( array(
	"name" => "Interactive Info Card",
		"base" => "no_interactive_info_card",
		"category" => 'by MIKADO',
		"icon" => "icon-wpb-interactive-info-card extended-custom-icon",
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
						$mkd_burst_IconCollections->getVCParamsArray(array(), '', true),
						array(
						    array(
						        "type" => "dropdown",
						        "holder" => "div",
						        "class" => "",
						        "heading" => "Icon Type",
						        "param_name" => "icon_type",
						        "value" => array(
						            "Circle" => "circle",
						            "Square" => "square"
						        ),
						        "save_always" => true,
						        "description" => "",
						        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
						    ),
						    array(
						        "type" => "textfield",
						        "holder" => "div",
						        "class" => "",
						        "heading" => "Icon Size (px)",
						        "param_name" => "icon_custom_size",
						        "value" => "",
						        "description" => "Adust icon size. The default value is 29.",
						        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
						    ),
						    array(
						        "type" => "textfield",
						        "holder" => "div",
						        "class" => "",
						        "heading" => "Custom Shape Size (px)",
						        "param_name" => "icon_shape_size",
						        "value" => "",
						        "description" => "Default value is 100",
						        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
						    ),
						    array(
						        "type" => "colorpicker",
						        "holder" => "div",
						        "class" => "",
						        "heading" => "Icon Color",
						        "param_name" => "icon_color",
						        "description" => "",
						        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
						    ),
						    array(
						        "type" => "colorpicker",
						        "holder" => "div",
						        "class" => "",
						        "heading" => "Icon Background Color",
						        "param_name" => "icon_background_color",
						        "description" => "",
						        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
						    ),
						    array(
						        "type" => "checkbox",
							    "class" => "",
							    "heading" => "Icon Outline?",
							    "param_name" => "icon_outline",
							    "save_always" => true,
							    "value" => array("Yes" => "yes"),
							    "description" => "Set an outline around the icon. It'll animate on element hover.",
						        "dependency" => Array('element' => "icon_pack", 'value' => $mkd_burst_IconCollections->getIconCollectionsKeys())
						    ),
						    array(
						       "type" => "textfield",
						        "holder" => "div",
						        "class" => "",
						        "heading" => "Icon Outline Size",
						        "param_name" => "icon_outline_size",
						        "value" => "111",
						        "description" => "Set an overall outline size in pixels. The default is 111 in terms of width and height in pixels.",
						        "dependency" => Array('element' => "icon_outline", 'value' => "yes")
						    ),
						    array(
						       "type" => "colorpicker",
						        "holder" => "div",
						        "class" => "",
						        "heading" => "Icon Outline Color",
						        "param_name" => "icon_outline_color",
						        "description" => "",
						        "dependency" => Array('element' => "icon_outline", 'value' => "yes")
						    ),
						    array(
						       "type" => "textfield",
						        "holder" => "div",
						        "class" => "",
						        "heading" => "Icon Outline Border Radius",
						        "param_name" => "icon_outline_border_radius",
						        "value" => "50%",
						        "description" => "Set a border radius in percentage or in pixels. For example set 50% for a fully circled outline.",
						        "dependency" => Array('element' => "icon_outline", 'value' => "yes")
						    ),
						),
						array(
							array(
								"type" => "textfield",
								"holder" => "div",
								"class" => "",
								"heading" => "Title",
								"param_name" => "title",
								"save_always" => true,
								"description" => ""
							),
							array(
							    "type" => "colorpicker",
							    "holder" => "div",
							    "class" => "",
							    "heading" => "Title Color",
							    "param_name" => "title_color",
							    "save_always" => true,
							    "description" => "",
							    "dependency" => array('element' => "title", 'not_empty' => true)
							),
							array(
							    "type" => "colorpicker",
							    "holder" => "div",
							    "class" => "",
							    "heading" => "Title Hover Color",
							    "param_name" => "title_hover_color",
							    "save_always" => true,
							    "description" => "",
							    "dependency" => array('element' => "title_color", 'not_empty' => true)
							),
							array(
							    "type" => "checkbox",
							    "class" => "",
							    "heading" => "Insert separator?",
							    "param_name" => "separator",
							    "save_always" => true,
							    "value" => array("Yes" => "yes"),
							    "description" => "Choose whether to insert separator between title and text sections."
							),
							array(
							    "type" => "textfield",
							    "class" => "",
							    "heading" => "Separator width(px)",
							    "param_name" => "separator_width",
							    "save_always" => true,
							    "value" => "58",
							    "description" => "Set the separator width in pixels. Enter only the absolute value.",
							    "dependency" => array('element' => "separator", 'value' => "yes")
							),
							array(
							    "type" => "textfield",
							    "class" => "",
							    "heading" => "Separator top margin(px)",
							    "param_name" => "separator_top_margin",
							    "save_always" => true,
							    "value" => "23",
							    "description" => "Set the separator top margin in pixels. Enter only the absolute value.",
							    "dependency" => array('element' => "separator", 'value' => "yes")
							),
							array(
							    "type" => "textfield",
							    "class" => "",
							    "heading" => "Separator bottom margin(px)",
							    "param_name" => "separator_bottom_margin",
							    "save_always" => true,
							    "value" => "23",
							    "description" => "Set the separator bottom margin in pixels. Enter only the absolute value.",
							    "dependency" => array('element' => "separator", 'value' => "yes")
							),
							array(
							    "type" => "colorpicker",
							    "holder" => "div",
							    "class" => "",
							    "heading" => "Separator Color",
							    "param_name" => "separator_color",
							    "save_always" => true,
							    "description" => "",
							    "dependency" => array('element' => "separator", 'value' => "yes")
							),
							array(
								"type" => "colorpicker",
								"holder" => "div",
								"class" => "",
								"heading" => "Separator Hover Color",
								"param_name" => "separator_hover_color",
								"save_always" => true,
								"value" => "",
								"dependency" => array('element' => "separator_color", 'not_empty' => true)
							),
							array(
								"type" => "textfield",
								"holder" => "div",
								"class" => "",
								"heading" => "Text",
								"param_name" => "text",
								"save_always" => true,
								"description" => ""
							),	
							array(
							    "type" => "colorpicker",
							    "holder" => "div",
							    "class" => "",
							    "heading" => "Text Color",
							    "param_name" => "text_color",
							    "save_always" => true,
							    "description" => "",
							    "dependency" => array('element' => "text", 'not_empty' => true)
							),
							array(
								"type" => "textfield",
								"holder" => "div",
								"class" => "",
								"heading" => "Link",
								"param_name" => "link",
								"save_always" => true,
								"description" => "Enter a URL to link from Interactive Info Card using a button."
							),
							array(
								"type" => "textfield",
								"holder" => "div",
								"class" => "",
								"heading" => "Button Text",
								"param_name" => "button_text",
								"save_always" => true,
								"value" => "Explore now",
					 			"description" => "Enter a text to appear inside the button.",
								"dependency" => array('element' => "link", 'not_empty' => true)
							),
							array(
								"type" => "colorpicker",
								"holder" => "div",
								"class" => "",
								"heading" => "Button Background Color",
								"param_name" => "button_background_color",
								"save_always" => true,
								"value" => "#18cfab",
								"description" => "Set the button background color.",
								"dependency" => array('element' => "link", 'not_empty' => true)
							),
							array(
								"type" => "colorpicker",
								"holder" => "div",
								"class" => "",
								"heading" => "Button Text Color",
								"param_name" => "button_text_color",
								"save_always" => true,
								"value" => "",
								"description" => "Set the button text color.",
								"dependency" => array('element' => "link", 'not_empty' => true)
							),
							array(
								"type" => "colorpicker",
								"holder" => "div",
								"class" => "",
								"heading" => "Background Color",
								"param_name" => "background_color",
								"save_always" => true,
								"value" => "",
								"description" => "Set the overall Info Card background color."
							),
							array(
								"type" => "colorpicker",
								"holder" => "div",
								"class" => "",
								"heading" => "Background Hover Color",
								"param_name" => "background_hover_color",
								"save_always" => true,
								"value" => "",
								"description" => "Set the Info Card background hover color."
							),
							array(
								"type" => "textfield",
								"holder" => "div",
								"class" => "",
								"heading" => "Padding",
								"param_name" => "padding",
								"save_always" => true,
								"value" => "15%",
								"description" => "Set the overall inner padding. Initially set to 15%. For example enter 10% 20% for 10% padding for top and bottom and 20% padding for left and right."
							),
							array(
							    "type" => "checkbox",
							    "class" => "",
							    "heading" => "Remove column gap?",
							    "param_name" => "stretch",
							    "save_always" => true,
							    "value" => array("Yes" => "yes"),
							    "description" => "If multiple Interactive Info Cards are used next to each other, set this option to have them aligned with no gap in between.",
							),
	                        array(
							    "type" => "checkbox",
							    "class" => "",
							    "heading" => "Remove right border?",
							    "param_name" => "right_border",
							    "save_always" => true,
							    "value" => array("Yes" => "yes"),
							    "description" => "Mark 'YES' if you want to remove the thin white right border between Interactive Info Cards."
						    )
						)
					)	
) );


vc_map( array(
	"name" => "Vertical Separator",
	"base" => "no_vertical_separator",
	"category" => 'by MIKADO',
	"icon" => "icon-wpb-vertical-separator extended-custom-icon",
	"allowed_container_element" => 'vc_row',
	"params" => array(
		array(
			"type" => "colorpicker",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator Color",
			"param_name" => "sep_color",
			"save_always" => true,
			"value" => "#616a6e",
			"description" => "Set the separator color. The default value is 616a6e."
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Separator height",
			"param_name" => "sep_height",
			"save_always" => true,
			"value" => "14px",
			"description" => "Set the separator height. The default value is 14px."
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Left margin",
			"param_name" => "sep_margin_left",
			"save_always" => true,
			"value" => "20px",
			"description" => "Set the left margin. The default value is 20px."
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Right margin",
			"param_name" => "sep_margin_right",
			"save_always" => true,
			"value" => "12px",
			"description" => "Set the right margin. The default value is 12px."
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Bottom Offset",
			"param_name" => "sep_bottom_offset",
			"save_always" => true,
			"value" => "",
			"description" => "Set the bottom offset for better centering, if needed."
		)
	)
) );


/*** Scrolling Rails ***/

class WPBakeryShortCode_No_Scrolling_Rails extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Scrolling Rails",
	"base" => "no_scrolling_rails",
	"category" => 'by MIKADO',
	"as_parent" => array('only' => 'no_scrolling_rails_image_holder,no_scrolling_rails_content'),
	"content_element" => true,
	"icon" => "icon-wpb-scrolling_rails extended-custom-icon",
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Background Image",
			"param_name" => "bgnd",
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"value" => array(
				"No"	=>	"no",
				"Yes"	=>	"yes",
			),
			'save_always' => true,
			"heading" => "Fade Background?",
			"param_name" => "fade_bgnd",
			"description" => "If \"Yes\", background will fade out when images start moving.",
			"dependency" => array('element' => 'bgnd', 'not_empty' => true),
		),
	)
) );

class WPBakeryShortCode_No_Scrolling_Rails_Image_Holder extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Scrolling Rails Image Holder",
	"base" => "no_scrolling_rails_image_holder",
	"category" => 'by MIKADO',
	"as_parent" => array('only' => 'no_scrolling_rails_image'),
	"as_child" => array('only' => 'no_scrolling_rails'),
	"content_element" => true,
	"icon" => "icon-wpb-scrolling-rails-image-holder extended-custom-icon",
	"description" => "Use only one of these.",
	"js_view" => 'VcColumnView',
	"show_settings_on_create" => false,
	"params" => array(
	)
) );

class WPBakeryShortCode_No_Scrolling_Rails_Image extends WPBakeryShortCode {}
vc_map( array(
	"name" => "Scrolling Rails Image",
	"base" => "no_scrolling_rails_image",
	"category" => 'by MIKADO',
	"as_child" => array('only' => 'no_scrolling_rails_image_holder'),
	"icon" => "icon-wpb-scrolling-rails-image extended-custom-icon",
	"params" => array(
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Image",
			"param_name" => "image",
		),
		array(
			"type" => "checkbox",
		    "class" => "",
		    "heading" => "Phone Frame",
		    "param_name" => "show_phone_frame",
		    "value" => array("Show phone frame" => "show_phone_frame"),
		    "description" => "If checked, top and lower frame will be added to the picture, simulating phone case.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Position - Top (%)",
			"param_name" => "top",
			"description" => "Distance of the container's center from the top edge of the holder, e.g. 50 to be vertically centered.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Position - Left (%)",
			"param_name" => "left",
			"description" => "Distance of the container's center from the left edge of the holder, e.g. 50 to be horizontally centered.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Width (%)",
			"param_name" => "width",
			"description" => "How much of the holder's width the container should take. The default is 20%.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"value" => array(
				"Left"	=>	"left",
				"Right"	=>	"right",
			),
			'save_always' => true,
			"heading" => "Leaving Direction",
			"param_name" => "leaving",
			"description" => "The direction in which the image leaves the screen while scrolling.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
	)
) );


class WPBakeryShortCode_No_Scrolling_Rails_Content extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Scrolling Rails Content",
	"base" => "no_scrolling_rails_content",
    "icon" => "icon-wpb-scrolling-rails-content extended-custom-icon",
	"category" => 'by MIKADO',
	"as_parent" => array('except' => 'no_scrolling_rails_image,no_scrolling_rails,no_scrolling_rails_image_holder,no_scrolling_rails_content'),
	"as_child" => array('only' => 'no_scrolling_rails'),
	"content_element" => true,
	"icon" => "icon-wpb-scrolling-rails-content extended-custom-icon",
	"description" => "Use only one of these.",
	"js_view" => 'VcColumnView',
	"show_settings_on_create" => false,
	"params" => array(
	)
) );


/*** Image Fusion ***/

class WPBakeryShortCode_No_Image_Fusion extends WPBakeryShortCodesContainer {}
vc_map( array(
	"name" => "Image Fusion",
	"base" => "no_image_fusion",
	"category" => 'by MIKADO',
	"as_parent" => array('only' => 'no_image_fusion_side_image'),
	"content_element" => true,
	"icon" => "icon-wpb-image-fusion extended-custom-icon",
	"description" => "Multiple images fusing into one.",
	"js_view" => 'VcColumnView',
	"params" => array(
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "The Main Image",
			"param_name" => "image",
			"description" => "Image will be centered and other images will fuse into it."
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Side Margin (px)",
			"param_name" => "margin_side",
			"description" => "If other images stretch outside of this image, this margin should contain them. Enter the value in px for the original size.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Top Margin for Original Size (px)",
			"param_name" => "margin_top",
			"description" => "If other images stretch above this image, this margin should contain them. Enter the value in px for the original size.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Bottom Margin (px)",
			"param_name" => "margin_bottom",
			"description" => "If other images stretch below this image, this margin should contain them. Enter the value in px for the original size.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
	)
) );

class WPBakeryShortCode_No_Image_Fusion_Side_Image extends WPBakeryShortCode {}
vc_map( array(
	"name" => "Image Fusion - Side Image",
	"base" => "no_image_fusion_side_image",
	"category" => 'by MIKADO',
	"as_child" => array('only' => 'no_image_fusion'),
	"icon" => "icon-wpb-image-fusion-side-image extended-custom-icon",
	"params" => array(
		array(
			"type" => "attach_image",
			"holder" => "div",
			"class" => "",
			"heading" => "Image",
			"param_name" => "image",
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Position - Top (px)",
			"param_name" => "top",
			"description" => "Relative to the top edge of the main image when all images are in their original size.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => "Position - Left (px)",
			"param_name" => "left",
			"description" => "Relative to the left edge of the main image when all images are in their original size.",
			"dependency" => array('element' => 'image', 'not_empty' => true),
		),
	)
) );

?>