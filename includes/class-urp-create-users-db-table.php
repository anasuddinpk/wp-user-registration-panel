<?php
/**
 * Creating User-Reg table on DB.
 *
 * @package users-registration-panel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'URP_Create_Users_Db_Table' ) ) {

	/**
	 * Class URP_Create_Users_Db_Table.
	 */
	class URP_Create_Users_Db_Table {

		/**
		 *  Constructor.
		 */
		public function __construct() {
			$this->create_user_reg_table();
        }

        /**
         * Creates Users Reg table in Database.
         */
        public function create_user_reg_table() {
			global $wpdb;
		 
			$table_name = $wpdb->prefix . "users_registration"; 

			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE $table_name (
				`id` INT(255) NOT NULL AUTO_INCREMENT , 
				`image_url` VARCHAR(255) NOT NULL , 
				`name` VARCHAR(255) NOT NULL , 
				`email` VARCHAR(255) NOT NULL , 
				`phone` VARCHAR(255) NOT NULL , 
				`dob` DATE NOT NULL , 
				PRIMARY KEY (`email`), UNIQUE `id` (`id`)
			); $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
    }

    new URP_Create_Users_Db_Table;
}
