<?php
$training_slide_title = get_field('training_slide_title');
$training_slide_image = get_field('training_slide_image');
$training_slide_heading_text = get_field('training_slide_heading_text');
$training_slide_copy = get_field('training_slide_copy');
$training_button_text = get_field('training_button_text');
$training_button_link = get_field('training_button_link');
?>
<div class="section bg-transparent">
<div><img class="w-full mt-[79px] md:mt-0" src="<?php echo $training_slide_image['url']; ?>"></div>
</div>
<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[64px]" id="training" data-scroll-indicator-title="<?php echo $training_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container px-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $training_slide_title; ?></div>
		</div>
		<div class="container">
			<div class="row mt-[40px] mb-[65px] border-b-[1px] border-solid border-white">
				<div class="col">
					<h1 class="railfreight text-white flex-1 font-normal text-[14px] lg:text-[16px] mb-[15px]">Train Manager</h1>
				</div>
			</div>
			<div class="row lg:grid lg:grid-cols-2 gap-x-[50px]">
				<div class="col text-white">
					<?php echo $training_slide_heading_text; ?>

				</div>
				<div class="col text-white ">
					<?php echo $training_slide_copy;
					if ($training_button_text && $training_button_link) { ?>
						<a href="<?php echo $training_button_link['url']; ?>" class="btn blue-btn hover:border-white mt-[24px] lg:mt-[32px]"><?php echo $training_button_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
