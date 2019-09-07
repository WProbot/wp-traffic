<?php
/**
 * Plugin assets handling.
 *
 * @package System
 * @author  Pierre Lannoy <https://pierre.lannoy.fr/>.
 * @since   1.0.0
 */

namespace Traffic\System;

/**
 * The class responsible to handle assets management.
 *
 * @package System
 * @author  Pierre Lannoy <https://pierre.lannoy.fr/>.
 * @since   1.0.0
 */
class Assets {


	/**
	 * Initializes the class and set its properties.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
	}

	/**
	 * Echoes DNS prefetch.
	 *
	 * @since 1.0.0
	 */
	public function prefetch() {
		if ( Option::get( 'use_cdn' ) && TRAFFIC_CDN_AVAILABLE ) {
			echo '<meta http-equiv="x-dns-prefetch-control" content="on">';
			echo '<link rel="dns-prefetch" href="//cdn.jsdelivr.net" />';
		}
	}

	/**
	 * Registers (but don't enqueues) a style asset of the plugin.
	 *
	 * Regarding user's option, asset is ready to enqueue from local plugin dir or from CDN (jsDelivr)
	 *
	 * @param  string      $handle Name of the stylesheet. Should be unique.
	 * @param  string|bool $src    Full path of the stylesheet, or path of the stylesheet relative to the WordPress root directory.
	 *                             If $src is set to false, stylesheet is an alias of other stylesheets it depends on.
	 * @param  string      $file   The style file name.
	 * @param  array       $deps   Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
	 * @param  string      $media  Optional. The media for which this stylesheet has been defined.
	 *                             Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
	 *                             '(orientation: portrait)' and '(max-width: 640px)'.
	 * @return bool Whether the style has been registered. True on success, false on failure.
	 * @since  1.0.0
	 */
	public function register_style( $handle, $src, $file, $deps = [], $media = 'all' ) {
		return wp_register_style( $handle, $src . $file, $deps, TRAFFIC_VERSION, $media );
	}

	/**
	 * Registers (but don't enqueues) a script asset of the plugin.
	 *
	 * Regarding user's option, asset is ready to enqueue from local plugin dir or from CDN (jsDelivr)
	 *
	 * @param  string      $handle Name of the script. Should be unique.
	 * @param  string|bool $src    Full path of the script, or path of the script relative to the WordPress root directory.
	 *                             If $src is set to false, script is an alias of other scripts it depends on.
	 * @param  string      $file   The style file name.
	 * @param  array       $deps   Optional. An array of registered script handles this script depends on. Default empty array.
	 * @return bool Whether the script has been registered. True on success, false on failure.
	 * @since  1.0.0
	 */
	public function register_script( $handle, $src, $file, $deps = [] ) {
		return wp_register_script( $handle, $src . $file, $deps, TRAFFIC_VERSION, Option::get( 'script_in_footer' ) );
	}

}
