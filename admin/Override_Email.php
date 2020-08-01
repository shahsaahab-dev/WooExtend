<?php

class Override_Email {

	public function __construct() {
		add_filter( 'woocommerce_locate_template', array( $this, 'order_invoice_customer' ), 10, 3 );
		add_filter( 'woocommerce_locate_template', array( $this, 'admin_notification' ), 10, 3 );
	}

	/**
	 * Overriding the Template.
	 */
	public function order_invoice_customer( $template, $template_name, $template_path ) {
		$basename = basename( $template );
		if ( $basename == 'customer-processing-order.php' ) {
			$template = trailingslashit( plugin_dir_path( __DIR__ ) ) . 'woocommerce/emails/customer-processing-order.php';
		}
		return $template;
	}
	public function admin_notification( $template, $template_name, $template_path ) {
		$basename = basename( $template );
		if ( $basename == 'admin-new-order.php' ) {
			$template = trailingslashit( plugin_dir_path( __DIR__ ) ) . 'woocommerce/emails/admin-new-order.php';
		}
		return $template;
	}
}

new Override_Email();
