<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JJ_Kommunikation
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php 
		
			// show heading for search results if search paramter is set
			if ( isset($_GET["s"]) ) {
				?>
					<div class="entry-heading">
						<!-- wp:cover {"url":"https://engiicore-staging.jjkommunikation.aze.dk/wp-content/uploads/Baggrund_udenbrandmark-greennoiseglow.jpg","id":950,"dimRatio":0,"focalPoint":{"x":0.47,"y":0},"minHeight":300,"contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"className":"engiicore-animate-fade-in-one","layout":{"type":"constrained"}} -->
						<div class="wp-block-cover alignfull engiicore-animate-fade-in-one" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);min-height:300px" id="hero"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-950" alt="" src="https://engiicore-staging.jjkommunikation.aze.dk/wp-content/uploads/Baggrund_udenbrandmark-greennoiseglow.jpg" style="object-position:47% 0%" data-object-fit="cover" data-object-position="47% 0%"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"align":"wide"} -->
						<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"672px"} -->
						<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:672px"><!-- wp:heading {"textAlign":"left","level":1,"style":{"color":{"text":"#ffffff"},"elements":{"link":{"color":{"text":"#ffffff"}}}},"className":"engiicore-animate-slide-right-two"} -->
						<h1 class="wp-block-heading has-text-align-left engiicore-animate-slide-right-two has-text-color has-link-color" style="color:#ffffff"><strong><strong>EngiiCore søge resultater</strong></strong></h1>
						<!-- /wp:heading -->
						<!-- /wp:column -->

						<!-- wp:column {"verticalAlignment":"center"} -->
						<div class="wp-block-column is-vertically-aligned-center"></div>
						<!-- /wp:column --></div>
						<!-- /wp:columns --></div></div>
						<!-- /wp:cover -->
					</div>
			</div>
				<?php
			}
		
		?>
	
	<div class="entry-content <?php if(isset($_GET["s"])) { echo "is-search-content"; } ?>">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			echo '<div class="archive-wrapper">';
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				
				get_template_part( 'template-parts/content', 'post' );
				

			endwhile;
			echo '</div>';

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div><!-- .entry-content -->
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
