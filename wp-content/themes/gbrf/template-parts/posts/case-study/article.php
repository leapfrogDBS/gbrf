<div class="section header-bg-lilac fp-auto-height-responsive bg-lilac pb-[64px]" id="technology" data-scroll-indicator-title="Article">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Article<h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
    </div>
    <div class="container mt-[60px]">
        <div class="row flex flex-col lg:grid lg:grid-cols-6 gap-x-[32px] gap-y-[60px]">
            
            <div class="order-3 col col-span-2 col-start-5 row-start-1 flex gap-x-[20px] lg:flex-col items-start lg:items-start lg:pl-[30%]">
                <?php

                // Check rows exists.
                if( have_rows('cs_article_section') ):
                    $iteration = 0;
                    // Loop through rows.
                    while( have_rows('cs_article_section') ) : the_row();

                        // Load sub field value.
                        $cs_title = get_sub_field('cs_title');
                        $cs_class = str_replace(' ', '-', strtolower($cs_title));
                    
                        if($iteration == 0) {   ?>
                            <div id="defaultOpen" class="btn tablinks training text-lilac py-[8px] px-[16px] bg-yellow hover:bg-white" onclick="openSection(event, '<?php echo $cs_class; ?>')"><?php echo $cs_title; ?></div>
                        <?php } else { ?>
                            <div class="btn tablinks training text-lilac py-[8px] px-[16px] bg-yellow hover:bg-white lg:mt-[16px]" onclick="openSection(event, '<?php echo $cs_class; ?>')"><?php echo $cs_title; ?></div>
                    <?php }
                        $iteration++;
                
                    // End loop.
                    endwhile;
                endif;
                ?>
            

            </div>

            <?php

                // Check rows exists.
                if( have_rows('cs_article_section') ):
                    // Loop through rows.
                    while( have_rows('cs_article_section') ) : the_row();

                        // Load sub field value.
                        $cs_title = get_sub_field('cs_title');
                        $cs_class = str_replace(' ', '-', strtolower($cs_title));
                        $cs_copy = get_sub_field('cs_copy');
                        $cs_image_one = get_sub_field('cs_image_one');
                        $cs_image_two = get_sub_field('cs_image_two');
                    ?>
                        <div class="order-4 tabcontent col col-span-4 text-white lg:order-1 col-start-1 row-start-1 mb-[24px] pr-[10%] <?php echo $cs_class; ?>">
                            <?php echo $cs_copy; ?>
                        </div>
                        <div class="order-1 tabcontent col col-span-3 col-start-1 row-start-2 <?php echo $cs_class; ?>">
                            <img class="w-full h-[52vw] object-center md:h-auto" src="<?php echo $cs_image_one['url']; ?>">
                        </div>
                        <div class=" order-2 tabcontent col col-span-3 mt-[24px] lg:mt-0 col-start-4 row-start-2 <?php echo $cs_class; ?>">
                            <img class="w-full h-[52vw] object-center md:h-auto" src="<?php echo $cs_image_two['url']; ?>">
                        </div>
                    <?php
                    // End loop.
                    endwhile;
                endif;
                ?>

            

        </div>
        <div class="row mt-[20px] lg:mt-[55px] flex flex-col lg:flex-row">
            <div class="col">
                <div class="mt-[20px] lg:mt-[80px]"> 
                    <a href="<?php echo get_home_url(); ?>/news" class="btn white-btn-outline p-[8px] pr-[16px]"><img class="btn-icon rotate-180" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden rotate-180" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg">Back to News</a>                       
                </div>
            </div>
            <div class="col mt-[30px] flex lg:justify-end  lg:mt-0 flex-1">
            <?php $next_post = get_adjacent_post(false, '', true);
                if(empty($next_post)) { 
                    $next_post = get_adjacent_post(false, '', false);
                }?>
                    <div class="flex items-center gap-x-[16px] lg:gap-x-[32px]">
                        <?php $cs_header_image = get_field('cs_header_image', $next_post->ID ); ?>
                        <img class="w-[165px] h-[130px] object-cover lg:w-[115px] lg:h-[115px]" src="<?php echo $cs_header_image['url']; ?>">
                        <div class="flex-1">
                            <h4 class="text-yellow uppercase font-bold font-[Halisa] text-[18px]">Read Next Story</h4>
                            <?php
                            echo '<a class="text-white underline mt-[8px]" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a>'; 
                            ?>
                        </div>    
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
/* Open first Tab of tabbed content */
  document.getElementById("defaultOpen").click();
</script>