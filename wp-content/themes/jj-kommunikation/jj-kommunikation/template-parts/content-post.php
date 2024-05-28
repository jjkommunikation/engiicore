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
		<?php
			// render searchable results in a list if any is found
			if ( isset($_GET["s"]) ) {
				?>
					<div class="alignwide">
						<div class="jj-content-archive search-archive-wrapper">
							<div class="search-item-entry">
								<header class="entry-header">
									<?php echo "<a href='" . get_permalink() . "'><h2 class='entry-title'>" . get_the_title() . "</h2></a>"; ?>
								</header> <!-- .entry-header -->
								<div class="jj-flex">
									<div class="jj-content-blocks">
										<div class="search-item-excerpt">
											<?php the_excerpt(); ?>
										</div>
										<?php echo '<a class="search-item-seemore" href="' . get_permalink() . '">Se her</a>' ?>
									</div> <!-- .jj-content-blocks -->
								</div> <!-- .jj-flex -->
							</div> <!-- .search-item-entry -->
						</div> <!-- .jj-content-archive -->
					</div> <!-- .alignwide -->
				<?php
			} else {
				?>
					<div class="alignwide">
						<div class="jj-content-archive">
							<header class="entry-header">
								<?php echo the_title('<h2 class="entry-title">', '</h2>'); ?>
							</header> <!-- .entry-header -->
							<div class="jj-flex">
								<div class="jj-content-blocks">
									<?php the_excerpt(); ?>
								</div> <!-- .jj-content-blocks -->
							</div> <!-- .jj-flex -->
						</div> <!-- .jj-content-archive -->
					</div> <!-- .alignwide -->
				<?php
			}
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->