<?php
/*
Plugin Name: Road Block Popup
Description: Provides a popup roadblock for the home page that is customizable.
Version: 0.1.0
Author: Real Big Marketing
Author URI: http://realbigmarketing.com
*/

defined( 'ABSPATH' ) || die();

if ( ! class_exists( 'RoadBlockPopUp' ) ) {

	define( 'ROADBLOCKPOPUP_VERSION', '0.1.0' );
	define( 'ROADBLOCKPOPUP_DIR', plugin_dir_path( __FILE__ ) );
	define( 'ROADBLOCKPOPUP_URI', plugins_url( '', __FILE__ ) );

	/**
	 * Class RoadBlockPopUp
	 *
	 * Initiates the plugin.
	 *
	 * @since 0.1.0
	 *
	 * @package RoadBlockPopUp
	 */
	final class RoadBlockPopUp {

		/**
		 * Admin functionality.
		 *
		 * @since {{VERSION}}
		 *
		 * @var RoadBlockPopUp_Admin
		 */
		public $admin;

		/**
		 * The main popup.
		 *
		 * @since {{VERSION}}
		 *
		 * @var RBPU_PopUp
		 */
		public $popup;

		/**
		 * Disable cloning.
		 *
		 * @since 0.1.0
		 */
		protected function __clone() {
		}

		/**
		 * Call this method to get singleton
		 *
		 * @since 0.1.0
		 *
		 * @return RoadBlockPopUp()
		 */
		public static function instance() {

			static $instance = null;

			if ( $instance === null ) {
				$instance = new RoadBlockPopUp();
			}

			return $instance;
		}

		/**
		 * RoadBlockPopUp constructor.
		 *
		 * @since 0.1.0
		 */
		private function __construct() {

			$this->require_necessities();

			// Whoever built the theme does not know what their doing or ANYTHING about WordPress, so for now this has
			// to be done differently... *sigh*...

			add_action( 'realbigmarketing_header', 'add_assets_manually' );

			add_action( 'init', array( $this, 'register_assets' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'front_enqueue_assets' ) );
		}

		/**
		 * Requires all plugin files.
		 *
		 * @since 0.1.0
		 */
		private function require_necessities() {

			require_once ROADBLOCKPOPUP_DIR . 'includes/class-rbpu-popup.php';
			$this->popup = new RBPU_PopUp();

			if ( is_admin() ) {

				require_once ROADBLOCKPOPUP_DIR . 'includes/admin/roadblockpopup-admin.php';
				$this->admin = new RoadBlockPopUp_Admin();
			}
		}

		/**
		 * Registers all plugin assets.
		 *
		 * @since 0.1.0
		 * @access private
		 */
		function register_assets() {

			wp_register_style(
				'roadblockpopup-front',
				ROADBLOCKPOPUP_URI . '/assets/dist/css/roadblockpopup-front.min.css',
				null,
				defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : ROADBLOCKPOPUP_VERSION
			);

			wp_register_script(
				'roadblockpopup-front',
				ROADBLOCKPOPUP_URI . '/assets/dist/js/roadblockpopup-front.min.js',
				array( 'jquery' ),
				defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : ROADBLOCKPOPUP_VERSION,
				true
			);
		}

		/**
		 * Enqueues all global plugin front assets.
		 *
		 * @since 0.1.0
		 * @access private
		 */
		function front_enqueue_assets() {

			wp_enqueue_style( 'roadblockpopup-front' );
			wp_enqueue_script( 'roadblockpopup-front' );
		}

		/**
		 * Output the assets manually... because ugh.
		 *
		 * @since {{VERSION}}
		 * @access private
		 */
		function add_assets_manually() {
			?>
			<link rel='stylesheet' id='roadblockpopup-front-css'  href='http://local.wordpress-trunk.dev/wp-content/plugins/roadblock-popup/assets/dist/css/roadblockpopup-front.min.css?ver=0.1.0' type='text/css' media='all' />

			script>
			<script type='text/javascript' src='http://local.wordpress-trunk.dev/wp-content/plugins/roadblock-popup/assets/dist/js/roadblockpopup-front.min.js?ver=0.1.0'></script>
			<?php
		}
	}

	// Primary instantiation
	require_once __DIR__ . '/includes/roadblockpopup-functions.php';
	$GLOBALS['RoadBlockPopUp'] = RoadBlockPopUp();
}