<?php
/**
 * Admin Notices Class
 *
 * @package     USDC Payment
 * @subpackage  Admin/Notices
 * @copyright
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * stream_Notices Class
 *
 * @since 1.0.0
 */


class streamUSDC_Notice extends stream_component {

    private $settings;

    public function __construct() {
        $this->settings = self::load_class('streamUSDC_Setting', 'streamUSDC_Setting.php', 'class');
        $this->show_notices();
    }

    /**
     * Show relevant notices
     *
     * @since 1.0.0
     */

    public function show_notices() {

        if (function_exists('WC')) {
            if ($this->get_setting('enabled') && $this->get_setting('store_address') == '') {
                add_action('admin_notices', function(){
                    $plugin_link = admin_url( 'admin.php?page=wc-settings&tab=checkout&section='. STREAM_DOMAIN );
                    $this->notice('error', sprintf( __('If you did not specify a Store address in the <a href="%1$s">Stream "USDC" Payment Gateway settings</a>, the plugin will not work. Please specify a store address first.', 'stream_usdc'), $plugin_link));
                });
            }

            $curr = get_woocommerce_currency();

            if($this->get_setting('enabled')  && $curr != 'STREAMUSDC'){
                add_action('admin_notices', function(){
                    $plugin_link = admin_url( 'admin.php?page=wc-settings&tab=general' );
                    $this->notice('error', sprintf( __('If you did not specify Store Currency as USDC in the <a href="%1$s">General settings</a>, the plugin will not work. Please specify a store currency first.', 'stream_usdc'), $plugin_link));
                });
            }

        } else {
            add_action('admin_notices', function(){
                $plugin_link = admin_url('plugins.php');
                $this->notice('error', sprintf( __( 'The Stream "USDC" Payment Gateway For WooCommerce plugin cannot run without <a href="%1$s">WooCommerce</a> activation. Please install and activate WooCommerce plugin first.', 'stream_usdc' ),  $plugin_link  ));
            });
        }
    }

    /**
     * @param string $Setting_option
     * @return STREAM payment gateway option information
     */

    protected function get_setting($option){
        return $this->settings->get_setting($option);
    }

    /**
     * @param string $type error, success more
     * @param string $notice notice to be given
     * @param bool $dismissible in-dismissible button show and hide
     * @return void
     */
    protected function notice( $type,  $notice,  $dismissible = false)
    {
        $this->view('notice', array(
            'type' => $type,
            'notice' => $notice,
            'dismissible' => $dismissible
        ));
    }

    /**
     * @param string $viewName Directory name within the folder
     * @return void
     */
    protected function view($viewName, array $args = [])
    {
        ob_start();
        self::load_file('admin_'. $viewName .'.php', 'component', $args);
        echo ob_get_clean();
    }
}



