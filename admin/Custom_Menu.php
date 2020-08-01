<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Custom_Menu {
	public function __construct() {
		$this->create_custom_cpt();
	}

	public function create_custom_cpt() {
		add_menu_page(
			__( 'Ticket Codes', 'textdomain' ),
			'Ticket Codes',
			'manage_options',
			'wooextend-tickets.php',
			array( $this, 'ticket_code_cb' ),
			'dashicons-tickets-alt',
			6
		);
	}

	public function ticket_code_cb() {?>
<div class="wrapper">
	<h1 class="wp-heading-inline"><?php echo __( 'Ticket Codes', 'woo-extend' ); ?></h1>
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Codes</th>
				<th>Code Status</th>
			</tr>
		</thead>

		<tbody id="the-list">
			<tr class="iedit">
				<?php
			global $wpdb;
				$results = $wpdb->get_results( 'SELECT DISTINCT product_id FROM woo_extend_codes' );
			foreach ( $results as $result ) {
				if ( $result->product_id !== '0' ) {?>
			<tr>
				<td>
					<?php echo $result->product_id; ?>
				</td>
				<?php
				
					?>
				<td>
					<?php
						$product_id = $result->product_id;
						$product_obj = wc_get_product($product_id);
						if($product_obj){
							echo $product_obj->get_title();
						}
					?>
				</td>
				<td>
					<?php
						$results_2 = $wpdb->get_results(
							$wpdb->prepare( 'SELECT * from woo_extend_codes WHERE product_id=%d', array( $result->product_id ) )
						);
					foreach ( $results_2 as $product_code ) {
						echo $product_code->product_code . '<br/>';
					}
					?>
				</td>

				<td><?php echo __("Not Used","woo-extend") ?></td>
			</tr>

			<?php
				} else {
					echo '';
				}
			}

			?>
			</tr>
		</tbody>

		<tfoot>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Codes</th>
				<th>Code Status</th>
			</tr>
		</tfoot>

	</table>
</div>
<?php
	}
}

new Custom_Menu();