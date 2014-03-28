<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<?php if ($Title = get_post_meta($post->ID,'MetaTitle',true)) : ?>
		<title><?php echo $Title; ?></title>
		<?php else : ?>
		<title><?php the_title(); ?></title>
		<?php endif; ?>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">
					<div class="header-top clearfix">
						<div class="search-form clearfix">
							<span><a href="<?php bloginfo('url'); ?>/spanish">Hablamos español</a></span>
							<span>(561) 366-9099</span>
							<span>SEARCH</span>
							<form id="searchform" method="get" action="<?php bloginfo('siteurl')?>/">
								<input type="text" name="s" id="s" class="search-box" value="<?php echo wp_specialchars($s, 1); ?>" />
								<input class="search-button" type="submit" name="submit" value="<?php _e('Search'); ?>" />
							</form>
						</div>


						<a class="logo clearfix" href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php bloginfo('template_directory'); ?>/library/images/logo.png" alt="Murray & Guari" />
						</a>

						<div class="tag-container">
							<span class="tag-line"><?php  bloginfo('description'); ?></span>
						</div>
						
						<div class="building-icon">
							<img src="<?php bloginfo('template_directory'); ?>/library/images/mg-building-icon.png" alt="Murray & Guari Bulding Icon">
						</div>
					</div>

<!--
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span> 
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<?php bones_main_nav(); ?>
						</div>
					</nav>
-->

				</div>

				<div class="mainmenu wrap clearfix">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<?php bones_main_nav(); ?>
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span> 
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</nav>
				</div>
			</header>
