<?php
/**
 * Override seed_setup()
 */
/* 
function fruit_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 200,
		'flex-width' => true,
		) );
}
add_action( 'after_setup_theme', 'fruit_setup', 11);
*/

/**
 * Enqueue scripts and styles.
 */
function fruit_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style('fruit', get_theme_file_uri('/css/style.css'), array(), $theme_version );
	wp_enqueue_script('fruit', get_theme_file_uri('/js/main.js'), array(),  $theme_version, true);
	
}
add_action( 'wp_enqueue_scripts', 'fruit_scripts' , 20 );