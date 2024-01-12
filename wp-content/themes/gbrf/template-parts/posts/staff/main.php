<?php
$person_job_title = get_field('person_job_title');
$person_quote = get_field('person_quote');
$person_career_advice = get_field('person_career_advice');
$person_school = get_field('person_school');
$person_into_work = get_field('person_into_work');
$person_training_and_qualificiations = get_field('person_training_and_qualificiations');
$person_outside_of_work = get_field('person_outside_of_work');
?>



<div class="section header-bg-blue fp-auto-height-responsive bg-blue header-orange py-24 lg:pt-64 lg:pb-24" id="careers" data-scroll-indicator-title="Careers">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Careers<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Careers</h2></div>
    </div>
    <div class="container">
        <div class="row pt-6">
            <div class="col lg:w-1/2 mb-6">
                <h1 class="text-3xl text-white mb-2"><?php echo the_title(); ?></h1>
                <h2 class="text-6xl text-white uppercase leading-none"><?php echo $person_job_title; ?></h2>
            </div>
            
            <?php if (has_post_thumbnail()) {
                $staff_image = get_the_post_thumbnail_url(); ?>
                <div class="col">
                    <img src="<?php echo $staff_image; ?>" class="w-full"   > 
                </div>
            <?php } ?>
            
            <?php if ($person_quote) { ?>
                <div class="col lg:w-1/2 mt-12 lg:mt-6">
                    <p class="text-white text-xl lg:text-2xl italic leading-tight font-semibold">"<?php echo $person_quote; ?>"</p>   
                </div>                       
            <?php } ?>

            <?php if ($person_career_advice) { ?>
                 <div class="col mt-12">
                    <h2 class="uppercase text-orange text-5xl lg:text-8xl">Any career advice?</h2>
                    <h2 class="uppercase text-white text-5xl lg:text-8xl"><?php echo $person_career_advice ?></h2>  
                 </div>   
            <?php } ?>
        </div>
        <div class="row md:columns-2 gap-x-12 mt-12">
            <?php if ($person_school) { ?>
                <div class="col break-inside-avoid">
                    <h3 class="text-white font-bold mb-4">School</h3>
                    <p class="text-white"><?php echo $person_school; ?></p>
                </div>
            
            <?php } ?>

            <?php if ($person_into_work) { ?>
                <div class="col mt-12 break-inside-avoid">
                    <h3 class="text-white font-bold mb-4">Into work</h3>
                    <p class="text-white"><?php echo $person_into_work; ?></p>
                </div>
            
            <?php } ?>

            <?php if ($person_training_and_qualificiations) { ?>
                <div class="col mt-12 break-inside-avoid">
                    <h3 class="text-white font-bold mb-4">Training and qualifications</h3>
                    <p class="text-white"><?php echo $person_training_and_qualificiations; ?></p>
                </div>
            
            <?php } ?>

            <?php if ($person_outside_of_work) { ?>
                <div class="col mt-12 break-inside-avoid">
                    <h3 class="text-white font-bold mb-4">Outside of work</h3>
                    <p class="text-white"><?php echo $person_outside_of_work; ?></p>
                </div>
            
            <?php } ?>

            <a href="<?php echo home_url();?>/staff" class="btn orange-btn mt-12">Back<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden " src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
            
        </div>
    </div>
</div>
