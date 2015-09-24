<?php
if (!function_exists('register_button')) {

    function register_button($buttons) {
        array_push($buttons, "|", "qode_shortcodes");
        return $buttons;
    }

}

if (!function_exists('add_plugin')) {

    function add_plugin($plugin_array) {
        $plugin_array['qode_shortcodes'] = get_template_directory_uri() . '/includes/shortcodes/qode_shortcodes.js';
        return $plugin_array;
    }

}

if (!function_exists('qode_shortcodes_button')) {

    function qode_shortcodes_button() {
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }

        if (get_user_option('rich_editing') == 'true') {
            add_filter('mce_external_plugins', 'add_plugin');
            add_filter('mce_buttons', 'register_button');
        }
    }

}
add_action('after_setup_theme', 'qode_shortcodes_button');

/* Call To Action shortcode */

if (!function_exists('no_call_to_action')) {

    function no_call_to_action($atts, $content = null) {

        global $qodeIconCollections;

        $args = array(
            "type" => "normal",
            "full_width" => "yes",
            "content_in_grid" => "yes",
            "grid_size" => "75",
            "icon_size" => "",
            "icon_position" => "top",
            "icon_color" => "",
            "custom_icon" => "",
            "background_color" => "",
            "border_color" => "",
            "box_padding" => "20px",
            "show_button" => "yes",
            "button_position" => "right",
            "button_size" => "",
            "button_link" => "",
            "button_text" => "button",
            "button_target" => "",
            "button_text_color" => "",
            "button_hover_text_color" => "",
            "button_background_color" => "",
            "button_hover_background_color" => "",
            "button_border_color" => "",
            "button_border_width" => "1",
            "button_hover_border_color" => "",
            "border_radius" => "25",
            "text_color" => "", //used only when shortcode is called from call to action widget
            "text_size" => ""
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $html = '';
        $action_classes = '';
        $action_styles = '';
        $text_wrapper_classes = '';
        $button_styles = '';
        $icon_styles = '';
        $data_attr = '';
        $content_styles = '';
        $action_inner_styles = '';
        $icon_inner_style = '';
        $call_to_action_text_class = "";

        $icon_size = esc_attr($icon_size);
        $icon_color = esc_attr($icon_color);
        $custom_icon = esc_attr($custom_icon);
        $background_color = esc_attr($background_color);
        $border_color = esc_attr($border_color);
        $box_padding = esc_attr($box_padding);
        $button_link = esc_url($button_link);
        $button_text = esc_attr($button_text);
        $button_text_color = esc_attr($button_text_color);
        $button_hover_text_color = esc_attr($button_hover_text_color);
        $button_background_color = esc_attr($button_background_color);
        $button_hover_background_color = esc_attr($button_hover_background_color);
        $button_border_color = esc_attr($button_border_color);
        $button_hover_border_color = esc_attr($button_hover_border_color);
        $text_color = esc_attr($text_color);
        $button_border_width = esc_attr($button_border_width);
        $border_radius = esc_attr($border_radius);
        $text_size = esc_attr($text_size);

        if ($show_button == 'yes') {
            $text_wrapper_classes .= 'to_action_column1 to_action_cell';
        }

        if ($background_color != '') {
            $action_styles .= 'background-color: ' . $background_color . ';';
        }
        $action_classes .= $type;
        if ($border_color != '') {
            $action_styles .= 'border: 1px solid ' . $border_color . ';';
        }
        if ($box_padding != '') {
            $action_inner_styles .= 'padding: ' . $box_padding . ';';
        }

        if ($button_text_color != '') {
            $button_styles .= 'color: ' . $button_text_color . ';';
        }
        if ($icon_color != "") {
            $icon_styles = 'color: ' . $icon_color . ';';
        }

        if ($icon_size != '') {
            $icon_styles .= 'font-size: ' . $icon_size . 'px;';
        }

        if ($button_border_color != '') {
            $button_styles .= 'border-color: ' . $button_border_color . ';';
        }

        if ($button_border_width != '') {
            $button_styles .= 'border-width: ' . $button_border_width . 'px;';
        }

        if ($border_radius != "") {
            $button_styles .= 'border-radius: ' . $border_radius . 'px;-moz-border-radius: ' . $border_radius . 'px;-webkit-border-radius: ' . $border_radius . 'px; ';
        }

        if ($button_background_color != '') {
            $button_styles .= "background-color: {$button_background_color};";
        }

        if ($button_hover_background_color != "") {
            $data_attr .= " data-hover-background-color='" . $button_hover_background_color . "'";
        }

        if ($button_hover_border_color != "") {
            $data_attr .= " data-hover-border-color='" . $button_hover_border_color . "'";
        }

        if ($button_hover_text_color != "") {
            $data_attr .= " data-hover-color='" . $button_hover_text_color."'";
        }

        if ($icon_position !== 'top') {
            $icon_inner_style .= 'vertical-align: ' .$icon_position. ';';
        }

        if ($full_width == "no") {
            $html .= '<div class="container_inner">';
        }

        $html.= '<div class="call_to_action ' . $action_classes . '" style="' . $action_styles . '">';

        if ($content_in_grid == 'yes' && $full_width == 'yes') {
            $html .= '<div class="container_inner">';
        }

        if ($show_button == 'yes') {
            if ($grid_size == "75") {
                $html .= '<div class="call_to_action_row_75_25 clearfix" style="' . $action_inner_styles . '">';
            }
            elseif ($grid_size == "66") {
                $html .= '<div class="call_to_action_row_66_33 clearfix" style="' . $action_inner_styles . '">';
            }
            else {
                $html .= '<div class="call_to_action_row_50_50 clearfix" style="' . $action_inner_styles . '">';
            }
            
        }

        if ($text_size != '') {
            $content_styles .= 'font-size:' . $text_size . 'px;';
            $call_to_action_text_class = " call_to_action_custom_font_size";
        }

        if ($text_color != '') {
            $content_styles .= 'color:' . $text_color . ';';
        }

        $html .= '<div class="text_wrapper ' . $text_wrapper_classes . '">';

        if ($type == "with_icon" || $type == "with_custom_icon") {
            $html .= '<div class="call_to_action_icon_holder">';
            $html .= '<div class="call_to_action_icon">';
            $html .= '<div class="call_to_action_icon_inner" style = "'.$icon_inner_style.'">';
            if ($custom_icon != "") {
                if (is_numeric($custom_icon)) {
                    $custom_icon_src = wp_get_attachment_url($custom_icon);
                } else {
                    $custom_icon_src = $custom_icon;
                }

                $html .= '<img src="' . $custom_icon_src . '" alt="">';
            } else {

                $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
                
                if (method_exists($icon_collection_obj, 'render')) {
                    $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                        'icon_attributes' => array(
                            'style' => $icon_styles,
                            'class' => 'call_to_action_icon '
                        )
                    ));
                }
                
            }

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }

        $html .= '<div class="call_to_action_text'. $call_to_action_text_class .'" style="' . $content_styles . '">'.do_shortcode($content).'</div>';
        $html .= '</div>'; //close text_wrapper

        if ($show_button == 'yes') {
            $button_link = ($button_link != '') ? $button_link : 'javascript: void(0)';

            $html .= '<div class="button_wrapper to_action_column2 to_action_cell" style = "text-align: '.$button_position.'">';
            $html .= '<a href="' . $button_link . '" class="qbutton ' . $button_size . '" target="' . $button_target . '" style="' . $button_styles . '" ' . $data_attr . '>' . $button_text . '</a>';
            $html .= '</div>'; //close button_wrapper
        }

        if ($show_button == 'yes') {
            $html .= '</div>'; //close two_columns_75_25 if opened
        }

        if ($content_in_grid == 'yes' && $full_width == 'yes') {
            $html .= '</div>'; // close .container_inner if oppened
        }

        $html .= '</div>'; //close .call_to_action

        if ($full_width == 'no') {
            $html .= '</div>'; // close .container_inner if oppened
        }

        return $html;
    }

    add_shortcode('no_call_to_action', 'no_call_to_action');
}



/* Blockquote item shortcode */

if (!function_exists('no_blockquote')) {

    function no_blockquote($atts, $content = null) {
        $args = array(
            "text" => "",
            "text_color" => "",
            "title_tag" => "h4",
            "width" => "",
            "line_height" => "",
            "background_color" => "",
            "border_color" => "",
            "quote_icon_color" => "",
            "show_quote_icon" => "",
            "quote_icon_size" => "",
            "show_border" => "yes"
        );

        extract(shortcode_atts($args, $atts));

        $text = esc_html($text);
        $text_color = esc_attr($text_color);
        $width = esc_attr($width);
        $line_height = esc_attr($line_height);
        $background_color = esc_attr($background_color);
        $border_color = esc_attr($border_color);
        $quote_icon_color = esc_attr($quote_icon_color);
        $quote_icon_size = esc_attr($quote_icon_size);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $blockquote_styles = "";
        $blockquote_classes = array('blockquote_shortcode');
        $heading_styles = "";
        $quote_icon_styles = array();

        if ($show_quote_icon == 'yes') {
            $blockquote_classes[] = 'with_quote_icon';
        } else {
            $blockquote_classes[] = ' without_quote_icon';
        }

        if ($width != "") {
            $blockquote_styles .= "width: " . $width . "%;";
        }

        if ($show_border == "no") {
            $blockquote_styles .= "border-left: 0;";
        }


        if ($show_border == "yes" && $border_color != "") {
            $blockquote_styles .= "border-left-color: " . $border_color . ";";
        }

        if ($background_color != "") {
            $blockquote_styles .= "background-color: " . $background_color . ";";
            $blockquote_classes[] = 'with_background';
        }

        if ($text_color != "") {
            $heading_styles .= "color: " . $text_color . ";";
        }

        if ($line_height != "") {
            $heading_styles .= " line-height: " . $line_height . "px;";
        }

        if ($quote_icon_color != "") {
            $quote_icon_styles[] = "color: " . $quote_icon_color;
        }

        if ($quote_icon_size != '') {
            $quote_icon_styles[] = 'font-size: ' . $quote_icon_size . 'px; line-height: ' . $quote_icon_size . 'px;';
        }


        $html .= "<blockquote class='" . implode(' ', $blockquote_classes) . "' style='" . $blockquote_styles . "'>"; //open blockquote
        if ($show_quote_icon == 'yes') {
            $html .= '<span style="' . implode(";", $quote_icon_styles) . '" class="icon_quotations_holder">”</span>';
        }

        $html .= "<" . $title_tag . " class='blockquote_text' ";
        if ($heading_styles != '') {
            $html .= 'style="' . $heading_styles . '"';
        }
        $html .= ">";
        $html .= "<span>" . $text . "</span>";
        $html .= "</" . $title_tag . ">";
        $html .= "</blockquote>"; //close blockquote
        return $html;
    }

    add_shortcode('no_blockquote', 'no_blockquote');
}


/* Button shortcode */

if (!function_exists('no_button')) {

    function no_button($atts, $content = null) {
        global $qode_options;
        global $qodeIconCollections;

        $args = array(
            "size" => "",
            "style" => "",
            "text" => "button",
            "icon_position" => "",
            "icon_color" => "",
            "icon_background_color" => "",
            "icon_background_hover_color" => "",
            "link" => "",
            "target" => "_self",
            "color" => "",
            "hover_color" => "",
            "background_color" => "",
            "hover_background_color" => "",
            "border_color" => "",
            "hover_border_color" => "",
            "font_style" => "",
            "font_weight" => "",
            "text_align" => "",
            "margin" => "",
            "padding" => "",
            "border_radius" => ""
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $text = esc_html($text);
        $icon_color = esc_attr($icon_color);
        $icon_background_color = esc_attr($icon_background_color);
        $icon_background_hover_color = esc_attr($icon_background_hover_color);
        $link = esc_url($link);
        $color = esc_attr($color);
        $hover_color = esc_attr($hover_color);
        $background_color = esc_attr($background_color);
        $hover_background_color = esc_attr($hover_background_color);
        $border_color = esc_attr($border_color);
        $hover_border_color = esc_attr($hover_border_color);
        $margin = esc_attr($margin);
        $padding = esc_attr($padding);
        $border_radius = esc_attr($border_radius);


        if ($target == "") {
            $target = "_self";
        }

        //init variables
        $html = "";
        $button_classes = "qbutton ";
        $button_styles = "";
        $add_icon = "";
        $data_attr = "";

        if ($size != "") {
            $button_classes .= " {$size}";
        }

        if ($text_align != "") {
            $button_classes .= " {$text_align}";
        }
        if ($style == "white" || $style == "mid_transparent" || $style == "top_and_bottom_border") {
            $button_classes .= " {$style}";
        }
        if ($color != "") {
            $button_styles .= 'color: ' . $color . '; ';
        }

        if ($border_color != "") {
            if ($style == "top_and_bottom_border") {
                $button_styles .= 'border-color: ' . $border_color . ' transparent; ';
            } else {
                $button_styles .= 'border-color: ' . $border_color . '; ';
            }
        }

        if ($font_style != "") {
            $button_styles .= 'font-style: ' . $font_style . '; ';
        }

        if ($font_weight != "") {
            $button_styles .= 'font-weight: ' . $font_weight . '; ';
        }

        if ($padding != "" && $padding != '0px') {
            $padding = (strstr($padding, 'px', true)) ? $padding : $padding . "px";
        }
        if ($icon_pack != "") {
            $icon_style = "";
            $button_classes .= " qbutton_with_icon";
            if ($icon_color != "") {
                $icon_style .= 'color: ' . $icon_color . ';';
            }
            if ($size !== "big_large_full_width") {
                if ($icon_background_color !== "") {
                    $icon_style .= 'background-color: ' . $icon_background_color .';';
                }
            }

            if ($icon_background_color == "") {
                $icon_style .= 'width: inherit; ';
            }

            if ($padding != "") {
                if ($icon_position == "left") {
                    $icon_style .= 'margin-right: ' . $padding . '; ';
                }
                else {
                    $icon_style .= 'margin-left: ' . $padding . '; ';
                }
            }


            $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);

            if (method_exists($icon_collection_obj, 'render')) {
                $add_icon .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                    'icon_attributes' => array(
                        'style' => $icon_style,
                        'class' => 'button_icon'
                    )
                ));
            }

        }

        if ($padding != "") {
            if ($add_icon == "" || $icon_background_color == "") {
                $button_styles .= 'padding: 0 ' . $padding . '; '; 
            }
            else {
                if ($icon_position == "left") {
                    $button_styles .= 'padding: 0 ' . $padding . ' 0 0; ';
                }
                else {
                    $button_styles .= 'padding: 0 0 0 ' . $padding . '; ';
                }
            }

        }

        if ($margin != "") {
            $button_styles .= 'margin: ' . $margin . '; ';
        }

        if ($border_radius != "") {
            $button_styles .= 'border-radius: ' . $border_radius . 'px;-moz-border-radius: ' . $border_radius . 'px;-webkit-border-radius: ' . $border_radius . 'px; ';
        }

        if ($background_color != "") {
            $button_styles .= "background-color: {$background_color};";
        }

        if ($hover_background_color != "") {
            $data_attr .= "data-hover-background-color=" . $hover_background_color . " ";
        }

        if ($hover_border_color != "") {
            $data_attr .= "data-hover-border-color=" . $hover_border_color . " ";
        }

        if ($hover_color != "") {
            $data_attr .= "data-hover-color=" . $hover_color . " ";
        }

        if ($size !== "big_large_full_width") {
            if ($icon_background_hover_color !== "") {
                $data_attr .= "data-icon-background-hover-color=" . $icon_background_hover_color . " ";
            }
        }

        if ($icon_position == "left") {
            $button_classes .= " icon_left";
            $html .= '<a href="' . $link . '" target="' . $target . '" ' . $data_attr . ' class="' . $button_classes . '" style="' . $button_styles . '">' . $add_icon . $text . '</a>';
        } else { // default value is right
            $button_classes .= " icon_right";
            $html .= '<a href="' . $link . '" target="' . $target . '" ' . $data_attr . ' class="' . $button_classes . '" style="' . $button_styles . '">' . $text . $add_icon . '</a>';
        }

        return $html;
    }

    add_shortcode('no_button', 'no_button');
}

/* Counter shortcode */

if (!function_exists('no_counter')) {

    function no_counter($atts, $content = null) {
        $args = array(
            "type" => "",
            "box" => "",
            "box_border_color" => "",
            "position" => "",
            "digit" => "",
            "underline_digit" => "",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h4",
            "title_size" => "",
            "font_size" => "",
            "font_weight" => "",
            "font_color" => "",
            "text" => "",
            "text_size" => "",
            "text_font_weight" => "",
            "text_transform" => "",
            "text_color" => "",
            "separator" => "",
			"separator_position" => "under_title",
            "separator_color" => "",
            "separator_border_style" => "",
            "padding_bottom" => "",
            "digit_letter_spacing" => ""			
        );

        extract(shortcode_atts($args, $atts));

        $box_border_color = esc_attr($box_border_color);
        $digit = esc_html($digit);
        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $title_size = esc_attr($title_size);
        $font_size = esc_attr($font_size);
        $font_color = esc_attr($font_color);
        $text = esc_html($text);
        $text_size = esc_attr($text_size);
        $text_color = esc_attr($text_color);
        $separator_color = esc_attr($separator_color);
        $padding_bottom = esc_attr($padding_bottom);
        $digit_letter_spacing = esc_attr($digit_letter_spacing);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $title_styles = "";
        $counter_holder_classes = "";
        $counter_holder_styles = "";
        $counter_classes = "";
        $counter_styles = "";
        $text_styles = "";
        $separator_styles = "";


        //generate styles
        if ($title_color != "") {
            $title_styles .= "color:" . $title_color . ";";
        }

        if ($title_size != "") {
            $title_styles .= "font-size:" . $title_size . "px;";
        }

        if ($position != "") {
            $counter_holder_classes .= " " . $position;
        }

        if ($box == "yes") {
            $counter_holder_classes .= " boxed_counter";
        }

        if ($box_border_color != "") {
            $counter_holder_styles .= "border-color: " . $box_border_color . ";";
        }

        if ($padding_bottom != "") {
            $counter_holder_styles .= "padding-bottom: " . $padding_bottom;
            if (!strstr($padding_bottom, 'px')) {
                $counter_holder_styles .= 'px;';
            }
        }

        if ($type != "") {
            $counter_classes .= " " . $type;
        }

        if ($font_color != "") {
            $counter_styles .= "color: " . $font_color . ";";
        }
        if ($digit_letter_spacing != "") {
            $digit_letter_spacing = (strstr($digit_letter_spacing, 'px', true)) ? $digit_letter_spacing : $digit_letter_spacing . "px";
            $counter_styles .= "letter-spacing: " . $digit_letter_spacing . ";";
        }
        if ($font_size != "") {
            $counter_styles .= "font-size: " . $font_size . "px;";
        }
        if ($font_weight != "") {
            $counter_styles .= "font-weight: " . $font_weight . ";";
        }
        if ($underline_digit == "yes") {
            $counter_styles .= "border-bottom: 1px solid;";
        }
        if ($text_size != "") {
            $text_styles .= "font-size: " . $text_size . "px;";
        }
        if ($text_font_weight != "") {
            $text_styles .= "font-weight: " . $text_font_weight . ";";
        }
        if ($text_transform != "") {
            $text_styles .= "text-transform: " . $text_transform . ";";
        }

        if ($text_color != "") {
            $text_styles .= "color: " . $text_color . ";";
        }

        if ($separator_color != "") {
            $separator_styles .= "border-color: " . $separator_color . ";";
        }

        if ($separator_border_style != "") {
            $separator_styles .= "border-bottom-style: " . $separator_border_style . ';';
        }

        $html .= '<div class="q_counter_holder ' . $counter_holder_classes . '" style="' . $counter_holder_styles . '">';
        $html .= '<span class="counter ' . $counter_classes . '" style="' . $counter_styles . '">' . $digit . '</span>';
		
		if ($separator == "yes" && $separator_position == "above_title" ) {
            $html .= '<span class="separator medium" style="' . $separator_styles . '"></span>';
        }

        $html .= "<{$title_tag} class='counter_title' style='" . $title_styles . "'>$title</{$title_tag}>";

        if ($separator == "yes" && $separator_position == "under_title") {
            $html .= '<span class="separator medium" style="' . $separator_styles . '"></span>';
        }

        $html .= $content;


        if ($text != "") {
            $html .= '<p class="counter_text" style="' . $text_styles . '">' . $text . '</p>';
        }

        $html .= '</div>'; //close q_counter_holder

        return $html;
    }

    add_shortcode('no_counter', 'no_counter');
}

/* Custom font shortcode */

if (!function_exists('no_custom_font')) {

    function no_custom_font($atts, $content = null) {
        $args = array(
            "font_family" => "",
            "font_size" => "",
            "line_height" => "",
            "font_style" => "",
            "font_weight" => "",
            "color" => "",
            "text_decoration" => "",
            "text_shadow" => "",
            "letter_spacing" => "",
            "background_color" => "",
            "padding" => "",
            "margin" => "",
            "text_align" => "left",
            "show_in_border_box" => "",
            "border_color" => "",
            "border_width" => "",
            "text_background_color" => "",
            "text_padding" => ""
        );
        extract(shortcode_atts($args, $atts));

        $font_family = esc_attr($font_family);
        $font_size = esc_attr($font_size);
        $line_height = esc_attr($line_height);
        $font_weight = esc_attr($font_weight);
        $color = esc_attr($color);
        $letter_spacing = esc_attr($letter_spacing);
        $background_color = esc_attr($background_color);
        $padding = esc_attr($padding);
        $margin = esc_attr($margin);
        $border_color = esc_attr($border_color);
        $border_width = esc_attr($border_width);
        $text_background_color = esc_attr($text_background_color);
        $text_padding = esc_attr($text_padding);

        $html = '';
        $html .= '<div class="custom_font_holder" style="';
        if ($font_family != "") {
            $html .= 'font-family: ' . $font_family . ';';
        }

        if ($font_size != "") {
            $html .= ' font-size: ' . $font_size . 'px;';
        }

        if ($line_height != "") {
            $html .= ' line-height: ' . $line_height . 'px;';
        }

        if ($font_style != "") {
            $html .= ' font-style: ' . $font_style . ';';
        }

        if ($font_weight != "") {
            $html .= ' font-weight: ' . $font_weight . ';';
        }

        if ($color != "") {
            $html .= ' color: ' . $color . ';';
        }

        if ($text_decoration != "") {
            $html .= ' text-decoration: ' . $text_decoration . ';';
        }

        if ($text_shadow == "yes") {
            $html .= ' text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);';
        }

        if ($letter_spacing != "") {
            $html .= ' letter-spacing: ' . $letter_spacing . 'px;';
        }

        if ($background_color != "") {
            $html .= ' background-color: ' . $background_color . ';';
        }

        if ($padding != "") {
            $html .= ' padding: ' . $padding . 'px;';
        }

        if ($margin != "") {
            $html .= ' margin: ' . $margin . 'px;';
        }

        $html .= ' text-align: ' . $text_align . ';';
        $html .= '"><span ';
        if ($show_in_border_box == "yes") {
            $html .= 'class="show_in_border_box" style= "border:1px solid;';
            if ($border_color != "") {
                $html .= 'border-color: ' . $border_color . ';';
            }
            if ($border_width != "") {
                $html .= 'border-width: ' . $border_width . 'px;';
            }
            if ($text_background_color != "") {
                $html .= 'background-color: ' . $text_background_color . ';';
            }
            if ($text_padding != "") {
                $html .= 'padding: ' . $text_padding . ';';
            }
            $html .= '"';
        }

        $html .= '>' . $content . '</span></div>';

        return $html;
    }

    add_shortcode('no_custom_font', 'no_custom_font');
}

/* Cover Boxes shortcode */

if (!function_exists('no_cover_boxes')) {

    function no_cover_boxes($atts, $content = null) {
        $args = array(
            "active_element" => "1",
            "title_tag" => "h4",
            "title1" => "",
            "title_color1" => "",
            "text1" => "",
            "text_color1" => "",
            "image1" => "",
            "link1" => "",
            "link_label1" => "",
            "target1" => "",
            "title2" => "",
            "title_color2" => "",
            "text2" => "",
            "text_color2" => "",
            "image2" => "",
            "link2" => "",
            "link_label2" => "",
            "target2" => "",
            "title3" => "",
            "title_color3" => "",
            "text3" => "",
            "text_color3" => "",
            "image3" => "",
            "link3" => "",
            "link_label3" => "",
            "target3" => "",
            "read_more_button_style" => "",
            "separator" => "",
            "separator_color" => "",
            "separator_border_style" => ""
        );
        extract(shortcode_atts($args, $atts));

        $active_element = esc_attr($active_element);
        $title1 = esc_html($title1);
        $title_color1 = esc_attr($title_color1);
        $text1 = esc_html($text1);
        $text_color1 = esc_attr($text_color1);
        $image1 = esc_attr($image1);
        $link1 = esc_url($link1);
        $link_label1 = esc_attr($link_label1);
        $title2 = esc_html($title2);
        $title_color2 = esc_attr($title_color2);
        $text2 = esc_html($text2);
        $text_color2 = esc_attr($text_color2);
        $image2 = esc_attr($image2);
        $link2 = esc_url($link2);
        $link_label2 = esc_attr($link_label2);
        $title3 = esc_html($title3);
        $title_color3 = esc_attr($title_color3);
        $text3 = esc_html($text3);
        $text_color3 = esc_attr($text_color3);
        $image3 = esc_attr($image3);
        $link3 = esc_url($link3);
        $link_label3 = esc_attr($link_label3);
        $separator_color = esc_attr($separator_color);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $separator_styles = "";

        if ($separator_color != "") {
            $separator_styles .= "border-color: " . $separator_color . ";";
        }

        if ($separator_border_style != "") {
            $separator_styles .= "border-bottom-style: " . $separator_border_style . ';';
        }

        $html .= "<div class='cover_boxes' data-active-element='" . $active_element . "'><ul class='clearfix'>";

        $html .= "<li>";
        $html .= "<div class='box'>";
        if ($target1 != "") {
            $target1 = $target1;
        } else {
            $target1 = "_self";
        }
        if (is_numeric($image1)) {
            $image_src1 = wp_get_attachment_url($image1);
        } else {
            $image_src1 = $image1;
        }
        if (is_numeric($image2)) {
            $image_src2 = wp_get_attachment_url($image2);
        } else {
            $image_src2 = $image2;
        }
        if (is_numeric($image3)) {
            $image_src3 = wp_get_attachment_url($image3);
        } else {
            $image_src3 = $image3;
        }
        $html .= "<a class='thumb' href='" . $link1 . "' target='" . $target1 . "'><img alt='" . $title1 . "' src='" . $image_src1 . "' /></a>";
        if ($title_color1 != "") {
            $color1 = " style='color:" . $title_color1 . "''";
        } else {
            $color1 = "";
        }
        if ($text_color1 != "") {
            $t_color1 = " style='color:" . $text_color1 . "'";
        } else {
            $t_color1 = "";
        }
        $html .= "<div class='box_content'><" . $title_tag . " " . $color1 . " class='cover_box_title'>" . $title1 . "</" . $title_tag . ">";
        if ($separator == "yes") {
            $html .= '<span class="separator small" style="' . $separator_styles . '"></span>';
        }
        $html .= "<p " . $t_color1 . ">" . $text1 . "</p>";

        $button_class = "";
        $button_class_wrapper_open = "";
        $button_class_wrapper_close = "";
        if ($read_more_button_style != "no") {
            $button_class = "qbutton small solid_color";
        } else {
            $button_class = "cover_boxes_read_more";
            $button_class_wrapper_open = "<h5>";
            $button_class_wrapper_close = "</h5>";
        }

        if ($link_label1 != "") {
            $html .= $button_class_wrapper_open . "<a class='" . $button_class . "' href='" . $link1 . "' target='" . $target1 . "'>" . $link_label1 . "</a>" . $button_class_wrapper_close;
        }

        $html .= "</div></div>"; // box_content, box
        $html .= "</li>";

        $html .= "<li>";
        $html .= "<div class='box'>";
        if ($target2 != "") {
            $target2 = $target2;
        } else {
            $target2 = "_self";
        }
        $html .= "<a class='thumb' href='" . $link2 . "' target='" . $target2 . "'><img alt='" . $title2 . "' src='" . $image_src2 . "' /></a>";
        if ($title_color2 != "") {
            $color2 = " style='color:" . $title_color2 . "''";
        } else {
            $color2 = "";
        }
        if ($text_color2 != "") {
            $t_color2 = " style='color:" . $text_color2 . "''";
        } else {
            $t_color2 = "";
        }
        $html .= "<div class='box_content'><" . $title_tag . " " . $color2 . " class='cover_box_title'>" . $title2 . "</" . $title_tag . ">";
        if ($separator == "yes") {
            $html .= '<span class="separator small" style="' . $separator_styles . '"></span>';
        }
        $html .= "<p " . $t_color2 . ">" . $text2 . "</p>";

        if ($link_label2 != "") {
            $html .= $button_class_wrapper_open . "<a class='" . $button_class . "' href='" . $link2 . "' target='" . $target2 . "'>" . $link_label2 . "</a>" . $button_class_wrapper_close;
        }

        $html .= "</div></div>"; // box_content, box
        $html .= "</li>";

        $html .= "<li>";
        $html .= "<div class='box'>";
        if ($target3 != "") {
            $target3 = $target3;
        } else {
            $target3 = "_self";
        }
        $html .= "<a class='thumb' href='" . $link3 . "' target='" . $target3 . "'><img alt='" . $title3 . "' src='" . $image_src3 . "' /></a>";
        if ($title_color3 != "") {
            $color3 = " style='color:" . $title_color3 . "''";
        } else {
            $color3 = "";
        }
        if ($text_color3 != "") {
            $t_color3 = " style='color:" . $text_color3 . "''";
        } else {
            $t_color3 = "";
        }
        $html .= "<div class='box_content'><" . $title_tag . " " . $color3 . " class='cover_box_title'>" . $title3 . "</" . $title_tag . ">";
        if ($separator == "yes") {
            $html .= '<span class="separator small" style="' . $separator_styles . '"></span>';
        }
        $html .= "<p " . $t_color3 . ">" . $text3 . "</p>";

        if ($link_label3 != "") {
            $html .= $button_class_wrapper_open . "<a class='" . $button_class . "' href='" . $link3 . "' target='" . $target3 . "'>" . $link_label3 . "</a>" . $button_class_wrapper_close;
        }

        $html .= "</div></div>"; // box_content, box
        $html .= "</li>";

        $html .= "</ul></div>";
        return $html;
    }

    add_shortcode('no_cover_boxes', 'no_cover_boxes');
}

/* Dropcaps shortcode */

if (!function_exists('no_dropcaps')) {

    function no_dropcaps($atts, $content = null) {
        $args = array(
            "color" => "",
            "line_height" => "",
            "background_color" => "",
            "border_color" => "",
            "type" => "",
            "font_family" => "",
            "font_size" => "",
            "font_weight" => "",
            "font_style" => "",
            "text_align" => "",
            "margin" => ""
        );
        extract(shortcode_atts($args, $atts));

        $color = esc_attr($color);
        $line_height = esc_attr($line_height);
        $background_color = esc_attr($background_color);
        $border_color = esc_attr($border_color);
        $font_family = esc_attr($font_family);
        $font_size = esc_attr($font_size);
        $margin = esc_attr($margin);


        $html = "<span class='q_dropcap " . $type . "' style='";
        if ($background_color != "") {
            $html .= "background-color: $background_color;";
        }
        if ($color != "") {
            $html .= " color: $color;";
        }
        if ($border_color != "") {
            $html .= 'border-color: ' . $border_color . ';';
        }
        if ($font_family != "") {
            $html .= 'font-family: ' . $font_family . ';';
        }
        if ($font_size != "") {
            $html .= 'font-size: ' . $font_size . 'px;';
        }
        if ($font_weight != "") {
            $html .= 'font-weight: ' . $font_weight . ';';
        }
        if ($text_align != "") {
            $html .= 'text-align: ' . $text_align . ';';
        }
        if ($margin != "") {
            $html .= 'margin: ' . $margin . ';';
        }
        if ($line_height != "") {
            $html .= 'line-height: ' . $line_height . 'px;';
            $html .= 'height: ' . $line_height . 'px;';
        }
        if ($font_style != "") {
            $html .= 'font-style: ' . $font_style . ';';
        }
        $html .= "'>" . $content . "</span>";

        return $html;
    }

    add_shortcode('no_dropcaps', 'no_dropcaps');
}

/* Highlights shortcode */

if (!function_exists('no_highlight')) {

    function no_highlight($atts, $content = null) {
        extract(shortcode_atts(array("color" => "", "background_color" => ""), $atts));

        $color = esc_attr($color);
        $background_color = esc_attr($background_color);

        $html = "<span class='highlight'";
        if ($color != "" || $background_color != "") {
            $html .= " style='color: " . $color . "; background-color:" . $background_color . ";'";
        }
        $html .= ">" . $content . "</span>";
        return $html;
    }

    add_shortcode('no_highlight', 'no_highlight');
}

/* Icon shortcode */
if (!function_exists('no_icons')) {

    function no_icons($atts, $content = null) {
        global $qodeIconCollections;

        $default_atts = array(
            "back_to_top_icon" => "",
            "fa_size" => "",
            "custom_size" => "",
            "shape_size" => "",
            "type" => "",
            "rotated_shape" => "no",
            "border_radius" => "",
            "inner_border" => "",
            "position" => "",
            "shadow_color" => "",
            "hover_shadow_color" => "",
            "icon_shadow" => "",
            "border_color" => "",
            "border_width" => "",
            "icon_color" => "",
            "background_color" => "",
            "hover_icon_color" => "",
            "hover_border_color" => "",
            "hover_background_color" => "",
            "margin" => "",
            "icon_animation" => "",
            "icon_animation_delay" => "",
            "link" => "",
            "target" => "",
            "anchor_icon" => ""
        );

        $default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($default_atts, $atts));

        $custom_size = esc_attr($custom_size);
        $shape_size = esc_attr($shape_size);
        $border_radius = esc_attr($border_radius);
        $shadow_color = esc_attr($shadow_color);
        $hover_shadow_color = esc_attr($hover_shadow_color);
        $border_color = esc_attr($border_color);
        $border_width = esc_attr($border_width);
        $icon_color = esc_attr($icon_color);
        $background_color = esc_attr($background_color);
        $hover_icon_color = esc_attr($hover_icon_color);
        $hover_border_color = esc_attr($hover_border_color);
        $hover_background_color = esc_attr($hover_background_color);
        $margin = esc_attr($margin);
        $icon_animation_delay = esc_attr($icon_animation_delay);
        $link = esc_url($link);

        $html = "";
        //generate classes
        $icon_stack_classes = ''; //holder
        $animation_delay_style = ''; //holder
        $icon_link_style = ''; //icon
        $icon_link_classes = ''; //link
        //generate inline styles
        $icon_stack_style = ''; //holder
        $icon_style = '';               //icon
        //generate data attr
        $data_attr_icon = array();
        $data_attr_stack = '';

        if ($custom_size != "") {
            if ($type == 'normal') {
                $icon_style .= 'font-size: ' . $custom_size;

                if (!strstr($custom_size, 'px')) {
                    $icon_style .= 'px;';
                }
            }
        }

        if ($icon_color != "") {
            $icon_style .= 'color: ' . $icon_color . ';';
            $icon_link_style .= 'color: ' . $icon_color . ';';
        }

        $fa_size = $qodeIconCollections->getIconSizeClass($fa_size);

        if ($custom_size == '') {
            $icon_stack_classes .= $fa_size;
        }

        // font awesome icon with custom shape size has to have vertical align bottom
        if ($icon_pack == 'font_awesome' && !empty($fa_icon) && $type != 'normal' && $shape_size != '') {
            $icon_style .= "vertical-align:bottom;";
        }

        if ($position != "") {
            $icon_stack_classes .= 'pull-' . $position;
        }

        if ($back_to_top_icon == "yes") {
            $icon_stack_classes .= " back_to_top_icon";
        }

        if ($inner_border == "yes") {
            $icon_stack_classes .= " inner_border";
        }

        if ($icon_shadow == "yes") {
            $icon_stack_classes .= " icon_shadow";
            if ($shadow_color != "") {
                $data_attr_stack .= "data-shadow-color=" . $shadow_color . " ";
                $shadow_color_style = 'text-shadow:1px 1px ' . $shadow_color;
                for ($i = 2; $i < 100; $i++) {
                    $shadow_color_style .= ',' . $i . 'px ' . $i . 'px ' . $shadow_color . '';
                }
                $shadow_color_style .= ';';
                $icon_stack_style .= $shadow_color_style;
            }
            if ($hover_shadow_color != "") {
                $data_attr_stack .= "data-hover-shadow-color=" . $hover_shadow_color . " ";
            }
        }

        if ($background_color != "") {
            $icon_stack_style .= 'background-color: ' . $background_color . ';';
        }

        if ($type != 'normal' && $border_color != "") {
            $icon_stack_style .= 'border-color: ' . $border_color . ';';
        }

        if ($type != 'normal') {
            if ($border_width != "") {
                $icon_stack_style .= 'border-width: ' . $border_width . 'px!important; border-style:solid;';
            } else { //default value
                $icon_stack_style .= 'border-width: 1px; border-style:solid;';
            }
        }

        if ($icon_animation_delay != "") {
            $icon_animation_delay .= 'ms';
            if ($type == 'normal') {
                $animation_delay_style .= '
            -webkit-transition: transform 0.2s ease ' . $icon_animation_delay . ', color 0.15s ease-out;
            -moz-transition: -moz-transform 0.2s ease ' . $icon_animation_delay . ', color 0.15s ease-out;
            -o-transition: -o-transform 0.2s ease ' . $icon_animation_delay . ', color 0.15s ease-out;
            -ms-transition: -ms-transform 0.2s ease ' . $icon_animation_delay . ', color 0.15s ease-out;
            transition: transform 0.2s ease ' . $icon_animation_delay . ', color 0.15s ease-out;';
            } else {
                $animation_delay_style .= '
            -webkit-transition: transform 0.2s ease ' . $icon_animation_delay . ', background-color 0.15s ease-out, border-color 0.15s ease-out, color 0.15s ease-out;
            -moz-transition: -moz-transform 0.2s ease ' . $icon_animation_delay . ', background-color 0.15s ease-out, border-color 0.15s ease-out, color 0.15s ease-out;
            -o-transition: -o-transform 0.2s ease ' . $icon_animation_delay . ', background-color 0.15s ease-out, border-color 0.15s ease-out, color 0.15s ease-out;
            -ms-transition: -ms-transform 0.2s ease ' . $icon_animation_delay . ', background-color 0.15s ease-out, border-color 0.15s ease-out, color 0.15s ease-out;
            transition: transform 0.2s ease ' . $icon_animation_delay . ', background-color 0.15s ease-out, border-color 0.15s ease-out, color 0.15s ease-out;';
            }
        }

        if ($margin != "") {
            $icon_stack_style .= 'margin: ' . $margin . ';';
        }

        $icon_font_size = '';

        if ($custom_size != '' && $shape_size != '') {
            $icon_font_size = $custom_size . 'px';
        }

        if ($custom_size != '' && $shape_size == "") {
            $shape_size = $custom_size;
            $icon_font_size = '60%';
        }

        if ($type != 'normal' && $shape_size != "") {
            if (!strstr($shape_size, 'px')) {
                $shape_size .= 'px';
            }

            $icon_style .= 'line-height:' . $shape_size . ';';

            if($icon_font_size !== '') {
                $icon_style .= 'font-size: ' . $icon_font_size . ';';
            }

            $icon_stack_style .= 'line-height:' . $shape_size . ';';
            $icon_stack_style .= 'width:' . $shape_size . ';';
            $icon_stack_style .= 'height:' . $shape_size . ';';
        } elseif ($type == 'normal' && $custom_size != "") {
            $icon_style .= 'line-height:' . ($custom_size + 2) . 'px;';
        }

        if ($type == 'square' && $rotated_shape == 'yes') {
            $icon_stack_classes .= " rotated";
        }

        if ($border_radius != "") {
            $border_radius = (strstr($border_radius, 'px', true)) ? $border_radius : $border_radius . "px";
            $icon_stack_style .= "border-radius: " . $border_radius . ";-moz-border-radius: " . $border_radius . ";-webkit-border-radius: " . $border_radius . ";";
        }

        if ($hover_icon_color != "") {
            $data_attr_icon["data-hover-color"] = "" . $hover_icon_color . "";
        }

        if ($hover_border_color != "") {
            $data_attr_stack .= "data-hover-border-color=" . $hover_border_color . " ";
        }

        if ($hover_background_color != "") {
            $data_attr_stack .= "data-hover-background-color=" . $hover_background_color . " ";
        }

        if ($anchor_icon == "yes") {
            $icon_link_classes .= 'class="anchor"';
        }

        $html = '<span class="q_icon_shade q_icon_shortcode ' . $icon_pack . ' ' . $type . ' ' . $icon_stack_classes . ' ' . $icon_animation . '" ' . $data_attr_stack . ' style="' . $icon_stack_style . ' ' . $animation_delay_style . '">';
        if ($link != "") {
            $html .= '<a href="' . $link . '" target="' . $target . '" style="' . $icon_link_style . '" ' . $icon_link_classes . '>';
        }

        $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);

        if (method_exists($icon_collection_obj, 'render')) {
            $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                'icon_attributes' => array_merge(
                        array(
                    'style' => $icon_style . ' ' . $animation_delay_style
                        ), $data_attr_icon
                )
            ));
        }

        if ($link != "") {
            $html .= '</a>';
        }

        $html.= '</span>';
        return $html;
    }

    add_shortcode('no_icons', 'no_icons');
}


/* Icon with text shortcode */

if (!function_exists('no_icon_text')) {

    function no_icon_text($atts, $content = null) {

        global $qodeIconCollections;

        $default_atts = array(
            "icon_size" => "",
            "custom_icon_size" => "30",
            "text_left_padding" => "86",
            "text_right_padding" => "86",
            "icon_animation" => "",
            "icon_animation_delay" => "",
            "icon_type" => "",
            "custom_icon" => "",
            "icon_border_width" => "",
            "without_double_border_icon" => "",
            "icon_position" => "",
            "icon_border_color" => "",
            "icon_margin" => "",
            "icon_color" => "",
            "icon_background_color" => "",
            "box_type" => "",
            "box_border" => "",
            "box_border_color" => "",
            "box_background_color" => "",
            "title" => "",
            "title_tag" => "h4",
            "title_color" => "",
            "title_padding" => "",
            "separator" => "",
            "separator_color" => "",
            "separator_width" => "",
            "separator_thickness" => "",
            "separator_alignment" => "",
            "text" => "",
            "text_color" => "",
            "link" => "",
            "link_text" => "",
            "link_color" => "",
            "target" => ""
        );

        $default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());
        
        extract(shortcode_atts($default_atts, $atts));

        $custom_icon_size = esc_attr($custom_icon_size);
        $text_left_padding = esc_attr($text_left_padding);
        $text_right_padding = esc_attr($text_right_padding);
        $icon_animation_delay = esc_attr($icon_animation_delay);
        $custom_icon = esc_attr($custom_icon);
        $icon_border_width = esc_attr($icon_border_width);
        $icon_border_color = esc_attr($icon_border_color);
        $icon_margin = esc_attr($icon_margin);
        $icon_color = esc_attr($icon_color);
        $icon_background_color = esc_attr($icon_background_color);
        $box_border_color = esc_attr($box_border_color);
        $box_background_color = esc_attr($box_background_color);
        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $title_padding = esc_attr($title_padding);
        $separator_color = esc_attr($separator_color);
        $separator_width = esc_attr($separator_width);
        $separator_thickness = esc_attr($separator_thickness);
        $text = esc_html($text);
        $text_color = esc_attr($text_color);
        $link = esc_url($link);
        $link_text = esc_html($link_text);
        $link_color = esc_attr($link_color);

        $icon_size = $qodeIconCollections->getIconSizeClass($icon_size);
        
        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init icon styles
        $style = '';
        $icon_stack_classes = '';

        //init icon stack styles
        $icon_margin_style = '';
        $icon_stack_square_style = '';
        $icon_stack_base_style = '';
        $icon_stack_style = '';
        $icon_stack_font_size = '';
        $icon_holder_style = '';
        $animation_delay_style = '';
        $separator_style = '';

        //generate inline icon styles
        if ($custom_icon_size != "") {
            $custom_icon_size = (strstr($custom_icon_size, 'px', true)) ? $custom_icon_size : $custom_icon_size . 'px';
            $icon_stack_style .= 'font-size: ' . $custom_icon_size . ';';
            $icon_stack_font_size .= 'font-size: ' . $custom_icon_size . ';';
        }

        if ($icon_color != "") {
            $style .= 'color: ' . $icon_color . ';';
            $icon_stack_style .= 'color: ' . $icon_color . ';';
        }

        //generate icon stack styles
        if ($icon_background_color != "") {
            $icon_stack_base_style .= 'background-color: ' . $icon_background_color . ';';
            $icon_stack_square_style .= 'background-color: ' . $icon_background_color . ';';
        }

        if ($icon_border_width !== '') {
            $icon_border_width = (strstr($icon_border_width, 'px', true)) ? $icon_border_width : $icon_border_width . 'px';
            $icon_stack_base_style .= 'border-width: ' . $icon_border_width . ';';
            $icon_holder_style .= 'border-width: ' . $icon_border_width . ';';
            $icon_stack_square_style .= 'border-width: ' . $icon_border_width . ';';
        }

        if ($icon_border_color != "") {
            $icon_stack_style .= 'border-color: ' . $icon_border_color . ';';
            $icon_holder_style .= 'border-color: ' . $icon_border_color . ';';
        }

        if ($icon_margin != "") {
            $icon_margin_style .= "margin: " . $icon_margin . ";";
        }

        if ($icon_animation_delay != "" && $icon_animation == "q_icon_animation") {
            $animation_delay_style .= 'transition-delay: ' . $icon_animation_delay . 'ms; -webkit-transition-delay: ' . $icon_animation_delay . 'ms; -moz-transition-delay: ' . $icon_animation_delay . 'ms; -o-transition-delay: ' . $icon_animation_delay . 'ms;';
        }

        $box_size = '';
        //generate icon text holder styles and classes
        //map value of the field to the actual class value


        if ($icon_pack == 'font_awesome' && !empty($fa_icon)) {

            switch ($icon_size) {
                case 'large': //smallest icon size
                    $box_size = 'tiny';
                    break;
                case 'fa-2x':
                    $box_size = 'small';
                    break;
                case 'fa-3x':
                    $box_size = 'medium';
                    break;
                case 'fa-4x':
                    $box_size = 'large';
                    break;
                case 'fa-5x':
                    $box_size = 'very_large';
                    break;
                default:
                    $box_size = 'tiny';
            }
        }

        $box_icon_type = '';
        switch ($icon_type) {
            case 'normal':
                $box_icon_type = 'normal_icon';
                break;
            case 'square':
                $box_icon_type = 'square';
                break;
            case 'circle':
                $box_icon_type = 'circle';
                break;
        }

        if ($separator == 'yes') {
            $separator_style .= 'style="';

            if ($separator_color != '') {
                $separator_style .= 'background-color:' . $separator_color . ';';
            }
            if ($separator_thickness != '') {
                $separator_style .= 'height:' . $separator_thickness . 'px;';
            }
            if ($separator_width != '') {
                $separator_style .= 'width:' . $separator_width . 'px;';
            }
            if ($separator_alignment != '') {
                $separator_style .= 'float:' . $separator_alignment . ';';
            }

            $separator_style .= '"';
        }
        $html = "";
        $html_icon = "";

        // If icon is image, generate html
        $custom_icon_html = "";
        $custom_icon_holder = "";
        if (($custom_icon !== "") && is_numeric($custom_icon)) {
            $custom_icon_src = wp_get_attachment_url($custom_icon);
            $custom_icon_html = '<div class="custom_icon"><img src=' . $custom_icon_src . '></div>';
            $custom_icon_holder = "custom_icon_holder";
        }
        //genererate icon html
        switch ($icon_type) {
            case 'circle':
                //if custom icon size is set and if it is larger than large icon size
                if ($custom_icon_size != "") {
                    //add custom font class that has smaller inner icon font
                    $icon_stack_classes .= ' custom-font';
                }
                
                $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
                
                if (method_exists($icon_collection_obj, 'render')) {
                    
                    if ($icon_pack == 'font_elegant' && !empty($fe_icon)) {
                    
                        $html_icon .= '<span class="q_font_elegant_holder ' . $icon_type . ' ' . $icon_stack_classes . '" style="' . $icon_stack_style . $icon_stack_base_style . '">';
                        $html_icon .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                            'icon_attributes' => array(
                                'style' => $icon_stack_font_size,
                                'class' => 'icon_text_icon q_font_elegant_icon '
                            )
                        ));
                        $html_icon .= '</span>';
                    } else {
                        
                        $html_icon .= '<span class="qode_icon_stack ' . $icon_size . ' ' . $icon_stack_classes . '" style="' . $icon_stack_style . $icon_stack_base_style . '">';
                        $html_icon .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                            'icon_attributes' => array(
                                'style' => $icon_stack_font_size,
                                'class' => 'icon_text_icon qode_icon_stack_1x'
                            )
                        ));
                        $html_icon .= '</span>';
                    }

                }

                break;
            case 'square':
                //if custom icon size is set and if it is larget than large icon size
                if ($custom_icon_size != "") {
                    //add custom font class that has smaller inner icon font
                    $icon_stack_classes .= ' custom-font';
                }
                
                $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
                    
                if (method_exists($icon_collection_obj, 'render')) {
                
                    if ($icon_pack == 'font_elegant' && !empty($fe_icon)) {
                    
                        $html_icon .= '<span class="q_font_elegant_holder ' . $icon_type . ' ' . $icon_stack_classes . '" style="' . $icon_stack_style . $icon_stack_square_style . '">';
                        $html_icon .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                            'icon_attributes' => array(
                                'style' => $icon_stack_font_size,
                                'class' => 'icon_text_icon q_font_elegant_icon '
                            )
                        ));
                        $html_icon .= '</span>';
                        
                    } else {

                        $html_icon .= '<span class="qode_icon_stack ' . $icon_size . ' ' . $icon_stack_classes . '" style="' . $icon_stack_style . $icon_stack_square_style . '">';
                        $html_icon .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                            'icon_attributes' => array(
                                'style' => $icon_stack_font_size,
                                'class' => 'icon_text_icon qode_icon_stack_1x'
                            )
                        ));
                        $html_icon .= '</span>';
                    }
                        
                }
                break;
            default:

                $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
                
                if (method_exists($icon_collection_obj, 'render')) {
                    
                    if ($icon_pack == 'font_elegant' && $fe_icon != '') {
                    
                        $html_icon .= '<span class="q_font_elegant_holder ' . $icon_type . ' ' . $icon_stack_classes . '" style="' . $icon_stack_style . '">';
                        $html_icon .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                            'icon_attributes' => array(
                                'style' => $icon_stack_font_size,
                                'class' => 'icon_text_icon q_font_elegant_icon '
                            )
                        ));
                        $html_icon .= '</span>';
                    
                    } else {

                        $html_icon .= '<span class="qode_icon_stack ' . $icon_size . ' ' . $icon_stack_classes . '" style="' . $icon_stack_style . '">';
                        $html_icon .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                            'icon_attributes' => array(
                                'style' => $icon_stack_font_size,
                                'class' => 'icon_text_icon qode_icon_stack_1x'
                            )
                        ));
                        $html_icon .= '</span>';
                    }
                }


                break;
        }

        $title_style = "";
        if ($title_color != "") {
            $title_style .= "color: " . $title_color;
        }

        $text_style = "";
        if ($text_color != "") {
            $text_style .= "color: " . $text_color;
        }

        $link_style = "";

        if ($link_color != "") {
            $link_style .= "color: " . $link_color . ";";
        }

        //generate normal type of a box html
        if ($box_type == "normal") {

            //init icon text wrapper styles
            $icon_with_text_clasess = '';
            $icon_with_text_style = '';
            $icon_text_inner_style = '';
            //$icon_text_holder_style = '';
            $icon_text_left_holder_style = '';
            $icon_text_right_holder_style = '';
                    
            $icon_with_text_clasess .= $box_size;
            $icon_with_text_clasess .= ' ' . $box_icon_type;

            if ($box_border == "yes") {
                $icon_with_text_clasess .= ' with_border_line';
            }
            
            if ($text_left_padding != "") {
                $icon_text_left_holder_style .= 'padding-left: ' . $text_left_padding . 'px;';
            }
            
            if ($text_right_padding != "") {
                $icon_text_right_holder_style .= 'padding-right: ' . $text_right_padding . 'px;';
            }

            if ($box_border == "yes" && $box_border_color != "") {
                $icon_text_inner_style .= 'border-color: ' . $box_border_color;
            }

            if ($icon_position == "" || $icon_position == "top") {
                $icon_with_text_clasess .= " center";
            }
            if ($icon_position == "left_from_title") {
                $icon_with_text_clasess .= " left_from_title";
            }

            if ($icon_position == "right") {
                $icon_with_text_clasess .= " right clearfix";
            }
            
//            HTML FOR SEPARATOR
            $separator_html = '';
            if ($separator == 'yes') {
                $separator_html .= '<div class = "separator_holder">';
                $separator_html .= '<span class="separator" ' . $separator_style . '></span>';
                $separator_html .= '</div>';
            }
            
//            HTML FOR TITLE
            $title_html = '';
            $title_html .= '<div class="icon_title_inner_holder"><' . $title_tag . ' class="icon_title ' . $custom_icon_holder . '" style="' . $title_style . '">' . $title . '</' . $title_tag . '>';
            $title_html .= $separator_html;
            $title_html .= '</div>';

//            OPEN SHORTCODE HTML
            $html .= "<div class='q_icon_with_title " . $icon_with_text_clasess . "'>";
            
//            IF ICON POSTITION IS RIGHT
            if($icon_position == 'right') {
                
                $html .= '<div class="icon_holder ' . $icon_animation . '" style="' . $icon_margin_style .' position: absolute; right: 0px;' . $animation_delay_style . '">';
                $html .= '<div class="icon_holder_inner">';
                // If icon is image
                if ($custom_icon !== "") {
                    $html .= $custom_icon_html;
                } else {
                    $html .= $html_icon;
                }
                $html .= '</div>'; // close icon_holder_inner
                $html .= '</div>'; //close icon_holder
                
                $html .= '<div class="icon_text_holder" style="' . $icon_text_right_holder_style . ' position: relative;">';
                $html .= $title_html;
                $html .= '<div class="icon_text_inner" style="' . $icon_text_inner_style . '">';
                
            }
            
//          ICON POSITION LEFT FROM TITLE
            elseif ($icon_position == 'left_from_title') {
                $html .= '<div class="icon_title_holder">';
                // If icon is image
                if ($custom_icon !== "") {
                    $html .= '<div class="' . $custom_icon_holder . ' ' . $icon_animation . '" style="' . $icon_margin_style . ' ' . $animation_delay_style . '">';
                    $html .= $custom_icon_html;
                    $html .= '</div>'; //close icon_holder
                } else {
                    $html .= '<div class="icon_holder ' . $icon_animation . '" style="' . $icon_margin_style . ' ' . $animation_delay_style . '">';
                    $html .= '<div class="icon_holder_inner">';
                    $html .= $html_icon;
                    $html .= '</div>'; //close icon_holder_inner
                    $html .= '</div>'; //close icon_holder
                }
                $html .= $title_html;
                $html .= '</div>';
                $html .= '<div class="icon_text_holder">';
                
//            ICON POSITION LEFT
            } elseif($icon_position == 'left') {
                $html .= '<div class="icon_holder ' . $icon_animation . '" style="' . $icon_margin_style . ' ' . $animation_delay_style . '">';
                $html .= '<div class="icon_holder_inner">';
                // If icon is image
                if ($custom_icon !== "") {
                    $html .= $custom_icon_html;
                } else {
                    $html .= $html_icon;
                }
                $html .= '</div>'; // close icon_holder_inner
                $html .= '</div>'; //close icon_holder
                $html .= '<div class="icon_text_holder" style="' . $icon_text_left_holder_style . '">';
                $html .= $title_html;
  
            } else {
                $html .= '<div class="icon_holder ' . $icon_animation . '" style="' . $icon_margin_style . ' ' . $animation_delay_style . '">';
                $html .= '<div class="icon_holder_inner">';
                // If icon is image
                if ($custom_icon !== "") {
                    $html .= $custom_icon_html;
                } else {
                    $html .= $html_icon;
                }
                $html .= '</div>'; // close icon_holder_inner
                $html .= '</div>'; //close icon_holder
                $html .= '<div class="icon_text_holder">';
                $html .= $title_html;
                
            }
            
            $html .= '<div class="icon_text_inner" style="' . $icon_text_inner_style . '">';

            $html .= "<p style='" . $text_style . "'>" . $text . "</p>";
            if ($link != "") {

                if ($target == "") {
                    $target = "_self";
                }

                if ($link_text == "") {
                    $link_text = "READ MORE";
                }

                $html .= "<a class='icon_with_title_link' href='" . $link . "' target='" . $target . "' style='" . $link_style . "'>" . $link_text . "</a>";
            }

            $html .= '</div></div></div>';

            if  ($icon_position == 'right') {
                $html .= '</div>';
            }
            
            //BOXED STYLE
        } else {
            //init icon text wrapper styles
            $icon_with_text_clasess = '';
            $box_holder_styles = '';

            if ($box_border_color != "") {
                $box_holder_styles .= 'border-color: ' . $box_border_color . ';';
            }

            if ($box_background_color != "") {
                $box_holder_styles .= 'background-color: ' . $box_background_color . ';';
            }

            if ($title_padding != "") {
                $valid_title_padding = (strstr($title_padding, 'px', true)) ? $title_padding : $title_padding . 'px';
                $title_style .= 'padding-top: ' . $valid_title_padding . ';';
            }

            $icon_with_text_clasess .= $box_size;
            $icon_with_text_clasess .= ' ' . $box_icon_type;

            if ($without_double_border_icon == 'yes') {
                $icon_with_text_clasess .= ' without_double_border';
            }

            $html .= '<div class="q_box_holder with_icon" style="' . $box_holder_styles . '">';

            $html .= '<div class="box_holder_icon">';
            $html .= '<div class="box_holder_icon_inner ' . $icon_with_text_clasess . ' ' . $icon_animation . '" style="' . $animation_delay_style . '">';
            $html .= '<div class="icon_holder_inner">';
            // If icon is image
            if ($custom_icon !== "") {
                $html .= $custom_icon_html;
            } else {
                $html .= $html_icon;
            }
            $html .= '</div>'; //close icon_holder_inner
            $html .= '</div>'; //close box_holder_icon_inner
            $html .= '</div>'; //close box_holder_icon
            //generate text html
            $html .= '<div class="box_holder_inner ' . $box_size . ' center">';
            $html .= '<' . $title_tag . ' class="icon_title" style="' . $title_style . '">' . $title . '</' . $title_tag . '>';
            $html .= '<p style="' . $text_style . '">' . $text . '</p>';
            $html .= '</div>'; //close box_holder_inner

            $html .= '</div>'; //close box_holder
        }

        return $html;
    }

    add_shortcode('no_icon_text', 'no_icon_text');
}


/* Image hover shortcode */

if (!function_exists('no_image_hover')) {

    function no_image_hover($atts, $content = null) {
        $args = array(
            "image" => "",
            "hover_image" => "",
            "link" => "",
            "target" => "_self",
            "animation" => "",
            "animation_speed" => "",
            "transition_delay" => ""
        );

        extract(shortcode_atts($args, $atts));

        $image = esc_attr($image);
        $hover_image = esc_attr($hover_image);
        $link = esc_url($link);
        $animation_speed = esc_attr($animation_speed);
        $transition_delay = esc_attr($transition_delay);

        //init variables
        $html = "";
        $image_classes = "";
        $image_src = $image;
        $hover_image_src = $hover_image;
        $images_styles = "";

        if ($animation_speed != "") {
            $transition_property = "opacity " . $animation_speed . "s ease-in-out";
            $images_styles .= " -webkit-transition: " . $transition_property . "; -ms-transition:  " . $transition_property . "; -moz-transition:  " . $transition_property . "; -o-transition:  " . $transition_property . "; transition:  " . $transition_property . ";";
        }

        if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        }

        if (is_numeric($hover_image)) {
            $hover_image_src = wp_get_attachment_url($hover_image);
        }

        if ($hover_image_src != "") {
            $image_classes .= "active_image ";
        }

        $css_transition_delay = ($transition_delay != "" && $transition_delay > 0) ? $transition_delay / 1000 . "s" : "";

        $animate_class = ($animation == "yes") ? "hovered" : "";

        //generate output
        $html .= "<div class='image_hover {$animate_class}' style='' data-transition-delay='{$transition_delay}'>";
        $html .= "<div class='images_holder'>";

        if ($link != "") {
            $html .= "<a href='{$link}' target='{$target}'>";
        }

        $html .= "<img class='{$image_classes}' src='{$image_src}' alt='' style='{$images_styles}' />";
        $html .= "<img class='hover_image' src='{$hover_image_src}' alt='' style='{$images_styles}' />";

        if ($link != "") {
            $html .= "</a>";
        }

        $html .= "</div>"; //close image_hover
        $html .= "</div>"; //close images_holder

        return $html;
    }

    add_shortcode('no_image_hover', 'no_image_hover');
}

/* Icon List Item shortcode */

if (!function_exists('no_icon_list_item')) {

    function no_icon_list_item($atts, $content = null) {
        global $qodeIconCollections;

        $args = array(
            "icon_type" => "",
            "icon_color" => "",
            "icon_margin_right" => "",
            "border_type" => "",
            "border_color" => "",
            "title" => "",
            "title_color" => "",
            "title_size" => "",
            "icon_background_color" => "",
            "bottom_margin" => ""

        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $icon_color = esc_attr($icon_color);
        $icon_margin_right = esc_attr($icon_margin_right);
        $border_color = esc_attr($border_color);
        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $title_size = esc_attr($title_size);
        $icon_background_color = esc_attr($icon_background_color);
        $bottom_margin = esc_attr($bottom_margin);

        $html = '';
        $icon_style = "";
        $icon_classes = "";
        $title_style = "";
        $item_margin_style = "";


        $icon_classes .= $icon_type . " ";
        $icon_classes .= $icon_pack;

        if ($icon_color != "") {
            $icon_style .= "color:" . $icon_color . ";";
        }

        if ($border_color != "" && $border_type != "") {
            $icon_style .= "border-color: " . $border_color . ";";
        }

        if ($icon_margin_right !== "") {
            $icon_margin_right = (strstr($icon_margin_right, 'px', true)) ? $icon_margin_right : $icon_margin_right . 'px';
            $icon_style .= " margin-right: " . $icon_margin_right . ";";
        }


        if ($title_color != "") {
            $title_style .= "color:" . $title_color . ";";
        }

        if ($title_size != "") {
            $title_style .= "font-size: " . $title_size . "px;";
        }

        if ($bottom_margin != "") {
            $bottom_margin = (strstr($bottom_margin, 'px', true)) ? $bottom_margin : $bottom_margin . 'px';
            $item_margin_style .= "style='margin-bottom: " . $bottom_margin . ";'";
        }

        $html .= '<div class="q_icon_list" ' .$item_margin_style .'>';

        $html .= '<div class="q_icon_list_icon_holder">';
        $html .= '<div class="q_icon_list_icon_holder_inner">';

        $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);

        if (method_exists($icon_collection_obj, 'render')) {
            $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                'icon_attributes' => array(
                    'style' => $icon_style,
                    'class' => $icon_classes . ' ' . $border_type
                )
            ));
        }

        $html .= '</div>'; // close q_icon_list_icon_holder_inner
        $html .= '</div>'; // close q_icon_list_icon_holder

        $html .= '<p style="' . $title_style . '">' . $title . '</p>';
        $html .= '</div>'; // close q_icon_list
        return $html;
    }

    add_shortcode('no_icon_list_item', 'no_icon_list_item');
}


/* Image with text shortcode */

if (!function_exists('no_image_with_text')) {

    function no_image_with_text($atts, $content = null) {
        $args = array(
            "image" => "",
            "alignment" => "center",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h5"
        );
        extract(shortcode_atts($args, $atts));

        $image = esc_attr($image);
        $title = esc_html($title);
        $title_color = esc_attr($title_color);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = '';
        $html .= '<div class="image_with_text ' . $alignment . '">';
        if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        } else {
            $image_src = $image;
        }
        $html .= '<img src="' . $image_src . '" alt="' . $title . '" />';
        $html .= '<' . $title_tag . ' ';
        if ($title_color != "") {
            $html .= 'style="color:' . $title_color . ';"';
        }
        $html .= '>' . $title . '</' . $title_tag . '>';
        $html .= '<span style="margin:0;" class="separator transparent"></span>';
        $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;
    }

    add_shortcode('no_image_with_text', 'no_image_with_text');
}

/* Interactive banners shortcode */

if (!function_exists('no_interactive_banners')) {

    function no_interactive_banners($atts, $content = null) {

        global $qodeIconCollections;

        $args = array(
            "layout_width" => "",
            "show_border" => "yes",
            "border_color" => "",
            "inner_border_offset" => "",
            "image" => "",
            "image_animate" => "",
            "overlay_color" => "",
            "overlay_color_hover" => "",
            "icon_zoom" => "",
            "icon_custom_size" => "20",
            "icon_color" => "",
            "icon_type" => "circle",
            "title" => "",
            "title_color" => "",
            "title_size" => "17",
            "title_tag" => "h4",
            "link_over_content" => "",
            "content_link" => "",
            "show_button" => "always",
            "button_size" => "",
            "button_padding" => "",
            "button_link" => "",
            "link_text" => "SEE MORE",
            "target" => "_self",
            "link_color" => "",
            "link_border_color" => "",
            "link_background_color" => "",
            "button_animation" => "",
            "separator" => "yes",
            "separator_thickness" => "",
            "separator_color" => "",
            "separator_animate" => "",
            "show_content" => "always",
            "show_title" => "always"
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $border_color = esc_attr($border_color);
        $inner_border_offset = esc_attr($inner_border_offset);
        $image = esc_attr($image);
        $overlay_color = esc_attr($overlay_color);
        $overlay_color_hover = esc_attr($overlay_color_hover);
        $icon_custom_size = esc_attr($icon_custom_size);
        $icon_color = esc_attr($icon_color);
        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $title_size = esc_attr($title_size);
        $content_link = esc_url($content_link);
        $button_size = esc_attr($button_size);
        $button_padding = esc_attr($button_padding);
        $button_link = esc_url($button_link);
        $link_text = esc_html($link_text);
        $link_color = esc_attr($link_color);
        $link_border_color = esc_attr($link_border_color);
        $link_background_color = esc_attr($link_background_color);
        $separator_thickness = esc_attr($separator_thickness);
        $separator_color = esc_attr($separator_color);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $title_styles = "";
        $icon_styles = "";
        $link_style = "";
        $icon_font_style = "";
        $inline_border_style = "";
        $custom_classes = "";
        $shader_style = "";
        $inner_border_style = "";
        $data_attr_shader = "";
        $title_class = "";

        //generate styles
        if ($show_border == "no") {
            $inline_border_style .= "border:none;";
        }
        if ($show_border == "yes" && $border_color != "") {
            $inline_border_style .= "border-color:  " . $border_color . ";";
        }
        if ($show_title != "never") {
            if ($title_color != "") {
                $title_styles .= "color: " . $title_color . ";";
            }

            if ($title_size != "") {
                $valid_title_size = (strstr($title_size, 'px', true)) ? $title_size : $title_size . 'px';
                $title_styles .= "font-size: " . $valid_title_size . ";";
            }
        }

        if ($overlay_color != '') {
            $shader_style .= 'style="background-color:' . $overlay_color . ';"';
        }

        if ($overlay_color_hover != '') {
            $data_attr_shader .= "data-hover-background-color=" . $overlay_color_hover . " ";
        }

        if ($inner_border_offset != "") {
            $inner_border_style .= "style='";
            $valid_inner_border_offset = (strstr($inner_border_offset, 'px', true)) ? $inner_border_offset : $inner_border_offset . 'px';
            $inner_border_style .= "padding: " . $valid_inner_border_offset . ";";
            $inner_border_style .= "'";
        }

        if ($icon_pack !== '') {

            if ($icon_zoom == 'yes') {
                $custom_classes .= ' icon_zoom';
            }

            $icon_styles .= "";

            if ($icon_color != "") {
                $icon_styles .= "color: " . $icon_color . ";";
            }

            if ($icon_custom_size != "") {
                $icon_font_style .= ' font-size: ' . $icon_custom_size;
                if (!strstr($icon_custom_size, 'px')) {
                    $icon_font_style .= 'px';
                }
                $icon_styles .= $icon_font_style . ';';
            }

        }

        if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        } else {
            $image_src = $image;
        }

        if ($image_animate == 'yes') {
            $custom_classes .= ' image_zoom';
        }

        if ($link_color != "") {
            $link_style .= "color: " . $link_color . ";";
        }

        if ($link_border_color != "") {
            $link_style .= "border-color: " . $link_border_color . ";";
        }

        if ($link_background_color != "") {
            $link_style .= "background-color: " . $link_background_color . ";";
        }

        if ($show_button != "never") {

            if ($button_size != "") {
                if (!strstr($button_size, 'px')) {
                    $button_size .= 'px';
                }
                $link_style .= "height: " . $button_size . ';';
                $link_style .= "line-height: " . $button_size . ';';
            }

            if ($button_padding != "") {
                if (!strstr($button_padding, 'px')) {
                    $button_padding .= 'px';
                }
                $link_style .= "padding: 0 " . $button_padding . ";";
            }
        }

        if ($separator == "yes") {

            $separator_styles = "";
            $separator_classes = "";

            if ($separator_thickness != "") {
                $separator_styles .= 'border-width: ' . $separator_thickness . '';
                if (!strstr($separator_thickness, 'px')) {
                    $separator_styles .= 'px';
                }
                $separator_styles .= ';';
            }

            if ($separator_color != "") {
                $separator_styles .= "border-color: " . $separator_color . ";";
            }

            if ($separator_animate == "yes") {
                $separator_classes .= "animate";
            }
        }

        if ($show_button == "on_hover") {
            if ($show_content == "never") {
                $custom_classes .= ' button_replace_text';
            } else {
                $custom_classes .= ' ' . $button_animation;
            }
        }
        if ($show_button == "always") {
            $custom_classes .= ' button_always';
        }

        $link = '#';
        if ($link_over_content == 'yes') {
            $link = $content_link;
        } else {
            $link = $button_link;
        }

        //generate output
        $html .= '<div class="q_image_with_text_over ' . $custom_classes . ' ' . $layout_width . '">';
        $html .= '<div class="shader" ' . $shader_style . ' ' . $data_attr_shader . '></div>';
        if ($link_over_content == 'yes' && $show_button == "never") {
            $html .= '<a class="q_image_with_text_link_class" target="_self" href="' . $link . '"></a>';
        }

        $html .= '<img src="' . $image_src . '" alt="' . $title . '" />';
        $html .= '<div class="front_holder" ' . $inner_border_style . '>';
        $html .= '<div class="front_holder_inner" style="' . $inline_border_style . '">';
        $html .= '<div class="front_holder_bottom">';
        $html .= '<div class="front_holder_inner2">';

        if ($icon_pack !== '') {
            $html .= '<div class="icon_holder ' . $icon_type . '">';
            $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
            
            if (method_exists($icon_collection_obj, 'render')) {
                
                $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                    'icon_attributes' => array(
                        'style' => $icon_styles,
                        'class' => ''
                    )
                ));
                
            }
            $html .= '</div>'; //close icon_holder
        }


        if ($show_title != "never") {
            if ($title != "") {
                if ($show_title == "always") {
                    $title_class .= "visible_holder";
                }
                if ($show_title == "on_hover") {
                    $title_class .= "visible_holder_on_hover";
                }

                $html .= '<' . $title_tag . ' class="front_title ' . $title_class . '" style="' . $title_styles . '">' . $title . '</' . $title_tag . '>';

                if ($separator == "yes") {
                    $html .= '<span class="separator small ' . $separator_classes . '" style="' . $separator_styles . '"></span>';
                }
            }
        }

        //front holder html
        if ($show_content != "never") {
            if ($content != "") {
                $html .= " <div class='front_holder_new ";
                if ($separator == "no") {
                    $html .= ' without_separator ';
                }
                if ($show_content == "on_hover") {
                    $html .= ' visible_holder_on_hover ';
                }
                if ($show_content == "always") {
                    $html .= ' visible_holder ';
                }
                $html .= "'><p>";
                $html .= do_shortcode($content);
                $html .= '</p></div>'; //close front_holder_new
            }
        }

        //back holder html
        if ($show_button != "never") {
            if ($link_text != "") {
                $html .= ' <div class="back_holder_new">';
                $html .= '<a class="qbutton small" href="' . $link . '" target="' . $target . '" style="' . $link_style . '">' . $link_text . '</a>';
                $html .= '</div>';
            }
        }

        $html .= '</div>'; //close front_holder_inner2
        $html .= '</div>'; //close front_holder_bottom
        $html .= '</div>'; //close front_holder_inner
        $html .= '</div>'; //close front_holder
        $html .= '</div>'; //close interactive banners

        return $html;
    }

    add_shortcode('no_interactive_banners', 'no_interactive_banners');
}

/* Image with text and icon shortcode */
if (!function_exists('no_image_with_text_and_icon')) {

    function no_image_with_text_and_icon($atts, $content = null) {

        global $qodeIconCollections;

        $args = array(
            "image" => "",
            "icon_pack" => "",
            "fa_icon" => "",
            "fe_icon" => "",
            "icon_type" => "",
            "icon_custom_size" => "25",
            "icon_shape_size" => "100",
            "icon_color" => "",
            "icon_background_color" => "",
            "link" => "",
            "target" => "_self",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h4",
            "position_top" => "75",
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $image = esc_attr($image);
        $icon_custom_size = esc_attr($icon_custom_size);
        $icon_shape_size = esc_attr($icon_shape_size);
        $icon_color = esc_attr($icon_color);
        $icon_background_color = esc_attr($icon_background_color);
        $link = esc_url($link);
        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $position_top = esc_attr($position_top);

        $html = '';
        $holder_style = '';
        $icon_styles = '';

        $icons_param_array = array();
        if ($icon_pack !== '') {
            $icons_param_array[] = "icon_pack='" . $icon_pack . "'";
        }

        foreach ($qodeIconCollections->iconCollections as $icon_set) {
            if (${$icon_set->param}) {
                $icons_param_array[] = $icon_set->param . "='" . ${$icon_set->param} . "'";
            }
        }

        if ($icon_type !== '') {
            $icons_param_array[] = "type='" . $icon_type . "'";
        }
        if ($icon_custom_size != '') {
            $icons_param_array[] = "custom_size='" . $icon_custom_size . "'";
        }
        if ($icon_shape_size != '') {
            $icons_param_array[] = "shape_size='" . $icon_shape_size . "'";
            $icon_position = (-$icon_shape_size / 2);
        }
        if ($icon_color != '') {
            $icons_param_array[] = "icon_color='" . $icon_color . "'";
        }
        if ($icon_background_color !== '') {
            $icons_param_array[] = "background_color='" . $icon_background_color . "'";
            $icons_param_array[] = "border_color='" . $icon_background_color . "'";
        }

        $html .= '<div class="q_image_with_text_and_icon">';

        $html .= '<div class="box_image">';
        if ($link != "") {
            $html .= '<a href="' . $link . '" target="' . $target . '">';
        }
        $html .= '<div class="image_holder_inner">';
        if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        } else {
            $image_src = $image;
        }
        $html .= '<img src="' . $image_src . '" alt="' . $title . '" />';
        $html .= '</div>';

        $html .= '<div class="q_icon_holder" style="bottom:' . $icon_position . 'px;">';

        if ($icon_pack !== '') {
            $html .= do_shortcode('[no_icons ' . implode(' ', $icons_param_array) . ']');
        }

        $html .= '</div>';

        if ($link != "") {
            $html .= '</a>';
        }
        $html .= '</div>'; // close box_image

        $html .= '<div style="margin-top:'.$position_top.'px;">';
            if($title != ""){
                $html .= '<'.$title_tag.' class="q_image_with_text_and_icon_title"';
                if($title_color != ""){
                    $html .= ' style="color:'.$title_color.';"';
                }
                $html .= '>' . $title . '</'.$title_tag.'>';
            }
        $html .= '</div>';

        $html .= '<p>' . do_shortcode($content) . '</p>';

        $html .= '</div>'; // close q_image_with_text_and_icon
        return $html;
    }

    add_shortcode('no_image_with_text_and_icon', 'no_image_with_text_and_icon');
}

/* Latest posts shortcode */

if (!function_exists('no_blog_list')) {

    function no_blog_list($atts, $content = null) {
        $blog_show_comments = "";
        if (isset($qode_options['blog_show_comments'])) {
            $blog_show_comments = $qode_options['blog_show_comments'];
        }

        $qode_like = "on";
        if (isset($qode_options['qode_like'])) {
            $qode_like = $qode_options['qode_like'];
        }

        $args = array(
            "type" => "boxes",
            "number_of_posts" => "",
            "number_of_columns" => "",
            "overlay_color" => "",
            "overlay_icon" => "",
            "rows" => "",
            "image_size" => "original",
            "order_by" => "",
            "order" => "",
            "category" => "",
            "text_length" => "",
            "title_tag" => "h4",
            "title_size" => "",
            "title_color" => "",
            "display_excerpt" => "1",
            "excerpt_color" => "",
            "info_position" => "",
            "display_category" => "",
            "display_date" => "1",
            "date_size" => "",
            "date_position" => "in_icon",
            "display_author" => "0",
            "display_comments" => "",
            "background_color" => "",
            "separator" => "",
            "separator_color" => "",
            "separator_border_style" => "",
            "border_color" => "",
            "border_width" => "",
            "display_button" => "",
            "button_size" => "small",
            "button_style" => "",
            "button_text" => "LEARN MORE",
            "button_color" => "",
            "button_hover_color" => "",
            "button_background_color" => "",
            "button_hover_background_color" => "",
            "button_border_color" => "",
            "button_border_width" => "",
            "button_hover_border_color" => "",
            "button_border_radius" => "",
			"post_info_font_size"  => "",
			"post_info_color"	   => "",
			"post_info_font_family"	   => "",
			"post_info_text_transform"	   => "",
			"post_info_link_color"		=> "",
			"post_info_font_weight"     => "",
			"post_info_letter_spacing"  => "",
			"post_info_font_style"		=> ""
	        );

        extract(shortcode_atts($args, $atts));

        $number_of_posts = esc_attr($number_of_posts);
        $overlay_color = esc_attr($overlay_color);
        $rows = esc_attr($rows);
        $category = esc_attr($category);
        $text_length = esc_attr($text_length);
        $title_size = esc_attr($title_size);
        $title_color = esc_attr($title_color);
        $excerpt_color = esc_attr($excerpt_color);
        $date_size = esc_attr($date_size);
        $background_color = esc_attr($background_color);
        $separator_color = esc_attr($separator_color);
        $border_color = esc_attr($border_color);
        $border_width = esc_attr($border_width);
        $button_text = esc_html($button_text);
        $button_color = esc_attr($button_color);
        $button_hover_color = esc_attr($button_hover_color);
        $button_background_color = esc_attr($button_background_color);
        $button_hover_background_color = esc_attr($button_hover_background_color);
        $button_border_color = esc_attr($button_border_color);
        $button_border_width = esc_attr($button_border_width);
        $button_hover_border_color = esc_attr($button_hover_border_color);
        $button_border_radius = esc_attr($button_border_radius);
        $post_info_font_size = esc_attr($post_info_font_size);
        $post_info_color = esc_attr($post_info_color);
        $post_info_font_family = esc_attr($post_info_font_family);
        $post_info_link_color = esc_attr($post_info_link_color);
        $post_info_letter_spacing = esc_attr($post_info_letter_spacing);


        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $text_column_style = '';


        if ($background_color !== '') {
            $text_column_style .= 'background-color: ' . $background_color . ';';
        }

        //get proper number of posts based on type param
        $posts_number = $number_of_posts;
        if ($number_of_posts === '' && $type ==='boxes'){
            $posts_number = $number_of_columns;
        }

        //run query to get posts
        $q = new WP_Query(array(
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => $posts_number,
            'category_name' => $category
        ));

        //set default value for different type
        if ($display_category == '') {
            if ($type == 'post_over_image') {
                $display_category = '0';
            } else {
                $display_category = '1';
            }
        }

        if ($display_comments == '') {
            if ($type == 'post_over_image' || $type == 'minimal') {
                $display_comments = '0';
            } else {
                $display_comments = '1';
            }
        }



        if ($display_button == '') {
            if ($type == 'post_over_image') {
                $display_button = '1';
            } else {
                $display_button = '0';
            }
        }
        if ($type == 'post_over_image' && $button_style == '') {
            $button_style = 'mid_transparent';
        }

        //get number of columns class for boxes type
        $columns_number = "";
        if ($type == 'boxes' || $type == 'post_over_image' || $type == 'image_with_date') {
            switch ($number_of_columns) {
                case 1:
                    $columns_number = 'one_column';
                    break;
                case 2:
                    $columns_number = 'two_columns';
                    break;
                case 3:
                    $columns_number = 'three_columns';
                    break;
                case 4:
                    $columns_number = 'four_columns';
                    break;
                default:
                    break;
            }
        }

        $title_style = "";
        if ($title_size != '') {
            $title_size = (strstr($title_size, 'px', true)) ? $title_size : $title_size . "px";
            $title_style .= 'style="font-size:' . $title_size . '";';
        }

        $title_link_style = "";

        if ($title_color !== "") {
            $title_link_style = 'color: ' . $title_color . ';';
        }

        $title_link_style = 'style = "' . $title_link_style . '"';

        if ($type == "boxes" || $type == "image_in_box") {
            $date_style = "";
            if ($date_size != '') {
                $date_size = (strstr($date_size, 'px', true)) ? $date_size : $date_size . "px";
                $date_style .= 'style="font-size:' . $date_size . '";';
            }
        }
		$latest_post_info_style_array = array();
		
		if($post_info_font_size != '' ){
			$latest_post_info_style_array[] = 'font-size:' . $post_info_font_size . 'px';
		}
		
		$latest_post_info_color = '';
		if($post_info_color != '' ){
			$latest_post_info_style_array[]  = 'color:' . $post_info_color;
			$latest_post_info_color .= 'style="color: ' .$post_info_color.'"'; 
		}
		
		if($post_info_font_family != '' ){
			$latest_post_info_style_array[] = "font-family:'" . $post_info_font_family . "'";
		}
		
		if($post_info_text_transform != '' ){
			$latest_post_info_style_array[] = 'text-transform:' . $post_info_text_transform;
		}
		
		if($post_info_letter_spacing != '' ){
			$latest_post_info_style_array[] = 'font-weight:' . $post_info_font_weight;
		}
		
		if($post_info_font_weight != '' ){
			$latest_post_info_style_array[] = 'letter-spacing:' . $post_info_letter_spacing .'px';
		}
		
		if($post_info_font_style != '' ){
			$latest_post_info_style_array[] = 'font-style:' . $post_info_font_style;
		}
		
		if (is_array($latest_post_info_style_array) && count($latest_post_info_style_array)) {
            $latest_post_info_style = 'style="' . implode(';', $latest_post_info_style_array) . '"';
        } else {
            $latest_post_info_style = '';
        }
		
		$latest_post_info_link_color = '';
		if($post_info_link_color != '' ){
			$latest_post_info_link_color .= 'style="color: ' .$post_info_link_color.'"';			
		}

        if ($type == 'boxes') {
            $latest_post_overlay_style = '';
            if ($overlay_color != "") {
                $latest_post_overlay_style .= 'style="background-color:' . $overlay_color . ';"';
            }
        }

        if ($display_excerpt == '1') {
            $excerpt_style = '';
            if ($excerpt_color != '') {
                $excerpt_style .= 'style=color:' . $excerpt_color . ';"';
            }
        }

        if ($type == 'post_over_image') {
            //get separator style
            $separator_styles = "";

            if ($separator_color != "") {
                $separator_styles .= "border-color: " . $separator_color . ";";
            }

            if ($separator_border_style != "") {
                $separator_styles .= "border-bottom-style: " . $separator_border_style . ';';
            }
        }

        if ($display_button == '1') {
            //get button style
            $button_param_array = array();
            if ($button_size !== '') {
                $button_param_array[] = "size='" . $button_size . "'";
            }
            if ($button_style !== '') {
                $button_param_array[] = "style='" . $button_style . "'";
            }
            if ($button_text !== '') {
                $button_param_array[] = "text='" . $button_text . "'";
            }
            if ($button_color !== '') {
                $button_param_array[] = "color='" . $button_color . "'";
            }
            if ($button_hover_color !== '') {
                $button_param_array[] = "hover_color='" . $button_hover_color . "'";
            }
            if ($button_background_color !== '') {
                $button_param_array[] = "background_color='" . $button_background_color . "'";
            }
            if ($button_hover_background_color !== '') {
                $button_param_array[] = "hover_background_color='" . $button_hover_background_color . "'";
            }
            if ($button_border_color !== '') {
                $button_param_array[] = "border_color='" . $button_border_color . "'";
            }
            if ($button_border_width !== '') {
                $button_param_array[] = "border_width='" . $button_border_width . "'";
            }
            if ($button_hover_border_color !== '') {
                $button_param_array[] = "hover_border_color='" . $button_hover_border_color . "'";
            }
            if ($button_border_radius != '') {
                $button_param_array[] = "border_radius='" . $button_border_radius . "'";
            }
        }

        $has_background_class = '';
        if ($background_color !== '') {
            $has_background_class .= ' has_background';
        }

        $thumb_image_size = '';
        if ($image_size !== '' && $image_size == "landscape") {
            $thumb_image_size .= 'portfolio-landscape';
        } else if ($image_size !== '' && $image_size == "original") {
            $thumb_image_size .= 'full';
        }

    

        $html = "";
        $html .= '<div class="latest_post_holder ' . $has_background_class . ' ' . $type . ' ' . $columns_number . '">';
        $html .= "<ul class='post_list'>";
        

        while ($q->have_posts()) : $q->the_post();
            $li_classes = "";
            $box_style = "";
            $post_info_html = "";

            switch ($type) {
               case 'image_in_box':

                        if ($background_color !== "") {
                             if ($background_color == "transparent" || $background_color == "rgba(0,0,0,0.01)") {
                                $box_style = "style='background-color: transparent; padding-right: 0; padding-left: 0;'";
                            } else {
                                $box_style = "style='background-color: " . $background_color . ";'";
                            }
                        }

                        $post_info_html .= '<div class="post_info_section" ' . $latest_post_info_style . '>';

                        if ($blog_show_comments == "yes" && $display_comments == "1") {
                          $comments_count = get_comments_number();

                            switch ($comments_count) {
                                case 0:
                                    $comments_count_text = __('No comment', 'qode');
                                    break;
                                case 1:
                                    $comments_count_text = $comments_count . ' ' . __('Comment', 'qode');
                                    break;
                                default:
                                    $comments_count_text = $comments_count . ' ' . __('Comments', 'qode');
                                    break;
                            }
                            $post_info_html .= '<div class="latest_post_comments"> ';
                            $post_info_html .= '<a '.$latest_post_info_link_color.' class="post_comments" href="' . get_comments_link() . '">';
                            $post_info_html .= $comments_count_text;
                            $post_info_html .= '</a></div>'; //close post_comments
                        }

                        //generate category part of description
                        if ($display_category == '1') {
                            $cat = get_the_category();
                            $post_info_html .= '<div class="latest_post_categories"> ';
                            
                            $post_info_html .= __('in ','qode');
                            
                            foreach ($cat as $categ) {
                                $post_info_html .= '<a '.$latest_post_info_link_color.' href="' . get_category_link($categ->term_id) . '">' . $categ->cat_name . ' </a> ';
                            }
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        //generate author part of description
                        if ($display_author == '1') {
                            $post_info_html .= '<div class="latest_post_author">';
                            $post_info_html .= '<span>' . __("by", "qode") . '</span> <a '.$latest_post_info_link_color.' class="post_author_link" href="' . get_author_posts_url(get_the_author_meta("ID")) . '"><span>' . get_the_author_meta("display_name") . '</span></a>';
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        $post_info_html .= '</div>';
                        // generate post info end

                        $minimal_style = '';

                        $html .= '<li class="clearfix" ' . $minimal_style . '>';

                        $html .= '<div class="box_padding_border">';

                        $html .= '<div class="latest_post" ' . $box_style . '>';

                        $html .= '<div class="latest_post_image clearfix">';
                        $html .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</a>';
                        $html .= '</div>';
  

                        $html .= '<div class="latest_post_text">';
                        $html .= '<div class="latest_post_title_holder">';

                        $html .= '<' . $title_tag . ' class="latest_post_title " ' . $title_style . '>';
                        if ($display_date == '1') {
                            $html .= '<span class="date" ' . $date_style . '>' . get_the_time('d M') . ' </span>'; //close date_hour_holder        
                        }

                        $html .= '<a href="' . get_permalink() . '" '.$title_link_style.'>' . get_the_title() . '</a></' . $title_tag . '>';
                        $html .= '</div>';  // close latest_post_title_holder


                        // top position or default for boxes type
                        if ($info_position == "top") {
                            $html .= $post_info_html;
                        }

                        if ($display_excerpt == '1' && $text_length != '0') {
                            $excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt();

                            $html .= '<p class="excerpt" ' . $excerpt_style . '>' . $excerpt . '...</p>';
                        }

                        // bottom position or default for image_in_box type
                        if ($info_position == "bottom" || $info_position == "") {
                            $html .= $post_info_html;
                        }

                        if ($display_button == '1') {
                            $html .= do_shortcode('[no_button ' . implode(' ', $button_param_array) . ' link="' . get_permalink() . '"]');
                        }

                        $html .= '</div>'; //close latest_post_text

                        $html .= '</div>'; //close latest_post
                        $html .= '</div></li>';
                        

                    break;

                    case 'boxes';
                        if ($background_color != "") {
                            if ($background_color == "transparent" || $background_color == "rgba(0,0,0,0.01)") {
                                $box_style = "style='background-color: transparent; padding-right: 0; padding-left: 0;'";
                            } else {
                                $box_style = "style='background-color: " . $background_color . ";'";
                            }
                        }

                        // generate post info start into $post_info_html
                        //generate comments part of description
                        $post_info_html .= '<div class="post_info_section" '.$latest_post_info_style.'>';

                        if ($blog_show_comments == "yes" && $display_comments == "1") {
                            $comments_count = get_comments_number();

                            switch ($comments_count) {
                                case 0:
                                    $comments_count_text = __('No comment', 'qode');
                                    break;
                                case 1:
                                    $comments_count_text = $comments_count . ' ' . __('Comment', 'qode');
                                    break;
                                default:
                                    $comments_count_text = $comments_count . ' ' . __('Comments', 'qode');
                                    break;
                            }
                            $post_info_html .= '<div class="latest_post_comments"> ';
                            $post_info_html .= '<a '.$latest_post_info_link_color.'  class="post_comments" href="' . get_comments_link() . '">';
                            $post_info_html .= $comments_count_text;
                            $post_info_html .= '</a></div>'; //close post_comments
                        }

                        //generate category part of description
                        if ($display_category == '1') {
                            $cat = get_the_category();
                            $post_info_html .= '<div class="latest_post_categories"> ';
                            
                            $post_info_html .= __('in ','qode');
                            
                            foreach ($cat as $categ) {
                                $post_info_html .= '<a '.$latest_post_info_link_color.' href="' . get_category_link($categ->term_id) . '">' . $categ->cat_name . ' </a> ';
                            }
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        //generate author part of description
                        if ($display_author == '1') {
                            $post_info_html .= '<div class="latest_post_author">';
                            $post_info_html .= '<span>' . __("by", "qode") . '</span> <a '.$latest_post_info_link_color.' class="post_author_link" href="' . get_author_posts_url(get_the_author_meta("ID")) . '"><span>' . get_the_author_meta("display_name") . '</span></a>';
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        $post_info_html .= '</div>';
                        // generate post info end

                        $minimal_style = '';
                        

                        $html .= '<li class="clearfix" ' . $minimal_style . '>';

                        $html .= '<div class="box_padding_border">';
                        
                        $html .= '<div class="boxes_image">';
                        $html .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), $thumb_image_size) . '<span class="latest_post_overlay" ' . $latest_post_overlay_style . '>';
                        if ($overlay_icon == "1") {
                            $html .= '<i class="icon_plus" aria-hidden="true"></i>';
                        }
                        $html .= '</span></a>';
                        $html .= '</div>';
                        

                        $html .= '<div class="latest_post" ' . $box_style . '>';

                        $html .= '<div class="latest_post_text">';
                        $html .= '<div class="latest_post_title_holder">';

                        $html .= '<' . $title_tag . ' class="latest_post_title " ' . $title_style . '>';
                        if ($display_date == '1') {       
                             $html .= '<span class="date" ' . $date_style . '>' . get_the_time('d M') . ' </span>'; //close date_hour_holder                
                        }
                        $html .= '<a href="' . get_permalink() . '" '.$title_link_style.'>' . get_the_title() . '</a></' . $title_tag . '>';
                        $html .= '</div>';  // close latest_post_title_holder

                        // top position or default for boxes type
                        if ($info_position == "top" || $info_position == "") {
                            $html .= $post_info_html;
                        }

                        if ($display_excerpt == '1' && $text_length != '0') {
                            $excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt();

                            $html .= '<p class="excerpt" ' . $excerpt_style . '>' . $excerpt . '...</p>';
                        }

                                                // bottom position or default for image_in_box type
                        if ($info_position == "bottom") {
                            $html .= $post_info_html;
                        }


                        if ($display_button == '1') {
                            $html .= do_shortcode('[no_button ' . implode(' ', $button_param_array) . ' link="' . get_permalink() . '"]');
                        }

                        $html .= '</div>'; //close latest_post_text

                        $html .= '</div>'; //close latest_post
                        $html .= '</div></li>';

                    break;

                   case 'image_with_date':

                        // generate post info start into $post_info_html
                        //generate comments part of description
                        $post_info_html .= '<div class="post_info_section" '.$latest_post_info_style.'>';
                        if ($display_date == '1') {
                            if ($date_position == "down_in_info_section") {
                                $post_info_html .= '<div class="date_holder"><span class="big_date_format">' . get_the_time('d M Y') . '</span></div>';
                            }
                        }
                        if ($blog_show_comments == "yes" && $display_comments == "1") {
                            $comments_count = get_comments_number();

                            switch ($comments_count) {
                                case 0:
                                    $comments_count_text = __('No comment', 'qode');
                                    break;
                                case 1:
                                    $comments_count_text = $comments_count . ' ' . __('Comment', 'qode');
                                    break;
                                default:
                                    $comments_count_text = $comments_count . ' ' . __('Comments', 'qode');
                                    break;
                            }
                            $post_info_html .= '<div class="latest_post_comments"> ';
                            $post_info_html .= '<a '.$latest_post_info_link_color.' class="post_comments" href="' . get_comments_link() . '">';
                            $post_info_html .= $comments_count_text;
                            $post_info_html .= '</a></div>'; //close post_comments
                        }

                        //generate category part of description
                        if ($display_category == '1') {
                            $cat = get_the_category();
                            $post_info_html .= '<div class="latest_post_categories"> ';
                            foreach ($cat as $categ) {
                                $post_info_html .= '<a '.$latest_post_info_link_color.' href="' . get_category_link($categ->term_id) . '">' . $categ->cat_name . ' </a> ';
                            }
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        //generate author part of description
                        if ($display_author == '1') {
                            $post_info_html .= '<div class="latest_post_author">';
                            $post_info_html .= '<span '.$latest_post_info_color.'>' . __("by", "qode") . '</span> <a class="post_author_link" href="' . get_author_posts_url(get_the_author_meta("ID")) . '"><span '.$latest_post_info_link_color.'>' . get_the_author_meta("display_name") . '</span></a>';
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        $post_info_html .= '</div>';
                        // generate post info end

                        $minimal_style = '';

                        $html .= '<li class="clearfix" ' . $minimal_style . '>';
                        if ($display_date == '1') {
                            if ($date_position == "in_icon") {
                                $html .= '<span class="icon_date_holder">';
                                $html .= '<span class="date"><span class="date_day">' . get_the_time('d') . '</span>
                                                        <span class="date_month_year">' . get_the_time('M, Y') . '</span></span>';
                                $html .= '</span>'; //close date_holder
                            }
                        }
                        $html .= '<div class="box_padding_border">';

                        $html .= '<div class="latest_post" ' . $box_style . '>';

                        
                        $html .= '<div class="latest_post_image clearfix">';
                        $html .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'portfolio_masonry_large') . '</a>';
                        $html .= '</div>';

                        $html .= '<div class="latest_post_text">';
                        $html .= '<div class="latest_post_title_holder">';

                        $html .= '<' . $title_tag . ' class="latest_post_title " ' . $title_style . '>';

                        $html .= '<a href="' . get_permalink() . '" '.$title_link_style.'>' . get_the_title() . '</a></' . $title_tag . '>';
                        $html .= '</div>';  // close latest_post_title_holder

                        // top position or default for boxes type
                        if ($info_position == "top" || $info_position == "") {
                            $html .= $post_info_html;
                        }

                        if ($display_excerpt == '1' && $text_length != '0') {
                            $excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt();

                            $html .= '<p class="excerpt" ' . $excerpt_style . '>' . $excerpt . '...</p>';
                        }

                        // bottom position or default for image_in_box type
                        if ($info_position == "bottom") {
                            $html .= $post_info_html;
                        }

                        if ($display_button == '1') {
                            $html .= do_shortcode('[no_button ' . implode(' ', $button_param_array) . ' link="' . get_permalink() . '"]');
                        }

                        $html .= '</div>'; //close latest_post_text

                        $html .= '</div>'; //close latest_post
                        $html .= '</div></li>';

                    break;

                    case 'minimal':

                        // generate post info start into $post_info_html
                        //generate comments part of description
                        $post_info_html .= '<div class="post_info_section" '.$latest_post_info_style.'>';
                        if ($display_date == '1') {
                            $post_info_html .= '<div class="date_holder">' . get_the_time('d M Y') . " " . '</div>';
                        }
                        if ($blog_show_comments == "yes" && $display_comments == "1") {
                            $comments_count = get_comments_number();

                            switch ($comments_count) {
                                case 0:
                                    $comments_count_text = __('No comment', 'qode');
                                    break;
                                case 1:
                                    $comments_count_text = $comments_count . ' ' . __('Comment', 'qode');
                                    break;
                                default:
                                    $comments_count_text = $comments_count . ' ' . __('Comments', 'qode');
                                    break;
                            }
                            $post_info_html .= '<div class="latest_post_comments"> ';
                            $post_info_html .= '<a '.$latest_post_info_link_color.' class="post_comments" href="' . get_comments_link() . '">';
                            $post_info_html .= $comments_count_text;
                            $post_info_html .= '</a></div>'; //close post_comments
                        }

                        //generate category part of description
                        if ($display_category == '1') {
                            $cat = get_the_category();
                            $post_info_html .= '<div class="latest_post_categories"> ';
                            
                            $post_info_html .= __('in ','qode');

                            foreach ($cat as $categ) {
                                $post_info_html .= '<a '.$latest_post_info_link_color.' href="' . get_category_link($categ->term_id) . '">' . $categ->cat_name . ' </a> ';
                            }
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        //generate author part of description
                        if ($display_author == '1') {
                            $post_info_html .= '<div class="latest_post_author">';
                            $post_info_html .= '<span>' . __("by", "qode") . '</span> <a '.$latest_post_info_link_color.' class="post_author_link" href="' . get_author_posts_url(get_the_author_meta("ID")) . '"><span>' . get_the_author_meta("display_name") . '</span></a>';
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        $post_info_html .= '</div>';
                        // generate post info end

                        $minimal_style = '';
                        if ($border_color != '' || $border_width != '') {
                            $minimal_style .= 'style="';
                            if ($border_color != '') {
                                $minimal_style .= 'border-color:' . $border_color . ';';
                            }
                            if ($border_width != '') {
                                $border_width = (strstr($border_width, 'px', true)) ? $border_width : $border_width . "px";
                                $minimal_style .= 'border-width:' . $border_width . ';';
                            }
                            $minimal_style .= '"';
                        }

                        $html .= '<li class="clearfix" ' . $minimal_style . '>';

                        $html .= '<div class="box_padding_border">';

                        $html .= '<div class="latest_post" ' . $box_style . '>';


                        $html .= '<div class="latest_post_text">';
                        $html .= '<div class="latest_post_title_holder">';

                        $html .= '<' . $title_tag . ' class="latest_post_title " ' . $title_style . '>';

                        $html .= '<a href="' . get_permalink() . '" '.$title_link_style.'>' . get_the_title() . '</a></' . $title_tag . '>';
                        $html .= '</div>';  // close latest_post_title_holder

                        // top position or default for boxes type
                        if ($info_position == "top" || $info_position == "") {
                            $html .= $post_info_html;
                        }

                        if ($display_excerpt == '1' && $text_length != '0') {
                            $excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt();

                            $html .= '<p class="excerpt" ' . $excerpt_style . '>' . $excerpt . '...</p>';
                        }

                        // bottom position or default for image_in_box type
                        if ($info_position == "bottom") {
                            $html .= $post_info_html;
                        }

                        if ($display_button == '1') {
                            $html .= do_shortcode('[no_button ' . implode(' ', $button_param_array) . ' link="' . get_permalink() . '"]');
                        }

                        $html .= '</div>'; //close latest_post_text

                        $html .= '</div>'; //close latest_post
                        $html .= '</div></li>';


                    break;

                    default:
                        if ($background_color !== "") {
                             if ($background_color == "transparent" || $background_color == "rgba(0,0,0,0.01)") {
                                $box_style = "style='background-color: transparent; padding-right: 0; padding-left: 0;'";
                            } else {
                                $box_style = "style='background-color: " . $background_color . ";'";
                            }
                        }

                        $post_info_html .= '<div class="post_info_section" '.$latest_post_info_style.'>';

                        if ($blog_show_comments == "yes" && $display_comments == "1") {
                          $comments_count = get_comments_number();

                            switch ($comments_count) {
                                case 0:
                                    $comments_count_text = __('No comment', 'qode');
                                    break;
                                case 1:
                                    $comments_count_text = $comments_count . ' ' . __('Comment', 'qode');
                                    break;
                                default:
                                    $comments_count_text = $comments_count . ' ' . __('Comments', 'qode');
                                    break;
                            }
                            $post_info_html .= '<div class="latest_post_comments"> ';
                            $post_info_html .= '<a '.$latest_post_info_link_color.' class="post_comments" href="' . get_comments_link() . '">';
                            $post_info_html .= $comments_count_text;
                            $post_info_html .= '</a></div>'; //close post_comments
                        }

                        //generate category part of description
                        if ($display_category == '1') {
                            $cat = get_the_category();
                            $post_info_html .= '<div class="latest_post_categories"> ';
                            
                            $post_info_html .= __('in ','qode');
                            
                            foreach ($cat as $categ) {
                                $post_info_html .= '<a '.$latest_post_info_link_color.' href="' . get_category_link($categ->term_id) . '">' . $categ->cat_name . ' </a> ';
                            }
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        //generate author part of description
                        if ($display_author == '1') {
                            $post_info_html .= '<div class="latest_post_author">';
                            $post_info_html .= '<span>' . __("by", "qode") . '</span> <a '.$latest_post_info_link_color.' class="post_author_link" href="' . get_author_posts_url(get_the_author_meta("ID")) . '"><span>' . get_the_author_meta("display_name") . '</span></a>';
                            $post_info_html .= '</div>'; //close span.latest_post_categories
                        }

                        $post_info_html .= '</div>';
                        // generate post info end

                        $minimal_style = '';

                        $html .= '<li class="clearfix" ' . $minimal_style . '>';

                        $html .= '<div class="box_padding_border">';

                        $html .= '<div class="latest_post" ' . $box_style . '>';

                        $html .= '<div class="latest_post_image clearfix">';
                        $html .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</a>';
                        $html .= '</div>';
  

                        $html .= '<div class="latest_post_text">';
                        $html .= '<div class="latest_post_title_holder">';

                        $html .= '<' . $title_tag . ' class="latest_post_title " ' . $title_style . '>';
                        if ($display_date == '1') {
                            $html .= '<span class="date" ' . $date_style . '>' . get_the_time('d M') . ' </span>'; //close date_hour_holder        
                        }

                        $html .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a></' . $title_tag . '>';
                        $html .= '</div>';  // close latest_post_title_holder


                        // top position or default for boxes type
                        if ($info_position == "top") {
                            $html .= $post_info_html;
                        }

                        if ($display_excerpt == '1' && $text_length != '0') {
                            $excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt();

                            $html .= '<p class="excerpt" ' . $excerpt_style . '>' . $excerpt . '...</p>';
                        }

                        // bottom position or default for image_in_box type
                        if ($info_position == "bottom" || $info_position == "") {
                            $html .= $post_info_html;
                        }

                        if ($display_button == '1') {
                            $html .= do_shortcode('[no_button ' . implode(' ', $button_param_array) . ' link="' . get_permalink() . '"]');
                        }

                        $html .= '</div>'; //close latest_post_text

                        $html .= '</div>'; //close latest_post
                        $html .= '</div></li>';

                    break;
            }

            
        endwhile;
        wp_reset_postdata();

        $html .= "</ul></div>"; //close latest_post_holder
        return $html;
    }

    add_shortcode('no_blog_list', 'no_blog_list');
}

/* Line graph shortcode */

if (!function_exists('no_line_graph')) {

    function no_line_graph($atts, $content = null) {
        global $qode_options;
        extract(shortcode_atts(array("type" => "rounded", "custom_color" => "", "labels" => "", "width" => "750", "height" => "350", "scale_steps" => "3", "scale_step_width" => "15"), $atts));
        
        $custom_color = esc_attr($custom_color);
        $labels = esc_attr($labels);
        $width = esc_attr($width);
        $height = esc_attr($height);
        $scale_steps = esc_attr($scale_steps);
        $scale_step_width = esc_attr($scale_step_width);

        $id = mt_rand(1000, 9999);
        if ($type == "rounded") {
            $bezierCurve = "true";
        } else {
            $bezierCurve = "false";
        }

        $id = mt_rand(1000, 9999);
        $html = "<div class='q_line_graf_holder'><div class='q_line_graf'><canvas id='lineGraph" . $id . "' height='" . $height . "' width='" . $width . "'></canvas></div><div class='q_line_graf_legend'><ul>";
        $line_graph_array = explode(";", $content);
        for ($i = 0; $i < count($line_graph_array); $i = $i + 1) {
            $line_graph_el = explode(",", $line_graph_array[$i]);
            $html .= "<li><div class='color_holder' style='background-color: " . trim($line_graph_el[0]) . ";'></div><p style='color: " . $custom_color . ";'>" . trim($line_graph_el[1]) . "</p></li>";
        }
        $html .= "</ul></div></div><script>var lineGraph" . $id . " = {labels : [";
        $line_graph_labels_array = explode(",", $labels);
        for ($i = 0; $i < count($line_graph_labels_array); $i = $i + 1) {
            if ($i > 0)
                $html .= ",";
            $html .= '"' . $line_graph_labels_array[$i] . '"';
        }
        $html .= "],";
        $html .= "datasets : [";
        $line_graph_array = explode(";", $content);
        for ($i = 0; $i < count($line_graph_array); $i = $i + 1) {
            $line_graph_el = explode(",", $line_graph_array[$i]);
            if ($i > 0)
                $html .= ",";
            $values = "";
            for ($j = 2; $j < count($line_graph_el); $j = $j + 1) {
                if ($j > 2)
                    $values .= ",";
                $values .= $line_graph_el[$j];
            }
            $color = qode_hex2rgb(trim($line_graph_el[0]));
            $html .= "{fillColor: 'rgba(" . $color[0] . "," . $color[1] . "," . $color[2] . ",0.7)',data:[" . $values . "]}";
        }
        if (!empty($qode_options['text_fontsize'])) {
            $text_fontsize = $qode_options['text_fontsize'];
        } else {
            $text_fontsize = 15;
        }
        if (!empty($qode_options['text_color']) && $custom_color == "") {
            $text_color = $qode_options['text_color'];
        } else if (empty($qode_options['text_color']) && $custom_color != "") {
            $text_color = $custom_color;
        } else if (!empty($qode_options['text_color']) && $custom_color != "") {
            $text_color = $custom_color;
        } else {
            $text_color = '#818181';
        }
        $html .= "]};
			var \$j = jQuery.noConflict();
			\$j(document).ready(function() {
				if(\$j('.touch .no_delay').length){
					new Chart(document.getElementById('lineGraph" . $id . "').getContext('2d')).Line(lineGraph" . $id . ",{scaleOverride : true,
					scaleStepWidth : " . $scale_step_width . ",
					scaleSteps : " . $scale_steps . ",
					bezierCurve : " . $bezierCurve . ",
					pointDot : false,
					scaleLineColor: '#505050',
					scaleFontColor : '" . $text_color . "',
					scaleFontSize : " . $text_fontsize . ",
					scaleGridLineColor : '#e1e1e1',
					datasetStroke : false,
					datasetStrokeWidth : 0,
					animationSteps : 120,});
				}else{
					\$j('#lineGraph" . $id . "').appear(function() {
						new Chart(document.getElementById('lineGraph" . $id . "').getContext('2d')).Line(lineGraph" . $id . ",{scaleOverride : true,
						scaleStepWidth : " . $scale_step_width . ",
						scaleSteps : " . $scale_steps . ",
						bezierCurve : " . $bezierCurve . ",
						pointDot : false,
						scaleLineColor: '#000000',
						scaleFontColor : '" . $text_color . "',
						scaleFontSize : " . $text_fontsize . ",
						scaleGridLineColor : '#e1e1e1',
						datasetStroke : false,
						datasetStrokeWidth : 0,
						animationSteps : 120,});
					},{accX: 0, accY: -200});
				}
			});
		</script>";
        return $html;
    }

    add_shortcode('no_line_graph', 'no_line_graph');
}

/* Message shortcode */

if (!function_exists('no_message')) {

    function no_message($atts, $content = null) {
        global $qode_options_theme18;
        global $qodeIconCollections;

        $args = array(
            "type" => "",
            "background_color" => "",
            "border_color" => "",
            "border_width" => "",
            "icon_position" => "",
            "custom_icon_position" => "",
            "icon_size" => "fa-2x",
            "icon_custom_size" => "",
            "icon_color" => "",
            "icon_background_color" => "",
            "custom_icon" => "",
            "close_button_color" => ""
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $background_color = esc_attr($background_color);
        $border_color = esc_attr($border_color);
        $border_width = esc_attr($border_width);
        $icon_custom_size = esc_attr($icon_custom_size);
        $icon_color = esc_attr($icon_color);
        $icon_background_color = esc_attr($icon_background_color);
        $custom_icon = esc_attr($custom_icon);
        $close_button_color = esc_attr($close_button_color);

        //init variables
        $html = "";
        $icon_html = "";
        $message_classes = "";
        $message_styles = "";
        $icon_styles = "";
        $close_button_style = "";

        if ($type == "with_icon") {
            $message_classes .= " with_icon";
        }

        if ($type == "with_custom_icon") {
            $icon_position = $custom_icon_position;
        }

        if ($background_color != "") {
            $message_styles .= "background-color: " . $background_color . ";";
        }

        if ($border_color != "") {
            if ($border_width != "") {
                $message_styles .= "border: " . $border_width . "px solid " . $border_color . ";";
            } else {
                $message_styles .= "border: 1px solid " . $border_color . ";";
            }
        }

        if ($icon_color != "") {
            $icon_styles .= "color: " . $icon_color . ";";
        }

        if ($icon_background_color != "") {
            $icon_styles .= " background-color: " . $icon_background_color . ";";
        }

        if ($icon_custom_size != "") {
            $icon_font_style = ' font-size: ' . $icon_custom_size;
            if (!strstr($icon_custom_size, 'px')) {
                $icon_font_style .= 'px;';
            }
            $icon_styles .= $icon_font_style;
        }

        if ($close_button_color != "") {
            $close_button_style .= "color: " . $close_button_color;
        }

        $icon_size = $qodeIconCollections->getIconSizeClass($icon_size);

        $html .= "<div class='q_message " . $message_classes . "' style='" . $message_styles . "'>";
        $html .= "<div class='q_message_inner'>";
        if ($type == "with_icon") {
            $icon_html .= '<div class="q_message_icon_holder ' . $icon_position . '"><div class="q_message_icon"><div class="q_message_icon_inner">';
            if ($custom_icon != "") {
                if (is_numeric($custom_icon)) {
                    $custom_icon_src = wp_get_attachment_url($custom_icon);
                } else {
                    $custom_icon_src = $custom_icon;
                }

                $icon_html .= '<img src="' . $custom_icon_src . '" alt="">';
            } else {
                $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
                
                if (method_exists($icon_collection_obj, 'render')) {
                    
                    $icon_html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                        'icon_attributes' => array(
                            'style' => $icon_styles,
                            'class' => $icon_size
                        )
                    ));
                    
                }
                
            }

            $icon_html .= '</div></div></div>';
        }

        $html .= $icon_html;

        $html .= "<a href='#' class='close'>";
        $html .= "<i class='q_font_elegant_icon icon_close' style='" . $close_button_style . "'></i>";
        $html .= "</a>"; //close a.close

        $html .= "<div class='message_text_holder'><div class='message_text'><div class='message_text_inner'>" . do_shortcode($content) . "</div></div></div>";

        $html .= "</div></div>"; //close message text div
        return $html;
    }

    add_shortcode('no_message', 'no_message');
}


/* Ordered List shortcode */

if (!function_exists('no_ordered_list')) {

    function no_ordered_list($atts, $content = null) {
        $html = "<div class=ordered>" . $content . "</div>";
        return $html;
    }

    add_shortcode('no_ordered_list', 'no_ordered_list');
}


/* Pie Chart shortcode */

if (!function_exists('no_pie_chart')) {

    function no_pie_chart($atts, $content = null) {
        $args = array(
            "size" => "",
            "type_of_central_text" => "",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h4",
            "percent" => "",
            "show_percent_mark" => "with_mark",
            "percentage_color" => "",
            "percent_font_family" => "",
            "percent_font_size" => "",
            "percent_font_weight" => "",
            "active_color" => "",
            "noactive_color" => "",
            "line_width" => "",
            "text" => "",
            "text_color" => "",
            "separator" => "",
            "separator_color" => "",
            "separator_border_style" => "",
            "chart_alignment" => "",
            "margin_below_chart" => ""
        );

        extract(shortcode_atts($args, $atts));

        $size = esc_attr($size);
        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $percent = esc_attr($percent);
        $percentage_color = esc_attr($percentage_color);
        $percent_font_family = esc_attr($percent_font_family);
        $percent_font_size = esc_attr($percent_font_size);
        $active_color = esc_attr($active_color);
        $noactive_color = esc_attr($noactive_color);
        $line_width = esc_attr($line_width);
        $text = esc_html($text);
        $text_color = esc_attr($text_color);
        $separator_color = esc_attr($separator_color);
        $margin_below_chart = esc_attr($margin_below_chart);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = '';
        $separator_styles = "";
        $text_holder_style = '';

        if ($separator_color != "") {
            $separator_styles .= "border-color: " . $separator_color . ";";
        }

        if ($separator_border_style != "") {
            $separator_styles .= "border-bottom-style: " . $separator_border_style . ';';
        }

        $html .= '<div class="q_pie_chart_holder"><div class="q_percentage" data-alignment="' . $chart_alignment . '" data-percent="' . $percent . '" data-linewidth="' . $line_width . '" data-size="' . $size . '" data-active="' . $active_color . '" data-noactive="' . $noactive_color . '"';

        $html .= '>';

        if ($type_of_central_text == "title") {
            if ($title != "") {
                $html .= '<' . $title_tag . ' class="pie_title"';
                if ($title_color != "") {
                    $html .= ' style="color: ' . $title_color . ';"';
                }
                $html .= '>' . $title . '</' . $title_tag . '>';
            }
        } else {
            $html .= '<span class="tocounter ' . $show_percent_mark . '"';
            if ($percentage_color != "" || $percent_font_family != "" || $percent_font_size != "" || $percent_font_weight != "") {
                $html .= ' style="';

                if ($percentage_color != "") {
                    $html .= 'color:' . $percentage_color . ';';
                }
                if ($percent_font_family != "") {
                    $html .= 'font-family:' . $percent_font_family . ';';
                }
                if ($percent_font_size != "") {
                    $html .= 'font-size:' . $percent_font_size . 'px;';
                }
                if ($percent_font_weight != "") {
                    $html .= 'font-weight:' . $percent_font_weight . ';';
                }
                $html .= '"';
            }

            $html .= '>' . $percent . '</span>';
        }

        if ($margin_below_chart != '') {
            $margin_below_chart = (strstr($margin_below_chart, 'px', true)) ? $margin_below_chart : $margin_below_chart . "px";
            $text_holder_style = "style='margin-top:".$margin_below_chart. ";'";
        }

        $html .= '</div><div class="pie_chart_text';
        if ($type_of_central_text == "title" || $title == "") {
            $html .= ' without_title';
        }

        $html .= '" '.$text_holder_style.'>';


        if ($type_of_central_text == "percent") {
            if ($title != "") {
                $html .= '<' . $title_tag . ' class="pie_title"';
                if ($title_color != "") {
                    $html .= ' style="color: ' . $title_color . ';"';
                }
                $html .= '>' . $title . '</' . $title_tag . '>';
            }
        }

        if ($separator == "yes") {
            $html .= '<span class="separator medium" style="' . $separator_styles . '"></span>';
        }

        if ($text != "") {
            $html .= '<p';
            if ($text_color != "") {
                $html .= ' style="color: ' . $text_color . ';"';
            }
            $html .= '>' . $text . '</p>';
        }
        $html .= "</div></div>";
        return $html;
    }

    add_shortcode('no_pie_chart', 'no_pie_chart');
}

/* Pie Chart With Icon shortcode */

if (!function_exists('no_pie_chart_with_icon')) {

    function no_pie_chart_with_icon($atts, $content = null) {

        global $qode_options_theme18;
        global $qodeIconCollections;

        $args = array(
            "size" => "",
            "percent" => "",
            "active_color" => "",
            "noactive_color" => "",
            "line_width" => "",
            "icon_color" => "",
            "icon_size" => "2x",
            "icon_custom_size" => "",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h4",
            "text" => "",
            "text_color" => "",
            "separator" => "",
            "separator_color" => "",
            "separator_border_style" => ""
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $size = esc_attr($size);
        $percent = esc_attr($percent);
        $active_color = esc_attr($active_color);
        $noactive_color = esc_attr($noactive_color);
        $line_width = esc_attr($line_width);
        $icon_color = esc_attr($icon_color);
        $icon_custom_size = esc_attr($icon_custom_size);
        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $text = esc_html($text);
        $text_color = esc_attr($text_color);
        $separator_color = esc_attr($separator_color);
        
        $icon_size = $qodeIconCollections->getIconSizeClass($icon_size);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = '';
        $separator_styles = "";
        $icon_styles = "";
        $icon_font_style = "";

        if ($separator_color != "") {
            $separator_styles .= "border-color: " . $separator_color . ";";
        }

        if ($separator_border_style != "") {
            $separator_styles .= "border-bottom-style: " . $separator_border_style . ';';
        }

        $html .= '<div class="q_pie_chart_with_icon_holder"><div class="q_percentage_with_icon" data-percent="' . $percent . '" data-linewidth="' . $line_width . '"  data-size="' . $size . '" data-active="' . $active_color . '" data-noactive="' . $noactive_color . '">';

        if ($icon_custom_size != "") {
            $icon_font_style = ' font-size: ' . $icon_custom_size;
            if (!strstr($icon_custom_size, 'px')) {
                $icon_font_style .= 'px;';
            }
            $icon_styles .= $icon_font_style;
        }

        if ($icon_color != "") {
            $icon_styles .= ' color: ' . $icon_color;
        }

        $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
        
        if (method_exists($icon_collection_obj, 'render')) {
            
            $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                'icon_attributes' => array(
                    'style' => $icon_styles,
                    'class' => $icon_size
                )
            ));
            
        }

        $html .= '</div><div class="pie_chart_text">';
        if ($title != "") {
            $html .= '<' . $title_tag . ' class="pie_title"';
            if ($title_color != "") {
                $html .= ' style="color: ' . $title_color . ';"';
            }
            $html .= '>' . $title . '</' . $title_tag . '>';
        }
        if ($separator == "yes") {
            $html .= '<span class="separator medium" style="' . $separator_styles . '"></span>';
        }

        if ($text != "") {
            $html .= '<p ';
            if ($text_color != "") {
                $html .= ' style="color: ' . $text_color . ';"';
            }
            $html .= '>' . $text . '</p>';
        }
        $html .= "</div></div>";
        return $html;
    }

    add_shortcode('no_pie_chart_with_icon', 'no_pie_chart_with_icon');
}


/* Pie Chart Full shortcode */

if (!function_exists('no_pie_chart2')) {

    function no_pie_chart2($atts, $content = null) {
        extract(shortcode_atts(array("width" => "150", "height" => "150", "color" => ""), $atts));
        
        $width = esc_attr($width);
        $height = esc_attr($height);
        $color = esc_attr($color);


        $id = mt_rand(1000, 9999);
        $html = "<div class='q_pie_graf_holder'><div class='q_pie_graf'><canvas id='pie" . $id . "' height='" . $height . "' width='" . $width . "'></canvas></div><div class='q_pie_graf_legend'><ul>";
        $pie_chart_array = explode(";", $content);
        for ($i = 0; $i < count($pie_chart_array); $i = $i + 1) {
            $pie_chart_el = explode(",", $pie_chart_array[$i]);
            $html .= "<li><div class='color_holder' style='background-color: " . trim($pie_chart_el[1]) . ";'></div><p style='color: " . $color . ";'>" . trim($pie_chart_el[2]) . "</p></li>";
        }
        $html .= "</ul></div></div><script>var pie" . $id . " = [";
        $pie_chart_array = explode(";", $content);
        for ($i = 0; $i < count($pie_chart_array); $i = $i + 1) {
            $pie_chart_el = explode(",", $pie_chart_array[$i]);
            if ($i > 0)
                $html .= ",";
            $html .= "{value: " . trim($pie_chart_el[0]) . ",color:'" . trim($pie_chart_el[1]) . "'}";
        }
        $html .= "];
		var \$j = jQuery.noConflict();
		\$j(document).ready(function() {
			if(\$j('.touch .no_delay').length){
				new Chart(document.getElementById('pie" . $id . "').getContext('2d')).Pie(pie" . $id . ",{segmentStrokeColor : 'transparent',});
			}else{
				\$j('#pie" . $id . "').appear(function() {
					new Chart(document.getElementById('pie" . $id . "').getContext('2d')).Pie(pie" . $id . ",{segmentStrokeColor : 'transparent',});
				},{accX: 0, accY: -200});
			}
		});
	</script>";
        return $html;
    }

    add_shortcode('no_pie_chart2', 'no_pie_chart2');
}


/* Pie Chart Doughnut shortcode */

if (!function_exists('no_pie_chart3')) {

    function no_pie_chart3($atts, $content = null) {
        extract(shortcode_atts(array("width" => "150", "height" => "150", "color" => ""), $atts));

        
        $width = esc_attr($width);
        $height = esc_attr($height);
        $color = esc_attr($color);


        $id = mt_rand(1000, 9999);
        $html = "<div class='q_pie_graf_holder'><div class='q_pie_graf'><canvas id='pie" . $id . "' height='" . $height . "' width='" . $width . "'></canvas></div><div class='q_pie_graf_legend'><ul>";
        $pie_chart_array = explode(";", $content);
        for ($i = 0; $i < count($pie_chart_array); $i = $i + 1) {
            $pie_chart_el = explode(",", $pie_chart_array[$i]);
            $html .= "<li><div class='color_holder' style='background-color: " . trim($pie_chart_el[1]) . ";'></div><p style='color: " . $color . ";'>" . trim($pie_chart_el[2]) . "</p></li>";
        }
        $html .= "</ul></div></div><script>var pie" . $id . " = [";
        $pie_chart_array = explode(";", $content);
        for ($i = 0; $i < count($pie_chart_array); $i = $i + 1) {
            $pie_chart_el = explode(",", $pie_chart_array[$i]);
            if ($i > 0)
                $html .= ",";
            $html .= "{value: " . trim($pie_chart_el[0]) . ",color:'" . trim($pie_chart_el[1]) . "'}";
        }
        $html .= "];
		var \$j = jQuery.noConflict();
		\$j(document).ready(function() {
			if(\$j('.touch .no_delay').length){
				new Chart(document.getElementById('pie" . $id . "').getContext('2d')).Doughnut(pie" . $id . ",{segmentStrokeColor : 'transparent',});
			}else{
				\$j('#pie" . $id . "').appear(function() {
					new Chart(document.getElementById('pie" . $id . "').getContext('2d')).Doughnut(pie" . $id . ",{segmentStrokeColor : 'transparent',});
				},{accX: 0, accY: -200});
			}
		});
	</script>";
        return $html;
    }

    add_shortcode('no_pie_chart3', 'no_pie_chart3');
}

/* Portfolio list shortcode */

if (!function_exists('no_portfolio_list')) {

    function no_portfolio_list($atts, $content = null) {

        global $wp_query;
        global $qode_options;
        $portfolio_qode_like = "on";
        if (isset($qode_options['portfolio_qode_like'])) {
            $portfolio_qode_like = $qode_options['portfolio_qode_like'];
        }

        $portfolio_filter_class = "";
        if (isset($qode_options['portfolio_filter_disable_separator']) && !empty($qode_options['portfolio_filter_disable_separator'])) {
            if ($qode_options['portfolio_filter_disable_separator'] == "yes") {
                $portfolio_filter_class = "without_separator";
            } else {
                $portfolio_filter_class = "";
            }
        }

        $args = array(
            "type" => "standard",
            "hover_type_standard" => "gradient_hover",
            "hover_type_text_on_hover_image" => "upward_hover",
            "hover_type_text_before_hover" => "gradient_hover",
            "hover_type_masonry" => "gradient_hover",
            "box_border" => "",
            "box_background_color" => "",
            "box_border_color" => "",
            "box_border_width" => "",
            "hover_box_color_standard" => "",
            "hover_box_color_text_on_hover_image" => "",
            "hover_box_color_masonry" => "",
            "overlay_background_color" => "",
            "gradient_position_standard" => "",
            "gradient_position_text_before_hover" => "",
            "gradient_position_masonry" => "",
            "cursor_color_hover_type_text_on_hover_image"          => "",
            "cursor_color_hover_type_masonry"          => "",
            "cursor_color_hover_type_standard"          => "",
            "columns" => "3",
            "image_size" => "",
            "order_by" => "date",
            "order" => "ASC",
            "number" => "-1",
            "filter" => "no",
            "disable_filter_title" => "yes",
            "filter_order_by" => "name",
            "filter_align" => "left_align",
            "show_icons" => "yes",
            "icons_position" => "",
            "link_icon" => "yes",
            "lightbox" => "yes",
            "show_like" => "yes",
            "disable_link" => "no",
            "portfolio_link_pointer" => "single",
            "show_categories" => "yes",
            "category_color" => "",
            "category" => "",
            "separator" => "",
            "separator_thickness" => "",
            "separator_color" => "",
            "separator_animation" => "",
            "selected_projects" => "",
            "show_load_more" => "yes",
            "load_more_margin" => "",
            "show_title" => "yes",
            "title_tag" => "h4",
            "title_font_size" => "",
            "title_color" => "",
            "disable_link_on_title" => "",
            "text_align" => ""
        );

        extract(shortcode_atts($args, $atts));
        
        $box_background_color = esc_attr($box_background_color);
        $box_border_color = esc_attr($box_border_color);
        $box_border_width = esc_attr($box_border_width);
        $hover_box_color_standard = esc_attr($hover_box_color_standard);
        $hover_box_color_text_on_hover_image = esc_attr($hover_box_color_text_on_hover_image);
        $hover_box_color_masonry = esc_attr($hover_box_color_masonry);
        $gradient_position_standard = esc_attr($gradient_position_standard);
        $gradient_position_text_before_hover = esc_attr($gradient_position_text_before_hover);
        $gradient_position_masonry = esc_attr($gradient_position_masonry);
        $overlay_background_color = esc_attr($overlay_background_color);
        $cursor_color_hover_type_text_on_hover_image = esc_attr($cursor_color_hover_type_text_on_hover_image);
        $cursor_color_hover_type_masonry = esc_attr($cursor_color_hover_type_masonry);
        $cursor_color_hover_type_standard = esc_attr($cursor_color_hover_type_standard);
        $number = esc_attr($number);
        $category_color = esc_attr($category_color);
        $category = esc_attr($category);
        $separator_thickness = esc_attr($separator_thickness);
        $separator_color = esc_attr($separator_color);
        $selected_projects = esc_attr($selected_projects);
        $load_more_margin = esc_attr($load_more_margin);
        $title_font_size = esc_attr($title_font_size);
        $title_color = esc_attr($title_color);


        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = "";

        // adding correct classes
        $_type_class = '';
        $_portfolio_space_class = '';
        $_portfolio_masonry_with_space_class = '';
        if ($type == "text_on_hover_image" || $type == "text_before_hover") {
            $_type_class = " hover_text";
            $_portfolio_space_class = "portfolio_with_space portfolio_with_hover_text";
        } elseif ($type == "standard" || $type == "masonry_with_space") {
            $_type_class = " standard";
            $_portfolio_space_class = "portfolio_with_space portfolio_standard";
            if ($type == "masonry_with_space") {
                $_portfolio_masonry_with_space_class = ' masonry_with_space';
            }
        } elseif ($type == "standard_no_space") {
            $_type_class = " standard_no_space";
            $_portfolio_space_class = "portfolio_no_space portfolio_standard";
        } elseif ($type == "text_on_hover_image_no_space" || $type == "text_before_hover_no_space") {
            $_type_class = " hover_text no_space";
            $_portfolio_space_class = "portfolio_no_space portfolio_with_hover_text";
        }

        // adding hover type
        $hover_type = "";
        if ($type == 'standard' || $type == 'standard_no_space' || $type == 'masonry_with_space') {
            $hover_type = $hover_type_standard;
        }
        if ($type == 'text_on_hover_image' || $type == 'text_on_hover_image_no_space') {
            $hover_type = $hover_type_text_on_hover_image;
        }
        if ($type == 'text_before_hover' || $type == 'text_before_hover_no_space') {
            $hover_type = $hover_type_text_before_hover;
        }
        if ($type == 'masonry') {
            $hover_type = $hover_type_masonry;
        }


        $cursor_color = ''; // this is used for color on thin_plus_only
        if($cursor_color_hover_type_text_on_hover_image != '' && $hover_type == 'thin_plus_only' && ($type == 'text_on_hover_image' || $type == 'text_on_hover_image_no_space')){
            $cursor_color = 'style="color:'.$cursor_color_hover_type_text_on_hover_image.'"';
        }
        elseif($cursor_color_hover_type_masonry != '' && $hover_type == 'thin_plus_only' && $type == 'masonry'){
            $cursor_color = 'style="color:'.$cursor_color_hover_type_masonry.'"';
        }
        elseif($cursor_color_hover_type_standard != '' && $hover_type == 'thin_plus_only' && ($type == 'standard' || $type == 'standard_no_space')){
            $cursor_color = 'style="color:'.$cursor_color_hover_type_standard.'"';
        }

        $disable_text_holder = '';
        // disable text holder if there is no any element
        if ($show_title == 'no' && $separator == 'no' && $show_categories == 'no') {
            $disable_text_holder = 'yes';
        }

        // for this type holder needs to be shown
        if ($hover_type == 'slide_from_left_hover' && $show_icons == 'no') {
            $show_icons = 'yes';
            $link_icon = 'no';
            $lightbox = 'no';
            $show_like = 'no';
        }

        // for this type only one icon can be shown (link, or lightbox)
        if ($hover_type == 'text_slides_with_image') {
            if($portfolio_link_pointer == 'single'){
                $link_icon = 'yes';
                $lightbox = 'no';
            }
            elseif($portfolio_link_pointer == 'lightbox'){
                $link_icon = 'no';
                $lightbox = 'yes';
            }
            $show_like = 'no';
        }

        // disable link if icons are shown for these hover type
        if (($hover_type == 'subtle_vertical_hover' || $hover_type == 'image_subtle_rotate_zoom_hover' || $hover_type == 'image_text_zoom_hover' || $hover_type == 'slide_up_hover') && $show_icons == 'yes') {
            $disable_link = "yes";
        }

        // disable icons on this hover type
        if ($hover_type == 'cursor_change_hover' || $hover_type == 'thin_plus_only' || $hover_type == 'split_up') {
            $show_icons = "no";
        }

        // adding element style and class
        $separator_animation_class = "";
        if ($separator_animation == 'yes') {
            $separator_animation_class = "animate";
        }

        $separator_style = "";
        if ($separator_color != '' || $separator_thickness != '') {
            $separator_style = 'style="';
            if ($separator_color != '') {
                $separator_style .= 'background-color: ' . $separator_color . ';';
            }
            if ($separator_thickness != '') {
                $valid_height = (strstr($separator_thickness, 'px', true)) ? $separator_thickness : $separator_thickness . "px";
                $separator_style .= 'height: ' . $valid_height . ';';
            }
            $separator_style .= '"';
        }

        $gradient_position = '';
        if ($hover_type == "gradient_hover") {
            if (($type == 'standard' || $type == 'standard_no_space' || $type == 'masonry_with_space') && $gradient_position_standard != '') {
                $gradient_position = $gradient_position_standard;
            } elseif (($type == 'text_before_hover' || $type == 'text_before_hover_no_space') && $gradient_position_text_before_hover != '') {
                $gradient_position = $gradient_position_text_before_hover;
            } elseif ($type == 'masonry' && $gradient_position_masonry != '') {
                $gradient_position = $gradient_position_masonry;
            }
        }

//        Icons Bottom Corner, Text Slides With Image and Slow Zoom",
        $icons_position_classes = '';
        if(($hover_type == 'icons_bottom_corner' || $hover_type == 'text_slides_with_image' || $hover_type == 'slow_zoom') && $icons_position != ''){
            $icons_position_classes .= $icons_position;
        }

        $portfolio_shader_style = "";
        if ($overlay_background_color != '' || $gradient_position != '') {
            if ($hover_type == "gradient_hover") {
                if (substr($overlay_background_color, 0, 3) === "rgba") { // if rgba is set, portfolio uses default color
                    $portfolio_shader_style = '';
                } else {

                    $rgb = qode_hex2rgb($overlay_background_color);

                    $opacity = 0;
                    $overlay_background_color1 = 'rgba(' . $rgb[0] . ',' . $rgb[1] . ',' . $rgb[2] . ',' . $opacity . ')';
                    $opacity = 0.9;
                    $overlay_background_color2 = 'rgba(' . $rgb[0] . ',' . $rgb[1] . ',' . $rgb[2] . ',' . $opacity . ')';

                    $portfolio_shader_style = 'style="';

                    $portfolio_shader_style .= 'background: -webkit-linear-gradient(to bottom, ' . $overlay_background_color1 . ' 10%, ' . $overlay_background_color2 . ' 100%);';
                    $portfolio_shader_style .= 'background: linear-gradient(to bottom, ' . $overlay_background_color1 . ' 10%, ' . $overlay_background_color2 . ' 100%);';

                    if ($gradient_position != '') {
                        $portfolio_shader_style .= 'transform: translate3d(0px, ' . $gradient_position . ', 0px);';
                    }

                    $portfolio_shader_style .= '"';
                }
            } elseif ($hover_type == "upward_hover") {
                // disabled
            } else {
                $portfolio_shader_style = 'style="background-color:' . $overlay_background_color . ';"';
            }
        }

        $title_style = '';
        $title_link_style = ''; // with or without 'a' tag
        if ($title_font_size != "" || $title_color != "") {
            $title_link_style .= 'style="';
            $title_style .= 'style="';
            if ($title_font_size != "") {
                $title_style .= 'font-size: ' . $title_font_size . 'px;';
                $title_link_style .= 'font-size: inherit;';
            }
            if ($title_color != "") {
                $title_style .= 'color: ' . $title_color . ';';
                $title_link_style .= 'color: inherit;';
            }
            $title_style .= '"';
            $title_link_style .= '"';
        }

        $category_style = '';
        if ($category_color != '') {
            $category_style = 'style="color: ' . $category_color . ';"';
        }

        $hover_box_style = "";
        if ($hover_type == 'upward_hover' || $hover_type == 'slide_from_left_hover') {
            if (($type == 'standard' || $type == 'standard_no_space') && $hover_box_color_standard != '') {
                $hover_box_style = 'style="background-color:' . $hover_box_color_standard . ';"';
            } elseif (($type == 'text_on_hover_image' || $type == 'text_on_hover_image_no_space') && $hover_box_color_text_on_hover_image != '') {
                $hover_box_style = 'style="background-color:' . $hover_box_color_text_on_hover_image . ';"';
            } elseif (($type == 'masonry') && $hover_box_color_masonry != '') {
                $hover_box_style = 'style="background-color:' . $hover_box_color_masonry . ';"';
            }
        }

        $show_more_style = '';
        if ($load_more_margin != '') {
            $load_more_margin = (strstr($load_more_margin, 'px', true)) ? $load_more_margin : $load_more_margin . "px";
            $show_more_style .= 'style="margin-top:' . $load_more_margin . '"';
        }

        $portfolio_box_style = "";
        $portfolio_description_class = "";
        if ($box_border == "yes" || $box_background_color != "") {

            $portfolio_box_style .= ' style="';
            if ($box_border == "yes") {
                $portfolio_box_style .= "border-style:solid;";
                if ($box_border_color != "") {
                    $portfolio_box_style .= "border-color:" . $box_border_color . ";";
                }
                if ($box_border_width != "") {
                    $portfolio_box_style .= "border-width:" . $box_border_width . "px;";
                } else {
                    $portfolio_box_style .= "border-width: 1px;";
                }
            }
            if ($box_background_color != "") {
                $portfolio_box_style .= "background-color:" . $box_background_color . ";";
            }
            $portfolio_box_style .= '"';

            $portfolio_description_class .= ' with_padding';

            $_portfolio_space_class = ' with_description_background';
        }

        if ($text_align !== '') {
            $portfolio_description_class .= ' text_align_' . $text_align;
        }

        //get proper image size
        switch ($image_size) {
            case 'landscape':
                $thumb_size = 'portfolio-landscape';
                break;
            case 'portrait':
                $thumb_size = 'portfolio-portrait';
                break;
            case 'square':
                $thumb_size = 'portfolio-square';
                break;
            case 'full':
                $thumb_size = 'full';
                break;
            default:
                $thumb_size = 'full';
                break;
        }

        if ($type == "masonry_with_space") {
            $thumb_size = 'portfolio_masonry_with_space';
        }

        // printing html

        if ($type != 'masonry') {

            // adding filter on project holder
            $html .= "<div class='projects_holder_outer v$columns $_portfolio_space_class $_portfolio_masonry_with_space_class'>";
            if ($filter == "yes") {
                $html .= "<div class='filter_outer filter_portfolio " . $filter_align . "'>";
                $html .= "<div class='filter_holder " . $portfolio_filter_class . "'><ul>";
                if ($disable_filter_title != "yes") {
                    $html .= "<li class='filter_title'><span>" . __('Sort Portfolio:', 'qode') . "</span></li>";
                }
                if ($type == 'masonry_with_space') {
                    $html .= "<li class='filter' data-filter='*'><span>" . __('All', 'qode') . "</span></li>";
                } else {
                    $html .= "<li class='filter' data-filter='all'><span>" . __('All', 'qode') . "</span></li>";
                }

                if ($category == "") {
                    $args = array(
                        'parent' => 0,
                        'orderby' => $filter_order_by
                    );
                    $portfolio_categories = get_terms('portfolio_category', $args);
                } else {
                    $top_category = get_term_by('slug', $category, 'portfolio_category');
                    $term_id = '';
                    if (isset($top_category->term_id))
                        $term_id = $top_category->term_id;
                    $args = array(
                        'parent' => $term_id,
                        'orderby' => $filter_order_by
                    );
                    $portfolio_categories = get_terms('portfolio_category', $args);
                }
                foreach ($portfolio_categories as $portfolio_category) {
                    if ($type == 'masonry_with_space') {
                        $html .= "<li class='filter' data-filter='.portfolio_category_$portfolio_category->term_id'><span>$portfolio_category->name</span>";
                    } else {
                        $html .= "<li class='filter' data-filter='portfolio_category_$portfolio_category->term_id'><span>$portfolio_category->name</span>";
                    }
                    $args = array(
                        'child_of' => $portfolio_category->term_id
                    );
                    $html .= '</li>';
                }
                $html .= "</ul></div>";
                $html .= "</div>";
            }

            $html .= "<div class='portfolio_main_holder projects_holder clearfix v$columns$_type_class'>\n";
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            if ($category == "") {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            } else {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'portfolio_category' => $category,
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            }
            $project_ids = null;
            if ($selected_projects != "") {
                $project_ids = explode(",", $selected_projects);
                $args['post__in'] = $project_ids;
            }
            query_posts($args);

            // loop start
            if (have_posts()) : while (have_posts()) : the_post();
                    $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');
                    $html .= "<article class='mix ";
                    foreach ($terms as $term) {
                        $html .= "portfolio_category_$term->term_id ";
                    }

                    $title = get_the_title();
                    $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size

                    if (get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true) != "") {
                        $large_image = get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true);
                    } else {
                        $large_image = $featured_image_array[0];
                    }

                    $slug_list_ = "pretty_photo_gallery";

                    $custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
                    $portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();
                    $target = $custom_portfolio_link != "" ? '_blank' : '_self';

                    $html .="'>";  //article
                    // get categories for specific article
                    $category_html = "";
                    /* $category_html .= '<span>'. __('In ', 'qode') .'</span>'; */
                    $k = 1;
                    foreach ($terms as $term) {
                        $category_html .= "$term->name";
                        if (count($terms) != $k) {
                            $category_html .= ' / ';
                        }
                        $k++;
                    }

                    $html .= '<div class="item_holder ' . $hover_type . '">';

                    switch ($hover_type) {
                        case 'gradient_hover':
                        case 'upward_hover':
                        case 'subtle_vertical_hover':
                        case 'image_subtle_rotate_zoom_hover':
                        case 'slide_up_hover':
                        case 'cursor_change_hover':
                        case 'image_text_zoom_hover':
                        case 'text_slides_with_image':
                        case 'thin_plus_only': {
                                if ($disable_text_holder != 'yes' || $show_icons == 'yes' || $hover_type == 'thin_plus_only') {
                                    $html .= '<div class="text_holder" ' . $hover_box_style . '>';
                                    $html .= '<div class="text_holder_outer">';
                                    $html .= '<div class="text_holder_inner">';
                                    if($hover_type == 'thin_plus_only'){
                                        $html .= '<span class="thin_plus_only_icon" '.$cursor_color.'>+</span>';
                                    }
                                    elseif ($type == 'text_on_hover_image' || $type == 'text_on_hover_image_no_space' || $type == 'text_before_hover' || $type == 'text_before_hover_no_space') {
                                        if ($show_title == 'yes') {
                                            if ($disable_link_on_title != "yes") {
                                                $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '><a href="' . $portfolio_link . '" ' . $title_link_style . '>' . get_the_title() . '</a></' . $title_tag . '>';
                                            } else {
                                                $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '>' . get_the_title() . '</' . $title_tag . '>';
                                            }
                                        }
                                        if ($separator == 'yes') {
                                            $html .= '<span class="separator ' . $separator_animation_class . '" ' . $separator_style . '></span>';
                                        }
                                        if ($show_categories == 'yes') {
                                            $html .= '<span class="project_category" ' . $category_style . '>' . $category_html . '</span>';
                                        }
                                    }
                                    if ($show_icons == 'yes') {
                                        $html .= '<div class="icons_holder '.$icons_position_classes.'">';
                                        if ($lightbox == "yes") {
                                            $html .= '<a class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                        }
                                        if ($portfolio_qode_like == "on" && $show_like == "yes") {
                                            if (function_exists('qode_like_portfolio_list')) {
                                                $html .= qode_like_portfolio_list(get_the_ID());
                                            }
                                        }
                                        if ($link_icon == "yes") {
                                            $html .= '<a class="preview" title="Go to Project" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                        }
                                        $html .= '</div>'; // icons_holder
                                    }
                                    $html .= '</div>'; // text_holder_inner
                                    $html .= '</div>';  // text_holder_outer
                                    $html .= '</div>'; // text_holder
                                }
                            }
                            break;
                        case 'opposite_corners_hover':
                        case 'slide_from_left_hover':
                        case 'prominent_plain_hover':
                        case 'prominent_blur_hover':
                        case 'icons_bottom_corner':
                        case 'slow_zoom':
                        case 'split_up': {
                                if ($disable_text_holder != 'yes') {
                                    if ($type == 'text_on_hover_image' || $type == 'text_on_hover_image_no_space' || $type == 'text_before_hover' || $type == 'text_before_hover_no_space') {
                                        $html .= '<div class="text_holder">';
                                        $html .= '<div class="text_holder_outer">';
                                        $html .= '<div class="text_holder_inner">';
                                        if ($show_title == 'yes') {
                                            if ($disable_link_on_title != "yes") {
                                                $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '><a href="' . $portfolio_link . '" ' . $title_link_style . '>' . get_the_title() . '</a></' . $title_tag . '>';
                                            } else {
                                                $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '>' . get_the_title() . '</' . $title_tag . '>';
                                            }
                                        }
                                        if ($separator == 'yes') {
                                            $html .= '<span class="separator ' . $separator_animation_class . '" ' . $separator_style . '></span>';
                                        }
                                        if ($show_categories == 'yes') {
                                            $html .= '<span class="project_category" ' . $category_style . '>' . $category_html . '</span>';
                                        }
                                        $html .= '</div>'; //text_holder_inner
                                        $html .= '</div>';  // text_holder_outer
                                        $html .= '</div>'; // text_holder
                                    }
                                }
                                if ($show_icons == 'yes') {
                                    $html .= '<div class="icons_holder '.$icons_position_classes.'" ' . $hover_box_style . '>';
                                    if ($lightbox == "yes") {
                                        $html .= '<a class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                    }
                                    if ($portfolio_qode_like == "on" && $show_like == "yes") {
                                        if (function_exists('qode_like_portfolio_list')) {
                                            $html .= qode_like_portfolio_list(get_the_ID());
                                        }
                                    }
                                    if ($link_icon == "yes") {
                                        $html .= '<a class="preview" title="Go to Project" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                    }
                                    $html .= '</div>';  // icons_holder
                                }
                            }
                            break;
                    }

                    if ($disable_link != "yes") {
                        if ($portfolio_link_pointer == 'single') {
                            $html .= '<a class="portfolio_link_class" href="' . $portfolio_link . '" target="_self"></a>';
                        } elseif ($portfolio_link_pointer == 'lightbox') {
                            $html .= '<a class="portfolio_link_class" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                        }
                    }

                    $html .= '<div class="portfolio_shader" ' . $portfolio_shader_style . '></div>';
                    $html .= '<div class="image_holder">';
                    $html .= '<span class="image">';
                    $html .= get_the_post_thumbnail(get_the_ID(), $thumb_size);
                    $html .= '</span>';
                    $html .= '</div>'; // close image_holder
                    $html .= '</div>'; // close item_holder
                    // portfolio description start

                    if ($type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space") {
                        $html .= "<div class='portfolio_description " . $portfolio_description_class . "'" . $portfolio_box_style . ">";

                        if ($disable_link_on_title != "yes") {
                            $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '><a href="' . $portfolio_link . '" target="' . $target . '" ' . $title_link_style . '>' . get_the_title() . '</a></' . $title_tag . '>';
                            if ($separator == 'yes') {
                                $html .= '<span class="separator ' . $separator_animation_class . '" ' . $separator_style . '></span>';
                            }
                        } else {
                            $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '>' . get_the_title() . '</' . $title_tag . '>';
                            if ($separator == 'yes') {
                                $html .= '<span class="separator ' . $separator_animation_class . '" ' . $separator_style . '></span>';
                            }
                        }
                        if ($show_categories != 'no') {
                            $html .= '<span class="project_category" ' . $category_style . '>' . $category_html . '</span>';
                        }
                        $html .= '</div>'; // close portfolio_description
                    }

                    $html .= "</article>\n";

                endwhile;

                // loop end

                $i = 1;
                while ($i <= $columns) {
                    $i++;
                    if ($columns != 1) {
                        $html .= "<div class='filler'></div>\n";
                    }
                }

            else:
                ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'qode'); ?></p>
            <?php
            endif;


            $html .= "</div>";  // close projects_holder
            if (get_next_posts_link()) {
                if ($show_load_more == "yes" || $show_load_more == "") {
                    $html .= '<div class="portfolio_paging" ' . $show_more_style . '><span data-rel="' . $wp_query->max_num_pages . '" class="load_more">' . get_next_posts_link(__('Show more', 'qode')) . '</span></div>';
                    $html .= '<div class="portfolio_paging_loading"><a href="javascript: void(0)" class="qbutton">' . __('Loading...', 'qode') . '</a></div>';
                }
            }
            $html .= "</div>"; // close projects_holder_outer
            wp_reset_query();
        } else {
            if ($filter == "yes") {

                // adding filter on project holder
                $html .= "<div class='filter_outer filter_portfolio " . $filter_align . "'>";
                $html .= "<div class='filter_holder " . $portfolio_filter_class . "'><ul>";
                if ($disable_filter_title != "yes") {
                    $html .= "<li class='filter_title'><span>" . __('Sort Portfolio:', 'qode') . "</span></li>";
                }
                $html .= "<li class='filter' data-filter='*'><span>" . __('All', 'qode') . "</span></li>";
                if ($category == "") {
                    $args = array(
                        'parent' => 0,
                        'orderby' => $filter_order_by
                    );
                    $portfolio_categories = get_terms('portfolio_category', $args);
                } else {
                    $top_category = get_term_by('slug', $category, 'portfolio_category');
                    $term_id = '';
                    if (isset($top_category->term_id))
                        $term_id = $top_category->term_id;
                    $args = array(
                        'parent' => $term_id,
                        'orderby' => $filter_order_by
                    );
                    $portfolio_categories = get_terms('portfolio_category', $args);
                }
                foreach ($portfolio_categories as $portfolio_category) {
                    $html .= "<li class='filter' data-filter='.portfolio_category_$portfolio_category->term_id'><span>$portfolio_category->name</span>";
                    $args = array(
                        'child_of' => $portfolio_category->term_id
                    );
                    $html .= '</li>';
                }
                $html .= "</ul></div>";
                $html .= "</div>";
            }
            $html .= "<div class='portfolio_main_holder projects_masonry_holder'>";
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }
            if ($category == "") {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            } else {
                $args = array(
                    'post_type' => 'portfolio_page',
                    'portfolio_category' => $category,
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number,
                    'paged' => $paged
                );
            }
            $project_ids = null;
            if ($selected_projects != "") {
                $project_ids = explode(",", $selected_projects);
                $args['post__in'] = $project_ids;
            }
            query_posts($args);

            // loop start
            if (have_posts()) : while (have_posts()) : the_post();
                    $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');
                    $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size

                    if (get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true) != "") {
                        $large_image = get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true);
                    } else {
                        $large_image = $featured_image_array[0];
                    }

                    $custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
                    $portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();
                    $target = $custom_portfolio_link != "" ? '_blank' : '_self';

                    $masonry_size = "default";
                    $masonry_size = get_post_meta(get_the_ID(), "qode_portfolio_type_masonry_style", true);

                    $image_size = "";
                    if ($masonry_size == "large_width") {
                        $image_size = "portfolio_masonry_wide";
                    } elseif ($masonry_size == "large_height") {
                        $image_size = "portfolio_masonry_tall";
                    } elseif ($masonry_size == "large_width_height") {
                        $image_size = "portfolio_masonry_large";
                    } else {
                        $image_size = "portfolio-square";
                    }

                    if ($type == "masonry_with_space") {
                        $image_size = "portfolio_masonry_with_space";
                    }

                    $slug_list_ = "pretty_photo_gallery";
                    $title = get_the_title();
                    $html .= "<article class='portfolio_masonry_item ";

                    foreach ($terms as $term) {
                        $html .= "portfolio_category_$term->term_id ";
                    }

                    $html .= " " . $masonry_size;
                    $html .= "'>"; // article
                    // get categories for specific article
                    $category_html = "";
                    /* $category_html .= '<span>'. __('In ', 'qode') .'</span>'; */
                    $k = 1;
                    foreach ($terms as $term) {
                        $category_html .= "$term->name";
                        if (count($terms) != $k) {
                            $category_html .= ' / ';
                        }
                        $k++;
                    }

                    $html .= '<div class="item_holder ' . $hover_type . '">';

                    switch ($hover_type) {
                        case 'gradient_hover':
                        case 'upward_hover':
                        case 'subtle_vertical_hover':
                        case 'image_subtle_rotate_zoom_hover':
                        case 'slide_up_hover':
                        case 'cursor_change_hover':
                        case 'image_text_zoom_hover':
                        case 'text_slides_with_image':
                        case 'thin_plus_only': {
                                if ($disable_text_holder != 'yes' || $show_icons == 'yes' || $hover_type == 'thin_plus_only') {
                                    $html .= '<div class="text_holder" ' . $hover_box_style . '>';
                                    $html .= '<div class="text_holder_outer">';
                                    $html .= '<div class="text_holder_inner">';
                                    if($hover_type == 'thin_plus_only') {
                                        $html .= '<span class="thin_plus_only_icon" '.$cursor_color.'>+</span>';
                                    }
                                    else{
                                        if ($show_title == 'yes') {
                                            if ($disable_link_on_title != "yes") {
                                                $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '><a href="' . $portfolio_link . '" ' . $title_link_style . '>' . get_the_title() . '</a></' . $title_tag . '>';
                                            } else {
                                                $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '>' . get_the_title() . '</' . $title_tag . '>';
                                            }
                                        }
                                        if ($separator == 'yes') {
                                            $html .= '<span class="separator ' . $separator_animation_class . '" ' . $separator_style . '></span>';
                                        }
                                        if ($show_categories == 'yes') {
                                            $html .= '<span class="project_category" ' . $category_style . '>' . $category_html . '</span>';
                                        }
                                        if ($show_icons == "yes") {
                                            $html .= '<div class="icons_holder ' . $icons_position_classes . '">';
                                            if ($lightbox == "yes") {
                                                $html .= '<a class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                            }
                                            if ($portfolio_qode_like == "on" && $show_like == "yes") {
                                                if (function_exists('qode_like_portfolio_list')) {
                                                    $html .= qode_like_portfolio_list(get_the_ID());
                                                }
                                            }
                                            if ($link_icon == "yes") {
                                                $html .= '<a class="preview" title="Go to Project" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                            }
                                            $html .= '</div>'; // icons_holder
                                        }
                                    }
                                    $html .= '</div>'; // text_holder_inner
                                    $html .= '</div>';  // text_holder_outer
                                    $html .= '</div>'; // text_holder
                                }
                            }
                            break;
                        case 'opposite_corners_hover':
                        case 'slide_from_left_hover':
                        case 'prominent_plain_hover':
                        case 'prominent_blur_hover':
                        case 'icons_bottom_corner':
                        case 'slow_zoom':
                        case 'split_up': {
                                if ($disable_text_holder != 'yes') {
                                    $html .= '<div class="text_holder">';
                                    $html .= '<div class="text_holder_outer">';
                                    $html .= '<div class="text_holder_inner">';
                                    if ($show_title == 'yes') {
                                        if ($disable_link_on_title != "yes") {
                                            $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '><a href="' . $portfolio_link . '" ' . $title_link_style . '>' . get_the_title() . '</a></' . $title_tag . '>';
                                        } else {
                                            $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '>' . get_the_title() . '</' . $title_tag . '>';
                                        }
                                    }
                                    if ($separator == 'yes') {
                                        $html .= '<span class="separator ' . $separator_animation_class . '" ' . $separator_style . '></span>';
                                    }
                                    if ($show_categories == 'yes') {
                                        $html .= '<span class="project_category" ' . $category_style . '>' . $category_html . '</span>';
                                    }
                                    $html .= '</div>'; //text_holder_inner
                                    $html .= '</div>'; // text_holder_outer
                                    $html .= '</div>';  // text_holder
                                }
                                if ($show_icons == "yes") {
                                    $html .= '<div class="icons_holder" ' . $hover_box_style . '>';
                                    if ($lightbox == "yes") {
                                        $html .= '<a class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                    }
                                    if ($portfolio_qode_like == "on" && $show_like == "yes") {
                                        if (function_exists('qode_like_portfolio_list')) {
                                            $html .= qode_like_portfolio_list(get_the_ID());
                                        }
                                    }
                                    if ($link_icon == "yes") {
                                        $html .= '<a class="preview" title="Preview" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                    }
                                    $html .= '</div>';  // icons_holder
                                }
                            }
                            break;
                    }

                    if ($disable_link != "yes") {
                        if ($portfolio_link_pointer == 'single') {
                            $html .= '<a class="portfolio_link_class" href="' . $portfolio_link . '" target="_self"></a>';
                        } elseif ($portfolio_link_pointer == 'lightbox') {
                            $html .= '<a class="portfolio_link_class" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                        }
                    }
                    $html .= '<div class="portfolio_shader" ' . $portfolio_shader_style . '></div>';
                    $html .= '<div class="image_holder">';
                    $html .= '<span class="image">';
                    $html .= get_the_post_thumbnail(get_the_ID(), $image_size);
                    $html .= '</span>';
                    $html .= '</div>'; // close text_holder
                    $html .= '</div>'; // close item_holder

                    $html .= "</article>";

                endwhile;
            // loop start
            else:
                ?>
                <p><?php _e('Sorry, no posts matched your criteria.', 'qode'); ?></p>
            <?php
            endif;
            wp_reset_query();
            $html .= "</div>";
        }
        return $html;
    }

    add_shortcode('no_portfolio_list', 'no_portfolio_list');
}

/* Portfolio Slider shortcode */

if (!function_exists('no_portfolio_slider')) {

    function no_portfolio_slider($atts, $content = null) {

        global $qode_options;
        $portfolio_qode_like = "on";
        if (isset($qode_options['portfolio_qode_like'])) {
            $portfolio_qode_like = $qode_options['portfolio_qode_like'];
        }

        $args = array(
            "hover_type" => "gradient_hover",
            "overlay_background_color" => "",
            "hover_box_color" => "",
            "order_by" => "menu_order",
            "order" => "ASC",
            "number" => "-1",
            "portfolios_shown" => "",
            "category" => "",
            "selected_projects" => "",
            "show_icons" => "yes",
            "link_icon" => "yes",
            "lightbox" => "yes",
            "show_like" => "yes",
            "disable_link" => "no",
            "show_categories" => "yes",
            "category_color" => "",
            "separator" => "",
            "separator_thickness" => "",
            "separator_color" => "",
            "separator_animation" => "",
            "title_tag" => "h5",
            "title_font_size" => "",
            "title_color" => "",
            "image_size" => "portfolio-square",
            "enable_navigation" => ""
        );
        extract(shortcode_atts($args, $atts));

        
        $overlay_background_color = esc_attr($overlay_background_color);
        $hover_box_color = esc_attr($hover_box_color);
        $number = esc_attr($number);
        $category = esc_attr($category);
        $selected_projects = esc_attr($selected_projects);
        $category_color = esc_attr($category_color);
        $separator_thickness = esc_attr($separator_thickness);
        $separator_color = esc_attr($separator_color);
        $title_font_size = esc_attr($title_font_size);
        $title_color = esc_attr($title_color);


        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = "";
        $lightbox_slug = 'portfolio_slider_' . rand();
        $data_attribute = "";

        if ($portfolios_shown !== "") {
            $data_attribute .= " data-portfolios_shown='" . $portfolios_shown. "'";
        }

        // for this type holder needs to be shown
        if ($hover_type == 'slide_from_left_hover' && $show_icons == 'no') {
            $show_icons = 'yes';
            $link_icon = 'no';
            $lightbox = 'no';
            $show_like = 'no';
        }

        // disable link if icons are shown for these hover type
        if ((($hover_type == 'subtle_vertical_hover' || $hover_type == 'image_subtle_rotate_zoom_hover' || $hover_type == 'image_text_zoom_hover') && $show_icons == 'yes')
        || $hover_type == 'gradient_hover' || $hover_type == 'prominent_plain_hover' || $hover_type == 'prominent_blur_hover') {
            $disable_link = "yes";
        }

        // adding element style and class
        $separator_animation_class = "";
        if ($separator_animation == 'yes') {
            $separator_animation_class = "animate";
        }

        $separator_style = "";
        if ($separator_color != '' || $separator_thickness != '') {
            $separator_style = 'style="';
            if ($separator_color != '') {
                $separator_style .= 'background-color: ' . $separator_color . ';';
            }
            if ($separator_thickness != '') {
                $valid_height = (strstr($separator_thickness, 'px', true)) ? $separator_thickness : $separator_thickness . "px";
                $separator_style .= 'height: ' . $valid_height . ';';
            }
            $separator_style .= '"';
        }



        $portfolio_shader_style = "";
        if ($overlay_background_color != '') {
            if ($hover_type == "gradient_hover") {
                if (substr($overlay_background_color, 0, 3) === "rgba") { // if rgba is set, portfolio uses default color
                    $portfolio_shader_style = '';
                } else {

                    $rgb = qode_hex2rgb($overlay_background_color);

                    $opacity = 0;
                    $overlay_background_color1 = 'rgba(' . $rgb[0] . ',' . $rgb[1] . ',' . $rgb[2] . ',' . $opacity . ')';
                    $opacity = 0.9;
                    $overlay_background_color2 = 'rgba(' . $rgb[0] . ',' . $rgb[1] . ',' . $rgb[2] . ',' . $opacity . ')';

                    $portfolio_shader_style = 'style="background: -webkit-linear-gradient(to bottom, ' . $overlay_background_color1 . ' 10%, ' . $overlay_background_color2 . ' 100%);';
                    $portfolio_shader_style .= 'background: linear-gradient(to bottom, ' . $overlay_background_color1 . ' 10%, ' . $overlay_background_color2 . ' 100%);"';
                }
            } elseif ($hover_type == "upward_hover") {
                // disabled
            } else {
                $portfolio_shader_style = 'style="background-color:' . $overlay_background_color . ';"';
            }
        }

        $title_style = '';
        $title_link_style = ''; // with or without 'a' tag
        if ($title_font_size != "" || $title_color != "") {
            $title_link_style .= 'style="';
            $title_style .= 'style="';
            if ($title_font_size != "") {
                $title_style .= 'font-size: ' . $title_font_size . 'px;';
                $title_link_style .= 'font-size: inherit;';
            }
            if ($title_color != "") {
                $title_style .= 'color: ' . $title_color . ';';
                $title_link_style .= 'color: inherit;';
            }
            $title_style .= '"';
            $title_link_style .= '"';
        }

        $category_style = '';
        if ($category_color != '') {
            $category_style = 'style="color: ' . $category_color . ';"';
        }

        $hover_box_style = "";
        if ($hover_type == 'upward_hover' || $hover_type == 'slide_from_left_hover') {

            if ($hover_box_color != '') {
                $hover_box_style = 'style="background-color:' . $hover_box_color . ';"';
            }
        }

        //get proper image size
        switch ($image_size) {
            case 'landscape':
                $thumb_size = 'portfolio-landscape';
                break;
            case 'portrait':
                $thumb_size = 'portfolio-portrait';
                break;
            case 'square':
                $thumb_size = 'portfolio-square';
                break;
            case 'full':
                $thumb_size = 'full';
                break;
            default:
                $thumb_size = 'full';
                break;
        }

        $html .= "<div class='portfolio_main_holder portfolio_slider_holder clearfix'><div class='portfolio_slider'" . $data_attribute . "><ul class='portfolio_slides'>";

        if ($category == "") {
            $q = array(
                'post_type' => 'portfolio_page',
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number
            );
        } else {
            $q = array(
                'post_type' => 'portfolio_page',
                'portfolio_category' => $category,
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number
            );
        }

        $project_ids = null;
        if ($selected_projects != "") {
            $project_ids = explode(",", $selected_projects);
            $q['post__in'] = $project_ids;
        }

        query_posts($q);

        if (have_posts()) : $postCount = 0;
            while (have_posts()) : the_post();

                $title = get_the_title();
                $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');

                $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), $thumb_size);

                if (get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true) != "") {
                    $large_image = get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true);
                } else {
                    $large_image = $featured_image_array[0];
                }

                $slug_list_ = "pretty_photo_gallery";

                $custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
                $portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();
                $target = $custom_portfolio_link != "" ? '_blank' : '_self';

                // get categories for specific article
                $category_html = "";
                $category_html .= '<span>' . __('In ', 'qode') . '</span>';
                $k = 1;
                foreach ($terms as $term) {
                    $category_html .= "$term->name";
                    if (count($terms) != $k) {
                        $category_html .= ' / ';
                    }
                    $k++;
                }

                $html .= "<li class='item'>";
                $html .= '<div class="item_holder ' . $hover_type . '">';

                switch ($hover_type) {
                    case 'gradient_hover':
                    case 'upward_hover':
                    case 'subtle_vertical_hover':
                    case 'image_subtle_rotate_zoom_hover':
                    case 'slide_up_hover':
                    case 'cursor_change_hover':
                    case 'image_text_zoom_hover':
                    case 'text_slides_with_image':
                    case 'thin_plus_only': {
                            $html .= '<div class="text_holder" ' . $hover_box_style . '>';
                            $html .= '<div class="text_holder_outer">';
                            $html .= '<div class="text_holder_inner">';
                            if($hover_type == 'thin_plus_only'){
                                $html .= '<span class="thin_plus_only_icon" '.$cursor_color.'>+</span>';
                            }
                            else{
                                if ($disable_link != "yes") {
                                    $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '><a href="' . $portfolio_link . '" ' . $title_link_style . '>' . get_the_title() . '</a></' . $title_tag . '>';
                                } else {
                                    $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '>' . get_the_title() . '</' . $title_tag . '>';
                                }
                                if ($separator == 'yes') {
                                    $html .= '<span class="separator ' . $separator_animation_class . '" ' . $separator_style . '></span>';
                                }
                                if ($show_categories == 'yes') {
                                    $html .= '<span class="project_category" ' . $category_style . '>' . $category_html . '</span>';
                                }

                                if ($show_icons == 'yes') {
                                    $html .= '<div class="icons_holder">';
                                    if ($lightbox == "yes") {
                                        $html .= '<a class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                    }
                                    if ($portfolio_qode_like == "on" && $show_like == "yes") {
                                        if (function_exists('qode_like_portfolio_list')) {
                                            $html .= qode_like_portfolio_list(get_the_ID());
                                        }
                                    }
                                    if ($link_icon == "yes") {
                                        $html .= '<a class="preview" title="Go to Project" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                    }
                                    $html .= '</div>'; // icons_holder
                                }
                            }
                            $html .= '</div>'; // text_holder_inner
                            $html .= '</div>';  // text_holder_outer
                            $html .= '</div>'; // text_holder
                        }
                        break;
                    case 'opposite_corners_hover':
                    case 'slide_from_left_hover':
                    case 'prominent_plain_hover':
                    case 'prominent_blur_hover':
                    case 'icons_bottom_corner':
                    case 'slow_zoom':
                    case 'split_up': {
                            $html .= '<div class="text_holder">';
                            $html .= '<div class="text_holder_outer">';
                            $html .= '<div class="text_holder_inner">';
                            if ($disable_link != "yes") {
                                $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '><a href="' . $portfolio_link . '" ' . $title_link_style . '>' . get_the_title() . '</a></' . $title_tag . '>';
                            } else {
                                $html .= '<' . $title_tag . ' class="portfolio_title" ' . $title_style . '>' . get_the_title() . '</' . $title_tag . '>';
                            }
                            if ($separator == 'yes') {
                                $html .= '<span class="separator ' . $separator_animation_class . '" ' . $separator_style . '></span>';
                            }
                            if ($show_categories == 'yes') {
                                $html .= '<span class="project_category" ' . $category_style . '>' . $category_html . '</span>';
                            }
                            $html .= '</div>'; //text_holder_inner
                            $html .= '</div>';  // text_holder_outer
                            $html .= '</div>'; // text_holder
                            if ($show_icons == 'yes') {
                                $html .= '<div class="icons_holder" ' . $hover_box_style . '>';
                                if ($lightbox == "yes") {
                                    $html .= '<a class="portfolio_lightbox" title="' . $title . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']" rel="prettyPhoto[' . $slug_list_ . ']"></a>';
                                }
                                if ($portfolio_qode_like == "on" && $show_like == "yes") {
                                    if (function_exists('qode_like_portfolio_list')) {
                                        $html .= qode_like_portfolio_list(get_the_ID());
                                    }
                                }
                                if ($link_icon == "yes") {
                                    $html .= '<a class="preview" title="Go to Project" href="' . $portfolio_link . '" data-type="portfolio_list" target="' . $target . '" ></a>';
                                }
                                $html .= '</div>';  // icons_holder
                            }
                        }
                        break;
                }

                $html .= '<div class="portfolio_shader" ' . $portfolio_shader_style . '></div>';
                $html .= '<div class="image_holder">';
                $html .= '<span class="image">';
                $html .= get_the_post_thumbnail(get_the_ID(), $thumb_size);
                $html .= '</span>';
                $html .= '</div>'; // close image_holder
                $html .= '</div>'; // close item_holder
                $html .= "</li>";

                $postCount++;

            endwhile;

        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        wp_reset_query();

        $html .= "</ul>";
        if ($enable_navigation) {

            $icon_navigation_class = 'arrow_carrot-';
            if (isset($qode_options['navigation_arrows_type']) && $qode_options['navigation_arrows_type'] != '') {
                $icon_navigation_class = $qode_options['navigation_arrows_type'];
            }

            $direction_nav_classes = qode_horizontal_slider_icon_classes($icon_navigation_class);

            $html .= '<ul class="caroufredsel-direction-nav"><li><a id="caroufredsel-prev" class="caroufredsel-prev" href="#"><span class="' .$direction_nav_classes['left_icon_class']. '"></span></a></li><li><a class="caroufredsel-next" id="caroufredsel-next" href="#"><span class="' .$direction_nav_classes['right_icon_class']. '"></span></a></li></ul>';
        }
        $html .= "</div></div>";

        return $html;
    }

    add_shortcode('no_portfolio_slider', 'no_portfolio_slider');
}


/* Progress bar horizontal shortcode */

if (!function_exists('no_progress_bar')) {

    function no_progress_bar($atts, $content = null) {
        $args = array(
            "title" => "",
            "title_color" => "",
            "title_tag" => "h4",
            "title_custom_size" => "",
            "title_padding_bottom" => "",
            "percent" => "100",
            "show_percent_number" => "",
            "show_percent_mark" => "with_mark",
            "percentage_type" => "floating",
            "floating_type" => "floating_outside",
            "percent_color" => "",
            "percent_background_color" => "",
            "percent_font_size" => "",
            "percent_font_weight" => "",
            "active_background_color" => "",
            "active_border_color" => "",
            "noactive_background_color" => "",
            "height" => "",
            "border_radius" => ""
        );

        extract(shortcode_atts($args, $atts));

        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $title_custom_size = esc_attr($title_custom_size);
        $title_padding_bottom = esc_attr($title_padding_bottom);
        $percent = esc_attr($percent);
        $percent_color = esc_attr($percent_color);
        $percent_background_color = esc_attr($percent_background_color);
        $percent_font_size = esc_attr($percent_font_size);
        $percent_font_weight = esc_attr($percent_font_weight);
        $active_background_color = esc_attr($active_background_color);
        $active_border_color = esc_attr($active_border_color);
        $noactive_background_color = esc_attr($noactive_background_color);
        $height = esc_attr($height);
        $border_radius = esc_attr($border_radius);


        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $progress_title_holder_styles = "";
        $number_styles = "";
        $outer_progress_styles = "";
        $percentage_styles = "";
        $progress_number_padding = "";

        //generate styles
        if ($title_color != "") {
            $progress_title_holder_styles .= "color: " . $title_color . ";";
        }

        if ($title_custom_size != "") {
            $title_custom_size = (strstr($title_custom_size, 'px', true)) ? $title_custom_size : $title_custom_size . "px";
            $progress_title_holder_styles .= "font-size: " . $title_custom_size . ";";
        }

        if ($title_padding_bottom != "") {
            $title_padding_bottom = (strstr($title_padding_bottom, 'px', true)) ? $title_padding_bottom : $title_padding_bottom . "px";
            $progress_title_holder_styles .= "padding-bottom: " . $title_padding_bottom . ";";
            $number_styles .= "margin-bottom: " . $title_padding_bottom . ";";
        }

        if ($percent_color != "") {
            $number_styles .= "color: " . $percent_color . ";";
        }

        if ($percent_background_color != "") {
            $number_styles .= "background-color: " . $percent_background_color . ";";
        }

        if ($percent_font_size != "") {
            $number_styles .= "font-size: " . $percent_font_size . "px;";
        }
        if ($percent_font_weight != "") {
            $number_styles .= "font-weight: " . $percent_font_weight . ";";
        }
        if ($height != "") {
            $valid_height = (strstr($height, 'px', true)) ? $height : $height . "px";
            $outer_progress_styles .= "height: " . $valid_height . ";";
            $percentage_styles .= "height: " . $valid_height . ";";
            if ($percentage_type == 'floating' && $floating_type == 'floating_inside') {
                $number_styles .= "line-height: " . $valid_height . "; height: " . $valid_height . ";";
            }
        }

        if ($border_radius != "") {
            $border_radius = (strstr($height, 'px', true)) ? $border_radius : $border_radius . "px";
            $outer_progress_styles .= "border-radius: " . $border_radius . ";-moz-border-radius: " . $border_radius . ";-webkit-border-radius: " . $border_radius . ";";
        }

        if ($noactive_background_color != "") {
            $outer_progress_styles .= "background-color: " . $noactive_background_color . ";";
        }

        if ($active_background_color != "") {
            $percentage_styles .= "background-color: " . $active_background_color . ";";
        }

        if ($active_border_color) {
            $percentage_styles .= "border-color: " . $active_border_color . ";";
        }

        $html .= "<div class='q_progress_bar'>";
        $html .= "<{$title_tag} class='progress_title_holder clearfix' style='{$progress_title_holder_styles}'>";
        $html .= "<span class='progress_title'>$title</span>"; //close progress_title

        $html .= "<span class='progress_number_wrapper " . $percentage_type;
        if ($percentage_type == 'floating') {
            $html .= " " . $floating_type;
        }
        $html .= "'>";
        if ($show_percent_number != 'no') {
            $html .= "<span class='progress_number " . $show_percent_mark . "' style='{$number_styles}'>";
        }
        $html .= "<span class='percent'>0</span>";

        //Add down_arrow class  if type floating(with background shape)
        if ($floating_type == 'floating_outside') {
            $html .= "<span class='down_arrow'";
            if ($percent_background_color != '') {
                $html .= 'style="border-top-color:' . $percent_background_color . ';"';
            }
            $html .= "></span>";
        }
        if ($show_percent_number != 'no') {
            $html .= "</span>"; //close progress number span if percent number is enabled
        }
        $html .= "</span>"; //close progress_number_wrapper

        $html .= "</{$title_tag}>"; //close progress_title_holder

        $html .= "<div class='progress_content_outer' style='{$outer_progress_styles}'>";
        $html .= "<div data-percentage='" . $percent . "' class='progress_content' style='{$percentage_styles}'>";
        $html .="</div>"; //close progress_content
        $html .= "</div>"; //close progress_content_outer

        $html .= "</div>"; //close progress_bar
        return $html;
    }

    add_shortcode('no_progress_bar', 'no_progress_bar');
}

/* Progress bar vertical shortcode */

if (!function_exists('no_progress_bar_vertical')) {

    function no_progress_bar_vertical($atts, $content = null) {
        $args = array(
            "title" => "",
            "title_color" => "",
            "title_tag" => "h4",
            "title_size" => "",
            "percent" => "100",
            "show_percent_mark" => "with_mark",
            "percentage_text_size" => "",
            "percent_color" => "",
            "bar_color" => "",
            "bar_border_color" => "",
            "background_color" => "",
            "border_radius" => "",
            "text" => "",
            "text_color" => "",
            "bar_content_height" => ""
        );

        extract(shortcode_atts($args, $atts));

        
        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $title_size = esc_attr($title_size);
        $percent = esc_attr($percent);
        $percentage_text_size = esc_attr($percentage_text_size);
        $percent_color = esc_attr($percent_color);
        $bar_color = esc_attr($bar_color);
        $bar_border_color = esc_attr($bar_border_color);
        $background_color = esc_attr($background_color);
        $border_radius = esc_attr($border_radius);
        $text = esc_html($text);
        $text_color = esc_attr($text_color);
        $bar_content_height = esc_attr($bar_content_height);


        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $title_styles = "";
        $bar_styles = "";
        $percentage_styles = "";
        $bar_holder_styles = "";
        $text_styles = "";

        //generate styles
        if ($title_color != "") {
            $title_styles .= "color:" . $title_color . ";";
        }

        if ($title_size != "") {
            $title_styles .= "font-size:" . $title_size . "px;";
        }

        //generate bar holder gradient styles
        if ($background_color != "") {
            $bar_holder_styles .= "background-color: " . $background_color . ";";
        }

        if ($border_radius != "") {
            $bar_holder_styles .= "border-radius: " . $border_radius . "px " . $border_radius . "px 0 0;border-radius: " . $border_radius . "px " . $border_radius . "px 0 0;border-radius: " . $border_radius . "px " . $border_radius . "px 0 0;";
        }

        if ($bar_content_height != "") {
            $bar_holder_styles .= "height: " . $bar_content_height . "px;";
        }

        //generate bar gradient styles
        if ($bar_color != "") {
            $bar_styles .= "background-color: " . $bar_color . ";";
        }

        if ($bar_border_color != "") {
            $bar_styles .= "border-color: " . $bar_border_color;
        }

        if ($percentage_text_size != "") {
            $percentage_styles .= "font-size: " . $percentage_text_size . "px;";
        }

        if ($percent_color != "") {
            $percentage_styles .= "color: " . $percent_color . ";";
        }

        if ($text_color != "") {
            $text_styles .= "color: " . $text_color . ";";
        }

        $html .= "<div class='q_progress_bars_vertical'>";
        $html .= "<div class='progress_content_outer' style='" . $bar_holder_styles . "'>";
        $html .= "<div data-percentage='$percent' class='progress_content' style='" . $bar_styles . "'></div>";
        $html .= "</div>"; //close progress_content_outer
        $html .= "<{$title_tag} class='progress_title' style='" . $title_styles . "'>$title</{$title_tag}>";
        $html .= "<span class='progress_number " . $show_percent_mark . "' style='" . $percentage_styles . "'>";
        $html .= "<span>$percent</span>";
        $html .= "</span>"; //close progress_number
        $html .= "<span class='progress_text'style='" . $text_styles . "'>" . $text . "</span>"; //close progress_number
        $html .= "</div>"; //close progress_bars_vertical

        return $html;
    }

    add_shortcode('no_progress_bar_vertical', 'no_progress_bar_vertical');
}


/* Progress bars icon shortcode */

if (!function_exists('no_progress_bar_icon')) {

    function no_progress_bar_icon($atts, $content = null) {
        global $qodeIconCollections;

        $args = array(
            "icons_number" => "",
            "active_number" => "",
            "type" => "",
            "size" => "",
            "icon_color" => "",
            "icon_active_color" => "",
            "background_color" => "",
            "background_active_color" => "",
            "border_color" => "",
            "border_active_color" => ""
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        
        $icons_number = esc_attr($icons_number);
        $active_number = esc_attr($active_number);
        $icon_color = esc_attr($icon_color);
        $icon_active_color = esc_attr($icon_active_color);
        $background_color = esc_attr($background_color);
        $background_active_color = esc_attr($background_active_color);
        $border_color = esc_attr($border_color);
        $border_active_color = esc_attr($border_active_color);


        $html = "<div class='q_progress_bars_icons_holder'><div class='q_progress_bars_icons'><div class='q_progress_bars_icons_inner " . $type . " " . $size;

        $html .= " clearfix' data-number='" . $active_number . "'>";

        $i = 0;
        while ($i < $icons_number) {
            $html .= "<div class='bar'><span class='bar_noactive qode_icon_stack ";
            if ($size != "") {
                if ($size == "tiny") {
                    $html .= "qode_tiny_icon";
                } else if ($size == "small") {
                    $html .= "qode_small_icon";
                } else if ($size == "medium") {
                    $html .= "qode_medium_icon";
                } else if ($size == "large") {
                    $html .= "qode_large_icon";
                } else if ($size == "very_large") {
                    $html .= "qode_huge_icon";
                }
            }
            $html .= "'";
            if ($type == "circle" || $type == "square") {
                if ($background_active_color != "" || $border_active_color != "") {
                    $html .= " style='";
                    if ($background_active_color != "") {
                        $html .= "background-color: " . $background_active_color . ";";
                    }
                    if ($border_active_color != "") {
                        $html .= " border: 1px solid " . $border_active_color . ";";
                    }
                    $html .= "'";
                }
            }
            $html .= ">";

            $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);
            
            if (method_exists($icon_collection_obj, 'render')) {
                
                $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                    'icon_attributes' => array(
                        'style' => 'color: ' . $icon_active_color,
                        'class' => 'qode_icon_stack_1x'
                    )
                ));
                
            }

            $html .= "</span><span class='bar_active qode_icon_stack ";
            if ($size != "") {
                if ($size == "tiny") {
                    $html .= "qode_tiny_icon";
                } else if ($size == "small") {
                    $html .= "qode_small_icon";
                } else if ($size == "medium") {
                    $html .= "qode_medium_icon";
                } else if ($size == "large") {
                    $html .= "qode_large_icon";
                } else if ($size == "very_large") {
                    $html .= "qode_huge_icon";
                }
            }
            $html .= "'";
            if ($type == "circle" || $type == "square") {
                if ($background_color != "" || $border_color != "") {
                    $html .= " style='";
                    if ($background_color != "") {
                        $html .= "background-color: " . $background_color . ";";
                    }
                    if ($border_color != "") {
                        $html .= " border: 1px solid " . $border_color . ";";
                    }
                    $html .= "'";
                }
            }
            $html .= ">";

            if (method_exists($icon_collection_obj, 'render')) {
                
                $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                    'icon_attributes' => array(
                        'style' => 'color: ' . $icon_color,
                        'class' => 'qode_icon_stack_1x'
                    )
                ));
                
            }


            $html .= "</span></div>";


            $i++;
        }


        $html .= "</div></div></div>";

        return $html;
    }

    add_shortcode('no_progress_bar_icon', 'no_progress_bar_icon');
}


/* Social Icon shortcode */

if (!function_exists('no_social_icons')) {

    function no_social_icons($atts, $content = null) {
        global $qodeIconCollections;

        $args = array(
            "type" => "",
            "link" => "",
            "target" => "",
            "size" => "",
            "icon_color" => "",
            "background_color" => "",
            "border_color" => "",
            "icon_hover_color" => "",
            "background_hover_color" => "",
            "border_hover_color" => ""
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $link = esc_url($link);
        $icon_color = esc_attr($icon_color);
        $background_color = esc_attr($background_color);
        $border_color = esc_attr($border_color);
        $icon_hover_color = esc_attr($icon_hover_color);
        $background_hover_color = esc_attr($background_hover_color);
        $border_hover_color = esc_attr($border_hover_color);


        $html = "";
        $fa_stack_styles = "";
        $icon_styles = "";
        $icon_holder_classes = array();
        $data_attr = "";

        if ($link != "") {
            $icon_holder_classes[] = "with_link";
        }

        if ($type != "") {
            $icon_holder_classes[] = $type;
        }

        if ($icon_color != "") {
            $icon_styles .= "color: " . $icon_color . ";";
        }

        if ($background_color != "") {
            $fa_stack_styles .= "background-color: {$background_color};";
        }

        if ($border_color != "") {
            $fa_stack_styles .= "border: 1px solid {$border_color};";
        }

        if ($background_hover_color != "") {
            $data_attr .= "data-hover-background-color=" . $background_hover_color . " ";
        }

        if ($border_hover_color != "") {
            $data_attr .= "data-hover-border-color=" . $border_hover_color . " ";
        }

        if ($icon_hover_color != "") {
            $data_attr .= "data-hover-color=" . $icon_hover_color;
        }

        $html .= "<span class='q_social_icon_holder " . implode(' ', $icon_holder_classes) . "' $data_attr>";

        if ($link != "") {
            $html .= "<a href='" . $link . "' target='" . $target . "'>";
        }

        $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);

        if ($type == "normal_social") {

            if (method_exists($icon_collection_obj, 'render')) {
                
                $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                    'icon_attributes' => array(
                        'style' => $icon_styles,
                        'class' => 'social_icon ' . $size . ' simple_social'
                    )
                ));
                
            }

        } else {
            
            if (method_exists($icon_collection_obj, 'render')) {
                
                $html .= "<span class='qode_icon_stack " . $size . " " . $type . "' style='" . $icon_styles . $fa_stack_styles . "'>";

                $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                    'icon_attributes' => array(
                        'class' => 'social_icon'
                    )
                ));
                
            }

            $html .= "</span>"; //close fa-stack
        }

        if ($link != "") {
            $html .= "</a>";
        }

        $html .= "</span>"; //close q_social_icon_holder
        return $html;
    }

    add_shortcode('no_social_icons', 'no_social_icons');
}


/* Social Share shortcode */
if (!function_exists('no_social_share')) {

    function no_social_share($atts, $content = null) {
        global $qode_options;
        if (isset($qode_options['twitter_via']) && !empty($qode_options['twitter_via'])) {
            $twitter_via = " via " . esc_attr($qode_options['twitter_via']) . " ";
        } else {
            $twitter_via = "";
        }
        if (isset($_SERVER["https"])) {
            $count_char = 23;
        } else {
            $count_char = 22;
        }
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        $html = "";
        if (isset($qode_options['enable_social_share']) && $qode_options['enable_social_share'] == "yes") {
            $post_type = get_post_type();
            if (isset($qode_options["post_types_names_$post_type"])) {
                if ($qode_options["post_types_names_$post_type"] == $post_type) {
                    if ($post_type == "portfolio_page") {
                        $html .= '<div class="portfolio_share">';
                    } elseif ($post_type == "post") {
                        $html .= '<div class="blog_share">';
                    } elseif ($post_type == "page") {
                        $html .= '<div class="page_share">';
                    }
                    $html .= '<div class="social_share_holder">';
                    $html .= '<a href="javascript:void(0)" target="_self"><i class="social_share social_share_icon"></i>';
                    $html .= '<span class="social_share_title">' . __('Share', 'qode') . '</span>';
                    $html .= '</a>';
                    $html .= '<div class="social_share_dropdown"><ul>';
                    if (isset($qode_options['enable_facebook_share']) && $qode_options['enable_facebook_share'] == "yes") {
                        $html .= '<li class="facebook_share">';
                        $html .= '<a class="share_link" href="#" onclick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . urlencode(qode_addslashes(get_the_title())) . '&amp;p[summary]=' . urlencode(qode_addslashes(get_the_excerpt())) . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;p[images][0]=';
                        if (function_exists('the_post_thumbnail')) {
                            $html .= wp_get_attachment_url(get_post_thumbnail_id());
                        }
                        $html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');">';
                        if (!empty($qode_options['facebook_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options["facebook_icon"]) . '" alt="" />';
                        } else {
                            $html .= '<span class="social_network_icon social_facebook"></span>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }

                    if ($qode_options['enable_twitter_share'] == "yes") {
                        $html .= '<li class="twitter_share">';
                        $html .= '<a class="share_link" href="#" onclick="popUp=window.open(\'http://twitter.com/home?status=' . urlencode(the_excerpt_max_charlength($count_char) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
                        if (!empty($qode_options['twitter_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options["twitter_icon"]) . '" alt="" />';
                        } else {
                            $html .= '<span class="social_network_icon social_twitter"></span>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if ($qode_options['enable_google_plus'] == "yes") {
                        $html .= '<li  class="google_share">';
                        $html .= '<a class="share_link" href="#" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['google_plus_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['google_plus_icon']) . '" alt="" />';
                        } else {
                            $html .= '<span class="social_network_icon social_googleplus"></span>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if (isset($qode_options['enable_linkedin']) && $qode_options['enable_linkedin'] == "yes") {
                        $html .= '<li  class="linkedin_share">';
                        $html .= '<a class="share_link" href="#" onclick="popUp=window.open(\'http://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['linkedin_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['linkedin_icon']) . '" alt="" />';
                        } else {
                            $html .= '<span class="social_network_icon social_linkedin"></span>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if (isset($qode_options['enable_tumblr']) && $qode_options['enable_tumblr'] == "yes") {
                        $html .= '<li  class="tumblr_share">';
                        $html .= '<a class="share_link" href="#" onclick="popUp=window.open(\'http://www.tumblr.com/share/link?url=' . urlencode(get_permalink()) . '&amp;name=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['tumblr_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['tumblr_icon']) . '" alt="" />';
                        } else {
                            $html .= '<span class="social_network_icon social_tumblr"></span>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if (isset($qode_options['enable_pinterest']) && $qode_options['enable_pinterest'] == "yes") {
                        $html .= '<li  class="pinterest_share">';
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $html .= '<a class="share_link" href="#" onclick="popUp=window.open(\'http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . qode_addslashes(get_the_title()) . '&amp;media=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['pinterest_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['pinterest_icon']) . '" alt="" />';
                        } else {
                            $html .= '<span class="social_network_icon social_pinterest"></span>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if (isset($qode_options['enable_vk']) && $qode_options['enable_vk'] == "yes") {
                        $html .= '<li  class="vk_share">';
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $html .= '<a class="share_link" href="#" onclick="popUp=window.open(\'http://vkontakte.ru/share.php?url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '&amp;image=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['vk_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['vk_icon']) . '" alt="" />';
                        } else {
                            $html .= '<span class="social_network_icon"><i class="fa fa-vk"></i></span>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    $html .= "</ul></div>";
                    $html .= "</div>";

                    if ($post_type == "portfolio_page" || $post_type == "post" || $post_type == "page") {
                        $html .= '</div>';
                    }
                }
            }
        }
        return $html;
    }

    add_shortcode('no_social_share', 'no_social_share');
}

/* Social Share List shortcode */

if (!function_exists('no_social_share_list')) {

    function no_social_share_list($atts, $content = null) {
        global $qode_options;
        if (isset($qode_options['twitter_via']) && !empty($qode_options['twitter_via'])) {
            $twitter_via = " via " . esc_attr($qode_options['twitter_via']) . " ";
        } else {
            $twitter_via = "";
        }
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        $html = "";
        if (isset($qode_options['enable_social_share']) && $qode_options['enable_social_share'] == "yes") {
            $post_type = get_post_type();

            if (isset($qode_options["post_types_names_$post_type"])) {
                if ($qode_options["post_types_names_$post_type"] == $post_type) {
                    $html .= '<div class="social_share_list_holder">';
                    $html .= '<ul>';

                    if (isset($qode_options['enable_facebook_share']) && $qode_options['enable_facebook_share'] == "yes") {
                        $html .= '<li class="facebook_share">';
                        $html .= '<a title="' . __("Share on Facebook", "qode") . '" href="#" onclick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . urlencode(qode_addslashes(get_the_title())) . '&amp;p[summary]=' . urlencode(qode_addslashes(get_the_excerpt())) . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;p[images][0]=';
                        if (function_exists('the_post_thumbnail')) {
                            $html .= wp_get_attachment_url(get_post_thumbnail_id());
                        }
                        $html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');">';
                        if (!empty($qode_options['facebook_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options["facebook_icon"]) . '" alt="" />';
                        } else {
                            $html .= '<i class="social_facebook_circle"></i>';
                        }
                        $html .= "</a>";
                        $html .= "</li>";
                    }

                    if ($qode_options['enable_twitter_share'] == "yes") {
                        $html .= '<li class="twitter_share">';
                        $html .= '<a href="#" title="' . __("Share on Twitter", 'qode') . '" onclick="popUp=window.open(\'http://twitter.com/home?status=' . urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
                        if (!empty($qode_options['twitter_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options["twitter_icon"]) . '" alt="" />';
                        } else {
                            $html .= '<i class="social_twitter_circle"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if ($qode_options['enable_google_plus'] == "yes") {
                        $html .= '<li  class="google_share">';
                        $html .= '<a href="#" title="' . __("Share on Google+", "qode") . '" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['google_plus_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['google_plus_icon']) . '" alt="" />';
                        } else {
                            $html .= '<i class="social_googleplus_circle"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if (isset($qode_options['enable_linkedin']) && $qode_options['enable_linkedin'] == "yes") {
                        $html .= '<li  class="linkedin_share">';
                        $html .= '<a href="#" class="' . __("Share on LinkedIn", "qode") . '" onclick="popUp=window.open(\'http://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['linkedin_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['linkedin_icon']) . '" alt="" />';
                        } else {
                            $html .= '<i class="social_linkedin_circle"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if (isset($qode_options['enable_tumblr']) && $qode_options['enable_tumblr'] == "yes") {
                        $html .= '<li  class="tumblr_share">';
                        $html .= '<a href="#" title="' . __("Share on Tumblr", "qode") . '" onclick="popUp=window.open(\'http://www.tumblr.com/share/link?url=' . urlencode(get_permalink()) . '&amp;name=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['tumblr_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['tumblr_icon']) . '" alt="" />';
                        } else {
                            $html .= '<i class="social_tumblr_circle"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if (isset($qode_options['enable_pinterest']) && $qode_options['enable_pinterest'] == "yes") {
                        $html .= '<li  class="pinterest_share">';
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $html .= '<a href="#" title="' . __("Share on Pinterest", "qode") . '" onclick="popUp=window.open(\'http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . qode_addslashes(get_the_title()) . '&amp;media=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['pinterest_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['pinterest_icon']) . '" alt="" />';
                        } else {
                            $html .= '<i class="social_pinterest_circle"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }
                    if (isset($qode_options['enable_vk']) && $qode_options['enable_vk'] == "yes") {
                        $html .= '<li  class="vk_share">';
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $html .= '<a href="#" title="' . __("Share on VK", "qode") . '" onclick="popUp=window.open(\'http://vkontakte.ru/share.php?url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '&amp;image=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                        if (!empty($qode_options['vk_icon'])) {
                            $html .= '<img src="' . esc_url($qode_options['vk_icon']) . '" alt="" />';
                        } else {
                            $html .= '<i class="fa fa-vk"></i>';
                        }

                        $html .= "</a>";
                        $html .= "</li>";
                    }

                    $html .= '</ul>'; //close ul
                    $html .= '</div>'; //close div.social_share_list_holder
                }
            }
        }
        return $html;
    }

    add_shortcode('no_social_share_list', 'no_social_share_list');
}

/* Team shortcode */

if (!function_exists('no_team')) {

    function no_team($atts, $content = null) {

        global $qodeIconCollections;

        $args = array(
            "team_image" => "",
            "team_image_hover_color" => "",
			"team_type" => "on_hover",
			"team_hover_type" => "",
            "team_name" => "",
            "team_name_tag" => "h4",
            "team_name_color" => "",
            "team_name_font_size" => "",
            "team_name_font_weight" => "",
            "team_name_text_transform" => "",
            "team_show_separator" => "yes",
            "team_separator_color" => "",
            "team_position" => "",
            "team_position_color" => "",
            "team_position_font_size" => "",
            "team_position_font_weight" => "",
            "team_position_text_transform" => "",
            "team_description" => "",
            "team_description_color" => "",
            "text_align" => "",
            "background_color" => "",
            "box_border" => "",
            "box_border_width" => "",
            "box_border_color" => "",
            "team_social_icon_pack" => "",
            "team_social_icon_type" => "circle_social",
            "team_social_icon_color" => "",
            "team_social_icon_background_color" => "",
            "team_social_icon_border_color" => "",
            "show_skills" => "no",
            "skills_title_size" => "",
            "skill_title_1" => "",
            "skill_percentage_1" => "",
            "skill_title_2" => "",
            "skill_percentage_2" => "",
            "skill_title_3" => "",
            "skill_percentage_3" => "",
			"team_social_style" => '',
			"social_icons_position" => ''
        );

        $team_social_icons_form_fields = array();
        $number_of_social_icons = 5;
        for ($x = 1; $x <= $number_of_social_icons; $x++) {

            foreach ($qodeIconCollections->iconCollections as $collection_key => $collection) {

                $team_social_icons_form_fields['team_social_' . $collection->param . '_' . $x] = '';
                     
            }

            $team_social_icons_form_fields['team_social_icon_'.$x.'_link'] = '';
            $team_social_icons_form_fields['team_social_icon_'.$x.'_target'] = '';
            
        }
        
        $args = array_merge($args, $team_social_icons_form_fields);

        extract(shortcode_atts($args, $atts));

        $team_image = esc_attr($team_image);
        $team_image_hover_color = esc_attr($team_image_hover_color);
        $team_name = esc_attr($team_name);
        $team_name_color = esc_attr($team_name_color);
        $team_name_font_size = esc_attr($team_name_font_size);
        $team_name_font_weight = esc_attr($team_name_font_weight);
        $team_separator_color = esc_attr($team_separator_color);
        $team_position = esc_html($team_position);
        $team_position_color = esc_attr($team_position_color);
        $team_position_font_size = esc_attr($team_position_font_size);
        $team_position_font_weight = esc_attr($team_position_font_weight);
        $team_description = esc_html($team_description);
        $team_description_color = esc_attr($team_description_color);
        $background_color = esc_attr($background_color);
        $box_border_width = esc_attr($box_border_width);
        $box_border_color = esc_attr($box_border_color);
        
        $team_social_icon_color = esc_attr($team_social_icon_color);
        $team_social_icon_background_color = esc_attr($team_social_icon_background_color);
        $team_social_icon_border_color = esc_attr($team_social_icon_border_color);
        $team_social_icon_1_link = esc_url($team_social_icon_1_link);
        $team_social_icon_2_link = esc_url($team_social_icon_2_link);
        $team_social_icon_3_link = esc_url($team_social_icon_3_link);
        $team_social_icon_4_link = esc_url($team_social_icon_4_link);
        $team_social_icon_5_link = esc_url($team_social_icon_5_link);
        $skills_title_size = esc_attr($skills_title_size);
        $skill_title_1 = esc_attr($skill_title_1);
        $skill_percentage_1 = esc_attr($skill_percentage_1);
        $skill_title_2 = esc_attr($skill_title_2);
        $skill_percentage_2 = esc_attr($skill_percentage_2);
        $skill_title_3 = esc_attr($skill_title_3);
        $skill_percentage_3 = esc_attr($skill_percentage_3);



        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $team_name_tag = (in_array($team_name_tag, $headings_array)) ? $team_name_tag : $args['team_name_tag'];

        if (is_numeric($team_image)) {
            $team_image_src = wp_get_attachment_url($team_image);
        } else {
            $team_image_src = $team_image;
        }

        $q_team_holder_classes = array();

		if ($team_type != "") {
			$q_team_holder_classes[] = $team_type;
		}
        if ($background_color != "" || ($box_border != "")) {
            $q_team_holder_classes[] = "with_padding";
        }

		if ($team_social_style != "") {
			$q_team_holder_classes[] = $team_social_style;
		}

        $q_team_style = "";
        if ($background_color != "") {
            $q_team_style .= " style='";
            $q_team_style .= 'background-color:' . $background_color . ';';
            $q_team_style .= "'";
        }

        $q_team_image_hover_style = "";
        if ($team_image_hover_color != "") {
            $q_team_image_hover_style .= " style='";
            $q_team_image_hover_style .= 'background-color:' . $team_image_hover_color . ';';
            $q_team_image_hover_style .= "'";
        }

        $qteam_box_style = "";
        if ($box_border == "yes") {

            $qteam_box_style .= "style=";

            $qteam_box_style .= "border-style:solid;";
            if ($box_border_color != "") {
                $qteam_box_style .= "border-color:" . $box_border_color . ";";
            }
            if ($box_border_width != "") {
                $qteam_box_style .= "border-width:" . $box_border_width . "px;";
            }
			if ( $team_type == "below_image") {
				$qteam_box_style .= 'border-top:none;';
			}
        }

        $q_team_separator_style = '';
        if ($team_separator_color != '') {
            $q_team_separator_style = 'border-color: ' . $team_separator_color;
        }

        $q_team_name_style_array = array();
        $q_team_name_style = '';

        if ($team_name_color != '') {
            $q_team_name_style_array[] = 'color: ' . $team_name_color;
        }

        if ($team_name_font_size != '') {
            $q_team_name_style_array[] = 'font-size: ' . $team_name_font_size . 'px';
        }

        if ($team_name_font_weight != '') {
            $q_team_name_style_array[] = 'font-weight: ' . $team_name_font_weight;
        }

        if ($team_name_text_transform != '') {
            $q_team_name_style_array[] = 'text-transform: ' . $team_name_text_transform;
        }

        if (is_array($q_team_name_style_array) && count($q_team_name_style_array)) {
            $q_team_name_style = 'style ="' . implode(';', $q_team_name_style_array) . '"';
        }

        $q_team_position_style_array = array();
        $q_team_position_style = '';

        if ($team_position_color != '') {
            $q_team_position_style_array[] = 'color: ' . $team_position_color;
        }

        if ($team_position_font_size != '') {
            $q_team_position_style_array[] = 'font-size: ' . $team_position_font_size . 'px';
        }

        if ($team_position_font_weight != '') {
            $q_team_position_style_array[] = 'font-weight: ' . $team_position_font_weight;
        }

        if ($team_position_text_transform != '') {
            $q_team_position_style_array[] = 'text-transform: ' . $team_position_text_transform;
        }

        if (is_array($q_team_position_style_array) && count($q_team_position_style_array)) {
            $q_team_position_style = 'style ="' . implode(';', $q_team_position_style_array) . '"';
        }

        $q_team_description_style_array = array();
        $q_team_description_style = '';

        if ($team_description_color != '') {
            $q_team_description_style_array[] = 'color: ' . $team_description_color;
        }

        if (is_array($q_team_description_style_array) && count($q_team_description_style_array)) {
            $q_team_description_style = 'style ="' . implode(';', $q_team_description_style_array) . '"';
        }



		switch ($team_type) {
			case "on_hover":
				$html = "<div class='q_team " . implode(' ', $q_team_holder_classes) . "'" . $q_team_style . ">";
				$html .= "<div class='q_team_inner'>";
				if ($team_image != "") {
					$html .= "<div class='q_team_image'>";
					$html .= "<img src='$team_image_src' alt='team_image' />";
					$html .= "<div class='q_team_social_holder " .$team_hover_type. "' " . $q_team_image_hover_style . ">";
					$html .= "<div class='q_team_social'>";
					$html .= "<div class='q_team_social_inner'>";


					if ($team_name !== '' || $team_position !== '' || $team_show_separator == 'yes') {
						$html .= "<div class='q_team_title_holder'>";
						if ($team_name !== '') {
							$html .= "<$team_name_tag class='q_team_name' " . $q_team_name_style . ">";
							$html .= $team_name;
							$html .= "</$team_name_tag>";
						}

						if ($team_show_separator == "yes") {
							$html .= "<span class='separator small' style='" . $q_team_separator_style . "'></span>";
						}


						if ($team_position != "") {
							$html .= "<h6 class='q_team_position' " . $q_team_position_style . ">" . $team_position . "</h6>";
						}
						$html .= "</div>"; //close div.q_team_title_holder

					}

					//generate social icons html
					$team_social_icon_type_label = ''; //used in generating shortcode parameters based on icon pack
					$team_social_icon_param_label = ''; //used in generating shortcode parameters based on icon pack

					if ($team_social_icon_pack !== '') {
						$icon_collection_obj = $qodeIconCollections->getIconCollection($team_social_icon_pack);

						if (method_exists($icon_collection_obj, 'render')) {
							$team_social_icon_type_label = 'team_social_' . $icon_collection_obj->param;
							$team_social_icon_param_label = $icon_collection_obj->param;
						}

					}

					if ($team_social_icon_pack !== '') {

						$html .= "<div class='q_team_social_wrapp'>";

						$icon_collection_obj = $qodeIconCollections->getIconCollection($team_social_icon_pack);

						if (method_exists($icon_collection_obj, 'render')) {

							//for each of available icons
							for ($i = 1; $i <= $number_of_social_icons; $i++) {
								$team_social_icon = ${$team_social_icon_type_label . '_' . $i};
								$team_social_link = ${'team_social_icon_' . $i . '_link'};
								$team_social_target = ${'team_social_icon_' . $i . '_target'};

								if ($team_social_icon != "") {


									$social_icons_param_array = array();

									$social_icons_param_array[] = $team_social_icon_param_label . "='" . $team_social_icon . "'";

									if ($team_social_link !== '') {
										$social_icons_param_array[] = "link='" . $team_social_link . "'";
									}

									if ($team_social_target !== '') {
										$social_icons_param_array[] = "target='" . $team_social_target . "'";
									}

									if ($team_social_icon_type !== '') {
										$social_icons_param_array[] = "type='" . $team_social_icon_type . "'";
									}

									if ($team_social_icon_color !== '') {
										$social_icons_param_array[] = "icon_color='" . $team_social_icon_color . "'";
									}

									if ($team_social_icon_background_color !== '') {
										$social_icons_param_array[] = "background_color='" . $team_social_icon_background_color . "'";
									}

									if ($team_social_icon_border_color !== '') {
										$social_icons_param_array[] = "border_color='" . $team_social_icon_border_color . "'";
									}

									$html .= do_shortcode('[no_social_icons icon_pack="' . $team_social_icon_pack . '" ' . implode(' ', $social_icons_param_array) . ']');
								}
							}

						}

						$html .= '</div>';    //close q_team_social_wrapp
					}

					$html .= "</div></div></div>"; //close div.q_team_social_holder

					$html .= "</div>"; //close div.q_team_image
				}

				if ($team_description != "" || $show_skills == 'yes') {

					$html .= "<div class='q_team_text " . $text_align . "' " . $qteam_box_style . ">";
					$html .= "<div class='q_team_text_inner'>";


					if ($team_description != "") {

						$html .= "<div class='q_team_description'>";
						$html .= "<p " . $q_team_description_style . ">" . $team_description . "</p>";
						$html .= "</div>"; // close div.q_team_description
					}

					if ($show_skills == 'yes') {
						$html .= '<div class="q_team_skills_holder">';

						for ($i = 1; $i <= 3; $i++) {
							$skill_title = ${"skill_title_" . $i};
							$skill_percentage = ${"skill_percentage_" . $i};

							if ($skill_title != '' && $skill_percentage != '') {

								$skills_param_array = array(
									'title ="' . $skill_title . '"',
									'percent = ' . $skill_percentage
								);

								if ($skills_title_size != '') {
									$skills_param_array[] = 'title_custom_size = ' . $skills_title_size;
								}

								$html .= do_shortcode('[no_progress_bar ' . implode(' ', $skills_param_array) . ']');
							}
						}

						$html .= '</div>';
					}

					$html .= "</div>"; //close div.q_team_text_inners
					$html .= "</div>"; //close div.q_team_text
				}
				$html .= "</div>"; //close div.q_team_inner
				$html .= "</div>"; //close div.q_team
				break;
			case "below_image":
				$html = "<div class='q_team  $text_align " . implode(' ', $q_team_holder_classes) . "'" . $q_team_style . ">";
				$html .= "<div class='q_team_inner'>";
				if ($team_image != "") {
					$html .= "<div class='q_team_image'>";
					$html .= "<img src='$team_image_src' alt='team_image' />";
					$html .= "<div class='image_overlay' " . $q_team_image_hover_style . "></div>";
					//generate social icons html
					$team_social_icon_type_label = ''; //used in generating shortcode parameters based on icon pack
					$team_social_icon_param_label = ''; //used in generating shortcode parameters based on icon pack

					if ($team_social_icon_pack !== '') {
						$icon_collection_obj = $qodeIconCollections->getIconCollection($team_social_icon_pack);

						if (method_exists($icon_collection_obj, 'render')) {
							$team_social_icon_type_label = 'team_social_' . $icon_collection_obj->param;
							$team_social_icon_param_label = $icon_collection_obj->param;
						}


						$html .= "<div class='q_team_social_holder_between " .$team_hover_type. " " .$social_icons_position. "'>";
						$html .= "<div class='q_team_social ".$team_social_icon_type." '>";
						if ($team_social_style !== "social_style_center") {
							$html .= '<span class="social_share_icon_shape"><i class="social_share social_share_icon"></i></span>';
						}
						$html .= "<div class='q_team_social_inner'>";
						$html .= "<div class='q_team_social_wrapp'>";



						$icon_collection_obj = $qodeIconCollections->getIconCollection($team_social_icon_pack);

						if (method_exists($icon_collection_obj, 'render')) {
							if ($team_social_style !== "social_style_center") {
								$html .= '<ul>';
							}

							//for each of available icons
							for ($i = 1; $i <= $number_of_social_icons; $i++) {
								$team_social_icon = ${$team_social_icon_type_label . '_' . $i};
								$team_social_link = ${'team_social_icon_' . $i . '_link'};
								$team_social_target = ${'team_social_icon_' . $i . '_target'};

								if ($team_social_icon != "") {

									$social_icons_param_array = array();

									$social_icons_param_array[] = $team_social_icon_param_label . "='" . $team_social_icon . "'";

									if ($team_social_link !== '') {
										$social_icons_param_array[] = "link='" . $team_social_link . "'";
									}

									if ($team_social_target !== '') {
										$social_icons_param_array[] = "target='" . $team_social_target . "'";
									}

									if ($team_social_icon_type !== '') {
										$social_icons_param_array[] = "type='" . $team_social_icon_type . "'";
									}

									if ($team_social_icon_color !== '') {
										$social_icons_param_array[] = "icon_color='" . $team_social_icon_color . "'";
									}

									if ($team_social_icon_background_color !== '') {
										$social_icons_param_array[] = "background_color='" . $team_social_icon_background_color . "'";
									}

									if ($team_social_icon_border_color !== '') {
										$social_icons_param_array[] = "border_color='" . $team_social_icon_border_color . "'";
									}
									if ($team_social_style !== "social_style_center") {
										$html .= '<li>';
									}
									$html .= do_shortcode('[no_social_icons icon_pack="' . $team_social_icon_pack . '" ' . implode(' ', $social_icons_param_array) . ']');
									if ($team_social_style !== "social_style_center") {
										$html .= '</li>';
									}
								}

							}
							if ($team_social_style !== "social_style_center") {
								$html .= '</ul>';
							}
						}

						$html .= '</div>';//close q_team_social_wrapp
						$html .= "</div></div></div>"; //close div.q_team_social_holder_between

					}
					$html .= "</div>"; //close div.q_team_image


				}

				$html .= '<div class="q_team_info"  '. $qteam_box_style . '>';

				if ($team_name !== '' || $team_position !== '' || $team_show_separator == 'yes') {
					$html .= "<div class='q_team_title_holder ".$team_social_icon_type."'>";
					if ($team_name !== '') {
						$html .= "<$team_name_tag class='q_team_name' " . $q_team_name_style . ">";
						$html .= $team_name;
						$html .= "</$team_name_tag>";
					}

					if ($team_show_separator == "yes") {
						$html .= "<span class='separator small' style='" . $q_team_separator_style . "'></span>";
					}


					if ($team_position != "") {
						$html .= "<h6 class='q_team_position' " . $q_team_position_style . ">" . $team_position . "</h6>";
					}
					$html .= "</div>"; //close div.q_team_title_holder

				}
				if ($team_description != "" || $show_skills == 'yes') {

					$html .= "<div class='q_team_text'>";
					$html .= "<div class='q_team_text_inner'>";


					if ($team_description != "") {

						$html .= "<div class='q_team_description'>";
						$html .= "<p " . $q_team_description_style . ">" . $team_description . "</p>";
						$html .= "</div>"; // close div.q_team_description
					}

					if ($show_skills == 'yes') {

						for ($i = 1; $i <= 3; $i++) {
							$skill_title = ${"skill_title_" . $i};
							$skill_percentage = ${"skill_percentage_" . $i};

							if ($skill_title != '' && $skill_percentage != '') {

								$skills_param_array = array(
									'title ="' . $skill_title . '"',
									'percent = ' . $skill_percentage
								);

								if ($skills_title_size != '') {
									$skills_param_array[] = 'title_custom_size = ' . $skills_title_size;
								}
								$html .= '<div class="q_team_skills_holder">';
								$html .= do_shortcode('[no_progress_bar ' . implode(' ', $skills_param_array) . ']');
								$html .= '</div>';

							}
						}

					}

					$html .= "</div>"; //close div.q_team_text_inners
					$html .= "</div>"; //close div.q_team_text
				}
				$html .= "</div>"; //close div.q_team_info
				$html .= "</div>"; //close div.q_team_inner
				$html .= "</div>"; //close div.q_team

				break;
		}

        return $html;
    }

    add_shortcode('no_team', 'no_team');
}


/* Testimonials shortcode */

if (!function_exists('no_testimonials')) {

    function no_testimonials($atts, $content = null) {

        global $qode_options;

        $deafult_args = array(
            "number" => "-1",
            "category" => "",
            "show_title" => "",
            "title_color" => "",
            "show_title_separator" => "no",
            "separator_color" => "",
            "separator_width" => "",
            "separator_height" => "",
            "text_color" => "",
            "text_font_size" => "",
            "show_author" => "yes",
            "author_position" => "below_text",
            "author_text_color" => "",
            "show_position" => "no",
            "job_position_placement" => "",
            "job_color" => "",
            "job_font_size" => "",
            "job_font_style" => "",
            "text_align" => "left_align",
            "show_navigation" => "no",
            "show_navigation_arrows" => "no",
            "auto_rotate_slides" => "",
            "animation_speed" => "",
            "show_image" => "yes",
            "image_position" => "top",
            "show_image_border" => "no",
            "image_border_color" => "",
            "image_border_width" => "",
            "image_position_slide" => ""
        );

        extract(shortcode_atts($deafult_args, $atts));

        $number = esc_attr($number);
        $category = esc_attr($category);
        $title_color = esc_attr($title_color);
        $separator_color = esc_attr($separator_color);
        $separator_width = esc_attr($separator_width);
        $separator_height = esc_attr($separator_height);
        $text_color = esc_attr($text_color);
        $text_font_size = esc_attr($text_font_size);
        $author_text_color = esc_attr($author_text_color);
        $job_color = esc_attr($job_color);
        $job_font_size = esc_attr($job_font_size);
        $job_font_style = esc_attr($job_font_style);
        $animation_speed = esc_attr($animation_speed);
        $image_border_color = esc_attr($image_border_color);
        $image_border_width = esc_attr($image_border_width);

        $html = "";
        $html_author = "";
        $testimonial_p_style = "";
        $testimonial_separator_style = "";
        $testimonial_title_style = "";
        $navigation_button_radius = "";
        $testimonial_name_styles = "";
        $testimonials_clasess = "";
        $image_clasess = "";
        $testimonial_image_border_style = "";
        $job_style = "";


        if ($show_navigation_arrows == "yes") {
            $testimonials_clasess .= ' with_arrows';
        }

        if ($show_image == "yes" && $image_position == "top") {
            $image_clasess .= ' image_top';
        }

        if ($show_image == "yes" && $image_position == "bottom") {
            $image_clasess .= ' image_bottom';
        }


        if ($show_image == "yes" && $image_position_slide == "inside") {
            $image_clasess .= ' relative_position';
        }

        if ($show_image == "yes" && $image_position_slide == "over") {
            $image_clasess .= ' absolute_position';
        }

        if ($separator_color != "") {
            $testimonial_separator_style .= "background-color: " . $separator_color . ";";
        }
        if ($separator_width != "") {
            $testimonial_separator_style .= "width: " . $separator_width . "px;";
        }
        if ($separator_height != "") {
            $testimonial_separator_style .= "height: " . $separator_height . "px;";
        }
        if ($title_color != "") {
            $testimonial_title_style .= "color: " . $title_color . ";";
        }

        if ( $show_image_border == "yes" ) {
            if ($image_border_color != "") {
                $testimonial_image_border_style .= "border-color: " . $image_border_color . ";";
            }

            if ($image_border_width != "") {
                $testimonial_image_border_style .= "border-width: " . $image_border_width . "px;";
            }
        }


        if ($text_font_size != "" || $text_color != "") {
            $testimonial_p_style = " style='";
            if ($text_font_size != "") {
                $testimonial_p_style .= "font-size:" . $text_font_size . "px;";
            }
            if ($text_color != "") {
                $testimonial_p_style .= "color:" . $text_color . ";";
            }
            $testimonial_p_style .= "'";
        }

        if ($author_text_color != "") {
            $testimonial_name_styles .= "color: " . $author_text_color . ";";
        }

        if ($job_color != "") {
            $job_style .= 'color: '.$job_color.';';
        }
        if ($job_font_size != "") {
            $job_font_size = (strstr($job_font_size, 'px', true)) ? $job_font_size : $job_font_size . 'px';
            $job_style .= 'font-size: '.$job_font_size.'px;';
        }
        if ($job_font_style != "") {
            $job_style .= 'font-style: '.$job_font_style.';';
        }

        $args = array(
            'post_type' => 'testimonials',
            'orderby' => "date",
            'order' => "DESC",
            'posts_per_page' => $number
        );

        if ($category != "") {
            $args['testimonials_category'] = $category;
        }


        $html .= "<div class='testimonials_holder clearfix'>";
        $html .= '<div class="testimonials testimonials_carousel ' . $testimonials_clasess . '" data-show-navigation="' . $show_navigation . '" data-show-navigation-arrows="' . $show_navigation_arrows . '" data-animation-speed="' . $animation_speed . '" data-auto-rotate-slides="' . $auto_rotate_slides . '">';
        $html .= '<ul class="slides">';

        query_posts($args);
        if (have_posts()) :
            while (have_posts()) : the_post();
                $author = get_post_meta(get_the_ID(), "qode_testimonial-author", true);
                $text = get_post_meta(get_the_ID(), "qode_testimonial-text", true);
                $title = get_post_meta(get_the_ID(), "qode_testimonial_title", true);
                $job = get_post_meta(get_the_ID(), "qode_testimonial_author_position", true);


                $html .= '<li id="testimonials' . get_the_ID() . '" class="testimonial_content ' . $text_align . ' ' . $image_clasess . '">';

                if ($show_image == "yes" && !($image_position == "bottom" && $image_position_slide == "inside")) {
                    $html .= '<div class="testimonial_image_holder" style="' . $testimonial_image_border_style . '">' . get_the_post_thumbnail(get_the_ID()) . '</div>';
                }
                $html .= '<div class="testimonial_content_inner"';

                $html .= '>';
                $html .= '<div class="testimonial_text_holder ' . $text_align . '">';

                if ($show_author == "yes") {
                    $html_author = '<p class="testimonial_author" style="' . $testimonial_name_styles . '">- ' . $author;
                    if ($show_position == "yes" && $job !== '') {
                        if( $job_position_placement == "inline" ) {
                            $html_author .= ', <span class="testimonials_job" style="'.$job_style.'">'.$job.'</span>';
                        }
                        elseif ( $job_position_placement == "below") {
                            $html_author .= '<span class="testimonials_job below" style="'.$job_style.'">'.$job.'</span>';
                        }
                    }
                    $html_author .= '</p>';
                }

                $html .= '<div class="testimonial_text_inner">';
                if ($show_title == "yes") {
                    $html .= '<p class="testimonial_title" style="' . $testimonial_title_style . '">' . $title . '</p>';
                }
                if ($show_title_separator == "yes") {
                    $html .= '<span class="testimonial_separator" style="' . $testimonial_separator_style . '"></span>';
                }
                if ($author_position == "below_text") {
                    $html .= '<p class="testimonial_text"' . $testimonial_p_style . '>' . trim($text) . '</p>';
                    $html .= $html_author;
                } elseif ($author_position == "above_text") {
                    $html .= $html_author;
                    $html .= '<p class="testimonial_text"' . $testimonial_p_style . '>' . trim($text) . '</p>';
                }


                $html .= '</div>'; //close testimonial_text_inner
                $html .= '</div>'; //close testimonial_text_holder

                $html .= '</div>'; //close testimonial_content_inner
                if ($show_image == "yes" && $image_position == "bottom" && $image_position_slide == "inside") {
                    $html .= '<div class="testimonial_image_holder" style="' . $testimonial_image_border_style . '">' . get_the_post_thumbnail(get_the_ID()) . '</div>';
                }
                $html .= '</li>'; //close testimonials
            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        wp_reset_query();
        $html .= '</ul>'; //close slides
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    add_shortcode('no_testimonials', 'no_testimonials');
}


/* Unordered List shortcode */

if (!function_exists('no_unordered_list')) {

    function no_unordered_list($atts, $content = null) {
        $args = array(
            "style" => "",
            "animate" => "",
            'number_type' => "",
            "font_weight" => ""
        );

        extract(shortcode_atts($args, $atts));

        $list_item_classes = "";

        if ($style != "") {
            $list_item_classes .= "{$style}";
        }

        if ($number_type != "") {
            $list_item_classes .= " {$number_type}";
        }

        if ($font_weight != "") {
            $list_item_classes .= " {$font_weight}";
        }

        $html = "<div class='q_list $list_item_classes";
        if ($animate == "yes") {
            $html .= " animate_list'>" . $content . "</div>";
        } else {
            $html .= "'>" . $content . "</div>";
        }
        return $html;
    }

    add_shortcode('no_unordered_list', 'no_unordered_list');
}


/* Service table shortcode */

if (!function_exists('no_service_table')) {

    function no_service_table($atts, $content = null) {
        global $qode_options;
        global $qodeIconCollections;

        $args = array(
            "type" => "icon_image_on_top",
            "title" => "",
            "title_tag" => "h4",
            "title_color" => "",
            "title_background_color" => "",
            "top_background_image" => "",
            "header_type" => "with_icon",
            "icon_color" => "",
            "custom_size" => "",
            "header_image" => "",
            "border" => "",
            "border_width" => "",
            "border_color" => "",
            "active" => "",
            "active_text" => "Best choice",
            "active_text_color" => "",
            "active_text_background_color" => "",
            "content_background_color" => "",
            "content_background_image" => "",
            "content_text_color" => "",
            "title_separator" => "",
            "title_separator_color" => "",
            "border_top" => "yes",
            "border_top_color" => "",
            "title_border_bottom" => "yes",
            "title_border_bottom_color" => "",
            "show_icon_image" => "yes"
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($args, $atts));

        $title = esc_html($title);
        $title_color = esc_attr($title_color);
        $title_background_color = esc_attr($title_background_color);
        $top_background_image = esc_attr($top_background_image);
        $icon_color = esc_attr($icon_color);
        $custom_size = esc_attr($custom_size);
        $header_image = esc_attr($header_image);
        $border_width = esc_attr($border_width);
        $border_color = esc_attr($border_color);
        $active_text = esc_attr($active_text);
        $active_text_color = esc_attr($active_text_color);
        $active_text_background_color = esc_attr($active_text_background_color);
        $content_background_color = esc_attr($content_background_color);
        $content_background_image = esc_attr($content_background_image);
        $content_text_color = esc_attr($content_text_color);
        $title_separator_color = esc_attr($title_separator_color);
        $border_top_color = esc_attr($border_top_color);
        $title_border_bottom_color = esc_attr($title_border_bottom_color);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $title_holder_style = "";
        $title_style = "";
        $title_classes = "";
        $icon_style = "";
        $service_icon_background_image = "";
        $content_style = "";
        $service_table_border_style = "";
        $service_table_style = "";
        $active_holder_style_array = array();
        $active_holder_style = "";
        $active_text_style_array = array();
        $service_table_border_top_style = array();
        $active_text_style = "";
        $service_table_clasess = '';
        $content_text_style = "";
        $title_separator_style = "";
        $service_header_image = "";
        $basic_title_border_bottom_style = array();
        $active_table_position = "";

        if ($type == "title_on_top") {
            $service_table_clasess .= ' title_on_top';
        }

        if ($type == "icon_image_on_top") {
            $service_table_clasess .= ' icon_image_on_top';
        }

        if ($active == "yes") {
            $service_table_clasess .= ' active';
        }

        if ($title_separator == "yes") {
            $title_classes .= ' active_small_separator';
        }

        if ($active_text_color !== '') {
            $active_text_style_array[] = 'color: ' . $active_text_color;
        }

        if (is_array($active_text_style_array) && count($active_text_style_array)) {
            $active_text_style = 'style="' . implode(';', $active_text_style_array) . '"';
        } else {
            $active_text_style = '';
        }

        if ($title_color != "") {
            $title_style .= "color: " . $title_color . ";";

            $title_holder_style .= "color: " . $title_color . ";";
        }

        if ($title_background_color != "") {
            $title_holder_style .= "background-color: " . $title_background_color . ";";
        }

        if ($title_separator_color != '') {
            $title_separator_style = 'style="background-color: ' . $title_separator_color . ';"';
        }

        if ($top_background_image != "") {
            if (is_numeric($top_background_image)) {
                $background_image_src = wp_get_attachment_url($top_background_image);
            } else {
                $background_image_src = $top_background_image;
            }
            $service_icon_background_image .= "style='background-image: url(" . $background_image_src . ");'";
        }

        if ($header_image != "") {
            if (is_numeric($header_image)) {
                $background_image_src = wp_get_attachment_url($header_image);
            } else {
                $background_image_src = $header_image;
            }
            $service_header_image .= "<img src=" . $background_image_src . " alt='' />";
        }

        if ($icon_color != "" && $header_type == 'with_icon') {
            $icon_style .= "color: " . $icon_color . ";";
        }

        if ($custom_size != "" && $header_type == 'with_icon') {
            $icon_style .= "font-size: " . $custom_size . "px;";
        }

        if ($content_background_color != "") {
            $content_style .= "background-color: " . $content_background_color . ";";
        }

        if ($content_background_image != "") {
            if (is_numeric($content_background_image)) {
                $background_image_src = wp_get_attachment_url($content_background_image);
            } else {
                $background_image_src = $content_background_image;
            }
            $content_style .= "background-image: url(" . $background_image_src . ");";
        }

        if ($content_text_color != '') {
            $content_text_style = 'style="color: ' . $content_text_color . ';"';
        }

        if ($border == "yes") {
            $service_table_border_style .= " border-style:solid;";
            if ($border_width != "") {
                $service_table_border_style .= "border-width:" . $border_width . "px;";
            }
            if ($border_color != "") {
                $service_table_border_style .= "border-color:" . $border_color . ";";
            }
        }

        if ($active_text_background_color !== '') {
            $active_holder_style_array[] = 'background-color: ' . $active_text_background_color;
        }

        if ($border_top == "no" && $type=="title_on_top") {
            $service_table_border_top_style[] = "border-top: 0;";
            $active_holder_style_array[] = "top: -38px;";
        }

        if ($border_top == "yes" && $border == "yes" && $type=="title_on_top") {
            $service_table_border_style .= "border-top: 0;";
        }

        if (($border_top == "yes") && ($border_top_color != '')  && ($type=="title_on_top")) {
            $service_table_border_top_style[] = "border-top-color: " . $border_top_color . ";";
        }

        if (is_array($service_table_border_top_style) && count($service_table_border_top_style)) {
            $service_table_border_top_style = 'style="' . implode(';', $service_table_border_top_style) . '"';
        } else {
            $service_table_border_top_style = '';
        }

        if (is_array($active_holder_style_array) && count($active_holder_style_array)) {
            $active_holder_style = 'style="' . implode(';', $active_holder_style_array) . '"';
        } else {
            $active_holder_style = '';
        }

        if ($title_border_bottom == "no") {
            $basic_title_border_bottom_style[] = "border-bottom : 0; ";
        }

        if (($title_border_bottom == "yes") && $title_border_bottom_color != '') {
            $basic_title_border_bottom_style[] = "border-bottom-color : " . $title_border_bottom_color . ";";
        }

        if (is_array($basic_title_border_bottom_style) && count($basic_title_border_bottom_style)) {
            $basic_title_border_bottom_style = 'style="' . implode(';', $basic_title_border_bottom_style) . '"';
        } else {
            $basic_title_border_bottom_style = '';
        }

        if ($type == "title_on_top") {
            $html .= "<div class='service_table_holder " . $service_table_clasess . "' " . $service_table_border_top_style . ">";
        }

        if ($type == "icon_image_on_top") {
            $html .= "<div class='service_table_holder " . $service_table_clasess . "'>";
        }

        if ($active == 'yes') {
            $html .= "<div class='active_text' " . $active_holder_style . "><span class='active_text_inner'><span " . $active_text_style . ">" . __($active_text, 'qode') . "</span></span></div>";
        }

        $html .= "<ul class='service_table_inner' style='" . $service_table_border_style . " " . $content_style . "'>";

        if ($type == 'title_on_top') {
            $html .= "<li class='service_table_title_holder " . $title_classes . "' style='" . $title_holder_style . "'>";
            $html .= "<div class='service_table_title_inner' " . $basic_title_border_bottom_style . ">";
            if ($title != "") {
                $html .= "<" . $title_tag . " class='service_title' style='" . $title_style . "'>" . $title . "</" . $title_tag . ">";
            }
            $html .= "</div>";
            $html .= "</li>"; //close li.service_table_title_holder
        }

        if ($show_icon_image == 'yes') {

            if ($header_type == 'with_icon') {
                $html .= "<li class='service_icon' " . $service_icon_background_image . ">";

                $icon_collection_obj = $qodeIconCollections->getIconCollection($icon_pack);

                if (method_exists($icon_collection_obj, 'render')) {
                    
                    $html .= $icon_collection_obj->render(${$icon_collection_obj->param}, array(
                        'icon_attributes' => array(
                            'style' => $icon_style,
                            'class' => 'service_table_icon'
                        )
                    ));
                    
                }
                


                $html .= "</li>";
            }


            if ($header_type == 'with_image') {
                $html .= "<li class='service_image' " . $service_icon_background_image . ">";
                $html .= $service_header_image;
                $html .= "</li>";
            }
        }

        if ($type == 'icon_image_on_top') {

            $html .= "<li class='service_table_title_holder " . $title_classes . "' style='" . $title_holder_style . "'>";
            $html .= "<div class='service_table_title_inner'>";
            if ($title != "") {
                $html .= "<" . $title_tag . " class='service_title' style='" . $title_style . "'>" . $title . "</" . $title_tag . ">";
            }
            $html .= "</div>";
            if ($title_separator == "yes") {
                $html .="<div class='title_separator'  " . $title_separator_style . "></div>";
            }
            $html .= "</li>"; //close li.service_table_title_holder
        }

        $html .= "<li class='service_table_content' " . $content_text_style . ">";

        $html .= do_shortcode($content);

        $html .= "</li>";

        $html .= "</ul></div>";

        return $html;
    }

    add_shortcode('no_service_table', 'no_service_table');
}


/* Select Slider shortcode */

if (!function_exists('no_slider')) {

    function no_slider($atts, $content = null) {

        global $qodeIconCollections;
        global $qode_options;
        extract(shortcode_atts(array("slider" => "", "height" => "", "responsive_height" => "", "responsive_breakpoints" => "set1", "background_color" => "", "auto_start" => "", "animation_type" => "", "slide_animation" => "6000", "anchor" => "", "show_navigation_arrows" => "yes", "show_navigation_circles" => "yes", "navigation_position" => "default", "content_next_to_arrows" => ""), $atts));
        $html = "";

        $slider = esc_attr($slider);
        $height = esc_attr($height);
        $responsive_height = esc_attr($responsive_height);
        $background_color = esc_attr($background_color);
        $auto_start = esc_attr($auto_start);
        $animation_type = esc_attr($animation_type);
        $slide_animation = esc_attr($slide_animation);
        $anchor = esc_attr($anchor);
        $show_navigation_arrows = esc_attr($show_navigation_arrows);
        $show_navigation_circles = esc_attr($show_navigation_circles);
        $navigation_position = esc_attr($navigation_position);
        $content_next_to_arrows = esc_attr($content_next_to_arrows);


        if ($slider != "") {
            $args = array(
                'post_type' => 'slides',
                'slides_category' => $slider,
                'orderby' => "menu_order",
                'order' => "ASC",
                'posts_per_page' => -1
            );

            $slider_id = get_term_by('slug', $slider, 'slides_category')->term_id;
            $slider_meta = get_option("taxonomy_term_" . $slider_id);
            $slider_header_effect = $slider_meta['header_effect'];
            if ($slider_header_effect == 'yes') {
                $header_effect_class = 'header_effect';
            } else {
                $header_effect_class = '';
            }

            $slider_css_position_class = '';
            $slider_parallax = 'yes';
            if (isset($slider_meta['slider_parallax_effect'])) {
                $slider_parallax = $slider_meta['slider_parallax_effect'];
            }
            if ($slider_parallax == 'no') {
                $data_parallax_effect = 'data-parallax="no"';
                $slider_css_position_class = 'relative_position';
            } else {
                $data_parallax_effect = 'data-parallax="yes"';
            }

            // not enabled for vertical menu and paspartu
            $slider_thumbs = 'no';
            if (isset($slider_meta['slider_thumbs'])) {
                if(isset($qode_options['vertical_area']) && $qode_options['vertical_area'] =='no' && isset($qode_options['paspartu']) && $qode_options['paspartu'] == 'no') {
                    $slider_thumbs = $slider_meta['slider_thumbs'];
                }
            }
            if ($slider_thumbs == 'yes') {
                $slider_thumbs_class = 'slider_thumbs';
            } else {
                $slider_thumbs_class = '';
            }

            if ($height == "" || $height == "0") {
                $full_screen_class = "full_screen";
                $responsive_height_class = "";
                $height_class = "";
                $slide_holder_height = "";
                $slide_height = "";
                $data_height = "";
                $carouselinner_height = 'height: 100%';
            } else {
                $full_screen_class = "";
                $height_class = "has_height";
                if ($responsive_height == "yes") {
                    $responsive_height_class = "responsive_height";
                } else {
                    $responsive_height_class = "";
                }
                $slide_holder_height = "height: " . $height . "px;";
                $slide_height = "height: " . ($height) . "px;";
                $data_height = "data-height='" . $height . "'";
                $carouselinner_height = "height: " . ($height + 50) . "px;"; //because of the bottom gap on smooth scroll
            }

            $anchor_data = '';
            if ($anchor != "") {
                $anchor_data .= 'data-q_id = "#' . $anchor . '"';
            }

            $responsiveness_data = '';
            $responsive_coefficients_graphic_data = '';
            $responsive_coefficients_title_data = '';
            $responsive_coefficients_subtitle_data = '';
            $responsive_coefficients_text_data = '';
            $responsive_coefficients_button_data = '';

            if ($height != "" && $responsive_height == "yes") {
                $responsiveness_data = 'data-q_responsive_breakpoints = "' . $responsive_breakpoints . '"';
            }

            if (isset($slider_meta['breakpoint1_graphic']) && $slider_meta['breakpoint1_graphic'] != '') {
                $breakpoint1_graphic = esc_attr($slider_meta['breakpoint1_graphic']);
            } else {
                $breakpoint1_graphic = 1;
            }
            if (isset($slider_meta['breakpoint2_graphic']) && $slider_meta['breakpoint2_graphic'] != '') {
                $breakpoint2_graphic = esc_attr($slider_meta['breakpoint2_graphic']);
            } else {
                $breakpoint2_graphic = 1;
            }
            if (isset($slider_meta['breakpoint3_graphic']) && $slider_meta['breakpoint3_graphic'] != '') {
                $breakpoint3_graphic = esc_attr($slider_meta['breakpoint3_graphic']);
            } else {
                $breakpoint3_graphic = 0.8;
            }
            if (isset($slider_meta['breakpoint4_graphic']) && $slider_meta['breakpoint4_graphic'] != '') {
                $breakpoint4_graphic = esc_attr($slider_meta['breakpoint4_graphic']);
            } else {
                $breakpoint4_graphic = 0.7;
            }
            if (isset($slider_meta['breakpoint5_graphic']) && $slider_meta['breakpoint5_graphic'] != '') {
                $breakpoint5_graphic = esc_attr($slider_meta['breakpoint5_graphic']);
            } else {
                $breakpoint5_graphic = 0.6;
            }
            if (isset($slider_meta['breakpoint6_graphic']) && $slider_meta['breakpoint6_graphic'] != '') {
                $breakpoint6_graphic = esc_attr($slider_meta['breakpoint6_graphic']);
            } else {
                $breakpoint6_graphic = 0.5;
            }
            if (isset($slider_meta['breakpoint7_graphic']) && $slider_meta['breakpoint7_graphic'] != '') {
                $breakpoint7_graphic = esc_attr($slider_meta['breakpoint7_graphic']);
            } else {
                $breakpoint7_graphic = 0.4;
            }

            if (isset($slider_meta['breakpoint1_title']) && $slider_meta['breakpoint1_title'] != '') {
                $breakpoint1_title = esc_attr($slider_meta['breakpoint1_title']);
            } else {
                $breakpoint1_title = 1;
            }
            if (isset($slider_meta['breakpoint2_title']) && $slider_meta['breakpoint2_title'] != '') {
                $breakpoint2_title = esc_attr($slider_meta['breakpoint2_title']);
            } else {
                $breakpoint2_title = 1;
            }
            if (isset($slider_meta['breakpoint3_title']) && $slider_meta['breakpoint3_title'] != '') {
                $breakpoint3_title = esc_attr($slider_meta['breakpoint3_title']);
            } else {
                $breakpoint3_title = 0.8;
            }
            if (isset($slider_meta['breakpoint4_title']) && $slider_meta['breakpoint4_title'] != '') {
                $breakpoint4_title = esc_attr($slider_meta['breakpoint4_title']);
            } else {
                $breakpoint4_title = 0.7;
            }
            if (isset($slider_meta['breakpoint5_title']) && $slider_meta['breakpoint5_title'] != '') {
                $breakpoint5_title = esc_attr($slider_meta['breakpoint5_title']);
            } else {
                $breakpoint5_title = 0.6;
            }
            if (isset($slider_meta['breakpoint6_title']) && $slider_meta['breakpoint6_title'] != '') {
                $breakpoint6_title = esc_attr($slider_meta['breakpoint6_title']);
            } else {
                $breakpoint6_title = 0.5;
            }
            if (isset($slider_meta['breakpoint7_title']) && $slider_meta['breakpoint7_title'] != '') {
                $breakpoint7_title = esc_attr($slider_meta['breakpoint7_title']);
            } else {
                $breakpoint7_title = 0.4;
            }

            if (isset($slider_meta['breakpoint1_subtitle']) && $slider_meta['breakpoint1_subtitle'] != '') {
                $breakpoint1_subtitle = esc_attr($slider_meta['breakpoint1_subtitle']);
            } else {
                $breakpoint1_subtitle = 1;
            }
            if (isset($slider_meta['breakpoint2_subtitle']) && $slider_meta['breakpoint2_subtitle'] != '') {
                $breakpoint2_subtitle = esc_attr($slider_meta['breakpoint2_subtitle']);
            } else {
                $breakpoint2_subtitle = 1;
            }
            if (isset($slider_meta['breakpoint3_subtitle']) && $slider_meta['breakpoint3_subtitle'] != '') {
                $breakpoint3_subtitle = esc_attr($slider_meta['breakpoint3_subtitle']);
            } else {
                $breakpoint3_subtitle = 0.8;
            }
            if (isset($slider_meta['breakpoint4_subtitle']) && $slider_meta['breakpoint4_subtitle'] != '') {
                $breakpoint4_subtitle = esc_attr($slider_meta['breakpoint4_subtitle']);
            } else {
                $breakpoint4_subtitle = 0.7;
            }
            if (isset($slider_meta['breakpoint5_subtitle']) && $slider_meta['breakpoint5_subtitle'] != '') {
                $breakpoint5_subtitle = esc_attr($slider_meta['breakpoint5_subtitle']);
            } else {
                $breakpoint5_subtitle = 0.6;
            }
            if (isset($slider_meta['breakpoint6_subtitle']) && $slider_meta['breakpoint6_subtitle'] != '') {
                $breakpoint6_subtitle = esc_attr($slider_meta['breakpoint6_subtitle']);
            } else {
                $breakpoint6_subtitle = 0.5;
            }
            if (isset($slider_meta['breakpoint7_subtitle']) && $slider_meta['breakpoint7_subtitle'] != '') {
                $breakpoint7_subtitle = esc_attr($slider_meta['breakpoint7_subtitle']);
            } else {
                $breakpoint7_subtitle = 0.4;
            }

            if (isset($slider_meta['breakpoint1_text']) && $slider_meta['breakpoint1_text'] != '') {
                $breakpoint1_text = esc_attr($slider_meta['breakpoint1_text']);
            } else {
                $breakpoint1_text = 1;
            }
            if (isset($slider_meta['breakpoint2_text']) && $slider_meta['breakpoint2_text'] != '') {
                $breakpoint2_text = esc_attr($slider_meta['breakpoint2_text']);
            } else {
                $breakpoint2_text = 1;
            }
            if (isset($slider_meta['breakpoint3_text']) && $slider_meta['breakpoint3_text'] != '') {
                $breakpoint3_text = esc_attr($slider_meta['breakpoint3_text']);
            } else {
                $breakpoint3_text = 0.8;
            }
            if (isset($slider_meta['breakpoint4_text']) && $slider_meta['breakpoint4_text'] != '') {
                $breakpoint4_text = esc_attr($slider_meta['breakpoint4_text']);
            } else {
                $breakpoint4_text = 0.7;
            }
            if (isset($slider_meta['breakpoint5_text']) && $slider_meta['breakpoint5_text'] != '') {
                $breakpoint5_text = esc_attr($slider_meta['breakpoint5_text']);
            } else {
                $breakpoint5_text = 0.6;
            }
            if (isset($slider_meta['breakpoint6_text']) && $slider_meta['breakpoint6_text'] != '') {
                $breakpoint6_text = esc_attr($slider_meta['breakpoint6_text']);
            } else {
                $breakpoint6_text = 0.5;
            }
            if (isset($slider_meta['breakpoint7_text']) && $slider_meta['breakpoint7_text'] != '') {
                $breakpoint7_text = esc_attr($slider_meta['breakpoint7_text']);
            } else {
                $breakpoint7_text = 0.4;
            }

            if (isset($slider_meta['breakpoint1_button']) && $slider_meta['breakpoint1_button'] != '') {
                $breakpoint1_button = esc_attr($slider_meta['breakpoint1_button']);
            } else {
                $breakpoint1_button = 1;
            }
            if (isset($slider_meta['breakpoint2_button']) && $slider_meta['breakpoint2_button'] != '') {
                $breakpoint2_button = esc_attr($slider_meta['breakpoint2_button']);
            } else {
                $breakpoint2_button = 1;
            }
            if (isset($slider_meta['breakpoint3_button']) && $slider_meta['breakpoint3_button'] != '') {
                $breakpoint3_button = esc_attr($slider_meta['breakpoint3_button']);
            } else {
                $breakpoint3_button = 0.8;
            }
            if (isset($slider_meta['breakpoint4_button']) && $slider_meta['breakpoint4_button'] != '') {
                $breakpoint4_button = esc_attr($slider_meta['breakpoint4_button']);
            } else {
                $breakpoint4_button = 0.7;
            }
            if (isset($slider_meta['breakpoint5_button']) && $slider_meta['breakpoint5_button'] != '') {
                $breakpoint5_button = esc_attr($slider_meta['breakpoint5_button']);
            } else {
                $breakpoint5_button = 0.6;
            }
            if (isset($slider_meta['breakpoint6_button']) && $slider_meta['breakpoint6_button'] != '') {
                $breakpoint6_button = esc_attr($slider_meta['breakpoint6_button']);
            } else {
                $breakpoint6_button = 0.5;
            }
            if (isset($slider_meta['breakpoint7_button']) && $slider_meta['breakpoint7_button'] != '') {
                $breakpoint7_button = esc_attr($slider_meta['breakpoint7_button']);
            } else {
                $breakpoint7_button = 0.4;
            }

            $responsive_coefficients_graphic_data = 'data-q_responsive_graphic_coefficients = "' . $breakpoint1_graphic . ',' . $breakpoint2_graphic . ',' . $breakpoint3_graphic . ',' . $breakpoint4_graphic . ',' . $breakpoint5_graphic . ',' . $breakpoint6_graphic . ',' . $breakpoint7_graphic . '"';
            $responsive_coefficients_title_data = 'data-q_responsive_title_coefficients = "' . $breakpoint1_title . ',' . $breakpoint2_title . ',' . $breakpoint3_title . ',' . $breakpoint4_title . ',' . $breakpoint5_title . ',' . $breakpoint6_title . ',' . $breakpoint7_title . '"';
            $responsive_coefficients_subtitle_data = 'data-q_responsive_subtitle_coefficients = "' . $breakpoint1_subtitle . ',' . $breakpoint2_subtitle . ',' . $breakpoint3_subtitle . ',' . $breakpoint4_subtitle . ',' . $breakpoint5_subtitle . ',' . $breakpoint6_subtitle . ',' . $breakpoint7_subtitle . '"';
            $responsive_coefficients_text_data = 'data-q_responsive_text_coefficients = "' . $breakpoint1_text . ',' . $breakpoint2_text . ',' . $breakpoint3_text . ',' . $breakpoint4_text . ',' . $breakpoint5_text . ',' . $breakpoint6_text . ',' . $breakpoint7_text . '"';
            $responsive_coefficients_button_data = 'data-q_responsive_button_coefficients = "' . $breakpoint1_button . ',' . $breakpoint2_button . ',' . $breakpoint3_button . ',' . $breakpoint4_button . ',' . $breakpoint5_button . ',' . $breakpoint6_button . ',' . $breakpoint7_button . '"';


            $slider_transparency_class = "header_not_transparent";
            if (isset($qode_options['header_background_transparency_initial']) && $qode_options['header_background_transparency_initial'] != "1" && $qode_options['header_background_transparency_initial'] != "") {
                $slider_transparency_class = "";
            }

            if ($background_color != "") {
                $background_color = 'background-color:' . $background_color . ';';
            }

            $auto = "true";
            if ($auto_start != "") {
                $auto = $auto_start;
            }

            if ($auto == "true") {
                $auto_start_class = "q_auto_start";
            } else {
                $auto_start_class = "";
            }

            if ($slide_animation != "") {
                $slide_animation = 'data-slide_animation="' . $slide_animation . '"';
            } else {
                $slide_animation = 'data-slide_animation=""';
            }

            switch ($animation_type) {
                case 'fade':
                    $animation_type_class = 'fade';
                    break;
                case 'slide-vertical-up':
                    $animation_type_class = 'vertical_up';
                    break;
                case 'slide-vertical-down':
                    $animation_type_class = 'vertical_down';
                    break;
                case 'slide-cover':
                    $animation_type_class = 'slide_cover';
                    break;
                default:
                    $animation_type_class = '';
            }

            switch ($navigation_position) {
                case 'bottom_right':
                    $navigation_position_class = 'navigation_bottom_right';
                    break;
                case 'bottom_left':
                    $navigation_position_class = 'navigation_bottom_left';
                    break;
                default:
                    $navigation_position_class = '';
            }

            $content_next_to_arrows_class = '';
            if ($content_next_to_arrows == 'yes' && $navigation_position_class != '') {
                $content_next_to_arrows_class = 'content_next_to_arrows';
            }

            /**************** Count positioning of navigation arrows and preloader depending on header transparency and layout - START ****************/

            global $wp_query;

            $page_id = $wp_query->get_queried_object_id();
            $header_height_padding = 0;

            //this is out of 'if condition' bellow since calculating is needed for slide item top padding - start //
            $arrow_button_height = 50;
            if (isset($qode_options['navigation_button_height']) && $qode_options['navigation_button_height'] != '') {
                $arrow_button_height = esc_attr($qode_options['navigation_button_height']);
            }

            if (!empty($qode_options['header_height'])) {
                $header_height = esc_attr($qode_options['header_height']);
            } else {
                $header_height = 90;
            }
            if ($qode_options['header_bottom_appearance'] == 'stick menu_bottom') {
                $menu_bottom = '46';
                if (is_active_sidebar('header_fixed_right')) {
                    $menu_bottom = $menu_bottom + 22;
                }
            } else {
                $menu_bottom = 0;
            }

            $header_top = 0;
            if (isset($qode_options['header_top_area']) && $qode_options['header_top_area'] == "yes") {
                $header_top = 36;
            }

            $header_top_border = 0;
            $header_bottom_border = 0;
            if (isset($qode_options['enable_header_top_border']) && $qode_options['enable_header_top_border'] == 'yes' && isset($qode_options['header_top_border_width']) && $qode_options['header_top_border_width'] !== '') {
                $header_top_border = esc_attr($qode_options['header_top_border_width']);
            }
            if (isset($qode_options['enable_header_bottom_border']) && $qode_options['enable_header_bottom_border'] == 'yes' && isset($qode_options['header_bottom_border_width']) && $qode_options['header_bottom_border_width'] !== '') {
                $header_bottom_border = esc_attr($qode_options['header_bottom_border_width']);
            }

            $large_menu_item_border = 0;
            if (isset($qode_options['enable_manu_item_border']) && $qode_options['enable_manu_item_border'] == 'yes' && isset($qode_options['menu_item_style']) && $qode_options['menu_item_style'] == 'large_item') {
                if (isset($qode_options['menu_item_border_style']) && $qode_options['menu_item_border_style'] == 'all_borders') {
                    $large_menu_item_border = esc_attr($qode_options['menu_item_border_width']) * 2;
                }
                if (isset($qode_options['menu_item_border_style']) && $qode_options['menu_item_border_style'] == 'top_bottom_borders') {
                    $large_menu_item_border = esc_attr($qode_options['menu_item_border_width']) * 2;
                }
                if (isset($qode_options['menu_item_border_style']) && $qode_options['menu_item_border_style'] == 'bottom_border') {
                    $large_menu_item_border = esc_attr($qode_options['menu_item_border_width']);
                }
            }

            $header_height = $header_height + $header_top_border + $header_bottom_border + $large_menu_item_border;

            if (isset($qode_options['header_bottom_appearance'])) {
                switch ($qode_options['header_bottom_appearance']) {
                    case 'stick':
                        $logo_height = esc_attr($qode_options['logo_height']) / 2;
                        break;
                    case 'stick menu_bottom':
                        $logo_height = esc_attr($qode_options['logo_height']) / 2;
                        break;
                    case 'fixed_hiding':
                        $logo_height = esc_attr($qode_options['logo_height']) / 2;
                        break;
                    default:
                        $logo_height = esc_attr($qode_options['logo_height']);
                        break;
                }
            }
            //this is out of 'if condition' bellow since calculating is needed for slide item top padding - end //

            if ((get_post_meta($page_id, "qode_header_color_transparency_per_page", true) !== "0") && ($qode_options['header_background_transparency_initial'] !== "0") && ((isset($qode_options['paspartu']) && $qode_options['paspartu'] == 'no') || (isset($qode_options['paspartu_on_top']) && $qode_options['paspartu_on_top'] == 'no'))) {

                $header_height_padding = $header_height + $menu_bottom + $header_top;
                if ((isset($qode_options['center_logo_image']) && $qode_options['center_logo_image'] == "yes" && $qode_options['header_bottom_appearance'] !== 'stick menu_bottom' && $qode_options['header_bottom_appearance'] !== 'stick_with_left_right_menu') || $qode_options['header_bottom_appearance'] == "fixed_hiding") {
                    $header_height_padding = $logo_height + 20 + $header_height + $menu_bottom + $header_top; // 20 is top margin of centered logo
                }
            }
            if ($header_height_padding != 0 && get_post_meta($page_id, "qode_enable_content_top_margin", true) != "yes") {
                $navigation_margin_top = 'style="margin-top:' . (($header_height_padding / 2) - $arrow_button_height / 2) . 'px;"'; // 30 is top and bottom margin of centered logo
                $loader_margin_top = 'style="margin-top:' . ($header_height_padding / 2) . 'px;"';
            } else {
                $navigation_margin_top = '';
                $loader_margin_top = '';
            }

            /**************** Count positioning of navigation arrows and preloader depending on header transparency and layout - END ****************/
			
			
			$custom_cursor = "";
			if(isset($qode_options['qs_enable_navigation_custom_cursor']) && ($qode_options['qs_enable_navigation_custom_cursor']=="yes")){
				$custom_cursor = "has_custom_cursor";
			}

            if((isset($qode_options['paspartu']) && $qode_options['paspartu'] == 'yes' && ((isset($qode_options['paspartu_on_top']) && $qode_options['paspartu_on_top'] == 'yes') || (isset($qode_options['paspartu_on_bottom_slider']) && $qode_options['paspartu_on_bottom_slider'] == 'yes'))) || $slider_parallax == "no"){
                $data_parallax_transform = '';
            }else{
                $data_parallax_transform = 'data-start="transform: translateY(0px);" data-1440="transform: translateY(-500px);"';
            }

            $ajax_loader = '';
            if($qode_options['loading_animation'] == "on") {
                if($qode_options['loading_image'] != "") {
                    $ajax_loader = '<div class="ajax_loader" ' . $loader_margin_top . '><div class="ajax_loader_1"><div class="ajax_loader_2"><img src="' . esc_url($qode_options['loading_image']) . '" alt="" /></div></div></div>';
                }else{
                    $ajax_loader = '<div class="ajax_loader" ' . $loader_margin_top . '><div class="ajax_loader_1">' . qode_loading_spinners(true) . '</div></div>';
                }
            }

            $html .= '<div id="qode-' . $slider . '" ' . $anchor_data . ' ' . $responsiveness_data . ' ' . $responsive_coefficients_graphic_data . ' ' . $responsive_coefficients_title_data . ' ' . $responsive_coefficients_subtitle_data . ' ' . $responsive_coefficients_text_data . ' ' . $responsive_coefficients_button_data . ' class="carousel slide ' . $animation_type_class . ' ' . $custom_cursor . ' ' . $full_screen_class . ' ' . $responsive_height_class . ' ' . $height_class . ' ' . $auto_start_class . ' ' . $header_effect_class . ' ' . $slider_thumbs_class . ' ' . $slider_transparency_class . ' ' . $navigation_position_class . ' ' . $content_next_to_arrows_class . '" ' . $slide_animation . ' ' . $data_height . ' ' . $data_parallax_effect . ' style="' . $slide_holder_height . ' ' . $background_color . '"><div class="qode_slider_preloader" style="' . $background_color . '">'.$ajax_loader.'</div>';
            $html .= '<div class="carousel-inner ' . $slider_css_position_class . '" style="' . $carouselinner_height . '" '.$data_parallax_transform.'>';
            query_posts($args);


            $found_slides = $wp_query->post_count;

            if (have_posts()) : $postCount = 0;
                while (have_posts()) : the_post();
                    $active_class = '';
                    if ($postCount == 0) {
                        $active_class = 'active';
                    } else {
                        $active_class = 'inactive';
                    }

                    $slide_type = get_post_meta(get_the_ID(), "qode_slide-background-type", true);

                    $image = esc_url(get_post_meta(get_the_ID(), "qode_slide-image", true));
                    $image_overlay_pattern = esc_url(get_post_meta(get_the_ID(), "qode_slide-overlay-image", true));
                    $thumbnail = esc_url(get_post_meta(get_the_ID(), "qode_slide-thumbnail", true));
                    $thumbnail_attributes = qode_get_attachment_meta_from_url($thumbnail, array('width','height'));
                    $thumbnail_attributes_width = '';
                    $thumbnail_attributes_height = '';
                    if($thumbnail_attributes == true){
                        $thumbnail_attributes_width = $thumbnail_attributes['width'];
                        $thumbnail_attributes_height = $thumbnail_attributes['height'];
                    }
                    $thumbnail_animation = get_post_meta(get_the_ID(), "qode_slide-thumbnail-animation", true);
                    $thumbnail_link = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-thumbnail-link", true) != "") {
                        $thumbnail_link = esc_url(get_post_meta(get_the_ID(), "qode_slide-thumbnail-link", true));
                    }
                    $svg_link = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-svg-link", true) != "") {
                        $svg_link = esc_url(get_post_meta(get_the_ID(), "qode_slide-svg-link", true));
                    }



                    $video_webm = esc_url(get_post_meta(get_the_ID(), "qode_slide-video-webm", true));
                    $video_mp4 = esc_url(get_post_meta(get_the_ID(), "qode_slide-video-mp4", true));
                    $video_ogv = esc_url(get_post_meta(get_the_ID(), "qode_slide-video-ogv", true));
                    $video_image = esc_url(get_post_meta(get_the_ID(), "qode_slide-video-image", true));
                    $video_overlay = get_post_meta(get_the_ID(), "qode_slide-video-overlay", true);
                    $video_overlay_image = esc_url(get_post_meta(get_the_ID(), "qode_slide-video-overlay-image", true));

                    $content_animation = get_post_meta(get_the_ID(), "qode_slide-content-animation", true);
                    $content_animation_direction = get_post_meta(get_the_ID(), "qode_slide-content-animation-direction", true);

                    $slide_content_style = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-content-background-color", true) != "") {
                        $slide_content_style .= "background-color: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-background-color", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-content-text-padding", true) != "") {
                        $slide_content_style .= "padding: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-text-padding", true)) . ";";
                    }

                    $slide_title_style = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-title-color", true) != "") {
                        $slide_title_style .= "color: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-title-color", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-title-font-size", true) != "") {
                        $slide_title_style .= "font-size: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-title-font-size", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-title-line-height", true) != "") {
                        $slide_title_style .= "line-height: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-title-line-height", true)) . "px;";
                    }
                    if ((get_post_meta(get_the_ID(), "qode_slide-title-font-family", true) !== "-1") && (get_post_meta(get_the_ID(), "qode_slide-title-font-family", true) !== "")) {
                        $slide_title_style .= "font-family: '" . str_replace('+', ' ', get_post_meta(get_the_ID(), "qode_slide-title-font-family", true)) . "';";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-title-font-style", true) != "") {
                        $slide_title_style .= "font-style: " . get_post_meta(get_the_ID(), "qode_slide-title-font-style", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-title-font-weight", true) != "") {
                        $slide_title_style .= "font-weight: " . get_post_meta(get_the_ID(), "qode_slide-title-font-weight", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide-title-letter-spacing', true) !== '') {
                        $slide_title_style .= 'letter-spacing: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide-title-letter-spacing', true)) . 'px;';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide-title-text-transform', true) !== '') {
                        $slide_title_style .= 'text-transform: ' . get_post_meta(get_the_ID(), 'qode_slide-title-text-transform', true) . ';';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide-hide-shadow', true) == 'yes') {
                        $slide_title_style .= 'text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_title_margin_bottom', true) != '') {
                        $slide_title_style .= 'margin-bottom: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_title_margin_bottom', true)) . 'px;';
                    }

                    $slide_title_span_style = "";
                    if (get_post_meta(get_the_ID(), 'qode_slide-title-background-color', true) !== '') {
                        $slide_title_bg_color = esc_attr(get_post_meta(get_the_ID(), "qode_slide-title-background-color", true));
                        if (get_post_meta(get_the_ID(), 'qode_slide-title-bg-color-transparency', true) != '') {
                            $slide_title_bg_transparency = esc_attr(get_post_meta(get_the_ID(), "qode_slide-title-bg-color-transparency", true));
                        } else {
                            $slide_title_bg_transparency = 1;
                        }
                        $slide_title_span_style .= 'background-color: ' . esc_attr(qode_rgba_color($slide_title_bg_color, $slide_title_bg_transparency)) . ';';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_title_padding_top', true) != '') {
                        $slide_title_span_style .= 'padding-top: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_title_padding_top', true)) . 'px;';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_title_padding_right', true) != '') {
                        $slide_title_span_style .= 'padding-right: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_title_padding_right', true)) . 'px;';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_title_padding_bottom', true) != '') {
                        $slide_title_span_style .= 'padding-bottom: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_title_padding_bottom', true)) . 'px;';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_title_padding_left', true) != '') {
                        $slide_title_span_style .= 'padding-left: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_title_padding_left', true)) . 'px;';
                    }

                    $border_style = '';
                    if (get_post_meta(get_the_ID(), 'qode_slide_title_border', true) != '' && get_post_meta(get_the_ID(), 'qode_slide_title_border', true) == 'yes') {

                        if (get_post_meta(get_the_ID(), 'qode_slide_title_border_thickness', true) != '') {
                            $border_style .= 'border-width: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_title_border_thickness', true)) . 'px;';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide_title_border_style', true) != '') {
                            $border_style .= 'border-style: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_title_border_style', true)) . ';';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slider_title_border_color', true) != '') {
                            $border_style .= 'border-color: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slider_title_border_color', true)) . ';';
                        }
                        $slide_title_span_style .= $border_style;

                    }



                    //is separator after title option selected for current slide?
                    if (get_post_meta(get_the_ID(), "qode_slide-separator-title", true) == 'yes') {

                        //init variables
                        $slide_separator_styles = '';
                        $slide_top_separator_styles = '';
                        $slide_bottom_separator_styles = '';

                        $slide_separator_position = "both";
                        $slide_separator_type_var = 'without_icon';
                        if (get_post_meta(get_the_ID(), "qode_slide_title_separator_type", true) !== "") {
                            $slide_separator_type_var = get_post_meta(get_the_ID(), "qode_slide_title_separator_type", true);
                        }
                        if ($slide_separator_type_var == "without_icon") {

                            if (get_post_meta(get_the_ID(), "qode_slide-title-separator-position", true) != "") {
                                $slide_separator_position = get_post_meta(get_the_ID(), "qode_slide-title-separator-position", true);
                            }

                            $slide_separator_color = '';
                            if (get_post_meta(get_the_ID(), 'qode_slide-separator-color', true) !== '') {
                                $slide_separator_color = esc_attr(get_post_meta(get_the_ID(), "qode_slide-separator-color", true));
                            }
                            $slide_separator_transparency = '';
                            if (get_post_meta(get_the_ID(), 'qode_slide-separator-transparency', true) !== '') {
                                $slide_separator_transparency = esc_attr(get_post_meta(get_the_ID(), "qode_slide-separator-transparency", true));
                            }

                            //is separator color chosen?
                            if ($slide_separator_color !== '') {
                                //is separator transparenct set?
                                if ($slide_separator_transparency !== '') {
                                    //get rgba color value
                                    $slide_separator_rgba_color = qode_rgba_color($slide_separator_color, $slide_separator_transparency);

                                    //set color style
                                    $slide_separator_styles .= 'background-color: ' . $slide_separator_rgba_color . ';';
                                } else {
                                    //set color without transparency
                                    $slide_separator_styles .= 'background-color: ' . $slide_separator_color . ';';
                                }
                            }

                            //is separator width set?
                            if (get_post_meta(get_the_ID(), 'qode_slide-separator-width', true) != '') {
                                $slide_separator_styles .= 'width: ' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-separator-width", true)) . '%;';
                            }

                            //is separator width set?
                            if (get_post_meta(get_the_ID(), 'qode_slide-separator-thickness', true) != '') {
                                $slide_separator_styles .= 'height: ' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-separator-thickness", true)) . 'px;';
                            }

                            //separator align
                            if (get_post_meta(get_the_ID(), "qode_slide-title-separator-align", true) != "") {
                                $slide_separator_styles .= 'float:' . get_post_meta(get_the_ID(), "qode_slide-title-separator-align", true) . ';';
                            }

                            // top separator
                            if (get_post_meta(get_the_ID(), "qode_slide-title-separator-position", true) != "bottom") {

                                if (get_post_meta(get_the_ID(), 'qode_slide-top-separator-margin-top', true) !== '') {
                                    $slide_top_separator_styles .= 'margin-top:' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-top-separator-margin-top", true)) . 'px;';
                                }
                                if (get_post_meta(get_the_ID(), 'qode_slide-top-separator-margin-bottom', true) !== '') {
                                    $slide_top_separator_styles .= 'margin-bottom:' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-top-separator-margin-bottom", true)) . 'px;';
                                }
                            }

                            // bottom separator
                            if (get_post_meta(get_the_ID(), "qode_slide-title-separator-position", true) != "top") {

                                if (get_post_meta(get_the_ID(), 'qode_slide-bottom-separator-margin-top', true) !== '') {
                                    $slide_bottom_separator_styles .= 'margin-top:' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-bottom-separator-margin-top", true)) . 'px;';
                                }
                                if (get_post_meta(get_the_ID(), 'qode_slide-bottom-separator-margin-bottom', true) !== '') {
                                    $slide_bottom_separator_styles .= 'margin-bottom:' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-bottom-separator-margin-bottom", true)) . 'px;';
                                }
                            }

                        }

                        $slide_separator_with_icon_params_array = array();
                        if (get_post_meta(get_the_ID(), "qode_slide_title_separator_type", true) == "with_icon") {

                            $slide_separator_position = "top";

                            $slide_separator_with_icon_params_array[] = "type='with_icon'";

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_pack", true) != ''){
                                $slide_separator_icon = get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_pack", true);

                                $slide_separator_with_icon_params_array[] = "icon_pack='".$slide_separator_icon."'";

                                $slide_separator_icon_param = $qodeIconCollections->getIconCollection($slide_separator_icon);

                                $icon_param = $slide_separator_icon_param->param;

                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_".$icon_param, true) !== ''){
                                $slide_separator_with_icon_params_array[] = $icon_param."='".esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_".$icon_param, true))."'";
                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_line_style", true) !== ''){
                                $slide_separator_with_icon_params_array[] = "border_style='". esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_line_style", true))."'";
                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_width", true) !== ''){
                                $slide_separator_with_icon_params_array[] = "width='". esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_width", true))."'";
                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_margin_top", true) !== ''){
                                $slide_separator_with_icon_params_array[] = "up='". esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_margin_top", true))."'";
                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_margin_bottom", true) !== ''){
                                $slide_separator_with_icon_params_array[] = "down='". esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_margin_bottom", true))."'";
                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_thickness", true) !== ''){
                                $slide_separator_with_icon_params_array[] = "thickness='". esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_thickness", true))."'";
                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_color", true) !== ''){
                                $slide_separator_with_icon_params_array[] = "color='". esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_separator_color", true))."'";
                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_type", true) !== ''){
                                $slide_separator_with_icon_params_array[] = "icon_type='". esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_type", true))."'";
                            }

                            if (get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_postition", true) !== ''){
                                $slide_separator_with_icon_params_array[] = "separator_icon_position='". esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_postition", true))."'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_custom_size', true) != '') {
                                $slide_separator_with_icon_params_array[] = "icon_custom_size='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_custom_size", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_shape_size', true) != '') {
                                $slide_separator_with_icon_params_array[] = "icon_shape_size='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_shape_size", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_margin', true) != '') {
                                $slide_separator_with_icon_params_array[] = "icon_margin='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_margin", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_border_radius', true) != '') {
                                $slide_separator_with_icon_params_array[] = "icon_border_radius='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_border_radius", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_color', true) != '') {
                                $slide_separator_with_icon_params_array[] = "icon_color='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_color", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_border_color', true) != '') {
                                $slide_separator_with_icon_params_array[] = "icon_border_color='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_border_color", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_border_width', true) != '') {
                                $slide_separator_with_icon_params_array[] = "icon_border_width='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_border_width", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_background_color', true) != '') {
                                $slide_separator_with_icon_params_array[] = "icon_background_color='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_background_color", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_hover_color', true) != '') {
                                $slide_separator_with_icon_params_array[] = "hover_icon_color='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_hover_color", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_hover_border_color', true) != '') {
                                $slide_separator_with_icon_params_array[] = "hover_icon_border_color='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_hover_border_color", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_icon_hover_background_color', true) != '') {
                                $slide_separator_with_icon_params_array[] = "hover_icon_background_color='" . esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_icon_hover_background_color", true)) . "'";
                            }

                            if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_with_icon_position', true) != '') {
                                $slide_separator_position = esc_attr(get_post_meta(get_the_ID(), "qode_slide_title_separator_with_icon_position", true));
                            }

                        }
                    }

                    $slide_subtitle_style = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-subtitle-color", true) != "") {
                        $slide_subtitle_style .= "color: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-subtitle-color", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-subtitle-font-size", true) != "") {
                        $slide_subtitle_style .= "font-size: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-subtitle-font-size", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-subtitle-line-height", true) != "") {
                        $slide_subtitle_style .= "line-height: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-subtitle-line-height", true)) . "px;";
                    }
                    if ((get_post_meta(get_the_ID(), "qode_slide-subtitle-font-family", true) !== "-1") && (get_post_meta(get_the_ID(), "qode_slide-subtitle-font-family", true) !== "")) {
                        $slide_subtitle_style .= "font-family: '" . str_replace('+', ' ', get_post_meta(get_the_ID(), "qode_slide-subtitle-font-family", true)) . "';";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-subtitle-font-style", true) != "") {
                        $slide_subtitle_style .= "font-style: " . get_post_meta(get_the_ID(), "qode_slide-subtitle-font-style", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-subtitle-font-weight", true) != "") {
                        $slide_subtitle_style .= "font-weight: " . get_post_meta(get_the_ID(), "qode_slide-subtitle-font-weight", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide-subtitle-letter-spacing', true) !== '') {
                        $slide_subtitle_style .= 'letter-spacing: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide-subtitle-letter-spacing', true)) . 'px;';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide-subtitle-text-transform', true) !== '') {
                        $slide_subtitle_style .= 'text-transform: ' . get_post_meta(get_the_ID(), 'qode_slide-subtitle-text-transform', true) . ';';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide-hide-shadow', true) == 'yes') {
                        $slide_subtitle_style .= 'text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_subtitle_margin_bottom', true) != '') {
                        $slide_subtitle_style .= 'margin-bottom: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_subtitle_margin_bottom', true)) . 'px;';
                    }

                    $slide_subtitle_span_style = "";
                    if (get_post_meta(get_the_ID(), 'qode_slide-subtitle-background-color', true) !== '') {
                        $slide_subtitle_bg_color = esc_attr(get_post_meta(get_the_ID(), "qode_slide-subtitle-background-color", true));
                        if (get_post_meta(get_the_ID(), 'qode_slide-subtitle-bg-color-transparency', true) != '') {
                            $slide_subtitle_bg_transparency = esc_attr(get_post_meta(get_the_ID(), "qode_slide-subtitle-bg-color-transparency", true));
                        } else {
                            $slide_subtitle_bg_transparency = 1;
                        }
                        $slide_subtitle_span_style .= 'background-color: ' . qode_rgba_color($slide_subtitle_bg_color, $slide_subtitle_bg_transparency) . ';';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_top', true) != '') {
                        $slide_subtitle_span_style .= 'padding-top: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_top', true)) . 'px;';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_right', true) != '') {
                        $slide_subtitle_span_style .= 'padding-right: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_right', true)) . 'px;';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_bottom', true) != '') {
                        $slide_subtitle_span_style .= 'padding-bottom: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_bottom', true)) . 'px;';
                    }
                    if (get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_left', true) != '') {
                        $slide_subtitle_span_style .= 'padding-left: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_subtitle_padding_left', true)) . 'px;';
                    }

                    $slide_text_style = "";
                    $slide_text_span_style = "";
                    $slide_text_separator_var = 'no';
                    if (get_post_meta(get_the_ID(), "text_separator_text", true) !=='') {
                        $slide_text_separator_var = get_post_meta(get_the_ID(), "text_separator_text", true);
                    }

                    if ($slide_text_separator_var == "no") {
                        if (get_post_meta(get_the_ID(), "qode_slide-text-color", true) != "") {
                            $slide_text_style .= "color: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-color", true)) . ";";
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-text-font-size", true) != "") {
                            $slide_text_style .= "font-size: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-font-size", true)) . "px;";
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-text-line-height", true) != "") {
                            $slide_text_style .= "line-height: " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-line-height", true)) . "px;";
                        }
                        if ((get_post_meta(get_the_ID(), "qode_slide-text-font-family", true) !== "-1") && (get_post_meta(get_the_ID(), "qode_slide-text-font-family", true) !== "")) {
                            $slide_text_style .= "font-family: '" . str_replace('+', ' ', get_post_meta(get_the_ID(), "qode_slide-text-font-family", true)) . "';";
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-text-font-style", true) != "") {
                            $slide_text_style .= "font-style: " . get_post_meta(get_the_ID(), "qode_slide-text-font-style", true) . ";";
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-text-font-weight", true) != "") {
                            $slide_text_style .= "font-weight: " . get_post_meta(get_the_ID(), "qode_slide-text-font-weight", true) . ";";
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide-text-letter-spacing', true) !== '') {
                            $slide_text_style .= 'letter-spacing: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide-text-letter-spacing', true)) . 'px;';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide-text-text-transform', true) !== '') {
                            $slide_text_style .= 'text-transform: ' . get_post_meta(get_the_ID(), 'qode_slide-text-text-transform', true) . ';';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide-hide-shadow', true) == 'yes') {
                            $slide_text_style .= 'text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide-text-background-color', true) !== '') {
                            $slide_text_bg_color = esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-background-color", true));
                            if (get_post_meta(get_the_ID(), 'qode_slide-text-bg-color-transparency', true) != '') {
                                $slide_text_bg_transparency = esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-bg-color-transparency", true));
                            } else {
                                $slide_text_bg_transparency = 1;
                            }
                            $slide_text_span_style .= 'background-color: ' . qode_rgba_color($slide_text_bg_color, $slide_text_bg_transparency) . ';';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide_text_padding_top', true) != '') {
                            $slide_text_span_style .= 'padding-top: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_text_padding_top', true)) . 'px;';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide_text_padding_right', true) != '') {
                            $slide_text_span_style .= 'padding-right: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_text_padding_right', true)) . 'px;';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide_text_padding_bottom', true) != '') {
                            $slide_text_span_style .= 'padding-bottom: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_text_padding_bottom', true)) . 'px;';
                        }
                        if (get_post_meta(get_the_ID(), 'qode_slide_text_padding_left', true) != '') {
                            $slide_text_span_style .= 'padding-left: ' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide_text_padding_left', true)) . 'px;';
                        }
                    }


                    $slide_text_with_separator_array = array();
                    if ($slide_text_separator_var == 'yes') {

                        if (get_post_meta(get_the_ID(), 'qode_slide-text', true) != '') {
                            $slide_text_with_separator_array[] = 'title="' . esc_attr(get_post_meta(get_the_ID(), 'qode_slide-text', true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-text-color", true) != "") {
                            $slide_text_with_separator_array[] = 'title_color="' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-color", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-text-color", true) != "") {
                            $slide_text_with_separator_array[] = 'title_size="' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-font-size", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-text-color", true) != "") {
                            $slide_text_with_separator_array[] = 'box_height="' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-line-height", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_text_in_box", true) != "") {
                            $slide_text_with_separator_array[] = 'text_in_box="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_text_in_box", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_box_border_style", true) != "") {
                            $slide_text_with_separator_array[] = 'box_border_style="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_box_border_style", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_line_border_style", true) != "") {
                            $slide_text_with_separator_array[] = 'line_border_style="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_line_border_style", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_linedots", true) != "") {
                            $slide_text_with_separator_array[] = 'line_dots="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_linedots", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_line_width", true) != "") {
                            $slide_text_with_separator_array[] = 'line_width="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_line_width", true)) . '"';
                        }

                        $line_thickness = '3';
                        if (get_post_meta(get_the_ID(), "qode_separator_line_thickness", true) != "") {
                             $line_thickness = esc_attr(get_post_meta(get_the_ID(), "qode_separator_line_thickness", true));
                        }
                        $slide_text_with_separator_array[] = 'line_thickness="' . $line_thickness . '"';

                        if (get_post_meta(get_the_ID(), "qode_separator_line_dots_size", true) != "") {
                            $slide_text_with_separator_array[] = 'line_dots_size="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_line_dots_size", true)) . '"';
                        }

                        $line_color = '#fff';
                        if (get_post_meta(get_the_ID(), "qode_separator_line_color", true) != "") {
                            $line_color = esc_attr(get_post_meta(get_the_ID(), "qode_separator_line_color", true));
                        }
                        $slide_text_with_separator_array[] = 'line_color="' . $line_color . '"';

                        if (get_post_meta(get_the_ID(), "qode_separator_dots_color", true) != "") {
                            $slide_text_with_separator_array[] = 'line_dots_color="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_dots_color", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_text_position", true) != "") {
                            $slide_text_with_separator_array[] = 'text_position="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_text_position", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_text_leftright_padding", true) != "") {
                            $slide_text_with_separator_array[] = 'box_padding="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_text_leftright_padding", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_text_top_margin", true) != "") {
                            $slide_text_with_separator_array[] = 'up="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_text_top_margin", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_text_bottom_margin", true) != "") {
                            $slide_text_with_separator_array[] = 'down="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_text_bottom_margin", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_box_margin", true) != "") {
                            $slide_text_with_separator_array[] = 'box_margin="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_box_margin", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-text-background-color", true) != "") {
                            $slide_text_with_separator_array[] = 'box_background_color="' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-background-color", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_box_border_width", true) != "") {
                            $slide_text_with_separator_array[] = 'box_border_width="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_box_border_width", true)) . '"';
                        } else {
                            $slide_text_with_separator_array[] = 'box_border_width="' . $line_thickness . '"';
                        }

                        if (get_post_meta(get_the_ID(), "qode_separator_box_border_radius", true) != "") {
                            $slide_text_with_separator_array[] = 'box_border_radius="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_box_border_radius", true)) . '"';
                        }
                        if (get_post_meta(get_the_ID(), "qode_separator_box_border_color", true) != "") {
                            $slide_text_with_separator_array[] = 'box_border_color="' . esc_attr(get_post_meta(get_the_ID(), "qode_separator_box_border_color", true)) . '"';
                        } else {
                            $slide_text_with_separator_array[] = 'box_border_color="' . $line_color . '"';
                        }

                    }



                    $graphic_alignment = get_post_meta(get_the_ID(), "qode_slide-graphic-alignment", true);
                    $content_alignment = get_post_meta(get_the_ID(), "qode_slide-content-alignment", true);

                    $separate_text_graphic = get_post_meta(get_the_ID(), "qode_slide-separate-text-graphic", true);

                    $content_full_width_class = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-content-full-width", true) == "yes") {
                        $content_full_width_class = "slide_full_width";
                    }

                    if (get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle-type", true) == 'window_top') {
                        $slide_item_padding_value = 0;
                    } else {
                        $slide_item_padding_value = $header_height + $menu_bottom + $header_top;
                        if ((isset($qode_options['center_logo_image']) && $qode_options['center_logo_image'] == "yes" && $qode_options['header_bottom_appearance'] !== 'stick menu_bottom' && $qode_options['header_bottom_appearance'] !== 'stick_with_left_right_menu') || $qode_options['header_bottom_appearance'] == "fixed_hiding") {
                            $slide_item_padding_value = $logo_height + 20 + $header_height + $menu_bottom + $header_top; // 20 is top margin of centered logo
                        }
                    }

                    $content_vertical_middle_position_class = "";
                    $slide_item_padding = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-content-vertical-middle", true) == "yes") {
                        $content_vertical_middle_position_class = "content_vertical_middle";
                        $slide_item_padding = "padding-top: " . $slide_item_padding_value . "px;";
                        $content_width = "";
                        $content_xaxis = "";
                        $content_yaxis_start = "";
                        $content_yaxis_end = "";
                        $graphic_width = "";
                        $graphic_xaxis = "";
                        $graphic_yaxis_start = "";
                        $graphic_yaxis_end = "";
                    } else {
                        if (get_post_meta(get_the_ID(), "qode_slide-content-width", true) != "") {
                            $content_width = "width:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-width", true)) . "%;";
                        } else {
                            $content_width = "width:80%;";
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-content-left", true) != "") {
                            $content_xaxis = "left:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-left", true)) . "%;";
                        } else {
                            if (get_post_meta(get_the_ID(), "qode_slide-content-right", true) != "") {
                                $content_xaxis = "right:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-right", true)) . "%;";
                            } else {
                                $content_xaxis = "left: 10%;";
                            }
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-content-top", true) != "") {
                            $content_yaxis_start = "top:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-top", true)) . "%;";
                            $content_yaxis_end = "top:" . (esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-top", true)) - 10) . "%;";
                        } else {
                            if (get_post_meta(get_the_ID(), "qode_slide-content-bottom", true) != "") {
                                $content_yaxis_start = "bottom:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-bottom", true)) . "%;";
                                $content_yaxis_end = "bottom:" . (esc_attr(get_post_meta(get_the_ID(), "qode_slide-content-bottom", true)) + 10) . "%;";
                            } else {
                                $content_yaxis_start = "top: 35%;";
                                $content_yaxis_end = "top: 10%;";
                            }
                        }

                        if (get_post_meta(get_the_ID(), "qode_slide-graphic-width", true) != "") {
                            $graphic_width = "width:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-graphic-width", true)) . "%;";
                        } else {
                            $graphic_width = "width:50%;";
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-graphic-left", true) != "") {
                            $graphic_xaxis = "left:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-graphic-left", true)) . "%;";
                        } else {
                            if (get_post_meta(get_the_ID(), "qode_slide-graphic-right", true) != "") {
                                $graphic_xaxis = "right:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-graphic-right", true)) . "%;";
                            } else {
                                $graphic_xaxis = "left: 25%;";
                            }
                        }
                        if (get_post_meta(get_the_ID(), "qode_slide-graphic-top", true) != "") {
                            $graphic_yaxis_start = "top:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-graphic-top", true)) . "%;";
                            $graphic_yaxis_end = "top:" . (esc_attr(get_post_meta(get_the_ID(), "qode_slide-graphic-top", true)) - 10) . "%;";
                        } else {
                            if (get_post_meta(get_the_ID(), "qode_slide-graphic-bottom", true) != "") {
                                $graphic_yaxis_start = "bottom:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-graphic-bottom", true)) . "%;";
                                $graphic_yaxis_end = "bottom:" . (esc_attr(get_post_meta(get_the_ID(), "qode_slide-graphic-bottom", true)) + 10) . "%;";
                            } else {
                                $graphic_yaxis_start = "top: 30%;";
                                $graphic_yaxis_end = "top: 10%;";
                            }
                        }
                    }

                    //General Animation Start
                    $slide_data_start = '';
                    $slide_data_end = '';
                    $slide_title_data = '';
                    $slide_subtitle_data = '';
                    $slide_graphics_data = '';
                    $slide_text_data = '';
                    $slide_button_1_data = '';
                    $slide_button_2_data = '';
                    $slide_separator_top_data = '';
                    $slide_separator_bottom_data = '';
                    $slide_svg_data = '';


                        $qode_slide_general_animation_var = "yes";
                        if (get_post_meta(get_the_ID(), "qode_slide_general_animation", true) === "no") {
                            $qode_slide_general_animation_var = "no";
                        }

                        if ($qode_slide_general_animation_var === "yes") {

                            //Default values for data start and data end animation
                            $qode_slide_data_start = '0';
                            $qode_slide_data_end = '300';
                            $qode_slide_data_start_custom_style = ' opacity: 1;';
                            $qode_slide_data_end_custom_style = ' opacity: 0;';


                            if (get_post_meta(get_the_ID(), "qode_slide_data_start", true) != "") {
                                $qode_slide_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_start_custom_style", true) != "") {
                                $qode_slide_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_end", true) != "") {
                                $qode_slide_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_end_custom_style", true) != "") {
                                $qode_slide_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_end_custom_style", true));
                            }

                            $slide_data_start = ' data-' . $qode_slide_data_start . '="' . $qode_slide_data_start_custom_style . ' ' . $content_width . ' ' . $content_xaxis . ' ' . $content_yaxis_start . '"';
                            $slide_data_end = ' data-' . $qode_slide_data_end . '="' . $qode_slide_data_end_custom_style . ' ' . $content_xaxis . ' ' . $content_yaxis_end . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_title_animation_scroll", true) == "yes") {

                            //Title options
                            $slide_title_data_start = '0';
                            $slide_title_data_start_custom_style = ' opacity: 1;';
                            $slide_title_data_end = '300';
                            $slide_title_data_end_custom_style = ' opacity:0;';

                            if (get_post_meta(get_the_ID(), "qode_slide_data_title_start", true) != "") {
                                $slide_title_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_title_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_title_start_custom_style", true) != "") {
                                $slide_title_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_title_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_title_end", true) != "") {
                                $slide_title_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_title_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_title_end_custom_style", true) != "") {
                                $slide_title_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_title_end_custom_style", true));
                            }

                            $slide_title_data = 'data-' . $slide_title_data_start . '="' . $slide_title_data_start_custom_style . '" data-' . $slide_title_data_end . '="' . $slide_title_data_end_custom_style . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_subtitle_animation_scroll", true) == "yes") {

                            //Subtitle options
                            $slide_subtitle_data_start = '0';
                            $slide_subtitle_data_start_custom_style = ' opacity: 1;';
                            $slide_subtitle_data_end = '300';
                            $slide_subtitle_data_end_custom_style = ' opacity:0;';


                            if (get_post_meta(get_the_ID(), "qode_slide_data_subtitle_start", true) != "") {
                                $slide_subtitle_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_subtitle_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_subtitle_start_custom_style", true) != "") {
                                $slide_subtitle_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_subtitle_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_subtitle_end", true) != "") {
                                $slide_subtitle_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_subtitle_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_subtitle_end_custom_style", true) != "") {
                                $slide_subtitle_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_subtitle_end_custom_style", true));
                            }

                            $slide_subtitle_data = 'data-' . $slide_subtitle_data_start . '="' . $slide_subtitle_data_start_custom_style . '" data-' . $slide_subtitle_data_end . '="' . $slide_subtitle_data_end_custom_style . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_graphic_animation_scroll", true) == "yes") {

                            //Graphics options
                            $slide_graphics_data_start = '0';
                            $slide_graphics_data_start_custom_style = ' opacity: 1;';
                            $slide_graphics_data_end = '300';
                            $slide_graphics_data_end_custom_style = ' opacity: 0;';

                            if (get_post_meta(get_the_ID(), "qode_slide_data_graphics_start", true) != "") {
                                $slide_graphics_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_graphics_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_graphics_start_custom_style", true) != "") {
                                $slide_graphics_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_graphics_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_graphics_end", true) != "") {
                                $slide_graphics_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_graphics_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_graphics_end_custom_style", true) != "") {
                                $slide_graphics_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_graphics_end_custom_style", true));
                            }

                            $slide_graphics_data = 'data-' . $slide_graphics_data_start . '="' . $slide_graphics_data_start_custom_style . '" data-' . $slide_graphics_data_end . '="' . $slide_graphics_data_end_custom_style . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_text_animation_scroll", true) == "yes") {

                            //Text options
                            $slide_text_data_start = '0';
                            $slide_text_data_start_custom_style = ' opacity: 1;';
                            $slide_text_data_end = '300';
                            $slide_text_data_end_custom_style = ' opacity: 0;';

                            if (get_post_meta(get_the_ID(), "qode_slide_data_text_start", true) != "") {
                                $slide_text_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_text_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_text_start_custom_style", true) != "") {
                                $slide_text_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_text_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_text_end", true) != "") {
                                $slide_text_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_text_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_text_end_custom_style", true) != "") {
                                $slide_text_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_text_end_custom_style", true));
                            }

                            $slide_text_data = 'data-' . $slide_text_data_start . '="' . $slide_text_data_start_custom_style . '" data-' . $slide_text_data_end . '="' . $slide_text_data_end_custom_style . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_button1_animation_scroll", true) == "yes") {

                            //Button 1 options
                            $slide_button_1_data_start = '0';
                            $slide_button_1_data_start_custom_style = ' opacity: 1;';
                            $slide_button_1_data_end = '300';
                            $slide_button_1_data_end_custom_style = ' opacity: 0;';

                            if (get_post_meta(get_the_ID(), "qode_slide_data_button_1_start", true) != "") {
                                $slide_button_1_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_1_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_button_1_start_custom_style", true) != "") {
                                $slide_button_1_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_1_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_button_1_end", true) != "") {
                                $slide_button_1_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_1_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_button_1_end_custom_style", true) != "") {
                                $slide_button_1_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_1_end_custom_style", true));
                            }

                            $slide_button_1_data = 'data-' . $slide_button_1_data_start . '="' . $slide_button_1_data_start_custom_style . '" data-' . $slide_button_1_data_end . '="' . $slide_button_1_data_end_custom_style . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_button2_animation_scroll", true) == "yes") {

                            //Button 2 options
                            $slide_button_2_data_start = '0';
                            $slide_button_2_data_start_custom_style = ' opacity: 1;';
                            $slide_button_2_data_end = '300';
                            $slide_button_2_data_end_custom_style = ' opacity: 0;';

                            if (get_post_meta(get_the_ID(), "qode_slide_data_button_2_start", true) != "") {
                                $slide_button_2_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_2_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_button_2_start_custom_style", true) != "") {
                                $slide_button_2_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_2_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_button_2_end", true) != "") {
                                $slide_button_2_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_2_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_button_2_end_custom_style", true) != "") {
                                $slide_button_2_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_button_2_end_custom_style", true));
                            }

                            $slide_button_2_data = 'data-' . $slide_button_2_data_start . '="' . $slide_button_2_data_start_custom_style . '" data-' . $slide_button_2_data_end . '="' . $slide_button_2_data_end_custom_style . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_separator_top_animation_scroll", true) == "yes") {

                            //Separator top options
                            $slide_separator_top_data_start = '0';
                            $slide_separator_top_data_start_custom_style = ' opacity: 1;';
                            $slide_separator_top_data_end = '300';
                            $slide_separator_top_data_end_custom_style = ' opacity: 0;';

                            if (get_post_meta(get_the_ID(), "qode_slide_data_separator_top_start", true) != "") {
                                $slide_separator_top_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_top_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_separator_top_start_custom_style", true) != "") {
                                $slide_separator_top_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_top_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_separator_top_end", true) != "") {
                                $slide_separator_top_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_top_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_separator_top_end_custom_style", true) != "") {
                                $slide_separator_top_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_top_end_custom_style", true));
                            }

                            $slide_separator_top_data = 'data-' . $slide_separator_top_data_start . '="' . $slide_separator_top_data_start_custom_style . '" data-' . $slide_separator_top_data_end . '="' . $slide_separator_top_data_end_custom_style . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_separator_bottom_animation_scroll", true) == "yes") {

                            //Separator bottom options
                            $slide_separator_bottom_data_start = '0';
                            $slide_separator_bottom_data_start_custom_style = ' opacity: 1;';
                            $slide_separator_bottom_data_end = '300';
                            $slide_separator_bottom_data_end_custom_style = ' opacity: 0;';

                            if (get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_start", true) != "") {
                                $slide_separator_bottom_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_start_custom_style", true) != "") {
                                $slide_separator_bottom_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_end", true) != "") {
                                $slide_separator_bottom_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_end_custom_style", true) != "") {
                                $slide_separator_bottom_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_separator_bottom_end_custom_style", true));
                            }

                            $slide_separator_bottom_data = 'data-' . $slide_separator_bottom_data_start . '="' . $slide_separator_bottom_data_start_custom_style . '" data-' . $slide_separator_bottom_data_end . '="' . $slide_separator_bottom_data_end_custom_style . '"';

                        }

                        if (get_post_meta(get_the_ID(), "qode_slide_svg_animation_scroll", true) == "yes") {

                            //SVG options
                            $slide_svg_data_start = '0';
                            $slide_svg_data_start_custom_style = ' opacity: 1;';
                            $slide_svg_data_end = '300';
                            $slide_svg_data_end_custom_style = ' opacity: 0;';

                            if (get_post_meta(get_the_ID(), "qode_slide_data_svg_start", true) != "") {
                                $slide_svg_data_start = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_svg_start", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_svg_start_custom_style", true) != "") {
                                $slide_svg_data_start_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_svg_start_custom_style", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_svg_end", true) != "") {
                                $slide_svg_data_end = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_svg_end", true));
                            }
                            if (get_post_meta(get_the_ID(), "qode_slide_data_svg_end_custom_style", true) != "") {
                                $slide_svg_data_end_custom_style = esc_attr(get_post_meta(get_the_ID(), "qode_slide_data_svg_end_custom_style", true));
                            }

                            $slide_svg_data = 'data-' . $slide_svg_data_start . '="' . $slide_svg_data_start_custom_style . '" data-' . $slide_svg_data_end . '="' . $slide_svg_data_end_custom_style . '"';

                        }



                    //SVG
                    $svg = '';
                    $svg_frame_rate = '';
                    if (get_post_meta(get_the_ID(), "qode_slide_svg_source", true) != "") {
                        $svg = get_post_meta(get_the_ID(), "qode_slide_svg_source", true);
                    }
                    $svg_drawing = "no";
                    if (get_post_meta(get_the_ID(), "qode_slide_svg_drawing", true) == "yes") {
                        $svg_drawing = get_post_meta(get_the_ID(), "qode_slide_svg_drawing", true);

                        $svg_frame_rate = '100';
                        if (get_post_meta(get_the_ID(), "qode_slide_svg_frame_rate", true) !== "") {
                            $svg_frame_rate = esc_attr(get_post_meta(get_the_ID(), "qode_slide_svg_frame_rate", true));
                        }
                    }


                    $header_style = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-header-style", true) != "") {
                        $header_style = get_post_meta(get_the_ID(), "qode_slide-header-style", true);
                    }

                    $thumbnail_class = "";
                    if ($thumbnail !== "") {
                        $thumbnail_class = "has_thumbnail";
                    }

                    $title = get_the_title();

                    $html .= '<div class="item ' . $header_style . ' ' . $thumbnail_class . ' ' . $content_vertical_middle_position_class . ' ' . $content_full_width_class . '" style="' . $slide_height . ' ' . $slide_item_padding . '">';
                    if ($slide_type == 'video') {

                        $html .= '<div class="video"><div class="mobile-video-image" style="background-image: url(' . $video_image . ')"></div><div class="video-overlay';
                        if ($video_overlay == "yes") {
                            $html .= ' active';
                        }
                        $html .= '"';
                        if ($video_overlay_image != "") {
                            $html .= ' style="background-image:url(' . $video_overlay_image . ');"';
                        }
                        $html .= '>';
                        if ($video_overlay_image != "") {
                            $html .= '<img src="' . $video_overlay_image . '" alt="" />';
                        } else {
                            $html .= '<img src="' . get_template_directory_uri() . '/css/img/pixel-video.png" alt="" />';
                        }
                        $html .= '</div><div class="video-wrap">

									<video class="video" width="1920" height="800" poster="' . $video_image . '" controls="controls" preload="auto" loop autoplay muted>';
                        if (!empty($video_webm)) {
                            $html .= '<source type="video/webm" src="' . $video_webm . '">';
                        }
                        if (!empty($video_mp4)) {
                            $html .= '<source type="video/mp4" src="' . $video_mp4 . '">';
                        }
                        if (!empty($video_ogv)) {
                            $html .= '<source type="video/ogg" src="' . $video_ogv . '">';
                        }
                        $html .='<object width="320" height="240" type="application/x-shockwave-flash" data="' . get_template_directory_uri() . '/js/flashmediaelement.swf">
													<param name="movie" value="' . get_template_directory_uri() . '/js/flashmediaelement.swf" />
													<param name="flashvars" value="controls=true&amp;file=' . $video_mp4 . '" />
													<img src="' . $video_image . '" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
											</object>
									</video>
							</div></div>';
                    } else {
                        $html .= '<div class="image" style="background-image:url(' . $image . ');">';
                        if ($slider_thumbs == 'no') {
                            $html .= '<img src="' . $image . '" alt="' . $title . '">';
                        }

                        if ($image_overlay_pattern !== "") {
                            $html .= '<div class="image_pattern" style="background: url(' . $image_overlay_pattern . ') repeat 0 0;"></div>';
                        }
                        $html .= '</div>';
                    }

                    $html_thumb = "";
                    if ($thumbnail != "") {
                        $html_thumb .= '<div '.$slide_graphics_data.'>';
                        $html_thumb .= '<div class="thumb ' . $thumbnail_animation . '">';
                        if ($thumbnail_link != "") {
                            $html_thumb .= '<a href="' . $thumbnail_link . '" target="_self">';
                        }

                        $html_thumb .= '<img data-width="'.$thumbnail_attributes_width.'" data-height="'.$thumbnail_attributes_height.'" src="' . $thumbnail . '" alt="' . $title . '">';

                        if ($thumbnail_link != "") {
                            $html_thumb .= '</a>';
                        }
                        $html_thumb .= '</div></div>';
                    }

                    //SVG
                    if ( $svg != "" ) {
                        $html_thumb .= '<div '.$slide_svg_data.'>';
                        $html_thumb .= '<div class="qode_slide-svg-holder" data-svg-drawing="'.$svg_drawing.'" data-svg-frames="'.$svg_frame_rate.'">';

                        if ($svg_link != "") {
                            $html_thumb .= '<a href="' . $svg_link . '" target="_self">';
                        }

                        $html_thumb .= $svg;

                        if ($svg_link != "") {
                            $html_thumb .= '</a>';
                        }

                        $html_thumb .= '</div></div>';
                    }

                    $html_text = "";
                    $html_text .= '<div class="text ' . $content_animation . ' ' . $content_animation_direction . '" style="' . $slide_content_style . '">';

                    if (get_post_meta(get_the_ID(), "qode_slide-subtitle", true) != "") {
                        $html_text .= '<div class="el">';
                        $html_text .= '<div '.$slide_subtitle_data.'>';
                        $html_text .= '<h3 class="q_slide_subtitle" style="' . $slide_subtitle_style . '"><span style="' . $slide_subtitle_span_style . '">' . get_post_meta(get_the_ID(), 'qode_slide-subtitle', true) . '</span></h3>';
                        $html_text .= '</div></div>';
                    }

                    if ((get_post_meta(get_the_ID(), "qode_slide-separator-title", true) == 'yes') && ($slide_separator_position != 'bottom')) {
                        //append separator html
                        if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_type', true) !== 'with_icon') {
                            $html_text .= '<div class="el">';
                            $html_text .= '<div '.$slide_separator_top_data.'>';
                            $html_text .= '<div style="' . $slide_separator_styles . ' ' . $slide_top_separator_styles . '" class="separator separator_top"></div>';
                            $html_text .= '</div></div>';
                        }
                        else {
                            $html_text .= '<div class="el">';
                            $html_text .= '<div ' . $slide_separator_top_data . ' >';
                            $html_text .= do_shortcode('[no_separator_with_icon ' . implode(' ', $slide_separator_with_icon_params_array) .  ']');
                            $html_text .= '</div></div>';
                        }

                    }

                    if (get_post_meta(get_the_ID(), "qode_slide-hide-title", true) != true) {
                        $html_text .= '<div class="el"><div '.$slide_title_data.'>';
                        $html_text .= '<h2 class="q_slide_title" style="' . $slide_title_style . '">';
                        if (get_post_meta(get_the_ID(), "qode_slide-title-link", true) != '') {
                            $html_text .= '<a style="' . $slide_title_style . '" '.$slide_title_data.' href="' . esc_url(get_post_meta(get_the_ID(), "qode_slide-title-link", true)) . '" target="' . get_post_meta(get_the_ID(), "qode_slide-title-target", true) . '">';
                        }
                        $html_text .= '<span style="' . $slide_title_span_style . '">' . get_the_title() . '</span>';
                        if (get_post_meta(get_the_ID(), "qode_slide-title-link", true) != '') {
                            $html_text .= '</a>';
                        }
                        $html_text .= '</h2></div></div>';
                    }

                    if ((get_post_meta(get_the_ID(), "qode_slide-separator-title", true) == 'yes') && ($slide_separator_position != 'top')) {
                        //append separator html
                        if (get_post_meta(get_the_ID(), 'qode_slide_title_separator_type', true) !== 'with_icon') {
                            $html_text .= '<div class="el">';
                            $html_text .= '<div ' . $slide_separator_bottom_data . '>';
                            $html_text .= '<div style="' . $slide_separator_styles . ' ' . $slide_bottom_separator_styles . '"  class="separator separator_bottom"></div>';
                            $html_text .= '</div></div>';
                        }
                        else {
                            $html_text .= '<div class="el">';
                            $html_text .= '<div ' . $slide_separator_bottom_data . ' >';
                            $html_text .= do_shortcode('[no_separator_with_icon ' . implode(' ', $slide_separator_with_icon_params_array) .  ']');
                            $html_text .= '</div></div>';
                        }
                    }

                    if (get_post_meta(get_the_ID(), "qode_slide-text", true) != "") {
                        $html_text .= '<div class="el"><div '.$slide_text_data.'>';
                        if ($slide_text_separator_var == 'yes') {
                            $html_text .= do_shortcode('[vc_text_separator ' . implode(' ', $slide_text_with_separator_array ) . ']');
                        } else {
                            $html_text .= '<h3 class="q_slide_text" style="' . $slide_text_style . '"><span style="' . $slide_text_span_style . '">' . get_post_meta(get_the_ID(), "qode_slide-text", true) . '</span></h3>';
                        }
                        $html_text .= '</div></div>';
                    }

                    //check if first button should be displayed
                    $is_first_button_shown = get_post_meta(get_the_ID(), "qode_slide-button-label", true) != "" && get_post_meta(get_the_ID(), "qode_slide-button-link", true) != "";

                    //check if second button should be displayed
                    $is_second_button_shown = get_post_meta(get_the_ID(), "qode_slide-button-label2", true) != "" && get_post_meta(get_the_ID(), "qode_slide-button-link2", true) != "";

                    //does any button should be displayed?
                    $is_any_button_shown = $is_first_button_shown || $is_second_button_shown;

                    if ($is_any_button_shown) {
                        $html_text .= '<div class="el">';
                        $html_text .= '<div class="slide_buttons_holder">';
                    }
                    $slide_button_target = "_self";
                    if (get_post_meta(get_the_ID(), "qode_slide-button-target", true) != "") {
                        $slide_button_target = get_post_meta(get_the_ID(), "qode_slide-button-target", true);
                    }

                    $slide_button_target2 = "_self";
                    if (get_post_meta(get_the_ID(), "qode_slide-button-target2", true) != "") {
                        $slide_button_target2 = get_post_meta(get_the_ID(), "qode_slide-button-target2", true);
                    }


                    //First Button Style and HTML
                    $button_text_style1 = "";
                    $data_attr1 = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-button_font_family", true) != "-1") {
                        $button_text_style1 .= "font-family:" . str_replace('+', ' ', get_post_meta(get_the_ID(), "qode_slide-button_font_family", true)) . ", sans-serif;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_letter_spacing", true) != "") {
                        $button_text_style1 .= "letter-spacing:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_letter_spacing", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_font_style", true) != "") {
                        $button_text_style1 .= "font-style:" . get_post_meta(get_the_ID(), "qode_slide-button_font_style", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_font_weight", true) != "") {
                        $button_text_style1 .= "font-weight:" . get_post_meta(get_the_ID(), "qode_slide-button_font_weight", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_font_size", true) != "") {
                        $button_text_style1 .= "font-size:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_font_size", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_text_color", true) != "") {
                        $button_text_style1 .= "color:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_text_color", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_background_color", true) != "") {
                        $button_text_style1 .= "background-color:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_background_color", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_border_color", true) != "") {
                        $button_text_style1 .= "border-color:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_border_color", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_border_radius", true) != "") {
                        $button_text_style1 .= "border-radius:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_border_radius", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_border_width", true) != "") {
                        $button_text_style1 .= "border-width:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_border_width", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_line_height", true) != "") {
                        $button_text_style1 .= "line-height:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_line_height", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_width", true) != "") {
                        $button_text_style1 .= "width:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_width", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_height", true) != "") {
                        $button_text_style1 .= "height:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_height", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_margin1", true) != "") {
                        $button_text_style1 .= "margin:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_margin1", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_text_align", true) != "") {
                        $button_text_style1 .= "text-align:" . get_post_meta(get_the_ID(), "qode_slide-button_text_align", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_text_transform", true) != "") {
                        $button_text_style1 .= "text-transform:" . get_post_meta(get_the_ID(), "qode_slide-button_text_transform", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_padding", true) != "") {
                        $button_text_style1 .= "padding: 0 " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_padding", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_text_hover_color", true) != "") {
                        $data_attr1 .= "data-hover-color=" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_text_hover_color", true)) . " ";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_border_hover_color", true) != "") {
                        $data_attr1 .= "data-hover-border-color=" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_border_hover_color", true)) . " ";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_background_hover_color", true) != "") {
                        $data_attr1 .= "data-hover-background-color=" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_background_hover_color", true)) . " ";
                    }
                    if ($is_first_button_shown) {
                        $html_text .= '<a class="qbutton" ' . $data_attr1 . ' style="' . $button_text_style1 . '" '.$slide_button_1_data.' href="' . esc_url(get_post_meta(get_the_ID(), "qode_slide-button-link", true)) . '" target="' . $slide_button_target . '">' . esc_html(get_post_meta(get_the_ID(), "qode_slide-button-label", true)) . '</a>';
                    }


                    //SecondButton Style and HTML
                    $button_text_style2 = "";
                    $data_attr2 = "";
                    if (get_post_meta(get_the_ID(), "qode_slide-button_font_family2", true) != "-1") {
                        $button_text_style2 .= "font-family:" . str_replace('+', ' ', get_post_meta(get_the_ID(), "qode_slide-button_font_family2", true)) . ", sans-serif;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_letter_spacing2", true) != "") {
                        $button_text_style2 .= "letter-spacing:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_letter_spacing2", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_font_style2", true) != "") {
                        $button_text_style2 .= "font-style:" . get_post_meta(get_the_ID(), "qode_slide-button_font_style2", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_font_weight2", true) != "") {
                        $button_text_style2 .= "font-weight:" . get_post_meta(get_the_ID(), "qode_slide-button_font_weight2", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_font_size2", true) != "") {
                        $button_text_style2 .= "font-size:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_font_size2", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_text_color2", true) != "") {
                        $button_text_style2 .= "color:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_text_color2", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_background_color2", true) != "") {
                        $button_text_style2 .= "background-color:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_background_color2", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_border_color2", true) != "") {
                        $button_text_style2 .= "border-color:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_border_color2", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_border_radius2", true) != "") {
                        $button_text_style2 .= "border-radius:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_border_radius2", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_border_width2", true) != "") {
                        $button_text_style2 .= "border-width:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_border_width2", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_line_height2", true) != "") {
                        $button_text_style2 .= "line-height:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_line_height2", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_width2", true) != "") {
                        $button_text_style2 .= "width:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_width2", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_height2", true) != "") {
                        $button_text_style2 .= "height:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_height2", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_margin2", true) != "") {
                        $button_text_style2 .= "margin:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_margin2", true)) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_text_align2", true) != "") {
                        $button_text_style2 .= "text-align:" . get_post_meta(get_the_ID(), "qode_slide-button_text_align2", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_text_transform2", true) != "") {
                        $button_text_style2 .= "text-transform:" . get_post_meta(get_the_ID(), "qode_slide-button_text_transform2", true) . ";";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_padding2", true) != "") {
                        $button_text_style2 .= "padding: 0 " . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_padding2", true)) . "px;";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_text_hover_color2", true) != "") {
                        $data_attr2 .= "data-hover-color=" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_text_hover_color2", true)) . " ";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_border_hover_color2", true) != "") {
                        $data_attr2 .= "data-hover-border-color=" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_border_hover_color2", true)) . " ";
                    }
                    if (get_post_meta(get_the_ID(), "qode_slide-button_background_hover_color2", true) != "") {
                        $data_attr2 .= "data-hover-background-color=" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-button_background_hover_color2", true)) . " ";
                    }
                    if ($is_second_button_shown) {
                        $html_text .= '<a class="qbutton" ' . $data_attr2 . ' style="' . $button_text_style2 . '" '.$slide_button_2_data.' href="' . esc_url(get_post_meta(get_the_ID(), "qode_slide-button-link2", true)) . '" target="' . $slide_button_target2 . '">' . esc_html(get_post_meta(get_the_ID(), "qode_slide-button-label2", true)) . '</a>';
                    }

                    if ($is_any_button_shown) {
                        $html_text .= '</div></div>'; //close div.slide_button_holder
                    }

                    if (get_post_meta(get_the_ID(), "qode_slide-anchor-button", true) !== '') {
                        $slide_anchor_style = array();
                        if (get_post_meta(get_the_ID(), "qode_slide-text-color", true) !== '') {
                            $slide_anchor_style[] = "color:" . esc_attr(get_post_meta(get_the_ID(), "qode_slide-text-color", true));
                        }

                        if ($slide_anchor_style !== '') {
                            $slide_anchor_style = 'style="' . implode(';', $slide_anchor_style) . '"';
                        }

                        $html_text .= '<div class="slide_anchor_holder el"><a ' . $slide_anchor_style . ' class="slide_anchor_button anchor" href="' . esc_attr(get_post_meta(get_the_ID(), "qode_slide-anchor-button", true)) . '"><i class="fa fa-angle-down"></i></a></div>';
                    }

                    $html_text .= '</div>';
                    $html .= '<div class="slider_content_outer">';

                    if ($separate_text_graphic != 'yes') {
                        $html .= '<div class="slider_content ' . $content_alignment . '" style="' . $content_width . $content_xaxis . $content_yaxis_start . '" '.$slide_data_start.' '.$slide_data_end.'>';
                        $html .= $html_thumb;
                        $html .= $html_text;
                        $html .= '</div>';
                    } else {
                        $html .= '<div class="slider_content graphic_content ' . $graphic_alignment . '" style="' . $graphic_width . $graphic_xaxis . $graphic_yaxis_start . '">';
                        $html .= $html_thumb;
                        $html .= '</div>';
                        $html .= '<div class="slider_content ' . $content_alignment . '" style="' . $content_width . $content_xaxis . $content_yaxis_start . '" '.$slide_data_start.' '.$slide_data_end.'>';
                        $html .= $html_text;
                        $html .= '</div>';
                    }

                    $html .= '</div>';
                    $html .= '</div>';

                    $postCount++;
                endwhile;
            else:
                $html .= __('Sorry, no slides matched your criteria.', 'qode');
            endif;
            wp_reset_query();

            $html .= '</div>';
            if ($found_slides > 1) {
                if ($show_navigation_circles == "yes") {

                        $html .= '<ol class="carousel-indicators" data-start="opacity: 1;" data-300="opacity:0;">';

                    query_posts($args);
                    if (have_posts()) : $postCount = 0;
                        while (have_posts()) : the_post();

                            $html .= '<li data-target="#qode-' . $slider . '" data-slide-to="' . $postCount . '"';
                            if ($postCount == 0) {
                                $html .= ' class="active"';
                            }
                            $html .= '></li>';

                            $postCount++;
                        endwhile;
                    else:
                        $html .= __('Sorry, no posts matched your criteria.', 'qode');
                    endif;

                    wp_reset_query();
                    $html .= '</ol>';
                }

                if ($show_navigation_arrows == "yes") {

                    $icon_navigation_class = 'arrow_carrot-';
                    if (isset($qode_options['navigation_arrows_type']) && $qode_options['navigation_arrows_type'] != '') {
                        $icon_navigation_class = $qode_options['navigation_arrows_type'];
                    }
                    $direction_nav_classes = qode_horizontal_slider_icon_classes($icon_navigation_class);

                    $html .= '<div class="controls_holder">';
                    $html .= '<a class="left carousel-control" href="#qode-' . $slider . '" data-slide="prev" data-start="opacity: 1;" data-300="opacity:0;">';
                    if ($slider_thumbs == 'yes') {
                        $html .= '<span class="thumb_holder" '.$navigation_margin_top.'><span class="thumb-arrow arrow_carrot-left"></span><span class="numbers"><span class="prev"></span><span class="max-number"> / ' . $postCount . '</span></span><span class="img"></span></span>';
                    }
                    $html .= '<span class="prev_nav" ' . $navigation_margin_top . '><span class="'.$direction_nav_classes['left_icon_class'].'"></span></span>';
                    $html .= '</a>';
                    $html .= '<a class="right carousel-control" href="#qode-' . $slider . '" data-slide="next" data-start="opacity: 1;" data-300="opacity:0;">';
                    if ($slider_thumbs == 'yes') {
                        $html .= '<span class="thumb_holder" '.$navigation_margin_top.'><span class="numbers"> <span class="next"></span><span class="max-number"> / ' . $postCount . '</span></span><span class="thumb-arrow arrow_carrot-right"></span><span class="img"></span></span>';
                    }
                    $html .= '<span class="next_nav" ' . $navigation_margin_top . '><span class="'.$direction_nav_classes['right_icon_class'].'"></span></span>';
                    $html .= '</a>';
                    $html .= '</div>';
                }
            }
            $html .= '</div>';
        }
        return $html;
    }

    add_shortcode('no_slider', 'no_slider');
}


/* No Carousel shortcode */

if (!function_exists('no_carousel')) {

    function no_carousel($atts, $content = null) {

        global $qode_options;

        $args = array(
            "carousel" => "",
            "orderby" => "date",
            "order" => "ASC",
            "show_navigation" => "",
            "show_in_two_rows" => "",
            "margin_between_rows" => ""
        );

        extract(shortcode_atts($args, $atts));

        $carousel = esc_attr($carousel);
        $margin_between_rows = esc_attr($margin_between_rows);

        $html = "";
        $margin_between_rows_style = '';

        if ($carousel != "") {
            $carousel_holder_classes = array();

            if ($show_in_two_rows == 'yes') {
                $carousel_holder_classes[] = 'two_rows';

                $margin_between_rows_style = '';
                if ($margin_between_rows != '') {
                    $valid_margin_between_rows = (strstr($margin_between_rows, 'px', true)) ? $margin_between_rows : $margin_between_rows . 'px';
                    $margin_between_rows_style = 'style="margin-bottom:' . $valid_margin_between_rows . ';"';
                }
            }

            $html .= "<div class='qode_carousels_holder clearfix " . implode(' ', $carousel_holder_classes) . "'><div class='qode_carousels'><ul class='slides'>";

            $q = array('post_type' => 'carousels', 'carousels_category' => $carousel, 'orderby' => $orderby, 'order' => $order, 'posts_per_page' => '-1');

            query_posts($q);
            $have_posts = false;

            if (have_posts()) : $post_count = 1;
                $have_posts = true;
                while (have_posts()) : the_post();

                    if (get_post_meta(get_the_ID(), "qode_carousel-image", true) != "") {
                        $image = get_post_meta(get_the_ID(), "qode_carousel-image", true);
                    } else {
                        $image = "";
                    }

                    if (get_post_meta(get_the_ID(), "qode_carousel-hover-image", true) != "") {
                        $hover_image = get_post_meta(get_the_ID(), "qode_carousel-hover-image", true);
                        $has_hover_image = "has_hover_image";
                    } else {
                        $hover_image = "";
                        $has_hover_image = "";
                    }

                    if (get_post_meta(get_the_ID(), "qode_carousel-item-link", true) != "") {
                        $link = get_post_meta(get_the_ID(), "qode_carousel-item-link", true);
                    } else {
                        $link = "";
                    }

                    if (get_post_meta(get_the_ID(), "qode_carousel-item-target", true) != "") {
                        $target = get_post_meta(get_the_ID(), "qode_carousel-item-target", true);
                    } else {
                        $target = "_self";
                    }

                    $title = get_the_title();

                    //is current item not on even position in array and two rows option is chosen?
                    if ($post_count % 2 !== 0 && $show_in_two_rows == 'yes') {
                        $html .= "<li class='item'>";
                    } elseif ($show_in_two_rows == '') {
                        $html .= "<li class='item'>";
                    }

                    $html .= '<div class="carousel_item_holder" ' . $margin_between_rows_style . '>';

                    if ($link != "") {
                        $html .= "<a href='" . $link . "' target='" . $target . "'>";
                    }

                    if ($image != "") {
                        $html .= "<span class='first_image_holder " . $has_hover_image . "'><img src='" . $image . "' alt='" . $title . "'></span>";
                    }

                    if ($hover_image != "") {
                        $html .= "<span class='second_image_holder " . $has_hover_image . "'><img src='" . $hover_image . "' alt='" . $title . "'></span>";
                    }

                    if ($link != "") {
                        $html .= "</a>";
                    }

                    $html .= '</div>';

                    //is current item on even position in array and two rows option is chosen?
                    if ($post_count % 2 == 0 && $show_in_two_rows == 'yes') {
                        $html .= "</li>";
                    } elseif ($show_in_two_rows == '') {
                        $html .= "</li>";
                    }

                    $post_count++;

                endwhile;

            else:
                $html .= __('Sorry, no posts matched your criteria.', 'qode');
            endif;

            wp_reset_query();

            $html .= "</ul>";

            if ($show_navigation != 'no' && $have_posts) {

                $icon_navigation_class = 'arrow_carrot-';
                if (isset($qode_options['navigation_arrows_type']) && $qode_options['navigation_arrows_type'] != '') {
                    $icon_navigation_class = $qode_options['navigation_arrows_type'];
                }

                $direction_nav_classes = qode_horizontal_slider_icon_classes($icon_navigation_class);

                //generate navigation html
                $html .= '<ul class="caroufredsel-direction-nav">';

                $html .= '<li class="caroufredsel-prev-holder">';

                $html .= '<a id="caroufredsel-prev" class="qode_carousel_prev caroufredsel-navigation-item caroufredsel-prev" href="javascript: void(0)">';

                $html .= '<span class="'.$direction_nav_classes['left_icon_class'].'"></span>';

                $html .= '</a>';

                $html .= '</li>'; //close li.caroufredsel-prev-holder

                $html .= '<li class="caroufredsel-next-holder">';
                $html .= '<a class="qode_carousel_next caroufredsel-next caroufredsel-navigation-item" id="caroufredsel-next" href="javascript: void(0)">';

                $html .= '<span class="'.$direction_nav_classes['right_icon_class'].'"></span>';

                $html .= '</a>';

                $html .= '</li>'; //close li.caroufredsel-next-holder

                $html .= '</ul>'; //close ul.caroufredsel-direction-nav
            }
            $html .= "</div></div>";
        }

        return $html;
    }

    add_shortcode('no_carousel', 'no_carousel');
}


/* Select Image Slider with no space shortcode */

if (!function_exists('no_image_slider_no_space')) {

    function no_image_slider_no_space($atts, $content = null) {
        global $qode_options;
        $args = array(
            "images" => "",
            "show_info" => "",
            "info_position" => "",
            "background_color" => "",
            "title_color" => "",
            "title_font_size" => "",
            "description_color" => "",
            "description_font_size" => "",
            "separator_color" => "",
            "separator_opacity" => "",
            "full_screen" => "",
            "height" => "",
            "on_click" => "",
            "custom_links" => "",
            "custom_links_target" => "",
            "navigation_style" => "",
            "highlight_active_image" => "",
            "highlight_inactive_color" => "",
            "highlight_inactive_opacity" => ""
        );

        extract(shortcode_atts($args, $atts));

        $images = esc_attr($images);
        $background_color = esc_attr($background_color);
        $title_color = esc_attr($title_color);
        $title_font_size = esc_attr($title_font_size);
        $description_color = esc_attr($description_color);
        $description_font_size = esc_attr($description_font_size);
        $separator_color = esc_attr($separator_color);
        $separator_opacity = esc_attr($separator_opacity);
        $height = esc_attr($height);
        $custom_links = esc_attr($custom_links);
        $highlight_inactive_color = esc_attr($highlight_inactive_color);
        $highlight_inactive_opacity = esc_attr($highlight_inactive_opacity);


        //init variables
        $html = "";
        $image_gallery_holder_styles = '';
        $image_gallery_holder_classes = '';
        $image_gallery_item_styles = '';
        $custom_links_array = array();
        $using_custom_links = false;
        $highlight_inactive_color_style = '';
        $highlight_inactive_opacity_style = '';

        //is full screen height for the slider set?
        if ($full_screen == 'yes') {
            $image_gallery_holder_classes .= ' full_screen_height';
        }

        //is height for the slider set?
        if ($height !== '' && $full_screen == 'no') {
            $image_gallery_holder_styles .= 'height: ' . $height . 'px;';
            $image_gallery_item_styles .= 'height: ' . $height . 'px;';
        }

        //are we using custom links and is custom links field filled?
        if ($on_click == 'use_custom_links' && $custom_links !== '') {
            //create custom links array
            $custom_links_array = explode(',', strip_tags($custom_links));
        }

        if ($navigation_style !== '') {
            $image_gallery_holder_classes .= ' ' . $navigation_style;
        }

        if ($highlight_active_image == 'yes') {
            $image_gallery_holder_classes .= ' highlight_active';
            if ($highlight_inactive_color != '') {
                $highlight_inactive_color_style .= 'style="background-color:' . $highlight_inactive_color . ';"';
            }
            if ($highlight_inactive_opacity != '') {
                $highlight_inactive_opacity_style .= 'style="opacity:' . $highlight_inactive_opacity . ';"';
            }
        }

        if ($show_info == 'on_hover') {
            $image_gallery_holder_classes .= ' on_hover';
        }
        if($show_info == 'in_bottom_corner'){
            $image_gallery_holder_classes .= ' in_bottom_corner';
            if($info_position == "bottom_left"){ $image_gallery_holder_classes .= ' bottom_left'; }
            if($info_position == "bottom_right"){ $image_gallery_holder_classes .= ' bottom_right'; }
        }

        $html .= "<div class='qode_image_gallery_no_space " . $image_gallery_holder_classes . "'><div class='qode_image_gallery_holder' style='" . $image_gallery_holder_styles . "'><ul " . $highlight_inactive_color_style . ">";



        if ($images != '') {
            $images_gallery_array = explode(',', $images);
        }

        //are we using prettyphoto?
        if ($on_click == 'prettyphoto') {
            //generate random rel attribute
            $pretty_photo_rel = 'prettyPhoto[rel-' . rand() . ']';
        }


        //are we using custom links and is target for those elements chosen?
        if ($on_click == 'use_custom_links' && in_array($custom_links_target, array('_self', '_blank'))) {
            //generate target attribute
            $custom_links_target = 'target="' . $custom_links_target . '"';
        }

        if (isset($images_gallery_array) && count($images_gallery_array) != 0) {
            $i = 0;
            foreach ($images_gallery_array as $gimg_id) {
                $current_item_custom_link = '';

                $gimage_src = wp_get_attachment_image_src($gimg_id, 'full', true);
                $gimage_alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
                $gimage_title = get_the_title($gimg_id);
                $gimage_description = get_post($gimg_id)->post_content;

                $image_src = $gimage_src[0];
                $image_width = $gimage_src[1];
                $image_height = $gimage_src[2];

                //is height set for the slider?
                if ($height !== '' && $full_screen == 'no') {
                    //get image proportion that will be used to calculate image width
                    $proportion = $height / $image_height;

                    //get proper image width based on slider height and proportion
                    $image_width = ceil($image_width * $proportion);
                }

                $html .= '<li><div style="' . $image_gallery_item_styles . ' width:' . $image_width . 'px;">';

                //is on click event chosen?
                if ($on_click !== '') {
                    switch ($on_click) {
                        case 'prettyphoto':
                            $html .= '<a class="prettyphoto" rel="' . $pretty_photo_rel . '" href="' . $image_src . '">';
                            break;
                        case 'use_custom_links':
                            //does current image has custom link set?
                            if (isset($custom_links_array[$i])) {
                                //get custom link for current image
                                $current_item_custom_link = $custom_links_array[$i];

                                if ($current_item_custom_link !== '') {
                                    $html .= '<a ' . $custom_links_target . ' href="' . $current_item_custom_link . '">';
                                }
                            }
                            break;
                        case 'new_tab':
                            $html .= '<a href="' . $image_src . '" target="_blank">';
                            break;
                        default:
                            break;
                    }
                }
                if ($show_info == 'on_hover') {
                    $background_styles = '';
                    $title_styles = '';
                    $description_styles = '';
                    $separator_styles = '';

                    if ($background_color != "") {
                        $background_styles .= "background-color: " . $background_color . ";";
                    }

                    if ($title_color != "") {
                        $title_styles .= 'color:' . $title_color . ';';
                    }
                    if ($title_font_size != "") {
                        $title_styles .= 'font-size:' . $title_font_size . 'px;';
                    }
                    if ($description_color != "") {
                        $description_styles .= 'color:' . $description_color . ';';
                    }
                    if ($description_font_size != "") {
                        $description_styles .= 'font-size:' . $description_font_size . 'px;';
                    }
                    if ($separator_color != "") {
                        $separator_styles .= 'background-color:' . $separator_color . ';';
                    }
                    if ($separator_opacity != "") {
                        $separator_styles .= 'opacity:' . $separator_opacity . ';';
                    }

                    $html .= '<span class="holder" style="' . $background_styles . '"><span class="outer"><span class="inner">';
                    $html .= '<span class="title" style="' . $title_styles . '">' . $gimage_title . '</span><span class="separator" style="' . $separator_styles . '"></span><span class="description" style="' . $description_styles . '">' . $gimage_description . '</span>';
                    $html .= '</span></span></span>';
                }

                if ($show_info == 'in_bottom_corner') {
                    $background_styles = '';
                    $title_styles = '';
                    $description_styles = '';

                    if ($background_color != "") {
                        $background_styles .= "background-color: " . $background_color . ";";
                    }

                    if ($title_color != "") {
                        $title_styles .= 'color:' . $title_color . ';';
                    }
                    if ($title_font_size != "") {
                        $title_styles .= 'font-size:' . $title_font_size . 'px;';
                    }
                    if ($description_color != "") {
                        $description_styles .= 'color:' . $description_color . ';';
                    }
                    if ($description_font_size != "") {
                        $description_styles .= 'font-size:' . $description_font_size . 'px;';
                    }

                    $html .= '<span class="holder"><span class="outer"><span class="inner">';
                    $html .= '<span class="title" style="' . $title_styles . $background_styles . '">' . $gimage_title . '</span><span class="clear"></span><span class="description" style="' . $description_styles . $background_styles .'">' . $gimage_description . '</span>';
                    $html .= '</span></span></span>';
                }

                $html .= '<img src="' . $image_src . '" alt="' . $gimage_alt . '" ' . $highlight_inactive_opacity_style . ' />';



                //are we using prettyphoto or new tab click event or is custom link for current image set?
                if (in_array($on_click, array('prettyphoto', 'new_tab')) || ($on_click == 'use_custom_links' && $current_item_custom_link !== '')) {
                    //if so close opened link
                    $html .= '</a>';
                }

                $html .= '</div></li>';

                $i++;
            }
        }

        $icon_navigation_class = 'arrow_carrot-';
        if (isset($qode_options['navigation_arrows_type']) && $qode_options['navigation_arrows_type'] != '') {
            $icon_navigation_class = $qode_options['navigation_arrows_type'];
        }

        $direction_nav_classes = qode_horizontal_slider_icon_classes($icon_navigation_class);

        $html .= "</ul>";
        $html .= '</div>';
        $html .= '<div class="controls">';
        $html .= '<a class="prev-slide" href="#"><span class="'.$direction_nav_classes['left_icon_class'].'"></span></a>';
        $html .= '<a class="next-slide" href="#"><span class="'.$direction_nav_classes['right_icon_class'].'"></span></a>';
        $html .= '</div></div>';

        return $html;
    }

    add_shortcode('no_image_slider_no_space', 'no_image_slider_no_space');
}

if (!function_exists('no_interactive_gallery')) {

    function no_interactive_gallery($atts, $content = null) {
        global $qode_options;
        $args = array(
            "featured_image" => "",
            "type" => "",
            "images" => "",
            "text" => "View Gallery",
            "link" => "#",
            "target_link" => "_blank",
            "text_font_family" => "",
            "text_font_style" => "",
            "text_font_weight" => "",
            "text_color" => "",
            "text_font_size" => "",
            "layer_color" => ""
        );

        extract(shortcode_atts($args, $atts));

        $featured_image = esc_attr($featured_image);
        $text = esc_html($text);
        $images = esc_attr($images);
        $link = esc_url($link);
        $text_font_family = esc_attr($text_font_family);
        $text_color = esc_attr($text_color);
        $text_font_size = esc_attr($text_font_size);
        $layer_color = esc_attr($layer_color);


        //init variables
        $html = "";
        $image_gallery_holder_styles = '';
        $image_gallery_item_styles = '';
        $firstImage = '';

        //holder style
        if ($layer_color !== '') {
            $image_gallery_holder_styles .= 'background-color: ' . $layer_color . ';';
        }

        //text style
        if ($text_font_family !== '') {
            $image_gallery_item_styles .= 'font-family: ' . $text_font_family . ';';
        }
        if ($text_font_weight !== '') {
            $image_gallery_item_styles .= 'font-weight: ' . $text_font_weight . ';';
        }
        if ($text_font_style !== '') {
            $image_gallery_item_styles .= 'font-style: ' . $text_font_style . ';';
        }
        if ($text_color !== '') {
            $image_gallery_item_styles .= 'color: ' . $text_color . ';';
        }

        if ($text_font_size != "") {
            $valid_title_size = (strstr($text_font_size, 'px', true)) ? $text_font_size : $text_font_size . 'px';
            $image_gallery_item_styles .= "font-size: " . $valid_title_size . ";";
        }

        //featured image
        if (is_numeric($featured_image)) {
            $featured_image_src = wp_get_attachment_url($featured_image);
        } else {
            $featured_image_src = $featured_image;
        }

        //images set
        if ($images != '') {
            $images_gallery_array = explode(',', $images);
        }

        $html .= '<div class="no_interactive_gallery_holder">';

        $html .= '<div class="no_interactive_gallery_image">';
        $html .= '<img alt="" src="' . $featured_image_src . '" />';
        $html .= '</div>'; // close no_interactive_gallery_image
        //generate random rel attribute
        $pretty_photo_rel = 'prettyPhoto[rel-' . rand() . ']';

        if (isset($images_gallery_array) && count($images_gallery_array) != 0) {
            $i = 0;
            foreach ($images_gallery_array as $gimg_id) {

                $gimage_src = wp_get_attachment_image_src($gimg_id, 'full', true);
                $image_src = $gimage_src[0];

                if ($i == 0) {
                    $firstImage = $image_src;
                }

                $html .= '<a class="prettyphoto" rel="' . $pretty_photo_rel . '" href="' . $image_src . '"></a>';

                $i++;
            }
        }

        $html .= '<div class="no_interactive_gallery_text_overlay" style="' . $image_gallery_holder_styles . '">';
        $html .= '<div class="no_interactive_gallery_text_holder">';
        $html .= '<div class="no_interactive_gallery_text_holder_inner">';
        if ($type == "image_gallery") {
            $html .= '<a class="prettyphoto" rel="' . $pretty_photo_rel . '" href="' . $firstImage . '">';
            $html .= '<span style="' . $image_gallery_item_styles . '">' . $text . '</span>';
            $html .= '</a>';
        } elseif ($type == "with_link_in_bottom") {
            $html .= '<a href="' . $link . '" target="' . $target_link . '" ';
            if ($image_gallery_item_styles !== "") {
                $html .= 'style="' . $image_gallery_item_styles . '"';
            }
            $html .= '>' . $text . '</a>';
        }
        $html .= '</div>'; //close no_interactive_gallery_text_holder_inner
        $html .= '</div>'; //close no_interactive_gallery_text_holder
        $html .= '</div>'; //close no_interactive_gallery_text_overlay
        $html .= '</div>'; //close no_interactive_gallery_holder

        return $html;
    }

    add_shortcode('no_interactive_gallery', 'no_interactive_gallery');
}

/* Countdown shortcode */

if (!function_exists('no_countdown')) {

    function no_countdown($atts, $content = null) {
        extract(shortcode_atts(array("year" => "", "month" => "", "day" => "", "hour" => "", "minute" => "", "month_label" => "", "day_label" => "", "hour_label" => "", "minute_label" => "", "second_label" => "","month_singular_label" => "", "day_singular_label" => "", "hour_singular_label" => "", "minute_singular_label" => "", "second_singular_label" => "", "color" => "", "digit_font_size" => "", "label_font_size" => "", "font_weight" => "", "show_separator" => ""), $atts));
        


        $month_label = esc_attr($month_label);
        $day_label = esc_attr($day_label);
        $hour_label = esc_attr($hour_label);
        $minute_label = esc_attr($minute_label);
        $second_label = esc_attr($second_label);
        $month_singular_label = esc_attr($month_singular_label);
        $day_singular_label = esc_attr($day_singular_label);
        $hour_singular_label = esc_attr($hour_singular_label);
        $minute_singular_label = esc_attr($minute_singular_label);
        $second_singular_label = esc_attr($second_singular_label);
        $color = esc_attr($color);
        $digit_font_size = esc_attr($digit_font_size);
        $label_font_size = esc_attr($label_font_size);


        $id = mt_rand(1000, 9999);
        $month_label_value = "Months";
        if ($month_label != "") {
            $month_label_value = $month_label;
        }
        $day_label_value = "Days";
        if ($day_label != "") {
            $day_label_value = $day_label;
        }
        $hour_label_value = "Hours";
        if ($hour_label != "") {
            $hour_label_value = $hour_label;
        }
        $minute_label_value = "Minutes";
        if ($minute_label != "") {
            $minute_label_value = $minute_label;
        }
        $second_label_value = "Seconds";
        if ($second_label != "") {
            $second_label_value = $second_label;
        }

        $month_singular_label_value = "Month";
        if ($month_singular_label != "") {
            $month_singular_label_value = $month_singular_label;
        }
        $day_singular_label_value = "Day";
        if ($day_singular_label != "") {
            $day_singular_label_value = $day_singular_label;
        }
        $hour_singular_label_value = "Hour";
        if ($hour_singular_label != "") {
            $hour_singular_label_value = $hour_singular_label;
        }
        $minute_singular_label_value = "Minute";
        if ($minute_singular_label != "") {
            $minute_singular_label_value = $minute_singular_label;
        }
        $second_singular_label_value = "Second";
        if ($second_singular_label != "") {
            $second_singular_label_value = $second_singular_label;
        }

        $counter_style = "";
        if ($color != "" || $font_weight != '') {
            $counter_style = "style='";
            if ($color != "") {
                $counter_style .="color:" . $color . ";";
            }
            if ($font_weight != "") {
                $counter_style .="font-weight:" . $font_weight . ";";
            }
            $counter_style .="'";
        }

        $html = "<div class='countdown " . $show_separator . "' id='countdown" . $id . "' " . $counter_style . "></div>";

        $html .= "<script>
		var \$j = jQuery.noConflict();
		\$j(document).ready(function() {
	        \$j('#countdown" . $id . "').countdown({
	            until: new Date( " . $year . ", " . $month . " - 1, " . $day . ", " . $hour . ", " . $minute . ", 44),
	            labels: ['Years', '" . $month_label_value . "', 'Weeks', '" . $day_label_value . "', '" . $hour_label_value . "', '" . $minute_label_value . "', '" . $second_label_value . "'],
	            labels1: ['Year', '" . $month_singular_label_value . "', 'Week', '" . $day_singular_label_value . "', '" . $hour_singular_label_value . "', '" . $minute_singular_label_value . "', '" . $second_singular_label_value . "'],
                format: 'ODHMS',
	            timezone: " . get_option('gmt_offset') . ",
	            padZeroes: true,
	            ";
        if ($digit_font_size != "" || $digit_font_size != "" || $color != "") {
            $html .= "
                    onTick: setCountdownStyle" . $id . "";
        }
        $html .= "
            });";
        if ($digit_font_size != "" || $digit_font_size != "" || $color != "") {
            $html .= "function setCountdownStyle" . $id . "(){";
            if ($digit_font_size != "") {
                $html .= "
                        \$j('#countdown" . $id . " .countdown-amount').css('font-size','" . $digit_font_size . "px').css('line-height','" . $digit_font_size . "px');
                        ";
            }
            if ($label_font_size != "") {
                $html .= "
                        \$j('#countdown" . $id . " .countdown-period').css('font-size','" . $label_font_size . "px');
                        ";
            }
            if ($color != "") {
                $html .= "
                        \$j('#countdown" . $id . " .countdown_separator').css('background-color','" . $color . "');
                        ";
            }
            $html .= "}";
        }

        $html .= "
        });
	    </script>";
        return $html;
    }

    add_shortcode('no_countdown', 'no_countdown');
}

/* Google Map Shortcode */

if (!function_exists('no_google_map')) {

    function no_google_map($atts, $content = null) {
        extract(shortcode_atts(
                        array(
            "address1" => "",
            "address2" => "",
            "address3" => "",
            "address4" => "",
            "address5" => "",
            "custom_map_style" => false,
            "color_overlay" => "#393939",
            "saturation" => "-100",
            "lightness" => "-60",
            "zoom" => "12",
            "pin" => "",
            "google_maps_scroll_wheel" => false,
            "address_info_box" => 'no',
            "map_height" => "600"
                        ), $atts));

        $address1 = esc_attr($address1);
        $address2 = esc_attr($address2);
        $address3 = esc_attr($address3);
        $address4 = esc_attr($address4);
        $address5 = esc_attr($address5);
        $color_overlay = esc_attr($color_overlay);
        $saturation = esc_attr($saturation);
        $lightness = esc_attr($lightness);
        $zoom = esc_attr($zoom);
        $pin = esc_attr($pin);
        $map_height = esc_attr($map_height);


        $html = "";
        $unique_id = rand(0, 100000);
        $holder_id = 'map_canvas_' . $unique_id;
        $map_pin = "";

        if ($pin != "") {
            $map_pin = wp_get_attachment_image_src($pin, 'full', true);
            $map_pin = $map_pin[0];
        } else {
            $map_pin = get_template_directory_uri() . "/img/pin.png";
        }


        $data_attribute = '';
        if ($address1 != "" || $address2 != "" || $address3 != "" || $address4 != "" || $address5 != "") {
            $data_attribute .= "data-addresses='[\"";
            $addresses_array = array();
            if ($address1 != "") {
                array_push($addresses_array, esc_attr($address1));
            }
            if ($address2 != "") {
                array_push($addresses_array, esc_attr($address2));
            }
            if ($address3 != "") {
                array_push($addresses_array, esc_attr($address3));
            }
            if ($address4 != "") {
                array_push($addresses_array, esc_attr($address4));
            }
            if ($address5 != "") {
                array_push($addresses_array, esc_attr($address5));
            }
            $data_attribute .= implode('","', $addresses_array);
            $data_attribute .="\"]'";
        }

        $data_attribute .= " data-custom-map-style='" . $custom_map_style . "'";
        $data_attribute .= " data-color-overlay='" . $color_overlay . "'";
        $data_attribute .= " data-saturation='" . $saturation . "'";
        $data_attribute .= " data-lightness='" . $lightness . "'";
        $data_attribute .= " data-zoom='" . $zoom . "'";
        $data_attribute .= " data-pin='" . $map_pin . "'";
        $data_attribute .= " data-unique-id='" . $unique_id . "'";
        $data_attribute .= " data-google-maps-scroll-wheel='" . $google_maps_scroll_wheel . "'";
        $data_attribute .= " data-show-address-info-box='" . $address_info_box . "'";

        if ($map_height != "") {
            $data_attribute .= " data-map-height='" . $map_height . "'";
        }

        $html .= "<div class='google_map_holder' style='height:" . $map_height . "'><div class='q_google_map' id='" . $holder_id . "' " . $data_attribute . "></div>";

        if ($google_maps_scroll_wheel == "false") {
            $html .= "<div class='google_map_ovrlay'></div>";
        }
        $html .= "</div>";
        return $html;
    }

    add_shortcode('no_google_map', 'no_google_map');
}

/* Separator with Icon */

if (!function_exists('no_separator_with_icon')) {

    function no_separator_with_icon($atts, $content = null) {
        global $qode_options;
        global $qodeIconCollections;

        $default_atts = array(
            'type' => '',
            'position' => '',
            'color' => '',
            'border_style' => 'solid',
            'up' => '',
            'down' => '',
            'thickness' => '',
            'width' => '',
            "icon_custom_size" => "25",
            "icon_shape_size" => "100",
            "icon_type" => "",
            "custom_icon" => "",
            "icon_border_radius" => "",
            "icon_border_color" => "",
            "icon_border_width" => "1",
            "icon_color" => "",
            "icon_background_color" => "",
            "icon_margin" => "",
            "separator_icon_position" => "center",
            "hover_icon_color" => "",
            "hover_icon_border_color" => "",
            "hover_icon_background_color" => "",
        );

        $default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($default_atts, $atts));

        $color = esc_attr($color);
        $up = esc_attr($up);
        $down = esc_attr($down);
        $thickness = esc_attr($thickness);
        $width = esc_attr($width);
        $icon_custom_size = esc_attr($icon_custom_size);
        $icon_shape_size = esc_attr($icon_shape_size);
        $custom_icon = esc_attr($custom_icon);
        $icon_border_radius = esc_attr($icon_border_radius);
        $icon_border_color = esc_attr($icon_border_color);
        $icon_border_width = esc_attr($icon_border_width);
        $icon_color = esc_attr($icon_color);
        $icon_background_color = esc_attr($icon_background_color);
        $icon_margin = esc_attr($icon_margin);
        $hover_icon_color = esc_attr($hover_icon_color);
        $hover_icon_border_color = esc_attr($hover_icon_border_color);
        $hover_icon_background_color = esc_attr($hover_icon_background_color);

        //init variables
        $html = "";

        $separator_classes = "q_separator_with_icon ";
        $separator_styles = array();
        $separator_lines_styles = array();

        $separator_classes .= $type . " ";
        $separator_classes .= $position . " ";
        $separator_classes .= $separator_icon_position . " ";
        $icon_left_margin = "";
        $icon_right_margin = "";


        if ($up != "") {
            $separator_styles[] = "margin-top:" . $up . "px";
        }

        if ($down != "") {
            $separator_styles[] = "margin-bottom:" . $down . "px";
        }

        if ($color != "") {
            $separator_lines_styles[] = "border-color: " . $color;
        }

        if ($thickness != "") {
            $separator_lines_styles[] = "border-bottom-width:" . $thickness . "px";
        }

        if ($width != "") {
            $separator_lines_styles[] = "width:" . $width . "px";
        }

        if ($border_style != "" && $border_style != "transparent") {
            $separator_lines_styles[] = "border-style: " . $border_style;
        }

        if ($border_style != "" && $border_style == "transparent") {
            $separator_lines_styles[] = "border:none";
        }


        if ($thickness != "") {
            $separator_lines_styles[] = "margin-bottom:" . -$thickness / 2 . "px";
        }

        if ($icon_margin != "") {
            $icon_left_margin .= "margin-left:" . $icon_margin . "px;";
        }

        if ($icon_margin != "") {
            $icon_right_margin .= "margin-right:" . $icon_margin . "px;";
        }

        $icons_param_array = array();
        if ($icon_pack !== '') {
            $icons_param_array[] = "icon_pack='" . $icon_pack . "'";
        }

        foreach ($qodeIconCollections->iconCollections as $icon_set) {
            if (${$icon_set->param}) {
                $icons_param_array[] = $icon_set->param . "='" . ${$icon_set->param} . "'";
            }
        }
        if ($icon_type !== '') {
            $icons_param_array[] = "type='" . $icon_type . "'";
        }
        if ($icon_custom_size != '') {
            $icons_param_array[] = "custom_size='" . $icon_custom_size . "'";
        }
        if ($icon_shape_size != '') {
            $icons_param_array[] = "shape_size='" . $icon_shape_size . "'";
            // icon has to be on the middle
            if ($icon_type != 'normal') {
                $icon_position = (-$icon_shape_size / 2);
            } else {
                $icon_position = (-$icon_custom_size / 2);
            }
        }
        if ($icon_color != '') {
            $icons_param_array[] = "icon_color='" . $icon_color . "'";
        }
        if ($icon_background_color != '') {
            $icons_param_array[] = "background_color='" . $icon_background_color . "'";
        }
        if ($icon_border_color != '') {
            $icons_param_array[] = "border_color='" . $icon_border_color . "'";
        }
        if ($icon_border_radius != '') {
            $icons_param_array[] = "border_radius='" . $icon_border_radius . "'";
        }
        if ($icon_border_width != '') {
            $icons_param_array[] = "border_width='" . $icon_border_width . "'";
        }
        if ($hover_icon_color != '') {
            $icons_param_array[] = "hover_icon_color='" . $hover_icon_color . "'";
        }
        if ($hover_icon_border_color != '') {
            $icons_param_array[] = "hover_border_color='" . $hover_icon_border_color . "'";
        }
        if ($hover_icon_background_color != '') {
            $icons_param_array[] = "hover_background_color='" . $hover_icon_background_color . "'";
        }

        if($type == 'with_custom_icon' && $custom_icon != '') {
            if (is_numeric($custom_icon)) {
                $custom_icon_src = wp_get_attachment_url($custom_icon);
            } else {
                $custom_icon_src = $custom_icon;
            }
        }


        $html .= '<div class="' . $separator_classes . ' " style="' . implode(';', $separator_styles) . '">';
        $html .= '<div class="q_icon_holder" style="bottom:' . $icon_position . 'px;">';

        $html .= '<div class="q_separator_icon_holder">';

        if ($separator_icon_position == 'right' || $separator_icon_position == 'center') {
            $html .= '<div class="q_line_before"  style="' . implode(';', $separator_lines_styles) . ';' . $icon_right_margin . '"></div>';
        }

        if($type == 'with_icon'){
            $html .= do_shortcode('[no_icons ' . implode(' ', $icons_param_array) . ']');
        }
        elseif($type == 'with_custom_icon'){
            $html .= '<div class="separator_custom_icon"><img src="' . $custom_icon_src . '" alt="" /></div>';
        }

        if ($separator_icon_position == 'left' || $separator_icon_position == 'center') {
            $html .= '<div class="q_line_after"  style="' . implode(';', $separator_lines_styles) . ';' . $icon_left_margin . '"></div>';
        }

        $html .= '</div>'; //close separator_icon_holder

        $html .= '</div>'; //close qode_icon_holder
        $html .= '</div>'; // $separator_classes

        return $html;
    }

    add_shortcode('no_separator_with_icon', 'no_separator_with_icon');
}

/* Blog Slider shortcode */

if (!function_exists('no_blog_slider')) {

    function no_blog_slider($atts, $content = null) {

        global $qode_options;

        $args = array(
            "hover_box_color" => "",
            "order_by" => "date",
            "order" => "ASC",
            "number" => "-1",
            "blogs_shown" => "",
            "category" => "",
            "selected_projects" => "",
            "show_date" => "yes",
            "date_color" => "",
            "show_categories" => "yes",
            "category_color" => "",
            "title_tag" => "h3",
            "title_color" => "",
            "image_size" => "full",
            "enable_navigation" => "",
            "add_class" => ""
        );
        extract(shortcode_atts($args, $atts));

        $hover_box_color = esc_attr($hover_box_color);
        $number = esc_attr($number);
        $category = esc_attr($category);
        $selected_projects = esc_attr($selected_projects);
        $date_color = esc_attr($date_color);
        $category_color = esc_attr($category_color);
        $title_color = esc_attr($title_color);
        $add_class = esc_attr($add_class);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = "";
        $data_attribute = "";

        if ($blogs_shown !== "") {
            $data_attribute .= " data-blogs_shown='" . $blogs_shown. "'";
        }

        $title_color_style = ''; 

        if ($title_color != "") {
            $title_color_style .= 'style="';
            $title_color_style .= 'color: ' . $title_color . ';';
            $title_color_style .= '"';
        }

        $category_style = '';
        if ($category_color != '') {
            $category_style = 'style="color: ' . $category_color . ';"';
        }

        $hover_box_style = "";
        
        if ($hover_box_color != '') {
            $hover_box_style = 'style="background-color:' . $hover_box_color . ';"';
        }

        $date_style = "";
        if ($date_color !== "") {
            $date_style .= 'color: ' . $date_color . ';';
        }

        $date_style = 'style= "'.$date_style.'"';
        

        //get proper image size
        switch ($image_size) {
            case 'landscape':
                $thumb_size = 'portfolio-landscape';
                break;
            case 'portrait':
                $thumb_size = 'portfolio-portrait';
                break;
            default:
                $thumb_size = 'full';
                break;
        }


        $html .= "<div class='blog_slider_holder clearfix " . $add_class . "'><div class='blog_slider'" . $data_attribute . "><ul class='blog_slides'>";

        if ($category == "") {
            $q = array(
                'post_type' => 'post',
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number
            );
        } else {
            $q = array(
                'post_type' => 'post',
                'category_name' => $category,
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number
            );
        }

        $project_ids = null;
        if ($selected_projects != "") {
            $project_ids = explode(",", $selected_projects);
            $q['post__in'] = $project_ids;
        }

        query_posts($q);

        if (have_posts()) : $postCount = 0;
            while (have_posts()) : the_post();


                $html .= "<li class='item'>";
                $html .= '<div class="item_holder">';


                $html .= '<div class="blog_text_holder" ' . $hover_box_style . '>';
                $html .= '<div class="blog_text_holder_outer">';
                $html .= '<div class="blog_text_holder_inner">';

                if ($show_date == 'yes') {
                    $html .= '<span class="blog_slider_date_holder"' . $date_style . '>';
                    $html .= get_the_time('F d, Y');
                    $html .= '</span>';
                }

                
                $html .= '<' . $title_tag . ' class="blog_slider_title" ><a href="' . get_permalink() . '" ' . $title_color_style . '>' . get_the_title() . '</a></' . $title_tag . '>';

                if ($show_categories == 'yes') {
                    $html .= '<div class="blog_slider_categories">';


                    // get categories for specific article
                    $category_html = "";
                    $k = 1;
                    $cat = get_the_category();

                    foreach ($cat as $cats) {
                        $category_html = "$cats->name";
                        if (count($cat) != $k) {
                            $category_html .= ' / ';
                        }
                        $html .= '<a class="blog_project_category" ' . $category_style . ' href="' . get_category_link($cats->term_id) . '">' . $category_html . ' </a> ';
                        $k++;
                    }

                    $html.= '</div>';
                }

                $html .= '</div>'; // blog_text_holder_inner
                $html .= '</div>';  // blog_text_holder_outer
                $html .= '</div>'; // blog_text_holder

                $html .= '<div class="blog_image_holder">';
                $html .= '<span class="image">';
                $html .= get_the_post_thumbnail(get_the_ID(), $thumb_size);
                $html .= '</span>';
                $html .= '</div>'; // close blog_image_holder
                $html .= '</div>'; // close item_holder
                $html .= "</li>";

                $postCount++;

            endwhile;

        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        wp_reset_query();

        $html .= "</ul>";
        if ($enable_navigation) {

            $icon_navigation_class = 'arrow_carrot-';
            if (isset($qode_options['navigation_arrows_type']) && $qode_options['navigation_arrows_type'] != '') {
                $icon_navigation_class = $qode_options['navigation_arrows_type'];
            }

            $direction_nav_classes = qode_horizontal_slider_icon_classes($icon_navigation_class);

            $html .= '<ul class="caroufredsel-direction-nav"><li><a id="caroufredsel-prev" class="caroufredsel-prev" href="#"><span class="' .$direction_nav_classes['left_icon_class']. '"></span></a></li><li><a class="caroufredsel-next" id="caroufredsel-next" href="#"><span class="' .$direction_nav_classes['right_icon_class']. '"></span></a></li></ul>';
        }
        $html .= "</div></div>";

        return $html;
    }

    add_shortcode('no_blog_slider', 'no_blog_slider');
}