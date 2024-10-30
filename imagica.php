<?php
/**
 * imagica
 *
 * @package           imagica
 * @author            Murilo Elias
 * @copyright         2022 imagica
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Imagica
 * Plugin URI:        https://imagica.online
 * Description:       This plugin generates images through a description with <strong>artificial intelligence</strong> with the possibility to choose different styles, compresses them and saves the selected images in your image library.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            imagica
 * Author URI:        https://imagica.online/
 * Text Domain:       imagica
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
imagica is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

imagica is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with imagica.
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
	//_('This plugin generates images through a description with <strong>artificial intelligence</strong> with the possibility to choose different styles, compresses them and saves the selected images in your image library.');
}

//version plugin
define( 'IMAGICA_VERSION', '1.0.1' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-imagica-activator.php
 */
function activate_imagica() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-imagica-activator.php';
	Imagica_Activator::activate();
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-imagica-deactivator.php
 */
function deactivate_imagica() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-imagica-deactivator.php';
	Imagica_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_imagica' );
register_deactivation_hook( __FILE__, 'deactivate_imagica' );



/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-imagica.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_imagica() {

	$plugin = new Imagica();
	$plugin->run();

}
run_imagica();
?>