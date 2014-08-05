<?php
/**
 * Loop Name: Team Members
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */

?>
<div class="team-member-grid row">
	<?php 
		$video_query = new WP_Query( array(
			'post_type' => array('teammembers'),
			'orderby' => 'date',
			'order' => 'ASC',
		)); 
		while ($video_query->have_posts() ) : $video_query->the_post(); 
	?>
		<section id="<?php the_ID(); ?>" class="team-member col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="wrap row">
				<div class="inner row">
					<?php if( get_field('member_picture')): ?>
						<div class="team-member-image col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<img src="<?php the_field('member_picture'); ?>" alt="<?php the_title(); ?>" />
						</div>
					<?php endif; ?>
					<div class="team-member-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<div class="row">
							<strong>Name:</strong>
							<span><?php the_title(); ?></span>
						</div>
						<?php if( get_field('member_title')): ?>
							<div class="row">
								<strong>Title:</strong>
								<span><?php the_field('member_title'); ?></span>
							</div>
						<?php endif; ?>
						<?php if( get_field('member_role')): ?>
							<div class="row">
								<strong>Role:</strong>
								<span><?php the_field('member_role'); ?></span>
							</div>
						<?php endif; ?>
						<?php if( get_field('member_tenure')): ?>
							<div class="row">
								<strong>Tenure:</strong>
								<span><?php the_field('member_tenure'); ?></span>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile ?>
</div>
