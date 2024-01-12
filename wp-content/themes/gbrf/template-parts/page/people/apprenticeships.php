<?php
$company_ethos_slide_title = get_field('company_ethos_slide_title');
$company_ethos_slide_image = get_field('company_ethos_slide_image');
$company_ethos_text = get_field('company_ethos_text');
$company_ethos_button_title = get_field('company_ethos_button_title');
$company_ethos_buton_link = get_field('company_ethos_buton_link');
?>

<div class="section header-bg-orange fp-auto-height-responsive bg-orange pb-[85px]" id="promise" data-scroll-indicator-title="<?php echo $company_ethos_slide_title; ?>">
		<div class="slide-title text-white">
			<div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $company_ethos_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $company_ethos_slide_title; ?></h2></div>
		</div>
		<div class="container mt-[30px]">
			<div class="row">
				<div class="col flex flex-col">
					<h3 class="order-2 mt-[55px] max-w-[540px] js-scroll fade-in-bottom  text-white z-[2] ml-0 relative"><?php echo $company_ethos_text; ?></h3>
					<img class="order-1 w-full animate m-auto z-[1]" src="<?php echo esc_url($company_ethos_slide_image['url']); ?>">
				</div>
                <div class="col">
					<a href="<?php echo $company_ethos_buton_link['url']; ?>" class=" hover:border-white order-3 btn orange-btn orange-btn-2 mt-[30px] shrink-0"><?php echo $company_ethos_button_title; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden " src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
                </div>
			</div>
		</div>
	</div>