<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>


    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
	            <?= woocommerce_breadcrumb(['shop' => false]) ?>
            </div>
            <div class="page-header__title">
	            <?php the_title( '<h1>', '</h1>' ); ?>
            </div>
        </div>
    </div>
    <div class="block-empty__body">
        <div class="block-empty__message"><?php esc_html_e( 'Ваша корзина пуста!', 'mega-tools' ); ?></div>
        <div class="block-empty__actions">
            <a class="btn btn-primary btn-sm" href="<?= wc_get_page_permalink( 'shop' ) ?>"><?php esc_html_e( 'В каталог', 'mega-tools' ); ?></a>
        </div>
    </div>
<?php endif; ?>
