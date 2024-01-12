<?php
$simulators_slide_title = get_field('simulators_slide_title');
$simulators_heading_text = get_field('simulators_heading_text');
$simulators_copy = get_field('simulators_copy');
$simulators_slide_image_one = get_field('simulators_slide_image_one');
?>
<div class="section bg-transparent">
<div><img class="w-full" src="<?php echo $simulators_slide_image_one['url']; ?>"></div>
</div>
<div class="section header-bg-white bg-white header-orange fp-auto-height-responsive bg-white pb-0 lg:pb-[110px]" id="simulator" data-scroll-indicator-title="<?php echo $simulators_slide_title; ?>">
	<div class="slide-title text-blue">
		<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg"><?php echo $simulators_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $simulators_slide_title; ?></h2></div>
	</div>
	<div class="container mt-[45px]">
		<div class="row lg:grid lg:grid-cols-2">
			<div class="col col1 flex flex-col text-blue">
				<?php echo $simulators_heading_text; ?>
			</div>			
			<div class="col col2 text-blue mb-[76px] mt-[24px] lg:mt-0 lg:pl-[50px] lg:mb-0 lg:grid grid-cols-2 gap-x-[35px]">
				<?php echo $simulators_copy; ?>
			</div>
		</div>
	</div>
</div>