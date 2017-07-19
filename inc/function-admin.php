<?php

/*

@package niterboxtheme

	========================
		ADMIN PAGE
	========================
 */

function niterbox_add_admin_page() {

	// Generate Niterbox Admin Page
	add_menu_page('Niterbox Theme Options', 'Niterbox', 'manage_options', 'js_niterbox', 'niterbox_theme_create_page', get_template_directory_uri() . '/assets/img/niterbox-icon.png', 110);

	// Generate Niterbox Admin Sub Page
	add_submenu_page('js_niterbox', 'Niterbox Theme Options', 'Settings', 'manage_options', 'js_niterbox', 'niterbox_theme_create_page');
	add_submenu_page('js_niterbox', 'Niterbox CSS Options', 'Custom CSS',
	'manage_options', 'js_niterbox_css', 'niterbox_theme_settings_page');

}
add_action('admin_menu', 'niterbox_add_admin_page');

// Activate custom settings
add_action('admin_init', 'niterbox_custom_settings' );

function niterbox_custom_settings() {
	register_setting('niterbox-settings-group', 'first_name');
	register_setting('niterbox-settings-group', 'last_name');
	register_setting('niterbox-settings-group', 'user_description');
	register_setting('niterbox-settings-group', 'twitter_handler', 'niterbox_sanitize_twitter_handler');
	register_setting('niterbox-settings-group', 'facebook_handler');
	register_setting('niterbox-settings-group', 'git_handler');

	add_settings_section('niterbox-sidebar-options', 'Sidebar Options', 'niterbox_sidebar_options', 'js_niterbox');

	add_settings_field( 'sidebar-name', 'Full Name', 'niterbox_sidebar_name', 'js_niterbox', 'niterbox-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'niterbox_sidebar_description', 'js_niterbox', 'niterbox-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'niterbox_sidebar_twitter', 'js_niterbox', 'niterbox-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'niterbox_sidebar_facebook', 'js_niterbox', 'niterbox-sidebar-options');
	add_settings_field( 'sidebar-git', 'Git handler', 'niterbox_sidebar_git', 'js_niterbox', 'niterbox-sidebar-options');
}

// Sanitization settings
function niterbox_sanitize_twitter_handler($input) {
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;
}

function niterbox_sidebar_options() {
	echo 'Customize your Sidebar Informations';
}

function niterbox_sidebar_name() {
	$firstName = esc_attr( get_option('first_name'));
	$lastName = esc_attr( get_option('last_name'));
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /><input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function niterbox_sidebar_description() {
	$description = esc_attr( get_option('user_description'));
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}

function niterbox_sidebar_twitter() {
	$twitter = esc_attr( get_option('twitter_handler'));
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @character.</p>';
}

function niterbox_sidebar_facebook() {
	$facebook = esc_attr( get_option('facebook_handler'));
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}

function niterbox_sidebar_git() {
	$git = esc_attr( get_option('git_handler'));
	echo '<input type="text" name="git_handler" value="'.$git.'" placeholder="Git handler" />';
}






function niterbox_theme_create_page() {
	require_once(get_template_directory() . '/inc/templates/niterbox-admin.php');
}

function niterbox_theme_settings_page() {
	// Generation of our admin page
}