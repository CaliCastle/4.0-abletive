<?php

$portfolioPage = new MikadoBurstAdminPage("9", "Portfolio", "icon_images");
$mkd_burst_Framework->mkdOptions->addAdminPage("portfolioPage",$portfolioPage);

//Portfolio List

$panel1 = new MikadoBurstPanel("Portfolio List", "porfolio_list");
$portfolioPage->addChild("panel1",$panel1);

    $portfolio_mkd_like = new MikadoBurstField("onoff","portfolio_mkd_like","on","Likes",'Enabling this option will turn on "Likes"');
    $panel1->addChild("portfolio_mkd_like",$portfolio_mkd_like);

	$portfolio_disable_text_box = new MikadoBurstField("yesno","portfolio_disable_text_box","yes","Disable Boxed Style Project Description","Disabling boxed styled project description", array(), array("dependence" => true, "dependence_hide_on_yes" => "#mkdf_enable_portfolio_list_box_container", "dependence_show_on_yes" => ""));
	$panel1->addChild("portfolio_disable_text_box",$portfolio_disable_text_box);

	$enable_portfolio_list_box_container = new MikadoBurstContainer("enable_portfolio_list_box_container","portfolio_disable_text_box","yes");
	$panel1->addChild("enable_portfolio_list_box_container",$enable_portfolio_list_box_container);

		$portfolio_list_box_background_color = new MikadoBurstField("color","portfolio_list_box_background_color","","Portfolio Box Background Color","Default color is #ffffff");
		$enable_portfolio_list_box_container->addChild("portfolio_list_box_background_color",$portfolio_list_box_background_color);

    $group1 = new MikadoBurstGroup("Image Hover Overlay Color","Define icons styles on project hover. Default hover color is #279eff.");
    $panel1->addChild("group1",$group1);

        $row1 = new MikadoBurstRow();
        $group1->addChild("row1",$row1);

            $portfolio_shader_color = new MikadoBurstField("colorsimple","portfolio_shader_color","","Color","This is some description");
            $row1->addChild("portfolio_shader_color",$portfolio_shader_color);

            $portfolio_shader_transparency = new MikadoBurstField("textsimple","portfolio_shader_transparency","","Transparency (0=full - 1=opaque)","This is some description", array(), array("col_width" => 3));
            $row1->addChild("portfolio_shader_transparency",$portfolio_shader_transparency);


// Portfolio List TEXT STYLES

$title_text_styles = new MikadoBurstTitle("title_text_styles","Title Text Styles");
$panel1->addChild("title_text_styles",$title_text_styles);

    $group7 = new MikadoBurstGroup("Title Style for Standard and Pinterest Lists","Define title styles for standard and pinterest portfolio lists.");
    $panel1->addChild("group7",$group7);

        $row1 = new MikadoBurstRow();
        $group7->addChild("row1",$row1);
            $portfolio_title_standard_list_color = new MikadoBurstField("colorsimple","portfolio_title_standard_list_color","","Text Color","This is some description");
            $row1->addChild("portfolio_title_standard_list_color",$portfolio_title_standard_list_color);
            $portfolio_title_standard_list_hover_color = new MikadoBurstField("colorsimple","portfolio_title_standard_list_hover_color","","Text Hover Color","This is some description");
            $row1->addChild("portfolio_title_standard_list_hover_color",$portfolio_title_standard_list_hover_color);
            $portfolio_title_standard_list_font_size = new MikadoBurstField("textsimple","portfolio_title_standard_list_font_size","","Font Size (px)","This is some description");
            $row1->addChild("portfolio_title_standard_list_font_size",$portfolio_title_standard_list_font_size);
            $portfolio_title_standard_list_line_height = new MikadoBurstField("textsimple","portfolio_title_standard_list_line_height","","Line Height (px)","This is some description");
            $row1->addChild("portfolio_title_standard_list_line_height",$portfolio_title_standard_list_line_height);

        $row2 = new MikadoBurstRow(true);
        $group7->addChild("row2",$row2);
            $portfolio_title_standard_list_text_transform = new MikadoBurstField("selectblanksimple","portfolio_title_standard_list_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row2->addChild("portfolio_title_standard_list_text_transform",$portfolio_title_standard_list_text_transform);
            $portfolio_title_standard_list_font_family = new MikadoBurstField("fontsimple","portfolio_title_standard_list_font_family","-1","Font Family","This is some description");
            $row2->addChild("portfolio_title_standard_list_font_family",$portfolio_title_standard_list_font_family);
            $portfolio_title_standard_list_font_style = new MikadoBurstField("selectblanksimple","portfolio_title_standard_list_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("portfolio_title_standard_list_font_style",$portfolio_title_standard_list_font_style);
            $portfolio_title_standard_list_font_weight = new MikadoBurstField("selectblanksimple","portfolio_title_standard_list_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("portfolio_title_standard_list_font_weight",$portfolio_title_standard_list_font_weight);

        $row3 = new MikadoBurstRow(true);
        $group7->addChild("row3",$row3);
            $portfolio_title_standard_list_letter_spacing = new MikadoBurstField("textsimple","portfolio_title_standard_list_letter_spacing","","Letter Spacing (px)","This is some description");
            $row3->addChild("portfolio_title_standard_list_letter_spacing",$portfolio_title_standard_list_letter_spacing);

    $group9 = new MikadoBurstGroup("Title Style for Text on Hover Image List","Define title styles for text on hover image portfolio list.");
    $panel1->addChild("group9",$group9);

        $row1 = new MikadoBurstRow();
        $group9->addChild("row1",$row1);
            $portfolio_title_hover_box_list_color = new MikadoBurstField("colorsimple","portfolio_title_hover_box_list_color","","Text Color","This is some description");
            $row1->addChild("portfolio_title_hover_box_list_color",$portfolio_title_hover_box_list_color);
            $portfolio_title_hover_box_list_hover_color = new MikadoBurstField("colorsimple","portfolio_title_hover_box_list_hover_color","","Text Hover Color","This is some description");
            $row1->addChild("portfolio_title_hover_box_list_hover_color",$portfolio_title_hover_box_list_hover_color);
            $portfolio_title_hover_box_list_font_size = new MikadoBurstField("textsimple","portfolio_title_hover_box_list_font_size","","Font Size (px)","This is some description");
            $row1->addChild("portfolio_title_hover_box_list_font_size",$portfolio_title_hover_box_list_font_size);
            $portfolio_title_hover_box_list_line_height = new MikadoBurstField("textsimple","portfolio_title_hover_box_list_line_height","","Line Height (px)","This is some description");
            $row1->addChild("portfolio_title_hover_box_list_line_height",$portfolio_title_hover_box_list_line_height);

        $row2 = new MikadoBurstRow(true);
        $group9->addChild("row2",$row2);
            $portfolio_title_hover_box_list_font_family = new MikadoBurstField("fontsimple","portfolio_title_hover_box_list_font_family","-1","Font Family","This is some description");
            $row2->addChild("portfolio_title_hover_box_list_font_family",$portfolio_title_hover_box_list_font_family);
            $portfolio_title_hover_box_list_text_transform = new MikadoBurstField("selectblanksimple","portfolio_title_hover_box_list_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row2->addChild("portfolio_title_hover_box_list_text_transform",$portfolio_title_hover_box_list_text_transform);
            $portfolio_title_hover_box_list_font_style = new MikadoBurstField("selectblanksimple","portfolio_title_hover_box_list_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("portfolio_title_hover_box_list_font_style",$portfolio_title_hover_box_list_font_style);
            $portfolio_title_hover_box_list_font_weight = new MikadoBurstField("selectblanksimple","portfolio_title_hover_box_list_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("portfolio_title_hover_box_list_font_weight",$portfolio_title_hover_box_list_font_weight);

        $row3 = new MikadoBurstRow(true);
        $group9->addChild("row3",$row3);
            $portfolio_title_hover_box_list_letter_spacing = new MikadoBurstField("textsimple","portfolio_title_hover_box_list_letter_spacing","","Letter Spacing (px)","This is some description");
            $row3->addChild("portfolio_title_hover_box_list_letter_spacing",$portfolio_title_hover_box_list_letter_spacing);

    $group11 = new MikadoBurstGroup("Title Style for Portfolio Slider and Masonry Lists","Define title styles for slider and masonry portfolio lists.");
    $panel1->addChild("group11",$group11);

        $row1 = new MikadoBurstRow();
        $group11->addChild("row1",$row1);
            $portfolio_title_list_color = new MikadoBurstField("colorsimple","portfolio_title_list_color","","Text Color","This is some description");
            $row1->addChild("portfolio_title_list_color",$portfolio_title_list_color);
            $portfolio_title_list_hover_color = new MikadoBurstField("colorsimple","portfolio_title_list_hover_color","","Text Hover Color","This is some description");
            $row1->addChild("portfolio_title_list_hover_color",$portfolio_title_list_hover_color);
            $portfolio_title_list_font_size = new MikadoBurstField("textsimple","portfolio_title_list_font_size","","Font Size (px)","This is some description");
            $row1->addChild("portfolio_title_list_font_size",$portfolio_title_list_font_size);
            $portfolio_title_list_line_height = new MikadoBurstField("textsimple","portfolio_title_list_line_height","","Line Height (px)","This is some description");
            $row1->addChild("portfolio_title_list_line_height",$portfolio_title_list_line_height);

        $row2 = new MikadoBurstRow(true);
        $group11->addChild("row2",$row2);
            $portfolio_title_list_text_transform = new MikadoBurstField("selectblanksimple","portfolio_title_list_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row2->addChild("portfolio_title_list_text_transform",$portfolio_title_list_text_transform);
            $portfolio_title_list_font_family = new MikadoBurstField("fontsimple","portfolio_title_list_font_family","-1","Font Family","This is some description");
            $row2->addChild("portfolio_title_list_font_family",$portfolio_title_list_font_family);
            $portfolio_title_list_font_style = new MikadoBurstField("selectblanksimple","portfolio_title_list_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("portfolio_title_list_font_style",$portfolio_title_list_font_style);
            $portfolio_title_list_font_weight = new MikadoBurstField("selectblanksimple","portfolio_title_list_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("portfolio_title_list_font_weight",$portfolio_title_list_font_weight);

            $row3 = new MikadoBurstRow(true);
            $group11->addChild("row3",$row3);
            $portfolio_title_list_letter_spacing = new MikadoBurstField("textsimple","portfolio_title_list_letter_spacing","","Letter Spacing (px)","This is some description");
            $row3->addChild("portfolio_title_list_letter_spacing",$portfolio_title_list_letter_spacing);

$category_text_styles = new MikadoBurstTitle("category_text_styles","Category Text Styles");
$panel1->addChild("category_text_styles",$category_text_styles);

    $group8 = new MikadoBurstGroup("Category Style for Standard and Pinterest Lists","Define category styles for standard and pinterest portfolio lists.");
    $panel1->addChild("group8",$group8);

         $row1 = new MikadoBurstRow();
         $group8->addChild("row1",$row1);
            $portfolio_category_standard_list_color = new MikadoBurstField("colorsimple","portfolio_category_standard_list_color","","Text Color","This is some description");
            $row1->addChild("portfolio_category_standard_list_color",$portfolio_category_standard_list_color);
            $portfolio_category_standard_list_font_size = new MikadoBurstField("textsimple","portfolio_category_standard_list_font_size","","Font Size (px)","This is some description");
            $row1->addChild("portfolio_category_standard_list_font_size",$portfolio_category_standard_list_font_size);
            $portfolio_category_standard_list_line_height = new MikadoBurstField("textsimple","portfolio_category_standard_list_line_height","","Line Height (px)","This is some description");
            $row1->addChild("portfolio_category_standard_list_line_height",$portfolio_category_standard_list_line_height);
            $portfolio_category_standard_list_text_transform = new MikadoBurstField("selectblanksimple","portfolio_category_standard_list_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row1->addChild("portfolio_category_standard_list_text_transform",$portfolio_category_standard_list_text_transform);

        $row2 = new MikadoBurstRow(true);
        $group8->addChild("row2",$row2);
            $portfolio_category_standard_list_font_family = new MikadoBurstField("fontsimple","portfolio_category_standard_list_font_family","-1","Font Family","This is some description");
            $row2->addChild("portfolio_category_standard_list_font_family",$portfolio_category_standard_list_font_family);
            $portfolio_category_standard_list_font_style = new MikadoBurstField("selectblanksimple","portfolio_category_standard_list_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("portfolio_category_standard_list_font_style",$portfolio_category_standard_list_font_style);
            $portfolio_category_standard_list_font_weight = new MikadoBurstField("selectblanksimple","portfolio_category_standard_list_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("portfolio_category_standard_list_font_weight",$portfolio_category_standard_list_font_weight);
            $portfolio_category_standard_list_letter_spacing = new MikadoBurstField("textsimple","portfolio_category_standard_list_letter_spacing","","Letter Spacing (px)","This is some description");
            $row2->addChild("portfolio_category_standard_list_letter_spacing",$portfolio_category_standard_list_letter_spacing);

    $group10 = new MikadoBurstGroup("Category Style for Text on Hover Image List","Define category styles for text on hover portfolio list.");
    $panel1->addChild("group10",$group10);

        $row1 = new MikadoBurstRow();
        $group10->addChild("row1",$row1);
            $portfolio_category_hover_box_list_color = new MikadoBurstField("colorsimple","portfolio_category_hover_box_list_color","","Text Color","This is some description");
            $row1->addChild("portfolio_category_hover_box_list_color",$portfolio_category_hover_box_list_color);
            $portfolio_category_hover_box_list_font_size = new MikadoBurstField("textsimple","portfolio_category_hover_box_list_font_size","","Font Size (px)","This is some description");
            $row1->addChild("portfolio_category_hover_box_list_font_size",$portfolio_category_hover_box_list_font_size);
            $portfolio_category_hover_box_list_line_height = new MikadoBurstField("textsimple","portfolio_category_hover_box_list_line_height","","Line Height (px)","This is some description");
            $row1->addChild("portfolio_category_hover_box_list_line_height",$portfolio_category_hover_box_list_line_height);
            $portfolio_category_hover_box_list_text_transform = new MikadoBurstField("selectblanksimple","portfolio_category_hover_box_list_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row1->addChild("portfolio_category_hover_box_list_text_transform",$portfolio_category_hover_box_list_text_transform);

        $row2 = new MikadoBurstRow(true);
        $group10->addChild("row2",$row2);
            $portfolio_category_hover_box_list_font_family = new MikadoBurstField("fontsimple","portfolio_category_hover_box_list_font_family","-1","Font Family","This is some description");
            $row2->addChild("portfolio_category_hover_box_list_font_family",$portfolio_category_hover_box_list_font_family);
            $portfolio_category_hover_box_list_font_style = new MikadoBurstField("selectblanksimple","portfolio_category_hover_box_list_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("portfolio_category_hover_box_list_font_style",$portfolio_category_hover_box_list_font_style);
            $portfolio_category_hover_box_list_font_weight = new MikadoBurstField("selectblanksimple","portfolio_category_hover_box_list_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("portfolio_category_hover_box_list_font_weight",$portfolio_category_hover_box_list_font_weight);
            $portfolio_category_hover_box_list_letter_spacing = new MikadoBurstField("textsimple","portfolio_category_hover_box_list_letter_spacing","","Letter Spacing (px)","This is some description");
            $row2->addChild("portfolio_category_hover_box_list_letter_spacing",$portfolio_category_hover_box_list_letter_spacing);



    $group12 = new MikadoBurstGroup("Category Style for Portfolio Slider and Masonry Lists","Define category styles for slider and masonry portfolio lists.");
    $panel1->addChild("group12",$group12);

        $row1 = new MikadoBurstRow();
        $group12->addChild("row1",$row1);
            $portfolio_category_list_color = new MikadoBurstField("colorsimple","portfolio_category_list_color","","Text Color","This is some description");
            $row1->addChild("portfolio_category_list_color",$portfolio_category_list_color);
            $portfolio_category_list_font_size = new MikadoBurstField("textsimple","portfolio_category_list_font_size","","Font Size (px)","This is some description");
            $row1->addChild("portfolio_category_list_font_size",$portfolio_category_list_font_size);
            $portfolio_category_list_line_height = new MikadoBurstField("textsimple","portfolio_category_list_line_height","","Line Height (px)","This is some description");
            $row1->addChild("portfolio_category_list_line_height",$portfolio_category_list_line_height);
            $portfolio_category_list_text_transform = new MikadoBurstField("selectblanksimple","portfolio_category_list_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row1->addChild("portfolio_category_list_text_transform",$portfolio_category_list_text_transform);

        $row2 = new MikadoBurstRow(true);
        $group12->addChild("row2",$row2);
            $portfolio_category_list_font_family = new MikadoBurstField("fontsimple","portfolio_category_list_font_family","-1","Font Family","This is some description");
            $row2->addChild("portfolio_category_list_font_family",$portfolio_category_list_font_family);
            $portfolio_category_list_font_style = new MikadoBurstField("selectblanksimple","portfolio_category_list_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("portfolio_category_list_font_style",$portfolio_category_list_font_style);
            $portfolio_category_list_font_weight = new MikadoBurstField("selectblanksimple","portfolio_category_list_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("portfolio_category_list_font_weight",$portfolio_category_list_font_weight);
            $portfolio_category_list_letter_spacing = new MikadoBurstField("textsimple","portfolio_category_list_letter_spacing","","Letter Spacing (px)","This is some description");
            $row2->addChild("portfolio_category_list_letter_spacing",$portfolio_category_list_letter_spacing);


// Portfolio Filter
    $portfolio_filter = new MikadoBurstTitle("portfolio_filter","Category Filter");
    $panel1->addChild("portfolio_filter",$portfolio_filter);

    $portfolio_list_filter_background_color = new MikadoBurstField("color","portfolio_list_filter_background_color","","Background Color","Choose color for background of filter area",array(), array("col_width" => 3));
    $panel1->addChild("portfolio_list_filter_background_color",$portfolio_list_filter_background_color);

    $portfolio_list_filter_height = new MikadoBurstField("text","portfolio_list_filter_height","","Height (px)","Enter height for filter area",array(), array("col_width" => 3));
    $panel1->addChild("portfolio_list_filter_height",$portfolio_list_filter_height);

    $portfolio_filter_margin_bottom = new MikadoBurstField("text","portfolio_filter_margin_bottom","","Bottom Margin (px)","Enter bottom margin for filter area. Default value is 36",array(), array("col_width" => 3));
    $panel1->addChild("portfolio_filter_margin_bottom",$portfolio_filter_margin_bottom);

        $group2 = new MikadoBurstGroup("Title","Define text styles for filter title");
        $panel1->addChild("group2",$group2);

            $row1 = new MikadoBurstRow();
            $group2->addChild("row1",$row1);
                $portfolio_filter_title_color = new MikadoBurstField("colorsimple","portfolio_filter_title_color","","Text Color","This is some description");
                $row1->addChild("portfolio_filter_title_color",$portfolio_filter_title_color);
                $portfolio_filter_title_font_size = new MikadoBurstField("textsimple","portfolio_filter_title_font_size","","Font Size (px)","This is some description");
                $row1->addChild("portfolio_filter_title_font_size",$portfolio_filter_title_font_size);
                $portfolio_filter_title_line_height = new MikadoBurstField("textsimple","portfolio_filter_title_line_height","","Line Height (px)","This is some description");
                $row1->addChild("portfolio_filter_title_line_height",$portfolio_filter_title_line_height);
                $portfolio_filter_title_text_transform = new MikadoBurstField("selectblanksimple","portfolio_filter_title_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
                $row1->addChild("portfolio_filter_title_text_transform",$portfolio_filter_title_text_transform);

                $row2 = new MikadoBurstRow(true);
                $group2->addChild("row2",$row2);
                $portfolio_filter_title_font_family = new MikadoBurstField("fontsimple","portfolio_filter_title_font_family","-1","Font Family","This is some description");
                $row2->addChild("portfolio_filter_title_font_family",$portfolio_filter_title_font_family);
                $portfolio_filter_title_font_style = new MikadoBurstField("selectblanksimple","portfolio_filter_title_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
                $row2->addChild("portfolio_filter_title_font_style",$portfolio_filter_title_font_style);
                $portfolio_filter_title_font_weight = new MikadoBurstField("selectblanksimple","portfolio_filter_title_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
                $row2->addChild("portfolio_filter_title_font_weight",$portfolio_filter_title_font_weight);
                $portfolio_filter_title_letter_spacing = new MikadoBurstField("textsimple","portfolio_filter_title_letter_spacing","","Letter Spacing (px)","This is some description");
                $row2->addChild("portfolio_filter_title_letter_spacing",$portfolio_filter_title_letter_spacing);

        $group3 = new MikadoBurstGroup("Categories","Define text styles for filter categories");
        $panel1->addChild("group3",$group3);

            $row1 = new MikadoBurstRow();
            $group3->addChild("row1",$row1);
            $portfolio_filter_color = new MikadoBurstField("colorsimple","portfolio_filter_color","","Text Color","This is some description");
            $row1->addChild("portfolio_filter_color",$portfolio_filter_color);
            $portfolio_filter_hovercolor = new MikadoBurstField("colorsimple","portfolio_filter_hovercolor","","Hover/Active Color","This is some description");
            $row1->addChild("portfolio_filter_hovercolor",$portfolio_filter_hovercolor);
            $portfolio_filter_font_size = new MikadoBurstField("textsimple","portfolio_filter_font_size","","Font Size (px)","This is some description");
            $row1->addChild("portfolio_filter_font_size",$portfolio_filter_font_size);
            $portfolio_filter_line_height = new MikadoBurstField("textsimple","portfolio_filter_line_height","","Line Height (px)","This is some description");
            $row1->addChild("portfolio_filter_line_height",$portfolio_filter_line_height);

            $row2 = new MikadoBurstRow(true);
            $group3->addChild("row2",$row2);
            $portfolio_filter_font_family = new MikadoBurstField("fontsimple","portfolio_filter_font_family","-1","Font Family","This is some description");
            $row2->addChild("portfolio_filter_font_family",$portfolio_filter_font_family);
            $portfolio_filter_font_style = new MikadoBurstField("selectblanksimple","portfolio_filter_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
            $row2->addChild("portfolio_filter_font_style",$portfolio_filter_font_style);
            $portfolio_filter_font_weight = new MikadoBurstField("selectblanksimple","portfolio_filter_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
            $row2->addChild("portfolio_filter_font_weight",$portfolio_filter_font_weight);
            $portfolio_filter_text_transform = new MikadoBurstField("selectblanksimple","portfolio_filter_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
            $row2->addChild("portfolio_filter_text_transform",$portfolio_filter_text_transform);

            $row3 = new MikadoBurstRow(true);
            $group3->addChild("row3",$row3);
            $portfolio_filter_letter_spacing = new MikadoBurstField("textsimple","portfolio_filter_letter_spacing","","Letter Spacing (px)","This is some description");
            $row3->addChild("portfolio_filter_letter_spacing",$portfolio_filter_letter_spacing);

    $portfolio_filter_disable_separator = new MikadoBurstField("yesno","portfolio_filter_disable_separator","yes","Disable Separator Between Categories","Disabling this option will remove separator between filter categories.",array(),array(
        "dependence" => true,
        "dependence_hide_on_yes" => "#mkdf_portfolio_filter_separator_container",
        "dependence_show_on_yes" => "",
        ));
    $panel1->addChild("portfolio_filter_disable_separator",$portfolio_filter_disable_separator);

    $portfolio_filter_separator_container = new MikadoBurstContainer("portfolio_filter_separator_container","portfolio_filter_disable_separator","yes");
    $panel1->addChild("portfolio_filter_separator_container",$portfolio_filter_separator_container);

        $portfolio_filter_separator_color = new MikadoBurstField("color","portfolio_filter_separator_color","","Separator Between Categories Color","Choose a color for separator between categories in filter");
        $portfolio_filter_separator_container->addChild("portfolio_filter_separator_color",$portfolio_filter_separator_color);


//ICONS STYLE
    $icons_style = new MikadoBurstTitle("icons_style", "Icons");
    $panel1->addChild("icons_style", $icons_style);

    $portfolio_list_icons_pack = new MikadoBurstField("select","portfolio_list_icons_pack","font-elegant","Font Family",'Choose font family for hover icons on portfolio', array(
        "font-elegant" => "Font Elegant",
        "font-awesome" => "Font Awesome"
    ));
    $panel1->addChild("portfolio_list_icons_pack",$portfolio_list_icons_pack);

    $group25 = new MikadoBurstGroup("Size","Enter size for icons in portfolio list ");
    $panel1->addChild("group25",$group25);

        $row1 = new MikadoBurstRow(true);
        $group25->addChild("row1",$row1);

            $portfolio_list_icons_size = new MikadoBurstField("textsimple","portfolio_list_icons_size","","Icon Size (px)","");
            $row1->addChild("portfolio_list_icons_size",$portfolio_list_icons_size);

            $portfolio_list_icons_shape_size = new MikadoBurstField("textsimple","portfolio_list_icons_shape_size","","Shape Size (px)","");
            $row1->addChild("portfolio_list_icons_shape_size",$portfolio_list_icons_shape_size);

	$group4 = new MikadoBurstGroup("Color","Choose color of the icons on project hover");
	$panel1->addChild("group4",$group4);

		$row1 = new MikadoBurstRow();
		$group4->addChild("row1",$row1);
			$portfolio_list_icons_color = new MikadoBurstField("colorsimple","portfolio_list_icons_color","","Color","This is some description");
			$row1->addChild("portfolio_list_icons_color",$portfolio_list_icons_color);
			$portfolio_list_icons_hover_color = new MikadoBurstField("colorsimple","portfolio_list_icons_hover_color","","Hover Color","This is some description");
			$row1->addChild("portfolio_list_icons_hover_color",$portfolio_list_icons_hover_color);

    $group5 = new MikadoBurstGroup("Background Color","Define icons background color styles on project hover");
    $panel1->addChild("group5",$group5);

        $row1 = new MikadoBurstRow();
        $group5->addChild("row1",$row1);
			$portfolio_list_icons_background_color = new MikadoBurstField("colorsimple","portfolio_list_icons_background_color","","Background Color","This is some description");
			$row1->addChild("portfolio_list_icons_background_color",$portfolio_list_icons_background_color);
			$portfolio_list_icons_background_hover_color = new MikadoBurstField("colorsimple","portfolio_list_icons_background_hover_color","","Background Hover Color","This is some description");
			$row1->addChild("portfolio_list_icons_background_hover_color",$portfolio_list_icons_background_hover_color);

    $group6 = new MikadoBurstGroup("Border","Define icons border styles on project hover");
    $panel1->addChild("group6",$group6);

		$row1 = new MikadoBurstRow(true);
		$group6->addChild("row1",$row1);

			$portfolio_list_icons_border_color = new MikadoBurstField("colorsimple","portfolio_list_icons_border_color","","Border Color","This is some description");
			$row1->addChild("portfolio_list_icons_border_color",$portfolio_list_icons_border_color);
			$portfolio_list_icons_border_hover_color = new MikadoBurstField("colorsimple","portfolio_list_icons_border_hover_color","","Border Hover Color","This is some description");
			$row1->addChild("portfolio_list_icons_border_hover_color",$portfolio_list_icons_border_hover_color);
			$portfolio_list_icons_border_width = new MikadoBurstField("textsimple","portfolio_list_icons_border_width","","Border Width (px)","This is some description");
			$row1->addChild("portfolio_list_icons_border_width",$portfolio_list_icons_border_width);
            $portfolio_list_icons_border_radius = new MikadoBurstField("textsimple","portfolio_list_icons_border_radius","","Border Radius (px)","This is some description");
            $row1->addChild("portfolio_list_icons_border_radius",$portfolio_list_icons_border_radius);

    $portfolio_pinterest_style = new MikadoBurstTitle("portfolio_pinterest_style", "Pinterest");
    $panel1->addChild("portfolio_pinterest_style", $portfolio_pinterest_style);

    $group24 = new MikadoBurstGroup("Pinterest Padding","Define pinterest padding");
    $panel1->addChild("group24",$group24);

        $row1 = new MikadoBurstRow(true);
        $group24->addChild("row1",$row1);

        $pinterest_padding_left = new MikadoBurstField("textsimple","pinterest_padding_left","","Padding Left (px)","This is some description");
        $row1->addChild("pinterest_padding_left",$pinterest_padding_left);

        $pinterest_padding_right = new MikadoBurstField("textsimple","pinterest_padding_right","","Padding Right (px)","This is some description");
        $row1->addChild("pinterest_padding_right",$pinterest_padding_right);

        $pinterest_padding_top = new MikadoBurstField("textsimple","pinterest_padding_top","","Padding Top (px)","This is some description");
        $row1->addChild("pinterest_padding_top",$pinterest_padding_top);

        $pinterest_padding_bottom = new MikadoBurstField("textsimple","pinterest_padding_bottom","","Padding Bottom (px)","This is some description");
        $row1->addChild("pinterest_padding_bottom",$pinterest_padding_bottom);

    $portfolio_masonry_style = new MikadoBurstTitle("portfolio_masonry_style", "Masonry");
    $panel1->addChild("portfolio_masonry_style", $portfolio_masonry_style);

    $portfolio_masonry_with_padding_width = new MikadoBurstField("text","portfolio_masonry_with_padding_width","","Space Width (px)","Enter space width for Masonry if space is enabled. Default value is 10",array(), array("col_width" => 3));
    $panel1->addChild("portfolio_masonry_with_padding_width",$portfolio_masonry_with_padding_width);

//Portfolio Single Project

$panel2 = new MikadoBurstPanel("Portfolio Single", "porfolio_single_project");
$portfolioPage->addChild("panel2",$panel2);

	$portfolio_style = new MikadoBurstField("select","portfolio_style","small-images","Portfolio Type",'Choose a default type for Single Project pages', array(
		"small-images" => "Portfolio small images",
		"small-slider" => "Portfolio small slider",
		"big-images" => "Portfolio big images",
		"big-slider" => "Portfolio big slider",
		"custom" => "Portfolio custom",
		"full-width-custom" => "Portfolio full width custom",
		"gallery" => "Portfolio gallery"
      ));
	$panel2->addChild("portfolio_style",$portfolio_style);

    $group3 = new MikadoBurstGroup("Portfolio Overlay Color","Define color and opacity for overlay color");
    $panel2->addChild("group3",$group3);

        $row1 = new MikadoBurstRow();
        $group3->addChild("row1",$row1);

            $portfolio_gallery_overlay_color = new MikadoBurstField("colorsimple","portfolio_gallery_overlay_color","","Color","This is some description");
            $row1->addChild("portfolio_gallery_overlay_color",$portfolio_gallery_overlay_color);

            $portfolio_gallery_overlay_transparency = new MikadoBurstField("textsimple","portfolio_gallery_overlay_transparency","","Transparency (px)","This is some description");
            $row1->addChild("portfolio_gallery_overlay_transparency",$portfolio_gallery_overlay_transparency);


    $portfolio_gallery_image_hover_style = new MikadoBurstField("select","portfolio_gallery_image_hover_style","magnifier","Portfolio Image Hover",'Choose a default hover type for Single Project pages', array(
        "disable" => "None",
        "magnifier" => "Magnifier",
        "icon" => "Icon",
        "text" => "Image Title"
    ),
        array("dependence" => true,
            "hide" => array(
                "disable"=>"#mkdf_portfolio_gallery_image_hover_separator_container,#mkdf_portfolio_gallery_image_hover_icon_container",
                "magnifier"=>"#mkdf_portfolio_gallery_image_hover_separator_container,#mkdf_portfolio_gallery_image_hover_icon_container",
                "icon"=>"#mkdf_portfolio_gallery_image_hover_separator_container",
                "text"=>"#mkdf_portfolio_gallery_image_hover_icon_container"),
            "show" => array(
                "disable"=>"",
                "magnifier"=>"",
                "icon"=>"#mkdf_portfolio_gallery_image_hover_icon_container",
                "text"=>"#mkdf_portfolio_gallery_image_hover_separator_container")
        ));
    $panel2->addChild("portfolio_gallery_image_hover_style",$portfolio_gallery_image_hover_style);

        $portfolio_gallery_image_hover_separator_container = new MikadoBurstContainer("portfolio_gallery_image_hover_separator_container","portfolio_gallery_image_hover_style","magnifier",array("disable","magnifier","icon"));
        $panel2->addChild("portfolio_gallery_image_hover_separator_container",$portfolio_gallery_image_hover_separator_container);

            $portfolio_gallery_image_hover_separator = new MikadoBurstField("select","portfolio_gallery_image_hover_separator","","Separator below image title","This option will place separator below text", array(
                "yes" => "Yes",
                "no" => "No"
            ), array("col_width" => 3));
            $portfolio_gallery_image_hover_separator_container->addChild("portfolio_gallery_image_hover_separator",$portfolio_gallery_image_hover_separator);

            $portfolio_gallery_overlay_text_color = new MikadoBurstField("color","portfolio_gallery_overlay_text_color","","Text Color","Choose a color for overlay text in Single Project pages");
            $portfolio_gallery_image_hover_separator_container->addChild("portfolio_gallery_overlay_text_color",$portfolio_gallery_overlay_text_color);

        $portfolio_gallery_image_hover_icon_container = new MikadoBurstContainer("portfolio_gallery_image_hover_icon_container","portfolio_gallery_image_hover_style","magnifier",array("disable","magnifier","text"));
        $panel2->addChild("portfolio_gallery_image_hover_icon_container",$portfolio_gallery_image_hover_icon_container);

            $group4 = new MikadoBurstGroup("Portfolio Image Hover Icon","Define style for Portfolio Image Hover Icon");
            $portfolio_gallery_image_hover_icon_container->addChild("group4",$group4);

            $row1 = new MikadoBurstRow();
            $group4->addChild("row1",$row1);

                $portfolio_gallery_icon_pack = new MikadoBurstField("selectsimple","portfolio_gallery_icon_pack","font-awesome","Font Family",'This is some description', array(
                    "font-awesome" => "Font Awesome",
                    "font-elegant" => "Font Elegant"
                ));
                $group4->addChild("portfolio_gallery_icon_pack",$portfolio_gallery_icon_pack);

                    $portfolio_gallery_icon_size = new MikadoBurstField("textsimple","portfolio_gallery_icon_size","","Size","This is some description");
                $group4->addChild("portfolio_gallery_icon_size",$portfolio_gallery_icon_size);

                $portfolio_gallery_icon_color = new MikadoBurstField("colorsimple","portfolio_gallery_icon_color","","Color","This is some description");
                $group4->addChild("portfolio_gallery_icon_color",$portfolio_gallery_icon_color);

    $group1 = new MikadoBurstGroup("Title Style","Define title styles on project.");
    $panel2->addChild("group1",$group1);

        $row1 = new MikadoBurstRow();
        $group1->addChild("row1",$row1);

            $portfolio_title_tag = new MikadoBurstField("selectsimple","portfolio_title_tag","h3","Tag element",'This is some description', array(
                "h2" => "h2",
                "h3" => "h3",
                "h4" => "h4",
                "h5" => "h5"
            ));
            $row1->addChild("portfolio_title_tag",$portfolio_title_tag);

            $portfolio_title_margin_bottom = new MikadoBurstField("textsimple","portfolio_title_margin_bottom","","Margin Bottom (px)","This is some description");
            $row1->addChild("portfolio_title_margin_bottom",$portfolio_title_margin_bottom);

            $portfolio_title_color = new MikadoBurstField("colorsimple","portfolio_title_color","","Text Color","This is some description");
            $row1->addChild("portfolio_title_color",$portfolio_title_color);

    $group2 = new MikadoBurstGroup("Additional Portfolio Titles","Define additional portfolio titles styles on project.");
    $panel2->addChild("group2",$group2);

        $row1 = new MikadoBurstRow();
        $group2->addChild("row1",$row1);

            $portfolio_info_tag = new MikadoBurstField("selectsimple","portfolio_info_tag","h6","Tag element",'This is some description', array(
                "h4" => "h4",
                "h5" => "h5",
                "h6" => "h6"
            ));
            $row1->addChild("portfolio_info_tag",$portfolio_info_tag);

            $portfolio_info_margin_bottom = new MikadoBurstField("textsimple","portfolio_info_margin_bottom","","Margin Bottom (px)","This is some description");
            $row1->addChild("portfolio_info_margin_bottom",$portfolio_info_margin_bottom);

            $portfolio_info_color = new MikadoBurstField("colorsimple","portfolio_info_color","","Text Color","This is some description");
            $row1->addChild("portfolio_info_color",$portfolio_info_color);

	$lightbox_single_project = new MikadoBurstField("yesno","lightbox_single_project","yes","Lightbox for Images","Enabling this option will turn on lightbox functionality for projects with images.");
	$panel2->addChild("lightbox_single_project",$lightbox_single_project);

	$lightbox_video_single_project = new MikadoBurstField("yesno","lightbox_video_single_project","no","Lightbox for Videos","Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.");
	$panel2->addChild("lightbox_video_single_project",$lightbox_video_single_project);

	$portfolio_hide_categories = new MikadoBurstField("yesno","portfolio_hide_categories","no","Hide Categories","Enabling this option will disable category meta description on Single Projects.");
	$panel2->addChild("portfolio_hide_categories",$portfolio_hide_categories);

	$portfolio_hide_tags = new MikadoBurstField("yesno","portfolio_hide_tags","no","Hide Tags","Enabling this option will disable tags meta description on Single Projects.");
	$panel2->addChild("portfolio_hide_tags",$portfolio_hide_tags);

	$portfolio_hide_date = new MikadoBurstField("yesno","portfolio_hide_date","no","Hide Date","Enabling this option will disable date meta on Single Projects.");
	$panel2->addChild("portfolio_hide_date",$portfolio_hide_date);

	$portfolio_hide_like = new MikadoBurstField("yesno","portfolio_hide_like","no","Hide Like","Enabling this option will disable like on Single Projects.");
	$panel2->addChild("portfolio_hide_like",$portfolio_hide_like);

	$portfolio_hide_comments = new MikadoBurstField("yesno","portfolio_hide_comments","yes","Hide Comments","Enabling this option will turn off comments functionality.");
	$panel2->addChild("portfolio_hide_comments",$portfolio_hide_comments);

	$portfolio_text_follow = new MikadoBurstField("portfoliofollow","portfolio_text_follow","portfolio_single_follow","Sticky Side Text ","Enabling this option will make side text sticky on Single Project pages");
	$panel2->addChild("portfolio_text_follow",$portfolio_text_follow);

	$portfolio_hide_pagination = new MikadoBurstField("yesno","portfolio_hide_pagination","no","Hide Pagination","Enabling this option will turn off portfolio pagination functionality.", array(), array("dependence" => true, "dependence_hide_on_yes" => "#mkdf_portfolio_hide_pagination_container", "dependence_show_on_yes" => ""));
	$panel2->addChild("portfolio_hide_pagination",$portfolio_hide_pagination);

	$portfolio_hide_pagination_container = new MikadoBurstContainer("portfolio_hide_pagination_container","portfolio_hide_pagination","yes");
	$panel2->addChild("portfolio_hide_pagination_container",$portfolio_hide_pagination_container);

		$portfolio_navigation_through_same_category = new MikadoBurstField("yesno","portfolio_navigation_through_same_category","no","Enable Pagination Through Same Category","Enabling this option will make portfolio pagination sort through current category.");
		$portfolio_hide_pagination_container->addChild("portfolio_navigation_through_same_category",$portfolio_navigation_through_same_category);


    $portfolio_box = new MikadoBurstField("yesno","portfolio_box","no","Enable Box Holder","Enabling this option will place box holder on project. This option works only if Portfolio style is Big Images, Big Slider or Gallery", array(), array("dependence" => true, "dependence_hide_on_yes" => "#mkdf_portfolio_without_box_container", "dependence_show_on_yes" => "#mkdf_portfolio_box_container"));
    $panel2->addChild("portfolio_box",$portfolio_box);

    $portfolio_box_container = new MikadoBurstContainer("portfolio_box_container","portfolio_box","no");
    $panel2->addChild("portfolio_box_container",$portfolio_box_container);

        $portfolio_box_background_color = new MikadoBurstField("color","portfolio_box_background_color","","Background Color","Default color is #ffffff");
        $portfolio_box_container->addChild("portfolio_box_background_color",$portfolio_box_background_color);

        $portfolio_box_lr_padding = new MikadoBurstField("text","portfolio_box_lr_padding","","Padding(px)","Format: 10px 5px 10px 8px", array(), array("col_width" => 3));
        $portfolio_box_container->addChild("portfolio_box_lr_padding",$portfolio_box_lr_padding);

    $portfolio_without_box_container = new MikadoBurstContainer("portfolio_without_box_container","portfolio_box","yes");
    $panel2->addChild("portfolio_without_box_container",$portfolio_without_box_container);

        $portfolio_box_top_padding = new MikadoBurstField("text","portfolio_box_top_padding","","Top Padding(px)","Default value is 46", array(), array("col_width" => 3));
        $portfolio_without_box_container->addChild("portfolio_box_top_padding",$portfolio_box_top_padding);

	$portfolio_columns_number = new MikadoBurstField("select","portfolio_columns_number","2","Number of Columns",'Enter the number of columns for Portfolio Gallery type', array( "2" => "2 columns",
       "3" => "3 columns",
       "4" => "4 columns"
      ));
	$panel2->addChild("portfolio_columns_number",$portfolio_columns_number);

	$portfolio_single_slug = new MikadoBurstField("text","portfolio_single_slug","","Portfolio Single Slug",'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect) ', array(), array("col_width" => 3));
	$panel2->addChild("portfolio_single_slug",$portfolio_single_slug);

    /*Navigation*/

    $portfolio_navigation_title = new MikadoBurstTitle("portfolio_navigation_title","Navigation");
    $panel2->addChild("portfolio_navigation_title",$portfolio_navigation_title);


    $group19 = new MikadoBurstGroup("Navigation Button Size","Define navigation button size");
    $panel2->addChild("group19",$group19);

        $row1 = new MikadoBurstRow();
        $group19->addChild("row1",$row1);

            $portfolio_single_navigation_button_width = new MikadoBurstField("textsimple","portfolio_single_navigation_button_width","","Width (px)","This is some description");
            $row1->addChild("portfolio_single_navigation_button_width",$portfolio_single_navigation_button_width);

            $portfolio_single_navigation_button_height = new MikadoBurstField("textsimple","portfolio_single_navigation_button_height","","Height (px)","This is some description");
            $row1->addChild("portfolio_single_navigation_button_height",$portfolio_single_navigation_button_height);

    $group20 = new MikadoBurstGroup("Navigation Button Position","Enter the amount of pixels you would like to move the navigation buttons towards the edges of the slider");
    $panel2->addChild("group20",$group20);

        $row1 = new MikadoBurstRow();
        $group20->addChild("row1",$row1);

            $portfolio_single_navigation_button_position = new MikadoBurstField("textsimple","portfolio_single_navigation_button_position","","Position (px)","This is some description");
            $row1->addChild("portfolio_single_navigation_button_position",$portfolio_single_navigation_button_position);

    $group16 = new MikadoBurstGroup("Icon Arrow Style","Define navigation arrow style");
    $panel2->addChild("group16",$group16);

        $row1 = new MikadoBurstRow();
        $group16->addChild("row1",$row1);

            $portfolio_single_navigation_arrow_size = new MikadoBurstField("textsimple","portfolio_single_navigation_arrow_size","","Arrow Size (px)","Default value is 14    ");
            $row1->addChild("portfolio_single_navigation_arrow_size",$portfolio_single_navigation_arrow_size);

            $portfolio_single_navigation_arrows_type = new MikadoBurstField("selectblanksimple", "portfolio_single_navigation_arrows_type", "", "Arrow Icon", "", $mkd_burst_options_arrows_type);
            $row1->addChild("portfolio_single_navigation_arrows_type", $portfolio_single_navigation_arrows_type);

            $portfolio_single_navigation_arrow_color = new MikadoBurstField("colorsimple","portfolio_single_navigation_arrow_color","","Arrow Color","This is some description");
            $row1->addChild("portfolio_single_navigation_arrow_color",$portfolio_single_navigation_arrow_color);

            $portfolio_single_navigation_arrow_transparency = new MikadoBurstField("textsimple","portfolio_single_navigation_arrow_transparency","","Arrow Transparency (0-1)","This is some description");
            $row1->addChild("portfolio_single_navigation_arrow_transparency",$portfolio_single_navigation_arrow_transparency);

        $row2 = new MikadoBurstRow(true);
        $group16->addChild("row2",$row2);

                $portfolio_single_navigation_arrow_hover_color = new MikadoBurstField("colorsimple","portfolio_single_navigation_arrow_hover_color","","Arrow Hover Color","This is some description");
                $row2->addChild("portfolio_single_navigation_arrow_hover_color",$portfolio_single_navigation_arrow_hover_color);

                $portfolio_single_navigation_arrow_hover_transparency = new MikadoBurstField("textsimple","portfolio_single_navigation_arrow_hover_transparency","","Arrow Hover Transparency (0-1)","This is some description");
                $row2->addChild("portfolio_single_navigation_arrow_hover_transparency",$portfolio_single_navigation_arrow_hover_transparency);

    $group17 = new MikadoBurstGroup("Navigation Button Background","Define navigation button background");
    $panel2->addChild("group17",$group17);

            $row1 = new MikadoBurstRow();
            $group17->addChild("row1",$row1);

                    $portfolio_single_navigation_background_color = new MikadoBurstField("colorsimple","portfolio_single_navigation_background_color","","Background Color","This is some description");
                    $row1->addChild("portfolio_single_navigation_background_color",$portfolio_single_navigation_background_color);

                    $portfolio_single_navigation_background_transparency = new MikadoBurstField("textsimple","portfolio_single_navigation_background_transparency","","Background Transparency (0-1)","This is some description");
                    $row1->addChild("portfolio_single_navigation_background_transparency",$portfolio_single_navigation_background_transparency);

                    $portfolio_single_navigation_background_hover_color = new MikadoBurstField("colorsimple","portfolio_single_navigation_background_hover_color","","Background Hover Color","This is some description");
                    $row1->addChild("portfolio_single_navigation_background_hover_color",$portfolio_single_navigation_background_hover_color);

                    $portfolio_single_navigation_background_hover_transparency = new MikadoBurstField("textsimple","portfolio_single_navigation_background_hover_transparency","","Background Hover Transparency (0-1)","This is some description");
                    $row1->addChild("portfolio_single_navigation_background_hover_transparency",$portfolio_single_navigation_background_hover_transparency);

    $group18 = new MikadoBurstGroup("Navigation Button Border","Define border style");
    $panel2->addChild("group18",$group18);

            $row1 = new MikadoBurstRow();
            $group18->addChild("row1",$row1);

                    $portfolio_single_navigation_border_width = new MikadoBurstField("textsimple","portfolio_single_navigation_border_width","","Border width (px)","");
                    $row1->addChild("portfolio_single_navigation_border_width",$portfolio_single_navigation_border_width);

                    $portfolio_single_navigation_border_radius = new MikadoBurstField("textsimple","portfolio_single_navigation_border_radius","","Border Radius (px)","This is some description");
                    $row1->addChild("portfolio_single_navigation_border_radius",$portfolio_single_navigation_border_radius);

                    $portfolio_single_navigation_border_color = new MikadoBurstField("colorsimple","portfolio_single_navigation_border_color","","Border Color","This is some description");
                    $row1->addChild("portfolio_single_navigation_border_color",$portfolio_single_navigation_border_color);

                    $portfolio_single_navigation_border_transparency = new MikadoBurstField("textsimple","portfolio_single_navigation_border_transparency","","Border Transparency (0-1)","This is some description");
                    $row1->addChild("portfolio_single_navigation_border_transparency",$portfolio_single_navigation_border_transparency);

            $row2 = new MikadoBurstRow(true);
            $group18->addChild("row2",$row2);

                    $portfolio_single_navigation_border_hover_color = new MikadoBurstField("colorsimple","portfolio_single_navigation_border_hover_color","","Border Hover Color","This is some description");
                    $row2->addChild("portfolio_single_navigation_border_hover_color",$portfolio_single_navigation_border_hover_color);

                    $portfolio_single_navigation_border_hover_transparency = new MikadoBurstField("textsimple","portfolio_single_navigation_border_hover_transparency","","Border Hover Transparency (0-1)","This is some description");
                    $row2->addChild("portfolio_single_navigation_border_hover_transparency",$portfolio_single_navigation_border_hover_transparency);



    $portfolio_single_navigation_show_button_shadow = new MikadoBurstField("yesno","portfolio_single_navigation_show_button_shadow","no","Show Button Shadow","Enabling this options will show button shadow", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_portfolio_single_navigation_button_shadow_container"));
    $panel2->addChild("portfolio_single_navigation_show_button_shadow",$portfolio_single_navigation_show_button_shadow);

    $portfolio_single_navigation_button_shadow_container = new MikadoBurstContainer("portfolio_single_navigation_button_shadow_container","portfolio_single_navigation_show_button_shadow","no");
    $panel2->addChild("portfolio_single_navigation_button_shadow_container",$portfolio_single_navigation_button_shadow_container);

    $group21 = new MikadoBurstGroup("Button Shadow","Set horizontal and vertical position of shadow (negative values are allowed), and define blur and spread.");
    $portfolio_single_navigation_button_shadow_container->addChild("group21",$group21);

        $row1 = new MikadoBurstRow();
        $group21->addChild("row1",$row1);

            $portfolio_single_navigation_button_shadow_color = new MikadoBurstField("colorsimple","portfolio_single_navigation_button_shadow_color","","Color","Choose color for  box shadow");
            $row1->addChild("portfolio_single_navigation_button_shadow_color",$portfolio_single_navigation_button_shadow_color);

        $row2 = new MikadoBurstRow();
        $group21->addChild("row2",$row2);

                $portfolio_single_navigation_button_h_shadow = new MikadoBurstField("textsimple","portfolio_single_navigation_button_h_shadow","","Horizontal shadow (px)","");
                $row2->addChild("portfolio_single_navigation_button_h_shadow",$portfolio_single_navigation_button_h_shadow);

                $portfolio_single_navigation_button_v_shadow = new MikadoBurstField("textsimple","portfolio_single_navigation_button_v_shadow","","Vertical shadow (px)","");
                $row2->addChild("portfolio_single_navigation_button_v_shadow",$portfolio_single_navigation_button_v_shadow);

                $portfolio_single_navigation_button_blur = new MikadoBurstField("textsimple","portfolio_single_navigation_button_blur","","Blur (px)","");
                $row2->addChild("portfolio_single_navigation_button_blur",$portfolio_single_navigation_button_blur);

                $portfolio_single_navigation_button_spread = new MikadoBurstField("textsimple","portfolio_single_navigation_button_spread","","Spread (px)","");
                $row2->addChild("portfolio_single_navigation_button_spread",$portfolio_single_navigation_button_spread);



    $portfolio_back_to_button_choice = new MikadoBurstField("select","portfolio_back_to_button_choice","icon","Back to Button Type","Choose Back to button type",array(
        "icon" => "Icon",
        "custom_icon" => "Custom Icon"
        ),
    array("dependence" => true,
        "show" => array("icon" => "#mkdf_portfolio_back_to_button_icon_container","custom_icon" => "#mkdf_portfolio_back_to_button_custom_container"),
        "hide" => array("custom_icon" => "#mkdf_portfolio_back_to_button_icon_container", "icon" => "#mkdf_portfolio_back_to_button_custom_container"))
    );

    $panel2->addChild("portfolio_back_to_button_choice",$portfolio_back_to_button_choice);

    $portfolio_back_to_button_icon_container = new MikadoBurstContainer("portfolio_back_to_button_icon_container","portfolio_back_to_button_choice","custom_icon");
    $panel2->addChild("portfolio_back_to_button_icon_container",$portfolio_back_to_button_icon_container);

        $group22 = new MikadoBurstGroup("Icon and Style","Choose icon and style for it");
        $portfolio_back_to_button_icon_container->addChild("group22",$group22);

            $row1 = new MikadoBurstRow();
            $group22->addChild("row1",$row1);

                $portfolio_back_to_button_icon_color = new MikadoBurstField("colorsimple","portfolio_back_to_button_icon_color","","Color","This is some description");
                $row1->addChild("portfolio_back_to_button_icon_color",$portfolio_back_to_button_icon_color);

                $portfolio_back_to_button_icon_hover_color = new MikadoBurstField("colorsimple","portfolio_back_to_button_icon_hover_color","","Hover Color","This is some description");
                $row1->addChild("portfolio_back_to_button_icon_hover_color",$portfolio_back_to_button_icon_hover_color);

                $portfolio_back_to_button_icon = new MikadoBurstField("selectsimple","portfolio_back_to_button_icon","","Icon","Choose icon for Back to button",array(
                    "fa fa-th" => "fa-th grid",
                    "icon_grid-3x3" => "icon_grid 3x3",
                    "ion-grid" => "ion-grid"
                    ));
                $row1->addChild("portfolio_back_to_button_icon",$portfolio_back_to_button_icon);

                $portfolio_back_to_button_icon_size = new MikadoBurstField("textsimple","portfolio_back_to_button_icon_size","","Size (px)","This is some description");
                $row1->addChild("portfolio_back_to_button_icon_size",$portfolio_back_to_button_icon_size);

    $portfolio_back_to_button_custom_container = new MikadoBurstContainer("portfolio_back_to_button_custom_container","portfolio_back_to_button_choice","icon");
    $panel2->addChild("portfolio_back_to_button_custom_container",$portfolio_back_to_button_custom_container);

        $portfolio_back_to_button_custom_icon = new MikadoBurstField("image","portfolio_back_to_button_custom_icon","","Custom Icon","Choose custom icon for Back to button");
        $portfolio_back_to_button_custom_container->addChild("portfolio_back_to_button_custom_icon",$portfolio_back_to_button_custom_icon);

        $portfolio_back_to_button_custom_hover_icon = new MikadoBurstField("image","portfolio_back_to_button_custom_hover_icon","","Custom Hover Icon","Choose custom hover icon for Back to button");
        $portfolio_back_to_button_custom_container->addChild("portfolio_back_to_button_custom_hover_icon",$portfolio_back_to_button_custom_hover_icon);

        $portfolio_back_to_button_custom_icon_retina_x15 = new MikadoBurstField("image","portfolio_back_to_button_custom_icon_retina_x15","","Custom Icon for Retina x1.5","Choose custom icon for Back to button for retina x1.5 (note that you must have Custom Icon first)");
        $portfolio_back_to_button_custom_container->addChild("portfolio_back_to_button_custom_icon_retina_x15",$portfolio_back_to_button_custom_icon_retina_x15);

        $portfolio_back_to_button_custom_hover_icon_retina_x15 = new MikadoBurstField("image","portfolio_back_to_button_custom_hover_icon_retina_x15","","Custom Hover Icon for Retina x1.5","Choose custom hover icon for Back to button for retina x1.5 (note that you must have Custom Icon first)");
        $portfolio_back_to_button_custom_container->addChild("portfolio_back_to_button_custom_hover_icon_retina_x15",$portfolio_back_to_button_custom_hover_icon_retina_x15);

        $portfolio_back_to_button_custom_icon_retina_x2 = new MikadoBurstField("image","portfolio_back_to_button_custom_icon_retina_x2","","Custom Icon for Retina x2","Choose custom icon for Back to button for retina x2 (note that you must have Custom Icon first)");
        $portfolio_back_to_button_custom_container->addChild("portfolio_back_to_button_custom_icon_retina_x2",$portfolio_back_to_button_custom_icon_retina_x2);

        $portfolio_back_to_button_custom_hover_icon_retina_x2 = new MikadoBurstField("image","portfolio_back_to_button_custom_hover_icon_retina_x2","","Custom Hover Icon for Retina x2","Choose custom hover icon for Back to button for retina x2 (note that you must have Custom Icon first)");
        $portfolio_back_to_button_custom_container->addChild("portfolio_back_to_button_custom_hover_icon_retina_x2",$portfolio_back_to_button_custom_hover_icon_retina_x2);