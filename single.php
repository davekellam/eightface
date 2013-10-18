<?php get_header(); ?>

	<section id="primary">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if (in_category(4)) : ?>
			<article class="post single">
			<?php the_content(); ?>

		<?php elseif (in_category(2)) : ?>
			<article class="post single link">
				<h2><?php the_title(); ?></h2>
				<?php $post_year = get_the_time('Y'); ?>
				<?php if( $post_year >= 2005 ) : the_content(); ?>
				<?php else : $postarray; ?>	
					<?php if(preg_match('?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray)) : ?>
						<p><a href="http://<?php preg_match('?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray); echo $postarray[1]; ?>"><?php echo $post->post_title; ?></a><br /><?php preg_match('?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray); echo $postarray[2]; ?></p>
					<?php else : ?>	
						<p><a href="<?php echo $post->post_content; ?>"><?php echo $post->post_title; ?></a></p>
					<?php endif; ?>
				<?php endif; ?>

		<?php else : ?>
			<article class="post single">
				<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				<?php endif; ?>

				<aside class="meta"> 
					<?php the_time('F j, Y') ?>
					<?php if(get_the_tags()) : ?><span class="tags"> &middot; <?php the_tags("", " "); ?></span><?php endif; ?> 					
				</aside>
			</article>

		<?php endwhile; endif; ?>
		
		<p>If you enjoyed the post, subscribe to the <a href="http://eightface.com/feed/"><acronym>RSS</acronym>&nbsp;feed</a> or <a href="http://twitter.com/eightface">@eightface</a> for updates.</p>

	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?> 