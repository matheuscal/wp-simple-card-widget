<?php

function cc_enqueue_scripts(){
    wp_enqueue_media(); // Necessary to make wp.media() work in main.js
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'cc-js', plugins_url(). '/customcard/js/main.js', array('jquery'));
}

add_action('admin_enqueue_scripts', cc_enqueue_scripts);

function cc_enqueue_styles(){
    wp_enqueue_style( 'cc-style', plugins_url(). '/customcard/css/style.css', array(), '1.0.3');
}

add_action('wp_enqueue_scripts', cc_enqueue_styles);