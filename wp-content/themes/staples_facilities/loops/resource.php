<?php
/**
 * Loop Name: Resource
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
            <th class="right-border">Category</th>
            <th class="right-border">Name of Document or Media</th>
            <th>File to view</th>
        </tr>
    </thead>
    
    <tbody>
    <?php
        $post_type = 'resource';
        // Get all the taxonomies for this post type
        $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );
        $count = 0;
        
        foreach( $taxonomies as $taxonomy ) : 
                    // Gets every "category" (term) in this taxonomy to get the respective posts
            $terms = get_terms( $taxonomy );
            
            foreach( $terms as $term ) : 
                $count++;
                // Main Query
                $resource_query = new WP_Query( array(
					'post_type' => array('resource'),
                    'taxonomy' => $taxonomy,
                    'term' => $term->slug,
                ));
                $itemCount = 0;
                // While loop
                if( $resource_query->have_posts() ): 
                    while( $resource_query->have_posts() ) : $resource_query->the_post(); ?>
                        <?php 
                            $itemCount++;
                            $catTotal = $resource_query->found_posts; 
                        ?>
                        <tr class="<?php if ($itemCount == $catTotal): echo 'last'; endif;?> ">
                            <td class="chapter-title">
                                <?php 
                                    if ($itemCount <= 1):
                                        echo $count . ". " . get_the_term_list( $post->ID, 'type'); 
                                    endif;
                                ?>
                            </td>
                            <td class="left-border bttm-border"><?php the_title(); ?></td>
                            <td class="left-border bttm-border">
                            <?php if( get_field('link') ) { ?>
                                <a class="link-icon" href="<?php the_field('link'); ?>" target="_blank">Link</a>
                            <?php } else if (get_field('file')) { ?>
                                <a class="pdf-icon" href="<?php the_field('file'); ?>" target="_blank">PDF</a>
                            <?php } ?>
                            </td>
                        </tr> 
                    <?php endwhile; 
                endif;
            endforeach;
        endforeach;
    ?>
    </tbody>
</table>