<?php
global $mkd_burst_options;

$enable_navigation = true;
if (isset($mkd_burst_options['portfolio_hide_pagination']) && $mkd_burst_options['portfolio_hide_pagination'] == "yes"){
    $enable_navigation = false;
}

$navigation_through_category = false;
if (isset($mkd_burst_options['portfolio_navigation_through_same_category']) && $mkd_burst_options['portfolio_navigation_through_same_category'] == "yes")
    $navigation_through_category = true;
?>

<?php

$icon_navigation_class = "fa fa-angle-";

if (isset($mkd_burst_options['portfolio_single_navigation_arrows_type']) && $mkd_burst_options['portfolio_single_navigation_arrows_type'] != '') {
    $icon_navigation_class = $mkd_burst_options['portfolio_single_navigation_arrows_type'];
}

$direction_nav_classes = mkd_burst_horizontal_slider_icon_classes($icon_navigation_class);


$back_to_button_code = '<i class="icon-grid"></i>';

if ($mkd_burst_options['portfolio_back_to_button_choice'] == 'icon'){
    if (isset($mkd_burst_options['portfolio_back_to_button_icon']) && $mkd_burst_options['portfolio_back_to_button_icon'] != '') {
        $back_to_button = $mkd_burst_options['portfolio_back_to_button_icon'];
        $back_to_button_code = '<span class="' . $back_to_button . '"></span>';
    }
}
elseif ($mkd_burst_options['portfolio_back_to_button_choice'] == 'custom_icon') {
    if (isset($mkd_burst_options['portfolio_back_to_button_custom_icon']) && $mkd_burst_options['portfolio_back_to_button_custom_icon'] != '') {
        $back_to_button_code = '<span class="portfolio_single_nav_custom"></span>';
    }
}

if (get_previous_post() != ""){

	$prev_categories_array = '';

	if ($navigation_through_category){
		$prev_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_previous_post(true,'','portfolio_category')->ID));
		$prev_thumb = $prev_thumb[0];
		$prev_categories = wp_get_post_terms(get_previous_post(true,'','portfolio_category')->ID,'portfolio_category');
	}
	else{
		$prev_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_previous_post()->ID));
		$prev_thumb = $prev_thumb[0];
		$prev_categories = wp_get_post_terms(get_previous_post()->ID,'portfolio_category');
	}
	if(is_array($prev_categories) && count($prev_categories)){
		$prev_categories_array = array();
		foreach($prev_categories as $prev_category) {
			$prev_categories_array[] = $prev_category->name;
		}
	}
	$previous_html = '<div class="portfolio_pagination">';
	$previous_html .= '<div class="pagination_arrows_thumb_holder">';
	$previous_html .= '<span class="pagination_arrows ' .$direction_nav_classes['left_icon_class']. '"></span>';
	$previous_html .= '<div class="pagination_thumb" style="background:url('.$prev_thumb.');"></div>';
	$previous_html .= '</div>';
	$previous_html .= '<div class="pagination_text_holder">';
	$previous_html .= '<span class="pagination_title">%title</span>';
	if (is_array($prev_categories_array) && count($prev_categories_array)) {
		$previous_html .= '<span class="pagination_categories">'.esc_html(implode(', ', $prev_categories_array)).'</span>';
	}
	$previous_html .= '</div>'; //closing of .pagination_text_holder
	$previous_html .= '</div>';
}

if (get_next_post() !== ""){

	$next_categories_array = '';

	if ($navigation_through_category){
		$next_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_next_post(true,'','portfolio_category')->ID));
		$next_thumb = $next_thumb[0];
		$next_categories = wp_get_post_terms(get_next_post(true,'','portfolio_category')->ID,'portfolio_category');
	}
	else{
		$next_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_next_post()->ID));
		$next_thumb = $next_thumb[0];
		$next_categories = wp_get_post_terms(get_next_post()->ID,'portfolio_category');
	}
	if(is_array($next_categories) && count($next_categories)){
		$next_categories_array = array();
		foreach($next_categories as $next_category) {
			$next_categories_array[] = $next_category->name;
		}
	}
	$next_html = '<div class="portfolio_pagination">';
	$next_html .= '<div class="pagination_text_holder">';
	$next_html .= '<span class="pagination_title">%title</span>';
	if (is_array($next_categories_array) && count($next_categories_array)) {
		$next_html .= '<span class="pagination_categories">'.esc_html(implode(', ', $next_categories_array)).'</span>';
	}
	$next_html .= '</div>';
	$next_html .= '<div class="pagination_arrows_thumb_holder">';
	$next_html .= '<span class="pagination_arrows ' .$direction_nav_classes['right_icon_class']. '"></span>';
	$next_html .= '<div class="pagination_thumb" style="background:url('.$next_thumb.');"></div>';
	$next_html .= '</div>';
	$next_html .= '</div>';
}
?>

<?php if($enable_navigation){ ?>
    <div class="portfolio_navigation">
        <div class="portfolio_navigation_inner">
            <?php if(get_previous_post() != ""){ ?>
                <div class="portfolio_prev">
                    <?php
                    if($navigation_through_category){
                        previous_post_link('%link',$previous_html, true,'','portfolio_category');
                    } else {
                        previous_post_link('%link',$previous_html);
                    }
                    ?>
                </div> <!-- close div.portfolio_prev -->
            <?php } ?>
            <?php if(get_post_meta(get_the_ID(), "mkd_choose-portfolio-list-page", true) != "") { ?>
                <div class="portfolio_button">
                    <a href="<?php echo esc_url(get_permalink(get_post_meta(get_the_ID(), "mkd_choose-portfolio-list-page", true))); ?>"><?php echo wp_kses($back_to_button_code,array(
                        'span' => array("class" => true),
                        'i' => array("class"=> true)
                    ));?></a>
                </div> <!-- close div.portfolio_button -->
            <?php } ?>
            <?php if(get_next_post() != ""){ ?>
                <div class="portfolio_next">
                    <?php
                    if($navigation_through_category){
                        next_post_link('%link',$next_html, true,'','portfolio_category');
                    } else {
                        next_post_link('%link',$next_html);
                    }
                    ?>
                </div> <!-- close div.portfolio_next -->
            <?php } ?>
        </div>
    </div> <!-- close div.portfolio_navigation -->
<?php } ?>	