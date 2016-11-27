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
 * Add custom styles to the editor
 */
function ca_add_editor_styles() {
    add_editor_style( 'css/editor.min.css' );
}
add_action( 'init', 'ca_add_editor_styles' );

/**
 * Create custom image sizes
 */
function ca_theme_sizes() {
    add_image_size( 'hero-background', 1400, 960, true );
    add_image_size( 'cta-background', 1400, 800, true );
}
add_action( 'after_setup_theme', 'ca_theme_sizes' );

/**
 * Allow the user to select custom classes
 */
function ca_mce_style_select($buttons) {
	array_unshift($buttons, 'styleselect');
 	return $buttons;
}
add_filter('mce_buttons_2', 'ca_mce_style_select');

/*
* Add the new styles to the menu we just created
*/
function ca_init_formats( $init_array ) {
	$style_formats = array(

		array(
			'title' => 'Block Link',
			'selector' => 'a',
			'classes' => 'cta-button'

		),
	);
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
add_filter( 'tiny_mce_before_init', 'ca_init_formats' );

/**
 * Simplify background creation, optimise the images and prevent code duplication
 */
function createBackground($image_id, $size = '') {
	if ($image_id) {
		return " style=\"background-image: url('" . wp_get_attachment_image_src($image_id, $size)[0] . "');\"";
	}
	return '';
}
