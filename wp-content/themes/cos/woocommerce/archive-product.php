<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<section class="shop-intro intro woocommerce-products-header">

    <?php if( is_product_category() ) : ?>
        <div class="container-mid centered">

            <?php
                $queried_object = get_queried_object();
                $term_name = $queried_object->name;
                $term_description = $queried_object->description;
                $description = '';
                $center = 'center';
                if ( $term_description ) {
                    $description = 'has-description';
                    $center = '';
                }
            ?>

            <header class="tax-header <?php echo $description; ?>">
                <h1 class="heading-2 underline <?php echo $center; ?>"><?php echo $term_name; ?></h1>
            </header>

            <?php if( $term_description ) : ?>
                <div class="intro-content">
                    <p><?php echo $term_description; ?></p>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <div class="container-mid centered shop-home">
                <header>
                    <h1 class="heading-2 underline">Online </br>Shop</h1>
                </header>
                <div class="intro-content">
                    <p><span>Changeover Sales</span> has expanded to offer online shopping!
                    </br>Tag Sale items will also be listed for &ldquo;virtual tag sale&rdquo; </br>shopping.
                    </p>
                    <p>Please feel free to reach out to changeoversales@aol.com </br>or (302) 562-5385 with any specific inquiries. </br>Thanks and happy shopping!</p>
                </div>

        <?php endif; ?>
    </div>
</section>

<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
