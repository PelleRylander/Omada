<?php
require_once("lib/qode.layout.php");
require_once("lib/google-fonts.php");
require_once("lib/qode.framework.php");
require_once("lib/qode.functions.php");
require_once("lib/qode.common.php");
require_once("lib/qode.icons/qode.icons.php");
require_once("admin/options/qode-options-setup.php");
require_once("admin/meta-boxes/qode-meta-boxes-setup.php");

global $qodeFramework;

require_once("admin/skins/".$qodeFramework->getSkin()."/skin.php");

if(!function_exists('qode_admin_scripts_init')) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function qode_admin_scripts_init() {
		qode_register_skin_style('qodef-bootstrap', 'assets/css/qodef-bootstrap.css');
		wp_register_style('qodef-jquery-ui', get_template_directory_uri().'/framework/admin/assets/css/jquery-ui/jquery-ui.css');
		qode_register_skin_style('qodef-page-admin', 'assets/css/qodef-page.css');
		qode_register_skin_style('qodef-options-admin', 'assets/css/qodef-options.css');
		qode_register_skin_style('qodef-meta-boxes-admin', 'assets/css/qodef-meta-boxes.css');
		qode_register_skin_style('qodef-ui-admin', 'assets/css/qodef-ui/qodef-ui.css');
		qode_register_skin_style('qodef-forms-admin', 'assets/css/qodef-forms.css');
		qode_register_skin_style('qodef-import', 'assets/css/qodef-import.css');
		qode_register_skin_style('elegant-icons-admin', 'assets/css/elegant-icons/style.css');
		qode_register_skin_style('font-awesome-admin', 'assets/css/font-awesome/css/font-awesome.min.css');

		qode_register_skin_script('bootstrap.min', 'assets/js/bootstrap.min.js');
		qode_register_skin_script('jquery.nouislider.min', 'assets/js/qodef-ui/jquery.nouislider.min.js');
		wp_register_script('qodef-dependence', get_template_directory_uri().'/framework/admin/assets/js/qodef-ui/qodef-dependence.js');
		qode_register_skin_script('qodef-ui-admin', 'assets/js/qodef-ui/qodef-ui.js');
		qode_register_skin_script('qodef-bootstrap-select', 'assets/js/qodef-ui/qodef-bootstrap-select.min.js');
	}

	add_action('admin_init', 'qode_admin_scripts_init');
}

if(!function_exists('qode_enqueue_admin_styles')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function qode_enqueue_admin_styles() {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_style('qodef-jquery-ui');
		wp_enqueue_style('qodef-bootstrap');
		wp_enqueue_style('qodef-page-admin');
		wp_enqueue_style('qodef-options-admin');
		wp_enqueue_style('qodef-ui-admin');
		wp_enqueue_style('jquery.nouislider.min');
		wp_enqueue_style('qodef-forms-admin');
		wp_enqueue_style('elegant-icons-admin');
		wp_enqueue_style('font-awesome-admin');
	}
}

if(!function_exists('qode_enqueue_admin_scripts')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function qode_enqueue_admin_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_script('bootstrap.min');
		wp_enqueue_media();
		wp_enqueue_script('jquery.nouislider.min');
		wp_enqueue_script('qodef-dependence');
		wp_enqueue_script('qodef-ui-admin');
		wp_enqueue_script('qodef-bootstrap-select');
	}
}

if(!function_exists('qode_enqueue_meta_box_styles')) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function qode_enqueue_meta_box_styles() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style('qodef-bootstrap');
		wp_enqueue_style('qodef-page-admin');
		wp_enqueue_style('qodef-meta-boxes-admin');
		wp_enqueue_style('qodef-ui-admin');
		wp_enqueue_style('jquery.nouislider.min');
		wp_enqueue_style('qodef-forms-admin');
		wp_enqueue_style('font-awesome-admin');
	}
}

if(!function_exists('qode_enqueue_meta_box_scripts')) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function qode_enqueue_meta_box_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_script('bootstrap.min');
		wp_enqueue_media();
		wp_enqueue_script('jquery.nouislider.min');
		wp_enqueue_script('qodef-dependence');
		wp_enqueue_script('qodef-ui-admin');
	}
}

if(!function_exists('qode_enqueue_nav_menu_script')) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 * @param $hook string current page hook to check
	 */
	function qode_enqueue_nav_menu_script($hook) {
		if($hook == 'nav-menus.php') {
			wp_enqueue_script('qodef-nav-menu', get_template_directory_uri().'/framework/admin/assets/js/qodef-nav-menu.js');
			wp_enqueue_style('qodef-nav-menu', get_template_directory_uri().'/framework/admin/assets/css/qodef-nav-menu.css');
		}
	}

	add_action('admin_enqueue_scripts', 'qode_enqueue_nav_menu_script');
}


if(!function_exists('qode_enqueue_widgets_admin_script')) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 * @param $hook string current page hook to check
	 */
	function qode_enqueue_widgets_admin_script($hook) {
		if($hook == 'widgets.php') {
			wp_enqueue_script('qodef-dependence');
		}
	}

	add_action('admin_enqueue_scripts', 'qode_enqueue_widgets_admin_script');
}


if(!function_exists('qode_enqueue_styles_slider_taxonomy')) {
	/**
	 * Enqueue styles when on slider taxonomy page in admin
	 */
	function qode_enqueue_styles_slider_taxonomy() {
		if(isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'slides_category') {
			qode_enqueue_admin_styles();
		}
	}

	add_action('admin_print_scripts-edit-tags.php', 'qode_enqueue_styles_slider_taxonomy');
}

if(!function_exists('qodef_init_theme_options_array')) {
	/**
	 * Function that merges $qode_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function qodef_init_theme_options_array() {
		global $qode_options, $qodeFramework;

		$db_options = get_option('qode_options_cayman');

		//does qode_options exists in db?
		if(is_array($db_options)) {
			//merge with default options
			$qode_options  = array_merge($qodeFramework->qodeOptions->options, get_option('qode_options_cayman'));
		} else {
			//options don't exists in db, take default ones
			$qode_options = $qodeFramework->qodeOptions->options;
		}
	}

	//priority needs to be greater than 0, because theme options are initialized on after_setup_theme 0
	add_action('after_setup_theme', 'qodef_init_theme_options_array', 2);
}

if(!function_exists('init_qode_theme_options')) {
	/**
	 * Function that sets $qode_options variable if it does'nt exists
	 */
	function init_qode_theme_options() {
		global $qode_options;
		global $qodeFramework;
		if(isset($qode_options['reset_to_defaults'])) {
			if( $qode_options['reset_to_defaults'] == 'yes' ) delete_option( "qode_options_cayman");
		}

		if (!get_option("qode_options_cayman")) {
			add_option( "qode_options_cayman",
				$qodeFramework->qodeOptions->options
			);

			$qode_options = $qodeFramework->qodeOptions->options;
		}
	}
}

if(!function_exists('qode_theme_menu')) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function qode_theme_menu() {
		global $qodeFramework;
		init_qode_theme_options();

		$page_hook_suffix = add_menu_page(
			'Select Options',                   // The value used to populate the browser's title bar when the menu page is active
			'Select Options',                   // The text of the menu in the administrator's sidebar
			'administrator',                  // What roles are able to access the menu
			'qode_theme_menu',                // The ID used to bind submenu items to this menu
			'qode_theme_display'              // The callback function used to render this menu
		);

		foreach ($qodeFramework->qodeOptions->adminPages as $key=>$value ) {
			$slug = "";

			if (!empty($value->slug)) {
				$slug = "_tab".$value->slug;
			}

			$subpage_hook_suffix = add_submenu_page(
				'qode_theme_menu',
				'Select Options - '.$value->title,                   // The value used to populate the browser's title bar when the menu page is active
				$value->title,                   // The text of the menu in the administrator's sidebar
				'administrator',                  // What roles are able to access the menu
				'qode_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
				'qode_theme_display'
			);

			add_action('admin_print_scripts-'.$subpage_hook_suffix, 'qode_enqueue_admin_scripts');
			add_action('admin_print_styles-'.$subpage_hook_suffix, 'qode_enqueue_admin_styles');
		};

		add_action('admin_print_scripts-'.$page_hook_suffix, 'qode_enqueue_admin_scripts');
		add_action('admin_print_styles-'.$page_hook_suffix, 'qode_enqueue_admin_styles');
	}

	add_action( 'admin_menu', 'qode_theme_menu' );
}

if(!function_exists('register_qode_theme_settings')) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function register_qode_theme_settings() {
		register_setting( 'qode_theme_menu', 'qode_options' );
	}

	add_action('admin_init', 'register_qode_theme_settings');
}

if(!function_exists('qode_get_admin_tab')) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function qode_get_admin_tab(){
		return isset($_GET['page']) ? qode_strafter($_GET['page'],'tab') : NULL;
	}
}

if(!function_exists('qode_strafter')) {
	/**
	 * Function that returns string that comes after found string
	 * @param $string string where to search
	 * @param $substring string what to search for
	 * @return null|string string that comes after found string
	 */
	function qode_strafter($string, $substring) {
		$pos = strpos($string, $substring);
		if ($pos === false) {
			return NULL;
		}

		return(substr($string, $pos+strlen($substring)));
	}
}

if(!function_exists('qodef_save_options')) {
	/**
	 * Function that saves theme options to db.
	 * It hooks to ajax wp_ajax_qodef_save_options action.
	 */
	function qodef_save_options() {
		global $qode_options;
		global $qodeFramework;

		$_REQUEST = stripslashes_deep($_REQUEST);

		foreach ($qodeFramework->qodeOptions->options as $key => $value) {
			if (isset($_REQUEST[ $key ])) {
				$qode_options[$key]=$_REQUEST[ $key ];
			}
		}

		update_option( 'qode_options_cayman', $qode_options );

		do_action('qode_after_theme_option_save');
		echo "Saved";

		die();
	}

	add_action('wp_ajax_qodef_save_options', 'qodef_save_options');
}

if(!function_exists('qode_meta_box_add')) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function qode_meta_box_add() {
		global $qodeFramework;


		foreach ($qodeFramework->qodeMetaBoxes->metaBoxes as $key=>$box ) {
			$hidden = false;
			if (!empty($box->hidden_property)) {
				foreach ($box->hidden_values as $value) {
					if (qodef_option_get_value($box->hidden_property)==$value)
						$hidden = true;

				}
			}

			add_meta_box(
				'qodef-meta-box-'.$key,
				$box->title,
				'qodef_render_meta_box',
				$box->scope,
				'advanced',
				'high',
				array( 'box' => $box)
			);

			if ($hidden) {
				add_filter( 'postbox_classes_'.$box->scope.'_qodef-meta-box-'.$key, 'qode_meta_box_add_hidden_class' );
			}
		}

		add_action('admin_enqueue_scripts', 'qode_enqueue_meta_box_styles');
		add_action('admin_enqueue_scripts', 'qode_enqueue_meta_box_scripts');
	}

	add_action('add_meta_boxes', 'qode_meta_box_add');
}

if(!function_exists('qode_meta_box_save')) {
	/**
	 * Function that saves meta box to postmeta table
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function qode_meta_box_save( $post_id, $post ) {
		global $qodeFramework;

		$postTypes = array( "page", "post", "portfolio_page", "testimonials", "slides", "carousels");

		if (!isset( $_POST[ '_wpnonce' ])) {
			return;
		}

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		if (!in_array($post->post_type, $postTypes)) {
			return;
		}

		foreach ($qodeFramework->qodeMetaBoxes->options as $key=>$box ) {

			if (isset($_POST[$key]) && trim($_POST[$key] !== '')) {

				$value = $_POST[$key];

				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}

		$portfolios = false;
		if (isset($_POST['optionLabel'])) {
			foreach ($_POST['optionLabel'] as $key => $value) {
				$portfolios_val[$key] = array('optionLabel'=>$value,'optionValue'=>$_POST['optionValue'][$key],'optionUrl'=>$_POST['optionUrl'][$key],'optionlabelordernumber'=>$_POST['optionlabelordernumber'][$key]);
				$portfolios = true;

			}
		}

		if ($portfolios) {
			update_post_meta( $post_id,  'qode_portfolios', $portfolios_val );
		} else {
			delete_post_meta( $post_id, 'qode_portfolios' );
		}

		$portfolio_images = false;
		if (isset($_POST['portfolioimg'])) {
			foreach ($_POST['portfolioimg'] as $key => $value) {
				$portfolio_images_val[$key] = array('portfolioimg'=>$_POST['portfolioimg'][$key],'portfoliotitle'=>$_POST['portfoliotitle'][$key],'portfolioimgordernumber'=>$_POST['portfolioimgordernumber'][$key], 'portfoliovideotype'=>$_POST['portfoliovideotype'][$key], 'portfoliovideoid'=>$_POST['portfoliovideoid'][$key], 'portfoliovideoimage'=>$_POST['portfoliovideoimage'][$key], 'portfoliovideowebm'=>$_POST['portfoliovideowebm'][$key], 'portfoliovideomp4'=>$_POST['portfoliovideomp4'][$key], 'portfoliovideoogv'=>$_POST['portfoliovideoogv'][$key], 'portfolioimgtype'=>$_POST['portfolioimgtype'][$key] );
				$portfolio_images = true;
			}
		}


		if ($portfolio_images) {
			update_post_meta( $post_id,  'qode_portfolio_images', $portfolio_images_val );
		} else {
			delete_post_meta( $post_id,  'qode_portfolio_images' );
		}
	}

	add_action( 'save_post', 'qode_meta_box_save', 1, 2 );
}

if(!function_exists('qodef_render_meta_box')) {
	/**
	 * Function that renders meta box
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function qodef_render_meta_box($post, $metabox) {?>
		<div class="qodef-meta-box qodef-page">
			<div class="qodef-meta-box-holder">

				<?php $metabox["args"]["box"]->render(); ?>

			</div>
		</div>
	<?php
	}
}

if(!function_exists('qode_meta_box_add_hidden_class')) {
	/**
	 * Function that adds class that will initially hide meta box
	 * @param array $classes array of classes
	 * @return array modified array of classes
	 */
	function qode_meta_box_add_hidden_class( $classes=array() ) {
		if( !in_array( 'qodef-meta-box-hidden', $classes ) )
			$classes[] = 'qodef-meta-box-hidden';

		return $classes;
	}

}

if(!function_exists('qode_remove_default_custom_fields')) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function qode_remove_default_custom_fields() {
		foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach ( array( "page", "post", "portfolio_page", "testimonials", "slides", "carousels" ) as $postType ) {
				remove_meta_box( 'postcustom', $postType, $context );
			}
		}
	}

	add_action('do_meta_boxes', 'qode_remove_default_custom_fields');
}


if(!function_exists('qode_get_custom_sidebars')) {
	/**
	 * Function that returns all custom made sidebars.
	 *
	 * @uses get_option()
	 * @return array array of custom made sidebars where key and value are sidebar name
	 */
	function qode_get_custom_sidebars() {
		$custom_sidebars = get_option('qode_sidebars');
		$formatted_array = array();

		if(is_array($custom_sidebars) && count($custom_sidebars)) {
			foreach ($custom_sidebars as $custom_sidebar) {
				$formatted_array[$custom_sidebar] = $custom_sidebar;
			}
		}

		return $formatted_array;
	}
}

if(!function_exists('qode_admin_notice')) {
    /**
     * Prints admin notice. It checks if notice has been disabled and if it hasn't then it displays it
     * @param $id string id of notice. It will be used to store notice dismis
     * @param $message string message to show to the user
     * @param $class string HTML class of notice
     * @param bool $is_dismisable whether notice is dismisable or not
     */
    function qode_admin_notice($id, $message, $class, $is_dismisable = true) {
        $is_dismised = get_user_meta(get_current_user_id(), 'dismis_'.$id);

        //if notice isn't dismissed
        if(!$is_dismised && is_admin()) {
            echo '<div style="display: block;" class="'.esc_attr($class).' is-dismissible notice">';
            echo '<p>';

            echo wp_kses_post($message);

            if($is_dismisable) {
                echo '<strong style="display: block; margin-top: 7px;"><a href="'.esc_url(add_query_arg('qode_dismis_notice', $id)).'">'.__('Dismiss this notice', 'qode').'</a></strong>';
            }

            echo '</p>';

            echo '</div>';
        }

    }
}

if(!function_exists('qode_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function qode_save_dismisable_notice() {
        if(is_admin() && !empty($_GET['qode_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['qode_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_'.$notice_id, 1);
        }
    }

    add_action('admin_init', 'qode_save_dismisable_notice');
}