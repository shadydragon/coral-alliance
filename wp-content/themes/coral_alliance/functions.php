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

/**
 * Create custom image sizes
 */
function ca_theme_sizes() {
    add_image_size( 'hero-background', 1400, 960, true );
    add_image_size( 'cta-background', 1400, 800, true );
}
add_action( 'after_setup_theme', 'ca_theme_sizes' );

/**
 * Simplify background creation, optimise the images and prevent code duplication
 */
function createBackground($image_id, $size = '') {
	if ($image_id) {
		return " style=\"background-image: url('" . wp_get_attachment_image_src($image_id, $size)[0] . "');\"";
	}
	return '';
}
