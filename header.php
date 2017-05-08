<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mt
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ias.min.js" type="text/javascript"></script>

<script type="text/javascript">
   var ias = $.ias({
     container: ".listings-group, .post-container, .section",
     item: ".post",
     pagination: ".navigation",
     next: ".nav-previous a, .navigation a, .nextpostslink",
   });

   ias.extension(new IASTriggerExtension({offset: 2}));
   ias.extension(new IASSpinnerExtension());
   ias.extension(new IASNoneLeftExtension({
	   text: 'You reached the end.',
   }));
 </script>
-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '380163329050741',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
		
	<nav id="nav" class="main-nav">
		<a class="menu-toggle pull-left visible-xs js"><i class="icon icon-menu"></i></a>
	
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo get_theme_mod('header_logo', 'No header logo has been uploaded yet.')?>" alt="">
		</a>
		
		<?php
            wp_nav_menu( array(
                'menu'              => 'menu-1',
                'theme_location'    => 'primary',
                'container'         => 'ul',
                'menu_class'        => 'mobile-menu pull-left navbar-nav no-margin',
                'walker'            => new MT_Walker_Nav_Menu()
            ));
        ?>
		<ul class="pull-right navbar-nav no-margin">
			<li class="pull-right" style="margin-right: 0;">
					<a class="sign-in-btn btn btn-primary" href="#"><span class="hidden-xs">Sign In</span><i class="icon icon-person"></i></a>
			</li>
			<li class="search pull-right">
				<a class="js" id="search"><i class="icon icon-search"></i></a>
				<div id="search-dropdown" class="dropdown-menu">
					<div class="container">
						<form  action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="text" name="s"/>
							<button type="submit"><i class="icon icon-search"></i></button>
						</form>
					</div>
				</div>
			</li>
	
			
		</ul>
	</nav>