<?php

$id = get_the_ID();

$chosen_sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
$default_array = array('default', '');

if(!in_array($chosen_sidebar, $default_array)){
	$sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
}else{
	$sidebar = $qode_options['blog_single_sidebar'];
}

$blog_single_show_comments = "";
if (isset($qode_options['blog_single_show_comments']))
	$blog_single_show_comments = $qode_options['blog_single_show_comments'];

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = esc_attr(get_post_meta($id, "qode_page_background_color", true));
}else{
	$background_color = "";
}
$blog_single_loop = "blog_date_in_title";
if (isset($qode_options['blog_single_style']) && ($qode_options['blog_single_style']) !=="") {
    $blog_single_loop = $qode_options['blog_single_style'];
}
$content_style = "";
if(get_post_meta($id, "qode_content-top-padding", true) != ""){
	if(get_post_meta($id, "qode_content-top-padding-mobile", true) == 'yes'){
		$content_style = "style='padding-top:".esc_attr(get_post_meta($id, "qode_content-top-padding", true))."px !important'";
	}else{
		$content_style = "style='padding-top:".esc_attr(get_post_meta($id, "qode_content-top-padding", true))."px'";
	}
}
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
				<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
					<script>
					var page_scroll_amount_for_sticky = <?php echo esc_attr(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)); ?>;
					</script>
				<?php } ?>
					<?php get_template_part( 'title' ); ?>
				<?php
				$revslider = get_post_meta($id, "qode_revolution-slider", true);
				if (!empty($revslider)){ ?>
					<div class="q_slider"><div class="q_slider_inner">
					<?php echo do_shortcode($revslider); ?>
					</div></div>
				<?php
				}
				?>
				<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
					<div class="container_inner default_template_holder" <?php if($content_style != "") { echo $content_style; /* dynamically generated style attr. Note that is escaped on line 30-32 */ } ?>>
				
					<?php if(($sidebar == "default")||($sidebar == "")) : ?>
						<div class="blog_holder blog_single <?php echo esc_attr($blog_single_loop )?>">
						<?php 
							get_template_part('templates/blog/blog_single', 'loop');
						?>
						<?php
							if($blog_single_show_comments == "yes"){
								comments_template('', true); 
							}else{
								echo "<br/><br/>";
							}
						?> 
						
					<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
						<?php if($sidebar == "1") : ?>	
							<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1 content_left_from_sidebar">
						<?php elseif($sidebar == "2") : ?>	
							<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
								<div class="column1 content_left_from_sidebar">
						<?php endif; ?>
					
									<div class="column_inner">
										<div class="blog_holder blog_single <?php echo esc_attr($blog_single_loop); ?>">
											<?php 
												get_template_part('templates/blog/blog_single', 'loop');
											?>
										</div>
										
										<?php
											if($blog_single_show_comments == "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
										?> 
									</div>
								</div>	
								<div class="column2"> 
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
							<?php if($sidebar == "3") : ?>	
								<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2 content_right_from_sidebar">
							<?php elseif($sidebar == "4") : ?>	
								<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
									<div class="column1"> 
										<?php get_sidebar(); ?>
									</div>
									<div class="column2 content_right_from_sidebar">
							<?php endif; ?>
							
										<div class="column_inner">
											<div class="blog_holder blog_single <?php echo esc_attr($blog_single_loop); ?>">
												<?php 
													get_template_part('templates/blog/blog_single', 'loop');
												?>
											</div>
											<?php
												if($blog_single_show_comments == "yes"){
													comments_template('', true); 
												}else{
													echo "<br/><br/>";
												}
											?> 
										</div>
									</div>	
									
								</div>
						<?php endif; ?>
					</div>
				</div>
			</div>						
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	