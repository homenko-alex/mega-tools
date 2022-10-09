<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo '<ol class="breadcrumb">';

	$count = count($breadcrumb);
	$i = 1;
	$active = '';

	foreach ( $breadcrumb as $key => $crumb )
	{

		if( $count == $i ) $active = 'active';

		if ( $args['shop'] && ! is_shop() && $i == 2 )
		{
			$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
			$shop_page_title = get_the_title( wc_get_page_id( 'shop' ) );

			echo '<li class="breadcrumb-item">';
			echo '<a href="' . esc_url( $shop_page_url ) . '">' . esc_html( $shop_page_title ) . '</a>';
			echo '<svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="' . get_template_directory_uri() . '/assets/dist/images/sprite.svg#arrow-rounded-right-6x9"></use></svg>';
			echo '</li>';
		}

		echo '<li class="breadcrumb-item ' . $active . '">';

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		} else {
			echo esc_html( $crumb[0] );
		}

		if( $count != $i ) {
			echo '<svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="' . get_template_directory_uri() . '/assets/dist/images/sprite.svg#arrow-rounded-right-6x9"></use></svg>';
		}

		echo '</li>';

		$i++;

	}

	echo '</ol>';

}
