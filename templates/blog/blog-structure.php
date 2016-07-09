<?php
	global $wp_query;
	global $mkd_burst_options;

	$id = mkd_burst_get_page_id();
	$mkd_burst_template_name =  get_page_template_slug($id);
	$category = get_post_meta($id, "mkd_choose-blog-category", true);
	$post_number = esc_attr(get_post_meta($id, "mkd_show-posts-per-page", true));

	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }

	$sidebar = $mkd_burst_options['category_blog_sidebar'];

	if(!is_archive()) {
		$blog_query = new WP_Query('post_type=post&paged=' . $paged . '&cat=' . $category . '&posts_per_page=' . $post_number);
	}else{
		$blog_query = $wp_query;
	}

	if(isset($mkd_burst_options['blog_page_range']) && $mkd_burst_options['blog_page_range'] != ""){
		$blog_page_range = esc_attr($mkd_burst_options['blog_page_range']);
	} else{
		$blog_page_range = $blog_query->max_num_pages;
	}
	
	$blog_style = "blog_standard";
	if(isset($mkd_burst_options['blog_style'])){
		$blog_style = $mkd_burst_options['blog_style'];
	}

	$filter = "no";

	if(isset($mkd_burst_options['blog_masonry_filter'])){
		$filter = $mkd_burst_options['blog_masonry_filter'];
	}
	
	
	$blog_masonry_type = "blog_masonry_standard";
	if(isset($mkd_burst_options['blog_masonry_choose_type'])){
		$blog_masonry_type = $mkd_burst_options['blog_masonry_choose_type'];
	} 

	$blog_list = "";
	if($mkd_burst_template_name != "") {
		if($mkd_burst_template_name == "blog-masonry.php"){
			if($blog_masonry_type == "blog_masonry_standard"){
				$blog_list = "blog_masonry";
				$blog_list_class = "masonry";
			}if($blog_masonry_type == "blog_masonry_meta_info_featured_on_side"){
				$blog_list = "blog_masonry_meta_info_featured_on_side";
				$blog_list_class = "masonry blog_masonry_meta_info_featured_on_side";
			}
		}elseif($mkd_burst_template_name == "blog-masonry-full-width.php"){
			if($blog_masonry_type == "blog_masonry_standard"){
				$blog_list = "blog_masonry";
				$blog_list_class = "masonry_full_width";
			}
			if($blog_masonry_type == "blog_masonry_meta_info_featured_on_side"){
				$blog_list = "blog_masonry_meta_info_featured_on_side";
				$blog_list_class = "masonry_full_width blog_masonry_meta_info_featured_on_side";
			}
        }elseif($mkd_burst_template_name == "blog-standard.php"){
            $blog_list = "blog_standard";
            $blog_list_class = "blog_standard_type";
        }elseif($mkd_burst_template_name == "blog-standard-whole-post.php"){
			$blog_list = "blog_standard_whole_post";
			$blog_list_class = "blog_standard_type";
        }else{
			$blog_list = "blog_standard";
			$blog_list_class = "blog_standard_type";
		}
	} else{
		if($blog_style=="blog_standard"){
			$blog_list = "blog_standard";
			$blog_list_class = "blog_standard_type";
        }elseif($blog_style=="blog_masonry"){
			if($blog_masonry_type == "blog_masonry_standard"){
				$blog_list = "blog_masonry";
				$blog_list_class = "masonry";
			}if($blog_masonry_type == "blog_masonry_meta_info_featured_on_side"){
				$blog_list = "blog_masonry_meta_info_featured_on_side";
				$blog_list_class = "masonry blog_masonry_meta_info_featured_on_side";
			}
        }elseif($blog_style=="blog_masonry_full_width"){
			if($blog_masonry_type == "blog_masonry_standard"){
				$blog_list = "blog_masonry";
				$blog_list_class = "masonry_full_width";
			}
			if($blog_masonry_type == "blog_masonry_meta_info_featured_on_side"){
				$blog_list = "blog_masonry_meta_info_featured_on_side";
				$blog_list_class = "masonry_full_width blog_masonry_meta_info_featured_on_side";
			}
		}elseif($blog_style=="blog_standard_whole_post"){
			$blog_list = "blog_standard_whole_post";
			$blog_list_class = "blog_standard_type";
		}else {
			$blog_list = "blog_standard";
			$blog_list_class = "blog_standard_type";
		}
	}

    $pagination_masonry = "pagination";
    if(isset($mkd_burst_options['pagination_masonry'])){
       $pagination_masonry = $mkd_burst_options['pagination_masonry'];
		if($blog_list == "blog_masonry" || $blog_list == "blog_masonry_meta_info_featured_on_side") {
			$blog_list_class .= " masonry_" . $pagination_masonry;
		}
    }

?>
<?php

	if(($blog_list == "blog_masonry" || $blog_list == "blog_masonry_meta_info_featured_on_side") && $filter == "yes") {
		get_template_part('templates/blog/masonry', 'filter');

	}

	$blog_masonry_columns = 'three_columns';
	if (isset($mkd_burst_options['blog_masonry_columns']) && $mkd_burst_options['blog_masonry_columns'] !== '') {
		$blog_masonry_columns = $mkd_burst_options['blog_masonry_columns'];
	}

	$blog_masonry_full_width_columns = 'five_columns';
	if (isset($mkd_burst_options['blog_masonry_full_width_columns']) && $mkd_burst_options['blog_masonry_full_width_columns'] !== '') {
		$blog_masonry_full_width_columns = $mkd_burst_options['blog_masonry_full_width_columns'];
	}
	
	if($mkd_burst_template_name == "blog-masonry.php" || $blog_style == 'blog_masonry'){
		$blog_list_class .= " " .$blog_masonry_columns;
	}
	
	if($mkd_burst_template_name == "blog-masonry-full-width.php" || $blog_style == 'blog_masonry_full_width'){
		$blog_list_class .= " " .$blog_masonry_full_width_columns;
	}

	
	$icon_left_html =  "<i class='pagination_arrow arrow_carrot-left'></i>";
	if (isset($mkd_burst_options['pagination_arrows_type']) && $mkd_burst_options['pagination_arrows_type'] != '') {
		$icon_navigation_class = $mkd_burst_options['pagination_arrows_type'];
		$direction_nav_classes = mkd_burst_horizontal_slider_icon_classes($icon_navigation_class);
		$icon_left_html = '<span class="pagination_arrow ' . $direction_nav_classes['left_icon_class']. '"></span>';
	}
	
	$icon_left_html .= '<span class="pagination_label">';
	if (isset($mkd_burst_options['blog_pagination_previous_label']) && $mkd_burst_options['blog_pagination_previous_label'] != '') {
		$icon_left_html.= $mkd_burst_options['blog_pagination_previous_label'];
	}
	else{
		$icon_left_html .= "Previous";
	}
	$icon_left_html .= '</span>';


	$icon_right_html = '<span class="pagination_label">';
	if (isset($mkd_burst_options['blog_pagination_next_label']) && $mkd_burst_options['blog_pagination_next_label'] != '') {
		$icon_right_html .= $mkd_burst_options['blog_pagination_next_label'];
	}
	else {
		$icon_right_html .= "Next";
	}
	$icon_right_html .= '</span>';

	if (isset($mkd_burst_options['pagination_arrows_type']) && $mkd_burst_options['pagination_arrows_type'] != '') {
		$icon_navigation_class = $mkd_burst_options['pagination_arrows_type'];
		$direction_nav_classes = mkd_burst_horizontal_slider_icon_classes($icon_navigation_class);
		$icon_right_html .= '<span class="pagination_arrow ' . $direction_nav_classes['right_icon_class']. '"></span>';
	}
	else{
		$icon_right_html .=  "<i class='pagination_arrow arrow_carrot-right'></i>";
	}

	?>

	<div class="blog_holder <?php echo esc_attr($blog_list_class); ?>">
		
	<?php if($blog_list == "blog_masonry" || $blog_list == "blog_masonry_meta_info_featured_on_side") { ?>
		<div class="blog_holder_grid_sizer"></div>
		<div class="blog_holder_grid_gutter"></div>
	<?php } ?>
	<?php if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
		<?php
			get_template_part('templates/blog/'.$blog_list, 'loop');
		?>
	<?php endwhile; ?>
	<?php if($blog_list != "blog_masonry" && $blog_list != "blog_masonry_meta_info_featured_on_side") {
		if ($mkd_burst_options['blog_pagination_type'] == 'standard'){
				mkd_burst_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
			}
		elseif ($mkd_burst_options['blog_pagination_type'] == 'prev_and_next'){?>
			<div class="pagination_prev_and_next_only">
				<ul>
					<li class='prev'><?php echo wp_kses_post(get_previous_posts_link($icon_left_html, $blog_query->max_num_pages)); ?></li>
					<li class='next'><?php echo wp_kses_post(get_next_posts_link($icon_right_html, $blog_query->max_num_pages)); ?></li>
				</ul>
			</div>
		<?php } ?>
	<?php } ?>
	<?php else: //If no posts are present ?>
	<div class="entry">
			<p><?php esc_html_e('No posts were found.', 'burst'); ?></p>
	</div>
	<?php endif; ?>
</div>
<?php if($blog_list == "blog_masonry" || $blog_list == "blog_masonry_meta_info_featured_on_side") {
    if($pagination_masonry == "load_more") {
		if (get_next_posts_link(null, $blog_query->max_num_pages)) { ?>
			<div class="blog_load_more_button_holder">
				<div class="blog_load_more_button"><span data-rel="<?php echo esc_attr($blog_query->max_num_pages); ?>"><?php echo wp_kses_post(get_next_posts_link(esc_html__('Show more', 'burst'), $blog_query->max_num_pages)); ?></span></div>
			</div>
		<?php } ?>
	 <?php } elseif($pagination_masonry == "infinite_scroll") { ?>
		<div class="blog_infinite_scroll_button"><span data-rel="<?php echo esc_attr($blog_query->max_num_pages); ?>"><?php echo wp_kses_post(get_next_posts_link(esc_html__('Show more', 'burst'), $blog_query->max_num_pages)); ?></span></div>
    <?php }else { ?>
        <?php if($mkd_burst_options['blog_pagination_type'] == 'standard' && $mkd_burst_options['pagination'] != "0") {
				mkd_burst_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
            }
        	elseif ($mkd_burst_options['blog_pagination_type'] == 'prev_and_next'){ ?>
				<div class="pagination_prev_and_next_only">
					<ul>
						<li class='prev'><?php echo wp_kses_post(get_previous_posts_link($icon_left_html, $blog_query->max_num_pages)); ?></li>
						<li class='next'><?php echo wp_kses_post(get_next_posts_link($icon_right_html, $blog_query->max_num_pages)); ?></li>
					</ul>
				</div>
		<?php } ?>
    <?php } ?>
<?php } ?>
<?php wp_reset_postdata(); ?>