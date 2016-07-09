<div class="masonry_gallery">
	<div class="gallery_post_grid_sizer"></div>
	<?php
	$array_id = mkd_burst_gallery_post_format_ids_images(get_the_content());
	if($array_id !==false){
		foreach($array_id as $img_id){ ?>
			<a class="masonry_gallery_image" href="<?php the_permalink(); ?>">
				<?php echo wp_get_attachment_image( $img_id, 'full' ); ?>
			</a>
		<?php }
	}
	
	$image_gallery_val = get_post_meta( $post->ID, 'mkd_post-image-gallery' , true );
		if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);
		
		if(isset($image_gallery_array) && count($image_gallery_array)!=0):

			foreach($image_gallery_array as $gimg_id): ?>
			<a class="masonry_gallery_image" href="<?php the_permalink(); ?>">	
				<?php
					echo wp_get_attachment_image( $gimg_id, 'full' )
				?>
			</a>
			<?php endforeach;

		endif;
	?>
</div>