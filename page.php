<?php get_header(); ?>

	<section id="primary">
		
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>
			
				<h1><?php the_title(); ?></h1>
		
				<?php the_content(); ?>
		
			<?php endwhile; ?>

		<?php endif; ?>
	
	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>