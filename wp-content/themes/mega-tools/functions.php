<?php

/**
 * ACF
 */
require get_template_directory() . '/includes/_acf.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/_customizer.php';
/**
 * Settings Theme.
 */
require get_template_directory() . '/includes/_theme-settings.php';
/**
 * Widgets
 */
require get_template_directory() . '/includes/_widget-areas.php';
/**
 * Js and Css.
 */
require get_template_directory() . '/includes/_script-style.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/_custom-header.php';
/**
 * Navigations.
 */
require get_template_directory() . '/includes/_navigations.php';
/**
 * Helpers functions.
 */
require get_template_directory() . '/includes/_helpers.php';
/**
 * Implement the Custom Footer feature.
 */
require get_template_directory() . '/includes/_custom-footer.php';
/*
 * Woocommerce
 */
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) )
{
    require get_template_directory() . '/includes/woocommerce/_woocommerce-settings.php';
	require get_template_directory() . '/includes/woocommerce/_woocommerce-helpers.php';
	require get_template_directory() . '/includes/woocommerce/_woocommerce-loop-product.php';
	require get_template_directory() . '/includes/woocommerce/_woocommerce-shop.php';
}

add_filter( 'upload_size_limit', 'PBP_increase_upload' );
function PBP_increase_upload( $bytes )
{
    return 52428800; // 50 megabyte
}
