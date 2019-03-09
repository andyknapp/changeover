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

	wp_enqueue_script('bxslider-js');
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



// Extend WordPress search to include custom field
// http://adambalee.com
// Join posts and postmeta tables
// http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
function cf_search_join( $join ) {
 global $wpdb;
 if ( is_search() ) {
	 $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
 }
 return $join;
}
add_filter('posts_join', 'cf_search_join' );

// Modify the search query with posts_where
// http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where

function cf_search_where( $where ) {
 global $pagenow, $wpdb;
 if ( is_search() ) {
	 $where = preg_replace(
		 "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
		 "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
 }
 return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

// Prevent duplicates
// http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
function cf_search_distinct( $where ) {
 global $wpdb;
 if ( is_search() ) {
	 return "DISTINCT";
 }
 return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );


// enable svg upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Move Gravity forms jQuery calls to footer
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
	return true;
}

// remove customizer completely
function kd_remove_customizer() {
    $customize_url_arr = array();
    $customize_url_arr[] = 'customize.php'; // 3.x
    $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
    $customize_url_arr[] = $customize_url; // 4.0 & 4.1
    if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) {
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
        $customize_url_arr[] = 'custom-header'; // 4.0
    }
    if ( current_theme_supports( 'custom-background' ) && current_user_can( 'customize') ) {
        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
        $customize_url_arr[] = 'custom-background'; // 4.0
    }
    foreach ( $customize_url_arr as $customize_url ) {
        remove_submenu_page( 'themes.php', $customize_url );
    }
}
add_action( 'admin_menu', 'kd_remove_customizer', 999 );



// critical css setup
// get grunt-generated build number and set as CSS_VERSION
// $str = file_get_contents('wp-content/themes/kd/assets/css/bust-cache.json');
// $id = json_decode($str);
// $hash = $id->build;
//
// define('CSS_VERSION', $hash);

// set a cookie with the CSS_VERSION as value
function critical_css_cookie() {
	$cookie_name = 'csscache';

	setcookie($cookie_name, CSS_VERSION, time() +(60*60*24*365), COOKIEPATH, COOKIE_DOMAIN);
}
//add_action('init', 'critical_css_cookie');


function critical_css() {
	$styles = '';
	$template = '';

	// set up template vars
	if(is_page_template('page-template-home.php')) {
		$template = 'home';
	}

	// if cookie is set and has the current CSS_VERSION, request the cached stylesheet
	if(isset($_COOKIE['csscache']) && $_COOKIE['csscache'] == CSS_VERSION) {
		$styles .= '<link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/style.min.css?ver=' . CSS_VERSION . '" />';

	} else {
		// if not, inject critical css
		$styles .= '<style>'. file_get_contents('assets/css/critical/critical-' . $template . '.css', FILE_USE_INCLUDE_PATH) .'</style>';

		$styles .= '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/style.min.css?ver=' . CSS_VERSION . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'"/>';

		// rel="preload" polyfill
		$styles .= '<script>'. file_get_contents('assets/js/cssrelpreload.min.js', FILE_USE_INCLUDE_PATH) .'</script>';

		// set value of CSS_VERSION in the cookie
		// need to use js because the wp_head action fires too late to set cookies in php
		$styles .= '<script>document.cookie=csscache="' . CSS_VERSION . '";expires="Tue, 19 Jan 2038 03:14:07 GMT";path="/";</script>';
	}

	echo $styles;
}
//add_action('wp_head', 'critical_css');
