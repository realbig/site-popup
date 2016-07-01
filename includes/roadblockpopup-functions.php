<?php
/**
 * Basic, global functions.
 *
 * @since 0.1.0
 *
 * @package RoadBlockPopUp
 * @subpackage RoadBlockPopUp/includes
 */

defined( 'ABSPATH' ) || die();

/**
 * Gets the main class object.
 *
 * Used to instantiate the plugin class for the first time and then used subsequent times to return the existing object.
 *
 * @since 0.1.0
 *
 * @return RoadBlockPopUp
 */
function RoadBlockPopUp() {
	return RoadBlockPopUp::instance();
}