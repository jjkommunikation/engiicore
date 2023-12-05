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
	
	
	wp_enqueue_style( 'swiper-style', get_template_directory_uri() . '/css/swiper-bundle.min.css' );
	wp_enqueue_style( 'swiper-style2', get_template_directory_uri() . '/css/swiper-custom.css' );
	wp_enqueue_script( 'swiper-script', get_template_directory_uri() . '/js/swiper-bundle.min.js', 'jquery' );
	wp_enqueue_script( 'swiper-script2', get_template_directory_uri() . '/js/swiper-custom.js');


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


/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'gutenberg.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );



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
		
    ) );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );