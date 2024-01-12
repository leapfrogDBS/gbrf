<?php
$cs_header_image = get_field('cs_header_image');
$cs_thumbnail_image = get_field('cs_thumbnail_image');
$cs_intro_slide_copy = get_field('cs_intro_slide_copy');
$cs_commodity = get_field('cs_commodity');
$cs_contract_manager = get_field('cs_contract_manager');
$cs_region = get_field('cs_region');
$cs_customer = get_field('cs_customer');
?>
<div class="section bg-transparent">
<div><img class="w-full" src="<?php echo $cs_header_image['url']; ?>"></div>
</div>


<div class="section header-bg-transparent fp-auto-height-responsive bg-lilac pb-[80px]" id="cs-intro" data-scroll-indicator-title="Introduction">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Case Study<h1 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
    </div>
    <div class="container mt-[40px]">
        <div class="row lg:grid lg:grid-cols-2 items-end">
        <div class="col text-white ethics-text max-w-[380px]">
                <div class="article-date"><h4 class="uppercase text-yellow visited:text-yellow child:text-yellow font-bold"><?php echo get_the_term_list( $post->ID, 'location', '', '', '', '' ); ?> -  <?php echo get_the_date(); ?></h4></div>
                    <h2 class="text-white uppercase font-bold mt-[8px] lg:mt-[44px] lg:mb-[20px]"><?php the_title(); ?></h2>  
                    <?php echo $cs_intro_slide_copy; ?>
            </div>
            <div class="col lg:order-2 bg-cover mt-[40px] lg:mt-0">
            <div class="grid grid-cols-2 gap-y-[30px]">
                    <div class="border-l-[1px] border-white pl-[25px]">
                        <h4 class="text-white font-[Halisa] font-bold text-[26px]"><?php echo $cs_commodity; ?></h4>
                        <p class="text-blue mt-[12px]">Commodity</p>
                    </div>
                    <div class="border-l-[1px] border-white pl-[25px]">
                        <h4 class="text-white font-[Halisa] font-bold text-[26px]"><?php echo $cs_contract_manager; ?></h4>
                        <p class="text-blue mt-[12px]">Contract Manager</p>
                    </div>
                    <div class="border-l-[1px] border-white pl-[25px]">
                        <h4 class="text-white font-[Halisa] font-bold text-[26px]"><?php echo $cs_region; ?></h4>
                        <p class="text-blue mt-[12px]">Region</p>
                    </div>
                    <div class="border-l-[1px] border-white pl-[25px]">
                        <h4 class="text-white font-[Halisa] font-bold text-[26px]"><?php echo $cs_customer; ?></h4>
                        <p class="text-blue mt-[12px]">Customer</p>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>