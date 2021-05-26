<!DOCTYPE html>
<html lang="<?= WP_MyTheme::get_html_lang(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript" async="true"></script>
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Add to homescreen for Chrome on Android -->
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="#1d7d74" />
	<link rel="icon" sizes="192x192" href="<?= WP_MyTheme::get_brand('icon'); ?>">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

	<!-- Add to homescreen for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
	<link rel="apple-touch-icon-precomposed" href="<?= WP_MyTheme::get_brand('icon'); ?>">

	<meta name="msapplication-TileImage" content="<?= WP_MyTheme::get_brand('icon'); ?>">
	<meta name="msapplication-TileColor" content="#1d7d74">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-C9R8Q86CG4"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-C9R8Q86CG4');
	</script>

	<link inline rel="stylesheet" href="<?= WP_MyFunctions::$theme_url; ?>/css/inline.min.css">
	<?php WP_MyFunctions::add_styles(); ?>
	<?php wp_head(); ?>
</head>
	<body <?php body_class('nav-fixed'); ?> itemscope itemtype="https://schema.org/WebPage">
		<header id="header" class="header" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
			<div class="container">
				<div class="row header-inner-row justify-content-between">
					<div class="brand">
						<a href="<?= home_url( '/' ); ?>">
							<img src="<?= WP_MyTheme::get_brand('brand'); ?>" alt="Escola Mais Diversa"/>
						</a>
					</div>
					<div class="nav-container">
						<?php wp_nav_menu(array('theme_location' => 'primary','menu_class' => 'nav-main', 'container' => 'nav')); ?>
					</div>
					<button class="toggle" id="menu-target">
						<span class="nav-icon">
							<span class="nav-icon__bar"></span>
						</span>
						<span class="nav-text">Menu</span>
					</button>
					<span class="ball"><?= WP_MyTheme::get_icon('super-ball'); ?></span>
				</div>
			</div>
		</header>