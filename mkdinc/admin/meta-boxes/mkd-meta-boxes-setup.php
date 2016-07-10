<?php

add_action('after_setup_theme', 'mkd_burst_meta_boxes_map_init', 1);
function mkd_burst_meta_boxes_map_init() {
	global $mkd_burst_options;
	global $mkd_burst_Framework;
	global $mkd_burst_options_fontstyle;
	global $mkd_burst_options_fontweight;
	global $mkd_burst_options_texttransform;
	global $mkd_burst_options_fontdecoration;
	global $mkd_burst_options_arrows_type;
	global $mkd_burst_options_blockquote_type;
	require_once(get_template_directory()."/mkdinc/admin/meta-boxes/page/map.inc");
	require_once(get_template_directory()."/mkdinc/admin/meta-boxes/portfolio/map.inc");
	require_once(get_template_directory()."/mkdinc/admin/meta-boxes/slides/map.inc");
	require_once(get_template_directory()."/mkdinc/admin/meta-boxes/post/map.inc");
	require_once(get_template_directory()."/mkdinc/admin/meta-boxes/testimonials/map.inc");
	require_once(get_template_directory()."/mkdinc/admin/meta-boxes/carousels/map.inc");
	require_once(get_template_directory()."/mkdinc/admin/meta-boxes/masonry_gallery/map.inc");
}