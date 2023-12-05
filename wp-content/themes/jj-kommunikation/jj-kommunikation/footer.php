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
<div id="ribbon-section" class="widget-area">
	<?php dynamic_sidebar( 'ribbon' ); ?>
</div>
<div id="cta-section" class="widget-area">
			<div class="alignwide">
				<?php dynamic_sidebar( 'cta' ); ?>
			</div>
</div>
	<footer id="footer-section" class="widget-area">
		<div class="alignwide">
			<div class="site-info">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
				


			</div><!-- .site-info -->
				

			
		</div><!-- .alignwide -->
	</footer><!-- #footer-section -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
