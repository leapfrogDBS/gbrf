<?php
$news_slide_title = get_field('news_slide_title');
$news_hero_image = get_field('news_hero_image');
$news_hero_copy = get_field('news_hero_copy');
$news_hero_button_one_text = get_field('news_hero_button_one_text');
$news_hero_button_two_text = get_field('news_hero_button_two_text');
$news_hero_button_one_link = get_field('news_hero_button_one_link');
$news_hero_button_two_link = get_field('news_hero_button_two_link');
?>

<div class="section invisible header-orange relative header-bg-transparent fp-auto-height-responsive bg-blue" id="news-hero" data-scroll-indicator-title="<?php echo $news_slide_title; ?>">
    <div class="slide-title text-white">
        <div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $news_slide_title; ?><h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
    </div>
    <div class="row lg:grid lg:grid-cols-2 items-end lg:h-full">
        <div class="col col1 lg:order-2 bg-cover">
            <img src="<?php echo $news_hero_image['url']; ?>" class="h-[50vh] lg:h-[100vh] w-full object-cover">
        </div>
        <div class="col col2  mt-[60px] px-[3.333%] text-white h-[50vh] lg:order-1 lg:pr-[50px] lg:pl-[28%] lg:pb-[100px] lg:h-auto lg:mt-0">
            <div><?php echo $news_hero_copy; ?></div>
            <div class="flex flex-col items-start mt-[20px] lg:flex-row">                
                <div id="news-link" class="btn blue-btn mb-[20px] lg:mr-[24px]">News<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></div>
                <div id="cs-link" class="btn blue-btn">Case Studies<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></div>
            </div>

        </div>
    </div>
</div>

