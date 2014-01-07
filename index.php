<?php 

get_header(); 

$prev_post_day; 
$the_day; 
?>

	<section id="primary">

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( in_category(4) ) : ?>
			<article class="post relic">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>	

				<?php $prev_post_day = get_the_time( 'j' ); ?>

	<?php elseif ( in_category(2) ) : ?>    
				<article class="post link"> 
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>  
				
				<?php $post_year = get_the_time( 'Y' ); if ( $post_year >= 2005 ) : $postarray; ?>
					<?php the_content(); ?>
			
			<?php else : $postarray;	
				
			if( preg_match( '?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray ) ) : ?>
				<p><a href="http://<?php preg_match('?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray ); echo $postarray[1]; ?>"><?php echo $post->post_title; ?></a><br /><?php preg_match('?http://([^"]*)<br />([^"]*)?', $post->post_content, $postarray); echo $postarray[2]; ?></p>
			<?php else : ?>	
				<p><a href="<?php echo $post->post_content; ?>"><?php echo $post->post_title; ?></a></p>
			<?php endif; ?> 
			
	<?php endif; ?>

	<?php else : ?>
		<article>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php the_content(); ?>
		<?php endif; ?>

		<div class="meta">
			<span class="posted"><?php the_time( 'F j, Y' ) ?></span>
			<?php if( get_the_tags() ) : ?><span class="tags">&middot; <?php the_tags( '', ' ' ); ?></span><?php endif; ?>
			</div>
		</article>
	<?php endwhile; ?>	

	<?php if ( is_year() || is_search() || is_category() || is_tag() || is_archive() ) :?>
		<div id="pagination">
			<div class="earlier"><?php next_posts_link( "&larr; Earlier" ); ?></div>
		<?php global $paged; if( $paged != 1 ) : ?>
			<div class="later"><?php previous_posts_link( "Later &rarr;" ); ?></div>
	<?php else : ?>
	<?php endif; ?>
	</div>
	<?php endif; ?>
	</section>

<?php get_footer(); ?>