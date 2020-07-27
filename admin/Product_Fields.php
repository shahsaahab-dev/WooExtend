<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}

class Product_Fields {
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'insert_fields_product_page' ) );
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
			$codes[] = $result->product_code;
		}?>
		<form method="post">
		<textarea name="product-code" class="form-input-tip extend-woo-code" placeholder="Codes for This Product. One Code per Line."></textarea>
		</form>
		<?php
	}

	public function on_save_function($post) {
		if(isset($_POST['product-code'])){
			global $wpdb;
			$results = $wpdb->get_results(
				$wpdb->prepare( 'SELECT * from woo_extend_codes WHERE product_id=%d', get_the_ID() )
			);
			if ( $_POST['product-code'] !== '' ) {
				$codeString = $_POST['product-code'];
				$codeArray  = preg_split( '/[\n\r]+/', $codeString );
				foreach ( $codeArray as $code ) {
					$wpdb->query( $wpdb->prepare( ' INSERT INTO woo_extend_codes ( product_id, product_code ) VALUES ( %d, %s ) ', array( get_the_ID(), $code ) ) );
				}
			} else {
				return 'Product saved, no codes were inserted or updated!';
			}
		}
	}
}

new Product_Fields();
