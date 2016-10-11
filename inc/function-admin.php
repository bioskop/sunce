<?php

/*
	========================
		ADMIN PAGE
	========================
*/

function sunset_add_admin_page() {

	//Generate sunset admin page
	add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page', 'dashicons-smiley', 110 );

	//Generate sunset admin sub-pages
	add_submenu_page( 'alecaddd_sunset', 'Sunset Theme Options', 'General', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page');
	add_submenu_page( 'alecaddd_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_sunset_css', 'sunset_theme_settings_page');

	//Activate custom settings
	add_action('admin_init','sunset_custom_settings');

}

add_action( 'admin_menu', 'sunset_add_admin_page' );

function sunset_custom_settings(){
	register_setting( 'sunset-settings-group', 'first_name' );
	register_setting( 'sunset-settings-group', 'last_name' );
	register_setting( 'sunset-settings-group', 'user_description' );
	register_setting( 'sunset-settings-group', 'twitter_handler' );
	register_setting( 'sunset-settings-group', 'facebook_handler' );
	register_setting( 'sunset-settings-group', 'gplus_handler' );

	add_settings_section( 'sunset-sidebar-opstions', 'Sidebar Options', 'sunset_sidebar_opstions', 'alecaddd_sunset');

	add_settings_field( 'sidebar-name', 'Full Name', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-opstions');
	add_settings_field( 'sidebar-description', 'Description', 'sunset_sidebar_description', 'alecaddd_sunset', 'sunset-sidebar-opstions');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'sunset_sidebar_twitter', 'alecaddd_sunset', 'sunset-sidebar-opstions');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'sunset_sidebar_facebook', 'alecaddd_sunset', 'sunset-sidebar-opstions');
	add_settings_field( 'sidebar-gplus', 'Gplus handler', 'sunset_sidebar_gplus', 'alecaddd_sunset', 'sunset-sidebar-opstions');
}

function sunset_sidebar_opstions(){
	echo 'Customize your sidebar info!';
}

function sunset_sidebar_name(){
	$firstName = esc_attr(get_option( 'first_name' ) );
	$lastName = esc_attr(get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name"/>';
}

function sunset_sidebar_description (){
	$description = esc_attr(get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description"/><p class="description">Write something smart.</p>';
}

function sunset_sidebar_twitter(){
	$twitter = esc_attr(get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter Handler"/><p class="description">Input your Twitter username without the @ character.</p>';
}

function sunset_sidebar_facebook (){
	$facebook = esc_attr(get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook Handler"/>';
}

function sunset_sidebar_gplus(){
	$gplus = esc_attr(get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Gplus Handler"/>';
}

function sunset_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/sunset-admin.php' );
}
function sunset_theme_settings_page() {
	//generation of our admin page
}
