<?php
$safety_culture_slide_title = get_field('safety_culture_slide_title');
$safety_culture_slide_image = get_field('safety_culture_slide_image');
$safety_culture_slide_heading = get_field('safety_culture_heading');
$safety_culture_slide_copy = get_field('safety_culture_copy');
$safety_culture_button_text = get_field('safety_culture_button_text');
$safety_culture_button_link = get_field('safety_culture_button_link');

?>
<div><img class="w-full" src="<?php echo $safety_culture_slide_image['url']; ?>"></div>
<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[60px] lg:pb-[120px]" id="services" data-scroll-indicator-title="<?php echo $safety_culture_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $safety_culture_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $safety_culture_slide_title; ?></h2></div>
		</div>
		<div class="container mt-[40px]">
			<div class="row lg:grid lg:grid-cols-2 items-start gap-x-[50px]">
			<div class="col ">
                <div class="child:uppercase child:text-[44px] mb-[24px] lg:child:text-[63px] lg:mb-[32px] text-white"><?php echo $safety_culture_slide_heading; ?></div>
            </div>
            <div class="col col2 text-white">             
                <div><?php echo $safety_culture_slide_copy; ?></div>
                <?php if ($safety_culture_button_text && $safety_culture_button_link ) { ?>
                    <a href="<?php echo $safety_culture_button_link['url']; ?>" class="btn blue-btn hover:border-white mt-[40px]"><?php echo $safety_culture_button_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>