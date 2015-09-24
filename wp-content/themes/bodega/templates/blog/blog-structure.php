<?php
	global $wp_query;
	global $qode_options;
    global $qode_template_name;
	$id = $wp_query->get_queried_object_id();

	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }

	$sidebar = $qode_options['category_blog_sidebar'];

	if(isset($qode_options['blog_page_range']) && $qode_options['blog_page_range'] != ""){
		$blog_page_range = esc_attr($qode_options['blog_page_range']);
	} else{
		$blog_page_range = $wp_query->max_num_pages;
	}

	$filter = "no";
	if(isset($qode_options['blog_masonry_filter'])){
		$filter = $qode_options['blog_masonry_filter'];
	}
    $blog_style = "1";

	$blog_style = "1";
	if(isset($qode_options['blog_style'])){
		$blog_style = $qode_options['blog_style'];
	}

	$blog_list = "";
	if($qode_template_name != "") {
		if($qode_template_name == "blog-date-in-title.php"){
			$blog_list = "blog_date_in_title";
			$blog_list_class = "blog_date_in_title";
		}
		elseif($qode_template_name == "blog-masonry.php"){
			$blog_list = "blog_masonry";
			$blog_list_class = "masonry";
		}elseif($qode_template_name == "blog-split-column.php"){
			$blog_list = "blog_split_column";
			$blog_list_class = "blog_split_column";
		}elseif($qode_template_name == "blog-masonry-full-width.php"){
			$blog_list = "blog_masonry";
			$blog_list_class = "masonry_full_width";
		}elseif($qode_template_name == "blog-category-title-first-centered.php"){
            $blog_list = "blog_category_title_first_centered";
            $blog_list_class = "blog_category_title_first_centered";
        }elseif($qode_template_name == "blog-standard.php"){
            $blog_list = "blog_standard";
            $blog_list_class = "blog_standard_type";
        }elseif($qode_template_name == "blog-standard-whole-post.php"){
			$blog_list = "blog_standard_whole_post";
			$blog_list_class = "blog_standard_type";
		}elseif($qode_template_name == "blog-post-info-hierarchical.php"){
            $blog_list = "blog_post_info_hierarchical";
            $blog_list_class = "blog_post_info_hierarchical";
        }elseif($qode_template_name == "blog-title-author-centered.php"){
            $blog_list = "blog_title_author_centered";
            $blog_list_class = "blog_title_author_centered";
        }
		else{
			$blog_list = "blog_standard";
			$blog_list_class = "blog_standard_type";
		}
	} else{
		if($blog_style=="1"){
			$blog_list = "blog_standard";
			$blog_list_class = "blog_standard_type";
		}elseif($blog_style=="2"){
			$blog_list = "blog_split_column";
			$blog_list_class = "blog_split_column";
        }elseif($blog_style=="3"){
			$blog_list = "blog_masonry";
			$blog_list_class = "masonry";
        }elseif($blog_style=="4"){
			$blog_list = "blog_masonry";
			$blog_list_class = "masonry_full_width";
        }elseif($blog_style=="5"){
			$blog_list = "blog_date_in_title";
			$blog_list_class = "blog_date_in_title";
        }elseif($blog_style=="6"){
			$blog_list = "blog_post_info_hierarchical";
			$blog_list_class = "blog_post_info_hierarchical";
        }elseif($blog_style=="7"){
			$blog_list = "blog_category_title_first_centered";
			$blog_list_class = "blog_category_title_first_centered";
        }elseif($blog_style=="8"){
			$blog_list = "blog_title_author_centered";
			$blog_list_class = "blog_title_author_centered";
		}elseif($blog_style=="9"){
			$blog_list = "blog_standard_whole_post";
			$blog_list_class = "blog_standard_type";
		}else {
			$blog_list = "blog_standard";
			$blog_list_class = "blog_standard_type";
		}
	}

    $pagination_masonry = "pagination";
    if(isset($qode_options['pagination_masonry'])){
       $pagination_masonry = $qode_options['pagination_masonry'];
		if($blog_list == "blog_masonry") {
			$blog_list_class .= " masonry_" . $pagination_masonry;
		}
    }
?>
<?php

	if($blog_list == "blog_masonry" && $filter == "yes") {
		get_template_part('templates/blog/masonry', 'filter');

	}

?>
<div class="blog_holder <?php echo esc_attr($blog_list_class); ?>">
	<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
		<?php
			get_template_part('templates/blog/'.$blog_list, 'loop');
		?>
	<?php endwhile; ?>
	<?php if($blog_list != "blog_masonry") {
			pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
	<?php } ?>
	<?php else: //If no posts are present ?>
	<div class="entry">
			<p><?php _e('No posts were found.', 'qode'); ?></p>
	</div>
	<?php endif; ?>
</div>
<?php if($blog_list == "blog_masonry") {
    if($pagination_masonry == "load_more") {
		if (get_next_posts_link()) { ?>
			<div class="blog_load_more_button_holder">
				<div class="blog_load_more_button"><span data-rel="<?php echo esc_attr($wp_query->max_num_pages); ?>"><?php echo get_next_posts_link(__('Show more', 'qode')); ?></span></div>
			</div>
		<?php } ?>
	 <?php } elseif($pagination_masonry == "infinite_scroll") { ?>
		<div class="blog_infinite_scroll_button"><span data-rel="<?php echo esc_attr($wp_query->max_num_pages); ?>"><?php echo get_next_posts_link(__('Show more', 'qode')); ?></span></div>
    <?php }else { ?>
        <?php if($qode_options['pagination'] != "0") : ?>
            <?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
        <?php endif; ?>
    <?php } ?>
<?php } ?>