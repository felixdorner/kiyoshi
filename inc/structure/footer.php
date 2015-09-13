<?php
/**
 * Template functions used for the site footer.
 *
 * @package kiyoshi
 */

if ( ! function_exists( 'kiyoshi_footer_branding' ) ) {
	/**
	 * Display the branding in footer
	 * @since  1.0.0	 
	 */
	function kiyoshi_footer_branding() {
		?>
		<div class="footer-branding">
			<h3 class="site-title--footer"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
			<?php if ( '' != get_bloginfo( 'description' ) ) { ?>
				<p class="site-description--footer"><?php bloginfo( 'description' ); ?></p>
			<?php } ?>		
		</div><!-- .footer-branding -->
		<?php
	}
}

if ( ! function_exists( 'kiyoshi_footer_widgets' ) ) {
	/**
	 * Display widgets in footer
	 * @since  1.0.0	 
	 */
	function kiyoshi_footer_widgets() {
		?>		
		<div class="footer-widgets">
			<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>	  
		  	<?php	dynamic_sidebar( 'footer-1' ); ?>
		  <?php } ?>
		</div><!-- .footer-widgets -->
		<?php
	}
}

if ( ! function_exists( 'kiyoshi_credit' ) ) {
	/**
	 * Display the theme credit
	 * @since  1.0.0	 
	 */
	function kiyoshi_credit() {
		?>		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kiyoshi' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kiyoshi' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'kiyoshi' ), 'Kiyoshi', '<a href="http://drnr.co" rel="designer">Felix Dorner</a>' ); ?>
		</div><!-- .site-info -->
		<?php
	}
}