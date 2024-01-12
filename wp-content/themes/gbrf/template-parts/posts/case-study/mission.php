<?php
$mission_image = get_field('mission_image');
$mission_statement = get_field('mission_statement');
?>

<div class="section header-bg-orange fp-auto-height-responsive bg-orange pb-[60px] md:pb-120px] lg:pb-[190px]" id="promise" data-scroll-indicator-title="Mission Statement">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Mission Statement<h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
		</div>
		<div class="container mt-0 md:mt-[150px] lg:mt-[225px] relative">
			<div class="row">
				<div class="col">
					
					<img class="w-full md:animate max-w-[800px] m-auto md:mt-[-17px] z-[1] md:mt-[-40px] lg:mt-[-70px]" src="<?php echo esc_url($mission_image['url']); ?>">
					<h2 class="js-scroll mt-[25px] w-full fade-in-bottom font-extrabold uppercase text-white max-w-[1035px] md:mt-0 md:w-[90%] z-[2] m-auto md:absolute flex items-center inset-0"><?php echo $mission_statement; ?></h2>
				</div>
			</div>
		</div>
	</div>