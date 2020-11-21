
<?php get_header(); ?>

	<section class="error-404">
		<div class="container">

			<div class="error-404__wrap">
				<h2 class="page-title"><?php esc_html_e( 'К сожалению страница не найдена!', 'schoolstudy' ); ?></h2>
				<a href="<?php echo get_home_url(); ?>" class="btn">Повернутися на головну</a>
			</div>

		</div>
	</section>

<?php get_footer(); ?>
