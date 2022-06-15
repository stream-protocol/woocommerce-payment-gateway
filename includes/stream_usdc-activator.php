<?php
if (!defined('ABSPATH')) exit;
/**
 * Fired during plugin activation
 *
 * @link       https://streamprotocol.org
 * @since      0.5.0
 *
 * @package    streamtoken
 * @subpackage streamtoken/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.5.0
 * @package    streamtoken
 * @subpackage streamtoken/includes
 * @author    Stream Protocol <contact@streamprotcol.org>
 */
class streamtoken_Activator {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    0.5.0
     */
    public static function activate() {

        global $wpdb;
        $tableName = $wpdb->prefix . 'stream_usdc_payment';

        $query = "CREATE TABLE IF NOT EXISTS `$tableName`
        (
            `id` bigint(12) unsigned NOT NULL AUTO_INCREMENT,
            `store_address` char(199) NOT NULL,
            `status` char(24)  NOT NULL DEFAULT 'error',
            `ordered_at` bigint(20) NOT NULL DEFAULT '0',
            `order_id` bigint(10) NOT NULL DEFAULT '0',
            `order_amount` decimal(32, 5) NOT NULL DEFAULT '0.00000000',
            `tx_hash` char(255) NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `unique_payment` (`order_id`, `order_amount`),
            KEY `status` (`status`)
        );";

        $wpdb->query($query);

        // Checks if the purchase page option exists
        $purchase_page = get_page_by_title(stream_Payment_PROCESS);
        if ( empty( $purchase_page ) ) {
            // Checkout Page
            $checkout = wp_insert_post(
                array(
                    'post_title'     => __( stream_Payment_PROCESS, 'pl8app' ),
                    'post_content'   => '[stream_payment_proceed_page]',
                    'post_status'    => 'publish',
                    'post_author'    => 1,
                    'post_type'      => 'page',
                    'comment_status' => 'closed'
                )
            );

        }
    }

}