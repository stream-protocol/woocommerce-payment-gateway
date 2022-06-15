<?php

class stream_Payment_Repo {
	private $tableName;	

	public function __construct() {
        global $wpdb;
        $this->tableName = $wpdb->prefix . 'stream_usdc_payment';
	}

	public function insert($address, $orderId, $paymentAmount, $status, $hash) {

		global $wpdb;
		$currentTime = time();
		$query = "INSERT INTO `$this->tableName`
					(`store_address`, `order_id`, `order_amount`, `status`, `ordered_at`, `tx_hash`) VALUES
					('$address','$orderId', '$paymentAmount', '$status', '$currentTime', '$hash')";

		return $wpdb->query($query);
	}

	public function check_duplication( $signature){
        global $wpdb;

        $query = "SELECT `order_id`
				  FROM `$this->tableName`
				  WHERE `status` = 'paid'
				  AND `tx_hash` = '$signature'";

        $results = $wpdb->get_results($query, ARRAY_A);

        if(count($results) > 0){
            return false;
        }
        else {
            return true;
        }

    }

	public function get_unpaid() {
		global $wpdb;

		$query = "SELECT `store_address`,
						 `cryptocurrency`,
						 `order_id`,
						 `order_amount`,
						 `status`,
						 `ordered_at`
				  FROM `$this->tableName`
				  WHERE `status` = 'unpaid'";

		$results = $wpdb->get_results($query, ARRAY_A);

		return $results;
	}

	public function get_distinct_unpaid_addresses() {
		global $wpdb;

		$query = "SELECT DISTINCT `store_address`, `cryptocurrency` FROM `$this->tableName` WHERE `status` = 'unpaid'";
		
		$results = $wpdb->get_results($query, ARRAY_A);

		return $results;
	}

	public function get_unpaid_for_address($cryptoId, $address) {

	    global $wpdb;

		$query = "SELECT `cryptocurrency`,
						 `order_id`,
						 `order_amount`,
						 `status`,
						 `ordered_at`
				  FROM `$this->tableName`
				  WHERE `status` = 'unpaid'
				  AND `store_address` = '$address'
				  AND `cryptocurrency` = '$cryptoId'";

		$results = $wpdb->get_results($query, ARRAY_A);

		return $results;
	}

	public function set_status($orderId, $orderAmount, $status) {
		global $wpdb;
		
		$query = "UPDATE `$this->tableName`
				  SET `status` = '$status'
				  WHERE `order_amount` = '$orderAmount'
				  AND `order_id` = '$orderId'";				  
		
		$wpdb->query($query);
	}

	public function set_hash($orderId, $orderAmount, $hash) {
		global $wpdb;

		$query = "UPDATE `$this->tableName`
				  SET `tx_hash` = '$hash'
				  WHERE `order_amount` = '$orderAmount'
				  AND `order_id` = '$orderId'";				  
		
		$wpdb->query($query);
	}

	public function set_ordered_at($orderId, $orderAmount, $orderedAt) {
		global $wpdb;
		
		
		$query = "UPDATE `$this->tableName`
				  SET `ordered_at` = '$orderedAt'
				  WHERE `order_amount` = '$orderAmount'
				  AND `order_id` = '$orderId'";				  
		
		$wpdb->query($query);
	}
}

?>