<?php

if(!function_exists('mkd_burst_title_classes')) {
	/**
	 * Function that adds classes to title div.
	 * All other functions are tied to it with add_filter function
	 * @param array $classes array of classes
	 */
	function mkd_burst_title_classes($classes = array()) {
		$classes = array();
		$classes = apply_filters('mkd_burst_title_classes', $classes);

		if(is_array($classes) && count($classes)) {
			echo implode(' ', $classes);
		}
	}
}

if(!function_exists('mkd_burst_title_fontsize')) {
	/**
	 * Function that adds class on title based on title position option
	 * Could be left, centered or right
	 * @param $classes original array of classes
	 * @return array changed array of classes
	 */
	function mkd_burst_title_fontsize($classes) {
		global $mkd_burst_options;
		global $wp_query;

		$id = $wp_query->get_queried_object_id();
		$page_title_fontsize_class = '';

		if(get_post_meta($id, "mkd_page_title_font_size", true) != ""){
		    $page_title_fontsize_class = "title_size_" . get_post_meta($id, "mkd_page_title_font_size", true);
		}else{
		    if(isset($mkd_burst_options['predefined_title_sizes'])) {
		        $page_title_fontsize_class = "title_size_" . $mkd_burst_options['predefined_title_sizes'];
		    }
		}

		$classes[] = $page_title_fontsize_class;

		return $classes;
	}

	add_filter('mkd_burst_title_classes', 'mkd_burst_title_fontsize');
}

if(!function_exists('mkd_burst_title_position_class')) {
	/**
	 * Function that adds class on title based on title position option
	 * Could be left, centered or right
	 * @param $classes original array of classes
	 * @return array changed array of classes
	 */
	function mkd_burst_title_position_class($classes) {
		global $mkd_burst_options;
		global $wp_query;

		//init variables
		$id 			= $wp_query->get_queried_object_id();
		$title_position = 'left';

		if(mkd_burst_is_woocommerce_page()) {
			$id = get_option('woocommerce_shop_page_id');
		}

		if(get_post_meta($id, "mkd_page_title_position", true) != "") {
			$title_position = get_post_meta($id, "mkd_page_title_position", true);

		} else {
			$title_position = $mkd_burst_options['page_title_position'];
		}

		$classes[] = 'position_'.$title_position;

		return $classes;
	}

	add_filter('mkd_burst_title_classes', 'mkd_burst_title_position_class');
}

if(!function_exists('mkd_burst_title_in_grid_class')) {
    /**
     * Function that adds class on title based on title in grid option
     * Could be enabled or disabled
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function mkd_burst_title_in_grid_class($classes) {
        global $mkd_burst_options;
        global $wp_query;

        //init variables
        $id 			= $wp_query->get_queried_object_id();
        $title_in_grid = '';

        if(mkd_burst_is_woocommerce_page()) {
            $id = get_option('woocommerce_shop_page_id');
        }

        if((get_post_meta($id, "mkd_title_content_in_grid", true) == "no")
            || ((get_post_meta($id, "mkd_title_content_in_grid", true) != "yes") && isset($mkd_burst_options['title_content_in_grid']) && $mkd_burst_options['title_content_in_grid'] == 'no')) {
            $classes[] = 'disable_title_in_grid';
        }

        return $classes;
    }

    add_filter('mkd_burst_title_classes', 'mkd_burst_title_in_grid_class');
}

if(!function_exists('mkd_burst_title_content_shadow')) {
    /**
     * Function that adds class on title based on title content area shadows
     * Could be enabled or disabled
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function mkd_burst_title_content_shadow($classes) {
        global $mkd_burst_options;
        global $wp_query;

        //init variables
        $id 			= $wp_query->get_queried_object_id();

        if(mkd_burst_is_woocommerce_page()) {
            $id = get_option('woocommerce_shop_page_id');
        }

        if((get_post_meta($id, "mkd_burst_title_content_shadow", true) == "yes")
            || ((get_post_meta($id, "mkd_burst_title_content_shadow", true) != "no") && isset($mkd_burst_options['title_content_shadows']) && $mkd_burst_options['title_content_shadows'] == 'yes')) {
            $classes[] = 'title_content_shadow';
        }

        return $classes;
    }

    add_filter('mkd_burst_title_classes', 'mkd_burst_title_content_shadow');
}

if(!function_exists('mkd_burst_title_with_paspartu')) {
    /**
     * Function that adds class on title based on title paspartu
     * Could be enabled or disabled (by default disabled)
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function mkd_burst_title_with_paspartu($classes) {
        global $mkd_burst_options;

        if((isset($mkd_burst_options['paspartu_below_tittle']) && $mkd_burst_options['paspartu_below_tittle'] == 'yes')) {
            $classes[] = 'paspartu_below_tittle';
        }

        return $classes;
    }

    add_filter('mkd_burst_title_classes', 'mkd_burst_title_with_paspartu');
}

if(!function_exists('mkd_burst_title_background_image_classes')) {
	function mkd_burst_title_background_image_classes($classes) {
		global $mkd_burst_options;
		global $wp_query;

		//init variables
		$id 					= $wp_query->get_queried_object_id();
		$is_img_responsive 		= '';
		$is_image_fixed			= '';
		$is_image_fixed_array 	= array('yes', 'yes_zoom');
		$show_title_img			= true;
		$title_img				= '';

		if(mkd_burst_is_woocommerce_page()) {
			$id = get_option('woocommerce_shop_page_id');
		}

		//is responsive image is set for current page?
		if(get_post_meta($id, "mkd_responsive-title-image", true) != "") {
			$is_img_responsive = get_post_meta($id, "mkd_responsive-title-image", true);
		} else {
			//take value from theme options
			$is_img_responsive = $mkd_burst_options['responsive_title_image'];
		}

		//is title image chosen for current page?
		if(get_post_meta($id, "mkd_title-image", true) != ""){
			$title_img = get_post_meta($id, "mkd_title-image", true);
		}else{
			//take image that is set in theme options
			$title_img = $mkd_burst_options['title_image'];
		}

		//is image set to be fixed for current page?
		if(get_post_meta($id, "mkd_fixed-title-image", true) != ""){
			$is_image_fixed = get_post_meta($id, "mkd_fixed-title-image", true);
		}else{
			//take setting from theme options
			$is_image_fixed = $mkd_burst_options['fixed_title_image'];
		}

		//is title image hidden for current page?
		if(get_post_meta($id, "mkd_show-page-title-image", true) == "yes") {
			$show_title_img = false;
		}

		//is title image set and visible?
		if($title_img !== '' && $show_title_img == true) {
			//is image not responsive and parallax title is set?
            $classes[] = 'preload_background';

            if($is_img_responsive == 'no' && in_array($is_image_fixed, $is_image_fixed_array)) {
				$classes[] = 'has_fixed_background';

				if($is_image_fixed == 'yes_zoom') {
					$classes[] = 'zoom_out';
				}
			}
			//is image not responsive and parallax title isn't set?
			elseif($is_img_responsive == 'no') {
				$classes[] = 'has_background';
			}
		}

		return $classes;
	}

	add_filter('mkd_burst_title_classes', 'mkd_burst_title_background_image_classes');
}

if(!function_exists('mkd_burst_title_text_is_hidden_class')) {
	function mkd_burst_title_text_is_hidden_class($classes) {
		global $mkd_burst_options;
		global $wp_query;
		$is_title_text_visible = true;

		//init variables
		$id = $wp_query->get_queried_object_id();

		if(mkd_burst_is_woocommerce_page()) {
			$id = get_option('woocommerce_shop_page_id');
		}
		
		
		if(get_post_meta($id, "mkd_show_page_title_text", true) == 'yes') {
			$is_title_text_visible = true;
		} elseif(get_post_meta($id, "mkd_show_page_title_text", true) == 'no') {
			$is_title_text_visible = false;
		} elseif(get_post_meta($id, "mkd_show_page_title_text", true) == '' && (isset($mkd_burst_options['show_page_title_text']) && $mkd_burst_options['show_page_title_text'] == 'yes')) {
			$is_title_text_visible = true;
		} elseif(get_post_meta($id, "mkd_show_page_title_text", true) == '' && (isset($mkd_burst_options['show_page_title_text']) && $mkd_burst_options['show_page_title_text'] == 'no')) {
			$is_title_text_visible = false;
		} elseif(isset($mkd_burst_options['show_page_title_text']) && $mkd_burst_options['show_page_title_text'] == 'yes') {
			$is_title_text_visible = true;
		}

		if(!$is_title_text_visible) {
			$classes[] = 'without_title_text';
		}

		return $classes;
	}

	add_filter('mkd_burst_title_classes', 'mkd_burst_title_text_is_hidden_class');
}

if(!function_exists('mkd_burst_title_oblique_class')) {
	function mkd_burst_title_oblique_class($classes) {
		global $mkd_burst_options;
		global $wp_query;
		$is_title_oblique_visible = true;

		//init variables
		$id = $wp_query->get_queried_object_id();

		if(mkd_burst_is_woocommerce_page()) {
			$id = get_option('woocommerce_shop_page_id');
		}
		
		
		//is title oblique enabled
		if(get_post_meta($id, "mkd_enable_page_title_oblique", true) == 'yes') {
			$is_title_oblique_visible = true;
		} elseif(get_post_meta($id, "mkd_enable_page_title_oblique", true) == 'no') {
			$is_title_oblique_visible = false;
		} elseif(get_post_meta($id, "mkd_enable_page_title_oblique", true) == '' && (isset($mkd_burst_options['enable_title_oblique']) && $mkd_burst_options['enable_title_oblique'] == 'yes')) {
			$is_title_oblique_visible = true;
		} elseif(get_post_meta($id, "mkd_enable_page_title_oblique", true) == '' && (isset($mkd_burst_options['enable_title_oblique']) && $mkd_burst_options['enable_title_oblique'] == 'no')) {
			$is_title_oblique_visible = false;
		} elseif(isset($mkd_burst_options['enable_title_oblique']) && $mkd_burst_options['enable_title_oblique'] == 'yes') {
			$is_title_oblique_visible = true;
		}

		if($is_title_oblique_visible) {
			$classes[] = 'with_oblique';
		}

		return $classes;
	}

	add_filter('mkd_burst_title_classes', 'mkd_burst_title_oblique_class');
}

if(!function_exists('mkd_burst_title_breadcrumb_type_class')) {
    function mkd_burst_title_breadcrumb_type_class($classes) {
        global $mkd_burst_options;
        global $wp_query;

        //init variables
        $id 			= $wp_query->get_queried_object_id();

		if(mkd_burst_is_woocommerce_page()) {
			$id = get_option('woocommerce_shop_page_id');
		}

        $title_type = "standard_title";
        if(get_post_meta($id, "mkd_page_title_type", true) != ""){
            $title_type = get_post_meta($id, "mkd_page_title_type", true);
        }else{
            $title_type = $mkd_burst_options['title_type'];
        }

        $classes[] = $title_type;

        return $classes;
    }

    add_filter('mkd_burst_title_classes', 'mkd_burst_title_breadcrumb_type_class');
}

if(!function_exists('mkd_burst_title_background_color_class')) {
	function mkd_burst_title_background_color_class($classes) {
		global $mkd_burst_options;
		global $wp_query;

		//init variables
		$id 			= $wp_query->get_queried_object_id();
		$title_image	= '';
		$title_bg_color = '';

		if(mkd_burst_is_woocommerce_page()) {
			$id = get_option('woocommerce_shop_page_id');
		}

		//is title image chosen for current page?
		if(get_post_meta($id, "mkd_title-image", true) != ""){
			$title_img = get_post_meta($id, "mkd_title-image", true);
		}else{
			//take image that is set in theme options
			$title_img = $mkd_burst_options['title_image'];
		}

		//is title background color set?
		if(get_post_meta($id, "mkd_page-title-background-color", true) != ""){
			$title_bg_color = get_post_meta($id, "mkd_page-title-background-color", true);
		}else{
			//take background color from
			$title_bg_color = $mkd_burst_options['title_background_color'];
		}

		if($title_bg_color !== '' && $title_img === '') {
			$classes[] = 'with_background_color';
		}

		return $classes;
	}

	add_filter('mkd_burst_title_classes', 'mkd_burst_title_background_color_class');
}