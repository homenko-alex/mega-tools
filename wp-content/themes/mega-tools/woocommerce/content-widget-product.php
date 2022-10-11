<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<div class="widget-products__item">

	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

    <div class="widget-products__image">
        <div class="product-image">
            <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="product-image__body">
                <?= kama_thumb_img( 'w=50 &class=product-image__img', wp_get_attachment_url( $product->get_image_id() )); ?>
            </a>
        </div>
    </div>

    <div class="widget-products__info">
        <div class="widget-products__name">
            <a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo wp_kses_post( $product->get_name() ); ?></a>
        </div>
        <div class="widget-products__prices">

            <?php if( $product->is_on_sale() ) { ?>
                <span class="widget-products__new-price"><?= $product->get_sale_price() . ' ' . get_woocommerce_currency_symbol() ?></span>
                <span class="widget-products__old-price"><?= $product->get_regular_price() . ' ' . get_woocommerce_currency_symbol() ?></span>
            <?php } else { ?>
                <?= $product->get_regular_price() . ' ' . get_woocommerce_currency_symbol() ?>
            <?php } ?>

        </div>
    </div>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</div>
