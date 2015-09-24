<?php

// enqueue the child theme stylesheet

Function wp_schools_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);

function show_teammembers() {
	$args = array(
		'post_type' => 'team-member',
		// 'tax_query' => array(
		// 	array(
		// 		'taxonomy' => 'actor',
		// 		'field'    => 'term_id',
		// 		'terms'    => array( 103, 115, 206 ),
		// 		'operator' => 'NOT IN',
		// 	),
		),
	);
	// The Query
	$html = '';
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$html.='<div class="vc_col-sm-4 wpb_column vc_column_container "><div class="wpb_wrapper"><div class="wpb_single_image wpb_content_element vc_align_center"><div class="wpb_wrapper"><div class="vc_single_image-wrapper   vc_box_border_grey">';
			$html.=get_the_title();
			$html.='</div></div></div></div></div>';
		}
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();

	return $html;
}
add_shortcode( 'show_members', 'show_teammembers' );




<div class="vc_col-sm-4 wpb_column vc_column_container ">
	<div class="wpb_wrapper">
	
		<div class="wpb_single_image wpb_content_element vc_align_center">
			<div class="wpb_wrapper">

				<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="259" height="300" src="http://srgblender.wpengine.com/wp-content/uploads/2015/09/MegAranow-259x300.png" class="vc_single_image-img attachment-medium" alt="Meg Aranow"></div>
			</div> 
		</div> 
	</div> 
</div> 





<div class="vc_row wpb_row section vc_row-fluid" style=" text-align:left;">
	<div class=" full_section_inner clearfix">

		

		<div class="vc_col-sm-4 wpb_column vc_column_container ">
			<div class="wpb_wrapper">
			
				<div class="wpb_single_image wpb_content_element vc_align_center">
					<div class="wpb_wrapper">
		
						<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="259" height="300" src="http://srgblender.wpengine.com/wp-content/uploads/2015/09/JohnAuer-259x300.png" class="vc_single_image-img attachment-medium" alt="John Auer"></div>
					</div> 
				</div> 
			</div> 
		</div> 

		<div class="vc_col-sm-4 wpb_column vc_column_container ">
			<div class="wpb_wrapper">
			
				<div class="wpb_single_image wpb_content_element vc_align_center">
					<div class="wpb_wrapper">
		
						<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="259" height="300" src="http://srgblender.wpengine.com/wp-content/uploads/2015/09/AllenBurgtorf-259x300.png" class="vc_single_image-img attachment-medium" alt="Allen Burgtorf"></div>
					</div> 
				</div> 
			</div> 
		</div> 

	</div>
</div>

