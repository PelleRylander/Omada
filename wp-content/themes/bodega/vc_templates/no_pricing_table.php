<?php

$args = array(
    "type"                         => "price_on_top",
    "title"         			   => "",
    "title_color"                  => "",
    "title_background_color"       => "",
    "price"         			   => "100",
    "price_font_weight"       	   => "",
    "price_background"  	       => "",
    "currency"      			   => "$",
    "price_period"  			   => "Monthly",
    "link"          			   => "",
    "target"        		       => "_self",
    "button_text"   			   => "",
    "button_size"   			   => "",
    "button_color"                 => "",
    "button_background_color"      => "",
	"content_background_color"	   => "",
	"content_background_image"	   => "",
    "active"        			   => "",
    "active_text"   			   => "Best choice",
    "active_text_color"            => "",
    "active_text_background_color" => "",
	"content_text_color"		   => "",
	"title_separator"			   => "",
	"title_separator_color"		   => "",
    "title_border_bottom"          => "yes", 
    "title_border_bottom_color"    => "",
    "table_border_top"             => "yes", 
    "pricing_table_border_top_color" => "",
    "button_arrow"                   => "no",
    "border_arround"                 => "no",
    "border_arround_color"           => "",
);

extract(shortcode_atts($args, $atts));

$html						= "";
$pricing_table_clasess		= '';
$pricing_table_background 	= '';
$pricing_table_background_image	='';
$price_style_array			= array();
$price_style				= array();
$title_style                = "";
$title_top_type_title_style          = array();
$pricing_table_border_top_style      = array();
$active_holder_style_array  = array();
$active_holder_style        = "";
$active_text_style_array    = array();
$active_text_style          = "";
$title_holder_style         = "";
$button_style               = "";
$button_class               = "";
$button_holder_style        = "";
$content_text_style			= "";
$title_separator_style		= "";
$title_clasess				= "";
$active_text_position       = "";
$border_arround_style       = array();
$price_background_style     = '';

$title = esc_html($title);
$title_color = esc_attr($title_color);
$title_background_color = esc_attr($title_background_color);
$price = esc_attr($price);
$price_background = esc_attr($price_background);
$currency = esc_attr($currency);
$price_period = esc_attr($price_period);
$link = esc_url($link);
$button_text = esc_html($button_text);
$button_color = esc_attr($button_color);
$button_background_color = esc_attr($button_background_color);
$content_background_color = esc_attr($content_background_color);
$active_text = esc_html($active_text);
$active_text_color = esc_attr($active_text_color);
$active_text_background_color = esc_attr($active_text_background_color);
$content_text_color = esc_attr($content_text_color);
$title_separator_color = esc_attr($title_separator_color);
$title_border_bottom_color = esc_attr($title_border_bottom_color);
$pricing_table_border_top_color = esc_attr($pricing_table_border_top_color);
$border_arround_color = esc_attr($border_arround_color);


if($target == ""){
    $target = "_self";
}

if($type == "price_on_top") {
    $pricing_table_clasess .= ' price_on_top';
}

if($type == "title_on_top") {
    $pricing_table_clasess .= ' title_on_top';
}

if($active == "yes") {
    $pricing_table_clasess .= ' active';
}

if($title_separator == "yes") {
    $title_clasess .= ' active_small_separator';
}

if($active_text_color !== '') {
    $active_text_style_array[] = 'color: '.$active_text_color;
}

if(is_array($active_text_style_array) && count($active_text_style_array)) {
    $active_text_style = 'style="'.implode(';', $active_text_style_array).'"';
} else {
    $active_text_style = '';
}

if($active_text_background_color !== '') {
    $active_holder_style_array[] = 'background-color: '.$active_text_background_color;
}

if(is_array($active_holder_style_array) && count($active_holder_style_array)) {
    $active_holder_style = 'style="'.implode(';', $active_holder_style_array).'"';
} else {
    $active_holder_style = '';
}


if($price_background !== "") {
    $price_background_style .=  'style="background-color: '.$price_background.';"';
}

if($price_font_weight !== '') {
	$price_style_array[] = 'font-weight: '.$price_font_weight;
}

if(is_array($price_style_array) && count($price_style_array)) {
	$price_style = 'style="'.implode(';', $price_style_array).'"';
} else {
	$price_style = '';
}


if ( $button_size == "normal") {
    $button_class .= "normal";
}

if($content_background_color != ""){
	$pricing_table_background .= "background-color: ".$content_background_color.";";
}

if($content_background_image != ""){
	if(is_numeric($content_background_image)) {
		$background_image_src = wp_get_attachment_url( $content_background_image );
	} else {
		$background_image_src = esc_url($content_background_image);
	}
	$pricing_table_background_image .= "background-image: url(".$background_image_src.");";
}

if($title_color != '') {
    $title_style = "color: '.$title_color.';";
    $title_top_type_title_style[] = "color:" .$title_color. ";";
}


if($title_separator_color != '') {
    $title_separator_style = 'style="background-color: '.$title_separator_color.';"';
}

if($title_background_color != '') {
    $title_holder_style = 'style="background-color: '.$title_background_color.';"';
}

if($title_border_bottom == "no" && $type=="title_on_top" ){
    $title_top_type_title_style [] = "border-bottom:0; padding-bottom:0;";
}

if($title_border_bottom_color != '') {
    $title_top_type_title_style[] = "border-bottom-color:".$title_border_bottom_color.";";
}


if(is_array($title_top_type_title_style) && count($title_top_type_title_style)) {
    $title_top_type_title_style = 'style="'.implode(';', $title_top_type_title_style).'"';
} else {
    $title_top_type_title_style = '';
}


if($button_color != '') {
    $button_style = 'style="color: '.$button_color.';"';
}

if($button_background_color != '') {
    $button_holder_style = 'style="background-color: '.$button_background_color.';"';    
}

if($content_text_color != '') {
    $content_text_style = "color: ".$content_text_color.";";
}

if($table_border_top == "no"){ 
    $pricing_table_border_top_style[] = "border-top:0;";
    $active_text_position = "style = top:-38px;";
}

if($table_border_top == "no" && $border_arround=="yes"){ 
    $pricing_table_border_top_style[] = "border-top:0;";
    $active_text_position = "style = top:-39px;";
}

if($pricing_table_border_top_color != ''){
    $pricing_table_border_top_style[] = "border-top-color: ".$pricing_table_border_top_color.";";
}

if(is_array($pricing_table_border_top_style) && count($pricing_table_border_top_style)) {
    $pricing_table_border_top_style = 'style="'.implode(';', $pricing_table_border_top_style).'"';
} else {
    $pricing_table_border_top_style = '';
}

if($border_arround == "yes"){
    $border_arround_style[] = "border: 1px solid #fff;";
}

if(($border_arround == "yes") && ($border_arround_color != "")){
    $border_arround_style[] = "border-color: ".$border_arround_color." ;";
}

if(($border_arround == "yes") && ($table_border_top == "yes")){
    $border_arround_style[] = "border-top: 0;";
}


if(is_array($border_arround_style) && count($border_arround_style)) {
    $border_arround_style = 'style="'.implode(';', $border_arround_style).'"';
} else {
    $border_arround_style = '';
}

if($type=="title_on_top"){
    $html .= "<div class='q_price_table ".$pricing_table_clasess."' ".$pricing_table_border_top_style.">";
}

if($type=="price_on_top"){
    $html .= "<div class='q_price_table ".$pricing_table_clasess."'>";
}

$html .= "<div class='price_table_inner' ".$border_arround_style.">";

if($active == 'yes') {
	if($type == "price_on_top"){
		 $html .= "<div class='active_text' ".$active_holder_style."><span class='active_text_inner'><span ".$active_text_style.">".__($active_text, 'qode')."</span></span></div>";
	}
	if($type == "title_on_top"){
		$html .= "<div class='active_text' ".$active_text_position."><span class='active_text_inner' ".$active_holder_style."><span ".$active_text_style.">".__($active_text, 'qode')."</span></span></div>";
	}   
}

$html .= "<ul style='".$pricing_table_background_image."'>";

if($type=="price_on_top" ){
    $html .= "<li class='prices' $price_background_style>";
    $html .= "<div class='price_in_table'>";
    $html .= "<sup class='value'>".$currency."</sup>";
    $html .= "<span class='price' ".$price_style.">".$price."</span>";
    $html .= "<span class='mark'>/ ".$price_period."</span>";

    $html .= "</div>"; // close div.price_in_table
    $html .= "</li>"; //close li.prices
    $html .= "<li class='cell table_title ".$title_clasess."' ".$title_holder_style."><span class='title_content' ".$title_style.">".$title."</span>";
    
    if($title_separator == "yes"){
        $html .="<div class='title_separator'  ".$title_separator_style."></div>";
    }
    $html .= "</li>";
}

if($type=="title_on_top"){	
    $html .= "<li class='cell table_title ".$title_clasess."' ".$title_holder_style.">";
    $html .= "<span class='title_content' ".$title_top_type_title_style.">".$title."</span>";
    $html .= "</li>";    

    $html .= "<li class='prices' $price_background_style>";
    $html .= "<div class='price_in_table'>";
    $html .= "<sup class='value'>".$currency."</sup>";
    $html .= "<span class='price' ".$price_style.">".$price."</span>";
    $html .= "<span class='mark'>/ ".$price_period."</span>";
    $html .= "</div>"; // close div.price_in_table
    $html .= "</li>"; //close li.prices	
}

$html .= "<li class='pricing_table_content' style='".$content_text_style." ".$pricing_table_background."'>";
$html .= do_shortcode($content); //append pricing table content
$html .= "</li>";

if(isset($button_text) && $button_text !== '') {
	$html .="<li class='price_button $button_class' ".$button_holder_style." >";
    if($type=="title_on_top"){
        $html .= "<div class='title_on_top_button_wrapper'>";
        $html .= "<a ".$button_style." href='$link' target='$target'>".__($button_text, 'qode')."";
        if($button_arrow == "yes"){
            $html .= "<span class='arrow_right'></span>";
        }        
        $html .= "</a>";
        $html .= "</div>";
    }

    if($type=="price_on_top"){
        $html .= "<a ".$button_style." href='$link' target='$target'>".__($button_text, 'qode')."";
        if($button_arrow == "yes"){
            $html .= "<span class='arrow_right'></span>";
        }
        $html .= "</a>";
    }
	
	$html .= "</li>"; //close li.price_button
}

$html .= "</ul>";
$html .= "</div>"; //close div.price_table_inner
$html .="</div>"; //close div.q_price_table

print $html;