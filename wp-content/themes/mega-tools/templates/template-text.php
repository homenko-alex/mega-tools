<?php
/*
Template Name: Текстовая страница
Template Post Type: page
*/

get_header();
?>

    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
                <nav aria-label="breadcrumb">
	                <?= woocommerce_breadcrumb(['shop' => false]) ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="document">
                <div class="document__header">
	                <?php the_title( '<h1 class="document__title">', '</h1>' ); ?>
                    <div class="document__subtitle"><?= __( 'Информация для покупателей', 'mega-tools' ) ?></div>
                </div>
                <div class="document__content typography">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
