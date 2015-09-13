<?php
/**
 * Template functions used for posts.
 *
 * @package kiyoshi
 */

if ( ! function_exists( 'kiyoshi_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 */
	function kiyoshi_post_header() { ?>
		<div class="row">		
			
			<?php 			
			/**				 
			 * @see kiyoshi_sticky_post()				 
			 */
			kiyoshi_sticky_post();

			/**				 
			 * @see kiyoshi_featured_image()				 
			 */
			kiyoshi_featured_image(); 
			?>

			<header class="entry-header">
				<?php			
				/**				 
				 * @see kiyoshi_posted_on()				 
				 */
				kiyoshi_posted_on();				

				if ( is_single() ) {
					the_title( '<h2 class="entry-title" itemprop="name headline"><u>', '</u></h2>' );				
				} else {				
					the_title( sprintf( '<h2 class="entry-title" itemprop="name headline"><a href="%s" rel="bookmark"><u>', esc_url( get_permalink() ) ), '</u></a></h2>' );
				}
					
				/**				 
				 * @see kiyoshi_entry_meta()				 
				 */
				kiyoshi_entry_meta();					
				?>
			</header><!-- .entry-header -->

		</div>
		<?php
	}
}

if ( ! function_exists( 'kiyoshi_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 * @since 1.0.0
	 */
	function kiyoshi_post_content() {
		?>
		<div class="entry-content" itemprop="articleBody">
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
