<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !count($fields['categories']['lists']) || !$fields['categories']['active'] ) return;
$categories = $fields['categories']['lists'];
?>

<!-- .block-categories -->
<div class="block block--highlighted block-categories block-categories--layout--classic">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title"><?= $fields['categories']['title'] ?></h3>
            <div class="block-header__divider"></div>
        </div>
        <div class="block-categories__list">

            <?php foreach ( $categories as $item ) { ?>

                <?php
	            $category = get_term_by( 'id', $item, 'product_cat' );
	            get_template_part( 'woocommerce/content', 'product-cat', [ 'category' => $category ] );
                ?>

            <?php } ?>

        </div>
    </div>
</div>
<!-- .block-categories / end -->
