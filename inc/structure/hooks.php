<?php
/**
 * kiyoshi hooks
 *
 * @package kiyoshi
 */

/**
 * General
 * @see kiyoshi_content_width()
 * @see kiyoshi_setup()
 * @see kiyoshi_widgets_init()
 * @see kiyoshi_scripts()
 */
add_action( 'after_setup_theme', 'kiyoshi_content_width', 0 );
add_action( 'after_setup_theme', 'kiyoshi_setup' );
add_action( 'widgets_init', 'kiyoshi_widgets_init' );
add_action( 'wp_enqueue_scripts', 'kiyoshi_scripts', 10 );

/**
 * Header
 * @see kiyoshi_skip_links()
 * @see kiyoshi_site_branding()
 * @see kiyoshi_primary_navigation()
 */
add_action( 'kiyoshi_before_header', 'kiyoshi_skip_links', 0 );
add_action( 'kiyoshi_header', 'kiyoshi_site_branding', 10 );
add_action( 'kiyoshi_header', 'kiyoshi_primary_navigation', 20 );

/**
 * Footer
 * @see kiyoshi_credit()
 */
add_action( 'kiyoshi_footer', 'kiyoshi_footer_branding', 10 );
add_action( 'kiyoshi_footer', 'kiyoshi_footer_widgets', 20 );
add_action( 'kiyoshi_footer', 'kiyoshi_credit', 30 );

/**
 * Posts
 * @see kiyoshi_post_header()
 * @see kiyoshi_post_content()
 * @see kiyoshi_paging_nav()
 * @see kiyoshi_post_nav()
 * @see kiyoshi_display_comments()
 */
add_action( 'kiyoshi_loop_post', 'kiyoshi_post_header',	10 );
add_action( 'kiyoshi_loop_after','kiyoshi_posts_pagination', 10 );
add_action( 'kiyoshi_single_post', 'kiyoshi_post_header', 10 );
add_action( 'kiyoshi_single_post', 'kiyoshi_post_content', 20 );
add_action( 'kiyoshi_single_post_after', 'kiyoshi_display_comments', 10 );
add_action( 'kiyoshi_single_post_after', 'kiyoshi_post_navigation', 20 );

/**
 * Pages
 * @see kiyoshi_page_header()
 * @see kiyoshi_page_content()
 * @see kiyoshi_display_comments()
 */
add_action( 'kiyoshi_page', 'kiyoshi_page_header', 10 );
add_action( 'kiyoshi_page', 'kiyoshi_page_content',	20 );
add_action( 'kiyoshi_page_after', 'kiyoshi_display_comments',	10 );

/**
 * Extras
 * @see kiyoshi_body_classes()
 */
add_filter( 'body_class', 'kiyoshi_body_classes' );