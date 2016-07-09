<?php

// add custom menu fields to menu
add_filter( 'wp_setup_nav_menu_item', 'mkd_burst_add_custom_nav_fields' );

// save menu custom fields
add_action( 'wp_update_nav_menu_item', 'mkd_burst_update_custom_nav_fields', 10, 3 );

// edit menu walker
add_filter( 'wp_edit_nav_menu_walker', 'mkd_burst_edit_walker', 10, 2 );


function mkd_burst_add_custom_nav_fields( $menu_item ) {
	$menu_item->anchor = get_post_meta( $menu_item->ID, '_menu_item_anchor', true );
	$menu_item->nolink = get_post_meta( $menu_item->ID, '_menu_item_nolink', true );
	$menu_item->hide = get_post_meta( $menu_item->ID, '_menu_item_hide', true );
	$menu_item->type_menu = get_post_meta( $menu_item->ID, '_menu_item_type_menu', true );
	$menu_item->background_image = get_post_meta( $menu_item->ID, '_menu_item_background_image', true );
	$menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
	$menu_item->icon_pack = get_post_meta( $menu_item->ID, '_menu_item_icon_pack', true );
	$menu_item->sidebar = get_post_meta( $menu_item->ID, '_menu_item_sidebar', true );
	$menu_item->wide_position = get_post_meta( $menu_item->ID, '_menu_item_wide_position', true );
    $menu_item->featured_icon = get_post_meta( $menu_item->ID, '_menu_item_featured_icon', true );
	return $menu_item;
   
}

/**
 * Save menu custom fields
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function mkd_burst_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
		
	$check = array('anchor', 'nolink', 'hide', 'type_menu', 'icon', 'icon_pack', 'sidebar', 'wide_position', 'background_image', 'featured_icon');

	if(isset($_POST['mkd_menu_options'])) {
		parse_str(urldecode($_POST['mkd_menu_options']), $parse_array);

		foreach ( $check as $key ){
			if(!isset($parse_array['menu_item_'.$key.'_'.$menu_item_db_id])) {
				$parse_array['menu_item_'.$key.'_'.$menu_item_db_id] = "";
			}

			$value = $parse_array['menu_item_'.$key.'_'.$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_'.$key, $value );
		}
	}

}

/**
 * Define new Walker edit
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function mkd_burst_edit_walker($walker,$menu_id) {

	return 'Mikado_Burst_Walker_Nav_Menu_Edit_Custom';
		
}

include_once get_template_directory().'/mkdinc/nav_menu/edit_custom_walker.php';


/* Custom WP_NAV_MENU function for top navigation */

if (!class_exists('mkd_burst_type1_walker_nav_menu')) {
	class mkd_burst_type1_walker_nav_menu extends Walker_Nav_Menu {
		protected $background_image;

		// add classes to ul sub-menus
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
			{
					$id_field = $this->db_fields['id'];
					if ( is_object( $args[0] ) ) {
							$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
					}
                    if($element->type_menu  == 'wide' || $element->type_menu  == 'wide_icons'){
                        // check how many columns does wide menu has
                        $element->numberOfChildren = count($children_elements[$element->$id_field]);
                    }

					return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			global $mkd_burst_options;
			
			$menu_image_background = '';
			$background_image_class = '';
			if($this->background_image !== '') {
				$menu_image_background = "background-image:url(" . $this->background_image . "); background-size: cover; background-repeat: no-repeat; background-position: center;";
				$background_image_class .= ' background_image';
			}

			$wide_menu_background = isset($mkd_burst_options['enable_wide_manu_background']) && $mkd_burst_options['enable_wide_manu_background'] == 'yes';
			
			$indent = str_repeat("\t", $depth);
			if($depth == 0){
				$out_div = '<div class="second'.$background_image_class.'" '.($wide_menu_background ? mkd_burst_get_inline_style($menu_image_background) : '').'><div class="inner">';
			}else{
				$out_div = '';
			}

			// build html
			$output .= "\n" . $indent . $out_div  .'<ul '.(!$wide_menu_background ? mkd_burst_get_inline_style($menu_image_background) : '').'>' . "\n";


		}
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			
			if($depth == 0){
				$out_div_close = '</div></div>';
			}else{
				$out_div_close = '';
			}
			$output .= "$indent</ul>". $out_div_close ."\n";

		}


		// add main/sub classes to li's and links
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;
			global $mkd_burst_options;
			$sub = "";
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			if($depth==0 && $args->has_children) : 
				$sub = ' has_sub';
			endif;
			if($depth==1 && $args->has_children) : 
				$sub = 'sub';
			endif;
		
			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$this->background_image = !empty($item->background_image) ? $item->background_image : '';

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			
			$wide_background = '';
			if(isset($mkd_burst_options['enable_wide_manu_background']) && $mkd_burst_options['enable_wide_manu_background'] == "yes" ){
				$wide_background = 'true';
			}
			
			//menu type class
			$menu_type = "";
			if($depth==0){
				if($item->type_menu == "wide"){
					$menu_type = " wide";
					if($wide_background == 'true'){
						$menu_type = " wide wide_background";
					}
                    if(isset($item->numberOfChildren) && $item->numberOfChildren !== 0){
                        $menu_type .= " wide_columns_".$item->numberOfChildren;
                    }
				}elseif($item->type_menu == "wide_icons"){
					$menu_type = " wide icons";
					if($wide_background == 'true'){
						$menu_type = " wide icons wide_background";
					}
                    if(isset($item->numberOfChildren) && $item->numberOfChildren !== 0){
                        $menu_type .= " wide_columns_".$item->numberOfChildren;
                    }
				}else{
					$menu_type = " narrow";
				}
			}
			
			//wide menu position class
			$wide_menu_position = "";
			if($depth==0){
				if($item->wide_position == "right"){
					$wide_menu_position = " right_position";
				}elseif($item->wide_position == "left"){
					$wide_menu_position = " left_position";
				}else{
					$wide_menu_position = "";
				}
			}

			$anchor = '';
			if($item->anchor != ""){
				$anchor = '#'.esc_attr($item->anchor);
                $class_names .= ' anchor-item';
			}

            $active = "";
            // depth dependent classes
            if ($item->anchor == "" && (($item->current && $depth == 0) || ($item->current_item_ancestor && $depth == 0))):
                $active = 'active';
            endif;
			

			// build html
			$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $class_names . ' '. $active . $sub . $menu_type . $wide_menu_position .'">';
	

			$current_a = "";
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ' href="'   . esc_attr( $item->url        ) .$anchor.'"';
			if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
			$current_a .= ' current ';
			endif;

			$no_link_class = '';
			if($item->nolink != '') {
				$no_link_class = ' no_link';
			}
			
			$attributes .= ' class="'.$current_a.$no_link_class.'"';
			$item_output = $args->before;
			if($item->hide == ""){
				if($item->nolink == ""){
					$item_output .= '<a'. $attributes .'>';
				} else{
					$item_output .= '<a'. $attributes .' style="cursor: default;" onclick="JavaScript: return false;">';
				}
				if($item->icon != ""){$icon = $item->icon; } else{ $icon = "blank"; }

                $angle_icon   = '';
                if($depth == 1) {
                    $angle_icon = 'fa-angle-right';
                }

				$angle_icon_first_level   = '';
                if($depth == 0 && isset($mkd_burst_options['enable_dropdown_menu_item_icon']) && $mkd_burst_options['enable_dropdown_menu_item_icon'] == "yes" ){
                    $angle_icon_first_level = 'fa-angle-down';
                }
				
				$item_output .= '<span class="item_inner">';

				$icon_pack = 'font_awesome';

				if(empty($this->icon_pack)) {
					$item->icon_pack = $icon_pack;
				}

				if($item->icon_pack == 'font_awesome') {
					$icon .= ' fa';
				}

				$item_output .= '<span class="menu_icon_wrapper"><i class="menu_icon '.$icon.'"></i></span>';
				
				
				if(isset($mkd_burst_options['menu_item_hover_animation']) && $mkd_burst_options['menu_item_hover_animation'] == "roll" && $depth == 0){
				
				$item_output .= '<span class="item_text">';
				$item_output .= '<span class="item_text_wrapp">';
				$item_output .= apply_filters('the_title', $item->title, $item->ID);
				$item_output .= '<span class="item_text_hidden">';
				$item_output .= apply_filters('the_title', $item->title, $item->ID);
				$item_output .= '</span>'; //close span.item_text_hidden
				$item_output .= '</span>'; //close span.item_text_wrapp
				$item_output .= '</span>'; //close span.item_text
				
				} else {
				
				$item_output .= '<span class="item_text">';
				$item_output .= apply_filters('the_title', $item->title, $item->ID);
				$item_output .= '</span>'; //close span.item_text
				
				}
				
				
				if($args->has_children && $angle_icon_first_level != "") {
                    $item_output .= '<i class="mkd_menu_arrow fa '.$angle_icon_first_level.'"></i>';
                }
				$item_output .= '</span>'; //close span.item_inner
				$item_output .= '<span class="plus"></span>';

                //append arrow for dropdown				
				
                if($args->has_children && $angle_icon != "") {
                    $item_output .= '<i class="mkd_menu_arrow fa '.$angle_icon.'"></i>';
                }

                if($item->featured_icon !== ""){
                    $item_output .= '<span class=" featured_icon '. $item->featured_icon .'" aria-hidden="true"></span>';
                }

				$item_output .= '</a>';
			}
			
			if($item->sidebar != "" && $depth > 0){
				ob_start();
				dynamic_sidebar($item->sidebar);
				$sidebar_content = ob_get_contents();
				ob_end_clean();
				$item_output .= $sidebar_content;
			}
			
			$item_output .= $args->after;
			
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			
		}
	}
}

/* Custom WP_NAV_MENU function for mobile navigation */

if (!class_exists('mkd_burst_type2_walker_nav_menu')) {
	class mkd_burst_type2_walker_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
			{
					$id_field = $this->db_fields['id'];
					if ( is_object( $args[0] ) ) {
							$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
					}
					return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			}

		function start_lvl( &$output, $depth = 0, $args = array() ) {

			$indent = str_repeat("\t", $depth);

			// build html
			$output .= "\n" . $indent  .'<ul class="sub_menu">' . "\n";
		}
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);

			$output .= "$indent</ul>" ."\n";
		}

		// add main/sub classes to li's and links
		 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;
			global $mkd_burst_options;
			$sub = "";
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			if($depth >=0 && $args->has_children) :
				$sub = ' has_sub';
			endif;

			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			$anchor = '';
			if($item->anchor != ""){
				$anchor = '#'.esc_attr($item->anchor);
			}

            $active = "";
            // depth dependent classes
            if ($item->anchor == "" && ($item->current ||  $item->current_item_ancestor)):
                $active = 'active';
            endif;

			// build html
            $output .= $indent . '<li id="mobile-menu-item-'. $item->ID . '" class="' . $class_names . ' ' . $active . $sub.' level'.$depth.'">';

			$current_a = "";
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ' href="'   . esc_attr( $item->url        ) .$anchor.'"';
			if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
			$current_a .= ' current ';
			endif;

			$attributes .= ' class="'. $current_a . '"';
			$item_output = $args->before;

			if($item->nolink == ""){
				$item_output .= '<a'. $attributes .'>';
			}else{
				$item_output .= '<h4>';
			}
            $featured_icon = ''; // need to be in description or in title (if description is disabled) because both are in one row (only for mobile)

            // if it is included in title, icon need to be present in this string for cancat with title
            if($item->featured_icon !== "" && $item->description == ""){
                $featured_icon .= '<span class=" featured_icon '. $item->featured_icon .'" aria-hidden="true"></span>';
            }

            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title . $featured_icon , $item->ID );

            $item_output .= $args->link_after;

			if($item->nolink == ""){
				$item_output .= '</a><span class="mobile_arrow"><i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span>';
			}else{
				$item_output .= '</h4><span class="mobile_arrow"><i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span>';
			}

			$item_output .= $args->after;

			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

	}
}

/* Custom WP_NAV_MENU function for popup navigation */

if (!class_exists('mkd_burst_type3_walker_nav_menu')) {
    class mkd_burst_type3_walker_nav_menu extends Walker_Nav_Menu {

        // add classes to ul sub-menus
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
            $id_field = $this->db_fields['id'];
            if ( is_object( $args[0] ) ) {
                $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
            }
            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }

        function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);

            // build html
            $output .= "\n" . $indent  .'<ul class="sub_menu">' . "\n";
        }

        function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);

            $output .= "$indent</ul>" ."\n";
        }

        // add main/sub classes to li's and links
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $wp_query;
            global $mkd_burst_options;
            $sub = "";
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
            if($depth >=0 && $args->has_children) :
                $sub = ' has_sub';
            endif;

            // passed classes
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;

            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

            $anchor = '';
            if($item->anchor != ""){
                $anchor = '#'.esc_attr($item->anchor);
            }

            $active = "";
            // depth dependent classes
            if ($item->anchor == "" && (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0))):
                $active = 'active';
            endif;

            // build html
            $output .= $indent . '<li id="popup-menu-item-'. $item->ID . '" class="' . $class_names . ' ' . $active . $sub .'">';

            $current_a = "";
            // link attributes
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ' href="'   . esc_attr( $item->url        ) .$anchor.'"';
            if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
                $current_a .= ' current ';
            endif;

            $attributes .= ' class="'. $current_a . '"';
            $item_output = $args->before;
            if($item->hide == ""){
                if($item->nolink == ""){
                    $item_output .= '<a'. $attributes .'>';
                }else{
                    $item_output .= '<h4>';
                }
                $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
                $item_output .= $args->link_after;
                if($item->nolink == ""){
                    $item_output .= '</a>';
                }else{
                    $item_output .= '</h4>';
                }
            }
            $item_output .= $args->after;

            // build html
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

    }
}

/* Custom WP_NAV_MENU function for left and right navigation */

if (!class_exists('mkd_burst_type4_walker_nav_menu')) {
    class mkd_burst_type4_walker_nav_menu extends Walker_Nav_Menu {

        // add classes to ul sub-menus
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
        {
            $id_field = $this->db_fields['id'];
            if ( is_object( $args[0] ) ) {
                $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
            }
            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }

        function start_lvl( &$output, $depth = 0, $args = array() ) {

            $indent = str_repeat("\t", $depth);

            // build html
            $output .= "\n" . $indent  .'<ul class="sub_menu">' . "\n";
        }
        function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);

            $output .= "$indent</ul>" ."\n";
        }

        // add main/sub classes to li's and links
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $wp_query;
            global $mkd_burst_options;
            $sub = "";
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
            if($depth >=0 && $args->has_children) :
                $sub = ' has_sub';
            endif;

            // passed classes
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;

            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

            $anchor = '';
            if($item->anchor != ""){
                $anchor = '#'.esc_attr($item->anchor);
            }

            $active = "";
            // depth dependent classes
            if ($item->anchor == "" && (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0))):
                $active = 'active';
            endif;

            // build html
            $output .= $indent . '<li id="mobile-menu-item-'. $item->ID . '" class="' . $class_names . ' ' . $active . $sub .'">';

            $current_a = "";
            // link attributes
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ' href="'   . esc_attr( $item->url        ) .$anchor.'"';
            if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
                $current_a .= ' current ';
            endif;

            $attributes .= ' class="'. $current_a . '"';
            $item_output = $args->before;
            if($item->hide == ""){
                if($item->nolink == ""){
                    $item_output .= '<a'. $attributes .'>';
                }else{
                    $item_output .= '<h4>';
                }
                $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
                $item_output .= $args->link_after;
                if($item->nolink == ""){
                    $item_output .= '</a><span class="mobile_arrow"><i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span>';
                }else{
                    $item_output .= '</h4><span class="mobile_arrow"><i class="fa fa-angle-right"></i><i class="fa fa-angle-down"></i></span>';
                }
            }
            $item_output .= $args->after;

            // build html
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

    }
}