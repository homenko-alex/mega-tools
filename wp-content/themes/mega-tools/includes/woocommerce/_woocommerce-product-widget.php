<?php
defined( 'ABSPATH' ) || exit;

/**
 * @param $html
 *
 * @return string
 */
function mega_shop_sidebar_widget_open_tag($html) {
	$html = '<div class="product_list_widget widget-products__list">';
	return $html;
}
add_filter('woocommerce_before_widget_product_list', 'mega_shop_sidebar_widget_open_tag', 1, 15);

/**
 * @param $html
 *
 * @return string
 */
function mega_shop_sidebar_widget_close_tag($html) {
	$html = '</div>';
	return $html;
}
add_filter('woocommerce_after_widget_product_list', 'mega_shop_sidebar_widget_close_tag', 1, 15);
