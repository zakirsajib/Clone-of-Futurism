<?php
  $popularpost = array(
	  'post_type' =>'post',
	  'post__not_in' => array($post->ID),
	  'posts_per_page'=>8, // Number of related posts to display.
	  //'meta_key' => 'wpb_post_views_count',
	  'orderby' => 'meta_value_num',
	  'order' => 'DESC',
	  'post__not_in' => get_option('sticky_posts')
);
   
  query_posts( $popularpost );
 
  if ( have_posts() ) : ?>
  	
  	<section class="homepage-popular related cf module-sm">
		<p class="h5 section-title"><span>Popular Articles This Week</span></p>
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
				  <div class="col-md-3 col-sm-6">
					<div class="related-post frontpage module">
						<a class="cover-bg " style="background-image: url(<?php the_post_thumbnail_url()?>)" href="<?php the_permalink()?>" title="<?php the_title(); ?>" data-wpex-post-id="">
							<h3><?php the_title(); ?></h3>
						</a>
					</div>
				  </div>
			<?php endwhile; wp_reset_query();?>
		</div>
	</section>	
<?php endif;?>

