<?php
global $qode_options;

//get portfolio date value
$portfolio_hide_date = "";
if(isset($qode_options['portfolio_hide_date'])){
	$portfolio_hide_date = $qode_options['portfolio_hide_date'];
}

if($portfolio_hide_date != "yes"){

    $portfolio_info_tag             = 'h6';
    $portfolio_info_style           = '';

    //set info tag
    if (isset($qode_options['portfolio_info_tag'])) {
    $portfolio_info_tag = $qode_options['portfolio_info_tag'];
    }

    //set style for info
    if ((isset($qode_options['portfolio_info_margin_bottom']) && $qode_options['portfolio_info_margin_bottom'] != '')
    || (isset($qode_options['portfolio_info_color']) && !empty($qode_options['portfolio_info_color']))) {

    $portfolio_info_style = 'style ="';

    if (isset($qode_options['portfolio_info_margin_bottom']) && $qode_options['portfolio_info_margin_bottom'] != '') {
    $portfolio_info_style .= 'margin-bottom:' . esc_attr($qode_options['portfolio_info_margin_bottom']) . 'px;';
    }

    if (isset($qode_options['portfolio_info_color']) && !empty($qode_options['portfolio_info_color'])) {
    $portfolio_info_style .= 'color:'.esc_attr($qode_options['portfolio_info_color']).';';
    }

    $portfolio_info_style .= '"';

    }

   ?>


	<div class="info portfolio_single_custom_date">
		<<?php echo esc_attr($portfolio_info_tag); ?> class="info_section_title" <?php echo $portfolio_info_style; /* dynamically generated style attr. Note that is escaped on line 24-34 */ ?>><?php _e('Date','qode'); ?></<?php echo esc_attr($portfolio_info_tag); ?>>
        <p><?php the_time(get_option('date_format')); ?></p>
	</div>
<?php } ?>