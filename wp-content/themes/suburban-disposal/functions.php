<?php
/**
 * Suburban Disposal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Suburban_Disposal
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

include('svg-icons.php');


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function suburban_disposal_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Suburban Disposal, use a find and replace
		* to change 'suburban-disposal' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'suburban-disposal', get_template_directory() . '/languages' );

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

	/** Register nav menus */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary menu', 'suburban-disposal' ),
			'footer'  => esc_html__( 'Secondary menu', 'suburban-disposal' ),
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
			'suburban_disposal_custom_background_args',
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
add_action( 'after_setup_theme', 'suburban_disposal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function suburban_disposal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'suburban_disposal_content_width', 640 );
}
add_action( 'after_setup_theme', 'suburban_disposal_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function suburban_disposal_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'suburban-disposal' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'suburban-disposal' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'suburban_disposal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function suburban_disposal_scripts() {
	wp_enqueue_style( 'suburban-disposal-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'suburban-disposal-style', 'rtl', 'replace' );

	/** Enqueue default jquery library */
	//wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'suburban-disposal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-main', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick-main', get_template_directory_uri() . '/assets/js/slick-1.8.1.min.js?v=1.8.1', array(), _S_VERSION, true );
	wp_enqueue_script( 'device-menu', get_template_directory_uri() . '/assets/js/device-menu.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-matchheight', get_template_directory_uri() . '/assets/js/jquery.matchheight.min.js', array(), _S_VERSION, true );

	/** Enqueue main script file. */
	wp_enqueue_script( 'main-script', get_theme_file_uri() .'/assets/js/scripts.js', array(), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'suburban_disposal_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// // Block Patterns.
// require get_template_directory() . '/inc/block-patterns.php';



function my_theme_register_cpts() {
			/**
		 * Post Type: Testimonials.
		 */
		$labels = [
			"name" => __( "Testimonials", "Suburban_Disposal" ),
			"singular_name" => __( "Testimonial", "Suburban_Disposal" ),
		];
		$args = [
			"label" => __( "Testimonials", "Suburban_Disposal" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => false,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_admin_bar" => false,
			"show_in_nav_menus" => false,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => [ "slug" => "testimonial", "with_front" => true ],
			"query_var" => false,
			"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
			"show_in_graphql" => false,
			"menu_icon" => 'dashicons-format-quote',
		];
		register_post_type( "testimonial", $args );

}
add_action( 'init', 'my_theme_register_cpts' );


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** ACF option */
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> __('Theme General Options', 'Suburban_Disposal'),
		'menu_title'	=> __('Theme options', 'Suburban_Disposal'),
		'menu_slug' 	=> 'theme-general-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Header Options', 'Suburban_Disposal'),
		'menu_title'	=> __('Header', 'Suburban_Disposal'),
		'parent_slug'	=> __('theme-general-options', 'Suburban_Disposal'),
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Footer Options', 'Suburban_Disposal'),
		'menu_title'	=> __('Footer', 'Suburban_Disposal'),
		'parent_slug'	=> 'theme-general-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Theme Social Options', 'Suburban_Disposal'),
		'menu_title'	=> __('Social', 'Suburban_Disposal'),
		'parent_slug'	=> 'theme-general-options',
	));
}

/** Main navigation function */
function main_navigation() {
	ob_start();
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container' => false,
			'items_wrap' => '<ul role="navigation" class="%2$s" id="%1$s">%3$s</ul>',
		)
	);
	return ob_get_clean();
}



/** Wp_image function */
function wp_image( $imgid = '', $size = '', $classes = '', $imageext = '' ) {
	ob_start();
	if ( $imgid ) :
		$imagealttext = '';
		$webpurl    = wp_get_attachment_image_url( $imgid, $size ) .'.webp';
		$uploadfile = parse_url( $webpurl );
		$fileurl    = $_SERVER['DOCUMENT_ROOT'] . $uploadfile['path'];
		$pathinfo   = pathinfo( wp_get_attachment_image_url( $imgid, $size ) );
		$imageext   = $pathinfo['extension'];
		$imagealt   = get_post_meta( $imgid, '_wp_attachment_image_alt', true );
		if ( $imagealt ) :
			$imagealttext = $imagealt;
		else :
			$imagealttext = get_the_title( get_the_ID() );
		endif;
		echo '<picture>'.
			(
				file_exists( $fileurl )
				? (
					( $size == 'full' )
					? '<source type="image/webp" media="(min-width:1200px)" srcset="'. wp_get_attachment_image_url( $imgid, $size ) .'.webp">'.
					'<source type="image/webp" media="(min-width:1024px)" srcset="'. wp_get_attachment_image_url( $imgid, 'large' ) .'.webp">'.
					'<source type="image/webp" srcset="'. wp_get_attachment_image_url( $imgid, 'full' ) .'.webp">'
					: ''
				).
				(
					( $size == 'large' )
					? '<source type="image/webp" media="(min-width:1024px)" srcset="'. wp_get_attachment_image_url( $imgid, 'large' ) .'.webp">'.
					'<source type="image/webp" srcset="'. wp_get_attachment_image_url( $imgid, 'large' ) .'.webp">'
					: ''
				).
				(
					( $size == 'medium' )
					? '<source type="image/webp" srcset="'. wp_get_attachment_image_url( $imgid, 'medium' ) .'.webp">'
					: ''
				)
				: (
					( $size == 'full' )
					? '<source type="image/'. $imageext .'" media="(min-width:1200px)" srcset="'. wp_get_attachment_image_url( $imgid, $size ) .'">'.
					'<source type="image/'. $imageext .'" media="(min-width:1024px)" srcset="'. wp_get_attachment_image_url( $imgid, 'large' ) .'">'.
					'<source type="image/'. $imageext .'" srcset="'. wp_get_attachment_image_url( $imgid, 'full' ) .'">'
					: ''
				).
				(
					( $size == 'large' )
					? '<source type="image/'. $imageext .'" media="(min-width:1024px)" srcset="'. wp_get_attachment_image_url( $imgid, 'large' ) .'">'.
					'<source type="image/'. $imageext .'" srcset="'. wp_get_attachment_image_url( $imgid, 'large' ) .'">'
					: ''
				).
				(
					( $size == 'medium' )
					? '<source type="image/'. $imageext .'" srcset="'. wp_get_attachment_image_url( $imgid, 'medium' ) .'">'
					: ''
				)
			).
			wp_get_attachment_image( $imgid, $size, '', array( "class" => "attachment-$size size-$size $classes", "alt" => "$imagealttext" ) ) .
		'</picture>';
	endif;
	return ob_get_clean();
}

// social media function
function social_media()	{
	ob_start();
	$socail_media = get_field('socail_media', 'options');
	if( have_rows( 'socail_media', 'options' ) ):
		echo '<ul class="social-media">';
			while( have_rows( 'socail_media', 'options' ) ) : the_row();
				$social_icon = file_get_contents( get_sub_field( 'social_icon' ) );;
				$socila_link = get_sub_field( 'social_url' );
				echo (
					( $socila_link && $social_icon )
					? '<li>'.
						'<a href="'. $socila_link .'" target="_blank">'.
							( $social_icon ? $social_icon : '' ) .
						'</a>'.
					'</li>'
					: ''
				);
			endwhile;
		echo '</ul>';
	endif;
	return ob_get_clean();
}
add_shortcode ('social-media', 'social_media');


/** Brand logo. */
function brand_logo() {
	ob_start();
	if ( has_custom_logo() ) {
		$sitelogo = get_theme_mod( 'custom_logo' );
		echo '<a href="'. esc_url( home_url( '/' ) ) .'" class="brand">'.
			'<span class="screen-reader-text">'. get_the_title() .'</span>'.
			wp_image( $sitelogo, 'medium' ) .
		'</a>';
	}
	return ob_get_clean();
}

// Gutenberg disable
add_filter('use_block_editor_for_post', '__return_false', 10);


/** Allow SVG upload on media. */
function add_svg_file_types_to_upload( $file_types ) {
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge( $file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_svg_file_types_to_upload');
