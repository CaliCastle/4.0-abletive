<?php
global $mkd_burst_options;

$blog_show_comments = "yes";
if (isset($mkd_burst_options['blog_single_show_comments'])) {
    $blog_show_comments = $mkd_burst_options['blog_single_show_comments'];
}
$blog_show_author = "yes";
if (isset($mkd_burst_options['blog_author_info'])) {
    $blog_show_author = $mkd_burst_options['blog_author_info'];
}
$blog_show_like = "yes";
if (isset($mkd_burst_options['blog_single_show_like'])) {
    $blog_show_like = $mkd_burst_options['blog_single_show_like'];
}
$blog_show_date = "yes";
if (isset($mkd_burst_options['blog_single_show_date'])) {
    $blog_show_date = $mkd_burst_options['blog_single_show_date'];
}
$blog_show_time = "yes";
if (isset($mkd_burst_options['blog_single_show_time'])){
	$blog_show_time = $mkd_burst_options['blog_single_show_time'];
}

$blog_social_share_type = "dropdown";
$blog_show_social_share = "no";
if (isset($mkd_burst_options['enable_social_share'])&& ($mkd_burst_options['enable_social_share']) =="yes"){
    if (isset($mkd_burst_options['post_types_names_post'])&& $mkd_burst_options['post_types_names_post'] =="post"){
        if (isset($mkd_burst_options['blog_single_show_social_share'])) {
            $blog_show_social_share = $mkd_burst_options['blog_single_show_social_share'];
        }
    }
}
$blog_show_categories = "yes";
if (isset($mkd_burst_options['blog_single_show_category'])) {
    $blog_show_categories = $mkd_burst_options['blog_single_show_category'];
}
$blog_show_ql_icon = "yes";
$blog_title_holder_icon_class = "";
if (isset($mkd_burst_options['blog_single_show_ql_icon'])) {
    $blog_show_ql_icon = $mkd_burst_options['blog_single_show_ql_icon'];
}

if($blog_show_ql_icon == "yes"){
	$blog_title_holder_icon_class = " with_icon_right";
}

$blog_image_size = 'full';
if( isset($mkd_burst_options['blog_single_image_size']) && $mkd_burst_options['blog_single_image_size'] !== '') {
    $blog_image_size = $mkd_burst_options['blog_single_image_size'];

}

if( $blog_image_size == 'custom'
    && isset($mkd_burst_options['blog_single_image_size_height']) && $mkd_burst_options['blog_single_image_size_height'] !== ''
    && isset($mkd_burst_options['blog_single_image_size_width']) && $mkd_burst_options['blog_single_image_size_width'] !== '') {

    $image_height = $mkd_burst_options['blog_single_image_size_height'];
    $image_width = $mkd_burst_options['blog_single_image_size_width'];

    $image_html = mkd_burst_generate_thumbnail(get_post_thumbnail_id(get_the_ID()),null,$image_width,$image_height);
}
else{
    $image_html = get_the_post_thumbnail(get_the_ID(), $blog_image_size);
}

$blog_ql_background_image = "no";
if(isset($mkd_burst_options['blog_standard_type_ql_background_image'])){
	$blog_ql_background_image = $mkd_burst_options['blog_standard_type_ql_background_image'];
}
$background_image_object = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID()), 'blog_image_format_link_quote');
$background_image_src = $background_image_object[0];

$_post_format = get_post_format();

$background_image_html = '';
$background_image_html_class = '';
if($blog_ql_background_image == "yes"){
	if(get_post_meta(get_the_ID(), "mkd_hide-featured-image", true) != "yes"){		
		if($_post_format == "quote"){
			$background_image_html_class .=  ' quote_image';
		}elseif($_post_format == "link"){
			$background_image_html_class .=  ' link_image';
		}
		$background_image_html = 'background-image: url(' . esc_url($background_image_src) . ')';
	}
}
$gallery_position = "above_post_content";
if(get_post_meta(get_the_ID(), "gallery_position", true) !== ""){
	$gallery_position = get_post_meta(get_the_ID(), "gallery_position", true);
}

?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				 <div class="post_image">
					<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
					<?php if($_video_type == "youtube") { ?>
						<iframe  src="//www.youtube.com/embed/<?php echo esc_attr(get_post_meta(get_the_ID(), "video_format_link", true));  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
					<?php } elseif ($_video_type == "vimeo"){ ?>
						<iframe src="//player.vimeo.com/video/<?php echo esc_attr(get_post_meta(get_the_ID(), "video_format_link", true));  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php } elseif ($_video_type == "self"){ ?> 
						<div class="video"> 
						    <div class="mobile-video-image" style="background-image: url(<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>);"></div>
					    	<div class="video-wrap"  >
							    <video class="video" poster="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>" preload="auto">
								    <?php if(get_post_meta(get_the_ID(), "video_format_webm", true) != "") { ?> <source type="video/webm" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_webm", true));  ?>"> <?php } ?>
								    <?php if(get_post_meta(get_the_ID(), "video_format_mp4", true) != "") { ?> <source type="video/mp4" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_mp4", true));  ?>"> <?php } ?>
								    <?php if(get_post_meta(get_the_ID(), "video_format_ogv", true) != "") { ?> <source type="video/ogg" src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_ogv", true));  ?>"> <?php } ?>
								    <object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>">
								    	<param name="movie" value="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>" />
									    <param name="flashvars" value="controls=true&file=<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_mp4", true));  ?>" />
									    <img src="<?php echo esc_url(get_post_meta(get_the_ID(), "video_format_image", true));  ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
								    </object>
							    </video>
						    </div>
                        </div>
					<?php } ?>
				 </div>
                 <div class="post_text">
                    <div class="post_text_inner">
						<div class="post_date_title_holder">
							<?php
							if ($blog_show_date == "yes"){ ?>
							<div class="post_date_holder">
								<span class="post_date_day"><?php the_time('d');?></span>
								<p class="post_date_month"><?php the_time('M');?></p>
							</div>
							<?php } ?>
							<h2>
								<?php the_title(); ?>
							</h2>
						</div>
						<div class="post_content">
							<?php
								the_content();
							?>
						</div>
						<?php if($blog_show_author == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_like == "yes" || $blog_show_time == "yes") { ?>	
							<div class="post_info">
								<?php
								if ($blog_show_time == "yes"){ ?>
								<div class="post_info_time">
									<span class="info_icon icon-clock"></span>
									<span><?php the_time('H:i');?></span>
								</div>
								<?php } ?>
								<?php
								mkd_burst_post_info(array('share' => $blog_show_social_share));
								mkd_burst_post_info(array('like' => $blog_show_like));
								?>
								<div class="post_print">
									<a href="#" class="blog_print">
										<span class="info_icon icon-printer"></span>
										<span><?php esc_html_e("Print", "burst") ?></span>
									</a>
								</div>
								<?php
								if($blog_show_categories == "yes"){ ?>
								<div class="post_info_category">
									<span class="info_icon icon-pencil"></span>
									<span><?php the_category(', '); ?></span>
								</div>
								<?php } ?>
							</div>
						<?php } ?>
                    </div>
                </div>
			</div>
		</article>
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">				
                <?php if(get_post_meta(get_the_ID(), "mkd_hide-featured-image", true) != "yes") {
                     if ( has_post_thumbnail() ) { ?>
                        <div class="post_image">
                            <?php echo wp_kses($image_html, array(
                                'img' => array(
                                    'src' => true,
                                    'alt' => true,
                                    'width' => true,
                                    'height' => true,
                                    'draggable' => true
                                )
                            )); ?>
                        </div>
                <?php }} ?>
				<div class="audio_image">
					<audio class="blog_audio" src="<?php echo esc_url(get_post_meta(get_the_ID(), "audio_link", true)) ?>" controls="controls">
						<?php esc_html_e("Your browser don't support audio player","burst"); ?>
					</audio>
				</div>
                <div class="post_text">
                    <div class="post_text_inner">
						<div class="post_date_title_holder">
							<?php
							if ($blog_show_date == "yes"){ ?>
							<div class="post_date_holder">
								<span class="post_date_day"><?php the_time('d');?></span>
								<p class="post_date_month"><?php the_time('M');?></p>
							</div>
							<?php } ?>
							<h2>
								<?php the_title(); ?>
							</h2>
						</div>
						<div class="post_content">
							<?php
								the_content();
							?>
						</div>
						<?php if($blog_show_author == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_like == "yes" || $blog_show_time == "yes") { ?>	
							<div class="post_info">
								<?php
								if ($blog_show_time == "yes"){ ?>
								<div class="post_info_time">
									<span class="info_icon icon-clock"></span>
									<span><?php the_time('H:i');?></span>
								</div>
								<?php } ?>
								<?php
								mkd_burst_post_info(array('share' => $blog_show_social_share));
								mkd_burst_post_info(array('like' => $blog_show_like));
								?>
								<div class="post_print">
									<a href="#" class="blog_print">
										<span class="info_icon icon-printer"></span>
										<span><?php esc_html_e("Print", "burst") ?></span>
									</a>
								</div>
								<?php
								if($blog_show_categories == "yes"){ ?>
								<div class="post_info_category">
									<span class="info_icon icon-pencil"></span>
									<span><?php the_category(', '); ?></span>
								</div>
								<?php } ?>
							</div>
						<?php } ?>
                    </div>
                </div>
			</div>
		</article>
<?php
		break;
		case "link":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post_content_holder">
                <div class="post_text_columns">
					<div class="post_text<?php echo esc_attr($background_image_html_class); ?>" <?php mkd_burst_inline_style($background_image_html); ?>>
						<div class="post_text_inner">
							<?php if ($blog_show_ql_icon == "yes") { ?>
								<div class="post_info_link_mark">
									<span aria-hidden="true" class="icon_link"></span>
								</div>
							<?php } ?>
							<div class="post_title link">
								<?php $title_link = get_post_meta(get_the_ID(), "title_link", true) != '' ? esc_url(get_post_meta(get_the_ID(), "title_link", true)) : 'javascript: void(0)'; ?>
								<h3><a href="<?php echo esc_url($title_link); ?>"><?php the_title(); ?></a></h3>
							</div>
						</div>
					</div>
					<div class="post_date_content_holder">
						<?php
						if ($blog_show_date == "yes"){ ?>
						<div class="post_date_holder">
							<div class="post_date_holder_inner">
								<span class="post_date_day"><?php the_time('d');?></span>
								<p class="post_date_month"><?php the_time('M');?></p>
							</div>
						</div>
						<?php } ?>
						<div class="post_content"><?php the_content(); ?></div>
                    </div>
					<?php if($blog_show_author == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_like == "yes" || $blog_show_time == "yes") { ?>	
						<div class="post_info">
							<?php
							if ($blog_show_time == "yes"){ ?>
							<div class="post_info_time">
								<span class="info_icon icon-clock"></span>
								<span><?php the_time('H:i');?></span>
							</div>
							<?php } ?>
							<?php
							mkd_burst_post_info(array('share' => $blog_show_social_share));
							mkd_burst_post_info(array('like' => $blog_show_like));
							?>
							<div class="post_print">
								<a href="#" class="blog_print">
									<span class="info_icon icon-printer"></span>
									<span><?php esc_html_e("Print", "burst") ?></span>
								</a>
							</div>
							<?php
							if($blog_show_categories == "yes"){ ?>
							<div class="post_info_category">
								<span class="info_icon icon-pencil"></span>
								<span><?php the_category(', '); ?></span>
							</div>
							<?php } ?>
						</div>
					<?php } ?>
                </div>
            </div>
        </article>
<?php
		break;
		case "gallery":
?>
		<article id="post-<?php the_ID(); ?>">
			<div class="post_content_holder">
				<?php if($gallery_position == "above_post_content"){ ?>
					<div class="post_image">					
						<?php get_template_part('templates/blog/parts/post-format-gallery-slider'); ?>
					</div>
				<?php } ?>
                <div class="post_text">
                    <div class="post_text_inner">
						<div class="post_date_title_holder">
							<?php
							if ($blog_show_date == "yes"){ ?>
							<div class="post_date_holder">
								<span class="post_date_day"><?php the_time('d');?></span>
								<p class="post_date_month"><?php the_time('M');?></p>
							</div>
							<?php } ?>
							<h2>
								<?php the_title(); ?>
							</h2>
						</div>
						<div class="post_content">
							<?php
								the_content();
							?>
						</div>
						<?php if($blog_show_author == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_like == "yes" || $blog_show_time == "yes") { ?>	
							<div class="post_info">
								<?php
								if ($blog_show_time == "yes"){ ?>
								<div class="post_info_time">
									<span class="info_icon icon-clock"></span>
									<span><?php the_time('H:i');?></span>
								</div>
								<?php } ?>
								<?php
								mkd_burst_post_info(array('share' => $blog_show_social_share));
								mkd_burst_post_info(array('like' => $blog_show_like));
								?>
								<div class="post_print">
									<a href="#" class="blog_print">
										<span class="info_icon icon-printer"></span>
										<span><?php esc_html_e("Print", "burst") ?></span>
									</a>
								</div>
								<?php
								if($blog_show_categories == "yes"){ ?>
								<div class="post_info_category">
									<span class="info_icon icon-pencil"></span>
									<span><?php the_category(', '); ?></span>
								</div>
								<?php } ?>
							</div>
						<?php } ?>
                    </div>
                </div>
            </div>
		</article>
<?php
		break;
		case "quote":
?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post_content_holder">
                    <div class="post_text_columns">
                        <div class="post_text<?php echo esc_attr($background_image_html_class); ?>" <?php mkd_burst_inline_style($background_image_html); ?>>
                            <div class="post_text_inner">
								<?php if ($blog_show_ql_icon == "yes") { ?>
									<div class="post_info_quote_mark">
										<span aria-hidden="true" class="icon_quotations"></span>
									</div>
								<?php } ?>
								<div class="post_title quote">
									<h3>
										<?php echo esc_html(get_post_meta(get_the_ID(), "quote_format", true)); ?>
									</h3>								
									<span class="quote_author">&mdash; <?php the_title(); ?></span>
								</div>  
                            </div>
                        </div>
						<div class="post_date_content_holder">
							<?php
							if ($blog_show_date == "yes"){ ?>
							<div class="post_date_holder">
								<div class="post_date_holder_inner">
									<span class="post_date_day"><?php the_time('d');?></span>
									<p class="post_date_month"><?php the_time('M');?></p>
								</div>
							</div>
							<?php } ?>
							<div class="post_content"><?php the_content(); ?></div>
                        </div>
						<?php if($blog_show_author == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_like == "yes" || $blog_show_time == "yes") { ?>	
							<div class="post_info">
								<?php
								if ($blog_show_time == "yes"){ ?>
								<div class="post_info_time">
									<span class="info_icon icon-clock"></span>
									<span><?php the_time('H:i');?></span>
								</div>
								<?php } ?>
								<?php
								mkd_burst_post_info(array('share' => $blog_show_social_share));
								mkd_burst_post_info(array('like' => $blog_show_like));
								?>
								<div class="post_print">
									<a href="#" class="blog_print">
										<span class="info_icon icon-printer"></span>
										<span><?php esc_html_e("Print", "burst") ?></span>
									</a>
								</div>
								<?php
								if($blog_show_categories == "yes"){ ?>
								<div class="post_info_category">
									<span class="info_icon icon-pencil"></span>
									<span><?php the_category(', '); ?></span>
								</div>
								<?php } ?>
							</div>
						<?php } ?>
                    </div>
                </div>
            </article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
                <?php if(get_post_meta(get_the_ID(), "mkd_hide-featured-image", true) != "yes") {
                    if ( has_post_thumbnail() ) { ?>
                        <div class="post_image">
                            <?php echo wp_kses($image_html, array(
                                'img' => array(
                                    'src' => true,
                                    'alt' => true,
                                    'width' => true,
                                    'height' => true,
                                    'draggable' => true
                                )
                            )); ?>
                        </div>
				<?php }} ?>
				<div class="post_text">
					<div class="post_text_inner">
						<div class="post_date_title_holder">
							<?php
							if ($blog_show_date == "yes"){ ?>
							<div class="post_date_holder">
								<span class="post_date_day"><?php the_time('d');?></span>
								<p class="post_date_month"><?php the_time('M');?></p>
							</div>
							<?php } ?>
                            <h2>
                                <?php the_title(); ?>
                            </h2>
                        </div>
                        <div class="post_content">
							<?php
                                the_content();
							?>
						</div>
						<?php if($blog_show_author == "yes" || $blog_show_social_share == "yes" || $blog_show_categories == "yes" || $blog_show_like == "yes" || $blog_show_time == "yes") { ?>	
							<div class="post_info">
								<?php
								if ($blog_show_time == "yes"){ ?>
								<div class="post_info_time">
									<span class="info_icon icon-clock"></span>
									<span><?php the_time('H:i');?></span>
								</div>
								<?php } ?>
								<?php
								mkd_burst_post_info(array('share' => $blog_show_social_share));
								mkd_burst_post_info(array('like' => $blog_show_like));
								?>
								<div class="post_print">
									<a href="#" class="blog_print">
										<span class="info_icon icon-printer"></span>
										<span><?php esc_html_e("Print", "burst") ?></span>
									</a>
								</div>
								<?php
								if($blog_show_categories == "yes"){ ?>
								<div class="post_info_category">
									<span class="info_icon icon-pencil"></span>
									<span><?php the_category(', '); ?></span>
								</div>
								<?php } ?>
							</div>
						<?php } ?>
                    </div>
				</div>
			</div>
		</article>
<?php
}
?>