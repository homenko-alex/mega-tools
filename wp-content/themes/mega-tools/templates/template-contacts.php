<?php
/*
Template Name: Контакты
Template Post Type: page
*/

get_header();
$contacts = get_field('contacts');

?>

    <div class="block-map block">
        <div class="block-map__body">
	        <?= $contacts['map'] ?>
        </div>
    </div>
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
	            <?= woocommerce_breadcrumb(['shop' => false]) ?>
            </div>
            <div class="page-header__title">
	            <?php the_title( '<h1>', '</h1>' ); ?>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="card mb-0">
                <div class="card-body contact-us">
                    <div class="contact-us__container">
                        <div class="row">
                            <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                <h4 class="contact-us__header card-title">
                                    <?= __( 'Наш адрес', 'mega-tools' ) ?>
                                </h4>
                                <div class="contact-us__address">
                                    <p>
                                        <?= $contacts['address'] ?><br>
	                                    <?= __( 'Email', 'mega-tools' ) ?>: <?= $contacts['email'] ?><br>
	                                    <?= __( 'Телефон', 'mega-tools' ) ?>: <?= $contacts['phone'] ?>
                                    </p>
                                    <p>
                                        <strong><?= __( 'Время работы', 'mega-tools' ) ?></strong><br>
	                                    <?= $contacts['time_work'] ?>
                                    </p>
                                    <p>
                                        <strong><?= __( 'Информация', 'mega-tools' ) ?></strong><br>
	                                    <?= $contacts['information'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h4 class="contact-us__header card-title"><?= __( 'Обратная связь', 'mega-tools' ) ?></h4>
                                <?= do_shortcode('[contact-form-7 id="235" title="Feedback"]') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
