<?php
$trains_slide_title = get_field('trains_slide_title');
$trains_slide_image = get_field('trains_slide_image');
$trains_heading_text = get_field('trains_heading_text');

?>
<div class="w-full bg-blue pt-[150px] lg:pt-[280px]"><img class="w-[76%] m-auto h-[45vw] object-cover object-left lg:h-auto" src="<?php echo $trains_slide_image['url']; ?>"></div>

<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[30px]" id="trains" data-scroll-indicator-title="<?php echo $trains_slide_title; ?>">
    <div class="slide-title text-white w-full">
        <div class="container px-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $trains_slide_title; ?></div>
    </div>



    <div class="container mt-[16px]">
        <div class="row mt-[40px] mb-[30px]">
            <div class="col">
                <h1 class="railfreight text-white flex-1 font-normal text-[14px] lg:text-[16px] mb-[15px]">GB Railfreight trains</h1>
            </div>
        </div>
        <div class="row ">
            <div class="col">
                <h2 class="text-orange uppercase"><?php echo $trains_heading_text; ?></h2>
            </div>
        </div>
    </div>
</div>
