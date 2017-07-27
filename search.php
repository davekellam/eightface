<?php get_header(); ?>

	<section id="primary">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>		
				<div id="post-<?php the_ID(); ?>" class="post">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<?php the_excerpt() ?>
					<p><?php the_time('F j, Y') ?></p>
				</div>
			<?php endwhile; ?>

			<div id="pagination">
				<div class="earlier">
					<?php next_posts_link( '&larr; Earlier' ); ?>
				</div>
				
				<?php 
					global $paged;
					if( $paged != 1 ) : 
						echo "<span class=\"page-num\">&ndash; " . $paged . " &ndash;</span>";
				?>

				<div class="later">
					<?php previous_posts_link( "Later &rarr;" ); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php else : ?>

			<h1>No results</h1>

			<p>My apologies, whatever you were looking for isn't here. You may have fallen victim to a typo, the page may have moved, or it never existed in the first place. Take your pick.</p>

			<h2>Try Again?</h2>
				
			<?php get_search_form(); ?>
		<?php endif; ?>		
	</section>

<?php get_footer(); 