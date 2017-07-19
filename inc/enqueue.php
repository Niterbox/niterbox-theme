<?php

/*

@package niterboxtheme

	=============================
		ADMIN ENQUEUE FUNCTIONS
	=============================
 */

function niterbox_load_admin_scripts() {

	wp_register_style( 'niterbox_admin', get_template_directory_uri() . '/assets/css/niterbox.admin.css', array(), '1.0.0', 'all');
}