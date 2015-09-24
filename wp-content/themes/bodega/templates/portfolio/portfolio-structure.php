<?php
//get global variables
global $wp_query;
global $qode_options;

//init variables
$id 						= $wp_query->get_queried_object_id();
$container_styles			= 'style="';

//is page background color set for current page?
if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$container_styles .= 'background-color: '. esc_attr(get_post_meta($id, "qode_page_background_color", true)).';';
}

//close style tag. Don't delete this line
$container_styles .= '"';

//get current portfolio template
$portfolio_template = 'small-images';
if(get_post_meta($id, "qode_choose-portfolio-single-view", true) != "") {
	$portfolio_template = get_post_meta($id, "qode_choose-portfolio-single-view", true);
} elseif($qode_options['portfolio_style'] !== '') {
	$portfolio_template = $qode_options['portfolio_style'];
}

if(get_post_meta($id, "qode_content-top-padding", true) != ""){
	$content_style = esc_attr(get_post_meta($id, "qode_content-top-padding", true));
}else{
	$content_style = "";
}
?>

<div class="container" <?php echo $container_styles; /* dynamically generated style attr. Note that is escaped on line 8-16 */ ?>>
	<div class="container_inner default_template_holder clearfix" <?php if($content_style != "") { echo " style='padding-top:". $content_style ."px'";} ?>>
		<div class="portfolio_single <?php echo esc_attr($portfolio_template); ?>">
			<?php
				if (post_password_required()) {
					echo get_the_password_form();
				} else {
					//load proper portfolio file based on portfolio template
					get_template_part('templates/portfolio/portfolio', $portfolio_template);

					get_template_part('templates/portfolio/parts/portfolio-navigation');

					get_template_part('templates/portfolio/parts/portfolio-comments');
				}
			?>
		</div> <!-- close div.portfolio single -->
	</div> <!-- close div.container inner -->
</div> <!-- close div.container -->