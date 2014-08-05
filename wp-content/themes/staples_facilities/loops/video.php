<?php
/**
 * Loop Name: Video
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */

?>
<div class="video-grid flush row">
	<?php 
		$video_query = new WP_Query( array(
			'post_type' => array('video'),
			'orderby' => 'date',
			'order' => 'DESC',
		)); 
		while ($video_query->have_posts() ) : $video_query->the_post(); 
	?>
		<section id="<?php the_ID(); ?>" class="<?php $terms = wp_get_object_terms($post->ID, 'type'); echo $terms[0]->slug;?> video col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="wrap row">
				<?php if( get_field('video_poster')): ?>
                    <a class="video-poster thumb" href="<?php the_permalink(); ?>">
						<img src="<?php the_field('video_poster'); ?>" alt="<?php the_title(); ?>" />
					</a>
				<?php endif; ?>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<h6 class="type"><?php echo get_the_term_list( $post->ID, 'type');?></h6>
				<h1></h1>
			</div>
		</section>
	<?php endwhile ?>
</div>

