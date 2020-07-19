<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}

class Product_Fields {
	public function __construct() {
		$this->insert_fields_product_page();
		add_action( 'save_post', array( $this, 'on_save_function' ) );
	}

	public function insert_fields_product_page() {
		add_meta_box( 'product_field_custom', 'Product Code', array( $this, 'woo_extend_code_function' ), 'product', 'side', 'high' );
	}

	public function woo_extend_code_function() {
		$value_field = '';
		global $wpdb;
		$results = $wpdb->get_results(
			$wpdb->prepare( 'SELECT * from woo_extend_codes WHERE product_id=%d', get_the_ID() )
		);
		foreach ( $results as $result ) {
			$value_field = 'value=' . $result->product_code . '';
		}
		// Condition to show the button
		$html  = '<form method="post">';
		$html .= '<input name="product-code" class="form-input-tip extend-woo-code" placeholder="Enter Code Here" ' . $value_field . '></input>';
		$html .= '</form>';
		echo $html;
	}

	public function on_save_function() {
		global $wpdb;
		$results = $wpdb->get_results(
			$wpdb->prepare( 'SELECT * from woo_extend_codes WHERE product_id=%d', get_the_ID() )
		);
		if ( empty( $results ) ) {
			$wpdb->query( $wpdb->prepare( ' INSERT INTO woo_extend_codes ( product_id, product_code ) VALUES ( %d, %s ) ', array( get_the_ID(), $_POST['product-code'] ) ) );
		} else {
			$wpdb->query( $wpdb->prepare( 'UPDATE woo_extend_codes SET product_code=%s WHERE product_id=%d', array( $_POST['product-code'], get_the_ID() ) ) );
		}

	}
}

new Product_Fields();
