<?php
global $mkd_burst_options;
?>

<?php if(isset($mkd_burst_options['enable_social_share'])  && $mkd_burst_options['enable_social_share'] == "yes") { ?>
	<?php echo do_shortcode('[no_social_share]'); // XSS OK ?>
<?php } ?>