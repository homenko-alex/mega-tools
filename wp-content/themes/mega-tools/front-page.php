<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package titan
 */
get_header();

while ( have_posts() ) :

    the_post();

    /*
     * Home: Intro
     */
    get_template_part('template-parts/pages/home/home', 'intro');

    /*
     * Home: Catalog Category
     */
    get_template_part('template-parts/pages/home/home', 'catalog-category');


    /*
     * Блоки с слайдерами
     */
    $boxs = get_field( 'home-products-row', 'options' );
    if($boxs) :
        foreach ($boxs as $box) :
            if(!$box['home-products-row-slider-hide']) :
                ?>
                <!-- sliderbox -->
                <section class="sliderbox">
                    <!-- container -->
                    <div class="container-fluid">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">

                                <?php if(!empty($box['home-products-row-slider-title'])) : ?>
                                    <!-- headpanel -->
                                    <div class="headpanel">
                                        <!-- title -->
                                        <h2 class="h2 headpanel__title">
                                            <?= $box['home-products-row-slider-title'] ?>
                                        </h2>
                                        <!-- end title -->

                                        <?php if(!empty($box['home-products-row-slider-link'])) : ?>
                                            <!-- link -->
                                            <a href="<?= $box['home-products-row-slider-link'] ?>" class="headpanel__link">Смотреть все</a>
                                            <!-- end link -->
                                        <?php endif; ?>
                                    </div>
                                    <!-- end headpanel -->
                                <?php endif; ?>

                                <?php
                                /*
                                 * Автоматический режим
                                 */
                                if(!$box['home-products-row-slider-type']) :

                                    $type = $box['home-products-row-slider-type-auto']['home-products-row-slider-type-auto-type'];

                                    switch ($type) :
                                        case 'new':
                                            $args = array(
                                                'post_type'         => 'product',
                                                'posts_per_page'    => $box['home-products-row-slider-type-auto']['home-products-row-slider-type-auto-count'],
                                                'orderby'           => 'date',
                                                'order'             => 'DESC',
                                            );
                                            break;
                                        case 'top':
                                            $args = array(
                                                'post_type'             => 'product',
                                                'posts_per_page'        => $box['home-products-row-slider-type-auto']['home-products-row-slider-type-auto-count'],
                                                'tax_query'             => array(
                                                    array(
                                                        'taxonomy' => 'product_visibility',
                                                        'field'    => 'name',
                                                        'terms'    => 'featured',
                                                    ),
                                                ),
                                            );
                                            break;
                                        case 'featured':
                                            $args = array(
                                                'post_type'             => 'product',
                                                'posts_per_page'        => $box['home-products-row-slider-type-auto']['home-products-row-slider-type-auto-count'],
                                                'tax_query'             => array(
                                                    array(
                                                        'taxonomy' => 'product_visibility',
                                                        'field'    => 'name',
                                                        'terms'    => 'featured',
                                                    ),
                                                ),
                                            );
                                            break;
                                    endswitch;

                                endif;
                                /*
                                 * END Автоматический режим
                                 */

                                /*
                                 * Ручной режим
                                 */
                                if($box['home-products-row-slider-type']) :

                                    if($box['home-products-row-slider-type-default']['home-products-row-slider-type-default-products']) :
                                        $args = array(
                                            'post_type'         => 'product',
                                            'post__in'             => $box['home-products-row-slider-type-default']['home-products-row-slider-type-default-products']
                                        );
                                    endif;

                                endif;
                                /*
                                 * END Ручной режим
                                 */


                                $loop = new WP_Query( $args );
                                ?>

                                <?php if ( $loop->have_posts() ) : ?>
                                    <!-- swiper -->
                                    <div class="swiper-sliderbox">
                                        <!-- container -->
                                        <div class="carousel swiper-container">
                                            <!-- wrapper -->
                                            <div class="swiper-wrapper products__list">

                                                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                                    <?= wc_get_template_part( 'content', 'widget-product' ); ?>

                                                <?php endwhile; wp_reset_postdata(); ?>

                                            </div>
                                            <!-- end wrapper -->
                                        </div>
                                        <!-- end container -->
                                        <!-- controls -->
                                        <div class="swiper-controls">
                                            <!-- btn > prev -->
                                            <div class="swiper-button-prev swiper__btnOutContentLeft">
                                                <i class="fa fa-angle-left"></i>
                                            </div>
                                            <!-- end btn > prev -->
                                            <!-- pagination -->
                                            <div class="swiper-pagination visible-xs"></div>
                                            <!-- end pagination -->
                                            <!-- btn > next -->
                                            <div class="swiper-button-next swiper__btnOutContentRight">
                                                <i class="fa fa-angle-right"></i>
                                            </div>
                                            <!-- end btn > next -->
                                        </div>
                                        <!-- end controls -->
                                    </div>
                                    <!-- end swiper -->
                                <?php endif; ?>

                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </section>
                <!-- end sliderbox -->
            <?php
            endif;
        endforeach;
    endif;

    /*
     * Home: Viewed Products
     */
    get_template_part('template-parts/catalog/catalog', 'viewed-products');


    /*
     * Home: Advantages
     */
    get_template_part('template-parts/pages/home/home', 'advantages');

    /*
     * Partial: Instagram
     */
    if (!get_field('home-slider-hide', get_the_ID())) :
        get_template_part('template-parts/partials/partial', 'instagram');
    endif;
    /*
     * Home: Seo
     */
    get_template_part('template-parts/pages/home/home', 'seo');

endwhile; // End of the loop.

get_footer();
