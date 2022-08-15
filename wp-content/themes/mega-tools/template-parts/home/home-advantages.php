<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !$fields['advantages']['list'] || !$fields['advantages']['active'] ) return;

?>

<!-- .block-features -->
<div class="block block-features block-features--layout--classic">
    <div class="container">
        <div class="block-features__list">

            <?php $count = count($fields['advantages']['list']); $i=0; foreach ( $fields['advantages']['list'] as $field ) { $i++; ?>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <svg width="48px" height="48px">
                            <use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#<?= $field['image'] ?>"></use>
                        </svg>
                    </div>
                    <div class="block-features__content">
			            <?php if( $field['title'] ) { ?>
                            <div class="block-features__title"><?= $field['title'] ?></div>
			            <?php } ?>
			            <?php if( $field['excerpt'] ) { ?>
                            <div class="block-features__subtitle"><?= $field['excerpt'] ?></div>
			            <?php } ?>
                    </div>
                </div>
                <?php if( $i < $count ) { ?>
                    <div class="block-features__divider"></div>
                <?php } ?>
            <?php  } ?>

        </div>
    </div>
</div>
<!-- .block-features / end -->
