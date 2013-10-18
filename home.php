<?php get_header(); ?>

<section id="primary">	
	<?php while (have_posts()) : the_post(); ?>	
 	<article>
  		<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?> &mdash; <?php the_time('F j, Y') ?>"><?php the_title(); ?></a></h2> 
  		<?php the_content(); ?>	
  		<aside class="meta">
   			<?php the_time('F jS') ?>
  			<?php if(get_the_tags()) : ?>&middot; <?php the_tags('', ' '); ?><?php endif; ?>
			<?php edit_post_link("edit"," &middot; "); ?> 
		</aside>
 	</article>
 	<?php endwhile; ?>

	<div id="pagination">
			<?php next_posts_link('&larr; Earlier'); ?>
			<?php previous_posts_link('Later &rarr;'); ?>
	</div>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>