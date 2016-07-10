<?php

if(!function_exists('mkd_burst_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function mkd_burst_register_sidebars() {
        global $mkd_burst_options;
        $centered_logo = false;

        if (isset($mkd_burst_options['center_logo_image'])){ if($mkd_burst_options['center_logo_image'] == "yes") { $centered_logo = true; }};
        if(isset($mkd_burst_options['header_bottom_appearance']) && $mkd_burst_options['header_bottom_appearance'] == "fixed_hiding"){
            $centered_logo = true;
        }


        register_sidebar(array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'description' => 'Default Sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

        register_sidebar(array(
            'name' => 'Sidebar Page',
            'id' => 'sidebar_page',
            'description' => 'Sidebar for Page',
            'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

        register_sidebar(array(
            'name' => 'Header Top Left',
            'id' => 'header_left',
            'description' => 'Header Top Left',
            'before_widget' => '<div class="header-widget %2$s header-left-widget">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => ''
        ));

        register_sidebar(array(
            'name' => 'Header Top Right',
            'id' => 'header_right',
            'description' => 'Header Top Right',
            'before_widget' => '<div class="header-widget %2$s header-right-widget">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => ''
        ));

        if($centered_logo){
            register_sidebar(array(
                'name' => 'Header Left From Logo',
                'id' => 'header_left_from_logo',
                'description' => 'Header Left From Logo',
                'before_widget' => '<div class="header-widget %2$s header-left-from-logo-widget"><div class="header-left-from-logo-widget-inner"><div class="header-left-from-logo-widget-inner2">',
                'after_widget' => '</div></div></div>',
                'before_title' => '',
                'after_title' => ''
            ));
            register_sidebar(array(
                'name' => 'Header Right From Logo',
                'id' => 'header_right_from_logo',
                'description' => 'Header Right From Logo',
                'before_widget' => '<div class="header-widget %2$s header-right-from-logo-widget"><div class="header-right-from-logo-widget-inner"><div class="header-right-from-logo-widget-inner2">',
                'after_widget' => '</div></div></div>',
                'before_title' => '',
                'after_title' => ''
            ));
        }
		
		if((isset($mkd_burst_options['header_bottom_appearance']) && $mkd_burst_options['header_bottom_appearance'] == "stick_with_left_right_menu") ||  $centered_logo == true){
			register_sidebar(array(
				'name' => 'Header Bottom Left',
				'id' => 'header_bottom_left',
				'description' => 'Header Bottom Left (Next to the menu)',
				'before_widget' => '<div class="header_bottom_widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '',
				'after_title' => ''
			));
		}
		
        register_sidebar(array(
            'name' => 'Header Bottom Right',
            'id' => 'header_bottom_right',
            'description' => 'Header Bottom Right (Next to the menu)',
            'before_widget' => '<div class="header_bottom_widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => ''
        ));
		
		 register_sidebar(array(
            'name' => 'Header Bottom Center',
            'id' => 'header_bottom_center',
            'description' => 'This widget area is used only for content of Header Bottom when header type is set to Fixed Header Top',
            'before_widget' => '<div class="header_bottom_center_widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => ''
        ));

        register_sidebar(array(
            'name' => 'Fullscreen Menu Bottom',
            'id' => 'fullscreen_menu',
            'description' => 'This widget area is rendered below fullscreen menu',
            'before_widget' => '<div class="header-widget %2$s fullscreen-menu-widget">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => ''
        ));

        register_sidebar(array(
            'name' => 'Fullscreen Menu Top',
            'id' => 'fullscreen_above_menu',
            'description' => 'This widget area is rendered above fullscreen menu',
            'before_widget' => '<div class="header-above-menu-widget %2$s fullscreen-above-menu-widget">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => ''
        ));

        register_sidebar(array(
            'name' => 'Side Area',
            'id' => 'sidearea',
            'description' => 'Side Area',
            'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

        register_sidebar(array(
            'name' => 'Left Menu Area',
            'id' => 'vertical_menu_area',
            'description' => 'Left Menu Area',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));
        register_sidebar(array(
            'name' => 'Footer Column 1',
            'id' => 'footer_column_1',
            'description' => 'Footer Column 1',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

        register_sidebar(array(
            'name' => 'Footer Column 2',
            'id' => 'footer_column_2',
            'description' => 'Footer Column 2',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

        register_sidebar(array(
            'name' => 'Footer Column 3',
            'id' => 'footer_column_3',
            'description' => 'Footer Column 3',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

        register_sidebar(array(
            'name' => 'Footer Column 4',
            'id' => 'footer_column_4',
            'description' => 'Footer Column 4',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

        register_sidebar(array(
            'name' => 'Footer Text',
            'id' => 'footer_text',
            'description' => 'Footer Text',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ));

        register_sidebar(array(
            'name' => 'Footer Bottom Left',
            'id' => 'footer_bottom_left',
            'description' => 'Footer Bottom Left',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ));

        register_sidebar(array(
            'name' => 'Footer Bottom Right',
            'id' => 'footer_bottom_right',
            'description' => 'Footer Bottom Right',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ));

        register_sidebar(array(
            'name' => 'Header Fixed Right',
            'id' => 'header_fixed_right',
            'description' => 'This widget area is used only with sticky with menu on bottom menu type',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ));
    }

    add_action('widgets_init', 'mkd_burst_register_sidebars');
}

if(!function_exists('mkd_burst_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates mkd_burst_sidebar object
     */
    function mkd_burst_add_support_custom_sidebar() {
        add_theme_support('mkd_burst_sidebar');
        if (get_theme_support('mkd_burst_sidebar')) new mkd_burst_sidebar();
    }

    add_action('after_setup_theme', 'mkd_burst_add_support_custom_sidebar');
}
