<?php
$popup_heading = get_field('popup_heading');
$popup_heading_text = get_field('popup_heading_text');
$popup_copy = get_field('popup_copy');
$popup_button_text = get_field('popup_button_text');
$popup_button_link = get_field('popup_button_link');
$popup_logo = get_field('popup_logo');
?>

<div class="section header-bg-white bg-white header-orange fp-auto-height-responsive pb-[56px]" id="directors" data-scroll-indicator-title="Directors">
    <div class="slide-title text-blue">
        <div class="container  pl-[2%]"><img class="bullet-point blue" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg">Directors<h1 class="hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Rail freight UK</h1></div>
    </div>
    <img class="hidden cursor-pointer down-arrow z-[101] bottom-[24px] h-[36px] w-[36px] md:bottom-[52px] rotate-90" src="<?php echo get_template_directory_uri();?>/img/arrow-lilac-right.svg">
    <div class="container">
        <div class="row">
            <div class="col col1">
                <?php
                $args = array(
                    'post_type'      => 'directors',
                    'posts_per_page' => 10,
                );
                $loop = new WP_Query($args);
                if ( $loop->have_posts() ) {
                    $i = 0;
                    ?>
                    
                    <?php
                    while ( $loop->have_posts() ) {
                    $loop->the_post();
                    ?>
                    <?php
                    $director_image = get_field('director_image'); 
                    $director_copy = get_field('director_copy'); 
                    $director_name  = get_field('director_name'); 
                    $director_job_title = get_field('director_job_title'); 
                    
                    ?>

                    <div class="director pr-[3.333vw] md:pr-0 mb-[45px] text-[16px] leading-[22px] md:flex md:gap-x-[45px]  md:mr-[10vw] items-center pl-[3.333vw]">
                        <img class="w-full md:w-[230px] md:h-[230px] lg:w-[21vw] lg:h-[21vw] object-cover"src="<?php echo $director_image['url']; ?>">
                        <div>
                            <p class="text-blue mt-[24px]"><?php echo $director_name; ?></p>
                            <p class="text-blue font-bold"><?php echo $director_job_title; ?></p>    
                            <p class="text-blue mt-[16px]"><?php echo $director_copy; ?></p>
                        </div>
                    </div>
                    <?php   
                    }     
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <div class="container hidden">
        <div class="row">
            <div class="col">
            <div id="ownersBtn" class="btn white-btn mt-[24px] lg:mt-[42px]">Meet Our Owners<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></div>
            </div>
        </div>
    </div>
    			
</div>

