<?php
$charity_slide_title = get_field('charity_slide_title');
$charity_slide_image = get_field('charity_slide_image');
$charity_title = get_field('charity_title');
$charity_copy = get_field('charity_copy');
?>

<div class="section header-white header-bg-lilac bg-lilac fp-auto-height-responsive  pb-[50px] md:pb-[80px] lg:pb-[135px]" id="charity" data-scroll-indicator-title="<?php echo $charity_slide_title; ?>">
	<div class="slide-title text-white">
		<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $charity_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $charity_slide_title; ?></h2></div>
	</div>
	<div class="container mt-[35px]">
		<div class="row md:grid grid-cols-2 md:gap-x-[43px] items-center">
			<div class="col col1 text-white flex flex-col h-full justify-between">
				<h2 class="uppercase text-white xl:text-[6.25vw]"><?php echo $charity_title; ?></h2>
				<p class="mt-[24px] xl:mt-0 text-white xl:text-[1.25vw]"><?php echo $charity_copy; ?></p>
			</div>
			<div class="col">
				<img class="mt-[35px] md:mt-0 w-full lg:w-[80%] xxl:w-[65%] lg:mt-0 mr-0 ml-auto" src="<?php echo $charity_slide_image['url']; ?>">
			</div>
		</div>
	</div>
</div>
