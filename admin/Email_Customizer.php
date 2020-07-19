<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Email_Customizer {
	public function __construct() {
		add_action( 'woocommerce_email_order_details', array( $this, 'add_order_instruction_email' ), 10, 4 );
	}

	public function add_order_instruction_email( $order, $sent_to_admin, $plain_text, $email ) {
		global $wpdb;
		$product_id = '';
		foreach ( $order->get_items() as $item_id => $item ) {
			$product_id = $item->get_product_id();
			$results    = $wpdb->get_results(
				$wpdb->prepare( 'SELECT * from woo_extend_codes WHERE product_id=%d', $product_id )
			);
			foreach ( $results as $result ) {
				echo "Ticket Code: <strong>".$result->product_code."</strong>";
			}
		}

	}
}

new Email_Customizer();
