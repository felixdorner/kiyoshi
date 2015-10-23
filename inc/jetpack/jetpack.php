<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package kiyoshi
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function kiyoshi_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',		
		'container' => 'main',
		'render'    => 'kiyoshi_infinite_scroll_render',
		'footer'    => 'page',
		'footer_widgets' => 'footer-1'
	) );
} // end function kiyoshi_jetpack_setup
add_action( 'after_setup_theme', 'kiyoshi_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function kiyoshi_infinite_scroll_render() {
	get_template_part( 'loop' );
} // end function kiyoshi_infinite_scroll_render
