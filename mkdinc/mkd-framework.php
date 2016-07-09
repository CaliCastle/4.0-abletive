<?php

require_once(get_template_directory()."/mkdinc/lib/mkd.kses.php");
require_once(get_template_directory()."/mkdinc/lib/mkd.layout.inc");
require_once(get_template_directory()."/mkdinc/lib/google-fonts.inc");
require_once(get_template_directory()."/mkdinc/lib/mkd.framework.php");
require_once(get_template_directory()."/mkdinc/lib/mkd.functions.php");
require_once(get_template_directory()."/mkdinc/lib/mkd.common.php");
require_once(get_template_directory()."/mkdinc/lib/mkd.icons/mkd.icons.php");
require_once(get_template_directory()."/mkdinc/admin/options/mkd-options-setup.php");
require_once(get_template_directory()."/mkdinc/admin/meta-boxes/mkd-meta-boxes-setup.php");

global $mkd_burst_Framework;

if(!function_exists('mkd_burst_admin_scripts_init')) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function mkd_burst_admin_scripts_init() {
		wp_register_style('mkdf-jquery-ui', get_template_directory_uri().'/mkdinc/admin/assets/css/jquery-ui/jquery-ui.css');
		wp_register_script('mkdf-dependence', get_template_directory_uri().'/mkdinc/admin/assets/js/mkdf-ui/mkdf-dependence.js');
		wp_register_script('mkdf-twitter-connect', get_template_directory_uri().'/mkdinc/admin/assets/js/mkdf-twitter-connect.js');

        /**
         * @see MikadoSkinAbstract::registerScripts - hooked with 10
         * @see MikadoSkinAbstract::registerStyles - hooked with 10
         */
        do_action('mkd_burst_admin_scripts_init');
	}

	add_action('admin_init', 'mkd_burst_admin_scripts_init');
}

if(!function_exists('mkd_burst_enqueue_admin_styles')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function mkd_burst_enqueue_admin_styles() {
		wp_enqueue_style('wp-color-picker');

        /**
         * @see MikadoSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('mkd_burst_enqueue_admin_styles');
	}
}

if(!function_exists('mkd_burst_enqueue_admin_scripts')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function mkd_burst_enqueue_admin_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script('mkdf-dependence');
		wp_enqueue_script('mkdf-twitter-connect');

        /**
         * @see MikadoSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('mkd_burst_enqueue_admin_scripts');
	}
}

if(!function_exists('mkd_burst_enqueue_meta_box_styles')) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function mkd_burst_enqueue_meta_box_styles() {
		wp_enqueue_style( 'wp-color-picker' );

        /**
         * @see MikadoSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('mkd_burst_enqueue_meta_box_styles');
	}
}

if(!function_exists('mkd_burst_enqueue_meta_box_scripts')) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function mkd_burst_enqueue_meta_box_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script('mkdf-dependence');

        /**
         * @see MikadoSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('mkd_burst_enqueue_meta_box_scripts');
	}
}

if(!function_exists('mkd_burst_enqueue_nav_menu_script')) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 * @param $hook string current page hook to check
	 */
	function mkd_burst_enqueue_nav_menu_script($hook) {
		if($hook == 'nav-menus.php') {
			wp_enqueue_script('mkdf-nav-menu', get_template_directory_uri().'/mkdinc/admin/assets/js/mkdf-nav-menu.js');
			wp_enqueue_style('mkdf-nav-menu', get_template_directory_uri().'/mkdinc/admin/assets/css/mkdf-nav-menu.css');
		}
	}

	add_action('admin_enqueue_scripts', 'mkd_burst_enqueue_nav_menu_script');
}


if(!function_exists('mkd_burst_enqueue_widgets_admin_script')) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 * @param $hook string current page hook to check
	 */
	function mkd_burst_enqueue_widgets_admin_script($hook) {
		if($hook == 'widgets.php') {
			wp_enqueue_script('mkdf-dependence');
		}
	}

	add_action('admin_enqueue_scripts', 'mkd_burst_enqueue_widgets_admin_script');
}


if(!function_exists('mkd_burst_enqueue_styles_slider_taxonomy')) {
	/**
	 * Enqueue styles when on slider taxonomy page in admin
	 */
	function mkd_burst_enqueue_styles_slider_taxonomy() {
		if(isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'slides_category') {
			mkd_burst_enqueue_admin_styles();
		}
	}

	add_action('admin_print_scripts-edit-tags.php', 'mkd_burst_enqueue_styles_slider_taxonomy');
}

if(!function_exists('mkdf_burst_init_theme_options_array')) {
	/**
	 * Function that merges $mkd_burst_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function mkdf_burst_init_theme_options_array() {
		global $mkd_burst_options, $mkd_burst_Framework;

		$db_options = get_option('mkd_options_burst');

		//does mkd_options exists in db?
		if(is_array($db_options)) {
			//merge with default options
			$mkd_burst_options  = array_merge($mkd_burst_Framework->mkdOptions->options, get_option('mkd_options_burst'));
		} else {
			//options don't exists in db, take default ones
			$mkd_burst_options = $mkd_burst_Framework->mkdOptions->options;
		}
	}

	//priority needs to be greater than 0, because theme options are initialized on after_setup_theme 0
	add_action('after_setup_theme', 'mkdf_burst_init_theme_options_array', 2);
}

if(!function_exists('mkd_burst_init_theme_options')) {
	/**
	 * Function that sets $mkd_burst_options variable if it does'nt exists
	 */
	function mkd_burst_init_theme_options() {
		global $mkd_burst_options;
		global $mkd_burst_Framework;
		if(isset($mkd_burst_options['reset_to_defaults'])) {
			if( $mkd_burst_options['reset_to_defaults'] == 'yes' ) delete_option( "mkd_options_burst");
		}

		if (!get_option("mkd_options_burst")) {
			add_option( "mkd_options_burst",
				$mkd_burst_Framework->mkdOptions->options
			);

			$mkd_burst_options = $mkd_burst_Framework->mkdOptions->options;
		}
	}
}

if(!function_exists('mkd_burst_theme_menu')) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function mkd_burst_theme_menu() {
		global $mkd_burst_Framework;
		mkd_burst_init_theme_options();

		$page_hook_suffix = add_menu_page(
			'Mikado Settings',                   // The value used to populate the browser's title bar when the menu page is active
			'Mikado Settings',                   // The text of the menu in the administrator's sidebar
			'administrator',                  // What roles are able to access the menu
			'mkd_burst_theme_menu',                // The ID used to bind submenu items to this menu
			array($mkd_burst_Framework->getSkin(), 'renderOptions'), // The callback function used to render this menu
			$mkd_burst_Framework->getSkin()->getMenuIcon('options'),             // Icon For menu Item
			$mkd_burst_Framework->getSkin()->getMenuItemPosition('options')            // Position
		);

		foreach ($mkd_burst_Framework->mkdOptions->adminPages as $key=>$value ) {
			$slug = "";

			if (!empty($value->slug)) {
				$slug = "_tab".$value->slug;
			}

			$subpage_hook_suffix = add_submenu_page(
				'mkd_burst_theme_menu',
				'Mikado Settings - '.$value->title,                   // The value used to populate the browser's title bar when the menu page is active
				$value->title,                   // The text of the menu in the administrator's sidebar
				'administrator',                  // What roles are able to access the menu
				'mkd_burst_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
				array($mkd_burst_Framework->getSkin(), 'renderOptions')
			);

			add_action('admin_print_scripts-'.$subpage_hook_suffix, 'mkd_burst_enqueue_admin_scripts');
			add_action('admin_print_styles-'.$subpage_hook_suffix, 'mkd_burst_enqueue_admin_styles');
		};

		add_action('admin_print_scripts-'.$page_hook_suffix, 'mkd_burst_enqueue_admin_scripts');
		add_action('admin_print_styles-'.$page_hook_suffix, 'mkd_burst_enqueue_admin_styles');
	}

	add_action( 'admin_menu', 'mkd_burst_theme_menu' );
}

if(!function_exists('mkd_burst_register_theme_settings')) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function mkd_burst_register_theme_settings() {
		register_setting( 'mkd_burst_theme_menu', 'mkd_options' );
	}

	add_action('admin_init', 'mkd_burst_register_theme_settings');
}

if(!function_exists('mkd_burst_get_admin_tab')) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function mkd_burst_get_admin_tab(){
		return isset($_GET['page']) ? mkd_burst_strafter($_GET['page'],'tab') : NULL;
	}
}

if(!function_exists('mkd_burst_strafter')) {
	/**
	 * Function that returns string that comes after found string
	 * @param $string string where to search
	 * @param $substring string what to search for
	 * @return null|string string that comes after found string
	 */
	function mkd_burst_strafter($string, $substring) {
		$pos = strpos($string, $substring);
		if ($pos === false) {
			return NULL;
		}

		return(substr($string, $pos+strlen($substring)));
	}
}

if(!function_exists('mkdf_burst_save_options')) {
	/**
	 * Function that saves theme options to db.
	 * It hooks to ajax wp_ajax_mkdf_burst_save_options action.
	 */
	function mkdf_burst_save_options() {
		global $mkd_burst_options;

		$_REQUEST = stripslashes_deep($_REQUEST);

        unset($_REQUEST['action']);

		$mkd_burst_options = array_merge($mkd_burst_options, $_REQUEST);

		update_option( 'mkd_options_burst', $mkd_burst_options );

		do_action('mkd_after_theme_option_save');
		echo "Saved";

		die();
	}

	add_action('wp_ajax_mkdf_burst_save_options', 'mkdf_burst_save_options');
}

if(!function_exists('mkd_burst_meta_box_add')) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function mkd_burst_meta_box_add() {
		global $mkd_burst_Framework;


		foreach ($mkd_burst_Framework->mkdMetaBoxes->metaBoxes as $key=>$box ) {
			$hidden = false;
			if (!empty($box->hidden_property)) {
				foreach ($box->hidden_values as $value) {
					if (mkdf_burst_option_get_value($box->hidden_property)==$value)
						$hidden = true;

				}
			}

			add_meta_box(
				'mkdf-meta-box-'.$key,
				$box->title,
                'mkdf_burst_render_meta_box',
				$box->scope,
				'advanced',
				'high',
				array( 'box' => $box)
			);

			if ($hidden) {
				add_filter( 'postbox_classes_'.$box->scope.'_mkdf-meta-box-'.$key, 'mkd_burst_meta_box_add_hidden_class' );
			}
		}

		add_action('admin_enqueue_scripts', 'mkd_burst_enqueue_meta_box_styles');
		add_action('admin_enqueue_scripts', 'mkd_burst_enqueue_meta_box_scripts');
	}

	add_action('add_meta_boxes', 'mkd_burst_meta_box_add');
}

if(!function_exists('mkd_burst_meta_box_save')) {
	/**
	 * Function that saves meta box to postmeta table
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function mkd_burst_meta_box_save( $post_id, $post ) {
		global $mkd_burst_Framework;

		$postTypes = array( "page", "post", "portfolio_page", "testimonials", "slides", "carousels", "masonry_gallery");

		if (!isset( $_POST[ '_wpnonce' ])) {
			return;
		}

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		if (!in_array($post->post_type, $postTypes)) {
			return;
		}

		foreach ($mkd_burst_Framework->mkdMetaBoxes->options as $key=>$box ) {

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
			update_post_meta( $post_id,  'mkd_portfolios', $portfolios_val );
		} else {
			delete_post_meta( $post_id, 'mkd_portfolios' );
		}

		$portfolio_images = false;
		if (isset($_POST['portfolioimg'])) {
			foreach ($_POST['portfolioimg'] as $key => $value) {
				$portfolio_images_val[$key] = array('portfolioimg'=>$_POST['portfolioimg'][$key],'portfoliotitle'=>$_POST['portfoliotitle'][$key],'portfolioimgordernumber'=>$_POST['portfolioimgordernumber'][$key], 'portfoliovideotype'=>$_POST['portfoliovideotype'][$key], 'portfoliovideoid'=>$_POST['portfoliovideoid'][$key], 'portfoliovideoimage'=>$_POST['portfoliovideoimage'][$key], 'portfoliovideowebm'=>$_POST['portfoliovideowebm'][$key], 'portfoliovideomp4'=>$_POST['portfoliovideomp4'][$key], 'portfoliovideoogv'=>$_POST['portfoliovideoogv'][$key], 'portfolioimgtype'=>$_POST['portfolioimgtype'][$key] );
				$portfolio_images = true;
			}
		}


		if ($portfolio_images) {
			update_post_meta( $post_id,  'mkd_portfolio_images', $portfolio_images_val );
		} else {
			delete_post_meta( $post_id,  'mkd_portfolio_images' );
		}
	}

	add_action( 'save_post', 'mkd_burst_meta_box_save', 1, 2 );
}

if(!function_exists('mkdf_burst_render_meta_box')) {
	/**
	 * Function that renders meta box
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function mkdf_burst_render_meta_box($post, $metabox) {?>
		<div class="mkdf-meta-box mkdf-page">
			<div class="mkdf-meta-box-holder">

				<?php $metabox["args"]["box"]->render(); ?>

			</div>
		</div>
	<?php
	}
}

if(!function_exists('mkd_burst_meta_box_add_hidden_class')) {
	/**
	 * Function that adds class that will initially hide meta box
	 * @param array $classes array of classes
	 * @return array modified array of classes
	 */
	function mkd_burst_meta_box_add_hidden_class( $classes=array() ) {
		if( !in_array( 'mkdf-meta-box-hidden', $classes ) )
			$classes[] = 'mkdf-meta-box-hidden';

		return $classes;
	}

}

if(!function_exists('mkd_burst_remove_default_custom_fields')) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function mkd_burst_remove_default_custom_fields() {
		foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach ( array( "page", "post", "portfolio_page", "testimonials", "slides", "carousels" ) as $postType ) {
				remove_meta_box( 'postcustom', $postType, $context );
			}
		}
	}

	add_action('do_meta_boxes', 'mkd_burst_remove_default_custom_fields');
}


if(!function_exists('mkd_burst_get_custom_sidebars')) {
	/**
	 * Function that returns all custom made sidebars.
	 *
	 * @uses get_option()
	 * @return array array of custom made sidebars where key and value are sidebar name
	 */
	function mkd_burst_get_custom_sidebars() {
		$custom_sidebars = get_option('mkd_sidebars');
		$formatted_array = array();

		if(is_array($custom_sidebars) && count($custom_sidebars)) {
			foreach ($custom_sidebars as $custom_sidebar) {
				$formatted_array[sanitize_title($custom_sidebar)] = $custom_sidebar;
			}
		}

		return $formatted_array;
	}
}

if(!function_exists('mkd_burst_generate_icon_pack_options')) {
    /**
     * Generates options HTML for each icon in given icon pack
     * Hooked to wp_ajax_update_admin_nav_icon_options action
     */
    function mkd_burst_generate_icon_pack_options() {
        global $mkd_burst_IconCollections;

        $html = '';
        $icon_pack = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
        $collections_object = $mkd_burst_IconCollections->getIconCollection($icon_pack);

        if($collections_object) {
            $icons = $collections_object->getIconsArray();
            if(is_array($icons) && count($icons)) {
                foreach ($icons as $key => $icon) {
                    $html .= '<option value="'.esc_attr($key).'">'.esc_html($key).'</option>';
                }
            }
        }

        print $html;
    }

    add_action('wp_ajax_update_admin_nav_icon_options', 'mkd_burst_generate_icon_pack_options');
}

if(!function_exists('mkd_burst_admin_notice')) {
    /**
     * Prints admin notice. It checks if notice has been disabled and if it hasn't then it displays it
     * @param $id string id of notice. It will be used to store notice dismis
     * @param $message string message to show to the user
     * @param $class string HTML class of notice
     * @param bool $is_dismisable whether notice is dismisable or not
     */
    function mkd_burst_admin_notice($id, $message, $class, $is_dismisable = true) {
        $is_dismised = get_user_meta(get_current_user_id(), 'dismis_'.$id);

        //if notice isn't dismissed
        if(!$is_dismised && is_admin()) {
            echo '<div style="display: block;" class="'.esc_attr($class).' is-dismissible notice">';
            echo '<p>';

            echo wp_kses_post($message);

            if($is_dismisable) {
                echo '<strong style="display: block; margin-top: 7px;"><a href="'.esc_url(add_query_arg('mkd_dismis_notice', $id)).'">'.esc_html__('Dismiss this notice', 'burst').'</a></strong>';
            }

            echo '</p>';

            echo '</div>';
        }

    }
}

if(!function_exists('mkd_burst_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function mkd_burst_save_dismisable_notice() {
        if(is_admin() && !empty($_GET['mkd_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['mkd_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_'.$notice_id, 1);
        }
    }

    add_action('admin_init', 'mkd_burst_save_dismisable_notice');
}

if(!function_exists('mkd_burst_hook_twitter_request_ajax')) {
    /**
     * Wrapper function for obtaining twitter request token.
     * Hooks to wp_ajax_mkd_twitter_obtain_request_token ajax action
     *
     * @see MikadoTwitterApi::obtainRequestToken()
     */
    function mkd_burst_hook_twitter_request_ajax() {
        MikadoTwitterApi::getInstance()->obtainRequestToken();
    }

    add_action('wp_ajax_mkd_twitter_obtain_request_token', 'mkd_burst_hook_twitter_request_ajax');
}
?>