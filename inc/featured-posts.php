<?php $args = array(
						'posts_per_page' => 1,
						'post__in'  => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 1
					);
					query_posts( $args ); 
					if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-6">
						<div class="featured-story cover-bg post1" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">						
						<div class="post-details">
								
					<?php $categories = get_the_category();
						$cat_slug = $categories[0]->slug;
						$cat_slug = str_replace("-","", $cat_slug);
						if ( ! empty( $categories ) ):?>
							<a class="post-category <?php echo $cat_slug?>-cat" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo esc_html( $categories[0]->name )?></a>
					<?php endif;?>
								<h3 class="featured-story-title">
									<a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a>
								</h3>
			
								<a class="main-link" href="<?php the_permalink()?>" title="<?php the_title()?>"></a>
							</div>
							<a class="main-link" href="<?php the_permalink()?>" title="<?php the_title()?>"></a>
						</div>
			
						</div>
						<?php endwhile; wp_reset_query();?>
					<?php endif?>
			
					<?php $args = array(
						'posts_per_page' => 1,
						'offset' =>1,
						'post__in'  => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 1
					);
					query_posts( $args ); 
					if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-6 col-sm-4">
						<div class="featured-story cover-bg post2" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
						<div class="post-details">
								
					<?php $categories = get_the_category();
						$cat_slug = $categories[0]->slug;
						$cat_slug = str_replace("-","", $cat_slug);
						if ( ! empty( $categories ) ):?>
							<a class="post-category <?php echo $cat_slug?>-cat" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo esc_html( $categories[0]->name )?></a>
					<?php endif;?>
								<h3 class="featured-story-title">
									<a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a>
								</h3>
			
								<a class="main-link" href="<?php the_permalink()?>" title="<?php the_title()?>"></a>
							</div>
							<a class="main-link" href="<?php the_permalink()?>" title="<?php the_title()?>"></a>
						</div>
			
						</div>
						<?php endwhile; wp_reset_query();?>
					<?php endif?>
			
					<?php $args = array(
						'posts_per_page' => 1,
						'offset' =>2,
						'post__in'  => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 1
					);
					query_posts( $args ); 
					if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-3 col-sm-4">
						<div class="featured-story cover-bg post3" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
							
						<div class="post-details">
								
					<?php $categories = get_the_category();
						$cat_slug = $categories[0]->slug;
						$cat_slug = str_replace("-","", $cat_slug);
						if ( ! empty( $categories ) ):?>
							<a class="post-category <?php echo $cat_slug?>-cat" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo esc_html( $categories[0]->name )?></a>
					<?php endif;?>
								<h3 class="featured-story-title">
									<a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a>
								</h3>
			
								<a class="main-link" href="<?php the_permalink()?>" title="<?php the_title()?>"></a>
							</div>
							<a class="main-link" href="<?php the_permalink()?>" title="<?php the_title()?>"></a>
						</div>
			
						</div>
						<?php endwhile; wp_reset_query();?>
					<?php endif?>
					
					
					<?php $args = array(
						'posts_per_page' => 1,
						'offset' =>3,
						'post__in'  => get_option( 'sticky_posts' ),
						'ignore_sticky_posts' => 1
					);
					query_posts( $args ); 
					if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-3 col-sm-4">
						<div class="featured-story cover-bg post4" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
												
						<div class="post-details">
								
					<?php $categories = get_the_category();
						$cat_slug = $categories[0]->slug;
						$cat_slug = str_replace("-","", $cat_slug);
						if ( ! empty( $categories ) ):?>
							<a class="post-category <?php echo $cat_slug?>-cat" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo esc_html( $categories[0]->name )?></a>
					<?php endif;?>
								<h3 class="featured-story-title">
									<a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a>
								</h3>
			
								<a class="main-link" href="<?php the_permalink()?>" title="<?php the_title()?>"></a>
							</div>
							<a class="main-link" href="<?php the_permalink()?>" title="<?php the_title()?>"></a>
						</div>
			
						</div>
						<?php endwhile; wp_reset_query();?>
					<?php endif?>
