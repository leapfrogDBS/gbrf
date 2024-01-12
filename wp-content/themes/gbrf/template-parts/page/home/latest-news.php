<?php
$latest_news_slide_title = get_field('latest_news_slide_title');
$latest_news_slide_copy = get_field('latest_news_slide_copy');
?>

<div class="section header-bg-white bg-white fp-auto-height header-orange fp-auto-height-responsive pt-0 pb-[75px] text-blue " id="latest-news" data-scroll-indicator-title="<?php echo $latest_news_slide_title; ?>">
		<div class="slide-title text-blue">
			<div class="container pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg"><?php echo $latest_news_slide_title; ?><h2 class=" hidden railfreight flex-1 font-normal  text-right text-[14px] lg:text-[16px]">Latest News</h2></div>
		</div>
        <img class="cursor-pointer hidden down-arrow z-[101] absolute bottom-[24px] h-[36px] w-[36px] md:bottom-[52px] rotate-90" src="<?php echo get_template_directory_uri();?>/img/arrow-lilac-right.svg">
		<div class="container mt-[80px] pr-0">
			
			 <?php 
                // the query
                $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                
                <?php if ( $wpb_all_query->have_posts() ) : ?>
                    
                    <div class="splide" id="latest-news-slider" >
                        <div class="splide__track">
                             <ul class="splide__list"> 
                    
                                    <?php $i = 0; ?>
                                        <!-- the loop -->
                                        <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                                            <?php
                                                $news_thumbnail_image = get_field('news_thumbnail_image'); 
                                                $news_header_image = get_field('news_header_image'); 
                                                $news_copy = get_field('news_copy'); 
                                                $news_exceprt = get_field('news_exceprt'); 
                                                $classes = "";

                                                if (!$news_thumbnail_image) {
                                                    $news_thumbnail_image = get_the_post_thumbnail_url( get_the_ID(), 'medium');
                                                } else {
                                                    $news_thumbnail_image = $news_thumbnail_image['sizes']['thumbnail'];
                                                }
                                            
                                                $count = $wpb_all_query->found_posts; 
                                                foreach (get_the_category() as $category) {
                                                    $classes .= $category->slug .' ';
                                                }
                                                
                                            ?>                                                                                              
                                            <li class="text-[16px] splide__slide">                                                                                
                                                <a href="<?php the_permalink(); ?>">
                                                <img class="w-full mb-[24px] h-[75%] object-cover" data-splide-lazy="<?php echo $news_thumbnail_image; ?>"/>
                                                
                                <div>
                                    <div class="date text-blue visited:text-blue"><?php echo get_the_date('d/m/Y'); ?></div>
                                    <div class="title font-bold text-blue visited:text-blue"><?php the_title(); ?></div>  
                                </div>
                                                </a>
                                            </li>
                                    
                                        <?php 
                                            
                                        endwhile; ?>
                                        <!-- end of the loop -->
                                    
                            </ul>
                        </div>
                    </div>
                                    
                                        <?php wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
								
			
			<div class="row bottom-row mt-[56px] lg:grid lg:grid-cols-2 md:mt-[76px]">
				<div class="col col1">
					<h3><?php echo $latest_news_slide_copy; ?></h3>			
					<a class="btn white-btn mt-[8px]">Read Latest News<img class="btn-icon" src="<?php echo get_template_directory_uri();?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri();?>/img/arrow-white-right.svg"></a>
				</div>
			</div>
		</div>
	</div>
<script>
    var splide1 = new Splide( '#latest-news-slider', {
            
        lazyLoad: true,
        pagination: false,
        rewind: true,
        speed: '1000',
        type: 'slide',
        drag: true,
        snap: true,
        perMove: 1,
        gap: '40px',
        perPage: 3,
        padding: { left: '0', right: '18vw' },
        breakpoints: {
            976: {
                perPage: 2,
            },
            580: {
                perPage: 1,
            },
        },
                    
        });
      splide1.mount();


</script>