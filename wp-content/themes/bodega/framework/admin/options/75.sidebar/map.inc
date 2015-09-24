<?php

$sidebarPage = new QodeAdminPage("7", "Sidebar", "fa fa-bars");
$qodeFramework->qodeOptions->addAdminPage("sidebar",$sidebarPage);

// Navigation Style

$panel1 = new QodePanel("Widgets","widget_style");
$sidebarPage->addChild("panel1",$panel1);

	$sidebar_background_color = new QodeField("color","sidebar_background_color","","Sidebar Background Color","Choose background color for sidebar");
	$panel1->addChild("sidebar_background_color",$sidebar_background_color);

	$group6 = new QodeGroup("Padding","Define padding for sidebar");
	$panel1->addChild("group6",$group6);
		$row1 = new QodeRow(true);
		$group6->addChild("row1",$row1);
			$sidebar_padding_top = new QodeField("textsimple","sidebar_padding_top","","Top Padding (px)","This is some description");
			$row1->addChild("sidebar_padding_top",$sidebar_padding_top);
			$sidebar_padding_right = new QodeField("textsimple","sidebar_padding_right","","Right Padding (px)","This is some description");
			$row1->addChild("sidebar_padding_right",$sidebar_padding_right);
			$sidebar_padding_bottom = new QodeField("textsimple","sidebar_padding_bottom","","Bottom Padding (px)","This is some description");
			$row1->addChild("sidebar_padding_bottom",$sidebar_padding_bottom);
			$sidebar_padding_left = new QodeField("textsimple","sidebar_padding_left","","Left Padding (px)","This is some description");
			$row1->addChild("sidebar_padding_left",$sidebar_padding_left);

$sidebar_alignment = new QodeField("select","sidebar_alignment","","Text Alignment","Choose text aligment",array(
    "left" => "Left",
    "center" => "Center",
    "right" => "Right"
));
$panel1->addChild("sidebar_alignment",$sidebar_alignment);

$widget_style = new QodeTitle("widget_style", "Widget Style");
$panel1->addChild("widget_style", $widget_style);

    $widget_background_color = new QodeField("color","widget_background_color","","Background Color","Choose color for widget background");
    $panel1->addChild("widget_background_color",$widget_background_color);

	$widget_border_color = new QodeField("color","widget_border_color","","Border Color","Choose a border color around widget");
	$panel1->addChild("widget_border_color",$widget_border_color);

	$group1 = new QodeGroup("Padding","Define padding for widget");
	$panel1->addChild("group1",$group1);
		$row1 = new QodeRow(true);
		$group1->addChild("row1",$row1);
			$widget_padding_top = new QodeField("textsimple","widget_padding_top","","Top Padding (px)","This is some description");
			$row1->addChild("widget_padding_top",$widget_padding_top);
			$widget_padding_right = new QodeField("textsimple","widget_padding_right","","Right Padding (px)","This is some description");
			$row1->addChild("widget_padding_right",$widget_padding_right);
			$widget_padding_bottom = new QodeField("textsimple","widget_padding_bottom","","Bottom Padding (px)","This is some description");
			$row1->addChild("widget_padding_bottom",$widget_padding_bottom);
			$widget_padding_left = new QodeField("textsimple","widget_padding_left","","Left Padding (px)","This is some description");
			$row1->addChild("widget_padding_left",$widget_padding_left);

$widget_title = new QodeTitle("widget_title", "Widget Title");
$panel1->addChild("widget_title", $widget_title);

	$group2 = new QodeGroup("Text Style","Define styles for widgets title");
	$panel1->addChild("group2",$group2);
		$row1 = new QodeRow();
		$group2->addChild("row1",$row1);
        $sidebar_title_color = new QodeField("colorsimple","sidebar_title_color","","Text Color","This is some description");
			$row1->addChild("sidebar_title_color",$sidebar_title_color);

			$sidebar_title_font_size = new QodeField("textsimple","sidebar_title_font_size","","Font Size (px)","This is some description");
			$row1->addChild("sidebar_title_font_size",$sidebar_title_font_size);

			$sidebar_title_line_height = new QodeField("textsimple","sidebar_title_line_height","","Line Height (px)","This is some description");
			$row1->addChild("sidebar_title_line_height",$sidebar_title_line_height);

			$sidebar_title_text_transform = new QodeField("selectblanksimple","sidebar_title_text_transform","","Text Transform","This is some description",$options_texttransform);
			$row1->addChild("sidebar_title_text_transform",$sidebar_title_text_transform);

		$row2 = new QodeRow(true);
		$group2->addChild("row2",$row2);
			$sidebar_title_font_family = new QodeField("Fontsimple","sidebar_title_font_family","-1","Font Family","This is some description");
			$row2->addChild("sidebar_title_font_family",$sidebar_title_font_family);

			$sidebar_title_font_style = new QodeField("selectblanksimple","sidebar_title_font_style","","Font Style","This is some description",$options_fontstyle);
			$row2->addChild("sidebar_title_font_style",$sidebar_title_font_style);

			$sidebar_title_font_weight = new QodeField("selectblanksimple","sidebar_title_font_weight","","Font Weight","This is some description",$options_fontweight);
			$row2->addChild("sidebar_title_font_weight",$sidebar_title_font_weight);

			$sidebar_title_letter_spacing = new QodeField("textsimple","sidebar_title_letter_spacing","","Letter Spacing (px)","This is some description");
			$row2->addChild("sidebar_title_letter_spacing",$sidebar_title_letter_spacing);

$sidebar_title_background = new QodeField("color","sidebar_title_background","","Background Color","Choose color for background");
$panel1->addChild("sidebar_title_background",$sidebar_title_background);

$sidebar_title_border_color = new QodeField("color","sidebar_title_border_color","","Border Color","Choose color for border");
$panel1->addChild("sidebar_title_border_color",$sidebar_title_border_color);

	$group4 = new QodeGroup("Separator","Define styles for title separator");
	$panel1->addChild("group4",$group4);
		$row1 = new QodeRow();
		$group4->addChild("row1",$row1);
			$sidebar_title_border_bottom_color = new QodeField("colorsimple","sidebar_title_border_bottom_color","","Color","This is some description");
			$row1->addChild("sidebar_title_border_bottom_color",$sidebar_title_border_bottom_color);

			$sidebar_title_border_bottom_width = new QodeField("textsimple","sidebar_title_border_bottom_width","","Thickness (px)","This is some description");
			$row1->addChild("sidebar_title_border_bottom_width",$sidebar_title_border_bottom_width);

			$sidebar_title_border_bottom_padding_bottom = new QodeField("textsimple","sidebar_title_border_bottom_padding_bottom","","Top Margin (px)","This is some description");
			$row1->addChild("sidebar_title_border_bottom_padding_bottom",$sidebar_title_border_bottom_padding_bottom);

			$sidebar_title_border_bottom_margin_bottom = new QodeField("textsimple","sidebar_title_border_bottom_margin_bottom","","Bottom Margin (px)","This is some description");
			$row1->addChild("sidebar_title_border_bottom_margin_bottom",$sidebar_title_border_bottom_margin_bottom);

$widget_text = new QodeTitle("widget_text", "Widget Text");
$panel1->addChild("widget_text", $widget_text);

	$group7 = new QodeGroup("Text Style","Define styles for widgets text");
	$panel1->addChild("group7",$group7);
		$row1 = new QodeRow();
		$group7->addChild("row1",$row1);
			$sidebar_text_color = new QodeField("colorsimple","sidebar_text_color","","Text Color","This is some description");
			$row1->addChild("sidebar_text_color",$sidebar_text_color);

			$sidebar_text_font_size = new QodeField("textsimple","sidebar_text_font_size","","Font Size (px)","This is some description");
			$row1->addChild("sidebar_text_font_size",$sidebar_text_font_size);

			$sidebar_text_line_height = new QodeField("textsimple","sidebar_text_line_height","","Line Height (px)","This is some description");
			$row1->addChild("sidebar_text_line_height",$sidebar_text_line_height);

			$sidebar_text_text_transform = new QodeField("selectblanksimple","sidebar_text_text_transform","","Text Transform","This is some description",$options_texttransform);
			$row1->addChild("sidebar_text_text_transform",$sidebar_text_text_transform);

		$row2 = new QodeRow(true);
		$group7->addChild("row2",$row2);
			$sidebar_text_font_family = new QodeField("Fontsimple","sidebar_text_font_family","-1","Font Family","This is some description");
			$row2->addChild("sidebar_text_font_family",$sidebar_text_font_family);

			$sidebar_text_font_style = new QodeField("selectblanksimple","sidebar_text_font_style","","Font Style","This is some description",$options_fontstyle);
			$row2->addChild("sidebar_text_font_style",$sidebar_text_font_style);

			$sidebar_text_font_weight = new QodeField("selectblanksimple","sidebar_text_font_weight","","Font Weight","This is some description",$options_fontweight);
			$row2->addChild("sidebar_text_font_weight",$sidebar_text_font_weight);

			$sidebar_text_letter_spacing = new QodeField("textsimple","sidebar_text_letter_spacing","","Letter Spacing (px)","This is some description");
			$row2->addChild("sidebar_text_letter_spacing",$sidebar_text_letter_spacing);

$widget_link = new QodeTitle("widget_link", "Widget Link");
$panel1->addChild("widget_link", $widget_link);

	$group3 = new QodeGroup("Text Style","Define styles for widget links");
	$panel1->addChild("group3",$group3);
		$row1 = new QodeRow();
		$group3->addChild("row1",$row1);
            $sidebar_link_color = new QodeField("colorsimple","sidebar_link_color","","Text Color","This is some description");
			$row1->addChild("sidebar_link_color",$sidebar_link_color);

            $sidebar_link_hover_color = new QodeField("colorsimple","sidebar_link_hover_color","","Text Hover Color","This is some description");
            $row1->addChild("sidebar_link_hover_color",$sidebar_link_hover_color);

			$sidebar_link_font_size = new QodeField("textsimple","sidebar_link_font_size","","Font Size (px)","This is some description");
			$row1->addChild("sidebar_link_font_size",$sidebar_link_font_size);

			$sidebar_link_line_height = new QodeField("textsimple","sidebar_link_line_height","","Line Height (px)","This is some description");
			$row1->addChild("sidebar_link_line_height",$sidebar_link_line_height);

		$row2 = new QodeRow(true);
		$group3->addChild("row2",$row2);

            $sidebar_link_text_transform = new QodeField("selectblanksimple","sidebar_link_text_transform","","Text Transform","This is some description",$options_texttransform);
            $row2->addChild("sidebar_link_text_transform",$sidebar_link_text_transform);

			$sidebar_link_font_family = new QodeField("Fontsimple","sidebar_link_font_family","-1","Font Family","This is some description");
			$row2->addChild("sidebar_link_font_family",$sidebar_link_font_family);

			$sidebar_link_font_style = new QodeField("selectblanksimple","sidebar_link_font_style","","Font Style","This is some description",$options_fontstyle);
			$row2->addChild("sidebar_link_font_style",$sidebar_link_font_style);

			$sidebar_link_font_weight = new QodeField("selectblanksimple","sidebar_link_font_weight","","Font Weight","This is some description",$options_fontweight);
			$row2->addChild("sidebar_link_font_weight",$sidebar_link_font_weight);

		$row3 = new QodeRow(true);	
		$group3->addChild("row3",$row3);
            $sidebar_link_letter_spacing = new QodeField("textsimple","sidebar_link_letter_spacing","","Letter Spacing (px)","This is some description");
            $row3->addChild("sidebar_link_letter_spacing",$sidebar_link_letter_spacing);

$sidebar_link_separator_color = new QodeField("color","sidebar_link_separator_color","","Separator between links color","Choose color for separator between color");
$panel1->addChild("sidebar_link_separator_color",$sidebar_link_separator_color);

$widget_elements = new QodeTitle("widget_elements", "Widget Elements");
$panel1->addChild("widget_elements", $widget_elements);

	$group5 = new QodeGroup("Search","Define styles for search in widget");
	$panel1->addChild("group5",$group5);
		$row1 = new QodeRow();
		$group5->addChild("row1",$row1);
			$sidebar_search_border_color = new QodeField("colorsimple","sidebar_search_border_color","","Border Color","This is some description");
			$row1->addChild("sidebar_search_border_color",$sidebar_search_border_color);

			$sidebar_search_loupe_color = new QodeField("colorsimple","sidebar_search_loupe_color","","Magnifier Color","This is some description");
			$row1->addChild("sidebar_search_loupe_color",$sidebar_search_loupe_color);