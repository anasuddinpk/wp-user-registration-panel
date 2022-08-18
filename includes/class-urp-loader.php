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
			wp_enqueue_script( 'urp-edit-record-script', plugin_dir_url( __DIR__ ) . 'assets/js/urp-edit-record-script.js', array( 'jquery' ), wp_rand() );
		}

    }

	new URP_Loader();
}