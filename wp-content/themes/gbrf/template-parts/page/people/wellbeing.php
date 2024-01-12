<?php
$wellbeing_slide_title = get_field('wellbeing_slide_title');
$wellbeing_slide_image = get_field('wellbeing_slide_image');
$wellbeing_title = get_field('wellbeing_title');
$wellbeing_copy = get_field('wellbeing_copy');
?>

<div class="section header-orange header-bg-white bg-white fp-auto-height-responsive bg-white pb-[50px] md:pb-[80px] lg:pb-[135px]" id="wellbeing" data-scroll-indicator-title="<?php echo $wellbeing_slide_title; ?>">
	<div class="slide-title text-blue">
		<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg"><?php echo $wellbeing_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $wellbeing_slide_title; ?></h2></div>
	</div>
	<div class="container mt-[35px]">
		<div class="row md:grid grid-cols-2 md:gap-x-[43px] items-center">
			<div class="col col1 text-white">
				<h2 class="uppercase text-blue xl:text-[6.25vw]"><?php echo $wellbeing_title; ?></h2>
				<p class="mt-[24px] text-blue  xl:text-[1.25vw]"><?php echo $wellbeing_copy; ?></p>
			</div>
			<div class="col">
				<img class="mt-[35px] w-full lg:w-[80%] xxl:w-[65%] lg:mt-0 mr-0 ml-auto" src="<?php echo $wellbeing_slide_image['url']; ?>">
			</div>
		</div>
	</div>
</div>
