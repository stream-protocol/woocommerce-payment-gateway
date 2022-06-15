<?php
if (!defined('ABSPATH')) exit;

/**
 *
 * This file includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function that starts the plugin.
 *
 * @link              https://streamprotocol.org
 * @since             1.0.0
 * @package           stream_usdc
 *
 * @wordpress-plugin
 * Plugin Name:       FyFy USDC Gateway
 * Plugin URI:        https://streamprotocol.org
 * Description:       Add the USDC token in Woocommerce, making use of Phantom and SolFare for decentralized commerce.
 * Version:           1.0.0
 * Author:            FyFy
 * Author URI:        https://streamprotocol.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       stream_usdc
 */


if ( ! defined( 'STREAM_PLUGIN_FILE' ) ) {
    define( 'STREAM_PLUGIN_FILE', __FILE__ );
}

// Include the main UsdcPayment class.
if ( ! class_exists( 'UsdcPayment', false ) ) {


    include_once dirname( __FILE__ ) . '/includes/UsdcPayment.php';
}

define('stream_ABS_PATH', dirname(STREAM_PLUGIN_FILE));
define('stream_Payment_PROCESS', 'Finalise Order');

/**
 * Returns the main instance of UsdcPayment.
 *
 * @return UsdcPayment
 */
function STREAMUSDC() {
    return UsdcPayment::instance();
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/stream_usdc-activator.php
 */
function activate_stream_usdc() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/stream_usdc-activator.php';
    streamtoken_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/stream_usdc-deactivator.php
 */
function deactivate_stream_usdc() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/stream_usdc-deactivator.php';
}


register_activation_hook( __FILE__, 'activate_stream_usdc' );
register_deactivation_hook( __FILE__, 'deactivate_stream_usdc' );

//Get UsdcPayment Running.
STREAMUSDC();