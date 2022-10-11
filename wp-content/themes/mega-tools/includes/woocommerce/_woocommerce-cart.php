<?php
defined( 'ABSPATH' ) || exit;

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
remove_action( 'woocommerce_widget_shopping_cart_total', 'woocommerce_widget_shopping_cart_subtotal', 10 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

/**
 * Cart Ajax
 */
add_action('init', 'mega_ajax_cart_init');
function mega_ajax_cart_init()
{

	/*
	 * Small Cart
	 */
	add_action('wp_ajax_cart_mini', 'mega_ajax_cart_mini');
	add_action( 'wp_ajax_nopriv_cart_mini', 'mega_ajax_cart_mini' );

}

/**
 * Ajax Get Cart Mini
 * @return void
 */
function mega_ajax_cart_mini()
{

	ob_start();
	get_template_part('template-parts/cart/cart', 'mini');
	$html = ob_get_clean();
	ob_end_clean();

	wp_send_json_success([
		'count'   => WC()->cart->get_cart_contents_count(),
		'cart' => $html,
	]);

}

/**
 * Total Mini Cart
 */
add_action('woocommerce_widget_shopping_cart_total', 'mega_woocommerce_mini_cart_subtotal', 15);
function mega_woocommerce_mini_cart_subtotal()
{

	?>
	<table>
		<tr>
			<th><?= esc_html__( 'Сумма', 'woocommerce' ) ?></th>
			<td><?= WC()->cart->get_cart_subtotal() ?></td>
		</tr>
		<tr>
			<th><?= esc_html__( 'Доставка', 'woocommerce' ) ?></th>
			<td><?= WC()->cart->get_cart_shipping_total() ?></td>
		</tr>
		<tr>
			<th><?= esc_html__( 'Сумма к оплате', 'woocommerce' ) ?></th>
			<td><?= WC()->cart->get_cart_total() ?></td>
		</tr>
	</table>
	<?php

}
