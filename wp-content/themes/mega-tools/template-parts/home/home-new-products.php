<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !$fields['new_products']['active'] ) return;

$arr = [
    'posts_per_page' => 20,
    'post_type' => 'product',
    'date_query' => [
	    'after' => '2 weeks ago',
    ]
];
$products = new WP_Query($arr);

if ($products->have_posts())
{
    ?>
    <!-- .block-products-carousel -->
    <div class="block block-products-carousel" data-layout="horizontal" data-mobile-grid-columns="2">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title"><?= $fields['new_products']['title'] ?></h3>
                <div class="block-header__divider"></div>

                <div class="block-header__arrows-list">
                    <button class="block-header__arrow block-header__arrow--left" type="button">
                        <svg width="7px" height="11px">
                            <use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#arrow-rounded-left-7x11"></use>
                        </svg>
                    </button>
                    <button class="block-header__arrow block-header__arrow--right" type="button">
                        <svg width="7px" height="11px">
                            <use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#arrow-rounded-right-7x11"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">

                    <?php
                    $b = 1;
	                while ($products->have_posts()) { $products->the_post();
                    ?>

                        <?php if( $b == 1 ) { ?>
                            <div class="block-products-carousel__column">
                        <?php } ?>

                        <div class="block-products-carousel__cell">
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                        </div>

                        <?php if( $b == 2 ) { $b = 0; ?>
                            </div>
                        <?php } ?>

                    <?php $b++; } wp_reset_postdata(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- .block-products-carousel / end -->
    <?php
}

?>
