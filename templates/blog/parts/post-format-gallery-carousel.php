<div class="carousel" id="carousel">
	<ul class="slides">
		<?php
		
		$image_gallery_val = get_post_meta( $post->ID, 'mkd_post-image-gallery' , true );
		if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);	
			if(isset($image_gallery_array) && count($image_gallery_array)!=0):

			foreach($image_gallery_array as $gimg_id):

				$gimage_wp = wp_get_attachment_image_src($gimg_id,'full', true);
				echo '<li><img src="'.esc_url($gimage_wp[0]).'"/></li>';

			endforeach;

		endif;	
			
		?>
	</ul>
</div>