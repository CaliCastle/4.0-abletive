<div class="date">
	<?php if(!mkd_burst_post_has_title()) { ?>
		<a href="<?php the_permalink() ?>">
	<?php } ?>

		<span><?php the_time('d'); ?></span>
		<p><?php the_time('M'); ?></p>

	<?php if(!mkd_burst_post_has_title()) { ?>
		</a>
	<?php } ?>
</div>