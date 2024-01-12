<div class="section header-bg-blue fp-auto-height-responsive bg-blue pb-[64px]" id="fleet" data-scroll-indicator-title="Our Fleet">
    <div class="slide-title text-white">
        <div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Our Fleet<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Our Fleet</h2></div>
    </div>
    <div class="container">
        <div class="row ">
            
        <?php 
        // the query
        $wpb_all_query = new WP_Query(array('post_type'=>'train', 'post_status'=>'publish', 'posts_per_page'=>-1, 'order' => 'ASC')); ?>
        
        <?php if ( $wpb_all_query->have_posts() ) : ?>
        
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-[100px] gap-y-[50px]"> 
        
                <!-- the loop -->
                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                    <?php
                        $cp_train_thumbnail_image = get_field('cp_train_thumbnail_image'); 
                        $cp_train_year = get_field('cp_train_year'); 
                        $cp_train_speed = get_field('cp_train_speed'); 
                        $cp_train_weight = get_field('cp_train_weight'); 
                        $cp_train_copy_col_1 = get_field('cp_train_copy_col_1'); 
                    ?>
                    <div class="js-scroll fade-in train scroll-mt-[100px] cursor-pointer lg:scroll-mt-[150px] pt-[50px]">
                        <h2 class="text-white uppercase font-bold mb-[20px] lg:text-[63px]"><?php the_title(); ?></h2>
                        <div class="main-img overflow-hidden">
                            <img class="w-full object-cover" src="<?php echo $cp_train_thumbnail_image['url']; ?>"/>
                        </div>
                        <div class="blurb hidden text-white mt-[36px] lg:grid-cols-5 lg:gap-x-[36px] lg:items-center lg:mt-[50px]  ">
                            <div class="train-spec grid grid-cols-2 gap-y-[14px] gap-x-[22px] items-center lg:col-span-2 lg:gap-y-[24px] lg:gap-x-[32px]">
                                <img class="h-[32px] w-[32px] justify-self-center" src="<?php echo get_template_directory_uri();?>/img/date.svg"><div><?php echo $cp_train_year; ?></div>
                                <img class="h-[32px] w-[32px] justify-self-center" src="<?php echo get_template_directory_uri();?>/img/speed.svg"><div><?php echo $cp_train_speed; ?></div>
                                <img class="h-[26px] w-[48px] justify-self-center" src="<?php echo get_template_directory_uri();?>/img/weight.svg"><div><?php echo $cp_train_weight; ?></div>
                            </div>
                            <div class="mt-[40px] lg:mt-0 md:columns-2 lg:col-span-3">
                                <?php echo $cp_train_copy_col_1; ?>
                            </div>
                         <div class="close-btn btn lg:hidden bg-lilac mt-[50px]">Close<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-white-up.svg"></div>

                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
            
            
            
                <?php wp_reset_postdata(); ?>
            
            </div>

            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>      
        </div>
    </div>
</div>

<script>


/*Expand Train when clicked on to show more information */
const trains = document.querySelectorAll('.train');
    for (let i = 0; i < trains.length; i++) {
        trains[i].addEventListener('click', (e) => {
            for (let j = 0; j < trains.length; j++) {
                var closing = false;  
                if(j==i && trains[j].classList.contains('lg:col-span-2') ) {
                    closing = true;
                } 
                if(j==i || trains[j].classList.contains('lg:col-span-2') ) {
                    trains[j].classList.toggle('lg:col-span-2');
                    trains[j].classList.toggle('mt-[150px]');
                    trains[j].querySelector('img').classList.toggle('lg:h-[40%]');
                    trains[j].querySelector('.blurb').classList.toggle('hidden');
                    trains[j].querySelector('.blurb').classList.toggle('lg:grid');
                    if (!closing || screen.width < 960) {
                        trains[i].scrollIntoView({behavior: "smooth"});  
                    } else {
                        document.querySelector('#fleet').scrollIntoView({behavior: "smooth"});
                    }
                }
                
            }
            
        });
}
/*Close button*/
const closeBtn = document.querySelectorAll('.close-btn');
for (let i = 0; i < closeBtn.length; i++) {
        closeBtn[i].addEventListener('click', (e) => {
            const trains = document.querySelectorAll('.train');
            for (let i = 0; i < trains.length; i++) {
                trains[i].classList.add('hidden');
            }  
        });
    }
</script>

