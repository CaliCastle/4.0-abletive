<?php

global $mkd_burst_IconCollections;

$mkd_blog_categories = array();
$categories = get_categories(); 
foreach($categories as $category) {
	$mkd_blog_categories[$category->term_id] = $category->name;
}

//Slide Type

$mkdSlideType = new MikadoBurstMetaBox("slides", "Slide Background Type");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_type",$mkdSlideType);

	$mkd_slide_background_type = new MikadoBurstMetaField("imagevideo","mkd_slide-background-type","image","Slide Background Type","Do you want to upload an image or video?", array(), array("dependence" => true, "dependence_hide_on_yes" => "#mkdf-meta-box-slides_video_settings", "dependence_show_on_yes" => "#mkdf-meta-box-slides_image_settings"));
	$mkdSlideType->addChild("mkd_slide-background-type",$mkd_slide_background_type);

//Slide Image

$mkdSlideImageSettings = new MikadoBurstMetaBox("slides", "Slide Background Image","mkd_slide-background-type",array("video"));
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_image_settings",$mkdSlideImageSettings);

	$mkd_slide_image = new MikadoBurstMetaField("image","mkd_slide-image","","Slide Image","Choose background image");
	$mkdSlideImageSettings->addChild("mkd_title-image",$mkd_slide_image);
	
	$mkd_slide_overlay_image = new MikadoBurstMetaField("image","mkd_slide-overlay-image","","Overlay Image","Choose overlay image (pattern) for background image");
	$mkdSlideImageSettings->addChild("mkd_slide-overlay-image",$mkd_slide_overlay_image);

//Slide Video

$mkdSlideVideoSettings = new MikadoBurstMetaBox("slides", "Slide Background Video","mkd_slide-background-type",array("image"));
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_video_settings",$mkdSlideVideoSettings);

	$mkd_slide_video_webm = new MikadoBurstMetaField("text","mkd_slide-video-webm","","Video - webm","Path to the webm file that you have previously uploaded in Media Section");
	$mkdSlideVideoSettings->addChild("mkd_slide-video-webm",$mkd_slide_video_webm);
	
	$mkd_slide_video_mp4 = new MikadoBurstMetaField("text","mkd_slide-video-mp4","","Video - mp4","Path to the mp4 file that you have previously uploaded in Media Section");
	$mkdSlideVideoSettings->addChild("mkd_slide-video-mp4",$mkd_slide_video_mp4);
	
	$mkd_slide_video_ogv = new MikadoBurstMetaField("text","mkd_slide-video-ogv","","Video - ogv","Path to the ogv file that you have previously uploaded in Media Section");
	$mkdSlideVideoSettings->addChild("mkd_slide-video-ogv",$mkd_slide_video_ogv);

	$mkd_slide_video_image = new MikadoBurstMetaField("image","mkd_slide-video-image","","Video Preview Image","Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.");
	$mkdSlideVideoSettings->addChild("mkd_slide-video-image",$mkd_slide_video_image);
	
	$mkd_slide_video_overlay = new MikadoBurstMetaField("yesempty","mkd_slide-video-overlay","","Video Overlay Image","Do you want to have a overlay image on video? ", array(),
			array("dependence" => true,
			"dependence_hide_on_yes" => "",
			"dependence_show_on_yes" => "#mkdf_mkd_slide-video-overlay_container"));
	$mkdSlideVideoSettings->addChild("mkd_slide-video-overlay",$mkd_slide_video_overlay);
	
	$mkd_slide_video_overlay_container = new MikadoBurstContainer("mkd_slide-video-overlay_container","mkd_slide-video-overlay","");
	$mkdSlideVideoSettings->addChild("mkd_slide_video_overlay_container",$mkd_slide_video_overlay_container);
	
		$mkd_slide_video_overlay_image = new MikadoBurstMetaField("image","mkd_slide-video-overlay-image","","Overlay Image","Choose overlay image (pattern) for background video");
		$mkd_slide_video_overlay_container->addChild("mkd_slide-video-overlay-image",$mkd_slide_video_overlay_image);

//Slide General

$mkdSlideGeneral = new MikadoBurstMetaBox("slides", "Slide General");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_layout",$mkdSlideGeneral);

    $section_title_1 = new MikadoBurstTitle('section_title_1', 'Slide Text Content');
    $mkdSlideGeneral->addChild('section_title_1', $section_title_1);

    $mkd_slide_hide_title = new MikadoBurstMetaField("yesempty","mkd_slide-hide-title","","Hide Slide Title","Do you want to hide slide title?", array(), array("dependence" => true, "dependence_hide_on_yes" => "#mkdf-meta-box-slides_title, #mkdf_mkd_slide_hide_title_container, #mkdf_mkd_slide_scroll_title_container", "dependence_show_on_yes" => ""));
    $mkdSlideGeneral->addChild("mkd_slide-hide-title",$mkd_slide_hide_title);

    $mkd_slide_hide_title_container = new MikadoBurstContainer('mkd_slide_hide_title_container', 'mkd_slide-hide-title', 'yes');
    $mkdSlideGeneral->addChild('mkd_slide_hide_title_container', $mkd_slide_hide_title_container);

    $title_link_group = new MikadoBurstGroup("Title Link","Define styles for title");
    $mkd_slide_hide_title_container->addChild("title_link_group",$title_link_group);
        $row1 = new MikadoBurstRow();
        $title_link_group->addChild("row1",$row1);

        $title_link = new MikadoBurstMetaField("textsimple","mkd_slide-title-link","","Link","This is some description");
        $row1->addChild("mkd_slide-title-link",$title_link);
        $title_target = new MikadoBurstMetaField("selectsimple","mkd_slide-title-target","_self","Target","This is some description", array(
            "_self" => "Self",
            "_blank" => "Blank"
        ));
        $row1->addChild("mkd_slide-title-target",$title_target);

    $mkd_slide_subtitle = new MikadoBurstMetaField("text","mkd_slide-subtitle","","Subtitle Text","Enter text for subtitle");
    $mkdSlideGeneral->addChild("mkd_slide-subtitle",$mkd_slide_subtitle);

    $mkd_slide_text = new MikadoBurstMetaField("text","mkd_slide-text","","Body Text","Enter slide body text");
    $mkdSlideGeneral->addChild("mkd_slide-text",$mkd_slide_text);

    $button1_label = new MikadoBurstMetaField("text","mkd_slide-button-label","","Button 1 Text"," Enter text to be displayed on button 1");
    $mkdSlideGeneral->addChild("mkd_slide-button-label",$button1_label);

$button1_group1 = new MikadoBurstGroup("Button 1 Link", "");
$mkdSlideGeneral->addChild("button1_group1",$button1_group1);

$row1 = new MikadoBurstRow();
$button1_group1->addChild("row1",$row1);

$button1_link = new MikadoBurstMetaField("textsimple","mkd_slide-button-link","","Link","This is some description");
$row1->addChild("mkd_slide-button-link",$button1_link);
$button1_target = new MikadoBurstMetaField("selectsimple","mkd_slide-button-target","_self","Target","This is some description", array(
    "_self" => "Self",
    "_blank" => "Blank"
));
$row1->addChild("mkd_slide-button-target",$button1_target);

    $button2_label = new MikadoBurstMetaField("text","mkd_slide-button-label2","","Button 2 Text"," Enter text to be displayed on button 2");
    $mkdSlideGeneral->addChild("mkd_slide-button-label2",$button2_label);

$button2_group1 = new MikadoBurstGroup("Button 2 Link","");
$mkdSlideGeneral->addChild("button2_group1",$button2_group1);
$row1 = new MikadoBurstRow();
$button2_group1->addChild("row1",$row1);

$button2_link = new MikadoBurstMetaField("textsimple","mkd_slide-button-link2","","Link","This is some description");
$row1->addChild("mkd_slide-button-link2",$button2_link);
$button2_target = new MikadoBurstMetaField("selectsimple","mkd_slide-button-target2","_self","Target","This is some description", array(
    "_self" => "Self",
    "_blank" => "Blank"
));
$row1->addChild("mkd_slide-button-target",$button2_target);

$mkd_slide_text_content_top_margin = new MikadoBurstMetaField("text","mkd_slide_text_content_top_margin","","Text Content Top Margin","Enter top margin for text content", array(), array("col_width" => 3));
$mkdSlideGeneral->addChild("mkd_slide_text_content_top_margin",$mkd_slide_text_content_top_margin);

$mkd_slide_text_content_bottom_margin = new MikadoBurstMetaField("text","mkd_slide_text_content_bottom_margin","","Text Content Bottom Margin","Enter bottom margin for text content", array(), array("col_width" => 3));
$mkdSlideGeneral->addChild("mkd_slide_text_content_bottom_margin",$mkd_slide_text_content_bottom_margin);


    $section_title_2 = new MikadoBurstTitle('section_title_2', 'Slide Graphics');
    $mkdSlideGeneral->addChild('section_title_2', $section_title_2);

    $mkd_slide_graphic = new MikadoBurstMetaField("image","mkd_slide-thumbnail","","Slide Graphic","Choose slide graphic");
    $mkdSlideGeneral->addChild("mkd_slide-thumbnail",$mkd_slide_graphic);

    $mkd_slide_graphic_link = new MikadoBurstMetaField("text","mkd_slide-thumbnail-link","","Graphic Link","Enter URL to link slide graphic");
    $mkdSlideGeneral->addChild("mkd_slide-thumbnail-link",$mkd_slide_graphic_link);
	
	$mkd_slide_graphic_top_padding = new MikadoBurstMetaField("text","mkd_slide_graphic_top_padding","","Graphic Top Padding","Enter top padding for slide graphic", array(), array("col_width" => 3));
	$mkdSlideGeneral->addChild("mkd_slide_graphic_top_padding",$mkd_slide_graphic_top_padding);

	$mkd_slide_graphic_bottom_padding = new MikadoBurstMetaField("text","mkd_slide_graphic_bottom_padding","","Graphic Bottom Padding","Enter bottom padding for slide graphic", array(), array("col_width" => 3));
	$mkdSlideGeneral->addChild("mkd_slide_graphic_bottom_padding",$mkd_slide_graphic_bottom_padding);
	
	
    $section_title_3 = new MikadoBurstTitle('section_title_3', 'General Styling');
    $mkdSlideGeneral->addChild('section_title_3', $section_title_3);
	
	$mkd_slide_header_style = new MikadoBurstMetaField("selectblank","mkd_slide-header-style","","Header Style","Header style will be applied when this slide is in focus", array(
	    "light" => "Light",
	    "dark" => "Dark"
	));
	$mkdSlideGeneral->addChild("mkd_slide-header-style",$mkd_slide_header_style);

    $mkd_slide_content_background = new MikadoBurstMetaField("color","mkd_slide-content-background-color","","Slide Content Background Color","Choose background color for slide content");
    $mkdSlideGeneral->addChild("mkd_slide-content-background-color",$mkd_slide_content_background);
	
	$mkd_slide_graphic_background = new MikadoBurstMetaField("color","mkd_slide_graphic_background","","Slide Graphic Background Color","Choose background color for slide graphic");
    $mkdSlideGeneral->addChild("mkd_slide_graphic_background",$mkd_slide_graphic_background);
	
	$mkd_slide_content_graphic_background = new MikadoBurstMetaField("color","mkd_slide_content_graphic_background","","Background Color Around Slide Content and Graphic","Choose background color for box around slide content and graphic");
    $mkdSlideGeneral->addChild("mkd_slide_content_graphic_background",$mkd_slide_content_graphic_background);
	
	$mkd_slide_text_content_box_shaddow = new MikadoBurstMetaField("text","mkd_slide_text_content_box_shaddow","","Box Shadow Around Text Content","Enter box shadow for text content box (in format: 2px 2px 2px 2px #000)", array(), array("col_width" => 3));
    $mkdSlideGeneral->addChild("mkd_slide_text_content_box_shaddow",$mkd_slide_text_content_box_shaddow);
	
	$mkd_slide_content_graphic_box_shaddow = new MikadoBurstMetaField("text","mkd_slide_content_graphic_box_shaddow","","Box Shadow Around Text Content and Graphic","Enter shadow for box around text and graphic (in format: 2px 2px 2px 2px #000)", array(), array("col_width" => 3));
    $mkdSlideGeneral->addChild("mkd_slide_content_graphic_box_shaddow",$mkd_slide_content_graphic_box_shaddow);
	
	
/*
	$mkd_slide_navigation_color = new MikadoBurstMetaField("color","mkd_slide-navigation-color","","Navigation Color","Navigation color will be applied when this slide is in focus");
	$mkdSlideGeneral->addChild("mkd_slide-navigation-color",$mkd_slide_navigation_color);
*/

    $mkd_slide_hide_shadow = new MikadoBurstMetaField("yesempty","mkd_slide-hide-shadow","","Show Slide Text Shadow","Do you want to show text shadow?");
    $mkdSlideGeneral->addChild("mkd_slide-hide-shadow",$mkd_slide_hide_shadow);


$mkdSlideBehaviour = new MikadoBurstMetaBox("slides", "Slide Behaviours");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_behaviour", $mkdSlideBehaviour);

    $mkd_slide_scroll_to_section = new MikadoBurstMetaField("text","mkd_slide-anchor-button","","Scroll to Section","An arrow will appear to take viewers to the next section of the page. Enter the section anchor here, for example, '#contact'");
    $mkdSlideBehaviour->addChild("mkd_slide-anchor-button",$mkd_slide_scroll_to_section);

    $mkd_slide_scroll_to_section_position = new MikadoBurstMetaField("select","mkd_slide-anchor-button_position","in_content","Scroll to Section Icon Position","Choose position for anchor icon - scroll to section", array(
        "in_content" => "In Text Content",
        "bottom_of_slider" => "Bottom of the slide"
    ));
    $mkdSlideBehaviour->addChild("mkd_slide-anchor-button_position",$mkd_slide_scroll_to_section_position);
	
	$section_title_2 = new MikadoBurstTitle('section_title_2', 'Slide Image Animation');
    $mkdSlideBehaviour->addChild('section_title_2', $section_title_2);
	
	$mkd_enable_image_animation = new MikadoBurstMetaField("yesno", "mkd_enable_image_animation", "no", "Enable Image Animation", "Enabling this option will turn on a motion animation on the slide image", array(), array(
        "dependence" => "true",
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_enable_image_animation_container"
    ));
	$mkdSlideBehaviour->addChild('mkd_enable_image_animation', $mkd_enable_image_animation);
	
	$mkd_enable_image_animation_container = new MikadoBurstContainer("mkd_enable_image_animation_container", "mkd_enable_image_animation", "no");
	$mkdSlideBehaviour->addChild("mkd_enable_image_animation_container", $mkd_enable_image_animation_container);
	
	$mkd_enable_image_animation_type = new MikadoBurstMetaField("select","mkd_enable_image_animation_type","zoom_center","Animation Type","", array(
        "zoom_center" => "Zoom In Center",
        "zoom_top_left" => "Zoom In to Top Left",
        "zoom_top_right" => "Zoom In to Top Right",
        "zoom_bottom_left" => "Zoom In to Bottom Left",
        "zoom_bottom_right" => "Zoom In to Bottom Right"
    ));
    $mkd_enable_image_animation_container->addChild("mkd_enable_image_animation_type",$mkd_enable_image_animation_type);
	
	$section_title_3 = new MikadoBurstTitle('section_title_3', 'Slide Content Entry Animations');
    $mkdSlideBehaviour->addChild('section_title_3', $section_title_3);
	
    $mkd_slide_thumbnail_animation = new MikadoBurstMetaField("select","mkd_slide-thumbnail-animation","flip","Graphic Entry Animation","Choose entry animation for graphic", array(
        "flip" => "Flip",
        "fade" => "Fade In",
        "from_bottom" => "From Bottom",
        "from_top" => "From Top",
        "from_left" => "From Left",
        "from_right" => "From Right",
        "clip_anim_hor" => "Clip Animation Horizontal",
        "clip_anim_ver" => "Clip Animation Vertical",
        "clip_anim_puzzle" => "Clip Animation Puzzle",
        "without_animation"	=>	"No Animation"
    ));
    $mkdSlideBehaviour->addChild("mkd_slide-thumbnail-animation",$mkd_slide_thumbnail_animation);

    $mkd_slide_content_animation = new MikadoBurstMetaField("select","mkd_slide-content-animation","all_at_once","Content Entry Animation","Choose entry animation for whole slide content group (title, subtitle, text, button)", array(
        "all_at_once" => "All At Once",
        "one_by_one" => "One By One",
        "without_animation"	=>	"No Animation"
    ),
        array("dependence" => true,
            "hide" => array(
                "all_at_once"=>"",
                "one_by_one"=>"",
                "without_animation"=>"#mkdf_mkd_slide_content_animation_container"),
            "show" => array(
                "all_at_once"=>"#mkdf_mkd_slide_content_animation_container",
                "one_by_one"=>"#mkdf_mkd_slide_content_animation_container",
                "without_animation"=>""
            )
        ));
    $mkdSlideBehaviour->addChild("mkd_slide-content-animation",$mkd_slide_content_animation);

    $mkd_slide_content_animation_container = new MikadoBurstContainer("mkd_slide_content_animation_container","mkd_slide-content-animation","without_animation");
    $mkdSlideBehaviour->addChild("mkd_slide_content_animation_container",$mkd_slide_content_animation_container);

    $mkd_slide_content_animation_direction = new MikadoBurstMetaField("select","mkd_slide-content-animation-direction","from_bottom","Animation Direction","", array(
        "from_bottom" => "From Bottom",
        "from_top" => "From Top",
        "from_left" => "From Left",
        "from_right" => "From Right",
        "fade" => "Fade In"

    ));
    $mkd_slide_content_animation_container->addChild("mkd_slide-content-animation-direction",$mkd_slide_content_animation_direction);

    $section_title_4 = new MikadoBurstTitle('section_title_4', 'Slide Content Animations Controlled by Scrolling');
    $mkdSlideBehaviour->addChild('section_title_4', $section_title_4);

    $mkd_slide_general_animation = new MikadoBurstMetaField("yesno", "mkd_slide_general_animation", "no", "Animate Whole Slide Content Group at Once on Scroll", "All parts of slide content will animate on scroll as group", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_general_animation_container"
    ));
    $mkdSlideBehaviour->addChild('mkd_slide_general_animation', $mkd_slide_general_animation);

        $mkd_slide_general_animation_container = new MikadoBurstContainer('mkd_slide_general_animation_container', 'mkd_slide_general_animation', 'no');
        $mkdSlideBehaviour->addChild('mkd_slide_general_animation_container', $mkd_slide_general_animation_container);

            $mkd_slide_content_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are starting properties for the scrolling animation of the slide content group");
            $mkd_slide_general_animation_container->addChild("mkd_slide_content_animation_data_start", $mkd_slide_content_animation_data_start);

            $row1 = new MikadoBurstRow();
            $mkd_slide_content_animation_data_start->addChild("row1", $row1);

                $mkd_slide_data_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_start", "","Scrollbar Top Distance (px)", "", array(), array("col_width" => 1));
                $row1->addChild("mkd_slide_data_start", $mkd_slide_data_start);

                $mkd_slide_data_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_start_custom_style", "", "Enter CSS declarations separated by semicolons", "", array(), array("col_width" => 4));
                $row1->addChild("mkd_slide_data_start_custom_style", $mkd_slide_data_start_custom_style);

            $mkd_slide_content_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are ending properties for the scrolling animation of the slide content group");
            $mkd_slide_general_animation_container->addChild("mkd_slide_content_animation_data_end", $mkd_slide_content_animation_data_end);

            $row2 = new MikadoBurstRow();
            $mkd_slide_content_animation_data_end->addChild('row2', $row2);

                $mkd_slide_data_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_end", "", "Scrollbar Top Distance (px)", "");
                $row2->addChild("mkd_slide_data_end", $mkd_slide_data_end);

                $mkd_slide_data_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                $row2->addChild("mkd_slide_data_end_custom_style", $mkd_slide_data_end_custom_style);

    //Title scroll animation
    $mkd_slide_scroll_title_container = new MikadoBurstContainerNoStyle('mkd_slide_scroll_title_container', 'mkd_slide-hide-title', 'yes');
    $mkdSlideBehaviour->addChild('mkd_slide_scroll_title_container', $mkd_slide_scroll_title_container);

    $mkd_slide_title_animation_scroll = new MikadoBurstMetaField("yesno", "mkd_slide_title_animation_scroll", "no", "Animate Title on Scroll", "Enable title text to animate separately", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_title_animation_scroll_container"
    ));
    $mkd_slide_scroll_title_container->addChild('mkd_slide_title_animation_scroll', $mkd_slide_title_animation_scroll);

        $mkd_slide_title_animation_scroll_container = new MikadoBurstContainer('mkd_slide_title_animation_scroll_container', 'mkd_slide_title_animation_scroll', 'no');
        $mkd_slide_scroll_title_container->addChild('mkd_slide_title_animation_scroll_container', $mkd_slide_title_animation_scroll_container);

            $mkd_slide_title_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
            $mkd_slide_title_animation_scroll_container->addChild("mkd_slide_title_animation_data_start", $mkd_slide_title_animation_data_start);

                $row1 = new MikadoBurstRow();
                $mkd_slide_title_animation_data_start->addChild("row1", $row1);

                    $mkd_slide_data_title_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_title_start", "", "Scrollbar Top Distance (px)", "");
                    $row1->addChild("mkd_slide_data_title_start", $mkd_slide_data_title_start);

                    $mkd_slide_data_title_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_title_start_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                    $row1->addChild("mkd_slide_data_title_start_custom_style", $mkd_slide_data_title_start_custom_style);

            $mkd_slide_title_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
            $mkd_slide_title_animation_scroll_container->addChild("mkd_slide_title_animation_data_end", $mkd_slide_title_animation_data_end);

                $row2 = new MikadoBurstRow();
                $mkd_slide_title_animation_data_end->addChild("row2", $row2);

                    $mkd_slide_data_title_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_title_end", "", "Scrollbar Top Distance (px)", "");
                    $row2->addChild("mkd_slide_data_title_end", $mkd_slide_data_title_end);

                    $mkd_slide_data_title_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_title_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                    $row2->addChild("mkd_slide_data_title_end_custom_style", $mkd_slide_data_title_end_custom_style);


    //Subtitle scroll animation
    $mkd_slide_subtitle_animation_scroll = new MikadoBurstMetaField("yesno", "mkd_slide_subtitle_animation_scroll", "no", "Animate Subtitle on Scroll", "Enable subtitle text to animate separately", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_subtitle_animation_scroll_container"
    ));
    $mkdSlideBehaviour->addChild('mkd_slide_subtitle_animation_scroll', $mkd_slide_subtitle_animation_scroll);

    $mkd_slide_subtitle_animation_scroll_container = new MikadoBurstContainer('mkd_slide_subtitle_animation_scroll_container', 'mkd_slide_subtitle_animation_scroll', 'no');
    $mkdSlideBehaviour->addChild('mkd_slide_subtitle_animation_scroll_container', $mkd_slide_subtitle_animation_scroll_container);

        $mkd_slide_subtitle_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
        $mkd_slide_subtitle_animation_scroll_container->addChild("mkd_slide_subtitle_animation_data_start", $mkd_slide_subtitle_animation_data_start);

            $row1 = new MikadoBurstRow();
            $mkd_slide_subtitle_animation_data_start->addChild("row1", $row1);

                $mkd_slide_data_subtitle_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_subtitle_start", "", "Scrollbar Top Distance (px)", "");
                $row1->addChild("mkd_slide_data_subtitle_start", $mkd_slide_data_subtitle_start);

                $mkd_slide_data_subtitle_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_subtitle_start_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                $row1->addChild("mkd_slide_data_subtitle_start_custom_style", $mkd_slide_data_subtitle_start_custom_style);

        $mkd_slide_subtitle_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
        $mkd_slide_subtitle_animation_scroll_container->addChild("mkd_slide_subtitle_animation_data_end", $mkd_slide_subtitle_animation_data_end);

            $row2 = new MikadoBurstRow();
            $mkd_slide_subtitle_animation_data_end->addChild("row2", $row2);

                $mkd_slide_data_subtitle_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_subtitle_end", "", "Scrollbar Top Distance (px)", "");
                $row2->addChild("mkd_slide_data_subtitle_end", $mkd_slide_data_subtitle_end);

                $mkd_slide_data_subtitle_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_subtitle_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                $row2->addChild("mkd_slide_data_subtitle_end_custom_style", $mkd_slide_data_subtitle_end_custom_style);


    //Graphics scroll animation
    $mkd_slide_graphic_animation_scroll = new MikadoBurstMetaField("yesno", "mkd_slide_graphic_animation_scroll", "no", "Animate Graphic on Scroll", "Enable graphic to animate separately", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_graphic_animation_scroll_container"
    ));
    $mkdSlideBehaviour->addChild('mkd_slide_graphic_animation_scroll', $mkd_slide_graphic_animation_scroll);

    $mkd_slide_graphic_animation_scroll_container = new MikadoBurstContainer('mkd_slide_graphic_animation_scroll_container', 'mkd_slide_graphic_animation_scroll', 'no');
    $mkdSlideBehaviour->addChild('mkd_slide_graphic_animation_scroll_container', $mkd_slide_graphic_animation_scroll_container);

        $mkd_slide_graphics_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
        $mkd_slide_graphic_animation_scroll_container->addChild("mkd_slide_graphics_animation_data_start", $mkd_slide_graphics_animation_data_start);

            $row1 = new MikadoBurstRow();
            $mkd_slide_graphics_animation_data_start->addChild("row1", $row1);

                $mkd_slide_data_graphics_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_graphics_start", "", "Scrollbar Top Distance (px)", "");
                $row1->addChild("mkd_slide_data_graphics_start", $mkd_slide_data_graphics_start);

                $mkd_slide_data_graphics_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_graphics_start_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                $row1->addChild("mkd_slide_data_graphics_start_custom_style", $mkd_slide_data_graphics_start_custom_style);

        $mkd_slide_graphics_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
        $mkd_slide_graphic_animation_scroll_container->addChild("mkd_slide_graphics_animation_data_end", $mkd_slide_graphics_animation_data_end);

            $row2 = new MikadoBurstRow();
            $mkd_slide_graphics_animation_data_end->addChild("row2", $row2);

                $mkd_slide_data_graphics_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_graphics_end", "", "Scrollbar Top Distance (px)", "");
                $row2->addChild("mkd_slide_data_graphics_end", $mkd_slide_data_graphics_end);

                $mkd_slide_data_graphics_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_graphics_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                $row2->addChild("mkd_slide_data_graphics_end_custom_style", $mkd_slide_data_graphics_end_custom_style);

    //Text scroll animation
    $mkd_slide_text_animation_scroll = new MikadoBurstMetaField("yesno", "mkd_slide_text_animation_scroll", "no", "Animate Text on Scroll", "Enable text to animate separately", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_text_animation_scroll_container"
    ));
    $mkdSlideBehaviour->addChild('mkd_slide_text_animation_scroll', $mkd_slide_text_animation_scroll);

        $mkd_slide_text_animation_scroll_container = new MikadoBurstContainer('mkd_slide_text_animation_scroll_container', 'mkd_slide_text_animation_scroll', 'no');
        $mkdSlideBehaviour->addChild('mkd_slide_text_animation_scroll_container', $mkd_slide_text_animation_scroll_container);

            $mkd_slide_text_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
            $mkd_slide_text_animation_scroll_container->addChild("mkd_slide_text_animation_data_start", $mkd_slide_text_animation_data_start);

                $row1 = new MikadoBurstRow();
                $mkd_slide_text_animation_data_start->addChild("row1", $row1);

                    $mkd_slide_data_text_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_text_start", "", "Scrollbar Top Distance (px)", "");
                    $row1->addChild("mkd_slide_data_text_start", $mkd_slide_data_text_start);

                    $mkd_slide_data_text_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_text_start_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                    $row1->addChild("mkd_slide_data_text_start_custom_style", $mkd_slide_data_text_start_custom_style);

            $mkd_slide_text_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
            $mkd_slide_text_animation_scroll_container->addChild("mkd_slide_text_animation_data_end", $mkd_slide_text_animation_data_end);

                $row2 = new MikadoBurstRow();
                $mkd_slide_text_animation_data_end->addChild("row2", $row2);

                    $mkd_slide_data_text_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_text_end", "", "Scrollbar Top Distance (px)", "");
                    $row2->addChild("mkd_slide_data_text_end", $mkd_slide_data_text_end);

                    $mkd_slide_data_text_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_text_end_custom_style", "", "Enter CSS declarations separated by semicolons", "");
                    $row2->addChild("mkd_slide_data_text_end_custom_style", $mkd_slide_data_text_end_custom_style);


    //Button 1 scroll animation
    $mkd_slide_button1_animation_scroll = new MikadoBurstMetaField("yesno", "mkd_slide_button1_animation_scroll", "no", "Animate Button 1 on Scroll", "Enable button 1 to animate separately", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_button1_animation_scroll_container"
    ));
    $mkdSlideBehaviour->addChild('mkd_slide_button1_animation_scroll', $mkd_slide_button1_animation_scroll);

    $mkd_slide_button1_animation_scroll_container = new MikadoBurstContainer('mkd_slide_button1_animation_scroll_container', 'mkd_slide_button1_animation_scroll', 'no');
    $mkdSlideBehaviour->addChild('mkd_slide_button1_animation_scroll_container', $mkd_slide_button1_animation_scroll_container);

        $mkd_slide_button_1_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
        $mkd_slide_button1_animation_scroll_container->addChild("mkd_slide_button_1_animation_data_start", $mkd_slide_button_1_animation_data_start);

            $row1 = new MikadoBurstRow();
            $mkd_slide_button_1_animation_data_start->addChild("row1", $row1);

                $mkd_slide_data_button_1_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_button_1_start", "", "Scrollbar Top Distance (px)");
                $row1->addChild("mkd_slide_data_button_1_start", $mkd_slide_data_button_1_start);

                $mkd_slide_data_button_1_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_button_1_start_custom_style", "", "Enter CSS declarations separated by semicolons");
                $row1->addChild("mkd_slide_data_button_1_start_custom_style", $mkd_slide_data_button_1_start_custom_style);

        $mkd_slide_button_1_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
        $mkd_slide_button1_animation_scroll_container->addChild("mkd_slide_button_1_animation_data_end", $mkd_slide_button_1_animation_data_end);

            $row2 = new MikadoBurstRow();
            $mkd_slide_button_1_animation_data_end->addChild("row2", $row2);

                $mkd_slide_data_button_1_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_button_1_end", "", "Scrollbar Top Distance (px)");
                $row2->addChild("mkd_slide_data_button_1_end", $mkd_slide_data_button_1_end);

                $mkd_slide_data_button_1_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_button_1_end_custom_style", "", "Enter CSS declarations separated by semicolons");
                $row2->addChild("mkd_slide_data_button_1_end_custom_style", $mkd_slide_data_button_1_end_custom_style);



    //Button 2 scroll animation
    $mkd_slide_button2_animation_scroll = new MikadoBurstMetaField("yesno", "mkd_slide_button2_animation_scroll", "no", "Animate Button 2 on Scroll", "Enable button 2 to animate separately", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_button2_animation_scroll_container"
    ));
    $mkdSlideBehaviour->addChild('mkd_slide_button2_animation_scroll', $mkd_slide_button2_animation_scroll);

    $mkd_slide_button2_animation_scroll_container = new MikadoBurstContainer('mkd_slide_button2_animation_scroll_container', 'mkd_slide_button2_animation_scroll', 'no');
    $mkdSlideBehaviour->addChild('mkd_slide_button2_animation_scroll_container', $mkd_slide_button2_animation_scroll_container);

        $mkd_slide_button_2_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
        $mkd_slide_button2_animation_scroll_container->addChild("mkd_slide_button_2_animation_data_start", $mkd_slide_button_2_animation_data_start);

            $row1 = new MikadoBurstRow();
            $mkd_slide_button_2_animation_data_start->addChild("row1", $row1);

                $mkd_slide_data_button_2_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_button_2_start", "", "Scrollbar Top Distance (px)");
                $row1->addChild("mkd_slide_data_button_2_start", $mkd_slide_data_button_2_start);

                $mkd_slide_data_button_2_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_button_2_start_custom_style", "", "Enter CSS declarations separated by semicolons");
                $row1->addChild("mkd_slide_data_button_2_start_custom_style", $mkd_slide_data_button_2_start_custom_style);

        $mkd_slide_button_2_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
        $mkd_slide_button2_animation_scroll_container->addChild("mkd_slide_button_2_animation_data_end", $mkd_slide_button_2_animation_data_end);

            $row2 = new MikadoBurstRow();
            $mkd_slide_button_2_animation_data_end->addChild("row2", $row2);

                $mkd_slide_data_button_2_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_button_2_end", "", "Scrollbar Top Distance (px)");
                $row2->addChild("mkd_slide_data_button_2_end", $mkd_slide_data_button_2_end);

                $mkd_slide_data_button_2_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_button_2_end_custom_style", "", "Enter CSS declarations separated by semicolons");
                $row2->addChild("mkd_slide_data_button_2_end_custom_style", $mkd_slide_data_button_2_end_custom_style);



    $mkd_slide_scroll_separator_container = new MikadoBurstContainerNoStyle('mkd_slide_scroll_separator_container', 'mkd_slide-separator-title', 'no');
    $mkdSlideBehaviour->addChild('mkd_slide_scroll_separator_container', $mkd_slide_scroll_separator_container);

    //Separator Top scroll animation
    $mkd_slide_separator_top_animation_scroll = new MikadoBurstMetaField("yesno", "mkd_slide_separator_top_animation_scroll", "no", "Animate Separator Top on Scroll", "Enable separator top to animate separately", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_separator_top_animation_scroll_container"
    ));
    $mkd_slide_scroll_separator_container->addChild('mkd_slide_separator_top_animation_scroll', $mkd_slide_separator_top_animation_scroll);

    $mkd_slide_separator_top_animation_scroll_container = new MikadoBurstContainer('mkd_slide_separator_top_animation_scroll_container', 'mkd_slide_separator_top_animation_scroll', 'no');
    $mkd_slide_scroll_separator_container->addChild('mkd_slide_separator_top_animation_scroll_container', $mkd_slide_separator_top_animation_scroll_container);

        $mkd_slide_separator_top_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
        $mkd_slide_separator_top_animation_scroll_container->addChild("mkd_slide_separator_top_animation_data_start", $mkd_slide_separator_top_animation_data_start);

            $row1 = new MikadoBurstRow();
            $mkd_slide_separator_top_animation_data_start->addChild("row1", $row1);

                $mkd_slide_data_separator_top_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_separator_top_start", "", "Scrollbar Top Distance (px)");
                $row1->addChild("mkd_slide_data_separator_top_start", $mkd_slide_data_separator_top_start);

                $mkd_slide_data_separator_top_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_separator_top_start_custom_style", "", "Enter CSS declarations separated by semicolons");
                $row1->addChild("mkd_slide_data_separator_top_start_custom_style", $mkd_slide_data_separator_top_start_custom_style);

        $mkd_slide_separator_top_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
        $mkd_slide_separator_top_animation_scroll_container->addChild("mkd_slide_separator_top_animation_data_end", $mkd_slide_separator_top_animation_data_end);

            $row2 = new MikadoBurstRow();
            $mkd_slide_separator_top_animation_data_end->addChild("row2", $row2);

                $mkd_slide_data_separator_top_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_separator_top_end", "", "Scrollbar Top Distance (px)");
                $row2->addChild("mkd_slide_data_separator_top_end", $mkd_slide_data_separator_top_end);

                $mkd_slide_data_separator_top_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_separator_top_end_custom_style", "", "Enter CSS declarations separated by semicolons");
                $row2->addChild("mkd_slide_data_separator_top_end_custom_style", $mkd_slide_data_separator_top_end_custom_style);


    //Separator Bottom scroll animation
    $mkd_slide_separator_bottom_animation_scroll = new MikadoBurstMetaField("yesno", "mkd_slide_separator_bottom_animation_scroll", "no", "Animate Separator Bottom on Scroll", "Enable separator bottom to animate separately", array(), array(
        "dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_mkd_slide_separator_bottom_animation_scroll_container"
    ));
    $mkd_slide_scroll_separator_container->addChild('mkd_slide_separator_bottom_animation_scroll', $mkd_slide_separator_bottom_animation_scroll);

    $mkd_slide_separator_bottom_animation_scroll_container = new MikadoBurstContainer('mkd_slide_separator_bottom_animation_scroll_container', 'mkd_slide_separator_bottom_animation_scroll', 'no');
    $mkd_slide_scroll_separator_container->addChild('mkd_slide_separator_bottom_animation_scroll_container', $mkd_slide_separator_bottom_animation_scroll_container);

        $mkd_slide_separator_bottom_animation_data_start = new MikadoBurstGroup("Scrolling Animation Start Point", "These are properties for the first keyframe in scrolling animation");
        $mkd_slide_separator_bottom_animation_scroll_container->addChild("mkd_slide_separator_bottom_animation_data_start", $mkd_slide_separator_bottom_animation_data_start);

            $row1 = new MikadoBurstRow();
            $mkd_slide_separator_bottom_animation_data_start->addChild("row1", $row1);

                $mkd_slide_data_separator_bottom_start = new MikadoBurstMetaField("textsimple", "mkd_slide_data_separator_bottom_start", "", "Scrollbar Top Distance (px)");
                $row1->addChild("mkd_slide_data_separator_bottom_start", $mkd_slide_data_separator_bottom_start);

                $mkd_slide_data_separator_bottom_start_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_separator_bottom_start_custom_style", "", "Enter CSS declarations separated by semicolons");
                $row1->addChild("mkd_slide_data_separator_bottom_start_custom_style", $mkd_slide_data_separator_bottom_start_custom_style);

        $mkd_slide_separator_bottom_animation_data_end = new MikadoBurstGroup("Scrolling Animation End Point", "These are properties for the last keyframe in scrolling animation");
        $mkd_slide_separator_bottom_animation_scroll_container->addChild("mkd_slide_separator_bottom_animation_data_end", $mkd_slide_separator_bottom_animation_data_end);

            $row2 = new MikadoBurstRow();
            $mkd_slide_separator_bottom_animation_data_end->addChild("row2", $row2);

                $mkd_slide_data_separator_bottom_end = new MikadoBurstMetaField("textsimple", "mkd_slide_data_separator_bottom_end", "", "Scrollbar Top Distance (px)");
                $row2->addChild("mkd_slide_data_separator_bottom_end", $mkd_slide_data_separator_bottom_end);

                $mkd_slide_data_separator_bottom_end_custom_style = new MikadoBurstMetaField("textareasimple", "mkd_slide_data_separator_bottom_end_custom_style", "", "Enter CSS declarations separated by semicolons");
                $row2->addChild("mkd_slide_data_separator_bottom_end_custom_style", $mkd_slide_data_separator_bottom_end_custom_style);

//Slide Title

$mkdSlideTitle = new MikadoBurstMetaBox("slides", "Slide Title Style","mkd_slide-hide-title",array("yes"));
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_title",$mkdSlideTitle);

    $title_text_group = new MikadoBurstGroup("Title Text Style","Define styles for title text");
    $mkdSlideTitle->addChild("title_text_group",$title_text_group);
        $row1 = new MikadoBurstRow();
        $title_text_group->addChild("row1",$row1);
            $title_color = new MikadoBurstMetaField("colorsimple","mkd_slide-title-color","","Font Color","This is some description");
            $row1->addChild("mkd_slide-title-color",$title_color);
            $title_fontsize = new MikadoBurstMetaField("textsimple","mkd_slide-title-font-size","","Font Size (px)","This is some description");
            $row1->addChild("mkd_slide-title-font-size",$title_fontsize);
            $title_lineheight = new MikadoBurstMetaField("textsimple","mkd_slide-title-line-height","","Line Height (px)","This is some description");
            $row1->addChild("mkd_slide-title-line-height",$title_lineheight);
            $title_letterspacing = new MikadoBurstMetaField("textsimple","mkd_slide-title-letter-spacing","","Letter Spacing (px)","This is some description");
            $row1->addChild("mkd_slide-title-letter-spacing",$title_letterspacing);

        $row2 = new MikadoBurstRow(true);
        $title_text_group->addChild("row2",$row2);
            $title_google_fonts = new MikadoBurstMetaField("fontsimple","mkd_slide-title-font-family","","Font Family","This is some description");
            $row2->addChild("mkd_slide-title-font-family",$title_google_fonts);
            $title_fontstyle = new MikadoBurstMetaField("selectblanksimple","mkd_slide-title-font-style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("mkd_slide-title-font-style",$title_fontstyle);
            $title_fontweight = new MikadoBurstMetaField("selectblanksimple","mkd_slide-title-font-weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("mkd_slide-title-font-weight",$title_fontweight);
            $title_texttransform = new MikadoBurstMetaField("selectblanksimple","mkd_slide-title-text-transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row2->addChild("mkd_slide-title-text-transform",$title_texttransform);

    $title_background_group = new MikadoBurstGroup("Background","Define background for title");
    $mkdSlideTitle->addChild("title_background_group",$title_background_group);
        $row1 = new MikadoBurstRow();
        $title_background_group->addChild("row1",$row1);
            $title_background_color = new MikadoBurstMetaField("colorsimple","mkd_slide-title-background-color","","Background Color","This is some description");
            $row1->addChild("mkd_slide-title-background-color",$title_background_color);
            $title_background_color_transparency = new MikadoBurstMetaField("textsimple","mkd_slide-title-bg-color-transparency","","Background Color Transparency (values 0-1)","This is some description");
            $row1->addChild("mkd_slide-title-bg-color-transparency",$title_background_color_transparency);

    $title_margin_group = new MikadoBurstGroup("Margin Bottom (px)","Enter value for title bottom margin (default value is 14)");
    $mkdSlideTitle->addChild("title_margin_group",$title_margin_group);
        $row1 = new MikadoBurstRow();
        $title_margin_group->addChild("row1",$row1);
            $title_margin_bottom = new MikadoBurstMetaField("textsimple","mkd_slide_title_margin_bottom","","","This is some description");
            $row1->addChild("mkd_slide_title_margin_bottom",$title_margin_bottom);

    $title_padding_group = new MikadoBurstGroup("Padding","Define padding for title");
    $mkdSlideTitle->addChild("title_padding_group",$title_padding_group);
        $row1 = new MikadoBurstRow();
        $title_padding_group->addChild("row1",$row1);
            $title_padding_top = new MikadoBurstMetaField("textsimple","mkd_slide_title_padding_top","","Top Padding (px)","This is some description");
            $row1->addChild("mkd_slide_title_padding_top",$title_padding_top);
            $title_padding_right = new MikadoBurstMetaField("textsimple","mkd_slide_title_padding_right","","Right Padding (px)","This is some description");
            $row1->addChild("mkd_slide_title_padding_right",$title_padding_right);
            $title_padding_bottom = new MikadoBurstMetaField("textsimple","mkd_slide_title_padding_bottom","","Bottom Padding (px)","This is some description");
            $row1->addChild("mkd_slide_title_padding_bottom",$title_padding_bottom);
            $title_padding_left = new MikadoBurstMetaField("textsimple","mkd_slide_title_padding_left","","Left Padding (px)","This is some description");
            $row1->addChild("mkd_slide_title_padding_left",$title_padding_left);

    $mkd_slide_title_border = new MikadoBurstMetaField('yesno', 'mkd_slide_title_border', 'no', 'Border', 'Do you want to have a title border?', array(), array(
        'dependence' => true,
        'dependence_hide_on_yes' => '',
        'dependence_show_on_yes' => '#mkdf_title_border_container'
    ));
    $mkdSlideTitle->addChild('mkd_slide_title_border', $mkd_slide_title_border);

    $title_border_container = new MikadoBurstContainer('title_border_container', 'mkd_slide_title_border', 'no');
    $mkdSlideTitle->addChild('title_border_container', $title_border_container);


    $title_border_group = new MikadoBurstGroup("Title Border", "Define border for title");
    $title_border_container->addChild("title_border_group", $title_border_group);
        $row1 = new MikadoBurstRow();
        $title_border_group->addChild("row1", $row1);
            $title_border_thickness = new MikadoBurstMetaField("textsimple", "mkd_slide_title_border_thickness", "", "Thickness (px)", "");
            $row1->addChild("title_border_thickness", $title_border_thickness);
            $title_border_style = new MikadoBurstMetaField("selectsimple", "mkd_slide_title_border_style", "", "Style", "", array(
                "solid" => "solid",
                "dashed" => "dashed",
                "dotted" => "dotted",
                "double" => "double",
                "groove" => "groove",
                "ridge" => "ridge",
                "inset" => "inset",
                "outset" => "outset"
            ));
            $row1->addChild("title_border_style", $title_border_style);
            $title_border_color = new MikadoBurstMetaField("colorsimple", "mkd_slider_title_border_color", "", "Color", "");
            $row1->addChild("mkd_slider_title_border_color", $title_border_color);

    $mkd_slide_title_separator = new MikadoBurstMetaField("yesno","mkd_slide-separator-title","no","Title Separator","Do you want to have a title separator?", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_mkd_slide_title_separator_container, #mkdf_mkd_slide_scroll_separator_container"));
    $mkdSlideTitle->addChild("mkd_slide-separator-title",$mkd_slide_title_separator);

    $mkd_slide_title_separator_container = new MikadoBurstContainer("mkd_slide_title_separator_container","mkd_slide-separator-title","no");
    $mkdSlideTitle->addChild("mkd_slide_title_separator_container",$mkd_slide_title_separator_container);


    //Separator with or without icon
    $mkd_slide_title_separator_type = new MikadoBurstMetaField('select', 'mkd_slide_title_separator_type', '', 'Separator Type', '', array(
        'without_icon' => 'Without Icon',
        'with_icon' => 'With Icon',
        'with_custom_icon' => 'With Custom Icon'
    ), array(
        'dependence' => true,
        'hide' => array(
            'without_icon' => '#mkdf_mkd_slide_title_separator_with_icon_container, #mkdf_mkd_slide_title_separator_with_custom_icon_container',
            'with_icon' => '#mkdf_mkd_slide_title_separator_without_icon_container, #mkdf_mkd_slide_title_separator_with_custom_icon_container',
            'with_custom_icon' => '#mkdf_mkd_slide_title_separator_with_icon_container, #mkdf_mkd_slide_title_separator_without_icon_container'
        ),
        'show' => array(
            'without_icon' => '#mkdf_mkd_slide_title_separator_without_icon_container',
            'with_icon' => '#mkdf_mkd_slide_title_separator_with_icon_container',
            'with_custom_icon' => '#mkdf_mkd_slide_title_separator_with_custom_icon_container'
        )
    ));
    $mkd_slide_title_separator_container->addChild('mkd_slide_title_separator_type', $mkd_slide_title_separator_type);

    //Separator without Icon Container
    $mkd_slide_title_separator_without_icon_container = new MikadoBurstContainer('mkd_slide_title_separator_without_icon_container', 'mkd_slide_title_separator_type', '', array('with_icon', 'with_custom_icon'));
    $mkd_slide_title_separator_container->addChild('mkd_slide_title_separator_without_icon_container', $mkd_slide_title_separator_without_icon_container);


    $mkd_slide_title_separator_align_container = new MikadoBurstContainerNoStyle('mkd_slide_title_separator_align_container', 'mkd_slide-title-separator-position', 'left_right');
    $mkd_slide_title_separator_without_icon_container->addChild('mkd_slide_title_separator_align_container', $mkd_slide_title_separator_align_container);

    $mkd_slide_title_separator_align = new MikadoBurstMetaField("select","mkd_slide-title-separator-align","both","Alignment","Choose alignment of slider separator", array(
        "none" => "Center",
        "left" => "Left",
        "right" => "Right"
    ));
    $mkd_slide_title_separator_align_container->addChild("mkd_slide-title-separator-align",$mkd_slide_title_separator_align);

        $mkd_slide_separator_color_group = new MikadoBurstGroup("Separator Color","Define color for slider separator");
        $mkd_slide_title_separator_without_icon_container->addChild("mkd_slide_separator_color_group",$mkd_slide_separator_color_group);

            $row1 = new MikadoBurstRow();
            $mkd_slide_separator_color_group->addChild("row1",$row1);

                $mkd_slide_title_separator_color = new MikadoBurstMetaField("colorsimple","mkd_slide-separator-color","","Separator Color","Choose a color for the separator");
                $row1->addChild("mkd_slide-separator-color",$mkd_slide_title_separator_color);

                    $mkd_slide_title_separator_transparency = new MikadoBurstMetaField("textsimple","mkd_slide-separator-transparency","","Separator transparency (values 0-1)","This is some description");
                    $row1->addChild("mkd_slide-separator-transparency",$mkd_slide_title_separator_transparency);

        $mkd_slide_separator_border_group = new MikadoBurstGroup("Separator Border","Define border for slider separator");
        $mkd_slide_title_separator_without_icon_container->addChild("mkd_slide_separator_border_group",$mkd_slide_separator_border_group);

            $row1 = new MikadoBurstRow();
            $mkd_slide_separator_border_group->addChild("row1",$row1);

                $mkd_slide_separator_border_color = new MikadoBurstMetaField("colorsimple","mkd_slide-separator-border-color","","Color","Choose a color for the separator");
                $row1->addChild("mkd_slide-separator-border-color",$mkd_slide_separator_border_color);

                $mkd_slide_separator_border_width = new MikadoBurstMetaField("textsimple","mkd_slide-separator-border-width","","Thickness (px)","This is some description");
                $row1->addChild("mkd_slide-separator-border-width",$mkd_slide_separator_border_width);

                $mkd_slide_separator_border_style = new MikadoBurstMetaField('selectsimple', 'mkd_slide-separator-border-style', 'solid', 'Style', '', array(
                    "solid" => "Solid",
                    "dashed" => "Dashed",
                    "dotted" => "Dotted",
                    "transparent" => "Transparent"
                ));
                $row1->addChild("mkd_slide-separator-border-style",$mkd_slide_separator_border_style);


        $mkd_slide_separator_size_group = new MikadoBurstGroup("Separator Size","Define size for slider separator");
        $mkd_slide_title_separator_without_icon_container->addChild("mkd_slide_separator_size_group",$mkd_slide_separator_size_group);

            $row1 = new MikadoBurstRow();
            $mkd_slide_separator_size_group->addChild("row1",$row1);

                $mkd_slide_title_separator_width = new MikadoBurstMetaField("textsimple","mkd_slide-separator-width","","Separator Width (%)","Enter value from 0% to 100%. Enter just number.");
                $row1->addChild("mkd_slide-separator-width",$mkd_slide_title_separator_width);

                $mkd_slide_title_separator_thickness = new MikadoBurstMetaField("textsimple","mkd_slide-separator-thickness","","Separator Thickness (px)","This is some description");
                $row1->addChild("mkd_slide-separator-thickness",$mkd_slide_title_separator_thickness);

    //Separator with icon container
    $mkd_slide_title_separator_with_icon_container = new MikadoBurstContainer('mkd_slide_title_separator_with_icon_container', 'mkd_slide_title_separator_type', '', array('without_icon', 'with_custom_icon'));
    $mkd_slide_title_separator_container->addChild('mkd_slide_title_separator_with_icon_container', $mkd_slide_title_separator_with_icon_container);

        $mkd_slide_separator_icon_hide_array = array();
        $mkd_slide_separator_icon_show_array = array();

        if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {

            $mkd_slide_separator_icon_collections_params = $mkd_burst_IconCollections->getIconCollectionsParams();

            foreach ($mkd_burst_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
                $mkd_slide_separator_icon_hide_array[$dep_collection_key] = '';

                $mkd_slide_separator_icon_show_array[$dep_collection_key] = '#mkdf_mkd_slide_title_separator_with_icon_'.$dep_collection_object->param.'_container';

                foreach ($mkd_slide_separator_icon_collections_params as $mkd_slide_separator_icon_collections_param) {

                    if($mkd_slide_separator_icon_collections_param !== $dep_collection_object->param) {
                        $mkd_slide_separator_icon_hide_array[$dep_collection_key].= '#mkdf_mkd_slide_title_separator_with_icon_'.$mkd_slide_separator_icon_collections_param.'_container,';
                    }

                }

                $mkd_slide_separator_icon_hide_array[$dep_collection_key] = rtrim($mkd_slide_separator_icon_hide_array[$dep_collection_key], ',');
            }

        }

        $mkd_slide_title_separator_with_icon_icon_pack = new MikadoBurstMetaField(
            'select',
            'mkd_slide_title_separator_with_icon_icon_pack',
            'font_awesome',
            'Icon Package',
            'Choose Icon Package',
            $mkd_burst_IconCollections->getIconCollections(),
            array(
                'dependence' => true,
                'hide' => $mkd_slide_separator_icon_hide_array,
                'show' => $mkd_slide_separator_icon_show_array
            )
        );
        $mkd_slide_title_separator_with_icon_container->addChild('mkd_slide_title_separator_with_icon_icon_pack', $mkd_slide_title_separator_with_icon_icon_pack);

        if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {

            foreach ($mkd_burst_IconCollections->iconCollections as $collection_key => $collection_object) {
                $icons_array = $collection_object->getIconsArray();

                $icon_collections_keys = $mkd_burst_IconCollections->getIconCollectionsKeys();

                unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

                $mkd_slide_title_separator_icon_hide_values = $icon_collections_keys;

                $mkd_slide_title_separator_with_icon_icon_pack_container = new MikadoBurstContainer('mkd_slide_title_separator_with_icon_'.$collection_object->param.'_container', 'mkd_slide_title_separator_with_icon_icon_pack', '', $mkd_slide_title_separator_icon_hide_values);
                $mkd_slide_title_separator_with_icon_container->addChild('mkd_slide_title_separator_with_icon_'.$collection_object->param.'_container', $mkd_slide_title_separator_with_icon_icon_pack_container);

                $mkd_slide_title_separator_with_icon_icon_type = new MikadoBurstMetaField('select', 'mkd_slide_title_separator_with_icon_'.$collection_object->param, '', $collection_object->title, 'Icon Package', $icons_array);
                $mkd_slide_title_separator_with_icon_icon_pack_container->addChild('mkd_slide_title_separator_with_icon_'.$collection_object->param, $mkd_slide_title_separator_with_icon_icon_type);

            }

        }

        $mkd_slide_title_separator_with_icon_separator_size_group = new MikadoBurstGroup('Separator Size and Style', 'Define size, color and margins');
        $mkd_slide_title_separator_with_icon_container->addChild('mkd_slide_title_separator_with_icon_separator_size_group', $mkd_slide_title_separator_with_icon_separator_size_group);

            $row1 = new MikadoBurstRow();
            $mkd_slide_title_separator_with_icon_separator_size_group->addChild('row1', $row1);

                $mkd_slide_title_separator_with_icon_line_style = new MikadoBurstMetaField('selectsimple', 'mkd_slide_title_separator_with_icon_line_style', 'normal', 'Separator Line Style', '', array(
                    "solid" => "Solid",
                    "dashed" => "Dashed",
                    "dotted" => "Dotted",
                    "transparent" => "Transparent"
                ));
                $row1->addChild('mkd_slide_title_separator_with_icon_line_style', $mkd_slide_title_separator_with_icon_line_style);

                $mkd_slide_title_separator_with_icon_separator_width = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_separator_width', '', 'Width (px)', '');
                $row1->addChild('mkd_slide_title_separator_with_icon_separator_width', $mkd_slide_title_separator_with_icon_separator_width);

                $mkd_slide_title_separator_with_icon_separator_margin_top = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_separator_margin_top', '', 'Top Margin (px)', '');
                $row1->addChild('mkd_slide_title_separator_with_icon_separator_margin_top', $mkd_slide_title_separator_with_icon_separator_margin_top);

                $mkd_slide_title_separator_with_icon_separator_margin_bottom = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_separator_margin_bottom', '', 'Bottom Margin (px)', '');
                $row1->addChild('mkd_slide_title_separator_with_icon_separator_margin_bottom', $mkd_slide_title_separator_with_icon_separator_margin_bottom);



            $row2 = new MikadoBurstRow(true);
            $mkd_slide_title_separator_with_icon_separator_size_group->addChild('row2', $row2);

                $mkd_slide_title_separator_with_icon_separator_thickness = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_separator_thickness', '', 'Thickness (px)', '');
                $row2->addChild('mkd_slide_title_separator_with_icon_separator_thickness', $mkd_slide_title_separator_with_icon_separator_thickness);

                $mkd_slide_title_separator_with_icon_separator_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_title_separator_with_icon_separator_color', '', 'Separator Color', '');
                $row2->addChild('mkd_slide_title_separator_with_icon_separator_color', $mkd_slide_title_separator_with_icon_separator_color);


        $mkd_slide_title_separator_with_icon_icon_size_group = new MikadoBurstGroup('Icon Position and Size', 'Define icon position, size and type');
        $mkd_slide_title_separator_with_icon_container->addChild('mkd_slide_title_separator_with_icon_icon_size_group', $mkd_slide_title_separator_with_icon_icon_size_group);

            $row1 = new MikadoBurstRow();
            $mkd_slide_title_separator_with_icon_icon_size_group->addChild('row1', $row1);

                $mkd_slide_title_separator_with_icon_icon_type = new MikadoBurstMetaField('selectsimple', 'mkd_slide_title_separator_with_icon_icon_type', 'normal', 'Icon Type', '', array(
                    'normal' => 'Normal',
                    'circle' => 'Circle',
                    'square' => 'Square'
                ));
                $row1->addChild('mkd_slide_title_separator_with_icon_icon_type', $mkd_slide_title_separator_with_icon_icon_type);

                $mkd_slide_title_separator_with_icon_icon_postition = new MikadoBurstMetaField('selectsimple', 'mkd_slide_title_separator_with_icon_icon_postition', 'normal', 'Icon Position', '', array(
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right'
                ));
                $row1->addChild('mkd_slide_title_separator_with_icon_icon_postition', $mkd_slide_title_separator_with_icon_icon_postition);

                $mkd_slide_title_separator_with_icon_icon_custom_size = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_icon_custom_size', '', 'Icon Custom Size (px)', '');
                $row1->addChild('mkd_slide_title_separator_with_icon_icon_custom_size', $mkd_slide_title_separator_with_icon_icon_custom_size);

                $mkd_slide_title_separator_with_icon_icon_shape_size = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_icon_shape_size', '', 'Icon Shape Size (px)', '');
                $row1->addChild('mkd_slide_title_separator_with_icon_icon_shape_size', $mkd_slide_title_separator_with_icon_icon_shape_size);

            $row2 = new MikadoBurstRow(true);
            $mkd_slide_title_separator_with_icon_icon_size_group->addChild('row2', $row2);

                $mkd_slide_title_separator_with_icon_icon_margin = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_icon_margin', '', 'Icon Margin (px)', '');
                $row2->addChild('mkd_slide_title_separator_with_icon_icon_margin', $mkd_slide_title_separator_with_icon_icon_margin);

                $mkd_slide_title_separator_with_icon_icon_border_radius = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_icon_border_radius', '', 'Icon Border Radius (px)', '');
                $row2->addChild('mkd_slide_title_separator_with_icon_icon_border_radius', $mkd_slide_title_separator_with_icon_icon_border_radius);

                $mkd_slide_title_separator_with_icon_icon_border_width = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_icon_icon_border_width', '', 'Icon Border Width (px)', '');
                $row2->addChild('mkd_slide_title_separator_with_icon_icon_border_width', $mkd_slide_title_separator_with_icon_icon_border_width);


        $mkd_slide_title_separator_with_icon_icon_colour_group = new MikadoBurstGroup('Icon Color', 'Define icon, icon background and icon hover colors');
        $mkd_slide_title_separator_with_icon_container->addChild('mkd_slide_title_separator_with_icon_icon_colour_group', $mkd_slide_title_separator_with_icon_icon_colour_group);

            $row3 = new MikadoBurstRow();
            $mkd_slide_title_separator_with_icon_icon_colour_group->addChild('row3', $row3);

                $mkd_slide_title_separator_with_icon_icon_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_title_separator_with_icon_icon_color', '', 'Icon Color', '');
                $row3->addChild('mkd_slide_title_separator_with_icon_icon_color', $mkd_slide_title_separator_with_icon_icon_color);

                $mkd_slide_title_separator_with_icon_icon_border_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_title_separator_with_icon_icon_border_color', '', 'Icon Border Color', '');
                $row3->addChild('mkd_slide_title_separator_with_icon_icon_border_color', $mkd_slide_title_separator_with_icon_icon_border_color);


                $mkd_slide_title_separator_with_icon_icon_background_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_title_separator_with_icon_icon_background_color', '', 'Icon Background Color', '');
                $row3->addChild('mkd_slide_title_separator_with_icon_icon_background_color', $mkd_slide_title_separator_with_icon_icon_background_color);

                $mkd_slide_title_separator_with_icon_icon_hover_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_title_separator_with_icon_icon_hover_color', '', 'Icon Hover Color', '');
                $row3->addChild('mkd_slide_title_separator_with_icon_icon_hover_color', $mkd_slide_title_separator_with_icon_icon_hover_color);

            $row4 = new MikadoBurstRow(true);
            $mkd_slide_title_separator_with_icon_icon_colour_group->addChild('row4', $row4);

                $mkd_slide_title_separator_with_icon_icon_hover_border_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_title_separator_with_icon_icon_hover_border_color', '', 'Icon Hover Border Color', '');
                $row4->addChild('mkd_slide_title_separator_with_icon_icon_hover_border_color', $mkd_slide_title_separator_with_icon_icon_hover_border_color);

                $mkd_slide_title_separator_with_icon_icon_hover_background_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_title_separator_with_icon_icon_hover_background_color', '', 'Icon Hover Background Color', '');
                $row4->addChild('mkd_slide_title_separator_with_icon_icon_hover_background_color', $mkd_slide_title_separator_with_icon_icon_hover_background_color);

    //Separator with custom icon container
    $mkd_slide_title_separator_with_custom_icon_container = new MikadoBurstContainer('mkd_slide_title_separator_with_custom_icon_container', 'mkd_slide_title_separator_type', '', array('without_icon', 'with_icon'));
    $mkd_slide_title_separator_container->addChild('mkd_slide_title_separator_with_custom_icon_container', $mkd_slide_title_separator_with_custom_icon_container);

        $mkd_slide_title_separator_with_custom_icon_custom_icon = new MikadoBurstMetaField('image', 'mkd_slide_title_separator_with_custom_icon_custom_icon', '', 'Custom Icon', '');
        $mkd_slide_title_separator_with_custom_icon_container->addChild('mkd_slide_title_separator_with_custom_icon_custom_icon', $mkd_slide_title_separator_with_custom_icon_custom_icon);

        $mkd_slide_title_separator_with_custom_icon_separator_style_group = new MikadoBurstGroup('Style', '');
        $mkd_slide_title_separator_with_custom_icon_container->addChild('mkd_slide_title_separator_with_custom_icon_separator_style_group', $mkd_slide_title_separator_with_custom_icon_separator_style_group);

            $row1 = new MikadoBurstRow();
            $mkd_slide_title_separator_with_custom_icon_separator_style_group->addChild('row1', $row1);

                $mkd_slide_title_separator_with_custom_icon_line_style = new MikadoBurstMetaField('selectsimple', 'mkd_slide_title_separator_with_custom_icon_line_style', 'normal', 'Separator Line Style', '', array(
                    "solid" => "Solid",
                    "dashed" => "Dashed",
                    "dotted" => "Dotted",
                    "transparent" => "Transparent"
                ));
                $row1->addChild('mkd_slide_title_separator_with_custom_icon_line_style', $mkd_slide_title_separator_with_custom_icon_line_style);

                $mkd_slide_title_separator_with_custom_icon_separator_width = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_custom_icon_separator_width', '', 'Width (px)', '');
                $row1->addChild('mkd_slide_title_separator_with_custom_icon_separator_width', $mkd_slide_title_separator_with_custom_icon_separator_width);

                $mkd_slide_title_separator_with_custom_icon_separator_margin_top = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_custom_icon_separator_margin_top', '', 'Top Margin (px)', '');
                $row1->addChild('mkd_slide_title_separator_with_custom_icon_separator_margin_top', $mkd_slide_title_separator_with_custom_icon_separator_margin_top);

                $mkd_slide_title_separator_with_custom_icon_separator_margin_bottom = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_custom_icon_separator_margin_bottom', '', 'Bottom Margin (px)', '');
                $row1->addChild('mkd_slide_title_separator_with_custom_icon_separator_margin_bottom', $mkd_slide_title_separator_with_custom_icon_separator_margin_bottom);

            $row2 = new MikadoBurstRow(true);
            $mkd_slide_title_separator_with_custom_icon_separator_style_group->addChild('row2', $row2);

                $mkd_slide_title_separator_with_custom_icon_separator_thickness = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_custom_icon_separator_thickness', '', 'Thickness (px)', '');
                $row2->addChild('mkd_slide_title_separator_with_custom_icon_separator_thickness', $mkd_slide_title_separator_with_custom_icon_separator_thickness);

                $mkd_slide_title_separator_with_custom_icon_separator_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_title_separator_with_custom_icon_separator_color', '', 'Separator Color', '');
                $row2->addChild('mkd_slide_title_separator_with_custom_icon_separator_color', $mkd_slide_title_separator_with_custom_icon_separator_color);

                $mkd_slide_title_separator_with_custom_icon_icon_postition = new MikadoBurstMetaField('selectsimple', 'mkd_slide_title_separator_with_custom_icon_icon_postition', 'normal', 'Icon Position', '', array(
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right'
                ));
                $row2->addChild('mkd_slide_title_separator_with_custom_icon_icon_postition', $mkd_slide_title_separator_with_custom_icon_icon_postition);

                $mkd_slide_title_separator_with_custom_icon_icon_margin = new MikadoBurstMetaField('textsimple', 'mkd_slide_title_separator_with_custom_icon_icon_margin', '', 'Icon Margin (px)', '');
                $row2->addChild('mkd_slide_title_separator_with_custom_icon_icon_margin', $mkd_slide_title_separator_with_custom_icon_icon_margin);

        //Separator Position Without Icon
        $mkd_slide_title_separator_position = new MikadoBurstMetaField("select","mkd_slide-title-separator-position","both","Position","Choose position of slider separator", array(
            "both" => "Top and Bottom",
            "left_right" => "Left and Right",
            "top" => "Top",
            "bottom" => "Bottom"
        ),
        array("dependence" => true,
            "hide" => array(
                "both"=>"#mkdf_mkd_slide_left_right_separator_container",
                "left_right" => "#mkdf_mkd_slide_top_separator_container, #mkdf_mkd_slide_bottom_separator_container, #mkdf_mkd_slide_title_separator_align_container",
                "top"=>"#mkdf_mkd_slide_bottom_separator_container, #mkdf_mkd_slide_left_right_separator_container",
                "bottom"=>"#mkdf_mkd_slide_top_separator_container, #mkdf_mkd_slide_left_right_separator_container"),
            "show" => array(
                "both"=>"#mkdf_mkd_slide_top_separator_container,#mkdf_mkd_slide_bottom_separator_container, #mkdf_mkd_slide_title_separator_align_container",
                "top"=>"#mkdf_mkd_slide_top_separator_container, #mkdf_mkd_slide_title_separator_align_container",
                "bottom"=>"#mkdf_mkd_slide_bottom_separator_container, #mkdf_mkd_slide_title_separator_align_container",
                "left_right" => "#mkdf_mkd_slide_left_right_separator_container"
            )
        ));
        $mkd_slide_title_separator_without_icon_container->addChild("mkd_slide-title-separator-position",$mkd_slide_title_separator_position);

        $mkd_slide_top_separator_container = new MikadoBurstContainer("mkd_slide_top_separator_container","mkd_slide-title-separator-position","", array("bottom", "left_right"));
        $mkd_slide_title_separator_without_icon_container->addChild("mkd_slide_top_separator_container",$mkd_slide_top_separator_container);

            $group1 = new MikadoBurstGroup("Top Separator Margins","Enter top separator margins");
            $mkd_slide_top_separator_container->addChild("group1",$group1);

                $row1 = new MikadoBurstRow();
                $group1->addChild("row1",$row1);

                    $mkd_slide_top_separator_margin_top = new MikadoBurstMetaField("textsimple","mkd_slide-top-separator-margin-top","","Margin Top (px)","This is some description");
                    $row1->addChild("mkd_slide-top-separator-margin-top",$mkd_slide_top_separator_margin_top);

                    $mkd_slide_top_separator_margin_bottom = new MikadoBurstMetaField("textsimple","mkd_slide-top-separator-margin-bottom","","Margin Bottom (px)","This is some description");
                    $row1->addChild("mkd_slide-top-separator-margin-bottom",$mkd_slide_top_separator_margin_bottom);

        $mkd_slide_bottom_separator_container = new MikadoBurstContainer("mkd_slide_bottom_separator_container","mkd_slide-title-separator-position","", array("top", "left_right"));
        $mkd_slide_title_separator_without_icon_container->addChild("mkd_slide_bottom_separator_container",$mkd_slide_bottom_separator_container);

            $group2 = new MikadoBurstGroup("Bottom Separator Margins","Enter bottom separator margins");
            $mkd_slide_bottom_separator_container->addChild("group2",$group2);

                $row1 = new MikadoBurstRow();
                $group2->addChild("row1",$row1);

                    $mkd_slide_bottom_separator_margin_top = new MikadoBurstMetaField("textsimple","mkd_slide-bottom-separator-margin-top","","Margin Top (px)","This is some description");
                    $row1->addChild("mkd_slide-bottom-separator-margin-top",$mkd_slide_bottom_separator_margin_top);

                    $mkd_slide_bottom_separator_margin_bottom = new MikadoBurstMetaField("textsimple","mkd_slide-bottom-separator-margin-bottom","","Margin Bottom (px)","This is some description");
                    $row1->addChild("mkd_slide-bottom-separator-margin-bottom",$mkd_slide_bottom_separator_margin_bottom);

        $mkd_slide_left_right_separator_container = new MikadoBurstContainer("mkd_slide_left_right_separator_container","mkd_slide-title-separator-position","", array("top", "bottom", "both"));
        $mkd_slide_title_separator_without_icon_container->addChild('mkd_slide_left_right_separator_container', $mkd_slide_left_right_separator_container);

            $mkd_slide_left_right_separator_style = new MikadoBurstMetaField('select', 'mkd_slide_left_right_separator_style', 'solid', 'Line Style', 'Separator Line Style', array(
                "solid" => "Solid",
                "dashed" => "Dashed",
                "dotted" => "Dotted"
            ));
            $mkd_slide_left_right_separator_container->addChild('mkd_slide_left_right_separator_style', $mkd_slide_left_right_separator_style);

            $group3 = new MikadoBurstGroup('Left/Right Separator Margins', 'Enter left and right separator margins');
            $mkd_slide_left_right_separator_container->addChild('group3', $group3);

                $row1 = new MikadoBurstRow();
                $group3->addChild('row1',$row1);

                    $mkd_slide_left_separator_margin_right = new MikadoBurstMetaField("textsimple","mkd_slide_left_separator_margin_right","","Left Separator Margin Right (px)","");
                    $row1->addChild("mkd_slide_left_separator_margin_right",$mkd_slide_left_separator_margin_right);

                    $mkd_slide_right_separator_margin_left = new MikadoBurstMetaField("textsimple","mkd_slide_right_separator_margin_left","","Right Separator Margin Right (px)","");
                    $row1->addChild("mkd_slide_right_separator_margin_left",$mkd_slide_right_separator_margin_left);

            $group4 = new MikadoBurstGroup('Dots on Line End', 'Add dots on line end');
            $mkd_slide_left_right_separator_container->addChild('group4', $group4);

                $row2 = new MikadoBurstRow();
                $group4->addChild('row2', $row2);

                    $mkd_slide_left_right_separator_linedots = new MikadoBurstMetaField('selectsimple', 'mkd_slide_left_right_separator_linedots', 'no', 'Dots on line end', '', array(
                        'no' => 'No',
                        'yes' => 'Yes',
                    ));
                    $row2->addChild('mkd_slide_left_right_separator_linedots', $mkd_slide_left_right_separator_linedots);

                    $mkd_slide_left_right_separator_line_dots_size = new MikadoBurstMetaField('textsimple', 'mkd_slide_left_right_separator_line_dots_size', '', 'Dots Size (px)', '');
                    $row2->addChild('mkd_slide_left_right_separator_line_dots_size', $mkd_slide_left_right_separator_line_dots_size);

                    $mkd_slide_left_right_separator_dots_color = new MikadoBurstMetaField('colorsimple', 'mkd_slide_left_right_separator_dots_color', '', 'Dots Color', '');
                    $row2->addChild('mkd_slide_left_right_separator_dots_color', $mkd_slide_left_right_separator_dots_color);

        //Separator Position With Icon
        $mkd_slide_title_separator_with_icon_position = new MikadoBurstMetaField("select","mkd_slide_title_separator_with_icon_position","both","Position","Choose position of slider separator", array(
            "top" => "Top",
            "bottom" => "Bottom"
        ));
        $mkd_slide_title_separator_with_icon_container->addChild("mkd_slide_title_separator_with_icon_position",$mkd_slide_title_separator_with_icon_position);

        //Separator Position With Custom Icon
        $mkd_slide_title_separator_with_custom_icon_position = new MikadoBurstMetaField("select","mkd_slide_title_separator_with_custom_icon_position","both","Position","Choose position of slider separator", array(
            "top" => "Top",
            "bottom" => "Bottom"
        ));
        $mkd_slide_title_separator_with_custom_icon_container->addChild('mkd_slide_title_separator_with_custom_icon_position', $mkd_slide_title_separator_with_custom_icon_position);

//Slide Subtitle

$mkdSlideSubtitle = new MikadoBurstMetaBox("slides", "Slide Subtitle Style");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_subtitle",$mkdSlideSubtitle);

    $subtitle_text_group = new MikadoBurstGroup("Subtitle Text Style","Define styles for subtitle text");
    $mkdSlideSubtitle->addChild("subtitle_text_group",$subtitle_text_group);
        $row1 = new MikadoBurstRow();
        $subtitle_text_group->addChild("row1",$row1);
            $subtitle_color = new MikadoBurstMetaField("colorsimple","mkd_slide-subtitle-color","","Font Color","This is some description");
            $row1->addChild("mkd_slide-subtitle-color",$subtitle_color);
            $subtitle_fontsize = new MikadoBurstMetaField("textsimple","mkd_slide-subtitle-font-size","","Font Size (px)","This is some description");
            $row1->addChild("mkd_slide-subtitle-font-size",$subtitle_fontsize);
            $subtitle_lineheight = new MikadoBurstMetaField("textsimple","mkd_slide-subtitle-line-height","","Line Height (px)","This is some description");
            $row1->addChild("mkd_slide-subtitle-line-height",$subtitle_lineheight);
            $subtitle_letterspacing = new MikadoBurstMetaField("textsimple","mkd_slide-subtitle-letter-spacing","","Letter Spacing (px)","This is some description");
            $row1->addChild("mkd_slide-subtitle-letter-spacing",$subtitle_letterspacing);

        $row2 = new MikadoBurstRow(true);
        $subtitle_text_group->addChild("row2",$row2);
            $subtitle_google_fonts = new MikadoBurstMetaField("fontsimple","mkd_slide-subtitle-font-family","","Font Family","This is some description");
            $row2->addChild("mkd_slide-subtitle-font-family",$subtitle_google_fonts);
            $subtitle_fontstyle = new MikadoBurstMetaField("selectblanksimple","mkd_slide-subtitle-font-style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("mkd_slide-subtitle-font-style",$subtitle_fontstyle);
            $subtitle_fontweight = new MikadoBurstMetaField("selectblanksimple","mkd_slide-subtitle-font-weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("mkd_slide-subtitle-font-weight",$subtitle_fontweight);
            $subtitle_transform = new MikadoBurstMetaField("selectblanksimple","mkd_slide-subtitle-text-transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row2->addChild("mkd_slide-subtitle-text-transform",$subtitle_transform);

    $subtitle_background_group = new MikadoBurstGroup("Background","Define background for subtitle");
    $mkdSlideSubtitle->addChild("subtitle_background_group",$subtitle_background_group);
        $row1 = new MikadoBurstRow(true);
        $subtitle_background_group->addChild("row1",$row1);
            $subtitle_background_color = new MikadoBurstMetaField("colorsimple","mkd_slide-subtitle-background-color","","Background Color","This is some description");
            $row1->addChild("mkd_slide-subtitle-background-color",$subtitle_background_color);
            $subtitle_background_color_transparency = new MikadoBurstMetaField("textsimple","mkd_slide-subtitle-bg-color-transparency","","Background Color Transparency (values: 0-1)","This is some description");
            $row1->addChild("mkd_slide-subtitle-bg-color-transparency",$subtitle_background_color_transparency);

    $subtitle_margin_group = new MikadoBurstGroup("Margin Bottom (px)","Enter value for subtitle bottom margin (default value is 14)");
    $mkdSlideSubtitle->addChild("subtitle_margin_group",$subtitle_margin_group);
        $row1 = new MikadoBurstRow(true);
        $subtitle_margin_group->addChild("row1",$row1);
            $subtitle_margin_bottom = new MikadoBurstMetaField("textsimple","mkd_slide_subtitle_margin_bottom","","","This is some description");
            $row1->addChild("mkd_slide_subtitle_margin_bottom",$subtitle_margin_bottom);

    $subtitle_padding_group = new MikadoBurstGroup("Padding","Define padding for subtitle");
    $mkdSlideSubtitle->addChild("subtitle_padding_group",$subtitle_padding_group);
        $row1 = new MikadoBurstRow(true);
        $subtitle_padding_group->addChild("row1",$row1);
            $subtitle_padding_top = new MikadoBurstMetaField("textsimple","mkd_slide_subtitle_padding_top","","Top Padding (px)","This is some description");
            $row1->addChild("mkd_slide_subtitle_padding_top",$subtitle_padding_top);
            $subtitle_padding_right = new MikadoBurstMetaField("textsimple","mkd_slide_subtitle_padding_right","","Right Padding (px)","This is some description");
            $row1->addChild("mkd_slide_subtitle_padding_right",$subtitle_padding_right);
            $subtitle_padding_bottom = new MikadoBurstMetaField("textsimple","mkd_slide_subtitle_padding_bottom","","Bottom Padding (px)","This is some description");
            $row1->addChild("mkd_slide_subtitle_padding_bottom",$subtitle_padding_bottom);
            $subtitle_padding_left = new MikadoBurstMetaField("textsimple","mkd_slide_subtitle_padding_left","","Left Padding (px)","This is some description");
            $row1->addChild("mkd_slide_subtitle_padding_left",$subtitle_padding_left);

//Slide Text

$mkdSlideText = new MikadoBurstMetaBox("slides", "Slide Text Style");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_text",$mkdSlideText);

    $text_common_text_group = new MikadoBurstGroup('Text Color and Size', 'Define text color and size');
    $mkdSlideText->addChild('text_common_text_group', $text_common_text_group);

        $row1 = new MikadoBurstRow();
        $text_common_text_group->addChild('row1', $row1);

            $text_color = new MikadoBurstMetaField("colorsimple","mkd_slide-text-color","","Font Color","This is some description");
            $row1->addChild("mkd_slide-text-color",$text_color);
            $text_background_color = new MikadoBurstMetaField("colorsimple","mkd_slide-text-background-color","","Background Color","This is some description");
            $row1->addChild("mkd_slide-text-background-color",$text_background_color);
            $text_fontsize = new MikadoBurstMetaField("textsimple","mkd_slide-text-font-size","","Font Size (px)","This is some description");
            $row1->addChild("mkd_slide-text-font-size",$text_fontsize);
            $text_lineheight = new MikadoBurstMetaField("textsimple","mkd_slide-text-line-height","","Line Height (px)","This is some description");
            $row1->addChild("mkd_slide-text-line-height",$text_lineheight);

    $text_separator_text = new MikadoBurstMetaField('yesno', 'text_separator_text', 'no', 'Separator Around Text', 'Do you want to have a separator around text', array(), array(
        'dependence' => true,
        'dependence_hide_on_yes' => '#mkdf_text_without_separator_container',
        'dependence_show_on_yes' => '#mkdf_text_with_separator_container'
    ));
    $mkdSlideText->addChild('text_separator_text', $text_separator_text);

    $text_without_separator_container = new MikadoBurstContainerNoStyle('text_without_separator_container', 'text_separator_text', 'yes');
    $mkdSlideText->addChild('text_without_separator_container', $text_without_separator_container);

        $text_without_separator_padding_group = new MikadoBurstGroup("Padding","Define padding for text");
        $text_without_separator_container->addChild("text_without_separator_padding_group",$text_without_separator_padding_group);

            $row1 = new MikadoBurstRow(true);
            $text_without_separator_padding_group->addChild("row1",$row1);

                $text_padding_top = new MikadoBurstMetaField("textsimple","mkd_slide_text_padding_top","","Top Padding (px)","This is some description");
                $row1->addChild("mkd_slide_text_padding_top",$text_padding_top);
                $text_padding_right = new MikadoBurstMetaField("textsimple","mkd_slide_text_padding_right","","Right Padding (px)","This is some description");
                $row1->addChild("mkd_slide_text_padding_right",$text_padding_right);
                $text_padding_bottom = new MikadoBurstMetaField("textsimple","mkd_slide_text_padding_bottom","","Bottom Padding (px)","This is some description");
                $row1->addChild("mkd_slide_text_padding_bottom",$text_padding_bottom);
                $text_padding_left = new MikadoBurstMetaField("textsimple","mkd_slide_text_padding_left","","Left Padding (px)","This is some description");
                $row1->addChild("mkd_slide_text_padding_left",$text_padding_left);

        $text_without_separator_text_group = new MikadoBurstGroup("Text Style","Define styles for text text");
        $text_without_separator_container->addChild("text_without_separator_text_group",$text_without_separator_text_group);

            $row1 = new MikadoBurstRow();
            $text_without_separator_text_group->addChild("row1",$row1);

                $text_letterspacing = new MikadoBurstMetaField("textsimple","mkd_slide-text-letter-spacing","","Letter Spacing (px)","This is some description");
                $row1->addChild("mkd_slide-text-letter-spacing",$text_letterspacing);

            $row2 = new MikadoBurstRow(true);
            $text_without_separator_text_group->addChild("row2",$row2);

                $text_google_fonts = new MikadoBurstMetaField("fontsimple","mkd_slide-text-font-family","","Font Family","This is some description");
                $row2->addChild("mkd_slide-text-font-family",$text_google_fonts);
                $text_fontstyle = new MikadoBurstMetaField("selectblanksimple","mkd_slide-text-font-style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
                $row2->addChild("mkd_slide-text-font-style",$text_fontstyle);
                $text_fontweight = new MikadoBurstMetaField("selectblanksimple","mkd_slide-text-font-weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
                $row2->addChild("mkd_slide-text-font-weight",$text_fontweight);
                $text_transform = new MikadoBurstMetaField("selectblanksimple","mkd_slide-text-text-transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
                $row2->addChild("mkd_slide-text-text-transform",$text_transform);

        $text_without_separator_background_group = new MikadoBurstGroup("Background","Define background for text");
        $text_without_separator_container->addChild("text_without_separator_background_group",$text_without_separator_background_group);

            $row1 = new MikadoBurstRow(true);
            $text_without_separator_background_group->addChild("row1",$row1);

                $text_background_color_transparency = new MikadoBurstMetaField("textsimple","mkd_slide-text-bg-color-transparency","","Background Color Transparency (values 0-1)","This is some description");
                $row1->addChild("mkd_slide-text-bg-color-transparency",$text_background_color_transparency);

    $text_with_separator_container = new MikadoBurstContainer('text_with_separator_container', 'text_separator_text', 'no');
    $mkdSlideText->addChild('text_with_separator_container', $text_with_separator_container);

        $text_with_separator_border_styles = new MikadoBurstGroup('Separator Line Style', 'Define separator line style');
        $text_with_separator_container->addChild('text_with_separator_border_styles', $text_with_separator_border_styles);

            $row1 = new MikadoBurstRow();
            $text_with_separator_border_styles->addChild('row1', $row1);

                $mkd_separator_line_border_style = new MikadoBurstMetaField('selectsimple', 'mkd_separator_line_border_style', 'solid', 'Line Border Style', '', array(
                    'solid' => 'Solid',
                    'dashed' => 'Dashed',
                    'dotted' => 'Dotted',
                    'transparent' => 'Transparent'
                ));
                $row1->addChild('mkd_separator_line_border_style', $mkd_separator_line_border_style);

                $mkd_separator_line_width = new MikadoBurstMetaField('textsimple', 'mkd_separator_line_width', '', 'Line Width (px)', '');
                $row1->addChild('mkd_separator_line_width', $mkd_separator_line_width);

                $mkd_separator_line_thickness = new MikadoBurstMetaField('textsimple', 'mkd_separator_line_thickness', '', 'Line Thickness (px)', '');
                $row1->addChild('mkd_separator_line_thickness', $mkd_separator_line_thickness);

                $mkd_separator_line_color = new MikadoBurstMetaField('colorsimple', 'mkd_separator_line_color', '', 'Line Color', '');
                $row1->addChild('mkd_separator_line_color', $mkd_separator_line_color);

        $text_with_separator_boxed = new MikadoBurstGroup('Boxed Text', 'Add box around text');
        $text_with_separator_container->addChild('text_with_separator_boxed', $text_with_separator_boxed);

            $row1 = new MikadoBurstRow();
            $text_with_separator_boxed->addChild('row1', $row1);

                $mkd_separator_text_in_box = new MikadoBurstMetaField('selectsimple', 'mkd_separator_text_in_box', 'no', 'Text in Box', '', array(
                    'yes' => 'Yes',
                    'no' => 'No'
                ));
                $row1->addChild('mkd_separator_text_in_box', $mkd_separator_text_in_box);

                $mkd_separator_box_border_style = new MikadoBurstMetaField('selectsimple', 'mkd_separator_box_border_style', 'solid', 'Box Border Style', '', array(
                    'solid' => 'Solid',
                    'dashed' => 'Dashed',
                    'dotted' => 'Dotted',
                    'transparent' => 'Transparent'
                ));
                $row1->addChild('mkd_separator_box_border_style', $mkd_separator_box_border_style);

                $mkd_separator_box_border_width = new MikadoBurstMetaField('textsimple', 'mkd_separator_box_border_width', '', 'Box Border Width (px)', '');
                $row1->addChild('mkd_separator_box_border_width', $mkd_separator_box_border_width);

                $mkd_separator_box_border_radius = new MikadoBurstMetaField('textsimple', 'mkd_separator_box_border_radius', '', 'Box Border Radius (px)', '');
                $row1->addChild('mkd_separator_box_border_radius', $mkd_separator_box_border_radius);

            $row2 = new MikadoBurstRow(true);
            $text_with_separator_boxed->addChild('row2', $row2);

                $mkd_separator_box_border_color = new MikadoBurstMetaField('colorsimple', 'mkd_separator_box_border_color', '', 'Box Border Color', '');
                $row2->addChild('mkd_separator_box_border_color', $mkd_separator_box_border_color);

        $text_with_separator_position = new MikadoBurstGroup('Text Position', 'Define position of text');
        $text_with_separator_container->addChild('text_with_separator_position', $text_with_separator_position);

            $row1 = new MikadoBurstRow();
            $text_with_separator_position->addChild('row1', $row1);

                $mkd_separator_text_position = new MikadoBurstMetaField('selectsimple', 'mkd_separator_text_position', 'center', 'Text position', '', array(
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right'
                ));
                $row1->addChild('mkd_separator_text_position', $mkd_separator_text_position);

                $mkd_separator_text_leftright_padding = new MikadoBurstMetaField('textsimple', 'mkd_separator_text_leftright_padding', '', 'Left/Right Text padding (px)', '');
                $row1->addChild('mkd_separator_text_leftright_padding', $mkd_separator_text_leftright_padding);

                $mkd_separator_text_top_margin = new MikadoBurstMetaField('textsimple', 'mkd_separator_text_top_margin', '', 'Top Margin (px)', '');
                $row1->addChild('mkd_separator_text_top_margin', $mkd_separator_text_top_margin);

                $mkd_separator_text_bottom_margin = new MikadoBurstMetaField('textsimple', 'mkd_separator_text_bottom_margin', '', 'Bottom Margin (px)', '');
                $row1->addChild('mkd_separator_text_bottom_margin', $mkd_separator_text_bottom_margin);

            $row2= new MikadoBurstRow(true);
            $text_with_separator_position->addChild('row2', $row2);

                $mkd_separator_box_margin = new MikadoBurstMetaField('textsimple', 'mkd_separator_box_margin', '', 'Box Margins Left/Right (px)', '');
                $row2->addChild('mkd_separator_box_margin', $mkd_separator_box_margin);

        $text_with_separator_linedots = new MikadoBurstGroup('Dots on Line End', 'Add dots on line end');
        $text_with_separator_container->addChild('text_with_separator_linedots', $text_with_separator_linedots);

            $row1 = new MikadoBurstRow();
            $text_with_separator_linedots->addChild('row1', $row1);

                $mkd_separator_linedots = new MikadoBurstMetaField('selectsimple', 'mkd_separator_linedots', 'no', 'Dots on line end', '', array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ));
                $row1->addChild('mkd_separator_linedots', $mkd_separator_linedots);

                $mkd_separator_line_dots_size = new MikadoBurstMetaField('textsimple', 'mkd_separator_line_dots_size', '', 'Dots Size (px)', '');
                $row1->addChild('mkd_separator_line_dots_size', $mkd_separator_line_dots_size);

                $mkd_separator_dots_color = new MikadoBurstMetaField('colorsimple', 'mkd_separator_dots_color', '', 'Dots Color', '');
                $row1->addChild('mkd_separator_dots_color', $mkd_separator_dots_color);


//Slide Buttons
//Button 1
$mkdSlideButtons = new MikadoBurstMetaBox("slides", "Slide Buttons Style");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_buttons",$mkdSlideButtons);

$button1_section = new MikadoBurstTitle("button1_section", "Button 1");
$mkdSlideButtons->addChild("button1_section", $button1_section);

$button1_group2 = new MikadoBurstGroup("Text Style","Define text style");
$mkdSlideButtons->addChild("button1_group2",$button1_group2);

        $row1 = new MikadoBurstRow();
        $button1_group2->addChild("row1",$row1);
            $button1_font_family = new MikadoBurstMetaField("fontsimple","mkd_slide-button_font_family","-1","Font Family","This is some description");
            $row1->addChild("mkd_slide-button_font_family",$button1_font_family);
            $button1_font_size = new MikadoBurstMetaField("textsimple","mkd_slide-button_font_size","","Text Size(px)","This is some description");
            $row1->addChild("mkd_slide-button_font_size",$button1_font_size);
            $button1_font_style = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row1->addChild("mkd_slide-button_font_style",$button1_font_style);
            $button1_font_weight = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row1->addChild("mkd_slide-button_font_weight",$button1_font_weight);

        $row2 = new MikadoBurstRow();
        $button1_group2->addChild("row2",$row2);

            $button1_letter_spacing= new MikadoBurstMetaField("textsimple","mkd_slide-button_letter_spacing","","Letter Spacing(px)","This is some description");
            $row2->addChild("mkd_slide-button_letter_spacing",$button1_letter_spacing);

            $button1_line_height = new MikadoBurstMetaField("textsimple","mkd_slide-button_line_height","","Line Height (px)","This is some description");
            $row2->addChild("mkd_slide-button_line_height",$button1_line_height);

            $button1_text_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_text_color","","Text Color","This is some description");
            $row2->addChild("mkd_slide-button_text_color",$button1_text_color);

            $button1_text_hover_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_text_hover_color","","Text Hover Color","This is some description");
            $row2->addChild("mkd_slide-button_text_hover_color",$button1_text_hover_color);

        $row3 = new MikadoBurstRow();
        $button1_group2->addChild("row3",$row3);

            $button1_text_align = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button_text_align","","Text Align","This is some description", array(
                "left" => "Left",
                "center" => "Center",
                "right" => "Right"
            ));
            $row3->addChild("mkd_slide-button_text_align",$button1_text_align);
            $button1_text_transform = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row3->addChild("mkd_slide-button_text_transform",$button1_text_transform);

    $button1_group3 = new MikadoBurstGroup("Background","Define background");
    $mkdSlideButtons->addChild("button1_group3",$button1_group3);

            $row1 = new MikadoBurstRow();
            $button1_group3->addChild("row1",$row1);

                $button1_background_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_background_color","","Background Color","This is some description");
                $row1->addChild("mkd_slide-button_background_color",$button1_background_color);

                $button1_background_hover_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_background_hover_color","","Background Hover Color","This is some description");
                $row1->addChild("mkd_slide-button_background_hover_color",$button1_background_hover_color);

    $button1_group4 = new MikadoBurstGroup("Size","Define button size");
    $mkdSlideButtons->addChild("button1_group4",$button1_group4);

        $row1 = new MikadoBurstRow();
        $button1_group4->addChild("row1",$row1);

            $button1_width = new MikadoBurstMetaField("textsimple","mkd_slide-button_width","","Width (px)","This is some description");
            $row1->addChild("mkd_slide-button_width",$button1_width);

            $button1_height = new MikadoBurstMetaField("textsimple","mkd_slide-button_height","","Height (px)","This is some description");
            $row1->addChild("mkd_slide-button_height",$button1_height);

    $button1_group5 = new MikadoBurstGroup("Border","Define border style");
    $mkdSlideButtons->addChild("button1_group5",$button1_group5);

        $row1 = new MikadoBurstRow();
        $button1_group5->addChild("row1",$row1);

            $button1_border_width = new MikadoBurstMetaField("textsimple","mkd_slide-button_border_width","","Border Width (px)","This is some description");
            $row1->addChild("mkd_slide-button_border_width",$button1_border_width);

            $button1_border_radius = new MikadoBurstMetaField("textsimple","mkd_slide-button_border_radius","","Border Radius (px)","This is some description");
            $row1->addChild("mkd_slide-button_border_radius",$button1_border_radius);

            $button1_border_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_border_color","","Border Color","This is some description");
            $row1->addChild("mkd_slide-button_border_color",$button1_border_color);

            $button1_border_hover_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_border_hover_color","","Border Hover Color","This is some description");
            $row1->addChild("mkd_slide-button_border_hover_color",$button1_border_hover_color);

            $button1_margin = new MikadoBurstMetaField("text","mkd_slide-button_margin1","","Margin (px)","Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px",array(), array("col_width" => 3));
            $mkdSlideButtons->addChild("mkd_slide-button_margin1",$button1_margin);

    $button1_group6 = new MikadoBurstGroup("Padding (px)","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px");
    $mkdSlideButtons->addChild("button1_group6",$button1_group6);

        $row1 = new MikadoBurstRow(true);
        $button1_group6->addChild("row1",$row1);

        $button1_padding = new MikadoBurstMetaField("textsimple","mkd_slide-button_padding","","","This is some description");
        $row1->addChild("mkd_slide-button_padding",$button1_padding);
		
	
	$button1_group7 = new MikadoBurstGroup("Button Hover Animation","Define hover animation for button");
    $mkdSlideButtons->addChild("button1_group7",$button1_group7);

        $row1 = new MikadoBurstRow(true);
        $button1_group7->addChild("row1",$row1);

			$button1_hover_button_animation = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button1_hover_button_animation","","Hover Animation","This is some description", array(
				"fill_from_top" => "Fill From Top",
				"fill_from_left" => "Fill From Left",
				"fill_from_bottom" => "Fill From Bottom"
			));
			$row1->addChild("mkd_slide-button1_hover_button_animation",$button1_hover_button_animation);		
		
		

    //init icon pack hide and show array. It will be populated dinamically from collections array
    $button1_icon_pack_hide_array = array();
    $button1_icon_pack_show_array = array();

    //do we have some collection added in collections array?
    if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
        //get collections params array. It will contain values of 'param' property for each collection
        $button1_icon_collections_params = $mkd_burst_IconCollections->getIconCollectionsParams();

        //foreach collection generate hide and show array
        foreach ($mkd_burst_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
            $button1_icon_pack_hide_array[$dep_collection_key] = '';
            $button1_icon_pack_hide_array["no_icon"] = "";

            //button1_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
            $button1_icon_pack_hide_array["no_icon"] .= "#mkdf_slider_button1_icon_size,";

            //we need to include only current collection in show string as it is the only one that needs to show
            $button1_icon_pack_show_array[$dep_collection_key] = '#mkdf_slider_button1_icon_size, #mkdf_button1_icon_'.$dep_collection_object->param.'_container';

            //for all collections param generate hide string
            foreach ($button1_icon_collections_params as $button1_icon_collections_param) {
                //we don't need to include current one, because it needs to be shown, not hidden
                if($button1_icon_collections_param !== $dep_collection_object->param) {
                    $button1_icon_pack_hide_array[$dep_collection_key].= '#mkdf_button1_icon_'.$button1_icon_collections_param.'_container,';
                }

                $button1_icon_pack_hide_array["no_icon"] .= '#mkdf_button1_icon_'.$button1_icon_collections_param.'_container,';
            }

            //remove remaining ',' character
            $button1_icon_pack_hide_array[$dep_collection_key] = rtrim($button1_icon_pack_hide_array[$dep_collection_key], ',');
            $button1_icon_pack_hide_array["no_icon"] = rtrim($button1_icon_pack_hide_array["no_icon"], ',');
        }

    }

    $button1_icon_pack = new MikadoBurstMetaField(
        "select",
        "button1_icon_pack",
        "no_icon",
        "Button 1 Icon Pack",
        "Choose icon pack for first button",
        $mkd_burst_IconCollections->getIconCollectionsEmpty("no_icon"),
        array(
            "dependence" => true,
            "hide" => $button1_icon_pack_hide_array,
            "show" => $button1_icon_pack_show_array
        ));

    $mkdSlideButtons->addChild("button1_icon_pack", $button1_icon_pack);

    if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
        //foreach icon collection we need to generate separate container that will have dependency set
        //it will have one field inside with icons dropdown
        foreach ($mkd_burst_IconCollections->iconCollections as $collection_key => $collection_object) {
            $icons_array = $collection_object->getIconsArray();

            //get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
            $icon_collections_keys = $mkd_burst_IconCollections->getIconCollectionsKeys();

            //unset current one, because it doesn't have to be included in dependency that hides icon container
            unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

            $button1_icon_hide_values = $icon_collections_keys;
            $button1_icon_hide_values[] = "no_icon";
            $button1_icon_container = new MikadoBurstContainer("button1_icon_".$collection_object->param."_container", "button1_icon_pack", "", $button1_icon_hide_values);
            $button1_icon = new MikadoBurstMetaField("select", "button1_icon_".$collection_object->param, "", "Button 1 Icon","Choose First Button Icon", $icons_array, array("col_width" => 3));
            $button1_icon_container->addChild("button1_icon_".$collection_object->param, $button1_icon);

            $mkdSlideButtons->addChild("button1_icon_".$collection_object->param."_container", $button1_icon_container);
        }

    }

    $slider_button1_icon_size = new MikadoBurstMetaField("text","slider_button1_icon_size","","Icon Size (px)","Define size for icon in button", array(), array("col_width" => 3),"button1_icon_pack", array("no_icon"));
    $mkdSlideButtons->addChild("slider_button1_icon_size",$slider_button1_icon_size);


//Button 2
    $button2_section = new MikadoBurstTitle("button2_section", "Button 2");
    $mkdSlideButtons->addChild("button2_section", $button2_section);

        $button2_group2 = new MikadoBurstGroup("Text Style","Define text style");
        $mkdSlideButtons->addChild("button2_group2",$button2_group2);
            $row1 = new MikadoBurstRow();
            $button2_group2->addChild("row1",$row1);

                $button2_font_family = new MikadoBurstMetaField("fontsimple","mkd_slide-button_font_family2","-1","Font Family","This is some description");
                $row1->addChild("mkd_slide-button_font_family2",$button2_font_family);
                $button2_font_size = new MikadoBurstMetaField("textsimple","mkd_slide-button_font_size2","","Font Size (px)","This is some description");
                $row1->addChild("mkd_slide-button_font_size2",$button2_font_size);
                $button2_font_style = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button_font_style2","","Font Style","This is some description",$mkd_burst_options_fontstyle);
                $row1->addChild("mkd_slide-button_font_style2",$button2_font_style);
                $button2_font_weight = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button_font_weight2","","Font Weight","This is some description",$mkd_burst_options_fontweight);
                $row1->addChild("mkd_slide-button_font_weight2",$button2_font_weight);

            $row2 = new MikadoBurstRow();
            $button2_group2->addChild("row2",$row2);
                $button2_letter_spacing= new MikadoBurstMetaField("textsimple","mkd_slide-button_letter_spacing2","","Letter Spacing(px)","This is some description");
                $row2->addChild("mkd_slide-button_letter_spacing2",$button2_letter_spacing);
                $button2_line_height = new MikadoBurstMetaField("textsimple","mkd_slide-button_line_height2","","Line Height (px)","This is some description");
                $row2->addChild("mkd_slide-button_line_height2",$button2_line_height);
                $button2_text_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_text_color2","","Text Color","This is some description");
                $row2->addChild("mkd_slide-button_text_color2",$button2_text_color);
                $button2_text_hover_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_text_hover_color2","","Text Hover Color","This is some description");
                $row2->addChild("mkd_slide-button_text_hover_color2",$button2_text_hover_color);

            $row3 = new MikadoBurstRow();
            $button2_group2->addChild("row3",$row3);
                $button2_text_align = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button_text_align2","","Text Align","This is some description", array(
                    "left" => "Left",
                    "center" => "Center",
                    "right" => "Right"
                ));
                $row3->addChild("mkd_slide-button_text_align2",$button2_text_align);
                $button2_text_transform = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button_text_transform2","","Text Transform","This is some description",$mkd_burst_options_texttransform);
                $row3->addChild("mkd_slide-button_text_transform2",$button2_text_transform);

        $button2_group3 = new MikadoBurstGroup("Background","Define background");
        $mkdSlideButtons->addChild("button2_group3",$button2_group3);
            $row4 = new MikadoBurstRow();
        $button2_group3->addChild("row4",$row4);
                $button2_background_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_background_color2","","Background Color","This is some description");
                $row4->addChild("mkd_slide-button_background_color2",$button2_background_color);
                $button2_background_hover_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_background_hover_color2","","Background Hover Color","This is some description");
                $row4->addChild("mkd_slide-button_background_hover_color2",$button2_background_hover_color);

        $button2_group4 = new MikadoBurstGroup("Size","Define button size");
        $mkdSlideButtons->addChild("button2_group4",$button2_group4);
            $row1 = new MikadoBurstRow();
            $button2_group4->addChild("row1",$row1);
                $button2_width = new MikadoBurstMetaField("textsimple","mkd_slide-button_width2","","Width (px)","This is some description");
                $row1->addChild("mkd_slide-button_width2",$button2_width);
                $button2_height = new MikadoBurstMetaField("textsimple","mkd_slide-button_height2","","Height (px)","This is some description");
                $row1->addChild("mkd_slide-button_height2",$button2_height);

        $button2_group5 = new MikadoBurstGroup("Border","Define border style");
        $mkdSlideButtons->addChild("button2_group5",$button2_group5);
            $row1 = new MikadoBurstRow();
            $button2_group5->addChild("row1",$row1);
                $button2_border_width = new MikadoBurstMetaField("textsimple","mkd_slide-button_border_width2","","Border Width (px)","This is some description");
                $row1->addChild("mkd_slide-button_border_width2",$button2_border_width);
                $button2_border_radius = new MikadoBurstMetaField("textsimple","mkd_slide-button_border_radius2","","Border Radius (px)","This is some description");
                $row1->addChild("mkd_slide-button_border_radius2",$button2_border_radius);
                $button2_border_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_border_color2","","Border Color","This is some description");
                $row1->addChild("mkd_slide-button_border_color2",$button2_border_color);
                $button2_border_hover_color = new MikadoBurstMetaField("colorsimple","mkd_slide-button_border_hover_color2","","Border Hover Color","This is some description");
                $row1->addChild("mkd_slide-button_border_hover_color2",$button2_border_hover_color);

        $button2_margin = new MikadoBurstMetaField("text","mkd_slide-button_margin2","","Margin (px)","Please insert margin in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
        $mkdSlideButtons->addChild("mkd_slide-button_margin2",$button2_margin);

        $button2_group6 = new MikadoBurstGroup("Padding (px)","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px");
        $mkdSlideButtons->addChild("button2_group6",$button2_group6);

            $row1 = new MikadoBurstRow(true);
            $button2_group6->addChild("row1",$row1);

            $button2_padding = new MikadoBurstMetaField("textsimple","mkd_slide-button_padding2","","","This is some description");
            $row1->addChild("mkd_slide-button_padding2",$button2_padding);
			
		$button2_group7 = new MikadoBurstGroup("Button Hover Animation","Define hover animation for button");
		$mkdSlideButtons->addChild("button2_group7",$button2_group7);

        $row1 = new MikadoBurstRow(true);
        $button2_group7->addChild("row1",$row1);

			$button2_hover_button_animation = new MikadoBurstMetaField("selectblanksimple","mkd_slide-button2_hover_button_animation","","Hover Animation","This is some description", array(
				"fill_from_top" => "Fill From Top",
				"fill_from_left" => "Fill From Left",
				"fill_from_bottom" => "Fill From Bottom"
			));
			$row1->addChild("mkd_slide-button2_hover_button_animation",$button2_hover_button_animation);

    //init icon pack hide and show array. It will be populated dinamically from collections array
    $button2_icon_pack_hide_array = array();
    $button2_icon_pack_show_array = array();
    
    //do we have some collection added in collections array?
    if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
        //get collections params array. It will contain values of 'param' property for each collection
        $button2_icon_collections_params = $mkd_burst_IconCollections->getIconCollectionsParams();
    
        //foreach collection generate hide and show array
        foreach ($mkd_burst_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
            $button2_icon_pack_hide_array[$dep_collection_key] = '';
            $button2_icon_pack_hide_array["no_icon"] = "";

            //button2_icon_size is input that is always shown when some icon pack is activated and hidden if 'no_icon' is selected
            $button2_icon_pack_hide_array["no_icon"] .= "#mkdf_slider_button2_icon_size,";
    
            //we need to include only current collection in show string as it is the only one that needs to show
            $button2_icon_pack_show_array[$dep_collection_key] = '#mkdf_slider_button2_icon_size,#mkdf_button2_icon_'.$dep_collection_object->param.'_container';
    
            //for all collections param generate hide string
            foreach ($button2_icon_collections_params as $button2_icon_collections_param) {
                //we don't need to include current one, because it needs to be shown, not hidden
                if($button2_icon_collections_param !== $dep_collection_object->param) {
                    $button2_icon_pack_hide_array[$dep_collection_key].= '#mkdf_button2_icon_'.$button2_icon_collections_param.'_container,';
                }
    
                $button2_icon_pack_hide_array["no_icon"] .= '#mkdf_button2_icon_'.$button2_icon_collections_param.'_container,';
            }
    
            //remove remaining ',' character
            $button2_icon_pack_hide_array[$dep_collection_key] = rtrim($button2_icon_pack_hide_array[$dep_collection_key], ',');
            $button2_icon_pack_hide_array["no_icon"] = rtrim($button2_icon_pack_hide_array["no_icon"], ',');
        }
    
    }
    
    $button2_icon_pack = new MikadoBurstMetaField(
        "select",
        "button2_icon_pack",
        "no_icon",
        "Button 2 Icon Pack",
        "Choose icon pack for first button",
        $mkd_burst_IconCollections->getIconCollectionsEmpty("no_icon"),
        array(
            "dependence" => true,
            "hide" => $button2_icon_pack_hide_array,
            "show" => $button2_icon_pack_show_array
        ));
    
    $mkdSlideButtons->addChild("button2_icon_pack", $button2_icon_pack);
    
    if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
        //foreach icon collection we need to generate separate container that will have dependency set
        //it will have one field inside with icons dropdown
        foreach ($mkd_burst_IconCollections->iconCollections as $collection_key => $collection_object) {
            $icons_array = $collection_object->getIconsArray();
    
            //get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
            $icon_collections_keys = $mkd_burst_IconCollections->getIconCollectionsKeys();
    
            //unset current one, because it doesn't have to be included in dependency that hides icon container
            unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);
    
            $button2_icon_hide_values = $icon_collections_keys;
            $button2_icon_hide_values[] = "no_icon";
            $button2_icon_container = new MikadoBurstContainer("button2_icon_".$collection_object->param."_container", "button2_icon_pack", "", $button2_icon_hide_values);
            $button2_icon = new MikadoBurstMetaField("select", "button2_icon_".$collection_object->param, "", "Button 2 Icon","Choose First Button Icon", $icons_array, array("col_width" => 3));
            $button2_icon_container->addChild("button2_icon_".$collection_object->param, $button2_icon);
    
            $mkdSlideButtons->addChild("button2_icon_".$collection_object->param."_container", $button2_icon_container);
        }
    
    }

    $slider_button2_icon_size = new MikadoBurstMetaField("text","slider_button2_icon_size","","Icon Size (px)","Define size for icon in button", array(), array("col_width" => 3),"button2_icon_pack", array("no_icon"));
    $mkdSlideButtons->addChild("slider_button2_icon_size",$slider_button2_icon_size);


//Slide Content Positioning

$mkdSlideContentPositioning = new MikadoBurstMetaBox("slides", "Slide Content Positioning");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("slides_content_positioning",$mkdSlideContentPositioning);
	
	$mkd_slide_predefined_content_position = new MikadoBurstMetaField("selectblank","mkd_slide_predefined_content_position","","Predefined content position","Choose position of slide content", array(
	    "" => "",
		"content_bottom_left" => "Bottom Left",
		"content_bottom_right" => "Bottom Right"
	),
	array("dependence" => true,
      	"hide" => array(
      		""=>"#mkdf_mkd_slide_predefined_content_position_width_container",
			"content_bottom_left" => "#mkdf_mkd_slide_predefined_content_position_container",
			"content_bottom_right" => "#mkdf_mkd_slide_predefined_content_position_container"),
      	"show" => array(
      		""=>"#mkdf_mkd_slide_predefined_content_position_container",
			"content_bottom_left" => "#mkdf_mkd_slide_predefined_content_position_width_container",
			"content_bottom_right" => "#mkdf_mkd_slide_predefined_content_position_width_container")
	));
	$mkdSlideContentPositioning->addChild("mkd_slide_predefined_content_position",$mkd_slide_predefined_content_position);
	
	$mkd_slide_predefined_content_position_width_container = new MikadoBurstContainerNoStyle("mkd_slide_predefined_content_position_width_container","mkd_slide_predefined_content_position","");
    $mkdSlideContentPositioning->addChild("mkd_slide_predefined_content_position_width_container",$mkd_slide_predefined_content_position_width_container);
	
		$mkd_slide_predefined_content_position_width = new MikadoBurstMetaField("text","mkd_slide_predefined_content_position_width","","Content Width","Enter Width for Content Area (px)",array(), array("col_width" => 3));
		$mkd_slide_predefined_content_position_width_container->addChild("mkd_slide_predefined_content_position_width",$mkd_slide_predefined_content_position_width);

        $mkd_slide_predefined_content_position_width_fs = new MikadoBurstMetaField("text","mkd_slide_predefined_content_position_width_fs","","Content Width (smaller devices)","Enter Width for Content Area (px) on smaller devices (1000px - 1350px)",array(), array("col_width" => 3));
        $mkd_slide_predefined_content_position_width_container->addChild("mkd_slide_predefined_content_position_width_fs",$mkd_slide_predefined_content_position_width_fs);
	
	$mkd_slide_predefined_content_position_container = new MikadoBurstContainerNoStyle("mkd_slide_predefined_content_position_container","mkd_slide_predefined_content_position","content_bottom_left",array( "content_bottom_left","content_bottom_right"));
    $mkdSlideContentPositioning->addChild("mkd_slide_predefined_content_position_container",$mkd_slide_predefined_content_position_container);
	
		$mkd_slide_text_alignment = new MikadoBurstMetaField("selectblank","mkd_slide-content-alignment","","Text Alignment","Choose an alignment for the slide text", array(
			"left" => "Left",
			"center" => "Center",
			"right" => "Right"
		));
		$mkd_slide_predefined_content_position_container->addChild("mkd_slide-content-alignment",$mkd_slide_text_alignment);
		
		$mkd_slide_separate_text_graphic = new MikadoBurstMetaField("selectblank","mkd_slide-separate-text-graphic","no","Separate Graphic and Text Positioning","Do you want to separately position graphic and text?", array(
			"no" => "No",
			"yes" => "Yes"
		), array("dependence" => true,
				 "hide" => array(
					"" => "#mkdf_mkd_slide_graphic_positioning_container, #mkdf_mkd_slide_general_animation_separate_container",
					"no" => "#mkdf_mkd_slide_graphic_positioning_container, #mkdf_mkd_slide_general_animation_separate_container, #mkdf_mkd_content_vertical_positioning_group_container"
				 ),
				 "show" => array(
					 "yes" => "#mkdf_mkd_slide_graphic_positioning_container, #mkdf_mkd_slide_general_animation_separate_container, #mkdf_mkd_content_vertical_positioning_group_container"
				 )));
		$mkd_slide_predefined_content_position_container->addChild("mkd_slide-separate-text-graphic",$mkd_slide_separate_text_graphic);



		$mkd_slide_content_vertical_middle = new MikadoBurstMetaField("yesno","mkd_slide-content-vertical-middle","no","Vertically Align Content to Middle","", array(), array("dependence" => true, "dependence_hide_on_yes" => "#mkdf_mkd_slide-content-vertical-middle-container", "dependence_show_on_yes" => "#mkdf_mkd_slide-content-vertical-middle-type-container"));
		$mkd_slide_predefined_content_position_container->addChild("mkd_slide-content-vertical-middle",$mkd_slide_content_vertical_middle);

		$mkd_slide_content_vertical_middle_type_container = new MikadoBurstContainer("mkd_slide-content-vertical-middle-type-container","mkd_slide-content-vertical-middle","no");
		$mkd_slide_predefined_content_position_container->addChild("mkd_slide-content-vertical-middle-type-container",$mkd_slide_content_vertical_middle_type_container);

			$mkd_slide_content_vertical_middle_type = new MikadoBurstMetaField("selectblank","mkd_slide-content-vertical-middle-type","","Align Content Vertically Relative to the Height Measured From","", array(
				"bottom_of_header" => "Bottom of Header",
				"window_top" => "Window Top"
			));
			$mkd_slide_content_vertical_middle_type_container->addChild("mkd_slide-content-vertical-middle-type",$mkd_slide_content_vertical_middle_type);
			
			$mkd_slide_vertical_content_full_width = new MikadoBurstMetaField("yesno","mkd_slide_vertical_content_full_width","no","Content Holder Full Width","Do you want to set slide content holder to full width?");
			$mkd_slide_content_vertical_middle_type_container->addChild("mkd_slide_vertical_content_full_width",$mkd_slide_vertical_content_full_width);
			
			$mkd_slide_vertical_content_width = new MikadoBurstMetaField("text","mkd_slide_vertical_content_width","","Content Width","Enter Width for Content Area (%)",array(), array("col_width" => 3));
			$mkd_slide_content_vertical_middle_type_container->addChild("mkd_slide_vertical_content_width",$mkd_slide_vertical_content_width);

			$content_vertical_positioning_group = new MikadoBurstGroup("Space Around Content in Slide","Enter values for margins around slide content");
			$mkd_slide_content_vertical_middle_type_container->addChild("content_vertical_positioning_group",$content_vertical_positioning_group);
				$row1 = new MikadoBurstRow(true);
				$content_vertical_positioning_group->addChild("row1",$row1);
					$mkd_slide_vertical_content_left = new MikadoBurstMetaField("textsimple","mkd_slide_vertical_content_left","","From Left (%)","This is some description");
					$row1->addChild("mkd_slide_vertical_content_left",$mkd_slide_vertical_content_left);
					$mkd_slide_vertical_content_right = new MikadoBurstMetaField("textsimple","mkd_slide_vertical_content_right","","From Right (%)","This is some description");
					$row1->addChild("mkd_slide_vertical_content_right",$mkd_slide_vertical_content_right);

		$mkd_slide_content_vertical_middle_container = new MikadoBurstContainer("mkd_slide-content-vertical-middle-container","mkd_slide-content-vertical-middle","yes");
		$mkd_slide_predefined_content_position_container->addChild("mkd_slide-content-vertical-middle-container",$mkd_slide_content_vertical_middle_container);

			$mkd_slide_content_full_width = new MikadoBurstMetaField("yesno","mkd_slide-content-full-width","no","Content Holder Full Width","Do you want to set slide content holder to full width?", array(), array("dependence" => true, "dependence_hide_on_yes" => "#mkdf_mkd_slide_content_width_container", "dependence_show_on_yes" => ""));
			$mkd_slide_content_vertical_middle_container->addChild("mkd_slide-content-full-width",$mkd_slide_content_full_width);

			$mkd_slide_content_width_container = new MikadoBurstContainer("mkd_slide_content_width_container","mkd_slide-content-full-width","yes");
			$mkd_slide_content_vertical_middle_container->addChild("mkd_slide_content_width_container",$mkd_slide_content_width_container);

			$mkd_slide_content_width = new MikadoBurstMetaField("text","mkd_slide-content-width","","Content Holder Width","Enter Width for Content Holder Area (%)",array(), array("col_width" => 3));
			$mkd_slide_content_width_container->addChild("mkd_slide-content-width",$mkd_slide_content_width);

			$content_positioning_group = new MikadoBurstGroup("Space Around Content in Slide","Enter values for margins around slide content");
			$mkd_slide_content_vertical_middle_container->addChild("content_positioning_group",$content_positioning_group);
				$row1 = new MikadoBurstRow(true);
				$content_positioning_group->addChild("row1",$row1);
					$mkd_slide_content_top = new MikadoBurstMetaField("textsimple","mkd_slide-content-top","","From Top (%)","This is some description");
					$row1->addChild("mkd_slide-content-top",$mkd_slide_content_top);
					$mkd_slide_content_left = new MikadoBurstMetaField("textsimple","mkd_slide-content-left","","From Left (%)","This is some description");
					$row1->addChild("mkd_slide-content-left",$mkd_slide_content_left);
					$mkd_slide_content_bottom = new MikadoBurstMetaField("textsimple","mkd_slide-content-bottom","","From Bottom (%)","This is some description");
					$row1->addChild("mkd_slide-content-bottom",$mkd_slide_content_bottom);
					$mkd_slide_content_right = new MikadoBurstMetaField("textsimple","mkd_slide-content-right","","From Right (%)","This is some description");
					$row1->addChild("mkd_slide-content-right",$mkd_slide_content_right);
					
				$row2 = new MikadoBurstRow(true);
                $content_positioning_group->addChild("row2",$row2);
					$mkd_content_vertical_positioning_group_container = new MikadoBurstContainerNoStyle("mkd_content_vertical_positioning_group_container","mkd_slide-separate-text-graphic","no");
					$row2->addChild("mkd_content_vertical_positioning_group_container",$mkd_content_vertical_positioning_group_container);
						$mkd_slide_content_text_width = new MikadoBurstMetaField("textsimple","mkd_slide-text-width","","Text Holder Width (%)","This is some description");
						$mkd_content_vertical_positioning_group_container->addChild("mkd_slide-text-width",$mkd_slide_content_text_width);


		$mkd_slide_graphic_positioning_container = new MikadoBurstContainer("mkd_slide_graphic_positioning_container","mkd_slide-separate-text-graphic","no");
		$mkd_slide_content_vertical_middle_container->addChild("mkd_slide_graphic_positioning_container",$mkd_slide_graphic_positioning_container);


		$mkd_slide_graphic_alignment = new MikadoBurstMetaField("selectblank","mkd_slide-graphic-alignment","","Graphic Alignment","Choose an alignment for the slide graphic", array(
			"left" => "Left",
			"center" => "Center",
			"right" => "Right"
		));
		$mkd_slide_graphic_positioning_container->addChild("mkd_slide-graphic-alignment",$mkd_slide_graphic_alignment);

		$graphic_positioning_group = new MikadoBurstGroup("Graphic Positioning","Positioning for slide graphic");
		$mkd_slide_graphic_positioning_container->addChild("graphic_positioning_group",$graphic_positioning_group);

		
			$row1 = new MikadoBurstRow();
			$graphic_positioning_group->addChild("row1",$row1);

				$mkd_slide_content_top = new MikadoBurstMetaField("textsimple","mkd_slide-graphic-top","","From Top (%)","This is some description");
				$row1->addChild("mkd_slide-graphic-top",$mkd_slide_content_top);

				$mkd_slide_content_left = new MikadoBurstMetaField("textsimple","mkd_slide-graphic-left","","From Left (%)","This is some description");
				$row1->addChild("mkd_slide-graphic-left",$mkd_slide_content_left);

				$mkd_slide_content_bottom = new MikadoBurstMetaField("textsimple","mkd_slide-graphic-bottom","","From Bottom (%)","This is some description");
				$row1->addChild("mkd_slide-graphic-bottom",$mkd_slide_content_bottom);

				$mkd_slide_content_right = new MikadoBurstMetaField("textsimple","mkd_slide-graphic-right","","From Right (%)","This is some description");
				$row1->addChild("mkd_slide-graphic-right",$mkd_slide_content_right);

			$row2 = new MikadoBurstRow(true);
			$graphic_positioning_group->addChild("row2",$row2);

				$mkd_slide_content_width = new MikadoBurstMetaField("textsimple","mkd_slide-graphic-width","","Graphic Holder Width (%)","This is some description");
				$row2->addChild("mkd_slide-graphic-width",$mkd_slide_content_width);

    $mkd_slide_content_padding = new MikadoBurstMetaField("text","mkd_slide-content-text-padding","","Slide Content Text Padding","Define some padding around text (top right bottom left) - Default value is 0px 0px 0px 0px");
    $mkdSlideContentPositioning->addChild("mkd_slide-content-text-padding",$mkd_slide_content_padding);    