<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if Access Directly.
}
/**
 * Here Will be initialize all the required files. This will be fired only if WooCommerce is active.
 */

class Plugin_Setup {
	private static $_instance = null;
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function woo_extend_style_scripts() {
		wp_enqueue_style( 'custom-css', plugin_dir_url( __FILE__ ) . '/admin/assets/style.css', array(), '1.0', 'all' );
	}

	public function __construct() {

		add_action( 'admin_enqueue_scripts', array( $this, 'woo_extend_style_scripts' ) );
		// Database Functions
		require_once 'admin/DB_Handling.php';

		// Product Page Functions
		require_once 'admin/Product_Fields.php';

		// Email Customizing Functions
		require_once 'admin/Email_Customizer.php';
	}


	public function test_func() {
		$screen = get_current_screen();
		echo '<script>console.log(' . $screen->parent_base . ')</script>';
	}
}
// Instantiate The Plugin
Plugin_Setup::instance();
