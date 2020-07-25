<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Email_Customizer {
	public function __construct() {
		add_action( 'woocommerce_email_before_order_table', array( $this, 'add_order_instruction_email' ), 10, 4 );
		add_action( 'woocommerce_email_customer_details', array( $this, 'set_code_result' ), 10, 4 );
		add_action( 'woocommerce_thankyou', array( $this, 'delete_code_from_db' ) );
	}



	public function add_order_instruction_email( $order, $sent_to_admin, $plain_text, $email ) {
		global $wpdb;
		foreach ( $order->get_items() as $item_id => $item ) {
			$product_id = $item->get_product_id();
			$quantity   = $item->get_quantity();
			$results    = $wpdb->get_results(
				$wpdb->prepare( 'SELECT * from woo_extend_codes WHERE product_id=%d AND product_result=%d ORDER BY id DESC LIMIT %d', array( $product_id, 'used', $quantity ) )
			);
			foreach ( $results as $result ) {
				echo 'Ticket Code: <strong>' . $result->product_code . '</strong><br>';
			}
		}

	}

	public function set_code_result( $order, $sent_to_admin, $plain_text, $email ) {
		global $wpdb;
		foreach ( $order->get_items() as $item_id => $item ) {
			$product_id = $item->get_product_id();
			$quantity   = $item->get_quantity();
			$wpdb->query(
				$wpdb->prepare(
					'UPDATE woo_extend_codes SET product_result=%s WHERE product_id=%d ORDER BY id DESC LIMIT %d ',
					array( 'used', $product_id, $quantity )
				)
			);
		}
	}

	public function delete_code_from_db() {
		global $wpdb;
		$wpdb->delete( 'woo_extend_codes', array( 'product_result' => 'used' ), array( '%s' ) );
		$wpdb->delete( 'woo_extend_codes', array( 'product_code' => '' ), array( '%s' ) );
	}


}

new Email_Customizer();
