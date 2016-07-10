<?php
global $mkd_burst_options;
global $mkd_burst_IconCollections;

if(isset($mkd_burst_options['enable_social_sidebar']) && $mkd_burst_options['enable_social_sidebar'] == 'yes') {
	$icons_param_array = array();

	if(isset($mkd_burst_options['social_sidebar_icon_pack']) && $mkd_burst_options['social_sidebar_icon_pack'] !== '' ) {
		$icon_pack = "icon_pack='".$mkd_burst_options['social_sidebar_icon_pack']."'";

		$collection_obj = $mkd_burst_IconCollections->getIconCollection($mkd_burst_options['social_sidebar_icon_pack']);

		if(property_exists($collection_obj, 'param')) {
			$icon_param = $collection_obj->param;
		}
	}

	if(isset($mkd_burst_options['social_sidebar_icon_style']) && $mkd_burst_options['social_sidebar_icon_style'] !== '') {
		$icons_param_array[] = "type='".$mkd_burst_options['social_sidebar_icon_style']."'";
	}
	if(isset($mkd_burst_options['social_sidebar_icon_size']) && $mkd_burst_options['social_sidebar_icon_size'] !== '') {
		$icons_param_array[] = "custom_size='".esc_attr($mkd_burst_options['social_sidebar_icon_size'])."'";
	}
	else{
		$icons_param_array[] = "custom_size='20'";
	}
	if(isset($mkd_burst_options['social_sidebar_icon_shape_size']) && $mkd_burst_options['social_sidebar_icon_shape_size'] !== '') {
		$icons_param_array[] = "shape_size='".esc_attr($mkd_burst_options['social_sidebar_icon_shape_size'])."'";
	}
	if(!empty($mkd_burst_options['social_sidebar_icon_color'])){
		$icons_param_array[] = "icon_color='".esc_attr($mkd_burst_options['social_sidebar_icon_color'])."'";
	}
	if(!empty($mkd_burst_options['social_sidebar_icon_hover_color'])){
		$icons_param_array[] = "hover_icon_color='".esc_attr($mkd_burst_options['social_sidebar_icon_hover_color'])."'";
	}
	if(!empty($mkd_burst_options['social_sidebar_icon_background_color'])){
		$icons_param_array[] = "background_color='".esc_attr($mkd_burst_options['social_sidebar_icon_background_color'])."'";
	}
	if(!empty($mkd_burst_options['social_sidebar_icon_background_hover_color'])){
		$icons_param_array[] = "hover_background_color='".esc_attr($mkd_burst_options['social_sidebar_icon_background_hover_color'])."'";
	}
	if(!empty($mkd_burst_options['social_sidebar_icon_border_color'])){
		$icons_param_array[] = "border_color='".esc_attr($mkd_burst_options['social_sidebar_icon_border_color'])."'";
	}
	if(!empty($mkd_burst_options['social_sidebar_icon_border_hover_color'])){
		$icons_param_array[] = "hover_border_color='".esc_attr($mkd_burst_options['social_sidebar_icon_border_hover_color'])."'";
	}
	if(isset($mkd_burst_options['social_sidebar_icon_border_width']) && $mkd_burst_options['social_sidebar_icon_border_width'] !== '') {
		$icons_param_array[] = "border_width='".esc_attr($mkd_burst_options['social_sidebar_icon_border_width'])."'";
	}
	$icons_param_array[] = "target='_self'";

	?>
	<div id="social_icons_widget">
		<div class="social_icons_widget_inner">
			<?php
			if(isset($mkd_burst_options['social_sidebar_facebook_icon']) && $mkd_burst_options['social_sidebar_facebook_icon'] == 'yes') {
				$icon = $mkd_burst_IconCollections->getFacebookIcon($mkd_burst_options['social_sidebar_icon_pack']);
				$social_link = "#";
				if(isset($mkd_burst_options['social_sidebar_facebook_icon_link']) && $mkd_burst_options['social_sidebar_facebook_icon_link'] !== ''){
					$social_link = esc_url($mkd_burst_options['social_sidebar_facebook_icon_link']);
				}
				?> <div class="mkd_social_icon_holder"> <?php
					echo do_shortcode('[no_icons '.$icon_pack.' '.$icon_param.'="'.$icon.'" link="'.$social_link.'" '.implode(' ', $icons_param_array).']'); // XSS OK
					?> </div> <?php
			}
			if(isset($mkd_burst_options['social_sidebar_twitter_icon']) && $mkd_burst_options['social_sidebar_twitter_icon'] == 'yes') {
				$icon = $mkd_burst_IconCollections->getTwitterIcon($mkd_burst_options['social_sidebar_icon_pack']);
				$social_link = "#";
				if(isset($mkd_burst_options['social_sidebar_twitter_icon_link']) && $mkd_burst_options['social_sidebar_twitter_icon_link'] !== ''){
					$social_link = esc_url($mkd_burst_options['social_sidebar_twitter_icon_link']);
				}
				?> <div class="mkd_social_icon_holder"> <?php
					echo do_shortcode('[no_icons '.$icon_pack.' '.$icon_param.'="'.$icon.'" link="'.$social_link.'" '.implode(' ', $icons_param_array).']'); // XSS OK
					?> </div> <?php
			}
			if(isset($mkd_burst_options['social_sidebar_google_plus_icon']) && $mkd_burst_options['social_sidebar_google_plus_icon'] == 'yes') {
				$icon = $mkd_burst_IconCollections->getGooglePlusIcon($mkd_burst_options['social_sidebar_icon_pack']);
				$social_link = "#";
				if(isset($mkd_burst_options['social_sidebar_google_plus_icon_link']) && $mkd_burst_options['social_sidebar_google_plus_icon_link'] !== ''){
					$social_link = esc_url($mkd_burst_options['social_sidebar_google_plus_icon_link']);
				}
				?> <div class="mkd_social_icon_holder"> <?php
					echo do_shortcode('[no_icons '.$icon_pack.' '.$icon_param.'="'.$icon.'" link="'.$social_link.'" '.implode(' ', $icons_param_array).']'); // XSS OK
					?> </div> <?php
			}
			if(isset($mkd_burst_options['social_sidebar_linkedIn_icon']) && $mkd_burst_options['social_sidebar_linkedIn_icon'] == 'yes') {
				$icon = $mkd_burst_IconCollections->getLinkedInIcon($mkd_burst_options['social_sidebar_icon_pack']);
				$social_link = "#";
				if(isset($mkd_burst_options['social_sidebar_linkedIn_icon_link']) && $mkd_burst_options['social_sidebar_linkedIn_icon_link'] !== ''){
					$social_link = esc_url($mkd_burst_options['social_sidebar_linkedIn_icon_link']);
				}
				?> <div class="mkd_social_icon_holder"> <?php
					echo do_shortcode('[no_icons '.$icon_pack.' '.$icon_param.'="'.$icon.'" link="'.$social_link.'" '.implode(' ', $icons_param_array).']'); // XSS OK
					?> </div> <?php
			}
			if(isset($mkd_burst_options['social_sidebar_tumblr_icon']) && $mkd_burst_options['social_sidebar_tumblr_icon'] == 'yes') {
				$icon = $mkd_burst_IconCollections->getTumblrIcon($mkd_burst_options['social_sidebar_icon_pack']);
				$social_link = "#";
				if(isset($mkd_burst_options['social_sidebar_tumblr_icon_link']) && $mkd_burst_options['social_sidebar_tumblr_icon_link'] !== ''){
					$social_link = esc_url($mkd_burst_options['social_sidebar_tumblr_icon_link']);
				}
				?> <div class="mkd_social_icon_holder"> <?php
					echo do_shortcode('[no_icons '.$icon_pack.' '.$icon_param.'="'.$icon.'" link="'.$social_link.'" '.implode(' ', $icons_param_array).']'); // XSS OK
					?> </div> <?php
			}
			if(isset($mkd_burst_options['social_sidebar_pinterest_icon']) && $mkd_burst_options['social_sidebar_pinterest_icon'] == 'yes') {
				$icon = $mkd_burst_IconCollections->getPinterestIcon($mkd_burst_options['social_sidebar_icon_pack']);
				$social_link = "#";
				if(isset($mkd_burst_options['social_sidebar_pinterest_icon_link']) && $mkd_burst_options['social_sidebar_pinterest_icon_link'] !== ''){
					$social_link = esc_url($mkd_burst_options['social_sidebar_pinterest_icon_link']);
				}
				?> <div class="mkd_social_icon_holder"> <?php
					echo do_shortcode('[no_icons '.$icon_pack.' '.$icon_param.'="'.$icon.'" link="'.$social_link.'" '.implode(' ', $icons_param_array).']'); // XSS OK
					?> </div> <?php
			}
			if (isset($mkd_burst_options['social_sidebar_vk_icon']) && $mkd_burst_options['social_sidebar_vk_icon'] == 'yes') {
				$social_link = "#";
				if (isset($mkd_burst_options['social_sidebar_vk_icon_link']) && $mkd_burst_options['social_sidebar_vk_icon_link'] !== '') {
					$social_link = esc_url($mkd_burst_options['social_sidebar_vk_icon_link']);
				}
				?>
				<div class="mkd_social_icon_holder"> <?php
					echo do_shortcode('[no_icons icon_pack="font_awesome" fa_icon="fa-vk" link="' . $social_link . '" ' . implode(' ', $icons_param_array) . ']'); // XSS OK
					?> </div> <?php
			}
			?>
		</div>
	</div>
<?php } ?>