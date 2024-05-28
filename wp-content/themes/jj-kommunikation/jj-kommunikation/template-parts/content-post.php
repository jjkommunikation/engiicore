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
			<div class="jj-content-archive">
				<header class="entry-header">
					<?php 
						if (isset($_GET["s"])) {
							echo "<a href='" . get_permalink() . "'><h2 class='entry-title'>" . get_the_title() . "</h2></a>";
						} else {
							echo the_title('<h2 class="entry-title">', '</h2>');
						}
					?>
				</header><!-- .entry-header -->
				<div class="jj-flex">
					<div class="jj-content-blocks">
						<?php
							the_excerpt();
						?>
					</div><!-- .jj-content-blocks -->
				</div><!-- .jj-flex -->
			</div>
		</div><!-- .alignwide -->
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->