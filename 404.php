<?php 
	global $mkd_burst_options;
?>

<?php get_header(); ?>

	<?php get_template_part( 'title' ); ?>

	<div class="container">
	<?php if($mkd_burst_options['overlapping_content'] == 'yes') {?>
		<div class="overlapping_content"><div class="overlapping_content_inner">
	<?php } ?>
		<div class="container_inner mkd_404_page default_template_holder">
			<div class="page_not_found">
				<h2><?php if($mkd_burst_options['404_title'] != ""): echo esc_html($mkd_burst_options['404_title']); else: ?> <?php esc_html_e('Page you are looking is Not Found', 'burst'); ?> <?php endif;?></h2>

                <h4><?php if($mkd_burst_options['404_text'] != ""): echo esc_html($mkd_burst_options['404_text']); else: ?> <?php esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'burst'); ?> <?php endif;?></h4>
				<a class="qbutton with-shadow" href="<?php echo esc_url(home_url()); ?>/"><?php if($mkd_burst_options['404_backlabel'] != ""): echo esc_html($mkd_burst_options['404_backlabel']); else: ?> <?php esc_html_e('Back to homepage', 'burst'); ?> <?php endif;?></a>
			</div>
		</div>
		<?php if($mkd_burst_options['overlapping_content'] == 'yes') {?>
				</div></div>
		<?php } ?>
	</div>
<?php get_footer(); ?>