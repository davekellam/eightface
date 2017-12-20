<?php 

get_header(); 

$post_year = get_the_time('Y');

?>

	<section id="primary">

	<?php if ( have_posts()) : ?> 
		<?php while ( have_posts() ) : the_post(); ?>

			<article class="post single">
				<?php the_post_thumbnail( 'large' ); ?>

				<?php if ( in_category( 2 ) ) : ?>
			
					<?php if( $post_year >= 2005 ) : ?>

						<?php the_content(); ?>
				
					<?php else : $postarray; ?>	
						<?php if( preg_match( '?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray ) ) : ?>
							<p><a href="http://<?php preg_match( '?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray ); echo $postarray[1]; ?>"><?php echo $post->post_title; ?></a><br /><?php preg_match( '?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray); echo $postarray[2]; ?></p>
						<?php else : ?>	
							<p><a href="<?php echo $post->post_content; ?>"><?php echo $post->post_title; ?></a></p>
						<?php endif; ?>
					<?php endif; ?>

				<?php else : ?>
						<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
				<?php endif; ?>

				<aside class="meta"> 
					<?php the_time( 'F j, Y' ) ?>
					<?php if( get_the_tags() ) : ?>
						<span class="tags"> &middot; <?php the_tags( '', ' ' ); ?></span>
					<?php endif; ?> 					
				</aside>
			</article>

			<?php endwhile; ?>
		<?php endif; ?>
		
		<p>If you enjoyed this post, please <a href="/subscribe/">subscribe</a>.</p>

	</section>

<?php get_footer();