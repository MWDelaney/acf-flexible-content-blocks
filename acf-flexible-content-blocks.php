<?php
/*
Plugin Name: ACF Flexible Content Blocks
Plugin URI:
Description: Adds flexible content blocks blow the_content();
Version: 1.0
Author: Michael W. Delaney
Author URI:
License: MIT
*/


/**
 * Define constants
 */

  if(!defined('ACFFCB_PLUGIN_DIR')) {
 		 define('ACFFCB_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
  }
  if(!defined('ACFFCB_PLUGIN_URL')) {
 		 define('ACFFCB_PLUGIN_URL', plugin_dir_url( __FILE__ ));
  }

	// Our default set of layouts is defined as a string which references a class so that we can filter it
	function fcb_layouts_class($s) {
		return 'MWD\ACFFCB\Layouts';
	}

add_action( 'plugins_loaded', function() {

	require_once(ACFFCB_PLUGIN_DIR . 'lib/class-init.php');
	require_once(ACFFCB_PLUGIN_DIR . 'lib/class-gamajo-template-loader.php');
	require_once(ACFFCB_PLUGIN_DIR . 'lib/class-acffcb-template-loader.php');
	require_once(ACFFCB_PLUGIN_DIR . 'lib/class-acffcb-fields.php');
	require_once(ACFFCB_PLUGIN_DIR . 'lib/class-acffcb-repeaters.php');
	require_once(ACFFCB_PLUGIN_DIR . 'lib/class-acffcb-flexible-content.php');
	require_once(ACFFCB_PLUGIN_DIR . 'lib/class-acffcb-layouts.php');
	require_once(ACFFCB_PLUGIN_DIR . 'lib/template-functions.php');

	class_alias('MWD\ACFFCB\CreateBlocks', 'ACFFlexibleContentBlocks');

	add_filter( 'fcb_get_layouts', 'fcb_layouts_class' );

} );

add_action('wp_loaded', function() {

		$acf_flexible_content_blocks = new MWD\ACFFCB\CreateBlocks();
		$acf_flexible_content_blocks->fcb_create_blocks();

		// Enable layouts

		// Append blocks to content
		add_filter( 'the_content', array( 'MWD\ACFFCB\CreateBlocks', 'acffcb_add_to_content' ) );

});
