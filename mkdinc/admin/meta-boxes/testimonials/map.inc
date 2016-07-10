<?php

//Testimonials

$mkdTestimonials = new MikadoBurstMetaBox("testimonials", "Testimonials");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("testimonials",$mkdTestimonials);

	$mkd_show_testimonial_title_text = new MikadoBurstMetaField("yesno","mkd_show_testimonial_title_text","no","Hide Testimonial Title Text","Enable this option to hide the title text", array(), array("dependence" => true, "dependence_hide_on_yes" => "#mkdf_mkd_testimonial_title_container", "dependence_show_on_yes" => ""));
	$mkdTestimonials->addChild("mkd_show_testimonial_title_text",$mkd_show_testimonial_title_text);

		$mkd_testimonial_title_container = new MikadoBurstContainer("mkd_testimonial_title_container","mkd_show_testimonial_title_text","yes");
		$mkdTestimonials->addChild("mkd_testimonial_title_container",$mkd_testimonial_title_container);
	
			$mkd_testimonial_title= new MikadoBurstMetaField("text","mkd_testimonial_title","","Title","Enter testimonial title");
			$mkd_testimonial_title_container->addChild("mkd_testimonial_title",$mkd_testimonial_title);
	
	$mkd_testimonial_author = new MikadoBurstMetaField("text","mkd_testimonial-author","","Author","Enter author name");
	$mkdTestimonials->addChild("mkd_testimonial-author",$mkd_testimonial_author);

	$mkd_testimonial_author_position = new MikadoBurstMetaField("text","mkd_testimonial_author_position","","Job Position","Enter job position name");
	$mkdTestimonials->addChild("mkd_testimonial_author_position",$mkd_testimonial_author_position);

	$mkd_testimonial_text = new MikadoBurstMetaField("textarea","mkd_testimonial-text","","Text","Enter testimonial text");
	$mkdTestimonials->addChild("mkd_testimonial-text",$mkd_testimonial_text);