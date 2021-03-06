<?php
/**
 * Media meta interface.
 *
 * Defines the interface that media metadata classes must use.
 *
 * @package   HybridCore
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2008 - 2021, Justin Tadlock
 * @link      https://themehybrid.com/hybrid-core
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Media\Meta\Contracts;

/**
 * Media meta interface.
 *
 * @since  1.0.0
 * @access public
 */
interface Meta {

	/**
	 * Returns the escaped and formatted media meta.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $key
	 * @return mixed
	 */
	public function get( $key );
}
