<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}
class DB_Handling {
	// Lets create a table to store all the generated codes.

	public function __construct() {
		$this->create_table();
	}

	private function create_table() {
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$sql             = 'CREATE TABLE woo_extend_codes(
            id INT(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_id INT(9) NOT NULL,
            product_code VARCHAR(255)
        )' . $charset_collate . ';';
		dbDelta( $sql );
	}


	public function insert_table(){
		
	}

}

new DB_Handling();
