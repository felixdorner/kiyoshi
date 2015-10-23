<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kiyoshi
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php kiyoshi_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<?php
	/**
	 * @hooked kiyoshi_skip_links - 0
	 */
	do_action( 'kiyoshi_header_before' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<?php
		/**
		 * @hooked kiyoshi_site_branding - 10			 
		 * @hooked kiyoshi_primary_nav_trigger - 20			 
		 */
		do_action( 'kiyoshi_header' ); ?>
	</header><!-- #masthead -->

	<?php
	/**
	 * @hooked kiyoshi_primary_nav - 10			 
	 */
	do_action( 'kiyoshi_header_after' ); ?>

	<div id="content" class="site-content">
