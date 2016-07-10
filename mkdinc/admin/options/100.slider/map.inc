<?php

$sliderPage = new MikadoBurstAdminPage("10", "Sliders", "arrow_left-right");
$mkd_burst_Framework->mkdOptions->addAdminPage("slider",$sliderPage);

$panel_mikado_slider = new MikadoBurstPanel('Mikado Slider', 'panel_mikado_slider');
$sliderPage->addChild('panel_mikado_slider', $panel_mikado_slider);


    $qs_slider_height_mobile = new MikadoBurstField("text","qs_slider_height_mobile","","Slider Height For Mobile Devices (px)","Define slider height for mobile devices");
    $panel_mikado_slider->addChild("qs_slider_height_mobile",$qs_slider_height_mobile);

	$qs_slider_preloader_background = new MikadoBurstField("color","qs_slider_preloader_background","","Slider Preloader Background Color","Define background color for slider preloader");
    $panel_mikado_slider->addChild("qs_slider_preloader_background",$qs_slider_preloader_background);

// Navigation Control Style

$slider_navigation_style_title = new MikadoBurstTitle('slider_navigation_style_title', 'Navigation Bullets Style');
$panel_mikado_slider->addChild("slider_navigation_style_title",$slider_navigation_style_title);

	$group1 = new MikadoBurstGroup("Colors","Choose color styles for navigation bullets");
	$panel_mikado_slider->addChild("group1",$group1);

		$row1 = new MikadoBurstRow();
		$group1->addChild("row1",$row1);

			$qs_navigation_control_color = new MikadoBurstField("colorsimple","qs_navigation_control_color","","Color","This is some description");
			$row1->addChild("qs_navigation_control_color",$qs_navigation_control_color);

			$qs_navigation_control_transparency = new MikadoBurstField("textsimple","qs_navigation_control_transparency","","Color Transparency (0-1)","This is some description");
			$row1->addChild("qs_navigation_control_transparency",$qs_navigation_control_transparency);

			$qs_navigation_control_active_color = new MikadoBurstField("colorsimple","qs_navigation_control_active_color","","Active Color","This is some description");
			$row1->addChild("qs_navigation_control_active_color",$qs_navigation_control_active_color);

			$qs_navigation_control_active_transparency = new MikadoBurstField("textsimple","qs_navigation_control_active_transparency","","Active Color Transparency(0-1)","This is some description");
			$row1->addChild("qs_navigation_control_active_transparency",$qs_navigation_control_active_transparency);

	$group2 = new MikadoBurstGroup("Size","Define size for navigation bullets controls (w=h in px)");
	$panel_mikado_slider->addChild("group2",$group2);

		$row1 = new MikadoBurstRow();
		$group2->addChild("row1",$row1);

			$qs_navigation_control_size = new MikadoBurstField("textsimple","qs_navigation_control_size","","Size (px)","This is some description");
			$row1->addChild("qs_navigation_control_size",$qs_navigation_control_size);

			$qs_navigation_control_active_size = new MikadoBurstField("textsimple","qs_navigation_control_active_size","","Active Size (px)","This is some description");
			$row1->addChild("qs_navigation_control_active_size",$qs_navigation_control_active_size);

	$group3 = new MikadoBurstGroup("Border Style","Define border style for navigation bullets");
	$panel_mikado_slider->addChild("group3",$group3);

		$row1 = new MikadoBurstRow();
		$group3->addChild("row1",$row1);

			$qs_navigation_control_border_color = new MikadoBurstField("colorsimple","qs_navigation_control_border_color","","Border Color","This is some description");
			$row1->addChild("qs_navigation_control_border_color",$qs_navigation_control_border_color);

			$qs_navigation_control_brd_transparency = new MikadoBurstField("textsimple","qs_navigation_control_brd_transparency","","Border Transparency (0-1)","This is some description");
			$row1->addChild("qs_navigation_control_brd_transparency",$qs_navigation_control_brd_transparency);

			$qs_navigation_control_active_border_color = new MikadoBurstField("colorsimple","qs_navigation_control_active_border_color","","Active Border Color","This is some description");
			$row1->addChild("qs_navigation_control_active_border_color",$qs_navigation_control_active_border_color);

			$qs_navigation_control_active_brd_transparency = new MikadoBurstField("textsimple","qs_navigation_control_active_brd_transparency","","Active Border Transparency (0-1)","This is some description");
			$row1->addChild("qs_navigation_control_active_brd_transparency",$qs_navigation_control_active_brd_transparency);

		$row2 = new MikadoBurstRow();
		$group3->addChild("row2",$row2);

			$qs_navigation_control_border_radius = new MikadoBurstField("textsimple","qs_navigation_control_border_radius","","Border Radius (px)","This is some description");
			$row2->addChild("qs_navigation_control_border_radius",$qs_navigation_control_border_radius);

// Custom cursor navigation style

$navigation_custom_cursor = new MikadoBurstTitle('navigation_custom_cursor', 'Custom Cursor Navigation Style');
$panel_mikado_slider->addChild("navigation_custom_cursor",$navigation_custom_cursor);

	$qs_enable_navigation_custom_cursor = new MikadoBurstField("yesno","qs_enable_navigation_custom_cursor","no","Enable Custom Cursor for Navigation","Enabling this option will display custom cursors for slider navigation", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_qs_enable_navigation_custom_cursor_container"));
	$panel_mikado_slider->addChild("qs_enable_navigation_custom_cursor",$qs_enable_navigation_custom_cursor);
	
	
		$qs_enable_navigation_custom_cursor_container = new MikadoBurstContainer("qs_enable_navigation_custom_cursor_container","qs_enable_navigation_custom_cursor","no");
		$panel_mikado_slider->addChild("qs_enable_navigation_custom_cursor_container",$qs_enable_navigation_custom_cursor_container);
		
			$cursor_image_left_right_area_size = new MikadoBurstField("text","cursor_image_left_right_area_size","","Clickable Left/Right Area Size (%)","Define size of clickable left/right slider area in relation to slider width (default value is 8%)", array(), array("col_width" => 3));
			$qs_enable_navigation_custom_cursor_container->addChild("cursor_image_left_right_area_size",$cursor_image_left_right_area_size);
		
			$cursor_image_left_normal = new MikadoBurstField("image","cursor_image_left_normal","","Cursor Image 'Left' - Normal","Choose a default cursor 'Left' image to display ");
			$qs_enable_navigation_custom_cursor_container->addChild("cursor_image_left_normal",$cursor_image_left_normal);
			
			$cursor_image_right_normal = new MikadoBurstField("image","cursor_image_right_normal","","Cursor Image 'Right' - Normal","Choose a default cursor 'Right' image to display ");
			$qs_enable_navigation_custom_cursor_container->addChild("cursor_image_right_normal",$cursor_image_right_normal);
			
			
			$cursor_image_left_light = new MikadoBurstField("image","cursor_image_left_light","","Cursor Image 'Left' - Light","Choose a cursor 'Left' light image to display ");
			$qs_enable_navigation_custom_cursor_container->addChild("cursor_image_left_light",$cursor_image_left_light);
			
			$cursor_image_right_light = new MikadoBurstField("image","cursor_image_right_light","","Cursor Image 'Right' - Light","Choose a cursor 'Right' light image to display ");
			$qs_enable_navigation_custom_cursor_container->addChild("cursor_image_right_light",$cursor_image_right_light);
			
			$cursor_image_left_dark = new MikadoBurstField("image","cursor_image_left_dark","","Cursor Image 'Left' - Dark","Choose a cursor 'Left' dark image to display ");
			$qs_enable_navigation_custom_cursor_container->addChild("cursor_image_left_dark",$cursor_image_left_dark);
			
			$cursor_image_right_dark = new MikadoBurstField("image","cursor_image_right_dark","","Cursor Image 'Right' - Dark","Choose a cursor 'Right' dark image to display ");
			$qs_enable_navigation_custom_cursor_container->addChild("cursor_image_right_dark",$cursor_image_right_dark);
			

		$qs_enable_navigation_custom_cursor_grab = new MikadoBurstField("yesno","qs_enable_navigation_custom_cursor_grab","no","Enable Custom Cursor for 'Grab' Arrow","Enabling this option will display custom cursor for slider 'Grab' arrow", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_qs_enable_navigation_custom_cursor_grab_container"));
		$qs_enable_navigation_custom_cursor_container->addChild("qs_enable_navigation_custom_cursor_grab",$qs_enable_navigation_custom_cursor_grab);
			
			$qs_enable_navigation_custom_cursor_grab_container = new MikadoBurstContainer("qs_enable_navigation_custom_cursor_grab_container","qs_enable_navigation_custom_cursor_grab","no");
			$qs_enable_navigation_custom_cursor_container->addChild("qs_enable_navigation_custom_cursor_grab_container",$qs_enable_navigation_custom_cursor_grab_container);
			
				$cursor_image_grab_normal = new MikadoBurstField("image","cursor_image_grab_normal","","Cursor Image 'Grab' - Normal","Choose a default cursor 'Grab' image to display");
				$qs_enable_navigation_custom_cursor_grab_container->addChild("cursor_image_grab_normal",$cursor_image_grab_normal);
				
				$cursor_image_grab_light = new MikadoBurstField("image","cursor_image_grab_light","","Cursor Image 'Grab' - Light","Choose a cursor 'Grab' light image to display");
				$qs_enable_navigation_custom_cursor_grab_container->addChild("cursor_image_grab_light",$cursor_image_grab_light);
				
				$cursor_image_grab_dark = new MikadoBurstField("image","cursor_image_grab_dark","","Cursor Image 'Grab' - Dark","Choose a cursor 'Grab' dark image to display");
				$qs_enable_navigation_custom_cursor_grab_container->addChild("cursor_image_grab_dark",$cursor_image_grab_dark);

//Vertical Split Slider
$panel_vss = new MikadoBurstPanel("Vertical Split Slider","panel_vss");
$sliderPage->addChild("panel_vss",$panel_vss);

$group1 = new MikadoBurstGroup("Navigation Style","Define style for navigation bullets");
$panel_vss->addChild("group1",$group1);

$row1 = new MikadoBurstRow();
$group1->addChild("row1",$row1);

$vss_navigation_inactive_color = new MikadoBurstField("colorsimple","vss_navigation_inactive_color","","Navigation Color","Define color for navigation dots");
$row1->addChild("vss_navigation_inactive_color",$vss_navigation_inactive_color);

$vss_navigation_inactive_border_color = new MikadoBurstField("colorsimple","vss_navigation_inactive_border_color","","Navigation Border Color","Define border color for navigation dots");
$row1->addChild("vss_navigation_inactive_border_color",$vss_navigation_inactive_border_color);

$vss_navigation_color = new MikadoBurstField("colorsimple","vss_navigation_color","","Navigation Active Color","Define active color for navigation dots");
$row1->addChild("vss_navigation_color",$vss_navigation_color);

$vss_navigation_border_color = new MikadoBurstField("colorsimple","vss_navigation_border_color","","Navigation Active Border Color","Define active border color for navigation dots");
$row1->addChild("vss_navigation_border_color",$vss_navigation_border_color);

$group2 = new MikadoBurstGroup("Navigation Light Style","Define style for light navigation bullets");
$panel_vss->addChild("group2",$group2);

$row1 = new MikadoBurstRow();
$group2->addChild("row1",$row1);

$vss_navigation_light_inactive_color = new MikadoBurstField("colorsimple","vss_navigation_light_inactive_color","","Navigation Color","Define color for navigation dots");
$row1->addChild("vss_navigation_light_inactive_color",$vss_navigation_light_inactive_color);

$vss_navigation_light_inactive_border_color = new MikadoBurstField("colorsimple","vss_navigation_light_inactive_border_color","","Navigation Border Color","Define border color for navigation dots");
$row1->addChild("vss_navigation_light_inactive_border_color",$vss_navigation_light_inactive_border_color);

$vss_navigation_light_color = new MikadoBurstField("colorsimple","vss_navigation_light_color","","Navigation Active Color","Define active color for navigation dots");
$row1->addChild("vss_navigation_light_color",$vss_navigation_light_color);

$vss_navigation_light_border_color = new MikadoBurstField("colorsimple","vss_navigation_light_border_color","","Navigation Active Border Color","Define active border color for navigation dots");
$row1->addChild("vss_navigation_light_border_color",$vss_navigation_light_border_color);

$group3 = new MikadoBurstGroup("Navigation Dark Style","Define style for dark navigation bullets");
$panel_vss->addChild("group3",$group3);

$row1 = new MikadoBurstRow();
$group3->addChild("row1",$row1);

$vss_navigation_dark_inactive_color = new MikadoBurstField("colorsimple","vss_navigation_dark_inactive_color","","Navigation Color","Define color for navigation dots");
$row1->addChild("vss_navigation_dark_inactive_color",$vss_navigation_dark_inactive_color);

$vss_navigation_dark_inactive_border_color = new MikadoBurstField("colorsimple","vss_navigation_dark_inactive_border_color","","Navigation Border Color","Define border color for navigation dots");
$row1->addChild("vss_navigation_dark_inactive_border_color",$vss_navigation_dark_inactive_border_color);

$vss_navigation_dark_color = new MikadoBurstField("colorsimple","vss_navigation_dark_color","","Navigation Active Color","Define active color for navigation dots");
$row1->addChild("vss_navigation_dark_color",$vss_navigation_dark_color);

$vss_navigation_dark_border_color = new MikadoBurstField("colorsimple","vss_navigation_dark_border_color","","Navigation Active Border Color","Define active border color for navigation dots");
$row1->addChild("vss_navigation_dark_border_color",$vss_navigation_dark_border_color);

$group4 = new MikadoBurstGroup("Navigation Size","Define size for navigation dots");
$panel_vss->addChild("group4",$group4);

$row1 = new MikadoBurstRow();
$group4->addChild("row1",$row1);

$vss_navigation_size = new MikadoBurstField("textsimple","vss_navigation_size","","Size (px)","Define size for navigation dots");
$row1->addChild("vss_navigation_size",$vss_navigation_size);

$vss_navigation_active_size = new MikadoBurstField("textsimple","vss_navigation_active_size","","Active Size (px)","Define active size for navigation dots");
$row1->addChild("vss_navigation_active_size",$vss_navigation_active_size);

$vss_navigation_spacing_from_edge = new MikadoBurstField("text","vss_navigation_spacing_from_edge","","Navigation Position (px)","Define position of navigation from right/left edge of slider", array(), array("col_width" => 1));
$panel_vss->addChild("vss_navigation_spacing_from_edge",$vss_navigation_spacing_from_edge);

$vss_left_panel_size = new MikadoBurstField("text","vss_left_panel_size","","Left Slide Panel size (%)","Define size for left slide panel. Note that sum of left and right slide panel should be 100.", array(), array("col_width" => 1));
$panel_vss->addChild("vss_left_panel_size",$vss_left_panel_size);

$vss_right_panel_size = new MikadoBurstField("text","vss_right_panel_size","","Right Slide Panel size (%)","Define size for right slide panel. Note that sum of left and right slide panel should be 100.", array(), array("col_width" => 1));
$panel_vss->addChild("vss_right_panel_size",$vss_right_panel_size);
				
	