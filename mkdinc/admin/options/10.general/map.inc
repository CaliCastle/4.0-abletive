<?php
global $mkd_burst_IconCollections;

$generalPage = new MikadoBurstAdminPage("", "General", "icon_building");
$mkd_burst_Framework->mkdOptions->addAdminPage("general",$generalPage);

//Branding Panel
$branding_panel = new MikadoBurstPanel("Branding", "branding_panel");
$generalPage->addChild("branding_panel",$branding_panel);

$show_logo = new MikadoBurstField("yesno","show_logo","yes","Show Logo","Disabling this option will hide logo", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_show_logo_container"));
$branding_panel->addChild("show_logo",$show_logo);

$show_logo_container = new MikadoBurstContainer("show_logo_container","show_logo","no");
$branding_panel->addChild("show_logo_container",$show_logo_container);

    $logo_image = new MikadoBurstField("image","logo_image",MIKADO_ROOT."/img/logo.png","Logo Image - Normal","Choose a default logo image to display ");
    $show_logo_container->addChild("logo_image",$logo_image);

    $logo_image_light = new MikadoBurstField("image","logo_image_light",MIKADO_ROOT."/img/logo_white.png","Logo Image - Light",'Choose a logo image to display for "Light" header skin');
    $show_logo_container->addChild("logo_image_light",$logo_image_light);

    $logo_image_dark = new MikadoBurstField("image","logo_image_dark",MIKADO_ROOT."/img/logo_black.png","Logo Image - Dark",'Choose a logo image to display for "Dark" header skin');
    $show_logo_container->addChild("logo_image_dark",$logo_image_dark);

    $logo_image_sticky = new MikadoBurstField("image","logo_image_sticky",MIKADO_ROOT."/img/logo_black.png","Logo Image - Sticky Header",'Choose a logo image to display for "Sticky" header type');
    $show_logo_container->addChild("logo_image_sticky",$logo_image_sticky);

    $logo_image_fixed_hidden = new MikadoBurstField("image","logo_image_fixed_hidden","","Logo Image - Fixed Advanced Header",'Choose a logo image to display for "Fixed Advanced" header type');
    $show_logo_container->addChild("logo_image_fixed_hidden",$logo_image_fixed_hidden);

    $logo_image_mobile = new MikadoBurstField("image","logo_image_mobile","","Logo Image - Mobile Header",'Choose a logo image to display for "Mobile" header type');
    $show_logo_container->addChild("logo_image_mobile",$logo_image_mobile);

    $vertical_logo_bottom = new MikadoBurstField("image","vertical_logo_bottom","","Logo Image - Side Menu Area Bottom", 'Choose a logo image to display on the bottom of side menu area for "Initially Hidden" side menu area type');
    $show_logo_container->addChild("vertical_logo_bottom", $vertical_logo_bottom);

    $content_menu_logo_image = new MikadoBurstField("image","content_menu_logo_image","","Logo Image - Content Menu", 'Choose a logo image to display on the Content Menu');
    $show_logo_container->addChild("content_menu_logo_image", $content_menu_logo_image);

// Design Style

$panel1 = new MikadoBurstPanel("Appearance","design_style");
$generalPage->addChild("panel1",$panel1);

    $first_color_title = new MikadoBurstTitle('first_color_title', 'First Color');
    $panel1->addChild('first_color_title', $first_color_title);

    $first_color = new MikadoBurstField("color","first_color","","First Main Color","Choose the most dominant theme color. Default color is #e6ae48.");
	$panel1->addChild("first_color",$first_color);

    $transparent_content_title = new MikadoBurstTitle('transparent_content_title', 'Uniform Site Background');
    $panel1->addChild('transparent_content_title', $transparent_content_title);

    $transparent_content = new MikadoBurstField("yesno","transparent_content","no","Enable Uniform Site Background","If enabled, content background on pages will be transparent (unless set otherwise) and the background you set here will show", array(),
        array("dependence" => true,
              "dependence_hide_on_yes" => "",
              "dependence_show_on_yes" => "#mkdf_transparent_content_container"));
    $panel1->addChild("transparent_content",$transparent_content);

    $transparent_content_container = new MikadoBurstContainer("transparent_content_container","transparent_content","no");
    $panel1->addChild("transparent_content_container",$transparent_content_container);

        $transparent_content_background_color = new MikadoBurstField("color","transparent_content_background_color","","Background Color","Choose body background color. Default color is #ffffff.");
        $transparent_content_container->addChild("transparent_content_background_color",$transparent_content_background_color);

        $transparent_content_background_image = new MikadoBurstField("image","transparent_content_background_image","","Background Image","Choose an image to be displayed in background");
        $transparent_content_container->addChild("transparent_content_background_image",$transparent_content_background_image);

        $transparent_content_pattern_background_image = new MikadoBurstField("image","transparent_content_pattern_background_image","","Background Pattern","Choose an image to be used as background pattern");
        $transparent_content_container->addChild("transparent_content_pattern_background_image",$transparent_content_pattern_background_image);

    $boxed_title = new MikadoBurstTitle('boxed_title', 'Boxed Layout');
    $panel1->addChild('boxed_title', $boxed_title);

    $boxed = new MikadoBurstField("yesno","boxed","no","Boxed layout","Enabling this option will display site content in grid", array(),
		array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#mkdf_boxed_container"));
	$panel1->addChild("boxed",$boxed);
	
	$boxed_container = new MikadoBurstContainer("boxed_container","boxed","no");
	$panel1->addChild("boxed_container",$boxed_container);

        $spacing_arround_content = new MikadoBurstField("yesno","spacing_arround_content","no","Spacing around content","Enabling this option will set a spacing around the boxed content", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#mkdf_spacing_arround_content_container"));
        $boxed_container->addChild("spacing_arround_content",$spacing_arround_content);

        $spacing_arround_content_container = new MikadoBurstContainer("spacing_arround_content_container","spacing_arround_content","no");
        $boxed_container->addChild("spacing_arround_content_container",$spacing_arround_content_container);

            $spacing_amount = new MikadoBurstField("text","spacing_amount","","Spacing amount (px)","Enter the amount for the spacing around boxed content (default is 25)", array(), array("col_width" => 1));
            $spacing_arround_content_container->addChild("spacing_amount",$spacing_amount);

            $footer_in_content = new MikadoBurstField("yesno","footer_in_content","no","Include footer in content area","Enabling this option will include the footer in the content area, so the set spacing will wrap around the footer area as well. Otherwise the spacing will separate the footer and content.");
            $spacing_arround_content_container->addChild("footer_in_content",$footer_in_content);

            $frame_around_content = new MikadoBurstField("yesno","frame_around_content","no","Frame around content","Enabling this option will set a frame around the content", array(),
                array("dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkdf_frame_around_content_container"));
            $spacing_arround_content_container->addChild("frame_around_content",$frame_around_content);

            $frame_around_content_container = new MikadoBurstContainer("frame_around_content_container","frame_around_content","no");
            $spacing_arround_content_container->addChild("frame_around_content_container",$frame_around_content_container);

                $frame_around_content_width = new MikadoBurstField("text","frame_around_content_width","","Frame width (px)","Enter the width of the frame (default is 15)", array(), array("col_width" => 1));
                $frame_around_content_container->addChild("frame_around_content_width",$frame_around_content_width);

                $frame_around_content_color = new MikadoBurstField("color","frame_around_content_color","","Frame Color","Choose a color for frame");
                $frame_around_content_container->addChild("frame_around_content_color",$frame_around_content_color);

                $frame_around_content_pattern = new MikadoBurstField("image","frame_around_content_pattern","","Pattern Image","Choose an image to be used as a pattern in the frame around the content");
                $frame_around_content_container->addChild("frame_around_content_pattern",$frame_around_content_pattern);

		$background_color_box = new MikadoBurstField("color","background_color_box","","Page Background Color","Choose the page background (body) color. Default color is #f5f5f5.");
		$boxed_container->addChild("background_color_box",$background_color_box);
		
		$background_image = new MikadoBurstField("image","background_image","","Background Image","Choose an image to be displayed in background");
		$boxed_container->addChild("background_image",$background_image);
		
		$pattern_background_image = new MikadoBurstField("image","pattern_background_image","","Background Pattern","Choose an image to be used as background pattern");
		$boxed_container->addChild("pattern_background_image",$pattern_background_image);

		$background_image_attachment = new MikadoBurstField("select","background_image_attachment","fixed","Background Attachment","Choose background attachment behavior",array(
			"fixed" => "Fixed",
			"scroll" => "Scroll"
			));
		$boxed_container->addChild("background_image_attachment",$background_image_attachment);

		$boxed_padding_general = new MikadoBurstField("text","boxed_padding_general","","Left/Right Padding on Content (%)","Insert left(right) padding that will apply generaly", array(), array("col_width" => 3));
		$boxed_container->addChild("boxed_padding_general",$boxed_padding_general);
		
		$boxed_padding_on_header = new MikadoBurstField("yesno","boxed_padding_on_header","no","Left/Right Padding Affects Header","By enabling this option the left/right padding will affect header");
        $boxed_container->addChild("boxed_padding_on_header",$boxed_padding_on_header);

        $boxed_padding_on_header_footer = new MikadoBurstField("yesno","boxed_padding_on_header_footer","no","Left/Right Padding Affects Header and Footer","By enabling this option the left/right padding will affect header and footer also");
        $boxed_container->addChild("boxed_padding_on_header_footer",$boxed_padding_on_header_footer);

        $boxed_padding_on_title_content = new MikadoBurstField("yesno","boxed_padding_on_title_content","no","Left/Right Padding Affects Title Content","By enabling this option the left/right padding will affect title content");
        $boxed_container->addChild("boxed_padding_on_title_content",$boxed_padding_on_title_content);

        $boxed_padding_on_title_container = new MikadoBurstField("yesno","boxed_padding_on_title_container","no","Left/Right Padding Affects Title Container","By enabling this option the left/right padding will affect title container (including title image)");
        $boxed_container->addChild("boxed_padding_on_title_container",$boxed_padding_on_title_container);

$paspartu_title = new MikadoBurstTitle('paspartu_title', 'Passepartout');
$panel1->addChild('paspartu_title', $paspartu_title);

    $paspartu = new MikadoBurstField("yesno","paspartu","no","Passepartout","Enabling this option will display passepartout around site content", array(),
        array("dependence" => true,
            "dependence_hide_on_yes" => "",
            "dependence_show_on_yes" => "#mkdf_paspartu_container"));
    $panel1->addChild("paspartu",$paspartu);

    $paspartu_container = new MikadoBurstContainer("paspartu_container","paspartu","no");
    $panel1->addChild("paspartu_container",$paspartu_container);

        $paspartu_color = new MikadoBurstField("color","paspartu_color","","Passepartout Color","Choose passepartout color, default value is #ffffff");
        $paspartu_container->addChild("paspartu_color",$paspartu_color);

        $paspartu_width = new MikadoBurstField("text","paspartu_width","","Passepartout Size (%)","Enter size amount for passepartout, default value is 2% (the percent is in relation to site width)", array(), array("col_width" => 3));
        $paspartu_container->addChild("paspartu_width",$paspartu_width);
		
		$paspartu_border_on_edges = new MikadoBurstField("yesno","paspartu_border_on_edges","no","Border on passepartout edges","Enabling this option will display 1px border on passepartout, only if top and bottom passepartouts are fixed", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#mkdf_paspartu_border_on_edges_container"));
        $paspartu_container->addChild("paspartu_border_on_edges",$paspartu_border_on_edges);
		
		$paspartu_border_on_edges_container = new MikadoBurstContainer("paspartu_border_on_edges_container","paspartu_border_on_edges","no");
        $paspartu_container->addChild("paspartu_border_on_edges_container",$paspartu_border_on_edges_container);
		
		$paspartu_border_on_edges_color = new MikadoBurstField("color","paspartu_border_on_edges_color","","Border Color","Choose border color, default value is #e6e6e6");
        $paspartu_border_on_edges_container->addChild("paspartu_border_on_edges_color",$paspartu_border_on_edges_color);
		
        $paspartu_header_alignment = new MikadoBurstField("yesno","paspartu_header_alignment","no","Align Header With Passepartout","Enabling this option will align header content with passepartout borders");
        $paspartu_container->addChild("paspartu_header_alignment",$paspartu_header_alignment);

        $paspartu_below_tittle = new MikadoBurstField("yesno","paspartu_below_tittle","no","Passepartout Below Title","Enabling this option will place passepartout below title");
        $paspartu_container->addChild("paspartu_below_tittle",$paspartu_below_tittle);

		$paspartu_header_inside = new MikadoBurstField("yesno","paspartu_header_inside","no","Set Header Inside Passepartout","Enabling this option will set the whole header between the left and right border of passepartout");
        $paspartu_container->addChild("paspartu_header_inside",$paspartu_header_inside);
		
		$vertical_menu_inside_paspartu = new MikadoBurstField("yesno","vertical_menu_inside_paspartu","yes","Vertical Menu Inside Passepartout","");
        $paspartu_container->addChild("vertical_menu_inside_paspartu",$vertical_menu_inside_paspartu);
		
		$paspartu_footer_alignment = new MikadoBurstField("yesno","paspartu_footer_alignment","no","Align Footer With Passepartout","Enabling this option will align footer content with passepartout borders");
        $paspartu_container->addChild("paspartu_footer_alignment",$paspartu_footer_alignment);
		
        $paspartu_on_top = new MikadoBurstField("yesno","paspartu_on_top","yes","Top Passepartout","Disabling this option will disable top part of passepartout", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#mkdf_paspartu_on_top_fixed_container"));
        $paspartu_container->addChild("paspartu_on_top",$paspartu_on_top);
		
		$paspartu_on_top_fixed_container = new MikadoBurstContainer("paspartu_on_top_fixed_container","paspartu_on_top","no");
        $paspartu_container->addChild("paspartu_on_top_fixed_container",$paspartu_on_top_fixed_container);

        $paspartu_on_top_fixed = new MikadoBurstField("yesno","paspartu_on_top_fixed","no","Fix Top Passepartout","Enabling this option will fix top part of passepartout to the top of the screen");
        $paspartu_on_top_fixed_container->addChild("paspartu_on_top_fixed",$paspartu_on_top_fixed);

        $paspartu_on_bottom_slider_container = new MikadoBurstContainer("paspartu_on_bottom_slider_container","","");
        $paspartu_container->addChild("paspartu_on_bottom_slider_container",$paspartu_on_bottom_slider_container);

        $paspartu_on_bottom_slider = new MikadoBurstField("yesno","paspartu_on_bottom_slider","no","Show Bottom Passepartout on Mikado Slider","Enabling this option will show bottom passepartout on Mikado Slider");
        $paspartu_on_bottom_slider_container->addChild("paspartu_on_bottom_slider",$paspartu_on_bottom_slider);

        $paspartu_on_bottom = new MikadoBurstField("yesno","paspartu_on_bottom","yes","Bottom Passepartout","Disabling this option will disable bottom part of passepartout", array(),
            array("dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#mkdf_paspartu_on_bottom_fixed_container"));
        $paspartu_container->addChild("paspartu_on_bottom",$paspartu_on_bottom);

        $paspartu_on_bottom_fixed_container = new MikadoBurstContainer("paspartu_on_bottom_fixed_container","paspartu_on_bottom","no");
        $paspartu_container->addChild("paspartu_on_bottom_fixed_container",$paspartu_on_bottom_fixed_container);

        $paspartu_on_bottom_fixed = new MikadoBurstField("yesno","paspartu_on_bottom_fixed","no","Fix Bottom Passepartout","Enabling this option will fix bottom part of passepartout to the bottom of the screen");
        $paspartu_on_bottom_fixed_container->addChild("paspartu_on_bottom_fixed",$paspartu_on_bottom_fixed);

        $paspartu_portfolio_full_width = new MikadoBurstField("yesno","paspartu_portfolio_full_width","no","Full Width Portfolio List in Passepartout","Enabling this option will set portfolio lists within the passepartout to full width of content; otherwise there is a small padding between portfolio and passepartout");
        $paspartu_container->addChild("paspartu_portfolio_full_width",$paspartu_portfolio_full_width);

$preload_pattern_image_title = new MikadoBurstTitle('preload_pattern_image_title', 'Preload Pattern Image');
$panel1->addChild('preload_pattern_image_title', $preload_pattern_image_title);

    $preload_pattern_image = new MikadoBurstField("image","preload_pattern_image",MIKADO_ROOT."/img/preload_pattern.png","Preload Pattern Image","Choose preload pattern image to be displayed until images are loaded ");
    $panel1->addChild("preload_pattern_image",$preload_pattern_image);

// Settings

$panel4 = new MikadoBurstPanel("Behavior","settings");
$generalPage->addChild("panel4",$panel4);

	$page_transitions = new MikadoBurstField("select","page_transitions","0","Page Transition",'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings',
		array( 
			0 => "No animation",
			1 => "Up/Down",
			2 => "Fade",
			3 => "Up/Down (In) / Fade (Out)",
			4 => "Left/Right"
		),
		array("dependence" => true,
			"hide" => array(
				"0"=>"#mkdf_ajax_animate_header_container",
				"1"=>"",
				"2"=>"",
				"3"=>"",
				"4"=>""
			),
			"show" => array(
				"0"=>"",
				"1"=>"#mkdf_ajax_animate_header_container",
				"2"=>"#mkdf_ajax_animate_header_container",
				"3"=>"#mkdf_ajax_animate_header_container",
				"4"=>"#mkdf_ajax_animate_header_container"
			) 
		), "enable_grid_elements",array("yes")
	);
	$panel4->addChild("page_transitions",$page_transitions);

	$page_transitions_notice = new MikadoBurstNotice("Page Transition",'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', "Page transition is disabled because VC Grid is Enabled", "enable_grid_elements","no");
	$panel4->addChild("page_transitions_notice",$page_transitions_notice);
	
	$ajax_animate_header_container = new MikadoBurstContainer("ajax_animate_header_container","page_transitions","0");
	$panel4->addChild("ajax_animate_header_container",$ajax_animate_header_container);
	
	$ajax_animate_header = new MikadoBurstField("yesno","ajax_animate_header","no","Animate Header","Enabling this option will include the header area in the Ajax Page Transition Animations");
	$ajax_animate_header_container->addChild("ajax_animate_header",$ajax_animate_header);
	
	$loading_animation = new MikadoBurstField("onoff","loading_animation","off","Loading Animation","Enabling this option will display animation while page loads", array(),
		array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#mkdf_loading_animation_container"));
	$panel4->addChild("loading_animation",$loading_animation);
	
	$loading_animation_container = new MikadoBurstContainer("loading_animation_container","loading_animation","off");
	$panel4->addChild("loading_animation_container",$loading_animation_container);
	
		$group1 = new MikadoBurstGroup("Loading Animation Graphic","Choose type and color of preload graphic animation");
		$loading_animation_container->addChild("group1",$group1);
		
			$row1 = new MikadoBurstRow();
			$group1->addChild("row1",$row1);
			
				$loading_animation_spinner = new MikadoBurstField("selectsimple","loading_animation_spinner","pulse","Spinner","This is some description", array( "pulse" => "Pulse",
	       "double_pulse" => "Double Pulse",
	       "cube" => "Cube",
	       "rotating_cubes" => "Rotating Cubes",
	       "stripes" => "Stripes",
	       "wave" => "Wave",
	       "two_rotating_circles" => "2 Rotating Circles",
	       "five_rotating_circles" => "5 Rotating Circles",
		   "atom" => "Atom",
		   "clock" => "Clock",
		   "mitosis" => "Mitosis",
		   "lines" => "Lines",
		   "fussion" => "Fussion",
		   "wave_circles" => "Wave Circles",
		   "pulse_circles" => "Pulse Circles"
	      ));
				$row1->addChild("loading_animation_spinner",$loading_animation_spinner);
				
				$spinner_color = new MikadoBurstField("colorsimple","spinner_color","","Spinner Color","This is some description");
				$row1->addChild("spinner_color",$spinner_color);
				
		$loading_image = new MikadoBurstField("image","loading_image","","Loading Image",'Upload custom image to be displayed while page loads (Note: Page Transition must not be set to "No Animation")');
		$loading_animation_container->addChild("loading_image",$loading_image);
		
	$smooth_scroll = new MikadoBurstField("yesno","smooth_scroll","yes","Smooth Scroll","Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)");
	$panel4->addChild("smooth_scroll",$smooth_scroll);
	
	$elements_animation_on_touch = new MikadoBurstField("yesno","elements_animation_on_touch","no","Elements Animation on Mobile/Touch Devices","Enabling this option will allow elements (shortcodes) to animate on mobile / touch devices");
	$panel4->addChild("elements_animation_on_touch",$elements_animation_on_touch);

    $element_appear_amount = new MikadoBurstField("text","element_appear_amount","","Element Appearance (px)","For animated elements, set distance (related to browser bottom) to start the animation", array(), array("col_width" => 3));
    $panel4->addChild("element_appear_amount",$element_appear_amount);

    $ios_format_detection = new MikadoBurstField("yesno","ios_format_detection","no","Disable Format Detection in Safari on iOS","This option disables automatic detection of possible phone numbers in a webpage in Safari on iOS.");
    $panel4->addChild("ios_format_detection",$ios_format_detection);
	
	$show_back_button = new MikadoBurstField("yesno","show_back_button","yes","Show 'Back To Top Button'","Enabling this option will display a Back to Top button on every page");
	$panel4->addChild("show_back_button",$show_back_button);
	
	$responsiveness = new MikadoBurstField("yesno","responsiveness","yes","Responsiveness","Enabling this option will make all pages responsive");
	$panel4->addChild("responsiveness",$responsiveness);
	
	$favicon_image = new MikadoBurstField("image","favicon_image",MIKADO_ROOT."/img/favicon.ico","Favicon Image","Choose a favicon image to be displayed");
	$panel4->addChild("favicon_image",$favicon_image);
	
	$internal_no_ajax_links = new MikadoBurstField("textarea","internal_no_ajax_links","","List of Internal URLs Loaded Without AJAX (Separated With Comma)","To disable AJAX transitions on certain pages, enter their full URLs here (for example: http://www.mydomain.com/forum/)");
	$panel4->addChild("internal_no_ajax_links",$internal_no_ajax_links);

// Custom Code

$panel3 = new MikadoBurstPanel("Custom Code","custom_code");
$generalPage->addChild("panel3",$panel3);

	$custom_css = new MikadoBurstField("textarea","custom_css","","Custom CSS","Enter your custom CSS here");
	$panel3->addChild("custom_css",$custom_css);
	
	$custom_js = new MikadoBurstField("textarea","custom_js","","Custom JS",'Enter your custom Javascript here (jQuery selector is "$j" because of the conflict mode)');
	$panel3->addChild("custom_js",$custom_js);

// SEO

$panel2 = new MikadoBurstPanel("SEO","seo");
$generalPage->addChild("panel2",$panel2);
	
	$disable_mkd_seo = new MikadoBurstField("yesno","disable_mkd_seo","no","Disable SEO","Enabling this option will turn off SEO", array(),
		array("dependence" => true,
		"dependence_hide_on_yes" => "#mkdf_disable_mkd_seo_container",
		"dependence_show_on_yes" => ""));
	$panel2->addChild("disable_mkd_seo",$disable_mkd_seo);
	
	$disable_mkd_seo_container = new MikadoBurstContainer("disable_mkd_seo_container","disable_mkd_seo","yes");
	$panel2->addChild("disable_mkd_seo_container",$disable_mkd_seo_container);
	
		$meta_keywords = new MikadoBurstField("textarea","meta_keywords","","Meta Keywords","Add relevant keywords separated with commas to improve SEO");
		$disable_mkd_seo_container->addChild("meta_keywords",$meta_keywords);
		
		$meta_description = new MikadoBurstField("textarea","meta_description","","Meta Description","Enter a short description of the website for SEO");
		$disable_mkd_seo_container->addChild("meta_description",$meta_description);


//Maintenance Panel

$mkd_pages = array();
$pages = get_posts(array(
    'post_type' => 'page',
    'meta_key' => '_wp_page_template',
    'meta_value' => 'landing_page.php'
));
foreach($pages as $page) {
    $mkd_pages[$page->ID] = $page->post_title;
}

$maintenance_panel = new MikadoBurstPanel("Maintenance", "maintenance_panel");
$generalPage->addChild("maintenance_panel",$maintenance_panel);

    $maintenance_mode = new MikadoBurstField("yesno","mkd_maintenance_mode","no","Maintenance Mode","Turn on this option if you want to enable maintenance mode on your site", array(),
        array("dependence" => true,
              "dependence_hide_on_yes" => "",
              "dependence_show_on_yes" => "#mkdf_maintenance_container"
        ));
    $maintenance_panel->addChild("mkd_maintenance_mode",$maintenance_mode);

    $maintenance_container = new MikadoBurstContainer("maintenance_container","mkd_maintenance_mode","no");
    $maintenance_panel->addChild("maintenance_container",$maintenance_container);

    $maintenance_page = new MikadoBurstField("selectblank","mkd_maintenance_page","",'Maintenance Page','Choose maintenance page to display when user visits your site',$mkd_pages);
    $maintenance_container->addChild("mkd_maintenance_page",$maintenance_page);