<?php

/*
Plugin Name: Custom Cards
Description: A simple card plugin made to have 2 buttons at the bottom of it. Uses Jquery.
Version: 1.0.3
Author: Lancelot Du Lac
*/

// Disallow direct access
if (!defined('ABSPATH')){
    exit;
}

// Load styles
require_once(plugin_dir_path( __FILE__ ).'includes/customcard-scripts.php');

// Load class
require_once(plugin_dir_path( __FILE__ ) . 'includes/customcard-class.php');

function register_customcards(){
    register_widget( 'Custom_Card_Widget');
}

add_action( 'widgets_init', 'register_customcards');