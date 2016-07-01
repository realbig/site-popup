<?php
/**
 * Admininstrative tools.
 *
 * @since 0.1.0
 *
 * @package RoadBlockPopUp
 * @subpackage RoadBlockPopUp/includes
 */

defined( 'ABSPATH' ) || die();

class RoadBlockPopUp_Admin {

	/**
	 * RBPU_PopUp constructor.
	 *
	 * @@since {{VERSION}}
	 */
	public function __construct() {

		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Registers plugin settings.
	 *
	 * @since {{VERSION}}
	 * @access private
	 */
	function register_settings() {

		register_setting( 'rbpu', 'rbpu_video_url' );
		register_setting( 'rbpu', 'rbpu_toggle' );
	}

	/**
	 * Adds admin menu items.
	 *
	 * @since {{VERSION}}
	 * @access private
	 */
	function admin_menu() {

		add_options_page(
			'Road Block Pop Up',
			'Road Block Pop Up',
			'manage_options',
			'rbpu',
			array( $this, 'admin_page' )
		);
	}

	/**
	 * Outputs the admin page.
	 *
	 * @since {{VERSION}}
	 * @access private
	 */
	function admin_page() {

		$video_url = get_option( 'rbpu_video_url', '' );
		$toggle    = get_option( 'rbpu_toggle', 'off' );

		include_once ROADBLOCKPOPUP_DIR . 'includes/admin/views/admin-page.php';
	}
}