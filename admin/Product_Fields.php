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
		// Get the existing value
		$value       = get_post_meta( get_the_ID(), 'product_code', true );
		$value_field = '';
		if ( $value !== '' ) {
			$value_field = 'value=' . $value . '';
		} else {
			$value_field = '';
		}
		// Condition to show the button
		$html  = '<form method="post">';
		$html .= '<input name="product-code" class="form-input-tip extend-woo-code" placeholder="Enter Code Here" ' . $value_field . '></input>';
		$html .= '</form>';
		echo $html;
	}

	public function on_save_function() {
		global $wpdb;
		if ( isset( $_POST['product-code'] ) ) {
			$product_id = get_the_ID();
			$code       = $_POST['product-code'];
			$table_name = 'woo_extend_codes';
			$data       = array(
				'product_id' => $product_id,
				'code'       => $code,
			);
			$format     = array( '%d', '%d' );
			$wpdb->insert( $table_name, $data, $format );
		}
	}
}

new Product_Fields();
