<?php
/**
 * Pop Up HTML.
 *
 * @since 0.1.0
 *
 * @var string $popup_video_url
 *
 * @package RoadBlockPopUp
 * @subpackage RoadBlockPopUp/includes
 */

defined( 'ABSPATH' ) || die();
?>

<div class="rbpu-popup">
	<div class="rbpu-popup-video-container">
		<img src="<?php echo ROADBLOCKPOPUP_URI; ?>/assets/images/popup-logo.png" class="rbpu-popup-logo" />

		<div class="rbpu-popup-video">
			<iframe src="<?php echo $popup_video_url; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>

		<p class="rbpu-popup-notice">
			<small>Hey kids, this is advertising.</small>
		</p>

		<div class="rbpu-popup-close" aria-label="Close Popup"></div>
	</div>
</div>