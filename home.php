<?php get_header(); ?>

<section id="primary">	
	<?php while ( have_posts() ) : the_post(); ?>	
		<article>
			<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?> &mdash; <?php the_time('F j, Y') ?>"><?php the_title(); ?></a></h1>

			<?php the_content(); ?>	
			
			<div class="meta">
				<span class="posted"><?php the_time( 'F j, Y' ) ?></span>
				<?php if( get_the_tags() ) : ?>&middot; <?php the_tags( '', ' ' ); ?><?php endif; ?>
			</div>
		</article>
 	
 	<?php endwhile; ?>

	<div id="pagination">
			<?php next_posts_link( '&larr; Earlier' ); ?>
			<?php previous_posts_link( 'Later &rarr;' ); ?>
	</div>
</section>

<?php get_footer();