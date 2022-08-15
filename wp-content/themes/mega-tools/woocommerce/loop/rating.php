<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! wc_review_ratings_enabled() )
{
	return;
}

$rating_count = $product->get_rating_count();

?>
<div class="product-card__rating">
	<div class="product-card__rating-stars">
		<div class="rating">
			<div class="rating__body">

				<svg class="rating__star <?= ($rating_count == 1 || $rating_count > 1) ? 'rating__star--active' : '' ?>" width="13px" height="12px">
					<g class="rating__fill">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal"></use>
					</g>
					<g class="rating__stroke">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal-stroke"></use>
					</g>
				</svg>
				<div class="rating__star rating__star--only-edge <?= ($rating_count == 1 || $rating_count > 1) ? 'rating__star--active' : '' ?>">
					<div class="rating__fill">
						<div class="fake-svg-icon"></div>
					</div>
					<div class="rating__stroke">
						<div class="fake-svg-icon"></div>
					</div>
				</div>

				<svg class="rating__star <?= ($rating_count == 2 || $rating_count > 2) ? 'rating__star--active' : '' ?>" width="13px" height="12px">
					<g class="rating__fill">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal"></use>
					</g>
					<g class="rating__stroke">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal-stroke"></use>
					</g>
				</svg>
				<div class="rating__star rating__star--only-edge <?= ($rating_count == 2 || $rating_count > 2) ? 'rating__star--active' : '' ?>">
					<div class="rating__fill">
						<div class="fake-svg-icon"></div>
					</div>
					<div class="rating__stroke">
						<div class="fake-svg-icon"></div>
					</div>
				</div>

				<svg class="rating__star <?= ($rating_count == 3 || $rating_count > 3) ? 'rating__star--active' : '' ?>" width="13px" height="12px">
					<g class="rating__fill">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal"></use>
					</g>
					<g class="rating__stroke">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal-stroke"></use>
					</g>
				</svg>
				<div class="rating__star rating__star--only-edge <?= ($rating_count == 3 || $rating_count > 3) ? 'rating__star--active' : '' ?>">
					<div class="rating__fill">
						<div class="fake-svg-icon"></div>
					</div>
					<div class="rating__stroke">
						<div class="fake-svg-icon"></div>
					</div>
				</div>

				<svg class="rating__star <?= ($rating_count == 4 || $rating_count > 4) ? 'rating__star--active' : '' ?>" width="13px" height="12px">
					<g class="rating__fill">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal"></use>
					</g>
					<g class="rating__stroke">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal-stroke"></use>
					</g>
				</svg>
				<div class="rating__star rating__star--only-edge <?= ($rating_count == 4 || $rating_count > 4) ? 'rating__star--active' : '' ?>">
					<div class="rating__fill">
						<div class="fake-svg-icon"></div>
					</div>
					<div class="rating__stroke">
						<div class="fake-svg-icon"></div>
					</div>
				</div>

				<svg class="rating__star <?= ($rating_count == 5 || $rating_count > 5) ? 'rating__star--active' : '' ?>" width="13px" height="12px">
					<g class="rating__fill">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal"></use>
					</g>
					<g class="rating__stroke">
						<use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#star-normal-stroke"></use>
					</g>
				</svg>
				<div class="rating__star rating__star--only-edge <?= ($rating_count == 5 || $rating_count > 5) ? 'rating__star--active' : '' ?>">
					<div class="rating__fill">
						<div class="fake-svg-icon"></div>
					</div>
					<div class="rating__stroke">
						<div class="fake-svg-icon"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product-card__rating-legend">
        <?= $product->get_review_count() ?> <?= declination($product->get_review_count(), [__('отзыв', 'mega-tools'), __('отзыва', 'mega-tools'), __('отзывов', 'mega-tools')]) ?>
    </div>
</div>
