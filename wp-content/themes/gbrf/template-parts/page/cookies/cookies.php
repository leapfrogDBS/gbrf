<?php
$cookies_slide_title = get_field('cookies_slide_title');
$cookies_left_column_copy = get_field('cookies_left_column_copy');
$cookies_button_text = get_field('cookies_button_text');
$cookies_button_link = get_field('cookies_button_link');
?>

<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[85px] overflow-y-visible " id="services" data-scroll-indicator-title="<?php echo $cookies_slide_title; ?>">
    <div class="slide-title text-white">
        <div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $cookies_slide_title; ?><h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
    </div>
    <div class="container mt-[150px] ">
        <div class="row lg:grid lg:grid-cols-2 items-start lg:gap-x-[32px]">
            <div class="col col1 mb-[24px] text-white link-orange lg:mb-0">
                <?php echo $cookies_left_column_copy; ?>
                <h4 id="read-more" class="underline text-center mt-[10px] lg:hidden">Read Our Full Terms of Use</h4>
            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div id="details" class="col text-white md:grid grid-cols-2 gap-x-[42px]">
                <?php $iteration = 1; ?>
                <?php while( have_rows('cookies_right_column_copy')) : the_row();
                    $cookies_section_title = get_sub_field('cookies_section_title');
                    $cookies_section_copy = get_sub_field('cookies_section_copy');
                ?>
                <div class="section-container mb-[32px] first:mt-[50px] md:first:mt-0 lg:mt-0 lg:mb-[48px] lg:first:mt-0">
                    <h4 class="list-item list-disc list-inside text-white font-bold mb-[16px] text-[18px] lg:block"><span class="font-normal ml-[-10px] mr-[2px] lg:hidden"><?php echo sprintf("%02d", $iteration); ?></span> <?php echo $cookies_section_title; ?></h4>
                    <?php echo $cookies_section_copy; ?>
                </div>
                <?php 
                $iteration++;
                endwhile; ?>	
            </div>
            <?php if ($cookies_button_text && $cookies_button_link ) { ?>
                    <h4 class="text-white font-bold mb-[32px] mt-[16px] text-[18px]">PDF on Placed Cookies</h4>
                    <a href="<?php echo $cookies_button_link['url']; ?>" class="btn orange-btn"><?php echo $cookies_button_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden " src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
                <?php } ?>
        </div>
    </div>
	
</div>

<script>
    var readMore = document.querySelector('#read-more');
    var details = document.querySelector('#details');
    readMore.addEventListener('click', ()=> {
        details.classList.toggle("hidden");
        readMore.style.display = "none";
    });
</script>