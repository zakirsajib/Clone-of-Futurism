<?php $args = array(
		'posts_per_page' => 3,
		'post__not_in' => get_option( 'sticky_posts' )
	);
	query_posts( $args ); 
	if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
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
			
		<?php endwhile; ?>
	<?php endif;wp_reset_query();?>