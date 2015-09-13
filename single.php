<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kiyoshi
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
			do_action( 'kiyoshi_single_post_before' );

			get_template_part( 'template-parts/content', 'single' );

			/**			 
			 * @hooked kiyoshi_display_comments - 10
			 * @hooked kiyoshi_post_navigation - 20
			 */
			do_action( 'kiyoshi_single_post_after' );
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
