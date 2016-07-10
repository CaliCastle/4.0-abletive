<?php
class MikadoBurstLike {
	
	 function __construct(){	
		add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
		add_action('wp_ajax_mkd_like', array(&$this, 'ajax'));
		add_action('wp_ajax_nopriv_mkd_like', array(&$this, 'ajax'));
	}
	
	function enqueue_scripts(){
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'mkd-like', get_template_directory_uri() . '/js/mkd-like.js', 'jquery', '1.0', TRUE );
		
		wp_localize_script( 'mkd-like', 'mkdLike', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}
	
	function ajax($post_id){		
		//update
		if( isset($_POST['likes_id']) ) {
			$post_id = str_replace('mkd-like-', '', $_POST['likes_id']);
			$type    = isset($_POST['type']) ? $_POST['type'] : '';

			echo wp_kses($this->like_post($post_id, 'update', $type), array(
				'span' => array(
					'class' => true,
					'aria-hidden' => true,
					'style' => true,
					'id' => true
				),
				'i' => array(
					'class' => true,
					'style' => true,
					'id' => true
				)
			));
		} 
		
		//get
		else {
			$post_id = str_replace('mkd-like-', '', $_POST['likes_id']);
			echo wp_kses($this->like_post($post_id, 'get'), array(
				'span' => array(
					'class' => true,
					'aria-hidden' => true,
					'style' => true,
					'id' => true
				),
				'i' => array(
					'class' => true,
					'style' => true,
					'id' => true
				)
			));
		}
		exit;
	}
	
	function like_post($post_id, $action = 'get', $type = ''){
		if(!is_numeric($post_id)) return;
	
		switch($action) {
		
			case 'get':
				$like_count = get_post_meta($post_id, '_mkd-like', true);
				if(isset($_COOKIE['mkd-like_'. $post_id])){
					$icon = '<i class="icon-heart" aria-hidden="true"></i>';
				}else{
					$icon = '<i class="icon-heart" aria-hidden="true"></i>';
				}
				if( !$like_count ){
					$like_count = 0;
					add_post_meta($post_id, '_mkd-like', $like_count, true);
					$icon = '<i class="icon-heart" aria-hidden="true"></i>';
				}
				$return_value = $icon . "<span>" . $like_count . "</span>";
				
				return $return_value;
				break;
				
			case 'update':
				$like_count = get_post_meta($post_id, '_mkd-like', true);

				if($type != 'portfolio_list' && isset($_COOKIE['mkd-like_'. $post_id])) {
					return $like_count;
				}
				
				$like_count++;

				update_post_meta($post_id, '_mkd-like', $like_count);
				setcookie('mkd-like_'. $post_id, $post_id, time()*20, '/');

				if($type != 'portfolio_list') {
					$return_value = "<i class='icon-heart' aria-hidden='true'></i><span>" . $like_count . "</span>";

					$return_value .= '</span>';
					return $return_value;
				}

				return '';
				break;
			default:
				return '';
				break;
		}
	}

	function add_mkd_like(){
		global $post;

		$output = $this->like_post($post->ID);
  
  		$class = 'mkd-like';
  		$title = esc_html__('Like this', 'burst');
		if( isset($_COOKIE['mkd-like_'. $post->ID]) ){
			$class = 'mkd-like liked';
			$title = esc_html__('You already liked this!', 'burst');
		}
		
		return '<a href="#" class="'. $class .'" id="mkd-like-'. $post->ID .'" title="'. $title .'">'. $output .'</a>';
	}

	function add_mkd_like_portfolio_list($portfolio_project_id){

  		$class = 'mkd-like';
  		$title = esc_html__('Like this', 'burst');
		if( isset($_COOKIE['mkd-like_'. $portfolio_project_id]) ){
			$class = 'mkd-like liked';
			$title = esc_html__('You already like this!', 'burst');
		}
		
		return '<a class="'. $class .'" data-type="portfolio_list" id="mkd-like-'. $portfolio_project_id .'" title="'. $title .'"></a>';
	}

	function add_mkd_like_portfolio_post($portfolio_project_id){
		global $post;

		$output = $this->like_post($post->ID);

		$class = 'mkd-like';
		$title = esc_html__('Like this', 'burst');
		if( isset($_COOKIE['mkd-like_'. $portfolio_project_id]) ){
			$class = 'mkd-like liked';
			$title = esc_html__('You already like this!', 'burst');
		}
		
		return '<a class="'. $class .'" id="mkd-like-'. $portfolio_project_id .'" title="'. $title .'">'.$output.'</a>';
	}

    function add_mkd_like_blog_list($blog_id){

        $class = 'mkd-like';
        $title = esc_html__('Like this', 'burst');
        if( isset($_COOKIE['mkd-like_'. $blog_id]) ){
            $class = 'mkd-like liked';
            $title = esc_html__('You already like this!', 'burst');
        }

        return '<a class="hover_icon '. $class .'" data-type="portfolio_list" id="mkd-like-'. $blog_id .'" title="'. $title .'"></a>';
    }
}

global $mkd_burst_like;
$mkd_burst_like = new MikadoBurstLike();

function mkd_burst_like() {
	global $mkd_burst_like;
	echo wp_kses($mkd_burst_like->add_mkd_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

function mkd_burst_like_latest_posts() {
	global $mkd_burst_like;
	return $mkd_burst_like->add_mkd_like();
}

function mkd_burst_like_portfolio_list($portfolio_project_id) {
	global $mkd_burst_like;
	return $mkd_burst_like->add_mkd_like_portfolio_list($portfolio_project_id);
}

function mkd_burst_like_portfolio_post($portfolio_project_id) {
	global $mkd_burst_like;
	return $mkd_burst_like->add_mkd_like_portfolio_post($portfolio_project_id);
}