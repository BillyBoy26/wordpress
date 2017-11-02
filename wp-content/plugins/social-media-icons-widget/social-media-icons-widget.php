<?php
/*
Plugin Name: Social Icons Widget
Plugin URI: http://github.com/dannisbet/Social-Icons-Widget
Version: 16.07
Description: Displays a list of social media website icons and a link to your profile.
Author: Daniel Nisbet
Author URI: https://nisbetcreative.com/
*/

class Social_Icons_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'social-icons-widget', // Base ID
			'Social Icons', // Widget Name
			array(
				'classname' => 'social-icons-widget',
				'description' => 'Displays a list of social media website icons and a link to your profile.',
			),
			array(
				'width' => 600,
			)
		);

		// Register Stylesheets
		add_action('wp_enqueue_scripts', array($this, 'register_widget_styles'));
	}



	function widget($args, $instance) {
		include('lib/widget.php');
	}

	function register_widget_styles() {
		wp_enqueue_style('social-icons-widget-widget', plugins_url('social-media-icons-widget/css/social_icons_widget.css'));
	}

}

add_action('widgets_init', create_function('', 'register_widget("Social_Icons_Widget");') );

?>