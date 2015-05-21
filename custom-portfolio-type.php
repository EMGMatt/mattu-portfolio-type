<?php
/*
Plugin Name: Custom Portfolio Post Type
Plugin URI: http://matturenovich.me
Description: Custom Portfolio Post Type Plugin created for my Personal Portfolio Site
Version: 0.1
Author: Matt Urenovich
Author URI: http://matturenovich.me
License: GPLv2 (http://www.gnu.org/licenses/gpl-2.0.html)
*/

/* 
Version Requirement Check
Deactivates plugin automatically if WordPress Version is below 4.0
*/
register_activation_hook( __FILE__, 'mattu_version_check' );

function mattu_version_check() {
	if ( version_compare( get_bloginfo( 'version' ), '4.0', '<' ) ) {
		deactivate_plugins( basename( __FILE__ ) ); // Deactivate Our Plugin
	}
}

?>