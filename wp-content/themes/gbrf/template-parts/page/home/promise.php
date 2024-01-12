<?php
$promise_slide_title = get_field('promise_slide_title');
$promise_slide_image = get_field('promise_slide_image');
$promise_slide_copy = get_field('promise_slide_copy');
?>

<div class="section header-bg-orange fp-auto-height-responsive bg-orange pt-0 pb-[56px] md:pb-[185px]" id="promise" data-scroll-indicator-title="<?php echo $promise_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $promise_slide_title; ?><h2 class="hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Our Promise</h2></div>
		</div>
		<div class="container mt-[50px] md:mt-[100px] lg:mt-[180px]">
			<div class="row">
				<div class="col relative">
					<h2 class="js-scroll fade-in-bottom font-extrabold uppercase text-white z-[2] m-auto absolute flex items-center inset-0"><?php echo $promise_slide_copy; ?></h2>
					<img class="w-full animate max-w-[800px] m-auto mt-[-17px] z-[1] md:mt-[-40px] lg:mt-[-70px]" src="<?php echo esc_url($promise_slide_image['url']); ?>">
				</div>
			</div>
		</div>
	</div>