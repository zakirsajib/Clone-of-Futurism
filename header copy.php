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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav id="nav" class="main-nav">
		<a class="menu-toggle pull-left visible-xs js"><i class="icon icon-menu"></i></a>
	
		<a class="logo" href="<?php echo home_url();?>">
			<img src="<?php echo get_theme_mod('header_logo', 'No header logo has been uploaded yet.')?>" alt="">
		</a>
	
		<ul class="mobile-menu pull-left navbar-nav no-margin">
			<li class="news m-nav-sub menu-item m-dropdown-menu dropdown dropdown-hover active">
				<a href="<?php echo home_url();?>">News</a>
				<ul class="dropdown-menu">
											<li>
								<a href="advancedtransport/index.html">Advanced Transport</a>
							</li>
													<li>
								<a href="artificialintelligence/index.html">Artificial Intelligence</a>
							</li>
													<li>
								<a href="earthandenergy/index.html">Earth &amp; Energy</a>
							</li>
													<li>
								<a href="enhancedhumans/index.html">Enhanced Humans</a>
							</li>
													<li>
								<a href="futuresociety/index.html">Future Society</a>
							</li>
													<li>
								<a href="hardscience/index.html">Hard Science</a>
							</li>
													<li>
								<a href="healthmedicine/index.html">Health &amp; Medicine</a>
							</li>
													<li>
								<a href="offworld/index.html">Off World</a>
							</li>
													<li>
								<a href="robotsmachines/index.html">Robots &amp; Machines</a>
							</li>
													<li>
								<a href="scifivisions/index.html">Sci-Fi Visions</a>
							</li>
													<li>
								<a href="virtuality/index.html">Virtuality</a>
							</li>
										</ul>
			</li>
			<li id="menu-item-6406" class="m-nav-sub infographics menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-6406 dropdown dropdown-hover"><a title="Infographics" href="infographics/index.html">Infographics</a>
	<ul class=" dropdown-menu">
		<li id="menu-item-35344" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-35344"><a title="Daily Infographics" href="infographics/index.html">Daily Infographics</a></li>
		<li id="menu-item-45037" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-45037"><a title="This Week in Science" href="thisweekinscience/index.html">This Week in Science</a></li>
		<li id="menu-item-45038" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-45038"><a title="Facts &amp; Quotes" href="factsandquotes/index.html">Facts &#038; Quotes</a></li>
	</ul>
	</li>
	<li id="menu-item-5846" class="m-nav-sub videos menu-item menu-item-type-custom menu-item-object-custom menu-item-5846"><a title="Videos" href="videos/index.html">Videos</a></li>
		</ul>
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