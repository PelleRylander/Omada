<?php

$blogPage = new QodeAdminPage("8", "Blog", "fa fa-files-o");
$qodeFramework->qodeOptions->addAdminPage("blogPage",$blogPage);

// Blog Post Lists - General

$panel1 = new QodePanel("Blog Lists","post_lists_general_panel");
$blogPage->addChild("panel1",$panel1);

$blog_style = new QodeField("select","blog_style","1","Archive and Category Layout","Choose a default blog layout for archived Blog Post Lists and Category Blog Lists", array(
	"1"	=> "Blog: Standard",
	"2"	=> "Blog: Split Column",
	"3" => "Blog: Masonry",
	"4" => "Blog: Masonry Full Width",
	"5" => "Blog: Date in Title",
	"6" => "Blog: Post Info Hierarchical",
	"7" => "Blog: Category & Title First (Centered)",
	"8" => "Blog: Title & Author (Centered)",
	"9" => "Blog: Standard Whole Post"
));
$panel1->addChild("blog_style",$blog_style);

$category_blog_sidebar = new QodeField("select","category_blog_sidebar","default","Archive and Category Sidebar","Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists", array(
	"default" => "No Sidebar",
	"1" => "Sidebar 1/3 right",
	"2" => "Sidebar 1/4 right",
	"3" => "Sidebar 1/3 left",
	"4" => "Sidebar 1/4 left"
));
$panel1->addChild("category_blog_sidebar",$category_blog_sidebar);

$pagination = new QodeField("yesno","pagination","yes","Pagination","Enabling this option will display pagination links on bottom of Blog Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_hide_pagination_list_container"));
$panel1->addChild("pagination",$pagination);

$blog_hide_pagination_list_container = new QodeContainer("blog_hide_pagination_list_container","pagination","");
$panel1->addChild("blog_hide_pagination_list_container",$blog_hide_pagination_list_container);

$blog_page_range = new QodeField("text","blog_page_range","","Pagination Range limit","Enter a number that will limit pagination to a certain range of links",array(), array("col_width" => 3));
$blog_hide_pagination_list_container->addChild("blog_page_range",$blog_page_range);

$number_of_chars = new QodeField("text","number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel1->addChild("number_of_chars",$number_of_chars);

// Blog Single

$panel20 = new QodePanel("Blog Single", "blog_single_panel");
$blogPage->addChild("panel20",$panel20);

$blog_single_style = new QodeField("select","blog_single_style","blog_standard_type","Blog Single Post Template","Choose template style for blog single post", array(
		"" => "",
		"blog_standard_type" => "Blog: Standard",
		"blog_date_in_title" => "Blog: Date in Title",
		"blog_category_title_first_centered" => "Blog: Category & Title First (Centered)",
		"blog_title_author_centered" => "Blog: Title & Author (Centered)",		
		"blog_post_info_hierarchical" => "Blog: Post Info Hierarchical"
	));
$panel20->addChild("blog_single_style", $blog_single_style);

$blog_single_sidebar = new QodeField("select","blog_single_sidebar","default","Sidebar Layout","Choose a sidebar layout for Blog Single pages", array(
	"default" => "No Sidebar",
	"1" => "Sidebar 1/3 right",
	"2" => "Sidebar 1/4 right",
	"3" => "Sidebar 1/3 left",
	"4" => "Sidebar 1/4 left"
));
$panel20->addChild("blog_single_sidebar",$blog_single_sidebar);

$custom_sidebars = qode_get_custom_sidebars();

$blog_single_sidebar_custom_display = new QodeField("selectblank","blog_single_sidebar_custom_display","","Sidebar to Display","Choose a custom sidebar to display on Blog Single pages (if empty default Sidebar will be used)", $custom_sidebars);
$panel20->addChild("blog_single_sidebar_custom_display",$blog_single_sidebar_custom_display);

$blog_single_show_ql_icon = new QodeField("yesno","blog_single_show_ql_icon","yes","Enable Quote/Link Icon","Enabling this option will show Quote/Link Icon on Blog Single posts");
$panel20->addChild("blog_single_show_ql_icon",$blog_single_show_ql_icon);

$blog_single_navigation = new QodeField("yesno","blog_single_navigation","no","Enable Prev/Next Single Post Navigation Links","Enable navigation links through the blog posts (left and right arrows will appear)", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_hide_pagination_container"));
$panel20->addChild("blog_single_navigation",$blog_single_navigation);

$blog_hide_pagination_container = new QodeContainer("blog_hide_pagination_container","blog_single_navigation","no");
$panel20->addChild("blog_hide_pagination_container",$blog_hide_pagination_container);

$blog_navigation_through_same_category = new QodeField("yesno","blog_navigation_through_same_category","no","Enable Navigation Only in Current Category","Limit your navigation only through current category");
$blog_hide_pagination_container->addChild("blog_navigation_through_same_category",$blog_navigation_through_same_category);

$blog_single_title_tags = new QodeField("select","blog_single_title_tags","h5","Headlines Below Post Content",'Choose a tag for headlines below post content ("Tags", "Post a comment", etc)', array(
	"h2" => "h2",
	"h3" => "h3",
	"h4" => "h4",
	"h5" => "h5",
	"h6" => "h6"
));
$panel20->addChild("blog_single_title_tags",$blog_single_title_tags);

$group1 = new QodeGroup("Blog Single Spacing","Set spacing for single post pages");
$panel20->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$blog_single_tags_holder_margin_top = new QodeField("textsimple","blog_single_tags_holder_margin_top","","Margin Above Tags(px)","This is some description");
$row1->addChild("blog_single_tags_holder_margin_top",$blog_single_tags_holder_margin_top);

$blog_single_navigation_margin = new QodeField("textsimple","blog_single_navigation_margin","","Margin Above and Under Navigation(px)","This is some description");
$row1->addChild("blog_single_navigation_margin",$blog_single_navigation_margin);

$blog_single_comments_holder_margin = new QodeField("textsimple","blog_single_comments_holder_margin","","Margin Above and Under Comments(px)","This is some description");
$row1->addChild("blog_single_comments_holder_margin",$blog_single_comments_holder_margin);

$post_info_data_single = new QodeTitle("post_info_data_single", "Post Info Data Fields");
$panel20->addChild("post_info_data_single", $post_info_data_single);

$blog_single_show_date = new QodeField("yesno","blog_single_show_date","yes","Show Date","Enabling this option will show date on Blog Single posts");
$panel20->addChild("blog_single_show_date",$blog_single_show_date);

$blog_single_show_like = new QodeField("yesno","blog_single_show_like","no","Show Like","Enabling this option will turn on 'Likes' on Blog Single posts");
$panel20->addChild("blog_single_show_like",$blog_single_show_like);

$blog_single_show_social_share = new QodeField("yesno","blog_single_show_social_share","no","Show Share","Enabling this option will show share on Single Post", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_single_share_options_container"));
$panel20->addChild("blog_single_show_social_share",$blog_single_show_social_share);

$blog_single_share_options_container = new QodeContainer("blog_single_share_options_container","blog_single_show_social_share","no");
$panel20->addChild("blog_single_share_options_container",$blog_single_share_options_container);

$blog_single_select_share_option = new QodeField("select","blog_single_select_share_option","dropdown","Social Share Style","Choose Social Share Style for Single Post",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_single_share_options_container->addChild("blog_single_select_share_option",$blog_single_select_share_option);

$blog_single_show_category = new QodeField("yesno","blog_single_show_category","yes","Show Category","Enabling this option will show category/categories on Blog Single posts");
$panel20->addChild("blog_single_show_category",$blog_single_show_category);

$blog_author_info = new QodeField("yesno","blog_author_info","no","Show Author Info","Enabling this option will display author name and descriptions on Blog Single pages", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_blog_author_info_container"));
$panel20->addChild("blog_author_info",$blog_author_info);

$enable_blog_author_info_container = new QodeContainer("enable_blog_author_info_container","blog_author_info","no");
$panel20->addChild("enable_blog_author_info_container",$enable_blog_author_info_container);

$enable_author_info_email = new QodeField("yesno","enable_author_info_email","no","Show Author Email","Enabling this option will show author email");
$enable_blog_author_info_container->addChild("enable_author_info_email",$enable_author_info_email);

$group1 = new QodeGroup("Blog Single Author Info Box Style","Set styles for author info box on single post pages");
$enable_blog_author_info_container->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$blog_single_post_author_info_margin_top = new QodeField("textsimple","blog_single_post_author_info_margin_top","","Margin Top for Author Info Holder (px)","This is some description");
$row1->addChild("blog_single_post_author_info_margin_top",$blog_single_post_author_info_margin_top);

$blog_single_post_author_info_background_color = new QodeField("colorsimple","blog_single_post_author_info_background_color","","Background Color","This is some description");
$row1->addChild("blog_single_post_author_info_background_color",$blog_single_post_author_info_background_color);

$blog_single_post_author_info_border_width = new QodeField("textsimple","blog_single_post_author_info_border_width","","Border width(px)","This is some description");
$row1->addChild("blog_single_post_author_info_border_width",$blog_single_post_author_info_border_width);

$blog_single_post_author_info_border_color = new QodeField("colorsimple","blog_single_post_author_info_border_color","","Border Color","This is some description");
$row1->addChild("blog_single_post_author_info_border_color",$blog_single_post_author_info_border_color);

$row2 = new QodeRow();
$group1->addChild("row2",$row2);

$blog_single_post_author_info_padding_top = new QodeField("textsimple","blog_single_post_author_info_padding_top","","Padding Top (px)","This is some description");
$row2->addChild("blog_single_post_author_info_padding_top",$blog_single_post_author_info_padding_top);

$blog_single_post_author_info_padding_bottom = new QodeField("textsimple","blog_single_post_author_info_padding_bottom","","Padding Bottom (px)","This is some description");
$row2->addChild("blog_single_post_author_info_padding_bottom",$blog_single_post_author_info_padding_bottom);

$blog_single_post_author_info_padding_left = new QodeField("textsimple","blog_single_post_author_info_padding_left","","Padding Left (px)","This is some description");
$row2->addChild("blog_single_post_author_info_padding_left",$blog_single_post_author_info_padding_left);

$blog_single_post_author_info_padding_right = new QodeField("textsimple","blog_single_post_author_info_padding_right","","Padding Right (px)","This is some description");
$row2->addChild("blog_single_post_author_info_padding_right",$blog_single_post_author_info_padding_right);

$group2 = new QodeGroup("Blog Single Author Info Title Style","Set styles for author info title on single post pages");
$enable_blog_author_info_container->addChild("group2",$group2);	
		
$row1 = new QodeRow();
$group2->addChild("row1",$row1);
	
$blog_single_post_author_info_title_color = new QodeField("colorsimple","blog_single_post_author_info_title_color","","Text Color","This is some description");
$row1->addChild("blog_single_post_author_info_title_color",$blog_single_post_author_info_title_color);
			
$blog_single_post_author_info_title_font_family = new QodeField("Fontsimple","blog_single_post_author_info_title_font_family","-1","Font Family","This is some description");
$row1->addChild("blog_single_post_author_info_title_font_family",$blog_single_post_author_info_title_font_family);

$blog_single_post_author_info_title_fontsize = new QodeField("textsimple","blog_single_post_author_info_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_single_post_author_info_title_fontsize",$blog_single_post_author_info_title_fontsize);

$blog_single_post_author_info_title_lineheight = new QodeField("textsimple","blog_single_post_author_info_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_single_post_author_info_title_lineheight",$blog_single_post_author_info_title_lineheight);

$row2 = new QodeRow(true);
$group2->addChild("row2",$row2);			

$blog_single_post_author_info_title_fontstyle = new QodeField("selectblanksimple","blog_single_post_author_info_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_single_post_author_info_title_fontstyle",$blog_single_post_author_info_title_fontstyle);

$blog_single_post_author_info_title_fontweight = new QodeField("selectblanksimple","blog_single_post_author_info_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_single_post_author_info_title_fontweight",$blog_single_post_author_info_title_fontweight);

$blog_single_post_author_info_title_texttransform = new QodeField("selectblanksimple","blog_single_post_author_info_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_single_post_author_info_title_texttransform",$blog_single_post_author_info_title_texttransform);

$blog_single_post_author_info_title_letterspacing = new QodeField("textsimple","blog_single_post_author_info_title_letterspacing","","Letter Spacing (px)","This is some description");
$row2->addChild("blog_single_post_author_info_title_letterspacing",$blog_single_post_author_info_title_letterspacing);
			
$row3 = new QodeRow();
$group2->addChild("row3",$row3);
		
$blog_single_post_author_info_title_margin_bottom = new QodeField("textsimple","blog_single_post_author_info_title_margin_bottom","","Margin Bottom for Author Info Title (px)","This is some description");
$row3->addChild("blog_single_post_author_info_title_margin_bottom",$blog_single_post_author_info_title_margin_bottom);
	
$group3 = new QodeGroup("Blog Single Author Info Text Style","Set styles for author info text on single post pages");
$enable_blog_author_info_container->addChild("group3",$group3);	
		
$row1 = new QodeRow();
$group3->addChild("row1",$row1);
	
$blog_single_post_author_info_text_color = new QodeField("colorsimple","blog_single_post_author_info_text_color","","Text Color","This is some description");
$row1->addChild("blog_single_post_author_info_text_color",$blog_single_post_author_info_text_color);
			
$blog_single_post_author_info_text_font_family = new QodeField("Fontsimple","blog_single_post_author_info_text_font_family","-1","Font Family","This is some description");
$row1->addChild("blog_single_post_author_info_text_font_family",$blog_single_post_author_info_text_font_family);

$blog_single_post_author_info_text_fontsize = new QodeField("textsimple","blog_single_post_author_info_text_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_single_post_author_info_text_fontsize",$blog_single_post_author_info_text_fontsize);

$blog_single_post_author_info_text_lineheight = new QodeField("textsimple","blog_single_post_author_info_text_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_single_post_author_info_text_lineheight",$blog_single_post_author_info_text_lineheight);

$row2 = new QodeRow(true);
$group3->addChild("row2",$row2);			

$blog_single_post_author_info_text_fontstyle = new QodeField("selectblanksimple","blog_single_post_author_info_text_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_single_post_author_info_text_fontstyle",$blog_single_post_author_info_text_fontstyle);

$blog_single_post_author_info_text_fontweight = new QodeField("selectblanksimple","blog_single_post_author_info_text_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_single_post_author_info_text_fontweight",$blog_single_post_author_info_text_fontweight);

$blog_single_post_author_info_text_texttransform = new QodeField("selectblanksimple","blog_single_post_author_info_text_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_single_post_author_info_text_texttransform",$blog_single_post_author_info_text_texttransform);

$blog_single_post_author_info_text_letterspacing = new QodeField("textsimple","blog_single_post_author_info_text_letterspacing","","Letter Spacing (px)","This is some description");
$row2->addChild("blog_single_post_author_info_text_letterspacing",$blog_single_post_author_info_text_letterspacing);

$blog_single_show_comments = new QodeField("yesno","blog_single_show_comments","yes","Show Comments","Enabling this option will show comments on Blog Single posts", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_enable_blog_comments_container"));
	$panel20->addChild("blog_single_show_comments",$blog_single_show_comments);

	$enable_blog_comments_container = new QodeContainer("enable_blog_comments_container","blog_single_show_comments","no");
	$panel20->addChild("enable_blog_comments_container",$enable_blog_comments_container);
	
	$group1 = new QodeGroup("Comments Box Style","Set styles for comments box on single post pages");
	$enable_blog_comments_container->addChild("group1",$group1);

		$row1 = new QodeRow();
		$group1->addChild("row1",$row1);

			$blog_single_post_comments_background_color = new QodeField("colorsimple","blog_single_post_comments_background_color","","Background Color","This is some description");
			$row1->addChild("blog_single_post_comments_background_color",$blog_single_post_comments_background_color);

			$blog_single_post_comments_border_width = new QodeField("textsimple","blog_single_post_comments_border_width","","Border width(px)","This is some description");
			$row1->addChild("blog_single_post_comments_border_width",$blog_single_post_comments_border_width);

			$blog_single_post_comments_border_color = new QodeField("colorsimple","blog_single_post_comments_border_color","","Border Color","This is some description");
			$row1->addChild("blog_single_post_comments_border_color",$blog_single_post_comments_border_color);

		$row2 = new QodeRow();
		$group1->addChild("row2",$row2);

			$blog_single_post_comments_padding_top = new QodeField("textsimple","blog_single_post_comments_padding_top","","Padding Top (px)","This is some description");
			$row2->addChild("blog_single_post_comments_padding_top",$blog_single_post_comments_padding_top);

			$blog_single_post_comments_padding_bottom = new QodeField("textsimple","blog_single_post_comments_padding_bottom","","Padding Bottom (px)","This is some description");
			$row2->addChild("blog_single_post_comments_padding_bottom",$blog_single_post_comments_padding_bottom);

			$blog_single_post_comments_padding_left = new QodeField("textsimple","blog_single_post_comments_padding_left","","Padding Left (px)","This is some description");
			$row2->addChild("blog_single_post_comments_padding_left",$blog_single_post_comments_padding_left);

			$blog_single_post_comments_padding_right = new QodeField("textsimple","blog_single_post_comments_padding_right","","Padding Right (px)","This is some description");
			$row2->addChild("blog_single_post_comments_padding_right",$blog_single_post_comments_padding_right);
	
	$group2 = new QodeGroup("Comments Color Style","Set styles for comments on single post pages");
	$enable_blog_comments_container->addChild("group2",$group2);
		
		$row1 = new QodeRow();
		$group2->addChild("row1",$row1);
	
			$blog_single_post_comments_title_color = new QodeField("colorsimple","blog_single_post_comments_title_color","","Title Color","This is some description");
			$row1->addChild("blog_single_post_comments_title_color",$blog_single_post_comments_title_color);
			
			$blog_single_post_comments_text_color = new QodeField("colorsimple","blog_single_post_comments_text_color","","Text Color","This is some description");
			$row1->addChild("blog_single_post_comments_text_color",$blog_single_post_comments_text_color);
			
			$blog_single_post_comments_link_color = new QodeField("colorsimple","blog_single_post_comments_link_color","","Link Color","This is some description");
			$row1->addChild("blog_single_post_comments_link_color",$blog_single_post_comments_link_color);	
			
			$blog_single_post_comments_date_color = new QodeField("colorsimple","blog_single_post_comments_date_color","","Date Color","This is some description");
			$row1->addChild("blog_single_post_comments_date_color",$blog_single_post_comments_date_color);	

// Advanced Options

$panel_advanced_options = new QodePanel("Advanced Options","panel_advanced_options");
$blogPage->addChild("panel_advanced_options",$panel_advanced_options);

$blog_standard_type_show_options = new QodeField("yesno","blog_standard_type_show_options","no","Show Standard Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_blog_standard_type_post_lists"));
$panel_advanced_options->addChild("blog_standard_type_show_options",$blog_standard_type_show_options);

$blog_split_column_show_options = new QodeField("yesno","blog_split_column_show_options","no","Show Split Column Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_blog_split_column_post_lists"));
$panel_advanced_options->addChild("blog_split_column_show_options",$blog_split_column_show_options);

$blog_masonry_show_options = new QodeField("yesno","blog_masonry_show_options","no","Show Masonry & Masonry Full Width Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_blog_masonry_post_lists"));
$panel_advanced_options->addChild("blog_masonry_show_options", $blog_masonry_show_options);

$blog_date_in_title_show_options = new QodeField("yesno","blog_date_in_title_show_options","no","Show Date in Title Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_blog_date_in_title_post_lists"));
$panel_advanced_options->addChild("blog_date_in_title_show_options",$blog_date_in_title_show_options);

$blog_post_info_hierarchical_show_options = new QodeField("yesno","blog_post_info_hierarchical_show_options","no","Show Post Info Hierarchical Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_blog_post_info_hierarchical_post_lists"));
$panel_advanced_options->addChild("blog_post_info_hierarchical_show_options",$blog_post_info_hierarchical_show_options);

$blog_category_title_first_centered_show_options = new QodeField("yesno","blog_category_title_first_centered_show_options","no","Show Category & Title First (Centered) Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_blog_category_title_first_centered_post_lists"));
$panel_advanced_options->addChild("blog_category_title_first_centered_show_options", $blog_category_title_first_centered_show_options);

$blog_title_author_centered_show_options = new QodeField("yesno","blog_title_author_centered_show_options","no","Show Title & Author (Centered) Template Options","Editing these options will have affect on Post List & Single Post", array(),
	array("dependence" => true,
		"dependence_hide_on_yes" => "",
		"dependence_show_on_yes" => "#qodef_blog_title_author_centered_post_lists"));
$panel_advanced_options->addChild("blog_title_author_centered_show_options",$blog_title_author_centered_show_options);

// Blog Post List - Blog: Date in Title
$panel3 = new QodePanel("Blog List Template Options: Date in Title","blog_date_in_title_post_lists", "blog_date_in_title_show_options", "no");
$blogPage->addChild("panel3",$panel3);


$blog_date_in_title_number_of_chars = new QodeField("text","blog_date_in_title_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel3->addChild("blog_date_in_title_number_of_chars",$blog_date_in_title_number_of_chars);

$blog_date_in_title_read_more_button = new QodeField("yesno","blog_date_in_title_read_more_button","no","Read More Button","Enable Read More Button");
$panel3->addChild("blog_date_in_title_read_more_button",$blog_date_in_title_read_more_button);

$blog_date_in_title_content_position = new QodeField("select","blog_date_in_title_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));

$panel3->addChild("blog_date_in_title_content_position",$blog_date_in_title_content_position);

$blog_date_in_title_post_meta_data_section = new QodeTitle("blog_date_in_title_post_meta_data_section", "Post Info Data Fields");
$panel3->addChild("blog_date_in_title_post_meta_data_section", $blog_date_in_title_post_meta_data_section);

$blog_date_in_title_show_categories = new QodeField("yesno","blog_date_in_title_show_categories","yes","Show Categories","Enabling this option will Show Categories on Post List");
$panel3->addChild("blog_date_in_title_show_categories",$blog_date_in_title_show_categories);

$blog_date_in_title_show_comments = new QodeField("yesno","blog_date_in_title_show_comments","yes","Show Comments","Enabling this option will Show Comments on Post List");
$panel3->addChild("blog_date_in_title_show_comments",$blog_date_in_title_show_comments);

$blog_date_in_title_show_author = new QodeField("yesno","blog_date_in_title_show_author","yes","Show Author Name","Enabling this option will show author name on Post List and Blog Post Single");
$panel3->addChild("blog_date_in_title_show_author",$blog_date_in_title_show_author);

$blog_date_in_title_show_date = new QodeField("yesno","blog_date_in_title_show_date","yes","Show Date","Enabling this option will show date on Post List");
$panel3->addChild("blog_date_in_title_hide_date",$blog_date_in_title_show_date);

$blog_date_in_title_show_share = new QodeField("yesno","blog_date_in_title_show_share","yes","Show Share","Enabling this option will show share on Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_date_in_title_share_options_container"));
$panel3->addChild("blog_date_in_title_show_share",$blog_date_in_title_show_share);

$blog_date_in_title_share_options_container = new QodeContainer("blog_date_in_title_share_options_container","blog_date_in_title_show_share","no");
$panel3->addChild("blog_date_in_title_share_options_container",$blog_date_in_title_share_options_container);

$blog_date_in_title_select_share_option = new QodeField("select","blog_date_in_title_select_share_option","dropdown","Social Share Style","Choose Social Share Style for Category and Title Type",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_date_in_title_share_options_container->addChild("blog_date_in_title_select_share_option",$blog_date_in_title_select_share_option);

$blog_date_in_title_share_icon_color = new QodeField("color","blog_date_in_title_share_icon_color","","Icon Color","Choose icon color for share dropdown");
$blog_date_in_title_share_options_container->addChild("blog_date_in_title_share_icon_color",$blog_date_in_title_share_icon_color);

$blog_date_in_title_share_icon_hover_color = new QodeField("color","blog_date_in_title_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for share dropdown");
$blog_date_in_title_share_options_container->addChild("blog_date_in_title_share_icon_hover_color",$blog_date_in_title_share_icon_hover_color);

$blog_date_in_title_share_background_color = new QodeField("color","blog_date_in_title_share_background_color","","Background Color","Choose background color for share dropdown list field");
$blog_date_in_title_share_options_container->addChild("blog_date_in_title_share_background_color",$blog_date_in_title_share_background_color);

$blog_date_in_title_show_like = new QodeField("yesno","blog_date_in_title_show_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel3->addChild("blog_date_in_title_show_like",$blog_date_in_title_show_like);

$blog_date_in_title_post_design_style = new QodeTitle("blog_date_in_title_post_design_style", "Post Design Style");
$panel3->addChild("blog_date_in_title_post_design_style", $blog_date_in_title_post_design_style);

$blog_date_in_title_enable_text_box = new QodeField("yesno","blog_date_in_title_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_date_in_title_enable_text_box_container"));
$panel3->addChild("blog_date_in_title_enable_text_box",$blog_date_in_title_enable_text_box);

$blog_date_in_title_enable_text_box_container = new QodeContainer("blog_date_in_title_enable_text_box_container","blog_date_in_title_enable_text_box","no");
$panel3->addChild("blog_date_in_title_enable_text_box_container",$blog_date_in_title_enable_text_box_container);

$blog_date_in_title_box_background_color = new QodeField("color","blog_date_in_title_box_background_color","","Background Color","Choose background color for post text box");
$blog_date_in_title_enable_text_box_container->addChild("blog_date_in_title_box_background_color",$blog_date_in_title_box_background_color);

$blog_date_in_title_box_border_color = new QodeField("color","blog_date_in_title_box_border_color","","Border Color","Choose border color for post text box");
$blog_date_in_title_enable_text_box_container->addChild("blog_date_in_title_box_border_color",$blog_date_in_title_box_border_color);

$blog_date_in_title_box_padding = new QodeField("text","blog_date_in_title_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_date_in_title_enable_text_box_container->addChild("blog_date_in_title_box_padding",$blog_date_in_title_box_padding);

$group7 = new QodeGroup("Paragraph","Set paragraph color");
$panel3->addChild("group7",$group7);

$blog_date_in_title_paragraph_color = new QodeField("colorsimple","blog_date_in_title_paragraph_color","","Color","This is some description");
$group7->addChild("blog_date_in_title_paragraph_color",$blog_date_in_title_paragraph_color);

$group1 = new QodeGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel3->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$blog_date_in_title_ql_background_image = new QodeField("yesnosimple","blog_date_in_title_ql_background_image","no","Background Image","Show Background Image");
$row1->addChild("blog_date_in_title_ql_background_image",$blog_date_in_title_ql_background_image);

$blog_date_in_title_ql_background_color = new QodeField("colorsimple","blog_date_in_title_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_date_in_title_ql_background_color",$blog_date_in_title_ql_background_color);

$blog_date_in_title_ql_hover_background_color = new QodeField("colorsimple","blog_date_in_title_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_date_in_title_ql_hover_background_color",$blog_date_in_title_ql_hover_background_color);

$blog_date_in_title_show_ql_mark = new QodeField("yesno","blog_date_in_title_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for Quote/Link Post Format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_date_in_title_show_ql_mark_container"));
$panel3->addChild("blog_date_in_title_show_ql_mark",$blog_date_in_title_show_ql_mark);

$blog_date_in_title_show_ql_mark_container = new QodeContainer("blog_date_in_title_show_ql_mark_container","blog_date_in_title_show_ql_mark","no");
$panel3->addChild("blog_date_in_title_show_ql_mark_container",$blog_date_in_title_show_ql_mark_container);

$row1 = new QodeRow();
$blog_date_in_title_show_ql_mark_container->addChild("row1",$row1);

$blog_date_in_title_ql_mark_color = new QodeField("color","blog_date_in_title_ql_mark_color","","Icon Color","Choose icon color for quote/link post.");
$row1->addChild("blog_date_in_title_ql_mark_color",$blog_date_in_title_ql_mark_color);

$blog_date_in_title_ql_mark_hover_color = new QodeField("color","blog_date_in_title_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_date_in_title_ql_mark_hover_color",$blog_date_in_title_ql_mark_hover_color);

$group8 = new QodeGroup("Blog List Spacing","Set spacing for blog layouts");
$panel3->addChild("group8",$group8);

$row1 = new QodeRow();
$group8->addChild("row1",$row1);

$blog_date_in_title_image_margin_bottom = new QodeField("textsimple","blog_date_in_title_image_margin_bottom","","Margin Under Image (px)","This is some description");
$row1->addChild("blog_date_in_title_image_margin_bottom",$blog_date_in_title_image_margin_bottom);

$blog_date_in_title_title_margin_bottom = new QodeField("textsimple","blog_date_in_title_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_date_in_title_title_margin_bottom",$blog_date_in_title_title_margin_bottom);

$blog_date_in_title_post_info_margin_top = new QodeField("textsimple","blog_date_in_title_post_info_margin_top","","Margin Above Post Info (px)","This is some description");
$row1->addChild("blog_date_in_title_post_info_margin_top",$blog_date_in_title_post_info_margin_top);

$blog_date_in_title_read_more_margin_top = new QodeField("textsimple","blog_date_in_title_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_date_in_title_read_more_margin_top",$blog_date_in_title_read_more_margin_top);

$row2 = new QodeRow();
$group8->addChild("row2",$row2);

$blog_date_in_title_article_margin_bottom = new QodeField("textsimple","blog_date_in_title_article_margin_bottom","","Margin Between Articles (px)","This is some description");
$row2->addChild("blog_date_in_title_article_margin_bottom",$blog_date_in_title_article_margin_bottom);

$blog_date_in_title_article_social_share_list_margin_top = new QodeField("textsimple","blog_date_in_title_article_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row2->addChild("blog_date_in_title_article_social_share_list_margin_top",$blog_date_in_title_article_social_share_list_margin_top);

$group9 = new QodeGroup("Blog List Spacing for Quote and Link Post Type","Set spacing for blog layouts");
$panel3->addChild("group9",$group9);

$row1 = new QodeRow();
$group9->addChild("row1",$row1);

$blog_date_in_title_ql_title_margin_bottom = new QodeField("textsimple","blog_date_in_title_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_date_in_title_ql_title_margin_bottom",$blog_date_in_title_ql_title_margin_bottom);

$blog_date_in_title_ql_quote_author_margin_bottom = new QodeField("textsimple","blog_date_in_title_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_date_in_title_ql_quote_author_margin_bottom",$blog_date_in_title_ql_quote_author_margin_bottom);

$blog_date_in_title_ql_social_share_list_margin_top = new QodeField("textsimple","blog_date_in_title_ql_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row1->addChild("blog_date_in_title_ql_social_share_list_margin_top",$blog_date_in_title_ql_social_share_list_margin_top);

$post_text_styling= new QodeTitle("post_text_styling", "Post Text Style");
$panel3->addChild("post_text_styling", $post_text_styling);

$group2 = new QodeGroup("Post Title","Define title styles in this blog post template.");
$panel3->addChild("group2",$group2);

$row1 = new QodeRow();
$group2->addChild("row1",$row1);

$blog_date_in_title_title_color = new QodeField("colorsimple","blog_date_in_title_title_color","","Text Color","This is some description");
$row1->addChild("blog_date_in_title_title_color",$blog_date_in_title_title_color);

$blog_date_in_title_title_hover_color = new QodeField("colorsimple","blog_date_in_title_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_date_in_title_title_hover_color",$blog_date_in_title_title_hover_color);

$blog_date_in_title_title_date_color = new QodeField("colorsimple","blog_date_in_title_title_date_color","","Date Color","This is some description");
$row1->addChild("blog_date_in_title_title_date_color",$blog_date_in_title_title_date_color);

$blog_date_in_title_title_fontsize = new QodeField("textsimple","blog_date_in_title_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_date_in_title_title_fontsize",$blog_date_in_title_title_fontsize);


$row2 = new QodeRow(true);
$group2->addChild("row2",$row2);

$blog_date_in_title_title_lineheight = new QodeField("textsimple","blog_date_in_title_title_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_date_in_title_title_lineheight",$blog_date_in_title_title_lineheight);

$blog_date_in_title_title_google_fonts = new QodeField("Fontsimple","blog_date_in_title_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_date_in_title_title_google_fonts",$blog_date_in_title_title_google_fonts);

$blog_date_in_title_title_fontstyle = new QodeField("selectblanksimple","blog_date_in_title_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_date_in_title_title_fontstyle",$blog_date_in_title_title_fontstyle);

$blog_date_in_title_title_fontweight = new QodeField("selectblanksimple","blog_date_in_title_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_date_in_title_title_fontweight",$blog_date_in_title_title_fontweight);

$row3 = new QodeRow(true);
$group2->addChild("row3",$row3);

$blog_date_in_title_title_texttransform = new QodeField("selectblanksimple","blog_date_in_title_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_date_in_title_title_texttransform",$blog_date_in_title_title_texttransform);

$blog_date_in_title_title_letterspacing = new QodeField("textsimple","blog_date_in_title_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_date_in_title_title_letterspacing",$blog_date_in_title_title_letterspacing);

$group4 = new QodeGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel3->addChild("group4",$group4);

$row1 = new QodeRow();
$group4->addChild("row1",$row1);

$blog_date_in_title_info_color = new QodeField("colorsimple","blog_date_in_title_info_color","","Text Color","This is some description");
$row1->addChild("blog_date_in_title_info_color",$blog_date_in_title_info_color);

$blog_date_in_title_info_link_color = new QodeField("colorsimple","blog_date_in_title_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_date_in_title_info_link_color",$blog_date_in_title_info_link_color);

$blog_date_in_title_info_hover_color = new QodeField("colorsimple","blog_date_in_title_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_date_in_title_info_hover_color",$blog_date_in_title_info_hover_color);

$blog_date_in_title_info_fontsize = new QodeField("textsimple","blog_date_in_title_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_date_in_title_info_fontsize",$blog_date_in_title_info_fontsize);

$row2 = new QodeRow(true);
$group4->addChild("row2",$row2);

$blog_date_in_title_info_lineheight = new QodeField("textsimple","blog_date_in_title_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_date_in_title_info_lineheight",$blog_date_in_title_info_lineheight);

$blog_date_in_title_info_google_fonts = new QodeField("Fontsimple","blog_date_in_title_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_date_in_title_info_google_fonts",$blog_date_in_title_info_google_fonts);

$blog_date_in_title_info_fontstyle = new QodeField("selectblanksimple","blog_date_in_title_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_date_in_title_info_fontstyle",$blog_date_in_title_info_fontstyle);

$blog_date_in_title_info_fontweight = new QodeField("selectblanksimple","blog_date_in_title_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_date_in_title_info_fontweight",$blog_date_in_title_info_fontweight);

$row3 = new QodeRow(true);
$group4->addChild("row3",$row3);

$blog_date_in_title_info_texttransform = new QodeField("selectblanksimple","blog_date_in_title_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_date_in_title_info_texttransform",$blog_date_in_title_info_texttransform);

$blog_date_in_title_info_letterspacing = new QodeField("textsimple","blog_date_in_title_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_date_in_title_info_letterspacing",$blog_date_in_title_info_letterspacing);

$group3 = new QodeGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel3->addChild("group3",$group3);

$row1 = new QodeRow();
$group3->addChild("row1",$row1);


$blog_date_in_title_ql_title_color = new QodeField("colorsimple","blog_date_in_title_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_date_in_title_ql_title_color",$blog_date_in_title_ql_title_color);

$blog_date_in_title_ql_title_date_color = new QodeField("colorsimple","blog_date_in_title_ql_title_date_color","","Date Color","This is some description");
$row1->addChild("blog_date_in_title_ql_title_date_color",$blog_date_in_title_ql_title_date_color);

$blog_date_in_title_ql_title_hover_color = new QodeField("colorsimple","blog_date_in_title_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_date_in_title_ql_title_hover_color",$blog_date_in_title_ql_title_hover_color);

$blog_date_in_title_ql_title_fontsize = new QodeField("textsimple","blog_date_in_title_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_date_in_title_ql_title_font_size",$blog_date_in_title_ql_title_fontsize);


$row2 = new QodeRow(true);
$group3->addChild("row2",$row2);


$blog_date_in_title_ql_title_lineheight = new QodeField("textsimple","blog_date_in_title_ql_title_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_date_in_title_ql_title_lineheight",$blog_date_in_title_ql_title_lineheight);

$blog_date_in_title_ql_title_google_fonts = new QodeField("Fontsimple","blog_date_in_title_ql_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_date_in_title_ql_title_google_fonts",$blog_date_in_title_ql_title_google_fonts);

$blog_date_in_title_ql_title_fontstyle = new QodeField("selectblanksimple","blog_date_in_title_ql_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_date_in_title_ql_title_fontstyle",$blog_date_in_title_ql_title_fontstyle);

$blog_date_in_title_ql_title_fontweight = new QodeField("selectblanksimple","blog_date_in_title_ql_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_date_in_title_ql_title_fontweight",$blog_date_in_title_ql_title_fontweight);

$row3 = new QodeRow(true);
$group3->addChild("row3",$row3);

$blog_date_in_title_ql_title_texttransform = new QodeField("selectblanksimple","blog_date_in_title_ql_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_date_in_title_ql_title_texttransform",$blog_date_in_title_ql_title_texttransform);

$blog_date_in_title_ql_title_letterspacing = new QodeField("textsimple","blog_date_in_title_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_date_in_title_ql_title_letterspacing",$blog_date_in_title_ql_title_letterspacing);


$group5 = new QodeGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list.");
$panel3->addChild("group5",$group5);

$row1 = new QodeRow();
$group5->addChild("row1",$row1);

$blog_date_in_title_ql_info_color = new QodeField("colorsimple","blog_date_in_title_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_date_in_title_ql_info_color",$blog_date_in_title_ql_info_color);

$blog_date_in_title_ql_info_link_color = new QodeField("colorsimple","blog_date_in_title_ql_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_date_in_title_ql_info_link_color",$blog_date_in_title_ql_info_link_color);

$blog_date_in_title_ql_info_hover_color = new QodeField("colorsimple","blog_date_in_title_ql_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_date_in_title_ql_info_hover_color",$blog_date_in_title_ql_info_hover_color);

$blog_date_in_title_ql_info_fontsize = new QodeField("textsimple","blog_date_in_title_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_date_in_title_ql_info_fontsize",$blog_date_in_title_ql_info_fontsize);

$row2 = new QodeRow(true);
$group5->addChild("row2",$row2);

$blog_date_in_title_ql_info_lineheight = new QodeField("textsimple","blog_date_in_title_ql_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_date_in_title_ql_info_lineheight",$blog_date_in_title_ql_info_lineheight);

$blog_date_in_title_ql_info_google_fonts = new QodeField("Fontsimple","blog_date_in_title_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_date_in_title_ql_info_google_fonts",$blog_date_in_title_ql_info_google_fonts);

$blog_date_in_title_ql_info_fontstyle = new QodeField("selectblanksimple","blog_date_in_title_ql_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_date_in_title_ql_info_fontstyle",$blog_date_in_title_ql_info_fontstyle);

$blog_date_in_title_ql_info_fontweight = new QodeField("selectblanksimple","blog_date_in_title_ql_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_date_in_title_ql_info_fontweight",$blog_date_in_title_ql_info_fontweight);

$row3 = new QodeRow(true);
$group5->addChild("row3",$row3);

$blog_date_in_title_ql_info_texttransform = new QodeField("selectblanksimple","blog_date_in_title_ql_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_date_in_title_ql_info_texttransform",$blog_date_in_title_ql_info_texttransform);

$blog_date_in_title_ql_info_letterspacing = new QodeField("textsimple","blog_date_in_title_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_date_in_title_ql_info_letterspacing",$blog_date_in_title_ql_info_letterspacing);

$group6 = new QodeGroup("Quote Author Style","Define author styles for Quote articles");
$panel3->addChild("group6",$group6);

$row1 = new QodeRow();
$group6->addChild("row1",$row1);


$blog_date_in_title_ql_author_color = new QodeField("colorsimple","blog_date_in_title_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_date_in_title_ql_author_color",$blog_date_in_title_ql_author_color);

$blog_date_in_title_ql_author_hover_color = new QodeField("colorsimple","blog_date_in_title_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_date_in_title_ql_author_hover_color",$blog_date_in_title_ql_author_hover_color);

$blog_date_in_title_ql_author_fontsize = new QodeField("textsimple","blog_date_in_title_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_date_in_title_ql_author_font_size",$blog_date_in_title_ql_author_fontsize);

$blog_date_in_title_ql_author_lineheight = new QodeField("textsimple","blog_date_in_title_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_date_in_title_ql_author_lineheight",$blog_date_in_title_ql_author_lineheight);

$row2 = new QodeRow(true);
$group6->addChild("row2",$row2);

$blog_date_in_title_ql_author_texttransform = new QodeField("selectblanksimple","blog_date_in_title_ql_author_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_date_in_title_ql_author_texttransform",$blog_date_in_title_ql_author_texttransform);

$blog_date_in_title_ql_author_google_fonts = new QodeField("Fontsimple","blog_date_in_title_ql_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_date_in_title_ql_author_google_fonts",$blog_date_in_title_ql_author_google_fonts);

$blog_date_in_title_ql_author_fontstyle = new QodeField("selectblanksimple","blog_date_in_title_ql_author_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_date_in_title_ql_author_fontstyle",$blog_date_in_title_ql_author_fontstyle);

$blog_date_in_title_ql_author_fontweight = new QodeField("selectblanksimple","blog_date_in_title_ql_author_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_date_in_title_ql_author_fontweight",$blog_date_in_title_ql_author_fontweight);

$row3 = new QodeRow(true);
$group6->addChild("row3",$row3);


$blog_date_in_title_ql_author_letterspacing = new QodeField("textsimple","blog_date_in_title_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_date_in_title_ql_author_letterspacing",$blog_date_in_title_ql_author_letterspacing);

// Blog Post List - Blog: Category & Title First (Centered)
$panel4 = new QodePanel("Blog List Template Options: Category & Title First (Centered)","blog_category_title_first_centered_post_lists", "blog_category_title_first_centered_show_options", "no");
$blogPage->addChild("panel4",$panel4);

$blog_category_title_first_centered_number_of_chars = new QodeField("text","blog_category_title_first_centered_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel4->addChild("blog_category_title_first_centered_number_of_chars",$blog_category_title_first_centered_number_of_chars);

$blog_category_title_first_centered_read_more_button = new QodeField("yesno","blog_category_title_first_centered_read_more_button","yes","Read More Button","Enable Read More Button");
$panel4->addChild("blog_category_title_first_centered_read_more_button",$blog_category_title_first_centered_read_more_button);

$blog_category_title_first_centered_content_position = new QodeField("select","blog_category_title_first_centered_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));
$panel4->addChild("blog_category_title_first_centered_content_position",$blog_category_title_first_centered_content_position);

$blog_category_title_first_centered_post_meta_data_section = new QodeTitle("blog_category_title_first_centered_post_meta_data_section", "Post Info Data Fields");
$panel4->addChild("blog_category_title_first_centered_post_meta_data_section", $blog_category_title_first_centered_post_meta_data_section);

$blog_category_title_first_centered_show_categories = new QodeField("yesno","blog_category_title_first_centered_show_categories","yes","Show Categories","Enabling this option will Show Categories on Post List");
$panel4->addChild("blog_category_title_first_centered_show_categories",$blog_category_title_first_centered_show_categories);

$blog_category_title_first_centered_show_comments = new QodeField("yesno","blog_category_title_first_centered_show_comments","no","Show Comments","Enabling this option will Show Comments on Post List");
$panel4->addChild("blog_category_title_first_centered_show_comments",$blog_category_title_first_centered_show_comments);

$blog_category_title_first_centered_show_author = new QodeField("yesno","blog_category_title_first_centered_show_author","yes","Show Author Name","Enabling this option will show author name on Post List and Blog Post Single");
$panel4->addChild("blog_category_title_first_centered_show_author",$blog_category_title_first_centered_show_author);

$blog_category_title_first_centered_show_date = new QodeField("yesno","blog_category_title_first_centered_show_date","yes","Show Date","Enabling this option will show date on Post List");
$panel4->addChild("blog_category_title_first_centered_hide_date",$blog_category_title_first_centered_show_date);

$blog_category_title_first_centered_show_share = new QodeField("yesno","blog_category_title_first_centered_show_share","yes","Show Share","Enabling this option will show share on Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_category_title_first_centered_share_options_container"));
$panel4->addChild("blog_category_title_first_centered_show_share",$blog_category_title_first_centered_show_share);

$blog_category_title_first_centered_share_options_container = new QodeContainer("blog_category_title_first_centered_share_options_container","blog_category_title_first_centered_show_share","no");
$panel4->addChild("blog_category_title_first_centered_share_options_container",$blog_category_title_first_centered_share_options_container);

$blog_category_title_first_centered_select_share_option = new QodeField("select","blog_category_title_first_centered_select_share_option","list","Social Share Style","Choose Social Share Style for Category and Title Type",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_category_title_first_centered_share_options_container->addChild("blog_category_title_first_centered_select_share_option",$blog_category_title_first_centered_select_share_option);

$blog_category_title_first_centered_share_icon_color = new QodeField("color","blog_category_title_first_centered_share_icon_color","","Icon Color","Choose icon color for share dropdown and list");
$blog_category_title_first_centered_share_options_container->addChild("blog_category_title_first_centered_share_icon_color",$blog_category_title_first_centered_share_icon_color);

$blog_category_title_first_centered_share_icon_hover_color = new QodeField("color","blog_category_title_first_centered_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for share dropdown and list");
$blog_category_title_first_centered_share_options_container->addChild("blog_category_title_first_centered_share_icon_hover_color",$blog_category_title_first_centered_share_icon_hover_color);

$blog_category_title_first_centered_share_background_color = new QodeField("color","blog_category_title_first_centered_share_background_color","","Background Color","Choose background color for share dropdown");
$blog_category_title_first_centered_share_options_container->addChild("blog_category_title_first_centered_share_background_color",$blog_category_title_first_centered_share_background_color);

$blog_category_title_first_centered_like = new QodeField("yesno","blog_category_title_first_centered_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel4->addChild("blog_category_title_first_centered_like",$blog_category_title_first_centered_like);

$blog_category_title_first_centered_post_design_style = new QodeTitle("blog_category_title_first_centered_post_design_style", "Post Design Style");
$panel4->addChild("blog_category_title_first_centered_post_design_style", $blog_category_title_first_centered_post_design_style);

$group1 = new QodeGroup("Separator","Define style for separator used in post between Category Name and Title");
$panel4->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$blog_category_title_first_centered_separator_border_color = new QodeField("colorsimple","blog_category_title_first_centered_separator_border_color","","Separator Color","This is some description");
$row1->addChild("blog_category_title_first_centered_separator_border_color",$blog_category_title_first_centered_separator_border_color);

$blog_category_title_first_centered_separator_width = new QodeField("textsimple","blog_category_title_first_centered_separator_width","","Separator Width (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_separator_width", $blog_category_title_first_centered_separator_width);

$blog_category_title_first_centered_separator_thickness = new QodeField("textsimple","blog_category_title_first_centered_separator_thickness","","Separator Thickness (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_separator_thickness", $blog_category_title_first_centered_separator_thickness);

$blog_category_title_first_centered_enable_text_box = new QodeField("yesno","blog_category_title_first_centered_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_category_title_first_centered_enable_text_box_container"));
$panel4->addChild("blog_category_title_first_centered_enable_text_box",$blog_category_title_first_centered_enable_text_box);

$blog_category_title_first_centered_enable_text_box_container = new QodeContainer("blog_category_title_first_centered_enable_text_box_container","blog_date_in_title_enable_text_box","no");
$panel4->addChild("blog_category_title_first_centered_enable_text_box_container",$blog_category_title_first_centered_enable_text_box_container);

$blog_category_title_first_centered_box_background_color = new QodeField("color","blog_category_title_first_centered_box_background_color","","Background Color","Choose background color for post text box");
$blog_category_title_first_centered_enable_text_box_container->addChild("blog_category_title_first_centered_box_background_color",$blog_category_title_first_centered_box_background_color);

$blog_category_title_first_centered_box_border_color = new QodeField("color","blog_category_title_first_centered_box_border_color","","Border Color","Choose border color for post text box");
$blog_category_title_first_centered_enable_text_box_container->addChild("blog_category_title_first_centered_box_border_color",$blog_category_title_first_centered_box_border_color);

$blog_category_title_first_centered_box_padding = new QodeField("text","blog_category_title_first_centered_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_category_title_first_centered_enable_text_box_container->addChild("blog_category_title_first_centered_box_padding",$blog_category_title_first_centered_box_padding);

$group9 = new QodeGroup("Paragraph","Set paragraph color");
$panel4->addChild("group9",$group9);

$blog_category_title_first_centered_paragraph_color = new QodeField("colorsimple","blog_category_title_first_centered_paragraph_color","","Color","This is some description");
$group9->addChild("blog_category_title_first_centered_paragraph_color",$blog_category_title_first_centered_paragraph_color);

$group2 = new QodeGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel4->addChild("group2",$group2);

$row1 = new QodeRow();
$group2->addChild("row1",$row1);

$blog_category_title_first_centered_ql_background_image = new QodeField("yesnosimple","blog_category_title_first_centered_ql_background_image","no","Background Image","");
$row1->addChild("blog_category_title_first_centered_ql_background_image",$blog_category_title_first_centered_ql_background_image);

$blog_category_title_first_centered_ql_background_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_category_title_first_centered_ql_background_color",$blog_category_title_first_centered_ql_background_color);

$blog_category_title_first_centered_ql_hover_background_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_category_title_first_centered_ql_hover_background_color",$blog_category_title_first_centered_ql_hover_background_color);

$blog_category_title_first_centered_show_ql_mark = new QodeField("yesno","blog_category_title_first_centered_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for Quote/Link Post Format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_category_title_first_centered_show_ql_mark_container"));
$panel4->addChild("blog_category_title_first_centered_show_ql_mark",$blog_category_title_first_centered_show_ql_mark);

$blog_category_title_first_centered_show_ql_mark_container = new QodeContainer("blog_category_title_first_centered_show_ql_mark_container","blog_category_title_first_centered_show_ql_mark","no");
$panel4->addChild("blog_category_title_first_centered_show_ql_mark_container",$blog_category_title_first_centered_show_ql_mark_container);

$row1 = new QodeRow();
$blog_category_title_first_centered_show_ql_mark_container->addChild("row1",$row1);

$blog_category_title_first_centered_ql_mark_color = new QodeField("color","blog_category_title_first_centered_ql_mark_color","","Icon Color","Choose icon color for quote/link post.");
$row1->addChild("blog_category_title_first_centered_ql_mark_color",$blog_category_title_first_centered_ql_mark_color);

$blog_category_title_first_centered_ql_mark_hover_color = new QodeField("color","blog_category_title_first_centered_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_category_title_first_centered_ql_mark_hover_color",$blog_category_title_first_centered_ql_mark_hover_color);

$group10 = new QodeGroup("Blog List Spacing","Set spacing for blog layouts");
$panel4->addChild("group10",$group10);

$row1 = new QodeRow();
$group10->addChild("row1",$row1);

$blog_category_title_first_centered_category_margin_bottom = new QodeField("textsimple","blog_category_title_first_centered_category_margin_bottom","","Margin Under Category (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_category_margin_bottom",$blog_category_title_first_centered_category_margin_bottom);

$blog_category_title_first_centered_title_margin_bottom = new QodeField("textsimple","blog_category_title_first_centered_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_title_margin_bottom",$blog_category_title_first_centered_title_margin_bottom);

$blog_category_title_first_centered_author_margin_bottom = new QodeField("textsimple","blog_category_title_first_centered_author_margin_bottom","","Margin Under Author (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_author_margin_bottom",$blog_category_title_first_centered_author_margin_bottom);

$blog_category_title_first_centered_image_margin_bottom = new QodeField("textsimple","blog_category_title_first_centered_image_margin_bottom","","Margin Under Image (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_image_margin_bottom",$blog_category_title_first_centered_image_margin_bottom);


$row2 = new QodeRow();
$group10->addChild("row2",$row2);

$blog_category_title_first_centered_read_more_margin_top = new QodeField("textsimple","blog_category_title_first_centered_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row2->addChild("blog_category_title_first_centered_read_more_margin_top",$blog_category_title_first_centered_read_more_margin_top);

$blog_category_title_first_centered_post_info_margin_top = new QodeField("textsimple","blog_category_title_first_centered_post_info_margin_top","","Margin Above Post Info (px)","This is some description");
$row2->addChild("blog_category_title_first_centered_post_info_margin_top",$blog_category_title_first_centered_post_info_margin_top);

$blog_category_title_first_centered_article_social_share_list_margin_top = new QodeField("textsimple","blog_category_title_first_centered_article_social_share_list_margin_top","","Margin Above Social List Holder (px)","This is some description");
$row2->addChild("blog_category_title_first_centered_article_social_share_list_margin_top",$blog_category_title_first_centered_article_social_share_list_margin_top);

$blog_category_title_first_centered_article_margin = new QodeField("textsimple","blog_category_title_first_centered_article_margin","","Margin Between Article (px)","This is some description");
$row2->addChild("blog_category_title_first_centered_article_margin",$blog_category_title_first_centered_article_margin);

$group11 = new QodeGroup("Blog List Spacing for Quote and Link Post Type","Set spacing for blog layouts");
$panel4->addChild("group11",$group11);

$row1 = new QodeRow();
$group11->addChild("row1",$row1);

$blog_category_title_first_centered_ql_title_margin_bottom = new QodeField("textsimple","blog_category_title_first_centered_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_title_margin_bottom",$blog_category_title_first_centered_ql_title_margin_bottom);

$blog_category_title_first_centered_ql_icon_margin_bottom = new QodeField("textsimple","blog_category_title_first_centered_ql_icon_margin_bottom","","Margin Under Quote/Link Icon (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_icon_margin_bottom",$blog_category_title_first_centered_ql_icon_margin_bottom);

$blog_category_title_first_centered_ql_quote_author_margin_bottom = new QodeField("textsimple","blog_category_title_first_centered_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_quote_author_margin_bottom",$blog_category_title_first_centered_ql_quote_author_margin_bottom);

$blog_category_title_first_centered_ql_social_share_list_margin_top = new QodeField("textsimple","blog_category_title_first_centered_ql_social_share_list_margin_top","","Margin Above Social Share List (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_social_share_list_margin_top",$blog_category_title_first_centered_ql_social_share_list_margin_top);

$post_text_styling= new QodeTitle("post_text_styling", "Post Text Style");
$panel4->addChild("post_text_styling", $post_text_styling);

$group3 = new QodeGroup("Post Title","Define title styles in this blog post template.");
$panel4->addChild("group3",$group3);

$row1 = new QodeRow();
$group3->addChild("row1",$row1);

$blog_category_title_first_centered_title_color = new QodeField("colorsimple","blog_category_title_first_centered_title_color","","Text Color","This is some description");
$row1->addChild("blog_category_title_first_centered_title_color",$blog_category_title_first_centered_title_color);

$blog_category_title_first_centered_title_hover_color = new QodeField("colorsimple","blog_category_title_first_centered_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_category_title_first_centered_title_hover_color",$blog_category_title_first_centered_title_hover_color);

$blog_category_title_first_centered_title_fontsize = new QodeField("textsimple","blog_category_title_first_centered_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_title_fontsize",$blog_category_title_first_centered_title_fontsize);

$blog_category_title_first_centered_title_lineheight = new QodeField("textsimple","blog_category_title_first_centered_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_title_lineheight",$blog_category_title_first_centered_title_lineheight);

$row2 = new QodeRow(true);
$group3->addChild("row2",$row2);

$blog_category_title_first_centered_title_texttransform = new QodeField("selectblanksimple","blog_category_title_first_centered_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_category_title_first_centered_title_texttransform",$blog_category_title_first_centered_title_texttransform);

$blog_category_title_first_centered_title_google_fonts = new QodeField("Fontsimple","blog_category_title_first_centered_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_category_title_first_centered_title_google_fonts",$blog_category_title_first_centered_title_google_fonts);

$blog_category_title_first_centered_title_fontstyle = new QodeField("selectblanksimple","blog_category_title_first_centered_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_category_title_first_centered_title_fontstyle",$blog_category_title_first_centered_title_fontstyle);

$blog_category_title_first_centered_title_fontweight = new QodeField("selectblanksimple","blog_category_title_first_centered_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_category_title_first_centered_title_fontweight",$blog_category_title_first_centered_title_fontweight);

$row3 = new QodeRow(true);
$group3->addChild("row3",$row3);

$blog_category_title_first_centered_title_letterspacing = new QodeField("textsimple","blog_category_title_first_centered_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_category_title_first_centered_title_letterspacing",$blog_category_title_first_centered_title_letterspacing);

$group4 = new QodeGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel4->addChild("group4",$group4);

$row1 = new QodeRow();
$group4->addChild("row1",$row1);

$blog_category_title_first_centered_info_color = new QodeField("colorsimple","blog_category_title_first_centered_info_color","","Text Color","This is some description");
$row1->addChild("blog_category_title_first_centered_info_color",$blog_category_title_first_centered_info_color);

$blog_category_title_first_centered_info_link_color = new QodeField("colorsimple","blog_category_title_first_centered_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_category_title_first_centered_info_link_color",$blog_category_title_first_centered_info_link_color);

$blog_category_title_first_centered_info_hover_color = new QodeField("colorsimple","blog_category_title_first_centered_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_category_title_first_centered_info_hover_color",$blog_category_title_first_centered_info_hover_color);


$blog_category_title_first_centered_info_fontsize = new QodeField("textsimple","blog_category_title_first_centered_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_info_font_size",$blog_category_title_first_centered_info_fontsize);

$row2 = new QodeRow(true);
$group4->addChild("row2",$row2);


$blog_category_title_first_centered_info_lineheight = new QodeField("textsimple","blog_category_title_first_centered_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_category_title_first_centered_info_lineheight",$blog_category_title_first_centered_info_lineheight);

$blog_category_title_first_centered_info_google_fonts = new QodeField("Fontsimple","blog_category_title_first_centered_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_category_title_first_centered_info_google_fonts",$blog_category_title_first_centered_info_google_fonts);

$blog_category_title_first_centered_info_fontstyle = new QodeField("selectblanksimple","blog_category_title_first_centered_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_category_title_first_centered_info_fontstyle",$blog_category_title_first_centered_info_fontstyle);

$blog_category_title_first_centered_info_fontweight = new QodeField("selectblanksimple","blog_category_title_first_centered_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_category_title_first_centered_info_fontweight",$blog_category_title_first_centered_info_fontweight);

$row3 = new QodeRow(true);
$group4->addChild("row3",$row3);

$blog_category_title_first_centered_info_texttransform = new QodeField("selectblanksimple","blog_category_title_first_centered_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_category_title_first_centered_info_texttransform",$blog_category_title_first_centered_info_texttransform);

$blog_category_title_first_centered_info_letterspacing = new QodeField("textsimple","blog_category_title_first_centered_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_category_title_first_centered_info_letterspacing",$blog_category_title_first_centered_info_letterspacing);

$group6 = new QodeGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel4->addChild("group6",$group6);

$row1 = new QodeRow();
$group6->addChild("row1",$row1);

$blog_category_title_first_centered_ql_title_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_title_color",$blog_category_title_first_centered_ql_title_color);

$blog_category_title_first_centered_ql_title_hover_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_title_hover_color",$blog_category_title_first_centered_ql_title_hover_color);

$blog_category_title_first_centered_ql_title_fontsize = new QodeField("textsimple","blog_category_title_first_centered_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_title_fontsize",$blog_category_title_first_centered_ql_title_fontsize);

$blog_category_title_first_centered_ql_title_lineheight = new QodeField("textsimple","blog_category_title_first_centered_ql_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_title_lineheight",$blog_category_title_first_centered_ql_title_lineheight);

$row2 = new QodeRow(true);
$group6->addChild("row2",$row2);

$blog_category_title_first_centered_ql_title_texttransform = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_category_title_first_centered_ql_title_texttransform",$blog_category_title_first_centered_ql_title_texttransform);

$blog_category_title_first_centered_ql_title_fontfamily = new QodeField("Fontsimple","blog_category_title_first_centered_ql_title_fontfamily","-1","Font Family","This is some description");
$row2->addChild("blog_category_title_first_centered_ql_title_fontfamily",$blog_category_title_first_centered_ql_title_fontfamily);

$blog_category_title_first_centered_ql_title_fontstyle = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_category_title_first_centered_ql_title_fontstyle",$blog_category_title_first_centered_ql_title_fontstyle);

$blog_category_title_first_centered_ql_title_fontweight = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_category_title_first_centered_ql_title_fontweight",$blog_category_title_first_centered_ql_title_fontweight);

$row3 = new QodeRow(true);
$group6->addChild("row3",$row3);

$blog_category_title_first_centered_ql_title_letterspacing = new QodeField("textsimple","blog_category_title_first_centered_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_category_title_first_centered_ql_title_letterspacing",$blog_category_title_first_centered_ql_title_letterspacing);

$group7 = new QodeGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names, etc.) Note: Single Posts will take the same styles as in list.");
$panel4->addChild("group7",$group7);

$row1 = new QodeRow();
$group7->addChild("row1",$row1);

$blog_category_title_first_centered_ql_info_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_info_color",$blog_category_title_first_centered_ql_info_color);

$blog_category_title_first_centered_ql_info_link_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_info_link_color",$blog_category_title_first_centered_ql_info_link_color);

$blog_category_title_first_centered_ql_info_hover_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_info_info_color",$blog_category_title_first_centered_ql_info_hover_color);

$blog_category_title_first_centered_ql_info_fontsize = new QodeField("textsimple","blog_category_title_first_centered_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_info_fontsize",$blog_category_title_first_centered_ql_info_fontsize);


$row2 = new QodeRow(true);
$group7->addChild("row2",$row2);

$blog_category_title_first_centered_ql_info_lineheight = new QodeField("textsimple","blog_category_title_first_centered_ql_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_category_title_first_centered_ql_info_lineheight",$blog_category_title_first_centered_ql_info_lineheight);

$blog_category_title_first_centered_ql_info_google_fonts = new QodeField("Fontsimple","blog_category_title_first_centered_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_category_title_first_centered_ql_info_google_fonts",$blog_category_title_first_centered_ql_info_google_fonts);

$blog_category_title_first_centered_ql_info_fontstyle = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_category_title_first_centered_ql_info_fontstyle",$blog_category_title_first_centered_ql_info_fontstyle);

$blog_category_title_first_centered_ql_info_fontweight = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_category_title_first_centered_ql_info_fontweight",$blog_category_title_first_centered_ql_info_fontweight);

$row3 = new QodeRow(true);
$group7->addChild("row3",$row3);

$blog_category_title_first_centered_ql_info_texttransform = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_category_title_first_centered_ql_info_texttransform",$blog_category_title_first_centered_ql_info_texttransform);

$blog_category_title_first_centered_ql_info_letterspacing = new QodeField("textsimple","blog_category_title_first_centered_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_category_title_first_centered_ql_info_letterspacing",$blog_category_title_first_centered_ql_info_letterspacing); 

$group8 = new QodeGroup("Quote Author Style","Define author styles for Quote articles");
$panel4->addChild("group8",$group8);

$row1 = new QodeRow();
$group8->addChild("row1",$row1);

$blog_category_title_first_centered_ql_author_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_author_color",$blog_category_title_first_centered_ql_author_color);

$blog_category_title_first_centered_ql_author_hover_color = new QodeField("colorsimple","blog_category_title_first_centered_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_author_hover_color",$blog_category_title_first_centered_ql_author_hover_color);

$blog_category_title_first_centered_ql_author_fontsize = new QodeField("textsimple","blog_category_title_first_centered_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_author_fontsize",$blog_category_title_first_centered_ql_author_fontsize);

$blog_category_title_first_centered_ql_author_lineheight = new QodeField("textsimple","blog_category_title_first_centered_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_category_title_first_centered_ql_author_lineheight",$blog_category_title_first_centered_ql_author_lineheight);

$row2 = new QodeRow(true);
$group8->addChild("row2",$row2);

$blog_category_title_first_centered_ql_author_texttransform = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_author_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_category_title_first_centered_ql_author_texttransform",$blog_category_title_first_centered_ql_author_texttransform);

$blog_category_title_first_centered_ql_author_fontfamily = new QodeField("Fontsimple","blog_category_title_first_centered_ql_author_fontfamily","-1","Font Family","This is some description");
$row2->addChild("blog_category_title_first_centered_ql_author_fontfamily",$blog_category_title_first_centered_ql_author_fontfamily);

$blog_category_title_first_centered_ql_author_fontstyle = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_author_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_category_title_first_centered_ql_author_fontstyle",$blog_category_title_first_centered_ql_author_fontstyle);

$blog_category_title_first_centered_ql_author_fontweight = new QodeField("selectblanksimple","blog_category_title_first_centered_ql_author_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_category_title_first_centered_ql_author_fontweight",$blog_category_title_first_centered_ql_author_fontweight);

$row3 = new QodeRow(true);
$group8->addChild("row3",$row3);

$blog_category_title_first_centered_ql_author_letterspacing = new QodeField("textsimple","blog_category_title_first_centered_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_category_title_first_centered_ql_author_letterspacing",$blog_category_title_first_centered_ql_author_letterspacing);

// Blog Post List - Blog:TITLE & AUTHOR (CENTERED)
$panel8 = new QodePanel("Blog List Template Options: Title & Author (Centered)","blog_title_author_centered_post_lists", "blog_title_author_centered_show_options", "no");
$blogPage->addChild("panel8",$panel8);

$blog_title_author_centered_number_of_chars = new QodeField("text","blog_title_author_centered_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel8->addChild("blog_title_author_centered_number_of_chars",$blog_title_author_centered_number_of_chars);

$blog_title_author_centered_read_more_button = new QodeField("yesno","blog_title_author_centered_read_more_button","yes","Read More Button","Enable Read More Button");
$panel8->addChild("blog_title_author_centered_read_more_button",$blog_title_author_centered_read_more_button);

$blog_title_author_centered_content_position = new QodeField("select","blog_title_author_centered_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));
$panel8->addChild("blog_title_author_centered_content_position",$blog_title_author_centered_content_position);

$blog_title_author_centered_post_meta_data_section = new QodeTitle("blog_title_author_centered_post_meta_data_section", "Post Info Data Fields");
$panel8->addChild("blog_title_author_centered_post_meta_data_section", $blog_title_author_centered_post_meta_data_section);

$blog_title_author_centered_show_categories = new QodeField("yesno","blog_title_author_centered_show_categories","no","Show Categories","Enabling this option will Show Categories on Post List");
$panel8->addChild("blog_title_author_centered_show_categories",$blog_title_author_centered_show_categories);

$blog_title_author_centered_show_comments = new QodeField("yesno","blog_title_author_centered_show_comments","no","Show Comments","Enabling this option will Show Comments on Post List");
$panel8->addChild("blog_title_author_centered_show_comments",$blog_title_author_centered_show_comments);

$blog_title_author_centered_show_author = new QodeField("yesno","blog_title_author_centered_show_author","yes","Show Author Name","Enabling this option will show author name on Post List and Blog Post Single");
$panel8->addChild("blog_title_author_centered_show_author",$blog_title_author_centered_show_author);

$blog_title_author_centered_show_date = new QodeField("yesno","blog_title_author_centered_show_date","no","Show Date","Enabling this option will show date on Post List");
$panel8->addChild("blog_title_author_centered_hide_date",$blog_title_author_centered_show_date);

$blog_title_author_centered_show_share = new QodeField("yesno","blog_title_author_centered_show_share","no","Show Share","Enabling this option will show share on Post List",array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_title_author_centered_share_options_container"));
$panel8->addChild("blog_title_author_centered_show_share",$blog_title_author_centered_show_share);

$blog_title_author_centered_share_options_container = new QodeContainer("blog_title_author_centered_share_options_container","blog_title_author_centered_show_share","no");
$panel8->addChild("blog_title_author_centered_share_options_container",$blog_title_author_centered_share_options_container);

$blog_title_author_centered_select_share_option = new QodeField("select","blog_title_author_centered_select_share_option","dropdown","Social Share Style","Choose Social Share Style for Title and Aythor Template",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_title_author_centered_share_options_container->addChild("blog_title_author_centered_select_share_option",$blog_title_author_centered_select_share_option);

$blog_title_author_centered_share_icon_color = new QodeField("color","blog_title_author_centered_share_icon_color","","Icon Color","Choose icon color for share dropdown");
$blog_title_author_centered_share_options_container->addChild("blog_title_author_centered_share_icon_color",$blog_title_author_centered_share_icon_color);

$blog_title_author_centered_share_icon_hover_color = new QodeField("color","blog_title_author_centered_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for share dropdown");
$blog_title_author_centered_share_options_container->addChild("blog_title_author_centered_share_icon_hover_color",$blog_title_author_centered_share_icon_hover_color);

$blog_title_author_centered_share_background_color = new QodeField("color","blog_title_author_centered_share_background_color","","Background Color","Choose background color for share dropdown list field");
$blog_title_author_centered_share_options_container->addChild("blog_title_author_centered_share_background_color",$blog_title_author_centered_share_background_color);

$blog_title_author_centered_like = new QodeField("yesno","blog_title_author_centered_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel8->addChild("blog_title_author_centered_like",$blog_title_author_centered_like);

$blog_title_author_centered_post_design_style = new QodeTitle("blog_title_author_centered_post_design_style", "Post Design Style");
$panel8->addChild("blog_title_author_centered_post_design_style", $blog_title_author_centered_post_design_style);

$blog_title_author_centered_enable_separator = new QodeField("yesno","blog_title_author_centered_enable_separator","no","Enable Separator Under Post Title","", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_title_author_centered_enable_separator_container"));
$panel8->addChild("blog_title_author_centered_enable_separator",$blog_title_author_centered_enable_separator);

$blog_title_author_centered_enable_separator_container = new QodeContainer("blog_title_author_centered_enable_separator_container","blog_title_author_centered_enable_separator","no");
$panel8->addChild("blog_title_author_centered_enable_separator_container",$blog_title_author_centered_enable_separator_container);

$blog_title_author_centered_separator_color = new QodeField("color","blog_title_author_centered_separator_color","","Color","Default color is #b2b2b2.");
$blog_title_author_centered_enable_separator_container->addChild("blog_title_author_centered_separator_color",$blog_title_author_centered_separator_color);

$blog_title_author_centered_separator_width = new QodeField("text","blog_title_author_centered_separator_width","","Width","Default value is 27px.");
$blog_title_author_centered_enable_separator_container->addChild("blog_title_author_centered_separator_width",$blog_title_author_centered_separator_width);

$blog_title_author_centered_separator_thickness = new QodeField("text","blog_title_author_centered_separator_thickness","","Thickness","Default value is 1px.");
$blog_title_author_centered_enable_separator_container->addChild("blog_title_author_centered_separator_thickness",$blog_title_author_centered_separator_thickness);

$blog_title_author_centered_enable_text_box = new QodeField("yesno","blog_title_author_centered_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_title_author_centered_enable_text_box_container"));
$panel8->addChild("blog_title_author_centered_enable_text_box",$blog_title_author_centered_enable_text_box);

$blog_title_author_centered_enable_text_box_container = new QodeContainer("blog_title_author_centered_enable_text_box_container","blog_title_author_centered_enable_text_box","no");
$panel8->addChild("blog_title_author_centered_enable_text_box_container",$blog_title_author_centered_enable_text_box_container);

$blog_title_author_centered_box_background_color = new QodeField("color","blog_title_author_centered_box_background_color","","Background Color","Choose background color for post text box");
$blog_title_author_centered_enable_text_box_container->addChild("blog_title_author_centered_box_background_color",$blog_title_author_centered_box_background_color);

$blog_title_author_centered_box_border_color = new QodeField("color","blog_title_author_centered_box_border_color","","Border Color","Choose border color for post text box");
$blog_title_author_centered_enable_text_box_container->addChild("blog_title_author_centered_box_border_color",$blog_title_author_centered_box_border_color);

$blog_title_author_centered_box_padding = new QodeField("text","blog_title_author_centered_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_title_author_centered_enable_text_box_container->addChild("blog_title_author_centered_box_padding",$blog_title_author_centered_box_padding);

$group9 = new QodeGroup("Paragraph","Set paragraph color");
$panel8->addChild("group9",$group9);

$blog_title_author_centered_paragraph_color = new QodeField("colorsimple","blog_title_author_centered_paragraph_color","","Color","This is some description");
$group9->addChild("blog_title_author_centered_paragraph_color",$blog_title_author_centered_paragraph_color);

$group2 = new QodeGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel8->addChild("group2",$group2);

$row1 = new QodeRow();
$group2->addChild("row1",$row1);

$blog_title_author_centered_ql_background_image = new QodeField("yesnosimple","blog_title_author_centered_ql_background_image","no","Background Image","");
$row1->addChild("blog_title_author_centered_ql_background_image",$blog_title_author_centered_ql_background_image);

$blog_title_author_centered_ql_background_color = new QodeField("colorsimple","blog_title_author_centered_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_title_author_centered_ql_background_color",$blog_title_author_centered_ql_background_color);

$blog_title_author_centered_ql_hover_background_color = new QodeField("colorsimple","blog_title_author_centered_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_title_author_centered_ql_hover_background_color",$blog_title_author_centered_ql_hover_background_color);

$blog_title_author_centered_show_ql_mark = new QodeField("yesno","blog_title_author_centered_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for Quote/Link Post Format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_title_author_centered_show_ql_mark_container"));
$panel8->addChild("blog_title_author_centered_show_ql_mark",$blog_title_author_centered_show_ql_mark);

$blog_title_author_centered_show_ql_mark_container = new QodeContainer("blog_title_author_centered_show_ql_mark_container","blog_title_author_centered_show_ql_mark","no");
$panel8->addChild("blog_title_author_centered_show_ql_mark_container",$blog_title_author_centered_show_ql_mark_container);

$row1 = new QodeRow();
$blog_title_author_centered_show_ql_mark_container->addChild("row1",$row1);

$blog_title_author_centered_ql_mark_color = new QodeField("color","blog_title_author_centered_ql_mark_color","","Icon Color","Choose icon color for quote/link post.");
$row1->addChild("blog_title_author_centered_ql_mark_color",$blog_title_author_centered_ql_mark_color);

$blog_title_author_centered_ql_mark_hover_color = new QodeField("color","blog_title_author_centered_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_title_author_centered_ql_mark_hover_color",$blog_title_author_centered_ql_mark_hover_color);

$group10 = new QodeGroup("Blog List Spacing","Set spacing for blog layouts");
$panel8->addChild("group10",$group10);

$row1 = new QodeRow();
$group10->addChild("row1",$row1);

$blog_title_author_centered_image_margin_bottom = new QodeField("textsimple","blog_title_author_centered_image_margin_bottom","","Margin Under Image (px)","This is some description");
$row1->addChild("blog_title_author_centered_image_margin_bottom",$blog_title_author_centered_image_margin_bottom);

$blog_title_author_centered_title_margin_bottom = new QodeField("textsimple","blog_title_author_centered_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_title_author_centered_title_margin_bottom",$blog_title_author_centered_title_margin_bottom);

$blog_title_author_centered_post_author_margin_bottom = new QodeField("textsimple","blog_title_author_centered_post_author_margin_bottom","","Margin Under Post Author (px)","This is some description");
$row1->addChild("blog_title_author_centered_post_author_margin_bottom",$blog_title_author_centered_post_author_margin_bottom);

$blog_title_author_centered_read_more_margin_top = new QodeField("textsimple","blog_title_author_centered_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_title_author_centered_read_more_margin_top",$blog_title_author_centered_read_more_margin_top);

$row2 = new QodeRow();
$group10->addChild("row2",$row2);

$blog_title_author_centered_post_info_margin_top = new QodeField("textsimple","blog_title_author_centered_post_info_margin_top","","Margin Above Post Info (px)","This is some description");
$row2->addChild("blog_title_author_centered_post_info_margin_top",$blog_title_author_centered_post_info_margin_top);

$blog_title_author_centered_social_share_list_margin_top = new QodeField("textsimple","blog_title_author_centered_social_share_list_margin_top","","Margin Above Social Share List (px)","This is some description");
$row2->addChild("blog_title_author_centered_social_share_list_margin_top",$blog_title_author_centered_social_share_list_margin_top);

$blog_title_author_centered_article_margin_bottom = new QodeField("textsimple","blog_title_author_centered_article_margin_bottom","","Margin Between Articles (px)","This is some description");
$row2->addChild("blog_title_author_centered_article_margin_bottom",$blog_title_author_centered_article_margin_bottom);

$group11 = new QodeGroup("Blog List Spacing for Link and Quote Post Type","Set spacing for blog layouts");
$panel8->addChild("group11",$group11);

$row1 = new QodeRow();
$group11->addChild("row1",$row1);

$blog_title_author_centered_ql_title_margin_bottom = new QodeField("textsimple","blog_title_author_centered_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_title_margin_bottom",$blog_title_author_centered_ql_title_margin_bottom);

$blog_title_author_centered_ql_icon_margin_bottom = new QodeField("textsimple","blog_title_author_centered_ql_icon_margin_bottom","","Margin Under Quote/Link Icon (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_icon_margin_bottom",$blog_title_author_centered_ql_icon_margin_bottom);

$blog_title_author_centered_ql_social_share_list_margin_top = new QodeField("textsimple","blog_title_author_centered_ql_social_share_list_margin_top","","Margin Above Social Share List (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_social_share_list_margin_top",$blog_title_author_centered_ql_social_share_list_margin_top);

$blog_title_author_centered_ql_quote_author_margin_bottom = new QodeField("textsimple","blog_title_author_centered_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_quote_author_margin_bottom",$blog_title_author_centered_ql_quote_author_margin_bottom);

$post_text_styling= new QodeTitle("post_text_styling", "Post Text Style");
$panel8->addChild("post_text_styling", $post_text_styling);

$group3 = new QodeGroup("Post Title","Define title styles in this blog post template.");
$panel8->addChild("group3",$group3);

$row1 = new QodeRow();
$group3->addChild("row1",$row1);

$blog_title_author_centered_title_color = new QodeField("colorsimple","blog_title_author_centered_title_color","","Text Color","This is some description");
$row1->addChild("blog_title_author_centered_title_color",$blog_title_author_centered_title_color);

$blog_title_author_centered_title_hover_color = new QodeField("colorsimple","blog_title_author_centered_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_title_author_centered_title_hover_color",$blog_title_author_centered_title_hover_color);

$blog_title_author_centered_title_fontsize = new QodeField("textsimple","blog_title_author_centered_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_title_author_centered_title_fontsize",$blog_title_author_centered_title_fontsize);

$blog_title_author_centered_title_lineheight = new QodeField("textsimple","blog_title_author_centered_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_title_author_centered_title_lineheight",$blog_title_author_centered_title_lineheight);

$row2 = new QodeRow(true);
$group3->addChild("row2",$row2);

$blog_title_author_centered_title_texttransform = new QodeField("selectblanksimple","blog_title_author_centered_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_title_author_centered_title_texttransform",$blog_title_author_centered_title_texttransform);

$blog_title_author_centered_title_google_fonts = new QodeField("Fontsimple","blog_title_author_centered_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_title_author_centered_title_google_fonts",$blog_title_author_centered_title_google_fonts);

$blog_title_author_centered_title_fontstyle = new QodeField("selectblanksimple","blog_title_author_centered_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_title_author_centered_title_fontstyle",$blog_title_author_centered_title_fontstyle);

$blog_title_author_centered_title_fontweight = new QodeField("selectblanksimple","blog_title_author_centered_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_title_author_centered_title_fontweight",$blog_title_author_centered_title_fontweight);

$row3 = new QodeRow(true);
$group3->addChild("row3",$row3);

$blog_title_author_centered_title_letterspacing = new QodeField("textsimple","blog_title_author_centered_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_title_author_centered_title_letterspacing",$blog_title_author_centered_title_letterspacing);

$group4 = new QodeGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel8->addChild("group4",$group4);

$row1 = new QodeRow();
$group4->addChild("row1",$row1);

$blog_title_author_centered_info_color = new QodeField("colorsimple","blog_title_author_centered_info_color","","Text Color","This is some description");
$row1->addChild("blog_title_author_centered_info_color",$blog_title_author_centered_info_color);

$blog_title_author_centered_info_link_color = new QodeField("colorsimple","blog_title_author_centered_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_title_author_centered_info_link_color",$blog_title_author_centered_info_link_color);

$blog_title_author_centered_info_hover_color = new QodeField("colorsimple","blog_title_author_centered_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_title_author_centered_info_hover_color",$blog_title_author_centered_info_hover_color);

$blog_title_author_centered_info_fontsize = new QodeField("textsimple","blog_title_author_centered_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_title_author_centered_info_fontsize",$blog_title_author_centered_info_fontsize);


$row2 = new QodeRow(true);
$group4->addChild("row2",$row2);

$blog_title_author_centered_info_lineheight = new QodeField("textsimple","blog_title_author_centered_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_title_author_centered_info_lineheight",$blog_title_author_centered_info_lineheight);

$blog_title_author_centered_info_google_fonts = new QodeField("Fontsimple","blog_title_author_centered_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_title_author_centered_info_google_fonts",$blog_title_author_centered_info_google_fonts);

$blog_title_author_centered_info_fontstyle = new QodeField("selectblanksimple","blog_title_author_centered_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_title_author_centered_info_fontstyle",$blog_title_author_centered_info_fontstyle);

$blog_title_author_centered_info_fontweight = new QodeField("selectblanksimple","blog_title_author_centered_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_title_author_centered_info_fontweight",$blog_title_author_centered_info_fontweight);

$row3 = new QodeRow(true);
$group4->addChild("row3",$row3);

$blog_title_author_centered_info_letterspacing = new QodeField("textsimple","blog_title_author_centered_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_title_author_centered_info_letterspacing",$blog_title_author_centered_info_letterspacing);

$blog_title_author_centered_info_texttransform = new QodeField("selectblanksimple","blog_title_author_centered_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_title_author_centered_info_texttransform",$blog_title_author_centered_info_texttransform);


$group5 = new QodeGroup("Post Author","Define author styles in this blog post template.");
$panel8->addChild("group5",$group5);

$row1 = new QodeRow();
$group5->addChild("row1",$row1);

$blog_title_author_centered_author_color = new QodeField("colorsimple","blog_title_author_centered_author_color","","Text Color","This is some description");
$row1->addChild("blog_title_author_centered_author_color",$blog_title_author_centered_author_color);

$blog_title_author_centered_author_link_color = new QodeField("colorsimple","blog_title_author_centered_author_link_color","","Link Color","This is some description");
$row1->addChild("blog_title_author_centered_author_link_color",$blog_title_author_centered_author_link_color);

$blog_title_author_centered_author_hover_color = new QodeField("colorsimple","blog_title_author_centered_author_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_title_author_centered_author_hover_color",$blog_title_author_centered_author_hover_color);

$blog_title_author_centered_author_fontsize = new QodeField("textsimple","blog_title_author_centered_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_title_author_centered_author_fontsize",$blog_title_author_centered_author_fontsize);


$row2 = new QodeRow(true);
$group5->addChild("row2",$row2);

$blog_title_author_centered_author_lineheight = new QodeField("textsimple","blog_title_author_centered_author_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_title_author_centered_author_lineheight",$blog_title_author_centered_author_lineheight);


$blog_title_author_centered_author_google_fonts = new QodeField("Fontsimple","blog_title_author_centered_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_title_author_centered_author_google_fonts",$blog_title_author_centered_author_google_fonts);

$blog_title_author_centered_author_fontstyle = new QodeField("selectblanksimple","blog_title_author_centered_author_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_title_author_centered_author_fontstyle",$blog_title_author_centered_author_fontstyle);

$blog_title_author_centered_author_fontweight = new QodeField("selectblanksimple","blog_title_author_centered_author_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_title_author_centered_author_fontweight",$blog_title_author_centered_author_fontweight);

$row3 = new QodeRow(true);
$group5->addChild("row3",$row3);

$blog_title_author_centered_author_texttransform = new QodeField("selectblanksimple","blog_title_author_centered_author_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_title_author_centered_author_texttransform",$blog_title_author_centered_author_texttransform);

$blog_title_author_centered_author_letterspacing = new QodeField("textsimple","blog_title_author_centered_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_title_author_centered_author_letterspacing",$blog_title_author_centered_author_letterspacing);

$group6 = new QodeGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel8->addChild("group6",$group6);

$row1 = new QodeRow();
$group6->addChild("row1",$row1);

$blog_title_author_centered_ql_title_color = new QodeField("colorsimple","blog_title_author_centered_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_title_author_centered_ql_title_color",$blog_title_author_centered_ql_title_color);

$blog_title_author_centered_ql_title_hover_color = new QodeField("colorsimple","blog_title_author_centered_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_title_author_centered_ql_title_hover_color",$blog_title_author_centered_ql_title_hover_color);

$blog_title_author_centered_ql_title_fontsize = new QodeField("textsimple","blog_title_author_centered_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_title_font_size",$blog_title_author_centered_ql_title_fontsize);

$blog_title_author_centered_ql_title_lineheight = new QodeField("textsimple","blog_title_author_centered_ql_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_title_lineheight",$blog_title_author_centered_ql_title_lineheight);


$row2 = new QodeRow(true);
$group6->addChild("row2",$row2);

$blog_title_author_centered_ql_title_texttransform = new QodeField("selectblanksimple","blog_title_author_centered_ql_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_title_author_centered_ql_title_texttransform",$blog_title_author_centered_ql_title_texttransform);

$blog_title_author_centered_ql_title_google_fonts = new QodeField("Fontsimple","blog_title_author_centered_ql_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_title_author_centered_ql_title_google_fonts",$blog_title_author_centered_ql_title_google_fonts);

$blog_title_author_centered_ql_title_fontstyle = new QodeField("selectblanksimple","blog_title_author_centered_ql_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_title_author_centered_ql_title_fontstyle",$blog_title_author_centered_ql_title_fontstyle);

$blog_title_author_centered_ql_title_fontweight = new QodeField("selectblanksimple","blog_title_author_centered_ql_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_title_author_centered_ql_title_fontweight",$blog_title_author_centered_ql_title_fontweight);

$row3 = new QodeRow(true);
$group6->addChild("row3",$row3);

$blog_title_author_centered_ql_title_letterspacing = new QodeField("textsimple","blog_title_author_centered_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_title_author_centered_ql_title_letterspacing",$blog_title_author_centered_ql_title_letterspacing);

$group7 = new QodeGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list.");
$panel8->addChild("group7",$group7);

$row1 = new QodeRow();
$group7->addChild("row1",$row1);

$blog_title_author_centered_ql_info_color = new QodeField("colorsimple","blog_title_author_centered_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_title_author_centered_ql_info_color",$blog_title_author_centered_ql_info_color);

$blog_title_author_centered_ql_info_hover_color = new QodeField("colorsimple","blog_title_author_centered_ql_info_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_title_author_centered_ql_info_hover_color",$blog_title_author_centered_ql_info_hover_color);

$blog_title_author_centered_ql_info_fontsize = new QodeField("textsimple","blog_title_author_centered_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_info_fontsize",$blog_title_author_centered_ql_info_fontsize);

$blog_title_author_centered_ql_info_lineheight = new QodeField("textsimple","blog_title_author_centered_ql_info_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_info_lineheight",$blog_title_author_centered_ql_info_lineheight);

$row2 = new QodeRow(true);
$group7->addChild("row2",$row2);

$blog_title_author_centered_ql_info_texttransform = new QodeField("selectblanksimple","blog_title_author_centered_ql_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_title_author_centered_ql_info_texttransform",$blog_title_author_centered_ql_info_texttransform);

$blog_title_author_centered_ql_info_google_fonts = new QodeField("Fontsimple","blog_title_author_centered_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_title_author_centered_ql_info_google_fonts",$blog_title_author_centered_ql_info_google_fonts);

$blog_title_author_centered_ql_info_fontstyle = new QodeField("selectblanksimple","blog_title_author_centered_ql_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_title_author_centered_ql_info_fontstyle",$blog_title_author_centered_ql_info_fontstyle);

$blog_title_author_centered_ql_info_fontweight = new QodeField("selectblanksimple","blog_title_author_centered_ql_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_title_author_centered_ql_info_fontweight",$blog_title_author_centered_ql_info_fontweight);

$row3 = new QodeRow(true);
$group7->addChild("row3",$row3);

$blog_title_author_centered_ql_info_letterspacing = new QodeField("textsimple","blog_title_author_centered_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_title_author_centered_ql_info_letterspacing",$blog_title_author_centered_ql_info_letterspacing);

$group8 = new QodeGroup("Quote Author Style","Define author styles for Quote articles");
$panel8->addChild("group8",$group8);

$row1 = new QodeRow();
$group8->addChild("row1",$row1);

$blog_title_author_centered_ql_author_color = new QodeField("colorsimple","blog_title_author_centered_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_title_author_centered_ql_author_color",$blog_title_author_centered_ql_author_color);

$blog_title_author_centered_ql_author_hover_color = new QodeField("colorsimple","blog_title_author_centered_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_title_author_centered_ql_author_hover_color",$blog_title_author_centered_ql_author_hover_color);

$blog_title_author_centered_ql_author_fontsize = new QodeField("textsimple","blog_title_author_centered_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_author_font_size",$blog_title_author_centered_ql_author_fontsize);

$blog_title_author_centered_ql_author_lineheight = new QodeField("textsimple","blog_title_author_centered_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_title_author_centered_ql_author_lineheight",$blog_title_author_centered_ql_author_lineheight);


$row2 = new QodeRow(true);
$group8->addChild("row2",$row2);

$blog_title_author_centered_ql_author_texttransform = new QodeField("selectblanksimple","blog_title_author_centered_ql_author_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_title_author_centered_ql_author_texttransform",$blog_title_author_centered_ql_author_texttransform);

$blog_title_author_centered_ql_author_google_fonts = new QodeField("Fontsimple","blog_title_author_centered_ql_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_title_author_centered_ql_author_google_fonts",$blog_title_author_centered_ql_author_google_fonts);

$blog_title_author_centered_ql_author_fontstyle = new QodeField("selectblanksimple","blog_title_author_centered_ql_author_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_title_author_centered_ql_author_fontstyle",$blog_title_author_centered_ql_author_fontstyle);

$blog_title_author_centered_ql_author_fontweight = new QodeField("selectblanksimple","blog_title_author_centered_ql_author_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_title_author_centered_ql_author_fontweight",$blog_title_author_centered_ql_author_fontweight);

$row3 = new QodeRow(true);
$group8->addChild("row3",$row3);

$blog_title_author_centered_ql_author_letterspacing = new QodeField("textsimple","blog_title_author_centered_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_title_author_centered_ql_author_letterspacing",$blog_title_author_centered_ql_author_letterspacing);

// Blog Post List - Blog: Masonry
$panel10 = new QodePanel("Blog List Templates Options: Masonry & Masonry Full Width","blog_masonry_post_lists", "blog_masonry_show_options", "no");
$blogPage->addChild("panel10",$panel10);

$blog_masonry_number_of_chars = new QodeField("text","blog_masonry_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel10->addChild("blog_masonry_number_of_chars",$blog_masonry_number_of_chars);

$blog_masonry_read_more_button = new QodeField("yesno","blog_masonry_read_more_button","no","Read More Button","Enable Read More Button");
$panel10->addChild("blog_masonry_read_more_button",$blog_masonry_read_more_button);

$pagination_masonry = new QodeField("select","pagination_masonry","pagination","Pagination on Masonry",'Choose a pagination style for "Masonry" Blog List', array(
	"pagination" => "Pagination",
	"load_more" => "Load More",
	"infinite_scroll" => "Infinite Scroll"
));
$panel10->addChild("pagination_masonry",$pagination_masonry);

$blog_masonry_filter = new QodeField("yesno","blog_masonry_filter","no","Show Category Filter on Masonry",'Enabling this option will display a Category Filter on "Masonry" Blog List', array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_masonry_filter_container"));
$panel10->addChild("blog_masonry_filter",$blog_masonry_filter);

$blog_masonry_filter_container = new QodeContainer("blog_masonry_filter_container","blog_masonry_filter","no");
$panel10->addChild("blog_masonry_filter_container",$blog_masonry_filter_container);


// Blog Masonry Filter
$blog_masonry_filter_background_color = new QodeField("color","blog_masonry_filter_background_color","","Background Color","Choose color for background of filter area",array(), array("col_width" => 3));
$blog_masonry_filter_container->addChild("blog_masonry_filter_background_color",$blog_masonry_filter_background_color);

$blog_masonry_filter_height = new QodeField("text","blog_masonry_filter_height","","Height (px)","Enter height for filter area",array(), array("col_width" => 3));
$blog_masonry_filter_container->addChild("blog_masonry_filter_height", $blog_masonry_filter_height);

$blog_masonry_filter_margin_bottom = new QodeField("text","blog_masonry_filter_margin_bottom","","Bottom Margin (px)","Enter bottom margin for filter area. Default value is 36",array(), array("col_width" => 3));
$blog_masonry_filter_container->addChild("blog_masonry_filter_margin_bottom",$blog_masonry_filter_margin_bottom);

$blog_masonry_filter_alignment = new QodeField("select","blog_masonry_filter_alignment","","Horizontal Alignment","Choose filter alignment", array(
	"left" => "Left",
	"center" => "Center",
	"right" => "Right"
));
$blog_masonry_filter_container->addChild("blog_masonry_filter_alignment",$blog_masonry_filter_alignment);

$blog_masonry_enable_filter_title = new QodeField("yesno","blog_masonry_enable_filter_title","no","Enable Filter Title","Enabling this option will show category filter title");
$blog_masonry_filter_container->addChild("blog_masonry_enable_filter_title",$blog_masonry_enable_filter_title);

$group1 = new QodeGroup("Title","Define text styles for filter title");
$blog_masonry_filter_container->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);
$blog_masonry_filter_title_color = new QodeField("colorsimple","blog_masonry_filter_title_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_filter_title_color",$blog_masonry_filter_title_color);
$blog_masonry_filter_title_font_size = new QodeField("textsimple","blog_masonry_filter_title_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_filter_title_font_size",$blog_masonry_filter_title_font_size);
$blog_masonry_filter_title_line_height = new QodeField("textsimple","blog_masonry_filter_title_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_filter_title_line_height",$blog_masonry_filter_title_line_height);
$blog_masonry_filter_title_text_transform = new QodeField("selectblanksimple","blog_masonry_filter_title_text_transform","","Text Transform","This is some description",$options_texttransform);
$row1->addChild("blog_masonry_filter_title_text_transform",$blog_masonry_filter_title_text_transform);

$row2 = new QodeRow(true);
$group1->addChild("row2",$row2);
$blog_masonry_filter_title_font_family = new QodeField("Fontsimple","blog_masonry_filter_title_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_filter_title_font_family",$blog_masonry_filter_title_font_family);
$blog_masonry_filter_title_font_style = new QodeField("selectblanksimple","blog_masonry_filter_title_font_style","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_masonry_filter_title_font_style",$blog_masonry_filter_title_font_style);
$blog_masonry_filter_title_font_weight = new QodeField("selectblanksimple","blog_masonry_filter_title_font_weight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_masonry_filter_title_font_weight",$blog_masonry_filter_title_font_weight);
$blog_masonry_filter_title_letter_spacing = new QodeField("textsimple","blog_masonry_filter_title_letter_spacing","","Letter Spacing (px)","This is some description");
$row2->addChild("blog_masonry_filter_title_letter_spacing",$blog_masonry_filter_title_letter_spacing);

$group2 = new QodeGroup("Categories","Define text styles for filter categories");
$blog_masonry_filter_container->addChild("group2",$group2);

$row1 = new QodeRow();
$group2->addChild("row1",$row1);
$blog_masonry_filter_color = new QodeField("colorsimple","blog_masonry_filter_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_filter_color",$blog_masonry_filter_color);
$blog_masonry_filter_hovercolor = new QodeField("colorsimple","blog_masonry_filter_hovercolor","","Hover/Active Color","This is some description");
$row1->addChild("blog_masonry_filter_hovercolor",$blog_masonry_filter_hovercolor);
$blog_masonry_filter_font_size = new QodeField("textsimple","blog_masonry_filter_font_size","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_filter_font_size",$blog_masonry_filter_font_size);
$blog_masonry_filter_line_height = new QodeField("textsimple","blog_masonry_filter_line_height","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_filter_line_height",$blog_masonry_filter_line_height);

$row2 = new QodeRow(true);
$group2->addChild("row2",$row2);
$blog_masonry_filter_font_family = new QodeField("Fontsimple","blog_masonry_filter_font_family","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_filter_font_family",$blog_masonry_filter_font_family);
$blog_masonry_filter_font_style = new QodeField("selectblanksimple","blog_masonry_filter_font_style","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_masonry_filter_font_style",$blog_masonry_filter_font_style);
$blog_masonry_filter_font_weight = new QodeField("selectblanksimple","blog_masonry_filter_font_weight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_masonry_filter_font_weight",$blog_masonry_filter_font_weight);
$blog_masonry_filter_text_transform = new QodeField("selectblanksimple","blog_masonry_filter_text_transform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_masonry_filter_text_transform",$blog_masonry_filter_text_transform);

$row3 = new QodeRow(true);
$group2->addChild("row3",$row3);
$blog_masonry_filter_letter_spacing = new QodeField("textsimple","blog_masonry_filter_letter_spacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_filter_letter_spacing",$blog_masonry_filter_letter_spacing);

$blog_masonry_filter_disable_separator = new QodeField("yesno","blog_masonry_filter_disable_separator","yes","Disable Separator Between Categories","Disabling this option will remove separator between filter categories.");
$blog_masonry_filter_container->addChild("blog_masonry_filter_disable_separator",$blog_masonry_filter_disable_separator);


$blog_masonry_type = new QodeField("select","blog_masonry_type","post_info_below_title","Masonry Type","Choose type for Masonry Blog List", array(
	"post_info_below_title" => "Post Info Section Below Title",
	"post_info_at_bottom" => "Post Info Section at Bottom"
));
$panel10->addChild("blog_masonry_type",$blog_masonry_type);

$blog_masonry_content_position = new QodeField("select","blog_masonry_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));
$panel10->addChild("blog_masonry_content_position",$blog_masonry_content_position);

$blog_masonry_post_meta_data_section = new QodeTitle("blog_masonry_post_meta_data_section", "Post Info Data Fields");
$panel10->addChild("blog_masonry_post_meta_data_section", $blog_masonry_post_meta_data_section);

$blog_masonry_show_categories= new QodeField("yesno","blog_masonry_show_categories","no","Show Categories","Enabling this option will Show Categories on Post List");
$panel10->addChild("blog_masonry_show_categories",$blog_masonry_show_categories);

$blog_masonry_show_comments = new QodeField("yesno","blog_masonry_show_comments","no","Show Comments","Enabling this option will Show Comments on Post List");
$panel10->addChild("blog_masonry_show_comments",$blog_masonry_show_comments);

$blog_masonry_show_author = new QodeField("yesno","blog_masonry_show_author","no","Show Author Name","Enabling this option will show author name on Post List and Blog Post Single");
$panel10->addChild("blog_masonry_show_author",$blog_masonry_show_author);

$blog_masonry_show_date = new QodeField("yesno","blog_masonry_show_date","no","Show Date","Enabling this option will show date on Post List");
$panel10->addChild("blog_masonry_hide_date",$blog_masonry_show_date);

$blog_masonry_show_share = new QodeField("yesno","blog_masonry_show_share","no","Show Share","Enabling this option will show share on Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_masonry_share_options_container"));
$panel10->addChild("blog_masonry_show_share",$blog_masonry_show_share);

$blog_masonry_share_options_container = new QodeContainer("blog_masonry_share_options_container","blog_masonry_show_share","no");
$panel10->addChild("blog_masonry_share_options_container",$blog_masonry_share_options_container);

$blog_masonry_select_share_options_masonry_type = new QodeField("select","blog_masonry_select_share_options_masonry_type","dropdown","Social Share Style","Choose Social Share Style for Masonry Type",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_masonry_share_options_container->addChild("blog_masonry_select_share_options_masonry_type",$blog_masonry_select_share_options_masonry_type);

$blog_masonry_share_icon_color = new QodeField("color","blog_masonry_share_icon_color","","Icon Color","Choose icon color for share dropdown");
$blog_masonry_share_options_container->addChild("blog_masonry_share_icon_color",$blog_masonry_share_icon_color);

$blog_masonry_share_icon_hover_color = new QodeField("color","blog_masonry_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for share dropdown");
$blog_masonry_share_options_container->addChild("blog_masonry_share_icon_hover_color",$blog_masonry_share_icon_hover_color);

$blog_masonry_share_background_color = new QodeField("color","blog_masonry_share_background_color","","Background Color","Choose background color for share dropdown list field");
$blog_masonry_share_options_container->addChild("blog_masonry_share_background_color",$blog_masonry_share_background_color);

$blog_masonry_show_like = new QodeField("yesno","blog_masonry_show_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel10->addChild("blog_masonry_show_like",$blog_masonry_show_like);

$blog_masonry_post_design_style = new QodeTitle("blog_masonry_post_design_style", "Post Design Style");
$panel10->addChild("blog_masonry_post_design_style", $blog_masonry_post_design_style);

$blog_masonry_post_alignment = new QodeField("select","blog_masonry_post_alignment","","Post Alignment","Choose alignment for whole post",array(
	"left" => "Left",
	"center" => "Center",
	"right" => "Right"
));
$panel10->addChild("blog_masonry_post_alignment",$blog_masonry_post_alignment);

$blog_masonry_enable_text_box = new QodeField("yesno","blog_masonry_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_masonry_enable_text_box_container"));
$panel10->addChild("blog_masonry_enable_text_box",$blog_masonry_enable_text_box);

$blog_masonry_enable_text_box_container = new QodeContainer("blog_masonry_enable_text_box_container","blog_masonry_enable_text_box","no");
$panel10->addChild("blog_masonry_enable_text_box_container",$blog_masonry_enable_text_box_container);

$blog_masonry_box_background_color = new QodeField("color","blog_masonry_box_background_color","","Background Color","Choose background color for post text box");
$blog_masonry_enable_text_box_container->addChild("blog_masonry_box_background_color",$blog_masonry_box_background_color);

$blog_masonry_box_border_color = new QodeField("color","blog_masonry_box_border_color","","Border Color","Choose border color for post text box");
$blog_masonry_enable_text_box_container->addChild("blog_masonry_box_border_color",$blog_masonry_box_border_color);

$blog_masonry_box_padding = new QodeField("text","blog_masonry_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_masonry_enable_text_box_container->addChild("blog_masonry_box_padding",$blog_masonry_box_padding);

$group7 = new QodeGroup("Paragraph","Set paragraph color");
$panel10->addChild("group7",$group7);

$blog_masonry_paragraph_color = new QodeField("colorsimple","blog_masonry_paragraph_color","","Color","This is some description");
$group7->addChild("blog_masonry_paragraph_color",$blog_masonry_paragraph_color);

$group1 = new QodeGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel10->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$blog_masonry_ql_background_image = new QodeField("yesnosimple","blog_masonry_ql_background_image","no","Background Image","");
$row1->addChild("blog_masonry_ql_background_image",$blog_masonry_ql_background_image);

$blog_masonry_ql_background_color = new QodeField("colorsimple","blog_masonry_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_masonry_ql_background_color",$blog_masonry_ql_background_color);

$blog_masonry_ql_hover_background_color = new QodeField("colorsimple","blog_masonry_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_masonry_ql_hover_background_color",$blog_masonry_ql_hover_background_color);

$blog_masonry_show_ql_mark = new QodeField("yesno","blog_masonry_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for quote/link post format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_masonry_show_ql_mark_container"));
$panel10->addChild("blog_masonry_show_ql_mark",$blog_masonry_show_ql_mark);

$blog_masonry_show_ql_mark_container = new QodeContainer("blog_masonry_show_ql_mark_container","blog_masonry_show_ql_mark","no");
$panel10->addChild("blog_masonry_show_ql_mark_container",$blog_masonry_show_ql_mark_container);

$row1 = new QodeRow();
$blog_masonry_show_ql_mark_container->addChild("row1",$row1);

$blog_masonry_ql_mark_color = new QodeField("color","blog_masonry_ql_mark_color","","Icon Color","Choose icon color for quote/link post");
$row1->addChild("blog_masonry_ql_mark_color",$blog_masonry_ql_mark_color);

$blog_masonry_ql_mark_hover_color = new QodeField("color","blog_masonry_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_masonry_ql_mark_hover_color",$blog_masonry_ql_mark_hover_color);

$group8 = new QodeGroup("Blog List Spacing","Set spacing for blog layouts");
$panel10->addChild("group8",$group8);

$row1 = new QodeRow();
$group8->addChild("row1",$row1);

$blog_masonry_image_margin_bottom = new QodeField("textsimple","blog_masonry_image_margin_bottom","","Margin Under Image (px)","This is some description");
$row1->addChild("blog_masonry_image_margin_bottom",$blog_masonry_image_margin_bottom);

$blog_masonry_title_margin_bottom = new QodeField("textsimple","blog_masonry_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_masonry_title_margin_bottom",$blog_masonry_title_margin_bottom);

$blog_masonry_post_info_margin_bottom = new QodeField("textsimple","blog_masonry_post_info_margin_bottom","","Margin Under Post Info (px)","This is some description");
$row1->addChild("blog_masonry_post_info_margin_bottom",$blog_masonry_post_info_margin_bottom);

$blog_masonry_read_more_margin_top = new QodeField("textsimple","blog_masonry_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_masonry_read_more_margin_top",$blog_masonry_read_more_margin_top);

$row2 = new QodeRow();
$group8->addChild("row2",$row2);

$blog_masonry_social_share_list_margin_top = new QodeField("textsimple","blog_masonry_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row2->addChild("blog_masonry_social_share_list_margin_top",$blog_masonry_social_share_list_margin_top);

$blog_masonry_article_margin_bottom = new QodeField("textsimple","blog_masonry_article_margin_bottom","","Margin Between Articles (px)","This is some description");
$row2->addChild("blog_masonry_article_margin_bottom",$blog_masonry_article_margin_bottom);

$blog_masonry_post_info_bottom_margin_top = new QodeField("textsimple","blog_masonry_post_info_bottom_margin_top","","Margin Above Post Info When Post Info is on the bottom (px)","This is some description");
$row2->addChild("blog_masonry_post_info_bottom_margin_top",$blog_masonry_post_info_bottom_margin_top);

$group9 = new QodeGroup("Blog List Spacing for Quote and Link Post Type","Set spacing for blog layouts");
$panel10->addChild("group9",$group9);

$row1 = new QodeRow();
$group9->addChild("row1",$row1);

$blog_masonry_ql_title_margin_bottom = new QodeField("textsimple","blog_masonry_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_masonry_ql_title_margin_bottom",$blog_masonry_ql_title_margin_bottom);

$blog_masonry_ql_quote_author_margin_bottom = new QodeField("textsimple","blog_masonry_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_masonry_ql_quote_author_margin_bottom",$blog_masonry_ql_quote_author_margin_bottom);

$blog_masonry_ql_social_share_list_margin_top = new QodeField("textsimple","blog_masonry_ql_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row1->addChild("blog_masonry_ql_social_share_list_margin_top",$blog_masonry_ql_social_share_list_margin_top);


$group10 = new QodeGroup("Border Arround Quote/Link Post Type","Set border style for Quote/Link post type");
$panel10->addChild("group10",$group10);

$row1 = new QodeRow();
$group10->addChild("row1",$row1);

$blog_masonry_ql_article_border_width = new QodeField("textsimple","blog_masonry_ql_article_border_width","","Border Width (px)","This is some description");
$row1->addChild("blog_masonry_ql_article_border_width",$blog_masonry_ql_article_border_width);

$blog_masonry_ql_article_border_color = new QodeField("colorsimple","blog_masonry_ql_article_border_color","","Border Color","This is some description");
$row1->addChild("blog_masonry_ql_article_border_color",$blog_masonry_ql_article_border_color);

$post_text_styling= new QodeTitle("post_text_styling", "Post Text Style");
$panel10->addChild("post_text_styling", $post_text_styling);

$group2 = new QodeGroup("Post Title","Define title styles in this blog post template.");
$panel10->addChild("group2",$group2);

$row1 = new QodeRow();
$group2->addChild("row1",$row1);

$blog_masonry_title_color = new QodeField("colorsimple","blog_masonry_title_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_title_color",$blog_masonry_title_color);

$blog_masonry_title_hover_color = new QodeField("colorsimple","blog_masonry_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_masonry_title_hover_color",$blog_masonry_title_hover_color);

$blog_masonry_title_fontsize = new QodeField("textsimple","blog_masonry_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_title_fontsize",$blog_masonry_title_fontsize);

$row2 = new QodeRow(true);
$group2->addChild("row2",$row2);


$blog_masonry_title_lineheight = new QodeField("textsimple","blog_masonry_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_title_lineheight",$blog_masonry_title_lineheight);


$blog_masonry_title_google_fonts = new QodeField("Fontsimple","blog_masonry_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_title_google_fonts",$blog_masonry_title_google_fonts);

$blog_masonry_title_fontstyle = new QodeField("selectblanksimple","blog_masonry_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_masonry_title_fontstyle",$blog_masonry_title_fontstyle);

$blog_masonry_title_fontweight = new QodeField("selectblanksimple","blog_masonry_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_masonry_title_fontweight",$blog_masonry_title_fontweight);

$row3 = new QodeRow(true);
$group2->addChild("row3",$row3);


$blog_masonry_title_texttransform = new QodeField("selectblanksimple","blog_masonry_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_masonry_title_texttransform",$blog_masonry_title_texttransform);

$blog_masonry_title_letterspacing = new QodeField("textsimple","blog_masonry_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_title_letterspacing",$blog_masonry_title_letterspacing);

$group4 = new QodeGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel10->addChild("group4",$group4);

$row1 = new QodeRow();
$group4->addChild("row1",$row1);

$blog_masonry_info_color = new QodeField("colorsimple","blog_masonry_info_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_info_color",$blog_masonry_info_color);

$blog_masonry_info_link_color = new QodeField("colorsimple","blog_masonry_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_masonry_info_link_color",$blog_masonry_info_link_color);

$blog_masonry_info_hover_color = new QodeField("colorsimple","blog_masonry_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_masonry_info_hover_color",$blog_masonry_info_hover_color);

$blog_masonry_info_fontsize = new QodeField("textsimple","blog_masonry_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_info_fontsize",$blog_masonry_info_fontsize);

$row2 = new QodeRow(true);
$group4->addChild("row2",$row2);


$blog_masonry_info_lineheight = new QodeField("textsimple","blog_masonry_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_masonry_info_lineheight",$blog_masonry_info_lineheight);

$blog_masonry_info_google_fonts = new QodeField("Fontsimple","blog_masonry_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_info_google_fonts",$blog_masonry_info_google_fonts);

$blog_masonry_info_fontstyle = new QodeField("selectblanksimple","blog_masonry_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_masonry_info_fontstyle",$blog_masonry_info_fontstyle);

$blog_masonry_info_fontweight = new QodeField("selectblanksimple","blog_masonry_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_masonry_info_fontweight",$blog_masonry_info_fontweight);

$row3 = new QodeRow(true);
$group4->addChild("row3",$row3);

$blog_masonry_info_texttransform = new QodeField("selectblanksimple","blog_masonry_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_masonry_info_texttransform",$blog_masonry_info_texttransform);

$blog_masonry_info_letterspacing = new QodeField("textsimple","blog_masonry_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_info_letterspacing",$blog_masonry_info_letterspacing);

$blog_masonry_info_margin = new QodeField("textsimple","blog_masonry_info_margin","","Margin (px)","This is some description");
$row3->addChild("blog_masonry_info_margin",$blog_masonry_info_margin);

$group3 = new QodeGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel10->addChild("group3",$group3);

$row1 = new QodeRow();
$group3->addChild("row1",$row1);

$blog_masonry_ql_title_color = new QodeField("colorsimple","blog_masonry_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_ql_title_color",$blog_masonry_ql_title_color);

$blog_masonry_ql_title_hover_color = new QodeField("colorsimple","blog_masonry_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_masonry_ql_title_hover_color",$blog_masonry_ql_title_hover_color);

$blog_masonry_ql_title_fontsize = new QodeField("textsimple","blog_masonry_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_ql_title_font_size",$blog_masonry_ql_title_fontsize);

$blog_masonry_ql_title_lineheight = new QodeField("textsimple","blog_masonry_ql_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_ql_title_lineheight",$blog_masonry_ql_title_lineheight);

$row2 = new QodeRow(true);
$group3->addChild("row2",$row2);

$blog_masonry_ql_title_texttransform = new QodeField("selectblanksimple","blog_masonry_ql_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_masonry_ql_title_texttransform",$blog_masonry_ql_title_texttransform);

$blog_masonry_ql_title_google_fonts = new QodeField("Fontsimple","blog_masonry_ql_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_ql_title_google_fonts",$blog_masonry_ql_title_google_fonts);

$blog_masonry_ql_title_fontstyle = new QodeField("selectblanksimple","blog_masonry_ql_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_masonry_ql_title_fontstyle",$blog_masonry_ql_title_fontstyle);

$blog_masonry_ql_title_fontweight = new QodeField("selectblanksimple","blog_masonry_ql_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_masonry_ql_title_fontweight",$blog_masonry_ql_title_fontweight);

$row3 = new QodeRow(true);
$group3->addChild("row3",$row3);

$blog_masonry_ql_title_letterspacing = new QodeField("textsimple","blog_masonry_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_ql_title_letterspacing",$blog_masonry_ql_title_letterspacing);

$group5 = new QodeGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list.");
$panel10->addChild("group5",$group5);

$row1 = new QodeRow();
$group5->addChild("row1",$row1);

$blog_masonry_ql_info_color = new QodeField("colorsimple","blog_masonry_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_ql_info_color",$blog_masonry_ql_info_color);

$blog_masonry_ql_info_link_color = new QodeField("colorsimple","blog_masonry_ql_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_masonry_ql_info_link_color",$blog_masonry_ql_info_link_color);

$blog_masonry_ql_info_hover_color = new QodeField("colorsimple","blog_masonry_ql_info_hover_color","","Hover Color","This is some description");
$row1->addChild("blog_masonry_ql_info_hover_color",$blog_masonry_ql_info_hover_color);

$blog_masonry_ql_info_fontsize = new QodeField("textsimple","blog_masonry_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_ql_info_fontsize",$blog_masonry_ql_info_fontsize);

$row2 = new QodeRow(true);
$group5->addChild("row2",$row2);

$blog_masonry_ql_info_lineheight = new QodeField("textsimple","blog_masonry_ql_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_masonry_ql_info_lineheight",$blog_masonry_ql_info_lineheight);

$blog_masonry_ql_info_google_fonts = new QodeField("Fontsimple","blog_masonry_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_ql_info_google_fonts",$blog_masonry_ql_info_google_fonts);

$blog_masonry_ql_info_fontstyle = new QodeField("selectblanksimple","blog_masonry_ql_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_masonry_ql_info_fontstyle",$blog_masonry_ql_info_fontstyle);

$blog_masonry_ql_info_fontweight = new QodeField("selectblanksimple","blog_masonry_ql_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_masonry_ql_info_fontweight",$blog_masonry_ql_info_fontweight);

$row3 = new QodeRow(true);
$group5->addChild("row3",$row3);

$blog_masonry_ql_info_texttransform = new QodeField("selectblanksimple","blog_masonry_ql_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_masonry_ql_info_texttransform",$blog_masonry_ql_info_texttransform);

$blog_masonry_ql_info_letterspacing = new QodeField("textsimple","blog_masonry_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_ql_info_letterspacing",$blog_masonry_ql_info_letterspacing);

$group6 = new QodeGroup("Quote Author Style","Define author styles for Quote articles");
$panel10->addChild("group6",$group6);

$row1 = new QodeRow();
$group6->addChild("row1",$row1);

$blog_masonry_ql_author_color = new QodeField("colorsimple","blog_masonry_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_masonry_ql_author_color",$blog_masonry_ql_author_color);

$blog_masonry_ql_author_hover_color = new QodeField("colorsimple","blog_masonry_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_masonry_ql_author_hover_color",$blog_masonry_ql_author_hover_color);

$blog_masonry_ql_author_fontsize = new QodeField("textsimple","blog_masonry_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_masonry_ql_author_font_size",$blog_masonry_ql_author_fontsize);

$blog_masonry_ql_author_lineheight = new QodeField("textsimple","blog_masonry_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_masonry_ql_author_lineheight",$blog_masonry_ql_author_lineheight);

$row2 = new QodeRow(true);
$group6->addChild("row2",$row2);

$blog_masonry_ql_author_texttransform = new QodeField("selectblanksimple","blog_masonry_ql_author_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_masonry_ql_author_texttransform",$blog_masonry_ql_author_texttransform);

$blog_masonry_ql_author_google_fonts = new QodeField("Fontsimple","blog_masonry_ql_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_masonry_ql_author_google_fonts",$blog_masonry_ql_author_google_fonts);

$blog_masonry_ql_author_fontstyle = new QodeField("selectblanksimple","blog_masonry_ql_author_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_masonry_ql_author_fontstyle",$blog_masonry_ql_author_fontstyle);

$blog_masonry_ql_author_fontweight = new QodeField("selectblanksimple","blog_masonry_ql_author_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_masonry_ql_author_fontweight",$blog_masonry_ql_author_fontweight);

$row3 = new QodeRow(true);
$group6->addChild("row3",$row3);

$blog_masonry_ql_author_letterspacing = new QodeField("textsimple","blog_masonry_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_masonry_ql_author_letterspacing",$blog_masonry_ql_author_letterspacing);

// Blog Post List - Blog: Split Column
$panel11 = new QodePanel("Blog List Template Options: Split Column","blog_split_column_post_lists", "blog_split_column_show_options", "no");
$blogPage->addChild("panel11",$panel11);


$blog_split_column_number_of_chars = new QodeField("text","blog_split_column_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel11->addChild("blog_split_column_number_of_chars",$blog_split_column_number_of_chars);

$blog_split_column_read_more_button = new QodeField("yesno","blog_split_column_read_more_button","yes","Read More Button","Enable Read More Button");
$panel11->addChild("blog_split_column_read_more_button",$blog_split_column_read_more_button);

$blog_split_column_content_position = new QodeField("select","blog_split_column_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));
$panel11->addChild("blog_split_column_content_position",$blog_split_column_content_position);

$blog_split_column_post_meta_data_section = new QodeTitle("blog_split_column_post_meta_data_section", "Post Info Data Fields");
$panel11->addChild("blog_split_column_post_meta_data_section", $blog_split_column_post_meta_data_section);

$blog_split_column_show_categories = new QodeField("yesno","blog_split_column_show_categories","no","Show Categories","Enabling this option will Show Categories on Post List");
$panel11->addChild("blog_split_column_show_categories",$blog_split_column_show_categories);

$blog_split_column_show_comments = new QodeField("yesno","blog_split_column_show_comments","no","Show Comments","Enabling this option will Show Comments on Post List");
$panel11->addChild("blog_split_column_show_comments",$blog_split_column_show_comments);

$blog_split_column_show_author = new QodeField("yesno","blog_split_column_show_author","yes","Show Author Name","Enabling this option will show author name on Post List and Blog Post Single");
$panel11->addChild("blog_split_column_show_author",$blog_split_column_show_author);

$blog_split_column_show_date = new QodeField("yesno","blog_split_column_show_date","yes","Show Date","Enabling this option will show date on Post List");
$panel11->addChild("blog_split_column_hide_date",$blog_split_column_show_date);

$blog_split_column_show_share = new QodeField("yesno","blog_split_column_show_share","no","Show Share","Enabling this option will show share on Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_split_column_share_options_container"));
$panel11->addChild("blog_split_column_show_share",$blog_split_column_show_share);

$blog_split_column_share_options_container = new QodeContainer("blog_split_column_share_options_container","blog_split_column_show_share","no");
$panel11->addChild("blog_split_column_share_options_container",$blog_split_column_share_options_container);

$blog_split_column_select_share_option = new QodeField("select","blog_split_column_select_share_option","dropdown","Social Share Style","Choose Social Share Style for Split Column Type",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_split_column_share_options_container->addChild("blog_split_column_select_share_option",$blog_split_column_select_share_option);

$blog_split_column_share_icon_color = new QodeField("color","blog_split_column_share_icon_color","","Icon Color","Choose icon color for share dropdown");
$blog_split_column_share_options_container->addChild("blog_split_column_share_icon_color",$blog_split_column_share_icon_color);

$blog_split_column_share_icon_hover_color = new QodeField("color","blog_split_column_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for share dropdown");
$blog_split_column_share_options_container->addChild("blog_split_column_share_icon_hover_color",$blog_split_column_share_icon_hover_color);

$blog_split_column_share_background_color = new QodeField("color","blog_split_column_share_background_color","","Background Color","Choose background color for share dropdown list field");
$blog_split_column_share_options_container->addChild("blog_split_column_share_background_color",$blog_split_column_share_background_color);

$blog_split_column_show_like = new QodeField("yesno","blog_split_column_show_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel11->addChild("blog_split_column_show_like",$blog_split_column_show_like);

$blog_split_column_post_design_style = new QodeTitle("blog_split_column_post_design_style", "Post Design Style");
$panel11->addChild("blog_split_column_post_design_style", $blog_split_column_post_design_style);

$blog_split_column_enable_text_box = new QodeField("yesno","blog_split_column_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_split_column_enable_text_box_container"));
$panel11->addChild("blog_split_column_enable_text_box",$blog_split_column_enable_text_box);

$blog_split_column_enable_text_box_container = new QodeContainer("blog_split_column_enable_text_box_container","blog_split_column_enable_text_box","no");
$panel11->addChild("blog_split_column_enable_text_box_container",$blog_split_column_enable_text_box_container);

$blog_split_column_box_background_color = new QodeField("color","blog_split_column_box_background_color","","Background Color","Choose background color for post text box");
$blog_split_column_enable_text_box_container->addChild("blog_split_column_box_background_color",$blog_split_column_box_background_color);

$blog_split_column_box_border_color = new QodeField("color","blog_split_column_box_border_color","","Border Color","Choose border color for post text box");
$blog_split_column_enable_text_box_container->addChild("blog_split_column_box_border_color",$blog_split_column_box_border_color);

$blog_split_column_box_padding = new QodeField("text","blog_split_column_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_split_column_enable_text_box_container->addChild("blog_split_column_box_padding",$blog_split_column_box_padding);

$group8 = new QodeGroup("Paragraph","Set paragraph color");
$panel11->addChild("group8",$group8);

$blog_split_column_paragraph_color = new QodeField("colorsimple","blog_split_column_paragraph_color","","Color","This is some description");
$group8->addChild("blog_split_column_paragraph_color",$blog_split_column_paragraph_color);

$group1 = new QodeGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel11->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$blog_split_column_ql_background_color = new QodeField("colorsimple","blog_split_column_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_split_column_ql_background_color",$blog_split_column_ql_background_color);

$blog_split_column_ql_hover_background_color = new QodeField("colorsimple","blog_split_column_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_split_column_ql_hover_background_color",$blog_split_column_ql_hover_background_color);

$blog_split_column_show_ql_mark = new QodeField("yesno","blog_split_column_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for Quote/Link Post Format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_split_column_show_ql_mark_container"));
$panel11->addChild("blog_split_column_show_ql_mark",$blog_split_column_show_ql_mark);

$blog_split_column_show_ql_mark_container = new QodeContainer("blog_split_column_show_ql_mark_container","blog_split_column_show_ql_mark","no");
$panel11->addChild("blog_split_column_show_ql_mark_container",$blog_split_column_show_ql_mark_container);

$row1 = new QodeRow();
$blog_split_column_show_ql_mark_container->addChild("row1",$row1);

$blog_split_column_ql_mark_color = new QodeField("color","blog_split_column_ql_mark_color","","Icon Color","Choose icon color for quote/link post.");
$row1->addChild("blog_split_column_ql_mark_color",$blog_split_column_ql_mark_color);

$blog_split_column_ql_mark_hover_color = new QodeField("color","blog_split_column_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_split_column_ql_mark_hover_color",$blog_split_column_ql_mark_hover_color);

$group9 = new QodeGroup("Blog List Spacing","Set spacing for blog layouts");
$panel11->addChild("group9",$group9);

$row1 = new QodeRow();
$group9->addChild("row1",$row1);

$blog_split_column_title_margin_bottom = new QodeField("textsimple","blog_split_column_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_split_column_title_margin_bottom",$blog_split_column_title_margin_bottom);

$blog_split_column_post_info_margin_bottom = new QodeField("textsimple","blog_split_column_post_info_margin_bottom","","Margin Under Post Info (px)","This is some description");
$row1->addChild("blog_split_column_post_info_margin_bottom",$blog_split_column_post_info_margin_bottom);

$blog_split_column_read_more_margin_top = new QodeField("textsimple","blog_split_column_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_split_column_read_more_margin_top",$blog_split_column_read_more_margin_top);

$blog_split_column_social_share_list_margin_top = new QodeField("textsimple","blog_split_column_social_share_list_margin_top","","Margin Above Social Share List (px)","This is some description");
$row1->addChild("blog_split_column_social_share_list_margin_top",$blog_split_column_social_share_list_margin_top);

$row2 = new QodeRow();
$group9->addChild("row2",$row2);

$blog_split_column_article_margin_bottom = new QodeField("textsimple","blog_split_column_article_margin_bottom","","Margin Between Articles (px)","This is some description");
$row1->addChild("blog_split_column_article_margin_bottom",$blog_split_column_article_margin_bottom);

$group10 = new QodeGroup("Blog List Spacing for Quote and Link Post Type","Set spacing for blog layouts");
$panel11->addChild("group10",$group10);

$row1 = new QodeRow();
$group10->addChild("row1",$row1);

$blog_split_column_ql_title_margin_bottom = new QodeField("textsimple","blog_split_column_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_split_column_ql_title_margin_bottom",$blog_split_column_ql_title_margin_bottom);

$blog_split_column_ql_quote_author_margin_bottom = new QodeField("textsimple","blog_split_column_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_split_column_ql_quote_author_margin_bottom",$blog_split_column_ql_quote_author_margin_bottom);

$blog_split_column_ql_share_list_margin_top = new QodeField("textsimple","blog_split_column_ql_share_list_margin_top","","Margin Above Social Share List (px)","This is some description");
$row1->addChild("blog_split_column_ql_share_list_margin_top",$blog_split_column_ql_share_list_margin_top);

$post_text_styling= new QodeTitle("post_text_styling", "Post Text Style");
$panel11->addChild("post_text_styling", $post_text_styling);

$group2 = new QodeGroup("Post Title","Define title styles in this blog post template.");
$panel11->addChild("group2",$group2);

$row1 = new QodeRow();
$group2->addChild("row1",$row1);

$blog_split_column_title_color = new QodeField("colorsimple","blog_split_column_title_color","","Text Color","This is some description");
$row1->addChild("blog_split_column_title_color",$blog_split_column_title_color);

$blog_split_column_title_hover_color = new QodeField("colorsimple","blog_split_column_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_split_column_title_hover_color",$blog_split_column_title_hover_color);

$blog_split_column_title_fontsize = new QodeField("textsimple","blog_split_column_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_split_column_title_fontsize",$blog_split_column_title_fontsize);

$blog_split_column_title_lineheight = new QodeField("textsimple","blog_split_column_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_split_column_title_lineheight",$blog_split_column_title_lineheight);

$row2 = new QodeRow(true);
$group2->addChild("row2",$row2);

$blog_split_column_title_google_fonts = new QodeField("Fontsimple","blog_split_column_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_split_column_title_google_fonts",$blog_split_column_title_google_fonts);

$blog_split_column_title_fontstyle = new QodeField("selectblanksimple","blog_split_column_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_split_column_title_fontstyle",$blog_split_column_title_fontstyle);

$blog_split_column_title_fontweight = new QodeField("selectblanksimple","blog_split_column_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_split_column_title_fontweight",$blog_split_column_title_fontweight);

$blog_split_column_title_texttransform = new QodeField("selectblanksimple","blog_split_column_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_split_column_title_texttransform",$blog_split_column_title_texttransform);

$row3 = new QodeRow(true);
$group2->addChild("row3",$row3);

$blog_split_column_title_letterspacing = new QodeField("textsimple","blog_split_column_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_split_column_title_letterspacing",$blog_split_column_title_letterspacing);

$group4 = new QodeGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel11->addChild("group4",$group4);

$row1 = new QodeRow();
$group4->addChild("row1",$row1);

$blog_split_column_info_color = new QodeField("colorsimple","blog_split_column_info_color","","Text Color","This is some description");
$row1->addChild("blog_split_column_info_color",$blog_split_column_info_color);

$blog_split_column_info_link_color = new QodeField("colorsimple","blog_split_column_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_split_column_info_link_color",$blog_split_column_info_link_color);

$blog_split_column_info_hover_color = new QodeField("colorsimple","blog_split_column_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_split_column_info_hover_color",$blog_split_column_info_hover_color);

$blog_split_column_info_fontsize = new QodeField("textsimple","blog_split_column_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_split_column_info_fontsize",$blog_split_column_info_fontsize);

$row2 = new QodeRow(true);
$group4->addChild("row2",$row2);

$blog_split_column_info_lineheight = new QodeField("textsimple","blog_split_column_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_split_column_info_lineheight",$blog_split_column_info_lineheight);

$blog_split_column_info_google_fonts = new QodeField("Fontsimple","blog_split_column_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_split_column_info_google_fonts",$blog_split_column_info_google_fonts);

$blog_split_column_info_fontstyle = new QodeField("selectblanksimple","blog_split_column_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_split_column_info_fontstyle",$blog_split_column_info_fontstyle);

$blog_split_column_info_fontweight = new QodeField("selectblanksimple","blog_split_column_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_split_column_info_fontweight",$blog_split_column_info_fontweight);

$row3 = new QodeRow(true);
$group4->addChild("row3",$row3);

$blog_split_column_info_texttransform = new QodeField("selectblanksimple","blog_split_column_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_split_column_info_texttransform",$blog_split_column_info_texttransform);

$blog_split_column_info_letterspacing = new QodeField("textsimple","blog_split_column_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_split_column_info_letterspacing",$blog_split_column_info_letterspacing);

$group3 = new QodeGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel11->addChild("group3",$group3);

$row1 = new QodeRow();
$group3->addChild("row1",$row1);


$blog_split_column_ql_title_color = new QodeField("colorsimple","blog_split_column_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_split_column_ql_title_color",$blog_split_column_ql_title_color);

$blog_split_column_ql_title_hover_color = new QodeField("colorsimple","blog_split_column_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_split_column_ql_title_hover_color",$blog_split_column_ql_title_hover_color);

$blog_split_column_ql_title_fontsize = new QodeField("textsimple","blog_split_column_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_split_column_ql_title_font_size",$blog_split_column_ql_title_fontsize);


$row2 = new QodeRow(true);
$group3->addChild("row2",$row2);


$blog_split_column_ql_title_lineheight = new QodeField("textsimple","blog_split_column_ql_title_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_split_column_ql_title_lineheight",$blog_split_column_ql_title_lineheight);

$blog_split_column_ql_title_google_fonts = new QodeField("Fontsimple","blog_split_column_ql_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_split_column_ql_title_google_fonts",$blog_split_column_ql_title_google_fonts);

$blog_split_column_ql_title_fontstyle = new QodeField("selectblanksimple","blog_split_column_ql_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_split_column_ql_title_fontstyle",$blog_split_column_ql_title_fontstyle);

$blog_split_column_ql_title_fontweight = new QodeField("selectblanksimple","blog_split_column_ql_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_split_column_ql_title_fontweight",$blog_split_column_ql_title_fontweight);

$row3 = new QodeRow(true);
$group3->addChild("row3",$row3);

$blog_split_column_ql_title_texttransform = new QodeField("selectblanksimple","blog_split_column_ql_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_split_column_ql_title_texttransform",$blog_split_column_ql_title_texttransform);

$blog_split_column_ql_title_letterspacing = new QodeField("textsimple","blog_split_column_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_split_column_ql_title_letterspacing",$blog_split_column_ql_title_letterspacing);


$group5 = new QodeGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list.");
$panel11->addChild("group5",$group5);

$row1 = new QodeRow();
$group5->addChild("row1",$row1);

$blog_split_column_ql_info_color = new QodeField("colorsimple","blog_split_column_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_split_column_ql_info_color",$blog_split_column_ql_info_color);

$blog_split_column_ql_info_link_color = new QodeField("colorsimple","blog_split_column_ql_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_split_column_ql_info_link_color",$blog_split_column_ql_info_link_color);

$blog_split_column_ql_info_hover_color = new QodeField("colorsimple","blog_split_column_ql_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_split_column_ql_info_hover_color",$blog_split_column_ql_info_hover_color);

$blog_split_column_ql_info_fontsize = new QodeField("textsimple","blog_split_column_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_split_column_ql_info_fontsize",$blog_split_column_ql_info_fontsize);

$row2 = new QodeRow(true);
$group5->addChild("row2",$row2);

$blog_split_column_ql_info_lineheight = new QodeField("textsimple","blog_split_column_ql_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_split_column_ql_info_lineheight",$blog_split_column_ql_info_lineheight);

$blog_split_column_ql_info_google_fonts = new QodeField("Fontsimple","blog_split_column_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_split_column_ql_info_google_fonts",$blog_split_column_ql_info_google_fonts);

$blog_split_column_ql_info_fontstyle = new QodeField("selectblanksimple","blog_split_column_ql_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_split_column_ql_info_fontstyle",$blog_split_column_ql_info_fontstyle);

$blog_split_column_ql_info_fontweight = new QodeField("selectblanksimple","blog_split_column_ql_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_split_column_ql_info_fontweight",$blog_split_column_ql_info_fontweight);

$row3 = new QodeRow(true);
$group5->addChild("row3",$row3);

$blog_split_column_ql_info_texttransform = new QodeField("selectblanksimple","blog_split_column_ql_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_split_column_ql_info_texttransform",$blog_split_column_ql_info_texttransform);

$blog_split_column_ql_info_letterspacing = new QodeField("textsimple","blog_split_column_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_split_column_ql_info_letterspacing",$blog_split_column_ql_info_letterspacing);

$group6 = new QodeGroup("Quote Author Style","Define author styles for Quote articles");
$panel11->addChild("group6",$group6);

$row1 = new QodeRow();
$group6->addChild("row1",$row1);


$blog_split_column_ql_author_color = new QodeField("colorsimple","blog_split_column_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_split_column_ql_author_color",$blog_split_column_ql_author_color);

$blog_split_column_ql_author_hover_color = new QodeField("colorsimple","blog_split_column_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_split_column_ql_author_hover_color",$blog_split_column_ql_author_hover_color);

$blog_split_column_ql_author_fontsize = new QodeField("textsimple","blog_split_column_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_split_column_ql_author_font_size",$blog_split_column_ql_author_fontsize);

$blog_split_column_ql_author_lineheight = new QodeField("textsimple","blog_split_column_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_split_column_ql_author_lineheight",$blog_split_column_ql_author_lineheight);

$row2 = new QodeRow(true);
$group6->addChild("row2",$row2);

$blog_split_column_ql_author_texttransform = new QodeField("selectblanksimple","blog_split_column_ql_author_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_split_column_ql_author_texttransform",$blog_split_column_ql_author_texttransform);

$blog_split_column_ql_author_google_fonts = new QodeField("Fontsimple","blog_split_column_ql_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_split_column_ql_author_google_fonts",$blog_split_column_ql_author_google_fonts);

$blog_split_column_ql_author_fontstyle = new QodeField("selectblanksimple","blog_split_column_ql_author_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_split_column_ql_author_fontstyle",$blog_split_column_ql_author_fontstyle);

$blog_split_column_ql_author_fontweight = new QodeField("selectblanksimple","blog_split_column_ql_author_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_split_column_ql_author_fontweight",$blog_split_column_ql_author_fontweight);

$row3 = new QodeRow(true);
$group6->addChild("row3",$row3);


$blog_split_column_ql_author_letterspacing = new QodeField("textsimple","blog_split_column_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_split_column_ql_author_letterspacing",$blog_split_column_ql_author_letterspacing);

// Blog Post List - Blog: Standard
$panel21 = new QodePanel("Blog List Template Options: Standard","blog_standard_type_post_lists", "blog_standard_type_show_options", "no");
$blogPage->addChild("panel21",$panel21);

$blog_standard_type_number_of_chars = new QodeField("text","blog_standard_type_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel21->addChild("blog_standard_type_number_of_chars",$blog_standard_type_number_of_chars);

$blog_standard_type_read_more_button = new QodeField("yesno","blog_standard_type_read_more_button","yes","Read More Button","Enable Read More Button");
$panel21->addChild("blog_standard_type_read_more_button",$blog_standard_type_read_more_button);

$blog_standard_type_content_position = new QodeField("select","blog_standard_type_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));
$panel21->addChild("blog_standard_type_content_position",$blog_standard_type_content_position);

$blog_standard_type_post_meta_data_section = new QodeTitle("blog_standard_type_post_meta_data_section", "Post Info Data Fields");
$panel21->addChild("blog_standard_type_post_meta_data_section", $blog_standard_type_post_meta_data_section);

$blog_standard_type_show_categories = new QodeField("yesno","blog_standard_type_show_categories","yes","Show Categories","Enabling this option will Show Categories on Post List");
$panel21->addChild("blog_standard_type_show_categories",$blog_standard_type_show_categories);

$blog_standard_type_show_comments = new QodeField("yesno","blog_standard_type_show_comments","no","Show Comments","Enabling this option will Show Comments on Post List");
$panel21->addChild("blog_standard_type_show_comments",$blog_standard_type_show_comments);

$blog_standard_type_show_author = new QodeField("yesno","blog_standard_type_show_author","yes","Show Author Name","Enabling this option will show author name on Post List and Blog Post Single");
$panel21->addChild("blog_standard_type_show_author",$blog_standard_type_show_author);

$blog_standard_type_show_date = new QodeField("yesno","blog_standard_type_show_date","yes","Show Date","Enabling this option will show date on Post List");
$panel21->addChild("blog_standard_type_hide_date",$blog_standard_type_show_date);

$blog_standard_type_show_share = new QodeField("yesno","blog_standard_type_show_share","no","Show Share","Enabling this option will show share on Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_standard_type_share_options_container"));
$panel21->addChild("blog_standard_type_show_share",$blog_standard_type_show_share);

$blog_standard_type_share_options_container = new QodeContainer("blog_standard_type_share_options_container","blog_standard_type_show_share","no");
$panel21->addChild("blog_standard_type_share_options_container",$blog_standard_type_share_options_container);

$blog_standard_type_select_share_option = new QodeField("select","blog_standard_type_select_share_option","dropdown","Social Share Style","Choose Social Share Style for Standard Type",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_standard_type_share_options_container->addChild("blog_standard_type_select_share_option",$blog_standard_type_select_share_option);

$blog_standard_type_share_icon_color = new QodeField("color","blog_standard_type_share_icon_color","","Icon Color","Choose icon color for dropdown and list share type");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_icon_color",$blog_standard_type_share_icon_color);

$blog_standard_type_share_icon_hover_color = new QodeField("color","blog_standard_type_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for dropdown and list Share Type");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_icon_hover_color",$blog_standard_type_share_icon_hover_color);

$blog_standard_type_share_background_color = new QodeField("color","blog_standard_type_share_background_color","","Background Color","Choose background color for dropdown share type");
$blog_standard_type_share_options_container->addChild("blog_standard_type_share_background_color",$blog_standard_type_share_background_color);

$blog_standard_type_show_like = new QodeField("yesno","blog_standard_type_show_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel21->addChild("blog_standard_type_show_like",$blog_standard_type_show_like);

$blog_standard_type_post_design_style = new QodeTitle("blog_standard_type_post_design_style", "Post Design Style");
$panel21->addChild("blog_standard_type_post_design_style", $blog_standard_type_post_design_style);

$blog_standard_type_enable_text_box = new QodeField("yesno","blog_standard_type_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_standard_type_enable_text_box_container"));
$panel21->addChild("blog_standard_type_enable_text_box",$blog_standard_type_enable_text_box);

$blog_standard_type_enable_text_box_container = new QodeContainer("blog_standard_type_enable_text_box_container","blog_standard_type_enable_text_box","no");
$panel21->addChild("blog_standard_type_enable_text_box_container",$blog_standard_type_enable_text_box_container);

$blog_standard_type_box_background_color = new QodeField("color","blog_standard_type_box_background_color","","Background Color","Choose background color for post text box");
$blog_standard_type_enable_text_box_container->addChild("blog_standard_type_box_background_color",$blog_standard_type_box_background_color);

$blog_standard_type_box_border_color = new QodeField("color","blog_standard_type_box_border_color","","Border Color","Choose border color for post text box");
$blog_standard_type_enable_text_box_container->addChild("blog_standard_type_box_border_color",$blog_standard_type_box_border_color);

$blog_standard_type_box_padding = new QodeField("text","blog_standard_type_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_standard_type_enable_text_box_container->addChild("blog_standard_type_box_padding",$blog_standard_type_box_padding);

$group10 = new QodeGroup("Paragraph","Set paragraph color");
$panel21->addChild("group10",$group10);

$blog_standard_type_paragraph_color = new QodeField("colorsimple","blog_standard_type_paragraph_color","","Color","This is some description");
$group10->addChild("blog_standard_type_paragraph_color",$blog_standard_type_paragraph_color);

$group1 = new QodeGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel21->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$blog_standard_type_ql_background_image = new QodeField("yesnosimple","blog_standard_type_ql_background_image","no","Background Image","");
$row1->addChild("blog_standard_type_ql_background_image",$blog_standard_type_ql_background_image);

$blog_standard_type_ql_background_color = new QodeField("colorsimple","blog_standard_type_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_standard_type_ql_background_color",$blog_standard_type_ql_background_color);

$blog_standard_type_ql_hover_background_color = new QodeField("colorsimple","blog_standard_type_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_standard_type_ql_hover_background_color",$blog_standard_type_ql_hover_background_color);

$blog_standard_type_show_ql_mark = new QodeField("yesno","blog_standard_type_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for Quote/Link Post Format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_standard_type_show_ql_mark_container"));
$panel21->addChild("blog_standard_type_show_ql_mark",$blog_standard_type_show_ql_mark);

$blog_standard_type_show_ql_mark_container = new QodeContainer("blog_standard_type_show_ql_mark_container","blog_standard_type_show_ql_mark","no");
$panel21->addChild("blog_standard_type_show_ql_mark_container",$blog_standard_type_show_ql_mark_container);

$row1 = new QodeRow();
$blog_standard_type_show_ql_mark_container->addChild("row1",$row1);

$blog_standard_type_ql_mark_color = new QodeField("color","blog_standard_type_ql_mark_color","","Icon Color","Choose icon color for quote/link post.");
$row1->addChild("blog_standard_type_ql_mark_color",$blog_standard_type_ql_mark_color);

$blog_standard_type_ql_mark_hover_color = new QodeField("color","blog_standard_type_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_standard_type_ql_mark_hover_color",$blog_standard_type_ql_mark_hover_color);

$group11 = new QodeGroup("Blog List Spacing","Set spacing for blog layouts");
$panel21->addChild("group11",$group11);

$row1 = new QodeRow();
$group11->addChild("row1",$row1);

$blog_standard_type_image_margin_bottom = new QodeField("textsimple","blog_standard_type_image_margin_bottom","","Margin Under Image (px)","This is some description");
$row1->addChild("blog_standard_type_image_margin_bottom",$blog_standard_type_image_margin_bottom);

$blog_standard_type_title_margin_bottom = new QodeField("textsimple","blog_standard_type_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_standard_type_title_margin_bottom",$blog_standard_type_title_margin_bottom);

$blog_standard_type_read_more_margin_top = new QodeField("textsimple","blog_standard_type_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row1->addChild("blog_standard_type_read_more_margin_top",$blog_standard_type_read_more_margin_top);

$blog_standard_type_post_info_margin_bottom = new QodeField("textsimple","blog_standard_type_post_info_margin_bottom","","Margin Under Post Info (px)","This is some description");
$row1->addChild("blog_standard_type_post_info_margin_bottom",$blog_standard_type_post_info_margin_bottom);

$row2 = new QodeRow();
$group11->addChild("row2",$row2);

$blog_standard_type_article_margin_bottom = new QodeField("textsimple","blog_standard_type_article_margin_bottom","","Margin Between Articles (px)","This is some description");
$row2->addChild("blog_standard_type_article_margin_bottom",$blog_standard_type_article_margin_bottom);

$blog_standard_type_single_article_social_share_list_margin_top = new QodeField("textsimple","blog_standard_type_single_article_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row2->addChild("blog_standard_type_single_article_social_share_list_margin_top",$blog_standard_type_single_article_social_share_list_margin_top);

$group12 = new QodeGroup("Blog List Spacing for Quote and Link Post Type","Set spacing for blog layouts");
$panel21->addChild("group12",$group12);

$row1 = new QodeRow();
$group12->addChild("row1",$row1);

$blog_standard_type_ql_title_margin_bottom = new QodeField("textsimple","blog_standard_type_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_standard_type_ql_title_margin_bottom",$blog_standard_type_ql_title_margin_bottom);

$blog_standard_type_ql_social_share_list_margin_top = new QodeField("textsimple","blog_standard_type_ql_social_share_list_margin_top","","Margin Above Social Share List (px)","This is some description");
$row1->addChild("blog_standard_type_ql_social_share_list_margin_top",$blog_standard_type_ql_social_share_list_margin_top);

$blog_standard_type_ql_quote_author_margin_bottom = new QodeField("textsimple","blog_standard_type_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_standard_type_ql_quote_author_margin_bottom",$blog_standard_type_ql_quote_author_margin_bottom);

$group13 = new QodeGroup("Border Arround Quote/Link Post Type","Set border style for Quote/Link post type");
$panel21->addChild("group13",$group13);

$row1 = new QodeRow();
$group13->addChild("row1",$row1);

$blog_standard_type_ql_article_border_color = new QodeField("colorsimple","blog_standard_type_ql_article_border_color","","Border Color","This is some description");
$row1->addChild("blog_standard_type_ql_article_border_color",$blog_standard_type_ql_article_border_color);

$blog_standard_type_ql_article_borderwidth = new QodeField("textsimple","blog_standard_type_ql_article_borderwidth","","Border Width","This is some description");
$row1->addChild("blog_standard_type_ql_article_borderwidth",$blog_standard_type_ql_article_borderwidth);

$post_text_styling= new QodeTitle("post_text_styling", "Post Text Style");
$panel21->addChild("post_text_styling", $post_text_styling);

$group5 = new QodeGroup("Post Title","Define title styles in this blog post template.");
$panel21->addChild("group5",$group5);

$row1 = new QodeRow();
$group5->addChild("row1",$row1);

$blog_standard_type_title_color = new QodeField("colorsimple","blog_standard_type_title_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_title_color",$blog_standard_type_title_color);

$blog_standard_type_title_hover_color = new QodeField("colorsimple","blog_standard_type_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_standard_type_title_hover_color",$blog_standard_type_title_hover_color);

$blog_standard_type_title_fontsize = new QodeField("textsimple","blog_standard_type_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_title_fontsize",$blog_standard_type_title_fontsize);

$blog_standard_type_title_lineheight = new QodeField("textsimple","blog_standard_type_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_standard_type_title_lineheight",$blog_standard_type_title_lineheight);

$row2 = new QodeRow(true);
$group5->addChild("row2",$row2);

$blog_standard_type_title_texttransform = new QodeField("selectblanksimple","blog_standard_type_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_standard_type_title_texttransform",$blog_standard_type_title_texttransform);

$blog_standard_type_title_google_fonts = new QodeField("Fontsimple","blog_standard_type_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_title_google_fonts",$blog_standard_type_title_google_fonts);

$blog_standard_type_title_fontstyle = new QodeField("selectblanksimple","blog_standard_type_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_standard_type_title_fontstyle",$blog_standard_type_title_fontstyle);

$blog_standard_type_title_fontweight = new QodeField("selectblanksimple","blog_standard_type_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_standard_type_title_fontweight",$blog_standard_type_title_fontweight);

$row3 = new QodeRow(true);
$group5->addChild("row3",$row3);

$blog_standard_type_title_letterspacing = new QodeField("textsimple","blog_standard_type_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_title_letterspacing",$blog_standard_type_title_letterspacing);

$group7 = new QodeGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel21->addChild("group7",$group7);

$row1 = new QodeRow();
$group7->addChild("row1",$row1);

$blog_standard_type_info_color = new QodeField("colorsimple","blog_standard_type_info_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_info_color",$blog_standard_type_info_color);

$blog_standard_type_info_link_color = new QodeField("colorsimple","blog_standard_type_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_standard_type_info_link_color",$blog_standard_type_info_link_color);

$blog_standard_type_info_hover_color = new QodeField("colorsimple","blog_standard_type_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_standard_type_info_hover_color",$blog_standard_type_info_hover_color);

$blog_standard_type_info_fontsize = new QodeField("textsimple","blog_standard_type_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_info_fontsize",$blog_standard_type_info_fontsize);

$row2 = new QodeRow(true);
$group7->addChild("row2",$row2);

$blog_standard_type_info_lineheight = new QodeField("textsimple","blog_standard_type_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_standard_type_info_lineheight",$blog_standard_type_info_lineheight);

$blog_standard_type_info_google_fonts = new QodeField("Fontsimple","blog_standard_type_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_info_google_fonts",$blog_standard_type_info_google_fonts);

$blog_standard_type_info_fontstyle = new QodeField("selectblanksimple","blog_standard_type_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_standard_type_info_fontstyle",$blog_standard_type_info_fontstyle);

$blog_standard_type_info_fontweight = new QodeField("selectblanksimple","blog_standard_type_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_standard_type_info_fontweight",$blog_standard_type_info_fontweight);

$row3 = new QodeRow(true);
$group7->addChild("row3",$row3);

$blog_standard_type_info_texttransform = new QodeField("selectblanksimple","blog_standard_type_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_standard_type_info_texttransform",$blog_standard_type_info_texttransform);

$blog_standard_type_info_letterspacing = new QodeField("textsimple","blog_standard_type_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_info_letterspacing",$blog_standard_type_info_letterspacing);

$group6 = new QodeGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel21->addChild("group6",$group6);

$row1 = new QodeRow();
$group6->addChild("row1",$row1);

$blog_standard_type_ql_title_color = new QodeField("colorsimple","blog_standard_type_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_ql_title_color",$blog_standard_type_ql_title_color);

$blog_standard_type_ql_title_hover_color = new QodeField("colorsimple","blog_standard_type_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_standard_type_ql_title_hover_color",$blog_standard_type_ql_title_hover_color);

$blog_standard_type_ql_title_fontsize = new QodeField("textsimple","blog_standard_type_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_ql_title_font_size",$blog_standard_type_ql_title_fontsize);

$blog_standard_type_ql_title_lineheight = new QodeField("textsimple","blog_standard_type_ql_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_standard_type_ql_title_lineheight",$blog_standard_type_ql_title_lineheight);


$row2 = new QodeRow(true);
$group6->addChild("row2",$row2);

$blog_standard_type_ql_title_texttransform = new QodeField("selectblanksimple","blog_standard_type_ql_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_standard_type_ql_title_texttransform",$blog_standard_type_ql_title_texttransform);

$blog_standard_type_ql_title_google_fonts = new QodeField("Fontsimple","blog_standard_type_ql_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_ql_title_google_fonts",$blog_standard_type_ql_title_google_fonts);

$blog_standard_type_ql_title_fontstyle = new QodeField("selectblanksimple","blog_standard_type_ql_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_standard_type_ql_title_fontstyle",$blog_standard_type_ql_title_fontstyle);

$blog_standard_type_ql_title_fontweight = new QodeField("selectblanksimple","blog_standard_type_ql_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_standard_type_ql_title_fontweight",$blog_standard_type_ql_title_fontweight);

$row3 = new QodeRow(true);
$group6->addChild("row3",$row3);

$blog_standard_type_ql_title_letterspacing = new QodeField("textsimple","blog_standard_type_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_ql_title_letterspacing",$blog_standard_type_ql_title_letterspacing);

$group8 = new QodeGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list.");
$panel21->addChild("group8",$group8);

$row1 = new QodeRow();
$group8->addChild("row1",$row1);

$blog_standard_type_ql_info_color = new QodeField("colorsimple","blog_standard_type_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_ql_info_color",$blog_standard_type_ql_info_color);

$blog_standard_type_ql_info_link_color = new QodeField("colorsimple","blog_standard_type_ql_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_standard_type_ql_info_link_color",$blog_standard_type_ql_info_link_color);

$blog_standard_type_ql_info_hover_color = new QodeField("colorsimple","blog_standard_type_ql_info_hover_color","","Hover Color","This is some description");
$row1->addChild("blog_standard_type_ql_info_hover_color",$blog_standard_type_ql_info_hover_color);

$blog_standard_type_ql_info_fontsize = new QodeField("textsimple","blog_standard_type_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_ql_info_fontsize",$blog_standard_type_ql_info_fontsize);

$row2 = new QodeRow(true);
$group8->addChild("row2",$row2);


$blog_standard_type_ql_info_lineheight = new QodeField("textsimple","blog_standard_type_ql_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_standard_type_ql_info_lineheight",$blog_standard_type_ql_info_lineheight);

$blog_standard_type_ql_info_google_fonts = new QodeField("Fontsimple","blog_standard_type_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_ql_info_google_fonts",$blog_standard_type_ql_info_google_fonts);

$blog_standard_type_ql_info_fontstyle = new QodeField("selectblanksimple","blog_standard_type_ql_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_standard_type_ql_info_fontstyle",$blog_standard_type_ql_info_fontstyle);

$blog_standard_type_ql_info_fontweight = new QodeField("selectblanksimple","blog_standard_type_ql_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_standard_type_ql_info_fontweight",$blog_standard_type_ql_info_fontweight);

$row3 = new QodeRow(true);
$group8->addChild("row3",$row3);

$blog_standard_type_ql_info_texttransform = new QodeField("selectblanksimple","blog_standard_type_ql_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_standard_type_ql_info_texttransform",$blog_standard_type_ql_info_texttransform);

$blog_standard_type_ql_info_letterspacing = new QodeField("textsimple","blog_standard_type_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_ql_info_letterspacing",$blog_standard_type_ql_info_letterspacing);

$group9 = new QodeGroup("Quote Author Style","Define author styles for Quote articles");
$panel21->addChild("group9",$group9);

$row1 = new QodeRow();
$group9->addChild("row1",$row1);

$blog_standard_type_ql_author_color = new QodeField("colorsimple","blog_standard_type_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_standard_type_ql_author_color",$blog_standard_type_ql_author_color);

$blog_standard_type_ql_author_hover_color = new QodeField("colorsimple","blog_standard_type_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_standard_type_ql_author_hover_color",$blog_standard_type_ql_author_hover_color);

$blog_standard_type_ql_author_fontsize = new QodeField("textsimple","blog_standard_type_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_standard_type_ql_author_font_size",$blog_standard_type_ql_author_fontsize);

$blog_standard_type_ql_author_lineheight = new QodeField("textsimple","blog_standard_type_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_standard_type_ql_author_lineheight",$blog_standard_type_ql_author_lineheight);


$row2 = new QodeRow(true);
$group9->addChild("row2",$row2);

$blog_standard_type_ql_author_texttransform = new QodeField("selectblanksimple","blog_standard_type_ql_author_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_standard_type_ql_author_texttransform",$blog_standard_type_ql_author_texttransform);

$blog_standard_type_ql_author_google_fonts = new QodeField("Fontsimple","blog_standard_type_ql_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_standard_type_ql_author_google_fonts",$blog_standard_type_ql_author_google_fonts);

$blog_standard_type_ql_author_fontstyle = new QodeField("selectblanksimple","blog_standard_type_ql_author_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_standard_type_ql_author_fontstyle",$blog_standard_type_ql_author_fontstyle);

$blog_standard_type_ql_author_fontweight = new QodeField("selectblanksimple","blog_standard_type_ql_author_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_standard_type_ql_author_fontweight",$blog_standard_type_ql_author_fontweight);

$row3 = new QodeRow(true);
$group9->addChild("row3",$row3);

$blog_standard_type_ql_author_letterspacing = new QodeField("textsimple","blog_standard_type_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_standard_type_ql_author_letterspacing",$blog_standard_type_ql_author_letterspacing);

// Blog Post List - Blog: Blog Post Info Hierarchical
$panel6 = new QodePanel("Blog List Template Options: Blog Post Info Hierarchical","blog_post_info_hierarchical_post_lists", "blog_post_info_hierarchical_show_options", "no");
$blogPage->addChild("panel6",$panel6);

$blog_post_info_hierarchical_number_of_chars = new QodeField("text","blog_post_info_hierarchical_number_of_chars","45","Number of Words in Excerpt",' Enter a number of words in excerpt (article summary)', array(), array("col_width" => 3));
$panel6->addChild("blog_post_info_hierarchical_number_of_chars",$blog_post_info_hierarchical_number_of_chars);

$blog_post_info_hierarchical_read_more_button = new QodeField("yesno","blog_post_info_hierarchical_read_more_button","no","Read More Button","Enable Read More Button");
$panel6->addChild("blog_post_info_hierarchical_read_more_button",$blog_post_info_hierarchical_read_more_button);

$blog_post_info_hierarchical_content_position = new QodeField("select","blog_post_info_hierarchical_content_position","content_above_blog_list","Content Position","Choose content position for blog list template when sidebar is enabled. Note: This settings in only for template, not for archive pages", array(
	"content_above_blog_list" => "Content Above Blog List",
	"content_above_blog_list_and_sidebar" => "Content Above Blog List and Sidebar"
));
$panel6->addChild("blog_post_info_hierarchical_content_position",$blog_post_info_hierarchical_content_position);

$blog_post_info_hierarchical_post_meta_data_section = new QodeTitle("blog_post_info_hierarchical_post_meta_data_section", "Post Info Data Fields");
$panel6->addChild("blog_post_info_hierarchical_post_meta_data_section", $blog_post_info_hierarchical_post_meta_data_section);

$blog_post_info_hierarchical_show_categories = new QodeField("yesno","blog_post_info_hierarchical_show_categories","yes","Show Categories","Enabling this option will Show Categories on Post List");
$panel6->addChild("blog_post_info_hierarchical_show_categories",$blog_post_info_hierarchical_show_categories);

$blog_post_info_hierarchical_show_comments = new QodeField("yesno","blog_post_info_hierarchical_show_comments","yes","Show Comments","Enabling this option will Show Comments on Post List");
$panel6->addChild("blog_post_info_hierarchical_show_comments",$blog_post_info_hierarchical_show_comments);

$blog_post_info_hierarchical_show_author = new QodeField("yesno","blog_post_info_hierarchical_show_author","no","Show Author","Enabling this option will show author name on Post List and Blog Post Single");
$panel6->addChild("blog_post_info_hierarchical_show_author",$blog_post_info_hierarchical_show_author);

$blog_post_info_hierarchical_show_date = new QodeField("yesno","blog_post_info_hierarchical_show_date","yes","Show Date","Enabling this option will show date on Post List");
$panel6->addChild("blog_post_info_hierarchical_show_date",$blog_post_info_hierarchical_show_date);

$blog_post_info_hierarchical_show_share = new QodeField("yesno","blog_post_info_hierarchical_show_share","yes","Show Share","Enabling this option will show share on Post List", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_post_info_hierarchical_share_options_container"));
$panel6->addChild("blog_post_info_hierarchical_show_share",$blog_post_info_hierarchical_show_share);

$blog_post_info_hierarchical_share_options_container = new QodeContainer("blog_post_info_hierarchical_share_options_container","blog_post_info_hierarchical_show_share","no");
$panel6->addChild("blog_post_info_hierarchical_share_options_container",$blog_post_info_hierarchical_share_options_container);

$blog_post_info_hierarchical_select_share_option = new QodeField("select","blog_post_info_hierarchical_select_share_option","list","Social Share Style","Choose Social Share Style for Blog Post Info Hierarchical Type",array(
	"dropdown" => "Social Share Dropdown",
	"list" => "Social Share List"
));

$blog_post_info_hierarchical_share_options_container -> addChild("blog_post_info_hierarchical_select_share_option",$blog_post_info_hierarchical_select_share_option);

$blog_post_info_hierarchical_share_icon_color = new QodeField("color","blog_post_info_hierarchical_share_icon_color","","Icon Color","Choose icon color for share dropdown");
$blog_post_info_hierarchical_share_options_container->addChild("blog_post_info_hierarchical_share_icon_color",$blog_post_info_hierarchical_share_icon_color);

$blog_post_info_hierarchical_share_icon_hover_color = new QodeField("color","blog_post_info_hierarchical_share_icon_hover_color","","Icon Hover Color","Choose icon hover color for share dropdown");
$blog_post_info_hierarchical_share_options_container->addChild("blog_post_info_hierarchical_share_icon_hover_color",$blog_post_info_hierarchical_share_icon_hover_color);

$blog_post_info_hierarchical_share_background_color = new QodeField("color","blog_post_info_hierarchical_share_background_color","","Background Color","Choose background color for share dropdown list field");
$blog_post_info_hierarchical_share_options_container->addChild("blog_post_info_hierarchical_share_background_color",$blog_post_info_hierarchical_share_background_color);

$blog_post_info_hierarchical_like = new QodeField("yesno","blog_post_info_hierarchical_show_like","no","Show Likes",'Enabling this option will turn on "Likes"');
$panel6->addChild("blog_post_info_hierarchical_show_like",$blog_post_info_hierarchical_like);

$blog_post_info_hierarchical_post_design_style = new QodeTitle("blog_post_info_hierarchical_post_design_style", "Post Design Style");
$panel6->addChild("blog_post_info_hierarchical_post_design_style", $blog_post_info_hierarchical_post_design_style);

$group1 = new QodeGroup("Separator","Define style for separator used in the bottom of the post.");
$panel6->addChild("group1",$group1);

$row1 = new QodeRow();
$group1->addChild("row1",$row1);

$blog_post_info_hierarchical_separator_border_color = new QodeField("colorsimple","blog_post_info_hierarchical_separator_border_color","","Separator Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_separator_border_color",$blog_post_info_hierarchical_separator_border_color);

$blog_post_info_hierarchical_separator_width = new QodeField("textsimple","blog_post_info_hierarchical_separator_width","","Separator Width (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_separator_width", $blog_post_info_hierarchical_separator_width);

$blog_post_info_hierarchical_separator_thickness = new QodeField("textsimple","blog_post_info_hierarchical_separator_thickness","","Separator Thickness (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_separator_thickness", $blog_post_info_hierarchical_separator_thickness);

$blog_post_info_hierarchical_enable_text_box = new QodeField("yesno","blog_post_info_hierarchical_enable_text_box","no","Enable Boxed Styled Post Content","Enable post text boxed features", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_post_info_hierarchical_enable_text_box_container"));
$panel6->addChild("blog_post_info_hierarchical_enable_text_box",$blog_post_info_hierarchical_enable_text_box);

$blog_post_info_hierarchical_enable_text_box_container = new QodeContainer("blog_post_info_hierarchical_enable_text_box_container","blog_post_info_hierarchical_enable_text_box","no");
$panel6->addChild("blog_post_info_hierarchical_enable_text_box_container",$blog_post_info_hierarchical_enable_text_box_container);

$blog_post_info_hierarchical_box_background_color = new QodeField("color","blog_post_info_hierarchical_box_background_color","","Background Color","Choose background color for post text box");
$blog_post_info_hierarchical_enable_text_box_container->addChild("blog_post_info_hierarchical_box_background_color",$blog_post_info_hierarchical_box_background_color);

$blog_post_info_hierarchical_box_border_color = new QodeField("color","blog_post_info_hierarchical_box_border_color","","Border Color","Choose border color for post text box");
$blog_post_info_hierarchical_enable_text_box_container->addChild("blog_post_info_hierarchical_box_border_color",$blog_post_info_hierarchical_box_border_color);

$blog_post_info_hierarchical_box_padding = new QodeField("text","blog_post_info_hierarchical_box_padding","","Text box padding","Please insert padding in format (top right bottom left) i.e. 5px 5px 5px 5px", array(), array("col_width" => 3));
$blog_post_info_hierarchical_enable_text_box_container->addChild("blog_post_info_hierarchical_box_padding",$blog_post_info_hierarchical_box_padding);

$group11 = new QodeGroup("Paragraph","Set paragraph color");
$panel6->addChild("group11",$group11);

$blog_post_info_hierarchical_paragraph_color = new QodeField("colorsimple","blog_post_info_hierarchical_paragraph_color","","Color","This is some description");
$group11->addChild("blog_post_info_hierarchical_paragraph_color",$blog_post_info_hierarchical_paragraph_color);

$group2 = new QodeGroup("Quote/Link Background","Set background of Quote/Link post type");
$panel6->addChild("group2",$group2);

$row1 = new QodeRow();
$group2->addChild("row1",$row1);

$blog_post_info_hierarchical_ql_background_image = new QodeField("yesnosimple","blog_post_info_hierarchical_ql_background_image","no","Background Image","");
$row1->addChild("blog_post_info_hierarchical_ql_background_image",$blog_post_info_hierarchical_ql_background_image);

$blog_post_info_hierarchical_ql_background_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_background_color","","Background Color","Default color is #ffffff.");
$row1->addChild("blog_post_info_hierarchical_ql_background_color",$blog_post_info_hierarchical_ql_background_color);

$blog_post_info_hierarchical_ql_hover_background_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_hover_background_color","","Background Hover Color","Default color is #e6ae48.");
$row1->addChild("blog_post_info_hierarchical_ql_hover_background_color",$blog_post_info_hierarchical_ql_hover_background_color);

$blog_post_info_hierarchical_show_ql_mark = new QodeField("yesno","blog_post_info_hierarchical_show_ql_mark","yes","Enable Quote/Link Icon","Show Icons for Quote/Link Post Format", array(), array("dependence" => true, "dependence_hide_on_yes" => "", "dependence_show_on_yes" => "#qodef_blog_post_info_hierarchical_show_ql_mark_container"));
$panel6->addChild("blog_post_info_hierarchical_show_ql_mark",$blog_post_info_hierarchical_show_ql_mark);

$blog_post_info_hierarchical_show_ql_mark_container = new QodeContainer("blog_post_info_hierarchical_show_ql_mark_container","blog_post_info_hierarchical_show_ql_mark","no");
$panel6->addChild("blog_post_info_hierarchical_show_ql_mark_container",$blog_post_info_hierarchical_show_ql_mark_container);

$row1 = new QodeRow();
$blog_post_info_hierarchical_show_ql_mark_container->addChild("row1",$row1);

$blog_post_info_hierarchical_ql_mark_color = new QodeField("color","blog_post_info_hierarchical_ql_mark_color","","Icon Color","Choose icon color for quote/link post.");
$row1->addChild("blog_post_info_hierarchical_ql_mark_color",$blog_post_info_hierarchical_ql_mark_color);

$blog_post_info_hierarchical_ql_mark_hover_color = new QodeField("color","blog_post_info_hierarchical_ql_mark_hover_color","","Icon Hover Color","Choose hover icon color for quote/link post.");
$row1->addChild("blog_post_info_hierarchical_ql_mark_hover_color",$blog_post_info_hierarchical_ql_mark_hover_color);

$group12 = new QodeGroup("Blog List Spacing","Set spacing for blog layouts");
$panel6->addChild("group12",$group12);

$row1 = new QodeRow();
$group12->addChild("row1",$row1);

$blog_post_info_hierarchical_image_margin_bottom = new QodeField("textsimple","blog_post_info_hierarchical_image_margin_bottom","","Margin Under Image (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_image_margin_bottom",$blog_post_info_hierarchical_image_margin_bottom);

$blog_post_info_hierarchical_date_margin_bottom = new QodeField("textsimple","blog_post_info_hierarchical_date_margin_bottom","","Margin Under Date (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_date_margin_bottom",$blog_post_info_hierarchical_date_margin_bottom);

$blog_post_info_hierarchical_title_margin_bottom = new QodeField("textsimple","blog_post_info_hierarchical_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_title_margin_bottom",$blog_post_info_hierarchical_title_margin_bottom);

$blog_post_info_hierarchical_category_margin_bottom = new QodeField("textsimple","blog_post_info_hierarchical_category_margin_bottom","","Margin Under Category (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_category_margin_bottom",$blog_post_info_hierarchical_category_margin_bottom);

$row2 = new QodeRow();
$group12->addChild("row2",$row2);

$blog_post_info_hierarchical_read_more_margin_top = new QodeField("textsimple","blog_post_info_hierarchical_read_more_margin_top","","Margin Above Read More Button (px)","This is some description");
$row2->addChild("blog_post_info_hierarchical_read_more_margin_top",$blog_post_info_hierarchical_read_more_margin_top);

$blog_post_info_hierarchical_auhtor_margin_top = new QodeField("textsimple","blog_post_info_hierarchical_auhtor_margin_top","","Margin Above Author (px)","This is some description");
$row2->addChild("blog_post_info_hierarchical_auhtor_margin_top",$blog_post_info_hierarchical_auhtor_margin_top);

$blog_post_info_hierarchical_comments_margin_top = new QodeField("textsimple","blog_post_info_hierarchical_comments_margin_top","","Margin Above Comments (px)","This is some description");
$row2->addChild("blog_post_info_hierarchical_comments_margin_top",$blog_post_info_hierarchical_comments_margin_top);

$blog_post_info_hierarchical_social_share_list_margin_top = new QodeField("textsimple","blog_post_info_hierarchical_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row2->addChild("blog_post_info_hierarchical_social_share_list_margin_top",$blog_post_info_hierarchical_social_share_list_margin_top);

$row3 = new QodeRow();
$group12->addChild("row3",$row3);

$blog_post_info_hierarchical_blog_like_margin_top = new QodeField("textsimple","blog_post_info_hierarchical_blog_like_margin_top","","Margin Above Blog Likes (px)","This is some description");
$row3->addChild("blog_post_info_hierarchical_blog_like_margin_top",$blog_post_info_hierarchical_blog_like_margin_top);

$blog_post_info_hierarchical_separator_margin_top = new QodeField("textsimple","blog_post_info_hierarchical_separator_margin_top","","Margin Above Separator (px)","This is some description");
$row3->addChild("blog_post_info_hierarchical_separator_margin_top",$blog_post_info_hierarchical_separator_margin_top);

$blog_post_info_hierarchical_article_margin_bottom = new QodeField("textsimple","blog_post_info_hierarchical_article_margin_bottom","","Margin Between Articles (px)","This is some description");
$row3->addChild("blog_post_info_hierarchical_article_margin_bottom",$blog_post_info_hierarchical_article_margin_bottom);

$group13 = new QodeGroup("Blog List Spacing for Quote and Link Post Type","Set spacing for blog layouts");
$panel6->addChild("group13",$group13);

$row1 = new QodeRow();
$group13->addChild("row1",$row1);

$blog_post_info_hierarchical_ql_title_margin_bottom = new QodeField("textsimple","blog_post_info_hierarchical_ql_title_margin_bottom","","Margin Under Title (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_title_margin_bottom",$blog_post_info_hierarchical_ql_title_margin_bottom);

$blog_post_info_hierarchical_ql_icon_margin_bottom = new QodeField("textsimple","blog_post_info_hierarchical_ql_icon_margin_bottom","","Margin Under Quote/Link Icon (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_icon_margin_bottom",$blog_post_info_hierarchical_ql_icon_margin_bottom);

$blog_post_info_hierarchical_ql_social_share_list_margin_top = new QodeField("textsimple","blog_post_info_hierarchical_ql_social_share_list_margin_top","","Margin Above Social Share List Holder (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_social_share_list_margin_top",$blog_post_info_hierarchical_ql_social_share_list_margin_top);

$blog_post_info_hierarchical_ql_quote_author_margin_bottom = new QodeField("textsimple","blog_post_info_hierarchical_ql_quote_author_margin_bottom","","Margin Under Quote Author (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_quote_author_margin_bottom",$blog_post_info_hierarchical_ql_quote_author_margin_bottom);

$post_text_styling= new QodeTitle("post_text_styling", "Post Text Style");
$panel6->addChild("post_text_styling", $post_text_styling);

$group4 = new QodeGroup("Post Title","Define title styles in this blog post template.");
$panel6->addChild("group4",$group4);

$row1 = new QodeRow();
$group4->addChild("row1",$row1);

$blog_post_info_hierarchical_title_color = new QodeField("colorsimple","blog_post_info_hierarchical_title_color","","Text Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_title_color",$blog_post_info_hierarchical_title_color);

$blog_post_info_hierarchical_title_hover_color = new QodeField("colorsimple","blog_post_info_hierarchical_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_title_hover_color",$blog_post_info_hierarchical_title_hover_color);

$blog_post_info_hierarchical_title_fontsize = new QodeField("textsimple","blog_post_info_hierarchical_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_title_fontsize",$blog_post_info_hierarchical_title_fontsize);

$blog_post_info_hierarchical_title_lineheight = new QodeField("textsimple","blog_post_info_hierarchical_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_title_lineheight",$blog_post_info_hierarchical_title_lineheight);

$row2 = new QodeRow(true);
$group4->addChild("row2",$row2);

$blog_post_info_hierarchical_title_texttransform = new QodeField("selectblanksimple","blog_post_info_hierarchical_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_post_info_hierarchical_title_texttransform",$blog_post_info_hierarchical_title_texttransform);

$blog_post_info_hierarchical_title_google_fonts = new QodeField("Fontsimple","blog_post_info_hierarchical_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_post_info_hierarchical_title_google_fonts",$blog_post_info_hierarchical_title_google_fonts);

$blog_post_info_hierarchical_title_fontstyle = new QodeField("selectblanksimple","blog_post_info_hierarchical_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_post_info_hierarchical_title_fontstyle",$blog_post_info_hierarchical_title_fontstyle);

$blog_post_info_hierarchical_title_fontweight = new QodeField("selectblanksimple","blog_post_info_hierarchical_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_post_info_hierarchical_title_fontweight",$blog_post_info_hierarchical_title_fontweight);

$row3 = new QodeRow(true);
$group4->addChild("row3",$row3);

$blog_post_info_hierarchical_title_letterspacing = new QodeField("textsimple","blog_post_info_hierarchical_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_post_info_hierarchical_title_letterspacing",$blog_post_info_hierarchical_title_letterspacing);

$group5 = new QodeGroup("Post Info Data","Define post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list");
$panel6->addChild("group5",$group5);

$row1 = new QodeRow();
$group5->addChild("row1",$row1);

$blog_post_info_hierarchical_info_color = new QodeField("colorsimple","blog_post_info_hierarchical_info_color","","Text Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_info_color",$blog_post_info_hierarchical_info_color);

$bblog_post_info_hierarchical_info_link_color = new QodeField("colorsimple","blog_post_info_hierarchical_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_info_link_color",$bblog_post_info_hierarchical_info_link_color);

$blog_post_info_hierarchical_info_hover_color = new QodeField("colorsimple","blog_post_info_hierarchical_info_hover_color","","Link Hover Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_info_hover_color",$blog_post_info_hierarchical_info_hover_color);

$blog_post_info_hierarchical_info_fontsize = new QodeField("textsimple","blog_post_info_hierarchical_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_info_fontsize",$blog_post_info_hierarchical_info_fontsize);

$row2 = new QodeRow(true);
$group5->addChild("row2",$row2);

$blog_post_info_hierarchical_info_lineheight = new QodeField("textsimple","blog_post_info_hierarchical_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_post_info_hierarchical_info_lineheight",$blog_post_info_hierarchical_info_lineheight);

$blog_post_info_hierarchical_info_google_fonts = new QodeField("Fontsimple","blog_post_info_hierarchical_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_post_info_hierarchical_info_google_fonts",$blog_post_info_hierarchical_info_google_fonts);

$blog_post_info_hierarchical_info_fontstyle = new QodeField("selectblanksimple","blog_post_info_hierarchical_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_post_info_hierarchical_info_fontstyle",$blog_post_info_hierarchical_info_fontstyle);

$blog_post_info_hierarchical_info_fontweight = new QodeField("selectblanksimple","blog_post_info_hierarchical_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_post_info_hierarchical_info_fontweight",$blog_post_info_hierarchical_info_fontweight);

$row3 = new QodeRow(true);
$group5->addChild("row3",$row3);

$blog_post_info_hierarchical_info_texttransform = new QodeField("selectblanksimple","blog_post_info_hierarchical_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_post_info_hierarchical_info_texttransform",$blog_post_info_hierarchical_info_texttransform);

$blog_post_info_hierarchical_info_letterspacing = new QodeField("textsimple","blog_post_info_hierarchical_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_post_info_hierarchical_info_letterspacing",$blog_post_info_hierarchical_info_letterspacing);


$group7 = new QodeGroup("Quote/Link Title Style","Define title styles for Quote/Link articles");
$panel6->addChild("group7",$group7);

$row1 = new QodeRow();
$group7->addChild("row1",$row1);

$blog_post_info_hierarchical_ql_title_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_title_color","","Text Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_title_color",$blog_post_info_hierarchical_ql_title_color);

$blog_post_info_hierarchical_ql_title_hover_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_title_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_title_hover_color",$blog_post_info_hierarchical_ql_title_hover_color);

$blog_post_info_hierarchical_ql_title_fontsize = new QodeField("textsimple","blog_post_info_hierarchical_ql_title_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_title_font_size",$blog_post_info_hierarchical_ql_title_fontsize);

$blog_post_info_hierarchical_ql_title_lineheight = new QodeField("textsimple","blog_post_info_hierarchical_ql_title_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_title_lineheight",$blog_post_info_hierarchical_ql_title_lineheight);

$row2 = new QodeRow(true);
$group7->addChild("row2",$row2);

$blog_post_info_hierarchical_ql_title_texttransform = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_title_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_post_info_hierarchical_ql_title_texttransform",$blog_post_info_hierarchical_ql_title_texttransform);

$blog_post_info_hierarchical_ql_title_google_fonts = new QodeField("Fontsimple","blog_post_info_hierarchical_ql_title_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_post_info_hierarchical_ql_title_google_fonts",$blog_post_info_hierarchical_ql_title_google_fonts);

$blog_post_info_hierarchical_ql_title_fontstyle = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_title_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_post_info_hierarchical_ql_title_fontstyle",$blog_post_info_hierarchical_ql_title_fontstyle);

$blog_post_info_hierarchical_ql_title_fontweight = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_title_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_post_info_hierarchical_ql_title_fontweight",$blog_post_info_hierarchical_ql_title_fontweight);

$row3 = new QodeRow(true);
$group7->addChild("row3",$row3);

$blog_post_info_hierarchical_ql_title_letterspacing = new QodeField("textsimple","blog_post_info_hierarchical_ql_title_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_post_info_hierarchical_ql_title_letterspacing",$blog_post_info_hierarchical_ql_title_letterspacing);

$group8 = new QodeGroup("Quote/Link Post Info Data","Define quote/link post info text styles (date, category names etc.) Note: Single Posts will take the same styles as in list.");
$panel6->addChild("group8",$group8);

$row1 = new QodeRow();
$group8->addChild("row1",$row1);

$blog_post_info_hierarchical_ql_info_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_info_color","","Text Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_info_color",$blog_post_info_hierarchical_ql_info_color);

$blog_post_info_hierarchical_ql_info_link_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_info_link_color","","Link Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_info_link_color",$blog_post_info_hierarchical_ql_info_link_color);

$blog_post_info_hierarchical_ql_info_hover_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_info_hover_color","","Hover Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_info_hover_color",$blog_post_info_hierarchical_ql_info_hover_color);

$blog_post_info_hierarchical_ql_info_fontsize = new QodeField("textsimple","blog_post_info_hierarchical_ql_info_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_info_fontsize",$blog_post_info_hierarchical_ql_info_fontsize);


$row2 = new QodeRow(true);
$group8->addChild("row2",$row2);

$blog_post_info_hierarchical_ql_info_lineheight = new QodeField("textsimple","blog_post_info_hierarchical_ql_info_lineheight","","Line Height (px)","This is some description");
$row2->addChild("blog_post_info_hierarchical_ql_info_lineheight",$blog_post_info_hierarchical_ql_info_lineheight);

$blog_post_info_hierarchical_ql_info_google_fonts = new QodeField("Fontsimple","blog_post_info_hierarchical_ql_info_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_post_info_hierarchical_ql_info_google_fonts",$blog_post_info_hierarchical_ql_info_google_fonts);

$blog_post_info_hierarchical_ql_info_fontstyle = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_info_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_post_info_hierarchical_ql_info_fontstyle",$blog_post_info_hierarchical_ql_info_fontstyle);

$blog_post_info_hierarchical_ql_info_fontweight = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_info_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_post_info_hierarchical_ql_info_fontweight",$blog_post_info_hierarchical_ql_info_fontweight);

$row3 = new QodeRow(true);
$group8->addChild("row3",$row3);

$blog_post_info_hierarchical_ql_info_texttransform = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_info_texttransform","","Text Transform","This is some description",$options_texttransform);
$row3->addChild("blog_post_info_hierarchical_ql_info_texttransform",$blog_post_info_hierarchical_ql_info_texttransform);

$blog_post_info_hierarchical_ql_info_letterspacing = new QodeField("textsimple","blog_post_info_hierarchical_ql_info_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_post_info_hierarchical_ql_info_letterspacing",$blog_post_info_hierarchical_ql_info_letterspacing);

$group10 = new QodeGroup("Quote Author Style","Define author styles for Quote articles");
$panel6->addChild("group10",$group10);

$row1 = new QodeRow();
$group10->addChild("row1",$row1);

$blog_post_info_hierarchical_ql_author_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_author_color","","Text Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_author_color",$blog_post_info_hierarchical_ql_author_color);

$blog_post_info_hierarchical_ql_author_hover_color = new QodeField("colorsimple","blog_post_info_hierarchical_ql_author_hover_color","","Text Hover Color","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_author_hover_color",$blog_post_info_hierarchical_ql_author_hover_color);

$blog_post_info_hierarchical_ql_author_fontsize = new QodeField("textsimple","blog_post_info_hierarchical_ql_author_fontsize","","Font Size (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_author_font_size",$blog_post_info_hierarchical_ql_author_fontsize);

$blog_post_info_hierarchical_ql_author_lineheight = new QodeField("textsimple","blog_post_info_hierarchical_ql_author_lineheight","","Line Height (px)","This is some description");
$row1->addChild("blog_post_info_hierarchical_ql_author_lineheight",$blog_post_info_hierarchical_ql_author_lineheight);

$row2 = new QodeRow(true);
$group10->addChild("row2",$row2);

$blog_post_info_hierarchical_ql_author_texttransform = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_author_texttransform","","Text Transform","This is some description",$options_texttransform);
$row2->addChild("blog_post_info_hierarchical_ql_author_texttransform",$blog_post_info_hierarchical_ql_author_texttransform);

$blog_post_info_hierarchical_ql_author_google_fonts = new QodeField("Fontsimple","blog_post_info_hierarchical_ql_author_google_fonts","-1","Font Family","This is some description");
$row2->addChild("blog_post_info_hierarchical_ql_author_google_fonts",$blog_post_info_hierarchical_ql_author_google_fonts);

$blog_post_info_hierarchical_ql_author_fontstyle = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_author_fontstyle","","Font Style","This is some description",$options_fontstyle);
$row2->addChild("blog_post_info_hierarchical_ql_author_fontstyle",$blog_post_info_hierarchical_ql_author_fontstyle);

$blog_post_info_hierarchical_ql_author_fontweight = new QodeField("selectblanksimple","blog_post_info_hierarchical_ql_author_fontweight","","Font Weight","This is some description",$options_fontweight);
$row2->addChild("blog_post_info_hierarchical_ql_author_fontweight",$blog_post_info_hierarchical_ql_author_fontweight);

$row3 = new QodeRow(true);
$group10->addChild("row3",$row3);

$blog_post_info_hierarchical_ql_author_letterspacing = new QodeField("textsimple","blog_post_info_hierarchical_ql_author_letterspacing","","Letter Spacing (px)","This is some description");
$row3->addChild("blog_post_info_hierarchical_ql_author_letterspacing",$blog_post_info_hierarchical_ql_author_letterspacing);



