<?php
/**
 * Media meta service provider.
 *
 * This is the service provider for the media meta system, which binds an
 * empty collection to the container that can later be used to store media meta.
 *
 * @package   HybridMediaMeta
 * @link      https://github.com/themehybrid/hybrid-media-meta
 *
 * @author    Theme Hybrid
 * @copyright Copyright (c) 2008 - 2023, Theme Hybrid
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Media\Meta;

use Hybrid\Core\ServiceProvider;
use Hybrid\Tools\Collection;

/**
 * Media meta provider class.
 *
 * @since  1.0.0
 *
 * @access public
 */
class Provider extends ServiceProvider {

    /**
     * Registration callback that adds a single instance of the media meta
     * collection to the container.
     *
     * @since  1.0.0
     * @return void
     *
     * @access public
     */
    public function register() {

        $this->app->singleton( 'media/meta', static fn( $container ) => new Collection() );
    }

}
