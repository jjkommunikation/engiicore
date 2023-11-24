<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package JJ_Kommunikation
 */

get_header();
?>

	<main id="primary" class="site-main alignwide">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Hov! Siden findes ikke.', 'jj-kommunikation' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content ">
				<p><?php esc_html_e( 'Det ser ud til, at indholdet ikke eksisterer eller er blevet flyttet.
', 'jj-kommunikation' ); ?></p>

<a href="/">Gå til forsiden</a>


					<div style="height:450px"></div>





			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
