<?php
/**
 * Main Loader
 *
 * @package users-registration-panel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'URP_Loader' ) ) {
	/**
	 * Class URP_Loader
	 */
	class URP_Loader {

		/**
		 *  Constructor.
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'urp_enqueue_scripts' ) );
			$this->includes();
		}

		/**
		 * Includes files depend on platform
		 */
		public function includes() {
			include 'class-urp-save-records.php';
			include 'class-urp-add-registration-panel.php';
			include 'class-urp-create-users-db-table.php';
		}

		/**
		 * Enqueue Files.
		 */
		public function urp_enqueue_scripts() {
			wp_register_style( 'select2css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', false, wp_rand(), 'all' );
			wp_register_script( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array( 'jquery' ), wp_rand(), true );
			wp_enqueue_style( 'select2css' );
			wp_enqueue_script( 'select2' );
			wp_enqueue_script( 'urp-edit-record-script', plugin_dir_url( __DIR__ ) . 'assets/js/urp-edit-record-script.js', array( 'jquery' ), wp_rand() );
		}

    }

	new URP_Loader();
}