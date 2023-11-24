<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JJ_Kommunikation
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	



	<div class="entry-content">
	<?php //jj_kommunikation_post_thumbnail(); ?>
		<div class="alignwide">
		<div class="jj-content">
		<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
			<div class="jj-block">
		<div class="jj-content-no-sidebar">

				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jj-kommunikation' ),
						'after'  => '</div>',
					)
				);
				?>
				</div><!-- .jj-content-blocks -->
								
				</div><!-- .jj-flex -->
		</div><!-- .alignwide -->
	</div><!-- .entry-content -->

	

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'jj-kommunikation' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
