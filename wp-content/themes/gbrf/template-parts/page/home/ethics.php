<?php
$our_ethics_slide_title = get_field('our_ethics_slide_title');
$our_ethics_slide_image = get_field('our_ethics_slide_image');
$our_ethics_slide_image_mobile = get_field('our_ethics_slide_image_mobile');
$our_ethics_slide_copy = get_field('our_ethics_slide_copy');
$our_ethics_slide_heading_text = get_field('our_ethics_slide_heading_text');
$our_ethics_button_label = get_field('our_ethics_button_label');
$our_ethics_button_link = get_field('our_ethics_button_link');
?>

<div class="section bg-transparent" data-scroll-indicator-title="<?php echo $our_ethics_slide_title; ?>">
<div><img class="w-full" src="<?php echo $our_ethics_slide_image['url']; ?>"></div>
</div>


<div class="section header-bg-blue fp-auto-height-responsive bg-blue pt-0 pb-[100px]" id="ethics" data-scroll-indicator-title="<?php echo $our_ethics_slide_title; ?>">
	
	<div class="slide-title text-white">
		<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $our_ethics_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Our Ethics</h2></div>
	</div>
	<div class="container mt-[40px]">
		<div class="row lg:grid lg:grid-cols-2 lg:gap-x-[32px]">
			<div class="col col1 mb-[30px] lg:mb-0">
				<div class="text-white uppercase ethics-text">
					<?php echo $our_ethics_slide_heading_text; ?>
				</div>
			</div>
			<div class="col col2 text-white">
				<?php echo $our_ethics_slide_copy; 
				if ($our_ethics_button_label && $our_ethics_button_link) { ?>
					<a href="<?php echo $our_ethics_button_link['url']; ?>" class="btn blue-btn hover:border-white mt-[24px]"><?php echo $our_ethics_button_label; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>