<?php
/*
Template Name: Blog Masonry Full Width
*/
?>
<?php get_header(); ?>
<?php
global $wp_query;
global $mkd_burst_template_name;
global $mkd_burst_page_id;
$mkd_burst_page_id = $wp_query->get_queried_object_id();
$id = $wp_query->get_queried_object_id();
$mkd_burst_template_name = get_page_template_slug($id);
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
$page_object = get_post( $id );
$mkd_content = $page_object->post_content;

$sidebar = get_post_meta($id, "mkd_show-sidebar", true);

if(get_post_meta($id, "mkd_page_background_color", true) != ""){
	$background_color = 'background-color: '.esc_attr(get_post_meta($id, "mkd_page_background_color", true));
}else{
	$background_color = "";
}

$content_style = "";
if(get_post_meta($id, "mkd_content-top-padding", true) != ""){
	if(get_post_meta($id, "mkd_content-top-padding-mobile", true) == 'yes'){
		$content_style = "padding-top:".esc_attr(get_post_meta($id, "mkd_content-top-padding", true))."px !important";
	}else{
		$content_style = "padding-top:".esc_attr(get_post_meta($id, "mkd_content-top-padding", true))."px";
	}
}

if(isset($mkd_burst_options['blog_masonry_number_of_chars'])&& $mkd_burst_options['blog_masonry_number_of_chars'] != "") {
	mkd_burst_set_blog_word_count(esc_attr($mkd_burst_options['blog_masonry_number_of_chars']));
}
$category_filter = "no";
if(isset($mkd_burst_options['blog_masonry_filter'])){
	$category_filter = $mkd_burst_options['blog_masonry_filter'];
}
$container_inner_class = "";
if($category_filter == "yes"){
	$container_inner_class = " full_page_container_inner";
}
?>

	<script>
		<?php if(get_post_meta($id, "mkd_page_scroll_amount_for_sticky", true)) { ?>
		page_scroll_amount_for_sticky = <?php echo esc_attr(get_post_meta($id, "mkd_page_scroll_amount_for_sticky", true)); ?>;
		<?php }else{ ?>
		page_scroll_amount_for_sticky = undefined
		<?php } ?>
	</script>

	<?php get_template_part( 'title' ); ?>
	<?php get_template_part('slider'); ?>

	<?php		
		if(isset($mkd_burst_options['blog_page_range']) && $mkd_burst_options['blog_page_range'] != ""){
			$blog_page_range = esc_attr($mkd_burst_options['blog_page_range']);
		} else{
			$blog_page_range = $wp_query->max_num_pages;
		}
	?>
	<div class="full_width" <?php mkd_burst_inline_style($background_color); ?>>
		<div class="full_width_inner clearfix <?php echo esc_attr($container_inner_class); ?>" <?php mkd_burst_inline_style($content_style); ?>>
			<?php
				echo apply_filters('the_content', wp_kses_post($mkd_content));
				get_template_part('templates/blog/blog', 'structure');
			?>
		</div>
	</div>
<?php get_footer(); ?>