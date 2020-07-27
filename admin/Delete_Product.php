<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}
/**
 * Deleting the Code attached to product when the product is deleted. 
 */
class Delete_Product {
    public function __construct(){
        $this->delete_code_when_post_deleted();
    }

    public function delete_code_when_post_deleted(){
        if(isset($_GET['action'])){
           if($_GET['action'] == 'trash'){
               global $wpdb;
               $product_id = $_GET['post'];
               $wpdb->delete( 'woo_extend_codes', array( 'product_id' => $product_id ), array( '%s' ) );
           }
        }
    }
}

new Delete_Product();
