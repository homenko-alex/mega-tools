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

if( wc_get_loop_prop( 'total' ) ) {
?>
<div class="products-view__options">
	<div class="view-options view-options--offcanvas--mobile">
		<div class="view-options__filters-button">
			<button type="button" class="filters-button">
				<svg class="filters-button__icon" width="16px" height="16px">
					<use xlink:href="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/sprite.svg#filters-16"></use>
				</svg>
				<span class="filters-button__title"><?= esc_html__( 'Фильтр', 'mega-tools' ) ?></span>
				<span class="filters-button__counter">3</span>
			</button>
		</div>
		<div class="view-options__layout">
			<div class="layout-switcher">
				<div class="layout-switcher__list">
					<button data-layout="grid-3-sidebar" data-with-features="false" title="Grid" type="button" class="layout-switcher__button  layout-switcher__button--active ">
						<svg width="16px" height="16px">
							<use xlink:href="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/sprite.svg#layout-grid-16x16"></use>
						</svg>
					</button>
					<button data-layout="grid-3-sidebar" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button ">
						<svg width="16px" height="16px">
							<use xlink:href="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/sprite.svg#layout-grid-with-details-16x16"></use>
						</svg>
					</button>
					<button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button ">
						<svg width="16px" height="16px">
							<use xlink:href="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/sprite.svg#layout-list-16x16"></use>
						</svg>
					</button>
				</div>
			</div>
		</div>

        <?php
        /**
         * Hook: woocommerce_shop_options.
         *
         * @hooked woocommerce_result_count - 10
         * @hooked woocommerce_catalog_ordering - 15
         * @hooked woocommerce_catalog_show_count - 20
         */
        do_action( 'woocommerce_shop_options' );
        ?>

	</div>
</div>

<?php
}
