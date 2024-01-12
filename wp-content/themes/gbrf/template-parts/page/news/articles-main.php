<div class="section relative hidden md:block header-bg-white bg-white header-orange fp-auto-height-responsive bg-white pt-[150px] pb-[85px] md:pt-[120px]" id="articles-main" data-scroll-indicator-title="Articles">
	<div class="slide-title text-blue">
		<div class="container px-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg">Articles</div>
	</div>
    <img class="cursor-pointer hidden down-arrow z-[101] absolute bottom-[24px] h-[36px] w-[36px] md:bottom-[52px] rotate-90" src="<?php echo get_template_directory_uri();?>/img/arrow-lilac-right.svg">
	<div class="container">

        <div class="row md:block">
            <div class="col flex justify-end mb-[50px]">
            <?php $categories = get_categories(); ?>
            <div class="btn cat-list_item active tablinks services our-services-button py-[8px] px-[16px] mr-[16px]  bg-white text-lilac border-lilac border-2 hover:text-white hover:bg-lilac hover:border-lilac" onclick="openFilter('all')">All Articles</div>

                <?php foreach($categories as $category) : ?>                   
                        <div class="btn cat-list_item tablinks services our-services-button py-[8px] px-[16px] mr-[16px]  bg-white text-lilac border-lilac border-2 hover:text-white hover:bg-lilac hover:border-lilac" onclick="openFilter('<?= $category->slug; ?>')"><?= $category->name; ?></div>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>

		<div class="row">
        <div id ="all-articles" class="col col1">
                <?php 
                // the query
                $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                
                <?php if ( $wpb_all_query->have_posts() ) : 
                    $i = 0;
                    ?>            
                
                    <!-- the loop -->
                    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                        <?php
                            $news_thumbnail_image = get_field('news_thumbnail_image'); 
                            $news_header_image = get_field('news_header_image'); 
                            $news_copy = get_field('news_copy'); 
                            $news_exceprt = get_field('news_exceprt'); 
                            $classes = "";
                            foreach (get_the_category() as $category) {
                                $classes .= $category->slug .' ';
                            } 
                        ?>
                        
                        <?php if ($i == 0 || $i % 2 == 0 ) { ?>
                            <div class="slide w-[100vw]] lg:w-[46vw]">
                        <?php
                        } ?>

                        
                        <div class="lg:mr-[32px] article pb-[40px] border-b border-grey md:grid md:grid-cols-2 md:gap-x-[37px] first:md:mt-0 md:mt-[42px] md:pb-0 md:border-0 <?php echo $classes; ?>">
                            <img class="w-full lg:w-[21.5vw]" src="<?php echo $news_thumbnail_image['url']; ?>"/>
                            <div>        
                                <div class="article-date mt-[25px]"><h4 class="uppercase text-lilac child:text-lilac font-bold"><?php the_category(' '); ?> -  <?php echo get_the_date(); ?></h4></div>
                                <h3 class="text-blue font-bold mt-[8px] lg:mt-[16px]"><?php the_title(); ?></h3>                               
                                <p class="text-blue mb-[16px] lg:mb-[24px]"><?php echo strip_tags($news_exceprt); ?></p>
                                <a class="read-more text-blue underline" href="<?php the_permalink(); ?>">Read more</a>
                            </div>
                        </div>

                        <?php if ($i % 2 != 0 || ($wpb_all_query->current_post +1) == ($wpb_all_query->post_count)) { ?>
                            </div>
                        <?php
                        } 
                        ?>
                       <?php $i++;  ?>
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                
                
                
                    <?php wp_reset_query();   
                        wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

			</div>
        
           
       
		</div>
	</div>
</div>

 <script>
     
     
     function openFilter(category) {
        document.querySelector('#articles-main').remove();	
        document.querySelector('#articles-filtered').classList.toggle('hide');   
		
        
		document.querySelector("#" + category +".cat-list_item-mobile" ).click();
                
    }
 </script>