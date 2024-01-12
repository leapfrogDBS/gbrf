<div class="section header-bg-blue fp-auto-height-responsive header-orange bg-blue pt-24 lg:pt-64 pb-24" id="careers" data-scroll-indicator-title="Careers">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Careers<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Our Service</h2></div>
    </div>
    <div class="container">
        <div class="row md:grid grid-cols-2 gap-x-12">
            
            <?php 
                      
            while ( have_posts() ) : the_post();

                $person_job_title = get_field('person_job_title');
                $person_quote = get_field('person_quote');
                ?>
                
                <div class="col flex flex-col mb-12">
                    <h2 class="staff-title text-white uppercase font-bold text-6xl mb-6 flex items-end min-h-[200px]"><?php echo $person_job_title; ?></h2>
                    
                    <?php if (has_post_thumbnail()) {
                        $staff_image = get_the_post_thumbnail_url(); ?>
                        <img src="<?php echo $staff_image; ?>" class="w-full mb-6 aspect-video object-cover"> 
                    <?php } ?>

                    <h3 class="text-3xl text-white mb-2 font-semibold mb-6"><?php echo the_title(); ?></h3 >

                    <?php if ($person_quote) { ?>
                        <p class="text-white">"<?php echo $person_quote; ?>"</p>                   
                    <?php } ?>
                    
                    <div class="text-right">
                        <a href="<?php echo the_permalink() ?>" class="btn blue-btn  hover:border-white whitespace-normal ">Read more<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"></a>
                    </div>

                </div>

            <?php endwhile; ?>  
            
        </div>
    </div>
</div>
