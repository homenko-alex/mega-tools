<?php
defined( 'ABSPATH' ) || exit;

?>

<div class="dropcart dropcart--style--dropdown">
    <div class="dropcart__body">
		<?php if( WC()->cart->is_empty() ) { ?>
            <div class="dropcart__products-list">
                <?php esc_html_e( 'Ваша корзина пуста!', 'mega-tools' ); ?>
            </div>
		<?php }else{ ?>

			<?= woocommerce_mini_cart() ?>

		<?php } ?>
    </div>
</div>
