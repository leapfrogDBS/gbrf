<div class="section header-bg-lilac fp-auto-height-responsive bg-lilac pb-[85px]" id="case-studies" data-scroll-indicator-title="Case Studies">
	<div class="slide-title text-white">
		<div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/white-bullet.svg">Case Studies<h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Case Studies</h2></div>
	</div>
    
	<div class="container pr-[2%] mt-[66px]">
		<div class="row">
			<div class="col">
							
                <?php 
                // the query
                $wpb_all_query = new WP_Query(array('post_type'=>'case_study', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                
                <?php if ( $wpb_all_query->have_posts() ) : ?>
                
                    <div class="splide" id="case-studies-slider" >
                        <div class="splide__track">
                            <ul class="splide__list"> 
                
                                <!-- the loop -->
                                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                                    <?php
                                        $cs_thumbnail_image = get_field('cs_thumbnail_image')['sizes']['medium'];
                                        $cs_excerpt = get_field('cs_excerpt'); 
                                    ?>
                                    
                                    <li class="splide__slide text-[16px] leading-[22px]  md:grid md:grid-cols-2 md:gap-x-[36px] items-center">
                                        <img class="w-full mb-[24px]" data-splide-lazy="<?php echo $cs_thumbnail_image; ?>"/>
                                        <div>
                                            <div class="article-date"><h4 class="uppercase text-yellow visited:text-yellow child:text-yellow font-bold"><?php echo get_the_term_list( $post->ID, 'location', '', '', '', '' ); ?>  -  <?php echo get_the_date(); ?></h4></div>
                                            <h3 class="text-white font-bold mt-[8px] lg:mt-[16px]"><?php the_title(); ?></h3>                               
                                            <p class="text-white mb-[16px] lg:mb-[24px]"><?php echo strip_tags($cs_excerpt); ?></p>
                                            <a class="read-more text-white underline" href="<?php the_permalink(); ?>">Read more</a>
                                        </div>
                                        
                                     </li>
                                    
                                <?php endwhile; ?>
                                 <!-- end of the loop -->
                            </ul>
                        </div>
                    </div>
                                  
                
                    <?php wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

			</div>			
		</div>
	</div>
</div>

<script>
    var splide3 = new Splide( '#case-studies-slider', {
        lazyLoad: true,  
        pagination: false,
        rewind: true,
        speed: '1000',
        type: 'slide',
        drag: true,
        snap: true,
        perMove: 1,
        gap: '40px',
        perPage: 1,
        padding: { left: '0', right: '25vw' },          
        });
      splide3.mount();


</script>