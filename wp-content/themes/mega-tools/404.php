<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mega-tools
 */

get_header();
?>

    <div class="block">
        <div class="container">
            <div class="not-found">
                <div class="not-found__404">
	                <?php esc_html_e( 'Ой! Ошибка 404', 'mega-tools' ); ?>
                </div>
                <div class="not-found__content">
                    <h1 class="not-found__title"><?php esc_html_e( 'Страница не найдена', 'mega-tools' ); ?></h1>
                    <p class="not-found__text">
	                    <?php esc_html_e( 'Мы не можем найти страницу, которую вы ищете.', 'mega-tools' ); ?><br>
	                    <?php esc_html_e( 'Попробуйте воспользоваться поиском.', 'mega-tools' ); ?>
                    </p>
                    <form class="not-found__search">
                        <input type="text" class="not-found__search-input form-control" placeholder="<?php esc_html_e( 'Товар', 'mega-tools' ); ?>">
                        <button type="submit" class="not-found__search-button btn btn-primary"><?php esc_html_e( 'Поиск', 'mega-tools' ); ?></button>
                    </form>
                    <p class="not-found__text">
	                    <?php esc_html_e( 'Или перейдите на главную страницу.', 'mega-tools' ); ?>
                    </p>
                    <a class="btn btn-secondary btn-sm" href="<?= home_url() ?>"><?php esc_html_e( 'Главная', 'mega-tools' ); ?></a>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
