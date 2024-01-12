<?php
$our_services_slide_title = get_field('our_services_slide_title');

?>

<div class="section header-bg-white bg-white counters header-orange fp-auto-height-responsive pb-[56px] justify-start" id="environment-slide" data-scroll-indicator-title="<?php echo $our_services_slide_title; ?>">
		<div class="slide-title text-blue">
			<div class="container pl-[2%]"><img class="bullet-point blue" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg"><?php echo $our_services_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]"><?php echo $our_services_slide_title; ?></h2></div>
		</div>
		<div class="container pt-[25px] lg:pt-[50px]">
            <div class="row">
                <div class="col">
        
                    <?php

                    // Check rows exists.
                    if( have_rows('our_services_section') ):
                        $iteration = 0; 
                        // Loop through rows.
                        while( have_rows('our_services_section') ) : the_row();

                            // Load sub field value.
                            $our_services_section_title = get_sub_field('our_services_section_title');
                            $our_services_section_class = str_replace(' ', '-', strtolower($our_services_section_title));
                          
                            if($iteration == 0) {   ?>
                                <div id="<?php echo $our_services_section_class; ?>" class="defaultOpen btn tablinks services our-services-button py-[8px] px-[16px] mr-[16px] mt-[10px] bg-white text-lilac border-lilac border-2 hover:text-white hover:bg-lilac hover:border-lilac" onmouseover="previewSection(event, '<?php echo $our_services_section_class; ?>')" onmouseout="resetSection(event, '<?php echo $our_services_section_class; ?>')" onclick="openSection(event, '<?php echo $our_services_section_class; ?>')"><?php echo $our_services_section_title; ?></div>
                            <?php } else { ?>
                                <div class="btn tablinks services our-services-button py-[8px] px-[16px] mr-[16px] mt-[10px] bg-white text-lilac border-lilac border-2 hover:text-white hover:bg-lilac hover:border-lilac" onmouseover="previewSection(event, '<?php echo $our_services_section_class; ?>')" onmouseout="resetSection(event, '<?php echo $our_services_section_class; ?>')" onclick="openSection(event, '<?php echo $our_services_section_class; ?>')" id="<?php echo $our_services_section_class; ?>"><?php echo $our_services_section_title; ?></div>
                           <?php }
                            $iteration++;
                       
                        // End loop.
                        endwhile;
                    endif;
                    ?>

                
                </div>
            </div>
			
           
                <?php

                    // Check rows exists.
                    if( have_rows('our_services_section') ):

                        // Loop through rows.
                        while( have_rows('our_services_section') ) : the_row();

                            // Load sub field value.
                            $our_services_section_title = get_sub_field('our_services_section_title');
                            $our_services_section_heading = get_sub_field('our_services_section_heading');
                            $our_services_section_copy = get_sub_field('our_services_section_copy');
                            $our_services_section_image_one = get_sub_field('our_services_section_image_one');
                            $our_services_section_image_two = get_sub_field('our_services_section_image_two');
                            $our_services_section_class = str_replace(' ', '-', strtolower($our_services_section_title));
                            ?>
                            <div class="row-container tabcontent mt-[40px] <?php echo $our_services_section_class; ?>" id="<?php echo $our_services_section_class; ?>">
                                <div class="row text-blue grid grid-cols-1 lg:grid-cols-2 lg:items-start gap-x-[34px] gap-y-[36px]">
                                    <div class="col">
                                        <?php echo $our_services_section_heading; ?>
                                    </div>
                                    <div class="col md:columns-2 gap-x-[34px] min-h[16vh] xl:min-h-[20vh]">
                                        <?php echo $our_services_section_copy; ?>
                                    </div>
                                    <div class="col">
                                        <img class="w-full" src="<?php echo $our_services_section_image_one['url']; ?>">
                                    </div>
                                    <div class="col">
                                        <img class="w-full" src="<?php echo $our_services_section_image_two['url']; ?>">
                                    </div>                                    
                                </div>
                            </div>

                        <?php 
                        // End loop.
                        endwhile;
                    endif;
                    ?>
			
		</div>	
	</div>
