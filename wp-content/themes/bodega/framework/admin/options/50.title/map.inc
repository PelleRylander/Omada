<?php

$titlePage = new QodeAdminPage("4", "Title", "fa fa-list-alt");
$qodeFramework->qodeOptions->addAdminPage("title",$titlePage);

$panel8 = new QodePanel("Title","title_panel");
$titlePage->addChild("panel8",$panel8);

	$show_page_title = new QodeField("yesno","show_page_title","yes","Enable Page Title Area","This option will enable Title Area", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_title_container"));
	$panel8->addChild("show_page_title",$show_page_title);

	$enable_title_container = new QodeContainer("enable_title_container","show_page_title","no");
	$panel8->addChild("enable_title_container",$enable_title_container);

		$title_type = new QodeField("select","title_type","standard_title","Title Type","Choose title type", array( 
				"standard_title" => "Standard",
				"breadcrumbs_title" => "Breadcrumb"
		      ));
		$enable_title_container->addChild("title_type",$title_type);

		$animate_title_area = new QodeField("select","animate_title_area","no","Animations","Choose an animation for Title Area", array( 
			"no" => "No animation",
			"text_right_left" => "Text right to left",
			"area_top_bottom" => "Title area top to bottom"
	      ));
		$enable_title_container->addChild("animate_title_area",$animate_title_area);
		
		$page_title_vertical_aligment = new QodeField("select","page_title_vertical_aligment","header_bottom","Vertical Alignment","Specify Title vertical alignment", array( 
						"header_bottom" => "From Bottom of Header",
						"window_top" => "From Window Top"
					  ));
		$enable_title_container->addChild("page_title_vertical_aligment",$page_title_vertical_aligment);
		
		$show_page_title_text = new QodeField("yesno","show_page_title_text","yes","Enable Page Title Text","This option will enable Title Text", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_title_text_container, #qodef_animation_page_title_contaier"));
		$enable_title_container->addChild("show_page_title_text",$show_page_title_text);

			$enable_title_text_container = new QodeContainer("enable_title_text_container","show_page_title_text","no");
			$enable_title_container->addChild("enable_title_text_container",$enable_title_text_container);
		
		
				$page_title_position = new QodeField("select","page_title_position","left","Title Text Alignment","Specify Title text alignment", array( 
						"left" => "Left",
						"center" => "Center",
						"right" => "Right"
					  ));
				$enable_title_text_container->addChild("page_title_position",$page_title_position);
				
				$title_text_shadow = new QodeField("yesno","title_text_shadow","no","Title Text Shadow","Enabling this option will give Title text a shadow");
				$enable_title_text_container->addChild("title_text_shadow",$title_text_shadow);
				
	
		
		$title_background_color = new QodeField("color","title_background_color","","Background Color","Choose a background color for Title Area");
		$enable_title_container->addChild("title_background_color",$title_background_color);
		
		$title_image = new QodeField("image","title_image","","Background Image","Choose an Image for Title Area");
		$enable_title_container->addChild("title_image",$title_image);
		
		$responsive_title_image = new QodeField("yesno","responsive_title_image","no","Background Responsive Image","Enabling this option will make Title background image responsive", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_responsive_title_image_container", "dependence_show_on_yes" => ""));
		$enable_title_container->addChild("responsive_title_image",$responsive_title_image);

		$responsive_title_image_container = new QodeContainer("responsive_title_image_container","responsive_title_image","yes");
		$enable_title_container->addChild("responsive_title_image_container",$responsive_title_image_container);
			$fixed_title_image = new QodeField("select","fixed_title_image","no","Parallax Title Image","Enabling this option will make Title image parallax", array( "no" => "No",
			       "yes" => "Yes",
			       "yes_zoom" => "Yes, with zoom out"
			      ));
			$responsive_title_image_container->addChild("fixed_title_image",$fixed_title_image);
			$title_height = new QodeField("text","title_height","","Title Height (px)","Set a height for Title Area in pixels", array(), array("col_width" => 3));
			$responsive_title_image_container->addChild("title_height",$title_height);

		$title_overlay_image = new QodeField("image","title_overlay_image","","Pattern Overlay Image","Choose an image to be used as pattern over Title Area");
		$enable_title_container->addChild("title_overlay_image",$title_overlay_image);
		
		
		$enable_title_oblique = new QodeField("yesno","enable_title_oblique","no","Enable Angled Shape in Background","Enabling this option will show angled shape in background", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_title_oblique_container"));
		$enable_title_container->addChild("enable_title_oblique",$enable_title_oblique);
		
			$enable_title_oblique_container = new QodeContainer("enable_title_oblique_container","enable_title_oblique","no");
			$enable_title_container->addChild("enable_title_oblique_container",$enable_title_oblique_container);
				
				$title_oblique_section_position = new QodeField("select","title_oblique_section_position","","Angled Shape Position","Choose a position for angled shape in title background", array(
                            "from_left_to_right" => "From Left To Right",
                            "from_right_to_left" => "From Right To Left"
                        ));
                $enable_title_oblique_container->addChild("title_oblique_section_position",$title_oblique_section_position);
				 
				$title_oblique_section_color = new QodeField("color","title_oblique_section_color","","Background Color","Choose a background color for angled shape");
				$enable_title_oblique_container->addChild("title_oblique_section_color",$title_oblique_section_color);
				
				
		

		$title_separator = new QodeField("yesno","title_separator","no","Show Title Separator","Enabling this option will display a separator underneath Title", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_title_separator_container, #qodef_animation_page_title_separator_container"));
		$enable_title_container->addChild("title_separator",$title_separator);

		$title_separator_container = new QodeContainer("title_separator_container","title_separator","no");
		$enable_title_container->addChild("title_separator_container",$title_separator_container);

                $title_separator_type = new QodeField("select","title_separator_type","","Type","Choose a Title separator line style", array( "" => "",
                        "solid" => "Solid",
                        "dashed" => "Dashed"
                ));
                $title_separator_container->addChild("title_separator_type",$title_separator_type);

                $title_separator_position = new QodeField("select","title_separator_position","","Position","Choose a Title separator position", array( "" => "",
                        "above" => "Above Title",
                        "below" => "Below Title"
                ));
                $title_separator_container->addChild("title_separator_position",$title_separator_position);

                $title_separator_color = new QodeField("color","title_separator_color","","Color","Choose a color for Title separator");
                $title_separator_container->addChild("title_separator_color",$title_separator_color);

                $group1 = new QodeGroup("Size",'Define size for Title separator');
                $title_separator_container->addChild("group1",$group1);

                $row1 = new QodeRow();
                $group1->addChild("row1",$row1);

                        $title_separator_thickness = new QodeField("textsimple","title_separator_thickness","","Thickness (px)","This is some description");
                        $row1->addChild("title_separator_thickness",$title_separator_thickness);

                        $title_separator_width = new QodeField("textsimple","title_separator_width","","Width (px)","This is some description");
                        $row1->addChild("title_separator_width",$title_separator_width);

                $group2 = new QodeGroup("Margin",'Add space at top and bottom of Title separator');
                $title_separator_container->addChild("group2",$group2);

                $row1 = new QodeRow();
                $group2->addChild("row1",$row1);

                        $title_separator_topmargin = new QodeField("textsimple","title_separator_topmargin","","Top Margin (px)","This is some description");
                        $row1->addChild("title_separator_topmargin",$title_separator_topmargin);

                        $title_separator_bottommargin = new QodeField("textsimple","title_separator_bottommargin","","Bottom Margin (px)","This is some description");
                        $row1->addChild("title_separator_bottommargin",$title_separator_bottommargin);

		$border_bottom_title_area = new QodeField("yesno","border_bottom_title_area","no","Bottom Border","Enabling this option will display bottom border on Title Area", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_border_bottom_title_area_container"));
		$enable_title_container->addChild("border_bottom_title_area",$border_bottom_title_area);
		$border_bottom_title_area_container = new QodeContainer("border_bottom_title_area_container","border_bottom_title_area","no");
		$enable_title_container->addChild("border_bottom_title_area_container",$border_bottom_title_area_container);
			$border_bottom_title_area_width = new QodeField("text","border_bottom_title_area_width","","Bottom Border Width (px)","Choose a width for Title Area bottom border Note: If width has not been set, border bottom will not be displayed", array(), array("col_width" => 3));
            $border_bottom_title_area_container->addChild("border_bottom_title_area_width",$border_bottom_title_area_width);
			$border_bottom_title_area_color = new QodeField("color","border_bottom_title_area_color","","Bottom Border Color","Choose a color for Title Area bottom border");
			$border_bottom_title_area_container->addChild("border_bottom_title_area_color",$border_bottom_title_area_color);
			

		$enable_breadcrumbs = new QodeField("yesno","enable_breadcrumbs","no","Enable Breadcrumbs","This option will display Breadcrumbs in Title Area", array(), array('dependence' => true, 'dependence_hide_on_yes' => '', 'dependence_show_on_yes' => '#qodef_animation_page_title_breadcrumbs_container'));
		$enable_title_container->addChild("enable_breadcrumbs",$enable_breadcrumbs);

		$title_graphics = new QodeField("image","title_graphics","","Graphics","Choose graphics");
		$enable_title_container->addChild("title_graphics",$title_graphics);

		$group1 = new QodeGroup("Title Area Content Style",'Define style for Title Area Content');
        $enable_title_container->addChild("group1",$group1);

        	$row1 = new QodeRow();
        	$group1->addChild("row1",$row1);

				$title_content_background_color = new QodeField("colorsimple","title_content_background_color","","Title Content Background Color","Background color for title content");
				$row1->addChild("title_content_background_color",$title_content_background_color);

				$title_content_background_opacity = new QodeField("textsimple","title_content_background_opacity","","Title Content Background Opacity","Choose opacity for background color (0 = fully transparent, 1 = opaque)");
				$row1->addChild("title_content_background_opacity",$title_content_background_opacity);

		$group2 = new QodeGroup("Title Style",'Define style for Title');
        $enable_title_container->addChild("group2",$group2);

        	$row1 = new QodeRow();
        	$group2->addChild("row1",$row1);

				$title_span_background_color = new QodeField("colorsimple","title_span_background_color","","Title Background Color","Background color for title");
				$row1->addChild("title_span_background_color",$title_span_background_color);

				$title_span_background_opacity = new QodeField("textsimple","title_span_background_opacity","","Title Background Opacity","Choose opacity for background color (0 = fully transparent, 1 = opaque)");
				$row1->addChild("title_span_background_opacity",$title_span_background_opacity);

		$group3 = new QodeGroup("Title Padding",'Define padding for Title');
		$enable_title_container->addChild("group3",$group3);

			$row1 = new QodeRow();
			$group3->addChild("row1",$row1);

				$title_span_top_padding = new QodeField("textsimple","title_span_top_padding","","Top Padding","This is some description.");
				$row1->addChild("title_span_top_padding",$title_span_top_padding);

				$title_span_right_padding = new QodeField("textsimple","title_span_right_padding","","Right Padding","This is some description.");
				$row1->addChild("title_span_right_padding",$title_span_right_padding);

				$title_span_bottom_padding = new QodeField("textsimple","title_span_bottom_padding","","Bottom Padding","This is some description.");
				$row1->addChild("title_span_bottom_padding",$title_span_bottom_padding);

				$title_span_left_padding = new QodeField("textsimple","title_span_left_padding","","Left Padding","This is some description.");
				$row1->addChild("title_span_left_padding",$title_span_left_padding);


		$group4 = new QodeGroup("Subtitle Style",'Define style for subtitle');
        $enable_title_container->addChild("group4",$group4);

        	$row1 = new QodeRow();
        	$group4->addChild("row1",$row1);

				$subtitle_span_background_color = new QodeField("colorsimple","subtitle_span_background_color","","Subtitle Background Color","Background color for subtitle");
				$row1->addChild("subtitle_span_background_color",$subtitle_span_background_color);

				$subtitle_span_background_opacity = new QodeField("textsimple","subtitle_span_background_opacity","","Subtitle Background Opacity","Choose opacity for background color (0 = fully transparent, 1 = opaque)");
				$row1->addChild("subtitle_span_background_opacity",$subtitle_span_background_opacity);

		$group5 = new QodeGroup("Subtitle Padding",'Define padding for subtitle');
		$enable_title_container->addChild("group5",$group5);

			$row1 = new QodeRow();
			$group5->addChild("row1",$row1);

				$subtitle_span_top_padding = new QodeField("textsimple","subtitle_span_top_padding","","Top Padding","This is some description.");
				$row1->addChild("subtitle_span_top_padding",$subtitle_span_top_padding);

				$subtitle_span_right_padding = new QodeField("textsimple","subtitle_span_right_padding","","Right Padding","This is some description.");
				$row1->addChild("subtitle_span_right_padding",$subtitle_span_right_padding);

				$subtitle_span_bottom_padding = new QodeField("textsimple","subtitle_span_bottom_padding","","Bottom Padding","This is some description.");
				$row1->addChild("subtitle_span_bottom_padding",$subtitle_span_bottom_padding);

				$subtitle_span_left_padding = new QodeField("textsimple","subtitle_span_left_padding","","Left Padding","This is some description.");
				$row1->addChild("subtitle_span_left_padding",$subtitle_span_left_padding);

$panel9 = new QodePanel('Title Animations', 'title_animations');
$titlePage->addChild('panel9', $panel9);

//Whole title content animation
$page_title_whole_content_animations = new QodeField('yesno', 'page_title_whole_content_animations', 'no', 'Enable Whole Title Content Animation', 'This option will enable whole title content animation', array(), array(
	'dependence' => true,
	'dependence_hide_on_yes' => '',
	'dependence_show_on_yes' => '#qodef_page_title_whole_content_animations_container'
));
$panel9->addChild('page_title_whole_content_animations', $page_title_whole_content_animations);

$page_title_whole_content_animations_container = new QodeContainer('page_title_whole_content_animations_container', 'page_title_whole_content_animations', 'no');
$panel9->addChild('page_title_whole_content_animations_container', $page_title_whole_content_animations_container);

$page_title_whole_content_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_title_whole_content_animations_container->addChild('page_title_whole_content_animations_data_start', $page_title_whole_content_animations_data_start);

$row1 = new QodeRow();
$page_title_whole_content_animations_data_start->addChild('row1', $row1);

$page_title_whole_content_data_start = new QodeField('textsimple', 'page_title_whole_content_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_title_whole_content_data_start', $page_title_whole_content_data_start);

$page_title_whole_content_start_custom_style = new QodeField('textareasimple', 'page_title_whole_content_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_title_whole_content_start_custom_style', $page_title_whole_content_start_custom_style);

$page_title_whole_content_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_title_whole_content_animations_container->addChild('page_title_whole_content_animations_data_end', $page_title_whole_content_animations_data_end);

$row2 = new QodeRow();
$page_title_whole_content_animations_data_end->addChild('row2', $row2);

$page_title_whole_content_data_end = new QodeField('textsimple', 'page_title_whole_content_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_title_whole_content_data_end', $page_title_whole_content_data_end);

$page_title_whole_content_end_custom_style = new QodeField('textareasimple', 'page_title_whole_content_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_title_whole_content_end_custom_style', $page_title_whole_content_end_custom_style);

//Title Animations
$animation_page_title_contaier = new QodeContainer2('animation_page_title_contaier', 'show_page_title_text', 'no');
$panel9->addChild('animation_page_title_contaier', $animation_page_title_contaier);

$page_title_animations = new QodeField('yesno', 'page_title_animations', 'no', 'Enable Page Title Animations', 'This option will enable Page Title Scroll Animations', array(), array(
	'dependence' => true,
	'dependence_hide_on_yes' => '',
	'dependence_show_on_yes' => '#qodef_page_title_animations_container'
));
$animation_page_title_contaier->addChild('page_title_animations', $page_title_animations);

$page_title_animations_container = new QodeContainer('page_title_animations_container', 'page_title_animations', 'no');
$animation_page_title_contaier->addChild('page_title_animations_container', $page_title_animations_container);

$page_title_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_title_animations_container->addChild('page_title_animations_data_start', $page_title_animations_data_start);

$row1 = new QodeRow();
$page_title_animations_data_start->addChild('row1', $row1);

$page_title_data_start = new QodeField('textsimple', 'page_title_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_title_data_start', $page_title_data_start);

$page_title_start_custom_style = new QodeField('textareasimple', 'page_title_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_title_start_custom_style', $page_title_start_custom_style);


$page_title_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_title_animations_container->addChild('page_title_animations_data_end', $page_title_animations_data_end);

$row2 = new QodeRow();
$page_title_animations_data_end->addChild('row2', $row2);

$page_title_data_end = new QodeField('textsimple', 'page_title_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_title_data_end', $page_title_data_end);

$page_title_end_custom_style = new QodeField('textareasimple', 'page_title_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_title_end_custom_style', $page_title_end_custom_style);

//Title Separator Animations
$animation_page_title_separator_container = new QodeContainer2('animation_page_title_separator_container', 'title_separator', 'no');
$panel9->addChild('animation_page_title_separator_container', $animation_page_title_separator_container);

$page_title_separator_animations = new QodeField('yesno', 'page_title_separator_animations', 'no', 'Enable Page Separator Title Animations', 'This option will enable Page Title Separator Scroll Animations', array(), array(
	'dependence' => true,
	'dependence_hide_on_yes' => '',
	'dependence_show_on_yes' => '#qodef_page_title_separator_animations_container'
));
$animation_page_title_separator_container->addChild('page_title_separator_animations', $page_title_separator_animations);

$page_title_separator_animations_container = new QodeContainer('page_title_separator_animations_container', 'page_title_separator_animations', 'no');
$animation_page_title_separator_container->addChild('page_title_separator_animations_container', $page_title_separator_animations_container);

$page_title_separator_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_title_separator_animations_container->addChild('page_title_separator_animations_data_start', $page_title_separator_animations_data_start);

$row1 = new QodeRow();
$page_title_separator_animations_data_start->addChild('row1', $row1);

$page_title_separator_data_start = new QodeField('textsimple', 'page_title_separator_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_title_separator_data_start', $page_title_separator_data_start);

$page_title_separator_start_custom_style = new QodeField('textareasimple', 'page_title_separator_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_title_separator_start_custom_style', $page_title_separator_start_custom_style);

$page_title_separator_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_title_separator_animations_container->addChild('page_title_separator_animations_data_end', $page_title_separator_animations_data_end);

$row2 = new QodeRow();
$page_title_separator_animations_data_end->addChild('row2', $row2);

$page_title_separator_data_end = new QodeField('textsimple', 'page_title_separator_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_title_separator_data_end', $page_title_separator_data_end);

$page_title_separator_end_custom_style = new QodeField('textareasimple', 'page_title_separator_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_title_separator_end_custom_style', $page_title_separator_end_custom_style);

//Subtitle Animations
$page_subtitle_animations = new QodeField('yesno', 'page_subtitle_animations', 'no', 'Enable Page Subtitle Animations', 'This option will enable Page Subtitle Scroll Animations', array(), array(
	'dependence' => true,
	'dependence_hide_on_yes' => '',
	'dependence_show_on_yes' => '#qodef_page_subtitle_animations_container'
));
$panel9->addChild('page_subtitle_animations', $page_subtitle_animations);

$page_subtitle_animations_container = new QodeContainer('page_subtitle_animations_container', 'page_subtitle_animations', 'no');
$panel9->addChild('page_subtitle_animations_container', $page_subtitle_animations_container);

$page_subtitle_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_subtitle_animations_container->addChild('page_subtitle_animations_data_start', $page_subtitle_animations_data_start);

$row1 = new QodeRow();
$page_subtitle_animations_data_start->addChild('row1', $row1);

$page_subtitle_data_start = new QodeField('textsimple', 'page_subtitle_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_subtitle_data_start', $page_subtitle_data_start);

$page_subtitle_start_custom_style = new QodeField('textareasimple', 'page_subtitle_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_subtitle_start_custom_style', $page_subtitle_start_custom_style);

$page_subtitle_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_subtitle_animations_container->addChild('page_subtitle_animations_data_end', $page_subtitle_animations_data_end);

$row2 = new QodeRow();
$page_subtitle_animations_data_end->addChild('row2', $row2);

$page_subtitle_data_end = new QodeField('textsimple', 'page_subtitle_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_subtitle_data_end', $page_subtitle_data_end);

$page_subtitle_end_custom_style = new QodeField('textareasimple', 'page_subtitle_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_subtitle_end_custom_style', $page_subtitle_end_custom_style);

//Graphic Animations
$page_title_graphic_animations = new QodeField('yesno', 'page_title_graphic_animations', 'no', 'Enable Page Title Graphic Animations', 'This option will enable Page Title Graphic Scroll Animations', array(), array(
	'dependence' => true,
	'dependence_hide_on_yes' => '',
	'dependence_show_on_yes' => '#qodef_page_title_graphic_animations_container'
));
$panel9->addChild('page_title_graphic_animations', $page_title_graphic_animations);

$page_title_graphic_animations_container = new QodeContainer('page_title_graphic_animations_container', 'page_title_graphic_animations', 'no');
$panel9->addChild('page_title_graphic_animations_container', $page_title_graphic_animations_container);

$page_title_graphic_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_title_graphic_animations_container->addChild('page_title_graphic_animations_data_start', $page_title_graphic_animations_data_start);

$row1 = new QodeRow();
$page_title_graphic_animations_data_start->addChild('row1', $row1);

$page_title_graphic_data_start = new QodeField('textsimple', 'page_title_graphic_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_title_graphic_data_start', $page_title_graphic_data_start);

$page_title_graphic_start_custom_style = new QodeField('textareasimple', 'page_title_graphic_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_title_graphic_start_custom_style', $page_title_graphic_start_custom_style);

$page_title_graphic_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_title_graphic_animations_container->addChild('$page_title_graphic_animations_data_end', $page_title_graphic_animations_data_end);

$row2 = new QodeRow();
$page_title_graphic_animations_data_end->addChild('row2', $row2);

$page_title_graphic_data_end = new QodeField('textsimple', 'page_title_graphic_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_title_graphic_data_end', $page_title_graphic_data_end);

$page_title_graphic_end_custom_style = new QodeField('textareasimple', 'page_title_graphic_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_title_graphic_end_custom_style', $page_title_graphic_end_custom_style);

//Breadcrumb animations
$animation_page_title_breadcrumbs_container = new QodeContainer2('animation_page_title_breadcrumbs_container', 'enable_breadcrumbs', 'no');
$panel9->addChild('animation_page_title_breadcrumbs_container', $animation_page_title_breadcrumbs_container);

$page_title_breadcrumbs_animations = new QodeField('yesno', 'page_title_breadcrumbs_animations', 'no', 'Enable Page Title Breadcrumbs Animations', 'This option will enable Page Title Breadcrumbs Scroll Animations', array(), array(
	'dependence' => true,
	'dependence_hide_on_yes' => '',
	'dependence_show_on_yes' => '#qodef_page_title_breadcrumbs_animations_container'
));
$animation_page_title_breadcrumbs_container->addChild('page_title_breadcrumbs_animations', $page_title_breadcrumbs_animations);

$page_title_breadcrumbs_animations_container = new QodeContainer('page_title_breadcrumbs_animations_container', 'page_title_breadcrumbs_animations', 'no');
$animation_page_title_breadcrumbs_container->addChild('page_title_breadcrumbs_animations_container', $page_title_breadcrumbs_animations_container);

$page_title_breadcrumbs_animations_data_start = new QodeGroup('Scrolling Animation Start Point', 'These are properties for the first keyframe in scrolling animation');
$page_title_breadcrumbs_animations_container->addChild('page_title_breadcrumbs_animations_data_start', $page_title_breadcrumbs_animations_data_start);

$row1 = new QodeRow();
$page_title_breadcrumbs_animations_data_start->addChild('row1', $row1);

$page_title_breadcrumbs_data_start = new QodeField('textsimple', 'page_title_breadcrumbs_data_start', '', 'Scrollbar Top Distance (px)');
$row1->addChild('page_title_breadcrumbs_data_start', $page_title_breadcrumbs_data_start);

$page_title_breadcrumbs_start_custom_style = new QodeField('textareasimple', 'page_title_breadcrumbs_start_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row1->addChild('page_title_breadcrumbs_start_custom_style', $page_title_breadcrumbs_start_custom_style);

$page_title_breadcrumbs_animations_data_end = new QodeGroup('Scrolling Animation End Point', 'These are properties for the last keyframe in scrolling animation');
$page_title_breadcrumbs_animations_container->addChild('page_title_breadcrumbs_animations_data_end', $page_title_breadcrumbs_animations_data_end);

$row2 = new QodeRow();
$page_title_breadcrumbs_animations_data_end->addChild('row2', $row2);

$page_title_breadcrumbs_data_end = new QodeField('textsimple', 'page_title_breadcrumbs_data_end', '', 'Scrollbar Top Distance (px)');
$row2->addChild('page_title_breadcrumbs_data_end', $page_title_breadcrumbs_data_end);

$page_title_breadcrumbs_end_custom_style = new QodeField('textareasimple', 'page_title_breadcrumbs_end_custom_style', '', 'Enter CSS declarations separated by semicolons');
$row2->addChild('page_title_breadcrumbs_end_custom_style', $page_title_breadcrumbs_end_custom_style);