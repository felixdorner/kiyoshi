<?php
/**
 * Template functions used for posts.
 *
 * @package kiyoshi
 */

if ( ! function_exists( 'kiyoshi_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 * @since 1.0.0
	 */
	function kiyoshi_posts_pagination() {
		global $wp_query;

		$args = array(
			'type' 	    => 'list',
			'next_text' => _x( 'Next', 'Next post', 'kiyoshi' ) . '&nbsp;<span class="meta-nav">&rarr;</span>',
			'prev_text' => '<span class="meta-nav">&larr;</span>&nbsp' . _x( 'Previous', 'Previous post', 'kiyoshi' ),
			);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'kiyoshi_post_navigation' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 * @uses the_post_pagination()
	 * @since 1.0.0
	 */
	function kiyoshi_post_navigation() {
		$args = array(
			'next_text' => '%title &nbsp;<span class="meta-nav">&rarr;</span>',
			'prev_text' => '<span class="meta-nav">&larr;</span>&nbsp;%title',
			);
		the_post_navigation( $args );
	}
}
