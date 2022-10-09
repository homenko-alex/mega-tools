<?php
defined( 'ABSPATH' ) || exit;
$fields = get_field('home');

if( !$fields['blog']['lists'] || !$fields['blog']['active'] ) return;
$items = get_posts([
	'posts_per_page' => -1,
    'include' => $fields['blog']['lists'],
]);
if( $items )
{
    ?>
    <!-- .block-posts -->
    <div class="block block-posts" data-layout="list" data-mobile-columns="1">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title"><?= $fields['blog']['title'] ?></h3>
                <div class="block-header__divider"></div>
                <div class="block-header__arrows-list">
                    <button class="block-header__arrow block-header__arrow--left" type="button">
                        <svg width="7px" height="11px">
                            <use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#arrow-rounded-left-7x11"></use>
                        </svg>
                    </button>
                    <button class="block-header__arrow block-header__arrow--right" type="button">
                        <svg width="7px" height="11px">
                            <use xlink:href="<?= get_template_directory_uri() ?>/assets/dist/images/sprite.svg#arrow-rounded-right-7x11"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="block-posts__slider">
                <div class="owl-carousel">
					<?php
                    foreach( $items as $post )
                    {
                        setup_postdata( $post );
                        $category = get_the_category();

                    ?>
                        <div class="post-card  ">
                            <div class="post-card__image">
                                <a href="<?= get_the_permalink() ?>">
                                    <img src="<?= kama_thumb_src( 'wh=730:490 &q=75' ) ?>" alt="<?= get_the_title() ?>" title="<?= get_the_title() ?>">
                                </a>
                            </div>
                            <div class="post-card__info">
                                <?php if( $category ) { ?>
                                <div class="post-card__category">
                                    <a href="<?= get_category_link($category[0]->term_id) ?>"><?= $category[0]->name ?></a>
                                </div>
                                <?php } ?>
                                <div class="post-card__name">
                                    <a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a>
                                </div>
                                <div class="post-card__date">
                                    <?= get_the_date('j F, Y', get_the_ID()) ?>
                                </div>
                                <div class="post-card__content">
	                                <?php the_excerpt(); ?>
                                </div>
                                <div class="post-card__read-more">
                                    <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
					<?php } wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- .block-posts / end -->
    <?php

}
