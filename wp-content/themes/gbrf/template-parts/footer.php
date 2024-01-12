<?php
$contact_email_address = get_field('contact_email_address', 'option');
$contact_phone_number = get_field('contact_phone_number', 'option');
$instagram_link = get_field('instagram_link', 'option');
$twitter_link = get_field('twitter_link', 'option');
$linkedin_link = get_field('linkedin_link', 'option');
$facebook_link = get_field('facebook_link', 'option');
$privacy_link = get_field('privacy_link', 'option');
$terms_link = get_field('terms_link', 'option');
$cookies_link = get_field('cookies_link', 'option');
$newsletter_link = get_field('newsletter_link', 'option');
$newsletter_button_text = get_field('newsletter_button_text', 'option');
$open_positions_link = get_field('open_positions_link', 'option');
$open_positions_button_text = get_field('open_positions_button_text', 'option');

?>


<div class="section hide-nav header-bg-white bg-white header-orange fp-auto-height-responsive bg-white flex items-center pt-[30px] pb-[64px] xl:pt-[56px]" id="footer">
	<div class="container">
        <div class="row js-scroll fade-in-bottom1 ">    
            <div class="col">
                <h2 class="uppercase text-blue">Dependable Logistics.</h2>
                <h2 class="uppercase text-orange">Delivered by the best.</h2>
            </div>
        </div> 

        <div id="footer-grid-top" class="block xl:grid xl:grid-cols-3 xl:gap-x-[7vw] js-scroll fade-in-bottom1 lg:mt-20 ">                       
            <div id="locations" class="col text-blue">
                <p class="font-bold pt-[40px] pb-[20px] xl:pt-0 mb-0">Locations</p>
                <p class="border-b border-grey py-[7px] mb-0">London</p>
                <p class="border-b border-grey py-[7px] mb-0 xl:pt-[7px]">Peterborough</p>
                <p class="border-b border-grey py-[7px] mb-0 xl:pt-[7px]">Doncaster</p>
                <p class="border-b border-grey py-[7px] mb-0 xl:pt-[7px]">Felixstowe</p>
            </div>

            <div id="contact" class="col text-blue">
                <p class="font-bold pt-[48px] pb-[32px] xl:pt-0 xl:pb-[20px] mb-0">Contact</p>
                <a class="text-blue" href="tel:<?php echo $contact_phone_number; ?>"><p class="border-b border-grey py-[7px] mb-0"><?php echo $contact_phone_number; ?></p></a>
                <a class="text-blue" href="mailto:<?php echo $contact_email_address; ?>"><p class="border-b border-grey py-[7px] mb-0 xl:pt-[7px]"><?php echo $contact_email_address; ?></p></a>
                <div class="flex justify-between mt-[7px] gap-x-[23px] border-b border-grey pb-[4px] mb-0 xl:pb-[7px] md:justify-start xl:gap-x-[16px]">
                    <?php if ($instagram_link) { ?>                            
                        <a href="<?php echo $instagram_link['url']; ?>"><img id="instagram" class="w-[50px] h-[50px] md:w-[26px] md:h-[26px]" src="<?php echo get_template_directory_uri();?>/img/Instagram.svg"></a>
                    <?php } ?>
                    <?php if ($twitter_link) { ?>      
                        <a href="<?php echo $twitter_link['url']; ?>"><img id="twitter" class="w-[50px] h-[50px] md:w-[26px] md:h-[26px]" src="<?php echo get_template_directory_uri();?>/img/Twitter.svg"></a>
                    <?php } ?>    
                    <?php if ($linkedin_link) { ?>      
                        <a href="<?php echo $linkedin_link['url']; ?>"><img id="linkedin" class="w-[50px] h-[50px] md:w-[26px] md:h-[26px]" src="<?php echo get_template_directory_uri();?>/img/LI.svg"></a>
                    <?php } ?>    
                    <?php if ($facebook_link) { ?>      
                        <a href="<?php echo $facebook_link['url']; ?>"><img id="facebook" class="w-[50px] h-[50px] md:w-[26px] md:h-[26px]" src="<?php echo get_template_directory_uri();?>/img/FB.svg"></a>
                    <?php } ?>        
                </div>
            </div>
            <div id="legal" class="col text-blue">
                <p class="font-bold pt-[40px] pb-[20px] xl:pt-0 mb-0">Legal</p>
                <?php

                // Check rows exists.
                if( have_rows('legal', 'option') ):

                    // Loop through rows.
                    while( have_rows('legal', 'option')) : the_row();

                        // Load sub field value.
                        $title = get_sub_field('title');
                        $link_to_pdf = get_sub_field('link_to_pdf');
                        $link_destination;
                        $target;
                        if ($link_to_pdf) {
                            $link_destination = get_sub_field('pdf')['url'];
                            $target = "_blank";
                        } else {
                            $link_destination = get_sub_field('page_link');
                        };
                        
                       if($link_destination && $title) { ?>
                            <a class="text-blue" target="<?php echo $target; ?>" href="<?php echo $link_destination; ?>"><p class="border-b border-grey py-[7px] mb-0"><?php echo $title; ?></p></a>
                        <?php
                       };
                        
                        // Do something...

                    // End loop.
                    endwhile;

                // No value.
                else :
                    // Do something...
                endif;
                ?>
            </div>

        </div>  

        <div id="footer-grid-bottom" class="block xl:grid xl:grid-cols-3 xl:gap-x-[7vw] mt-10 lg:mt-20 ">      
            <div id="certification" class="col text-blue flex items-center ">
                <div class="flex gap-x-[23px] xxl:justify-between">
                    <img src="<?php echo get_template_directory_uri();?>/img/cert3.svg" class="w-[88px]">
                    <img src="<?php echo get_template_directory_uri();?>/img/cert2.svg" class="w-[88px]">
                    <img src="<?php echo get_template_directory_uri();?>/img/cert1.svg" class="w-[88px]">
                </div>
            </div>
            <div class="col text-blue flex items-center mt-10 lg:mt-20 xl:mt-0 ">
                <?php if($newsletter_link && $newsletter_button_text) {
                ?>
                    <a href ="<?php echo $newsletter_link['url']; ?>" class="btn white-btn text-[14px]"><?php echo $newsletter_button_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
                <?php 
                }
                ?>
            </div>
            <div class="col text-blue flex items-center mt-10 lg:mt-20 xl:mt-0 ">
            <?php if($open_positions_link && $open_positions_button_text) {
            ?>
                <a href ="<?php echo $open_positions_link['url']; ?>" class="btn white-btn text-[14px]"><?php echo $open_positions_button_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
            <?php
            }
            ?>
            </div>
        </div>

        <div id="slab"> 
            <div class="col text-blue gap-x-[96px] mt-[74px] flex flex-col xl:flex-row">
                <p class="mb-[40px] text-[14px]">Copyright © 2022 GB Railfreight Limited</p>
                <a href="<?php echo $privacy_link['url']; ?>" class="mb-[40px] text-[14px] text-blue visited:text-blue">Privacy</a>
                <a href="<?php echo $terms_link['url']; ?>" class="mb-[40px] text-[14px] text-blue visited:text-blue">Terms of Use</a>
                <a href="<?php echo $cookies_link['url']; ?>" class="mb-[40px] text-[14px] text-blue visited:text-blue">Cookies</a>
            </div>
        </div>
            
           
            
            
       
    </div>
</div>

