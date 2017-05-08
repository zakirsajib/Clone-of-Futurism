<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package New_Future
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article class="error-404">
		        <section class="section">
		            <img src="<?php echo get_template_directory_uri(); ?>/images/astronaut.png">
		            <h2>Lost in Space</h2>
		            <h3>The page you're looking for can't be found</h3>
		            <div class="is-align-center">
		                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="m-button m-button-primary">Back</a>
		            </div>
		        </section>
		    </article>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
