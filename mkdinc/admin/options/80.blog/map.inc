<?php

$blogPage = new MikadoBurstAdminPage("8", "Blog", "icon_book_alt");
$mkd_burst_Framework->mkdOptions->addAdminPage("blogPage",$blogPage);

// Blog Post Lists - General

$panel1 = new MikadoBurstPanel("Blog Lists","post_lists_general_panel");
$blogPage->addChild("panel1",$panel1);

$blog_style = new MikadoBurstField("select","blog_style","1","Archive and Category Layout","Choose a default blog layout for archived Blog Post Lists and Category Blog Lists", array(
	"blog_standard"							=> "Blog: Standard",
	"blog_masonry" 							=> "Blog: Masonry",
	"blog_masonry_full_width"				=> "Blog: Masonry Full Width",
	"blog_standard_whole_post" 				=> "Blog: Standard Whole Post",
));
$panel1->addChild("blog_style",$blog_style);

$category_blog_sidebar = new MikadoBurstField("select","category_blog_sidebar","default","Archive and Category Sidebar","Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists", array(
	"default" => "No Sidebar",
	"1" => "Sidebar 1/3 right",
	"2" => "Sidebar 1/4 right",
	"3" => "Sidebar 1/3 left",
	"4" => "Sidebar 1/4 left"
));
$panel1->addChild("category_blog_sidebar",$category_blog_sidebar);

$pagination = new MikadoBurstField("yesno","pagination","yes","Pagination","Enabling this option will display pagination links on bottom of Blog Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_hide_pagination_list_container"));
$panel1->addChild("pagination",$pagination);

$blog_hide_pagination_list_container = new MikadoBurstContainer("blog_hide_pagination_list_container","pagination","");
$panel1->addChild("blog_hide_pagination_list_container",$blog_hide_pagination_list_container);

$blog_pagination_type = new MikadoBurstField("select","blog_pagination_type","standard","Pagination type","Choose type of pagination",array(
	"standard" => "Standard",
	"prev_and_next" => "Only Previous and Next"
	),array(
	"dependence" => true,
	"hide" => array("prev_and_next" => "#mkdf_blog_page_range_container", "standard" => "#mkdf_blog_pagination_text_container"),
	"show" => array("standard" => "#mkdf_blog_page_range_container", "prev_and_next" => "#mkdf_blog_pagination_text_container")
	));
$blog_hide_pagination_list_container->addChild("blog_pagination_type",$blog_pagination_type);

$blog_page_range_container = new MikadoBurstContainer("blog_page_range_container","blog_pagination_type","prev_and_next");
$blog_hide_pagination_list_container->addChild("blog_page_range_container",$blog_page_range_container);

	$blog_page_range = new MikadoBurstField("text","blog_page_range","","Pagination Range limit","Enter a number that will limit pagination to a certain range of links",array(), array("col_width" => 3));
	$blog_page_range_container->addChild("blog_page_range",$blog_page_range);

$blog_pagination_text_container = new MikadoBurstContainer("blog_pagination_text_container","blog_pagination_type","standard");
$blog_hide_pagination_list_container->addChild("blog_pagination_text_container",$blog_pagination_text_container);

	$group17 = new MikadoBurstGroup("Labels for Buttons","Enter labels you want for Previous and Next buttons (Previous and Next are standard labels)");
	$blog_pagination_text_container->addChild("group17",$group17);

		$row1 = new MikadoBurstRow();
		$group17->addChild("row1",$row1);

			$blog_pagination_previous_label = new MikadoBurstField("textsimple","blog_pagination_previous_label","","Previous Label","This is some description");
			$row1->addChild("blog_pagination_previous_label",$blog_pagination_previous_label);

			$blog_pagination_next_label = new MikadoBurstField("textsimple","blog_pagination_next_label","","Next Label","This is some description");
			$row1->addChild("blog_pagination_next_label",$blog_pagination_next_label);

$blog_pagination_border_above_yesno = new MikadoBurstField("yesno","blog_pagination_border_above_yesno","no","Border Above Pagination","Enabling this option will display border above pagination",array(),array(
	"dependence" => true,
	"dependence_show_on_yes" => "#mkdf_blog_pagination_border_container"
	));
$blog_page_range_container->addChild("blog_pagination_border_above_yesno",$blog_pagination_border_above_yesno);

$blog_pagination_border_container = new MikadoBurstContainer("blog_pagination_border_container","blog_pagination_border_above_yesno","no");
$blog_page_range_container->addChild("blog_pagination_border_container",$blog_pagination_border_container);

	$group18 = new MikadoBurstGroup("Border Style","Define style for border top on pagination");
	$blog_pagination_border_container->addChild("group18",$group18);

		$row1 = new MikadoBurstRow();
		$group18->addChild("row1",$row1);

			$blog_pgn_border_color = new MikadoBurstField("colorsimple","blog_pgn_border_color","","Color","This is some description");
			$row1->addChild("blog_pgn_border_color",$blog_pgn_border_color);

			$blog_pgn_border_width = new MikadoBurstField("textsimple","blog_pgn_border_width","","Width (px)","This is some description");
			$row1->addChild("blog_pgn_border_width",$blog_pgn_border_width);

			$blog_pgn_border_style = new MikadoBurstField("selectsimple","blog_pgn_border_style","","Style","This is some description",array(
				"solid" => "Solid",
				"dotted" => "Dotted",
				"dashed" => "Dashed"
				));
			$row1->addChild("blog_pgn_border_style",$blog_pgn_border_style);

	$blog_pagination_border_margin = new MikadoBurstField("text","blog_pagination_border_margin","","Margin from Border (px)","Set margin from border to pagination buttons",array(),array("col_width" => 3));
	$blog_pagination_border_container->addChild("blog_pagination_border_margin",$blog_pagination_border_margin);

$number_of_chars = new MikadoBurstField("text","number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel1->addChild("number_of_chars",$number_of_chars);

// Blog Single

$panel20 = new MikadoBurstPanel("Blog Single", "blog_single_panel");
$blogPage->addChild("panel20",$panel20);

$blog_single_sidebar = new MikadoBurstField("select","blog_single_sidebar","default","Sidebar Layout","Choose a sidebar layout for Blog Single pages", array(
	"default" => "No Sidebar",
	"1" => "Sidebar 1/3 right",
	"2" => "Sidebar 1/4 right",
	"3" => "Sidebar 1/3 left",
	"4" => "Sidebar 1/4 left"
));
$panel20->addChild("blog_single_sidebar",$blog_single_sidebar);

$custom_sidebars = mkd_burst_get_custom_sidebars();

$blog_single_sidebar_custom_display = new MikadoBurstField("selectblank","blog_single_sidebar_custom_display","","Sidebar to Display","Choose a sidebar to display on Blog Single pages", $custom_sidebars);
$panel20->addChild("blog_single_sidebar_custom_display",$blog_single_sidebar_custom_display);

$blog_single_image_size = new MikadoBurstField("select","blog_single_image_size","full","Blog Image Size","Choose image size for Blog Single pages", array(
    "full" => "Default",
    "portfolio-landscape" => "Landscape",
    "portfolio-portrait" => "Portrait",
    "custom" => "Custom"
),
    array("dependence" => true,
        "hide" => array(
            "full"=>"#mkdf_blog_single_image_size_container",
            "portfolio-landscape"=>"#mkdf_blog_single_image_size_container",
            "portfolio-portrait"=>"#mkdf_blog_single_image_size_container",
            "custom"=>""
        ),
        "show" => array(
            "full"=>"",
            "portfolio-landscape"=>"",
            "portfolio-portrait"=>"",
            "custom"=>"#mkdf_blog_single_image_size_container"
        )
    )
);
$panel20->addChild("blog_single_image_size",$blog_single_image_size);

$blog_single_image_size_container = new MikadoBurstContainer("blog_single_image_size_container","blog_single_image_size","", array( "full","portfolio-landscape","portfolio-portrait"));
$panel20->addChild("blog_single_image_size_container",$blog_single_image_size_container);

$blog_single_image_size_height = new MikadoBurstField("text","blog_single_image_size_height","","Image Height (px)","Enter width (in pixels) for Custom Image for Blog Single", array(), array("col_width" => 3));
$blog_single_image_size_container->addChild("blog_single_image_size_height",$blog_single_image_size_height);

$blog_single_image_size_width = new MikadoBurstField("text","blog_single_image_size_width","","Image Width (px)","Enter width (in pixels) for Custom Image for Blog Single", array(), array("col_width" => 3));
$blog_single_image_size_container->addChild("blog_single_image_size_width",$blog_single_image_size_width);

$blog_single_show_ql_icon = new MikadoBurstField("yesno","blog_single_show_ql_icon","yes","Enable Quote/Link Icon","Enabling this option will show Quote/Link Icon on Blog Single posts");
$panel20->addChild("blog_single_show_ql_icon",$blog_single_show_ql_icon);

$blog_single_navigation = new MikadoBurstField("yesno","blog_single_navigation","no","Enable Prev/Next Single Post Navigation Links","Enable navigation links through the blog posts (left and right arrows will appear)", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_hide_pagination_container"));
$panel20->addChild("blog_single_navigation",$blog_single_navigation);

$blog_hide_pagination_container = new MikadoBurstContainer("blog_hide_pagination_container","blog_single_navigation","no");
$panel20->addChild("blog_hide_pagination_container",$blog_hide_pagination_container);

$blog_navigation_through_same_category = new MikadoBurstField("yesno","blog_navigation_through_same_category","no","Enable Navigation Only in Current Category","Limit your navigation only through current category");
$blog_hide_pagination_container->addChild("blog_navigation_through_same_category",$blog_navigation_through_same_category);

$blog_single_title_tags = new MikadoBurstField("select","blog_single_title_tags","h5","Headlines Below Post Content",'Choose a tag for headlines below post content ("Tags", "Post a comment", etc)', array(
	"h2" => "h2",
	"h3" => "h3",
	"h4" => "h4",
	"h5" => "h5",
	"h6" => "h6"
));
$panel20->addChild("blog_single_title_tags",$blog_single_title_tags);

$group1 = new MikadoBurstGroup("Blog Single Spacing","Set spacing for single post pages");
$panel20->addChild("group1",$group1);

$row1 = new MikadoBurstRow();
$group1->addChild("row1",$row1);

$blog_single_tags_holder_margin_top = new MikadoBurstField("textsimple","blog_single_tags_holder_margin_top","","Margin Above Tags(px)","This is some description");
$row1->addChild("blog_single_tags_holder_margin_top",$blog_single_tags_holder_margin_top);

$blog_single_navigation_margin = new MikadoBurstField("textsimple","blog_single_navigation_margin","","Margin Above and Under Navigation(px)","This is some description");
$row1->addChild("blog_single_navigation_margin",$blog_single_navigation_margin);

$blog_single_comments_holder_margin = new MikadoBurstField("textsimple","blog_single_comments_holder_margin","","Margin Above and Under Comments(px)","This is some description");
$row1->addChild("blog_single_comments_holder_margin",$blog_single_comments_holder_margin);

$post_info_data_single = new MikadoBurstTitle("post_info_data_single", "Post Info Data Fields");
$panel20->addChild("post_info_data_single", $post_info_data_single);

$blog_single_show_date = new MikadoBurstField("yesno","blog_single_show_date","yes","Show Date","Enabling this option will show date on Blog Single posts");
$panel20->addChild("blog_single_show_date",$blog_single_show_date);

$blog_single_show_like = new MikadoBurstField("yesno","blog_single_show_like","no","Show Like","Enabling this option will turn on 'Likes' on Blog Single posts");
$panel20->addChild("blog_single_show_like",$blog_single_show_like);

$blog_single_show_social_share = new MikadoBurstField("yesno","blog_single_show_social_share","no","Show Share","Enabling this option will show share on Single Post", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_single_share_options_container"));
$panel20->addChild("blog_single_show_social_share",$blog_single_show_social_share);

$blog_single_share_options_container = new MikadoBurstContainer("blog_single_share_options_container","blog_single_show_social_share","no");
$panel20->addChild("blog_single_share_options_container",$blog_single_share_options_container);

$blog_single_select_share_option = new MikadoBurstField("select","blog_single_select_share_option","dropdown","Social Share Style","Choose Social Share Style for Single Post",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_single_share_options_container->addChild("blog_single_select_share_option",$blog_single_select_share_option);

$blog_single_show_category = new MikadoBurstField("yesno","blog_single_show_category","yes","Show Category","Enabling this option will show category/categories on Blog Single posts");
$panel20->addChild("blog_single_show_category",$blog_single_show_category);

$blog_single_show_time = new MikadoBurstField("yesno","blog_single_show_time","yes","Show Time","Enabling this option will show time on Blog Single posts");
$panel20->addChild("blog_single_show_time",$blog_single_show_time);

$blog_author_info = new MikadoBurstField("yesno","blog_author_info","no","Show Author Info","Enabling this option will display author name and descriptions on Blog Single pages", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_enable_blog_author_info_container"));
$panel20->addChild("blog_author_info",$blog_author_info);

$enable_blog_author_info_container = new MikadoBurstContainer("enable_blog_author_info_container","blog_author_info","no");
$panel20->addChild("enable_blog_author_info_container",$enable_blog_author_info_container);

$enable_author_info_email = new MikadoBurstField("yesno","enable_author_info_email","no","Show Author Email","Enabling this option will show author email");
$enable_blog_author_info_container->addChild("enable_author_info_email",$enable_author_info_email);

$group1 = new MikadoBurstGroup("Blog Single Author Info Box Style","Set styles for author info box on single post pages");
$enable_blog_author_info_container->addChild("group1",$group1);

$row1 = new MikadoBurstRow();
$group1->addChild("row1",$row1);

$blog_single_post_author_info_margin_top = new MikadoBurstField("textsimple","blog_single_post_author_info_margin_top","","Margin Top for Author Info Holder (px)","This is some description");
$row1->addChild("blog_single_post_author_info_margin_top",$blog_single_post_author_info_margin_top);

$blog_single_post_author_info_background_color = new MikadoBurstField("colorsimple","blog_single_post_author_info_background_color","","Background Color","This is some description");
$row1->addChild("blog_single_post_author_info_background_color",$blog_single_post_author_info_background_color);

$row2 = new MikadoBurstRow();
$group1->addChild("row2",$row2);

$blog_single_post_author_info_padding_top = new MikadoBurstField("textsimple","blog_single_post_author_info_padding_top","","Padding Top (px)","This is some description");
$row2->addChild("blog_single_post_author_info_padding_top",$blog_single_post_author_info_padding_top);

$blog_single_post_author_info_padding_bottom = new MikadoBurstField("textsimple","blog_single_post_author_info_padding_bottom","","Padding Bottom (px)","This is some description");
$row2->addChild("blog_single_post_author_info_padding_bottom",$blog_single_post_author_info_padding_bottom);

$blog_single_post_author_info_padding_left = new MikadoBurstField("textsimple","blog_single_post_author_info_padding_left","","Padding Left (px)","This is some description");
$row2->addChild("blog_single_post_author_info_padding_left",$blog_single_post_author_info_padding_left);

$blog_single_post_author_info_padding_right = new MikadoBurstField("textsimple","blog_single_post_author_info_padding_right","","Padding Right (px)","This is some description");
$row2->addChild("blog_single_post_author_info_padding_right",$blog_single_post_author_info_padding_right);

$group2 = new MikadoBurstGroup("Blog Single Author Info Title Style","Set styles for author info title on single post pages");
$enable_blog_author_info_container->addChild("group2",$group2);	
		
$row1 = new MikadoBurstRow();
$group2->addChild("row1",$row1);
	
$blog_single_post_author_info_title_color = new MikadoBurstField("colorsimple","blog_single_post_author_info_title_color","","Text Color","This is some description");
$row1->addChild("blog_single_post_author_info_title_color",$blog_single_post_author_info_title_color);
			
$blog_single_post_author_info_title_font_family = new MikadoBurstField("fontsimple","blog_single_post_author_info_title_font_family","-1","Font Family","This is some description");
$row1->addChild("blog_single_post_author_info_title_font_family",$blog_single_post_author_info_title_font_family);

$blog_single_post_author_info_title_fontsize = new MikadoBurstField("textsimple","blog_single_post_author_info_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_single_post_author_info_title_fontsize",$blog_single_post_author_info_title_fontsize);

$blog_single_post_author_info_title_lineheight = new MikadoBurstField("textsimple","blog_single_post_author_info_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_single_post_author_info_title_lineheight",$blog_single_post_author_info_title_lineheight);

$row2 = new MikadoBurstRow(true);
$group2->addChild("row2",$row2);			

$blog_single_post_author_info_title_fontstyle = new MikadoBurstField("selectblanksimple","blog_single_post_author_info_title_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_single_post_author_info_title_fontstyle",$blog_single_post_author_info_title_fontstyle);

$blog_single_post_author_info_title_fontweight = new MikadoBurstField("selectblanksimple","blog_single_post_author_info_title_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_single_post_author_info_title_fontweight",$blog_single_post_author_info_title_fontweight);

$blog_single_post_author_info_title_texttransform = new MikadoBurstField("selectblanksimple","blog_single_post_author_info_title_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_single_post_author_info_title_texttransform",$blog_single_post_author_info_title_texttransform);

$blog_single_post_author_info_title_letterspacing = new MikadoBurstField("textsimple","blog_single_post_author_info_title_letterspacing","","Letter Spacing (px)","This is some description");
$row2->addChild("blog_single_post_author_info_title_letterspacing",$blog_single_post_author_info_title_letterspacing);
			
$row3 = new MikadoBurstRow();
$group2->addChild("row3",$row3);
		
$blog_single_post_author_info_title_margin_bottom = new MikadoBurstField("textsimple","blog_single_post_author_info_title_margin_bottom","","Margin Bottom for Author Info Title (px)","This is some description");
$row3->addChild("blog_single_post_author_info_title_margin_bottom",$blog_single_post_author_info_title_margin_bottom);
	
$group3 = new MikadoBurstGroup("Blog Single Author Info Text Style","Set styles for author info text on single post pages");
$enable_blog_author_info_container->addChild("group3",$group3);	
		
$row1 = new MikadoBurstRow();
$group3->addChild("row1",$row1);
	
$blog_single_post_author_info_text_color = new MikadoBurstField("colorsimple","blog_single_post_author_info_text_color","","Text Color","This is some description");
$row1->addChild("blog_single_post_author_info_text_color",$blog_single_post_author_info_text_color);
			
$blog_single_post_author_info_text_font_family = new MikadoBurstField("fontsimple","blog_single_post_author_info_text_font_family","-1","Font Family","This is some description");
$row1->addChild("blog_single_post_author_info_text_font_family",$blog_single_post_author_info_text_font_family);

$blog_single_post_author_info_text_fontsize = new MikadoBurstField("textsimple","blog_single_post_author_info_text_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_single_post_author_info_text_fontsize",$blog_single_post_author_info_text_fontsize);

$blog_single_post_author_info_text_lineheight = new MikadoBurstField("textsimple","blog_single_post_author_info_text_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_single_post_author_info_text_lineheight",$blog_single_post_author_info_text_lineheight);

$row2 = new MikadoBurstRow(true);
$group3->addChild("row2",$row2);			

$blog_single_post_author_info_text_fontstyle = new MikadoBurstField("selectblanksimple","blog_single_post_author_info_text_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_single_post_author_info_text_fontstyle",$blog_single_post_author_info_text_fontstyle);

$blog_single_post_author_info_text_fontweight = new MikadoBurstField("selectblanksimple","blog_single_post_author_info_text_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_single_post_author_info_text_fontweight",$blog_single_post_author_info_text_fontweight);

$blog_single_post_author_info_text_texttransform = new MikadoBurstField("selectblanksimple","blog_single_post_author_info_text_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_single_post_author_info_text_texttransform",$blog_single_post_author_info_text_texttransform);

$blog_single_post_author_info_text_letterspacing = new MikadoBurstField("textsimple","blog_single_post_author_info_text_letterspacing","","Letter Spacing (px)","This is some description");
$row2->addChild("blog_single_post_author_info_text_letterspacing",$blog_single_post_author_info_text_letterspacing);

$blog_single_show_comments = new MikadoBurstField("yesno","blog_single_show_comments","yes","Show Comments","Enabling this option will show comments on Blog Single posts", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_enable_blog_comments_container"));
	$panel20->addChild("blog_single_show_comments",$blog_single_show_comments);

	$enable_blog_comments_container = new MikadoBurstContainer("enable_blog_comments_container","blog_single_show_comments","no");
	$panel20->addChild("enable_blog_comments_container",$enable_blog_comments_container);
	
	$group1 = new MikadoBurstGroup("Comments Box Style","Set styles for comments box on single post pages");
	$enable_blog_comments_container->addChild("group1",$group1);

		$row1 = new MikadoBurstRow();
		$group1->addChild("row1",$row1);

			$blog_single_post_comments_margin_bottom= new MikadoBurstField("textsimple","blog_single_post_comments_margin_bottom","","Margin Bottom (px)","This is some description");
			$row1->addChild("blog_single_post_comments_margin_bottom",$blog_single_post_comments_margin_bottom);

			$blog_single_post_comments_background_color = new MikadoBurstField("colorsimple","blog_single_post_comments_background_color","","Background Color","This is some description");
			$row1->addChild("blog_single_post_comments_background_color",$blog_single_post_comments_background_color);

		$row2 = new MikadoBurstRow();
		$group1->addChild("row2",$row2);

			$blog_single_post_comments_padding_top = new MikadoBurstField("textsimple","blog_single_post_comments_padding_top","","Padding Top (px)","This is some description");
			$row2->addChild("blog_single_post_comments_padding_top",$blog_single_post_comments_padding_top);

			$blog_single_post_comments_padding_bottom = new MikadoBurstField("textsimple","blog_single_post_comments_padding_bottom","","Padding Bottom (px)","This is some description");
			$row2->addChild("blog_single_post_comments_padding_bottom",$blog_single_post_comments_padding_bottom);

			$blog_single_post_comments_padding_left = new MikadoBurstField("textsimple","blog_single_post_comments_padding_left","","Padding Left (px)","This is some description");
			$row2->addChild("blog_single_post_comments_padding_left",$blog_single_post_comments_padding_left);

			$blog_single_post_comments_padding_right = new MikadoBurstField("textsimple","blog_single_post_comments_padding_right","","Padding Right (px)","This is some description");
			$row2->addChild("blog_single_post_comments_padding_right",$blog_single_post_comments_padding_right);
	
	$group2 = new MikadoBurstGroup("Comments Color Style","Set styles for comments on single post pages");
	$enable_blog_comments_container->addChild("group2",$group2);
		
		$row1 = new MikadoBurstRow();
		$group2->addChild("row1",$row1);
	
			$blog_single_post_comments_title_color = new MikadoBurstField("colorsimple","blog_single_post_comments_title_color","","Title Color","This is some description");
			$row1->addChild("blog_single_post_comments_title_color",$blog_single_post_comments_title_color);
			
			$blog_single_post_comments_text_color = new MikadoBurstField("colorsimple","blog_single_post_comments_text_color","","Text Color","This is some description");
			$row1->addChild("blog_single_post_comments_text_color",$blog_single_post_comments_text_color);
			
			$blog_single_post_comments_link_color = new MikadoBurstField("colorsimple","blog_single_post_comments_link_color","","Link Color","This is some description");
			$row1->addChild("blog_single_post_comments_link_color",$blog_single_post_comments_link_color);	
			
			$blog_single_post_comments_date_color = new MikadoBurstField("colorsimple","blog_single_post_comments_date_color","","Date & Icons Color","This is some description");
			$row1->addChild("blog_single_post_comments_date_color",$blog_single_post_comments_date_color);			
	
			
	
// Advanced Options

$panel_advanced_options = new MikadoBurstPanel("Advanced Options","panel_advanced_options");
$blogPage->addChild("panel_advanced_options",$panel_advanced_options);

$blog_standard_type_show_options = new MikadoBurstField("yesno","blog_standard_type_show_options","no","Show Standard Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#mkdf_blog_standard_type_post_lists"));
$panel_advanced_options->addChild("blog_standard_type_show_options",$blog_standard_type_show_options);

$blog_masonry_show_options = new MikadoBurstField("yesno","blog_masonry_show_options","no","Show Masonry & Masonry Full Width Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#mkdf_blog_masonry_post_lists"));
$panel_advanced_options->addChild("blog_masonry_show_options", $blog_masonry_show_options);


// Blog Post List - Blog: Masonry
$panel10 = new MikadoBurstPanel("Blog List Templates Options: Masonry & Masonry Full Width","blog_masonry_post_lists", "blog_masonry_show_options", "no");
$blogPage->addChild("panel10",$panel10);

$blog_masonry_choose_type = new MikadoBurstField("select","blog_masonry_choose_type","blog_masonry_standard","Masonry Type",'Choose Type for "Masonry" Blog List', array(
	"blog_masonry_standard" => "Standard",
	"blog_masonry_meta_info_featured_on_side" => "Meta Info Featured on Side"
	)
);
$panel10->addChild("blog_masonry_choose_type",$blog_masonry_choose_type);

$blog_masonry_number_of_chars = new MikadoBurstField("text","blog_masonry_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel10->addChild("blog_masonry_number_of_chars",$blog_masonry_number_of_chars);

$blog_masonry_read_more_button = new MikadoBurstField("yesno","blog_masonry_read_more_button","no","Read More Button","Enable Read More Button", array(),
    array("dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_blog_masonry_read_more_button_container"));
$panel10->addChild("blog_masonry_read_more_button",$blog_masonry_read_more_button);

$blog_masonry_read_more_button_container = new MikadoBurstContainer("blog_masonry_read_more_button_container","blog_masonry_read_more_button","no");
$panel10->addChild("blog_masonry_read_more_button_container",$blog_masonry_read_more_button_container);

$blog_masonry_read_more_button_icon = new MikadoBurstField("yesno","blog_masonry_read_more_button_icon","no","Enable Icon","Enabling this option will place icon in read more button", array(),
    array("dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_blog_masonry_read_more_button_icon_container"));
$blog_masonry_read_more_button_container->addChild("blog_masonry_read_more_button_icon",$blog_masonry_read_more_button_icon);

$blog_masonry_read_more_button_icon_container = new MikadoBurstContainer("blog_masonry_read_more_button_icon_container","blog_masonry_read_more_button_icon","no");
$blog_masonry_read_more_button_container->addChild("blog_masonry_read_more_button_icon_container",$blog_masonry_read_more_button_icon_container);

//init icon pack hide and show array. It will be populated dinamically from collections array
$blog_masonry_read_more_button_icon_pack_hide_array = array();
$blog_masonry_read_more_button_icon_pack_show_array = array();

//do we have some collection added in collections array?
if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
    //get collections params array. It will contain values of 'param' property for each collection
    $blog_masonry_read_more_button_icon_collections_params = $mkd_burst_IconCollections->getIconCollectionsParams();

    //foreach collection generate hide and show array
    foreach ($mkd_burst_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
        $blog_masonry_read_more_button_icon_pack_hide_array[$dep_collection_key] = '';

        //we need to include only current collection in show string as it is the only one that needs to show
        $blog_masonry_read_more_button_icon_pack_show_array[$dep_collection_key] = '#mkdf_blog_masonry_read_more_button_icon_'.$dep_collection_object->param.'_container';

        //for all collections param generate hide string
        foreach ($blog_masonry_read_more_button_icon_collections_params as $blog_masonry_read_more_button_icon_collections_param) {
            //we don't need to include current one, because it needs to be shown, not hidden
            if($blog_masonry_read_more_button_icon_collections_param !== $dep_collection_object->param) {
                $blog_masonry_read_more_button_icon_pack_hide_array[$dep_collection_key].= '#mkdf_blog_masonry_read_more_button_icon_'.$blog_masonry_read_more_button_icon_collections_param.'_container,';
            }
        }

        //remove remaining ',' character
        $blog_masonry_read_more_button_icon_pack_hide_array[$dep_collection_key] = rtrim($blog_masonry_read_more_button_icon_pack_hide_array[$dep_collection_key], ',');
    }

}

$blog_masonry_read_more_button_icon_pack = new MikadoBurstField(
    "select",
    "blog_masonry_read_more_button_icon_pack",
    "font_awesome",
    "Icon Pack",
    "Choose icon pack for show load more button",
    $mkd_burst_IconCollections->getIconCollections(),
    array(
        "dependence" => true,
        "hide" => $blog_masonry_read_more_button_icon_pack_hide_array,
        "show" => $blog_masonry_read_more_button_icon_pack_show_array
    ));

$blog_masonry_read_more_button_icon_container->addChild("blog_masonry_read_more_button_icon_pack", $blog_masonry_read_more_button_icon_pack);

if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
    //foreach icon collection we need to generate separate container that will have dependency set
    //it will have one field inside with icons dropdown
    foreach ($mkd_burst_IconCollections->iconCollections as $collection_key => $collection_object) {
        $icons_array = $collection_object->getIconsArray();

        //get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
        $icon_collections_keys = $mkd_burst_IconCollections->getIconCollectionsKeys();

        //unset current one, because it doesn't have to be included in dependency that hides icon container
        unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

        $blog_masonry_read_more_button_icon_hide_values = $icon_collections_keys;
        $blog_icon_container = new MikadoBurstContainer("blog_masonry_read_more_button_icon_".$collection_object->param."_container", "blog_masonry_read_more_button_icon_pack", "", $blog_masonry_read_more_button_icon_hide_values);
        $blog_masonry_read_more_button_icon = new MikadoBurstField("select", "blog_masonry_read_more_button_icon_".$collection_object->param, "", "Button Icon","Choose Button Icon", $icons_array, array("col_width" => 3));
        $blog_icon_container->addChild("blog_masonry_read_more_button_icon_".$collection_object->param, $blog_masonry_read_more_button_icon);

        $blog_masonry_read_more_button_icon_container->addChild("blog_masonry_read_more_button_icon_".$collection_object->param."_container", $blog_icon_container);
    }

}


$pagination_masonry = new MikadoBurstField("select","pagination_masonry","pagination","Pagination on Masonry",'Choose a pagination style for "Masonry" Blog List', array(
	"pagination" => "Pagination",
	"load_more" => "Load More",
	"infinite_scroll" => "Infinite Scroll"
));
$panel10->addChild("pagination_masonry",$pagination_masonry);

$blog_masonry_columns = new MikadoBurstField('select', 'blog_masonry_columns', '', 'Masonry Blog Columns', 'Choose a number of columns for "Masonry" Blog List without sidebar', array(
	'two_columns' => '2',
	'three_columns' => '3'
));
$panel10->addChild('blog_masonry_columns', $blog_masonry_columns);

$blog_masonry_full_width_columns = new MikadoBurstField('select', 'blog_masonry_full_width_columns', '', 'Full Width Masonry Blog Columns', 'Choose a number of columns for "Masonry" Blog List', array(
	'three_columns' => '3',
	'four_columns' => '4',
	'five_columns' => '5'
));
$panel10->addChild('blog_masonry_full_width_columns', $blog_masonry_full_width_columns);

$blog_masonry_full_width_margin = new MikadoBurstField("text","blog_masonry_full_width_margin","","Full Width Masonry Margin",'Please insert margin in px (i.e. 5px), or in % (i.e 5%)', array(), array("col_width" => 3));
$panel10->addChild("blog_masonry_full_width_margin",$blog_masonry_full_width_margin);

$blog_masonry_filter = new MikadoBurstField("yesno","blog_masonry_filter","no","Show Category Filter on Masonry",'Enabling this option will display a Category Filter on "Masonry" Blog List', array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_masonry_filter_container"));
$panel10->addChild("blog_masonry_filter",$blog_masonry_filter);

$blog_masonry_filter_container = new MikadoBurstContainer("blog_masonry_filter_container","blog_masonry_filter","no");
$panel10->addChild("blog_masonry_filter_container",$blog_masonry_filter_container);


// Blog Masonry Filter
$blog_masonry_filter_background_color = new MikadoBurstField("color","blog_masonry_filter_background_color","","Background Color","Choose color for background of filter area",array(), array("col_width" => 3));
$blog_masonry_filter_container->addChild("blog_masonry_filter_background_color",$blog_masonry_filter_background_color);

$blog_masonry_filter_height = new MikadoBurstField("text","blog_masonry_filter_height","","Height (px)","Enter height for filter area",array(), array("col_width" => 3));
$blog_masonry_filter_container->addChild("blog_masonry_filter_height", $blog_masonry_filter_height);

$blog_masonry_filter_margin_bottom = new MikadoBurstField("text","blog_masonry_filter_margin_bottom","","Bottom Margin (px)","Enter bottom margin for filter area. Default value is 36",array(), array("col_width" => 3));
$blog_masonry_filter_container->addChild("blog_masonry_filter_margin_bottom",$blog_masonry_filter_margin_bottom);

$blog_masonry_filter_alignment = new MikadoBurstField("select","blog_masonry_filter_alignment","","Horizontal Alignment","Choose filter alignment", array(
	"left" => "Left",
	"center" => "Center",
	"right" => "Right"
));
$blog_masonry_filter_container->addChild("blog_masonry_filter_alignment",$blog_masonry_filter_alignment);

$blog_masonry_enable_filter_title = new MikadoBurstField("yesno","blog_masonry_enable_filter_title","no","Enable Filter Title","Enabling this option will show category filter title");
$blog_masonry_filter_container->addChild("blog_masonry_enable_filter_title",$blog_masonry_enable_filter_title);

$group1 = new MikadoBurstGroup("Title","Define text styles for filter title");
$blog_masonry_filter_container->addChild("group1",$group1);

$row1 = new MikadoBurstRow();
$group1->addChild("row1",$row1);
$blog_masonry_filter_title_color = new MikadoBurstField("colorsimple","blog_masonry_filter_title_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_filter_title_color",$blog_masonry_filter_title_color);
$blog_masonry_filter_title_font_size = new MikadoBurstField("textsimple","blog_masonry_filter_title_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_filter_title_font_size",$blog_masonry_filter_title_font_size);
$blog_masonry_filter_title_line_height = new MikadoBurstField("textsimple","blog_masonry_filter_title_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_filter_title_line_height",$blog_masonry_filter_title_line_height);
$blog_masonry_filter_title_text_transform = new MikadoBurstField("selectblanksimple","blog_masonry_filter_title_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row1->addChild("blog_masonry_filter_title_text_transform",$blog_masonry_filter_title_text_transform);

$row2 = new MikadoBurstRow(true);
$group1->addChild("row2",$row2);
$blog_masonry_filter_title_font_family = new MikadoBurstField("fontsimple","blog_masonry_filter_title_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_filter_title_font_family",$blog_masonry_filter_title_font_family);
$blog_masonry_filter_title_font_style = new MikadoBurstField("selectblanksimple","blog_masonry_filter_title_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_masonry_filter_title_font_style",$blog_masonry_filter_title_font_style);
$blog_masonry_filter_title_font_weight = new MikadoBurstField("selectblanksimple","blog_masonry_filter_title_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_masonry_filter_title_font_weight",$blog_masonry_filter_title_font_weight);
$blog_masonry_filter_title_letter_spacing = new MikadoBurstField("textsimple","blog_masonry_filter_title_letter_spacing","","Letter Spacing (px)","This is some description");
$row2->addChild("blog_masonry_filter_title_letter_spacing",$blog_masonry_filter_title_letter_spacing);

$group2 = new MikadoBurstGroup("Categories","Define text styles for filter categories");
$blog_masonry_filter_container->addChild("group2",$group2);

$row1 = new MikadoBurstRow();
$group2->addChild("row1",$row1);
$blog_masonry_filter_color = new MikadoBurstField("colorsimple","blog_masonry_filter_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_filter_color",$blog_masonry_filter_color);
$blog_masonry_filter_hovercolor = new MikadoBurstField("colorsimple","blog_masonry_filter_hovercolor","","Hover/Active Color","This is some description");
$row1->addChild("blog_masonry_filter_hovercolor",$blog_masonry_filter_hovercolor);
$blog_masonry_filter_font_size = new MikadoBurstField("textsimple","blog_masonry_filter_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_filter_font_size",$blog_masonry_filter_font_size);
$blog_masonry_filter_line_height = new MikadoBurstField("textsimple","blog_masonry_filter_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_filter_line_height",$blog_masonry_filter_line_height);

$row2 = new MikadoBurstRow(true);
$group2->addChild("row2",$row2);
$blog_masonry_filter_font_family = new MikadoBurstField("fontsimple","blog_masonry_filter_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_filter_font_family",$blog_masonry_filter_font_family);
$blog_masonry_filter_font_style = new MikadoBurstField("selectblanksimple","blog_masonry_filter_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_masonry_filter_font_style",$blog_masonry_filter_font_style);
$blog_masonry_filter_font_weight = new MikadoBurstField("selectblanksimple","blog_masonry_filter_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_masonry_filter_font_weight",$blog_masonry_filter_font_weight);
$blog_masonry_filter_text_transform = new MikadoBurstField("selectblanksimple","blog_masonry_filter_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_masonry_filter_text_transform",$blog_masonry_filter_text_transform);

$row3 = new MikadoBurstRow(true);
$group2->addChild("row3",$row3);
$blog_masonry_filter_letter_spacing = new MikadoBurstField("textsimple","blog_masonry_filter_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_filter_letter_spacing",$blog_masonry_filter_letter_spacing);

$blog_masonry_filter_disable_separator = new MikadoBurstField("yesno","blog_masonry_filter_disable_separator","yes","Disable Separator Between Categories","Disabling this option will remove separator between filter categories.");
$blog_masonry_filter_container->addChild("blog_masonry_filter_disable_separator",$blog_masonry_filter_disable_separator);

$blog_masonry_type = new MikadoBurstField("select","blog_masonry_type","post_info_below_title","Post Info Position","Choose Post Info Position for Masonry Blog List", array(
	"post_info_below_title" => "Post Info Section Below Title",
	"post_info_at_bottom" => "Post Info Section at Bottom"
));
$panel10->addChild("blog_masonry_type",$blog_masonry_type);

$blog_masonry_content_position = new MikadoBurstField("select","blog_masonry_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));
$panel10->addChild("blog_masonry_content_position",$blog_masonry_content_position);

$blog_masonry_post_meta_data_section = new MikadoBurstTitle("blog_masonry_post_meta_data_section", "Post Info Data Fields");
$panel10->addChild("blog_masonry_post_meta_data_section", $blog_masonry_post_meta_data_section);

$blog_masonry_show_categories= new MikadoBurstField("yesno","blog_masonry_show_categories","no","Show Categories","Enabling this option will Show Categories on Post List");
$panel10->addChild("blog_masonry_show_categories",$blog_masonry_show_categories);

$blog_masonry_show_comments = new MikadoBurstField("yesno","blog_masonry_show_comments","no","Show Comments","Enabling this option will Show Comments on Post List");
$panel10->addChild("blog_masonry_show_comments",$blog_masonry_show_comments);

$blog_masonry_show_author = new MikadoBurstField("yesno","blog_masonry_show_author","no","Show Author Name","Enabling this option will show author name on Post List and Blog Post Single");
$panel10->addChild("blog_masonry_show_author",$blog_masonry_show_author);

$blog_masonry_show_date = new MikadoBurstField("yesno","blog_masonry_show_date","no","Show Date","Enabling this option will show date on Post List");
$panel10->addChild("blog_masonry_hide_date",$blog_masonry_show_date);

$blog_masonry_show_share = new MikadoBurstField("yesno","blog_masonry_show_share","no","Show Share","Enabling this option will show share on Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_masonry_share_options_container"));
$panel10->addChild("blog_masonry_show_share",$blog_masonry_show_share);

$blog_masonry_share_options_container = new MikadoBurstContainer("blog_masonry_share_options_container","blog_masonry_show_share","no");
$panel10->addChild("blog_masonry_share_options_container",$blog_masonry_share_options_container);

$blog_masonry_select_share_options_masonry_type = new MikadoBurstField("select","blog_masonry_select_share_options_masonry_type","dropdown","Social Share Style","Choose Social Share Style for Masonry Type",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
), array("dependence" => true,
	"show" => array("list"=>"#mkdf_blog_masonry_share_list_type_options_container","dropdown" => "#mkdf_blog_masonry_share_dropdown_type_options_container"),
	"hide" => array("dropdown"=>"#mkdf_blog_masonry_share_list_type_options_container","list" => "#mkdf_blog_masonry_share_dropdown_type_options_container"),
	));

$blog_masonry_share_options_container->addChild("blog_masonry_select_share_options_masonry_type",$blog_masonry_select_share_options_masonry_type);

$blog_masonry_share_list_type_options_container = new MikadoBurstContainer("blog_masonry_share_list_type_options_container","blog_masonry_select_share_options_masonry_type","dropdown");
$blog_masonry_share_options_container->addChild("blog_masonry_share_list_type_options_container",$blog_masonry_share_list_type_options_container);
	
	$blog_masonry_share_hld_hover_icon_color = new MikadoBurstField("color","blog_masonry_share_hld_hover_icon_color","","Icon color on Quote/Link Holder Hover","Choose icon color for share list when the quote/link holder is hovered over");
	$blog_masonry_share_list_type_options_container->addChild("blog_masonry_share_hld_hover_icon_color",$blog_masonry_share_hld_hover_icon_color);

$blog_masonry_share_dropdown_type_options_container = new MikadoBurstContainer("blog_masonry_share_dropdown_type_options_container","blog_masonry_select_share_options_masonry_type","list");
$blog_masonry_share_options_container->addChild("blog_masonry_share_dropdown_type_options_container",$blog_masonry_share_dropdown_type_options_container);

	$blog_masonry_share_background_color = new MikadoBurstField("color","blog_masonry_share_background_color","","Background Color","Choose background color for share dropdown");
	$blog_masonry_share_dropdown_type_options_container->addChild("blog_masonry_share_background_color",$blog_masonry_share_background_color);

	$blog_masonry_share_background_color_link_post_type = new MikadoBurstField("color","blog_masonry_share_background_color_link_post_type","","Background Color on Quote/Link Post Type","Choose background color for share dropdown");
	$blog_masonry_share_dropdown_type_options_container->addChild("blog_masonry_share_background_color_link_post_type",$blog_masonry_share_background_color_link_post_type);

$blog_masonry_share_icon_color = new MikadoBurstField("color","blog_masonry_share_icon_color","","Icon Color","Choose icon color for share dropdown and list");
$blog_masonry_share_options_container->addChild("blog_masonry_share_icon_color",$blog_masonry_share_icon_color);

$blog_masonry_share_icon_hover_color = new MikadoBurstField("color","blog_masonry_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for share dropdown and list");
$blog_masonry_share_options_container->addChild("blog_masonry_share_icon_hover_color",$blog_masonry_share_icon_hover_color);

$blog_masonry_share_icon_color_link_post_type = new MikadoBurstField("color","blog_masonry_share_icon_color_link_post_type","","Icon Color for Quote/Link Post Type","Choose icon color for share dropdown and list");
$blog_masonry_share_options_container->addChild("blog_masonry_share_icon_color_link_post_type",$blog_masonry_share_icon_color_link_post_type);

$blog_masonry_share_icon_hover_color_link_post_type = new MikadoBurstField("color","blog_masonry_share_icon_hover_color_link_post_type","","Icon Hover Color for Quote/Link Post Type","Choose icon hover color for share dropdown and list");
$blog_masonry_share_options_container->addChild("blog_masonry_share_icon_hover_color_link_post_type",$blog_masonry_share_icon_hover_color_link_post_type);

$blog_masonry_show_like = new MikadoBurstField("yesno","blog_masonry_show_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel10->addChild("blog_masonry_show_like",$blog_masonry_show_like);

$blog_masonry_post_design_style = new MikadoBurstTitle("blog_masonry_post_design_style", "Post Design Style");
$panel10->addChild("blog_masonry_post_design_style", $blog_masonry_post_design_style);

$blog_masonry_post_alignment = new MikadoBurstField("select","blog_masonry_post_alignment","","Post Alignment","Choose alignment for whole post",array(
	"left" => "Left",
	"center" => "Center",
	"right" => "Right"
));
$panel10->addChild("blog_masonry_post_alignment",$blog_masonry_post_alignment);

$blog_masonry_enable_text_box = new MikadoBurstField("yesno","blog_masonry_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_masonry_enable_text_box_container"));
$panel10->addChild("blog_masonry_enable_text_box",$blog_masonry_enable_text_box);

$blog_masonry_enable_text_box_container = new MikadoBurstContainer("blog_masonry_enable_text_box_container","blog_masonry_enable_text_box","no");
$panel10->addChild("blog_masonry_enable_text_box_container",$blog_masonry_enable_text_box_container);

$blog_masonry_box_background_color = new MikadoBurstField("color","blog_masonry_box_background_color","","Background Color","Choose background color for post text box");
$blog_masonry_enable_text_box_container->addChild("blog_masonry_box_background_color",$blog_masonry_box_background_color);

$blog_masonry_box_border_color = new MikadoBurstField("color","blog_masonry_box_border_color","","Border Color","Choose border color for post text box");
$blog_masonry_enable_text_box_container->addChild("blog_masonry_box_border_color",$blog_masonry_box_border_color);

$blog_masonry_box_padding = new MikadoBurstField("text","blog_masonry_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_masonry_enable_text_box_container->addChild("blog_masonry_box_padding",$blog_masonry_box_padding);

$group7 = new MikadoBurstGroup("Paragraph","Set paragraph color");
$panel10->addChild("group7",$group7);

$blog_masonry_paragraph_color = new MikadoBurstField("colorsimple","blog_masonry_paragraph_color","","Color","This is some description");
$group7->addChild("blog_masonry_paragraph_color",$blog_masonry_paragraph_color);

$group1 = new MikadoBurstGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel10->addChild("group1",$group1);

$row1 = new MikadoBurstRow();
$group1->addChild("row1",$row1);

$blog_masonry_ql_background_image = new MikadoBurstField("yesnosimple","blog_masonry_ql_background_image","no","Background Image","");
$row1->addChild("blog_masonry_ql_background_image",$blog_masonry_ql_background_image);

$blog_masonry_ql_background_color = new MikadoBurstField("colorsimple","blog_masonry_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_masonry_ql_background_color",$blog_masonry_ql_background_color);

$blog_masonry_ql_hover_background_color = new MikadoBurstField("colorsimple","blog_masonry_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_masonry_ql_hover_background_color",$blog_masonry_ql_hover_background_color);

$blog_masonry_show_ql_mark = new MikadoBurstField("yesno","blog_masonry_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for quote/link post format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_masonry_show_ql_mark_container"));
$panel10->addChild("blog_masonry_show_ql_mark",$blog_masonry_show_ql_mark);

$blog_masonry_show_ql_mark_container = new MikadoBurstContainer("blog_masonry_show_ql_mark_container","blog_masonry_show_ql_mark","no");
$panel10->addChild("blog_masonry_show_ql_mark_container",$blog_masonry_show_ql_mark_container);

$row1 = new MikadoBurstRow();
$blog_masonry_show_ql_mark_container->addChild("row1",$row1);

$blog_masonry_ql_mark_color = new MikadoBurstField("color","blog_masonry_ql_mark_color","","Icon Color","Choose icon color for quote/link post");
$row1->addChild("blog_masonry_ql_mark_color",$blog_masonry_ql_mark_color);

$blog_masonry_ql_mark_hover_color = new MikadoBurstField("color","blog_masonry_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_masonry_ql_mark_hover_color",$blog_masonry_ql_mark_hover_color);

$group8 = new MikadoBurstGroup("Blog List Spacing","Set spacing for blog layouts");
$panel10->addChild("group8",$group8);

$row1 = new MikadoBurstRow();
$group8->addChild("row1",$row1);

$blog_masonry_image_margin_bottom = new MikadoBurstField("textsimple","blog_masonry_image_margin_bottom","","Margin Under Image (px)","This is some description");
$row1->addChild("blog_masonry_image_margin_bottom",$blog_masonry_image_margin_bottom);

$blog_masonry_title_margin_bottom = new MikadoBurstField("textsimple","blog_masonry_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_masonry_title_margin_bottom",$blog_masonry_title_margin_bottom);

$blog_masonry_post_info_margin_bottom = new MikadoBurstField("textsimple","blog_masonry_post_info_margin_bottom","","Margin Under Post Info (px)","This is some description");
$row1->addChild("blog_masonry_post_info_margin_bottom",$blog_masonry_post_info_margin_bottom);

$blog_masonry_read_more_margin_top = new MikadoBurstField("textsimple","blog_masonry_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_masonry_read_more_margin_top",$blog_masonry_read_more_margin_top);

$row2 = new MikadoBurstRow();
$group8->addChild("row2",$row2);

$blog_masonry_social_share_list_margin_top = new MikadoBurstField("textsimple","blog_masonry_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row2->addChild("blog_masonry_social_share_list_margin_top",$blog_masonry_social_share_list_margin_top);

$blog_masonry_article_margin_bottom = new MikadoBurstField("textsimple","blog_masonry_article_margin_bottom","","Margin Between Articles (px)","This is some description");
$row2->addChild("blog_masonry_article_margin_bottom",$blog_masonry_article_margin_bottom);

$blog_masonry_post_info_bottom_margin_top = new MikadoBurstField("textsimple","blog_masonry_post_info_bottom_margin_top","","Margin Above Post Info When Post Info is on the bottom (px)","This is some description");
$row2->addChild("blog_masonry_post_info_bottom_margin_top",$blog_masonry_post_info_bottom_margin_top);

$group9 = new MikadoBurstGroup("Blog List Spacing for Quote and Link Post Type","Set spacing for blog layouts");
$panel10->addChild("group9",$group9);

$row1 = new MikadoBurstRow();
$group9->addChild("row1",$row1);

$blog_masonry_ql_title_margin_bottom = new MikadoBurstField("textsimple","blog_masonry_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_masonry_ql_title_margin_bottom",$blog_masonry_ql_title_margin_bottom);

$blog_masonry_ql_quote_author_margin_bottom = new MikadoBurstField("textsimple","blog_masonry_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_masonry_ql_quote_author_margin_bottom",$blog_masonry_ql_quote_author_margin_bottom);

$blog_masonry_ql_social_share_list_margin_top = new MikadoBurstField("textsimple","blog_masonry_ql_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row1->addChild("blog_masonry_ql_social_share_list_margin_top",$blog_masonry_ql_social_share_list_margin_top);


$group10 = new MikadoBurstGroup("Border Arround Article","Set border style for articles");
$panel10->addChild("group10",$group10);

$row1 = new MikadoBurstRow();
$group10->addChild("row1",$row1);

$blog_masonry_article_border_width = new MikadoBurstField("textsimple","blog_masonry_article_border_width","","Border Width (px)","This is some description");
$row1->addChild("blog_masonry_article_border_width",$blog_masonry_article_border_width);

$blog_masonry_article_border_color = new MikadoBurstField("colorsimple","blog_masonry_article_border_color","","Border Color","This is some description");
$row1->addChild("blog_masonry_article_border_color",$blog_masonry_article_border_color);

$post_text_styling= new MikadoBurstTitle("post_text_styling", "Post Text Style");
$panel10->addChild("post_text_styling", $post_text_styling);

$group2 = new MikadoBurstGroup("Post Title","Define title styles in this blog post template.");
$panel10->addChild("group2",$group2);

$row1 = new MikadoBurstRow();
$group2->addChild("row1",$row1);

$blog_masonry_title_color = new MikadoBurstField("colorsimple","blog_masonry_title_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_title_color",$blog_masonry_title_color);

$blog_masonry_title_hover_color = new MikadoBurstField("colorsimple","blog_masonry_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_masonry_title_hover_color",$blog_masonry_title_hover_color);

$blog_masonry_title_fontsize = new MikadoBurstField("textsimple","blog_masonry_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_title_fontsize",$blog_masonry_title_fontsize);

$row2 = new MikadoBurstRow(true);
$group2->addChild("row2",$row2);


$blog_masonry_title_lineheight = new MikadoBurstField("textsimple","blog_masonry_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_title_lineheight",$blog_masonry_title_lineheight);

$blog_masonry_title_google_fonts = new MikadoBurstField("fontsimple","blog_masonry_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_title_google_fonts",$blog_masonry_title_google_fonts);

$blog_masonry_title_fontstyle = new MikadoBurstField("selectblanksimple","blog_masonry_title_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_masonry_title_fontstyle",$blog_masonry_title_fontstyle);

$blog_masonry_title_fontweight = new MikadoBurstField("selectblanksimple","blog_masonry_title_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_masonry_title_fontweight",$blog_masonry_title_fontweight);

$row3 = new MikadoBurstRow(true);
$group2->addChild("row3",$row3);


$blog_masonry_title_texttransform = new MikadoBurstField("selectblanksimple","blog_masonry_title_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_masonry_title_texttransform",$blog_masonry_title_texttransform);

$blog_masonry_title_letterspacing = new MikadoBurstField("textsimple","blog_masonry_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_title_letterspacing",$blog_masonry_title_letterspacing);

$group4 = new MikadoBurstGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel10->addChild("group4",$group4);

$row1 = new MikadoBurstRow();
$group4->addChild("row1",$row1);

$blog_masonry_info_color = new MikadoBurstField("colorsimple","blog_masonry_info_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_info_color",$blog_masonry_info_color);

$blog_masonry_info_link_color = new MikadoBurstField("colorsimple","blog_masonry_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_masonry_info_link_color",$blog_masonry_info_link_color);

$blog_masonry_info_hover_color = new MikadoBurstField("colorsimple","blog_masonry_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_masonry_info_hover_color",$blog_masonry_info_hover_color);

$blog_masonry_info_fontsize = new MikadoBurstField("textsimple","blog_masonry_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_info_fontsize",$blog_masonry_info_fontsize);

$row2 = new MikadoBurstRow(true);
$group4->addChild("row2",$row2);


$blog_masonry_info_lineheight = new MikadoBurstField("textsimple","blog_masonry_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_masonry_info_lineheight",$blog_masonry_info_lineheight);

$blog_masonry_info_google_fonts = new MikadoBurstField("fontsimple","blog_masonry_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_info_google_fonts",$blog_masonry_info_google_fonts);

$blog_masonry_info_fontstyle = new MikadoBurstField("selectblanksimple","blog_masonry_info_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_masonry_info_fontstyle",$blog_masonry_info_fontstyle);

$blog_masonry_info_fontweight = new MikadoBurstField("selectblanksimple","blog_masonry_info_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_masonry_info_fontweight",$blog_masonry_info_fontweight);

$row3 = new MikadoBurstRow(true);
$group4->addChild("row3",$row3);

$blog_masonry_info_texttransform = new MikadoBurstField("selectblanksimple","blog_masonry_info_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row3->addChild("blog_masonry_info_texttransform",$blog_masonry_info_texttransform);

$blog_masonry_info_letterspacing = new MikadoBurstField("textsimple","blog_masonry_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_info_letterspacing",$blog_masonry_info_letterspacing);

$group3 = new MikadoBurstGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel10->addChild("group3",$group3);

$row1 = new MikadoBurstRow();
$group3->addChild("row1",$row1);

$blog_masonry_ql_title_color = new MikadoBurstField("colorsimple","blog_masonry_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_ql_title_color",$blog_masonry_ql_title_color);

$blog_masonry_ql_title_hover_color = new MikadoBurstField("colorsimple","blog_masonry_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_masonry_ql_title_hover_color",$blog_masonry_ql_title_hover_color);

$blog_masonry_ql_title_fontsize = new MikadoBurstField("textsimple","blog_masonry_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_ql_title_font_size",$blog_masonry_ql_title_fontsize);

$blog_masonry_ql_title_lineheight = new MikadoBurstField("textsimple","blog_masonry_ql_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_ql_title_lineheight",$blog_masonry_ql_title_lineheight);

$row2 = new MikadoBurstRow(true);
$group3->addChild("row2",$row2);

$blog_masonry_ql_title_texttransform = new MikadoBurstField("selectblanksimple","blog_masonry_ql_title_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_masonry_ql_title_texttransform",$blog_masonry_ql_title_texttransform);

$blog_masonry_ql_title_google_fonts = new MikadoBurstField("fontsimple","blog_masonry_ql_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_ql_title_google_fonts",$blog_masonry_ql_title_google_fonts);

$blog_masonry_ql_title_fontstyle = new MikadoBurstField("selectblanksimple","blog_masonry_ql_title_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_masonry_ql_title_fontstyle",$blog_masonry_ql_title_fontstyle);

$blog_masonry_ql_title_fontweight = new MikadoBurstField("selectblanksimple","blog_masonry_ql_title_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_masonry_ql_title_fontweight",$blog_masonry_ql_title_fontweight);

$row3 = new MikadoBurstRow(true);
$group3->addChild("row3",$row3);

$blog_masonry_ql_title_letterspacing = new MikadoBurstField("textsimple","blog_masonry_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_ql_title_letterspacing",$blog_masonry_ql_title_letterspacing);

$group5 = new MikadoBurstGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list.");
$panel10->addChild("group5",$group5);

$row1 = new MikadoBurstRow();
$group5->addChild("row1",$row1);

$blog_masonry_ql_info_color = new MikadoBurstField("colorsimple","blog_masonry_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_ql_info_color",$blog_masonry_ql_info_color);

$blog_masonry_ql_info_link_color = new MikadoBurstField("colorsimple","blog_masonry_ql_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_masonry_ql_info_link_color",$blog_masonry_ql_info_link_color);

$blog_masonry_ql_info_hover_color = new MikadoBurstField("colorsimple","blog_masonry_ql_info_hover_color","","Hover Color","This is some description");
$row1->addChild("blog_masonry_ql_info_hover_color",$blog_masonry_ql_info_hover_color);

$blog_masonry_ql_info_fontsize = new MikadoBurstField("textsimple","blog_masonry_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_ql_info_fontsize",$blog_masonry_ql_info_fontsize);

$row2 = new MikadoBurstRow(true);
$group5->addChild("row2",$row2);

$blog_masonry_ql_info_lineheight = new MikadoBurstField("textsimple","blog_masonry_ql_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_masonry_ql_info_lineheight",$blog_masonry_ql_info_lineheight);

$blog_masonry_ql_info_google_fonts = new MikadoBurstField("fontsimple","blog_masonry_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_ql_info_google_fonts",$blog_masonry_ql_info_google_fonts);

$blog_masonry_ql_info_fontstyle = new MikadoBurstField("selectblanksimple","blog_masonry_ql_info_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_masonry_ql_info_fontstyle",$blog_masonry_ql_info_fontstyle);

$blog_masonry_ql_info_fontweight = new MikadoBurstField("selectblanksimple","blog_masonry_ql_info_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_masonry_ql_info_fontweight",$blog_masonry_ql_info_fontweight);

$row3 = new MikadoBurstRow(true);
$group5->addChild("row3",$row3);

$blog_masonry_ql_info_texttransform = new MikadoBurstField("selectblanksimple","blog_masonry_ql_info_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row3->addChild("blog_masonry_ql_info_texttransform",$blog_masonry_ql_info_texttransform);

$blog_masonry_ql_info_letterspacing = new MikadoBurstField("textsimple","blog_masonry_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_ql_info_letterspacing",$blog_masonry_ql_info_letterspacing);

$group6 = new MikadoBurstGroup("Quote Author Style","Define author styles for Quote articles");
$panel10->addChild("group6",$group6);

$row1 = new MikadoBurstRow();
$group6->addChild("row1",$row1);

$blog_masonry_ql_author_color = new MikadoBurstField("colorsimple","blog_masonry_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_ql_author_color",$blog_masonry_ql_author_color);

$blog_masonry_ql_author_hover_color = new MikadoBurstField("colorsimple","blog_masonry_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_masonry_ql_author_hover_color",$blog_masonry_ql_author_hover_color);

$blog_masonry_ql_author_fontsize = new MikadoBurstField("textsimple","blog_masonry_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_ql_author_font_size",$blog_masonry_ql_author_fontsize);

$blog_masonry_ql_author_lineheight = new MikadoBurstField("textsimple","blog_masonry_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_ql_author_lineheight",$blog_masonry_ql_author_lineheight);

$row2 = new MikadoBurstRow(true);
$group6->addChild("row2",$row2);

$blog_masonry_ql_author_texttransform = new MikadoBurstField("selectblanksimple","blog_masonry_ql_author_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_masonry_ql_author_texttransform",$blog_masonry_ql_author_texttransform);

$blog_masonry_ql_author_google_fonts = new MikadoBurstField("fontsimple","blog_masonry_ql_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_ql_author_google_fonts",$blog_masonry_ql_author_google_fonts);

$blog_masonry_ql_author_fontstyle = new MikadoBurstField("selectblanksimple","blog_masonry_ql_author_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_masonry_ql_author_fontstyle",$blog_masonry_ql_author_fontstyle);

$blog_masonry_ql_author_fontweight = new MikadoBurstField("selectblanksimple","blog_masonry_ql_author_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_masonry_ql_author_fontweight",$blog_masonry_ql_author_fontweight);

$row3 = new MikadoBurstRow(true);
$group6->addChild("row3",$row3);

$blog_masonry_ql_author_letterspacing = new MikadoBurstField("textsimple","blog_masonry_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_ql_author_letterspacing",$blog_masonry_ql_author_letterspacing);


$blog_masonry_meta_info_featured_subtitle = new MikadoBurstTitle("blog_masonry_meta_info_featured_subtitle", "Meta Info Featured on Side");
$panel10->addChild("blog_masonry_meta_info_featured_subtitle", $blog_masonry_meta_info_featured_subtitle);

$blog_masonry_meta_info_featured_on_side_post_info_border_color = new MikadoBurstField("color","blog_masonry_meta_info_featured_on_side_post_info_border_color","","Post Info Border Color","Default color is #ebebeb.");
$panel10->addChild("blog_masonry_meta_info_featured_on_side_post_info_border_color",$blog_masonry_meta_info_featured_on_side_post_info_border_color);

$group11 = new MikadoBurstGroup("Post Info Date Box","Set style for Post Info Date Box");
$panel10->addChild("group11",$group11);

$row1 = new MikadoBurstRow();
$group11->addChild("row1",$row1);

$blog_masonry_meta_info_featured_on_side_date_box_background_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_date_box_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_date_box_background_color",$blog_masonry_meta_info_featured_on_side_date_box_background_color);

$blog_masonry_meta_info_featured_on_side_date_month_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_date_month_color","","Month Color","Default color is #e6ae48.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_date_month_color",$blog_masonry_meta_info_featured_on_side_date_month_color);

$blog_masonry_meta_info_featured_on_side_date_day_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_date_day_color","","Day Color","Default color is #e6ae48.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_date_day_color",$blog_masonry_meta_info_featured_on_side_date_day_color);

$blog_masonry_meta_info_featured_on_side_date_padding_top = new MikadoBurstField("textsimple","blog_masonry_meta_info_featured_on_side_date_padding_top","","Padding Top","This is some description");
$row1->addChild("blog_masonry_meta_info_featured_on_side_date_padding_top",$blog_masonry_meta_info_featured_on_side_date_padding_top);

$row2 = new MikadoBurstRow();
$group11->addChild("row2",$row2);

$blog_masonry_meta_info_featured_on_side_date_padding_bottom = new MikadoBurstField("textsimple","blog_masonry_meta_info_featured_on_side_date_padding_bottom","","Padding Bottom","This is some description");
$row2->addChild("blog_masonry_meta_info_featured_on_side_date_padding_bottom",$blog_masonry_meta_info_featured_on_side_date_padding_bottom);

$group12 = new MikadoBurstGroup("Post Info Like Box","Set style for Post Info Like Box");
$panel10->addChild("group12",$group12);

$row1 = new MikadoBurstRow();
$group12->addChild("row1",$row1);

$blog_masonry_meta_info_featured_on_side_like_box_background_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_like_box_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_like_box_background_color",$blog_masonry_meta_info_featured_on_side_like_box_background_color);

$blog_masonry_meta_info_featured_on_side_like_box_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_like_box_color","","Icon Color","Default color is #e6ae48.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_like_box_color",$blog_masonry_meta_info_featured_on_side_like_box_color);

$blog_masonry_meta_info_featured_on_side_like_box_hover_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_like_box_hover_color","","Icon Hover Color","");
$row1->addChild("blog_masonry_meta_info_featured_on_side_like_box_hover_color",$blog_masonry_meta_info_featured_on_side_like_box_hover_color);

$blog_masonry_meta_info_featured_on_side_like_count_number_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_like_count_number_color","","Number Color","Default color is #e6ae48.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_like_count_number_color",$blog_masonry_meta_info_featured_on_side_like_count_number_color);

$row2 = new MikadoBurstRow();
$group12->addChild("row2",$row2);

$blog_masonry_meta_info_featured_on_side_like_padding_top = new MikadoBurstField("textsimple","blog_masonry_meta_info_featured_on_side_like_padding_top","","Padding Top","This is some description");
$row2->addChild("blog_masonry_meta_info_featured_on_side_like_padding_top",$blog_masonry_meta_info_featured_on_side_like_padding_top);

$blog_masonry_meta_info_featured_on_side_like_padding_bottom = new MikadoBurstField("textsimple","blog_masonry_meta_info_featured_on_side_like_padding_bottom","","Padding Bottom","This is some description");
$row2->addChild("blog_masonry_meta_info_featured_on_side_like_padding_bottom",$blog_masonry_meta_info_featured_on_side_like_padding_bottom);

$group13 = new MikadoBurstGroup("Post Info Share Box","Set style for Post Info Share Box");
$panel10->addChild("group13",$group13);

$row1 = new MikadoBurstRow();
$group13->addChild("row1",$row1);

$blog_masonry_meta_info_featured_on_side_share_box_background_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_share_box_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_share_box_background_color",$blog_masonry_meta_info_featured_on_side_share_box_background_color);

$blog_masonry_meta_info_featured_on_side_share_box_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_share_box_color","","Color","Default color is #e6ae48.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_share_box_color",$blog_masonry_meta_info_featured_on_side_share_box_color);

$blog_masonry_meta_info_featured_on_side_share_box_hover_color = new MikadoBurstField("colorsimple","blog_masonry_meta_info_featured_on_side_share_box_hover_color","","Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_masonry_meta_info_featured_on_side_share_box_hover_color",$blog_masonry_meta_info_featured_on_side_share_box_hover_color);

$blog_masonry_meta_info_featured_on_side_share_padding_top = new MikadoBurstField("textsimple","blog_masonry_meta_info_featured_on_side_share_padding_top","","Padding Top","This is some description");
$row1->addChild("blog_masonry_meta_info_featured_on_side_share_padding_top",$blog_masonry_meta_info_featured_on_side_share_padding_top);

$row2 = new MikadoBurstRow();
$group13->addChild("row2",$row2);

$blog_masonry_meta_info_featured_on_side_share_padding_bottom = new MikadoBurstField("textsimple","blog_masonry_meta_info_featured_on_side_share_padding_bottom","","Padding Bottom","This is some description");
$row2->addChild("blog_masonry_meta_info_featured_on_side_share_padding_bottom",$blog_masonry_meta_info_featured_on_side_share_padding_bottom);

// Blog Post List - Blog: Standard
$panel21 = new MikadoBurstPanel("Blog List Template Options: Standard","blog_standard_type_post_lists", "blog_standard_type_show_options", "no");
$blogPage->addChild("panel21",$panel21);

$blog_standard_type_number_of_chars = new MikadoBurstField("text","blog_standard_type_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel21->addChild("blog_standard_type_number_of_chars",$blog_standard_type_number_of_chars);

$blog_standard_type_image_size = new MikadoBurstField("select","blog_standard_type_image_size","full","Blog Image Size","Choose image size for Blog Single pages", array(
    "full" => "Default",
    "portfolio-landscape" => "Landscape",
    "portfolio-portrait" => "Portrait",
    "custom" => "Custom"
),
    array("dependence" => true,
        "hide" => array(
            "full"=>"#mkdf_blog_standard_type_image_size_container",
            "portfolio-landscape"=>"#mkdf_blog_standard_type_image_size_container",
            "portfolio-portrait"=>"#mkdf_blog_standard_type_image_size_container",
            "custom"=>""
        ),
        "show" => array(
            "full"=>"",
            "portfolio-landscape"=>"",
            "portfolio-portrait"=>"",
            "custom"=>"#mkdf_blog_standard_type_image_size_container"
        )
    )
);
$panel21->addChild("blog_standard_type_image_size",$blog_standard_type_image_size);

$blog_standard_type_image_size_container = new MikadoBurstContainer("blog_standard_type_image_size_container","blog_standard_type_image_size","", array( "full","portfolio-landscape","portfolio-portrait"));
$panel21->addChild("blog_standard_type_image_size_container",$blog_standard_type_image_size_container);

$blog_standard_type_image_size_height = new MikadoBurstField("text","blog_standard_type_image_size_height","","Image Height (px)","Enter width (in pixels) for Custom Image for Blog Single", array(), array("col_width" => 3));
$blog_standard_type_image_size_container->addChild("blog_standard_type_image_size_height",$blog_standard_type_image_size_height);

$blog_standard_type_image_size_width = new MikadoBurstField("text","blog_standard_type_image_size_width","","Image Width (px)","Enter width (in pixels) for Custom Image for Blog Single", array(), array("col_width" => 3));
$blog_standard_type_image_size_container->addChild("blog_standard_type_image_size_width",$blog_standard_type_image_size_width);

$blog_standard_type_read_more_button = new MikadoBurstField("yesno","blog_standard_type_read_more_button","yes","Read More Button","Enable Read More Button", array(),
    array("dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_blog_standard_type_read_more_button_container"));
$panel21->addChild("blog_standard_type_read_more_button",$blog_standard_type_read_more_button);

$blog_standard_type_read_more_button_container = new MikadoBurstContainer("blog_standard_type_read_more_button_container","blog_standard_type_read_more_button","no");
$panel21->addChild("blog_standard_type_read_more_button_container",$blog_standard_type_read_more_button_container);

$blog_standard_type_read_more_button_icon = new MikadoBurstField("yesno","blog_standard_type_read_more_button_icon","no","Enable Icon","Enabling this option will place icon in read more button", array(),
    array("dependence" => true,
        "dependence_hide_on_yes" => "",
        "dependence_show_on_yes" => "#mkdf_blog_standard_type_read_more_button_icon_container"));
$blog_standard_type_read_more_button_container->addChild("blog_standard_type_read_more_button_icon",$blog_standard_type_read_more_button_icon);

$blog_standard_type_read_more_button_icon_container = new MikadoBurstContainer("blog_standard_type_read_more_button_icon_container","blog_standard_type_read_more_button_icon","no");
$blog_standard_type_read_more_button_container->addChild("blog_standard_type_read_more_button_icon_container",$blog_standard_type_read_more_button_icon_container);

//init icon pack hide and show array. It will be populated dinamically from collections array
$blog_standard_type_read_more_button_icon_pack_hide_array = array();
$blog_standard_type_read_more_button_icon_pack_show_array = array();

//do we have some collection added in collections array?
if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
    //get collections params array. It will contain values of 'param' property for each collection
    $blog_standard_type_read_more_button_icon_collections_params = $mkd_burst_IconCollections->getIconCollectionsParams();

    //foreach collection generate hide and show array
    foreach ($mkd_burst_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {
        $blog_standard_type_read_more_button_icon_pack_hide_array[$dep_collection_key] = '';

        //we need to include only current collection in show string as it is the only one that needs to show
        $blog_standard_type_read_more_button_icon_pack_show_array[$dep_collection_key] = '#mkdf_blog_standard_type_read_more_button_icon_'.$dep_collection_object->param.'_container';

        //for all collections param generate hide string
        foreach ($blog_standard_type_read_more_button_icon_collections_params as $blog_standard_type_read_more_button_icon_collections_param) {
            //we don't need to include current one, because it needs to be shown, not hidden
            if($blog_standard_type_read_more_button_icon_collections_param !== $dep_collection_object->param) {
                $blog_standard_type_read_more_button_icon_pack_hide_array[$dep_collection_key].= '#mkdf_blog_standard_type_read_more_button_icon_'.$blog_standard_type_read_more_button_icon_collections_param.'_container,';
            }
        }

        //remove remaining ',' character
        $blog_standard_type_read_more_button_icon_pack_hide_array[$dep_collection_key] = rtrim($blog_standard_type_read_more_button_icon_pack_hide_array[$dep_collection_key], ',');
    }

}

$blog_standard_type_read_more_button_icon_pack = new MikadoBurstField(
    "select",
    "blog_standard_type_read_more_button_icon_pack",
    "font_awesome",
    "Icon Pack",
    "Choose icon pack for show load more button",
    $mkd_burst_IconCollections->getIconCollections(),
    array(
        "dependence" => true,
        "hide" => $blog_standard_type_read_more_button_icon_pack_hide_array,
        "show" => $blog_standard_type_read_more_button_icon_pack_show_array
    ));

$blog_standard_type_read_more_button_icon_container->addChild("blog_standard_type_read_more_button_icon_pack", $blog_standard_type_read_more_button_icon_pack);

if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
    //foreach icon collection we need to generate separate container that will have dependency set
    //it will have one field inside with icons dropdown
    foreach ($mkd_burst_IconCollections->iconCollections as $collection_key => $collection_object) {
        $icons_array = $collection_object->getIconsArray();

        //get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
        $icon_collections_keys = $mkd_burst_IconCollections->getIconCollectionsKeys();

        //unset current one, because it doesn't have to be included in dependency that hides icon container
        unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

        $blog_standard_type_read_more_button_icon_hide_values = $icon_collections_keys;
        $blog_icon_container = new MikadoBurstContainer("blog_standard_type_read_more_button_icon_".$collection_object->param."_container", "blog_standard_type_read_more_button_icon_pack", "", $blog_standard_type_read_more_button_icon_hide_values);
        $blog_standard_type_read_more_button_icon = new MikadoBurstField("select", "blog_standard_type_read_more_button_icon_".$collection_object->param, "", "Button Icon","Choose Button Icon", $icons_array, array("col_width" => 3));
        $blog_icon_container->addChild("blog_standard_type_read_more_button_icon_".$collection_object->param, $blog_standard_type_read_more_button_icon);

        $blog_standard_type_read_more_button_icon_container->addChild("blog_standard_type_read_more_button_icon_".$collection_object->param."_container", $blog_icon_container);
    }

}


$blog_standard_type_content_position = new MikadoBurstField("select","blog_standard_type_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));
$panel21->addChild("blog_standard_type_content_position",$blog_standard_type_content_position);

$blog_standard_type_post_meta_data_section = new MikadoBurstTitle("blog_standard_type_post_meta_data_section", "Post Info Data Fields");
$panel21->addChild("blog_standard_type_post_meta_data_section", $blog_standard_type_post_meta_data_section);

$blog_standard_type_show_categories = new MikadoBurstField("yesno","blog_standard_type_show_categories","yes","Show Categories","Enabling this option will Show Categories on Post List");
$panel21->addChild("blog_standard_type_show_categories",$blog_standard_type_show_categories);

$blog_standard_type_show_comments = new MikadoBurstField("yesno","blog_standard_type_show_comments","no","Show Comments","Enabling this option will Show Comments on Post List");
$panel21->addChild("blog_standard_type_show_comments",$blog_standard_type_show_comments);

$blog_standard_type_show_author = new MikadoBurstField("yesno","blog_standard_type_show_author","yes","Show Author Name","Enabling this option will show author name on Post List and Blog Post Single");
$panel21->addChild("blog_standard_type_show_author",$blog_standard_type_show_author);

$blog_standard_type_show_date = new MikadoBurstField("yesno","blog_standard_type_show_date","yes","Show Date","Enabling this option will show date on Post List");
$panel21->addChild("blog_standard_type_hide_date",$blog_standard_type_show_date);

$blog_standard_type_show_share = new MikadoBurstField("yesno","blog_standard_type_show_share","no","Show Share","Enabling this option will show share on Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_standard_type_share_options_container"));
$panel21->addChild("blog_standard_type_show_share",$blog_standard_type_show_share);

$blog_standard_type_share_options_container = new MikadoBurstContainer("blog_standard_type_share_options_container","blog_standard_type_show_share","no");
$panel21->addChild("blog_standard_type_share_options_container",$blog_standard_type_share_options_container);

$blog_standard_type_select_share_option = new MikadoBurstField("select","blog_standard_type_select_share_option","dropdown","Social Share Style","Choose Social Share Style for Standard Type",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
), array("dependence" => true,
	"hide" => array("dropdown" => "#mkdf_blog_standard_type_share_list_type_container", "list" => "#mkdf_blog_standard_type_share_dropdown_type_container"),
	"show" => array("dropdown" => "#mkdf_blog_standard_type_share_dropdown_type_container", "list" => "#mkdf_blog_standard_type_share_list_type_container")
));

$blog_standard_type_share_options_container->addChild("blog_standard_type_select_share_option",$blog_standard_type_select_share_option);

$blog_standard_type_share_list_type_container = new MikadoBurstContainer("blog_standard_type_share_list_type_container","blog_standard_type_select_share_option", "dropdown");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_list_type_container",$blog_standard_type_share_list_type_container);

	$blog_standard_type_share_hld_hover_icon_color = new MikadoBurstField("color","blog_standard_type_share_hld_hover_icon_color","","Icon color on Quote/Link Holder Hover","Choose icon color for list share type when the quote/link holder is hovered over");
	$blog_standard_type_share_list_type_container->addChild("blog_standard_type_share_hld_hover_icon_color",$blog_standard_type_share_hld_hover_icon_color);

$blog_standard_type_share_dropdown_type_container = new MikadoBurstContainer("blog_standard_type_share_dropdown_type_container","blog_standard_type_select_share_option", "list");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_dropdown_type_container",$blog_standard_type_share_dropdown_type_container);

	$blog_standard_type_share_background_color = new MikadoBurstField("color","blog_standard_type_share_background_color","","Background Color","Choose background color for dropdown share type");
	$blog_standard_type_share_dropdown_type_container->addChild("blog_standard_type_share_background_color",$blog_standard_type_share_background_color);

	$blog_standard_type_share_background_color_link_post_type = new MikadoBurstField("color","blog_standard_type_share_background_color_link_post_type","","Background Color on Quote/Link Post Type","Choose background color for dropdown share type on quote post type");
	$blog_standard_type_share_dropdown_type_container->addChild("blog_standard_type_share_background_color_link_post_type",$blog_standard_type_share_background_color_link_post_type);

$blog_standard_type_share_icon_color = new MikadoBurstField("color","blog_standard_type_share_icon_color","","Icon Color","Choose icon color for dropdown and list share type");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_icon_color",$blog_standard_type_share_icon_color);

$blog_standard_type_share_icon_hover_color = new MikadoBurstField("color","blog_standard_type_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for dropdown and list Share Type");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_icon_hover_color",$blog_standard_type_share_icon_hover_color);

$blog_standard_type_share_icon_color_link_post_type = new MikadoBurstField("color","blog_standard_type_share_icon_color_link_post_type","","Icon Color For Quote/Link Post Type","Choose icon color for dropdown and list share type for quote post type");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_icon_color_link_post_type",$blog_standard_type_share_icon_color_link_post_type);

$blog_standard_type_share_icon_hover_color_link_post_type  = new MikadoBurstField("color","blog_standard_type_share_icon_hover_color_link_post_type","","Icon Hover Color For Quote/Link Post Type","Choose icon hover color for dropdown and list Share Type for quote post type");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_icon_hover_color_link_post_type",$blog_standard_type_share_icon_hover_color_link_post_type);

$blog_standard_type_show_like = new MikadoBurstField("yesno","blog_standard_type_show_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel21->addChild("blog_standard_type_show_like",$blog_standard_type_show_like);

$blog_standard_type_post_design_style = new MikadoBurstTitle("blog_standard_type_post_design_style", "Post Design Style");
$panel21->addChild("blog_standard_type_post_design_style", $blog_standard_type_post_design_style);

$blog_standard_type_enable_text_box = new MikadoBurstField("yesno","blog_standard_type_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_standard_type_enable_text_box_container"));
$panel21->addChild("blog_standard_type_enable_text_box",$blog_standard_type_enable_text_box);

$blog_standard_type_enable_text_box_container = new MikadoBurstContainer("blog_standard_type_enable_text_box_container","blog_standard_type_enable_text_box","no");
$panel21->addChild("blog_standard_type_enable_text_box_container",$blog_standard_type_enable_text_box_container);

$blog_standard_type_box_background_color = new MikadoBurstField("color","blog_standard_type_box_background_color","","Background Color","Choose background color for post text box");
$blog_standard_type_enable_text_box_container->addChild("blog_standard_type_box_background_color",$blog_standard_type_box_background_color);

$blog_standard_type_box_border_color = new MikadoBurstField("color","blog_standard_type_box_border_color","","Border Color","Choose border color for post text box");
$blog_standard_type_enable_text_box_container->addChild("blog_standard_type_box_border_color",$blog_standard_type_box_border_color);

$blog_standard_type_box_padding = new MikadoBurstField("text","blog_standard_type_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_standard_type_enable_text_box_container->addChild("blog_standard_type_box_padding",$blog_standard_type_box_padding);

$group10 = new MikadoBurstGroup("Paragraph","Set paragraph color");
$panel21->addChild("group10",$group10);

$blog_standard_type_paragraph_color = new MikadoBurstField("colorsimple","blog_standard_type_paragraph_color","","Color","This is some description");
$group10->addChild("blog_standard_type_paragraph_color",$blog_standard_type_paragraph_color);

$group1 = new MikadoBurstGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel21->addChild("group1",$group1);

$row1 = new MikadoBurstRow();
$group1->addChild("row1",$row1);

$blog_standard_type_ql_background_image = new MikadoBurstField("yesnosimple","blog_standard_type_ql_background_image","no","Background Image","");
$row1->addChild("blog_standard_type_ql_background_image",$blog_standard_type_ql_background_image);

$blog_standard_type_ql_background_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_standard_type_ql_background_color",$blog_standard_type_ql_background_color);

$blog_standard_type_ql_hover_background_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_standard_type_ql_hover_background_color",$blog_standard_type_ql_hover_background_color);

$blog_standard_type_show_ql_mark = new MikadoBurstField("yesno","blog_standard_type_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for Quote/Link Post Format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#mkdf_blog_standard_type_show_ql_mark_container"));
$panel21->addChild("blog_standard_type_show_ql_mark",$blog_standard_type_show_ql_mark);

$blog_standard_type_show_ql_mark_container = new MikadoBurstContainer("blog_standard_type_show_ql_mark_container","blog_standard_type_show_ql_mark","no");
$panel21->addChild("blog_standard_type_show_ql_mark_container",$blog_standard_type_show_ql_mark_container);

$row1 = new MikadoBurstRow();
$blog_standard_type_show_ql_mark_container->addChild("row1",$row1);

$blog_standard_type_ql_mark_color = new MikadoBurstField("color","blog_standard_type_ql_mark_color","","Icon Color","Choose icon color for quote/link post.");
$row1->addChild("blog_standard_type_ql_mark_color",$blog_standard_type_ql_mark_color);

$blog_standard_type_ql_mark_hover_color = new MikadoBurstField("color","blog_standard_type_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_standard_type_ql_mark_hover_color",$blog_standard_type_ql_mark_hover_color);

$group11 = new MikadoBurstGroup("Blog List Spacing","Set spacing for blog layouts");
$panel21->addChild("group11",$group11);

$row1 = new MikadoBurstRow();
$group11->addChild("row1",$row1);

$blog_standard_type_image_margin_bottom = new MikadoBurstField("textsimple","blog_standard_type_image_margin_bottom","","Margin Under Image (px)","This is some description");
$row1->addChild("blog_standard_type_image_margin_bottom",$blog_standard_type_image_margin_bottom);

$blog_standard_type_title_margin_bottom = new MikadoBurstField("textsimple","blog_standard_type_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_standard_type_title_margin_bottom",$blog_standard_type_title_margin_bottom);

$blog_standard_type_read_more_margin_top = new MikadoBurstField("textsimple","blog_standard_type_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_standard_type_read_more_margin_top",$blog_standard_type_read_more_margin_top);

$blog_standard_type_post_info_margin_bottom = new MikadoBurstField("textsimple","blog_standard_type_post_info_margin_bottom","","Margin Under Post Info (px)","This is some description");
$row1->addChild("blog_standard_type_post_info_margin_bottom",$blog_standard_type_post_info_margin_bottom);

$row2 = new MikadoBurstRow();
$group11->addChild("row2",$row2);

$blog_standard_type_article_margin_bottom = new MikadoBurstField("textsimple","blog_standard_type_article_margin_bottom","","Margin Between Articles (px)","This is some description");
$row2->addChild("blog_standard_type_article_margin_bottom",$blog_standard_type_article_margin_bottom);

$blog_standard_type_single_article_social_share_list_margin_top = new MikadoBurstField("textsimple","blog_standard_type_single_article_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row2->addChild("blog_standard_type_single_article_social_share_list_margin_top",$blog_standard_type_single_article_social_share_list_margin_top);

$group12 = new MikadoBurstGroup("Blog List Spacing for Quote and Link Post Type","Set spacing for blog layouts");
$panel21->addChild("group12",$group12);

$row1 = new MikadoBurstRow();
$group12->addChild("row1",$row1);

$blog_standard_type_ql_title_margin_bottom = new MikadoBurstField("textsimple","blog_standard_type_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_standard_type_ql_title_margin_bottom",$blog_standard_type_ql_title_margin_bottom);

$blog_standard_type_ql_social_share_list_margin_top = new MikadoBurstField("textsimple","blog_standard_type_ql_social_share_list_margin_top","","Margin Above Social Share List (px)","This is some description");
$row1->addChild("blog_standard_type_ql_social_share_list_margin_top",$blog_standard_type_ql_social_share_list_margin_top);

$blog_standard_type_ql_quote_author_margin_bottom = new MikadoBurstField("textsimple","blog_standard_type_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_standard_type_ql_quote_author_margin_bottom",$blog_standard_type_ql_quote_author_margin_bottom);

$post_text_styling= new MikadoBurstTitle("post_text_styling", "Post Text Style");
$panel21->addChild("post_text_styling", $post_text_styling);

$group5 = new MikadoBurstGroup("Post Title","Define title styles in this blog post template.");
$panel21->addChild("group5",$group5);

$row1 = new MikadoBurstRow();
$group5->addChild("row1",$row1);

$blog_standard_type_title_color = new MikadoBurstField("colorsimple","blog_standard_type_title_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_title_color",$blog_standard_type_title_color);

$blog_standard_type_title_hover_color = new MikadoBurstField("colorsimple","blog_standard_type_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_standard_type_title_hover_color",$blog_standard_type_title_hover_color);

$blog_standard_type_title_fontsize = new MikadoBurstField("textsimple","blog_standard_type_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_title_fontsize",$blog_standard_type_title_fontsize);

$blog_standard_type_title_lineheight = new MikadoBurstField("textsimple","blog_standard_type_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_standard_type_title_lineheight",$blog_standard_type_title_lineheight);

$row2 = new MikadoBurstRow(true);
$group5->addChild("row2",$row2);

$blog_standard_type_title_texttransform = new MikadoBurstField("selectblanksimple","blog_standard_type_title_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_standard_type_title_texttransform",$blog_standard_type_title_texttransform);

$blog_standard_type_title_google_fonts = new MikadoBurstField("fontsimple","blog_standard_type_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_title_google_fonts",$blog_standard_type_title_google_fonts);

$blog_standard_type_title_fontstyle = new MikadoBurstField("selectblanksimple","blog_standard_type_title_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_standard_type_title_fontstyle",$blog_standard_type_title_fontstyle);

$blog_standard_type_title_fontweight = new MikadoBurstField("selectblanksimple","blog_standard_type_title_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_standard_type_title_fontweight",$blog_standard_type_title_fontweight);

$row3 = new MikadoBurstRow(true);
$group5->addChild("row3",$row3);

$blog_standard_type_title_letterspacing = new MikadoBurstField("textsimple","blog_standard_type_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_title_letterspacing",$blog_standard_type_title_letterspacing);

$group7 = new MikadoBurstGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel21->addChild("group7",$group7);

$row1 = new MikadoBurstRow();
$group7->addChild("row1",$row1);

$blog_standard_type_info_color = new MikadoBurstField("colorsimple","blog_standard_type_info_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_info_color",$blog_standard_type_info_color);

$blog_standard_type_info_link_color = new MikadoBurstField("colorsimple","blog_standard_type_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_standard_type_info_link_color",$blog_standard_type_info_link_color);

$blog_standard_type_info_hover_color = new MikadoBurstField("colorsimple","blog_standard_type_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_standard_type_info_hover_color",$blog_standard_type_info_hover_color);

$blog_standard_type_info_fontsize = new MikadoBurstField("textsimple","blog_standard_type_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_info_fontsize",$blog_standard_type_info_fontsize);

$row2 = new MikadoBurstRow(true);
$group7->addChild("row2",$row2);

$blog_standard_type_info_lineheight = new MikadoBurstField("textsimple","blog_standard_type_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_standard_type_info_lineheight",$blog_standard_type_info_lineheight);

$blog_standard_type_info_google_fonts = new MikadoBurstField("fontsimple","blog_standard_type_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_info_google_fonts",$blog_standard_type_info_google_fonts);

$blog_standard_type_info_fontstyle = new MikadoBurstField("selectblanksimple","blog_standard_type_info_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_standard_type_info_fontstyle",$blog_standard_type_info_fontstyle);

$blog_standard_type_info_fontweight = new MikadoBurstField("selectblanksimple","blog_standard_type_info_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_standard_type_info_fontweight",$blog_standard_type_info_fontweight);

$row3 = new MikadoBurstRow(true);
$group7->addChild("row3",$row3);

$blog_standard_type_info_texttransform = new MikadoBurstField("selectblanksimple","blog_standard_type_info_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row3->addChild("blog_standard_type_info_texttransform",$blog_standard_type_info_texttransform);

$blog_standard_type_info_letterspacing = new MikadoBurstField("textsimple","blog_standard_type_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_info_letterspacing",$blog_standard_type_info_letterspacing);

$group6 = new MikadoBurstGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel21->addChild("group6",$group6);

$row1 = new MikadoBurstRow();
$group6->addChild("row1",$row1);

$blog_standard_type_ql_title_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_ql_title_color",$blog_standard_type_ql_title_color);

$blog_standard_type_ql_title_hover_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_standard_type_ql_title_hover_color",$blog_standard_type_ql_title_hover_color);

$blog_standard_type_ql_title_fontsize = new MikadoBurstField("textsimple","blog_standard_type_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_ql_title_font_size",$blog_standard_type_ql_title_fontsize);

$blog_standard_type_ql_title_lineheight = new MikadoBurstField("textsimple","blog_standard_type_ql_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_standard_type_ql_title_lineheight",$blog_standard_type_ql_title_lineheight);


$row2 = new MikadoBurstRow(true);
$group6->addChild("row2",$row2);

$blog_standard_type_ql_title_texttransform = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_title_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_standard_type_ql_title_texttransform",$blog_standard_type_ql_title_texttransform);

$blog_standard_type_ql_title_google_fonts = new MikadoBurstField("fontsimple","blog_standard_type_ql_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_ql_title_google_fonts",$blog_standard_type_ql_title_google_fonts);

$blog_standard_type_ql_title_fontstyle = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_title_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_standard_type_ql_title_fontstyle",$blog_standard_type_ql_title_fontstyle);

$blog_standard_type_ql_title_fontweight = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_title_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_standard_type_ql_title_fontweight",$blog_standard_type_ql_title_fontweight);

$row3 = new MikadoBurstRow(true);
$group6->addChild("row3",$row3);

$blog_standard_type_ql_title_letterspacing = new MikadoBurstField("textsimple","blog_standard_type_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_ql_title_letterspacing",$blog_standard_type_ql_title_letterspacing);

$group8 = new MikadoBurstGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list.");
$panel21->addChild("group8",$group8);

$row1 = new MikadoBurstRow();
$group8->addChild("row1",$row1);

$blog_standard_type_ql_info_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_ql_info_color",$blog_standard_type_ql_info_color);

$blog_standard_type_ql_info_link_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_standard_type_ql_info_link_color",$blog_standard_type_ql_info_link_color);

$blog_standard_type_ql_info_hover_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_info_hover_color","","Hover Color","This is some description");
$row1->addChild("blog_standard_type_ql_info_hover_color",$blog_standard_type_ql_info_hover_color);

$blog_standard_type_ql_info_fontsize = new MikadoBurstField("textsimple","blog_standard_type_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_ql_info_fontsize",$blog_standard_type_ql_info_fontsize);

$row2 = new MikadoBurstRow(true);
$group8->addChild("row2",$row2);


$blog_standard_type_ql_info_lineheight = new MikadoBurstField("textsimple","blog_standard_type_ql_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_standard_type_ql_info_lineheight",$blog_standard_type_ql_info_lineheight);

$blog_standard_type_ql_info_google_fonts = new MikadoBurstField("fontsimple","blog_standard_type_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_ql_info_google_fonts",$blog_standard_type_ql_info_google_fonts);

$blog_standard_type_ql_info_fontstyle = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_info_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_standard_type_ql_info_fontstyle",$blog_standard_type_ql_info_fontstyle);

$blog_standard_type_ql_info_fontweight = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_info_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_standard_type_ql_info_fontweight",$blog_standard_type_ql_info_fontweight);

$row3 = new MikadoBurstRow(true);
$group8->addChild("row3",$row3);

$blog_standard_type_ql_info_texttransform = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_info_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row3->addChild("blog_standard_type_ql_info_texttransform",$blog_standard_type_ql_info_texttransform);

$blog_standard_type_ql_info_letterspacing = new MikadoBurstField("textsimple","blog_standard_type_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_ql_info_letterspacing",$blog_standard_type_ql_info_letterspacing);

$group9 = new MikadoBurstGroup("Quote Author Style","Define author styles for Quote articles");
$panel21->addChild("group9",$group9);

$row1 = new MikadoBurstRow();
$group9->addChild("row1",$row1);

$blog_standard_type_ql_author_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_ql_author_color",$blog_standard_type_ql_author_color);

$blog_standard_type_ql_author_hover_color = new MikadoBurstField("colorsimple","blog_standard_type_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_standard_type_ql_author_hover_color",$blog_standard_type_ql_author_hover_color);

$blog_standard_type_ql_author_fontsize = new MikadoBurstField("textsimple","blog_standard_type_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_ql_author_font_size",$blog_standard_type_ql_author_fontsize);

$blog_standard_type_ql_author_lineheight = new MikadoBurstField("textsimple","blog_standard_type_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_standard_type_ql_author_lineheight",$blog_standard_type_ql_author_lineheight);


$row2 = new MikadoBurstRow(true);
$group9->addChild("row2",$row2);

$blog_standard_type_ql_author_texttransform = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_author_texttransform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_standard_type_ql_author_texttransform",$blog_standard_type_ql_author_texttransform);

$blog_standard_type_ql_author_google_fonts = new MikadoBurstField("fontsimple","blog_standard_type_ql_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_ql_author_google_fonts",$blog_standard_type_ql_author_google_fonts);

$blog_standard_type_ql_author_fontstyle = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_author_fontstyle","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_standard_type_ql_author_fontstyle",$blog_standard_type_ql_author_fontstyle);

$blog_standard_type_ql_author_fontweight = new MikadoBurstField("selectblanksimple","blog_standard_type_ql_author_fontweight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_standard_type_ql_author_fontweight",$blog_standard_type_ql_author_fontweight);

$row3 = new MikadoBurstRow(true);
$group9->addChild("row3",$row3);

$blog_standard_type_ql_author_letterspacing = new MikadoBurstField("textsimple","blog_standard_type_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_ql_author_letterspacing",$blog_standard_type_ql_author_letterspacing);

//Blog List

$panel28 = new MikadoBurstPanel("Blog List Shortcode","blog_list_panel");
$blogPage->addChild("panel28",$panel28);

//Blog List Boxes

$blog_list_boxes_section_subtitle = new MikadoBurstTitle("blog_list_boxes_section_subtitle", "Blog List - Boxes");
$panel28->addChild("blog_list_boxes_section_subtitle", $blog_list_boxes_section_subtitle);

$group6 = new MikadoBurstGroup("Blog List Padding","Enter Boxes Blog List padding");
$panel28->addChild("group6",$group6);
$row1 = new MikadoBurstRow();
$group6->addChild("row1",$row1);

$blog_list_boxes_padding_top = new MikadoBurstField("textsimple","blog_list_boxes_padding_top","","Padding Top (px)","This is some description");
$row1->addChild("blog_list_boxes_padding_top",$blog_list_boxes_padding_top);

$blog_list_boxes_padding_right = new MikadoBurstField("textsimple","blog_list_boxes_padding_right","","Padding Right (px)","This is some description");
$row1->addChild("blog_list_boxes_padding_right",$blog_list_boxes_padding_right);

$blog_list_boxes_padding_bottom = new MikadoBurstField("textsimple","blog_list_boxes_padding_bottom","","Padding Bottom (px)","This is some description");
$row1->addChild("blog_list_boxes_padding_bottom",$blog_list_boxes_padding_bottom);

$blog_list_boxes_padding_left = new MikadoBurstField("textsimple","blog_list_boxes_padding_left","","Padding Left (px)","This is some description");
$row1->addChild("blog_list_boxes_padding_left",$blog_list_boxes_padding_left);

$group16 = new MikadoBurstGroup("Blog List Spacing","Define blog list spacing");
$panel28->addChild("group16",$group16);

$row1 = new MikadoBurstRow();
$group16->addChild("row1",$row1);

$blog_list_boxes_title_margin_bottom = new MikadoBurstField("textsimple","blog_list_boxes_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_list_boxes_title_margin_bottom",$blog_list_boxes_title_margin_bottom);

$blog_list_boxes_post_info_margin_bottom = new MikadoBurstField("textsimple","blog_list_boxes_post_info_margin_bottom","","Margin Under Post Info (px)","This is some description");
$row1->addChild("blog_list_boxes_post_info_margin_bottom",$blog_list_boxes_post_info_margin_bottom);

$blog_list_boxes_read_more_margin_top = new MikadoBurstField("textsimple","blog_list_boxes_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_list_boxes_read_more_margin_top",$blog_list_boxes_read_more_margin_top);

$group17 = new MikadoBurstGroup("Blog List Title","Define Blog List title style");
$panel28->addChild("group17",$group17);

$row1 = new MikadoBurstRow();
$group17->addChild("row1",$row1);

$blog_list_boxes_title_color = new MikadoBurstField("colorsimple","blog_list_boxes_title_color","","Text Color","This is some description");
$row1->addChild("blog_list_boxes_title_color",$blog_list_boxes_title_color);

$blog_list_boxes_title_hover_color = new MikadoBurstField("colorsimple","blog_list_boxes_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_list_boxes_title_hover_color",$blog_list_boxes_title_hover_color);

$blog_list_boxes_title_font_size = new MikadoBurstField("textsimple","blog_list_boxes_title_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_list_boxes_title_font_size",$blog_list_boxes_title_font_size);

$blog_list_boxes_title_line_height = new MikadoBurstField("textsimple","blog_list_boxes_title_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_list_boxes_title_line_height",$blog_list_boxes_title_line_height);

$row2 = new MikadoBurstRow();
$group17->addChild("row2",$row2);

$blog_list_boxes_title_text_transform = new MikadoBurstField("selectblanksimple","blog_list_boxes_title_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_list_boxes_title_text_transform",$blog_list_boxes_title_text_transform);

$blog_list_boxes_title_font_family = new MikadoBurstField("fontsimple","blog_list_boxes_title_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_list_boxes_title_font_family",$blog_list_boxes_title_font_family);

$blog_list_boxes_title_font_style = new MikadoBurstField("selectblanksimple","blog_list_boxes_title_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_list_boxes_title_font_style",$blog_list_boxes_title_font_style);

$blog_list_boxes_title_font_weight = new MikadoBurstField("selectblanksimple","blog_list_boxes_title_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_list_boxes_title_font_weight",$blog_list_boxes_title_font_weight);


$row3 = new MikadoBurstRow();
$group17->addChild("row3",$row3);

$blog_list_boxes_title_letter_spacing = new MikadoBurstField("textsimple","blog_list_boxes_title_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_list_boxes_title_letter_spacing",$blog_list_boxes_title_letter_spacing);


$group18 = new MikadoBurstGroup("Blog List Post Info","Define blog list post info style");
$panel28->addChild("group18",$group18);

$row1 = new MikadoBurstRow();
$group18->addChild("row1",$row1);

$blog_list_boxes_post_info_color = new MikadoBurstField("colorsimple","blog_list_boxes_post_info_color","","Text Color","This is some description");
$row1->addChild("blog_list_boxes_post_info_color",$blog_list_boxes_post_info_color);

$blog_list_boxes_post_info_link_color = new MikadoBurstField("colorsimple","blog_list_boxes_post_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_list_boxes_post_info_link_color",$blog_list_boxes_post_info_link_color);

$blog_list_boxes_post_info_link_hover_color = new MikadoBurstField("colorsimple","blog_list_boxes_post_info_link_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_list_boxes_post_info_link_hover_color",$blog_list_boxes_post_info_link_hover_color);

$blog_list_boxes_post_info_font_size = new MikadoBurstField("textsimple","blog_list_boxes_post_info_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_list_boxes_post_info_font_size",$blog_list_boxes_post_info_font_size);


$row2 = new MikadoBurstRow();
$group18->addChild("row2",$row2);

$blog_list_boxes_post_info_line_height = new MikadoBurstField("textsimple","blog_list_boxes_post_info_line_height","","Line Height (px)","This is some description");
$row2->addChild("blog_list_boxes_post_info_line_height",$blog_list_boxes_post_info_line_height);

$blog_list_boxes_post_info_text_transform = new MikadoBurstField("selectblanksimple","blog_list_boxes_post_info_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_list_boxes_post_info_text_transform",$blog_list_boxes_post_info_text_transform);

$blog_list_boxes_post_info_font_family = new MikadoBurstField("fontsimple","blog_list_boxes_post_info_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_list_boxes_post_info_font_family",$blog_list_boxes_post_info_font_family);

$blog_list_boxes_post_info_font_style = new MikadoBurstField("selectblanksimple","blog_list_boxes_post_info_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_list_boxes_post_info_font_style",$blog_list_boxes_post_info_font_style);

$row3 = new MikadoBurstRow();
$group18->addChild("row3",$row3);

$blog_list_boxes_post_info_font_weight = new MikadoBurstField("selectblanksimple","blog_list_boxes_post_info_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row3->addChild("blog_list_boxes_post_info_font_weight",$blog_list_boxes_post_info_font_weight);

$blog_list_boxes_post_info_letter_spacing = new MikadoBurstField("textsimple","blog_list_boxes_post_info_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_list_boxes_post_info_letter_spacing",$blog_list_boxes_post_info_letter_spacing);

$blog_list_boxes_date_color = new MikadoBurstField("color","blog_list_boxes_date_color","","Date Color", "Choose color for date");
$panel28->addChild("blog_list_boxes_date_color",$blog_list_boxes_date_color);


$blog_list_minimal_subtitle = new MikadoBurstTitle("blog_list_minimal_subtitle", "Blog List - Minimal");
$panel28->addChild("blog_list_minimal_subtitle", $blog_list_minimal_subtitle);

$group5 = new MikadoBurstGroup("Blog List Spacing","Define blog list spacing");
$panel28->addChild("group5",$group5);

$row1 = new MikadoBurstRow(true);
$group5->addChild("row1",$row1);

$blog_list_minimal_title_margin_bottom = new MikadoBurstField("textsimple","blog_list_minimal_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_list_minimal_title_margin_bottom",$blog_list_minimal_title_margin_bottom);

$blog_list_minimal_post_info_margin_bottom = new MikadoBurstField("textsimple","blog_list_minimal_post_info_margin_bottom","","Margin Under Post Info (px)","This is some description");
$row1->addChild("blog_list_minimal_post_info_margin_bottom",$blog_list_minimal_post_info_margin_bottom);

$blog_list_minimal_read_more_margin_top = new MikadoBurstField("textsimple","blog_list_minimal_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_list_minimal_read_more_margin_top",$blog_list_minimal_read_more_margin_top);

// Image in left box

$image_in_left_box = new MikadoBurstTitle("image_in_left_box", "Blog List - Image in Left Box");
$panel28->addChild("image_in_left_box", $image_in_left_box);

$group28 = new MikadoBurstGroup("Blog List Title","Define Blog List title style");
$panel28->addChild("group28",$group28);
$row1 = new MikadoBurstRow();
$group28->addChild("row1",$row1);

$blog_list_img_in_lbox_title_color = new MikadoBurstField("colorsimple","blog_list_img_in_lbox_title_color","","Text Color","This is some description");
$row1->addChild("blog_list_img_in_lbox_title_color",$blog_list_img_in_lbox_title_color);

$blog_list_img_in_lbox_title_hover_color = new MikadoBurstField("colorsimple","blog_list_img_in_lbox_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_list_img_in_lbox_title_hover_color",$blog_list_img_in_lbox_title_hover_color);

$blog_list_img_in_lbox_title_font_size = new MikadoBurstField("textsimple","blog_list_img_in_lbox_title_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_list_img_in_lbox_title_font_size",$blog_list_img_in_lbox_title_font_size);

$blog_list_img_in_lbox_title_line_height = new MikadoBurstField("textsimple","blog_list_img_in_lbox_title_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_list_img_in_lbox_title_line_height",$blog_list_img_in_lbox_title_line_height);

$row2 = new MikadoBurstRow(true);
$group28->addChild("row2",$row2);

$blog_list_img_in_lbox_title_text_transform = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_title_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_list_img_in_lbox_title_text_transform",$blog_list_img_in_lbox_title_text_transform);

$blog_list_img_in_lbox_title_font_family = new MikadoBurstField("fontsimple","blog_list_img_in_lbox_title_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_list_img_in_lbox_title_font_family",$blog_list_img_in_lbox_title_font_family);

$blog_list_img_in_lbox_title_font_style = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_title_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_list_img_in_lbox_title_font_style",$blog_list_img_in_lbox_title_font_style);

$blog_list_img_in_lbox_title_font_weight = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_title_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_list_img_in_lbox_title_font_weight",$blog_list_img_in_lbox_title_font_weight);


$row3 = new MikadoBurstRow(true);
$group28->addChild("row3",$row3);

$blog_list_img_in_lbox_title_letter_spacing = new MikadoBurstField("textsimple","blog_list_img_in_lbox_title_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_list_img_in_lbox_title_letter_spacing",$blog_list_img_in_lbox_title_letter_spacing);


$group29 = new MikadoBurstGroup("Blog List Post Info","Define blog list post info style");
$panel28->addChild("group29",$group29);
$row1 = new MikadoBurstRow();
$group29->addChild("row1",$row1);

$blog_list_img_in_lbox_post_info_color = new MikadoBurstField("colorsimple","blog_list_img_in_lbox_post_info_color","","Text Color","This is some description");
$row1->addChild("blog_list_img_in_lbox_post_info_color",$blog_list_img_in_lbox_post_info_color);

$blog_list_img_in_lbox_post_info_link_color = new MikadoBurstField("colorsimple","blog_list_img_in_lbox_post_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_list_img_in_lbox_post_info_link_color",$blog_list_img_in_lbox_post_info_link_color);

$blog_list_img_in_lbox_post_info_link_hover_color = new MikadoBurstField("colorsimple","blog_list_img_in_lbox_post_info_link_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_list_img_in_lbox_post_info_link_hover_color",$blog_list_img_in_lbox_post_info_link_hover_color);

$blog_list_img_in_lbox_post_info_font_size = new MikadoBurstField("textsimple","blog_list_img_in_lbox_post_info_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_list_img_in_lbox_post_info_font_size",$blog_list_img_in_lbox_post_info_font_size);


$row2 = new MikadoBurstRow(true);
$group29->addChild("row2",$row2);

$blog_list_img_in_lbox_post_info_line_height = new MikadoBurstField("textsimple","blog_list_img_in_lbox_post_info_line_height","","Line Height (px)","This is some description");
$row2->addChild("blog_list_img_in_lbox_post_info_line_height",$blog_list_img_in_lbox_post_info_line_height);

$blog_list_img_in_lbox_post_info_text_transform = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_post_info_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_list_img_in_lbox_post_info_text_transform",$blog_list_img_in_lbox_post_info_text_transform);

$blog_list_img_in_lbox_post_info_font_family = new MikadoBurstField("fontsimple","blog_list_img_in_lbox_post_info_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_list_img_in_lbox_post_info_font_family",$blog_list_img_in_lbox_post_info_font_family);

$blog_list_img_in_lbox_post_info_font_style = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_post_info_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_list_img_in_lbox_post_info_font_style",$blog_list_img_in_lbox_post_info_font_style);

$row3 = new MikadoBurstRow(true);
$group29->addChild("row3",$row3);

$blog_list_img_in_lbox_post_info_font_weight = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_post_info_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row3->addChild("blog_list_img_in_lbox_post_info_font_weight",$blog_list_img_in_lbox_post_info_font_weight);

$blog_list_img_in_lbox_post_info_letter_spacing = new MikadoBurstField("textsimple","blog_list_img_in_lbox_post_info_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_list_img_in_lbox_post_info_letter_spacing",$blog_list_img_in_lbox_post_info_letter_spacing);

$group30 = new MikadoBurstGroup("Blog List Date Style","Define blog list date style");
$panel28->addChild("group30",$group30);
$row1 = new MikadoBurstRow();
$group30->addChild("row1",$row1);

$blog_list_img_in_lbox_date_color = new MikadoBurstField("colorsimple","blog_list_img_in_lbox_date_color","","Text Color","This is some description");
$row1->addChild("blog_list_img_in_lbox_date_color",$blog_list_img_in_lbox_date_color);

$blog_list_img_in_lbox_date_font_size = new MikadoBurstField("textsimple","blog_list_img_in_lbox_date_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_list_img_in_lbox_date_font_size",$blog_list_img_in_lbox_date_font_size);

$blog_list_img_in_lbox_date_line_height = new MikadoBurstField("textsimple","blog_list_img_in_lbox_date_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_list_img_in_lbox_date_line_height",$blog_list_img_in_lbox_date_line_height);

$blog_list_img_in_lbox_date_text_transform = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_date_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row1->addChild("blog_list_img_in_lbox_date_text_transform",$blog_list_img_in_lbox_date_text_transform);

$row2 = new MikadoBurstRow(true);
$group30->addChild("row2",$row2);

$blog_list_img_in_lbox_date_font_family = new MikadoBurstField("fontsimple","blog_list_img_in_lbox_date_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_list_img_in_lbox_date_font_family",$blog_list_img_in_lbox_date_font_family);

$blog_list_img_in_lbox_date_font_style = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_date_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_list_img_in_lbox_date_font_style",$blog_list_img_in_lbox_date_font_style);

$blog_list_img_in_lbox_date_font_weight = new MikadoBurstField("selectblanksimple","blog_list_img_in_lbox_date_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_list_img_in_lbox_date_font_weight",$blog_list_img_in_lbox_date_font_weight);

$blog_list_img_in_lbox_date_letter_spacing = new MikadoBurstField("textsimple","blog_list_img_in_lbox_date_letter_spacing","","Letter Spacing (px)","This is some description");
$row2->addChild("blog_list_img_in_lbox_date_letter_spacing",$blog_list_img_in_lbox_date_letter_spacing);

$group31 = new MikadoBurstGroup("Blog List Spacing","Define blog list spacing");
$panel28->addChild("group31",$group31);

$row1 = new MikadoBurstRow(true);
$group31->addChild("row1",$row1);

$blog_list_img_in_lbox_title_margin_bttm = new MikadoBurstField("textsimple","blog_list_img_in_lbox_title_margin_bttm","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_list_img_in_lbox_title_margin_bttm",$blog_list_img_in_lbox_title_margin_bttm);

$blog_list_img_in_lbox_post_info_margin_bttm = new MikadoBurstField("textsimple","blog_list_img_in_lbox_post_info_margin_bttm","","Margin Under Post Info (px)","This is some description");
$row1->addChild("blog_list_img_in_lbox_post_info_margin_bttm",$blog_list_img_in_lbox_post_info_margin_bttm);

$blog_list_img_in_lbox_read_more_margin_top = new MikadoBurstField("textsimple","blog_list_img_in_lbox_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_list_img_in_lbox_read_more_margin_top",$blog_list_img_in_lbox_read_more_margin_top);

/*** Blog Carousel ***/

$panel31 = new MikadoBurstPanel("Blog Carousel","blog_slider");
$blogPage->addChild("panel31",$panel31);

$blog_slider_default_and_with_info_always_title = new MikadoBurstTitle("blog_slider_default_and_with_info_always_title","Default and Post Info Visible");
$panel31->addChild("blog_slider_default_and_with_info_always_title",$blog_slider_default_and_with_info_always_title);

$group23 = new MikadoBurstGroup("Title style", "Blog Carousel title style");
$panel31->addChild("group23",$group23);

$row1 = new MikadoBurstRow();
$group23->addChild("row1",$row1);

$blog_slider_title_color = new MikadoBurstField("colorsimple","blog_slider_title_color","","Title Color","This is some description");
$row1->addChild("blog_slider_title_color",$blog_slider_title_color);

$blog_slider_title_hover_color = new MikadoBurstField("colorsimple","blog_slider_title_hover_color","","Title Hover Color","This is some description");
$row1->addChild("blog_slider_title_hover_color",$blog_slider_title_hover_color);

$blog_slider_title_font_size = new MikadoBurstField("textsimple","blog_slider_title_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_slider_title_font_size",$blog_slider_title_font_size);

$blog_slider_title_line_height = new MikadoBurstField("textsimple","blog_slider_title_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_slider_title_line_height",$blog_slider_title_line_height);

$row2 = new MikadoBurstRow();
$group23->addChild("row2",$row2);

$blog_slider_title_text_transform = new MikadoBurstField("selectblanksimple","blog_slider_title_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_slider_title_text_transform",$blog_slider_title_text_transform);

$blog_slider_title_font_family = new MikadoBurstField("fontsimple","blog_slider_title_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_slider_title_font_family",$blog_slider_title_font_family);

$blog_slider_title_font_style = new MikadoBurstField("selectblanksimple","blog_slider_title_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_slider_title_font_style",$blog_slider_title_font_style);

$blog_slider_title_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_title_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_slider_title_font_weight",$blog_slider_title_font_weight);


$row3 = new MikadoBurstRow();
$group23->addChild("row3",$row3);

$blog_slider_title_letter_spacing = new MikadoBurstField("textsimple","blog_slider_title_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_slider_title_letter_spacing",$blog_slider_title_letter_spacing);

$group24 = new MikadoBurstGroup("Category style", "Blog Carousel categories style");
$panel31->addChild("group24",$group24);

$row1 = new MikadoBurstRow();
$group24->addChild("row1",$row1);

$blog_slider_category_color = new MikadoBurstField("colorsimple","blog_slider_category_color","","Category Color","This is some description");
$row1->addChild("blog_slider_category_color",$blog_slider_category_color);

$blog_slider_category_hover_color = new MikadoBurstField("colorsimple","blog_slider_category_hover_color","","Category Hover Color","This is some description");
$row1->addChild("blog_slider_category_hover_color",$blog_slider_category_hover_color);

$blog_slider_category_font_size = new MikadoBurstField("textsimple","blog_slider_category_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_slider_category_font_size",$blog_slider_category_font_size);

$blog_slider_category_line_height = new MikadoBurstField("textsimple","blog_slider_category_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_slider_category_line_height",$blog_slider_category_line_height);

$row2 = new MikadoBurstRow();
$group24->addChild("row2",$row2);

$blog_slider_category_text_transform = new MikadoBurstField("selectblanksimple","blog_slider_category_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_slider_category_text_transform",$blog_slider_category_text_transform);

$blog_slider_category_font_family = new MikadoBurstField("fontsimple","blog_slider_category_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_slider_category_font_family",$blog_slider_category_font_family);

$blog_slider_category_font_style = new MikadoBurstField("selectblanksimple","blog_slider_category_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_slider_category_font_style",$blog_slider_category_font_style);

$blog_slider_category_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_category_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_slider_category_font_weight",$blog_slider_category_font_weight);


$row3 = new MikadoBurstRow();
$group24->addChild("row3",$row3);

$blog_slider_category_letter_spacing = new MikadoBurstField("textsimple","blog_slider_category_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_slider_category_letter_spacing",$blog_slider_category_letter_spacing);

$group25 = new MikadoBurstGroup("Date style", "Blog Carousel date style");
$panel31->addChild("group25",$group25);

$row1 = new MikadoBurstRow();
$group25->addChild("row1",$row1);

$blog_slider_date_color = new MikadoBurstField("colorsimple","blog_slider_date_color","","Date Color","This is some description");
$row1->addChild("blog_slider_date_color",$blog_slider_date_color);

$blog_slider_date_font_size = new MikadoBurstField("textsimple","blog_slider_date_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_slider_date_font_size",$blog_slider_date_font_size);

$blog_slider_date_line_height = new MikadoBurstField("textsimple","blog_slider_date_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_slider_date_line_height",$blog_slider_date_line_height);

$blog_slider_date_text_transform = new MikadoBurstField("selectblanksimple","blog_slider_date_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row1->addChild("blog_slider_date_text_transform",$blog_slider_date_text_transform);

$row2 = new MikadoBurstRow();
$group25->addChild("row2",$row2);

$blog_slider_date_font_family = new MikadoBurstField("fontsimple","blog_slider_date_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_slider_date_font_family",$blog_slider_date_font_family);

$blog_slider_date_font_style = new MikadoBurstField("selectblanksimple","blog_slider_date_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_slider_date_font_style",$blog_slider_date_font_style);

$blog_slider_date_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_date_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_slider_date_font_weight",$blog_slider_date_font_weight);

$blog_slider_date_letter_spacing = new MikadoBurstField("textsimple","blog_slider_date_letter_spacing","","Letter Spacing (px)","This is some description");
$row2->addChild("blog_slider_date_letter_spacing",$blog_slider_date_letter_spacing);


$blog_slider_info_in_bottom_title = new MikadoBurstTitle("blog_slider_info_in_bottom_title","Post Info in Bottom");
$panel31->addChild("blog_slider_info_in_bottom_title",$blog_slider_info_in_bottom_title);

$group26 = new MikadoBurstGroup("Title style", "Blog Carousel title style");
$panel31->addChild("group26",$group26);

$row1 = new MikadoBurstRow();
$group26->addChild("row1",$row1);

$blog_slider_post_info_in_bottom_title_color = new MikadoBurstField("colorsimple","blog_slider_post_info_in_bottom_title_color","","Title Color","This is some description");
$row1->addChild("blog_slider_post_info_in_bottom_title_color",$blog_slider_post_info_in_bottom_title_color);

$blog_slider_post_info_in_bottom_title_hover_color = new MikadoBurstField("colorsimple","blog_slider_post_info_in_bottom_title_hover_color","","Title Hover Color","This is some description");
$row1->addChild("blog_slider_post_info_in_bottom_title_hover_color",$blog_slider_post_info_in_bottom_title_hover_color);

$blog_slider_post_info_in_bottom_title_font_size = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_title_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_slider_post_info_in_bottom_title_font_size",$blog_slider_post_info_in_bottom_title_font_size);

$blog_slider_post_info_in_bottom_title_line_height = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_title_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_slider_post_info_in_bottom_title_line_height",$blog_slider_post_info_in_bottom_title_line_height);

$row2 = new MikadoBurstRow();
$group26->addChild("row2",$row2);

$blog_slider_post_info_in_bottom_title_text_transform = new MikadoBurstField("selectblanksimple","blog_slider_post_info_in_bottom_title_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_slider_post_info_in_bottom_title_text_transform",$blog_slider_post_info_in_bottom_title_text_transform);

$blog_slider_post_info_in_bottom_title_font_family = new MikadoBurstField("fontsimple","blog_slider_post_info_in_bottom_title_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_slider_post_info_in_bottom_title_font_family",$blog_slider_post_info_in_bottom_title_font_family);

$blog_slider_post_info_in_bottom_title_font_style = new MikadoBurstField("selectblanksimple","blog_slider_post_info_in_bottom_title_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_slider_post_info_in_bottom_title_font_style",$blog_slider_post_info_in_bottom_title_font_style);

$blog_slider_post_info_in_bottom_title_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_post_info_in_bottom_title_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_slider_post_info_in_bottom_title_font_weight",$blog_slider_post_info_in_bottom_title_font_weight);

$row3 = new MikadoBurstRow();
$group26->addChild("row3",$row3);

$blog_slider_post_info_in_bottom_title_letter_spacing = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_title_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_slider_post_info_in_bottom_title_letter_spacing",$blog_slider_post_info_in_bottom_title_letter_spacing);

$group27 = new MikadoBurstGroup("Post Info style", "Blog Carousel post info style");
$panel31->addChild("group27",$group27);

$row1 = new MikadoBurstRow();
$group27->addChild("row1",$row1);

$blog_slider_post_info_in_bottom_post_info_color = new MikadoBurstField("colorsimple","blog_slider_post_info_in_bottom_post_info_color","","Text Color","This is some description");
$row1->addChild("blog_slider_post_info_in_bottom_post_info_color",$blog_slider_post_info_in_bottom_post_info_color);

$blog_slider_post_info_in_bottom_post_info_link_color = new MikadoBurstField("colorsimple","blog_slider_post_info_in_bottom_post_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_slider_post_info_in_bottom_post_info_link_color",$blog_slider_post_info_in_bottom_post_info_link_color);

$blog_slider_post_info_in_bottom_post_info_link_hover_color = new MikadoBurstField("colorsimple","blog_slider_post_info_in_bottom_post_info_link_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_slider_post_info_in_bottom_post_info_link_hover_color",$blog_slider_post_info_in_bottom_post_info_link_hover_color);

$blog_slider_post_info_in_bottom_post_info_font_size = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_post_info_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_slider_post_info_in_bottom_post_info_font_size",$blog_slider_post_info_in_bottom_post_info_font_size);

$row2 = new MikadoBurstRow();
$group27->addChild("row2",$row2);

$blog_slider_post_info_in_bottom_post_info_line_height = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_post_info_line_height","","Line Height (px)","This is some description");
$row2->addChild("blog_slider_post_info_in_bottom_post_info_line_height",$blog_slider_post_info_in_bottom_post_info_line_height);

$blog_slider_post_info_in_bottom_post_info_text_transform = new MikadoBurstField("selectblanksimple","blog_slider_post_info_in_bottom_post_info_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_slider_post_info_in_bottom_post_info_text_transform",$blog_slider_post_info_in_bottom_post_info_text_transform);

$blog_slider_post_info_in_bottom_post_info_font_family = new MikadoBurstField("fontsimple","blog_slider_post_info_in_bottom_post_info_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_slider_post_info_in_bottom_post_info_font_family",$blog_slider_post_info_in_bottom_post_info_font_family);

$blog_slider_post_info_in_bottom_post_info_font_style = new MikadoBurstField("selectblanksimple","blog_slider_post_info_in_bottom_post_info_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_slider_post_info_in_bottom_post_info_font_style",$blog_slider_post_info_in_bottom_post_info_font_style);

$row3 = new MikadoBurstRow();
$group27->addChild("row3",$row3);

$blog_slider_post_info_in_bottom_post_info_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_post_info_in_bottom_post_info_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row3->addChild("blog_slider_post_info_in_bottom_post_info_font_weight",$blog_slider_post_info_in_bottom_post_info_font_weight);

$blog_slider_post_info_in_bottom_post_info_letter_spacing = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_post_info_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_slider_post_info_in_bottom_post_info_letter_spacing",$blog_slider_post_info_in_bottom_post_info_letter_spacing);

$group32 = new MikadoBurstGroup("Date Day Style","Define style for date day for Post Info in Bottom type");
$panel31->addChild("group32",$group32);

	$row1 = new MikadoBurstRow();
	$group32->addChild("row1",$row1);

		$blog_slider_post_info_in_bottom_day_color = new MikadoBurstField("colorsimple","blog_slider_post_info_in_bottom_day_color","","Color","This is some description");
		$row1->addChild("blog_slider_post_info_in_bottom_day_color",$blog_slider_post_info_in_bottom_day_color);

		$blog_slider_post_info_in_bottom_day_font_size = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_day_font_size","","Font Size (px)","This is some description");
		$row1->addChild("blog_slider_post_info_in_bottom_day_font_size",$blog_slider_post_info_in_bottom_day_font_size);

		$blog_slider_post_info_in_bottom_day_line_height = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_day_line_height","","Line Height (px)","This is some description");
		$row1->addChild("blog_slider_post_info_in_bottom_day_line_height",$blog_slider_post_info_in_bottom_day_line_height);

		$blog_slider_post_info_in_bottom_day_font_family = new MikadoBurstField("fontsimple","blog_slider_post_info_in_bottom_day_font_family","-1","Font Family","This is some description");
		$row1->addChild("blog_slider_post_info_in_bottom_day_font_family",$blog_slider_post_info_in_bottom_day_font_family);

	$row2 = new MikadoBurstRow();
	$group32->addChild("row2",$row2);

		$blog_slider_post_info_in_bottom_day_font_style = new MikadoBurstField("selectblanksimple","blog_slider_post_info_in_bottom_day_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
		$row2->addChild("blog_slider_post_info_in_bottom_day_font_style",$blog_slider_post_info_in_bottom_day_font_style);

		$blog_slider_post_info_in_bottom_day_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_post_info_in_bottom_day_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
		$row2->addChild("blog_slider_post_info_in_bottom_day_font_weight",$blog_slider_post_info_in_bottom_day_font_weight);

		$blog_slider_post_info_in_bottom_day_letter_spacing = new MikadoBurstField("textsimple","blog_slider_post_info_in_bottom_day_letter_spacing","","Letter Spacing (px)","This is some description");
		$row2->addChild("blog_slider_post_info_in_bottom_day_letter_spacing",$blog_slider_post_info_in_bottom_day_letter_spacing);

/*** Blog Slider ***/

$panel32 = new MikadoBurstPanel("Blog Slider","blog_slider_simple_simple");
$blogPage->addChild("panel32",$panel32);

$blog_slider_simple_simple_box = new MikadoBurstTitle("blog_slider_simple_simple_box","Box Style");
$panel32->addChild("blog_slider_simple_simple_box",$blog_slider_simple_simple_box);

$blog_slider_simple_box_back_color = new MikadoBurstField("color","blog_slider_simple_box_back_color","","Background Color","Choose background color",array(), array("col_width" => 3));
$panel32->addChild("blog_slider_simple_box_back_color",$blog_slider_simple_box_back_color);

$blog_slider_simple_box_opacity = new MikadoBurstField("text","blog_slider_simple_box_opacity","","Background Opacity","Choose a transparency for the shader background color (0 = fully transparent, 1 = opaque)",array(), array("col_width" => 3));
$panel32->addChild("blog_slider_simple_box_opacity",$blog_slider_simple_box_opacity);

$blog_slider_simple_box_padding = new MikadoBurstField("text","blog_slider_simple_box_padding","","Box Padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px or 5% 5% 5% 5%", array(), array("col_width" => 3));
$panel32->addChild("blog_slider_simple_box_padding",$blog_slider_simple_box_padding);

$group_box_border = new MikadoBurstGroup("Box Border Style","Define style for box border");
$panel32->addChild("group_box_border",$group_box_border);

	$row1 = new MikadoBurstRow();
	$group_box_border->addChild("row1",$row1);

		$blog_slider_simple_box_border_color = new MikadoBurstField("colorsimple","blog_slider_simple_box_border_color","","Color","Choose border color");
		$row1->addChild("blog_slider_simple_box_border_color",$blog_slider_simple_box_border_color);

		$blog_slider_simple_box_border_width = new MikadoBurstField("textsimple","blog_slider_simple_box_border_width","","Width","Choose border width");
		$row1->addChild("blog_slider_simple_box_border_width",$blog_slider_simple_box_border_width);

$blog_slider_simple_simple_spacing = new MikadoBurstTitle("blog_slider_simple_simple_spacing","Blog slider spacing");
$panel32->addChild("blog_slider_simple_simple_spacing",$blog_slider_simple_simple_spacing);

$blog_slider_simple_info_margin_top = new MikadoBurstField("text","blog_slider_simple_info_margin_top","","Post Info Margin Top (px)","Define post info margin top", array(), array("col_width" => 3));
$panel32->addChild("blog_slider_simple_info_margin_top",$blog_slider_simple_info_margin_top);

$blog_slider_simple_read_more_margin_top = new MikadoBurstField("text","blog_slider_simple_read_more_margin_top","","Read More Margin Top (px)","Define read more margin top", array(), array("col_width" => 3));
$panel32->addChild("blog_slider_simple_read_more_margin_top",$blog_slider_simple_read_more_margin_top);

$blog_slider_simple_simple_text = new MikadoBurstTitle("blog_slider_simple_simple_text","Post Text Style");
$panel32->addChild("blog_slider_simple_simple_text",$blog_slider_simple_simple_text);

$group_title = new MikadoBurstGroup("Title style", "Blog slider title style");
$panel32->addChild("group_title",$group_title);

$row1 = new MikadoBurstRow();
$group_title->addChild("row1",$row1);

$blog_slider_simple_title_color = new MikadoBurstField("colorsimple","blog_slider_simple_title_color","","Title Color","This is some description");
$row1->addChild("blog_slider_simple_title_color",$blog_slider_simple_title_color);

$blog_slider_simple_title_hover_color = new MikadoBurstField("colorsimple","blog_slider_simple_title_hover_color","","Title Hover Color","This is some description");
$row1->addChild("blog_slider_simple_title_hover_color",$blog_slider_simple_title_hover_color);

$blog_slider_simple_title_font_size = new MikadoBurstField("textsimple","blog_slider_simple_title_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_slider_simple_title_font_size",$blog_slider_simple_title_font_size);

$blog_slider_simple_title_line_height = new MikadoBurstField("textsimple","blog_slider_simple_title_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_slider_simple_title_line_height",$blog_slider_simple_title_line_height);

$row2 = new MikadoBurstRow();
$group_title->addChild("row2",$row2);

$blog_slider_simple_title_text_transform = new MikadoBurstField("selectblanksimple","blog_slider_simple_title_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_slider_simple_title_text_transform",$blog_slider_simple_title_text_transform);

$blog_slider_simple_title_font_family = new MikadoBurstField("fontsimple","blog_slider_simple_title_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_slider_simple_title_font_family",$blog_slider_simple_title_font_family);

$blog_slider_simple_title_font_style = new MikadoBurstField("selectblanksimple","blog_slider_simple_title_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_slider_simple_title_font_style",$blog_slider_simple_title_font_style);

$blog_slider_simple_title_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_simple_title_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row2->addChild("blog_slider_simple_title_font_weight",$blog_slider_simple_title_font_weight);


$row3 = new MikadoBurstRow();
$group_title->addChild("row3",$row3);

$blog_slider_simple_title_letter_spacing = new MikadoBurstField("textsimple","blog_slider_simple_title_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_slider_simple_title_letter_spacing",$blog_slider_simple_title_letter_spacing);

$group_post_info = new MikadoBurstGroup("Post Info Style", "Blog slider post info style");
$panel32->addChild("group_post_info",$group_post_info);

$row1 = new MikadoBurstRow();
$group_post_info->addChild("row1",$row1);

$blog_slider_simple_info_color = new MikadoBurstField("colorsimple","blog_slider_simple_info_color","","Color","This is some description");
$row1->addChild("blog_slider_simple_info_color",$blog_slider_simple_info_color);

$blog_slider_simple_info_link_color = new MikadoBurstField("colorsimple","blog_slider_simple_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_slider_simple_info_link_color",$blog_slider_simple_info_link_color);

$blog_slider_simple_info_hover_color = new MikadoBurstField("colorsimple","blog_slider_simple_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_slider_simple_info_hover_color",$blog_slider_simple_info_hover_color);

$blog_slider_simple_info_font_size = new MikadoBurstField("textsimple","blog_slider_simple_info_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_slider_simple_info_font_size",$blog_slider_simple_info_font_size);

$row2 = new MikadoBurstRow();
$group_post_info->addChild("row2",$row2);

$blog_slider_simple_info_line_height = new MikadoBurstField("textsimple","blog_slider_simple_info_line_height","","Line Height (px)","This is some description");
$row2->addChild("blog_slider_simple_info_line_height",$blog_slider_simple_info_line_height);

$blog_slider_simple_info_text_transform = new MikadoBurstField("selectblanksimple","blog_slider_simple_info_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
$row2->addChild("blog_slider_simple_info_text_transform",$blog_slider_simple_info_text_transform);

$blog_slider_simple_info_font_family = new MikadoBurstField("fontsimple","blog_slider_simple_info_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_slider_simple_info_font_family",$blog_slider_simple_info_font_family);

$blog_slider_simple_info_font_style = new MikadoBurstField("selectblanksimple","blog_slider_simple_info_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
$row2->addChild("blog_slider_simple_info_font_style",$blog_slider_simple_info_font_style);

$row3 = new MikadoBurstRow();
$group_post_info->addChild("row3",$row3);

$blog_slider_simple_info_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_simple_info_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
$row3->addChild("blog_slider_simple_info_font_weight",$blog_slider_simple_info_font_weight);

$blog_slider_simple_info_letter_spacing = new MikadoBurstField("textsimple","blog_slider_simple_info_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_slider_simple_info_letter_spacing",$blog_slider_simple_info_letter_spacing);

$group_day = new MikadoBurstGroup("Date Day Style","Define style for date day for Info in Bottom type");
$panel32->addChild("group_day",$group_day);

	$row1 = new MikadoBurstRow();
	$group_day->addChild("row1",$row1);

		$blog_slider_simple_day_color = new MikadoBurstField("colorsimple","blog_slider_simple_day_color","","Color","This is some description");
		$row1->addChild("blog_slider_simple_day_color",$blog_slider_simple_day_color);

		$blog_slider_simple_day_font_size = new MikadoBurstField("textsimple","blog_slider_simple_day_font_size","","Font Size (px)","This is some description");
		$row1->addChild("blog_slider_simple_day_font_size",$blog_slider_simple_day_font_size);

		$blog_slider_simple_day_line_height = new MikadoBurstField("textsimple","blog_slider_simple_day_line_height","","Line Height (px)","This is some description");
		$row1->addChild("blog_slider_simple_day_line_height",$blog_slider_simple_day_line_height);

		$blog_slider_simple_day_font_family = new MikadoBurstField("fontsimple","blog_slider_simple_day_font_family","-1","Font Family","This is some description");
		$row1->addChild("blog_slider_simple_day_font_family",$blog_slider_simple_day_font_family);

	$row2 = new MikadoBurstRow();
	$group_day->addChild("row2",$row2);

		$blog_slider_simple_day_font_style = new MikadoBurstField("selectblanksimple","blog_slider_simple_day_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
		$row2->addChild("blog_slider_simple_day_font_style",$blog_slider_simple_day_font_style);

		$blog_slider_simple_day_font_weight = new MikadoBurstField("selectblanksimple","blog_slider_simple_day_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
		$row2->addChild("blog_slider_simple_day_font_weight",$blog_slider_simple_day_font_weight);

		$blog_slider_simple_day_letter_spacing = new MikadoBurstField("textsimple","blog_slider_simple_day_letter_spacing","","Letter Spacing (px)","This is some description");
		$row2->addChild("blog_slider_simple_day_letter_spacing",$blog_slider_simple_day_letter_spacing);