<?php
	get_header();
?>

	<header class="header 
		<?php if( get_field('header__fixed', 'option') ): ?>
			header--absolute
		<?php endif; ?>
		">
		<div class="header__container container">

			<a href="<?php echo get_home_url(); ?>" class="header__logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
			</a>

			<nav class="header__nav">

				<ul>
					<li><a href="#hero">Главная</a></li>
					<?php if( get_field('info', 'option') ): ?><li><a href="#info">Объявление</a></li><?php endif; ?>
					<?php if( get_field('news', 'option') ): ?><li><a href="#news">Новости</a></li><?php endif; ?>
					<?php if( get_field('actions', 'option') ): ?><li><a href="#actions">Нотариальные действия</a></li><?php endif; ?>
					<?php if( get_field('tariffs', 'option') ): ?><li><a href="#tariffs">Тарифы</a></li><?php endif; ?>
					<?php if( get_field('contacts', 'option') ): ?><li><a href="#contacts">Контакты</a></li><?php endif; ?>
					<?php if( get_field('document', 'option') ): ?><li><a href="#document">Отправить документы</a></li><?php endif; ?>
					<?php if( get_field('registers', 'option') ): ?>	<li><a href="#registers">Публичные реестры</a></li><?php endif; ?>
				</ul>

				<?php 
					// wp_nav_menu( array(
					// 	'menu'=>'menu',
					// 	'menu_class'=>'list',
					// 	'theme_location'=>'menu',
					// ) );
				?>
			</nav> 

			<button class="hamburger" type="button">
				<span class="hamburger__box">
					<span class="hamburger__item"></span>
				</span>
			</button>

		</div>
	</header>

	<section class="hero" id="hero">
		<div class="container">

			<div class="hero__description">
				<p class="hero__top-text"><?php the_field('hero_text', 'option'); ?></p>
				<h1 class="h1"><?php the_field('hero_title', 'option'); ?></h1>
				<p class="hero__subtitle">
					<?php the_field('hero_subtitle', 'option'); ?>
				</p>
				<div class="hero__btn">
				<?php if( get_field('document', 'option') ): ?>
					<a href="#document" class="btn">Записаться</a>
				<?php endif; ?>
				<?php if( get_field('info', 'option') ): ?>
					<a href="#info" class="hero__down">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero__down.svg" alt="">
					</a>
				<?php endif; ?>
				</div>
			</div>

		</div>
	</section>

	<?php if( get_field('info', 'option') ): ?>
		<?php if( get_field('info_desc', 'option') ): ?>
			<?php if( get_field('info_img', 'option') ): ?>
				<section class="info" id="info">
					<div class="container">

						<h2 class="h2">Важное объявление <br> нотариальной конторы:</h2>

						<div class="info__container">
							<div class="info__description">
								<?php the_field('info_desc', 'option'); ?>
							</div>
							<div class="info__img">
								<img src="<?php the_field('info_img', 'option'); ?>" alt="">
							</div>
						</div>

					</div>
				</section>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field('news', 'option') ): ?>
		<section class="news" id="news">
			<div class="news__container container">

				<h2 class="h2">Новости нотариуса:</h2>

				<div class="news__list">
					<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

						$args = array(
								'post_type'=>'new', // Your post type name
								'posts_per_page' => 3,
								'paged' => $paged,
						);

						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
								while ( $loop->have_posts() ) : $loop->the_post();
						?>
							<div class="news__item">
								<a href="<?php the_permalink(); ?>" class="news__item_img">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/no.png" />
									<?php } ?>
								</a>
								<div class="news__item_desc">
									<h4 class="h4">
										<a href="#">
											<?php the_title(); ?>
										</a>
									</h4>
									<?php the_excerpt(); ?>
									<div class="news__item_more">
										<a href="<?php the_permalink(); ?>">
											Читать далее 
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/more.svg" alt="">
										</a>
										<time datetime="1969-07-16">
											<?php echo get_the_date('Y-m-d'); ?>
										</time>
									</div>
								</div>
							</div>
						<?php
							endwhile;
						}
						wp_reset_postdata();
					?>
				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php if( get_field('actions', 'option') ): ?>
		<?php if( have_rows('actions') ): ?>
			<?php $num = 1; ?>
			<section class="actions" id="actions">
				<div class="actions__container container">

					<h2 class="h2">Нотариальные действия:</h2>

					<div class="actions__slider">
						<div class="swiper-wrapper">

							<?php while( have_rows('actions') ): the_row(); 
								$name = get_sub_field('name');
								$text = get_sub_field('text');
							?>
								<div class="actions__slider_item swiper-slide">
									<div class="actions__slider_number"></div>
									<div class="actions__slider_desc">
										<h4 class="h4"><?php echo $name; ?></h4>
										<?php echo $text; ?>
										<a href="#" class="modal__edits--<?php echo $num++ ?> actions__slider_more">Перечень необходимых документов <img src="<?php echo get_template_directory_uri(); ?>/assets/img/more.svg " alt=""></a>
									</div>
								</div>
							<?php endwhile; ?>

						</div>
						<div class="actions__nav">
							<div class="actions__pagination"></div>
							<div class="actions__button">
								<div class="actions__button_prev">
									<svg width="32" height="15" viewBox="0 0 32 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<line y1="7.36987" x2="31" y2="7.36987" stroke="#7E182F"/>
										<line x1="31.6464" y1="7.66239" x2="24.3375" y2="0.353449" stroke="#7E182F"/>
										<line y1="-0.5" x2="10.3364" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 32 7.56104)" stroke="#7E182F"/>
									</svg>
								</div>
								<div class="actions__button_next">
									<svg width="32" height="15" viewBox="0 0 32 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<line y1="7.36987" x2="31" y2="7.36987" stroke="#7E182F"/>
										<line x1="31.6464" y1="7.66239" x2="24.3375" y2="0.353449" stroke="#7E182F"/>
										<line y1="-0.5" x2="10.3364" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 32 7.56104)" stroke="#7E182F"/>
									</svg>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field('tariffs', 'option') ): ?>
		<?php if( get_field('tariffs_table') ): ?>
			<section class="tariffs" id="tariffs">
				<div class="tariffs__container container">
					<h2 class="h2">Тарифы:</h2>
					<?php the_field('tariffs_table'); ?>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field('contacts', 'option') ): ?>
		<section class="contacts" id="contacts">
			<div class="container">

				<h2 class="h2">Контактная информация:</h2>
				<div class="contacts__wrap">
					<div class="contacts__info">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" class="contacts__info_logo" alt="">
						<p class="contacts__info_tel">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/tel.svg" alt="">
							<a href="tel:<?php the_field('tel_link', 'option'); ?>"><?php the_field('tel', 'option'); ?>3</a>
						</p>
						<p class="contacts__info_place">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/place.svg" alt="">
							<span><?php the_field('place', 'option'); ?></span>
						</p>
						<p class="contacts__info_mail">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/mail.svg" alt="">
							<a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
						</p>
						<p class="contacts__info_time">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/time.svg" alt="">
							<span><?php the_field('time', 'option'); ?></span>
						</p>
					</div>
					<div class="contacts__iframe">
						<?php the_field('iframe', 'option'); ?>
					</div>
				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php if( get_field('document', 'option') ): ?>
		<?php if( get_field('document_wrap', 'option') ): ?>
			<section class="document" id="document">
				<div class="container">

					<h2 class="h2">Отправка документов:</h2>
					<p class="document__text">
						Предлагаем, для вашего удобства, предварительно (до визита к нотариусу) отправить <br>
						документы необходимые для подготовки. Мы сделаем все необходимые формы и бумаги <br>
						заранее — до вашего приезда к нам. Это позволит значительно сэкономить время, а также <br>
						предупредить вас в случае нехватки каких-то данных. Заполните поля формы, <br>
						расположенной ниже, и загрузите электронные копии документов. <br>
						Мы свяжемся с вами, если у нас возникнут вопросы. Для этого, укажите, пожалуйста, <br>
						номер телефона и адрес электронной почты.После отправки дождитесь <br>
						уведомления о готовности документов
					</p>
					
					<div class="document__form form">
						<?php the_field('document_wrap', 'option'); ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field('registers', 'option') ): ?>
		<?php if( have_rows('registers') ): ?>
			<section class="registers" id="registers">
				<div class="registers__container container">

					<h2 class="h2">Публичные реестры:</h2>

					<div class="registers__slider">
						<div class="swiper-wrapper">
							<?php while( have_rows('registers') ): the_row(); 
								$link = get_sub_field('link');
								$img = get_sub_field('img');
								$text = get_sub_field('text');
								?>

								<a href="<?php echo $link; ?>" class="registers__slider_item swiper-slide">
									<img src="<?php echo $img; ?>" alt="">
									<p><?php echo $text; ?></p>
								</a>

							<?php endwhile; ?>
						</div>

						<div class="actions__nav">
							<div class="registers__pagination"></div>
							<div class="registers__button">
								<div class="registers__button_prev">
									<svg width="32" height="15" viewBox="0 0 32 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<line y1="7.36987" x2="31" y2="7.36987" stroke="#7E182F"/>
										<line x1="31.6464" y1="7.66239" x2="24.3375" y2="0.353449" stroke="#7E182F"/>
										<line y1="-0.5" x2="10.3364" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 32 7.56104)" stroke="#7E182F"/>
									</svg>
								</div>
								<div class="registers__button_next">
									<svg width="32" height="15" viewBox="0 0 32 15" fill="none" xmlns="http://www.w3.org/2000/svg">
										<line y1="7.36987" x2="31" y2="7.36987" stroke="#7E182F"/>
										<line x1="31.6464" y1="7.66239" x2="24.3375" y2="0.353449" stroke="#7E182F"/>
										<line y1="-0.5" x2="10.3364" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 32 7.56104)" stroke="#7E182F"/>
									</svg>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field('actions', 'option') ): ?>
		<?php if( have_rows('actions') ): ?>
		<?php $num = 1; ?>
			<?php while( have_rows('actions') ): the_row(); 
					$modal = get_sub_field('modal');
				?>
					<div class="modal" id="modal__edits--<?php echo $num++ ?>">
						<div class="modal__form">

							<button class="close modal__close" type="button">
								<span></span>
								<span></span>
							</button>

								<?php echo $modal; ?>

					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endif; ?>


<?php
	get_footer();
