<?php
/**
 * Template part for displaying Infographics page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MT
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('infographic-page cf'); ?>>

	<aside class="category-nav hidden-xs pull-left">
		<header>
			<h5>Categories</h5>
		</header>
		
		<?php
			$args = array(
				'type'                     => 'images',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '7,8,11,12,5',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false );
			$categories = get_categories($args);
			
			echo '<ul>';?>
			<li><a href="<?php echo home_url();?>/infographics">Infographics</a></li>
			<?php foreach ($categories as $category) {
				$cat_slug = $category->slug;?>
			    <li><a class="sub" href="<?php echo home_url();?>/infographics?cat=<?php echo $cat_slug?>"><?php echo $category->name; ?></a></li>
			<?php
			}?>
			<li><a href="<?php echo home_url();?>/this-week-in-science/">This Week in Science</a></li>
			<li><a href="<?php echo home_url();?>/facts-quotes/">Facts & Quotes</a></li>
			<?php echo '</ul>';
		?>
	</aside>

	<section class="infographics-container cards">
		<ul id="grid" class="cards-wrapper cf">
			<div class="infographics-group">
				<div class="column-sizer"></div>
				<div class="gutter-sizer"></div>
				
				<?php
					
					$current_page_url = getUrl();
					
					//echo $current_page_url;
					
					$current_page_url = basename($current_page_url);
					
					//echo $current_page_url;
					
					$pos = strrpos($current_page_url, '=');
					$last_part = $pos === false ? $current_page_url : substr($current_page_url, $pos + 1);
					
					//echo $last_part;
					
					if($current_page_url=='infographics'):
										
					$args = array(
						'post_type' =>'images'
					);
					query_posts( $args );
					
					// The Loop
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						
						$categories = get_the_category();
							$cat_slug = $categories[0]->slug;
							$cat_slug = str_replace("-","", $cat_slug);?>
							
						<li class="cards-post">
							<a href="<?php the_permalink()?>"><div class="img"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title()?>"><?php if ( ! empty( $categories ) ):?><a class="post-category <?php echo $cat_slug?>-cat" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo esc_html( $categories[0]->name )?></a><?php endif;?></div></a>
							
							<article class="card-content">
								<header>
									<h4 class="noMargin"><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
								</header>
								<a href="<?php the_permalink()?>"><p><?php the_excerpt()?></p></a>
							</article>
						</li>
							
						<?php endwhile;
					else :
						echo 'No posts were found!';
					endif; wp_reset_query()?>
					
					<?php elseif($last_part):
						$args = array(
						'post_type' =>'images',
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field'    => 'slug',
								'terms'    => $last_part
							),
						),
					);
					query_posts( $args );
					
					// The Loop
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						
						$categories = get_the_category();
							$cat_slug = $categories[0]->slug;
							$cat_slug = str_replace("-","", $cat_slug);?>
							
						<li class="cards-post">
							<a href="<?php the_permalink()?>"><div class="img"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title()?>"><?php if ( ! empty( $categories ) ):?><a class="post-category <?php echo $cat_slug?>-cat" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo esc_html( $categories[0]->name )?></a><?php endif;?></div></a>
							
							<article class="card-content">
								<header>
									<h4 class="noMargin"><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
								</header>
								<a href="<?php the_permalink()?>"><p><?php the_excerpt()?></p></a>
							</article>
						</li>
							
						<?php endwhile;
					else :
						echo 'No posts were found!';
					endif; wp_reset_query()?>
					
					<?php endif;?>
			
			</div>
			<div id="infscr-loading-initial">
				<img alt="Loading..." src="<?php echo home_url();?>/wp-content/themes/mt/images/loading-img.gif">
				<div></div>
			</div>
		</ul>
	</section>
	
	<div class='wp-pagenavi'>
		<a class="nextpostslink" rel="next" href="page/2/index.html">&raquo;</a>
		<a class="last" href="page/25/index.html">Last &raquo;</a>
	</div>
	
		
</article>

<script>
		$('.infographics a').addClass('is-active');
</script>

<script>
	var $container = $('.cards-wrapper');
	navSelector = '.wp-pagenavi';
	nextSelector = 'a.nextpostslink';

	$(navSelector).hide();

	$(function(){
				
		$container.infinitescroll({
			errorCallback : function(response) {
				if (response == 'done') {
					$('.m-button-load').hide();
				}
			},
			state: {
				currPage: parseInt($('span.current').text())
			},
			navSelector: navSelector,
			nextSelector: 'a.nextpostslink',
			itemSelector: '.infographics-group',
			loading: {
				msgText : '',
				finishedMsg: 'No more pages to load.',
				img: 'http://i.imgur.com/6RMhx.gif'
			}
		},
		function (newElements) {
			var $parentElem = $(newElements),
			$childElems = $parentElem.find('.cards-post');

			$parentElem.imagesLoaded(function() {
				$childElems
				.animate({ opacity : 1 })
				.addClass('shown');

				$container.masonry('appended', $parentElem, true);
			});
		});

        	// Keep the left nav bar stuck on scroll
        	$(window).scroll(function() {
        		var windowScrollTop = $(window).scrollTop(),
        		mainNavElem     = $('.main-nav'),
        		categoryNavElem = $('.category-nav'),
        		navBottom         = mainNavElem.outerHeight();

        		if (windowScrollTop <= navBottom) {
        			categoryNavElem.css({
        				position : 'relative',
        				marginTop : 'inherit'
        			});
        		} else if (windowScrollTop >= navBottom) {
        			categoryNavElem.css({
        				position : 'fixed',
        				marginTop : '-70px'
        			});
        		}
        	});

        });

	$container.imagesLoaded(function() {

		$container.masonry({
			itemSelector  : '.cards-post',
			columnWidth: '.column-sizer',
			gutter: '.gutter-sizer',
			percentPosition: true,
			transitionDuration : '0.5s',
			isAnimated : true
		});

	}).done(function() {

		$('#infscr-loading-initial').hide();

		if (0 <= $('.cards-post').length) {
			for (var i = 0; i <= 11; i++) {
				$('.cards-post:eq(' + i + ')').addClass('animate');
				$('.cards-post:eq(' + i + ')').addClass('shown');
			}
		}
	});

	$(window).resize(function () {
		console.log('resize');
		$container.masonry('reloadItems');
	});
	
</script>

