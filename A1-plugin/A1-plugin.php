<?php
    /**
     * @package A1-plugin
     */
    /*
    Plugin Name: A1-plugin
    Plugin URI: https://31918.hosts1.ma-cloud.nl/Annemiek/
    Description: This is a plugin made by team A1
    Version: 1.1.0
    Author: team A1
    Author: URI: https://31918.hosts1.ma-cloud.nl/
    License: GPLv2 or later
    Text Domain: A1-plugin
    */

    if ( ! defined( 'ABSPATH' ) ) {
        die;
    }

    class A1_plugin {

        function __construct() {
            add_action( 'init', array( $this, 'custom_post_type' ) );
        }
        
        function activate() {
            $this->custom_post_type();
            flush_rewrite_rules();
        }

        function deactivate() {
            flush_rewrite_rules();
        }

        function uninstall() {

        }

        function custom_post_type() {
            register_post_type( 'ervaring', ['public' => true, 'label' => 'Ervaringen'] );
        }
    }

    if ( class_exists( 'A1_plugin' ) ){
        $a1plugin = new A1_plugin();
    }  

    // activeer
    register_activation_hook( __FILE__, array( $a1plugin , 'activate') );
    
    // deactiveer
    register_deactivation_hook( __FILE__, array( $a1plugin , 'deactivate') );

    //uninstall
    register_uninstall_hook( __FILE__, array( $a1plugin , 'uninstall') );
?>