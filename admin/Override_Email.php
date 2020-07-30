<?php

class Override_Email {

	public function __construct() {
		add_filter( 'woocommerce_locate_template', array( $this, 'custom_email_template' ), 10, 3 );
	}

	/**
	 * Overriding the Template.
	 */
	function custom_email_template( $template, $template_name, $template_path ) {
		$basename = basename( $template );
		if ( $basename == 'customer-processing-order.php' ) {
			$template = trailingslashit( plugin_dir_path( __DIR__ ) ) . 'woocommerce/emails/customer-processing-order.php';
		}
		return $template;
	}

}

new Override_Email();
