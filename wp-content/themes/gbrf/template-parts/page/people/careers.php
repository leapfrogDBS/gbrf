<?php
$p_careers_title = get_field('p_careers_title');
$p_careers_copy = get_field('p_careers_copy');
$p_careers_image = get_field('p_careers_image');
$p_careers_button_one_text = get_field('p_careers_button_one_text');
$p_careers_button_one_link = get_field('p_careers_button_one_link');
$p_careers_button_two_text = get_field('p_careers_button_two_text');
$p_careers_button_two_link = get_field('p_careers_button_two_link');
?>

<div class="section header-bg-white bg-white bg-white header-orange fp-auto-height-responsive pb-[50px] md:pb-[80px] lg:pb-[135px]" id="careers-slide" data-scroll-indicator-title="Careers">
    <div class="slide-title text-blue">
        <div class="container  pl-[2%]"><img class="bullet-point blue" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg">Careers<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Careers</h2></div>
    </div>
    <img class="cursor-pointer hidden down-arrow z-[101] bottom-[24px] h-[36px] w-[36px] md:bottom-[52px] rotate-90" src="<?php echo get_template_directory_uri();?>/img/arrow-lilac-right.svg">
    <div class="container">
        <div class="row pt-12 md:grid grid-cols-2 lg:grid-cols-3 gap-x-12 lg:gap-x-24">
            <div class="col col1 lg:col-span-2 text-white flex flex-col h-full justify-between">
                <h2 class="uppercase text-blue xl:text-[6.5vw] md:mb-12"><?php echo $p_careers_title; ?></h2>
                <p class="mt-[24px] xl:mt-0 text-blue xl:text-[1.25vw] lg:w-4/5"><?php echo $p_careers_copy; ?></p>
			</div>
            <div class="col flex flex-col">
				<img class="w-full mt-12 md:mt-0 mb-12" src="<?php echo $p_careers_image['url']; ?>">
                <div>
                    <a href ="<?php echo $p_careers_button_one_link['url']; ?>" class="btn white-btn mb-6"><?php echo $p_careers_button_one_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
                </div>
                <div>
                    <a href="<?php echo $p_careers_button_two_link['url']; ?>" class="btn blue-btn hover:border-white"><?php echo $p_careers_button_two_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
                </div>
    		</div>           
        </div>
    </div>				
</div>

