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
 * @copyright Copyright (c) 2008 - 2024, Theme Hybrid
 * @license   https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Media\Meta;

use Hybrid\Core\ServiceProvider;
use Hybrid\Tools\Collection;

/**
 * Media meta provider class.
 */
class Provider extends ServiceProvider {

    /**
     * Registration callback that adds a single instance of the media meta
     * collection to the container.
     *
     * @return void
     */
    public function register() {

        $this->app->singleton( 'media/meta', static fn( $container ) => new Collection() );
    }

}
