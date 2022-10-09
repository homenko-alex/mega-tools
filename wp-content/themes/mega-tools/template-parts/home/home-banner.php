<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !$fields['banner']['image_desctope'] || !$fields['banner']['active'] ) return;
?>

<!-- Banner -->
<div class="block block-banner">
    <div class="container">
        <a href="<?= $fields['banner']['link'] ?>" class="block-banner__body">
            <div class="block-banner__image block-banner__image--desktop" style="background-image: url('<?= wp_get_attachment_image_url( $fields['banner']['image_desctope'], 'full' ) ?>')"></div>
            <div class="block-banner__image block-banner__image--mobile" style="background-image: url('<?= wp_get_attachment_image_url( $fields['banner']['image_mobile'], 'full' ) ?>')"></div>
            <div class="block-banner__title"><?= $fields['banner']['title'] ?></div>
            <div class="block-banner__text"><?= $fields['banner']['excerpt'] ?></div>
            <div class="block-banner__button">
                <span class="btn btn-sm btn-primary"><?= __( 'Перейти', 'mega-tools' ) ?></span>
            </div>
        </a>
    </div>
</div>
<!-- End Banner -->
