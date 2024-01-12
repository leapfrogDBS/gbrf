<?php
$service_slide_title = get_field('service_slide_title');
$service_slide_copy = get_field('service_slide_copy');
?>

<div class="section header-bg-blue fp-auto-height-responsive bg-blue pt-0 pb-[100px]" id="our-services" data-scroll-indicator-title="<?php echo $service_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $service_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Our Service</h2></div>
		</div>
		<div class="container mt-[40px]">
			<div class="row mb-[100px]">
				<div class="col col1 text-white lg:w-1/2">
					<?php echo $service_slide_copy; ?>
				</div>
									
			</div>
			
			<div class="row">
				<div class="col col1 text-white lg:pr-[50px]">
				
				</div>
				<div class="col col2 flex flex-col md:flex-row md:flex-wrap gap-x-[25px] lg:gap-y-[25px]">

					<?php while( have_rows('our_service_button')) : the_row();
						$our_service_button_text = get_sub_field('our_service_button_text');
						$our_service_button_link = get_sub_field('our_service_button_link');
						 ?>
						<div class="btn-container mt-[24px] lg:mt-[0]">
							<a href="<?php echo $our_service_button_link['url']; ?>" class="btn blue-btn  hover:border-white whitespace-normal "><?php echo $our_service_button_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
						</div>	
					<?php endwhile; ?>

				</div>
			</div>
		</div>
	</div>
