<?php
/**
 * Template part for displaying single image type posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MT
 */

?>
		
<div class="post-container">
	<div class="ajax-post image">
	<div style="margin:auto; max-width: 100%; width:1050px">
		<section class="sectionv">
			<div class="container">
				<div class="weekly-image">
					<h1 data-url="<?php the_permalink()?>" class="center page-title invisible"><?php the_title()?></h1>

					<div class="center">
						<?php the_content()?>
					</div>

					<div class="module">
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
						amplitude.logEvent("Email Subscribed", {'Location': 'Infographic', 'Device' : device});
					}else{
						alert('Error, please refresh the page and try again!');
					}
				}
			});
		}
	});
</script>
-->									
</div>

									
					<div class="meta">
						<?php if(get_field('post_shortlink')):?>
						<p class="shortlink">
							<i class="icon icon-link"></i>
							<input onClick="this.select();" type="text" value="<?php the_field('post_shortlink')?>"/>
						</p><?php endif;?>
					</div>					

					<div class="big-share-buttons module">
  		<div class="row-tight">
  			<div class="col-xs-3">
  				<a class="btn btn-lg facebook" data-service="facebook" data-url="<?php the_permalink()?>" data-desc="<?php the_title()?>"><i class="icon icon-facebook"></i> <span>Share This</span></a>
  			</div>
  			<div class="col-xs-3">
  				<a class="btn btn-lg twitter" data-service="twitter" title="Tweet this" href="http://twitter.com/share?text=<?php the_title()?>&url=<?php the_permalink()?>" target="_blank"><i class="icon icon-twitter"></i> <span>Tweet This</span>
  				</a>
  			</div>
  			  			<div class="col-xs-3">
  				<a class="btn btn-lg pinterest" data-service="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink()?>&media=<?php the_post_thumbnail_url(); ?>&description=<?php the_title()?>">
  					<i class="icon icon-pinterest"></i> <span>Pin This</span>
  				</a>
  			</div>
  		  		<div class="col-xs-3">
  			<a class="btn btn-lg email" data-service="email" title="Email this link" href="mailto:?subject=Check out this article&amp;body=<?php the_permalink()?>"><i class="icon icon-email"></i> <span>Email This</span>
  			</a>
  		</div>
  	</div>
  </div>
				</div>
			</div>
		</section>
	</div>

<!--
<script>

	window.originalPath = location.pathname;

	function loadNextPost(){
		if (0 == $('.next-post a').length) return;

		url = $('.next-post a').attr('href');
		$('.next-post').remove();
		$.get(url, function(result){
			$result = $($.parseHTML(result));
			$result.find('script.ajax-script').each(function(i) {
				eval($(this).text());
			});
			$result.find('.post-header section').css('paddingTop', 0);
			var html = $result.find('.ajax-post');
			$('.post-container').append(html).ready(function(){
				recordCurrentListing();
				if(window.originalPath != location.pathname){
					ga('send', 'pageview', location.pathname);
					amplitude.logEvent("Infinite Scroll Pageview", {'Post Type': 'Infographic'});
				}
				nextOffset = $('.next-post').offset().top;
				$(".image-video-container").fitVids({ customSelector: "iframe"});
				$("select.chosen").chosen();
				loading = false;
			});
		});
	}

	function recordCurrentListing(){
		offset  = $('h1').last().offset();
		title = $('h1').last().text();
		console.log(offset.top + ' - ' + title);
		new Waypoint({
			element: $('h1').last(),
			continuous: false,
			offset: 'bottom-in-view',
			handler: function(direction) {
				el = (direction == 'down') ? this.element : this.previous().element;
				url = $(el).data('url');
				window.history.replaceState(null, null, url);
				jQuery("img.wpexpro-image").removeClass("wpexpro-image");
			}
		});
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

	});
</script>
-->
	
		
	</div> <!-- end ajax-post image-->
</div> <!-- end post-container -->