<?php

if (!function_exists('mkd_burst_comment')) {
function mkd_burst_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; 

	global $mkd_burst_options, $post;
	$title_tag="h5";

	if(isset($mkd_burst_options['blog_single_title_tags'])){
		$title_tag = $mkd_burst_options['blog_single_title_tags'];
	}
	$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
	//get correct heading value
	$title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : 'h5';

	$is_pingback_comment = $comment->comment_type == 'pingback';
	$is_author_comment  = $post->post_author == $comment->user_id;

	$comment_class = 'comment clearfix';

	if($is_author_comment) {
		$comment_class .= ' post_author_comment';
	}

	if($is_pingback_comment) {
		$comment_class .= ' pingback-comment';
	}

	?>

	<li>
		<div class="<?php echo esc_attr($comment_class); ?>">
			<?php if(!$is_pingback_comment) { ?>
				<div class="image"> <?php echo mkd_burst_kses_img(get_avatar($comment, 102)); ?> </div>
			<?php } ?>
			<div class="text">
				<div class="comment_info">
					<<?php echo esc_attr($title_tag);?> class="name">
						<?php if($is_pingback_comment) { esc_html_e('Pingback:', 'burst'); } ?>
						<?php echo wp_kses_post(get_comment_author_link()); ?>
						<?php if($is_author_comment) { ?>
							<i class="fa fa-user post-author-comment-icon"></i>
						<?php } ?>
					</<?php echo esc_attr($title_tag); ?>>
				</div>
				<?php if(!$is_pingback_comment) { ?>
					<div class="text_holder" id="comment-<?php echo comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
					<div class="comment_date_reply_holder">
						<span class="comment_date">
							<span class="comment_icon icon-calendar"></span>
							<?php comment_time(get_option('date_format')); ?>
						</span>
						<span class="comment_reply">
							<span class="comment_icon icon-action-undo"></span>
							<?php
								comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) );
							?>
						</span>
						<?php
							edit_comment_link( esc_html__('Edit This','burst') ,'<span class="comment_edit"><span class="comment_icon icon-note"></span>','</span>');
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php //li tag will be closed by WordPress after looping through child elements ?>

	<?php
	}
}
?>