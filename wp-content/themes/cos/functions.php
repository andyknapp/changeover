<?php
/**
 * Starter Theme modified from underscores
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

define('THEME_VERSION', '1.1');

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

// woo stuff
function cos_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 500,
        'single_image_width'    => 1000,
        'single_image_height'    => 800,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );

    add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'cos_add_woocommerce_support' );


add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
		'width'  => 1000,
		'height' => 750,
		'crop'   => 0,
	);
} );

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
	return array(
		'width'  => 200,
		'height' => 150,
		'crop'   => 1,
	);
} );


/**
 * Enqueue scripts and styles.
 */
function cos_scripts() {
	wp_enqueue_style( 'cos-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), THEME_VERSION );

	// de-register jquery
	wp_deregister_script('jquery');
	// and load in the footer
	wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);

	// wp-embeds.min.js no longer needed
	wp_deregister_script('wp-embed');

	wp_register_script('global-js', get_stylesheet_directory_uri() . '/assets/js/global.min.js', array(), THEME_VERSION, true);

    wp_register_script('home-js', get_stylesheet_directory_uri() . '/assets/js/home.js', array(), THEME_VERSION, true);

	wp_register_script('bxslider-js', get_stylesheet_directory_uri() . '/assets/js/jquery.bxslider.min.js', array('jquery'), THEME_VERSION, true);

	wp_register_script('animation-driver-js', get_stylesheet_directory_uri() . '/assets/js/animation-driver.js', array(), THEME_VERSION, true);

	wp_register_script('scrollspy-js', get_stylesheet_directory_uri() . '/assets/js/scrollspy.js', array('global-js'), THEME_VERSION, true);

    if ( is_page_template('page-home.php') ) {
        wp_enqueue_script('bxslider-js');
    	wp_enqueue_script('animation-driver-js');
        wp_enqueue_script('scrollspy-js');
    	wp_enqueue_script('home-js');
    }

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


// woocommerce
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function cos_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', 'cos_dequeue_styles' );


add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

/**
 * Change number of products that are displayed per page (shop page)
 */

function cos_loop_shop_per_page( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    $cols = 24;
    return $cols;
}
add_filter( 'loop_shop_per_page', 'cos_loop_shop_per_page', 20 );


// Modify the default WooCommerce orderby dropdown
//
// Options: menu_order, popularity, rating, date, price, price-desc
// In this example I'm removing price & price-desc but you can remove any of the options
function cos_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby['popularity']);
    unset($orderby['menu_order']);
    return $orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'cos_woocommerce_catalog_orderby', 20 );


// custom markup in product thumbnails
remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );

function cos_woocommerce_template_loop_product_title() {
    echo '<div class="product-detail-wrap"><h2 class="heading-product-preview">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_filter( 'woocommerce_shop_loop_item_title', 'cos_woocommerce_template_loop_product_title' );


// make category conditional on single prod page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );


// Add the opening div to the img
function add_img_wrapper_start() {
    echo '<div class="archive-img-wrap">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_start', 5, 2 );

// Close the div that we just added
function add_img_wrapper_close() {
    echo '</div>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_close', 12, 2 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


function delivery_notes() {
    echo '<div class="delivery-notes"><p class="delivery-fine-print">* Complimentary delivery zone includes: 19014, 19017 ,19060, 19061, 19311, 19317, 19319, 19342, 19348, 19373, 19374, 19375, 19380, 19382, 19383, 19703, 19707, 19710, 19732, 19735, 19736, 19801, 19802, 19803, 19804, 19805, 19806, 19807, 19808, 19809, 19810.</p> <p>Call <a href="tel:1-302-562-5385" target="_blank">302-562-5385</a> for options/quote outside of delivery zone.</p></div>';
}
add_action( 'woocommerce_after_cart', 'delivery_notes' );


function change_shipping_label( $full_label, $method ) {
    if( is_checkout() ) {
        $full_label = str_replace( 'Complimentary delivery available for local customers*', 'Call <a href="tel:1-302-562-5385" target="_blank">302-562-5385</a> for options/quote outside of our delivery zone.', $full_label );
    }

    return $full_label;
}
add_filter( 'woocommerce_cart_shipping_method_full_label', 'change_shipping_label', 10, 2 );

function custom_shipping_package_name( $name ) {
    return 'Delivery';
}
add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );




function cos_local_delivery() {
    global $product;

    $ship_class_id = $product->get_shipping_class_id();
    $ship_obj = get_term_by('term_taxonomy_id', $ship_class_id, 'product_shipping_class');
    $ship_slug = $ship_obj->slug;

    $shipping_zone = WC_Shipping_Zones::get_zone_matching_package( $package );

    $zone_name = $shipping_zone->get_zone_name();
    $zone_id = $shipping_zone->get_id();

    if( $ship_slug != 'free-shipping' ) {
        return;
    } else {
        echo '<p class="free-shipping-alert">Complimentary delivery available for local customers</p>';
    }
}
add_action('woocommerce_single_product_summary', 'cos_local_delivery');

/**
 * Remove uncategorized from the WooCommerce breadcrumb.
 *
 * @param  Array $crumbs    Breadcrumb crumbs for WooCommerce breadcrumb.
 * @return Array   WooCommerce Breadcrumb crumbs with default category removed.
 */
function cos_wc_remove_uncategorized_from_breadcrumb( $crumbs ) {
	$category 	= get_option( 'default_product_cat' );
	$caregory_link 	= get_category_link( $category );

	foreach ( $crumbs as $key => $crumb ) {
		if ( in_array( $caregory_link, $crumb ) ) {
			unset( $crumbs[ $key ] );
		}
	}

	return array_values( $crumbs );
}

add_filter( 'woocommerce_get_breadcrumb', 'cos_wc_remove_uncategorized_from_breadcrumb' );




/**
 * Show cart contents / total Ajax
 */
//add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );




// remove add to cart button from loop and add view product button
function cos_view_product_button() {
    global $product;
    $link = $product->get_permalink();

    echo '<span class="button">View Product</span>';
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'cos_view_product_button', 10 );


// remove cross sell in cart
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// remove related products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


// remove wysiwyg from woo products
function init_remove_support(){
    $post_type = 'product';
    remove_post_type_support( $post_type, 'editor');
}
add_action('init', 'init_remove_support',100);

// remove unused woo tabs
function cos_remove_tabs($tabs){
    unset($tabs['advanced']);
    unset($tabs['attribute']);
    unset($tabs['marketplace']);

    return($tabs);

}
add_filter('woocommerce_product_data_tabs', 'cos_remove_tabs', 10, 1);

add_filter( 'woocommerce_allow_marketplace_suggestions', '__return_false' );


function cos_woo_css() {
  echo '<style>
        #woocommerce-product-data .hndle span span {
            display:none;
        }
        #linked_product_data.woocommerce_options_panel p.form-field.hide_if_grouped {
            display: none!important;
        }
  </style>';
}
add_action('admin_head', 'cos_woo_css');



// adjust image zoom settings
function custom_single_product_zoom_options( $zoom_options ) {
    // Changing the magnification level:
    $zoom_options['magnify'] = 0.7;

    return $zoom_options;
}
add_filter('woocommerce_single_product_zoom_options', 'custom_single_product_zoom_options', 10, 3);



function co_google_maps_api() {
    $api['key'] = 'AIzaSyC0zorcnz0cnm0HOApwjG-XMQ20ZZ3yGEA';
    return $api;
}
add_filter('acf/fields/google_map/api', 'co_google_maps_api');


function co_add_shipping_method_to_emails( $order, $sent_to_admin, $plain_text, $email ) {
    if( 'customer_processing_order' == $email->id ) {

        $method_copy = 'Complimentary delivery available for local customers*';

        if( $order->get_shipping_method() === $method_copy ) {

            echo '<p>Your address is outside of our delivery zone. Please call <a href="tel:1-302-562-5385" target="_blank">302-562-5385</a> for options/quote.</p>';

        } else {
            echo '<p>You have complimentary delivery.</p>';
        }
    }

}
add_action( 'woocommerce_email_before_order_table', 'co_add_shipping_method_to_emails', 10, 4 );
