<?php
defined( 'ABSPATH' ) || exit;

/**
 * Remove Action
 */
remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
remove_action( 'woocommerce_after_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );

/**
 * Show All Categories on Shop Page
 */
add_filter( 'woocommerce_product_subcategories_hide_empty', '__return_false' );

/**
 * Catalog Header
 */
add_action('woocommerce_before_main_content', 'woocommerce_shop_title', 15);
function woocommerce_shop_title()
{
	?>
	<div class="page-header">
		<div class="page-header__container container">
			<div class="page-header__breadcrumb">
				<nav aria-label="breadcrumb">
                    <?= woocommerce_breadcrumb(['shop' => true]) ?>
				</nav>
			</div>
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<div class="page-header__title">
					<h1 class="woocommerce-products-header__title page-title">
						<?php woocommerce_page_title(); ?>
					</h1>
				</div>
			<?php endif; ?>

		</div>
	</div>
	<?php
}

/**
 * Add Container Open Tag
 */
add_action( 'woocommerce_archive_description', 'woocommerce_shop_open_wrap', 5 );
function woocommerce_shop_open_wrap()
{
    ?>
    <div class="container">
    <?php
}

/**
 * Add Container Close Tag
 */
add_action( 'woocommerce_after_main_content', 'woocommerce_shop_close_wrap', 15 );
function woocommerce_shop_close_wrap()
{
    ?>
    </div>
    <?php
}

/**************************************************************************************************************
 * Category Page
 */

/**
 * Open Tag
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_open_tag', 5 );
function woocommerce_shop_cat_open_tag()
{
    ?>
    <div class="category-card__body">
    <?php
}

/**
 * Close Tag
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_close_tag', 50 );
function woocommerce_shop_cat_close_tag()
{
	?>
    </div>
	<?php
}

/**
 * Image
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_image', 10 );
function woocommerce_shop_cat_image($category)
{

    //print_r($category);
	$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
	$image = wp_get_attachment_url( $thumbnail_id );

    if( !empty( $image ) )
    {
        ?>
        <div class="category-card__image">
            <a href="<?= get_term_link( $category->term_id, 'product_cat' ) ?>">
                <img src="<?= $image ?>" alt="<?= $category->name ?>" title="<?= $category->name ?>">
            </a>
        </div>
        <?php
    }

}

/**
 * Content Open Tag
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_content_open_tag', 15 );
function woocommerce_shop_cat_content_open_tag()
{
    ?>
    <div class="category-card__content">
    <?php
}
/**
 * Content Close Tag
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_content_close_tag', 45 );
function woocommerce_shop_cat_content_close_tag()
{
	?>
    </div>
	<?php
}

/**
 * Title
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_content_title', 20 );
function woocommerce_shop_cat_content_title($category)
{

	?>
    <div class="category-card__name">
        <a href="<?= get_term_link( $category->term_id, 'product_cat' ) ?>"><?= $category->name ?></a>
    </div>
    <?php

}

/**
 * Subcategories
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_content_subcategories', 25 );
function woocommerce_shop_cat_content_subcategories($category)
{

	$categories = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'parent' => $category->term_id,
        'number' => 5,
    ]);

    if( $categories )
    {
        ?>
        <ul class="category-card__links">

            <?php foreach ( $categories as $items ) { ?>
                <li>
                    <a href="<?= get_term_link( $items->term_id, 'product_cat' ) ?>">
                        <?= $items->name ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <?php
    }

}

/**
 * All Link
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_content_subcategories_all_link', 30 );
function woocommerce_shop_cat_content_subcategories_all_link($category)
{

    ?>
    <div class="category-card__all">
        <a href="<?= get_term_link( $category->term_id, 'product_cat' ) ?>"><?= __( 'Смотреть все', 'mega-tools' ) ?></a>
    </div>
    <?php

}

/**
 * Count Products
 */
add_action( 'woocommerce_shop_cat', 'woocommerce_shop_cat_content_count_products', 35 );
function woocommerce_shop_cat_content_count_products($category)
{

    $cat_ids = [];
	array_push($cat_ids, $category->term_id);

	$categories = get_terms([
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		'parent' => $category->term_id,
	]);

    foreach ( $categories as $item )
    {
	    array_push($cat_ids, $item->term_id);
    }

	$args = array(
		'post_status' => 'publish',
		'tax_query' => [
                [
	                'taxonomy' => 'product_cat',
	                'field'    => 'term_id',
	                'terms'     =>  $cat_ids,
	                'operator'  => 'IN'
                ]
		]
	);
	$the_query = new WP_Query($args);

	?>
    <div class="category-card__products">
         <?= num_decline($the_query->found_posts, [ __( 'товар', 'mega-tools' ), __( 'товара', 'mega-tools' ), __( 'товаров', 'mega-tools' ) ]) ?>
    </div>
	<?php

}

/**
 * Open Container
 */
add_action( 'woocommerce_catalog_mega_start', 'woocommerce_catalog_open_container', 5 );
function woocommerce_catalog_open_container()
{

    if( is_product_category() )
    {
        ?>
        <div class="shop-layout shop-layout--sidebar--start">

            <?php wc_get_template( 'global/sidebar.php' ); ?>

            <div class="shop-layout__content">
                <div class="block">
                    <div class="products-view">

	                    <?php wc_get_template( 'global/options.php' ); ?>

                        <?= do_action('shop_notice') ?>

                        <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false" data-mobile-grid-columns="2">
                            <div class="products-list__body">
        <?php

    }

}

/**
 * Close Container
 */
add_action( 'woocommerce_catalog_mega_end', 'woocommerce_catalog_close_container', 5 );
function woocommerce_catalog_close_container()
{

	if( is_product_category() )
	{
		?>
                                </div>
                            </div>
                        <?php if( wc_get_loop_prop( 'total' ) ) { ?>
                            <div class="products-view__pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                        <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-left-8x13"></use>
                        </svg>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="">1</a></li>
                <li class="page-item active"><a class="page-link" href="">2 <span class="sr-only">(current)</span></a></li>
                <li class="page-item"><a class="page-link" href="">3</a></li>
                <li class="page-item">
                    <a class="page-link page-link--with-arrow" href="" aria-label="Next">
                        <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-8x13"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
		<?php

	}

}

add_action( 'woocommerce_shop_options', 'woocommerce_result_count', 10 );
add_action( 'woocommerce_shop_options', 'woocommerce_catalog_ordering', 15 );

add_action( 'woocommerce_shop_options', 'woocommerce_catalog_show_count', 20 );
function woocommerce_catalog_show_count()
{
	//wc_get_template('loop/show-count.php');
}

/**
 * Notice
 */
add_action('shop_notice', 'shop_woocommerce_output_all_notices', 10);
function shop_woocommerce_output_all_notices()
{

	$all_notices  = WC()->session->get( 'wc_notices', array() );
    if( $all_notices )
    {
	    echo '<div class="woocommerce-notices-wrapper alert alert-lg alert-primary">';
	    wc_print_notices();
	    echo '</div>';
    }

}
