<div class="section bg-blue header-bg-blue header-white fp-auto-height-responsive pb-[100px]" id="owners" data-scroll-indicator-title="Owners">
    <div id="modal-content" class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point white" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Our Owners<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Owners</h2></div>
    </div>
    <div class="close-button hidden absolute top-[150px] right-8 lg:top-[150px] lg:right-20 z-[999]">
        <div class="container">
            <span class="close cursor-pointer text-[50px] text-white">&times;</span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-[44px] mt-[40px] max-w-[790px] text-yellow font-normal uppercase lg:text-[63px] font-[Halisa]"><?php echo $popup_heading; ?></h2>
                <img src="<?php echo get_template_directory_uri();?>/img/infra-logo.svg" class="mt-[60px]">
            </div>
        </div>
        <div class="mt-[50px] row lg:grid lg:grid-cols-2 gap-x-[35px]">
            <div class="col">
                <h3 class="text-white"><?php echo $popup_heading_text; ?></h3>
            </div>
            <div class="col">
                <p class="text-white"><?php echo $popup_copy; ?></p>
                <?php if($popup_button_link['url'] && $popup_button_text) { ?>
                    <a target="_blank" href="<?php echo $popup_button_link['url']; ?>" class="btn white-btn-outline mt-[10px]"><?php echo $popup_button_text; ?><img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
                <?php } ?>
            </div>
        </div>
    </div>				
</div>