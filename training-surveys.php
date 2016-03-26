<?php

/**
 * Plugin Name: Training Surveys
 * Plugin URI:
 * Description: Creates training entrance and exit surveys for WordPressDC students
 * Version: 0.1-alpha
 * Author: Casey Patrick Driscoll
 * Author URI: https://caseypatrickdriscoll.com
 * License: GPL2
 */


// Clear Dashboard Panels
function remove_dashboard_meta() {
				remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
				remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
				remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
				remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
				remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
				remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
				remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
				remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
				remove_meta_box( 'dashboard_activity', 'dashboard', 'normal'); //since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

remove_action( 'welcome_panel', 'wp_welcome_panel' );


// Add training survey widget
function wordpressdc_add_entrance_survey_dashboard_widget() {
	wp_add_dashboard_widget( 
		'wordpress_dc_entrance_survey',
		'Entrance Survey',
		'wordpressdc_render_entrance_survey_dashboard_widget'
	);
}
add_action( 'wp_dashboard_setup', 'wordpressdc_add_entrance_survey_dashboard_widget' );

function wordpressdc_render_entrance_survey_dashboard_widget() {
	echo "Welcome! Take the <a href='/'>Entrance Survey!</a>";
}

