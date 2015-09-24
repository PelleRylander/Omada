<?php
global $qode_options;

//init variables
$uncovering_footer					= false;
$footer_classes_array				= array();
$footer_classes						= '';
$footer_border_columns				= 'yes';
$footer_top_border_color            = '';
$footer_top_border_in_grid          = '';
$footer_bottom_border_color         = '';
$footer_bottom_border_bottom_color  = '';
$footer_bottom_border_in_grid       = '';
$oblique_section_position           = '';

if(isset($qode_options['footer_border_columns']) && $qode_options['footer_border_columns'] !== '') {
	$footer_border_columns = $qode_options['footer_border_columns'];
}

if(!empty($qode_options['footer_top_border_color'])) {
    if (isset($qode_options['footer_top_border_width']) && $qode_options['footer_top_border_width'] !== '') {
        $footer_border_height = esc_attr($qode_options['footer_top_border_width']);
        }
    else{
        $footer_border_height = '1';
    }
	$footer_top_border_color = 'style="height: '.esc_attr($footer_border_height).'px;background-color: '.esc_attr($qode_options['footer_top_border_color']).';"';
}

if(isset($qode_options['footer_top_border_in_grid']) && $qode_options['footer_top_border_in_grid'] == 'yes') {
	$footer_top_border_in_grid = 'in_grid';
}

if(!empty($qode_options['footer_bottom_border_color'])) {
    if(!empty($qode_options['footer_bottom_border_width'])) {
        $footer_bottom_border_width = esc_attr($qode_options['footer_bottom_border_width']).'px';
    }
    else{
        $footer_bottom_border_width = '1px';
    }

    $footer_bottom_border_color = 'style="height: '.$footer_bottom_border_width.';background-color: '.esc_attr($qode_options['footer_bottom_border_color']).';"';
}

if(isset($qode_options['footer_bottom_border_in_grid']) && $qode_options['footer_bottom_border_in_grid'] == 'yes') {
	$footer_bottom_border_in_grid = 'in_grid';
}

if(!empty($qode_options['footer_bottom_border_bottom_color'])) {
    if(!empty($qode_options['footer_bottom_border_bottom_width'])) {
        $footer_bottom_border_bottom_width = esc_attr($qode_options['footer_bottom_border_bottom_width']).'px';
    }
    else{
        $footer_bottom_border_bottom_width = '1px';
    }

    $footer_bottom_border_bottom_color = 'style="height: '.$footer_bottom_border_bottom_width.';background-color: '.esc_attr($qode_options['footer_bottom_border_bottom_color']).';"';
}

//is uncovering footer option set in theme options?
if(isset($qode_options['uncovering_footer']) && $qode_options['uncovering_footer'] == "yes" && isset($qode_options['paspartu']) && $qode_options['paspartu'] == 'no') {
	//add uncovering footer class to array
	$footer_classes_array[] = 'uncover';
}

if($footer_border_columns == 'yes') {
	$footer_classes_array[] = 'footer_border_columns';
}

//is some class added to footer classes array?
if(is_array($footer_classes_array) && count($footer_classes_array)) {
	//concat all classes and prefix it with class attribute
	$footer_classes = 'class="'. esc_attr(implode(' ', $footer_classes_array)).'"';
}

?>

<?php get_template_part('content-bottom-area'); ?>

    </div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<?php
if(isset($qode_options['paspartu']) && $qode_options['paspartu'] == 'yes'){?>
        </div> <!-- paspartu_inner close div -->
    </div> <!-- paspartu_outer close div -->
<?php
}
?>

<?php get_template_part('social-sidebar'); ?>

<footer <?php echo $footer_classes; /* dynamically generated class attr. Note that is escaped on line 73 */ ?>>
	<div class="footer_inner clearfix">
		<?php
		$footer_in_grid = true;
		if(isset($qode_options['footer_in_grid'])){
			if ($qode_options['footer_in_grid'] != "yes") {
				$footer_in_grid = false;
			}
		}
		$display_footer_top = true;
		if (isset($qode_options['show_footer_top'])) {
			if ($qode_options['show_footer_top'] == "no") $display_footer_top = false;
		}

		$footer_top_columns = 4;
		if (isset($qode_options['footer_top_columns'])) {
			$footer_top_columns = $qode_options['footer_top_columns'];
		}

        $footer_bottom_columns = 3;
		if (isset($qode_options['footer_bottom_columns'])) {
            $footer_bottom_columns = $qode_options['footer_bottom_columns'];
		}

		if($display_footer_top) {
			if($footer_top_border_color != ''){ ?>
				<?php if($footer_top_border_in_grid != '') { ?>
					<div class="footer_ingrid_border_holder_outer">
				<?php } ?>
						<div class="footer_top_border_holder <?php echo esc_attr($footer_top_border_in_grid); ?>" <?php echo $footer_top_border_color; /* dynamically generated style attr. Note that is escaped on line 27 */ ?>></div>
				<?php if($footer_top_border_in_grid != '') { ?>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="footer_top_holder">
				<div class="footer_top<?php if(!$footer_in_grid) {echo " footer_top_full";} ?>">
					<?php if($footer_in_grid){ ?>
					<div class="container">
						<div class="container_inner">
							<?php } ?>
							<?php switch ($footer_top_columns) {
								case 6:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_1' ); ?>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<div class="two_columns_50_50 clearfix">
													<div class="qode_column column1">
														<div class="column_inner">
															<?php dynamic_sidebar( 'footer_column_2' ); ?>
														</div>
													</div>
													<div class="qode_column column2">
														<div class="column_inner">
															<?php dynamic_sidebar( 'footer_column_3' ); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
									break;
								case 5:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<div class="two_columns_50_50 clearfix">
													<div class="qode_column column1">
														<div class="column_inner">
															<?php dynamic_sidebar( 'footer_column_1' ); ?>
														</div>
													</div>
													<div class="qode_column column2">
														<div class="column_inner">
															<?php dynamic_sidebar( 'footer_column_2' ); ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_3' ); ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 4:
									?>
									<div class="four_columns clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_1' ); ?>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_2' ); ?>
											</div>
										</div>
										<div class="qode_column column3">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_3' ); ?>
											</div>
										</div>
										<div class="qode_column column4">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_4' ); ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 3:
									?>
									<div class="three_columns clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_1' ); ?>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_2' ); ?>
											</div>
										</div>
										<div class="qode_column column3">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_3' ); ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 2:
									?>
									<div class="two_columns_50_50 clearfix">
										<div class="qode_column column1">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_1' ); ?>
											</div>
										</div>
										<div class="qode_column column2">
											<div class="column_inner">
												<?php dynamic_sidebar( 'footer_column_2' ); ?>
											</div>
										</div>
									</div>
									<?php
									break;
								case 1:
									dynamic_sidebar( 'footer_column_1' );
									break;
							}
							?>
							<?php if($footer_in_grid){ ?>
						</div>
					</div>
				<?php } ?>
				</div>
                <?php
                if (isset($qode_options['footer_oblique_section'])  && $qode_options['footer_oblique_section'] == "yes"){ ?>
                    <svg class="oblique-section svg-footer-bottom" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="86">
                        <?php if($qode_options['footer_oblique_section_position'] == 'from_left_to_right'){ ?>
                            <polygon points="0,0 0,86 86,86" />
                        <?php }
                        if($qode_options['footer_oblique_section_position'] == 'from_right_to_left'){ ?>
                            <polygon points="0,86 86,0 86,86" />
                        <?php } ?>
                    </svg>
                <?php } ?>
			</div>
		<?php } ?>
		<?php
		$display_footer_text = false;
		if (isset($qode_options['footer_text'])) {
			if ($qode_options['footer_text'] == "yes") $display_footer_text = true;
		}
		if($display_footer_text): ?>
            <?php if($footer_bottom_border_color != ''){ ?>
				<?php if($footer_bottom_border_in_grid != '') { ?>
					<div class="footer_ingrid_border_holder_outer">
				<?php } ?>
                		<div class="footer_bottom_border_holder <?php echo esc_attr($footer_bottom_border_in_grid); ?>" <?php echo $footer_bottom_border_color; /* dynamically generated style attr. Note that is escaped on line 27 */ ?>></div>
				<?php if($footer_bottom_border_in_grid != '') { ?>
					</div>
				<?php } ?>
            <?php } ?>
			<div class="footer_bottom_holder">
                <div class="footer_bottom_holder_inner">
                    <?php if($footer_in_grid){ ?>
                    <div class="container">
                        <div class="container_inner">
                            <?php } ?>

                            <?php switch ($footer_bottom_columns) {
                                case 3:
                                    ?>
                                    <div class="three_columns clearfix">
                                        <div class="qode_column column1">
                                            <div class="column_inner">
                                                <?php dynamic_sidebar( 'footer_bottom_left' ); ?>
                                            </div>
                                        </div>
                                        <div class="qode_column column2">
                                            <div class="column_inner">
                                                <?php dynamic_sidebar( 'footer_text' ); ?>
                                            </div>
                                        </div>
                                        <div class="qode_column column3">
                                            <div class="column_inner">
                                                <?php dynamic_sidebar( 'footer_bottom_right' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                case 2:
                                    ?>
                                    <div class="two_columns_50_50 clearfix">
                                        <div class="qode_column column1">
                                            <div class="column_inner">
                                                <?php dynamic_sidebar( 'footer_bottom_left' ); ?>
                                            </div>
                                        </div>
                                        <div class="qode_column column2">
                                            <div class="column_inner">
                                                <?php dynamic_sidebar( 'footer_bottom_right' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                case 1:
                                    ?>
                                    <div class="column_inner">
                                        <?php dynamic_sidebar( 'footer_text' ); ?>
                                    </div>
                                    <?php
                                    break;
                            }
                            ?>
                            <?php if($footer_in_grid){ ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
			</div>
            <?php if($footer_bottom_border_bottom_color != ''){ ?>
				<div class="footer_bottom_border_bottom_holder <?php echo esc_attr($footer_top_border_in_grid); ?>" <?php echo $footer_bottom_border_bottom_color; /* dynamically generated style attr. Note that is escaped on line 27 */ ?>></div>
			<?php } ?>
		<?php endif; ?>
	</div>
</footer>
</div> <!-- close div.wrapper_inner  -->
</div> <!-- close div.wrapper -->
<?php wp_footer(); ?>
</body>
</html>