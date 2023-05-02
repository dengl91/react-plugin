<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       New React plugin
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */
 
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'REACT_PLUGIN_VERSION', '1.0.1' );

function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';
	Plugin_Name_Activator::activate();
}

function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';
	Plugin_Name_Deactivator::deactivate();
}

function my_plugin_enqueue_scripts() {
	wp_enqueue_script( 'react-plugin-js', plugins_url( '/build/static/js/main.min.js', __FILE__ ), array( 'wp-element' ), REACT_PLUGIN_VERSION, true);
	wp_enqueue_style( 'react-plugin-css', plugins_url( '/build/static/css/main.css', __FILE__ ), '', REACT_PLUGIN_VERSION, 'all');
}
add_action( 'admin_enqueue_scripts', 'my_plugin_enqueue_scripts' );

function my_plugin_create_menu_page() {
	add_menu_page('My Plugin Settings', 'React plugin', 'manage_options', 'my-plugin-settings',
		function() {
			echo '<div id="react-plugin-root"></div>';
		},
		'dashicons-editor-expand'
	);
}
add_action( 'admin_menu', 'my_plugin_create_menu_page' );