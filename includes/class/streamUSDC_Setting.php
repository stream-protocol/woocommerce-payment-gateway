<?php

/**
 * class streamUSDC_Setting
 *
 * @package     UsdcPayment
 * @subpackage  Admin setting
 * @common usage for all plugin operation
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class streamUSDC_Setting {

    public $settings;

    public function __construct()
    {
        $this->settings = array();

        if (function_exists('WC')) {

            $payment_gateways = WC()->payment_gateways()? WC()->payment_gateways->payment_gateways() : array() ;

            if(!empty($payment_gateways) && !empty($payment_gateways[STREAM_DOMAIN]))
            {
                $payment_gateway = $payment_gateways[STREAM_DOMAIN];
                $this->settings = array(
                    'title' => isset($payment_gateway->title)?$payment_gateway->title: '',
                    'description' => isset($payment_gateway->description)?$payment_gateway->description:'' ,
                    'enabled' => $payment_gateway->enabled,
                    'store_address' => isset($payment_gateway->store_address)? $payment_gateway->store_address : ''
                );

            }

        }

    }

    /**
     * @param string $Setting_option
     * @return STREAM payment gateway option information
     */

    public function get_setting($option){
        return isset($this->settings[$option])? $this->settings[$option]: '';
    }

//    /**
//     * @return True/False
//     */
//
//    public function valid_store_address(){
//
//        $store_address = $this->settings['store_address'];
//
//        if(empty($store_address)) return False;
//
//        error_log($store_address);
//        /**
//         * Validate the Wallet address for USDC
//         */
//
//        return preg_match('/^0x[a-fA-F0-9]{40,42}/', $store_address);
//
//    }


}