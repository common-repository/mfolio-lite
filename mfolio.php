<?php
/**
 * Plugin Name: Mfolio Lite
 * Description: Multipurpose Portfolio Addon For Elementor
 * Version:     1.2.1
 * Author:      Themelooks
 * Author URI:  https://themelooks.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: mfolio-lite
 */

 // Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit();
}

// Define Constant
define( 'MFOLIO_LITE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MFOLIO_LITE_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'MFOLIO_LITE_PLUGDIRURI', plugin_dir_url( __FILE__ ) );
define( 'MFOLIO_LITE_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );
define( 'MFOLIO_LITE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'mfolio-template/' );

// load textdomain
load_plugin_textdomain( 'mfolio-lite', false, basename( dirname( __FILE__ ) ) . '/languages' );

// Include File.
require_once MFOLIO_LITE_PLUGIN_INC_PATH .'mfolio-functions.php';

// Addons
require_once MFOLIO_LITE_ADDONS . 'addons.php';