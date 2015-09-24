<?php

$elementsPage = new QodeAdminPage("6", "Elements", "fa fa-flag-o");
$qodeFramework->qodeOptions->addAdminPage("elementsPage",$elementsPage);

//Accordions and Toogles

$panel29 = new QodePanel("Accordions and  Toogles","accordions_toogles_panel");
$elementsPage->addChild("panel29",$panel29);		

$accordion_toogle_subtitle = new QodeTitle("accordion_toogle_subtitle", "Title");
$panel29->addChild("accordion_toogle_subtitle", $accordion_toogle_subtitle);

$group1= new QodeGroup("Title Style", "Define Title style");	
$panel29->addChild("group1", $group1);

	$row1 = new QodeRow(true);
    $group1->addChild("row1",$row1);
	
		$accordion_toogle_title_color = new QodeField("colorsimple","accordion_toogle_title_color","","Color","This is some description");
        $row1->addChild("accordion_toogle_title_color",$accordion_toogle_title_color); 
		
		$accordion_toogle_title_hover_color = new QodeField("colorsimple","accordion_toogle_title_hover_color","","Hover Color","This is some description");
        $row1->addChild("accordion_toogle_title_hover_color",$accordion_toogle_title_hover_color); 
		
$accordion_toogle_mark_subtitle = new QodeTitle("accordion_toogle_mark_subtitle", "Accordion Mark");
$panel29->addChild("accordion_toogle_mark_subtitle", $accordion_toogle_mark_subtitle);
	
$group2= new QodeGroup("Accordion Mark Style", "Define accordion mark style");	
$panel29->addChild("group2", $group2);

	$row1 = new QodeRow(true);
    $group2->addChild("row1",$row1);
	
		$accordion_mark_icon_color = new QodeField("colorsimple","accordion_mark_icon_color","","Icon Color","This is some description");
        $row1->addChild("accordion_mark_icon_color",$accordion_mark_icon_color); 
		
		$accordion_mark_icon_hover_color = new QodeField("colorsimple","accordion_mark_icon_hover_color","","Icon Hover/Active Color","This is some description");
        $row1->addChild("accordion_mark_icon_hover_color",$accordion_mark_icon_hover_color);
	
		$accordion_mark_background_color = new QodeField("colorsimple","accordion_mark_background_color","","Background Color","This is some description");
        $row1->addChild("accordion_mark_background_color",$accordion_mark_background_color); 
		
		$accordion_mark_background_hover_color = new QodeField("colorsimple","accordion_mark_background_hover_color","","Background Hover/Active Color","This is some description");
        $row1->addChild("accordion_mark_background_hover_color",$accordion_mark_background_hover_color);


//Back to top

$panel1 = new QodePanel("'Back to Top' Link Button","back_to_top_panel");
$elementsPage->addChild("panel1",$panel1);

        $group1 = new QodeGroup("Background",'Choose background for "Back to Top"');
        $panel1->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $back_to_top_background_color = new QodeField("colorsimple","back_to_top_background_color","","Background Color","This is some description");
                        $row1->addChild("back_to_top_background_color",$back_to_top_background_color);

                        $back_to_top_background_hover_color = new QodeField("colorsimple","back_to_top_background_hover_color","","Background Hover Color","This is some description");
                        $row1->addChild("back_to_top_background_hover_color",$back_to_top_background_hover_color);

                        $back_to_top_background_transparency = new QodeField("textsimple","back_to_top_background_transparency","","Background Transparency (0-1)","This is some description");
                        $row1->addChild("back_to_top_background_transparency",$back_to_top_background_transparency);

        $group2 = new QodeGroup("Border","Choose Border style for Back to Top");
        $panel1->addChild("group2",$group2);

				$row1 = new QodeRow();
				$group2->addChild("row1",$row1);

                        $back_to_top_border_color = new QodeField("colorsimple","back_to_top_border_color","","Border Color","This is some description");
                        $row1->addChild("back_to_top_border_color",$back_to_top_border_color);

                        $back_to_top_border_hover_color = new QodeField("colorsimple","back_to_top_border_hover_color","","Border Hover Color","This is some description");
                        $row1->addChild("back_to_top_border_hover_color",$back_to_top_border_hover_color);

                        $back_to_top_border_width = new QodeField("textsimple","back_to_top_border_width","","Border Width (px)","This is some description");
                        $row1->addChild("back_to_top_border_width",$back_to_top_border_width);

                        $back_to_top_border_radius = new QodeField("textsimple","back_to_top_border_radius","","Border Radius (px)","This is some description");
                        $row1->addChild("back_to_top_border_radius",$back_to_top_border_radius);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $back_to_top_border_transparency = new QodeField("textsimple","back_to_top_border_transparency","","Border Transparency (0-1)","This is some description");
                        $row2->addChild("back_to_top_border_transparency",$back_to_top_border_transparency);

        $group3 = new QodeGroup("Button Size",'Choose Size for "Back to Top" button');
        $panel1->addChild("group3",$group3);

                $row1 = new QodeRow();
                $group3->addChild("row1",$row1);

                        $back_to_top_height = new QodeField("textsimple","back_to_top_height","","Height (px)","This is some description");
                        $row1->addChild("back_to_top_height",$back_to_top_height);
                        $back_to_top_width = new QodeField("textsimple","back_to_top_width","","Width (px)","This is some description");
                        $row1->addChild("back_to_top_width",$back_to_top_width);

        $group4 = new QodeGroup("Button Position",'Define button alignment and margin bottom');
        $panel1->addChild("group4",$group4);

            $row1 = new QodeRow();
            $group4->addChild("row1",$row1);

                        $back_to_top_position = new QodeField("selectsimple","back_to_top_position","","Button Alignment",'Choose alignment for "Back to Top" button', array(
                            "right"  => "Right",
                            "left"   => "Left",
                            "center" => "Center",
                        ));
						$row1->addChild("back_to_top_position",$back_to_top_position);

                        $back_to_top_button_margin_bottom = new QodeField("textsimple","back_to_top_button_margin_bottom","","Margin Bottom (px)","Enter bottom margin");
                        $row1->addChild("back_to_top_button_margin_bottom",$back_to_top_button_margin_bottom);

        $back_to_top_type = new QodeField("select","back_to_top_type","arrow","Button Type",'Choose "Back to Top" button type ', array(
                    "arrow" => "Arrow",
                    "text" => "Text"
                  ),
                  array("dependence" => true,
                        "hide" => array(
                            "arrow"=>"#qodef_back_to_top_type_text_container",
                            "text"=>"#qodef_back_to_top_type_arrow_container"),
                        "show" => array(
                            "arrow"=>"#qodef_back_to_top_type_arrow_container",
                            "text"=>"#qodef_back_to_top_type_text_container"
                        )
                  ));
        $panel1->addChild("back_to_top_type",$back_to_top_type);

        $back_to_top_type_arrow_container = new QodeContainer("back_to_top_type_arrow_container","back_to_top_type","text");
        $panel1->addChild("back_to_top_type_arrow_container",$back_to_top_type_arrow_container);

            $group1 = new QodeGroup("Arrow Icon Style","Define style for arrow icon");
            $back_to_top_type_arrow_container->addChild("group1",$group1);

                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                    $show_back_button_icon_set = new QodeField('selectsimple', 'show_back_button_icon_set', 'font_elegant', 'Choose Icon Pack', 'Choose Icon Pack', $qodeIconCollections->getIconCollectionsExclude('linea_icons'));
                    $row1->addChild('show_back_button_icon_set', $show_back_button_icon_set);

                    $back_to_top_arrow_size = new QodeField("textsimple","back_to_top_arrow_size","14","Icon Size (px)","Default value is 14	");
                    $row1->addChild("back_to_top_arrow_size",$back_to_top_arrow_size);

                    $back_to_top_arrow_color = new QodeField("colorsimple","back_to_top_arrow_color","","Icon Color","This is some description");
                    $row1->addChild("back_to_top_arrow_color",$back_to_top_arrow_color);

                    $back_to_top_arrow_hover_color = new QodeField("colorsimple","back_to_top_arrow_hover_color","","Icon Hover Color","This is some description");
                    $row1->addChild("back_to_top_arrow_hover_color",$back_to_top_arrow_hover_color);

        $back_to_top_type_text_container = new QodeContainer("back_to_top_type_text_container","back_to_top_type","arrow");
        $panel1->addChild("back_to_top_type_text_container",$back_to_top_type_text_container);

			$back_to_top_text = new QodeField("text","back_to_top_text","","Back to Top Text","Enter text for 'Back to Top' button");
			$back_to_top_type_text_container->addChild("back_to_top_text",$back_to_top_text);

				$group1 = new QodeGroup("Button Text Color","Define Color for Text Type");
				$back_to_top_type_text_container->addChild("group1",$group1);

					$row1 = new QodeRow();
					$group1->addChild("row1",$row1);

						$back_to_top_text_color = new QodeField("colorsimple","back_to_top_text_color","","Text Color","This is some description");
						$row1->addChild("back_to_top_text_color",$back_to_top_text_color);

						$back_to_top_text_hover_color = new QodeField("colorsimple","back_to_top_text_hover_color","","Text Hover Color","This is some description");
						$row1->addChild("back_to_top_text_hover_color",$back_to_top_text_hover_color);

                $group2 = new QodeGroup("Button Text Style","Define Style for Text Type");
                $back_to_top_type_text_container->addChild("group2",$group2);

                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $back_to_top_text_fontsize = new QodeField("textsimple","back_to_top_text_fontsize","","Font Size (px)","This is some description");
                        $row1->addChild("back_to_top_text_fontsize",$back_to_top_text_fontsize);

                        $back_to_top_text_lineheight = new QodeField("textsimple","back_to_top_text_lineheight","","Line Height (px)","This is some description");
                        $row1->addChild("back_to_top_text_lineheight",$back_to_top_text_lineheight);

                        $back_to_top_text_texttransform = new QodeField("selectblanksimple","back_to_top_text_texttransform","","Text Transform","This is some description",$options_texttransform);
                        $row1->addChild("back_to_top_text_texttransform",$back_to_top_text_texttransform);

						$back_to_top_text_fontfamily = new QodeField("Fontsimple","back_to_top_text_fontfamily","-1","Font Family","This is some description");
						$row1->addChild("back_to_top_text_fontfamily",$back_to_top_text_fontfamily);

                $row2 = new QodeRow();
                $group2->addChild("row2",$row2);

                        $back_to_top_text_fontstyle = new QodeField("selectblanksimple","back_to_top_text_fontstyle","","Font Style","This is some description",$options_fontstyle);
                        $row2->addChild("back_to_top_text_fontstyle",$back_to_top_text_fontstyle);

                        $back_to_top_text_fontweight = new QodeField("selectblanksimple","back_to_top_text_fontweight","","Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("back_to_top_text_fontweight",$back_to_top_text_fontweight);

						$back_to_top_text_letterspacing = new QodeField("textsimple","back_to_top_text_letterspacing","","Letter Spacing (px)","This is some description");
						$row2->addChild("back_to_top_text_letterspacing",$back_to_top_text_letterspacing);


//Buttons

$panel2 = new QodePanel("Buttons","buttons_panel");
$elementsPage->addChild("panel2",$panel2);

$button_default_section = new QodeTitle("button_default_section","Default Button");
$panel2->addChild("button_default_section",$button_default_section);

        $group1 = new QodeGroup("Text Style","Define text style");
        $panel2->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);
                        $button_title_google_fonts = new QodeField("Fontsimple","button_title_google_fonts","-1","Font Family","This is some description");
                        $row1->addChild("button_title_google_fonts",$button_title_google_fonts);

                        $button_title_fontsize = new QodeField("textsimple","button_title_fontsize","","Text Size (px)","This is some description");
                        $row1->addChild("button_title_fontsize",$button_title_fontsize);

                        $button_title_fontstyle = new QodeField("selectblanksimple","button_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
                        $row1->addChild("button_title_fontstyle",$button_title_fontstyle);

                        $button_title_fontweight = new QodeField("selectblanksimple","button_title_fontweight","","Font Weight","This is some description",$options_fontweight);
                        $row1->addChild("button_title_fontweight",$button_title_fontweight);

                $row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);
                        $button_title_letter_spacing = new QodeField("textsimple","button_title_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row2->addChild("button_title_letter_spacing",$button_title_letter_spacing);

                        $button_title_lineheight = new QodeField("textsimple","button_title_lineheight","","Line Height (px)","This is some description");
                        $row2->addChild("button_title_lineheight",$button_title_lineheight);

                        $button_title_color = new QodeField("colorsimple","button_title_color","","Text Color","This is some description");
                        $row2->addChild("button_title_color",$button_title_color);

                        $button_title_hovercolor = new QodeField("colorsimple","button_title_hovercolor","","Hover Text Color","This is some description");
                        $row2->addChild("button_title_hovercolor",$button_title_hovercolor);

                $row3 = new QodeRow(true);
                $group1->addChild("row3",$row3);

                        $button_title_texttransform = new QodeField("selectblanksimple","button_title_texttransform","","Text Transform","This is some description",$options_texttransform);
                        $row3->addChild("button_title_texttransform",$button_title_texttransform);

        $group2 = new QodeGroup("Background","Define background");
        $panel2->addChild("group2",$group2);

                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $button_backgroundcolor = new QodeField("colorsimple","button_backgroundcolor","","Background Color","This is some description");
                        $row1->addChild("button_backgroundcolor",$button_backgroundcolor);

                        $button_backgroundcolor_hover = new QodeField("colorsimple","button_backgroundcolor_hover","","Background Hover Color","This is some description");
                        $row1->addChild("button_backgroundcolor_hover",$button_backgroundcolor_hover);

        $group3 = new QodeGroup("Border Style","Define border style");
        $panel2->addChild("group3",$group3);

                $row1 = new QodeRow();
                $group3->addChild("row1",$row1);

                        $button_border_color = new QodeField("colorsimple","button_border_color","","Border Color","This is some description");
                        $row1->addChild("button_border_color",$button_border_color);

                        $button_border_hover_color = new QodeField("colorsimple","button_border_hover_color","","Border Hover Color","This is some description");
                        $row1->addChild("button_border_hover_color",$button_border_hover_color);

                        $button_border_width = new QodeField("textsimple","button_border_width","","Border Width (px)","This is some description");
                        $row1->addChild("button_border_width",$button_border_width);

                        $button_border_radius = new QodeField("textsimple","button_border_radius","","Border Radius (px)","This is some description");
                        $row1->addChild("button_border_radius",$button_border_radius);

        $button_padding = new QodeField("text","button_padding","","Padding Left/Right (px) ","Define padding", array(), array("col_width" => 3));
        $panel2->addChild("button_padding",$button_padding);

$button_predefined_white_section = new QodeTitle("button_predefined_white_section","Predefined White Button");
$panel2->addChild("button_predefined_white_section",$button_predefined_white_section);

        $group5 = new QodeGroup("Text Style","Define text style.");
        $panel2->addChild("group5",$group5);
                $row1 = new QodeRow();
                $group5->addChild("row1",$row1);

                        $button_white_text_color = new QodeField("colorsimple","button_white_text_color","","Text Color","This is some description");
                        $row1->addChild("button_white_text_color",$button_white_text_color);

                        $button_white_text_color_hover = new QodeField("colorsimple","button_white_text_color_hover","","Hover Text Color","This is some description");
                        $row1->addChild("button_white_text_color_hover",$button_white_text_color_hover);

        $group6 = new QodeGroup("Background","Define background");
        $panel2->addChild("group6",$group6);
                $row1 = new QodeRow();
                $group6->addChild("row1",$row1);

                        $button_white_background_color = new QodeField("colorsimple","button_white_background_color","","Background Color","This is some description");
                        $row1->addChild("button_white_background_color",$button_white_background_color);

                        $button_white_background_color_hover = new QodeField("colorsimple","button_white_background_color_hover","","Background Hover Color","This is some description");
                        $row1->addChild("button_white_background_color_hover",$button_white_background_color_hover);

        $group7 = new QodeGroup("Border Style","Define border style.");
        $panel2->addChild("group7",$group7);

                $row1 = new QodeRow();
                $group7->addChild("row1",$row1);

                        $button_white_border_color = new QodeField("colorsimple","button_white_border_color","","Border Color","This is some description");
                        $row1->addChild("button_white_border_color",$button_white_border_color);

                        $button_white_border_color_hover = new QodeField("colorsimple","button_white_border_color_hover","","Border Hover Color","This is some description");
                        $row1->addChild("button_white_border_color_hover",$button_white_border_color_hover);

$button_predefined_mid_transparent_section = new QodeTitle("button_predefined_mid_transparent_section","Predefined Mid-Transparent Button");
$panel2->addChild("button_predefined_mid_transparent_section",$button_predefined_mid_transparent_section);

        $group8 = new QodeGroup("Text Style","Define text style");
        $panel2->addChild("group8",$group8);
                $row1 = new QodeRow();
                $group8->addChild("row1",$row1);

                        $button_mid_transparent_text_color = new QodeField("colorsimple","button_mid_transparent_text_color","","Text Color","This is some description");
                        $row1->addChild("button_mid_transparent_text_color",$button_mid_transparent_text_color);

                        $button_mid_transparent_text_color_hover = new QodeField("colorsimple","button_mid_transparent_text_color_hover","","Hover Text Color","This is some description");
                        $row1->addChild("button_mid_transparent_text_color_hover",$button_mid_transparent_text_color_hover);

        $group9 = new QodeGroup("Background","Define background");
        $panel2->addChild("group9",$group9);

                $row1 = new QodeRow();
                $group9->addChild("row1",$row1);

                        $button_mid_transparent_background_color = new QodeField("colorsimple","button_mid_transparent_background_color","","Background Color","This is some description");
                        $row1->addChild("button_mid_transparent_background_color",$button_mid_transparent_background_color);

                        $button_mid_transparent_background_color_hover = new QodeField("colorsimple","button_mid_transparent_background_color_hover","","Background Hover Color","This is some description");
                        $row1->addChild("button_mid_transparent_background_color_hover",$button_mid_transparent_background_color_hover);

        $group10 = new QodeGroup("Border Style","Define border style");
        $panel2->addChild("group10",$group10);

                $row1 = new QodeRow();
                $group10->addChild("row1",$row1);

                        $button_mid_transparent_border_color = new QodeField("colorsimple","button_mid_transparent_border_color","","Border Color","This is some description");
                        $row1->addChild("button_mid_transparent_border_color",$button_mid_transparent_border_color);

                        $button_mid_transparent_border_color_hover = new QodeField("colorsimple","button_mid_transparent_border_color_hover","","Border Hover Color","This is some description");
                        $row1->addChild("button_mid_transparent_border_color_hover",$button_mid_transparent_border_color_hover);

                        $button_mid_transparent_border_width = new QodeField("textsimple","button_mid_transparent_border_width","","Border Width (px)","This is some description");
                        $row1->addChild("button_mid_transparent_border_width",$button_mid_transparent_border_width);


$button_predefined_top_bottom_border_section = new QodeTitle("button_predefined_top_bottom_border_section","Predefined Top&Bottom Border Button");
$panel2->addChild("button_predefined_top_bottom_border_section",$button_predefined_top_bottom_border_section);

        $group11 = new QodeGroup("Text Style","Define text style");
        $panel2->addChild("group11",$group11);
                $row1 = new QodeRow();
                $group11->addChild("row1",$row1);

                    $button_top_bottom_border_text_color = new QodeField("colorsimple","button_top_bottom_border_text_color","","Text Color","This is some description");
                    $row1->addChild("button_top_bottom_border_text_color",$button_top_bottom_border_text_color);

                    $button_top_bottom_border_text_color_hover = new QodeField("colorsimple","button_top_bottom_border_text_color_hover","","Hover Text Color","This is some description");
                    $row1->addChild("button_top_bottom_border_text_color_hover",$button_top_bottom_border_text_color_hover);

        $group12 = new QodeGroup("Background","Define background");
        $panel2->addChild("group12",$group12);
                $row1 = new QodeRow();
                $group12->addChild("row1",$row1);

                    $button_top_bottom_border_background_color = new QodeField("colorsimple","button_top_bottom_border_background_color","","Background Color","This is some description");
                    $row1->addChild("button_top_bottom_border_background_color",$button_top_bottom_border_background_color);

                    $button_top_bottom_border_background_color_hover = new QodeField("colorsimple","button_top_bottom_border_background_color_hover","","Background Hover Color","This is some description");
                    $row1->addChild("button_top_bottom_border_background_color_hover",$button_top_bottom_border_background_color_hover);

        $group13 = new QodeGroup("Border Style","Define border style");
        $panel2->addChild("group13",$group13);
                $row1 = new QodeRow();
                $group13->addChild("row1",$row1);

                    $button_top_bottom_border_border_color = new QodeField("colorsimple","button_top_bottom_border_border_color","","Border Color","This is some description");
                    $row1->addChild("button_top_bottom_border_border_color",$button_top_bottom_border_border_color);

                    $button_top_bottom_border_border_color_hover = new QodeField("colorsimple","button_top_bottom_border_border_color_hover","","Border Hover Color","This is some description");
                    $row1->addChild("button_top_bottom_border_border_color_hover",$button_top_bottom_border_border_color_hover);

                    $button_top_bottom_border_border_width = new QodeField("textsimple","button_top_bottom_border_border_width","","Border Width (px)","This is some description");
                    $row1->addChild("button_top_bottom_border_border_width",$button_top_bottom_border_border_width);

$button_small_section = new QodeTitle("button_small_section","Small Button");
$panel2->addChild("button_small_section",$button_small_section);

        $group14 = new QodeGroup("Text Style","Define text style");
        $panel2->addChild("group14",$group14);
                $row1 = new QodeRow();
                $group14->addChild("row1",$row1);

                        $small_button_fontsize = new QodeField("textsimple","small_button_fontsize","","Font Size (px)","This is some description");
                        $row1->addChild("small_button_fontsize",$small_button_fontsize);

                        $small_button_fontweight = new QodeField("selectblanksimple","small_button_fontweight","","Font Weight","This is some description",$options_fontweight);
                        $row1->addChild("small_button_fontweight",$small_button_fontweight);

                        $small_button_lineheight = new QodeField("textsimple","small_button_lineheight","","Line Height (px)","This is some description");
                        $row1->addChild("small_button_lineheight",$small_button_lineheight);

        $small_button_padding = new QodeField("text","small_button_padding","","Padding left/right (px) ","Define padding", array(), array("col_width" => 3));
        $panel2->addChild("small_button_padding",$small_button_padding);

        $small_button_border_radius = new QodeField("text","small_button_border_radius","","Border radius (px)","Define border", array(), array("col_width" => 3));
        $panel2->addChild("small_button_border_radius",$small_button_border_radius);

$button_large_section = new QodeTitle("button_large_section","Large Button");
$panel2->addChild("button_large_section",$button_large_section);

        $group17 = new QodeGroup("Text Style","Define text style");
        $panel2->addChild("group17",$group17);

                $row1 = new QodeRow();
                $group17->addChild("row1",$row1);

                        $large_button_fontsize = new QodeField("textsimple","large_button_fontsize","","Font Size (px)","This is some description");
                        $row1->addChild("large_button_fontsize",$large_button_fontsize);

                        $large_button_fontweight = new QodeField("selectblanksimple","large_button_fontweight","","Font Weight","This is some description",$options_fontweight);
                        $row1->addChild("large_button_fontweight",$large_button_fontweight);

                        $large_button_lineheight = new QodeField("textsimple","large_button_lineheight","","Line Height (px)","This is some description");
                        $row1->addChild("large_button_lineheight",$large_button_lineheight);

        $large_button_padding = new QodeField("text","large_button_padding","","Padding Left/Right (px) ","Define padding", array(), array("col_width" => 3));
        $panel2->addChild("large_button_padding",$large_button_padding);

        $large_button_border_radius = new QodeField("text","large_button_border_radius","","Border Radius (px)","Define border", array(), array("col_width" => 3));
        $panel2->addChild("large_button_border_radius",$large_button_border_radius);

$button_extra_large_section = new QodeTitle("button_extra_large_section","Extra Large Button");
$panel2->addChild("button_extra_large_section",$button_extra_large_section);

        $group20 = new QodeGroup("Text Style","Define text style");
        $panel2->addChild("group20",$group20);
                $row1 = new QodeRow();
                $group20->addChild("row1",$row1);

                        $big_large_button_fontsize = new QodeField("textsimple","big_large_button_fontsize","","Font Size (px)","This is some description");
                        $row1->addChild("big_large_button_fontsize",$big_large_button_fontsize);

                        $big_large_button_fontweight = new QodeField("selectblanksimple","big_large_button_fontweight","","Font Weight","This is some description",$options_fontweight);
                        $row1->addChild("big_large_button_fontweight",$big_large_button_fontweight);

                        $big_large_button_lineheight = new QodeField("textsimple","big_large_button_lineheight","","Line Height (px)","This is some description");
                        $row1->addChild("big_large_button_lineheight",$big_large_button_lineheight);

        $big_large_button_padding = new QodeField("text","big_large_button_padding","","Padding Left/Right (px) ","Define padding", array(), array("col_width" => 3));
        $panel2->addChild("big_large_button_padding",$big_large_button_padding);

        $big_large_button_border_radius = new QodeField("text","big_large_button_border_radius","","Border Radius (px)","Define padding", array(), array("col_width" => 3));
        $panel2->addChild("big_large_button_border_radius",$big_large_button_border_radius);

//Blockquote

$panel3 = new QodePanel("Blockquote","blockquote_panel");
$elementsPage->addChild("panel3",$panel3);

        $group1 = new QodeGroup("Blockquote Style","Define Blockquote style");
        $panel3->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $blockquote_color = new QodeField("colorsimple","blockquote_color","","Text Color","This is some description");
                        $row1->addChild("blockquote_font_color",$blockquote_color);

                        $blockquote_font_size = new QodeField("textsimple","blockquote_font_size","","Font Size (px)","This is some description");
                        $row1->addChild("blockquote_font_size",$blockquote_font_size);

                        $blockquote_line_height = new QodeField("textsimple","blockquote_line_height","","Line Height (px)","This is some description");
                        $row1->addChild("blockquote_line_height",$blockquote_line_height);

                        $blockquote_text_transform = new QodeField("selectblanksimple","blockquote_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row1->addChild("blockquote_text_transform",$blockquote_text_transform);

                $row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);

                        $blockquote_font_family = new QodeField("Fontsimple","blockquote_font_family","-1","Font Family","This is some description");
                        $row2->addChild("blockquote_font_family",$blockquote_font_family);

                        $blockquote_font_style = new QodeField("selectblanksimple","blockquote_font_style","","Font Style","This is some description",$options_fontstyle);
                        $row2->addChild("blockquote_font_style",$blockquote_font_style);

                        $blockquote_font_weight = new QodeField("selectblanksimple","blockquote_font_weight","","Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("blockquote_font_weight",$blockquote_font_weight);

                        $blockquote_letter_spacing = new QodeField("textsimple","blockquote_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row2->addChild("blockquote_letter_spacing",$blockquote_letter_spacing);

                $row3 = new QodeRow(true);
                $group1->addChild("row3",$row3);

                        $blockquote_background_color = new QodeField("colorsimple","blockquote_background_color","","Background Color","This is some description");
                        $row3->addChild("blockquote_background_color",$blockquote_background_color);

                        $blockquote_border_color = new QodeField("colorsimple","blockquote_border_color","","Border Color","This is some description");
                        $row3->addChild("blockquote_border_color",$blockquote_border_color);

                        $blockquote_quote_icon_color = new QodeField("colorsimple","blockquote_quote_icon_color","","Quote Icon Color","This is some description");
                        $row3->addChild("blockquote_quote_icon_color",$blockquote_quote_icon_color);
						
//Blog List

$panel28 = new QodePanel("Blog List","blog_list_panel");
$elementsPage->addChild("panel28",$panel28);


$blog_list_minimal_subtitle = new QodeTitle("blog_list_minimal_subtitle", "Blog List Minimal");
$panel28->addChild("blog_list_minimal_subtitle", $blog_list_minimal_subtitle);

$group5 = new QodeGroup("Blog List Spacing","Define blog list spacing");
$panel28->addChild("group5",$group5);

	$row1 = new QodeRow(true);
    $group5->addChild("row1",$row1);
	
		$blog_list_minimal_title_margin_bottom = new QodeField("textsimple","blog_list_minimal_title_margin_bottom","","Margin Under Title (px)","This is some description");
        $row1->addChild("blog_list_minimal_title_margin_bottom",$blog_list_minimal_title_margin_bottom);
		
		$blog_list_minimal_post_info_margin_bottom = new QodeField("textsimple","blog_list_minimal_post_info_margin_bottom","","Margin Under Post Info (px)","This is some description");
        $row1->addChild("blog_list_minimal_post_info_margin_bottom",$blog_list_minimal_post_info_margin_bottom);
		
		$blog_list_minimal_read_more_margin_top = new QodeField("textsimple","blog_list_minimal_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
        $row1->addChild("blog_list_minimal_read_more_margin_top",$blog_list_minimal_read_more_margin_top);						

//Content Menu

$panel25 = new QodePanel("Content Menu","content_menu_panel");
$elementsPage->addChild("panel25",$panel25);

        $group1 = new QodeGroup("Menu Icons Style","Define Icons style");
        $panel25->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);
                    $content_menu_icon_color = new QodeField("colorsimple","content_menu_icon_color","","Icon Color","This is some description");
                    $row1->addChild("content_menu_icon_color",$content_menu_icon_color);
                    $content_menu_icon_hover_color = new QodeField("colorsimple","content_menu_icon_hover_color","","Icon Hover Color","This is some description");
                    $row1->addChild("content_menu_icon_hover_color",$content_menu_icon_hover_color);
                    $content_menu_icon_size = new QodeField("textsimple","content_menu_icon_size","","Icon Size","This is some description");
                    $row1->addChild("content_menu_icon_size",$content_menu_icon_size);

        $group2 = new QodeGroup("Text Style","Define Text style");
        $panel25->addChild("group2",$group2);
                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);
                    $content_menu_text_color = new QodeField("colorsimple","content_menu_text_color","","Text Color","This is some description");
                    $row1->addChild("content_menu_text_color",$content_menu_text_color);
                    $content_menu_text_hover_color = new QodeField("colorsimple","content_menu_text_hover_color","","Text Hover Color","This is some description");
                    $row1->addChild("content_menu_text_hover_color",$content_menu_text_hover_color);
                    $content_menu_text_fontsize = new QodeField("textsimple","content_menu_text_fontsize","","Font Size (px)","This is some description");
                    $row1->addChild("content_menu_text_fontsize",$content_menu_text_fontsize);
                    $content_menu_text_lineheight = new QodeField("textsimple","content_menu_text_lineheight","","Line Height (px)","This is some description");
                    $row1->addChild("content_menu_text_lineheight",$content_menu_text_lineheight);
                $row2 = new QodeRow();
                $group2->addChild("row2",$row2);
                    $content_menu_text_texttransform = new QodeField("selectblanksimple","content_menu_text_texttransform","","Text Transform","This is some description",$options_texttransform);
                    $row2->addChild("content_menu_text_texttransform",$content_menu_text_texttransform);
                    $content_menu_text_google_fonts = new QodeField("Fontsimple","content_menu_text_google_fonts","-1","Font Family","This is some description");
                    $row2->addChild("content_menu_text_google_fonts",$content_menu_text_google_fonts);
                    $content_menu_text_fontstyle = new QodeField("selectblanksimple","content_menu_text_fontstyle","","Font Style","This is some description",$options_fontstyle);
                    $row2->addChild("content_menu_text_fontstyle",$h1_fontstyle);
                    $content_menu_text_fontweight = new QodeField("selectblanksimple","content_menu_text_fontweight","","Font Weight","This is some description",$options_fontweight);
                    $row2->addChild("content_menu_text_fontweight",$content_menu_text_fontweight);
                $row3 = new QodeRow();
                $group2->addChild("row3",$row3);
                    $content_menu_text_letterspacing = new QodeField("textsimple","content_menu_text_letterspacing","","Letter Spacing (px)","This is some description");
                    $row2->addChild("content_menu_text_letterspacing",$content_menu_text_letterspacing);

//Counters

$panel4 = new QodePanel("Counters","counters_panel");
$elementsPage->addChild("panel4",$panel4);

        $group1 = new QodeGroup("Counters Style","Define styles for Counters");
        $panel4->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $counter_color = new QodeField("colorsimple","counter_color","","Numeral Color","This is some description");
                        $row1->addChild("counter_color",$counter_color);

                        $counter_text_color = new QodeField("colorsimple","counter_text_color","","Text Color","This is some description");
                        $row1->addChild("counter_text_color",$counter_text_color);

                        $counter_separator_color = new QodeField("colorsimple","counter_separator_color","","Separator Color","This is some description");
                        $row1->addChild("counter_separator_color",$counter_separator_color);

                $row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);

                        $counters_font_family = new QodeField("Fontsimple","counters_font_family","-1","Numeral Font Family","This is some description");
                        $row2->addChild("counters_font_family",$counters_font_family);

                        $counters_font_size = new QodeField("textsimple","counters_font_size","","Numeral Font Size (px)","This is some description");
                        $row2->addChild("counters_font_size",$counters_font_size);

                        $counters_fontweight = new QodeField("selectblanksimple","counters_fontweight","","Numeral Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("counters_fontweight",$counters_fontweight);

                $row3 = new QodeRow(true);
                $group1->addChild("row3",$row3);

                        $counters_text_font_size = new QodeField("textsimple","counters_text_font_size","","Text Font Size (px)","This is some description");
                        $row3->addChild("counters_text_font_size",$counters_text_font_size);

                        $counters_text_fontweight = new QodeField("selectblanksimple","counters_text_fontweight","","Text Font Weight","This is some description",$options_fontweight);
                        $row3->addChild("counters_text_fontweight",$counters_text_fontweight);

                        $counters_text_texttransform = new QodeField("selectblanksimple","counters_text_texttransform","","Text Transform","This is some description",$options_texttransform);
                        $row3->addChild("counters_text_texttransform",$counters_text_texttransform);

                        $counters_text_letterspacing = new QodeField("textsimple","counters_text_letterspacing","","Text Letter Spacing (px)","This is some description");
                        $row3->addChild("counters_text_letterspacing",$counters_text_letterspacing);

        $group2 = new QodeGroup("Counters Title","Define Counter title style");
        $panel4->addChild("group2",$group2);

                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $counters_title_color = new QodeField("colorsimple","counters_title_color","","Text Color","This is some description");
                        $row1->addChild("counters_title_color",$counters_title_color);

                        $counters_title_font_size = new QodeField("textsimple","counters_title_font_size","","Font Size (px)","This is some description");
                        $row1->addChild("counters_title_font_size",$counters_title_font_size);

                        $counters_title_line_height = new QodeField("textsimple","counters_title_line_height","","Line Height (px)","This is some description");
                        $row1->addChild("counters_title_line_height",$counters_title_line_height);

                        $counters_title_text_transform = new QodeField("selectblanksimple","counters_title_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row1->addChild("counters_title_text_transform",$counters_title_text_transform);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $counters_title_font_family = new QodeField("Fontsimple","counters_title_font_family","-1","Font Family","This is some description");
                        $row2->addChild("counters_title_font_family",$counters_title_font_family);

                        $counters_title_font_style = new QodeField("selectblanksimple","counters_title_font_style","","Font Style","This is some description",$options_fontstyle);
                        $row2->addChild("counters_title_font_style",$counters_title_font_style);

                        $counters_title_font_weight = new QodeField("selectblanksimple","counters_title_font_weight","","Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("counters_title_font_weight",$counters_title_font_weight);

                        $counters_title_letter_spacing = new QodeField("textsimple","counters_title_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row2->addChild("counters_title_letter_spacing",$counters_title_letter_spacing);


//Expandable Section

$panel5 = new QodePanel("Expandable Section","expandable_section_panel");
$elementsPage->addChild("panel5",$panel5);

        $group1 = new QodeGroup("Title Style","Define Expandable Section title style");
        $panel5->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $expandable_label_color = new QodeField("colorsimple","expandable_label_color","","Text Color","This is some description");
                        $row1->addChild("expandable_label_color",$expandable_label_color);

                        $expandable_label_font_size = new QodeField("textsimple","expandable_label_font_size","","Font Size (px)","This is some description");
                        $row1->addChild("expandable_label_font_size",$expandable_label_font_size);

                        $expandable_label_text_transform = new QodeField("selectblanksimple","expandable_label_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row1->addChild("expandable_label_text_transform",$expandable_label_text_transform);

                $row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);

                        $expandable_label_font_family = new QodeField("Fontsimple","expandable_label_font_family","-1","Font Family","This is some description");
                        $row2->addChild("expandable_label_font_family",$expandable_label_font_family);

                        $expandable_label_font_weight = new QodeField("selectblanksimple","expandable_label_font_weight","","Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("expandable_label_font_weight",$expandable_label_font_weight);

                        $expandable_label_letter_spacing = new QodeField("textsimple","expandable_label_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row2->addChild("expandable_label_letter_spacing",$expandable_label_letter_spacing);

                $row3 = new QodeRow(true);
                $group1->addChild("row3",$row3);

                        $expandable_background_color = new QodeField("colorsimple","expandable_background_color","","Background Color","This is some description");
                        $row3->addChild("expandable_background_color",$expandable_background_color);

                        $expandable_label_hover_color = new QodeField("colorsimple","expandable_label_hover_color","","Hover Text Color","This is some description");
                        $row3->addChild("expandable_label_hover_color",$expandable_label_hover_color);

        //Highlight

        $panel17 = new QodePanel("Highlight","highlight_panel");
        $elementsPage->addChild("panel17",$panel17);
        $highlight_color = new QodeField("color","highlight_color","","Highlight Color","Set color for Highlight");
        $panel17->addChild("highlight_color",$highlight_color);

//Horizontal Progress Bars

$panel6 = new QodePanel("Horizontal Progress Bars", "horizontal_progress_bars_panel");
$elementsPage->addChild("panel6",$panel6);

    	$group1 = new QodeGroup("Progress Bar Title Style","Define styles for Horizontal Progress Bars title");
    	$panel6->addChild("group1",$group1);

        		$row1 = new QodeRow();
        		$group1->addChild("row1",$row1);

            			$progress_bar_horizontal_font_size = new QodeField("textsimple","progress_bar_horizontal_font_size","","Font Size (px)","This is some description");
            			$row1->addChild("progress_bar_horizontal_font_size",$progress_bar_horizontal_font_size);

                        $progress_bar_horizontal_color = new QodeField("colorsimple","progress_bar_horizontal_color","","Text Color","This is some description");
                        $row1->addChild("progress_bar_horizontal_color",$progress_bar_horizontal_color);

            			$progress_bar_horizontal_line_height = new QodeField("textsimple","progress_bar_horizontal_line_height","","Line Height (px)","This is some description");
            			$row1->addChild("progress_bar_horizontal_line_height",$progress_bar_horizontal_line_height);            			

            			$progress_bar_horizontal_font_family = new QodeField("Fontsimple","progress_bar_horizontal_font_family","-1","Font Family","This is some description");
            			$row1->addChild("progress_bar_horizontal_font_family",$progress_bar_horizontal_font_family);

        		$row2 = new QodeRow(true);
        		$group1->addChild("row2",$row2);

            			$progress_bar_horizontal_font_style = new QodeField("selectblanksimple","progress_bar_horizontal_font_style","","Font Style","This is some description",$options_fontstyle);
            			$row2->addChild("progress_bar_horizontal_font_style",$progress_bar_horizontal_font_style);

            			$progress_bar_horizontal_font_weight = new QodeField("selectblanksimple","progress_bar_horizontal_font_weight","","Font Weight","This is some description",$options_fontweight);
            			$row2->addChild("progress_bar_horizontal_font_weight",$progress_bar_horizontal_font_weight);

            			$progress_bar_horizontal_letter_spacing = new QodeField("textsimple","progress_bar_horizontal_letter_spacing","","Letter Spacing (px)","This is some description");
            			$row2->addChild("progress_bar_horizontal_letter_spacing",$progress_bar_horizontal_letter_spacing);

                        $progress_bar_horizontal_text_transform = new QodeField("selectblanksimple","progress_bar_horizontal_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row2->addChild("progress_bar_horizontal_text_transform",$progress_bar_horizontal_text_transform);
                        

        	$group2 = new QodeGroup("Progress Bar Percentage Style","Define styles for Horizontal Progress Bars percentage");
        	$panel6->addChild("group2",$group2);

        		$row1 = new QodeRow();
        		$group2->addChild("row1",$row1);

        			    $progress_bar_horizontal_percentage_font_size = new QodeField("textsimple","progress_bar_horizontal_percentage_font_size","","Font Size (px)","This is some description");
            			$row1->addChild("progress_bar_horizontal_percentage_font_size",$progress_bar_horizontal_percentage_font_size);

                        $progress_bar_horizontal_percentage_color = new QodeField("colorsimple","progress_bar_horizontal_percentage_color","","Text Color","This is some description");
                        $row1->addChild("progress_bar_horizontal_percentage_color",$progress_bar_horizontal_percentage_color);

            			$progress_bar_horizontal_percentage_line_height = new QodeField("textsimple","progress_bar_horizontal_percentage_line_height","","Line Height (px)","This is some description");
            			$row1->addChild("progress_bar_horizontal_percentage_line_height",$progress_bar_horizontal_percentage_line_height);            			

            			$progress_bar_horizontal_percentage_font_family = new QodeField("Fontsimple","progress_bar_horizontal_percentage_font_family","-1","Font Family","This is some description");
            			$row1->addChild("progress_bar_horizontal_percentage_font_family",$progress_bar_horizontal_percentage_font_family);

        		$row2 = new QodeRow(true);
        		$group2->addChild("row2",$row2);

            			$progress_bar_horizontal_percentage_font_style = new QodeField("selectblanksimple","progress_bar_horizontal_percentage_font_style","","Font Style","This is some description",$options_fontstyle);
            			$row2->addChild("progress_bar_horizontal_percentage_font_style",$progress_bar_horizontal_percentage_font_style);

            			$progress_bar_horizontal_percentage_font_weight = new QodeField("selectblanksimple","progress_bar_horizontal_percentage_font_weight","","Font Weight","This is some description",$options_fontweight);
            			$row2->addChild("progress_bar_horizontal_percentage_font_weight",$progress_bar_horizontal_percentage_font_weight);

            			$progress_bar_horizontal_percentage_letter_spacing = new QodeField("textsimple","progress_bar_horizontal_percentage_letter_spacing","","Letter Spacing (px)","This is some description");
            			$row2->addChild("progress_bar_horizontal_percentage_letter_spacing",$progress_bar_horizontal_percentage_letter_spacing);

                        $progress_bar_horizontal_percentage_text_transform = new QodeField("selectblanksimple","progress_bar_horizontal_percentage_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row2->addChild("progress_bar_horizontal_percentage_text_transform",$progress_bar_horizontal_percentage_text_transform);
//Vertical Progress Bars

$panel73 = new QodePanel("Vertical Progress Bars", "vertical_progress_bars_panel");
$elementsPage->addChild("panel73",$panel73);

        $group1 = new QodeGroup("Progress Bar Title Style","Define styles for Vertical Progress Bars title");
        $panel73->addChild("group1",$group1);

                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $progress_bar_vertical_font_size = new QodeField("textsimple","progress_bar_vertical_font_size","","Font Size (px)","This is some description");
                        $row1->addChild("progress_bar_vertical_font_size",$progress_bar_vertical_font_size);

                        $progress_bar_vertical_color = new QodeField("colorsimple","progress_bar_vertical_color","","Text Color","This is some description");
                        $row1->addChild("progress_bar_vertical_color",$progress_bar_vertical_color);

                        $progress_bar_vertical_line_height = new QodeField("textsimple","progress_bar_vertical_line_height","","Line Height (px)","This is some description");
                        $row1->addChild("progress_bar_vertical_line_height",$progress_bar_vertical_line_height);                        

                        $progress_bar_vertical_font_family = new QodeField("Fontsimple","progress_bar_vertical_font_family","-1","Font Family","This is some description");
                        $row1->addChild("progress_bar_vertical_font_family",$progress_bar_vertical_font_family);

                $row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);

                        $progress_bar_vertical_font_style = new QodeField("selectblanksimple","progress_bar_vertical_font_style","","Font Style","This is some description",$options_fontstyle);
                        $row2->addChild("progress_bar_vertical_font_style",$progress_bar_vertical_font_style);

                        $progress_bar_vertical_font_weight = new QodeField("selectblanksimple","progress_bar_vertical_font_weight","","Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("progress_bar_vertical_font_weight",$progress_bar_vertical_font_weight);

                        $progress_bar_vertical_letter_spacing = new QodeField("textsimple","progress_bar_vertical_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row2->addChild("progress_bar_vertical_letter_spacing",$progress_bar_vertical_letter_spacing);

                        $progress_bar_vertical_text_transform = new QodeField("selectblanksimple","progress_bar_vertical_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row2->addChild("progress_bar_vertical_text_transform",$progress_bar_vertical_text_transform);

            $group2 = new QodeGroup("Progress Bar Percentage Style","Define styles for Vertical Progress Bars percentage");
            $panel73->addChild("group2",$group2);

                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $progress_bar_vertical_percentage_font_size = new QodeField("textsimple","progress_bar_vertical_percentage_font_size","","Font Size (px)","This is some description");
                        $row1->addChild("progress_bar_vertical_percentage_font_size",$progress_bar_vertical_percentage_font_size);

                        $progress_bar_vertical_percentage_color = new QodeField("colorsimple","progress_bar_vertical_percentage_color","","Text Color","This is some description");
                        $row1->addChild("progress_bar_vertical_percentage_color",$progress_bar_vertical_percentage_color);

                        $progress_bar_vertical_percentage_line_height = new QodeField("textsimple","progress_bar_vertical_percentage_line_height","","Line Height (px)","This is some description");
                        $row1->addChild("progress_bar_vertical_percentage_line_height",$progress_bar_vertical_percentage_line_height);                        

                        $progress_bar_vertical_percentage_font_family = new QodeField("Fontsimple","progress_bar_vertical_percentage_font_family","-1","Font Family","This is some description");
                        $row1->addChild("progress_bar_vertical_percentage_font_family",$progress_bar_vertical_percentage_font_family);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $progress_bar_vertical_percentage_font_style = new QodeField("selectblanksimple","progress_bar_vertical_percentage_font_style","","Font Style","This is some description",$options_fontstyle);
                        $row2->addChild("progress_bar_vertical_percentage_font_style",$progress_bar_vertical_percentage_font_style);

                        $progress_bar_vertical_percentage_font_weight = new QodeField("selectblanksimple","progress_bar_vertical_percentage_font_weight","","Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("progress_bar_vertical_percentage_font_weight",$progress_bar_vertical_percentage_font_weight);

                        $progress_bar_vertical_percentage_letter_spacing = new QodeField("textsimple","progress_bar_vertical_percentage_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row2->addChild("progress_bar_vertical_percentage_letter_spacing",$progress_bar_vertical_percentage_letter_spacing);

                        $progress_bar_vertical_percentage_text_transform = new QodeField("selectblanksimple","progress_bar_vertical_percentage_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row2->addChild("progress_bar_vertical_percentage_text_transform",$progress_bar_vertical_percentage_text_transform);

//Icon

$panel19 = new QodePanel("Icons", "icons_panel");
$elementsPage->addChild("panel19",$panel19);

        $group1 = new QodeGroup("Normal Icons","Define Normal Icons style");
        $panel19->addChild("group1",$group1);

                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $icon_color_normal = new QodeField("colorsimple","icon_color_normal","","Icon Color","This is some description");
                        $row1->addChild("icon_color_normal",$icon_color_normal);

                        $icon_hover_color_normal = new QodeField("colorsimple","icon_hover_color_normal","","Icon Hover Color","This is some description");
                        $row1->addChild("icon_hover_color_normal",$icon_hover_color_normal);

        $group2 = new QodeGroup("Icons Circle/Square","Define circle/square Icons style");
        $panel19->addChild("group2",$group2);

                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $icon_color = new QodeField("colorsimple","icon_color","","Icon Color","This is some description");
                        $row1->addChild("icon_color",$icon_color);

                        $icon_hover_color = new QodeField("colorsimple","icon_hover_color","","Icon Hover Color","This is some description");
                        $row1->addChild("icon_hover_color",$icon_hover_color);

                        $icon_background_color = new QodeField("colorsimple","icon_background_color","","Icon Background Color","This is some description");
                        $row1->addChild("icon_background_color",$icon_background_color);

                        $icon_hover_background_color = new QodeField("colorsimple","icon_hover_background_color","","Icon Hover Background Color","This is some description");
                        $row1->addChild("icon_hover_background_color",$icon_hover_background_color);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $icon_border_width = new QodeField("textsimple","icon_border_width","","Icon Border Width","This is some description");
                        $row2->addChild("icon_border_width",$icon_border_width);

                        $icon_border_color = new QodeField("colorsimple","icon_border_color","","Icon Border Color","This is some description");
                        $row2->addChild("icon_border_color",$icon_border_color);

                        $icon_hover_border_color = new QodeField("colorsimple","icon_hover_border_color","","Icon Hover Border Color","This is some description");
                        $row2->addChild("icon_hover_border_color",$icon_hover_border_color);


$panel21 = new QodePanel("Icon With Text", "icon_with_text_panel");
$elementsPage->addChild("panel21",$panel21);

        $group1 = new QodeGroup("Normal Icons","Define Normal Icons style");
        $panel21->addChild("group1",$group1);

                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $icon_with_text_icon_color_normal = new QodeField("colorsimple","icon_with_text_icon_color_normal","","Icon Color","This is some description");
                        $row1->addChild("icon_with_text_icon_color_normal",$icon_with_text_icon_color_normal);

                        $icon_with_text_icon_hover_color_normal = new QodeField("colorsimple","icon_with_text_icon_hover_color_normal","","Icon Hover Color","This is some description");
                        $row1->addChild("icon_with_text_icon_hover_color_normal",$icon_with_text_icon_hover_color_normal);

        $group2 = new QodeGroup("Icons Circle/Square","Define circle/square Icons style");
        $panel21->addChild("group2",$group2);

                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $icon_with_text_icon_color = new QodeField("colorsimple","icon_with_text_icon_color","","Icon Color","This is some description");
                        $row1->addChild("icon_with_text_icon_color",$icon_with_text_icon_color);

                        $icon_with_text_icon_hover_color = new QodeField("colorsimple","icon_with_text_icon_hover_color","","Icon Hover Color","This is some description");
                        $row1->addChild("icon_with_text_icon_hover_color",$icon_with_text_icon_hover_color);

                        $icon_with_text_icon_background_color = new QodeField("colorsimple","icon_with_text_icon_background_color","","Icon Background Color","This is some description");
                        $row1->addChild("icon_with_text_icon_background_color",$icon_with_text_icon_background_color);

                        $icon_with_text_icon_hover_background_color = new QodeField("colorsimple","icon_with_text_icon_hover_background_color","","Icon Hover Background Color","This is some description");
                        $row1->addChild("icon_with_text_icon_hover_background_color",$icon_with_text_icon_hover_background_color);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $icon_with_text_icon_border_width = new QodeField("textsimple","icon_with_text_icon_border_width","","Icon Border Width","This is some description");
                        $row2->addChild("icon_with_text_icon_border_width",$icon_with_text_icon_border_width);

                        $icon_with_text_icon_border_color = new QodeField("colorsimple","icon_with_text_icon_border_color","","Icon Border Color","This is some description");
                        $row2->addChild("icon_with_text_icon_border_color",$icon_with_text_icon_border_color);

                        $icon_with_text_icon_hover_border_color = new QodeField("colorsimple","icon_with_text_icon_hover_border_color","","Icon Hover Border Color","This is some description");
                        $row2->addChild("icon_with_text_icon_hover_border_color",$icon_with_text_icon_hover_border_color);


//Input Fields

$panel7 = new QodePanel("Input Fields","input_fields_panel");
$elementsPage->addChild("panel7",$panel7);

        $group1 = new QodeGroup("Input Fields Style","Define styles for Input Fields");
        $panel7->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $input_background_color = new QodeField("colorsimple","input_background_color","","Background Color","This is some description");
                        $row1->addChild("input_background_color",$input_background_color);

                        $input_focus_background_color = new QodeField("colorsimple","input_focus_background_color","","Focus Background Color","This is some description");
                        $row1->addChild("input_focus_background_color",$input_focus_background_color);

                        $input_border_color = new QodeField("colorsimple","input_border_color","","Border Color","This is some description");
                        $row1->addChild("input_border_color",$input_border_color);

                        $input_focus_border_color = new QodeField("colorsimple","input_focus_border_color","","Focus Border Color","This is some description");
                        $row1->addChild("input_focus_border_color",$input_focus_border_color);

                $row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);

                        $input_text_color = new QodeField("colorsimple","input_text_color","","Text Color","This is some description");
                        $row2->addChild("input_text_color",$input_text_color);

                        $input_focus_text_color = new QodeField("colorsimple","input_focus_text_color","","Focus Text Color","This is some description");
                        $row2->addChild("input_focus_text_color",$input_focus_text_color);

//Interactive Banners

$panel71 = new QodePanel("Interactive Banners","interactive_banners_panel");
$elementsPage->addChild("panel71",$panel71);

        $group1 = new QodeGroup("Interactive Banners Style","Define styles for Interactive Banners");
        $panel71->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $interactive_banners_background_color = new QodeField("colorsimple","interactive_banners_background_color","","Image Overlay Color","This is some description");
                        $row1->addChild("interactive_banners_background_color",$interactive_banners_background_color);

                        $interactive_banners_background_transparency = new QodeField("textsimple","interactive_banners_background_transparency","","Image Overlay Color Transparency (0-1)","This is some description");
                        $row1->addChild("interactive_banners_background_transparency",$interactive_banners_background_transparency);

                        $interactive_banners_hover_background_color = new QodeField("colorsimple","interactive_banners_hover_background_color","","Image Overlay Hover Color","This is some description");
                        $row1->addChild("interactive_banners_hover_background_color",$interactive_banners_hover_background_color);

                        $interactive_banners_hover_background_transparency = new QodeField("textsimple","interactive_banners_hover_background_transparency (0-1)","","Image Overlay Hover Color Transparency","This is some description");
                        $row1->addChild("interactive_banners_hover_background_transparency",$interactive_banners_hover_background_transparency);

//Lists

$panel72 = new QodePanel("Lists","lists");
$elementsPage->addChild("panel72",$panel72);

        $group1 = new QodeGroup("Unordered List Style","Define styles for Unordered Lists");
        $panel72->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $list_item_color = new QodeField("colorsimple","list_item_color","","List Bullet Color","This is some description");
                        $row1->addChild("list_item_color",$list_item_color);
				$row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);

                        $list_color = new QodeField("colorsimple","list_color","","Text Color","This is some description");
                        $row2->addChild("list_color",$list_color);

                        $list_fontsize = new QodeField("textsimple","list_fontsize","","Font Size (px)","This is some description");
                        $row2->addChild("list_fontsize",$list_fontsize);

                        $list_lineheight = new QodeField("textsimple","list_lineheight","","Line Height (px)","This is some description");
                        $row2->addChild("list_lineheight",$list_lineheight);

                        $list_texttransform = new QodeField("selectblanksimple","list_texttransform","","Text Transform","This is some description",$options_texttransform);
                        $row2->addChild("list_texttransform",$list_texttransform);

                $row3 = new QodeRow(true);
                $group1->addChild("row3",$row3);
                        $list_google_fonts = new QodeField("Fontsimple","list_google_fonts","-1","Font Family","This is some description");
                        $row3->addChild("list_google_fonts",$list_google_fonts);

                        $list_fontstyle = new QodeField("selectblanksimple","list_fontstyle","","Font Style","This is some description",$options_fontstyle);
                        $row3->addChild("list_fontstyle",$list_fontstyle);

                        $list_fontweight = new QodeField("selectblanksimple","list_fontweight","","Font Weight","This is some description",$options_fontweight);
                        $row3->addChild("list_fontweight",$list_fontweight);

                        $list_letter_spacing = new QodeField("textsimple","list_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row3->addChild("list_letter_spacing",$list_letter_spacing);

		$group2 = new QodeGroup("Ordered List Style","Define styles for Ordered lists");
        $panel72->addChild("group2",$group2);
                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $list_ordered_item_color = new QodeField("colorsimple","list_ordered_item_color","","List Number Color","This is some description");
                        $row1->addChild("list_ordered_item_color",$list_ordered_item_color);
				$row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $list_ordered_color = new QodeField("colorsimple","list_ordered_color","","Text Color","This is some description");
                        $row2->addChild("list_ordered_color",$list_ordered_color);

                        $list_ordered_fontsize = new QodeField("textsimple","list_ordered_fontsize","","Font Size (px)","This is some description");
                        $row2->addChild("list_ordered_fontsize",$list_ordered_fontsize);

                        $list_ordered_lineheight = new QodeField("textsimple","list_ordered_lineheight","","Line Height (px)","This is some description");
                        $row2->addChild("list_ordered_lineheight",$list_ordered_lineheight);

                        $list_ordered_texttransform = new QodeField("selectblanksimple","list_ordered_texttransform","","Text Transform","This is some description",$options_texttransform);
                        $row2->addChild("list_ordered_texttransform",$list_ordered_texttransform);

                $row3 = new QodeRow(true);
                $group2->addChild("row3",$row3);
                        $list_ordered_google_fonts = new QodeField("Fontsimple","list_ordered_google_fonts","-1","Font Family","This is some description");
                        $row3->addChild("list_ordered_google_fonts",$list_ordered_google_fonts);

                        $list_ordered_fontstyle = new QodeField("selectblanksimple","list_ordered_fontstyle","","Font Style","This is some description",$options_fontstyle);
                        $row3->addChild("list_ordered_fontstyle",$list_ordered_fontstyle);

                        $list_ordered_fontweight = new QodeField("selectblanksimple","list_ordered_fontweight","","Font Weight","This is some description",$options_fontweight);
                        $row3->addChild("list_ordered_fontweight",$list_ordered_fontweight);

                        $list_ordered_letter_spacing = new QodeField("textsimple","list_ordered_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row3->addChild("list_ordered_letter_spacing",$list_ordered_letter_spacing);


//Message Boxes

        $panel8 = new QodePanel("Message Boxes", "message_boxes_panel");
        $elementsPage->addChild("panel8",$panel8);

                $group1 = new QodeGroup("Message Box Style","Define Message Box Style");
                $panel8->addChild("group1",$group1);
                        $row1 = new QodeRow();
                        $group1->addChild("row1",$row1);

                                $message_title_color = new QodeField("colorsimple","message_title_color","","Text Color","This is some description");
                                $row1->addChild("message_title_color",$message_title_color);

                                $message_backgroundcolor = new QodeField("colorsimple","message_backgroundcolor","","Background color","This is some description");
                                $row1->addChild("message_backgroundcolor",$message_backgroundcolor);

                        $row2 = new QodeRow(true);
                        $group1->addChild("row2",$row2);

                                $message_title_google_fonts = new QodeField("Fontsimple","message_title_google_fonts","-1","Font Family","This is some description");
                                $row2->addChild("message_title_google_fonts",$message_title_google_fonts);

                                $message_title_fontsize = new QodeField("textsimple","message_title_fontsize","","Font Size (px)","This is some description");
                                $row2->addChild("message_title_fontsize",$message_title_fontsize);

                                $message_title_lineheight = new QodeField("textsimple","message_title_lineheight","","Line Height (px)","This is some description");
                                $row2->addChild("message_title_lineheight",$message_title_lineheight);

                        $row3 = new QodeRow(true);
                        $group1->addChild("row3",$row3);

                                $message_title_fontstyle = new QodeField("selectblanksimple","message_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
                                $row3->addChild("message_title_fontstyle",$message_title_fontstyle);

                                $message_title_fontweight = new QodeField("selectblanksimple","message_title_fontweight","","Font Weight","This is some description",$options_fontweight);
                                $row3->addChild("message_title_fontweight",$message_title_fontweight);

                $group2 = new QodeGroup("Message Box Icon Style","Define styles for Message Box icons");
                $panel8->addChild("group2",$group2);
                        $row1 = new QodeRow();
                        $group2->addChild("row1",$row1);

                                $message_icon_color = new QodeField("colorsimple","message_icon_color","","Icon Color","This is some description");
                                $row1->addChild("message_icon_color",$message_icon_color);

                                $message_icon_fontsize = new QodeField("textsimple","message_icon_fontsize","","Font Size (px)","This is some description");
                                $row1->addChild("message_icon_fontsize",$message_icon_fontsize);

//Pagination

$panel10 = new QodePanel("Pagination","pagination_panel");
$elementsPage->addChild("panel10",$panel10);

$group1 = new QodeGroup("Pagination Style","Define Pagination styles.");
$panel10->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$pagination_color = new QodeField("colorsimple","pagination_color","","Text Color","This is some description");
$row1->addChild("pagination_color",$pagination_color);

$pagination_hover_color = new QodeField("colorsimple","pagination_hover_color","","Hover Text Color","This is some description");
$row1->addChild("pagination_hover_color",$pagination_hover_color);

$pagination_font_size = new QodeField("textsimple","pagination_font_size","","Font Size (px)","This is some description");
$row1->addChild("pagination_font_size",$pagination_font_size);

$pagination_line_height = new QodeField("textsimple","pagination_line_height","","Line Height (px)","This is some description");
$row1->addChild("pagination_line_height",$pagination_line_height);

$row2 = new QodeRow(true);
$group1->addChild("row2",$row2);

$pagination_text_transform = new QodeField("selectblanksimple","pagination_text_transform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("pagination_text_transform",$pagination_text_transform);

$pagination_font_family = new QodeField("Fontsimple","pagination_font_family","-1","Font Family","This is some description");
$row2->addChild("pagination_font_family",$pagination_font_family);

$pagination_font_style = new QodeField("selectblanksimple","pagination_font_style","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("pagination_font_style",$pagination_font_style);

$pagination_font_weight = new QodeField("selectblanksimple","pagination_font_weight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("pagination_font_weight",$pagination_font_weight);

$row3 = new QodeRow(true);
$group1->addChild("row3",$row3);

$pagination_letter_spacing = new QodeField("textsimple","pagination_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("pagination_letter_spacing",$pagination_letter_spacing);

$group2 = new QodeGroup("Portfolio Pagination Style","Define Pagination styles for portfolio single");
$panel10->addChild("group2",$group2);
$row1 = new QodeRow();
$group2->addChild("row1",$row1);

$portfolio_pagination_color = new QodeField("colorsimple","portfolio_pagination_color","","Text Color","This is some description");
$row1->addChild("portfolio_pagination_color",$portfolio_pagination_color);

$portfolio_pagination_hover_color = new QodeField("colorsimple","portfolio_pagination_hover_color","","Hover Text Color","This is some description");
$row1->addChild("portfolio_pagination_hover_color",$portfolio_pagination_hover_color);

$portfolio_pagination_font_size = new QodeField("textsimple","portfolio_pagination_font_size","","Font Size (px)","This is some description");
$row1->addChild("portfolio_pagination_font_size",$portfolio_pagination_font_size);

//Pie Charts

$panel11 = new QodePanel("Pie Charts","pie_charts_panel");
$elementsPage->addChild("panel11",$panel11);

$group1 = new QodeGroup("Pie Chart Text Style","Define text style for Pie Charts");
$panel11->addChild("group1",$group1);
$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$pie_charts_fontsize = new QodeField("textsimple","pie_charts_fontsize","","Font Size (px)","This is some description");
$row1->addChild("pie_charts_fontsize",$pie_charts_fontsize);

$pie_charts_fontweight = new QodeField("selectblanksimple","pie_charts_fontweight","","Text Font Weight","This is some description",$options_fontweight);
$row1->addChild("pie_charts_fontweight",$pie_charts_fontweight);

$pie_charts_margin_below_chart = new QodeField("textsimple","pie_charts_margin_below_chart","","Margin Below Chart (px)","This is some description");
$row1->addChild("pie_charts_margin_below_chart",$pie_charts_margin_below_chart);

//Pricing table

$panel12 = new QodePanel("Pricing Table","pricing_table_panel");
$elementsPage->addChild("panel12",$panel12);

	$group1 = new QodeGroup("Pricing Tables Style","Define Pricing tables style");
	$panel12->addChild("group1",$group1);


		$row1 = new QodeRow();
		$group1->addChild("row1",$row1);

			$pricing_table_title_background_color = new QodeField("colorsimple","pricing_table_title_background_color","","Title Background Color","This is some description");
			$row1->addChild("pricing_table_title_background_color",$pricing_table_title_background_color);

			$pricing_table_title_separator_color = new QodeField("colorsimple","pricing_table_title_separator_color","","Title Separator Color","This is some description");
			$row1->addChild("pricing_table_title_separator_color",$pricing_table_title_separator_color);

			$pricing_table_title_separator_thickness = new QodeField("textsimple","pricing_table_title_separator_thickness","","Title Separator Thickness (px)","This is some description");
			$row1->addChild("pricing_table_title_separator_thickness",$pricing_table_title_separator_thickness);            

        $row2 = new QodeRow(true);
        $group1->addChild("row2",$row2);  
 
            $pricing_table_title_top_padding = new QodeField("textsimple","pricing_table_title_top_padding","","Title Padding Top (px)","This is some description");
            $row2->addChild("pricing_table_title_top_padding",$pricing_table_title_top_padding);

            $pricing_table_title_bottom_padding = new QodeField("textsimple","pricing_table_title_bottom_padding","","Title Padding Bottom (px)","This is some description");
            $row2->addChild("pricing_table_title_bottom_padding",$pricing_table_title_bottom_padding);      

		$row3 = new QodeRow(true);
		$group1->addChild("row3",$row3);

			$pricing_table_price_background_color = new QodeField("colorsimple","pricing_table_price_background_color","","Price Background Color","This is some description");
			$row3->addChild("pricing_table_price_background_color",$pricing_table_price_background_color);

			$pricing_table_price_separator_color = new QodeField("colorsimple","pricing_table_price_separator_color","","Price Separator Color","This is some description");
			$row3->addChild("pricing_table_price_separator_color",$pricing_table_price_separator_color);

			$pricing_table_price_separator_thickness = new QodeField("textsimple","pricing_table_price_separator_thickness","","Price Separator Thickness (px)","This is some description");
			$row3->addChild("pricing_table_price_separator_thickness",$pricing_table_price_separator_thickness);            

        $row4 = new QodeRow(true);
        $group1->addChild("row4",$row4);   

            $pricing_table_price_top_padding = new QodeField("textsimple","pricing_table_price_top_padding","","Price Top Padding (px)","This is some description");
            $row4->addChild("pricing_table_price_top_padding",$pricing_table_price_top_padding);

            $pricing_table_price_bottom_padding = new QodeField("textsimple","pricing_table_price_bottom_padding","","Price Bottom Padding (px)","This is some description");
            $row4->addChild("pricing_table_price_bottom_padding",$pricing_table_price_bottom_padding);


		$row5 = new QodeRow(true);
		$group1->addChild("row5",$row5);

			$pricing_table_background_color = new QodeField("colorsimple","pricing_table_background_color","","Content Background Color","This is some description");
			$row5->addChild("pricing_table_background_color",$pricing_table_background_color);

			$pricing_table_separator_color = new QodeField("colorsimple","pricing_table_separator_color","","Content Separator Color","This is some description");
			$row5->addChild("pricing_table_separator_color",$pricing_table_separator_color);

			$pricing_table_separator_thickness = new QodeField("textsimple","pricing_table_separator_thickness","","Content Separator Thickness (px)","This is some description");
			$row5->addChild("pricing_table_separator_thickness",$pricing_table_separator_thickness);

        $row6 = new QodeRow(true);
        $group1->addChild("row6",$row6);   

            $pricing_table_content_top_padding = new QodeField("textsimple","pricing_table_content_top_padding","","Content Top Padding (px)","This is some description");
            $row6->addChild("pricing_table_content_top_padding",$pricing_table_content_top_padding);

            $pricing_table_content_bottom_padding = new QodeField("textsimple","pricing_table_content_bottom_padding","","Content Bottom Padding (px)","This is some description");
            $row6->addChild("pricing_table_content_bottom_padding",$pricing_table_content_bottom_padding);

        $row7 = new QodeRow(true);
        $group1->addChild("row7",$row7);   

            $pricing_table_button_holder_background_color = new QodeField("colorsimple","pricing_table_button_holder_background_color","","Button Holder Background Color","This is some description");
            $row7->addChild("pricing_table_button_holder_background_color",$pricing_table_button_holder_background_color);

            $pricing_table_button_top_padding = new QodeField("textsimple","pricing_table_button_top_padding","","Button Holder Padding Top(px)","This is some description");
            $row7->addChild("pricing_table_button_top_padding",$pricing_table_button_top_padding);

            $pricing_table_button_bottom_padding = new QodeField("textsimple","pricing_table_button_bottom_padding","","Button Holder Padding Bottom(px)","This is some description");
            $row7->addChild("pricing_table_button_bottom_padding",$pricing_table_button_bottom_padding);          

		$group2 = new QodeGroup("Pricing Tables Active Text","DefinePricing tables active text style.");
		$panel12->addChild("group2",$group2);

			$row1 = new QodeRow();
			$group2->addChild("row1",$row1);

				$pricing_tables_active_text_color = new QodeField("colorsimple","pricing_tables_active_text_color","","Text Color","This is some description");
				$row1->addChild("pricing_tables_active_text_color",$pricing_tables_active_text_color);

				$pricing_tables_active_text_font_size = new QodeField("textsimple","pricing_tables_active_text_font_size","","Font Size (px)","This is some description");
				$row1->addChild("pricing_tables_active_text_font_size",$pricing_tables_active_text_font_size);

				$pricing_tables_active_text_line_height = new QodeField("textsimple","pricing_tables_active_text_line_height","","Line Height (px)","This is some description");
				$row1->addChild("pricing_tables_active_text_line_height",$pricing_tables_active_text_line_height);

				$pricing_tables_active_text_text_transform = new QodeField("selectblanksimple","pricing_tables_active_text_text_transform","","Text Transform","This is some description",$options_texttransform);
				$row1->addChild("pricing_tables_active_text_text_transform",$pricing_tables_active_text_text_transform);

			$row2 = new QodeRow(true);
			$group2->addChild("row2",$row2);

				$pricing_tables_active_text_font_family = new QodeField("Fontsimple","pricing_tables_active_text_font_family","-1","Font Family","This is some description");
				$row2->addChild("pricing_tables_active_text_font_family",$pricing_tables_active_text_font_family);

				$pricing_tables_active_text_font_style = new QodeField("selectblanksimple","pricing_tables_active_text_font_style","","Font Style","This is some description",$options_fontstyle);
				$row2->addChild("pricing_tables_active_text_font_style",$pricing_tables_active_text_font_style);

				$pricing_tables_active_text_font_weight = new QodeField("selectblanksimple","pricing_tables_active_text_font_weight","","Font Weight","This is some description",$options_fontweight);
				$row2->addChild("pricing_tables_active_text_font_weight",$pricing_tables_active_text_font_weight);

				$pricing_tables_active_text_letter_spacing = new QodeField("textsimple","pricing_tables_active_text_letter_spacing","","Letter Spacing (px)","This is some description");
				$row2->addChild("pricing_tables_active_text_letter_spacing",$pricing_tables_active_text_letter_spacing);


		$group3 = new QodeGroup("Pricing Tables Title","Define Pricing tables title style");
		$panel12->addChild("group3",$group3);

			$row1 = new QodeRow();
			$group3->addChild("row1",$row1);

				$pricing_tables_title_color = new QodeField("colorsimple","pricing_tables_title_color","","Text Color","This is some description");
				$row1->addChild("pricing_tables_title_color",$pricing_tables_title_color);

				$pricing_tables_title_font_size = new QodeField("textsimple","pricing_tables_title_font_size","","Font Size (px)","This is some description");
				$row1->addChild("pricing_tables_title_font_size",$pricing_tables_title_font_size);

				$pricing_tables_title_line_height = new QodeField("textsimple","pricing_tables_title_line_height","","Line Height (px)","This is some description");
				$row1->addChild("pricing_tables_title_line_height",$pricing_tables_title_line_height);

				$pricing_tables_title_text_transform = new QodeField("selectblanksimple","pricing_tables_title_text_transform","","Text Transform","This is some description",$options_texttransform);
				$row1->addChild("pricing_tables_title_text_transform",$pricing_tables_title_text_transform);

			$row2 = new QodeRow(true);
			$group3->addChild("row2",$row2);

				$pricing_tables_title_font_family = new QodeField("Fontsimple","pricing_tables_title_font_family","-1","Font Family","This is some description");
				$row2->addChild("pricing_tables_title_font_family",$pricing_tables_title_font_family);

				$pricing_tables_title_font_style = new QodeField("selectblanksimple","pricing_tables_title_font_style","","Font Style","This is some description",$options_fontstyle);
				$row2->addChild("pricing_tables_title_font_style",$pricing_tables_title_font_style);

				$pricing_tables_title_font_weight = new QodeField("selectblanksimple","pricing_tables_title_font_weight","","Font Weight","This is some description",$options_fontweight);
				$row2->addChild("pricing_tables_title_font_weight",$pricing_tables_title_font_weight);

				$pricing_tables_title_letter_spacing = new QodeField("textsimple","pricing_tables_title_letter_spacing","","Letter Spacing (px)","This is some description");
				$row2->addChild("pricing_tables_title_letter_spacing",$pricing_tables_title_letter_spacing);

		$group4 = new QodeGroup("Pricing Tables Period","DefinePricing tables period style");
		$panel12->addChild("group4",$group4);

			$row1 = new QodeRow();
			$group4->addChild("row1",$row1);

				$pricing_tables_period_color = new QodeField("colorsimple","pricing_tables_period_color","","Text Color","This is some description");
				$row1->addChild("pricing_tables_period_color",$pricing_tables_period_color);

				$pricing_tables_period_font_size = new QodeField("textsimple","pricing_tables_period_font_size","","Font Size (px)","This is some description");
				$row1->addChild("pricing_tables_period_font_size",$pricing_tables_period_font_size);

				$pricing_tables_period_line_height = new QodeField("textsimple","pricing_tables_period_line_height","","Line Height (px)","This is some description");
				$row1->addChild("pricing_tables_period_line_height",$pricing_tables_period_line_height);

				$pricing_tables_period_text_transform = new QodeField("selectblanksimple","pricing_tables_period_text_transform","","Text Transform","This is some description",$options_texttransform);
				$row1->addChild("pricing_tables_period_text_transform",$pricing_tables_period_text_transform);

			$row2 = new QodeRow(true);
			$group4->addChild("row2",$row2);

				$pricing_tables_period_font_family = new QodeField("Fontsimple","pricing_tables_period_font_family","-1","Font Family","This is some description");
				$row2->addChild("pricing_tables_period_font_family",$pricing_tables_period_font_family);

				$pricing_tables_period_font_style = new QodeField("selectblanksimple","pricing_tables_period_font_style","","Font Style","This is some description",$options_fontstyle);
				$row2->addChild("pricing_tables_period_font_style",$pricing_tables_period_font_style);

				$pricing_tables_period_font_weight = new QodeField("selectblanksimple","pricing_tables_period_font_weight","","Font Weight","This is some description",$options_fontweight);
				$row2->addChild("pricing_tables_period_font_weight",$pricing_tables_period_font_weight);

				$pricing_tables_period_letter_spacing = new QodeField("textsimple","pricing_tables_period_letter_spacing","","Letter Spacing (px)","This is some description");
				$row2->addChild("pricing_tables_period_letter_spacing",$pricing_tables_period_letter_spacing);

		$group5 = new QodeGroup("Pricing Tables Price","Define Pricing Tables price style");
		$panel12->addChild("group5",$group5);

			$row1 = new QodeRow();
			$group5->addChild("row1",$row1);

				$pricing_tables_price_color = new QodeField("colorsimple","pricing_tables_price_color","","Text Color","This is some description");
				$row1->addChild("pricing_tables_price_color",$pricing_tables_price_color);

				$pricing_tables_price_font_size = new QodeField("textsimple","pricing_tables_price_font_size","","Font Size (px)","This is some description");
				$row1->addChild("pricing_tables_price_font_size",$pricing_tables_price_font_size);

				$pricing_tables_price_line_height = new QodeField("textsimple","pricing_tables_price_line_height","","Line Height (px)","This is some description");
				$row1->addChild("pricing_tables_price_line_height",$pricing_tables_price_line_height);

				$pricing_tables_price_text_transform = new QodeField("selectblanksimple","pricing_tables_price_text_transform","","Text Transform","This is some description",$options_texttransform);
				$row1->addChild("pricing_tables_price_text_transform",$pricing_tables_price_text_transform);

			$row2 = new QodeRow(true);
			$group5->addChild("row2",$row2);

				$pricing_tables_price_font_family = new QodeField("Fontsimple","pricing_tables_price_font_family","-1","Font Family","This is some description");
				$row2->addChild("pricing_tables_price_font_family",$pricing_tables_price_font_family);

				$pricing_tables_price_font_style = new QodeField("selectblanksimple","pricing_tables_price_font_style","","Font Style","This is some description",$options_fontstyle);
				$row2->addChild("pricing_tables_price_font_style",$pricing_tables_price_font_style);

				$pricing_tables_price_font_weight = new QodeField("selectblanksimple","pricing_tables_price_font_weight","","Font Weight","This is some description",$options_fontweight);
				$row2->addChild("pricing_tables_price_font_weight",$pricing_tables_price_font_weight);

				$pricing_tables_price_letter_spacing = new QodeField("textsimple","pricing_tables_price_letter_spacing","","Letter Spacing (px)","This is some description");
				$row2->addChild("pricing_tables_price_letter_spacing",$pricing_tables_price_letter_spacing);

		$group6 = new QodeGroup("Pricing Tables Currency","Define Pricing tables currency style.");
		$panel12->addChild("group6",$group6);
			$row1 = new QodeRow();
			$group6->addChild("row1",$row1);

				$pricing_tables_currency_color = new QodeField("colorsimple","pricing_tables_currency_color","","Text Color","This is some description");
				$row1->addChild("pricing_tables_currency_color",$pricing_tables_currency_color);

				$pricing_tables_currency_font_size = new QodeField("textsimple","pricing_tables_currency_font_size","","Font Size (px)","This is some description");
				$row1->addChild("pricing_tables_currency_font_size",$pricing_tables_currency_font_size);

				$pricing_tables_currency_line_height = new QodeField("textsimple","pricing_tables_currency_line_height","","Line Height (px)","This is some description");
				$row1->addChild("pricing_tables_currency_line_height",$pricing_tables_currency_line_height);

				$pricing_tables_currency_text_transform = new QodeField("selectblanksimple","pricing_tables_currency_text_transform","","Text Transform","This is some description",$options_texttransform);
				$row1->addChild("pricing_tables_currency_text_transform",$pricing_tables_currency_text_transform);

			$row2 = new QodeRow(true);
			$group6->addChild("row2",$row2);

				$pricing_tables_currency_font_family = new QodeField("Fontsimple","pricing_tables_currency_font_family","-1","Font Family","This is some description");
				$row2->addChild("pricing_tables_currency_font_family",$pricing_tables_currency_font_family);

				$pricing_tables_currency_font_style = new QodeField("selectblanksimple","pricing_tables_currency_font_style","","Font Style","This is some description",$options_fontstyle);
				$row2->addChild("pricing_tables_currency_font_style",$pricing_tables_currency_font_style);

				$pricing_tables_currency_font_weight = new QodeField("selectblanksimple","pricing_tables_currency_font_weight","","Font Weight","This is some description",$options_fontweight);
				$row2->addChild("pricing_tables_currency_font_weight",$pricing_tables_currency_font_weight);

				$pricing_tables_currency_letter_spacing = new QodeField("textsimple","pricing_tables_currency_letter_spacing","","Letter Spacing (px)","This is some description");
				$row2->addChild("pricing_tables_currency_letter_spacing",$pricing_tables_currency_letter_spacing);

		$group7 = new QodeGroup("Pricing Tables Button","Define Pricing Tables button style.");
		$panel12->addChild("group7",$group7);

			$row1 = new QodeRow();
			$group7->addChild("row1",$row1);

				$pricing_tables_button_color = new QodeField("colorsimple","pricing_tables_button_color","","Text Color","This is some description");
				$row1->addChild("pricing_tables_button_color",$pricing_tables_button_color);

				$pricing_tables_button_font_size = new QodeField("textsimple","pricing_tables_button_font_size","","Font Size (px)","This is some description");
				$row1->addChild("pricing_tables_button_font_size",$pricing_tables_button_font_size);

				$pricing_tables_button_line_height = new QodeField("textsimple","pricing_tables_button_line_height","","Line Height (px)","This is some description");
				$row1->addChild("pricing_tables_button_line_height",$pricing_tables_button_line_height);

				$pricing_tables_button_text_transform = new QodeField("selectblanksimple","pricing_tables_button_text_transform","","Text Transform","This is some description",$options_texttransform);
				$row1->addChild("pricing_tables_button_text_transform",$pricing_tables_button_text_transform);

			$row2 = new QodeRow(true);
			$group7->addChild("row2",$row2);

				$pricing_tables_button_font_family = new QodeField("Fontsimple","pricing_tables_button_font_family","-1","Font Family","This is some description");
				$row2->addChild("pricing_tables_button_font_family",$pricing_tables_button_font_family);

				$pricing_tables_button_font_style = new QodeField("selectblanksimple","pricing_tables_button_font_style","","Font Style","This is some description",$options_fontstyle);
				$row2->addChild("pricing_tables_button_font_style",$pricing_tables_button_font_style);

				$pricing_tables_button_font_weight = new QodeField("selectblanksimple","pricing_tables_button_font_weight","","Font Weight","This is some description",$options_fontweight);
				$row2->addChild("pricing_tables_button_font_weight",$pricing_tables_button_font_weight);

				$pricing_tables_button_letter_spacing = new QodeField("textsimple","pricing_tables_button_letter_spacing","","Letter Spacing (px)","This is some description");
				$row2->addChild("pricing_tables_button_letter_spacing",$pricing_tables_button_letter_spacing);
			$row3 = new QodeRow(true);
			$group7->addChild("row3",$row3);
					$pricing_tables_button_hovercolor = new QodeField("colorsimple","pricing_tables_button_hovercolor","","Text Hover Color","This is some description");
					$row3->addChild("pricing_tables_button_hovercolor",$pricing_tables_button_hovercolor);

					$pricing_tables_button_backgroundcolor = new QodeField("colorsimple","pricing_tables_button_backgroundcolor","","Background Color","This is some description");
					$row3->addChild("pricing_tables_button_backgroundcolor",$pricing_tables_button_backgroundcolor);

					$pricing_tables_button_backgroundcolor_hover = new QodeField("colorsimple","pricing_tables_button_backgroundcolor_hover","","Background Hover Color","This is some description");
					$row3->addChild("pricing_tables_button_backgroundcolor_hover",$pricing_tables_button_backgroundcolor_hover);					

			$row4 = new QodeRow(true);
			$group7->addChild("row4",$row4);

                    $pricing_tables_button_border_width = new QodeField("textsimple","pricing_tables_button_border_width","","Border Width (px)","This is some description");
                    $row4->addChild("pricing_tables_button_border_width",$pricing_tables_button_border_width);

                    $pricing_tables_button_border_radius = new QodeField("textsimple","pricing_tables_button_border_radius","","Border Radius (px)","This is some description");
                    $row4->addChild("pricing_tables_button_border_radius",$pricing_tables_button_border_radius);

                    $pricing_tables_button_border_color = new QodeField("colorsimple","pricing_tables_button_border_color","","Border Color","This is some description");
                    $row4->addChild("pricing_tables_button_border_color",$pricing_tables_button_border_color);

					$pricing_tables_button_border_hover_color = new QodeField("colorsimple","pricing_tables_button_border_hover_color","","Border Hover Color","This is some description");
					$row4->addChild("pricing_tables_button_border_hover_color",$pricing_tables_button_border_hover_color);

        $group9 = new QodeGroup("Pricing Tables Button Padding","Define Pricing Tables button padding (Takes effect only when pricing table button is set to size normal)");
        $panel12->addChild("group9",$group9);

            $row1 = new QodeRow(true);
            $group9->addChild("row1",$row1);

                    $pricing_table_button_left_padding = new QodeField("textsimple","pricing_table_button_left_padding","","Padding Left (px)","This is some description");
                    $row1->addChild("pricing_table_button_left_padding",$pricing_table_button_left_padding);

                    $pricing_table_button_right_padding = new QodeField("textsimple","pricing_table_button_right_padding","","Padding Right (px)","This is some description");
                    $row1->addChild("pricing_table_button_right_padding",$pricing_table_button_right_padding);

					
		$group8 = new QodeGroup("Pricing Tables Content","Define Pricing Tables content style");
    	$panel12->addChild("group8",$group8);

				$row1 = new QodeRow();
				$group8->addChild("row1",$row1);

						$pricing_tables_content_color = new QodeField("colorsimple","pricing_tables_content_color","","Text Color","This is some description");
						$row1->addChild("pricing_tables_content_color",$pricing_tables_content_color);

						$pricing_tables_content_font_size = new QodeField("textsimple","pricing_tables_content_font_size","","Font Size (px)","This is some description");
						$row1->addChild("pricing_tables_content_font_size",$pricing_tables_content_font_size);

						$pricing_tables_content_line_height = new QodeField("textsimple","pricing_tables_content_line_height","","Line Height (px)","This is some description");
						$row1->addChild("pricing_tables_content_line_height",$pricing_tables_content_line_height);

						$pricing_tables_content_text_transform = new QodeField("selectblanksimple","pricing_tables_content_text_transform","","Text Transform","This is some description",$options_texttransform);
						$row1->addChild("pricing_tables_content_text_transform",$pricing_tables_content_text_transform);

				$row2 = new QodeRow(true);
				$group8->addChild("row2",$row2);

						$pricing_tables_content_font_family = new QodeField("Fontsimple","pricing_tables_content_font_family","-1","Font Family","This is some description");
						$row2->addChild("pricing_tables_content_font_family",$pricing_tables_content_font_family);

						$pricing_tables_content_font_style = new QodeField("selectblanksimple","pricing_tables_content_font_style","","Font Style","This is some description",$options_fontstyle);
						$row2->addChild("pricing_tables_content_font_style",$pricing_tables_content_font_style);

						$pricing_tables_content_font_weight = new QodeField("selectblanksimple","pricing_tables_content_font_weight","","Font Weight","This is some description",$options_fontweight);
						$row2->addChild("pricing_tables_content_font_weight",$pricing_tables_content_font_weight);

						$pricing_tables_content_letter_spacing = new QodeField("textsimple","pricing_tables_content_letter_spacing","","Letter Spacing (px)","This is some description");
						$row2->addChild("pricing_tables_content_letter_spacing",$pricing_tables_content_letter_spacing);


//Service table

	$panel22 = new QodePanel("Service Table","service_table_panel");
	$elementsPage->addChild("panel22",$panel22);

    		$group1 = new QodeGroup("Service Tables Style","Define Service tables style");
    		$panel22->addChild("group1",$group1);

        			$row1 = new QodeRow();
        			$group1->addChild("row1",$row1);

            				$service_table_title_background_color = new QodeField("colorsimple","service_table_title_background_color","","Title Background Color","This is some description");
            				$row1->addChild("service_table_title_background_color",$service_table_title_background_color);

            				$service_table_title_separator_color = new QodeField("colorsimple","service_table_title_separator_color","","Title Separator Color","This is some description");
            				$row1->addChild("service_table_title_separator_color",$service_table_title_separator_color);

            				$service_table_title_separator_thickness = new QodeField("textsimple","service_table_title_separator_thickness","","Title Separator Thickness (px)","This is some description");
            				$row1->addChild("service_table_title_separator_thickness",$service_table_title_separator_thickness);

                    $row2 = new QodeRow();
                    $group1->addChild("row2",$row2);  

                            $service_table_title_padding_top = new QodeField("textsimple","service_table_title_padding_top","","Title Padding Top (px)","This is some description");
                            $row2->addChild("service_table_title_padding_top",$service_table_title_padding_top);

                            $service_table_title_padding_bottom = new QodeField("textsimple","service_table_title_padding_bottom","","Title Padding Bottom (px)","This is some description");
                            $row2->addChild("service_table_title_padding_bottom",$service_table_title_padding_bottom);

        			$row3 = new QodeRow(true);
        			$group1->addChild("row3",$row3);

            				$service_table_background_color = new QodeField("colorsimple","service_table_background_color","","Content Background Color","This is some description");
            				$row3->addChild("service_table_background_color",$service_table_background_color);

            				$service_table_separator_color = new QodeField("colorsimple","service_table_separator_color","","Content Separator Color","This is some description");
            				$row3->addChild("service_table_separator_color",$service_table_separator_color);

            				$service_table_separator_thickness = new QodeField("textsimple","service_table_separator_thickness","","Content Separator Thickness (px)","This is some description");
            				$row3->addChild("service_table_separator_thickness",$service_table_separator_thickness);
				   
					$row4 = new QodeRow();
                    $group1->addChild("row4",$row4);  

                            $service_table_content_padding_top = new QodeField("textsimple","service_table_content_padding_top","","Content Padding Top (px)","This is some description");
                            $row4->addChild("service_table_content_padding_top",$service_table_content_padding_top);

                            $service_table_content_padding_bottom = new QodeField("textsimple","service_table_content_padding_bottom","","Content Padding Bottom (px)","This is some description");
                            $row4->addChild("service_table_content_padding_bottom",$service_table_content_padding_bottom);

    		$group2 = new QodeGroup("Service Tables Active Text","DefineService tables active text style.");
    		$panel22->addChild("group2",$group2);

        			$row1 = new QodeRow();
        			$group2->addChild("row1",$row1);

            				$service_tables_active_text_color = new QodeField("colorsimple","service_tables_active_text_color","","Text Color","This is some description");
            				$row1->addChild("service_tables_active_text_color",$service_tables_active_text_color);

            				$service_tables_active_text_font_size = new QodeField("textsimple","service_tables_active_text_font_size","","Font Size (px)","This is some description");
            				$row1->addChild("service_tables_active_text_font_size",$service_tables_active_text_font_size);

            				$service_tables_active_text_line_height = new QodeField("textsimple","service_tables_active_text_line_height","","Line Height (px)","This is some description");
            				$row1->addChild("service_tables_active_text_line_height",$service_tables_active_text_line_height);

            				$service_tables_active_text_text_transform = new QodeField("selectblanksimple","service_tables_active_text_text_transform","","Text Transform","This is some description",$options_texttransform);
            				$row1->addChild("service_tables_active_text_text_transform",$service_tables_active_text_text_transform);

        			$row2 = new QodeRow(true);
        			$group2->addChild("row2",$row2);

            				$service_tables_active_text_font_family = new QodeField("Fontsimple","service_tables_active_text_font_family","-1","Font Family","This is some description");
            				$row2->addChild("service_tables_active_text_font_family",$service_tables_active_text_font_family);

            				$service_tables_active_text_font_style = new QodeField("selectblanksimple","service_tables_active_text_font_style","","Font Style","This is some description",$options_fontstyle);
            				$row2->addChild("service_tables_active_text_font_style",$service_tables_active_text_font_style);

            				$service_tables_active_text_font_weight = new QodeField("selectblanksimple","service_tables_active_text_font_weight","","Font Weight","This is some description",$options_fontweight);
            				$row2->addChild("service_tables_active_text_font_weight",$service_tables_active_text_font_weight);

            				$service_tables_active_text_letter_spacing = new QodeField("textsimple","service_tables_active_text_letter_spacing","","Letter Spacing (px)","This is some description");
            				$row2->addChild("service_tables_active_text_letter_spacing",$service_tables_active_text_letter_spacing);


    		$group3 = new QodeGroup("Service Tables Title","Define Service tables title style");
    		$panel22->addChild("group3",$group3);

        			$row1 = new QodeRow();
        			$group3->addChild("row1",$row1);

            				$service_tables_title_color = new QodeField("colorsimple","service_tables_title_color","","Text Color","This is some description");
            				$row1->addChild("service_tables_title_color",$service_tables_title_color);

            				$service_tables_title_font_size = new QodeField("textsimple","service_tables_title_font_size","","Font Size (px)","This is some description");
            				$row1->addChild("service_tables_title_font_size",$service_tables_title_font_size);

            				$service_tables_title_line_height = new QodeField("textsimple","service_tables_title_line_height","","Line Height (px)","This is some description");
            				$row1->addChild("service_tables_title_line_height",$service_tables_title_line_height);

            				$service_tables_title_text_transform = new QodeField("selectblanksimple","service_tables_title_text_transform","","Text Transform","This is some description",$options_texttransform);
            				$row1->addChild("service_tables_title_text_transform",$service_tables_title_text_transform);

        			$row2 = new QodeRow(true);
        			$group3->addChild("row2",$row2);

            				$service_tables_title_font_family = new QodeField("Fontsimple","service_tables_title_font_family","-1","Font Family","This is some description");
            				$row2->addChild("service_tables_title_font_family",$service_tables_title_font_family);

            				$service_tables_title_font_style = new QodeField("selectblanksimple","service_tables_title_font_style","","Font Style","This is some description",$options_fontstyle);
            				$row2->addChild("service_tables_title_font_style",$service_tables_title_font_style);

            				$service_tables_title_font_weight = new QodeField("selectblanksimple","service_tables_title_font_weight","","Font Weight","This is some description",$options_fontweight);
            				$row2->addChild("service_tables_title_font_weight",$service_tables_title_font_weight);

            				$service_tables_title_letter_spacing = new QodeField("textsimple","service_tables_title_letter_spacing","","Letter Spacing (px)","This is some description");
            				$row2->addChild("service_tables_title_letter_spacing",$service_tables_title_letter_spacing);

			$group4 = new QodeGroup("Service Tables Content","Define Service tables content style");
    		$panel22->addChild("group4",$group4);

        			$row1 = new QodeRow();
        			$group4->addChild("row1",$row1);

            				$service_tables_content_color = new QodeField("colorsimple","service_tables_content_color","","Text Color","This is some description");
            				$row1->addChild("service_tables_content_color",$service_tables_content_color);

            				$service_tables_content_font_size = new QodeField("textsimple","service_tables_content_font_size","","Font Size (px)","This is some description");
            				$row1->addChild("service_tables_content_font_size",$service_tables_content_font_size);

            				$service_tables_content_line_height = new QodeField("textsimple","service_tables_content_line_height","","Line Height (px)","This is some description");
            				$row1->addChild("service_tables_content_line_height",$service_tables_content_line_height);

            				$service_tables_content_text_transform = new QodeField("selectblanksimple","service_tables_content_text_transform","","Text Transform","This is some description",$options_texttransform);
            				$row1->addChild("service_tables_content_text_transform",$service_tables_content_text_transform);

        			$row2 = new QodeRow(true);
        			$group4->addChild("row2",$row2);

            				$service_tables_content_font_family = new QodeField("Fontsimple","service_tables_content_font_family","-1","Font Family","This is some description");
            				$row2->addChild("service_tables_content_font_family",$service_tables_content_font_family);

            				$service_tables_content_font_style = new QodeField("selectblanksimple","service_tables_content_font_style","","Font Style","This is some description",$options_fontstyle);
            				$row2->addChild("service_tables_content_font_style",$service_tables_content_font_style);

            				$service_tables_content_font_weight = new QodeField("selectblanksimple","service_tables_content_font_weight","","Font Weight","This is some description",$options_fontweight);
            				$row2->addChild("service_tables_content_font_weight",$service_tables_content_font_weight);

            				$service_tables_content_letter_spacing = new QodeField("textsimple","service_tables_content_letter_spacing","","Letter Spacing (px)","This is some description");
            				$row2->addChild("service_tables_content_letter_spacing",$service_tables_content_letter_spacing);

//Separators

$panel13 = new QodePanel("Separators","separators_panel");
$elementsPage->addChild("panel13",$panel13);

        $group1 = new QodeGroup("Normal",'Define styles for separator of type "Normal"');
        $panel13->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $separator_color = new QodeField("colorsimple","separator_color","","Color","This is some description");
                        $row1->addChild("separator_color",$separator_color);

                        $separator_thickness = new QodeField("textsimple","separator_thickness","","Thickness (px)","This is some description");
                        $row1->addChild("separator_thickness",$separator_thickness);


                $row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);

                        $separator_topmargin = new QodeField("textsimple","separator_topmargin","","Top Margin (px)","This is some description");
                        $row2->addChild("separator_topmargin",$separator_topmargin);

                        $separator_bottommargin = new QodeField("textsimple","separator_bottommargin","","Bottom Margin (px)","This is some description");
                        $row2->addChild("separator_bottommargin",$separator_bottommargin);

                        $separator_type = new QodeField("selectsimple","separator_type","","Separator type","", array( "" => "",
                            "solid" => "Solid",
                            "dashed" => "Dashed"
                        ));
                        $row2->addChild("separator_type",$separator_type);

        $group2 = new QodeGroup("Small",'Define styles for separator of type "Small"');
        $panel13->addChild("group2",$group2);
                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $separator_small_color = new QodeField("colorsimple","separator_small_color","","Color","This is some description");
                        $row1->addChild("separator_small_color",$separator_small_color);

                        $separator_small_thickness = new QodeField("textsimple","separator_small_thickness","","Thickness (px)","This is some description");
                        $row1->addChild("separator_small_thickness",$separator_small_thickness);

                        $separator_small_width = new QodeField("textsimple","separator_small_width","","Width (px)","This is some description");
                        $row1->addChild("separator_small_width",$separator_small_width);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $separator_small_topmargin = new QodeField("textsimple","separator_small_topmargin","","Top Margin (px)","This is some description");
                        $row2->addChild("separator_small_topmargin",$separator_small_topmargin);

                        $separator_small_bottommargin = new QodeField("textsimple","separator_small_bottommargin","","Bottom Margin (px)","This is some description");
                        $row2->addChild("separator_small_bottommargin",$separator_small_bottommargin);

                        $separator_small_type = new QodeField("selectsimple","separator_small_type","","Separator type","", array( "" => "",
                            "solid" => "Solid",
                            "dashed" => "Dashed"
                        ));
                        $row2->addChild("separator_small_type",$separator_small_type);


//Separators with text

$panel23 = new QodePanel("Separators with Text","separators_with_text_panel");
$elementsPage->addChild("panel23",$panel23);

$group1 = new QodeGroup("Text Style",'Define text styles for separator with text');
$panel23->addChild("group1",$group1);
$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$separators_with_text_text_color = new QodeField("colorsimple","separators_with_text_text_color","","Text Color","This is some description");
$row1->addChild("separators_with_text_text_color",$separators_with_text_text_color);

$separators_with_text_text_hover_color = new QodeField("colorsimple","separators_with_text_text_hover_color","","Text Hover Color","This is some description");
$row1->addChild("separators_with_text_text_hover_color",$separators_with_text_text_hover_color);

$separators_with_text_text_fontsize = new QodeField("textsimple","separators_with_text_text_fontsize","","Font Size (px)","This is some description");
$row1->addChild("separators_with_text_text_fontsize",$separators_with_text_text_fontsize);

$separators_with_text_text_lineheight = new QodeField("textsimple","separators_with_text_text_lineheight","","Line Height (px)","This is some description");
$row1->addChild("separators_with_text_text_lineheight",$separators_with_text_text_lineheight);

$row2 = new QodeRow(true);
$group1->addChild("row2",$row2);

$separators_with_text_text_texttransform = new QodeField("selectblanksimple","separators_with_text_text_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("separators_with_text_text_texttransform",$separators_with_text_text_texttransform);

$separators_with_text_text_google_fonts = new QodeField("Fontsimple","separators_with_text_text_google_fonts","-1","Font Family","This is some description");
$row2->addChild("separators_with_text_text_google_fonts",$separators_with_text_text_google_fonts);

$separators_with_text_text_fontstyle = new QodeField("selectblanksimple","separators_with_text_text_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("separators_with_text_text_fontstyle",$separators_with_text_text_fontstyle);

$separators_with_text_text_fontweight = new QodeField("selectblanksimple","separators_with_text_text_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("separators_with_text_text_fontweight",$separators_with_text_text_fontweight);

$row3 = new QodeRow(true);
$group1->addChild("row3",$row3);

$separators_with_text_text_letterspacing = new QodeField("textsimple","separators_with_text_text_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("separators_with_text_text_letterspacing",$separators_with_text_text_letterspacing);


$panel24 = new QodePanel("Single Image", "single_image_panel");
$elementsPage->addChild("panel24",$panel24);

    $group1 = new QodeGroup("Hover Style","Define hover style");
    $panel24->addChild("group1",$group1);
        $row1 = new QodeRow();
        $group1->addChild("row1",$row1);

            $single_image_hover_color = new QodeField("colorsimple","single_image_hover_color","", "Background Color","This is some description");
            $row1->addChild("single_image_hover_color",$single_image_hover_color);

            $single_image_hover_transparency = new QodeField("textsimple","single_image_hover_transparency","", "Transparency (0=full - 1=opaque)","This is some description");
            $row1->addChild("single_image_hover_transparency",$single_image_hover_transparency);

//Slider Navigation Interface

$panel9 = new QodePanel("Slider Navigation Interface","navigation_panel");
$elementsPage->addChild("panel9",$panel9);

$navigation_slider_horizontal_section = new QodeTitle("navigation_slider_horizontal_section","Horizontal Sliders");
$panel9->addChild("navigation_slider_horizontal_section",$navigation_slider_horizontal_section);

        $group1 = new QodeGroup("Navigation Button Size","Define navigation button size");
        $panel9->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $navigation_button_width = new QodeField("textsimple","navigation_button_width","","Width (px)","This is some description");
                        $row1->addChild("navigation_button_width",$navigation_button_width);

                        $navigation_button_height = new QodeField("textsimple","navigation_button_height","","Height (px)","This is some description");
                        $row1->addChild("navigation_button_height",$navigation_button_height);

        $group2 = new QodeGroup("Icon Arrow Style","Define arrow navigation style");
        $panel9->addChild("group2",$group2);
                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $navigation_arrow_size = new QodeField("textsimple","navigation_arrow_size","","Arrow Size (px)","Default value is 14    ");
                        $row1->addChild("navigation_arrow_size",$navigation_arrow_size);

                        $navigation_arrows_type = new QodeField("selectblanksimple", "navigation_arrows_type", "", "Arrow Type", "", $options_arrows_type);
                        $row1->addChild("navigation_arrows_type", $navigation_arrows_type);

                        $navigation_arrow_color = new QodeField("colorsimple","navigation_arrow_color","","Arrow Color","This is some description");
                        $row1->addChild("navigation_arrow_color",$navigation_arrow_color);

                        $navigation_arrow_transparency = new QodeField("textsimple","navigation_arrow_transparency","","Arrow Transparency (0-1)","This is some description");
                        $row1->addChild("navigation_arrow_transparency",$navigation_arrow_transparency);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $navigation_arrow_hover_color = new QodeField("colorsimple","navigation_arrow_hover_color","","Arrow Hover Color","This is some description");
                        $row2->addChild("navigation_arrow_hover_color",$navigation_arrow_hover_color);

                        $navigation_arrow_hover_transparency = new QodeField("textsimple","navigation_arrow_hover_transparency","","Arrow Hover Transparency (0-1)","This is some description");
                        $row2->addChild("navigation_arrow_hover_transparency",$navigation_arrow_hover_transparency);

        $group3 = new QodeGroup("Navigation Button Background","Define navigation button background");
        $panel9->addChild("group3",$group3);

                $row1 = new QodeRow();
                $group3->addChild("row1",$row1);

                        $navigation_background_color = new QodeField("colorsimple","navigation_background_color","","Background Color","This is some description");
                        $row1->addChild("navigation_background_color",$navigation_background_color);

                        $navigation_background_transparency = new QodeField("textsimple","navigation_background_transparency","","Background Transparency (0-1)","This is some description");
                        $row1->addChild("navigation_background_transparency",$navigation_background_transparency);

                        $navigation_background_hover_color = new QodeField("colorsimple","navigation_background_hover_color","","Background Hover Color","This is some description");
                        $row1->addChild("navigation_background_hover_color",$navigation_background_hover_color);

                        $navigation_background_hover_transparency = new QodeField("textsimple","navigation_background_hover_transparency","","Background Hover Transparency (0-1)","This is some description");
                        $row1->addChild("navigation_background_hover_transparency",$navigation_background_hover_transparency);

        $group4 = new QodeGroup("Navigation Button Border","Define border style");
        $panel9->addChild("group4",$group4);

                $row1 = new QodeRow();
                $group4->addChild("row1",$row1);

                        $navigation_border_width = new QodeField("textsimple","navigation_border_width","","Border width (px)","");
                        $row1->addChild("navigation_border_width",$navigation_border_width);

                        $navigation_border_radius = new QodeField("textsimple","navigation_border_radius","","Border Radius (px)","This is some description");
                        $row1->addChild("navigation_border_radius",$navigation_border_radius);

                        $navigation_border_color = new QodeField("colorsimple","navigation_border_color","","Border Color","This is some description");
                        $row1->addChild("navigation_border_color",$navigation_border_color);

                        $navigation_border_transparency = new QodeField("textsimple","navigation_border_transparency","","Border Transparency (0-1)","This is some description");
                        $row1->addChild("navigation_border_transparency",$navigation_border_transparency);

                $row2 = new QodeRow(true);
                $group4->addChild("row2",$row2);

                        $navigation_border_hover_color = new QodeField("colorsimple","navigation_border_hover_color","","Border Hover Color","This is some description");
                        $row2->addChild("navigation_border_hover_color",$navigation_border_hover_color);

                        $navigation_border_hover_transparency = new QodeField("textsimple","navigation_border_hover_transparency","","Border Hover Transparency (0-1)","This is some description");
                        $row2->addChild("navigation_border_hover_transparency",$navigation_border_hover_transparency);

        $group8 = new QodeGroup("Flexslider Navigation Controls","Define navigation controls style (only for flexslider gallery)");
        $panel9->addChild("group8",$group8);

                $row1 = new QodeRow();
                $group8->addChild("row1",$row1);

                        $navigation_control_active_color = new QodeField("colorsimple","navigation_control_active_color","","Active Color","This is some description");
                        $row1->addChild("navigation_control_active_color",$navigation_control_active_color);

                        $navigation_control_color = new QodeField("colorsimple","navigation_control_color","","Color","This is some description");
                        $row1->addChild("navigation_control_color",$navigation_control_color);

                        $navigation_control_size = new QodeField("textsimple","navigation_control_size","","Size (px)","This is some description");
                        $row1->addChild("navigation_control_size",$navigation_control_size);

                        $navigation_control_border_radius = new QodeField("textsimple","navigation_control_border_radius","","Border Radius (px)","This is some description");
                        $row1->addChild("navigation_control_border_radius",$navigation_control_border_radius);


$navigation_slider_vertical_section = new QodeTitle("navigation_slider_vertical_section","Vertical Sliders (Full Screen Section Template)");
$panel9->addChild("navigation_slider_vertical_section",$navigation_slider_vertical_section);

        $group6 = new QodeGroup("Navigation Button Size","Define navigation button size");
        $panel9->addChild("group6",$group6);
                $row1 = new QodeRow();
                $group6->addChild("row1",$row1);

                        $fs_navigation_button_width = new QodeField("textsimple","fs_navigation_button_width","","Width (px)","This is some description");
                        $row1->addChild("fs_navigation_button_width",$fs_navigation_button_width);

                        $fs_navigation_button_height = new QodeField("textsimple","fs_navigation_button_height","","Height (px)","This is some description");
                        $row1->addChild("fs_navigation_button_height",$fs_navigation_button_height);

        $group5 = new QodeGroup("Icon Arrow Style","Define arrow navigation style");
        $panel9->addChild("group5",$group5);

                $row1 = new QodeRow();
                $group5->addChild("row1",$row1);

						$fs_navigation_arrow_size = new QodeField("textsimple","fs_navigation_arrow_size","","Icon Arrow Size (px)","Define size for arrow navigation icons");
						$row1->addChild("fs_navigation_arrow_size",$fs_navigation_arrow_size);

                        $fs_navigation_arrow_color = new QodeField("colorsimple","fs_navigation_arrow_color","","Arrow Color","This is some description");
                        $row1->addChild("fs_navigation_arrow_color",$fs_navigation_arrow_color);

                        $fs_navigation_arrow_hover_color = new QodeField("colorsimple","fs_navigation_arrow_hover_color","","Arrow Hover Color","This is some description");
                        $row1->addChild("fs_navigation_arrow_hover_color",$fs_navigation_arrow_hover_color);

        $group7 = new QodeGroup("Navigation Button Background","Define navigation button background");
        $panel9->addChild("group7",$group7);

                $row1 = new QodeRow();
                $group7->addChild("row1",$row1);

                        $fs_navigation_background_color = new QodeField("colorsimple","fs_navigation_background_color","","Background Color","This is some description");
                        $row1->addChild("fs_navigation_background_color",$fs_navigation_background_color);

                        $fs_navigation_background_transparency = new QodeField("textsimple","fs_navigation_background_transparency","","Background Transparency (0-1)","This is some description");
                        $row1->addChild("fs_navigation_background_transparency",$fs_navigation_background_transparency);

                        $fs_navigation_background_hover_color = new QodeField("colorsimple","fs_navigation_background_hover_color","","Background Hover Color","This is some description");
                        $row1->addChild("fs_navigation_background_hover_color",$fs_navigation_background_hover_color);

                        $fs_navigation_background_hover_transparency = new QodeField("textsimple","fs_navigation_background_hover_transparency","","Background Hover Transparency (0-1)","This is some description");
                        $row1->addChild("fs_navigation_background_hover_transparency",$fs_navigation_background_hover_transparency);



//Social Icon

$panel14 = new QodePanel("Social Icon", "social_icon_panel");
$elementsPage->addChild("panel14",$panel14);

        $group1 = new QodeGroup("Normal Icons","Define Normal Social Icons style");
        $panel14->addChild("group1",$group1);
        $row1 = new QodeRow();
        $group1->addChild("row1",$row1);

                $social_color = new QodeField("colorsimple","social_color","","Icon Color","This is some description");
                $row1->addChild("social_color",$social_color);

                        $social_hover_color = new QodeField("colorsimple","social_hover_color","","Icon Hover Color","This is some description");
                        $row1->addChild("social_hover_color",$social_hover_color);

        $group2 = new QodeGroup("Social Circle/Square Icon","Define Social circle/square Icons style");
        $panel14->addChild("group2",$group2);
                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $social_icon_color = new QodeField("colorsimple","social_icon_color","","Icon Color","This is some description");
                        $row1->addChild("social_icon_color",$social_icon_color);

                        $social_icon_hover_color = new QodeField("colorsimple","social_icon_hover_color","","Icon Hover Color","This is some description");
                        $row1->addChild("social_icon_hover_color",$social_icon_hover_color);

                        $social_icon_background_color = new QodeField("colorsimple","social_icon_background_color","","Icon Background Color","This is some description");
                        $row1->addChild("social_icon_background_color",$social_icon_background_color);

                        $social_icon_hover_background_color = new QodeField("colorsimple","social_icon_hover_background_color","","Icon Hover Background Color","This is some description");
                        $row1->addChild("social_icon_hover_background_color",$social_icon_hover_background_color);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $social_icon_border_color = new QodeField("colorsimple","social_icon_border_color","","Icon Border Color","This is some description");
                        $row2->addChild("social_icon_border_color",$social_icon_border_color);

                        $social_icon_hover_border_color = new QodeField("colorsimple","social_icon_hover_border_color","","Icon Hover Border Color","This is some description");
                        $row2->addChild("social_icon_hover_border_color",$social_icon_hover_border_color);

// Social Share List Icon
						
$panel26 = new QodePanel("Social Share List", "social_share_list_icon_panel");
$elementsPage->addChild("panel26",$panel26);

	$group1 = new QodeGroup("Icons","Define Social Icons style for Social Share List");
    $panel26->addChild("group1",$group1);
	$row1 = new QodeRow();
    $group1->addChild("row1",$row1);
	
			$social_share_list_icon_size = new QodeField("textsimple","social_share_list_icon_size","","Icon Size (px)","This is some description");
			$row1->addChild("social_share_list_icon_size",$social_share_list_icon_size);

			$social_share_list_icon_margin_right = new QodeField("textsimple","social_share_list_icon_margin_right","","Margin Right (px)","This is some description");
			$row1->addChild("social_share_list_icon_margin_right",$social_share_list_icon_margin_right);
			
			$social_share_list_icon_color = new QodeField("colorsimple","social_share_list_icon_color","","Icon Color","This is some description");
            $row1->addChild("social_share_list_icon_color",$social_share_list_icon_color);
			
            $social_share_list_icon_hover_color = new QodeField("colorsimple","social_share_list_icon_hover_color","","Icon Hover Color","This is some description");
            $row1->addChild("social_share_list_icon_hover_color",$social_share_list_icon_hover_color);

//Tabs Panel

$panel15 = new QodePanel("Tabs", "tabs_panel");
$elementsPage->addChild("panel15",$panel15);
		

        $tabs_navigation_subtitle = new QodeTitle("tabs_navigation_subtitle", "Tabs Navigation (with Text)");
        $panel15->addChild("tabs_navigation_subtitle", $tabs_navigation_subtitle);

        $group2 = new QodeGroup("Tabs Navigation Text Style","Define Tabs text style");
        $panel15->addChild("group2",$group2);
                
			$row1 = new QodeRow();
			$group2->addChild("row1",$row1);
			
				$tab_text_color = new QodeField("colorsimple","tab_text_color","","Text Color","This is some description");
				$row1->addChild("tab_text_color",$tab_text_color);

				$tab_active_text_color = new QodeField("colorsimple","tab_active_text_color","","Text Active Color","This is some description");
				$row1->addChild("tab_active_text_color",$tab_active_text_color);			

				$tab_text_size = new QodeField("textsimple","tab_text_size","","Text Size (px)","This is some description");
				$row1->addChild("tab_text_size",$tab_text_size);

				$tab_nav_font_family = new QodeField("Fontsimple","tab_nav_font_family","-1","Font Family","This is some description");
				$row1->addChild("tab_nav_font_family",$tab_nav_font_family);				
				
			$row2 = new QodeRow(true);
			$group2->addChild("row2",$row2);	
			
				$tab_text_transform = new QodeField("selectblanksimple","tab_text_transform","","Text Transform","This is some description",$options_texttransform);
				$row2->addChild("tab_text_transform",$tab_text_transform);

				$tab_letter_spacing = new QodeField("textsimple","tab_letter_spacing","","Letter Spacing (px)","This is some description");
				$row2->addChild("tab_letter_spacing",$tab_letter_spacing);

				$tab_font_weight = new QodeField("selectblanksimple","tab_font_weight","","Font Weight","This is some description",$options_fontweight);
				$row2->addChild("tab_font_weight",$tab_font_weight);

				$tab_font_style = new QodeField("selectblanksimple","tab_font_style","","Font Style","This is some description",$options_fontstyle);
				$row2->addChild("tab_font_style",$tab_font_style);

		$tabs_navigation_icon_subtitle = new QodeTitle("tabs_navigation_icon_subtitle", "Tabs Navigation (with Icon)");
		$panel15->addChild("tabs_navigation_icon_subtitle", $tabs_navigation_icon_subtitle);

        $group3 = new QodeGroup("Tabs Navigation Icon Style","Define icon style");
        $panel15->addChild("group3",$group3);
                $row1 = new QodeRow();
                $group3->addChild("row1",$row1);

                        $tabs_icon_size = new QodeField("textsimple","tabs_icon_size","","Icon Size (px)","This is some description");
                        $row1->addChild("tabs_icon_size",$tabs_icon_size);

                        $tab_icon_color = new QodeField("colorsimple","tab_icon_color","","Icon Color","This is some description");
                        $row1->addChild("tab_icon_color",$tab_icon_color);

                        $tab_icon_hover_color = new QodeField("colorsimple","tab_icon_hover_color","","Icon Hover Color","This is some description");
                        $row1->addChild("tab_icon_hover_color",$tab_icon_hover_color);
						
		$tabs_navigation_type_with_lines_subtitle = new QodeTitle("tabs_navigation_type_with_lines_subtitle", "Tabs Navigation (With Lines)");
		$panel15->addChild("tabs_navigation_type_with_lines_subtitle", $tabs_navigation_type_with_lines_subtitle);				

        $group4 = new QodeGroup("Tabs Navigation Style","Define tab style");
        $panel15->addChild("group4",$group4);

                $row1 = new QodeRow(true);
                $group4->addChild("row1",$row1);
				
						$tabs_icon_width = new QodeField("textsimple","tabs_icon_width","","Width (px)","This is some description");
                        $row1->addChild("tabs_icon_width",$tabs_icon_width);

                        $tabs_icon_height = new QodeField("textsimple","tabs_icon_height","","Height (px)","This is some description");
                        $row1->addChild("tabs_icon_height",$tabs_icon_height);

                        $tabs_icon_shape_border_width = new QodeField("textsimple","tabs_icon_shape_border_width","","Spike Length (px)","This is some description");
                        $row1->addChild("tabs_icon_shape_border_width",$tabs_icon_shape_border_width);
                       
						
		$tabs_navigation_boxed_subtitle = new QodeTitle("tabs_navigation_boxed_subtitle", "Tabs Navigation (With Borders)");
		$panel15->addChild("tabs_navigation_boxed_subtitle", $tabs_navigation_boxed_subtitle);	
						
        $group5 = new QodeGroup("Tabs Navigation Size","Define tab size style");
        $panel15->addChild("group5",$group5);

                $row1 = new QodeRow(true);
                $group5->addChild("row1",$row1);

                        $tabs_with_borders_height = new QodeField("textsimple","tabs_with_borders_height","","Height (px)","This is some description");
                        $row1->addChild("tabs_with_borders_height",$tabs_with_borders_height);
						
						$tabs_with_borders_padding_left = new QodeField("textsimple","tabs_with_borders_padding_left","","Padding Left (px)","This is some description");
                        $row1->addChild("tabs_with_borders_padding_left",$tabs_with_borders_padding_left);
						
						$tabs_with_borders_padding_right = new QodeField("textsimple","tabs_with_borders_padding_right","","Padding Right (px)","This is some description");
                        $row1->addChild("tabs_with_borders_padding_right",$tabs_with_borders_padding_right);
						
		$horizontal_tabs_border_arround_element_no_space_horizontal = new QodeTitle("horizontal_tabs_border_arround_element_no_space_horizontal", "Horizontal Tabs - Border Around Tabs (Without Space)");
        $panel15->addChild("horizontal_tabs_border_arround_element_no_space_horizontal", $horizontal_tabs_border_arround_element_no_space_horizontal);				
						
		$group7 = new QodeGroup("Tab Styles","Define tab style");
        $panel15->addChild("group7",$group7);

                $row1 = new QodeRow(true);
                $group7->addChild("row1",$row1);	
				
						$tab_border_arround_element_hor_no_margin_background_color = new QodeField("colorsimple","tab_border_arround_element_hor_no_margin_background_color","","Background Color","This is some description");
                        $row1->addChild("tab_border_arround_element_hor_no_margin_background_color",$tab_border_arround_element_hor_no_margin_background_color);

						$tab_border_arround_element_hor_no_margin_background_color_hover = new QodeField("colorsimple","tab_border_arround_element_hor_no_margin_background_color_hover","","Background Hover/Active Color","This is some description");
                        $row1->addChild("tab_border_arround_element_hor_no_margin_background_color_hover",$tab_border_arround_element_hor_no_margin_background_color_hover);
						
	                    $tab_border_arround_element_hor_no_margin_border_color = new QodeField("colorsimple","tab_border_arround_element_hor_no_margin_border_color","","Border Color","This is some description");
                        $row1->addChild("tab_border_arround_element_hor_no_margin_border_color",$tab_border_arround_element_hor_no_margin_border_color);
						
						$tab_border_arround_element_hor_no_margin_border_hover_color = new QodeField("colorsimple","tab_border_arround_element_hor_no_margin_border_hover_color","","Border Hover/Active Color","This is some description");
                        $row1->addChild("tab_border_arround_element_hor_no_margin_border_hover_color",$tab_border_arround_element_hor_no_margin_border_hover_color);
						
		$group8 = new QodeGroup("Text Styles","Define text styles");
        $panel15->addChild("group8",$group8);

                $row1 = new QodeRow(true);
                $group8->addChild("row1",$row1);	
				
					$tab_border_arround_element_hor_no_margin_text_color = new QodeField("colorsimple","tab_border_arround_element_hor_no_margin_text_color","","Text Color","This is some description");
					$row1->addChild("tab_border_arround_element_hor_no_margin_text_color",$tab_border_arround_element_hor_no_margin_text_color);

					$tab_border_arround_element_hor_no_margin_active_text_color = new QodeField("colorsimple","tab_border_arround_element_hor_no_margin_active_text_color","","Text Active/Hover Color","This is some description");
					$row1->addChild("tab_border_arround_element_hor_no_margin_active_text_color",$tab_border_arround_element_hor_no_margin_active_text_color);	
					
		$horizontal_tabs_border_arround_element_with_space_horizontal = new QodeTitle("horizontal_tabs_border_arround_element_with_space_horizontal", "Horizontal Tabs -  Border Around Tabs (With Space)");
        $panel15->addChild("horizontal_tabs_border_arround_element_with_space_horizontal", $horizontal_tabs_border_arround_element_with_space_horizontal);				
						
		$group9 = new QodeGroup("Tab Styles","Define tab style");
        $panel15->addChild("group9",$group9);

                $row1 = new QodeRow(true);
                $group9->addChild("row1",$row1);	
				
						$tab_border_arround_element_hor_margin_background_color = new QodeField("colorsimple","tab_border_arround_element_hor_margin_background_color","","Background Color","This is some description");
                        $row1->addChild("tab_border_arround_element_hor_margin_background_color",$tab_border_arround_element_hor_margin_background_color);
						
						$tab_border_arround_element_hor_margin_background_hover_color = new QodeField("colorsimple","tab_border_arround_element_hor_margin_background_hover_color","","Background Hover/Active Color","This is some description");
                        $row1->addChild("tab_border_arround_element_hor_margin_background_hover_color",$tab_border_arround_element_hor_margin_background_hover_color);

	                    $tab_border_arround_element_hor_margin_border_color = new QodeField("colorsimple","tab_border_arround_element_hor_margin_border_color","","Border Color","This is some description");
                        $row1->addChild("tab_border_arround_element_hor_margin_border_color",$tab_border_arround_element_hor_margin_border_color);
						
						$tab_border_arround_element_hor_margin_border_hover_color = new QodeField("colorsimple","tab_border_arround_element_hor_margin_border_hover_color","","Border Hover/Active Color","This is some description");
                        $row1->addChild("tab_border_arround_element_hor_margin_border_hover_color",$tab_border_arround_element_hor_margin_border_hover_color);
						
		$group10 = new QodeGroup("Text Styles","Define text styles");
        $panel15->addChild("group10",$group10);

                $row1 = new QodeRow(true);
                $group10->addChild("row1",$row1);	
				
					$tab_border_arround_element_hor_margin_text_color = new QodeField("colorsimple","tab_border_arround_element_hor_margin_text_color","","Text Color","This is some description");
					$row1->addChild("tab_border_arround_element_hor_margin_text_color",$tab_border_arround_element_hor_margin_text_color);

					$tab_border_arround_element_hor_margin_active_text_color = new QodeField("colorsimple","tab_border_arround_element_hor_margin_active_text_color","","Text Active/Hover Color","This is some description");
					$row1->addChild("tab_border_arround_element_hor_margin_active_text_color",$tab_border_arround_element_hor_margin_active_text_color);	
					
		$horizontal_tabs_border_arround_active_tab = new QodeTitle("horizontal_tabs_border_arround_active_tab", "Horizontal Tabs -  Border Around Active Tab");
        $panel15->addChild("horizontal_tabs_border_arround_active_tab", $horizontal_tabs_border_arround_active_tab);			
		
		$group11 = new QodeGroup("Tab Styles","Define tab style");
        $panel15->addChild("group11",$group11);

                $row1 = new QodeRow(true);
                $group11->addChild("row1",$row1);	
				
						$tab_border_arround_active_active_tab_background_color = new QodeField("colorsimple","tab_border_arround_active_active_tab_background_color","","Background Active Color","This is some description");
                        $row1->addChild("tab_border_arround_active_active_tab_background_color",$tab_border_arround_active_active_tab_background_color);									

                        $tab_border_arround_active_background_color_hover = new QodeField("colorsimple","tab_border_arround_active_background_color_hover","","Background Hover Color","This is some description");
                        $row1->addChild("tab_border_arround_active_background_color_hover",$tab_border_arround_active_background_color_hover);
						
	                    $tab_border_arround_active_border_hover_color = new QodeField("colorsimple","tab_border_arround_active_border_hover_color","","Border Hover Color","This is some description");
                        $row1->addChild("tab_border_arround_active_border_hover_color",$tab_border_arround_active_border_hover_color);
									
						$tab_border_arround_active_active_tab_border_hover_color = new QodeField("colorsimple","tab_border_arround_active_active_tab_border_hover_color","","Border Active Color","This is some description");
                        $row1->addChild("tab_border_arround_active_active_tab_border_hover_color",$tab_border_arround_active_active_tab_border_hover_color);
						
		$group12 = new QodeGroup("Text Styles","Define text style");
        $panel15->addChild("group12",$group12);

                $row1 = new QodeRow(true);
                $group12->addChild("row1",$row1);	
				
				$tab_border_arround_active_tab_text_color = new QodeField("colorsimple","tab_border_arround_active_tab_text_color","","Text Color","This is some description");
				$row1->addChild("tab_border_arround_active_tab_text_color",$tab_border_arround_active_tab_text_color);

				$tab_border_arround_active_tab_active_text_color = new QodeField("colorsimple","tab_border_arround_active_tab_active_text_color","","Text Active/Hover Color","This is some description");
				$row1->addChild("tab_border_arround_active_tab_active_text_color",$tab_border_arround_active_tab_active_text_color);
				
					
		$vertical_tabs_border_arround_element = new QodeTitle("vertical_tabs_border_arround_element", "Vertical Tabs -  Border Around Tabs");
        $panel15->addChild("vertical_tabs_border_arround_element", $vertical_tabs_border_arround_element);		
						
		$group13 = new QodeGroup("Tab Styles","Define tab style");
        $panel15->addChild("group13",$group13);

                $row1 = new QodeRow(true);
                $group13->addChild("row1",$row1);	
				
						$vertical_tab_border_arround_element_background_color = new QodeField("colorsimple","vertical_tab_border_arround_element_background_color","","Background Color","This is some description");
                        $row1->addChild("vertical_tab_border_arround_element_background_color",$vertical_tab_border_arround_element_background_color);
						
						$vertical_tab_border_arround_element_background_color_hover = new QodeField("colorsimple","vertical_tab_border_arround_element_background_color_hover","","Background Active/HoverColor","This is some description");
                        $row1->addChild("vertical_tab_border_arround_element_background_color_hover",$vertical_tab_border_arround_element_background_color_hover);
						
	                    $vertical_tab_border_arround_element_border_color = new QodeField("colorsimple","vertical_tab_border_arround_element_border_color","","Border Color","This is some description");
                        $row1->addChild("vertical_tab_border_arround_element_border_color",$vertical_tab_border_arround_element_border_color);
						
						$vertical_tab_border_arround_element_border_color_hover = new QodeField("colorsimple","vertical_tab_border_arround_element_border_color_hover","","Border Hover Color","This is some description");
                        $row1->addChild("vertical_tab_border_arround_element_border_color_hover",$vertical_tab_border_arround_element_border_color_hover);
						
		$group14 = new QodeGroup("Text Styles","Define text style");
        $panel15->addChild("group14",$group14);

                $row1 = new QodeRow(true);
                $group14->addChild("row1",$row1);	
				
					$vertical_tab_border_arround_element_text_color = new QodeField("colorsimple","vertical_tab_border_arround_element_text_color","","Text Color","This is some description");
					$row1->addChild("vertical_tab_border_arround_element_text_color",$vertical_tab_border_arround_element_text_color);

					$vertical_tab_border_arround_element_active_text_color = new QodeField("colorsimple","vertical_tab_border_arround_element_active_text_color","","Text Active/Hover Color","This is some description");
					$row1->addChild("vertical_tab_border_arround_element_active_text_color",$vertical_tab_border_arround_element_active_text_color);
					
		$vertical_tabs_border_arround_active_tab = new QodeTitle("vertical_tabs_border_arround_active_tab", "Vertical Tabs -  Border Around Active Tab");
        $panel15->addChild("vertical_tabs_border_arround_active_tab", $vertical_tabs_border_arround_active_tab);				
						
		$group15 = new QodeGroup("Tab Styles","Define tab style");
        $panel15->addChild("group15",$group15);

                $row1 = new QodeRow(true);
                $group15->addChild("row1",$row1);	
				
						$vertical_tab_border_arround_active_active_tab_background_color = new QodeField("colorsimple","vertical_tab_border_arround_active_active_tab_background_color","","Background Active Color","This is some description");
                        $row1->addChild("vertical_tab_border_arround_active_active_tab_background_color",$vertical_tab_border_arround_active_active_tab_background_color);
						
						$vertical_tab_border_arround_active_tab_background_color_hover = new QodeField("colorsimple","vertical_tab_border_arround_active_tab_background_color_hover","","Background HoverColor","This is some description");
                        $row1->addChild("vertical_tab_border_arround_active_tab_background_color_hover",$vertical_tab_border_arround_active_tab_background_color_hover);
						
	                    $vertical_tab_border_arround_active_border_color = new QodeField("colorsimple","vertical_tab_border_arround_active_border_color","","Border Active Color","This is some description");
                        $row1->addChild("vertical_tab_border_arround_active_border_color",$vertical_tab_border_arround_active_border_color);
												
						$vertical_tab_border_arround_active_border_color_hover = new QodeField("colorsimple","vertical_tab_border_arround_active_border_color_hover","","Border Hover Color","This is some description");
                        $row1->addChild("vertical_tab_border_arround_active_border_color_hover",$vertical_tab_border_arround_active_border_color_hover);
						
		$group16 = new QodeGroup("Text Styles","Define text style");
		$panel15->addChild("group16",$group16);	
		
			$row1 = new QodeRow(true);
            $group16->addChild("row1",$row1);
		
					$vertical_tab_border_arround_active_tab_text_color = new QodeField("colorsimple","vertical_tab_border_arround_active_tab_text_color","","Text Color","This is some description");
					$row1->addChild("vertical_tab_border_arround_active_tab_text_color",$vertical_tab_border_arround_active_tab_text_color);

					$vertical_tab_border_arround_active_tab_active_text_color = new QodeField("colorsimple","vertical_tab_border_arround_active_tab_active_text_color","","Text Active/Hover Color","This is some description");
					$row1->addChild("vertical_tab_border_arround_active_tab_active_text_color",$vertical_tab_border_arround_active_tab_active_text_color);

        $tabs_content_horizontal_subtitle = new QodeTitle("tabs_content_horizontal_subtitle", "Horizontal Tabs Content");
        $panel15->addChild("tabs_content_horizontal_subtitle", $tabs_content_horizontal_subtitle);
		
		$group17 = new QodeGroup("Tabs Content Styles","Define tab content style");
        $panel15->addChild("group17",$group17);
		
				$row1 = new QodeRow(true);
                $group17->addChild("row1",$row1);

					$tabs_content_text_size = new QodeField("textsimple","tabs_content_text_size","","Tabs Content Text Size (px)","Enter size for text in tab containers", array(), array("col_width" => 3));
					$row1->addChild("tabs_content_text_size",$tabs_content_text_size);

					$tabs_content_background_color = new QodeField("colorsimple","tabs_content_background_color","","Tab Content Background","Choose color for tab background");
					$row1->addChild("tabs_content_background_color",$tabs_content_background_color);
					
		$group18 = new QodeGroup("Content Padding","Define tab content padding");
        $panel15->addChild("group18",$group18);
		
			$row1 = new QodeRow(true);
            $group18->addChild("row1",$row1);

					$tabs_content_padding_left = new QodeField("textsimple","tabs_content_padding_left","","Padding Left (px)","This is some description");
					$row1->addChild("tabs_content_padding_left",$tabs_content_padding_left);

					$tabs_content_padding_right = new QodeField("textsimple","tabs_content_padding_right","","Padding Right (px)","This is some description");
					$row1->addChild("tabs_content_padding_right",$tabs_content_padding_right);					
								
					$tabs_content_padding_top = new QodeField("textsimple","tabs_content_padding_top","","Padding Top (px)","This is some description");
					$row1->addChild("tabs_content_padding_top",$tabs_content_padding_top);
					
					$tabs_content_padding_bottom = new QodeField("textsimple","tabs_content_padding_bottom","","Padding Bottom (px)","This is some description");
					$row1->addChild("tabs_content_padding_bottom",$tabs_content_padding_bottom);
					
		$tabs_vertical_content_subtitle = new QodeTitle("tabs_vertical_content_subtitle", "Vertical Tabs Content");
        $panel15->addChild("tabs_vertical_content_subtitle", $tabs_vertical_content_subtitle);
					
		$group19 = new QodeGroup("Tabs Content Styles","Define tab content style");
        $panel15->addChild("group19",$group19);
		
				$row1 = new QodeRow(true);
                $group19->addChild("row1",$row1);

					$tabs_vertical_content_text_size = new QodeField("textsimple","tabs_vertical_content_text_size","","Tabs Content Text Size (px)","Enter size for text in tab containers", array(), array("col_width" => 3));
					$row1->addChild("tabs_vertical_content_text_size",$tabs_vertical_content_text_size);

					$tabs_vertical_content_background_color = new QodeField("colorsimple","tabs_vertical_content_background_color","","Tab Content Background","Choose color for tab background");
					$row1->addChild("tabs_vertical_content_background_color",$tabs_vertical_content_background_color);			
					
		$group20 = new QodeGroup("Content Padding","Define tab content padding");
        $panel15->addChild("group20",$group20);
		
			$row1 = new QodeRow(true);
            $group20->addChild("row1",$row1);

					$tabs_vertical_content_padding_left = new QodeField("textsimple","tabs_vertical_content_padding_left","","Padding Left (px)","This is some description");
					$row1->addChild("tabs_vertical_content_padding_left",$tabs_vertical_content_padding_left);

					$tabs_vertical_content_padding_right = new QodeField("textsimple","tabs_vertical_content_padding_right","","Padding Right (px)","This is some description");
					$row1->addChild("tabs_vertical_content_padding_right",$tabs_vertical_content_padding_right);					
								
					$tabs_vertical_content_padding_top = new QodeField("textsimple","tabs_vertical_content_padding_top","","Padding Top (px)","This is some description");
					$row1->addChild("tabs_vertical_content_padding_top",$tabs_vertical_content_padding_top);
					
					$tabs_vertical_content_padding_bottom = new QodeField("textsimple","tabs_vertical_content_padding_bottom","","Padding Bottom (px)","This is some description");
					$row1->addChild("tabs_vertical_content_padding_bottom",$tabs_vertical_content_padding_bottom);			

//Tags

$panel18 = new QodePanel("Tags", "tags_panel");
$elementsPage->addChild("panel18",$panel18);

        $group1 = new QodeGroup("Tags Style","Define Tags style");
        $panel18->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $tags_color = new QodeField("colorsimple","tags_color","","Text Color","This is some description");
                        $row1->addChild("tags_color",$tags_color);

                        $tags_font_size = new QodeField("textsimple","tags_font_size","","Font Size (px)","This is some description");
                        $row1->addChild("tags_font_size",$tags_font_size);

                        $tags_line_height = new QodeField("textsimple","tags_line_height","","Line Height (px)","This is some description");
                        $row1->addChild("tags_line_height",$tags_line_height);

                        $tags_text_transform = new QodeField("selectblanksimple","tags_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row1->addChild("tags_text_transform",$tags_text_transform);

                $row2 = new QodeRow(true);
                $group1->addChild("row2",$row2);

                        $tags_font_family = new QodeField("Fontsimple","tags_font_family","-1","Font Family","This is some description");
                        $row2->addChild("tags_font_family",$tags_font_family);

                        $tags_font_style = new QodeField("selectblanksimple","tags_font_style","","Font Style","This is some description",$options_fontstyle);
                        $row2->addChild("tags_font_style",$tags_font_style);

                        $tags_font_weight = new QodeField("selectblanksimple","tags_font_weight","","Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("tags_font_weight",$tags_font_weight);

                        $tags_letter_spacing = new QodeField("textsimple","tags_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row2->addChild("tags_letter_spacing",$tags_letter_spacing);

                $row3 = new QodeRow(true);
                $group1->addChild("row3",$row3);

                        $tags_hover_color = new QodeField("colorsimple","tags_hover_color","","Hover Text Color","This is some description");
                        $row3->addChild("tags_hover_color",$tags_hover_color);

                        $tags_background_color = new QodeField("colorsimple","tags_background_color","","Background color","This is some description");
                        $row3->addChild("tags_background_color",$tags_background_color);

                        $tags_background_hover_color = new QodeField("colorsimple","tags_background_hover_color","","Hover background color","This is some description");
                        $row3->addChild("tags_background_hover_color",$tags_background_hover_color);

                        $tags_border_radius = new QodeField("textsimple","tags_border_radius","","Border Radius (px)","This is some description");
                        $row3->addChild("tags_border_radius",$tags_border_radius);

                $row4 = new QodeRow(true);
                $group1->addChild("row4",$row4);

                        $tags_border_color = new QodeField("colorsimple","tags_border_color","","Border Color","This is some description");
                        $row4->addChild("tags_border_color",$tags_border_color);

                        $tags_border_hover_color = new QodeField("colorsimple","tags_border_hover_color","","Border Hover Color","This is some description");
                        $row4->addChild("tags_border_hover_color",$tags_border_hover_color);

                        $tags_border_width = new QodeField("textsimple","tags_border_width","","Border Width (px)","This is some description");
                        $row4->addChild("tags_border_width",$tags_border_width);


//Team

$panel20 = new QodePanel("Team", "team_panel");
$elementsPage->addChild("panel20",$panel20);

        $group1 = new QodeGroup("Team Image Hover Color Overlay","Choose team image hover color overlay");
        $panel20->addChild("group1",$group1);
                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);
                            $team_hover_color = new QodeField("colorsimple","team_hover_color","","","This is some description");
                            $row1->addChild("team_hover_color",$team_hover_color);


        $group2 = new QodeGroup("Team Member Name","Define styles for team member name");
        $panel20->addChild("group2",$group2);
                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $team_color = new QodeField("colorsimple","team_color","","Text Color","This is some description");
                        $row1->addChild("team_color",$team_color);

                        $team_font_size = new QodeField("textsimple","team_font_size","","Font Size (px)","This is some description");
                        $row1->addChild("team_font_size",$team_font_size);

                        $team_line_height = new QodeField("textsimple","team_line_height","","Line Height (px)","This is some description");
                        $row1->addChild("team_line_height",$team_line_height);

                        $team_text_transform = new QodeField("selectblanksimple","team_text_transform","","Text Transform","This is some description",$options_texttransform);
                        $row1->addChild("team_text_transform",$team_text_transform);

                $row2 = new QodeRow(true);
                $group2->addChild("row2",$row2);

                        $team_font_family = new QodeField("Fontsimple","team_font_family","-1","Font Family","This is some description");
                        $row2->addChild("team_font_family",$team_font_family);

                        $team_font_style = new QodeField("selectblanksimple","team_font_style","","Font Style","This is some description",$options_fontstyle);
                        $row2->addChild("team_font_style",$team_font_style);

                        $team_font_weight = new QodeField("selectblanksimple","team_font_weight","","Font Weight","This is some description",$options_fontweight);
                        $row2->addChild("team_font_weight",$team_font_weight);

                        $team_letter_spacing = new QodeField("textsimple","team_letter_spacing","","Letter Spacing (px)","This is some description");
                        $row2->addChild("team_letter_spacing",$team_letter_spacing);

        $group3 = new QodeGroup("Social Icons","Define Social Icons style");
        $panel20->addChild("group3",$group3);
                $row1 = new QodeRow();
                $group3->addChild("row1",$row1);

                        $team_icon_color = new QodeField("colorsimple","team_icon_color","","Icon Color","This is some description");
                        $row1->addChild("team_icon_color",$team_icon_color);

                        $team_icon_hover_color = new QodeField("colorsimple","team_icon_hover_color","","Icon Hover Color","This is some description");
                        $row1->addChild("team_icon_hover_color",$team_icon_hover_color);

                        $team_icon_background_color = new QodeField("colorsimple","team_icon_background_color","","Icon Background Color","This is some description");
                        $row1->addChild("team_icon_background_color",$team_icon_background_color);

                        $team_icon_hover_background_color = new QodeField("colorsimple","team_icon_hover_background_color","","Icon Hover Background Color","This is some description");
                        $row1->addChild("team_icon_hover_background_color",$team_icon_hover_background_color);

                $row2 = new QodeRow(true);
                $group3->addChild("row2",$row2);

                        $team_icon_border_color = new QodeField("colorsimple","team_icon_border_color","","Icon Border Color","This is some description");
                        $row2->addChild("team_icon_border_color",$team_icon_border_color);

                        $team_icon_hover_border_color = new QodeField("colorsimple","team_icon_hover_border_color","","Icon Hover Border Color","This is some description");
                        $row2->addChild("team_icon_hover_border_color",$team_icon_hover_border_color);

                        $team_icon_size = new QodeField("textsimple","team_icon_size","","Icon Size (px)","This is some description");
                        $row2->addChild("team_icon_size",$team_icon_size);

                        $team_icon_shape_size = new QodeField("textsimple","team_icon_shape_size","","Shape Size (px)","This is some description");
                        $row2->addChild("team_icon_shape_size",$team_icon_shape_size);

                $row3 = new QodeRow(true);
                $group3->addChild("row3",$row3);

                        $team_icon_space = new QodeField("textsimple","team_icon_space","","Space between Icons (px)","This is some description");
                        $row3->addChild("team_icon_space",$team_icon_space);

$main_info_below_image_subtitle = new QodeTitle("main_info_below_image_subtitle", "Main Info Below Image - Type");
$panel20->addChild("main_info_below_image_subtitle", $main_info_below_image_subtitle);

		$group4 = new QodeGroup("Share Icon","Define Share Icon style. This applies only if Between Image and Info is selected for Social Style");
		$panel20->addChild("group4",$group4);
				$row1 = new QodeRow();
				$group4->addChild("row1",$row1);

						$team_share_icon_color = new QodeField("colorsimple","team_share_icon_color","","Icon Color","This is some description");
						$row1->addChild("team_share_icon_color",$team_share_icon_color);

						$team_share_icon_hover_color = new QodeField("colorsimple","team_share_icon_hover_color","","Icon Hover Color","This is some description");
						$row1->addChild("team_share_icon_hover_color",$team_share_icon_hover_color);

						$team_share_icon_background_color = new QodeField("colorsimple","team_share_icon_background_color","","Icon Background Color","This is some description");
						$row1->addChild("team_share_icon_background_color",$team_share_icon_background_color);

						$team_share_icon_hover_background_color = new QodeField("colorsimple","team_share_icon_hover_background_color","","Icon Hover Background Color","This is some description");
						$row1->addChild("team_share_icon_hover_background_color",$team_share_icon_hover_background_color);

				$row2 = new QodeRow(true);
				$group4->addChild("row2",$row2);

						$team_share_icon_border_color = new QodeField("colorsimple","team_share_icon_border_color","","Icon Border Color","This is some description");
						$row2->addChild("team_share_icon_border_color",$team_share_icon_border_color);

						$team_share_icon_hover_border_color = new QodeField("colorsimple","team_share_icon_hover_border_color","","Icon Hover Border Color","This is some description");
						$row2->addChild("team_share_icon_hover_border_color",$team_share_icon_hover_border_color);

						$team_share_icon_size = new QodeField("textsimple","team_share_icon_size","","Icon Size (px)","This is some description");
						$row2->addChild("team_share_icon_size",$team_share_icon_size);

						$team_share_icon_shape_size = new QodeField("textsimple","team_share_icon_shape_size","","Shape Size (px)","This is some description");
						$row2->addChild("team_share_icon_shape_size",$team_share_icon_shape_size);


//Testimonials

$panel16 = new QodePanel("Testimonials","testimonials_panel");
$elementsPage->addChild("panel16",$panel16);

$group4 = new QodeGroup("Testimonials Title","Define Testimonials title style");
$panel16->addChild("group4",$group4);
    $row1 = new QodeRow();
    $group4->addChild("row1",$row1);

        $testimonials_title_color = new QodeField("colorsimple","testimonials_title_color","","Text Color","This is some description");
        $row1->addChild("testimonials_title_color",$testimonials_title_color);

        $testimonials_title_font_size = new QodeField("textsimple","testimonials_title_font_size","","Font Size (px)","This is some description");
        $row1->addChild("testimonials_title_font_size",$testimonials_title_font_size);

        $testimonials_title_line_height = new QodeField("textsimple","testimonials_title_line_height","","Line Height (px)","This is some description");
        $row1->addChild("testimonials_title_line_height",$testimonials_title_line_height);

        $testimonials_title_text_transform = new QodeField("selectblanksimple","testimonials_title_text_transform","","Text Transform","This is some description",$options_texttransform);
        $row1->addChild("testimonials_title_text_transform",$testimonials_title_text_transform);

    $row2 = new QodeRow(true);
    $group4->addChild("row2",$row2);

        $testimonials_title_font_family = new QodeField("Fontsimple","testimonials_title_font_family","-1","Font Family","This is some description");
        $row2->addChild("testimonials_title_font_family",$testimonials_title_font_family);

        $testimonials_title_font_style = new QodeField("selectblanksimple","testimonials_title_font_style","","Font Style","This is some description",$options_fontstyle);
        $row2->addChild("testimonials_title_font_style",$testimonials_title_font_style);

        $testimonials_title_font_weight = new QodeField("selectblanksimple","testimonials_title_font_weight","","Font Weight","This is some description",$options_fontweight);
        $row2->addChild("testimonials_title_font_weight",$testimonials_title_font_weight);

        $testimonials_title_letter_spacing = new QodeField("textsimple","testimonials_title_letter_spacing","","Letter Spacing (px)","This is some description");
        $row2->addChild("testimonials_title_letter_spacing",$testimonials_title_letter_spacing);

$group1 = new QodeGroup("Testimonials Text","Define Testimonials text style");
$panel16->addChild("group1",$group1);
    $row1 = new QodeRow();
    $group1->addChild("row1",$row1);

        $testimonials_text_color = new QodeField("colorsimple","testimonials_text_color","","Text Color","This is some description");
        $row1->addChild("testimonials_text_color",$testimonials_text_color);

        $testimonials_text_font_size = new QodeField("textsimple","testimonials_text_font_size","","Font Size (px)","This is some description");
        $row1->addChild("testimonials_text_font_size",$testimonials_text_font_size);

        $testimonials_text_line_height = new QodeField("textsimple","testimonials_text_line_height","","Line Height (px)","This is some description");
        $row1->addChild("testimonials_text_line_height",$testimonials_text_line_height);

        $testimonials_text_text_transform = new QodeField("selectblanksimple","testimonials_text_text_transform","","Text Transform","This is some description",$options_texttransform);
        $row1->addChild("testimonials_text_text_transform",$testimonials_text_text_transform);

    $row2 = new QodeRow(true);
    $group1->addChild("row2",$row2);

        $testimonials_text_font_family = new QodeField("Fontsimple","testimonials_text_font_family","-1","Font Family","This is some description");
        $row2->addChild("testimonials_text_font_family",$testimonials_text_font_family);

        $testimonials_text_font_style = new QodeField("selectblanksimple","testimonials_text_font_style","","Font Style","This is some description",$options_fontstyle);
        $row2->addChild("testimonials_text_font_style",$testimonials_text_font_style);

        $testimonials_text_font_weight = new QodeField("selectblanksimple","testimonials_text_font_weight","","Font Weight","This is some description",$options_fontweight);
        $row2->addChild("testimonials_text_font_weight",$testimonials_text_font_weight);

        $testimonials_text_letter_spacing = new QodeField("textsimple","testimonials_text_letter_spacing","","Letter Spacing (px)","This is some description");
        $row2->addChild("testimonials_text_letter_spacing",$testimonials_text_letter_spacing);

$group2 = new QodeGroup("Testimonials Author Style","Define Testimonials author style");
$panel16->addChild("group2",$group2);
    $row1 = new QodeRow();
    $group2->addChild("row1",$row1);

        $testimonials_author_color = new QodeField("colorsimple","testimonials_author_color","","Text Color","This is some description");
        $row1->addChild("testimonials_author_color",$testimonials_author_color);

        $testimonials_author_font_size = new QodeField("textsimple","testimonials_author_font_size","","Font Size (px)","This is some description");
        $row1->addChild("testimonials_author_font_size",$testimonials_author_font_size);

        $testimonials_author_line_height = new QodeField("textsimple","testimonials_author_line_height","","Line Height (px)","This is some description");
        $row1->addChild("testimonials_author_line_height",$testimonials_author_line_height);

        $testimonials_author_text_transform = new QodeField("selectblanksimple","testimonials_author_text_transform","","Text Transform","This is some description",$options_texttransform);
        $row1->addChild("testimonials_author_text_transform",$testimonials_author_text_transform);

    $row2 = new QodeRow(true);
    $group2->addChild("row2",$row2);

        $testimonials_author_font_family = new QodeField("Fontsimple","testimonials_author_font_family","-1","Font Family","This is some description");
        $row2->addChild("testimonials_author_font_family",$testimonials_author_font_family);

        $testimonials_author_font_style = new QodeField("selectblanksimple","testimonials_author_font_style","","Font Style","This is some description",$options_fontstyle);
        $row2->addChild("testimonials_author_font_style",$testimonials_author_font_style);

        $testimonials_author_font_weight = new QodeField("selectblanksimple","testimonials_author_font_weight","","Font Weight","This is some description",$options_fontweight);
        $row2->addChild("testimonials_author_font_weight",$testimonials_author_font_weight);

        $testimonials_author_letter_spacing = new QodeField("textsimple","testimonials_author_letter_spacing","","Letter Spacing (px)","This is some description");
        $row2->addChild("testimonials_author_letter_spacing",$testimonials_author_letter_spacing);

$group6 = new QodeGroup("Testimonials Job Position Style","Define testimonials job position author style");
$panel16->addChild("group6",$group6);
    $row1 = new QodeRow();
    $group6->addChild("row1",$row1);
        
        $testimonials_author_job_position_color = new QodeField("colorsimple","testimonials_author_job_position_color","","Text Color","This is some description");
        $row1->addChild("testimonials_author_job_position_color",$testimonials_author_job_position_color);
        
        $testimonials_author_job_position_font_size = new QodeField("textsimple","testimonials_author_job_position_font_size","","Font Size (px)","This is some description");
        $row1->addChild("testimonials_author_job_position_font_size",$testimonials_author_job_position_font_size);
        
        $testimonials_author_job_position_line_height = new QodeField("textsimple","testimonials_author_job_position_line_height","","Line Height (px)","This is some description");
        $row1->addChild("testimonials_author_job_position_line_height",$testimonials_author_job_position_line_height);
        
        $testimonials_author_job_position_text_transform = new QodeField("selectblanksimple","testimonials_author_job_position_text_transform","","Text Transform","This is some description",$options_texttransform);
        $row1->addChild("testimonials_author_job_position_text_transform",$testimonials_author_job_position_text_transform);
        
    $row2 = new QodeRow(true);
    $group6->addChild("row2",$row2);
    
        $testimonials_author_job_position_font_family = new QodeField("Fontsimple","testimonials_author_job_position_font_family","-1","Font Family","This is some description");
        $row2->addChild("testimonials_author_job_position_font_family",$testimonials_author_job_position_font_family);
        
        $testimonials_author_job_position_font_style = new QodeField("selectblanksimple","testimonials_author_job_position_font_style","","Font Style","This is some description",$options_fontstyle);
        $row2->addChild("testimonials_author_job_position_font_style",$testimonials_author_job_position_font_style);
        
        $testimonials_author_job_position_font_weight = new QodeField("selectblanksimple","testimonials_author_job_position_font_weight","","Font Weight","This is some description",$options_fontweight);
        $row2->addChild("testimonials_author_job_position_font_weight",$testimonials_author_job_position_font_weight);
        
        $testimonials_author_job_position_letter_spacing = new QodeField("textsimple","testimonials_author_job_position_letter_spacing","","Letter Spacing (px)","This is some description");
        $row2->addChild("testimonials_author_job_position_letter_spacing",$testimonials_author_job_position_letter_spacing);

$group3 = new QodeGroup("Testimonials Navigation","Define Testimonials navigation style");
$panel16->addChild("group3",$group3);
    $row1 = new QodeRow();
    $group3->addChild("row1",$row1);

            $testimonials_navigation_width = new QodeField("textsimple","testimonials_navigation_width","","Width (px)","This is some description");
            $row1->addChild("testimonials_navigation_width",$testimonials_navigation_width);

            $testimonials_navigation_height = new QodeField("textsimple","testimonials_navigation_height","","Height (px)","This is some description");
            $row1->addChild("testimonials_navigation_height",$testimonials_navigation_height);

            $testimonials_navigation_color = new QodeField("colorsimple","testimonials_navigation_color","","Color","This is some description");
            $row1->addChild("testimonials_navigation_color",$testimonials_navigation_color);

            $testimonials_navigation_color_transparency = new QodeField("textsimple","testimonials_navigation_color_transparency","","Color Transparency","This is some description");
            $row1->addChild("testimonials_navigation_color_transparency",$testimonials_navigation_color_transparency);

    $row2 = new QodeRow(true);
    $group3->addChild("row2",$row2);

            $testimonials_navigation_active_color = new QodeField("colorsimple","testimonials_navigation_active_color","","Active Color","This is some description");
            $row2->addChild("testimonials_navigation_active_color",$testimonials_navigation_active_color);

            $testimonials_navigation_active_color_transparency = new QodeField("textsimple","testimonials_navigation_active_color_transparency","","Active Color Transparency","This is some description");
            $row2->addChild("testimonials_navigation_active_color_transparency",$testimonials_navigation_active_color_transparency);

            $testimonials_navigation_border_radius = new QodeField("textsimple","testimonials_navigation_border_radius","","Border radius (px)","This is some description");
            $row2->addChild("testimonials_navigation_border_radius",$testimonials_navigation_border_radius);

            $testimonials_navigation_border_width= new QodeField("textsimple","testimonials_navigation_border_width","","Border width (px)","This is some description");
            $row2->addChild("testimonials_navigation_border_width",$testimonials_navigation_border_width);

    $row3 = new QodeRow(true);
    $group3->addChild("row3",$row3);

            $testimonials_navigation_border_color= new QodeField("colorsimple","testimonials_navigation_border_color","","Border color","This is some description");
            $row3->addChild("testimonials_navigation_border_color",$testimonials_navigation_border_color);

            $testimonials_navigation_border_transparency= new QodeField("textsimple","testimonials_navigation_border_transparency","","Border Color Transparency","This is some description");
            $row3->addChild("testimonials_navigation_border_transparency",$testimonials_navigation_border_transparency);

$group5 = new QodeGroup("Testimonials Arrows Style","Define Testimonials Arrows Style");
$panel16->addChild("group5",$group5);
	$row1 = new QodeRow();
	$group5->addChild("row1",$row1);

        $testimonials_arrows_button_width = new QodeField("textsimple","testimonials_arrows_button_width","","Width (px)","This is some description");
        $row1->addChild("testimonials_arrows_button_width",$testimonials_arrows_button_width);

        $testimonials_arrows_button_height = new QodeField("textsimple","testimonials_arrows_button_height","","Height (px)","This is some description");
        $row1->addChild("testimonials_arrows_button_height",$testimonials_arrows_button_height);

        $testimonials_arrows_type = new QodeField("selectblanksimple", "testimonials_arrows_type", "", "Arrow Type", "", $options_arrows_type);
        $row1->addChild("testimonials_arrows_type", $testimonials_arrows_type);

        $testimonials_arrows_color = new QodeField("colorsimple","testimonials_arrows_color","","Background Color","This is some description");
		$row1->addChild("testimonials_arrows_color",$testimonials_arrows_color);

    $row2 = new QodeRow(true);
    $group5->addChild("row2",$row2);

        $testimonials_arrows_color_transparency = new QodeField("textsimple","testimonials_arrows_color_transparency","","Background Transparency (0=full - 1=opaque)","This is some description");
        $row2->addChild("testimonials_arrows_color_transparency",$testimonials_arrows_color_transparency);

		$testimonials_arrows_active_color = new QodeField("colorsimple","testimonials_arrows_active_color","","Hover Background Color","This is some description");
		$row2->addChild("testimonials_arrows_active_color",$testimonials_arrows_active_color);

        $testimonials_arrows_active_color_transparency = new QodeField("textsimple","testimonials_arrows_active_color_transparency","","Background Hover Transparency (0=full - 1=opaque)","This is some description");
        $row2->addChild("testimonials_arrows_active_color_transparency",$testimonials_arrows_active_color_transparency);

		$testimonials_arrows_border_radius = new QodeField("textsimple","testimonials_arrows_border_radius","","Border Radius (px)","This is some description");
		$row2->addChild("testimonials_arrows_border_radius",$testimonials_arrows_border_radius);

	$row3 = new QodeRow(true);
	$group5->addChild("row3",$row3);

        $testimonials_arrows_border_width= new QodeField("textsimple","testimonials_arrows_border_width","","Border Width (px)","This is some description");
        $row3->addChild("testimonials_arrows_border_width",$testimonials_arrows_border_width);

		$testimonials_arrows_border_color= new QodeField("colorsimple","testimonials_arrows_border_color","","Border Color","This is some description");
		$row3->addChild("testimonials_arrows_border_color",$testimonials_arrows_border_color);

        $testimonials_arrows_border_transparency = new QodeField("textsimple","testimonials_arrows_border_transparency","","Border Transparency (0=full - 1=opaque)","This is some description");
        $row3->addChild("testimonials_arrows_border_transparency",$testimonials_arrows_border_transparency);

		$testimonials_arrows_border_hover_color= new QodeField("colorsimple","testimonials_arrows_border_hover_color","","Border Hover Color","This is some description");
		$row3->addChild("testimonials_arrows_border_hover_color",$testimonials_arrows_border_hover_color);

    $row4 = new QodeRow(true);
    $group5->addChild("row4",$row4);

        $testimonials_arrows_border_hover_transparency = new QodeField("textsimple","testimonials_arrows_border_hover_transparency","","Border Hover Transparency (0=full - 1=opaque)","This is some description");
        $row4->addChild("testimonials_arrows_border_hover_transparency",$testimonials_arrows_border_hover_transparency);

		$testimonials_arrows_icon_color= new QodeField("colorsimple","testimonials_arrows_icon_color","","Icon Color","This is some description");
		$row4->addChild("testimonials_arrows_icon_color",$testimonials_arrows_icon_color);

        $testimonials_arrows_transparency = new QodeField("textsimple","testimonials_arrows_transparency","","Icon Transparency (0=full - 1=opaque)","This is some description");
        $row4->addChild("testimonials_arrows_transparency",$testimonials_arrows_transparency);

		$testimonials_arrows_icon_hover_color= new QodeField("colorsimple","testimonials_arrows_icon_hover_color","","Icon Hover Color","This is some description");
		$row4->addChild("testimonials_arrows_icon_hover_color",$testimonials_arrows_icon_hover_color);

	$row5 = new QodeRow(true);
	$group5->addChild("row5",$row5);

        $testimonials_arrows_hover_transparency = new QodeField("textsimple","testimonials_arrows_hover_transparency","","Icon Hover Transparency (0=full - 1=opaque)","This is some description");
        $row5->addChild("testimonials_arrows_hover_transparency",$testimonials_arrows_hover_transparency);

		$testimonials_arrows_size= new QodeField("textsimple","testimonials_arrows_size","","Icon Size (px)","This is some description");
		$row5->addChild("testimonials_arrows_size",$testimonials_arrows_size);


		
