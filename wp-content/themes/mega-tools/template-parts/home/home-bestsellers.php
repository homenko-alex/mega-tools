<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !count($fields['bestsellers']['products']) || !$fields['bestsellers']['active'] ) return;
$products = $fields['bestsellers']['products'];
?>

<!-- .block-products -->
<div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title"><?= $fields['bestsellers']['title'] ?></h3>
            <div class="block-header__divider"></div>
        </div>
        <div class="block-products__body">

            <div class="block-products__featured">
                <div class="block-products__featured-item">

                    <?php
                    $post = get_post($products[0]);
                    setup_postdata($post);

                    wc_get_template_part('content', 'product');

                    wp_reset_postdata();

                    unset($products[0]);
                    ?>

                </div>
            </div>
            <div class="block-products__list">

                <?php foreach ( $products as $product ) { $post = get_post($product); ?>
                    <div class="block-products__list-item">
                        <?php
                        setup_postdata($post);
                        wc_get_template_part('content', 'product');
                        ?>
                    </div>
                <?php } wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
</div>
<!-- .block-products / end -->
