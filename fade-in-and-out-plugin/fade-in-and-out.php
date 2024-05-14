<?php
/**
 * Plugin Name: Elementor Fade-In Sentences Widget
 * Description: Elementor widget to display fading sentences.
 * Version: 1.0
 * Author: Shi Hua Liu
 */

if (!defined('ABSPATH')) {
    exit;
}



function register_elementor_fade_in_sentences_widget() {
    require_once plugin_dir_path(__FILE__) . "widget.php";
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new elementor_fade_in_sentences_widget());
}

add_action('elementor/widgets/widgets_registered', 'register_elementor_fade_in_sentences_widget');
