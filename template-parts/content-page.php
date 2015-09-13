<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kiyoshi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * @hooked kiyoshi_page_header - 10
	 * @hooked kiyoshi_page_content - 20
	 */
	do_action( 'kiyoshi_page' );
	?>
</article><!-- #post-## -->
