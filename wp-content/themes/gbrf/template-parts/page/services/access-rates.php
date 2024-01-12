<?php
$access_rates_slide_title = get_field('access_rates_slide_title');
$access_rates_slide_image = get_field('access_rates_slide_image');
$access_rates_slide_copy = get_field('access_rates_slide_copy');


$access_rates_report_button_one_text = get_field('access_rates_report_button_one_text');
$access_rates_report_button_two_text = get_field('access_rates_report_button_two_text');
$access_rates_report_button_three_text = get_field('access_rates_report_button_three_text');
$access_rates_report_button_four_text = get_field('access_rates_report_button_four_text');
$access_rates_report_button_one_link = get_field('access_rates_report_button_one_link');
$access_rates_report_button_two_link = get_field('access_rates_report_button_two_link');
$access_rates_report_button_three_link = get_field('access_rates_report_button_three_link');
$access_rates_report_button_four_link = get_field('access_rates_report_button_one_link');

?>

<div class="section counters header-bg-lilac bg-lilac fp-auto-height-responsive pb-[56px]" id="environment-slide" data-scroll-indicator-title="<?php echo $access_rates_slide_title; ?>">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point white" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $access_rates_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $access_rates_slide_title; ?></h2></div>
    </div>
    <div class="container mt-[40px] flex flex-col justify-center">
        <div class="row">
            <div class="col">
                <img class="w-full h-[50vw] object-cover object-[25%_center] md:h-auto " src="<?php echo esc_url($access_rates_slide_image['url']); ?>">
            </div>
        </div>
        <div class="row haulage-row mt-[24px] mb-[56px] text-white lg:grid lg:grid-cols-2 lg:items-start lg:mt-[42px]">
            <div class="col col1 mb-[44px] lg:mb-0 lg:pr-[50px]">
            <?php echo $access_rates_slide_copy ?>
            </div>
            <div class="col col2 text-white lg:pl-[40px]">
            <?php

                // Check rows exists.
                if( have_rows('access_rates_reports') ): ?>
                    <h4 class="text-white font-bold mb-[32px] lg:text-[18px]">Select Report(s) to Download</h4>
                    <div class="flex flex-col">
                        <?php // Loop through rows.
                        while( have_rows('access_rates_reports') ) : the_row();

                            // Load sub field value.
                            $access_rates_report_title = get_sub_field('access_rates_report_title');
                            $access_rates_report_link = get_sub_field('access_rates_report_link');
                            // Do something... 
                            ?>

                            <a href="<?php echo $access_rates_report_link['url']; ?>" download="<?php echo $access_rates_report_link['url']; ?>" class="pdf-link text-white hover:text-yellow hover:underline visited:text-white text-[16px] border-b border-grey py-[12px] first:pt-0 lg:py-[7px] lg:text-[18px] lg:w-[65%]"><?php echo $access_rates_report_title; ?></a>
                            

                        <?php
                        // End loop
                        endwhile; ?>
                    </div>
                <?php
                endif; ?>
                
            </div>
        </div>
    </div>	
</div>