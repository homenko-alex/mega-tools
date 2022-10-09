<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !$fields['thebest']['active'] ) return;
?>

<!-- .block-product-columns -->
<div class="block block-product-columns d-lg-block d-none">
	<div class="container">
		<div class="row">

			<?php if( $fields['thebest']['box_one_products'] ) { ?>
				<div class="col-4">
					<div class="block-header">
						<h3 class="block-header__title">
							<?= $fields['thebest']['box_one_title'] ?>
						</h3>
						<div class="block-header__divider"></div>
					</div>
					<div class="block-product-columns__column">

						<?php
						foreach ( $fields['thebest']['box_one_products'] as $product ) {
							$post = get_post($product);
							setup_postdata($post);
						?>
							<div class="block-product-columns__item">
								<?php get_template_part( 'woocommerce/content', 'product', [ 'class' => 'product-card--layout--horizontal' ] ); ?>
							</div>
						<?php } wp_reset_postdata(); ?>

					</div>
				</div>
			<?php } ?>

			<?php if( $fields['thebest']['box_two_products'] ) { ?>
				<div class="col-4">
					<div class="block-header">
						<h3 class="block-header__title">
							<?= $fields['thebest']['box_two_title'] ?>
						</h3>
						<div class="block-header__divider"></div>
					</div>
                    <div class="block-product-columns__column">

						<?php
						foreach ( $fields['thebest']['box_two_products'] as $product ) {
							$post = get_post($product);
							setup_postdata($post);
							?>
                            <div class="block-product-columns__item">
								<?php get_template_part( 'woocommerce/content', 'product', [ 'class' => 'product-card--layout--horizontal' ] ); ?>
                            </div>
						<?php } wp_reset_postdata(); ?>

                    </div>
				</div>
			<?php } ?>

			<?php if( $fields['thebest']['box_three_products'] ) { ?>
				<div class="col-4">
					<div class="block-header">
						<h3 class="block-header__title">
							<?= $fields['thebest']['box_three_title'] ?>
						</h3>
						<div class="block-header__divider"></div>
					</div>
                    <div class="block-product-columns__column">

						<?php
						foreach ( $fields['thebest']['box_three_products'] as $product ) {
							$post = get_post($product);
							setup_postdata($post);
							?>
                            <div class="block-product-columns__item">
								<?php get_template_part( 'woocommerce/content', 'product', [ 'class' => 'product-card--layout--horizontal' ] ); ?>
                            </div>
						<?php } wp_reset_postdata(); ?>

                    </div>
				</div>
			<?php } ?>

		</div>
	</div>
</div>
<!-- .block-product-columns / end -->
