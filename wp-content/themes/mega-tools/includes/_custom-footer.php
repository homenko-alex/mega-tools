<?php
defined( 'ABSPATH' ) || exit;
/*
 * @mega_footer_TagFooterOpen
*/
add_action( 'footer_parts', 'mega_footer_TagFooterOpen', 20 );
function mega_footer_TagFooterOpen() {
	?>
  	<!-- FOOTER -->
  	<footer class="site__footer">
	<?php
};
/*
 * @mega_footer_TagFooterInner
*/
add_action( 'footer_parts', 'mega_footer_TagFooterInner', 30 );
function mega_footer_TagFooterInner() {
	?>

    <div class="site-footer">
        <div class="container">
            <div class="site-footer__widgets">
                <div class="row">

	                <?php if ( is_active_sidebar( 'footer-contacts' ) ) { ?>
		                <?php dynamic_sidebar( 'footer-contacts' ); ?>
                    <?php } ?>

	                <?php if ( is_active_sidebar( 'footer-menu' ) ) { ?>
		                <?php dynamic_sidebar( 'footer-menu' ); ?>
	                <?php } ?>

	                <?php if ( is_active_sidebar( 'footer-menu-account' ) ) { ?>
		                <?php dynamic_sidebar( 'footer-menu-account' ); ?>
	                <?php } ?>

	                <?php if ( is_active_sidebar( 'footer-right-column' ) ) { ?>
		                <?php dynamic_sidebar( 'footer-right-column' ); ?>
	                <?php } ?>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="site-footer__copyright">
                    <!-- copyright -->
                    <?= __( 'Создание и поддержка', 'mega-tools' ) ?> — <a href="https://www.instagram.com/cherniy_itm/" target="_blank">Alex Cherniy</a>
                    <!-- copyright / end -->
                </div>
                <div class="site-footer__payments">
                    <img src="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/payments.png" alt="">
                </div>
            </div>
        </div>
        <div class="totop">
            <div class="totop__body">
                <div class="totop__start"></div>
                <div class="totop__container container"></div>
                <div class="totop__end">
                    <button type="button" class="totop__button">
                        <svg width="13px" height="8px">
                            <use xlink:href="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/sprite.svg#arrow-rounded-up-13x8"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

	<?php
};
/*
 * @mega_footer_TagFooterClose
*/
add_action( 'footer_parts', 'mega_footer_TagFooterClose', 100 );
function mega_footer_TagFooterClose() {
	?>
  	</footer>
  	<!-- END FOOTER -->
	<?php
};
