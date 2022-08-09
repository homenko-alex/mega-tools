<?php
defined( 'ABSPATH' ) || exit;
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package mega
 */
function mega_woocommerce_setup() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mega_woocommerce_setup' );

/*
 * UAH
 */
add_filter('woocommerce_currency_symbol', 'mega_add_my_currency_symbol', 10, 2);
function mega_add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'UAH': $currency_symbol = __( 'грн', 'mega' ); break;
    }
    return $currency_symbol;
}
