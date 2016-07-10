<?php

$visualComposerPage = new MikadoBurstAdminPage('22', 'Visual Composer', 'icon_grid-3x3');
$mkd_burst_Framework->mkdOptions->addAdminPage('visualComposerPage', $visualComposerPage);

	$panel1 = new MikadoBurstPanel('Visual Composer Grid Elements', 'vc_grid_elements');
	$visualComposerPage->addChild('panel1', $panel1);

		$enable_grid_elements = new MikadoBurstField('yesno', 'enable_grid_elements', 'no', 'Enable Grid Elements', 'Enabling this option will allow Visual Composer Grid Elements. NOTE: Enabling Grid Elements will disable Page Transition.', array(), array(
			'dependence' => 'true',
			'dependence_hide_on_yes' => '',
			'dependence_show_on_yes' => '#mkdf_vc_grid_elements_style'
		));
		$panel1->addChild('enable_grid_elements', $enable_grid_elements);

	$panel2 = new MikadoBurstPanel('Visual Composer Grid Elements Style', 'vc_grid_elements_style', 'enable_grid_elements', 'no');
	$visualComposerPage->addChild('panel2', $panel2);

		$group1 = new MikadoBurstGroup('Button', 'Define styles for grid button');
		$panel2->addChild('group1', $group1);

			$row1 = new MikadoBurstRow();
			$group1->addChild("row1",$row1);

				$vc_grid_button_title_color = new MikadoBurstField('colorsimple','vc_grid_button_title_color','','Text Color','');
				$row1->addChild('vc_grid_button_title_color', $vc_grid_button_title_color);
				$vc_grid_button_title_hovercolor = new MikadoBurstField('colorsimple','vc_grid_button_title_hovercolor','','Hover Color','');
				$row1->addChild('vc_grid_button_title_hovercolor', $vc_grid_button_title_hovercolor);

			$row2 = new MikadoBurstRow(true);
			$group1->addChild('row2', $row2);

				$vc_grid_button_title_google_fonts = new MikadoBurstField('fontsimple','vc_grid_button_title_google_fonts','-1','Font Family','');
				$row2->addChild('vc_grid_button_title_google_fonts',$vc_grid_button_title_google_fonts);
				$vc_grid_button_title_fontsize = new MikadoBurstField('textsimple','vc_grid_button_title_fontsize','','Font Size (px)','');
				$row2->addChild('vc_grid_button_title_fontsize',$vc_grid_button_title_fontsize);
				$vc_grid_button_title_lineheight = new MikadoBurstField('textsimple','vc_grid_button_title_lineheight','','Line Height (px)','');
				$row2->addChild('vc_grid_button_title_lineheight',$vc_grid_button_title_lineheight);

			$row3 = new MikadoBurstRow(true);
			$group1->addChild('row3', $row3);

				$vc_grid_button_title_fontstyle = new MikadoBurstField('selectblanksimple','vc_grid_button_title_fontstyle','','Font Style','',$mkd_burst_options_fontstyle);
				$row3->addChild('vc_grid_button_title_fontstyle',$vc_grid_button_title_fontstyle);
				$vc_grid_button_title_fontweight = new MikadoBurstField('selectblanksimple','vc_grid_button_title_fontweight','','Font Weight','',$mkd_burst_options_fontweight);
				$row3->addChild('vc_grid_button_title_fontweight',$vc_grid_button_title_fontweight);
				$vc_grid_button_title_letter_spacing = new MikadoBurstField('textsimple','vc_grid_button_title_letter_spacing','','Letter Spacing (px)','');
				$row3->addChild('vc_grid_button_title_letter_spacing',$vc_grid_button_title_letter_spacing);

			$row4 = new MikadoBurstRow(true);
			$group1->addChild('row4', $row4);

				$vc_grid_button_backgroundcolor = new MikadoBurstField('colorsimple','vc_grid_button_backgroundcolor','','Background Color','');
				$row4->addChild('vc_grid_button_backgroundcolor',$vc_grid_button_backgroundcolor);
				$vc_grid_button_backgroundcolor_hover = new MikadoBurstField('colorsimple','vc_grid_button_backgroundcolor_hover','','Hover Background Color','');
				$row4->addChild('vc_grid_button_backgroundcolor_hover',$vc_grid_button_backgroundcolor_hover);
				$vc_grid_button_border_color = new MikadoBurstField('colorsimple','vc_grid_button_border_color','','Border Color','');
				$row4->addChild('vc_grid_button_border_color',$vc_grid_button_border_color);
				$vc_grid_button_border_hover_color = new MikadoBurstField('colorsimple','vc_grid_button_border_hover_color','','Border Hover color','');
				$row4->addChild('vc_grid_button_border_hover_color',$vc_grid_button_border_hover_color);

			$row5 = new MikadoBurstRow(true);
			$group1->addChild('row5',$row5);

				$vc_grid_button_border_width = new MikadoBurstField('textsimple','vc_grid_button_border_width','','Border Width (px)','This is some description');
				$row5->addChild('vc_grid_button_border_width',$vc_grid_button_border_width);
				$vc_grid_button_border_radius = new MikadoBurstField('textsimple','vc_grid_button_border_radius','','Border Radius (px)','This is some description');
				$row5->addChild('vc_grid_button_border_radius',$vc_grid_button_border_radius);


		$group2 = new MikadoBurstGroup('Load More Button', 'Define styles for grid load more button');
		$panel2->addChild('group2', $group2);

			$row1 = new MikadoBurstRow();
			$group2->addChild("row1",$row1);

				$vc_grid_load_more_button_title_color = new MikadoBurstField('colorsimple','vc_grid_load_more_button_title_color','','Text Color','');
				$row1->addChild('vc_grid_load_more_button_title_color', $vc_grid_load_more_button_title_color);
				$vc_grid_load_more_button_title_hovercolor = new MikadoBurstField('colorsimple','vc_grid_load_more_button_title_hovercolor','','Hover Color','');
				$row1->addChild('vc_grid_load_more_button_title_hovercolor', $vc_grid_load_more_button_title_hovercolor);

			$row2 = new MikadoBurstRow(true);
			$group2->addChild('row2', $row2);

				$vc_grid_load_more_button_title_google_fonts = new MikadoBurstField('fontsimple','vc_grid_load_more_button_title_google_fonts','-1','Font Family','');
				$row2->addChild('vc_grid_load_more_button_title_google_fonts',$vc_grid_load_more_button_title_google_fonts);
				$vc_grid_load_more_button_title_fontsize = new MikadoBurstField('textsimple','vc_grid_load_more_button_title_fontsize','','Font Size (px)','');
				$row2->addChild('vc_grid_load_more_button_title_fontsize',$vc_grid_load_more_button_title_fontsize);
				$vc_grid_load_more_button_title_lineheight = new MikadoBurstField('textsimple','vc_grid_load_more_button_title_lineheight','','Line Height (px)','');
				$row2->addChild('vc_grid_load_more_button_title_lineheight',$vc_grid_load_more_button_title_lineheight);

			$row3 = new MikadoBurstRow(true);
			$group2->addChild('row3', $row3);

				$vc_grid_load_more_button_title_fontstyle = new MikadoBurstField('selectblanksimple','vc_grid_load_more_button_title_fontstyle','','Font Style','',$mkd_burst_options_fontstyle);
				$row3->addChild('vc_grid_load_more_button_title_fontstyle',$vc_grid_load_more_button_title_fontstyle);
				$vc_grid_load_more_button_title_fontweight = new MikadoBurstField('selectblanksimple','vc_grid_load_more_button_title_fontweight','','Font Weight','',$mkd_burst_options_fontweight);
				$row3->addChild('vc_grid_load_more_button_title_fontweight',$vc_grid_load_more_button_title_fontweight);
				$vc_grid_load_more_button_title_letter_spacing = new MikadoBurstField('textsimple','vc_grid_load_more_button_title_letter_spacing','','Letter Spacing (px)','');
				$row3->addChild('vc_grid_load_more_button_title_letter_spacing',$vc_grid_load_more_button_title_letter_spacing);

			$row4 = new MikadoBurstRow(true);
			$group2->addChild('row4', $row4);

				$vc_grid_load_more_button_backgroundcolor = new MikadoBurstField('colorsimple','vc_grid_load_more_button_backgroundcolor','','Background Color','');
				$row4->addChild('vc_grid_load_more_button_backgroundcolor',$vc_grid_load_more_button_backgroundcolor);
				$vc_grid_load_more_button_backgroundcolor_hover = new MikadoBurstField('colorsimple','vc_grid_load_more_button_backgroundcolor_hover','','Hover Background Color','');
				$row4->addChild('vc_grid_load_more_button_backgroundcolor_hover',$vc_grid_load_more_button_backgroundcolor_hover);
				$vc_grid_load_more_button_border_color = new MikadoBurstField('colorsimple','vc_grid_load_more_button_border_color','','Border Color','');
				$row4->addChild('vc_grid_load_more_button_border_color',$vc_grid_load_more_button_border_color);
				$vc_grid_load_more_button_border_hover_color = new MikadoBurstField('colorsimple','vc_grid_load_more_button_border_hover_color','','Border Hover color','');
				$row4->addChild('vc_grid_load_more_button_border_hover_color',$vc_grid_load_more_button_border_hover_color);

			$row5 = new MikadoBurstRow(true);
			$group2->addChild('row5',$row5);

				$vc_grid_load_more_button_border_width = new MikadoBurstField('textsimple','vc_grid_load_more_button_border_width','','Border Width (px)','This is some description');
				$row5->addChild('vc_grid_load_more_button_border_width',$vc_grid_load_more_button_border_width);
				$vc_grid_load_more_button_border_radius = new MikadoBurstField('textsimple','vc_grid_load_more_button_border_radius','','Border Radius (px)','This is some description');
				$row5->addChild('vc_grid_load_more_button_border_radius',$vc_grid_load_more_button_border_radius);

		$group3 = new MikadoBurstGroup('Pagination', 'Define styles for grid pagination');
		$panel2->addChild('group3', $group3);

			$row1 = new MikadoBurstRow();
			$group3->addChild('row1', $row1);

				$vc_grid_pagination_color = new MikadoBurstField('colorsimple', 'vc_grid_pagination_color', '', 'Color', '');
				$row1->addChild('vc_grid_pagination_color', $vc_grid_pagination_color);
				$vc_grid_pagination_hover_color = new MikadoBurstField('colorsimple', 'vc_grid_pagination_hover_color', '', 'Hover Color', '');
				$row1->addChild('vc_grid_pagination_hover_color', $vc_grid_pagination_hover_color);
				$vc_grid_pagination_background_color = new MikadoBurstField('colorsimple', 'vc_grid_pagination_background_color', '', 'Background Color', '');
				$row1->addChild('vc_grid_pagination_background_color', $vc_grid_pagination_background_color);
				$vc_grid_pagination_background_hover_color = new MikadoBurstField('colorsimple', 'vc_grid_pagination_background_hover_color', '', 'Background Hover Color', '');
				$row1->addChild('vc_grid_pagination_background_hover_color', $vc_grid_pagination_background_hover_color);

			$row2 = new MikadoBurstRow(true);
			$group3->addChild('row2', $row2);

				$vc_grid_pagination_border_color = new MikadoBurstField('colorsimple', 'vc_grid_pagination_border_color', '', 'Border Color', '');
				$row2->addChild('vc_grid_pagination_border_color', $vc_grid_pagination_border_color);
				$vc_grid_pagination_border_hover_color = new MikadoBurstField('colorsimple', 'vc_grid_pagination_border_hover_color', '', 'Border Hover Color', '');
				$row2->addChild('vc_grid_pagination_border_hover_color', $vc_grid_pagination_border_hover_color);

		$group5 = new MikadoBurstGroup('Filter', 'Define styles for grid filter');
		$panel2->addChild('group5', $group5);

			$row1 = new MikadoBurstRow();
			$group5->addChild('row1', $row1);

				$vc_grid_portfolio_filter_color = new MikadoBurstField("colorsimple","vc_grid_portfolio_filter_color","","Text Color","This is some description");
				$row1->addChild("vc_grid_portfolio_filter_color",$vc_grid_portfolio_filter_color);
				$vc_grid_portfolio_filter_hovercolor = new MikadoBurstField("colorsimple","vc_grid_portfolio_filter_hovercolor","","Hover/Active Color","This is some description");
				$row1->addChild("vc_grid_portfolio_filter_hovercolor",$vc_grid_portfolio_filter_hovercolor);
				$vc_grid_portfolio_filter_font_size = new MikadoBurstField("textsimple","vc_grid_portfolio_filter_font_size","","Font Size (px)","This is some description");
				$row1->addChild("vc_grid_portfolio_filter_font_size",$vc_grid_portfolio_filter_font_size);
				$vc_grid_portfolio_filter_line_height = new MikadoBurstField("textsimple","vc_grid_portfolio_filter_line_height","","Line Height (px)","This is some description");
				$row1->addChild("vc_grid_portfolio_filter_line_height",$vc_grid_portfolio_filter_line_height);

			$row2 = new MikadoBurstRow(true);
			$group5->addChild('row2', $row2);

				$vc_grid_portfolio_filter_text_transform = new MikadoBurstField("selectblanksimple","vc_grid_portfolio_filter_text_transform","","Text Transform","This is some description",$mkd_burst_options_texttransform);
				$row2->addChild("vc_grid_portfolio_filter_text_transform",$vc_grid_portfolio_filter_text_transform);
				$vc_grid_portfolio_filter_font_family = new MikadoBurstField("fontsimple","vc_grid_portfolio_filter_font_family","-1","Font Family","This is some description");
				$row2->addChild("vc_grid_portfolio_filter_font_family",$vc_grid_portfolio_filter_font_family);
				$vc_grid_portfolio_filter_font_style = new MikadoBurstField("selectblanksimple","vc_grid_portfolio_filter_font_style","","Font Style","This is some description",$mkd_burst_options_fontstyle);
				$row2->addChild("vc_grid_portfolio_filter_font_style",$vc_grid_portfolio_filter_font_style);
				$vc_grid_portfolio_filter_font_weight = new MikadoBurstField("selectblanksimple","vc_grid_portfolio_filter_font_weight","","Font Weight","This is some description",$mkd_burst_options_fontweight);
				$row2->addChild("vc_grid_portfolio_filter_font_weight",$vc_grid_portfolio_filter_font_weight);

			$row3 = new MikadoBurstRow(true);
			$group5->addChild('row3', $row3);

				$vc_grid_portfolio_filter_letter_spacing = new MikadoBurstField("textsimple","vc_grid_portfolio_filter_letter_spacing","","Letter Spacing (px)","This is some description");
				$row3->addChild("vc_grid_portfolio_filter_letter_spacing",$vc_grid_portfolio_filter_letter_spacing);
				$vc_grid_portfolio_filter_margin_bottom = new MikadoBurstField("textsimple","vc_grid_portfolio_filter_margin_bottom","","Filter Bottom Margin (px)","");
				$row3->addChild("vc_grid_portfolio_filter_margin_bottom", $vc_grid_portfolio_filter_margin_bottom);

		$group4 = new MikadoBurstGroup('Arrows', 'Define styles for grid arrows');
		$panel2->addChild('group4', $group4);

			$row1 = new MikadoBurstRow();
			$group4->addChild('row1', $row1);

				$vc_grid_arrows_color = new MikadoBurstField('colorsimple', 'vc_grid_arrows_color', '', 'Color', '');
				$row1->addChild('vc_grid_arrows_color', $vc_grid_arrows_color);