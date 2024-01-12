<?php
$services_slide_title = get_field('services_slide_title');
$services_slide_image = get_field('services_slide_image');
$services_slide_heading_text = get_field('services_slide_heading_text');
$services_slide_copy = get_field('services_slide_copy');

?>
<div class="section bg-transparent">
	<div><img class="w-full mt-[79px] md:mt-0" src="<?php echo $services_slide_image['url']; ?>"></div>
</div>
<div class="section header-bg-transparent fp-auto-height-responsive bg-blue pb-[90px]" id="services" data-scroll-indicator-title="<?php echo $services_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container px-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $services_slide_title; ?></div>
		</div>
		<div class="container">
			<div class="row mt-[40px] mb-[65px] border-b-[1px] border-solid border-white">
				<div class="col">
					<h1 class="railfreight text-white flex-1 font-normal text-[14px] lg:text-[16px] mb-[15px]">GB railfreight services</h1>
				</div>
			</div>
			<div class="row lg:grid lg:grid-cols-2 gap-x-[32px]">
			<div class="col text-white">
				<?php echo $services_slide_heading_text; ?>

				</div>
				<div class="col text-white">
					<?php echo $services_slide_copy; ?>
				</div>
			</div>
		</div>
	</div>
