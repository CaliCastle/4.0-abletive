<?php
global $mkd_burst_options;
global $more;
$more = 0;


$blog_show_categories = "no";
if (isset($mkd_burst_options['blog_masonry_show_categories'])){
	$blog_show_categories = $mkd_burst_options['blog_masonry_show_categories'];
}
$blog_show_comments = "no";
if (isset($mkd_burst_options['blog_masonry_show_comments'])){
	$blog_show_comments = $mkd_burst_options['blog_masonry_show_comments'];
}

$blog_show_author = "no";
if (isset($mkd_burst_options['blog_masonry_show_author'])){
	$blog_show_author = $mkd_burst_options['blog_masonry_show_author'];
}
$blog_show_like = "no";
if (isset($mkd_burst_options['blog_masonry_show_like'])) {
	$blog_show_like = $mkd_burst_options['blog_masonry_show_like'];
}
$blog_show_ql_icon_mark = "yes";
$blog_title_holder_icon_class = "";
if (isset($mkd_burst_options['blog_masonry_show_ql_mark'])) {
	$blog_show_ql_icon_mark = $mkd_burst_options['blog_masonry_show_ql_mark'];
}

if ($blog_show_ql_icon_mark == "yes") {
	$blog_title_holder_icon_class = " with_icon_right";
}

$blog_show_date = "no";
if (isset($mkd_burst_options['blog_masonry_show_date'])) {
	$blog_show_date = $mkd_burst_options['blog_masonry_show_date'];
}

$blog_social_share_type = "dropdown";
if(isset($mkd_burst_options['blog_masonry_select_share_options_masonry_type'])){
	$blog_social_share_type = $mkd_burst_options['blog_masonry_select_share_options_masonry_type'];
}
$blog_show_social_share = "no";
if (isset($mkd_burst_options['enable_social_share'])&& $mkd_burst_options['enable_social_share'] =="yes"){
	if (isset($mkd_burst_options['post_types_names_post'])&& $mkd_burst_options['post_types_names_post'] =="post"){
		if (isset($mkd_burst_options['blog_masonry_show_share'])&& $blog_social_share_type == "dropdown") {
					$blog_show_social_share = $mkd_burst_options['blog_masonry_show_share'];
		}
	}
}

$blog_read_more_button_classes = '';
if (isset($mkd_burst_options['blog_masonry_read_more_button_icon']) && $mkd_burst_options['blog_masonry_read_more_button_icon'] == 'yes'){
    $blog_read_more_button_classes .= 'with_icon';
}

$_post_format = get_post_format();

$blog_masonry_type = "post_info_below_title";
if(isset($mkd_burst_options['blog_masonry_type'])){
	$blog_masonry_type = $mkd_burst_options['blog_masonry_type'];
}

$blog_ql_background_image = "no";
if(isset($mkd_burst_options['blog_masonry_ql_background_image'])){
	$blog_ql_background_image = $mkd_burst_options['blog_masonry_ql_background_image'];
}

?>
<?php
switch ($_post_format) {
	case "video":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php get_template_part('templates/blog/parts/post-format-video'); ?>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<h4>
						<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
					<?php if($blog_masonry_type == "post_info_below_title"){ 
					if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>
							<div class="post_info">
								<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
					<?php }} ?>
					<?php
						mkd_burst_excerpt();
						mkd_burst_read_more_button('blog_masonry_read_more_button',$blog_read_more_button_classes);
					?>

					<?php if($blog_masonry_type == "post_info_at_bottom"){ 
						if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>
							<div class="post_info post_info_bottom">
								<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
					<?php }} ?>
					<?php if(isset($mkd_burst_options['blog_masonry_show_share']) && $mkd_burst_options['blog_masonry_show_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]'); // XSS OK
					}; ?>
				</div>
			</div>
		</article>

		<?php
		break;
	case "audio":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post_image">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('full'); ?>
						</a>
					</div>
				<?php } ?>
				<div class="audio_image">
					<audio class="blog_audio" src="<?php echo esc_url(get_post_meta(get_the_ID(), "audio_link", true)) ?>" controls="controls">
						<?php esc_html_e("Your browser don't support audio player","burst"); ?>
					</audio>
				</div>
				<div class="post_text">
					<div class="post_text_inner">
						<h4>
							<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h4>
						<?php if($blog_masonry_type == "post_info_below_title"){ 
						if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>
								<div class="post_info">
									<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
								</div>
						<?php }} ?>
						<?php
							mkd_burst_excerpt();
                            mkd_burst_read_more_button('blog_masonry_read_more_button',$blog_read_more_button_classes);
						?>

						<?php if($blog_masonry_type == "post_info_at_bottom"){
							if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>
							<div class="post_info post_info_bottom">
								<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
						<?php }} ?>
						<?php if(isset($mkd_burst_options['blog_masonry_show_share']) && $mkd_burst_options['blog_masonry_show_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]'); // XSS OK
						}; ?>	
					</div>
				</div>
		</article>
		<?php
		break;
	case "link":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_text  <?php if($blog_ql_background_image == "yes") { if ( has_post_thumbnail() ) { ?> link_image" style="background:url(<?php  echo wp_get_attachment_url(get_post_thumbnail_id()); ?>); <?php }} ?>">
					<div class="post_text_inner">
						<?php if ($blog_show_ql_icon_mark == "yes") { ?>
							<div class="post_info_link_mark">
								<span class="fa fa-link link_mark"></span>
							</div>
						<?php } ?>
						<div class="post_title<?php echo esc_attr($blog_title_holder_icon_class); ?>">
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						</div>
						<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
							<div class="post_info">							
								<?php 
								mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like));
								?>
							</div>
						<?php } ?>
						<?php if(isset($mkd_burst_options['blog_masonry_show_share']) && $mkd_burst_options['blog_masonry_show_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]'); // XSS OK
						}; ?>
					</div>
				</div>
			</div>
		</article>
		<?php
		break;
	case "gallery":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php get_template_part('templates/blog/parts/post-format-gallery-slider'); ?>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<h4>
						<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h4>
					<?php if($blog_masonry_type == "post_info_below_title"){ ?>
						<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
							<div class="post_info">
								<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
					<?php }} ?>
					<?php
						mkd_burst_excerpt();
                        mkd_burst_read_more_button('blog_masonry_read_more_button',$blog_read_more_button_classes);
					?>

					<?php if($blog_masonry_type == "post_info_at_bottom"){ ?>
						<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
							<div class="post_info post_info_bottom">
								<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
					<?php }} ?>
					<?php if(isset($mkd_burst_options['blog_masonry_show_share']) && $mkd_burst_options['blog_masonry_show_share'] == "yes" && $blog_social_share_type == "list") {
						echo do_shortcode('[no_social_share_list]'); // XSS OK
					}; ?>	
				</div>
			</div>
		</article>
		<?php
		break;
	case "quote":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_text  <?php if($blog_ql_background_image == "yes") { if ( has_post_thumbnail() ) { ?> quote_image" style="background:url(<?php  echo wp_get_attachment_url(get_post_thumbnail_id()); ?>);<?php }} ?>">
					<div class="post_text_inner">
						<?php if ($blog_show_ql_icon_mark == "yes") { ?>
							<div class="post_info_quote_mark">
								<span class="fa fa-quote-right quote_mark"></span>
							</div>
						<?php } ?>
						<div class="post_title<?php echo esc_attr($blog_title_holder_icon_class); ?>">
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php echo esc_html(get_post_meta(get_the_ID(), "quote_format", true)); ?>
								</a>
							</h3>
							<span class="quote_author">&mdash; <?php the_title(); ?></span>
						</div>
						<?php if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
							<div class="post_info">
								<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
							</div>
						<?php } ?>
						<?php if(isset($mkd_burst_options['blog_masonry_show_share']) && $mkd_burst_options['blog_masonry_show_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]'); // XSS OK
						}; ?>
					</div>
				</div>
			</div>
		</article>
		<?php
		break;
	default:
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post_image">
						<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('full'); ?>
						</a>
					</div>
				<?php } ?>
				<div class="post_text">
					<div class="post_text_inner">
						<h4>
							<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h4>
						<?php if($blog_masonry_type == "post_info_below_title"){ 
							if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
								<div class="post_info">
									<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
								</div>
						<?php }} ?>
						<?php
							mkd_burst_excerpt();
                            mkd_burst_read_more_button('blog_masonry_read_more_button',$blog_read_more_button_classes);
						?>
													
						<?php if($blog_masonry_type == "post_info_at_bottom"){ 
							if($blog_show_author == "yes" || $blog_show_date == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_comments == "yes" || $blog_show_like == "yes") { ?>	
								<div class="post_info post_info_bottom">
									<?php mkd_burst_post_info(array('date' => $blog_show_date, 'author' => $blog_show_author, 'share' => $blog_show_social_share, 'category' => $blog_show_categories, 'comments' => $blog_show_comments, 'like' => $blog_show_like)); ?>
								</div>
						<?php }} ?>
						<?php if(isset($mkd_burst_options['blog_masonry_show_share']) && $mkd_burst_options['blog_masonry_show_share'] == "yes" && $blog_social_share_type == "list") {
							echo do_shortcode('[no_social_share_list]'); // XSS OK
						}; ?>
					</div>
				</div>
			</article>
		<?php
}
?>

