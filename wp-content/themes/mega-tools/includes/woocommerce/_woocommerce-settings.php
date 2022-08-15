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
        case 'UAH': $currency_symbol = __( 'грн.', 'mega-tools' ); break;
    }
    return $currency_symbol;
}

/**
 * Lists all product categories and sub-categories in a tree structure.
 *
 * @return array
 */
function list_product_categories()
{
	$categories = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'orderby'    => 'name',
			'hide_empty' => false,
		)
	);

	$categories = treeify_terms($categories);

	return $categories;
}

/**
 * Converts a flat array of terms into a hierarchical tree structure.
 *
 * @param WP_Term[] $terms Terms to sort.
 * @param integer   $root_id Id of the term which is considered the root of the tree.
 *
 * @return array Returns an array of term data. Note the term data is an array, rather than
 * term object.
 */
function treeify_terms($terms, $root_id = 0)
{

	$tree = [];

	foreach ($terms as $term) {
		if ($term->parent === $root_id) {
			array_push(
				$tree,
				[
					'name'     => $term->name,
					'slug'     => $term->slug,
					'id'       => $term->term_id,
					'count'    => $term->count,
					'children' => treeify_terms($terms, $term->term_id),
				]
			);
		}
	}

	return $tree;
}

add_filter( 'option_default_product_cat', function( $value, $option ) {
	return false;
}, 9999, 2 );
