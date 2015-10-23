<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kiyoshi
 */

?>

	</div><!-- #content -->

	<?php do_action( 'kiyoshi_footer_before' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php
		/**
		 * @hooked kiyoshi_footer_branding - 10
		 * @hooked kiyoshi_footer_widgets - 20
		 * @hooked kiyoshi_credit - 30
		 */
		do_action( 'kiyoshi_footer' ); ?>

	</footer><!-- #colophon -->

	<?php do_action( 'kiyoshi_footer_after' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
