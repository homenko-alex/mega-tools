<?php
defined( 'ABSPATH' ) || exit;

/**
 * Получение отмеченных товароы
 * @param $category
 *
 * @return void
 */
function get_featured_products($categories = [])
{

	$tax_query = [];

	if( $categories )
	{
		foreach ( $categories as $cat )
		{
			$term = get_term( $cat, 'product_cat' );
			$tax_query[] = $term->slug;
		}
	}


	$query_args = array(
		'featured' => true,
		'category' => $tax_query,
	);

	$products = wc_get_products( $query_args );

	return $products;

}

/**
 * Склонение слов
 * @param $n
 * @param $titles
 *
 * @return mixed
 */
function declination($n, $titles)
{
	$cases = array(2, 0, 1, 1, 1, 2);
	return $titles[($n % 100 > 4 && $n % 100 < 20) ? 2 : $cases[min($n % 10, 5)]];
}
