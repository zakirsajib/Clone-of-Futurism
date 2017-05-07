<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mt
 */

?>

<div class="clearfix"></div>

<div id="subscribe-footer" class="cover-bg">
	<div class="container">
		<p>Over 200,000 people subscribe to our newsletter.</p>
			<small>See stories of the future in your inbox each morning.</small>
				<div class="center subscribe-form">
					<form method="POST" id="email-subscribe-footer" class="form-inline">
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

	var $form = $('#email-subscribe-footer');

	var validator = $form.validate({
		errorPlacement: function(error, element) {
			null;
		},
		submitHandler: function(form) {
			var formData = $('#email-subscribe-footer').serialize();
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
						amplitude.logEvent("Email Subscribed", {'Location': 'Footer', 'Device' : device});
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
</div>

<footer id="footer">
	<div class="container">

		<p class="mission">
			<a href="<?php echo get_theme_mod('footer_heading_url', 'No footer heading url has been saved yet.')?>"> <?php echo get_theme_mod('footer_heading_text', 'No footer heading has been saved yet.')?> <i class="icon icon-arrow-right-c"></i></a>
		</p>
		
		<div class="row">
			<div class="col-sm-4 links">
				<div class="moduleTight">
					<a href="<?php echo home_url();?>/about">About</a>
					<a href="#">FAQ</a>
					<a href="#">DMCA Policy</a>
					<a href="#">Privacy Policy</a>
					<a href="#">Themes</a>
				</div>


				<div class="share">

					<a href="<?php echo get_theme_mod('url_field_fb')?>" target="_blank">
						<i class="icon icon-facebook"></i>
					</a>
					
					<a href="<?php echo get_theme_mod('url_field_twt')?>" target="_blank">
						<i class="icon icon-twitter"></i>
					</a>
					
					<a href="<?php echo get_theme_mod('url_field_reddit')?>" target="_blank">
						<i class="icon icon-reddit"></i>
					</a>
					
					<a href="<?php echo get_theme_mod('url_field_youtube')?>" target="_blank">
						<i class="icon icon-youtube"></i>
					</a>
					
					<a href="<?php echo get_theme_mod('url_field_inst')?>" target="_blank">
						<i class="icon icon-instagram"></i>
					</a>
					
					<a href="<?php echo home_url();?>/feed" target="_blank">
						<i class="icon icon-rss"></i>
					</a>
				</div>
			</div>

			<div class="col-sm-4 logo is-align-center">
			<img src="<?php echo get_theme_mod('footer_logo', 'No footer logo has been uploaded yet.')?>" alt="" class="footer-logo">

			<small><?php echo get_theme_mod('copyright_text', 'No copyright information has been saved yet.')?></small>
			<a rel="license" href="<?php echo get_theme_mod('ccl_url_text', 'No Creative Commons License information has been saved yet.')?>">
				<img class="cc" alt="Creative Commons License" style="border-width:0" src="<?php echo get_theme_mod('ccl', 'No Creative Commons License logo has been saved yet.')?>" />
			</a>
			</div>

			<div class="col-sm-4 contact is-align-right">
				<a class="btn btn-primary module-xs" href="<?php echo home_url();?>/contact-us">Contact Us</a>
			<div></div>
				<a class="btn btn-primary" href="<?php echo home_url();?>/contribute">Contribute</a>
			</div>

		</div>
	</div>
</footer>


<div class="modal" id="auth-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<button class="close-button">&times;</button>
				<div class="header">
					<div>
						<img src="<?php echo get_theme_mod('signin_logo', 'No Sign in logo has been uploaded yet.')?>" alt="" />
					</div>
				</div>
				<p class="caption">Sign in to join the conversation.</p>
				
				<div id="aa_social_login">
					<div class="social-networks">
						<a href="index-aa_social_action=FACEBOOK_LOGIN&redirect_to=_.html">
							<div class="aa-facebook">
								<i class="icon icon-facebook"></i>
								<span>Connect with Facebook</span>
							</div>
						</a>
						<a href="index-aa_social_action=TWITTER_LOGIN&redirect_to=_.html">
							<div class="aa-twitter">
								<i class="icon icon-twitter"></i>
								<span>Connect with Twitter</span>
							</div>
						</a>
					</div>
				</div>							
				<div class="footer">
						We only grab your name + photo and will <u>never</u> post as you.
				</div>
			</div>
		</div>
	</div>

<div id="mobile-subscribe" class="mobile-cta subscribe visible-sm visible-xs">

	<a class="close"><i class="icon icon-close"></i></a>

	<div class="teaser">
		<i class="icon icon-email"></i>
		<span>Subscribe</span>
	</div>

	<div class="form">
		<form action="//futurism.com/wp-content/themes/futurism/php/mailchimpSubscribe.php" type="POST">
		<div class="row row-tight">
			<div class="col-xs-9">
				<input class="form-control input-lg" type="email" name="email" required placeholder="Email Address">
			</div>
			<div class="col-xs-3">
				<button class="btn btn-white btn-block btn-lg">
					<i class="icon icon-arrow-right-c"></i>
				</button>
			</div>
		</div>
		</form>
	</div>

</div>

<!--
<script>

	jQuery( document ).ready( function( $ ) {

		
		if ('ontouchstart' in window) {
			var $mobile = $('body');
			$(document)
			.on('focus', '#mobile-subscribe input', function() {
				$mobile.addClass('fixfixed');
			})
			.on('blur', '#mobile-subscribe input', function() {
				$mobile.removeClass('fixfixed');
			});
		}

		$('#mobile-subscribe .teaser').on('click', function(){
			$(this).parent().addClass('active').find('input').focus();
			amplitude.logEvent("Subscibe Mobile Footer Clicked");
		});

		$('#mobile-subscribe .close').on('click', function(){
			$('#mobile-subscribe').removeClass('visible active');
			createCookie('emailSubscribed', 1, 30);
			createCookie('emailSubscribed7Days', 1, 7);
		});

	});

	var $form = $("#mobile-subscribe form");
	var validator = $form.validate({
		errorPlacement: function(error, element) {
			null;
		},
		submitHandler: function(form) {
			var formData = $form.serialize();
			$.ajax({
				url: $form.attr('action'),
				type: 'POST',
				data: formData,
				beforeSend: function() {
					$form.find('button').prop('disabled', true);
				},
				success: function(data){
					if(data.id || data.euid){

						$('#mobile-subscribe').addClass('success').find('.teaser span').text('Thanks for subscribing!');
						$('#mobile-subscribe').removeClass('active');

						setTimeout(function() {
							$('#mobile-subscribe').removeClass('visible');
						}, 1500);

						createCookie('emailSubscribed', 1, 365*20);
						createCookie('emailSubscribed7Days', 1, 7);

						
						amplitude.logEvent("Email Subscribed", {'Page' : 'Homepage','Location': 'Mobile Footer', 'Device' : 'Mobile'});

					}else{
						alert('Error, please refresh the page and try again!');
					}
				}
			});
		}
	});
</script>
-->

<div id="mobile-facebook" class="mobile-cta fb visible-sm visible-xs">

	<a class="close"><i class="icon icon-close"></i></a>

	<a target="_blank" class="teaser" href="http://facebook.com/futurism">
		<i class="icon icon-facebook"></i>
		<span>Like us on Facebook</span>
	</a>

</div>

<!--
<script>

	jQuery( document ).ready( function( $ ) {

		$('#mobile-facebook .close, #mobile-facebook .teaser').on('click', function(){
			$('#mobile-facebook').removeClass('visible');
			createCookie('facebookLiked', 1, 30);
		});

	});
</script>
-->
<div class="modal fade" id="subscribe-modal">
	<button data-dismiss="modal" class="close-button">&times;</button>
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="//futurism.com/wp-content/themes/futurism/php/mailchimpSubscribe.php" type="POST" class="cf">
				<img class="astro" src="<?php echo home_url();?>/wp-content/themes/mt/images/subscribe-astro.png" alt="" />
				<div class="cta">
					<div class="cover-bg">
													Get your Daily Dose<br/> of the Future
											</div>
				</div>
				<div class="fill-up-form">
					<h4 class="is-align-center">
													Get mind-blowing news & videos delivered right to your inbox!											</h4>
					<div class="row row-tight">
						<div class="col-sm-9">
							<input class="form-control input-lg" type="email" name="email" required placeholder="Email Address">
						</div>
						<div class="col-sm-3">
							<button class="btn btn-primary btn-lg">
								Subscribe							</button>
						</div>
					</div>
				</div>
			</form>
			<a data-dismiss="modal" class="close-link visible-xs">Close</a>
		</div>
	</div>
</div>


<!--
<script>
	jQuery( document ).ready( function( $ ) {

		$('#subscribe-modal').on('show.bs.modal', function () {
			/*var variant = (Math.random() < 0.5) ? 'text1' : 'text2';
			if(variant == 'text2') $('#subscribe-modal').addClass('variant').find('h4').html('Humanity is evolving.<br/> Subscribe so you don’t get left behind!');
			amplitude.logEvent("Subscribe Popup Shown", {'Variant': variant});*/
			//amplitude.logEvent("Subscribe Popup Shown");
		});

		var $form = $("#subscribe-modal form");

		var validator = $form.validate({
			errorPlacement: function(error, element) {
				null;
			},
			submitHandler: function(form) {
				var formData = $form.serialize();
				$.ajax({
					url: $form.attr('action'),
					type: 'POST',
					data: formData,
					beforeSend: function() {
						$form.find('button').prop('disabled', true);
					},
					success: function(data){
						if(data.id || data.euid){
							$form.find('.fill-up-form div').html('<h4 class="center alert-success no-padding">Subscribed successfully!</h4>');
							createCookie('emailSubscribed', 1, 365*20);
							createCookie('emailSubscribed7Days', 1, 7);

							setTimeout(function() {
								$('#subscribe-modal').modal('hide');
							}, 2000);

							var device = !(/Android|webOS|iPhone|iPod|iPad|BlackBerry/i.test(navigator.userAgent)) ? 'Desktop' : 'Mobile';
							var iframe = inIframe() ? 'Yes' : 'No';

							
							//var variant = ($('#subscribe-modal').hasClass('variant')) ? 'text2' : 'text1';

							amplitude.logEvent("Email Subscribed", {'Page' : 'Homepage','Location': 'Pop-up', 'Device' : device});

						}else{
							alert('Error, please refresh the page and try again!');
						}

						$form.find('input[name=email]').val('');
						$form.find('button').prop('disabled', false);
					}
				});
			}
		});

		$('#subscribe-modal').on('hide.bs.modal', function() {
			createCookie('emailSubscribed', 1, 30);
			createCookie('emailSubscribed7Days', 1, 7);
		});

		if(getUrlVar('subscribe')){

			$('#subscribe-modal').modal();

			$('#subscribe-modal img').on('click', function() {
				$('#subscribe-modal').modal('hide');
			});

			amplitude.logEvent("Subscribe Page Visited");

		}

	});
</script>
-->
<!-- check nav if included -->

<!--
<script type="text/javascript">
			var _sf_async_config={};
			_sf_async_config.uid = 78977;
			_sf_async_config.domain = "futurism.com";
			_sf_async_config.useCanonical = true;
			 _sf_async_config.authors = "";
			_sf_async_config.sections = "";
			(function(){
	  		function loadChartbeat() {
			window._sf_endpt=(new Date()).getTime();
			var e = document.createElement('script');
			e.setAttribute('language', 'javascript');
			e.setAttribute('type', 'text/javascript');
			e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
			document.body.appendChild(e);
		  }
		  var oldonload = window.onload;
		  window.onload = (typeof window.onload != 'function') ?
			 loadChartbeat : function() { try { oldonload(); } catch (e) { loadChartbeat(); throw e} loadChartbeat(); };
		})();
		</script>
-->
<script type='text/javascript'>
var colomatduration = 'fast';
var colomatslideEffect = 'slideFade';
</script>
<style>
.heading {
color: #3d9bd3;
}
</style>


<?php wp_footer(); ?>

</body>
</html>
