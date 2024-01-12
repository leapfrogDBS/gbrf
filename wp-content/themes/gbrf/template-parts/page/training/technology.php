<?php
$technology_slide_title = get_field('technology_slide_title');
$technology_copy = get_field('technology_copy');
$technology_slide_image_one = get_field('technology_slide_image_one');
$technology_slide_image_two = get_field('technology_slide_image_two');
?>

<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[100px]" id="technology" data-scroll-indicator-title="<?php echo $technology_slide_title; ?>">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg"><?php echo $technology_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $technology_slide_title; ?></h2></div>
    </div>
    <div class="container mt-[40px]">
        <div class="row lg:grid lg:grid-cols-2 gap-x-[32px] gap-y-[84px]">
            
            <div class="col col-start-2 row-start-1 flex flex-col items-start lg:items-end">
                <?php

                // Check rows exists.
                if( have_rows('technology_section') ):
                    $iteration = 0;
                    // Loop through rows.
                    while( have_rows('technology_section') ) : the_row();

                        // Load sub field value.
                        $technology_title = get_sub_field('technology_title');
                        $technology_class = str_replace(' ', '-', strtolower($technology_title));
                    
                        if($iteration == 0) {   ?>
                            <div id="defaultOpen" class="btn tablinks training text-white py-[8px] px-[16px] bg-lilac hover:bg-white hover:text-lilac" onmouseover="previewSection(event, '<?php echo $technology_class; ?>')" onmouseout="resetSection(event, '<?php echo $technology_class; ?>')" onclick="openSection(event, '<?php echo $technology_class; ?>')"><?php echo $technology_title; ?></div>
                        <?php } else { ?>
                            <div class="btn tablinks training text-white mt-[24px] py-[8px] px-[16px] bg-lilac hover:bg-white hover:text-lilac lg:mt-[16px]" onmouseover="previewSection(event, '<?php echo $technology_class; ?>')" onmouseout="resetSection(event, '<?php echo $technology_class; ?>')" onclick="openSection(event, '<?php echo $technology_class; ?>')"><?php echo $technology_title; ?></div>
                    <?php }
                        $iteration++;
                
                    // End loop.
                    endwhile;
                endif;
                ?>
            

            </div>

            <?php

                // Check rows exists.
                if( have_rows('technology_section') ):
                    // Loop through rows.
                    while( have_rows('technology_section') ) : the_row();

                        // Load sub field value.
                        $technology_title = get_sub_field('technology_title');
                        $technology_class = str_replace(' ', '-', strtolower($technology_title));
                        $technology_copy = get_sub_field('technology_copy');
                        $technology_slide_image_one = get_sub_field('technology_slide_image_one');
                        $technology_slide_image_two = get_sub_field('technology_slide_image_two');
                    ?>
                        <div class="tabcontent  min-h-[15vh] mb-[24px] xl:mb-0 xl:min-h-[35vh] col text-white mt-[50px] lg:order-1 lg:mt-0 col-start-1 row-start-1 <?php echo $technology_class; ?>">
                            <?php echo $technology_copy; ?>
                        </div>
                        <div class="tabcontent col col-start-1 row-start-2 <?php echo $technology_class; ?>">
                            <img class="w-full h-[52vw] object-center md:h-auto" src="<?php echo $technology_slide_image_one['url']; ?>">
                        </div>
                        <div class="tabcontent col mt-[24px] lg:mt-0 col-start-2 row-start-2 <?php echo $technology_class; ?>">
                            <img class="w-full h-[52vw] object-center md:h-auto" src="<?php echo $technology_slide_image_two['url']; ?>">
                        </div>
                    <?php
                    // End loop.
                    endwhile;
                endif;
                ?>

            

        </div>
    </div>
</div>

<script>
/* Open first Tab of tabbed content */
  document.getElementById("defaultOpen").click();
</script>