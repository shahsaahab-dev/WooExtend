<?php


do_action( 'woocommerce_email_header', $email_heading, $email );?>
<p><?php printf( esc_html__( 'You’ve received the following order from %s:', 'woocommerce' ), $order->get_formatted_billing_full_name() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
<?php
global $wpdb;
foreach ( $order->get_items() as $item_id => $item ) {
	$product_id = $item->get_product_id();
	$quantity   = $item->get_quantity();
	$product    = wc_get_product( $product_id );
	$results    = $wpdb->get_results(
		$wpdb->prepare( 'SELECT * from woo_extend_codes WHERE product_id=%d AND product_result=%d ORDER BY id DESC LIMIT %d', array( $product_id, 'used', $quantity ) )
	);
	foreach ( $results as $result ) {
		echo 'Ticket Code for ' . $product->get_title() . ' : <strong>' . $result->product_code . '</strong><br>';
	}
}
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

do_action( 'woocommerce_email_footer', $email );
