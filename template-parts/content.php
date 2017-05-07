<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MT
 */

?>

<div class="post-container">
	<div class="ajax-post post">
		<div class="post-header-full" style="background-image: url(<?php the_post_thumbnail_url(); ?>);" data-wpex-post-id="">
			<div>
				<div class="container-fluid relative">
		
						<!-- AD code-->
						
				<section class="section">
					<?php $categories = get_the_category();
						$cat_slug = $categories[0]->slug;
						$cat_slug = str_replace("-","", $cat_slug);
						if ( ! empty( $categories ) ):?>
							<a class="post-category <?php echo $cat_slug?>-cat" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo esc_html( $categories[0]->name )?></a>
					<?php endif;?>
					<h1 data-url="<?php the_permalink()?>"><?php the_title()?></h1>
				</section>
				<em class="image-source"><i class="icon icon-camera"></i>Image Source</em>
				</div>
			</div>
		</div> <!-- end post-header-->
		
		
	<div class="container-fluid content-container">
		<section class="section blog-content">
			<div class="table">
				<div class="col-left">
					<div class="post-content module">
						<?php
							the_content( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mt' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
				
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mt' ),
								'after'  => '</div>',
							) );
						?>
					</div>

				<div class="clearfix"></div>

				<div class="pagination"></div>

				<div class="clearfix"></div>

				
				<div class="meta">
					<div class="row">
						<div class="col-sm-6">
							<?php if(get_field('reference_details')):?>
							<p class="link-source">
								References:<?php the_field('reference_details')?>
							</p>
							<?php endif;?>
						</div>
						<div class="col-sm-6 hidden-xs">
							<?php if(get_field('post_shortlink')):?>
							<p class="shortlink">
								<i class="icon icon-link"></i><input onclick="this.select();" type="text" value="<?php the_field('post_shortlink')?>">
							</p>
							<?php endif;?>
						</div>
					</div>
				</div>


			
  	<div class="module author visible-sm visible-xs">
  		<h5 class="hidden-sm hidden-xs">Written By</h5>
  		<table>
	  		<tbody>
		  		<tr>
			  		<td class="profile-pic" style="padding-right: 8px;">
	  					<a class="avatar" href="#">
		  					<?php echo get_avatar(get_the_author_meta( 'ID' )); ?>
		  				</a>
		  			</td>
		  			
		  			<td>
			  			<span class="author-name"><?php the_author()?></span>
			  			<span style="color: #aaa; font-weight: 200; padding-left: 10px;"><?php echo get_the_date(); ?></span>
			  		</td>
			  	</tr>
  		  		<tr>
	  				<td colspan="2">
		  				<?php $author_id = get_the_author_meta('ID');
		  				$twt_user = get_field('twitter_user_name', 'user_'. $author_id );
		  				if($twt_user):?>
		  					<a class="twitter author-link" href="http://twitter.com/<?php echo $twt_user?>" target="_blank">@<?php echo $twt_user?></a>
		  				<?php endif;?>
		  				<a href="<?php the_author_meta('user_url'); ?>" class="website author-link" target="_blank">Website</a>
		  			</td>
		  		</tr>
		  		<tr class="hidden-sm hidden-xs">
			  		<td><small class="time"><?php echo get_the_date(); ?></small></td>
			  	</tr>
			 </tbody>
		</table>
  </div>
  
			
  	<div class="big-share-buttons module">
  		<div class="row-tight">
  			<div class="col-xs-4">
  				<a class="btn btn-lg facebook" data-service="facebook" data-url="<?php the_permalink()?>" data-desc="<?php the_title()?>"><i class="icon icon-facebook"></i> <span>Share This</span>
  				</a>
  			</div>
  			<div class="col-xs-4">
  				<a class="btn btn-lg twitter" data-service="twitter" title="Tweet this" href="http://twitter.com/share?text=<?php the_title()?>&url=<?php the_permalink()?>" target="_blank"><i class="icon icon-twitter"></i> <span>Tweet This</span>
  				</a>
  			</div>
  			<div class="col-xs-4">
  			<a class="btn btn-lg email" data-service="email" title="Email this link" href="mailto:?subject=Check out this article&amp;body=<?php the_permalink()?>"><i class="icon icon-email"></i> <span>Email This</span>
  			</a>
  		</div>
  		</div>  		
  </div>

  
		</div>
				<div id="sidebar" class="hidden-sm hidden-xs">

	
	<div class="module share">
		<h5>Share</h5>
			<div class="item facebook">
				<a class="js facebook" data-url="<?php the_permalink()?>" data-desc="<?php the_title()?>"><i class="icon icon-facebook"></i></a>
			</div>
		
			<div class="item twitter">
				<a class="twitter" title="Tweet This" href="http://twitter.com/share?text=<?php the_title()?>&amp;url=<?php the_permalink()?>" target="_blank"><i class="icon icon-twitter"></i></a>
			</div>
		
			<div class="item gplus">
				<a class="gplus" title="+1 this" href="https://plus.google.com/share?url=<?php the_permalink()?>" target="_blank">
					<i class="icon icon-gplus"></i></a>
			</div>
		
			<div class="item email">
				<a class="email" title="Email This" href="mailto:?subject=Check out this article&amp;body=<?php the_permalink()?>" target="_blank"><i class="icon icon-email"></i></a>
			</div>
    </div>

	
	
	
	
  	<div class="module author ">
  		<h5 class="hidden-sm hidden-xs">Written By</h5>
  		<table><tbody>
	  		<tr>
	  		<td>
		  		<span class="author-name"><?php the_author()?></span>
		  	</td>
		  	<td class="profile-pic">
  				<a class="avatar" href="#"><?php echo get_avatar(get_the_author_meta( 'ID' )); ?></a>
  			</td>
  			</tr>
  		  	<tr>
  				<td colspan="2">
	  				<?php 
		  				
		  				$author_id = get_the_author_meta('ID');
		  				
		  				$twt_user = get_field('twitter_user_name', 'user_'. $author_id );
		  				
		  				if($twt_user):?>
		  				<a class="twitter author-link" href="http://twitter.com/<?php echo $twt_user?>" target="_blank">@<?php echo $twt_user?></a>
		  			<?php endif;?>
		  				<?php //if(the_author_meta('user_url')):?>
		  				<a href="<?php the_author_meta('user_url'); ?>" class="website author-link" target="_blank">Website</a>
		  				<?php //endif;?>
  				</td>
  			</tr>
  		  		
  		<tr class="hidden-sm hidden-xs">
  			<td>
  				<small class="time"><?php echo get_the_date(); ?></small>
  			</td>
  		</tr>

  	</tbody></table>
  </div>
  
			<div class="module tags"><?php echo get_the_tag_list();?></div>
	
	<!-- /1000710/F_RI_NS -->
	
</div>
			</div><!-- end table-->

			<div class="center subscribe-form">
	<form method="POST" id="email-subscribe" class="form-inline">
		<h4>Get futuristic videos and news delivered straight to your inbox</h4>
		<input class="form-control input-lg required email" type="text" name="email" placeholder="Your email address">
		<div class="select-lg Futurism">
			<select name="frequency" style="width: 110px; display: none;" class="select-lg chosen" id="frequency">
				<option value="Daily">Daily</option>
				<option value="Weekly">Weekly</option>
			</select><div class="chosen-container chosen-container-single chosen-container-single-nosearch" style="width: 110px;" title="" id="frequency_chosen"><a class="chosen-single" tabindex="-1"><span>Daily</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" readonly=""></div><ul class="chosen-results"></ul></div></div>
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
						amplitude.logEvent("Email Subscribed", {'Location': 'Archive', 'Device' : device});
					}else{
						alert('Error, please refresh the page and try again!');
					}
				}
			});
		}
	});
</script>
-->
		</section> <!-- section blog-content-->

	<?php get_template_part('template-parts/related', 'posts')?>

	<!-- AD Code -->
	
	</div>	<!-- end container-fluid content-container-->
			
	<!--
<script>

	window.originalPath = location.pathname;

	function loadNextPost(){
		if (0 == $('.next-post a').length) return;
		url = $('.next-post a').attr('href');
		$('.next-post').remove();
		$.get(url + '?ajax=true', function(result){
			$result = $($.parseHTML(result));
			$result.find('script.ajax-script').each(function(i) {
				eval($(this).text());
			});
			$result.find('.post-header section').css('paddingTop', 0);
			var html = $result.find('.ajax-post');
			$('.post-container').append(html);
			elements = $('h1');
			recordCurrentListing();
			if(window.originalPath != location.pathname){
				ga('set', 'dimension1', 'Infinite Scroll');
				ga('send', 'pageview', location.pathname);
				amplitude.logEvent("Infinite Scroll Pageview", {'Post Type': 'Post/Link'});
			}
			nextOffset = $('.next-post').offset().top;
			$(".post-content").fitVids({ customSelector: "iframe[src^='https://www.facebook.com']"});
			infinite_load_ads();
			loading = false;
			retrieve_post_experiment_image();
		});
	}

	var nextSlotId = 1;
	function generateNextSlotName() {
		var id = nextSlotId++;
		console.log(nextSlotId);
		return 'adslot' + id;
	}

	// Dynamically load ads shown via infinite scroll
	function infinite_load_ads(){

		console.log('Loading ad');

		var slotName = generateNextSlotName();

		// Define the slot itself, call display() to
		// register the div and refresh() to fetch ad.
		googletag.cmd.push(function() {

			var slot;

			$('.infinite-scroll-advert').each(function(){

				var slotName = generateNextSlotName();
				$(this).removeClass('infinite-scroll-advert').attr('id', slotName);

				if($(this).hasClass('sidebar-advert')){

					slot = googletag.defineSlot('/1000710/F_RI_N1', [[300, 250], [728, 90]], slotName).setTargeting('scroll', ['infinite']).addService(googletag.pubads());

				}else if($(this).hasClass('content-advert1')){

					slot = googletag.defineSlot('/1000710/F_RI_N2', [[300, 250], [728, 90]], slotName).setTargeting('scroll', ['infinite']).addService(googletag.pubads());

				}else if($(this).hasClass('content-advert2')){

					slot = googletag.defineSlot('/1000710/F_RI_N3', [[300, 250], [728, 90]], slotName).setTargeting('scroll', ['infinite']).addService(googletag.pubads());

				}

				googletag.pubads().enableSingleRequest();
				googletag.pubads().collapseEmptyDivs();
				googletag.pubads().setTargeting('environment', ['futurism_prod']).setTargeting('page', ['news']);
				googletag.enableServices();

				googletag.display(slotName);
				googletag.pubads().refresh([slot]);

			});

		});
	}

	function recordCurrentListing(){
		new Waypoint({
			element: $('h1').last(),
			continuous: false,
			offset: 'bottom-in-view',
			handler: function(direction) {
				el = (direction == 'down') ? this.element : this.previous().element;
				url = $(el).data('url');
				window.history.replaceState(null, null, url);
			}
		});
	}

	function retrieve_post_experiment_image(first) {
		if (typeof window.titleex_run_experiment == 'function') {

			/*if (!first) {
				window.titleex_run_experiment();
			}*/
			try {
				var fetch = {};
	            var find = 0;
				var newimage=1;


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
					new_image=1;
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
								var $elm = jQuery("[data-wpex-post-id='" + res.images[id].old + "']");
								$elm.css('background-image', 'url("'+res.images[id].new+'")');
							}
						}
						$('.post-header-full, .cover-bg').removeClass('post-img-hide');
					}, 'json');

				}
				else{new_image=0;}

				if(new_image==0){
				$('.post-header-full, .cover-bg').removeClass('post-img-hide');}
	        } catch(err) {}
	    }
	}

	$(function(){

		recordCurrentListing();

		$('.m-footer').hide();

		loading = false;

		nextOffset = $('.next-post').offset().top;

		$(document).on('scroll', function(){
			scrollPos = $(document).scrollTop();
			if(!loading && scrollPos >= (nextOffset - 1500)){
				loading = true;
				loadNextPost();
			}
		});

		$(window).scroll();
		retrieve_post_experiment_image(true);
	});

</script>	
-->
		
	</div> <!-- end ajax-post post-->
</div> <!-- end post-container -->