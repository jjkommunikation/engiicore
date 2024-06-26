<?php
/**
 * JJ Kommunikation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package JJ_Kommunikation
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.2.1' );
}

if ( ! function_exists( 'jj_kommunikation_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jj_kommunikation_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on JJ Kommunikation, use a find and replace
		 * to change 'jj-kommunikation' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jj-kommunikation', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Header', 'jj-kommunikation' ),
				'menu-2' => esc_html__( 'Header 2', 'jj-kommunikation' ),
				'menu-3' => esc_html__( 'Footer', 'jj-kommunikation' ),
				'menu-4' => esc_html__( 'Footer 2', 'jj-kommunikation' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'jj_kommunikation_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'jj_kommunikation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jj_kommunikation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jj_kommunikation_content_width', 640 );
}
add_action( 'after_setup_theme', 'jj_kommunikation_content_width', 0 );









function display_slideshow($atts) {
	


	 $atts = shortcode_atts( array(
        'slides' => '966, 967, 968'
    ), $atts );

  //If post is multiple: 8,9,3
  $postID = explode(',' , $atts['slides']);
	
	$args_slide = array(
			'post_type' => 'slideshow',
			'post_status' => 'publish',
			'post__in' => $postID,
			'posts_per_page' => 3
	); 

	$slideshow_string = '';
	$query = new WP_Query( $args_slide );
	if( $query->have_posts() ) {
		$slideshow_string .= '<div class="swiper boxSwiper alignwide"><div class="swiper-wrapper">';
		while( $query->have_posts() ) {

			$query->the_post();
			$image = get_field('billede');
			$title = get_the_title();
			$text = get_field('teaser');
			$link = get_field('link');
			$slideshow_string .= '<div class="swiper-slide"><a style="display: block;" href="'. $link .'"><img style="width:100%" src="'. $image .'" ><div class="teaser"><h2 class="teaser_heading">' . $title . '</h2><span class="teaser_text">' . $text . '</span></div></a></div>';
		}

		$slideshow_string .= '</div></div>';

		wp_reset_postdata();

	}
	
	
	
	

	return $slideshow_string;

	

}




add_shortcode( 'slideshow', 'display_slideshow' );












/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jj_kommunikation_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'jj-kommunikation' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'jj-kommunikation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	// registers top feature section
	register_sidebar(
		array(
			'name'          => esc_html__( 'Features_top', 'jj-kommunikation' ),
			'id'            => 'features',
			'description'   => esc_html__( 'Add widgets here.', 'jj-kommunikation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Features bottom', 'jj-kommunikation' ),
			'id'            => 'ribbon',
			'description'   => esc_html__( 'Add widgets here.', 'jj-kommunikation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'CTA bottom', 'jj-kommunikation' ),
			'id'            => 'cta',
			'description'   => esc_html__( 'Add widgets here.', 'jj-kommunikation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'jj-kommunikation' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'jj-kommunikation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'jj_kommunikation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jj_kommunikation_scripts() {
	wp_enqueue_style( 'jj-kommunikation-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'jj-kommunikation-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jj-kommunikation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jj-kommunikation-customizer', get_template_directory_uri() . '/js/customizer.js', array(), _S_VERSION, true );

	// Pass the AJAX URL to the script
    wp_localize_script('jj-kommunikation-customizer', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	wp_enqueue_script('jj-kommunikation-lottie', get_template_directory_uri() . '/js/lottie.js', array('jquery'));

	wp_enqueue_style( 'swiper-style', get_template_directory_uri() . '/css/swiper-bundle.min.css' );
	wp_enqueue_style( 'swiper-style2', get_template_directory_uri() . '/css/swiper-custom.css' );
	wp_enqueue_script( 'swiper-script', get_template_directory_uri() . '/js/swiper-bundle.min.js', 'jquery' );
	wp_enqueue_script( 'swiper-script2', get_template_directory_uri() . '/js/swiper-custom.js');
	wp_enqueue_script( 'jj-kommunikation-search', get_template_directory_uri() . '/js/search.js', array('jquery'));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jj_kommunikation_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//equire get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
/*if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
*/

add_theme_support( 'align-wide' );
add_theme_support( 'align-small' );


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//Remove "Category:", "Tag:", "Author:" from the_archive_title
add_filter( 'get_the_archive_title', function ($title) {    
	if ( is_category() ) {    
			$title = single_cat_title( '', false );    
		} elseif ( is_tag() ) {    
			$title = single_tag_title( '', false );    
		} elseif ( is_author() ) {    
			$title = '<span class="vcard">' . get_the_author() . '</span>' ;    
		} elseif ( is_tax() ) { //for custom post types
			$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
		} elseif (is_post_type_archive()) {
			$title = post_type_archive_title( '', false );
		}
	return $title;    
});





function widget_style_dashboard() {
  echo '<style>
  .blocks-widgets-container .editor-styles-wrapper {
    max-width: 100% !important;
}
.wp-block[data-type="core/widget-area"] {
    max-width: 98% !important;
}
  </style>';
}

add_action('admin_head', 'widget_style_dashboard');



/**
 * Displaying acf fields for menu items
 */

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
    
    // loop
    foreach( $items as &$item ) {
        
        // vars
		//$label = get_field('mega_menu_sub_label', $item);
        $icon = get_field('mega_menu_icon', $item);
		$color = get_field('ribbon_background_color', $item);
        
        
        // append icon
        if( $icon ) {
            $item->title .= '<img src="'.$icon.'" class="menu-icon" height="30" width="30">';
            $item->title .= '<label class="sub-label">'.$item->description.'</label>';
			$item->title .= '<span class="ribbon-background-color" style="background-color:'.$color.'"></span>';
        }
        
    }
    
    
    // return
    return $items;
    
}



function mytheme_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_attr__( 'Engii Green', 'jj-kommunikation' ),
			'slug'  => 'Engii_Green',
			'color' => '#3ABF47',
		),
		array(
			'name'  => esc_attr__( 'Engii Light Green', 'jj-kommunikation' ),
			'slug'  => 'Engii_Light_Green',
			'color' => '#60BF69',
		),
		array(
			'name'  => esc_attr__( 'Engii Blue', 'jj-kommunikation' ),
			'slug'  => 'Engii_Blue',
			'color' => '#16324A',
		),
		array(
			'name'  => esc_attr__( 'Engii Orange', 'jj-kommunikation' ),
			'slug'  => 'Engii_Orange',
			'color' => '#E99838',
		),
		array(
			'name'  => esc_attr__( 'Engii Yellow', 'jj-kommunikation' ),
			'slug'  => 'Engii_Yellow',
			'color' => '#E2BC5D',
		),
		array(
			'name'  => esc_attr__( 'Engii Petrol', 'jj-kommunikation' ),
			'slug'  => 'Engii_Petrol',
			'color' => '#316363',
		),
		array(
			'name'  => esc_attr__( 'Engii Blue Sky', 'jj-kommunikation' ),
			'slug'  => 'Engii_Blue_Sky',
			'color' => '#74BECC',
		),
		array(
			'name'  => esc_attr__( 'Engii Purple', 'jj-kommunikation' ),
			'slug'  => 'Engii_Purple',
			'color' => '#3868B5',
		),
		array(
			'name'  => esc_attr__( 'Engii Navy', 'jj-kommunikation' ),
			'slug'  => 'Engii_Navy',
			'color' => '#295275',
		),
		array(
			'name'  => esc_attr__( 'Engii Purple', 'jj-kommunikation' ),
			'slug'  => 'Engii_Purple',
			'color' => '#8B54B2',
		),
		array(
			'name'  => esc_attr__( 'Engii Rose', 'jj-kommunikation' ),
			'slug'  => 'Engii_Rose',
			'color' => '#DCB7EA',
		),
		array(
			'name'  => esc_attr__( 'Engii Pink', 'jj-kommunikation' ),
			'slug'  => 'Engii_Pink',
			'color' => '#FD90D9',
		),
		array(
			'name'  => esc_attr__( 'Engii Indian Red', 'jj-kommunikation' ),
			'slug'  => 'Engii_Indian_Red',
			'color' => '#E16169',
		),
		array(
			'name'  => esc_attr__( 'Engii Salmon', 'jj-kommunikation' ),
			'slug'  => 'Engii_Salmon',
			'color' => '#FD876B',
		),
		array(
			'name'  => esc_attr__( 'Engii Butterscotch', 'jj-kommunikation' ),
			'slug'  => 'Engii_Butterscotch',
			'color' => '#E99838',
		),
		array(
			'name'  => esc_attr__( 'Engii Text', 'jj-kommunikation' ),
			'slug'  => 'Engii_Text',
			'color' => '#2E2E2E',
		),
		array(
			'name'  => esc_attr__( 'Engii Footer', 'jj-kommunikation' ),
			'slug'  => 'Engii_Footer',
			'color' => '#0D1D2C',
		),
		array(
			'name'  => esc_attr__( 'Engii Footer Light Blue', 'jj-kommunikation' ),
			'slug'  => 'Blue_soft',
			'color' => '#F1F9FF',
		),
		
    ) );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );


/**
 * Registers an editor stylesheet for the theme.
 */

function add_editor_styles() {
	add_theme_support( 'editor-styles' );
    add_editor_style( 'gutenberg.css' );
}
add_action( 'after_setup_theme', 'add_editor_styles' );


function cc_mime_types($mimes) {
    $mimes['json'] = 'application/json';
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/*filter*/

function ajax_category_filter_shortcode() {
    $categories = get_categories();

    // Start output buffering
    ob_start(); ?>

    <div id="category-filters">
<div class="inputwrap">
	<input type="radio" class="category-filter" name="category-filter" value="0" id="cat-0" checked="checked" />
            <label for="cat-0">Alle</label></div>
		
        <?php foreach ( $categories as $category ) : ?>
			<div class="inputwrap">
            <input type="radio" class="category-filter" name="category-filter" value="<?php echo $category->term_id; ?>" id="cat-<?php echo $category->term_id; ?>" />
            <label for="cat-<?php echo $category->term_id; ?>"><?php echo $category->name; ?></label>
			</div>
        <?php endforeach; ?>
    </div>
	<div class="category-posts-wrapper" style="min-height: 475px;">
		<div id="category-posts"></div>
	</div>

	<script>
		jQuery(document).ready(function($) {
			function fetchPosts(category_ids){
				$.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					type: 'post',
					data: { action: 'filter_posts', category_ids: category_ids },
					success: function( result ) {
						$('#category-posts').html( result );
						// trigger fade in animation
						$('#category-posts > .post-grid')
						.removeClass('engiicore-animate-news-ticker-out')
						.addClass('engiicore-animate-news-ticker')
					}
				})
			}

			$('.category-filter').on('change', function() {
				var category_ids = [];
				$('.category-filter:checked').each(function(){
					category_ids.push($(this).val());
				});
				$('#category-posts > .post-grid')
					.removeClass('engiicore-animate-news-ticker')
					.addClass('engiicore-animate-news-ticker-out')

					fetchPosts(category_ids);
			});	
		});
	</script>

    <?php
    // Return output buffer content
    return ob_get_clean();
}
add_shortcode('ajax_category_filter', 'ajax_category_filter_shortcode');

function filter_posts_by_category() {
    $category_ids = $_POST['category_ids'];
    $paged = isset($_POST['page']) ? $_POST['page'] : 1;

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 16, // Set your desired posts per page
        'paged' => $paged,
        //'category__in' => $category_ids
    );
	 // If '0' is the only value in category_ids, fetch posts from all categories
	 if (!(count($category_ids) == 1 && in_array(0, $category_ids))) {
        $args['category__in'] = $category_ids;
    }
    $query = new WP_Query($args);
	
    if ($query->have_posts()) {
		echo '<div class="post-grid engiicore-animate-news-ticker">';
        while ($query->have_posts()) {
            $query->the_post();
            // Output the title and excerpt of each post
			echo '<div class="post-item"><div class="post-image"><a href="' . get_permalink() . '">'. get_the_post_thumbnail() .'</a></div><div class="post-content"><div class="post-cats">';

			foreach (get_the_terms(get_the_ID(), 'category') as $cat) {
				 echo '<span class="cat-title">' . $cat->name . '</span>';
			 }

           echo '</div><h2 class="post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2></div></div>';
        }
		echo '</div>'; // .post-grid

        // Pagination
        $pagination = paginate_links(array(
            'total' => $query->max_num_pages,
            'current' => $paged,
            'type' => 'plain',
            'add_args' => array(
                'action' => 'filter_posts', // Add the action to the arguments
                'category_ids' => json_encode($category_ids)
            ),
        ));

        // Wrap the pagination links in a div
        if ($pagination) {
            echo '<div class="pagination-wrapper">' . $pagination . '</div>';
        }
    } else {
        echo 'No posts found.';
    }
	
    wp_die();
}


add_action('wp_ajax_filter_posts', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_by_category');


if ( ! function_exists('engiicore_render_feature_card_menu') ) {
	function engiicore_render_feature_card_menu($attr) {
		ob_start();
		dynamic_sidebar('features_top');
		$features_top = ob_get_clean();
		$html = '<div class="feature-card-menu" style="max-width: var(--grid); margin: auto;">';
		$html .= $features_top;
		$html .= '</div>';
		return $html;
	}
}

add_shortcode('engiicore-feature-card-menu', 'engiicore_render_feature_card_menu');