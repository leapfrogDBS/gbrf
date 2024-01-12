<div class="section block md:hidden header-bg-white bg-white fp-auto-height min-h-[100vh] header-orange fp-auto-height-responsive bg-white pt-[150px] pb-[85px] md:pt-[120px]" id="articles-mobile">
	<div class="slide-title text-blue">
		<div class="container  pl-[2%]"><img class="bullet-point" src="<?php echo get_template_directory_uri();?>/img/blue-bullet.svg">Articles</div>
	</div>

    <div class="container">
        <div class="row mobile">
            <div class="col flex flex-col mb-0 rounded-[8px] pt-[44px] pb-[12px] hidden" id="mobile-filters">
            <div class="close-button absolute top-[100px] right-5 lg:top-[150px] lg:right-10">
                <div class="container">
                    <span class="close cursor-pointer text-[28px] text-grey">&times;</span>
                </div>
            </div>
            <?php $categories = get_categories(); ?>
                <div class="radio-selection pb-[60px] border-b mb-0 border-grey">
                <label class="text-blue" for="all">Clear Filters<input type="radio" class="radio-button mr-[16px]" name="size" value="all" id="all">
                    <span class="checkmark"></span>                  
                    </label>
                </div>
                <?php foreach($categories as $category) : ?> 
                    <div class="radio-selection py-[12px] m-0 border-b border-grey"> 
                    <label class="text-blue" for="<?= $category->slug; ?>"><?= $category->name; ?><input type="radio" class="radio-button mr-[16px]" name="size" value="<?= $category->slug; ?>" id="<?= $category->slug; ?>">                  
                        <span class="checkmark top-[12px]"></span>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col">
                <div id="filter" class="btn my-[50px] justify-center lg:w-auto py-[12px] px-[12px] pr-[20px] text-white bg-lilac border-0">Filter<img class="w-[10px] h-[5px]" src="<?php echo get_template_directory_uri();?>/img/chevron-down.svg"></div>
            </div>
        </div>

        
		<div class="row">
            <div id ="all-articles-mobile" class="col col1">
                <?php 
                // the query
                $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                
                <?php if ( $wpb_all_query->have_posts() ) : 
                    
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
                            if (!$news_thumbnail_image) {
                                $news_thumbnail_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                            } else {
                                $news_thumbnail_image = $news_thumbnail_image['sizes']['medium'];
                            }
                            if (!$news_exceprt) {
                                $news_exceprt = get_the_excerpt();
                            } 
                        ?>
                                                                       
                        <div class="article-mobile pb-[40px] border-b border-grey hidden <?php echo $classes; ?>">
                            <img class="w-full" src="<?php echo $news_thumbnail_image; ?>"/>
                            <div>        
                                <div class="article-date mt-[25px]"><h4 class="uppercase text-lilac child:text-lilac font-bold"><?php the_category(' '); ?> -  <?php echo get_the_date(); ?></h4></div>
                                <h3 class="text-blue font-bold mt-[8px]"><?php the_title(); ?></h3>                               
                                <p class="text-blue mb-[16px]"><?php echo strip_tags($news_exceprt); ?></p>
                                <a class="read-more text-blue underline" href="<?php the_permalink(); ?>">Read more</a>
                            </div>
                        </div>

                    <?php endwhile; ?>
                    <!-- end of the loop -->
                
                
                
                    <?php wp_reset_query();   
                        wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>

			</div>
            
		</div>
        <div class="row">
            <div class="col flex justify-end">
            <div id="loadmore" class="btn mt-[50px] justify-center w-full lg:w-auto py-[16px] lg:py-[8px] px-[16px] hover:bg-white hover:text-lilac hover:border-lilac hover:border-2 text-white bg-lilac border-0">Load More</div>
            </div>
        </div>
	</div>
</div>
<script>
    articles = document.getElementsByClassName("article-mobile");
    const loadmore = document.querySelector('#loadmore');

    function openCategoryMobile(evt, category) {
        
        if (category == 'all') {
            for (i = 0; i < articles.length; i++) {
                if (articles[i].classList.contains('hide')) {
                    articles[i].classList.toggle('hide');
                }
            }
        } else {
            /*Inially hide all articles*/
            for (i = 0; i < articles.length; i++) {
                if (!articles[i].classList.contains('hide')) {
                    articles[i].classList.add('hide');
                }
            }

            /*Show selected*/
            for (i = 0; i < articles.length; i++) {
                if (articles[i].classList.contains(category)) {
                    articles[i].classList.toggle('hide');
                }
            }
        }             
        
       
       
    }

    /*Radio Buttons on mobile */
    radioButtons= document.querySelectorAll('.radio-button');
    for (i = 0; i < radioButtons.length; i++) {
        radioButtons[i].addEventListener('change',function(e){
            if(this.checked) {
                openCategoryMobile(event, this.value );

                for (i = 0; i < articles.length; i++) {
                    articles[i].classList.remove('hidden');        
                }
                loadmore.style.display = 'none';
                document.querySelector('#articles-mobile').scrollIntoView();
            }
        });
    }

    /* Toggle Mobile Filters */
    filtersButton = document.querySelector('#filter');
    mobileFilters = document.querySelector('#mobile-filters');
    filtersButton.addEventListener('click', () => {
        filtersButton.querySelector('img').classList.toggle('active');
        mobileFilters.classList.toggle('hidden');
    });

    /* Close filters*/
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        mobileFilters.classList.toggle('hidden');
    }


    /*Load More Button */
    let currentItems = 4;

    const elementList1 = [...document.querySelectorAll('.article-mobile')];
        for (let i = 0; i < 4; i++) {
            if (elementList1[i]) {
                elementList1[i].classList.toggle('hidden')
            }
    }

    loadmore.addEventListener('click', (e) => {
        const elementList = [...document.querySelectorAll('.article-mobile')];
        for (let i = currentItems; i < elementList.length; i++) {
            if (elementList[i]) {
                elementList[i].classList.toggle('hidden')
            }
        } 
        event.target.style.display = 'none';
        
    })

    
</script>
