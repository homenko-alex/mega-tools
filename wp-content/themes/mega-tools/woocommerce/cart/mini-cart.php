<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="dropcart__products-list woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
	<?php
	do_action( 'woocommerce_before_mini_cart_contents' );

	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
			$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
			$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>
            <div class="dropcart__product woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
				<?php if ( empty( $product_permalink ) ) : ?>

					<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

                    <div class="product-image dropcart__product-image">
						<?= kama_thumb_img( 'h=70 &w=70 &class=product-image__img &attach_id=' . get_post_thumbnail_id( $product_id ) ); ?>
                    </div>
				<?php else : ?>
                    <div class="product-image dropcart__product-image">
                        <a href="<?php echo esc_url( $product_permalink ); ?>" class="product-image__body">
							<?= kama_thumb_img( 'h=70 &w=70 &class=product-image__img &attach_id=' . get_post_thumbnail_id( $product_id ) ); ?>
                        </a>
                    </div>
				<?php endif; ?>
                <div class="dropcart__product-info">
                    <div class="dropcart__product-name">
                        <a href="<?php echo esc_url( $product_permalink ); ?>"><?= $product_name ?></a>
                    </div>
                    <!--                        <ul class="dropcart__product-options">-->
                    <!--                            <li>Color: Yellow</li>-->
                    <!--                            <li>Material: Aluminium</li>-->
                    <!--                        </ul>-->
                    <div class="dropcart__product-meta">
						<?php echo apply_filters(
							'woocommerce_widget_cart_item_quantity',
							'<span class="dropcart__product-quantity quantity">' .$cart_item['quantity'] . '</span> × <span class="dropcart__product-price">' . $product_price . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </div>
                </div>
				<?php
				echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'woocommerce_cart_item_remove_link',
					sprintf(
						'<a href="%s" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><svg width="10px" height="10px">
                            <use xlink:href="%s/assets/dist/images/sprite.svg#cross-10"></use>
                        </svg></a>',
                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
						esc_attr__( 'Remove this item', 'woocommerce' ),
						esc_attr( $product_id ),
						esc_attr( $cart_item_key ),
						esc_attr( $_product->get_sku() ),
						get_stylesheet_directory_uri()
					),
					$cart_item_key
				);
				?>

				<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

            </div>
			<?php
		}
	}

	do_action( 'woocommerce_mini_cart_contents' );
	?>
</div>

<div class="dropcart__totals woocommerce-mini-cart__total total">
	<?php
	/**
	 * Hook: woocommerce_widget_shopping_cart_total.
	 *
	 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
	 * @hooked mega_woocommerce_mini_cart_subtotal - 15
	 */
	do_action( 'woocommerce_widget_shopping_cart_total' );
	?>
</div>

<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

<div class="dropcart__buttons woocommerce-mini-cart__buttons buttons">
    <a class="btn btn-secondary" href="<?= esc_url( wc_get_cart_url() ) ?>"><?=  esc_html__( 'Просмотр', 'woocommerce' ) ?></a>
    <a class="btn btn-primary" href="<?= esc_url( wc_get_checkout_url() ) ?>"><?=  esc_html__( 'Оформить', 'woocommerce' ) ?></a>
</div>

<?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>


<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
