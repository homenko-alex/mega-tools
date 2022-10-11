<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mega-tools
 */

if ( ! is_active_sidebar( 'shop-sidebar-filters' ) || ! is_active_sidebar( 'shop-sidebar-latest-products' ) ) {
	return;
}
?>

<div class="shop-layout__sidebar">
    <div class="block block-sidebar block-sidebar--offcanvas--mobile">
        <div class="block-sidebar__backdrop"></div>
        <div class="block-sidebar__body">
            <div class="block-sidebar__header">
                <div class="block-sidebar__title">
	                <?php esc_html_e( 'Фильтры', 'mega-tools' ); ?>
                </div>
                <button class="block-sidebar__close" type="button">
                    <svg width="20px" height="20px">
                        <use xlink:href="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>

            <div class="block-sidebar__item">
                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                    <h4 class="widget-filters__title widget__title"><?= esc_html__( 'Фильтр', 'mega-tools' ) ?></h4>
                    <div class="widget-filters__list">
	                    <?php dynamic_sidebar( 'shop-sidebar-filters' ); ?>
                    </div>
                    <div class="widget-filters__actions d-flex">
                        <?= do_shortcode('[br_filter_single filter_id=268]') ?>
                        <?= do_shortcode('[br_filter_single filter_id=270]') ?>
                    </div>
                </div>
            </div>

	        <?php dynamic_sidebar( 'shop-sidebar-latest-products' ); ?>


        </div>
    </div>
</div>
