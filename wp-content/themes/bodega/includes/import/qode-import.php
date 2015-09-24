<?php
if (!function_exists ('add_action')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}
class Qode_Import {

    public $message = "";
    public $attachments = false;
    function Qode_Import() {
        add_action('admin_menu', array(&$this, 'qode_admin_import'));
        add_action('admin_init', array(&$this, 'register_qode_theme_settings'));

    }
    function register_qode_theme_settings() {
        register_setting( 'qode_options_import_page', 'qode_options_import');
    }

    function init_qode_import() {
        if(isset($_REQUEST['import_option'])) {
            $import_option = $_REQUEST['import_option'];
            if($import_option == 'content'){
                $this->import_content('proya_content.xml');
            }elseif($import_option == 'custom_sidebars') {
                $this->import_custom_sidebars('custom_sidebars.txt');
            } elseif($import_option == 'widgets') {
                $this->import_widgets('widgets.txt','custom_sidebars.txt');
            } elseif($import_option == 'options'){
                $this->import_options('options.txt');
            }elseif($import_option == 'menus'){
                $this->import_menus('menus.txt');
            }elseif($import_option == 'settingpages'){
                $this->import_settings_pages('settingpages.txt');
            }elseif($import_option == 'complete_content'){
                $this->import_content('proya_content.xml');
                $this->import_options('options.txt');
                $this->import_widgets('widgets.txt','custom_sidebars.txt');
                $this->import_menus('menus.txt');
                $this->import_settings_pages('settingpages.txt');
                $this->message = __("Content imported successfully", "qode");
            }
        }
    }

    public function import_content($file){
        if (!class_exists('WP_Importer')) {
            ob_start();
            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            require_once($class_wp_importer);
            require_once(get_template_directory() . '/includes/import/class.wordpress-importer.php');
            $qode_import = new WP_Import();
            set_time_limit(0);
            $path = get_template_directory() . '/includes/import/files/' . $file;

            $qode_import->fetch_attachments = $this->attachments;
            $returned_value = $qode_import->import($file);
            if(is_wp_error($returned_value)){
                $this->message = __("An Error Occurred During Import", "qode");
            }
            else {
                $this->message = __("Content imported successfully", "qode");
            }
            ob_get_clean();
        } else {
            $this->message = __("Error loading files", "qode");
        }
    }

    public function import_widgets($file, $file2){
        $this->import_custom_sidebars($file2);
        $options = $this->file_options($file);
        foreach ((array) $options['widgets'] as $qode_widget_id => $qode_widget_data) {
            update_option( 'widget_' . $qode_widget_id, $qode_widget_data );
        }
        $this->import_sidebars_widgets($file);
        $this->message = __("Widgets imported successfully", "qode");
    }

    public function import_sidebars_widgets($file){
        $qode_sidebars = get_option("sidebars_widgets");
        unset($qode_sidebars['array_version']);
        $data = $this->file_options($file);
        if ( is_array($data['sidebars']) ) {
            $qode_sidebars = array_merge( (array) $qode_sidebars, (array) $data['sidebars'] );
            unset($qode_sidebars['wp_inactive_widgets']);
            $qode_sidebars = array_merge(array('wp_inactive_widgets' => array()), $qode_sidebars);
            $qode_sidebars['array_version'] = 2;
            wp_set_sidebars_widgets($qode_sidebars);
        }
    }

    public function import_custom_sidebars($file){
        $options = $this->file_options($file);
        update_option( 'qode_sidebars', $options);
        $this->message = __("Custom sidebars imported successfully", "qode");
    }

    public function import_options($file){
        $options = $this->file_options($file);
        update_option( 'qode_options_cayman', $options);
        $this->message = __("Options imported successfully", "qode");
    }

    public function import_menus($file){
        global $wpdb;
        $qode_terms_table = $wpdb->prefix . "terms";
        $this->menus_data = $this->file_options($file);
        $menu_array = array();
        foreach ($this->menus_data as $registered_menu => $menu_slug) {
            $term_rows = $wpdb->get_results($wpdb->prepare("SELECT * FROM $qode_terms_table where slug=%s", $menu_slug), ARRAY_A);
            if(isset($term_rows[0]['term_id'])) {
                $term_id_by_slug = $term_rows[0]['term_id'];
            } else {
                $term_id_by_slug = null;
            }
            $menu_array[$registered_menu] = $term_id_by_slug;
        }
        set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );

    }
    public function import_settings_pages($file){
        $pages = $this->file_options($file);
        foreach($pages as $qode_page_option => $qode_page_id){
            update_option( $qode_page_option, $qode_page_id);
        }
    }

    public function file_options($file){
        $file_content = "";
        $file_for_import = get_template_directory() . '/includes/import/files/' . $file;
        /*if ( file_exists($file_for_import) ) {
            $file_content = $this->qode_file_contents($file_for_import);
        } else {
            $this->message = __("File doesn't exist", "qode");
        }*/
        $file_content = $this->qode_file_contents($file);
        if ($file_content) {
            $unserialized_content = unserialize(base64_decode($file_content));
            if ($unserialized_content) {
                return $unserialized_content;
            }
        }
        return false;
    }

    function qode_file_contents( $path ) {
		$url      = "http://demo.select-themes.com/bodega-export/".$path;
		//echo $url;
		$response = wp_remote_get($url);
		$body     = wp_remote_retrieve_body($response);
		//echo $body;
		return $body;
    }

    function qode_admin_import() {
		$slug = "_tabimport";
		$this->pagehook = add_submenu_page(
			'qode_theme_menu',
			'Select Options - Select Import',                   // The value used to populate the browser's title bar when the menu page is active
			'Import',                   // The text of the menu in the administrator's sidebar
			'administrator',                  // What roles are able to access the menu
			'qode_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
			array(&$this, 'qode_generate_import_page')
		);
        //$this->pagehook = add_menu_page('Qode Import', 'Qode Import', 'manage_options', 'qode_options_import_page', array(&$this, 'qode_generate_import_page'),'dashicons-download');
    }

    function qode_generate_import_page() {
		qode_enqueue_admin_styles();
		wp_enqueue_style('qodef-import');

		qode_enqueue_admin_scripts();

		global $qodeFramework;
		$tab    = qode_get_admin_tab();
		?>
		<div class="qodef-options-page qodef-page">

			<div class="qodef-page-header page-header clearfix">
				<img src="<?php echo get_template_directory_uri() . '/framework/admin/assets/img/qode-logo.png' ?>" alt="qode_logo" class="qodef-header-logo pull-left"/>
				<?php $current_theme = wp_get_theme(); ?>
				<h2 class="qodef-page-title pull-left">
					<?php echo esc_attr($current_theme->get('Name')); ?>
					<small><?php echo esc_attr($current_theme->get('Version')); ?></small>
				</h2>
			</div> <!-- close div.qodef-page-header -->

			<div class="qodef-page-content-wrapper">
				<div class="qodef-page-content">
					<div class="qodef-page-navigation qodef-tabs-wrapper vertical left clearfix">

						<div class="qodef-tabs-navigation-wrapper">

							<ul class="nav nav-tabs clearfix">
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
								<li class="active"><a href="<?php echo get_admin_url(); ?>admin.php?page=qode_theme_menu_tabimport"><i class="fa fa-download qodef-tooltip qodef-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="Import"></i><span>Import</span></a></li>

							</ul>
						</div> <!-- close div.qodef-tabs-navigation-wrapper -->

						<div class="qodef-tabs-content">
							<div class="tab-content">
										<div class="tab-pane fade in active" id="import">
											<div class="qodef-tab-content">
												<h2 class="qodef-page-title">Import</h2>
												<form method="post" class="qode_ajax_form qodef-import-page-holder">
													<div class="qodef-page-form">
														<div class="qodef-page-form-section-holder">
															<h3 class="qodef-page-section-title">Import Demo Content</h3>
															<div class="qodef-page-form-section">
																<div class="qodef-field-desc">
																	<h4>Import</h4>

																	<p>Choose demo content you want to import</p>
																</div>
																<!-- close div.qodef-field-desc -->

																<div class="qodef-section-content">
																	<div class="container-fluid">
																		<div class="row">
																			<div class="col-lg-3">
																				<select name="import_example" id="import_example" class="form-control qodef-form-element dependence">
									                                                 <option value="bodega1">Bodega 1 - Roast</option>
									                                                 <option value="bodega2">Bodega 2 - Fringe</option>
									                                                 <option value="bodega3">Bodega 3 - Brunch</option>
									                                                 <option value="bodega4">Bodega 4 - Olive</option>
									                                                 <option value="bodega5">Bodega 5 - Amsterdam</option>
									                                                 <option value="bodega6">Bodega 6 - Lodger</option>
									                                                 <option value="bodega7">Bodega 7 - Konstrukt</option>
									                                                 <option value="bodega8">Bodega 8 - Wallpaper</option>
									                                                 <option value="bodega9">Bodega 9 - Mojito</option>
									                                                 <option value="bodega10">Bodega 10 - Tune</option>
									                                                 <option value="bodega11">Bodega 11 - Suburbia</option>
									                                                 <option value="bodega12">Bodega 12 - Cookbook</option>
									                                                 <option value="bodega13">Bodega 13 - Americana</option>
									                                                 <option value="bodega14">Bodega 14 - Gloss</option>
									                                                 <option value="bodega15">Bodega 15 - Poster</option>
									                                                 <option value="bodega16">Bodega 16 - Bonbon</option>
									                                                 <option value="bodega17">Bodega 17 - Lavender</option>
									                                                 <option value="bodega18">Bodega 18 - Counselor</option>
									                                                 <option value="bodega19">Bodega 19 - Runway</option>
									                                                 <option value="bodega20">Bodega 20 - Chocolat</option>
									                                                 <option value="bodega21">Bodega 21 - Caramel</option>
									                                                 <option value="bodega22">Bodega 22 - Jewel </option>
									                                                 <option value="bodega23">Bodega 23 - Ink</option>
									                                                 <option value="bodega24">Bodega 24 - Bouquet </option>
									                                                 <option value="bodega25">Bodega 25 - Steak</option>
									                                                 <option value="bodega26">Bodega 26 - Catalogue</option>
									                                                 <option value="bodega27">Bodega 27 - Polaroid</option>
									                                                 <option value="bodega28">Bodega 28 - Startup</option>
									                                                 <option value="bodega29">Bodega 29 - Sequin</option>
									                                                 <option value="bodega30">Bodega 30 - Remake</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																<!-- close div.qodef-section-content -->

															</div>

															<div class="qodef-page-form-section">


																<div class="qodef-field-desc">
																	<h4>Import Type</h4>

																	<p>Enabling this option will switch to a Side Position (default is Top Position)</p>
																</div>
																<!-- close div.qodef-field-desc -->



																<div class="qodef-section-content">
																	<div class="container-fluid">
																		<div class="row">
																			<div class="col-lg-3">
																				<select name="import_option" id="import_option" class="form-control qodef-form-element">
																					<option value="">Please Select</option>
																					<option value="complete_content">All</option>
																					<option value="content">Content</option>
																					<option value="widgets">Widgets</option>
																					<option value="options">Options</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																<!-- close div.qodef-section-content -->

															</div>
															<div class="qodef-page-form-section">


																<div class="qodef-field-desc">
																	<h4>Import attachments</h4>

																	<p>Do you want to import media files?</p>
																</div>
																<!-- close div.qodef-field-desc -->
																<div class="qodef-section-content">
																	<div class="container-fluid">
																		<div class="row">
																			<div class="col-lg-12">
																				<p class="field switch">
																					<label class="cb-enable dependence"><span>Yes</span></label>
																					<label class="cb-disable selected dependence"><span>No</span></label>
																					<input type="checkbox" id="import_attachments" class="checkbox" name="import_attachments" value="1">
																				</p>
																			</div>
																		</div>
																	</div>
																</div>
																<!-- close div.qodef-section-content -->
															</div>
															<div class="qodef-page-form-section">


																<div class="qodef-field-desc">
																	<input type="submit" class="btn btn-primary btn-sm " value="Import" name="import" id="import_demo_data" />
																</div>
																<!-- close div.qodef-field-desc -->
																<div class="qodef-section-content">
																	<div class="container-fluid">
																		<div class="row">
																			<div class="col-lg-12">
																				<div class="import_load"><span><?php _e('The import process may take some time. Please be patient.', 'qode') ?> </span><br />
																					<div class="qode-progress-bar-wrapper html5-progress-bar">
																						<div class="progress-bar-wrapper">
																							<progress id="progressbar" value="0" max="100"></progress>
																						</div>
																						<div class="progress-value">0%</div>
																						<div class="progress-bar-message">
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<!-- close div.qodef-section-content -->
															</div>
															<div class="qodef-page-form-section qodef-import-button-wrapper">

																<div class="alert alert-warning">
																	<strong><?php _e('Important notes:', 'qode') ?></strong>
																	<ul>
																		<li><?php _e('Please note that import process will take time needed to download all attachments from demo web site.', 'qode'); ?></li>
																		<li> <?php _e('If you plan to use shop, please install WooCommerce before you run import.', 'qode')?></li>
																	</ul>
																</div>
															</div>
														</div>

													</div>
												</form>

											</div><!-- close qodef-tab-content -->
										</div>
							</div>
						</div> <!-- close div.qodef-tabs-content -->

					</div> <!-- close div.qodef-page-navigation -->

				</div> <!-- close div.qodef-page-content -->

			</div> <!-- close div.qodef-page-content-wrapper -->

		</div> <!-- close div.qode-options-page -->

        <script type="text/javascript">
			(function($) {
				$(document).ready(function() {
					$(document).on('click', '#import_demo_data', function(e) {
						e.preventDefault();
						if (confirm('Are you sure, you want to import Demo Data now?')) {
							$('.import_load').css('display','block');
							var progressbar = $('#progressbar');
							var import_opt = $( "#import_option" ).val();
							var import_expl = $( "#import_example" ).val();
							var p = 0;
							if(import_opt == 'content'){
								for(var i=1;i<10;i++){
									var str;
									if (i < 10) str = 'bodega_content_0'+i+'.xml';
									else str = 'bodega_content_'+i+'.xml';
									jQuery.ajax({
										type: 'POST',
										url: ajaxurl,
										data: {
											action: 'qode_dataImport',
											xml: str,
											example: import_expl,
											import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
										},
										success: function(data, textStatus, XMLHttpRequest){
											p+= 10;
											$('.progress-value').html((p) + '%');
											progressbar.val(p);
											if (p == 90) {
												str = 'bodega_content_10.xml';
												jQuery.ajax({
													type: 'POST',
													url: ajaxurl,
													data: {
														action: 'qode_dataImport',
														xml: str,
														example: import_expl,
														import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
													},
													success: function(data, textStatus, XMLHttpRequest){
														p+= 10;
														$('.progress-value').html((p) + '%');
														progressbar.val(p);
														$('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
													},
													error: function(MLHttpRequest, textStatus, errorThrown){
													}
												});
											}
										},
										error: function(MLHttpRequest, textStatus, errorThrown){
										}
									});
								}
							} else if(import_opt == 'widgets') {
								jQuery.ajax({
									type: 'POST',
									url: ajaxurl,
									data: {
										action: 'qode_widgetsImport',
										example: import_expl
									},
									success: function(data, textStatus, XMLHttpRequest){
										$('.progress-value').html((100) + '%');
										progressbar.val(100);
									},
									error: function(MLHttpRequest, textStatus, errorThrown){
									}
								});
								$('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
							} else if(import_opt == 'options'){
								jQuery.ajax({
									type: 'POST',
									url: ajaxurl,
									data: {
										action: 'qode_optionsImport',
										example: import_expl
									},
									success: function(data, textStatus, XMLHttpRequest){
										$('.progress-value').html((100) + '%');
										progressbar.val(100);
									},
									error: function(MLHttpRequest, textStatus, errorThrown){
									}
								});
								$('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
							}else if(import_opt == 'complete_content'){
								for(var i=1;i<10;i++){
									var str;
									if (i < 10) str = 'bodega_content_0'+i+'.xml';
									else str = 'bodega_content_'+i+'.xml';
									jQuery.ajax({
										type: 'POST',
										url: ajaxurl,
										data: {
											action: 'qode_dataImport',
											xml: str,
											example: import_expl,
											import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
										},
										success: function(data, textStatus, XMLHttpRequest){
											p+= 10;
											$('.progress-value').html((p) + '%');
											progressbar.val(p);
											if (p == 90) {
												str = 'bodega_content_10.xml';
												jQuery.ajax({
													type: 'POST',
													url: ajaxurl,
													data: {
														action: 'qode_dataImport',
														xml: str,
														example: import_expl,
														import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
													},
													success: function(data, textStatus, XMLHttpRequest){
														jQuery.ajax({
															type: 'POST',
															url: ajaxurl,
															data: {
																action: 'qode_otherImport',
																example: import_expl
															},
															success: function(data, textStatus, XMLHttpRequest){
																//alert(data);
																$('.progress-value').html((100) + '%');
																progressbar.val(100);
																$('.progress-bar-message').html('<div class="alert alert-success">Import is completed.</div>');
															},
															error: function(MLHttpRequest, textStatus, errorThrown){
															}
														});
													},
													error: function(MLHttpRequest, textStatus, errorThrown){
													}
												});
											}
										},
										error: function(MLHttpRequest, textStatus, errorThrown){
										}
									});
								}
							}
						}
						return false;
					});
				});
			})(jQuery);

        </script>

    <?php	}

}
global $my_Qode_Import;
$my_Qode_Import = new Qode_Import();



if(!function_exists('qode_dataImport')){
    function qode_dataImport(){
        global $my_Qode_Import;

        if ($_POST['import_attachments'] == 1)
            $my_Qode_Import->attachments = true;
        else
            $my_Qode_Import->attachments = false;

        $folder = "bodega1/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $my_Qode_Import->import_content($folder.$_POST['xml']);

        die();
    }

    add_action('wp_ajax_qode_dataImport', 'qode_dataImport');
}

if(!function_exists('qode_widgetsImport')){
    function qode_widgetsImport(){
        global $my_Qode_Import;

        $folder = "bodega1/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $my_Qode_Import->import_widgets($folder.'widgets.txt',$folder.'custom_sidebars.txt');

        die();
    }

    add_action('wp_ajax_qode_widgetsImport', 'qode_widgetsImport');
}

if(!function_exists('qode_optionsImport')){
    function qode_optionsImport(){
        global $my_Qode_Import;

        $folder = "bodega1/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $my_Qode_Import->import_options($folder.'options.txt');

        die();
    }

    add_action('wp_ajax_qode_optionsImport', 'qode_optionsImport');
}

if(!function_exists('qode_otherImport')){
    function qode_otherImport(){
        global $my_Qode_Import;

        $folder = "bodega1/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $my_Qode_Import->import_options($folder.'options.txt');
        $my_Qode_Import->import_widgets($folder.'widgets.txt',$folder.'custom_sidebars.txt');
        $my_Qode_Import->import_menus($folder.'menus.txt');
        $my_Qode_Import->import_settings_pages($folder.'settingpages.txt');

        die();
    }

    add_action('wp_ajax_qode_otherImport', 'qode_otherImport');
}