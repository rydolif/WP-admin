
<?php get_header(); ?>

	<section class="news"> 
		<div class="container">

			<h2 class="news__subtitle subtitle"><b>Новости</b> компании</h2>

			<?php 
				wp_nav_menu( array(
				'menu'=>'category',
				'menu_class'=>'news__filter',
				'theme_location'=>'menu',
				) );
			?>

			<div class="news__list">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="news__list_item">
						<div class="news__list_wrap">
							<div>
								<a href="<?php the_permalink(); ?>" class="news__list_img">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/no.png" class="" alt="<?php the_title(); ?>" />
									<?php } ?>
								</a>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>

							<p class="news__list_more">
								<time datetime="2017-04-20"><?php echo get_the_date('Y/m/d'); ?></time>
								<a href="<?php the_permalink(); ?>">Подробнее</a>
							</p>

						</div>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<?php wptuts_pagination(); ?> 

		</div>
	</section>

	<section class="question question--bg" id="question">
		<div class="question__container container">

			<div class="question__desc">
				<h2 class="question__subtitle subtitle">
					Остались вопросы? <br> <b>Готовы к <br> сотрудничеству?</b>
				</h2>
				<p>Заполните форму  обратной связи и наш менеджер свяжеться с Вами в ближайшее время.</p>
				<p class="question__desc_center">или</p>
				<ul>
					<li>
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/phone.png" alt="">Звоните</span>
						<a href="tel:+74959229355"><b>+7 (495) 922-93-55</b></a>
					</li>
					<li>
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/mail.png" alt="">Пишите</span>
						<a href="mailto:info@solergy.ru"><b>info@solergy.ru</b></a>
					</li>
				</ul>
			</div>

			<div class="question__form form">
				<?php echo do_shortcode( '[contact-form-7 id="34" title="Контакты"]' ); ?>
			</div>

		</div>
	</section>

<?php get_footer(); ?>