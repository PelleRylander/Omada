<?php

function qode_theme_display() {
	global $qodeFramework;
	$tab    = qode_get_admin_tab();
	$active_page = $qodeFramework->qodeOptions->getAdminPageFromSlug($tab);
	if ($active_page == null) return;
	?>
	<div class="qodef-options-page qodef-page">

		<div class="qodef-page-header page-header clearfix">
			<img src="<?php echo get_template_directory_uri() . '/framework/admin/assets/img/qode-logo.png' ?>" alt="qode_logo" class="qodef-header-logo pull-left"/>
			<?php $current_theme = wp_get_theme(); ?>
			<h2 class="qodef-page-title pull-left">
				<?php echo esc_html($current_theme->get('Name')); ?>
				<small><?php echo esc_html($current_theme->get('Version')); ?></small>
			</h2>
			<div class="pull-right"> <input type="button" id="qode_top_save_button" class="btn btn-primary btn-sm pull-right" value="<?php _e('Save Changes', 'qode'); ?>"/></div>
		</div> <!-- close div.qodef-page-header -->

		<div class="qodef-page-content-wrapper">
			<div class="qodef-page-content">
				<div class="qodef-page-navigation qodef-tabs-wrapper vertical left clearfix">

					<div class="qodef-tabs-navigation-wrapper">
						<ul class="nav nav-tabs">
							<?php
							foreach ($qodeFramework->qodeOptions->adminPages as $key=>$page ) {
								$slug = "";
								if (!empty($page->slug)) $slug = "_tab".$page->slug;
								?>
								<li<?php if ($page->slug == $tab) echo " class=\"active\""; ?>>
									<a href="<?php echo get_admin_url(); ?>admin.php?page=qode_theme_menu<?php echo esc_attr($slug); ?>">
										<?php if($page->icon !== '') { ?>
											<i class="<?php echo esc_attr($page->icon); ?> qodef-tooltip qodef-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php echo esc_attr($page->title); ?>"></i>
										<?php } ?>
										<span><?php echo esc_html($page->title); ?></span>
									</a>
								</li>
							<?php
							}
							?>
							<li><a href="<?php echo get_admin_url(); ?>admin.php?page=qode_theme_menu_tabimport"><i class="fa fa-download qodef-tooltip qodef-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="Import"></i><span>Import</span></a></li>
						</ul>
					</div> <!-- close div.qodef-tabs-navigation-wrapper -->

					<div class="qodef-tabs-content">
						<div class="tab-content">
							<?php
							foreach ($qodeFramework->qodeOptions->adminPages as $key=>$page ) {
								if ($page->slug == $tab) {
									?>
									<div class="tab-pane fade<?php if ($page->slug == $tab) echo " in active"; ?>" id="<?php echo esc_attr($key); ?>">
										<div class="qodef-tab-content">
											<h2 class="qodef-page-title"><?php echo esc_html($page->title); ?></h2>


											<form method="post" class="qode_ajax_form">
												<div class="qodef-page-form">
													<?php $page->render(); ?>

													<div class="form-button-section clearfix">
														<div class="qodef-input-change">You should save your changes</div>
														<div class="qodef-changes-saved">All your changes are successfully saved</div>
														<div class="form-buttom-section-holder" id="anchornav">
															<div class="form-button-section-inner clearfix" >

																<div class="container-fluid">
																	<div class="row">
																		<div class="col-lg-10">
																			<ul class="pull-left">
																				<li>Scroll To:</li>
																				<?php
																				foreach ($page->layout as $key=>$panel ) {
																					?>
																					<li><a href="#qodef_<?php echo esc_attr($panel->name); ?>"><?php echo esc_attr($panel->title); ?></a></li>
																				<?php
																				}
																				?>
																			</ul>
																		</div>
																		<div class="col-lg-2">
																			<input type="submit" class="btn btn-primary btn-sm pull-right" value="<?php _e('Save Changes', 'qode'); ?>"/>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>
												</div>
											</form>

										</div><!-- close qodef-tab-content -->
									</div>
								<?php
								}
							}
							?>
						</div>
					</div> <!-- close div.qodef-tabs-content -->

				</div> <!-- close div.qodef-page-navigation -->

			</div> <!-- close div.qodef-page-content -->

		</div> <!-- close div.qodef-page-content-wrapper -->

	</div> <!-- close div.qode-options-page -->
<?php }