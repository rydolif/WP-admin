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
				<?php 
					wp_nav_menu( array(
						'menu'=>'menu',
						'menu_class'=>'list',
						'theme_location'=>'menu',
					) );
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
				<p class="hero__top-text"><?php the_field('hero_text'); ?></p>
				<h1 class="h1"><?php the_field('hero_title'); ?></h1>
				<p class="hero__subtitle">
					<?php the_field('hero_subtitle'); ?>
				</p>
				<div class="hero__btn">
					<a href="#document" class="btn">Записаться</a>
					<a href="#info" class="hero__down">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero__down.svg" alt="">
					</a>
				</div>
			</div>

		</div>
	</section>

	<?php if( get_field('info', 'option') ): ?>
		<?php if( get_field('info_desc') ): ?>
			<?php if( get_field('info_img') ): ?>
				<section class="info" id="info">
					<div class="container">

						<h2 class="h2">Важное объявление <br> нотариальной конторы:</h2>

						<div class="info__container">
							<div class="info__description">
								<?php the_field('info_desc'); ?>
							</div>
							<div class="info__img">
								<img src="<?php the_field('info_img'); ?>" alt="">
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
										<a href="#" class="actions__slider_more">Перечень необходимых документов <img src="<?php echo get_template_directory_uri(); ?>/assets/img/more.svg " alt=""></a>
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
		<section class="tariffs" id="tariffs">
			<div class="tariffs__container container">
				<h2 class="h2">Тарифы:</h2>
				<div class="tariffs__grid">
					<p class="tariffs__header">№</p>
					<p class="tariffs__header">Вид нотариального действия</p>
					<p class="tariffs__header">Тариф</p>
					<p class="tariffs__header">Размер платы за оказание услуг правового и технического характера</p>

					<p class="tariffs__item">1</p>
					<p class="tariffs__item">
						Удостоверение доверенностей на совершение сделок (сделки), требующих (требующей) нотариальной формы в 
						соответствии с законодательством Российской Федерации (кроме доверенностей, указанных в п. 4 настоящих 
						тарифов)
					</p>
					<p class="tariffs__item">200 руб.</p>
					<p class="tariffs__item">
						от физических лиц 1800 руб.
						<br>
						от юридических лиц 2700 руб.
					</p>

					<p class="tariffs__item">2</p>
					<p class="tariffs__item">
						Удостоверение прочих доверенностей, требующих нотариальной формы в соответствии с законодательством 
						Российской Федерации
					</p>
					<p class="tariffs__item">200 руб.</p>
					<p class="tariffs__item">
						от физических лиц 1800 руб.
						<br>
						от юридических лиц 2700 руб.
					</p>

					<p class="tariffs__item">3</p>
					<p class="tariffs__item">
						Удостоверение доверенностей, выдаваемых в порядке передоверия, в случаях, если такое удостоверение 
						обязательно в соответствии с законодательством Российской Федерации
					</p>
					<p class="tariffs__item">200 руб.</p>
					<p class="tariffs__item">
						от физических лиц 1800 руб.
						<br>
						от юридических лиц 2700 руб.
					</p>

					<p class="tariffs__item">4</p>
					<p class="tariffs__item">
						Удостоверение доверенностей на право пользования и (или) распоряжения имуществом, за исключением 
						автотранспортных средств:
						<br><br>
						- детям, в том числе усыновленным, супругу, родителям, полнородным братьям и сестрам;
						<br>
						- другим физическим лицам
					</p>
					<p class="tariffs__item">200 руб.</p>
					<p class="tariffs__item">
						от физических лиц 1800 руб.
						<br>
						от юридических лиц 2700 руб.
					</p>

					<p class="tariffs__item">5</p>
					<p class="tariffs__item">
						Удостоверение доверенностей, нотариальная форма которых не обязательна в соответствии 
						с законодательством Российской Федерации (в том числе доверенности на право пользования 
						или распоряжения автотранспортными средствами)
					</p>
					<p class="tariffs__item">200 руб.</p>
					<p class="tariffs__item">
						от физических лиц 1800 руб.
						<br>
						от юридических лиц 2700 руб.
					</p>

					<p class="tariffs__item">5.1</p>
					<p class="tariffs__item">
						Удостоверение доверенности на получение пенсии и социальных выплат, связанных с инвалидностью
					</p>
					<p class="tariffs__item">Освобождено</p>
					<p class="tariffs__item">
						1350 руб.
					</p>

					<p class="tariffs__item">5.2</p>
					<p class="tariffs__item">
						Удостоверение распоряжения об отмене доверенности
					</p>
					<p class="tariffs__item">200 руб.</p>
					<p class="tariffs__item">
						1200 руб.
					</p>

					<p class="tariffs__item">5.2</p>
					<p class="tariffs__item">
						Удостоверение договоров об отчуждении недвижимого имущества, подлежащих 
						обязательному нотариальному удостоверению
					</p>
					<p class="tariffs__item">0,5 процента суммы договора, но не менее 300 рублей и не более 20000 рублей</p>
					<p class="tariffs__item">
						6100 руб.
					</p>

				</div>
			</div>

			<div class="container">
				<div class="tariffs__pagination">
					<span>1</span>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
					<a href="#">5</a>
					<a href="#" class="tariffs__pagination_prev"></a>
					<a href="#" class="tariffs__pagination_next"></a>
				</div>
			</div>
		</section>
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
							<a href="mailto:<?php the_field('mail', 'option'); ?>"><?php the_field('mail', 'option'); ?></a>
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
		<?php if( get_field('document') ): ?>
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
						<?php the_field('document'); ?>
					</div>
					<div class="formPreview"></div>

					<!--  <form action="#" class="document__form form">
						<div class="document__form_line">
							<p><input type="text" name="name" placeholder="Ваше ФИО" class="form__input _req"></p>
							<p><input type="tel" name="phone" placeholder="Ваш номер телефона" class="form__input _req"></p>
							<p><input type="email" name="mail" placeholder="Ваш Email" class="form__input _req"></p>
						</div>
						<div class="document__form_textarea">
							<textarea name="message" class="form__textarea" placeholder="Введите сообщение..."></textarea>
						</div>
						<div class="document__form_file form__item">
							<div class="form__file">
								<div class="form__file_item">
									<input accept=".jpg, .png, .gif, .ico" type="file" name="image" class="formImage form__file_input">
									<label class="formLebel">Выберите файл</label>
								</div>
								<div id="formPreview3" class="formPreview form__file_preview"></div>
							</div>
						</div>
						<div class="form__item">
							<div class="form__checkbox">
								<input id="formAgreement3" checked type="checkbox" name="agreement" class="form__checkbox_input _req">
								<label for="formAgreement3" class="form__checkbox_label">
									<span>Я согласен на обработку <a href="#">персональных данных</a></span>
								</label>
							</div>
						</div>

						<div class="form__btn">
							<button type="submit" class="btn form__btn_button" name="submit">Отправить</button>
						</div>
					</form>-->

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

<?php
	get_footer();
