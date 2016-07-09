<?php
global $mkd_burst_options;
global $mkd_burst_template_name;
?>


<div class="flexslider">
	<ul class="slides">
		<?php
		
		$image_gallery_val = get_post_meta( $post->ID, 'mkd_post-image-gallery' , true );
		if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);

        $blog_image_size = 'full';
        $blog_type = '';
        $image_height = '';
        $image_width = '';

        if(is_single()) {
            $blog_type = 'blog_single';
        }
        elseif($mkd_burst_template_name == "blog-standard.php" || $mkd_burst_template_name == "blog-standard-whole-post.php") {
            $blog_type = 'blog_standard_type';
        }

        if($blog_type !== ''){
            if( isset($mkd_burst_options[$blog_type.'_image_size']) && $mkd_burst_options[$blog_type.'_image_size'] !== '') {
                $blog_image_size = $mkd_burst_options[$blog_type.'_image_size'];

            }

            if( $blog_image_size == 'custom'
                && isset($mkd_burst_options[$blog_type.'_image_size_height']) && $mkd_burst_options[$blog_type.'_image_size_height'] !== ''
                && isset($mkd_burst_options[$blog_type.'_image_size_width']) && $mkd_burst_options[$blog_type.'_image_size_width'] !== '') {

                $image_height = $mkd_burst_options[$blog_type.'_image_size_height'];
                $image_width = $mkd_burst_options[$blog_type.'_image_size_width'];
            }

        }


        if(isset($image_gallery_array) && count($image_gallery_array)!=0):

			foreach($image_gallery_array as $gimg_id): ?>
		
				<li><a href="<?php the_permalink(); ?>">
                        <?php if( $blog_image_size == 'custom' && $image_height !== '' && $image_height !== ''){
                            echo mkd_burst_generate_thumbnail($gimg_id,null,$image_width,$image_height);
                        }
                        else{
                            echo wp_get_attachment_image($gimg_id, $blog_image_size);
                        }
                        ?>
                    </a>
                </li>

			<?php endforeach;

		endif;
		?>
	</ul>
</div>
