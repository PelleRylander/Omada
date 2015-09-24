<?php
class Sticky_Sidebar extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'sticky-sidebar', // Base ID
			'Sticky Sidebar', // Name
			array( 'description' => __( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'qode' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		echo $before_widget;
		
		echo $after_widget;
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget( "Sticky_Sidebar" );' ) );
