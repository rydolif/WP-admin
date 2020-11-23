
<?php get_header(); ?>

	<header class="header 
		<?php if( get_field('header__fixed', 'option') ): ?>
			header--absolute
		<?php endif; ?>
		">
		<div class="header__container container">

			<a href="<?php echo get_home_url(); ?>" class="header__logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
			</a>

		</div>
	</header>

	<section class="hero" id="hero">
		<div class="container">

			<div class="hero__description">
				<h1 class="h1"><?php esc_html_e( 'Cтраница не найдена "404"', 'schoolstudy' ); ?></h1>
				<p class="hero__subtitle">
					Страница, на которую Вы хотели перейти, не найдена.
					<br>Возможно, введён некорректный адрес или страница 
					<br>была удалена.
				</p>
				<div class="hero__btn">
					<a href="<?php echo get_home_url(); ?>" class="btn">На Главную</a>
				</div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>
