<?php
/**
 * Media metadata functions.
 *
 * Helper functions and template tags related to media metadata.
 *
 * @package   HybridCore
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2008 - 2021, Justin Tadlock
 * @link      https://themehybrid.com/hybrid-core
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Hybrid\Media\Meta;

use Hybrid\Proxies\App;

/**
 * Prints media meta directly to the screen.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $property
 * @param  array   $args
 * @return void
 */
function display( $property, $args = [] ) {
	echo render( $property, $args );
}

/**
 * Returns media meta from a media meta object.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $property
 * @param  array   $args
 * @return string
 */
function render( $property, array $args = [] ) {

	$html = $label = '';

	$args = wp_parse_args( $args, [
		'post_id'     => get_the_ID(),
		'tag'         => 'span',
		'label'       => '',
		'text'        => '%s',
		'class'       => 'media-meta__item',
		'label_class' => 'media-meta__label',
		'data_class'  => 'media-meta__data',
		'before'      => '',
		'after'       => ''
	] );

	// Append formatted property to class name.
	if ( ! $args['class'] ) {

		$args['class'] = sprintf(
			'media-meta__item media-meta__item--',
			strtolower( str_replace( '_', '-', $property ) )
		);
	}

	// Get the media meta repository for this post.
	$meta_object = repo( $args['post_id'] );

	// Retrieve the meta value that we want from the repository.
	$meta = $meta_object->get( $property );

	if ( $meta ) {

		if ( $args['label'] ) {

			$label = sprintf(
				'<span class="%s">%s</span> ',
				esc_attr( $args['label_class'] ),
				$args['label']
			);
		}

		$data = sprintf(
			'<span class="%s">%s</span>',
			esc_attr( $args['data_class'] ),
			sprintf( $args['text'], $meta )
		);

		$html = sprintf(
			'<%1$s class="%2$s">%3$s</%1$s>',
			tag_escape( $args['tag'] ),
			esc_attr( $args['class'] ),
			$label . $data
		);

		$html = $args['before'] . $html . $args['after'];
	}

	return $html;
}

/**
 * Returns an instance of a media meta repository based on the attachment ID.
 *
 * @since  1.0.0
 * @access public
 * @param  int    $post_id
 * @return Meta
 */
function repo( $post_id ) {

	$repositories = App::resolve( 'media/meta' );

	if ( ! $repositories->has( $post_id ) ) {

		$repositories[ $post_id ] = new Meta( $post_id );
	}

	return $repositories[ $post_id ];
}
