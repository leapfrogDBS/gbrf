<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gbrf
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<base href="<?php echo get_bloginfo('url'); ?>/" />
	<link rel="icon" href="data:;base64,iVBORw0KGgo=">
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
	<!-- Include your Vue.js script -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.6/axios.min.js" integrity="sha512-06NZg89vaTNvnFgFTqi/dJKFadQ6FIglD6Yg1HHWAUtVFFoXli9BZL4q4EO1UTKpOfCfW5ws2Z6gw49Swsilsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>



	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'gbrf'); ?></a>

		<header id="masthead" class="site-header">
			<div class="header-container desktop-header-container hidden md:block">
				<nav class="fixed inset-x-0 top-0 z-[999] pt-[48px] pb-[20px]">
					<div class="container flex items-start justify-between p-x-[5%] w-full pl-[2%]">
						<div id="logo-container" class="logo-container w-[138px] md:w-[194px]"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.svg" data-white="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-white.svg" data-orange="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-orange.svg" data-blue="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-blue.svg" /></a>
						</div>
						<div class="flex items-center gap-x-[24px]">
							<div id="search-container" class="w-[40px] cursor-pointer">
								<img class="absolute" id="search-icon" src="<?php echo get_template_directory_uri(); ?>/img/search.svg" data-white="<?php echo get_stylesheet_directory_uri(); ?>/img/search.svg" data-orange="<?php echo get_stylesheet_directory_uri(); ?>/img/search-orange.svg" />
								<div class="absolute left-[-10px] top-[5px] invisible close-search relative w-[28px] h-[18px] cursor-pointer z-[999] rotate-90 md:w-[40px]" id="close-search">
									<span class="bg-orange rotate-45 translate-y-[6px] translate-0 hamburger-top w-[28px] h-[2px] absolute top-0 left-0 md:w-[40px]"></span>
									<span class="bg-orange -rotate-45 translate-y-[6px] translate-0 hamburger-bottom w-[28px] h-[2px] absolute top-0 left-0 md:w-[40px]"></span>
								</div>
							</div>
							<div class="w-[28px] h-[18px] md:w-[40px]">
								<div class="hamburger relative w-[28px] h-[18px] cursor-pointer transition-all z-[999] md:w-[40px]" id="menu-btn">
									<span class="hamburger-top w-[28px] h-[2px] absolute top-0 left-0 rotate-0 transition-all duration-500 translate-y-0 md:w-[40px]"></span>
									<span class="hamburger-bottom w-[28px] h-[2px] absolute top-0 left-0 rotate-0 transition-all duration-500 translate-y-[16px] md:w-[40px]"></span>
								</div>
							</div>
						</div>
					</div>
				</nav>
			</div>
			<div class="header-container mobile-header-container block md:hidden">
				<nav class="fixed inset-x-0 top-0 pt-[25px] z-[999] md:pt-[48px] pb-[20px]">
					<div class="container flex items-start justify-between p-x-[5%] w-full">
						<div id="logo-container" class="logo-container w-[138px] md:w-[194px]">
							<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-orange.svg" data-white="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-white.svg" data-orange="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-orange.svg" data-blue="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-blue.svg" /></a>
						</div>
						<div class="flex items-center gap-x-[24px]">
							<div id="mobile-search-container" class="cursor-pointer">
								<img class="absolute" id="mobile-search-icon" src="<?php echo get_template_directory_uri(); ?>/img/search-orange.svg" data-white="<?php echo get_stylesheet_directory_uri(); ?>/img/search.svg" data-orange="<?php echo get_stylesheet_directory_uri(); ?>/img/search-orange.svg" />
								<div class="absolute left-[-2px] top-[5px] invisible mobile-close-search relative w-[28px] h-[18px] cursor-pointer transition-all z-[999] rotate-90 md:w-[40px]" id="mobile-close-search">
									<span class="bg-orange rotate-45 translate-y-[6px] translate-0 hamburger-top w-[28px] h-[2px] absolute top-0 left-0 md:w-[40px]"></span>
									<span class="bg-orange -rotate-45 translate-y-[6px] translate-0 hamburger-bottom w-[28px] h-[2px] absolute top-0 left-0 md:w-[40px]"></span>
								</div>
							</div>
							<div class="hamburger relative w-[28px] h-[18px] cursor-pointer transition-all duration-[0.25s] z-[999] md:w-[40px]" id="mobile-menu-btn">
								<span class="hamburger-top w-[28px] h-[2px] absolute top-0 left-0 rotate-0 transition-all duration-500 translate-y-0 md:w-[40px]"></span>
								<span class="hamburger-bottom w-[28px] h-[2px] absolute top-0 left-0 rotate-0 transition-all duration-500 translate-y-[16px] md:w-[40px]"></span>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>

		<div id="splash-menu" class="justify-end container overflow-scroll invisible opacity-0  fixed inset-0 bg-blue z-[997] flex-col lg:justify-center py-[120px] lg:py-[148px] px-[3.3333%]">
			<div class=" lg:grid lg:grid-cols-2 border-y border-grey">
				<?php
				$menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
				// This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);

				$menuID = $menuLocations['header']; // Get the *primary* menu ID

				$primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.

				foreach ($primaryNav as $navItem) { ?>
					<div class="menu-item-container flex border-b border-grey">
						<a class="menu-item relative uppercase text-[6vh] text-white  pt-[8px] pb-[16px] m-0 leading-none lg:text-[107px]" href="<?php echo $navItem->url; ?>"><span data-content="<?php echo $navItem->title; ?>" aria-hidden="true"></span><?php echo $navItem->title; ?></a>
					</div>
				<?php
				}
				?>

			</div>
		</div>

		<div id="search-page" class="justify-end overflow-scroll invisible opacity-0  fixed inset-0 bg-lilac z-[998]">
			<div class="section header-bg-lilac min-h-screen bg-lilac pb-[64px] mt-[150px]" id="services" data-scroll-indicator-title="<?php echo $privacy_slide_title; ?>">
				<div class="container">
					<!-- // The HTML (could be part of page content) // -->
					<input class="bg-transparent w-full text-white text-center uppercase font-bold text-[40px] sm:text-[60px] md:text-[85px] xl:text-[107px] border-b-[1px] border-white" type="text" name="keyword" id="keyword" onkeyup="fetch()"></input>
					<div id="datafetch" class="mt-[50px]"></div>
				</div>
			</div>
		</div>

		<div id="to-top-button" class="fixed bottom-0 right-0 z-[997] cursor-pointer lg:hidden">
			<img class="w-[98px]" src="<?php echo get_template_directory_uri(); ?>/img/to-top.svg">
		</div>