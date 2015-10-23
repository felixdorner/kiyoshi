<?php
/**
 * Template functions used for the site header.
 *
 * @package kiyoshi
 */

if ( ! function_exists( 'kiyoshi_skip_links' ) ) {
	/**
	 * Skip links
	 * @since  1.0.0	 
	 */
	function kiyoshi_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kiyoshi' ); ?></a>		
		<?php
	}
}

if ( ! function_exists( 'kiyoshi_site_branding' ) ) {
	/**
	 * Display Site Branding
	 * @since  1.0.0	 
	 */
	function kiyoshi_site_branding() { 
		?>
		
		<div class="site-branding">
			<?php if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
				jetpack_the_site_logo();
			} else { ?>	
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php if ( '' != get_bloginfo( 'description' ) ) { ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php } ?>
			<?php } ?>
		</div><!-- .site-branding -->

	<?php
	}
}

if ( ! function_exists( 'kiyoshi_primary_nav_trigger' ) ) {
	/**
	 * Navigation Trigger
	 * @since  1.0.0	 
	 */
	function kiyoshi_primary_nav_trigger() {
		?>

		<a class="primary-nav-trigger" href="javascript:void(0)">
			<span class="menu-icon"></span>
		</a>

		<?php
	}
}

if ( ! function_exists( 'kiyoshi_primary_nav' ) ) {
	/**
	 * Primary Navigation
	 * @since  1.0.0	 
	 */
	function kiyoshi_primary_nav() {
		?>

		<div class="site-navigation-wrapper">

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<ul class="primary-nav">
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary', 
						'container' => '', 
						'items_wrap' => '%3$s' 
					) ); ?>	
				</ul>
			</nav><!-- #site-navigation -->		

		</div>

		<?php
	}
}
