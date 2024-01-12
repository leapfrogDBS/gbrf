
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<base href="<?php echo get_bloginfo('url');?>/"/>
	<link rel="icon" href="data:;base64,iVBORw0KGgo=">
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>



<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gbrf' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-container desktop-header-container hidden md:block">
			<nav class="fixed inset-x-0 top-0 z-[999] pt-[48px] pb-[20px] bg-blue">
				<div class="container flex items-start justify-between p-x-[5%] w-full pl-[2%]">
					<div id="logo-container" class="logo-container w-[138px] md:w-[194px]"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo-orange.svg"/></a>
					</div> 		
				</div>
			</nav>
		</div>
		<div class="header-container mobile-header-container block md:hidden">
			<nav class="fixed inset-x-0 top-0 pt-[25px] z-[999] md:pt-[48px] pb-[20px] bg-blue">
				<div class="container flex items-start justify-between p-x-[5%] w-full">
					<div id="logo-container" class="logo-container w-[138px] md:w-[194px]">
						<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo-orange.svg"/></a>
					</div> 	
				</div>
			</nav>
		</div>
	</header>
	
	<?php
	include(locate_template('template-parts/footer.php'));	
	?>
</div>

</body>
</html>
