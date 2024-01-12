<?php
$p_our_ethics_slide_title = get_field('p_our_ethics_slide_title');
$p_our_ethics_slide_image = get_field('p_our_ethics_slide_image');
$p_our_ethics_slide_heading = get_field('p_our_ethics_slide_heading');
$p_our_ethics_slide_copy = get_field('p_our_ethics_slide_copy');
?>
<div class="section bg-transparent">
<div><img class="w-full mt-[79px] md:mt-0" src="<?php echo $p_our_ethics_slide_image['url']; ?>"></div>
</div>
<div class="section header-bg-transparent fp-auto-height-responsive bg-blue pb-[85px]" id="ethics" data-scroll-indicator-title="<?php echo $p_our_ethics_slide_title; ?>">
	<div class="slide-title text-white">
		<div class="container px-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $p_our_ethics_slide_title; ?></div>
	</div>
	<div class="container">
		<div class="row mt-[40px] mb-[65px] border-b-[1px] border-solid border-white">
            <div class="col">
                <h1 class="railfreight text-white flex-1 font-normal text-[14px] lg:text-[16px] mb-[15px]">People</h1>
            </div>
        </div>
		<div class="row lg:grid lg:grid-cols-2 items-start">
			<div class="col pr-[50px]">
				<h3 class="text-white"><?php echo $p_our_ethics_slide_heading; ?></h3>
			</div>
			<div class="col text-white">
				<?php echo $p_our_ethics_slide_copy; ?>
			</div>
		</div>
	</div>
</div>


	