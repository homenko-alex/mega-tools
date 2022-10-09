<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( isset($args) ) extract($args);

?>
<div <?php wc_product_cat_class( 'block-categories__item category-card category-card--layout--classic', $category ); ?>>
	    <?php

	    /**
	     * The woocommerce_before_subcategory hook.
	     *
	     * @hooked woocommerce_shop_cat_open_tag - 5
	     * @hooked woocommerce_shop_cat_image - 10
	     * @hooked woocommerce_shop_cat_content_open_tag - 15
	     * @hooked woocommerce_shop_cat_content_title - 20
	     * @hooked woocommerce_shop_cat_content_subcategories - 25
	     * @hooked woocommerce_shop_cat_content_subcategories_all_link - 30
	     * @hooked woocommerce_shop_cat_content_count_products - 35
         *
         *
	     * @hooked woocommerce_shop_cat_content_close_tag - 45
	     * @hooked woocommerce_shop_cat_close_tag - 50
	     */
	    do_action( 'woocommerce_shop_cat', $category );



	/**
	 * The woocommerce_before_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_open - 10
	 */
	do_action( 'woocommerce_before_subcategory', $category );

	/**
	 * The woocommerce_before_subcategory_title hook.
	 *
	 * @hooked woocommerce_subcategory_thumbnail - 10
	 */
	do_action( 'woocommerce_before_subcategory_title', $category );

	/**
	 * The woocommerce_shop_loop_subcategory_title hook.
	 *
	 * @hooked woocommerce_template_loop_category_title - 10
	 */
	do_action( 'woocommerce_shop_loop_subcategory_title', $category );

	/**
	 * The woocommerce_after_subcategory_title hook.
	 */
	do_action( 'woocommerce_after_subcategory_title', $category );

	/**
	 * The woocommerce_after_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_close - 10
	 */
	do_action( 'woocommerce_after_subcategory', $category );
	?>
</div>
