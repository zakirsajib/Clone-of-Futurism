<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package MT
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="homepage">
				<section class="daily">
					<?php
					if ( have_posts() ) : ?>
			
					<div class="group-container" id="group-container">
						<div class="listings-group">
							<section class="section">
								<div class="container">
										<?php
										/* Start the Loop */
										while ( have_posts() ) : the_post();
							
											/**
											 * Run the loop for the search to output the results.
											 * If you want to overload this in a child theme then include a file
											 * called content-search.php and that will be used instead.
											 */
											get_template_part( 'template-parts/content', 'search' );
							
										endwhile;
							
										the_posts_navigation();
							
									else :
							
										get_template_part( 'template-parts/content', 'none' );
							
									endif; ?>
								</div>
							</section>
						</div>
					</div>
				</section>
			</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
