<?php
/**
 * Template part for displaying ABOUT page content in page-about.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MT
 */

?>

<div class="container-fluid">
	<section class="section community">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content mission module">
			<?php
				the_content();
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mt' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		
		<?php
			$args =  array( 'post_type' => 'team', 
				'posts_per_page' => -1,
				'order' => 'DESC',
				'orderby' => 'post_date'
			);
			query_posts( $args );	
		
		if ( have_posts() ) : ?>
		<section class="people team module">
			<header>
				<h2>Team</h2>
			</header>
			<div class="row">
				
				<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="col-md-1-5 col-sm-3 col-xs-6">
					<div class="person module">
						<?php if(get_field('linkedin_url')):?>
						<a target="_blank" href="<?php the_field('linkedin_url')?>"><img alt='' src='<?php the_field('person__photo')?>' class='avatar avatar-300 photo' height='300' width='300' /></a>
						<?php else:?>
							<img alt='' src='<?php the_field('person__photo')?>' class='avatar avatar-300 photo' height='300' width='300' />
						<?php endif?>
						<div class="description">
							<h3><a target="_blank" href="<?php the_field('linkedin_url')?>"><?php the_title()?></a></h3>
							<span class="description-company"><?php the_field('person_position')?></span>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_query();?>
			</div>
		</section>
		<?php endif?>
		
		
		<?php
			$args =  array( 'post_type' => 'expert', 
				'posts_per_page' => -1,
				'order' => 'DESC',
				'orderby' => 'post_date'
			);
			query_posts( $args );	
		
		if ( have_posts() ) : ?>
		<section class="people contributors module">
			<header>
				<h2>Experts</h2>
			</header>

			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-1-5 col-sm-3 col-xs-6">
						<div class="person module">
						<?php if(get_field('linkedin_url')):?>
						<a target="_blank" href="<?php the_field('linkedin_url')?>"><img alt='' src='<?php the_field('person__photo')?>' class='avatar avatar-300 photo' height='300' width='300' /></a>
						<?php else:?>
							<img alt='' src='<?php the_field('person__photo')?>' class='avatar avatar-300 photo' height='300' width='300' />
						<?php endif?>
						<div class="description">
							<h3><a target="_blank" href="<?php the_field('linkedin_url')?>"><?php the_title()?></a></h3>
							<span class="description-company"><?php the_field('person_position')?></span>
						</div>
					</div>
					</div>
				<?php endwhile; wp_reset_query();?>
			</div>
			
			<div class="btn-wrapper">
				<a data-href="#" class="bc-btn sign-in-btn join btn btn-primary">Become a contributor</a>
			</div>
			
		</section>
		<?php endif?>
		
		<?php
			$args =  array( 'post_type' => 'sponsor', 
				'posts_per_page' => -1,
				'order' => 'DESC',
				'orderby' => 'post_date'
			);
			query_posts( $args );	
		
		if ( have_posts() ) : ?>
		<section class="sponsors module">
			<header><h2>Sponsors</h2></header>
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-sm-4">
					<div class="sponsor">
						<a target="_blank" href="<?php the_field('sponsor_logo_url')?>">
							<img src="<?php the_field('sponsor_logo')?>"/>
						</a>
						<p><?php the_title()?></p>
					</div>
				</div>
				<?php endwhile; wp_reset_query();?>
			</div>
		</section>
		<?php endif?>
		
		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'mt' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
</article><!-- #post-## -->
	</section>
</div>