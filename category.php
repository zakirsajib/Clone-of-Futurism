<?php
/**
 * The template for displaying category
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MT
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<section class="homepage">
		<?php
		if ( have_posts() ) : ?>
			
			<header class="category-header cover-bg" style="background-image: url(http://lorempixel.com/400/200)">
				<div class="container" style="width: 1000px;">
					<div class="table">
						<div class="icon fade-right two">
							<i class="icon icon-bucket-earthandenergy large"></i>
						</div>
						<div class="desc fade-right one">
							<h1><span><?php single_cat_title(); ?></span></h1>
							<h3><?php echo category_description(); ?> </h3>
						</div>
					</div>
				</div>
			</header>
			
			<section class="daily">
				<div class="group-container" id="group-container">
					<div class="listings-group">
						<section class="section">
							<div class="container">
			
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();
				
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'cat' );
				
							endwhile;?>
							<div class="center subscribe-form">
											<form method="POST" id="email-subscribe" class="form-inline">
												<h4>Get futuristic videos and news delivered straight to your inbox</h4>
												<input class="form-control input-lg required email" type="text" name="email" placeholder="Your email address"/>
												<div class="select-lg Futurism">
													<select name="frequency" style="width: 110px;" class="select-lg chosen" id="frequency">
														<option value="Daily">Daily</option>
														<option value="Weekly">Weekly</option>
													</select>
												</div>
												<button class="btn btn-primary btn-lg" type="submit">Subscribe</button>
											</form>
										</div>
							<script type="text/javascript">
							
							var $form = $('#email-subscribe');
							
							var validator = $form.validate({
								errorPlacement: function(error, element) {
									null;
								},
								submitHandler: function(form) {
									var formData = $('#email-subscribe').serialize();
									console.log(formData);
									$.ajax({
										url: '//futurism.com/wp-content/themes/futurism/php/mailchimpSubscribe.php',
										type: 'POST',
										data: formData,
										success: function(data){
											if(data.id || data.euid){
												$form.parent().append('<h4 class="center no-margin no-padding" style="line-height: 35px; display: block !important;">Subscribed successfully!</h4>');
												$form.remove();
												createCookie('emailSubscribed', 1, null);
												createCookie('emailSubscribed7Days', 1, 7);
												setTimeout(function(){$('.subscribe-form, #subscribe-footer').fadeOut();}, 2000);
												var device = ($(window).width() > 768) ? 'Desktop' : 'Mobile';
												amplitude.logEvent("Email Subscribed", {'Location': 'Archive', 'Device' : device});
											}else{
												alert('Error, please refresh the page and try again!');
											}
										}
									});
								}
							});
							</script>
							</div>
						</section>
					</div>
				</div>
			
			<?php the_posts_navigation();?>
		
		<!-- <button class="m-button m-button-load load-more"><i class="icon icon-refresh"></i>Load More</button> -->

		<script>

	// Listings infinite scroll
	$.extend($.infinitescroll.prototype,{
		_setup_simplyrecipes: function infscr_setup_simplyrecipes () {
			var instance = this;
			var opts = this.options;
			this._binding('bind');
			this._numScrolls = 0;

			$('.m-button-load').bind('click', function(e) {
				e.preventDefault();
				$(this).find('i').addClass('rotating');
				instance.beginAjax(opts);
			});

			this.options.loading.start = function (opts) {
				if(instance._numScrolls > 0) {
					$('.m-button-load').show();
					instance.beginAjax(opts);
				}
			};

			this.options.loading.finished = function() {
				$('.m-footer').hide();
				$('.m-button-load').hide();
				if(typeof ga !== typeof undefined){
					ga('set', 'dimension1', 'Infinite Scroll');
					ga('send', 'pageview', location.pathname + 'page/' + instance._numScrolls + 1);
				}
				amplitude.logEvent("Infinite Scroll Pageview");
				instance._numScrolls++;
			};
			return false;
		}
	});

	$(function(){

		var $container = $('#group-container');
		navSelector = '.wp-pagenavi';
		nextSelector = 'a.nextpostslink';

		$(".post-img, img.lazy").lazyload({
			effect : "fadeIn",
			threshold: 400
		});

		$(navSelector).hide();

		$container.infinitescroll({
			behavior:'simplyrecipes',
			errorCallback : function(response) {
				if (response == 'done') {
					$('.m-button-load').hide();
				}
			},
			/*state: {
				currPage: parseInt($('span.current').text())
			},*/
			navSelector: navSelector,
			nextSelector: 'a.nextpostslink',
			itemSelector: '.listings-group, .homepage-widget'
		},
		function(newElements){

			retrieve_experiment_image();
			FB.XFBML.parse();
			$('select').chosen({disable_search_threshold: 1000});

			for (var i = 0; i < newElements.length; i++) {
				var thisElement = newElements[i];
				$(thisElement).find('.post-img, img.lazy').lazyload({
					effect : "fadeIn",
					threshold: 400
				});

				$(thisElement).find('.prediction').each(function(){
					var postID = $(this).data('id');
					var permalink = $(this).data('url');
					$.get(permalink + '?results=true' , function(result){
						$('#prediction' + postID + ' .prediction-answers').replaceWith(result);
						$('select').chosen({disable_search_threshold: 1000});
					});
				});
			}

			infinite_load_ads();
		});

		var nextSlotId = 1;
		function generateNextSlotName() {
			var id = nextSlotId++;
			console.log(nextSlotId);
			return 'adslot' + id;
		}

		// Dynamically load ads shown via infinite scroll
		function infinite_load_ads(){

			// Generate next slot name
			var adSlot = $('.infinite-scroll-advert').last();
			adSlot.removeClass('infinite-scroll-advert');
			var slotName = generateNextSlotName();

   			// Create a div for the slot
  			 adSlot.attr('id',  slotName);

   			// Define the slot itself, call display() to
   			// register the div and refresh() to fetch ad.
   			googletag.cmd.push(function() {

   				var slot = googletag.defineSlot('/1000710/F_RI_HA', [[970, 90], [970, 250], [300, 250], [728, 90]], slotName).setTargeting('scroll', ['infinite']).addService(googletag.pubads());

   				googletag.pubads().enableSingleRequest();
   				googletag.pubads().collapseEmptyDivs();
   				googletag.pubads().setTargeting('environment', ['futurism_prod']).setTargeting('page', ['homepage']);
   				googletag.enableServices();

     				// Display has to be called before
     				// refresh and after the slot div is in the page.
     				googletag.display(slotName);
     				googletag.pubads().refresh([slot]);

     			});

     		}

		function retrieve_experiment_image() {
			if (typeof window.titleex_run_experiment == 'function') {
				//window.titleex_run_experiment();

				try {
					var fetch = {};
					var find = 0;

					if("titlexproShouldRunExp" in window) {
						if(!window.titlexproShouldRunExp()) {
							jQuery("img.wpexpro-image").removeClass("wpexpro-image");
							wpex_show_body();
							var matches = jQuery("body").attr("class").match(/\bpostid-(\d+)\b/);
							if (matches) {
								var id = matches[1];
								var $spans = jQuery("[data-wpex-title-id='"+id+"']");
								if ($spans.length) {
									titleex_update_title(Base64.decode($spans.data("original")));
								}
							}
							return;
						}
					}

					var $titles = jQuery("[data-wpex-title-id]");
					for(var i = $titles.length -1; i>=0; i--) {
						var $title = jQuery($titles[i]);
						var id = $title.data("wpex-title-id");
						fetch[id] = 1;
						find = 1;
					}

					if (find) {
						var id_class = document.body.className.match(/\bpostid-(\d+)\b/);
						if(id_class) {
							cur_id = id_class[1];
						} else {
							cur_id = -1;
						}

						jQuery.post(wpex.ajaxurl, {
							action: 'wpex_titles',
							id: Object.keys(fetch),
							cur_id:cur_id,
						}, function(res) {

							for(var id in res.titles) {
								var $elm = jQuery("[data-wpex-title-id="+id+"]");
								var new_title = '';
								if(!res.titles[id] && $elm.data("original")) {
									new_title = Base64.decode($elm.data("original"));
								} else {
									new_title = res.titles[id];
								}
								$elm.html(new_title);

						// Is this the post page for this
						if (jQuery("body.postid-"+id).length > 0) {
							titleex_update_title(new_title);
						}
					}
					for(var id in res.images) {
						if(res.images[id].old) {
							var $a = jQuery("a[data-wpex-post-id='" + res.images[id].old + "']");
							$a.css('background-image', 'url("'+res.images[id].new+'")');
						}
					}
					$('.post-img').removeClass('post-img-hide');
				}, 'json');
					} else {
						$('.post-img').removeClass('post-img-hide');
					}
				} catch(err) {}
			}
		}
		retrieve_experiment_image();
	});

</script>
</section>
		<?php else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();