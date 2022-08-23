<?php
/**
 * Saving records to User-Reg table in DB.
 *
 * @package users-registration-panel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'URP_Save_Records' ) ) {

	/**
	 * Class URP_Save_Records.
	 */
	class URP_Save_Records {

		/**
		 * Saves records to Users Reg DB's table.
		 */
		public function saves_records_to_user_reg_table($username, $email, $role, $phone, $web, $gender, $dob, $user_lang, $user_tech, $profile){

			require_once( ABSPATH . '/wp-includes/pluggable.php' ); 
			require_once( ABSPATH . 'wp-admin/includes/file.php' );

			$upload = wp_handle_upload( 
				$profile, 
				array( 'test_form' => false ) 
			);

			if( ! empty( $upload[ 'error' ] ) ) {
				wp_die( $upload[ 'error' ] );
			}

			//Uploaded image into WordPress media library.
			$attachment_id = wp_insert_attachment(
				array(
					'guid'           => $upload[ 'url' ],
					'post_mime_type' => $upload[ 'type' ],
					'post_title'     => basename( $upload[ 'file' ] ),
					'post_content'   => '',
					'post_status'    => 'inherit',
				),
				$upload[ 'file' ]
			);

			$profile = $upload[ 'url' ];

			if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
				wp_die( 'Upload error.' );
			}

			//Update medatata, regenerate image sizes.
			require_once( ABSPATH . 'wp-admin/includes/image.php' );

			wp_update_attachment_metadata(
				$attachment_id,
				wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
			);


			global $wpdb;
			$table_name = $wpdb->prefix . 'users_registration';

			$charset_collate = $wpdb->get_charset_collate();

			$check_results = $wpdb->get_results( "SELECT * FROM $table_name;");

			$proceed = '';

			//Checking if entered email is already in DB table.
			foreach ($check_results as $key => $value) {
				foreach ($value as $nested_key => $nested_value) {
					if($nested_key != 'email'){
						continue;
					}
					else if($email == $nested_value){
						$proceed = 'to_update';
						break;
					}
				}

				if( $proceed == 'to_update' ){
					break;
				}
			}

			$sql = "";
			$username = ucwords($username);

			if( $proceed  != 'to_update'){
				$sql = "INSERT INTO `$table_name` (`image_url`, `name`, `email`, `phone`, `dob`, `role`, `website_url`, `languages`, `technicality`, `gender`) 
				VALUES ('$profile', '$username', '$email', '$phone', '$dob', '$role', '$web', '$user_lang', '$user_tech', '$gender'); $charset_collate;";
				require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
				dbDelta( $sql );
			}
			else{
				global $wpdb;
				$wpdb->update( $table_name, array( 'name' => $username, 'phone' => $phone, 'dob' => $dob, 'image_url' => $profile, 'role' => $role, 'website_url' => $web, 'languages' => $user_lang, 'technicality' => $user_tech, 'gender' => $gender ), array( 'email' => $email ) );
			}

		}

    }

}