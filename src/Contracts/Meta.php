<?php
/**
 * Media meta interface.
 *
 * Defines the interface that media metadata classes must use.
 *
 * @package   HybridMediaMeta
 * @link      https://github.com/themehybrid/hybrid-media-meta
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Media\Meta\Contracts;

/**
 * Media meta interface.
 *
 * @since  1.0.0
 *
 * @access public
 */
interface Meta {

    /**
     * Returns the escaped and formatted media meta.
     *
     * @since  1.0.0
     * @param  string $key
     * @return mixed
     *
     * @access public
     */
    public function get( $key );

}
