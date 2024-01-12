<?php
$buildings_slide_title = get_field('buildings_slide_title');
$buildings_slide_heading = get_field('buildings_heading');
$buildings_slide_copy = get_field('buildings_copy');


?>
<div><img class="w-full" src="<?php echo $buildings_slide_image['url']; ?>"></div>
<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[60px] lg:pb-[120px]" id="services" data-scroll-indicator-title="<?php echo $buildings_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $buildings_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Buildings</h2></div>
		</div>
		<div class="container mt-[40px]">
			<div class="row lg:grid lg:grid-cols-2 items-start gap-x-[50px]">
			<div class="col ">
                <div class="child:uppercase child:text-[44px] mb-[24px] lg:child:text-[63px] lg:mb-[32px] text-white"><?php echo $buildings_slide_heading; ?></div>
            </div>
            <div class="col col2 text-white">             
                <div><?php echo $buildings_slide_copy; ?></div>
            </div>
        </div>
    </div>
</div>