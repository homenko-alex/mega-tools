<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !$fields['slider']['list'] || !$fields['slider']['active'] ) return;

?>
<!-- .block-slideshow -->
<div class="block-slideshow block-slideshow--layout--with-departments block">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 d-none d-lg-block"></div>
			<div class="col-12 col-lg-9">
				<div class="block-slideshow__body">
					<div class="owl-carousel">
                        <?php foreach ( $fields['slider']['list'] as $field ) { ?>
						<a class="block-slideshow__slide" href="<?= ($field['link'] && $field['link']['url']) ? $field['link']['url'] : '' ?>">
							<div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('<?= wp_get_attachment_image_url($field['image'], 'full') ?>')"></div>
							<div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('<?= wp_get_attachment_image_url($field['image'], 'full') ?>')"></div>
							<div class="block-slideshow__slide-content">
                                <?php if( $field['title'] ) { ?>
                                    <div class="block-slideshow__slide-title">
                                        <?= $field['title'] ?>
                                    </div>
                                <?php } ?>
								<?php if( $field['excerpt'] ) { ?>
                                    <div class="block-slideshow__slide-text">
                                        <?= $field['excerpt'] ?>
                                    </div>
								<?php } ?>
								<?php if( $field['link'] && $field['link']['title'] ) { ?>
								<div class="block-slideshow__slide-button">
									<span class="btn btn-primary btn-lg"><?= $field['link']['title'] ?></span>
								</div>
								<?php } ?>
							</div>
						</a>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- .block-slideshow / end -->
