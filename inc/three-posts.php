<?php 
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
	
	$custom_query_args = array(
		'post_type' => 'post',
		'posts_per_page' => 22,
		'order' => 'DESC',
        'orderby' => 'post_date',
		'post__not_in' => get_option( 'sticky_posts' ),
		'paged' => $paged
	);
	
	//query_posts( $custom_query_args ); 
	
	$the_query = new WP_Query( $custom_query_args );
	
global $wp_query;
// Put default query object in a temp variable
$tmp_query = $wp_query;
// Now wipe it out completely
$wp_query = null;
// Re-populate the global with our custom query
$wp_query = $the_query;
	
	
	if ( $the_query->have_posts() ) : ?>
	
	<?php $count = 1; ?>
	
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
		<div data-id="post-<?php the_ID(); ?>" <?php post_class('post listing new-listing cf post blog-post'); ?>>
			    <div class="post-image">
			        <a class="post-img " href="<?php the_permalink()?>" data-original="<?php the_post_thumbnail_url(); ?>" style="background-color: #eee;"  title="<?php the_title()?>" data-wpex-post-id="<?php the_ID(); ?>"></a>
			    </div>

			    <div class="post-details">
					<?php $categories = get_the_category();
							$cat_slug = $categories[0]->slug;
							$cat_slug = str_replace("-","", $cat_slug);
							if ( ! empty( $categories ) ):?>
								<a class="post-category <?php echo $cat_slug?>-cat" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo esc_html( $categories[0]->name )?></a>
						<?php endif;?>
					
			        <?php the_title( sprintf( '<h3 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			
			        <p class="subtitle"><?php the_excerpt(); ?></p>
			        <span class="time"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
			        <div class="tags"><?php echo get_the_tag_list();?></div>
			    </div>
			</div>
			
		<?php if ($count == 3) : ?>
			
			<p>Ads Code here 1</p>
		
		<?php elseif ($count == 6) : ?>
		
			<p>Ads Code here 2</p>
		
		<?php elseif ($count == 9) : ?>
		
			<p>Ads Code here 3</p>
		
		
		<?php elseif ($count == 12) : ?>
		
			<p>Ads Code here 4</p>
		
		<?php elseif ($count == 16) : ?>
		
			<p>Ads Code here 5</p>
		
		<?php endif;?>
		
		
		<?php $count++; ?>
		
		<?php endwhile; ?> 
					
		<div class="navigation">
			
			<?php if(function_exists('wp_pagenavi')):
				wp_pagenavi(); 
			else:
				if( get_previous_posts_link() ) :
					previous_posts_link('&laquo; Newer posts');
				endif;
				if( get_next_posts_link() ) :
					next_posts_link( 'Load more &raquo;', $the_query->max_num_pages );
				endif;
			endif;?>
			 
		</div>
		
		<?php wp_reset_postdata();?>
		
	<?php endif;
		
// Restore original query object
$wp_query = null;
$wp_query = $tmp_query;?>