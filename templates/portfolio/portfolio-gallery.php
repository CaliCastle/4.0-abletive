<?php
//get global variables
global $wp_query;
global $mkd_burst_options;
global $wpdb;
global $wp_filesystem;

//init variables
$portfolio_images 			= get_post_meta(get_the_ID(), "mkd_portfolio_images", true);
$lightbox_single_project 	= 'no';
$columns_number 			= 'v4';
$portfolio_title_tag            = 'h3';
$portfolio_title_style          = '';
$portfolio_gallery_hover_type 	= 'magnifier';
$portfolio_gallery_image_hover_separator = '';
$portfolio_info_tag				= 'h6';
$show_like						= true;


//is lightbox turned on for single project?
if (isset($mkd_burst_options['lightbox_single_project'])) {
	$lightbox_single_project = $mkd_burst_options['lightbox_single_project'];
}

//set title tag
if (isset($mkd_burst_options['portfolio_title_tag'])) {
    $portfolio_title_tag = $mkd_burst_options['portfolio_title_tag'];
}

//gallery hover type (image, or text)
if (isset($mkd_burst_options['portfolio_gallery_image_hover_style'])) {
    $portfolio_gallery_hover_type = $mkd_burst_options['portfolio_gallery_image_hover_style'];
}

//gallery hover separator with text
if (isset($mkd_burst_options['portfolio_gallery_image_hover_separator'])) {
    $portfolio_gallery_image_hover_separator = $mkd_burst_options['portfolio_gallery_image_hover_separator'];
}
//is lightbox turned on for video single project?
if (isset($mkd_burst_options['lightbox_video_single_project'])) {
    $lightbox_video_single_project = $mkd_burst_options['lightbox_video_single_project'];
}

//set style for title
if ((isset($mkd_burst_options['portfolio_title_margin_bottom']) && $mkd_burst_options['portfolio_title_margin_bottom'] != '')
    || (isset($mkd_burst_options['portfolio_title_color']) && !empty($mkd_burst_options['portfolio_title_color']))){

    if (isset($mkd_burst_options['portfolio_title_margin_bottom']) && $mkd_burst_options['portfolio_title_margin_bottom'] != '') {
        $portfolio_title_style .= 'margin-bottom:'.esc_attr($mkd_burst_options['portfolio_title_margin_bottom']).'px;';
    }

    if (isset($mkd_burst_options['portfolio_title_color']) && !empty($mkd_burst_options['portfolio_title_color'])) {
        $portfolio_title_style .= 'color:'.esc_attr($mkd_burst_options['portfolio_title_color']).';';
    }

}

//set info tag
if (isset($mkd_burst_options['portfolio_info_tag'])) {
    $portfolio_info_tag = $mkd_burst_options['portfolio_info_tag'];
}

//sort portfolio images by user defined input
if (is_array($portfolio_images)){
	usort($portfolio_images, "mkd_burst_ComparePortfolioImages");
}

if(get_post_meta(get_the_ID(), "mkd_choose-number-of-portfolio-columns", true) !== "") {
	$columns_number = 'v'.get_post_meta(get_the_ID(), "mkd_choose-number-of-portfolio-columns", true);
} elseif(isset($mkd_burst_options['portfolio_columns_number']) && $mkd_burst_options['portfolio_columns_number'] !== '') {
	$columns_number = 'v'.$mkd_burst_options['portfolio_columns_number'];
}

if (isset($mkd_burst_options['portfolio_hide_like']) && $mkd_burst_options['portfolio_hide_like'] == 'yes'){
	$show_like = false;
}
?>

<div class="portfolio_top_holder">
	<div class="column1">
		<<?php echo esc_attr($portfolio_title_tag); ?> class="portfolio_single_text_title" <?php mkd_burst_inline_style($portfolio_title_style); ?>>
			<?php the_title(); ?>
		</<?php echo esc_attr($portfolio_title_tag); ?>>
	</div>
	<div class="column2">
		<div class="portfolio_social_like_holder">
			<?php
			//get portfolio share section
			get_template_part('templates/portfolio/parts/portfolio-social'); ?>
			<?php if ($show_like){ ?>
			<div class="portfolio_single_like">
				<?php
				echo mkd_burst_like_portfolio_post(get_the_ID());
				?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="portfolio_gallery">
	<?php
    $portfolio_m_images = get_post_meta(get_the_ID(), "mkd_portfolio-image-gallery", true);
    if ($portfolio_m_images){
        $portfolio_image_gallery_array=explode(',',$portfolio_m_images);
        foreach($portfolio_image_gallery_array as $gimg_id){
            $title = get_the_title($gimg_id);
            $alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
            $portfolio_gallery_thumb_size = get_post_meta(get_the_ID(), 'mkd_choose-portfolio-image-size', true);
            $portfolio_gallery_thumb_size = (!empty($portfolio_gallery_thumb_size)) ? get_post_meta(get_the_ID(), 'mkd_choose-portfolio-image-size', true) : 'full';
            $image_src = wp_get_attachment_image_src( $gimg_id, $portfolio_gallery_thumb_size );
            if (is_array($image_src)) $image_src = $image_src[0];
            $image_light_src = wp_get_attachment_image_src( $gimg_id, 'full' );
            if (is_array($image_light_src)) $image_light_src = $image_light_src[0];
            ?>
            <?php if($lightbox_single_project == "yes"){ ?>
                                <a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($image_light_src); ?>" data-rel="prettyPhoto[single_pretty_photo]">
                   <?php if($portfolio_gallery_hover_type !== "disable"){ ?>
                       <span class="gallery_text_holder"><span class="gallery_text_outer"><span class="gallery_text_inner">
                            <?php
                            if($portfolio_gallery_hover_type == "icon"){ ?>
                                <i class="fa fa-plus"></i>
                            <?php }
                            elseif($portfolio_gallery_hover_type == "text"){ ?>
                                <h4><?php echo esc_html($title); ?></h4>
                                <?php if($portfolio_gallery_image_hover_separator == "yes"){ ?>
                                    <span class="separator animate"></span>
                                <?php } ?>
                            <?php }
                            else{ ?>
                                <i class="fa fa-2x fa-search"></i>
                            <?php  } ?>

                        </span></span></span>
                     <?php  }?>
                    <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo esc_attr($alt); ?>" />
                </a>
            <?php } else { ?>
                <a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" href="#">
                    <span class="gallery_text_holder"><span class="gallery_text_outer"><span class="gallery_text_inner"><h4><?php echo esc_html($title); ?></h4></span></span></span>
                    <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo esc_attr($alt); ?>" />
                </a>
            <?php }
        }
    }

    if (is_array($portfolio_images) && count($portfolio_images)){
		foreach($portfolio_images as $portfolio_image){
			?>

			<?php if($portfolio_image['portfolioimg'] != ""){ ?>
				<?php

				list($id, $title, $alt) = mkd_burst_get_portfolio_image_meta($portfolio_image['portfolioimg']);

                $single_image_id = mkd_burst_get_attachment_id_from_url($portfolio_image['portfolioimg']);
                if(!empty($single_image_id)){
                    $single_image_gallery_thumb_size = get_post_meta(get_the_ID(), 'mkd_choose-portfolio-image-size', true);
                    $single_image_size = (!empty($single_image_gallery_thumb_size)) ? get_post_meta(get_the_ID(), 'mkd_choose-portfolio-image-size', true) : 'full';
                    $single_image_src = wp_get_attachment_image_src( $single_image_id, $single_image_size );
                    if (is_array($single_image_src)) $single_image_src = $single_image_src[0];
                } else {
                    $single_image_src = esc_url($portfolio_image['portfolioimg']);
                }

				?>
				<?php if($lightbox_single_project == "yes"){ ?>
					<a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" title="<?php echo esc_attr($portfolio_image['portfoliotitle']); ?>" href="<?php echo esc_url($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
                        <?php if($portfolio_gallery_hover_type !== "disable"){ ?>
                            <span class="gallery_text_holder"><span class="gallery_text_outer"><span class="gallery_text_inner">
                            <?php
                            if($portfolio_gallery_hover_type == "icon"){ ?>
                                <i class="fa fa-plus"></i>
                            <?php }
                            elseif($portfolio_gallery_hover_type == "text"){ ?>
                                <h4><?php echo esc_html($title); ?></h4>
                                <?php if($portfolio_gallery_image_hover_separator == "yes"){ ?>
                                    <span class="separator animate"></span>
                                <?php } ?>
                            <?php }
                            else{ ?>
                                <i class="fa fa-2x fa-search"></i>
                            <?php  } ?>

                        </span></span></span>
                        <?php  }?>
                        <img src="<?php echo esc_url($single_image_src); ?>" alt="<?php echo esc_attr($alt); ?>" />
					</a>
				<?php } else { ?>
					<a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" href="#">
                        <?php if($portfolio_gallery_hover_type !== "disable"){ ?>
                            <span class="gallery_text_holder"><span class="gallery_text_outer"><span class="gallery_text_inner">
                            <?php
                            if($portfolio_gallery_hover_type == "icon"){ ?>
                                <i class="fa fa-plus"></i>
                            <?php }
                            elseif($portfolio_gallery_hover_type == "text"){ ?>
                                <h4><?php echo esc_html($title); ?></h4>
                                <?php if($portfolio_gallery_image_hover_separator == "yes"){ ?>
                                    <span class="separator animate"></span>
                                <?php } ?>
                            <?php }
                            else{ ?>
                                <i class="fa fa-2x fa-search"></i>
                            <?php  } ?>

                        </span></span></span>
                        <?php  }?>
                    <img src="<?php echo esc_url($single_image_src); ?>" alt="<?php echo esc_attr($alt); ?>" />
					</a>
				<?php } ?>

			<?php }else{ ?>

				<?php
				$portfolio_video_type = "";
				if (isset($portfolio_image['portfoliovideotype'])) $portfolio_video_type = $portfolio_image['portfoliovideotype'];
				switch ($portfolio_video_type){
					case "youtube": ?>
                        <?php if($lightbox_video_single_project == "yes"){ ?>
                            <?php
                            $vidID = esc_attr($portfolio_image['portfoliovideoid']);
                            $thumbnail = "//img.youtube.com/vi/".$vidID."/maxresdefault.jpg";
                            ?>
                            <a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" title="<?php echo esc_attr($portfolio_image['portfoliotitle']); ?>" href="//www.youtube.com/watch?feature=player_embedded&v=<?php echo esc_attr($vidID); ?>" data-rel="prettyPhoto[single_pretty_photo]">
                                <i class="fa fa-play"></i>
                                <img width="100%" src="<?php echo esc_url($thumbnail); ?>"/>
							</a>
						<?php } else { ?>
							<a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" href="#">
								<iframe width="100%" src="//www.youtube.com/embed/<?php echo esc_attr($portfolio_image['portfoliovideoid']);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
							</a>
						<?php } ?>
						<?php	break;
					case "vimeo": ?>
                        <?php if($lightbox_video_single_project == "yes"){ ?>
                            <?php
							WP_Filesystem();
                            $vidID = esc_attr($portfolio_image['portfoliovideoid']);
                            $xml = unserialize($wp_filesystem->get_contents("http://vimeo.com/api/v2/video/$vidID.php"));
                            $thumbnail = $xml[0]['thumbnail_large'];
                            $video_title = $xml[0]['title'];
                            ?>
							<a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" title="<?php echo esc_attr($portfolio_image['portfoliotitle']); ?>" href="//vimeo.com/<?php echo esc_attr($portfolio_image['portfoliovideoid']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
                                <i class="fa fa-play"></i>
                                <img width="100%" src="<?php echo esc_url($thumbnail); ?>"/>
							</a>
						<?php } else { ?>
							<a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" href="">
                                <iframe src="//player.vimeo.com/video/<?php echo esc_attr($portfolio_image['portfoliovideoid']); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</a>
						<?php } ?>

						<?php break;
					case "self": ?>

						<a class="lightbox_single_portfolio <?php echo esc_attr($columns_number); ?>" onclick='return false;' href="#">
							<div class="video">
								<div class="mobile-video-image" style="background-image: url(<?php echo esc_url($portfolio_image['portfoliovideoimage']); ?>);"></div>
								<div class="video-wrap"  >
									<video class="video" poster="<?php echo esc_url($portfolio_image['portfoliovideoimage']); ?>" preload="auto">
										<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo esc_url($portfolio_image['portfoliovideowebm']); ?>"> <?php } ?>
										<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo esc_url($portfolio_image['portfoliovideomp4']); ?>"> <?php } ?>
										<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo esc_url($portfolio_image['portfoliovideoogv']); ?>"> <?php } ?>
										<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>">
											<param name="movie" value="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>" />
											<param name="flashvars" value="controls=true&file=<?php echo esc_url($portfolio_image['portfoliovideomp4']); ?>" />
											<img src="<?php echo esc_url($portfolio_image['portfoliovideoimage']); ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
										</object>
									</video>
								</div>
							</div>
						</a>
					<?php break;
				}
			}
		}
	}
	?>
</div>
<div class="two_columns_75_25 clearfix portfolio_container">
	<div class="column1">
		<div class="column_inner">
			<div class="portfolio_single_text_holder">
				<<?php echo esc_attr($portfolio_info_tag); ?> class="portfolio_content_title"><?php esc_html_e('Description','burst'); ?></<?php echo esc_attr($portfolio_info_tag); ?>>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<div class="column2">
		<div class="column_inner">
			<div class="portfolio_detail">
				<?php
					//get portfolio custom fields section
					get_template_part('templates/portfolio/parts/portfolio-custom-fields');

					//get portfolio date section
					get_template_part('templates/portfolio/parts/portfolio-date');

					//get portfolio categories section
					get_template_part('templates/portfolio/parts/portfolio-categories');

					//get portfolio tags section
					get_template_part('templates/portfolio/parts/portfolio-tags');
				?>
			</div>
		</div>
	</div>
</div>