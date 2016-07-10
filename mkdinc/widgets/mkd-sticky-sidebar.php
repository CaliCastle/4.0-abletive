<?php
class Mikado_Burst_Sticky_Sidebar extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'mkd_sticky_sidebar', // Base ID
			'Mikado Sticky Sidebar', // Name
			array( 'description' => esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'burst' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo '<div class="widget widget_sticky-sidebar"></div>';
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget( "Mikado_Burst_Sticky_Sidebar" );' ) );
