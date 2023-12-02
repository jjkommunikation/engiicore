<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JJ_Kommunikation
 */

?>
<div class="ribbon-banner">
<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div>
<div class="cta-area">
<?php dynamic_sidebar( 'sidebar-4' ); ?>
</div>
	<footer id="colophon" class="site-footer">
		<div class="alignwide">
			<div class="site-info">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
				


			</div><!-- .site-info -->
				

			
		</div><!-- .alignwide -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
