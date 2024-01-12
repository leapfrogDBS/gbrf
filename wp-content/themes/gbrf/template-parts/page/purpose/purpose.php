<?php
$planet_slide_title = get_field('planet_slide_title');
$planet_hero_image = get_field('planet_hero_image');
$planet_hero_copy = get_field('planet_hero_copy');
?>
<div class="section bg-transparent">
<div><img class="w-full mt-[79px] md:mt-0" src="<?php echo $planet_hero_image['url']; ?>"></div>
</div>
<div class="section header-bg-transparent fp-auto-height-responsive bg-blue pb-[100px]" id="training" data-scroll-indicator-title="<?php echo $planet_slide_title; ?>">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $planet_slide_title; ?></div>
    </div>
    <div class="container">
        <div class="row mt-[40px] mb-[30px]">
            <div class="col">
                <h1 class="railfreight text-white flex-1 font-normal text-[14px] lg:text-[16px] mb-[15px]">Purpose</h1>
            </div>
        </div>
        <div class="row">
            <div class="col col2 text-white max-w-[670px]">
                <div class="ethics-text purpose uppercase"><?php echo $planet_hero_copy; ?></div>       
            </div>
        </div>
    </div>
</div>