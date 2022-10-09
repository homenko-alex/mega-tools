<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !$fields['brands']['lists'] || !$fields['brands']['active'] ) return;

$brands = get_terms( [
	'taxonomy' => 'pwb-brand',
    'hide_empty' => false,
    'include' => $fields['brands']['lists']
] );

if( $brands )
{
    ?>
    <!-- .block-brands -->
    <div class="block block-brands">
        <div class="container">
            <div class="block-brands__slider">
                <div class="owl-carousel">

                    <?php
                    foreach ( $brands as $brand ) {
	                    $brand_logo = get_term_meta( $brand->term_id, 'pwb_brand_image', true );
	                    $brand_logo_src = wp_get_attachment_image_src( $brand_logo, 'full' );
                    ?>
                    <div class="block-brands__item">
                        <img src="<?= $brand_logo_src[0] ?>" alt="<?= $brand->name ?>" alt="<?= $brand->title ?>">
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- .block-brands / end -->
    <?php
}

?>
