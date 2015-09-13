<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kiyoshi
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'kiyoshi' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header><!-- .page-header -->

			<?php get_template_part( 'loop' ); ?>			

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
