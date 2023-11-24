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


	




	
		<div class="jj-content">

			<div class="jj-flex">
		<div class="jj-content-blocks">

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
				
				<?php get_sidebar(); ?>
				
				</div><!-- .jj-flex -->
	
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
