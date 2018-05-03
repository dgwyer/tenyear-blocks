<?php

namespace Gutenberg_Courses\Example_Blocks;

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets' );
/**
 * Enqueue block editor only JavaScript and CSS.
 */
function enqueue_block_editor_assets()
{

    // Make paths variables so we don't write em twice ;)
    $blockPath = '/assets/js/editor.blocks.js';
    $editorStylePath = '/assets/css/blocks.editor.css';

    // Enqueue the bundled block JS file
    wp_enqueue_script(
        'jsforwp-blocks-js',
	    _get_plugin_url() . $blockPath,
        [ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components' ],
        filemtime( _get_plugin_directory() . $blockPath )
    );

    // Enqueue optional editor only styles
    wp_enqueue_style(
        'jsforwp-blocks-editor-css',
	    _get_plugin_url() . $editorStylePath,
        [ 'wp-blocks' ],
        filemtime( _get_plugin_directory() . $editorStylePath )
    );

}

add_action('enqueue_block_assets', __NAMESPACE__ . '\enqueue_assets');
/**
 * Enqueue front end and editor JavaScript and CSS.
 */
function enqueue_assets()
{
    // Make paths variables so we don't write em twice ;)
    $blockPath = '/assets/js/frontend.blocks.js';
    $stylePath = '/assets/css/blocks.style.css';

    if( !is_admin() ) {
        // Enqueue the bundled block JS file
        wp_enqueue_script(
            'jsforwp-blocks-frontend',
	        _get_plugin_url() . $blockPath,
            [],
            filemtime( _get_plugin_directory() . $blockPath )
        );
    }

    // Enqueue frontend and editor block styles
    wp_enqueue_style(
        'jsforwp-blocks',
	    _get_plugin_url() . $stylePath,
        [ 'wp-blocks' ],
        filemtime(_get_plugin_directory() . $stylePath )
    );

}
