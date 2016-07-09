<?php

add_action('after_setup_theme', 'mkd_burst_admin_map_init', 0);
function mkd_burst_admin_map_init() {
	global $mkd_burst_options;
	global $mkd_burst_Framework;
	global $mkd_burst_options_fontstyle;
	global $mkd_burst_options_fontweight;
	global $mkd_burst_options_texttransform;
	global $mkd_burst_options_fontdecoration;
	global $mkd_burst_options_arrows_type;
	global $mkd_burst_options_blockquote_type;
	global $mkd_burst_options_double_arrows_type;
	global $mkd_burst_options_arrows_up_type;
	require_once(get_template_directory()."/mkdinc/admin/options/10.general/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/20.fonts/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/30.header/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/40.title/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/50.content/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/60.footer/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/70.elements/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/80.blog/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/90.portfolio/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/100.slider/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/110.social/map.inc");
    require_once(get_template_directory()."/mkdinc/admin/options/120.error404/map.inc");
    if(mkd_burst_visual_composer_installed() && version_compare(mkd_burst_get_vc_version(), '4.4.2') >= 0) {
        require_once(get_template_directory()."/mkdinc/admin/options/130.visualcomposer/map.inc");
    } else {
        $mkd_burst_Framework->mkdOptions->addOption("enable_grid_elements","no");
    }
    if(mkd_burst_contact_form_7_installed()) {
        require_once(get_template_directory()."/mkdinc/admin/options/140.contactform7/map.inc");
    }

    if(function_exists("is_woocommerce")){
        require_once(get_template_directory()."/mkdinc/admin/options/150.woocommerce/map.inc");
    }
    require_once(get_template_directory()."/mkdinc/admin/options/160.reset/map.inc");
}