<?php
/*
Template Name: О Компании
Template Post Type: page
*/

get_header();
$image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' );
?>

	<div class="block about-us">
		<div class="about-us__image" style="background-image: url(<?= $image ?>)"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-xl-10">
					<div class="about-us__body">
						<?php the_title( '<h1 class="about-us__title">', '</h1>' ); ?>
						<div class="about-us__text typography">
							<?php the_content(); ?>
						</div>
						<div class="about-us__team">
							<h2 class="about-us__team-title"><?= __( 'Наш ассортимент', 'mega-tools' ) ?></h2>
							<div class="about-us__team-subtitle text-muted">

								<?= __( 'У нас можно купить товары таких известных брендов как', 'mega-tools' ) ?>
							</div>
							<div class="about-us__teammates teammates">
								<div class="owl-carousel">
									<div class="teammates__item teammate">
										<div class="teammate__avatar">
											<img src="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/metabo.jpg" alt="">
										</div>
										<div class="teammate__name">Metabo</div>
										<div class="teammate__position text-muted">Италия</div>
									</div>
									<div class="teammates__item teammate">
										<div class="teammate__avatar">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/bosch.jpg" alt="">
										</div>
										<div class="teammate__name">Bosch</div>
										<div class="teammate__position text-muted">Германия</div>
									</div>
									<div class="teammates__item teammate">
										<div class="teammate__avatar">
                                            <img src="<?= get_stylesheet_directory_uri() ?>/assets/dist/images/dewalt.jpg" alt="">
										</div>
										<div class="teammate__name">DeWalt</div>
										<div class="teammate__position text-muted">Франция</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
