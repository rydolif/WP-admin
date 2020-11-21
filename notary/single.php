
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="hero hero--page" id="hero">
		<a href="<?php echo get_home_url(); ?>" class="btn">Вернутся на главную</a>
	</section>

	<section class="info" id="info">
		<div class="container">

			<h2 class="h2"><?php the_title(); ?></h2>

			<div class="info__container">
				<div class="info__description">
					<?php the_content(); ?>
				</div>
				<div class="info__img">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					} else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/no.png" alt="<?php the_title(); ?>" />
					<?php } ?>
				</div>
			</div>

		</div>
	</section>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>