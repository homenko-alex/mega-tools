<?php
defined( 'ABSPATH' ) || exit;
/*
 * @mega_footer_TagFooterOpen
*/
add_action( 'footer_parts', 'mega_footer_TagFooterOpen', 20 );
function mega_footer_TagFooterOpen() {
	?>
  	<!-- FOOTER -->
  	<footer class="footer">
	<?php
};
/*
 * @mega_footer_TagFooterInner
*/
add_action( 'footer_parts', 'mega_footer_TagFooterInner', 30 );
function mega_footer_TagFooterInner() {
	?>



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
