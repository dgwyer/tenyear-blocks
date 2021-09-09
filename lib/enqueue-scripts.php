<?php

namespace Gutenberg_Courses\Example_Blocks;

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets' );
/**
 * Enqueue block editor only JavaScript and CSS.
 */
function enqueue_block_editor_assets() {
	// Make paths variables so we don't write em twice ;)
	$block_path = '/assets/js/editor.blocks.js';
	$style_path = '/assets/css/blocks.editor.css';

	// Enqueue the bundled block JS file.
	wp_enqueue_script(
		'jsforwp-blocks-js',
		_get_plugin_url() . $block_path,
		[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' ],
		filemtime( _get_plugin_directory() . $block_path )
	);

  $js_data = array(
		'image_url' => _get_plugin_url() . '/assets/images/tenyear-phone-illustration.png',
	);

	wp_add_inline_script(
		'jsforwp-blocks-js',
		'var jsData = ' . wp_json_encode( $js_data ),
		'before'
	);

	// wp_localize_script(
	// 	'jsforwp-blocks-js',
	// 	'js_data',
	// 	array(
	// 		'my_image_url' => ( _get_plugin_url() . '/assets/images/BACK.png' ),
	// 	)
	// );

	// Enqueue optional editor only styles.
	wp_enqueue_style(
		'jsforwp-blocks-editor-css',
		_get_plugin_url() . $style_path,
		[],
		filemtime( _get_plugin_directory() . $style_path )
	);
}

add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue front end and editor JavaScript and CSS assets.
 */
function enqueue_assets() {
	$style_path = '/assets/css/blocks.style.css';
	wp_enqueue_style(
		'jsforwp-blocks',
		_get_plugin_url() . $style_path,
		null,
		filemtime( _get_plugin_directory() . $style_path )
	);
}

add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_frontend_assets' );
/**
 * Enqueue frontend JavaScript and CSS assets.
 */
function enqueue_frontend_assets() {

	// If in the backend, bail out.
	if ( is_admin() ) {
		return;
	}

	$block_path = '/assets/js/frontend.blocks.js';
	wp_enqueue_script(
		'jsforwp-blocks-frontend',
		_get_plugin_url() . $block_path,
		[],
		filemtime( _get_plugin_directory() . $block_path )
	);

	// $js_data = array(
	// 	'image_url' => _get_plugin_url() . '/assets/images/tenyear-phone-illustration.png',
	// );

	// wp_add_inline_script(
	// 	'jsforwp-blocks-frontend',
	// 	'var jsData = ' . wp_json_encode( $js_data ),
	// 	'before'
	// );
}
