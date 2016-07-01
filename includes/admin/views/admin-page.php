<?php
/**
 * Admin page.
 *
 * @since 0.1.0
 *
 * @var string $video_url
 * @var string $toggle
 *
 * @package RoadBlockPopUp
 * @subpackage RoadBlockPopUp/includes
 */

defined( 'ABSPATH' ) || die();
?>

<div class="wrap">
	<h2>Road Block Pop Up Settings</h2>

	<form action="options.php" method="post">

		<?php settings_fields( 'rbpu' ); ?>

		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="rbpu_toggle">
						Toggle On or Off
					</label>
				</th>

				<td>
					<input type="radio" name="rbpu_toggle" value="off" <?php checked( 'off', $toggle ); ?> /> Off<br/>
					<input type="radio" name="rbpu_toggle" value="on" <?php checked( 'on', $toggle ); ?> /> On
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="rbpu_video_url">
						Video URL
					</label>
				</th>

				<td>
					<input type="text" class="regular-text" id="rbpu_video_url" name="rbpu_video_url"
					       value="<?php echo esc_url_raw( $video_url ); ?>"/>
				</td>
			</tr>
		</table>

		<?php submit_button(); ?>
	</form>
</div>