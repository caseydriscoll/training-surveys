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
	echo "<h2>Welcome!</h2>";
	echo "<p>Help WordPressDC provide the best training possible by taking the entrance survey.</p>";
	echo "<a class='button button-primary' href='" . admin_url( 'index.php?page=wordpressdc-entrance-survey' ) . "'>Start Survey</a>";
}


// Add entrance survey page
function wordpressdc_entrance_survey_menu() {
	add_dashboard_page( 'WordPressDC Training Entrance Survey', 'Entrance Survey', 'manage_options', 'wordpressdc-entrance-survey', 'wordpressdc_render_entrance_survey' );
}


add_action( 'admin_menu', 'wordpressdc_entrance_survey_menu' );

function wordpressdc_render_entrance_survey() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<h2>Entrance Survey</h2>';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
