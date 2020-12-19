<?php

/**
 * Plugin Name: witbots plugin
 * Description: Test description of your plugin
 * Version: 1.0.0
 * Author: Witbots security
 * Author URI: https://witbots-security.com
 * Text Domain: witbots-security
 * License: GPLv3
 *
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Enqueue frontend scripts.
 */
function frontend_scripts()
{
	wp_enqueue_script(
		'wbs-frontend-js',
		plugins_url('assets/js/frontend.js', __FILE__),
		['jquery', 'wp-element'],
		'11272018'
	);
}
add_action('wp_enqueue_scripts', 'frontend_scripts');


/**
 * Enqueue admin scripts.
 */
function admin_scripts()
{
	wp_enqueue_script(
		'wbs-admin-js',
		plugins_url('assets/js/admin.js', __FILE__),
		['jquery', 'wp-element'],
		'11272018'
	);
}
add_action('admin_enqueue_scripts', 'admin_scripts');




function wpplugin_settings_pages()
{

	// The main function to add the plugin menu page
	// add_menu_page(
	// 	__('page_name', 'wpplugin'), //page title
	// 	__('menu_name', 'wpplugin'), // menu title
	// 	'manage_options', //permisions check
	// 	'slug_name', //menu slug 
	// 	'dashicons-playlist-audio', //icon
	// 	10 //position
	// );

	/* 
		The add_submenu_page function is to be used on every option desired to be added
		on the menu list
	*/

	// add_submenu_page(
	// 	'parent_slug', // parent slug
	// 	__('page_title', 'wpplugin'), // page title
	// 	__('menu_title', 'wpplugin'), // menu title
	// 	'manage_options', // permisions check
	// 	'menu_slug', // menu slug
	// 	'wpplugin_settings_subpage_markup' //function to create the dom exit portal
	// );
}

add_action('admin_menu', 'wpplugin_settings_pages');


function wpplugin_settings_subpage_markup() // This is the function to be called in the add_sub_menu
{
	// Double check user capabilities
	if (!current_user_can('manage_options')) {
		return;
	}
	/* 
		Change the id to whatever you will remember,
		The id is to be used to accesss the dom from react file associated
		with this exit dom portal
	*/
?>
	<div class="wrap" id="admin"></div>
<?php
}

function witbots_plugin_uninstall()
{
	/* 
        Do all the db clean up from this function
    */
}


register_uninstall_hook(__FILE__, 'witbots_security_uninstall');
