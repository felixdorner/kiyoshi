<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kiyoshi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

	<?php
	/**
 	 * @hooked kiyoshi_post_header() - 10
	 */
	do_action( 'kiyoshi_loop_post' );
	?>

</article><!-- #post-## -->
