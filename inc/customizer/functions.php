<?php
/**
 * kiyoshi Theme Customizer.
 *
 * @package kiyoshi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kiyoshi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';	
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kiyoshi_customize_preview_js() {
	wp_enqueue_script( 'kiyoshi_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
