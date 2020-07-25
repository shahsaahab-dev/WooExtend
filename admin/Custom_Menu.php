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
	<ul class="subsubsub">
	<li class="all"> All (29)</li>
</ul>
	<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
		   <th>#</th>
		   <th>Product ID</th>
		   <th>Product Codes</th>
		   <th>Code Status</th>
		</tr>
	</thead>

	<tbody id="the-list">
		<tr  class="iedit">
			<?php
			global $wpdb;
			$results = $wpdb->get_results(
				$wpdb->prepare( 'SELECT * from woo_extend_codes' )
			);
			foreach ( $results as $result ) {
				?>
				<tr>
				<td><?php echo $result->id; ?></td>
				<td><?php echo $result->product_id; ?></td>
				<td><?php echo $result->product_codes; ?></td>
				<td><?php echo $result->product_result; ?></td>
				</tr>
				<?php
			}

			?>
		</tr>
	</tbody>

	<tfoot>
		<tr>
		<th>#</th>
		   <th>Product ID</th>
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
