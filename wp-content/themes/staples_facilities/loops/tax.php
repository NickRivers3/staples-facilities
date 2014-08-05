<?php
/**
 * Loop Name: Tax
 *
 * @package WordPress
 * @subpackage staples_facilties
 * @since staples_facilties 1.0
 *
 */

?>
<table class="resource">
    <thead>
        <tr>
            <th class="right-border">Name of Document or Media</th>
            <th class="right-border">Media Type</th>
        </tr>
    </thead>
    <tbody>
    <?php
		global $query_string;
		query_posts( $query_string . '&order=ASC&orderby=title' ); 
		while ( have_posts() ) : the_post(); ?>
            <tr>
				<td class="media-title bttm-border"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></td>
                <td class="media-type left-border bttm-border"><?php echo get_post_type( get_the_ID() ); ?></td>
             </tr> 
         <?php endwhile; ?>
    </tbody>
</table>