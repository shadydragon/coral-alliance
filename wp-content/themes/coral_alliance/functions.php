<?php

/**
 * enqueue scripts and styles.
 */
function ca_script_init() {
    wp_enqueue_style( 'wp_info', get_stylesheet_uri() );
    wp_enqueue_style( 'main_stylesheet', get_template_directory_uri() . '/css/site.min.css' );
    wp_enqueue_script( 'main_scripts', get_template_directory_uri() . '/js/site.min.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'ca_script_init' );

