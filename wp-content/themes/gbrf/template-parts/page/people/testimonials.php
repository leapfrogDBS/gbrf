<div class="section header-bg-white bg-white bg-white counters header-orange fp-auto-height-responsive pb-0 lg:pb-[75px]" id="testimonials" data-scroll-indicator-title="Testimonials">
    <div class="slide-title text-blue">
        <div class="container  pl-[2%]"><img class="bullet-point blue" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg">Testimonials<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Testimonials</h2></div>
    </div>
    <img class="cursor-pointer hidden down-arrow z-[101] bottom-[24px] h-[36px] w-[36px] md:bottom-[52px] rotate-90" src="<?php echo get_template_directory_uri();?>/img/arrow-lilac-right.svg">
    <div class="container pr-0 mt-[75px]">
        <div class="row">
        <div class="col col1 ">
                <?php
                $args = array(
                    'post_type'      => 'testimonials',
                    'posts_per_page' => 10,
                );
                $loop = new WP_Query($args);
                if ( $loop->have_posts() ) {
                    ?>
                    
                    <div class="splide" id="testimonials-slider" >
                        <div class="splide__track">
                             <ul class="splide__list"> 

                                <?php
                                while ( $loop->have_posts() ) {
                                $loop->the_post();
                                ?>
                                <?php
                                $testimonial_quote = get_field('testimonial_quote'); 
                                $testimonial_image = get_field('testimonial_image'); 
                                $testimonial_copy = get_field('testimonial_copy'); 
                                $testimonial_name  = get_field('testimonial_name'); 
                                $job_title = get_field('job_title');    
                                ?>
                                <li class="splide__slide text-[16px] leading-[22px] lg:grid lg:grid-cols-2 lg:gap-x-[36px] lg:w-[65vw] lg:pr-[10.5vw]">
                                    <img class="h-[70vw] w-full object-cover object-top lg:h-auto"src="<?php echo $testimonial_image['url']; ?>">
                                    <div>
                                        <h3 class="text-lilac italic font-bold mt-[24px]"><?php echo $testimonial_quote; ?></h3>
                                        <p class="text-blue"><?php echo $testimonial_copy; ?></p>
                                        <p class="text-blue mt-[16px]"><?php echo $testimonial_name; ?></p>
                                        <p class="text-blue font-bold"><?php echo $job_title; ?></p>
                                    </div>
                                </li>    
                                <?php
                                } ?>
                                
                            </ul>
                                </div>
                            </div>
                                                    
                     
                <?php    
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>				
</div>

<script>
    var splide1 = new Splide( '#testimonials-slider', {
            
        
        pagination: false,
        rewind: true,
        speed: '1000',
        type: 'loop',
        drag: true,
        snap: true,
          perMove: 1,
          gap: '40px',
          perPage: 3,
          padding: { left: '0', right: '10vw' },
          breakpoints: {
            976: {
                perPage: 1,
                
            },
            580: {
                perPage: 1,
                padding: { left: '0', right: '2%' },
            },
        },
                    
        });
      splide1.mount();


</script>