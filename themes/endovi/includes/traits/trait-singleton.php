<?php

namespace endoviTheme\Traits;

trait Singleton {
	private static $instance = null;

	/**
	 * Get or create the instance of the class
	 *
	 * @return static
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new static();
		}

		return self::$instance;
	}
}
