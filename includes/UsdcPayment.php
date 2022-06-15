<?php


/**
 * USDC Payment Gateway Setup
 *
 * @package UsdcPayment
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;



/**
 * Main USDC Payment Gateway Class.
 *
 * @class USDC Gateway Payment
 */

final class UsdcPayment
{
    /**
     * USDC Payment Gateway version.
     *
     * @var string
     */
    public $version = '1.0.0';

    /**
     * The single instance of the class.
     *
     * @var UsdcPayment
     * @since  1.0
     */
    private static $instance;

    /**
     * UsdcPayment HTML Element Helper Object.
     *
     * @var object|UsdcPayment_HTML_Elements
     * @since 1.0
     */
    public $html;

    /**
     * UsdcPayment Stream Protocol notice object
     * @var object|STREAM notice Object
     * @since 1.0
     */

    public $stream_notice;


    public static function instance()
    {
        if (!isset(self::$instance) && !(self::$instance instanceof UsdcPayment)) {

            self::$instance = new UsdcPayment;

            self::$instance->includes();
            add_action( 'plugins_loaded', array(self::$instance, 'load_configuration'), 99999);
            add_filter( 'woocommerce_payment_gateways', array(self::$instance, 'add_stream_usdc_payment_gateway'));
            add_filter( 'woocommerce_currencies', array(self::$instance, 'add_usdc_currency'));
            add_filter( 'woocommerce_currency_symbol', array(self::$instance, 'add_usdc_currency_symbol'), 10 ,2);
            add_action( 'admin_enqueue_scripts', array(self::$instance, 'import_web3_solana_script'));
            add_filter( 'plugin_row_meta', array(self::$instance, 'stream_plugin_row_meta'), 10, 2 );
        }
    }


    /**
     * Cloning is forbidden.
     *
     * @since 2.1
     */
    public function __clone() {
        _doing_it_wrong( __FUNCTION__, __( 'Cloning is forbidden.', 'stream_usdc' ), '2.6.1' );
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 2.1
     */
    public function __wakeup() {
        _doing_it_wrong( __FUNCTION__, __( 'Unserializing instances of this class is forbidden.', 'stream_usdc' ), '2.6.1' );
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes() {

        /**
         * Import the basic class
         */
        require_once STREAM_PLUGIN_DIR . 'includes/class/stream_component.php';
        require_once STREAM_PLUGIN_DIR . 'includes/class/stream_Payment_Repo.php';

        /**
         * Import the Stream USDC Payment Notice configuration
         */
        require_once STREAM_PLUGIN_DIR . 'includes/src/streamUSDC_Notice.php';
        require_once STREAM_PLUGIN_DIR . 'includes/src/class-stream-shortcode.php';
        /**
         * Import vendor libraries
         */
        require_once STREAM_PLUGIN_DIR . 'includes/vendor/phpqrcode.php';
    }


    /**
     * UsdcPayment Constructor.
     */
    public function __construct() {
        $this->define_constants();
    }

    /**
     * Define Stream Protocol Constants.
     */
    private function define_constants() {
        $this->define( 'STREAM_VERSION', $this->version );
        $this->define( 'STREAM_PLUGIN_DIR', plugin_dir_path( STREAM_PLUGIN_FILE ) );
        $this->define( 'STREAM_PLUGIN_URL', plugin_dir_url( STREAM_PLUGIN_FILE ) );
        $this->define( 'STREAM_DOMAIN', 'stream_usdc_gateway');
        $this->define( 'CAL_GREGORIAN', 1 );
    }

    /**
     * Define constant if not already set.
     *
     * @param string      $name Constant name.
     * @param string|bool $value Constant value.
     */
    private function define( $name, $value ) {
        if ( ! defined( $name ) ) {
            define( $name, $value );
        }
    }



    public function load_configuration() {

        if (!class_exists('WC_Payment_Gateway')) {
            return;
        };
        /**
         * Import and configure new Stream Payment Gateway for WooCommerce
         */

        require_once STREAM_PLUGIN_DIR . 'includes/src/class-streamusdc-woocommerce.php';

        $this->stream_notice = new streamUSDC_Notice();

        /**
         * Load Localization files.
         *
         * Note: the first-loaded translation file overrides any following ones if the same translation is present.
         */

        load_plugin_textdomain( 'stream_usdc', false, dirname( plugin_basename( STREAM_PLUGIN_FILE ) ). '/languages/' );

    }

    /**
     * Add Stream Payment Gateway to WooCommerce Payment Gateway list
     */
    public function add_stream_usdc_payment_gateway($gateways){

        /**
         * Validation of Setting for Online Store address, Enable/Disable USDC
         */

        $gateways[] = 'WC_stream_usdc_gateway_Gateway';

        return $gateways;
    }

    /**
     * Add Custom Currency to WooCommerce
     */
    public function add_usdc_currency($cw_currency )
    {
        $cw_currency['STREAMUSDC'] = __('USDC(STREAM) CURRENCY', 'woocommerce');
        return $cw_currency;
    }

    function add_usdc_currency_symbol( $custom_currency_symbol, $custom_currency ) {
        switch( $custom_currency ) {
            case 'STREAMUSDC': $custom_currency_symbol = 'USDC'; break;
        }
        return $custom_currency_symbol;
    }

    /**
     * Plugin row meta links
     *
     * @author Stream Protocol
     * @since 1.0
     * @param array $input already defined meta links
     * @param string $file plugin file path and name being processed
     * @return array $input
     */

    public function stream_plugin_row_meta( $input, $file){

        if ( $file != 'streamtoken-gateway/streamtoken.php' && $file != 'payment-gateway-nav/streamtoken.php')
            return $input;

        $setting_link = admin_url( 'admin.php?page=wc-settings&tab=checkout&section='. STREAM_DOMAIN );


        $links = array(
            '<a href="' . $setting_link . '">' . __( 'View Setting', 'stream_usdc' ) . '</a>',
        );

        $input = array_merge( $input, $links );

        return $input;
    }



    /**
     * Plugin admin panel Javascript import
     */

    public function import_web3_solana_script($hook){
        if($hook == 'woocommerce_page_wc-settings' && isset($_GET['section']) && $_GET['section'] == STREAM_DOMAIN){
            wp_register_script('stream_solana_web3_js', 'https://unpkg.com/@solana/web3.js@latest/lib/index.iife.min.js', array(), false, true);
            wp_enqueue_script('stream_solana_web3_js');
            wp_register_script( 'stream_usdc_gateway_admin_js', STREAM_PLUGIN_URL . 'assets/js/admin.js', array('jquery'), false, true);
            wp_enqueue_script('stream_usdc_gateway_admin_js');
        }
    }
}