<?php
$apprenticeships_slide_title = get_field('apprenticeships_slide_title');
$apprenticeships_slide_image = get_field('apprenticeships_slide_image');
$apprenticeships_text = get_field('apprenticeships_text');
?>

<div class="section relative header-bg-orange fp-auto-height-responsive bg-orange pb-[75px] md:pb-[120px] lf:pb-[190px]" id="promise" data-scroll-indicator-title="<?php echo $apprenticeships_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $apprenticeships_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $apprenticeships_slide_title; ?></h2></div>
		</div>
		<div class="container pt-[50px] md:mt-[100px] lg:mt-[170px] ">
			<div class="row md:flex md:items-center md:justify-center">
                <div class="col">
                    <h2 class="md:w-[75%] inset-0 md:absolute js-scroll fade-in-bottom font-extrabold uppercase text-white z-[2] m-auto relative top-[30%]"><?php echo $apprenticeships_text; ?></h2>
					<img class="mt-[-80px] md:mt-0 w-full animate m-auto z-[1]" src="<?php echo esc_url($apprenticeships_slide_image['url']); ?>">
				</div>
			</div>
		</div>
	</div>

