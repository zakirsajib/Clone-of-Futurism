<?php
/**
 Template Name: Home
 
 * The template for displaying Front page 

 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mt
 */

get_header(); ?>

	<section class="homepage">

	<header class="featured">
		<div class="container-full no-padding">
			<div class="row row-no-padding">
				<?php get_template_part('inc/featured', 'posts')?>			
			</div>	
			<div class="clearfix"></div>			
		</div>
	</header>

<nav class="sub-nav moduleTight hidden-xs">
	<div class="container" style="width: 1000px;">
		<div class="fb pull-right hidden-xs">
			<a href="http://facebook.com/newfuture" class="tagline">Building the future together</a>
			<div class="fb-like" data-href="http://www.newfuture.website/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
		</div>
		<div class="dropdown">
			<h1 class="topstories"><i class="icon icon-arrow-down-c"></i> <span>Today's Top Stories</span></h1>
		</div>
	</div>
</nav>
			
	<div class="container">
		<!-- /1000710/F_1x1 -->
		

		<!-- /1000710/F_R_H1 -->
		

	</div>

	<div class="daily">
		<section class="section" style="padding-bottom: 0;">
			<div class="container" id="xx">
				<?php get_template_part('inc/three', 'posts')?>
				
				
				
				<?php get_template_part('inc/popular', 'posts')?>

				<!-- /1000710/F_R_H2 -->
				
				<?php get_template_part('inc/anotherthree', 'posts')?>



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
<!--
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
						amplitude.logEvent("Email Subscribed", {'Location': 'Homepage', 'Device' : device});
					}else{
						alert('Error, please refresh the page and try again!');
					}
				}
			});
		}
	});
</script>
-->



<?php get_template_part('inc/anothersix', 'posts')?>

<div class="listing-infographic">
	<div class="row">
		<div class="col-sm-8 center">
			<a href="#"><img class="lazy" src="wp-content/uploads/2017/05/xraynavigation-home_v1-1.png"/>
			</a>
		</div>
		<div class="col-sm-4">
			<h4><a href="#">Infographic of the Day</a></h4>
			<a href="#"><p>Pulsars can be used study time, space, and more. They may even hold the key to navigation outside of our solar system.</p></a>
		</div>
	</div>
</div>

				
				<!-- /1000710/F_R_H3 -->

<p class="h5 section-title"><span>Predict the Future</span></p>
<div id="prediction81037" data-url="#" data-id="81037" class="center prediction prediction-card widget guest cover-bg" style="background-image: url(wp-content/uploads/2017/05/DNA-based-test-can-spot-cancer-1000x450.jpg);">
	<div>
		<div class="text">
			<h2><a >When will we be able to genetically engineer humans who are not susceptible to disease?</a></h2>
			<div class="prediction-answers" data-url="#">
			<select data-placeholder="Predict " class="chosen prediction-dropdown" style="width: 150px;">
			<option value=""></option>
			<option value="2020s">2020s</option><option value="2030s">2030s</option><option value="2040s">2040s</option><option value="2050s">2050s</option><option value="2060s">2060s</option><option value="2070s">2070s</option><option value="2080s">2080s</option><option value="2090s">2090s</option><option value="2100+">2100+</option>		</select>
		<script>
			if($('widow').width() <= 600){
				$('.prediction-dropdown option[value=""]').text("Predict");
			}
		</script>
	</div>
		</div>
		<div class="post-response">
					</div>
	</div>
</div>



<?php get_template_part('inc/anotherthreemore', 'posts')?>
				
		
<?php get_template_part('inc/homepage', 'buckets')?>






			</div>
		</section>
	</div>

	<section class="daily">

	<div class="group-container" id="group-container">
	<div class="listings-group">
		<section class="section">
			<div class="container">
				<?php get_template_part('inc/restofthe', 'posts')?>
				
				<?php the_posts_navigation();?>
			</div>
		</section>
	</div>

	
</div>






<!--
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
-->
	
</section>
</section>

<?php
get_footer();
