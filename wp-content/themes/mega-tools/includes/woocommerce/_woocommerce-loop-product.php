<?php
defined( 'ABSPATH' ) || exit;

/**
 * Change Link Open
 */
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
function woocommerce_template_loop_product_link_open()
{
	?>
            <button class="product-card__quickview" type="button">
                <svg width="16px" height="16px">
                    <use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#quickview-16"></use>
                </svg>
                <span class="fake-svg-icon"></span>
            </button>
	<?php
}

/**
 * Change Link Close
 */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10);
function woocommerce_template_loop_product_link_close()
{
	echo '';
}

/**
 * Badge
 */
add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_badge', 15);
function woocommerce_template_loop_product_badge()
{
    global $product;

	?>
	<div class="product-card__badges-list">
        <?php

        if( $product->is_on_sale() )
        {
            echo '<div class="product-card__badge product-card__badge--sale">Sale</div>';
        }else{
	        echo '<div class="product-card__badge product-card__badge--new">New</div>';
        }

        ?>
	</div>
	<?php
}

/**
 * Sale Flash
 */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

/**
 * Image
 */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
function woocommerce_template_loop_product_thumbnail()
{
	global $product;
	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
    ?>
    <div class="product-card__image product-image">
        <a href="<?= esc_url( $link ) ?>" class="product-image__body">
			<?= kama_thumb_img( 'wh=300:300 &q=75 &class=product-image__img &alt=' . $product->get_name() . ' &title=' . $product->get_name() ) ?>
        </a>
    </div>
    <div class="product-card__info">
    <?php

}

/**
 * Close Tag Title Cell
 */
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_close', 15);
function woocommerce_after_shop_loop_item_close()
{
    ?>
    </div>
    <?php
}

/**
 * Title
 */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
function woocommerce_template_loop_product_title()
{
	global $product;
	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
    ?>
    <div class="product-card__name">
        <a href="<?= esc_url( $link ) ?>"><?= get_the_title() ?></a>
    </div>
    <?php
}

/**
 * Characteristics
 */
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_characteristics', 6);
function woocommerce_template_loop_characteristics()
{
    global $product;

	$attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );

	if( !$attributes ) return;

    ?>
    <ul class="product-card__features-list">
        <?php
        $i = 1;
        foreach ( $attributes as $attribute )
        {
	        $attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
            if( $attribute_values )
            {
                $values = [];
                foreach ( $attribute_values as $value )
                {
	                $values[] = esc_html($value->name);
                }
                echo '<li>' .  wc_attribute_label( $attribute->get_name() ) . ': ' . implode(', ', $values) . '</li>';
            }

            $i++;

            if( $i == 6 ) break;
        }
        ?>
    </ul>
    <?php
}

/**
 * Price
 */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 17);

/**
 * Actions Open Tag
 */
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_actions_open', 15);
function woocommerce_template_loop_actions_open()
{
    ?>
    <div class="product-card__actions">
    <?php
}

/**
 * Actions Close Tag
 */
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_actions_close', 30);
function woocommerce_template_loop_actions_close()
{
	?>
    </div>
	<?php
}

/**
 * Actions Status
 */
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_actions_status', 16);
function woocommerce_template_loop_actions_status()
{
    global $product;

	if ( $product->is_in_stock() )
    {
		$text = __('Есть', 'woocommerce');
	}

	if ( ! $product->is_in_stock() )
    {
		$text = __('Нет', 'woocommerce');
	}

	$status = $product->get_stock_status();
	?>
    <div class="product-card__availability">
		<?= _e( 'Наличие', 'mega-tools' ) ?>: <span class="text-success"><?= $text ?></span>
    </div>
	<?php
}

/**
 * Actions Buttons
 */
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_actions_buttons', 18);
function woocommerce_template_loop_actions_buttons()
{
	?>
    <div class="product-card__buttons">

        <?= wc_get_template('loop/add-to-cart.php') ?>

        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
            <svg width="16px" height="16px">
                <use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#wishlist-16"></use>
            </svg>
            <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
        </button>
        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
            <svg width="16px" height="16px">
                <use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#compare-16"></use>
            </svg>
            <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
        </button>
    </div>
	<?php
}

/**
* Open Card
 */
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_card_open', 5 );
function woocommerce_template_loop_product_card_open($class)
{

    if( is_product_category() )
    {
        echo '<div class="products-list__item">';
    }
    echo '<div class="product-card product-card--hidden-actions ' . $class . '">';
}

/**
* Close Card
 */
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_card_close', 30 );
function woocommerce_template_loop_product_card_close()
{
    echo '</div>';

	if( is_product_category() )
	{
		echo '</div>';
	}
}

/**
 * Add to Cart
 */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

