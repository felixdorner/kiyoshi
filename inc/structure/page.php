<?php
/**
 * Template functions used for posts.
 *
 * @package kiyoshi
 */

if ( ! function_exists( 'kiyoshi_page_header' ) ) {
	/**
	 * Display the page header
	 * @since 1.0.0
	 */
	function kiyoshi_page_header() { ?>
		<div class="row">
			<?php 
			/**				 
			 * @see kiyoshi_featured_image()				 
			 */
			kiyoshi_featured_image(); ?>
			<header class="entry-header">
				<?php		
				the_title( '<h2 class="entry-title" itemprop="name"><u>', '</u></h2>' );			
				?>
			</header><!-- .entry-header -->
		</div>
		<?php
	}
}

if ( ! function_exists( 'kiyoshi_page_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 * @since 1.0.0
	 */
	function kiyoshi_page_content() {
		?>
		<div class="entry-content" itemprop="mainContentOfPage">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kiyoshi' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kiyoshi' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}