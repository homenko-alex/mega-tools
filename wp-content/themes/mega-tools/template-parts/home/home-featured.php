<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !$fields['favorite']['categories'] || !$fields['favorite']['active'] ) return;

$cat_ids = array_column($fields['favorite']['categories'], 'category');
$products = get_featured_products($cat_ids);

if( !$products ) return;

?>

<!-- .block-products-carousel -->
<div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
	<div class="container">
		<div class="block-header">
			<h3 class="block-header__title">
				<?= _e( 'Рекомендуемые товары', 'mega-tools' ) ?>
			</h3>
			<div class="block-header__divider"></div>
			<ul class="block-header__groups-list">
				<li>
                    <button type="button" class="block-header__group  block-header__group--active ">
                        <?= _e( 'Все', 'mega-tools' ) ?>
                    </button>
                </li>
                <?php foreach ( $fields['favorite']['categories'] as $category ) { ?>
                    <li>
                        <button type="button" class="block-header__group" data-id="<?= $category['category'] ?>">
                            <?= $category['title'] ?>
                        </button>
                    </li>
                <?php } ?>

			</ul>
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
                foreach ($products as $product)
                {
                    ?>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <?php
                            $post = get_post($product->get_id());
                            setup_postdata($post);

                            wc_get_template_part('content', 'product');

                            ?>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>

			</div>
		</div>
	</div>
</div>
<!-- .block-products-carousel / end -->
