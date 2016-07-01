<?php
/**
 * Creates a Pop Up
 *
 * @since 0.1.0
 *
 * @package RoadBlockPopUp
 * @subpackage RoadBlockPopUp/includes
 */

defined( 'ABSPATH' ) || die();

class RBPU_PopUp {

	/**
	 * The video's URL.
	 *
	 * @since {{VERSION}}
	 *
	 * @var string
	 */
	public $video_url;

	/**
	 * RBPU_PopUp constructor.
	 *
	 * @@since {{VERSION}}
	 */
	public function __construct() {

		/**
		 * Pop up video URL.
		 *
		 * @since {{VERSION}}
		 */
		$this->video_url = apply_filters( 'rbpu_popup_video_url', get_option( 'rbpu_video_url' ) );

		if ( ! $this->video_url ) {
			return;
		}

		/**
		 * Pop up toggle.
		 *
		 * @since {{VERSION}}
		 */
		$toggle = apply_filters( 'rbpu_popup_toggle', get_option( 'rbpu_toggle', 'off' ) );

		if ( $toggle == 'off' ) {
			return;
		}

		// For now this has to be done differently. OUAHSE;OIFHASFfaser@#%@#%
		add_action( 'realbigmarketing_footer', array( $this, 'output' ) );
//		add_action( 'wp_footer', array( $this, 'output' ));
	}

	/**
	 * Outputs the pop up HTML.
	 *
	 * @since {{VERSION}}
	 */
	public function output() {

		/**
		 * Provides the filepath for the pop up HTML.
		 *
		 * @since {{VERSION}}
		 */
		$popup_template = apply_filters( 'rbpu_popup_template', ROADBLOCKPOPUP_DIR . 'includes/views/popup.php' );

		$popup_video_url = esc_url_raw( $this->video_url );

		if ( file_exists( $popup_template ) ) {
			include $popup_template;
		}
	}
}