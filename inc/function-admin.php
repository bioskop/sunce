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
	add_settings_section( 'sunset-sidebar-opstions', 'Sidebar Options', 'sunset_sidebar_opstions', 'alecaddd_sunset');
	add_settings_field( 'sidebar-name', 'First Name', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-opstions');
}

function sunset_sidebar_opstions(){
	echo 'Customize your sidebar info!';
}

function sunset_sidebar_name(){
	$firstName = esc_attr(get_option( 'first_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/>';
}

function sunset_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/sunset-admin.php' );
}
function sunset_theme_settings_page() {
	//generation of our admin page
}
