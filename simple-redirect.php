<?php
/**
 * @package Simple 301Redirect
 */
/*
Plugin Name: Simple 301Redirect
Plugin URI: http://ekkachai.net/Simple301Redirect
Description: Simple 301Redirect is a 301 HTTP redirect plugin that allows user to redirect their old urls to new urls permanently. There is import/export to CSV.
Version: 1.0
Author: Ekkachai Danwanichakul
Author URI: http://ekkachai.net
License: GPLv2 or later
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) 
{
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}

class Simple_301Redirect{

	/**
	 * Sets up simple 301Redirect
	 *
	 * @since 1.0
	 * @uses add_action
	 * @return object
	 */
	public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'install' ) );
		add_action( 'init', array($this, 'action_init') );
	}

	/**
	 * Create DB Schema for url redirect.
	 *
	 * @since 1.0
	 * @return object
	 */
	static function install() {
     	global $wpdb;
		$table_name = $wpdb->prefix . 'simple_301redirect';
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
		{
			$q = "CREATE TABLE `$table_name` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `old_url` varchar(256) NOT NULL,
					  `new_url` varchar(256) NOT NULL,
					  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
					  PRIMARY KEY (`id`)
					)";
			$wpdb->query( $q );
		}	
    }


	/**
	 * This is where everything kick off!
	 *
	 * @since 1.0.0
	 * @uses 
	 * @return 
	 */
	public function action_init() {


	}
	
}
