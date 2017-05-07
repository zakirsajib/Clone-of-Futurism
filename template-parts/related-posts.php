<?php
  $related_post = array(
	  'post_type' =>'post',
	  'post__not_in' => array($post->ID),
	  'posts_per_page'=>3, // Number of related posts to display.
	  'orderby' => 'meta_value_num',
	  'order' => 'DESC',
	  'post__not_in' => get_option('sticky_posts')
);

query_posts( $related_post );

if ( have_posts() ) : ?>

<div class="related cf">
	<p class="h5 visible-xs center">Related Articles</p>
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="col-sm-4">
				<div class="related-post ">
					<a class="cover-bg " style="background-image: url(<?php the_post_thumbnail_url()?>);" href="<?php the_permalink()?>" title="<?php the_title()?>" data-wpex-post-id="">
					<h3><?php the_title()?></h3>
					</a>
				</div>
			</div>
			<?php endwhile; wp_reset_query();?>
		</div>
</div>

<?php endif;?>