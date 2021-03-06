<?php get_header(); ?>
<?php
global $wp_query;
$id = $wp_query->get_queried_object_id();
if(get_post_meta($id, "qode_show-sidebar", true) == ''){
		$sidebar = $qode_options['category_blog_sidebar'];
}
else{
	$sidebar = get_post_meta($id, "qode_show-sidebar", true);
}

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = esc_attr(get_post_meta($id, "qode_page_background_color", true));
}else{
	$background_color = "";
}

?>

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
<?php if($qode_options['blog_style'] == 4){ ?>

	<div class="full_width">
		<div class="full_width_inner">

			<?php
			get_template_part('templates/blog/blog-structure', 'loop');
			?>

		</div>
	</div>

	<?php } else { ?>

	<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
		<div class="container_inner default_template_holder clearfix">
			<?php if(($sidebar == "default")||($sidebar == "")) : ?>
				<?php
					get_template_part('templates/blog/blog', 'structure');
				?>
			<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
				<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1 content_left_from_sidebar">
						<div class="column_inner">
							<?php
								get_template_part('templates/blog/blog', 'structure');
							?>
						</div>
					</div>
					<div class="column2">
						<?php get_sidebar(); ?>
					</div>
				</div>
		<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
					<?php get_sidebar(); ?>
					</div>
					<div class="column2 content_right_from_sidebar">
						<div class="column_inner">
							<?php
								get_template_part('templates/blog/blog', 'structure');
							?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php } ?>
<?php get_footer(); ?>