<?php
/**
 * Creating registration panel on WordPress settings.
 *
 * @package users-registration-panel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'URP_Add_Registration_Panel' ) ) {

	/**
	 * Class URP_Add_Registration_Panel.
	 */
	class URP_Add_Registration_Panel {

		/**
		 *  Constructor.
		 */
		public function __construct() {
            add_action( 'admin_menu', array($this, 'registers_user_reg_sub_menu') ); 

            if( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['user_name']) ){

                echo '<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"> 
                        <p><strong>User registered successfully.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
                      </div>';

                $save_records_obj = new URP_Save_Records();
                $save_records_obj->saves_records_to_user_reg_table($_POST['user_name'], $_POST['user_email'], $_POST['user_phone'], $_POST['user_dob'], $_FILES['user_profile']);

            }   
        
            if( isset($_GET['action'])){
                
                if($_GET['action'] == 'delete'){
                    global $wpdb;
		 
                    $table_name = $wpdb->prefix . "users_registration"; 

                    $wpdb->delete( $table_name, array( 'id' => $_GET['id'] ) );

                }

                if($_GET['action'] == 'edit'){
                    global $wpdb;
		 
                    $table_name = $wpdb->prefix . "users_registration"; 

                    $wpdb->delete( $table_name, array( 'id' => $_GET['id'] ) );

                }
                
            }

        }

        /**
         * Add Settings' Sub-menu Page.
         */
        public function registers_user_reg_sub_menu() {
            add_submenu_page( 
                'options-general.php', 'Users Registration Panel', 'Users Registration', 'manage_options', 'users-registration', array( $this, 'submenu_page_callback'), null
            );
        }

        /**
         * Callback of Sub-menu Page.
         */
        public function submenu_page_callback(){
            echo '<div class="wrap">';
            include plugin_dir_path( __DIR__ ) . 'templates/admin/user-registration-form.php';
            echo '</div>';  

            global $wpdb;
			$table_name = $wpdb->prefix . 'users_registration';

            $result = $wpdb->get_results( "SELECT * FROM $table_name");

            include plugin_dir_path( __DIR__ ) . 'templates/admin/registered-user-entries.php';
        }

    }

    new URP_Add_Registration_Panel;
}


