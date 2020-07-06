<?php
/**
 * Starter Theme modified from underscores
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

define('THEME_VERSION', '1.0.1');

if ( ! function_exists( 'cos_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cos_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bespoke Theme, use a find and replace
		 * to change 'cos' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cos', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'cos' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'cos_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cos_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cos_content_width', 640 );
}
add_action( 'after_setup_theme', 'cos_content_width', 0 );


// register custom image sizes
function cos_custom_image_sizes( $image_sizes ) {
  // get the custom image sizes
  global $_wp_additional_image_sizes;
  // if there are none, just return the built-in sizes
  if ( empty( $_wp_additional_image_sizes ) )
    return $image_sizes;

  // add all the custom sizes to the built-in sizes
  foreach ( $_wp_additional_image_sizes as $id => $data ) {
    // take the size ID (e.g., 'my-name'), replace hyphens with spaces,
    // and capitalise the first letter of each word
    if ( !isset($image_sizes[$id]) )
      $image_sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
    }

  return $image_sizes;
}

function cos_custom_image_setup () {
	add_theme_support( 'post-thumbnails' );
	add_image_size('small', 600, 384);

	add_filter( 'image_size_names_choose', 'cos_custom_image_sizes' );
}
add_action( 'after_setup_theme', 'cos_custom_image_setup' );


/**
 * Enqueue scripts and styles.
 */
function cos_scripts() {
	wp_enqueue_style( 'cos-style', get_template_directory_uri() . '/assets/css/style.css', array(), THEME_VERSION );

	// de-register jquery
	wp_deregister_script('jquery');
	// and load in the footer
	wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);

	// wp-embeds.min.js no longer needed
	wp_deregister_script('wp-embed');

	wp_register_script('global-js', get_stylesheet_directory_uri() . '/assets/js/global.js', array(), THEME_VERSION, true);

	wp_register_script('bxslider-js', get_stylesheet_directory_uri() . '/assets/js/jquery.bxslider.min.js', array('jquery'), THEME_VERSION, true);

	wp_register_script('animation-driver-js', get_stylesheet_directory_uri() . '/assets/js/animation-driver.js', array(), THEME_VERSION, true);

	wp_register_script('scrollspy-js', get_stylesheet_directory_uri() . '/assets/js/scrollspy.js', array('global-js'), THEME_VERSION, true);

	wp_enqueue_script('bxslider-js');
	//wp_enqueue_script('stickybits-js');
	wp_enqueue_script('animation-driver-js');
	wp_enqueue_script('scrollspy-js');
	wp_enqueue_script('global-js');

}
add_action( 'wp_enqueue_scripts', 'cos_scripts' );


remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';




// enable svg upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
//add_filter('upload_mimes', 'cc_mime_types');


// Move Gravity forms jQuery calls to footer
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
	return true;
}

add_filter( 'gform_confirmation_anchor', '__return_true' );


function co_google_maps_api() {
    $api['key'] = 'AIzaSyC0zorcnz0cnm0HOApwjG-XMQ20ZZ3yGEA';
    return $api;
}
add_filter('acf/fields/google_map/api', 'co_google_maps_api');
