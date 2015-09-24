<?php

$args = array(
    "columns"         => "four_columns",
	"client_borders"  => "yes"
);

$html = "";

extract(shortcode_atts($args, $atts));

$clients_style="";

if($client_borders == 'yes') {
    $clients_style   .= 'with_borders';
}

$html = '<div class="qode_clients clearfix '.$columns.' '.$clients_style.'">';

$html .= do_shortcode($content);

$html .= '</div>';

print $html;