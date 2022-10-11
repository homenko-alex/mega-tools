<?php
/**
* The template for displaying checkbox filters
*
* Override this template by copying it to yourtheme/woocommerce-ajax_filters/checkbox.php
*
* @author     BeRocket
* @package     WooCommerce-Filters/Templates
* @version  1.0.1
*/

extract($args);

$current_category = get_queried_object();

$cat_id = $current_category->term_id;
$ancestors = get_ancestors( $current_category->term_id, 'product_cat' );

if( !empty($ancestors) )
{
	$cat_id = end($ancestors);
}

$categories = get_terms(
	[
		'taxonomy'   => 'product_cat',
		'orderby'    => 'name',
		'hide_empty' => false,
        'parent' => $cat_id
	]
);

$cat = get_term_by( 'id', $cat_id, 'product_cat' );

?>

<div class="widget-filters__item">
	<div class="filter filter--opened" data-collapse-item>
		<button type="button" class="filter__title" data-collapse-trigger>
			<?= $cat->name ?>
			<svg class="filter__arrow" width="12px" height="7px">
				<use xlink:href="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/sprite.svg#arrow-rounded-down-12x7"></use>
			</svg>
		</button>
		<div class="filter__body" data-collapse-content>
			<div class="filter__container">
				<div class="filter-categories-alt">
					<ul class="filter-categories-alt__list filter-categories-alt__list--level--1" data-collapse-opened-class="filter-categories-alt__item--open">

                        <?php
                        foreach ( $categories as $category ) {

	                        $subcategories = get_terms(
		                        [
			                        'taxonomy'   => 'product_cat',
			                        'orderby'    => 'name',
			                        'hide_empty' => false,
			                        'parent' => $category->term_id
		                        ]
	                        );

	                        ?>

                            <li class="filter-categories-alt__item <?= ($category->term_id == $current_category->parent) ? 'filter-categories-alt__item--open filter-categories-alt__item--current' : '' ?>" data-collapse-item>

	                            <?php if( $subcategories ) { ?>
                                    <button class="filter-categories-alt__expander" data-collapse-trigger></button>
	                            <?php } ?>

                                <a href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>

                                <?php if( $subcategories ) { ?>
                                    <div class="filter-categories-alt__children" data-collapse-content>
                                        <ul class="filter-categories-alt__list filter-categories-alt__list--level--2">

                                            <?php foreach ( $subcategories as $subcategory ) { ?>
                                            <li class="filter-categories-alt__item <?= ($subcategory->term_id == $current_category->term_id) ? 'filter-categories-alt__item--current' : '' ?>" data-collapse-item>
                                                <a href="<?= get_category_link($subcategory->term_id) ?>"><?= $subcategory->name ?></a>
                                            </li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                <?php } ?>

                            </li>
                        <?php } ?>

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
