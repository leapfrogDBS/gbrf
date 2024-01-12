<?php
$vacancies_slide_title = get_field('vacancies_slide_title');
$vacancies_heading = get_field('vacancies_heading');
$vacancies_copy = get_field('vacancies_copy');
$vacancies_button_one_title = get_field('vacancies_button_one_title');
$vacancies_button_one_link = get_field('vacancies_button_one_link');
$vacancies_button_two_title = get_field('vacancies_button_two_title');
$vacancies_button_two_link = get_field('vacancies_button_two_link');
?>

<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[75px] lg:pb-[125px]" id="vacancies" data-scroll-indicator-title="<?php echo $vacancies_slide_title; ?>">
    <div class="slide-title text-white">
        <div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $vacancies_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $vacancies_slide_title; ?></h2></div>
    </div>
    <div class="container text-white mt-[40px]">
        <div class="row">
            <div class="col lg:grid lg:grid-cols-2 lg:gap-x-[45px]">
                <div class="uppercase ethics-text text-6xl"><?php echo $vacancies_heading; ?></div>
                <div>
                    <div class="paragraph-standard mt-[16px] child:mb-[20px]"><?php echo $vacancies_copy; ?></div>
                    <div class="col xxl:flex gap-x-[25px] xxl:mt-[60px]"> 
                        <?php if ($vacancies_button_one_title && $vacancies_button_one_link) { ?>
                            <div><a href="<?php echo $vacancies_button_one_link['url']; ?>" class="btn blue-btn border-white mt-[4px] xxl:mt-0"><?php echo $vacancies_button_one_title; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a></div>
                        <?php } ?>
                        <?php if ($vacancies_button_two_title && $vacancies_button_two_link) { ?>
                            <div><a href="<?php echo $vacancies_button_two_link['url']; ?>" class="btn orange-btn mt-[16px] xxl:mt-0 hover:border-white"><?php echo $vacancies_button_two_title; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a></div>
                        <?php } ?>    
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>