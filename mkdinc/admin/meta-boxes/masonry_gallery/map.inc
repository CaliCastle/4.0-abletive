<?php

global $mkd_burst_IconCollections;
//Masonry Gallery Metaboxes

//General settings for text, buttons, links
$mkdMasonryGalleryItemGeneral = new MikadoBurstMetaBox("masonry_gallery", "Masonry Gallery General");
$mkd_burst_Framework->mkdMetaBoxes->addMetaBox("masonry_gallery_item_general",$mkdMasonryGalleryItemGeneral);

	$mkd_masonry_gallery_item_text = new MikadoBurstMetaField('text', 'mkd_masonry_gallery_item_text', '', 'Text', '');
	$mkdMasonryGalleryItemGeneral->addChild('mkd_masonry_gallery_item_text', $mkd_masonry_gallery_item_text);

	$mkd_masonry_gallery_item_link = new MikadoBurstMetaField('text', 'mkd_masonry_gallery_item_link', '', 'Link', '');
	$mkdMasonryGalleryItemGeneral->addChild('mkd_masonry_gallery_item_link', $mkd_masonry_gallery_item_link);

	$mkd_masonry_gallery_item_link_target = new MikadoBurstMetaField('select', 'mkd_masonry_gallery_item_link_target', '_self', 'Link target', '', array(
		'_self' => 'Self',
		'_blank' => 'Blank'
	));
	$mkdMasonryGalleryItemGeneral->addChild('mkd_masonry_gallery_item_link_target', $mkd_masonry_gallery_item_link_target);
	
	$mkd_masonry_item_parallax = new MikadoBurstMetaField("select","mkd_masonry_item_parallax","no","Set Item in Parallax","", array(
		"no" => "No",
		"yes" => "Yes"
	));
	$mkdMasonryGalleryItemGeneral->addChild("mkd_masonry_item_parallax",$mkd_masonry_item_parallax);
	
	//Masonry Gallery Style - Size, Type
	$section_style_title = new MikadoBurstTitle('section_style_title', 'Masonry Gallery Item Style');
	$mkdMasonryGalleryItemGeneral->addChild('section_style_title', $section_style_title);

	$mkd_masonry_gallery_item_size = new MikadoBurstMetaField('select', 'mkd_masonry_gallery_item_size', 'square_small', 'Size', 'size', array(
		'square_small' => 'Square Small',
		'square_big' => 'Square Big',		
		'rectangle_portrait' => 'Rectangle Portrait',
		'rectangle_landscape' => 'Rectangle Landscape'
	));
	$mkdMasonryGalleryItemGeneral->addChild('mkd_masonry_gallery_item_size', $mkd_masonry_gallery_item_size);

	$mkd_masonry_gallery_item_type = new MikadoBurstMetaField('select', 'mkd_masonry_gallery_item_type', 'with_button', 'Type', 'type', array(
		'with_button' => 'With Button',
		'with_icon' => 'With Icon',
		'standard' => 'Standard'
	),
	array(
		'dependence' => true,
		'hide' => array(
			'with_button' => '#mkdf_mkd_masonry_gallery_item_icon_type_container',
			'with_icon' => '#mkdf_mkd_masonry_gallery_item_button_type_container',
			'standard' => '#mkdf_mkd_masonry_gallery_item_button_type_container, #mkdf_mkd_masonry_gallery_item_icon_type_container'
		),
		'show' => array(
			'with_button' => '#mkdf_mkd_masonry_gallery_item_button_type_container',
			'with_icon' => '#mkdf_mkd_masonry_gallery_item_icon_type_container',
			'standard' => ''
		)
	));
	$mkdMasonryGalleryItemGeneral->addChild('mkd_masonry_gallery_item_type', $mkd_masonry_gallery_item_type);

	$mkd_masonry_gallery_item_button_type_container = new MikadoBurstContainer('mkd_masonry_gallery_item_button_type_container', 'mkd_masonry_gallery_item_type', '', array('standard', 'with_icon'));
	$mkdMasonryGalleryItemGeneral->addChild('mkd_masonry_gallery_item_button_type_container', $mkd_masonry_gallery_item_button_type_container);

		$mkd_masonry_gallery_button_label = new MikadoBurstMetaField('text', 'mkd_masonry_gallery_button_label', '', 'Button Label', '');
		$mkd_masonry_gallery_item_button_type_container->addChild('mkd_masonry_gallery_button_label', $mkd_masonry_gallery_button_label);

	$mkd_masonry_gallery_item_icon_type_container = new MikadoBurstContainer('mkd_masonry_gallery_item_icon_type_container', 'mkd_masonry_gallery_item_type', '', array('standard', 'with_button'));
	$mkdMasonryGalleryItemGeneral->addChild('mkd_masonry_gallery_item_icon_type_container', $mkd_masonry_gallery_item_icon_type_container);
	//Icon Packages
	$mkd_masonry_gallery_item_icon_hide_array = array();
	$mkd_masonry_gallery_item_icon_show_array = array();

	if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {

		$mkd_masonry_gallery_item_icon_collection_params = $mkd_burst_IconCollections->getIconCollectionsParams();

		foreach ($mkd_burst_IconCollections->iconCollections as $dep_collection_key => $dep_collection_object) {

			$mkd_masonry_gallery_item_icon_hide_array[$dep_collection_key] = '';

			$mkd_masonry_gallery_item_icon_show_array[$dep_collection_key] = '#mkdf_mkd_masonry_gallery_item_with_icon_'.$dep_collection_object->param.'_container';

			foreach ($mkd_masonry_gallery_item_icon_collection_params as $mkd_masonry_gallery_item_icon_collection_param) {

				if($mkd_masonry_gallery_item_icon_collection_param !== $dep_collection_object->param) {
					$mkd_masonry_gallery_item_icon_hide_array[$dep_collection_key].= '#mkdf_mkd_masonry_gallery_item_with_icon_'.$mkd_masonry_gallery_item_icon_collection_param.'_container,';
				}

			}

			$mkd_masonry_gallery_item_icon_hide_array[$dep_collection_key] = rtrim($mkd_masonry_gallery_item_icon_hide_array[$dep_collection_key], ',');
		}

	}

	$mkd_masonry_gallery_item_with_icon_icon_pack = new MikadoBurstMetaField(
		'select',
		'mkd_masonry_gallery_item_with_icon_icon_pack',
		'font_awesome',
		'Icon Package',
		'Choose Icon Package',
		$mkd_burst_IconCollections->getIconCollections(),
		array(
			'dependence' => true,
			'hide' => $mkd_masonry_gallery_item_icon_hide_array,
			'show' => $mkd_masonry_gallery_item_icon_show_array
		)
	);
	$mkd_masonry_gallery_item_icon_type_container->addChild('mkd_masonry_gallery_item_with_icon_icon_pack', $mkd_masonry_gallery_item_with_icon_icon_pack);

	if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {

		foreach ($mkd_burst_IconCollections->iconCollections as $collection_key => $collection_object) {
			$icons_array = $collection_object->getIconsArray();

			$icon_collections_keys = $mkd_burst_IconCollections->getIconCollectionsKeys();

			unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

			$mkd_masonry_gallery_item_icon_hide_values = $icon_collections_keys;

			$mkd_masonry_gallery_item_icon_pack_container = new MikadoBurstContainer('mkd_masonry_gallery_item_with_icon_'.$collection_object->param.'_container', 'mkd_masonry_gallery_item_with_icon_icon_pack', '', $mkd_masonry_gallery_item_icon_hide_values);
			$mkd_masonry_gallery_item_icon_type_container->addChild('mkd_masonry_gallery_item_with_icon_'.$collection_object->param.'_container', $mkd_masonry_gallery_item_icon_pack_container);

			$mkd_masonry_gallery_item_with_icon_icon_type = new MikadoBurstMetaField('select', 'mkd_masonry_gallery_item_with_icon_'.$collection_object->param, '', $collection_object->title, 'Icon Package', $icons_array);
			$mkd_masonry_gallery_item_icon_pack_container->addChild('mkd_masonry_gallery_item_with_icon_'.$collection_object->param, $mkd_masonry_gallery_item_with_icon_icon_type);

		}

	}