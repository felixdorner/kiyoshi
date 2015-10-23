<?php
/**
 * Custom template tags for this theme.
 *
 * @package kiyoshi
 */

if ( ! function_exists( 'kiyoshi_post_thumbnail' ) ) {
	/**
	 * Get post thumbnail
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail()
	 * @param string $size
	 * @since 1.0.0
	 */
	function kiyoshi_post_thumbnail( $size ) {		
		the_post_thumbnail( $size, array( 'itemprop' => 'image' ) );		
	}
}

if ( ! function_exists( 'kiyoshi_featured_image' ) ) {
	/**
	 * Display the post thumbnail
	 * @since 1.0.0
	 */
	function kiyoshi_featured_image() {
		if ( has_post_thumbnail() ) : ?>
			<div class="featured-image">
				<?php if ( ! is_singular() ) : ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php kiyoshi_post_thumbnail( 'kiyoshi_thumb_large' ); ?></a>
				<?php else : ?>
					<?php kiyoshi_post_thumbnail( 'kiyoshi_thumb_large' ); ?>
				<?php endif; ?>			
			</div>
		<?php else : ?>
			<div class="featured-image--empty">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/placeholder.png'); ?>" alt="placeholder">
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'kiyoshi_sticky_post' ) ) {
	/**
	 * Show a label to a sticky post
	 * @since 1.0.0
	 */
	function kiyoshi_sticky_post() {
		if ( is_sticky() ) { ?>
		<span class="sticky-tag">
			<?php echo esc_html__( 'Featured', 'kiyoshi' ); ?>
		</span>
		<?php 
		} 
	}
}

if ( ! function_exists( 'kiyoshi_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 * @since 1.0.0
	 */
	function kiyoshi_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s" itemprop="datePublished">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( '%s', 'post date', 'kiyoshi' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo apply_filters( 'kiyoshi_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on );

	}
}

if ( ! function_exists( 'kiyoshi_entry_meta' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * @since 1.0.0
	 */
	function kiyoshi_entry_meta() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'kiyoshi' ) );
			if ( $categories_list && kiyoshi_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'kiyoshi' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'kiyoshi' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged with %1$s', 'kiyoshi' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'kiyoshi' ), esc_html__( '1 Comment', 'kiyoshi' ), esc_html__( '% Comments', 'kiyoshi' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'kiyoshi' ), '<span class="edit-link">', '</span>' );
	}
}
