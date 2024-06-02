<?php
/**
 * @package A1-plugin
 */
/*
Plugin Name: A1-plugin
Plugin URI: https://31918.hosts1.ma-cloud.nl/Annemiek/
Description: This is a plugin made by team A1
Version: 1.1.3
Author: team A1
Author URI: https://31918.hosts1.ma-cloud.nl/
License: GPLv2 or later
Text Domain: A1-plugin
*/

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

class A1_plugin {

    public static function register() {
        add_action( 'admin_enqueue_scripts', array( 'A1_plugin', 'enqueue' ) );
        add_action( 'init', array( 'A1_plugin', 'custom_post_type' ) );
    }

    public static function custom_post_type() {
        register_post_type( 'ervaring', ['public' => true, 'label' => 'Ervaringen'] );
    }

    public static function enqueue() {
        wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__));
        wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__));
    }

    public static function activate() {
        // Ensure the custom post type is registered before flushing rewrite rules
        self::custom_post_type();
        flush_rewrite_rules();
    }

    public static function deactivate() {
        flush_rewrite_rules();
    }

}

if ( class_exists( 'A1_plugin' ) ){
    A1_plugin::register();
}  

// activeer
require_once plugin_dir_path( __FILE__ ) . 'inc/A1-plugin-activate.php';
register_activation_hook( __FILE__, array( 'A1_plugin_activate', 'activate') );

// deactiveer
require_once plugin_dir_path( __FILE__ ) . 'inc/A1-plugin-deactivate.php';
register_deactivation_hook( __FILE__, array( 'A1_plugin_deactivate', 'deactivate') );

// uninstall
register_uninstall_hook( __FILE__, array( 'A1_plugin', 'uninstall') );
?>
